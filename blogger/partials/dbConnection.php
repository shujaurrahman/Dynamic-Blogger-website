<?php


//  This is the main File which will be used in deployment code to connect to the database
//  Table  creation code is only for sole purpose of showing the code and its structure and for illustrative purpose

$serverName = "localhost";
$userName = "root";
$password = "";
$dataBase = "blog_website";
$tableName = "allusers";

$conn = mysqli_connect($serverName,$userName,$password);

// creating Database  
$sql = "CREATE DATABASE `$dataBase`";
$result = mysqli_query($conn,$sql);



$conn  = mysqli_connect($serverName,$userName,$password,$dataBase);


//creating Table
$sql = "CREATE TABLE $dataBase . $tableName (
        `s_no` int primary key AUTO_INCREMENT,
        `name` text not null,
        `email` text unique not null,
        `username` text unique not null,
        `password` text not null
        );";

$result = mysqli_query($conn,$sql);


?>