<?php
 session_start();
 $username= "";
 $email="";
 
 
 $errors = array();
 $servername = "localhost";
 $username = "root";
 $password = "";
 // Create connection
 $conn = mysqli_connect($servername, $username, $password);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 // Create database
 $sql = "CREATE DATABASE `onsite`";
 mysqli_query($conn, $sql);
 $db= mysqli_connect('localhost','root','', 'onsite')or die("could not connect database..");
 $sql = "CREATE TABLE captcha(
    id  INT(6) UNSIGNED AUTO_INCREMENT , 
    code VARCHAR(255) ,
    images VARCHAR(255) ,
     cole1 VARCHAR(255),
     cole2 VARCHAR(255),
     cole3 VARCHAR(255),
    PRIMARY KEY(id)
 
)";
mysqli_query($db, $sql) ;


$sql1 = "CREATE TABLE notrobot(
    id  INT(6) UNSIGNED AUTO_INCREMENT , 
    user VARCHAR(255),
    code VARCHAR(255) ,
    images VARCHAR(255) ,
    cole1 VARCHAR(255),
     cole2 VARCHAR(255),
     cole3 VARCHAR(255),
    PRIMARY KEY(id)
 
)";
mysqli_query($db, $sql1) ;



    ?> 
