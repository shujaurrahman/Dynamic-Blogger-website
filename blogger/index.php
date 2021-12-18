
<?php
  require "./partials/dbBlogs.php";

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
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> BLOG WEBSITE</title>    
    <meta name='viewport' content='width=device-width, initial-scale=1.0'> 
    <?php 
      require "./partials/links.php";    
    ?>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="./static/css/profileIndexCommonCard.css">
    
  </head>

<body>
  <?php 
    require "./partials/sideBar.php";
  ?>

  <section class="home-section">
    
    <?php 
    
      if(isset($_SESSION) and isset($_SESSION['username'])){
        $currentUser = $_SESSION['username'];

        echo "<h3 class='text'> Welcome, $currentUser</h3>";
      }
      else{
        echo "<div class='text'>Blogs</div>";
      }

    ?>

    <div id= "blogs" class="my-1 mb-6">


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
                    </div>
                    </div>
                </div>";

            }
          }
        ?>
      
      
    </div>

      

  </section>


</body>
</html>
