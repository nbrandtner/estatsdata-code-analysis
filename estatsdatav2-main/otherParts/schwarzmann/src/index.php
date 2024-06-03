<?php
 
$user = 'banjodevs';
$password = 'banjodevs';

$database = 'estatsdb';

$servername='proj2223_estatsaustria_mysql';
$mysqli = new mysqli($servername, $user, $password, $database);
 
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
$sql = " SELECT * FROM eStatsAustria ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.49.0/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
<script>
  window.addEventListener('load', function() {
 /**   var  mysvg = document.getElementById("Livello_1");

var  regions = mysvg.getElementsByTagName("path");
for (var i = 0; i < regions.length; i++) {
    regions[i].addEventListener("mouseover", function(evt) {
        // Move the path to the top
        evt.target.parentNode.appendChild(evt.target);
        evt.target.classList.add("regionhover");
    });
    regions[i].addEventListener("mouseout", function(evt) {
        // Remove the class from all the regions
        evt.target.classList.remove("regionhover");
    });
}
**/
const paths = document.getElementsByTagName("path");

const buttonPressed= e => {
  var drawerToggle = document.getElementById('my-drawer')


  if (!drawerToggle.checked) {
    drawerToggle.checked = !drawerToggle.checked
  }
  for (let path of paths) {
    var defaultColor = path.getAttribute('default-color');
    if (defaultColor) {
      path.style.fill = defaultColor;
    } else {

      path.style.fill = '#d2d2d2';
    }
    
  }
  e.target.style.fill = '#5A5A5A';  
}

for (let path of paths) {
  path.addEventListener("click", buttonPressed);
}
  }); 

</script>

<style>
  svg path {
    transition: all 1s;
  }
  svg path:hover {
    fill:rgb(132, 35, 35);
    z-index: 1000;
  }
.map svg {
  height: auto;
  width: 900px;
  margin-top: 0%;
  margin: 0 auto;
  display: block;
  position: relative;
}

.textalign{
  align-self: flex-start;
  padding-left: 2rem;
}

#centermap{
  margin-top: -100px;
}

</style>
</head>
<body>
  <div class="navbar bg-base-100" style="box-shadow: 0 -6px 10px 5px rgba(0,0,0,0.5);">
    <div class="flex-none">
      <!--<button class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      </button> -->
    </div>
    <div class="flex-1">
      <img src="e-stats.png" class="h-24 w-26">

      <!--<a style="margin-left: 10px;"class=" normal-case text-xl">eStats Austria</a>-->
    </div>
    <div class="flex-none">
      <label style="margin-left: 20px;" id="drawer-button" for="my-drawer" class="btn btn-primary drawer-button hidden">Diagramme</label>
    </div>
  </div>

  


    <div class="drawer" style="margin: 10px 0 0 0;">
      <input id="my-drawer" type="checkbox" class="drawer-toggle" />
      <div class="drawer-content" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <div class="textalign">
          <p > eStats Austria</p>
          <p > Diese Webseite dient dazu unseren derzeitigen Stromstatus anzuzeigen.</p>
          <p > Weiters werden Daten geupdated und jenachdem die Diagramme ebenso.</p>
          <p > ------</p>
          <p > WENN ES NOCH IDEEN GIBT HIER BITTE</p>
        </div>
        <!--
************* Copyright (c) 2017 Pareto Softare, LLC DBA Simplemaps.com *******************		
************* Free for Commercial Use, full terms at  http://simplemaps.com/resources/svg-license ************
************* Attribution is appreciated! http://simplemaps.com ***************************
-->

