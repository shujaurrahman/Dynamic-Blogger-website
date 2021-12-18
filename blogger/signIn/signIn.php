<?php 

  session_start();
  if (isset($_SESSION) and isset($_SESSION['username']) ) {
    header("Location: ../profile/profile.php");
  }

  require "../partials/dbConnection.php";

  $boolUsernameNotFound = false;
  $boolWrongPassword = false;

  $userMssg = "";
  $userError= "";
  $userDisplay = "none";

  $passwordMssg = "";
  $passwordError= "";
  $passwordDisplay = "none";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM $tableName WHERE `username` = '$username'";
    $result = mysqli_query($conn,$sql);
    $aff  = mysqli_affected_rows($conn);
    if ($aff<1) {
      $boolUsernameNotFound = true;
    }
    else{
      //$boolUsernameNotFound = false;

      $data = mysqli_fetch_object($result);
      $passwordInDatabase = $data->{"password"};

      if (password_verify($password,$passwordInDatabase)) {
        $boolWrongPassword = false;
      }
      else{
        $boolWrongPassword = true;
      }

      if (!$boolWrongPassword) {
        session_start();
        $_SESSION["username"] = $username;

      
        header("Location: ../profile/profile.php");

      }
    }

    

    if ($boolUsernameNotFound) {
      $userMssg = "Username not Found";
      $userError= "class = 'error'";
      $userDisplay = "block";
    }
    else{
      $passwordMssg = "Wrong Password";
      $passwordError= "class = 'error'";
      $passwordDisplay = "block";

    }
  }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Sign in </title>
  <?php 
    require "../partials/links.php";
  ?>
  <link rel="stylesheet" href="../static/css/signIn.css">
</head>

<body>
<?php   require "../partials/sideBar.php"; ?>

    <div class="center">
      <h1>Login</h1>
      <form action="signIn.php"  method="post">
        <?php 
        $paragraphBlock = "<p $userError style='display: $userDisplay;'>$userMssg</p>";
        echo "$paragraphBlock";
        ?>
        
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>

        <?php 
        $paragraphBlock = "<p $passwordError style='display: $passwordDisplay;'>$passwordMssg</p>";
        echo "$paragraphBlock";
        ?>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span> 
          <label>Password</label>
        </div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="../signUp/signUp.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
