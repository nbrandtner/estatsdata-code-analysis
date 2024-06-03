package org.example;

import java.sql.*;
import java.text.SimpleDateFormat;
import java.time.*;
import java.util.Date;

public class MySQLnew {
    // Timestamp erstellen
    private static final SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");

    /**
     * @param args the command line arguments
     * Connection zur Datenbank aufbauen und Generator aufrufen, um Daten zu generieren und in die Datenbank einzufuegen
     */
    public static void main(String[] args) {
        Date date;
        Timestamp timestamp;
        Timestamp timestampDelete;
        Connection conn = null;
        Statement stmt = null;

        try {
            // Treiber damit JDBC funktioniert:
            try {
                Class.forName("com.mysql.cj.jdbc.Driver");
            } catch (ClassNotFoundException e) {
                System.err.println("JDBC Driver not found: " + e.getMessage());
                return;
            }

            // Verbindung zur Datenbank aufbauen:
            try {
                //USE FIRST LINE IF YOU RUN THE PROGRAM ON YOUR LOCAL MACHINE (Remove // in front of the line)
                //conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/estatsdb", "root", "root");
                //USE SECOND LINE IF YOU RUN THE PROGRAM IN DOCKER (Remove // in front of the line)
                conn = DriverManager.getConnection("jdbc:mysql://mysql:3306/estatsdb", "root", "root");
                System.out.println("Connection is created successfully:");
            } catch (SQLException e) {
                System.err.println("Connection failed: " + e.getMessage());
                return;
            }

            boolean alreadydone = false;
            while (true) {
                LocalTime time = LocalTime.now();
                // Wartet bis zur nächsten Stunde
                if (time.getMinute() < 59) {
                    Thread.sleep(60000);
                } else {
                    if (time.getSecond() < 49) {
                        Thread.sleep(10000);
                    }
                }
                // Wenn eine neue Stunde beginnt, werden die Daten generiert und in die Datenbank eingefuegt
                if (time.getMinute() == 0 && time.getSecond() == 0 && !alreadydone) {
                    System.out.println("It's a new hour!");
                    date = new Date();
                    timestamp = new Timestamp(date.getTime());
                    // Timestamp von letztem Monat erstellen um die Daten, welche aelter als ein Monat sind zu loeschen
                    Instant instant = timestamp.toInstant().minus(java.time.Duration.ofDays(30));
                    timestampDelete = Timestamp.from(instant);
                    System.out.println(sdf.format(timestamp) + " oder " + timestamp);

                    try {
                        // Statement erstellen
                        stmt = conn.createStatement();

                        // Setzen der Variablen fuer die Gesamtstatistiken
                        String state = "";
                        double stromverbrauch = 0;
                        int strompreis = 0;
                        double co2Emissionen = 0;
                        double stromimport = 0;
                        double stromexport = 0;

                        // Diese Schleife geht durch alle Bundeslaender und speichert die generierten Daten in der Datenbank
                        for (int j = 0; j < 9; j++) {
                            // data ist ein Array mit den Daten die der Generator generiert
                            Double[] data = Generatornew.genData(j);
                            // da preis ein int ist muessen wir diesen wieder aus dem Double Array umwandeln
                            int preis = data[1].intValue();
                            // Bundesland herausfinden
                            switch (data[5].intValue()) {
                                case 0:
                                    state = "Burgenland";
                                    break;
                                case 1:
                                    state = "Kaernten";
                                    break;
                                case 2:
                                    state = "Niederoesterreich";
                                    break;
                                case 3:
                                    state = "Oberoesterreich";
                                    break;
                                case 4:
                                    state = "Salzburg";
                                    break;
                                case 5:
                                    state = "Steiermark";
                                    break;
                                case 6:
                                    state = "Tirol";
                                    break;
                                case 7:
                                    state = "Vorarlberg";
                                    break;
                                case 8:
                                    state = "Wien";
                                    break;
                                default:
                                    throw new IllegalArgumentException("Invalid state index: " + data[5].intValue());
                            }
                            // Query, welche die Daten in die Datenbank einfuegt, fuer jedes Bundesland erstellen und ausfuehren
                            String genquery = "INSERT INTO estats " + "VALUES ('" + state + "',0.0," + data[0] + "," + preis + "," + data[2] + "," + data[3] + "," + data[4] + ",'" + sdf.format(timestamp) + "');";
                            stmt.executeUpdate(genquery);
                            System.out.println("Query für: " + state + " erfolgreich");
                            stromverbrauch += data[0];
                            strompreis += preis;
                            co2Emissionen += data[2];
                            stromimport += data[3];
                            stromexport += data[4];
                        }

                        // Gesamtstatistiken fuer ganz Österreich machen:
                        // Strompreis Durchschnitt berechnen
                        strompreis = strompreis / 9;
                        // Query fuer ganz Österreich erstellen und ausfuehren
                        String queryAll = "INSERT INTO estats " + "VALUES ('" + "Oesterreich" + "',100.0," + stromverbrauch + "," + strompreis + "," + co2Emissionen + "," + stromimport + "," + stromexport + ",'" + sdf.format(timestamp) + "')";
                        System.out.println(queryAll);
                        stmt.executeUpdate(queryAll);
                        System.out.println("Record is inserted in the table successfully..................");
                        System.out.println("Please check it in the MySQL Table..........");

                        // Stromverbrauch Anteile berechnen:
                        double oesterreichVerbrauch = 0;
                        // Stromverbrauch von ganz Österreich auslesen
                        ResultSet oesterreichResSet = stmt.executeQuery("SELECT * FROM estats WHERE date='" + sdf.format(timestamp) + "' AND region='Oesterreich'");
                        while (oesterreichResSet.next()) {
                            oesterreichVerbrauch = oesterreichResSet.getDouble("verbrauch");
                        }

                        // Alle Bundeslaender auslesen und den Stromverbrauch Anteil berechnen
                        Statement anteilStatement = conn.createStatement();
                        ResultSet anteilquery = anteilStatement.executeQuery("SELECT * FROM estats WHERE date='" + sdf.format(timestamp) + "' AND region!='Oesterreich'");
                        while (anteilquery.next()) {
                            String region = anteilquery.getString("region");
                            double verbrauch = anteilquery.getDouble("verbrauch");
                            String sqlAnteil = "UPDATE estats SET verbrauchAnteil=" + (verbrauch / oesterreichVerbrauch * 100) + " WHERE region='" + region + "' AND date='" + sdf.format(timestamp) + "';";
                            stmt.executeUpdate(sqlAnteil);
                        }
                        System.out.println(anteilStatement);

                        // Daten loeschen die aelter als 30 Tage sind
                        String sql = "DELETE FROM estats WHERE date < '" + sdf.format(timestampDelete) + "'";
                        int anzahlGeloeschterDatensaetze = stmt.executeUpdate(sql);
                        System.out.println(anzahlGeloeschterDatensaetze + " Datensätze wurden gelöscht.");
                        alreadydone = true;
                    } catch (SQLException e) {
                        System.err.println("SQL Exception: " + e.getMessage());
                    } catch (IllegalArgumentException e) {
                        System.err.println("Argument Exception: " + e.getMessage());
                    } finally {
                        if (stmt != null) {
                            try {
                                stmt.close();
                            } catch (SQLException e) {
                                System.err.println("Failed to close statement: " + e.getMessage());
                            }
                        }
                    }
                }
            }
        } catch (InterruptedException e) {
            System.err.println("Thread interrupted: " + e.getMessage());
            Thread.currentThread().interrupt(); // Restore the interrupted status
        } finally {
            if (conn != null) {
                try {
                    conn.close();
                } catch (SQLException e) {
                    System.err.println("Failed to close connection: " + e.getMessage());
                }
            }
        }
    }
}