<div class="map" id ="centermap"> 
<svg baseprofile="tiny" id="austriamap" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" version="1.2" viewbox="0 0 1000 514" xmlns="http://www.w3.org/2000/svg">
  <path default-color="orange" d="M86.5 342l2.2 5.5 1.6 8.7 0.1 1.9-0.3 5.3-1.9 4.8-5.1 7.7-1.4 3.6-1.5 7.7-0.2 3 0.1 2.3 0.4 2.7 0.1 2.1-0.4 3.3-0.8 2.4-1.4 2-1.6 1.4-1.7 2.1-0.4 1.7 0.3 1.8 2.9 4.9 2.4 6.3 0.1 0.6-1.8-0.1-5.6-1.8-3-1.7-5-4.9-14-4.5-3.3-2.5-1.6-2.4-0.3-1.8 0.5-2 0.3-4.5 0.5-1.9 0-1.1-0.5-0.6-0.8 0.1-0.5-0.5 0.2-2.2-24.7-7.8-2.2-0.3-6.9 0.8-2.4-0.6 3.6-4.6 0.9-5-1.4-4.9-3.1-4.4-3.9-2.3 0-1.7 1.3-2.9 0.2-1.3-1.2-2.7-1.2-1.7-0.6-1.7 0.9-2.7-2.2-2-1.2-1.8 4.2-7.1 4.5-5.4 0.5-1.4 0.6-3.4 0.7-1.7 5-6.4 1.3-3 0.1-8.2-3.7-3.3-4.9-2.2-3.9-5.9 3.1 1.8 1.9 0.5 2 0 0.9-0.5 1.6-1.7 1-0.3 0.8 0.3 0.2 1.7 0.8 0.5 2.7 0.1 0.9-0.1 0.7-0.8 0.7-2.5 0.4-0.7 1.6-0.4 5.5 0.4-1.6-3.6-1.8-1.6 1.6-3.5 2.9-3.4 1.9-1 1.9-0.2 1.9 0.7 1.5 1.6 0.5 2.3-0.3 2.4 0.5 2 2.7 1.4 1-0.1 1.6-1 0.7-0.2 3.9 1.5 3.9 0.3 2-0.4 1.6-1.3 0.3 3.2 1.4 1.9 1.6 1.6 1.2 2.6 0.3 2.3 1.4 0.9 1.2-0.5 1.1-1 1.5-0.7 6.5 9.4 1.1 2.3-0.6 2-3 2.4 1.5 1.6 0.3 2.1 0.1 2 0.7 1.9 1.3 1.2 0.9 0 1-0.8 1.7-0.8 0.6 0.1 1.4 0.8 1.2-0.4 1.6-1.7 5.7-1.1 2.4 1.3-0.1 3.5-2.3 7.2 0.3 2.4-0.3 1.3-0.6 0.6-1.7 0.5-0.6 0.4-1.7 3.4 0.6 0.3 1.9-0.2z" id="AUT2320" name="Vorarlberg">
  </path>
  <path default-color="red" d="M852.5 425.6l-0.3-2.9-0.7-1.3-1.6-1.3-0.7-0.9-0.1-1.2 0.6-3.2 0.1-2 0.4-1.8 1-1.8 4.7-4.1 6.3-8.4 3.4-5.1 1-2 0.1-1.3-0.3-1.6-4.8-6.1-1.1-2.1-0.6-2.7-0.1-2 1.4-6 0-5.2-3.6-13.9-0.2-3-1-7.4-1.3-5.3-1.4-4.8-2.3-5.6-0.2-1.6 0.4-1.6 2-2.8 1.4-1.4 1.5-0.1 0.8 1 0.8 2.2 2.4-1.4 7.6-7.9 7.5 0.1 3.4-0.6 3.2-1.8 2.2-1.7 6.8-7.3 0.2-2 0.1-2.3-0.7-2.3-0.4-2.8 0.4-4.3 0.7-2.2 1.3-2.3 0.8-1.3 4.3-8.4-3.8-6-4.5-5.2-2-3.4-1-2.4 0.1-11.9 4.5-0.6 1.5-1.2 1.6-1.9 0.8-1.7 0.5-2.3 0.2-7.6 2-3.8 2.1-2.2 6.3-5 3.8-1.1 4.6-0.3 9.1 3.1 5.2-2.7 2.5-2.6 4.5-3.2 1.9-1.7 1.3-2.4 1.8-4.9 3.2-2.7 2.8-1.3 1.6-0.3 1.5 0.2 5.5-2.6 5.3-3.9 3-1.4 2.7-0.4 2.1 1 4 3.1 2.1 1.1 1.5-1 1-1.8 0.1-1.6-0.4-1.5 0-1.4 0.5-2.9 1.7-1.8 0.9-0.4 2.5 1.5 1.6 0.3 2-0.8 1.7-1.7 0.6 1.1 1.7 1.8-1.4 1.7-0.6 2-0.8 3.6 2.1 1.7-0.7 3.2 3 1.6 4.2 1.5 3.1 2.8-8.2 6.9 1.4 1.6-0.1 1.2-0.6 1.2-0.4 1.7-1.5 1.2-0.3 0.5 0.1 0.9 1.4 0.6 0.2 0.4-0.5 3.5-0.8 2.5-1.3 2-2.1 1.7-4.5 1-1.7 0.9 0.1 2.1 0.8 0.9 2.7 1.3 1.1 0.7 1.2 3.7 0.9 1.2-2 2.2 0.2 3.4 0.9 3.9 0.2 6.4 0.7 1.9 1.1 1.5 1.5 1-2.7 1.2-9.6 1.3-10.3 2.6-5-0.9-1.9-5.1-1.7 1.5-2.6 4.1-1.5 1.4-1.1 0.3-7.4-1.2-1.4-0.9-1.4-1.5-1.1-2-0.4-2-0.7-1.8-1.7-1.2-10.5-4.1-5.5-0.6-4.8 2.1-0.7 1.9 0.2 2.6-0.7 1.7-1.1 1-5.3 2.8-1.5 1.4-0.9 0.5-0.6-0.1-1.4-1.5-1 0.9-1.9 3.3-1.2 1.4 2.4 1.4 7.3 3 3.6-0.8 8.6 3.5 4.4-0.7 2.8 1.3 2.3 3 1.1 4-0.7 3.7 2.2 1.3 1.8 1.8 1 2.5-0.1 3-1.4 2.4-3.8 1.6-1.5 1.7 0.5 7.8-6.7 5.2-14.1 6.5-1.6-2.6-1.7-1.2-1.6 0.5-1.4 2.4 0.4 7.4-0.3 0.6-1.3 0.9 0 1.1 0.3 0.7 1.6 1 3.9 8.3 0.6 3.2-0.9 2.6-1.9 1.7-4 2.2 0.4 3.4-2 4.2 0.5 3.2 0.7 0.7 2.2 0 0.9 1.2 0 1.7-1.1 3.3 0 1.1 1.7 1.1 4.5-2.1 2.1 0.2 1.6 2.3-0.6 2.3-3 4-2.8 1.7-0.8 2.8 1 2.5 2.6 0.9 1.5 0.8 0.5 1-0.5 1-1.5 1-5.9 2.4-1.6 1.5 3.8 0.4 1.8 0.7 1.9 1.7 0.6 2.1-2.5 0.6-3.4 0-2.2 0.4-0.5 0.6-1.4-0.1-2.9-2.2-2.8-0.3-5.3 0.6-4.9-1-1.8 0.3-1.2 2.1-0.6 2.9-1.1 0.9-1.3 0.3-1.3 1.1-0.3 1.2 0 2.2-0.9 1.4-0.9 0.7-2.7 1.2-3.3 2.4-1.5 1.6-4.8 6.5-1.7 1.6-2.1 1-8.1 4.8-0.4 0.1z" id="AUT2322" name="Burgenland">
  </path>
  <path d="M868.1 309l-7.6 7.9-2.4 1.4-0.8-2.2-0.8-1-1.5 0.1-1.4 1.4-2 2.8-0.4 1.6 0.2 1.6 2.3 5.6 1.4 4.8 1.3 5.3 1 7.4 0.2 3 3.6 13.9 0 5.2-1.4 6 0.1 2 0.6 2.7 1.1 2.1 4.8 6.1 0.3 1.6-0.1 1.3-1 2-3.4 5.1-6.3 8.4-4.7 4.1-1 1.8-0.4 1.8-0.1 2-0.6 3.2 0.1 1.2 0.7 0.9 1.6 1.3 0.7 1.3 0.3 2.9-5.4 1.4-0.8 0.4-1.2 1.4 0.7 0.8 0.1 1.4-0.9 5.9-0.2 3.4 0.1 3.3 1.5 4.7 2.8 1.8 1.4 2.9 0.3 4.4-2.4-3.1-1.5-1-5.3-0.9-8.8-4.5-3.7-0.7-3.6 0.3-8.9 3.6-3.5 0.2-10-1.5-2.1-1.3-0.4 2.9 0 2.4-0.8 1.7-1.3 1-1.7 0.5-2-0.6-2.8 0.1-2.8 0.7-2 1.5-1.3 2.7-0.4 2.2-0.8 1.9-2.4 1.9-4 0.7-2.9-1.8-3-2.6-3.8-1.5-24 1.3-13-1.4-1.1-1.5-8.2-9.4-1.6-4.6-0.3-6.3-1.5-6.8-1.9-4.6-0.7-2.6-0.2-1.7 0.9-3.4 0.8-1.7 0.8-2.3 0.3-5.8-10.3-15.8-5.2-6.4-1.9-1.5-1.3-0.9-2-0.3-14.5 3.4-16.1 1.3-3.6-1.5-8.5 0.6-3.6-0.3-13.3 4.7-2.4-0.1-1.1-0.2-0.3-0.5-1.4-1.1-2.2-1.1-9.3-2.9-5.3-3.8-3.4-1.5-4.6-0.1-3.9 0.7-14.3 6.9-2 1.5-1.1 1.4-1.1 2.3-2 3.4-4.9 2.3-8.1 6.3-2.3 0.7-2.4 0.3-1.2-0.5-1.8-1.3-5-4.2 5-6.5 5.6-10.4 1.5-3.7 0.7-2.2-0.3-3.8 0.2-2.5 1.1-1.7 3.9-3.7 2.5-3.3 0.3-1.9-1-1.7-3.9-2.8-4.3-5.5-1.1-1.8-0.9-3.7-0.7-1.8-2.9-4.5-2.1-4.3-1.8-1.2-1.9 0.6-2 1.3-3.7 0.4-2.1 1-1.9 1.4-1.8 0.7-1.9-0.6-2.3-1.6-4.1-3.9-3.4-7.1-3.9-13-1.2-6.9 0.1-1.5 1-3.6 1-2.8 12.1 2.3 1.3-0.6 1.6-0.4 0.4-0.7 3.3-2.9 0.9-1.5 0.5-2 0-2.6-0.6-3.2-1.3-2.6-1-1.6-1.6-1.9-1.5-1.9-1-2-0.5-2-0.1-1.9 0.3-3.8 0.3-2.4 0.7-2.8 1.7-2.2 2.2-1.8 13.9-7 1.5-0.3 1.1 0.2 3.2 1.9 1.8 0.8 3.9 0.7 3.5 1.3 2 0.5 5.7-0.8 6 7 1.4 3.7 0.2 1.5 0.7 1.9 0.8-0.1 2.6-1.9 6.4-1.7 4.9-2.3 1.7-0.4 1.3 0.2 7.3 5.2 2.9 1.3 2.6 0.8 3.9-0.1 3.2-0.9 5.9-4.5 3.2-2 4.2-1.2 2.2-1.2 1.5-1.4 0.4-1.3 1.5-2 18.8-7.6 8.4-6.7 4.5 3.6 13.6 0 0.8 0.4 1.2 1.3 3.9 3.3 2.8 0.4 3.3-0.8 3.2-2 5.3-2.3 2.6-0.7 2-0.1 2.2 0.4 1.2 0 4.1-1.2 6.6-2.6 5.1-1.1 1.4-0.9 1.2-1.4 0.8-1.5 3.6-4.6 5.4 0.8 0.9 0 8-2 2.6 0.2 2.1 0.9 5.5 5.1 10.8 5.3 5.1 3.7 8.8 0.7 2.7 2.9 1.6 2.2 1.8 1.3 2.5 1.3 1.5 0.3 2.4-0.2 1.7 0.3 0.9 0.9 0.6 1.4 0.8 5.6 0.4 2.2 1 2.6 1.3 0.9 1.4-0.1 4.4-2.5 1.7-0.3 1 0.6 0.6 0.8 0.8 1.5 0.5 1.7-0.2 2.7-0.7 2.7 0.3 1.3 1.9 0.7 3.1 0 3.4 2.6 1.6 3.1 1.6 4.4 10.7 1.8 3.2 1.8 1.2 1.2 1.1 0.4 0.9 0 1.3-0.4 3.1-1.6 0.6 0.3 0.8 1.5 0.4 1.4 0.3 2.2 0.8 2.1 1.4 2.8 4.5 4z" id="AUT2323" name="Steiermark">
  </path>
  <path d="M558.6 403.2l5 4.2 1.8 1.3 1.2 0.5 2.4-0.3 2.3-0.7 8.1-6.3 4.9-2.3 2-3.4 1.1-2.3 1.1-1.4 2-1.5 14.3-6.9 3.9-0.7 4.6 0.1 3.4 1.5 5.3 3.8 9.3 2.9 2.2 1.1 1.4 1.1 0.3 0.5 1.1 0.2 2.4 0.1 13.3-4.7 3.6 0.3 8.5-0.6 3.6 1.5 16.1-1.3 14.5-3.4 2 0.3 1.3 0.9 1.9 1.5 5.2 6.4 10.3 15.8-0.3 5.8-0.8 2.3-0.8 1.7-0.9 3.4 0.2 1.7 0.7 2.6 1.9 4.6 1.5 6.8 0.3 6.3 1.6 4.6 8.2 9.4 1.1 1.5-5.7-0.6-7.5 2.4-4.9 7-2.5-3.7-1.9-0.3-4.7 2.9-2.7 0.4-1.8-0.2-1.7 0.7-2.2 3.2-1.5 3.2-1.9 6-2.5 5.6-0.7 0.6-2.9 1.3-3.3 0.6-1.2-0.8-2.2 1-0.8 0.9-0.6 1.3-1.5 1.8-1 2.4-1.7-0.4-0.6 0.2-2.6 2.8-1.4 0.8-1.3 0.4-2.9 0.3-1.2 0.5-2 2.8-1.1 3.7-1.2 3.1-2.3 1-1.7-1.8-1.5-3.3-1.7-2.4-4.6 1-2.1-0.3-4.1-1.9-0.7-0.9-1.1-1.9-1.4-0.3-4.4 0.9-27.7-0.8-1.7-0.4-7.4-6.4-1.9-1-2.1-0.6-2.3-0.1-4.4 0.8-2.2-0.2-11.9-5.7-4-0.7-8.5 1.4-1.8 0.1-8.6-2.1-2-0.2-2 0.4-2-0.2-15.8-5.2-5.6-0.2-1-0.7-1.8-2.1-1-0.4-7.9 0.6-5.8-1-13.3 2.9-5.3-0.3-2.7-1.1-8.3-5.1-10.8-2.5-30.6-2.2-7.4-4.9-4.4-1.5-1.1 0.1-2.1 0.9-1.2 0-1.2-0.5-2.4-1.8-1-0.5 0.6-1.5 4.3-8.6 1-2.7 0.6-2.3 0.4-3.3 2.8-1.4 11.7-1.8 5.3-2.3 1.5-0.2 1.4 0.5 4.6 3.5 1.1 0.2 0.9-0.5 0.4-1.5-0.8-1.5-7.8-11-6-6.4-1.4-1.9-0.9-3.1-0.3-2.5-0.6-2.7-1.1-2-1.6-1.8-1.3-0.9-2.7-2.5-1.1-2.2-1.3-1.7-0.9-1.6-0.4-1.9-0.1-1.7 0.6-2.8 1.6-4 0.1-2-1.1-1.6-11.2-3.7-1.8-1.4-1-1.5-0.4-3.7 1.7-1.1 0.9-1.1 0.5-1.7 1-0.8 1.2 0.1 1.7 0.7 5.1 3.3 6 3 8.1 2 4.2 0.5 6.3 2 10.4 6.8 2.2 1.2 2.5 0.6 3.9 0.5 9.8-0.6 5.1-1.1 6.9-3.4 3-2.3 3.3-3.2 2-0.5 2.4-0.2 5.2 1.6 12 3.2 2.9 0.2 13.1 2.8 5.8 0.5 3.4 1.1 4.6 2.4 11.2 8.7 3.9 5.1z" id="AUT2325" name="Kärnten">
  </path>
  <path d="M677.5 85.1l0.3 0.6 2.4 2.3 8.2 1.9 4.3 1.8 4.2 2.2 4.7 0.7 2.2 0.8 1.8 1.5 1.3 2.2 0.2 2-0.5 1.2-3-0.3-0.5 0.2-0.3 1-0.1 1.8-0.2 1.2 0 1.7 0.6 2 3 4.2 3.2 1.2 0.7 6.3 2.5 1.9 0.7 1.8 1.5 9.8-0.9 16.9-0.1 4.4-2-2.3-1.6-1-1.4-0.4-6.5 0.3-2.4 1.1-1.9 1.9-1.9 2.8-1.8 1.5-18.8 4.5-2.7-0.8-2.2-2.1-3.6-5.2-1.7-1.9-2-1.3-2.2-0.8-5.9-0.2-1.8 1.5-1.7 1.3-0.9 1.2-0.2 1.2-0.8 7.9-0.3 1.7-0.7 1.6-0.2 1.1 0.6 5.6 0.7 1.9 0 0.7-0.7 1.2-1.5 1.8-0.3 0.9-0.1 1.6-1.9 3.5-1.2 0.9-1 0.3-0.2 0.9 2.4 2.9 21.1 16 6.9 3.4 4.1 1.3 2.8 1.5 2.8 2.2 1.4 1.7 0.9 1.4-0.1 3.7-2.3 3.4-1.8 7.2-0.1 4.5-0.2 2.4-2.2 4.8-8.4 6.7-18.8 7.6-1.5 2-0.4 1.3-1.5 1.4-2.2 1.2-4.2 1.2-3.2 2-5.9 4.5-3.2 0.9-3.9 0.1-2.6-0.8-2.9-1.3-7.3-5.2-1.3-0.2-1.7 0.4-4.9 2.3-6.4 1.7-2.6 1.9-0.8 0.1-0.7-1.9-0.2-1.5-1.4-3.7-6-7-5.7 0.8-2-0.5-3.5-1.3-3.9-0.7-1.8-0.8-3.2-1.9-1.1-0.2-1.5 0.3-13.9 7-2.2 1.8-1.7 2.2-0.7 2.8-0.3 2.4-0.3 3.8 0.1 1.9 0.5 2 1 2 1.5 1.9 1.6 1.9 1 1.6 1.3 2.6 0.6 3.2 0 2.6-0.5 2-0.9 1.5-3.3 2.9-0.4 0.7-1.6 0.4-1.3 0.6-12.1-2.3-7.5-4.8-4.6-4.8-1.1-2.6-0.2-2.9 0.7-2.6 2-3.4 0.8-1.5 0.3-2-0.3-1.7-2.2-3.8 4.8-14.8-0.7-1.7-0.9-1.8-3.3-0.4-2.7-1.2-2-1.4-1-2.1 0.2-0.9 0.9-0.7 5.2-0.2 2.1-0.4 1.6-2.1-3.1-2.8-23.6-5.3-2.1-1.4-1.2-1.6-0.5-1.7-1.7-7.2-0.4-2.5-0.1-2.6 0.3-5.5 0.3-2.3 0.5-1.7 0.4-0.9 0.7-0.6 0.9-0.1 3.6 1 1.9 0.2 1.8-0.5 1.2-1.4 0.1-1.5-1.1-1.4-2.5-1.5-4-2.9-8.9 4.1-7.5 0.9-5-0.5-5.2-1.8-1.2-0.8-3.9-4.1-3.2-1.9-3.3-0.4-5.5 0.3-2.5 0.7-1.6 1.3-1.3 3.8-1.6 1-6.1 1.8-2.7 1-0.3-2.1-2-4.4-9.2-9.6-1.2-2-1.2-2.3-0.6-2.6 0.2-2.7 0.8-1.4 1.7-0.2 0.8-0.4 1.9-2.9 0.5-0.7 5.2-3.6 1.7-2 2.4-3.8 1.2-1.3 2-1 7.2-1.5-0.1-0.4 2-1.7 4.2-2.3 4.9-4.7 2.1-1.5 13.6-5.4 18-3.2 4.4-2.5 12.8-11.2 1.8-3.1 1-5.2 1.2-2.3 0.2-2.1-0.2-5.6 0.2-1.8 0.7-1.8 1.7-3.8 0.4-1.9-0.3-1.7-1.2-1.9-0.5-3.6-0.5-1.6 0.7-1.4 1.2-1.1 4.3-1.6 4.3-0.6 13.6 3.8 2.3 1.3 2.1 1.5 2 3.1 5.4 2.5 0.3 0.3 1.1-5.3 1.1-2.3 0.5 0.1 2.7-0.4 1-0.5 1.1-1 0.6-1 2.3-4.9 0.8-2.6 0.4-2.8 0.1-3.3-0.7-6.4 0.3-2.4 1.8-1.7-1.7-0.8-0.6-0.6-1.4-2.7-0.7 0.2 0.3-1.9 3.9-8.2 5.3 1.4 2.5 1.3 2.4 1.9 2.8 2.4 8.8 4.9 1.2 1.2 2.2 3.4 0.8 1.6 0.7 0.6 1.7 0.9 0.3 1.2-0.3 1.3-1.6 0.3-0.9 1.9-0.9 0.8 0.6 2.7 0.5 1.1 2.3 2.9 1.1 0.9 4.4 1.9 18.6 2.1 13 4.6 1.2-0.1 1-0.5 2.7-2.1 6.8-2.9 2.1-2.2 2.9-7.8 1.9-1.3 3.1 3.7 5.3 2.8 1.5 0.3 2-0.4 3.9-1.9 2-0.2 0.8 0.8 0.2 2.6 0.4 0.8 1 0.1 2-0.7 0.9 0.2 1.4 1.9 0.8 1.8 1 1.3 2.2 0.2 2-2.1z" id="AUT2326" name="Oberösterreich">
  </path>
  <path d="M532.3 300.6l-1 2.8-1 3.6-0.1 1.5 1.2 6.9 3.9 13 3.4 7.1 4.1 3.9 2.3 1.6 1.9 0.6 1.8-0.7 1.9-1.4 2.1-1 3.7-0.4 2-1.3 1.9-0.6 1.8 1.2 2.1 4.3 2.9 4.5 0.7 1.8 0.9 3.7 1.1 1.8 4.3 5.5 3.9 2.8 1 1.7-0.3 1.9-2.5 3.3-3.9 3.7-1.1 1.7-0.2 2.5 0.3 3.8-0.7 2.2-1.5 3.7-5.6 10.4-5 6.5-3.9-5.1-11.2-8.7-4.6-2.4-3.4-1.1-5.8-0.5-13.1-2.8-2.9-0.2-12-3.2-5.2-1.6-2.4 0.2-2 0.5-3.3 3.2-3 2.3-6.9 3.4-5.1 1.1-9.8 0.6-3.9-0.5-2.5-0.6-2.2-1.2-10.4-6.8-6.3-2-4.2-0.5-8.1-2-6-3-5.1-3.3-1.7-0.7-1.2-0.1-1 0.8-0.5 1.7-0.9 1.1-1.7 1.1-5.1-5-2.3-1.2-2.5-0.6-3.5-0.3-3.8-1.3-3.5-0.1-4.5 0.9-3.1-0.1-2.7 0.5-2.2 1-7.8 7.5-11.7 5.4-3.6 1.9 0.1-2.4-3.1-1.1-6.2 1.2 0.1-0.9-0.4-7.2-0.4-1.9-1.1-2.7-1-1-2.2-1.8-0.8-1.2-0.6-2-0.3-2.1 0-3.6 0.3-2.8 1.8-7.6-0.3-3.9 3.6-1.9 1.9-0.4 4 0.2 14.6-5.3 4.6-2.8 1.9-0.3 1.6 0.3 2.9 1.7 1.8 0.5 2 0.1 4.2-0.6 2.5-0.9 1.7-0.9 1.6-1.6 1.3-2.1 1.2-3.6 1-1.7 0.7-1 2.3-0.9 6.4-0.6 1.5-0.7 1.4-0.8 1.1-1.1 1.1-1.2 0.9-1.4 2.7-6 1.4-2.3 2.6-3.3 0.9-1.5 0.9-2.2-0.3-1.3-2.6-6.4-0.5-2.3-0.1-1.6 0.7-2.4-0.4-0.9-1.2-1.4-4.7-3.1-2.7-2.5-3.3-5.9 4.5-4.1 2.5-1.2 4.7-1.2 4.7 0 7.3 1.9 2.3-0.3-1.4 3.4 2.1 2.6 3.4 2.2 2.6 2.5-3.6 1.8-1.6 4.5 0.7 4.8 3.2 2.6 2 0.4 1.3 0.4 1.1 0.9 5.9 6.6 6.4 4.9 1.5 0.6 2.2-1 1.3-0.1 1.3 0.7 1.5 1.3 1.4-0.1 1-0.8 3.7-4.4-0.1-1.6-1-3.3-0.1-1.2 0-3.3 0.3-0.5 1.2-3.2-0.1-0.2-0.1-4.4 0.4 0.2 2.1-2.8 0-0.5 1.6-3.9 0.3-0.4 0.3-2.4 0.1-2.3-0.4-2.5-1-2.8-2.6-4.4-1.6-2-1.6-1.2-2-0.3-3.3 1.4-2 0.4-7.3-1.4-2.1-2.2 3.3-5.2 0.5-3.7 0.7-1.6 8.5-13.6-0.7-0.6-2.8-4.2-4.4-10.3-2.2-2.2-1.1-0.6-2.6-2.7-3.2-1.9-1-1.6-0.8-2.3 2.7-1 6.1-1.8 1.6-1 1.3-3.8 1.6-1.3 2.5-0.7 5.5-0.3 3.3 0.4 3.2 1.9 3.9 4.1 1.2 0.8 5.2 1.8 5 0.5 7.5-0.9 8.9-4.1 4 2.9 2.5 1.5 1.1 1.4-0.1 1.5-1.2 1.4-1.8 0.5-1.9-0.2-3.6-1-0.9 0.1-0.7 0.6-0.4 0.9-0.5 1.7-0.3 2.3-0.3 5.5 0.1 2.6 0.4 2.5 1.7 7.2 0.5 1.7 1.2 1.6 2.1 1.4 23.6 5.3 3.1 2.8-1.6 2.1-2.1 0.4-5.2 0.2-0.9 0.7-0.2 0.9 1 2.1 2 1.4 2.7 1.2 3.3 0.4 0.9 1.8 0.7 1.7-4.8 14.8 2.2 3.8 0.3 1.7-0.3 2-0.8 1.5-2 3.4-0.7 2.6 0.2 2.9 1.1 2.6 4.6 4.8 7.5 4.8z" id="AUT2327" name="Salzburg">
  </path>
  <path d="M408.3 372.9l0.4 3.7 1 1.5 1.8 1.4 11.2 3.7 1.1 1.6-0.1 2-1.6 4-0.6 2.8 0.1 1.7 0.4 1.9 0.9 1.6 1.3 1.7 1.1 2.2 2.7 2.5 1.3 0.9 1.6 1.8 1.1 2 0.6 2.7 0.3 2.5 0.9 3.1 1.4 1.9 6 6.4 7.8 11 0.8 1.5-0.4 1.5-0.9 0.5-1.1-0.2-4.6-3.5-1.4-0.5-1.5 0.2-5.3 2.3-11.7 1.8-2.8 1.4-0.4 3.3-0.6 2.3-1 2.7-4.3 8.6-0.6 1.5-0.2-0.1-6.5-0.7-7.6 1-1.9-0.2-2.2-1-4-2.8-7.1-1.2-5.4-2.2-4.5-4-2.5-6.1-1.1-4.2-2.2-1.4-2.7-0.4-2.7-1.1-2-1.6-0.3-1.3 0-2.5 0.3-2.2 0.9-2.7-0.1-2.3-1.2-4.2-2-1.5-5.5-0.2-1.8-0.6-1.5-2.1-1.5-1.6-1.5-0.7-3.1-0.6-1.3-0.5 1.9-1.9 0-1.8-0.9-1.8-0.9-2.1-0.8-4.5-0.5-2.2-0.9-1.9 1.4-3.3 7.9-4.5 2.8-3.8 0-2.6 3.6-1.9 11.7-5.4 7.8-7.5 2.2-1 2.7-0.5 3.1 0.1 4.5-0.9 3.5 0.1 3.8 1.3 3.5 0.3 2.5 0.6 2.3 1.2 5.1 5z m-9.2-102.5l3.3 5.9 2.7 2.5 4.7 3.1 1.2 1.4 0.4 0.9-0.7 2.4 0.1 1.6 0.5 2.3 2.6 6.4 0.3 1.3-0.9 2.2-0.9 1.5-2.6 3.3-1.4 2.3-2.7 6-0.9 1.4-1.1 1.2-1.1 1.1-1.4 0.8-1.5 0.7-6.4 0.6-2.3 0.9-0.7 1-1 1.7-1.2 3.6-1.3 2.1-1.6 1.6-1.7 0.9-2.5 0.9-4.2 0.6-2-0.1-1.8-0.5-2.9-1.7-1.6-0.3-1.9 0.3-4.6 2.8-14.6 5.3-4-0.2-1.9 0.4-3.6 1.9 0.3 3.9-1.8 7.6-0.3 2.8 0 3.6 0.3 2.1 0.6 2 0.8 1.2 2.2 1.8 1 1 1.1 2.7 0.4 1.9 0.4 7.2-0.1 0.9-2.2 0.5-13.3 6.9-9.3 0.5-5.8 2-5.6 3-4.5 3.6-5.9 0.9-1.5 1-2.5 2.1-1.5 0.3-2.5-0.9-4.2-3.2-2.5-0.2-2 0-6.9-1.4-3.2 0.3-3.8 1.1-1.2 0.7-1.3 0.2-1.2-0.2-1.1-0.7-1.4-1.6-0.9-0.5-2.3-0.6-1.3 0.3-1.1 0.9-1 1.5-4.5 4.4-4-0.3-4.1-1.9-4.6-1.1-9.2 1.6-9.1 2.9-2.3 1.4-8.5 8.5-1.1 2.3-1.3 6.8-2.5 5.9 0 2.7-0.2 1-0.5 0.6-1.5 0.6-0.5 0.6-3 5-1.8 1.9-1.9 0.3-2.2-0.8-4.5-0.4-2.3 0.3-4.4 1.5-1.3 0.1-1.3-0.6-2.2-1.9-1.2-0.6-1.3 0-2.5 0.7-1.3-0.1-3.8-2.1-1.5-0.5-2.7 0.9-1.4-0.1-0.8-1.7 0.6-0.9 2.9-2.4 0.6-1.3-1.3-1.9-10-6.1-2-0.5-2.3 0.3-13.3 3.6-5.4-0.6-4.3-3.4-0.3-4.1 1.6-6.5-0.7-3.2-1.1-1.4-4.5-3.6-2.7-4.4-1.4-1.5-0.7-0.4-1.4 0-3.8 2.1-3.3 3.8-2.3 4.4-0.1 3.6-3.2 0.2-2.6-0.7-2.1 0.4-2 3.4-0.6 2.4-0.1 1.6-0.3 1.5-1.4 1.9-5.7 2.9-3.4 1-0.9 0-0.1-0.6-2.4-6.3-2.9-4.9-0.3-1.8 0.4-1.7 1.7-2.1 1.6-1.4 1.4-2 0.8-2.4 0.4-3.3-0.1-2.1-0.4-2.7-0.1-2.3 0.2-3 1.5-7.7 1.4-3.6 5.1-7.7 1.9-4.8 0.3-5.3-0.1-1.9-1.6-8.7-2.2-5.5 8.5-1.1 2.8-1.1 5.9-3.6 2.5-2.3 2.4-3.2 2.9-5.9 0.8-1.2 1.3-0.9 2.8-1 1.1-0.7 2.2-2.9 1.9-3.9 1.2-4.4 0-4.1-0.6-2.4-0.7-1.8-1.1-1.2-1.8-1 1.3-7.7 0.1-1.8-0.8-2.2-1.2-2.1-0.1-1.7 1.9-0.8 2.2-0.4 1-0.4 0.5 0.4 0.6 1.8-0.2 0.7-0.6 1-0.5 1.2 0.2 1.7 0.7 0.9 1.1 0.7 2 1 5.6 0.8 1.5-0.2 1.7-1.4 2.6-3.7 1.8-1.3 3.2 0.1 17.3 6.5 0.5 0.6 1.1 2 1.1 0.3 3.9-0.5 5.2-2.4 1.9-0.5 1.8 0.1 1.4 0.8 3 2.3-1.1 1.3-4.2 2.9 0.9 1.5 6.7 3.1 6.5 7.1 0.4 0.9 0.1 1.3-0.3 1.3-0.7 0.9 1.3 2.7 1.8 1 13.7 0.2 2.5-0.8 8.6-5.9 3.3-0.9 2.8 1.2-0.3 5.2 3.1 0.4 2.9-1.3 1.8-2 1.8-2.4 2.5-2.3 2.4-0.8 5.7-0.2 2.1-0.9 1.2-1.9-0.5-1.4-1.5-1-1.6-0.4 6.2-7.1 3-0.7 3.2 0.4 2.9 0.9 6.2-1 2.8-1.1 2.4-2.7 0.7-1.8 1-4.5 0.9-2 3.6-3.2 0.5-0.6 2.4 0.1 5.7 1.2 10.7 0 7.3 1.5 1.4-0.4 1.3-3.3 1.5-0.9 11-2.2 30 1.3 1.1-0.2 3.7-4.9 0.5-1.2 0.1-1.8-0.2-5.2-0.4-1.1-1.7-1.5-1-1.3-0.4-1-0.2-1.6 2-0.9 3.2-2.6 1.1-0.7 1.9-0.9-0.4 2.9-0.5 1.6-0.8 1.1-0.4 1.4 0.7 2.1 1.3 1.2 1.4-0.2 2.9-1.5 2.9-0.5 7.5 1.7 2.3-0.4 5.1-2 2.1 0.4 0.7 1.2 1.3 4.1 0.7 1.6 1.1 1.3 3.9 3.1 1.8 0.9 2.7 0.1 2.8-0.5 2-1 1.3-1.1z" id="AUT2329" name="Tirol">
  </path>
  <path d="M987.8 178.5l-1.7 1.7-2 0.8-1.6-0.3-2.5-1.5-0.9 0.4-1.7 1.8-0.5 2.9 0 1.4 0.4 1.5-0.1 1.6-1 1.8-1.5 1-2.1-1.1-4-3.1-2.1-1-2.7 0.4-3 1.4-5.3 3.9-5.5 2.6-1.5-0.2-1.6 0.3-2.8 1.3-3.2 2.7-1.8 4.9-1.3 2.4-1.9 1.7-4.5 3.2-2.5 2.6-5.2 2.7-9.1-3.1-4.6 0.3-3.8 1.1-6.3 5-2.1 2.2-2 3.8-0.2 7.6-0.5 2.3-0.8 1.7-1.6 1.9-1.5 1.2-4.5 0.6-0.1 11.9 1 2.4 2 3.4 4.5 5.2 3.8 6-4.3 8.4-0.8 1.3-1.3 2.3-0.7 2.2-0.4 4.3 0.4 2.8 0.7 2.3-0.1 2.3-0.2 2-6.8 7.3-2.2 1.7-3.2 1.8-3.4 0.6-7.5-0.1-4.5-4-1.4-2.8-0.8-2.1-0.3-2.2-0.4-1.4-0.8-1.5-0.6-0.3-3.1 1.6-1.3 0.4-0.9 0-1.1-0.4-1.2-1.2-3.2-1.8-10.7-1.8-1.6-4.4-1.6-3.1-3.4-2.6-3.1 0-1.9-0.7-0.3-1.3 0.7-2.7 0.2-2.7-0.5-1.7-0.8-1.5-0.6-0.8-1-0.6-1.7 0.3-4.4 2.5-1.4 0.1-1.3-0.9-1-2.6-0.4-2.2-0.8-5.6-0.6-1.4-0.9-0.9-1.7-0.3-2.4 0.2-1.5-0.3-2.5-1.3-1.8-1.3-1.6-2.2-2.7-2.9-8.8-0.7-5.1-3.7-10.8-5.3-5.5-5.1-2.1-0.9-2.6-0.2-8 2-0.9 0-5.4-0.8-3.6 4.6-0.8 1.5-1.2 1.4-1.4 0.9-5.1 1.1-6.6 2.6-4.1 1.2-1.2 0-2.2-0.4-2 0.1-2.6 0.7-5.3 2.3-3.2 2-3.3 0.8-2.8-0.4-3.9-3.3-1.2-1.3-0.8-0.4-13.6 0-4.5-3.6 2.2-4.8 0.2-2.4 0.1-4.5 1.8-7.2 2.3-3.4 0.1-3.7-0.9-1.4-1.4-1.7-2.8-2.2-2.8-1.5-4.1-1.3-6.9-3.4-21.1-16-2.4-2.9 0.2-0.9 1-0.3 1.2-0.9 1.9-3.5 0.1-1.6 0.3-0.9 1.5-1.8 0.7-1.2 0-0.7-0.7-1.9-0.6-5.6 0.2-1.1 0.7-1.6 0.3-1.7 0.8-7.9 0.2-1.2 0.9-1.2 1.7-1.3 1.8-1.5 5.9 0.2 2.2 0.8 2 1.3 1.7 1.9 3.6 5.2 2.2 2.1 2.7 0.8 18.8-4.5 1.8-1.5 1.9-2.8 1.9-1.9 2.4-1.1 6.5-0.3 1.4 0.4 1.6 1 2 2.3 0.1-4.4 0.9-16.9-1.5-9.8-0.7-1.8-2.5-1.9-0.7-6.3-3.2-1.2-3-4.2-0.6-2 0-1.7 0.2-1.2 0.1-1.8 0.3-1 0.5-0.2 3 0.3 0.5-1.2-0.2-2-1.3-2.2-1.8-1.5-2.2-0.8-4.7-0.7-4.2-2.2-4.3-1.8-8.2-1.9-2.4-2.3-0.3-0.6 0.6-0.6 0.6-5.1 0-6.1 0.4-5.3 2.5-4 6.9-6.1 0.7-3.8 1.3-2.3 0.5-2.5 0.8-1.8 1.9-0.8 6.9 0.9 6.7 2.8 2.7-0.2 1.5-3.5-0.9-1.6-0.8-2.9 0.2-1.4 1-2.5 2.7-12.4 0-5.5-0.5-6.1 0.1-5.7 1.7-4.2-0.1-2 0.6-1 2.9-0.4 7.3 2.5 10.2 0.8 0.9 2.9 0.6 2.7-0.1 2.7-0.8 2.8 2.6 0.1 9.9-2.7 0.7-0.5 1.8-2.1 0.5-1.1 0.3-2.7 0.5-0.8 1 0 1.2 1.8 0.7 0.5 6.1 0 2.9 0.9 6.3 3.2 5.8 2 2.8 1.6 6.5 5.6 10.8 4.2 10.1 5.8 3 0.7 3 0 2.2-0.7 4.7-2.5 1.1-0.3 4 0 0.8 0.6 0.5 2.4 0.6 1 0.9 0.4 2.5 0.2 1.5 1.1 0.9 0.4 1.1-0.1-1.3 1.8 1.6-0.4 1.5 0.1 1 0.9 0.1 2.1 2.2-0.6 0.7 0.8 0.2 2.4 13.2 9.6 6.9 3 12.1-0.7 18.3 2.7 2.9-0.5 1.7 1.4 0.7 0.2 2.1-0.6 1.4-1.3 6.7-11.4 2.2-1.5 3.8 0.5 1.4-0.1 2.3-1 1.2-0.1 1.2 0.4 2.3 1.4 7.8 2.3 2.4 0.3 2.5 1 1 2.4 0.5 2.9 1 2.3 1.7 1.2 2.1 0.4 4.9-0.2 2 0.7 4.8 3.1 2.4 0.9 2.5-0.3 5-1.8 2.2 0.2 3.1 4.3 1.8 13.2 4.5 5.2 1.2 9.3-1 3.5-2.1 2.3-2.2 1.7-0.9 1.9-0.7 2.6-3.5 5-1.3 2.6-0.5 2.8-1.2 10.6-0.9 2.7-0.1 2.2 0.4 1.2 1.1 0.6 2.6 0.3 2.1 1.5 1.4 1.5 0.6 1.6-1.1 3 0.9 0.8 0.9 2.1 0.6 2.1 2.2 1.2 1.4 1.3 0.8 0.3 0.6 1.5-0.1 3.2 2.1 7.1 0.6 3.5 0 4.3 0.9 3.1 3.3 3.6 1.8 1.1 2.1 0.3 1.4 0.9 2 3.6z m-76.3-35.1l-3.6-6.3-0.7-0.9-4.1-0.4-0.5 1.5-1 0.9-2.3 0.6-4.6 2.3-8.8 5.7-0.7 1.1-1.5 1.4-1.1 0.7-1.7 0.5-1.7 0.2-3.2-1.5-1 1-1.2 2-0.4 1.5 0 1.7 1 1.8 1 1.1 1 2.5-1.2 5.6 1.1 1.9 0.8 0.9 0.5 1.3 1.6 0.8 8 0.7 3.5-0.6 3.4-0.1 1.8 1.3 2.4 1.1 1.2 0.3 2.9 0.1 1.4-1 0.7-0.7 0.8-1.7 1.1-0.9 1.9-0.6 6.1-0.3 9.1 1.7-2.8-6-0.9-2.8 0.6-5.3 1.1-4.8-0.5-1.2-1-1-0.5-2.5-0.4-1.5-1.4-1.5-0.7-1.6-1.3-1.3-2.5 0.5-1.2 2.3-0.5-0.5z" id="AUT2330" name="Niederösterreich">
  </path>
  <path d="M911.5 143.4l0.5 0.5 1.2-2.3 2.5-0.5 1.3 1.3 0.7 1.6 1.4 1.5 0.4 1.5 0.5 2.5 1 1 0.5 1.2-1.1 4.8-0.6 5.3 0.9 2.8 2.8 6-9.1-1.7-6.1 0.3-1.9 0.6-1.1 0.9-0.8 1.7-0.7 0.7-1.4 1-2.9-0.1-1.2-0.3-2.4-1.1-1.8-1.3-3.4 0.1-3.5 0.6-8-0.7-1.6-0.8-0.5-1.3-0.8-0.9-1.1-1.9 1.2-5.6-1-2.5-1-1.1-1-1.8 0-1.7 0.4-1.5 1.2-2 1-1 3.2 1.5 1.7-0.2 1.7-0.5 1.1-0.7 1.5-1.4 0.7-1.1 8.8-5.7 4.6-2.3 2.3-0.6 1-0.9 0.5-1.5 4.1 0.4 0.7 0.9 3.6 6.3z" id="AUT2331" name="Wien">
  </path>
  <circle cx="179.2" cy="346.3" id="0">
  </circle>
  <circle cx="866.2" cy="112.1" id="1">
  </circle>
  <circle cx="456.2" cy="174.4" id="2">
  </circle>
 </svg>
