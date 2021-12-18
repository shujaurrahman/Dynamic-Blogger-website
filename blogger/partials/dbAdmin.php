<?php


//These are only for illustrative Purpose on deployment code there will be only one file to connect to database
// this code is only shown for sole puprose of table creation and its structure 


$serverName = "localhost";
$username = "root";
$password = "";
$dataBase = "blog_website";
$tableName = "admins";

// creating Table

$conn  = mysqli_connect($serverName,$username,$password,$dataBase);

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