<?php

if (isset($_SESSION) and isset($_SESSION['AdminUsername']) ) {
  header("Location: ./home.php");
}


require "../partials/dbAdmin.php";

/*
//Run for only one Time so that Admin info's, username and Password is stored in database 
// after that delete these Values
// only showns for illustrative purpose


$name = "Shuja ur Rahman";
$email = "shujaurrehman210@gmail.com";
$adminPassword = "GK2225Shuja";
$username = "bloggerShuja";

$passwordHash = password_hash($adminPassword,PASSWORD_DEFAULT);

$sql = "INSERT INTO $tableName(`name`,`email`,`username`,`password`)
        VALUES('$name','$email','$username','$passwordHash')";

$result = mysqli_query($conn,$sql);


$name = "Mohd Faheem Ahmad";
$email = "mohdfaheemahmad5@gmail.com";
$adminPassword = "GJ8950Faheem";
$username = "bloggerFaheem";

$passwordHash = password_hash($adminPassword,PASSWORD_DEFAULT);

$sql = "INSERT INTO $tableName(`name`,`email`,`username`,`password`)
        VALUES('$name','$email','$username','$passwordHash')";

$result = mysqli_query($conn,$sql);

*/

$boolAdminUserFound = false;
$boolAdminPasswordMatch = false;
$boolAdminPasswordMatch = false;


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $currentUsername = $_POST["username"];
    $userPassword = $_POST["password"];
    $sql = "SELECT * FROM `$tableName` where `username` = '$currentUsername'";
    $result = mysqli_query($conn,$sql);

    $aff = mysqli_affected_rows($conn);

    if($aff<1){
        $boolAdminUserFound = false;
    }
    else{
        $boolAdminUserFound = true;
    }


    if($boolAdminUserFound){
        $data = mysqli_fetch_object($result);
        $passwordInDatabase = $data->{"password"};
        if(password_verify($userPassword,$passwordInDatabase)){
            $boolAdminPasswordMatch = true;   
            session_start();
            $_SESSION["AdminUsername"] = $currentUsername;    
            header("location: ./home.php");
        }
        else{
            $boolAdminPasswordMatch == false;
        }
    }

 
}







$logInForm = "
                <div class='container md-6 sm-6'>
                        <h3 class='my-5 text-center'>Login as Admin</h3>
                        <form class='w-50 mx-auto border border-success p-5 rounded border-3' action='./index.php' method='POST'>

                            <div class='mb-3'>
                                <label for='username' class='form-label'>Username</label>
                                <input type='text' class='form-control' id='username' name='username'>
                            </div>
                            <div class='mb-3'>
                                <label for='password' class='form-label'>Password</label>
                                <input type='password' class='form-control' id='password' name='password'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Log In</button>

                        </form>
                </div>

";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php  require "../partials/links.php"?>

</head>
<body>
    <?php
        require "../partials/adminNavbar.php";
    ?>

<div class="container-fluid ">       
    <?php    
        echo $logInForm;     
    ?>
        
</div>
</body>
</html>