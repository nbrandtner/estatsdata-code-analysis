# eStats-Data Static Code Analysis

#### by Niklas Brandtner

Link to Github: https://github.com/nbrandtner/estatsdata-code-analysis.git

## Project:

The project i decided to use for this exercise is an old Java program I wrote 2 years ago for my HTL diploma thesis. Most of the Code is written in Java and built into a Docker Container which can be found [here](https://hub.docker.com/r/nbrandtner/datagenerator). This Dockerfile can then be used to build a Maven Project and run it in a Docker-Network using the MySQL, PHPMyAdmin and my own Docker Image.
### What the code does:

The project was intended to be a smaller version of [electricitymaps](https://app.electricitymaps.com/map) using only Austria as a map but dividing it up into each Federal State. My code covers the entire back-end of this application using a DataGenerator to create Testdata and a MySQL Database to store it properly. This Datagenerator creates data every hour and sends it to the database straight away. All Data older than a month will be deleted every hour aswell. In the end theres 10 Entries, one for each Federal State and one for the entirety of Austria.

## Static Code Analysis

Using IntelliJ Qodona is integrated already, when executing this we get the following results:
![image-20240603213351999](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603213351999.png)

### Docker-Compose:

The Docker-Compose shows an Error like this:

![image-20240603213450059](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603213450059.png)

But this is a wrongly identified Error, the Key 'name' is valid and no problem at all in the version of docker-compose used.

### General (6 weak warnings)

The General Category shows 6 weak warnings but they can mostly be ignored as well as these are Duplicated code warnings because there were two different ways I developed the same code so a lot of the code is the same but its for different uses. `MySQLnew` is for running on a personal machine, while `DataGeneratorTimer` was developed with the purpose in mind of running this for a few weeks/months on a dedicated server.

![image-20240603213600252](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603213600252.png)

### **Java Group** (21 Warnings)

#### **Code Maturity** (5 Warnings)

Code Maturity again gives 5 warnings that are mostly irrelevant. It just doesn't like that I named a temporary exception variable 'e'.

![image-20240603214712926](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603214712926.png)

#### **Control-Flow Issues** (2 Warnings)

One of them is an infinite loop which is mandatory for this program to work as intended. The second warning is a simplification of one line which i corrected:

![image-20240603215103098](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603215103098.png)

![image-20240603215508929](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603215508929.png)

#### **Data-Flow** (1 Warning)

A local variable i used for easier readability is redundant.

![image-20240603215546826](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603215546826.png)

![image-20240603215647177](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603215647177.png)

#### **Declaration redundancy** (6 Warnings)

![image-20240603215746934](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603215746934.png)

The first Warning basically states that i could add a `final` tag to this line: ![image-20240603220009270](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603220009270.png)

The other Warnings are about a few old functions I used in a previous version of the program and forgot to remove.

The last Warning is a unused variable `count`.

#### Error handling (2 Warnings)

![image-20240603220518158](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603220518158.png)

These two warnings are due to bad Error Handling of me throwing exceptions after already catching exceptions with a try-catch

I fixed it using error prints instead of throwing another exception for each caught SQLException.

![image-20240603220640179](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603220640179.png)

#### **Java language level migration aids** (2 Warnings)

![image-20240603222253363](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603222253363.png)

two switch statements that can be replaced by enhanced switch statements.

![image-20240603222328056](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603222328056.png)

#### **Threading issues** (2 Warnings)

![image-20240603222504684](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603222504684.png)

Wanted busy waiting in these cases so no real warning.

### **Manifest Group** (21 Warnings)

![image-20240603222711835](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603222711835.png)

![image-20240603222739455](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603222739455.png)

This is about the `Build-Jdk-Spec: 18` Argument. It is a Custom Header for Java based projects using Manifest files.

### **Proofreading Group** (4 Grammar Errors and 114 Typos)

Most of these are just custom names of variables or words that Qodona doesn't know aswell as informally written code comments.

### **Security Group** (2 Warnings)

![image-20240603223444753](C:\Users\nbran\AppData\Roaming\Typora\typora-user-images\image-20240603223444753.png)

These dependencies were the newest versions of maven back when i created this project, but by now they are old and not safe anymore.
