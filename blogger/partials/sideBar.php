<?php

//  all the links will be changed in deployment code because there will be no blogger folder in there
//  all the code will be pasted in var/www/html.

if (!isset($_SESSION)) {
    session_start();    
}

$boolLoggedIn = false;
if (isset($_SESSION) and isset($_SESSION['username'])) {
    $boolLoggedIn = true;
    $currentUser = $_SESSION['username'];
     
}

$signIn = "/blogger/signIn/signIn.php";
$signUp = "/blogger/signUp/signUp.php";
$profile = "/blogger/profile/profile.php";
$logOut = "/blogger/logOut/logOut.php";
$aboutUs = "/blogger/aboutUs/aboutUs.php";
$contactUs = "/blogger/contactUs/contactUs.php";
$homePage = "/blogger/index.php";


$headBlock = "<div class='logo-details'>
                <i class='bx bxl-c-plus-plus icon'></i>
                <div class='logo_name'>BLOG</div>
                <i class='bx bx-menu' id='btn' ></i>
            </div>";

$homeBlock = "<li>
            <a href='$homePage'>
                <i class='bx bx-grid-alt'></i>
                <span class='links_name'>Home</span>
            </a>
            <span class='tooltip'>Home</span>
        </li>";

if ($boolLoggedIn) {
    $profileBlock = "<li>
                <a href='$profile' target='blank3'>
                <i class='fas fa-id-badge'></i>
                <span class='links_name'>$currentUser</span>
                </a>
                <span class='tooltip'>$currentUser</span>
            </li>";
}
else{
    $profileBlock = "<li>
                <a href='$profile' target='blank3'>
                <i class='fas fa-id-badge'></i>
                <span class='links_name'>Profile</span>
                </a>
                <span class='tooltip'>Profile</span>
            </li>";
}



$signInBlock = "<li>
                <a href='$signIn' target='blank1'>
                <i class='bx bx-user' ></i>
                <span class='links_name'>Sign in</span>
                </a>
                <span class='tooltip'>Sign in</span>
            </li>";

$signUpBlock = "<li>
                    <a href='$signUp' target='blank2'>
                    <i class='fa fa-user-plus' aria-hidden='true'></i>
                    <span class='links_name'>Sign up</span>
                    </a>
                    <span class='tooltip'>Sign up</span>
                </li> ";

$contactUsBlock = " <li>
                        <a href='$contactUs' target='blank4'>
                        <i class='far fa-address-card'></i>
                        <span class='links_name'>Contact us</span>
                        </a>
                        <span class='tooltip'>Contact us</span>
                    </li>";

$aboutUsBlock = "<li>
                    <a href='$aboutUs' target='blank4'>
                    <i class='fas fa-info-circle'></i>
                    <span class='links_name'>About us</span>
                    </a>
                    <span class='tooltip'>About us</span>
                </li>";

$logOutBlock = " <li>
                    <a href='$logOut'>                
                    <i class='fa fa-sign-out' aria-hidden='true'></i>
                    <span class='links_name'>log Out </span>
                    </a>
                    <span class='tooltip'>log Out</span>
                </li>";



if ($boolLoggedIn) {
    echo "
  <div class='sidebar'>
        $headBlock
        <ul class='nav-list'>            
            $homeBlock
            $profileBlock
            $contactUsBlock  
            $aboutUsBlock            
            $logOutBlock  
        </ul>
    </div>

";
}
else{
    echo "
  <div class='sidebar'>
        $headBlock
        <ul class='nav-list'>            
            $homeBlock
            $signInBlock
            $signUpBlock
            $contactUsBlock  
            $aboutUsBlock            
        </ul>
    </div>

";
}




?>