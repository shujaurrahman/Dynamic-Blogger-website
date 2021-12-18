<?php
  require "../partials/dbConnection.php";

  session_start();
  $boolLoggedIn = false;
  if (isset($_SESSION) and isset($_SESSION['username']) ) {
    $currentUser = $_SESSION['username'];
    $boolLoggedIn = true;
  }
  else{
    header("Location: ../signIn/signIn.php");
  }
// if user is logged then only
  if($boolLoggedIn){
        $sql = "SELECT * FROM $tableName Where `username` = '$currentUser';";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_object($result);
        $userEmail = $data->{"email"};
        
        require "../partials/dbBlogs.php";
        $titleEmptyError = false;
        $submit = false;
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $submit = true;

            $blogTitle = $_POST['blogTitle'];
            $blogSubtitle = $_POST['blogSubtitle'];
            $blogContent = $_POST['blogContent'];

            // if title is not empty then insert the values in database.

            if ($blogTitle!="" or $blogTitle!=null) {
                $sql = "INSERT INTO $tableName (`username`,`email`,`blog_title`,`blog_subtitle`,`blog_content`)
                VALUES ('$currentUser','$userEmail','$blogTitle','$blogSubtitle','$blogContent');";

                $result = mysqli_query($conn,$sql);

            }
            else{
                $titleEmptyError = true;
            }

        
        }

        if ($submit and $titleEmptyError) {
        $inputBlock = "<div class='form-floating mb-3'>
                            <input type='text' class='form-control error' id='blogTitle' name='blogTitle' placeholder='Title'>
                            <label for='blogTitle'>Title Cannot Be Empty</label>
                        </div>";

        }
        else{
            $inputBlock = "<div class='form-floating mb-3'>
                            <input type='text' class='form-control' id='blogTitle' name='blogTitle' placeholder='Title'>
                            <label for='blogTitle'>Blog Title</label>
                        </div>";
        } 

        // for Edit 
        if(isset($_GET) and isset($_GET['editBlog']) and isset($_SESSION) and isset($_SESSION['username'])){
            $blogSno = $_GET['editBlog'];
            $user = $_GET['username'];
            $title = $_GET['title'];
            $subtitle = $_GET['subtitle'];
            $content = $_GET['content'];

            if ($user == $currentUser) {
                $sql = "UPDATE $tableName SET `blog_title`='$title',`blog_subtitle` = '$subtitle',`blog_content` = '$content'  WHERE `username` = '$user' and `blog_sno` = $blogSno;";
                $result = mysqli_query($conn,$sql);

                echo mysqli_error($conn);

                //$aff = mysqli_affected_rows($conn);
                
            }

        }

        // for Deletion 
        if(isset($_GET) and isset($_GET['delBlog']) and isset($_SESSION) and isset($_SESSION['username'])){
            $blogSno = $_GET['delBlog'];
            $user = $_GET['username'];

            $boolDeleted = false;

            if ($user == $currentUser) {
                $sql = "DELETE FROM $tableName WHERE `username` = '$user' and `blog_sno` = '$blogSno'";
                $result = mysqli_query($conn,$sql);

                $aff = mysqli_affected_rows($conn);

                if($aff<1){
                    $boolDeleted = false;
                }
                else{
                    $boolDeleted = true;
                }
            }


        }

        // =======================================================================
        //  current User all Blogs 

        $fetch = false;
        $userBlog ="";
        $sql = "SELECT * FROM $tableName WHERE `username` = '$currentUser'";
        $result = mysqli_query($conn,$sql);
        $aff = mysqli_affected_rows($conn);
        if($aff<1){
            $fetch = false;
        }
        else{
            $fetch = true;
        }

        if ($fetch) {

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

                $userBlog.=
                "<div class='card px-0 py-0'>
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
                            <button type='button' class='btn btn-outline-primary mx-2 my-2' onClick='blogEditFunc(`$currentUser`,$blogSno,`$blogTitle`,`$blogSubtitle`,`$blogContent`)'>Edit</button>
                            <button type='button' class='btn btn-outline-danger mx-2 my-2' onClick='blogDelFunc(`$currentUser`,$blogSno)'>Delete</button>
                            
                        </div>
                    </div>

                   

                </div>";


            }
        }
            
        
    }   
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create post </title>
    <?php require "../partials/links.php"; ?>
    <link rel="stylesheet" href="../static/css/profile.css">
    <link rel="stylesheet" href="../static/css/profileIndexCommonCard.css">
    <script defer src="../static/js/profile.js"></script>
  </head>
  <body>
    <?php require "../partials/sideBar.php"?>

    <div class="container-fluid my-5">
        <?php
            // modal 
            $modal = "

                <div id='modal' class='card' style='width: calc(100% - 40%);'>
                    <div class='card-body'>
                        <h1 class='text-center card-title'>Edit your Blog ''<span id='modalUser'></span>''.</h1>
                        <form>
                            <div style='display:none;' id='edit' name='edit'></div> 
                            <div class='mb-3'>
                                <label for='modalTitleName' class='form-label'>Title</label>
                                <input type='text' class='form-control' id='modalTitleName' name='modalTitleName' >
                            </div>
                            <div class='mb-3'>
                                <label for='modalSubtitle' class='form-label'>Modal Subtitle</label>
                                <input type='text' class='form-control' id='modalSubtitle' name='modalSubtitle'>

                            </div>
                            <div class='mb-3'>
                                <label for='modalContent' class='form-control'>Modal Content</label>
                                <textarea class='form-control' id='modalContent' name='modalContent' style='height:calc(100vh - 70vh);'></textarea>

                            </div>
                        </form> 
                            <div>
                                <button class='btn btn-primary' onClick='modalEditFunc()'>Edit</button>
                                <button class='btn btn-danger' onClick='modalCancelFunc()'>Cancel</button>
                            </div>
                    </div>
                </div>";

                echo $modal;
        ?>
        <div class="section">
            <!-- Form for post Creation -->
            <div class="center">
                <h1 class="create" >Create Post</h2>
                <form action="profile.php" method ='POST'>
                    <div class="txt_field">
                        <input type="text" required id='blogTitle' name='blogTitle'>
                        <label>Title</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" required  id="blogSubtitle" name="blogSubtitle">
                        <span></span>
                        <label for="blogSubtitle">Blog Subtitle</label>
                    </div>
                        <div class="txt_field">
                        <textarea id="blogContent" name="blogContent" rows="4" cols="78" required  ></textarea>
                        <span></span>
                        <label for="blogContent">Write your Blog</label>
                    </div>
                    <input type="submit" value="Post">
                </form>

                <div class="container-md my-5">
                    <!-- Here all blogs will be shown which were posted by that individual user only -->
                    <h2>My Blog</h2>
                    <div class="row">
                        <?php
                            if(!$fetch){
                                echo "<h4 class='my-3'> <span class='badge bg-info text-dark'>Looks Like you haven't posted any Blog yet </span></h4>";
                            }
                            else{
                                echo $userBlog;   
                            }                
                        ?>
                    </div>
                </div>
            </div>
        </div>
  </body>

</html>
