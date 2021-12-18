<?php

require "../partials/dbContactUs.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name = $_POST["contactusName"];
  $email = $_POST["contactusEmail"];
  $mssg = $_POST["contactusMssg"];

  $sql = "INSERT INTO $tableName (`name`,`email`,`mssg`)
          VALUES('$name','$email','$mssg');";
  $result = mysqli_query($conn,$sql);

}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Contact us  </title>
    <link rel="stylesheet" href="../static/css/contactUs.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php require "../partials/links.php" ?>
   </head>
<body>
  <?php require "../partials/sideBar.php"?>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Aligarh,202002</div>
          <div class="text-two">Purani chungi</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+917579966178</div>
          <div class="text-two">+918859522818</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">shujaurrehman210@gmail.com</div>
          <div class="text-two">mohdfaheemahmad5@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any querry related to anything or
           want to give us feedback. Feel free to contact us.</p>

      <form action="contactUs.php" method="POST">
        <div class="input-box">
          <input type="text" id="contactusName" name="contactusName" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text" id="contactusEmail" name="contactusEmail" placeholder="Enter your email">
        </div>
        <div class="input-box message-box">
          <textarea placeholder="Enter your message" id="contactusMssg" name="contactusMssg" ></textarea>
        </div>
        <div class="button">
          <input type="submit" id="contactusBtn" value="Send Now" disabled>
        </div>
      </form>
    </div>
    </div>
  </div>

</body>

<script src="../static/js/contactus.js"></script>
</html>
