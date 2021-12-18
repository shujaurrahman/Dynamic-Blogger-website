<?php 

session_start();
if (isset($_SESSION) and isset($_SESSION['username']) ) {
  header("Location: ../profile/profile.php");
}

  require "../partials/dbConnection.php";


  $boolUserError = true;
  $boolEmailError = true;
  $boolConfirmPasswordError = true;
  $boolPasswordError = true;
  $submit = false;
  
  $nameError = "";
  $nameMssg = "";
  $nameDisplay = "none";

  $userError = "";
  $userMssg = "";
  $userDisplay = "none";

  $passwordError = "";
  $passwordMssg = "";
  $passwordDisplay = "none";

  $emailError = "";
  $emailMssg = "";
  $emailDisplay = "none";

  $confirmPasswordError = "";
  $confirmPasswordMssg = "";
  $confirmPasswordDisplay = "none";

  if($_SERVER["REQUEST_METHOD"]=="POST"){
      $submit = true;

      $fullName = $_POST["fullName"];
      $username = $_POST["username"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $confirmPassword = $_POST["confirmPassword"];      

      $sql = "SELECT * FROM $tableName WHERE `username` = '$username'";
      $result = mysqli_query($conn,$sql);
      $aff = mysqli_affected_rows($conn);
      if($aff<1){
          $boolUserError = false;
      }
      else{
        $userMssg = "Username Already Exist";
        $userError = "class = 'error'";
        $userDisplay = "block";
      }

      $sql = "SELECT * FROM $tableName WHERE `email` = '$email'";
      $result = mysqli_query($conn,$sql);
      $aff = mysqli_affected_rows($conn);
      if($aff<1){
          $boolEmailError = false;
      }
      else{
          $emailMssg = "Email Already Exist";
          $emailError = "class = 'error'";
          $emailDisplay = "block";

      }  

      if($password == $confirmPassword){
        $boolConfirmPasswordError = false;
      }
      else{
        $confirmPasswordMssg = "Password Doesnt Match";
        $confirmPasswordError = "class = 'error'";
        $confirmPasswordDisplay = "block";
      }

      //Form Validation Part in php
      
      //Full Name
      $regex = "/[A-Z]\w+/";
      if (preg_match($regex,$fullName)!=1) {
          $nameMssg = "First letter Should be Capital";
          $nameError = "class = 'error'";
          $nameDisplay = "block";
      }

       //Password
       $regex = "/\w{6,}/";
       if (preg_match($regex,$password)==1) {
           $boolPasswordError = false;
       }
       else{
           $passwordMssg = "Password too Weak";
           $passwordError = "class = 'error'";
           $passwordDisplay = "block";
       }

       if(!$boolUserError and !$boolEmailError and !$boolPasswordError and !$boolConfirmPasswordError){

         //UserName
         $regex = "/\w{4,}/";
         if (preg_match($regex,$username)==1) {
           $boolUserError = false;
          }
          else{
            $userMssg = "username cannot be less than 4";
            $userError = "class = 'error'";
            $userDisplay = "block";
          }
          
          
          
          //Email
          $regex = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
          if (preg_match($regex,$email)==1) {
            $boolEmailError = false;
          }
          else{
            $emailMssg = "Please Enter a valid Email address";
            $emailError = "class = 'error'";
            $emailDisplay = "block";
          }
          
          if(!$boolPasswordError and !$boolConfirmPasswordError and !$boolUserError and !$boolEmailError){

              $passwordHash = password_hash($password,PASSWORD_DEFAULT);

              $sql = "INSERT INTO $tableName (`name`,`email`,`username`,`password`)
                VALUES('$fullName','$email','$username','$passwordHash');";


              $result = mysqli_query($conn,$sql);

              echo "
              <script>
              setInterval(() => {
                window.location = '../signIn/signIn.php';
              }, 500);
              </script>
              ";
            }

        }

}
  


?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Sign-up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "../partials/links.php";?>
    <link rel="stylesheet" href="../static/css/signUp.css">
  </head>
  <body>

    <?php
    require "../partials/sideBar.php";
    ?>

    <div class="container">
    <div class="title">Sign up</div>
    <div class="content">
      <form action="signUp.php" method="POST"> 
          <div class="user-details">
            <?php       
            
            $fullNameBlock = "<div class='input-box'>
                                <span class='details'>Full Name</span>
                                <input type='text' name='fullName' id='fullName' $nameError placeholder='Enter your name' required>
                                <small style='display: $nameDisplay ;'>$nameMssg</small>
                              </div> ";

            $usernameBlock = "<div class='input-box'>
                                <span class='details'>Username</span>
                                <input type='text' name='username' id='username' $userError placeholder='Enter your username' required>
                                <small style='display: $userDisplay;'>$userMssg</small>
                              </div>";

            $emailBlock = "<div class='input-box' id='email-input-box'>
                              <span class='details'>Email</span>
                              <input type='text' name='email' id='email' $emailError placeholder='Enter your email' required>
                              <small style='display:$emailDisplay;'>$emailMssg</small>
                            </div> ";
            
            $passwordBlock = " <div class='input-box'>
                                <span class='details'>Password</span>
                                <input type='password' name='password' id='password' $passwordError placeholder='Enter your password' required>
                                <small style='display: $passwordDisplay;'>$passwordMssg</small>
                              </div>";

            $confirmPasswordBlock = "<div class='input-box'>
                                        <span class='details'>Confirm Password</span>
                                        <input type='password' name='confirmPassword' id='confirmPassword' $confirmPasswordError placeholder='Confirm your password' required>
                                        <small style='display: $confirmPasswordDisplay;'>$confirmPasswordMssg</small>
                                      </div>";

            $buttonBlock = "<div class='button'>
                              <input type='submit' value='Sign up'> 
                            </div>"; 


            echo"
                $fullNameBlock
              
                $usernameBlock
                
                $emailBlock
                
                $passwordBlock
                
                $confirmPasswordBlock

                $buttonBlock ";
              
                
            ?>
          </div>
      </form>
    </div>
  </div>

</body>
<script src="../static/js/signUp.js"></script>
</html>
