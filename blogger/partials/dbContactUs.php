<?php


//These are only for illustrative Purpose on deployment code there will be only one file to connect to database
// this code is only shown for sole puprose of table creation and its structure 


$serverName = "localhost";
$username = "root";
$password = "";
$database = "blog_website";
$tableName = "contacus";

$conn =  mysqli_connect($serverName,$username,$password,$database);



//creating Table 

$sql = "CREATE TABLE $database . $tableName (
    `s_no` int primary key AUTO_INCREMENT,
    `name` text not null,
    `email` text not null,
    `mssg` text not null,
    `time`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    );";

$result = mysqli_query($conn,$sql);










?>