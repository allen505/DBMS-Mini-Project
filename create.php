<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";

// create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//create database
$sql = "CREATE DATABASE traffic";
if (mysqli_query($conn, $sql)) {
    echo "\nDatabase created successfully";
} else {
    echo "\nError creating database: " . mysqli_error($conn);
}



//select database
mysqli_select_db($conn,"traffic");

//create tables 
$sqlusers = "CREATE TABLE users(id varchar(20)  PRIMARY KEY, designation VARCHAR(30) NOT NULL)";
$sqluseroffence = "CREATE TABLE useroffence(id varchar(20)  PRIMARY KEY, offence VARCHAR(30) NOT NULL, paid VARCHAR(1) NOT NULL, vehicleno VARCHAR(11)NOT NULL)";
$sqlpolicerecord = "CREATE TABLE policerecord(booked varchar(20)  PRIMARY KEY, place VARCHAR(50) NOT NULL, fine INT(10), offence VARCHAR(30) NOT NULL, policestation VARCHAR(30))";
$sqladmin = "CREATE TABLE admin(id varchar(20)  PRIMARY KEY, pass VARCHAR(30) NOT NULL)";
$sqlstation = "CREATE TABLE station(cop_id varchar(20)  PRIMARY KEY, designation VARCHAR(30) NOT NULL, pass VARCHAR(30) NOT NULL, cop_name VARCHAR(30))";

if ($conn->query($sqlusers) === TRUE) {
    echo "\nTable users created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($conn->query($sqlstation) === TRUE) {
    echo "\nTable station created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($conn->query($sqluseroffence) === TRUE) {
    echo "\nTable useroffence created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}
if ($conn->query($sqlpolicerecord) === TRUE) {
    echo "\nTable policerecords created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}
if ($conn->query($sqladmin) === TRUE) {
    echo "\nTable admin created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}



mysqli_close($conn);
?>