</div>      
      </div> 
      <div class="drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 bg-base-100 text-base-content">
          <!-- Sidebar content here -->
          <p>Diagramme:</p>
          <body>
    <canvas id="canvas_diagramm" style="border:4px solid #5b5b5b;border-radius:10px;"></canvas>
	<script type="text/javascript">
        var canvas = document.getElementById("canvas_diagramm");
        var canvasWidth = 400;
        var canvasHeight = 350;
        var x=160;
        canvas.setAttribute('width', canvasWidth);
        canvas.setAttribute('height', canvasHeight);
        var cv = canvas.getContext("2d");
        //Options Grid
        var graphGridSize = 20;
        var graphGridX = (canvasWidth / graphGridSize).toFixed();
        //Draw Grid
        for(var i = 0; i < graphGridX; i ++){
	        cv.moveTo(canvasWidth, graphGridSize*i);
	        cv.lineTo(0, graphGridSize*i);
        }
        cv.strokeStyle = "#dbdbdb";
        cv.stroke();
        var data = [
            {A: "Jan", B: 32, C: "#E65858"},
            {A: "Feb", B: 70, C: "#E65858"},
            {A: "Mrz", B: 25, C: "#E65858"},
            {A: "Apr", B: 20, C: "#E65858"},
            {A: "Mai", B: 40, C: "#E65858"},
            {A: "Jun", B: 60, C: "#E65858"},
            {A: "Jul", B: 90, C: "#E65858"},
            {A: "Aug", B: 75, C: "#E65858"},
            {A: "Sep", B: 95, C: "#E65858"},
            {A: "Okt", B: 120, C: "#E65858"},
            {A: "Nov", B: 160, C: "#E65858"},
            {A: "Dez", B: <?php $rows['stromverbrauch'];?>, C: "#E65858"},
        ];
        //Options Graph
        var graphMax = 160;
        var graphPadding = 10;
        var graphFaktor = (canvasHeight-(2*graphPadding)) / graphMax;
        var graphWidth = (canvasWidth-graphPadding) / data.length;
        var graphTextcolor = '#123456'
        //Draw Graph
        for(var i = 0; i < data.length; i ++){
	        tmpTop = (canvasHeight-(graphFaktor*data[i].B)).toFixed()-graphPadding;
	        tmpHeight = ((data[i].B*graphFaktor)).toFixed();
	        cv.fillStyle = data[i].C;
	        cv.fillRect(graphWidth+((i-1)*graphWidth)+graphPadding, tmpTop, graphWidth-graphPadding, tmpHeight);
	        cv.fillStyle = graphTextcolor;
	        cv.fillText(data[i].A, graphWidth+((i-1)*graphWidth)+graphPadding+2, canvasHeight-2, graphWidth);
        }
    </script>   
          
        </ul>
      </div>
    </div>
    <div class="content">
      <!--ABOUT ME-->
      <p> abt me</p>
    </div>
</body>
</html>