<?php

$boolAdminLoggedIn = false;
session_start();
if(isset($_SESSION) and isset($_SESSION["AdminUsername"])){  
    $boolAdminLoggedIn = true;

    require "../partials/dbBlogs.php";

    if(isset($_GET) and isset($_GET['delBlog'])){
        $blogSno = $_GET['delBlog'];

        $sql = "DELETE FROM $tableName WHERE `blog_sno` = $blogSno";
        $result = mysqli_query($conn,$sql);

    }
    
}
else{
    $boolAdminLoggedIn = false;
    header("location: ./index.php");
}








$logInForm = "
                <div class='container md-6 sm-6'>
                        <h3 class='my-5 text-center'>Login as Admin</h3>
                        <form class='w-50 mx-auto border border-success p-5 rounded border-3' action='index.php' method='POST'>

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





  require "../partials/dbBlogs.php";

  $fetch = false;
  $sql = "SELECT * FROM  $tableName ORDER BY `allblogs`.`time` DESC;";
  $result = mysqli_query($conn,$sql);
  
  $aff = mysqli_affected_rows($conn);
  if ($aff<1) {
      $fetch = false;
  }
  else{
      $fetch = true;
  }
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php  require "../partials/links.php"?>
    <link rel="stylesheet" href="../static/css/profileIndexCommonCard.css">

</head>
<body>
    <?php
        require "../partials/adminNavbar.php";
    ?>

<div class="container-fluid ">       
    <?php 
        
        if($fetch){

            while($data = mysqli_fetch_object($result)){

            

                $blogSno = $data->{'blog_sno'};
                $username = $data->{'username'};
                $email = $data->{'email'};
                $blogTitle = $data->{'blog_title'};
                $blogSubtitle = $data->{'blog_subtitle'};

                $blogContent = $data->{'blog_content'};
                $blogLen = strlen($blogContent);
                $mainContent = substr($blogContent,0,200);
                $readMore = substr($blogContent,200,$blogLen);
                $blogTime = $data->{'time'};
                $newDate = date("j-F Y", strtotime($blogTime));
                $newTime = date("l, g:i a", strtotime($blogTime));

                echo
                "<div class='card'>
                    <div class='image-data'>
                    <div class='background-image'></div>
                    <div class='publication-details'>
                        <a href='#' class='author'><i class='fas fas-user'></i>$username</a>
                        <span class='date'><i class='fas fa-calender-alt'></i>$email</span>
                        <span class='date'><i class='fas fa-calender-alt'></i>$newDate</span>
                        <span class='date'><i class='fas fa-calender-alt'></i>$newTime</span>
                    </div>
                    </div>
                    <div class='post-data'>
                    <h1 class='title'>$blogTitle</h1>
                    <h2 class='subtitle'>$blogSubtitle</h2>
                    <p class='description'>
                        $mainContent<span class='dots'>.........</span><span class='more-text'>$readMore</span>                        
                    </p>
                    
                    <div class='cta'>  
                            <button class='read-more-btn' onclick='readMore(this)' >Read more</button>  
                            <button type='button' class='btn btn-outline-danger mx-2 my-2' onClick='blogDelFunc($blogSno)'>Delete</button>
                            
                        </div>
                    </div>
                </div>";

            }
        }
    

        
    ?>
        
</div>
</body>
<script src="../static/js/admin.js"> </script>
</html>