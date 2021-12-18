<?php


//These are only for illustrative Purpose on deployment code there will be only one file to connect to database
// this code is only shown for sole puprose of table creation and its structure 


$serverName = "localhost";
$userName = "root";
$password = "";
$dataBase = "blog_website";
$tableName = "allblogs";

$conn  = mysqli_connect($serverName,$userName,$password,$dataBase);

//creating Table
$sql = "CREATE TABLE $dataBase . $tableName (
    `blog_sno` int primary key AUTO_INCREMENT,
    `username` text not null,
    `email` text not null,
    `blog_title` text  not null,
    `blog_subtitle` text not null,
    `blog_content` text not null,
    `time`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    );";

$result = mysqli_query($conn,$sql);

?>