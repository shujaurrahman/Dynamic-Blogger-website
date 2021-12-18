<?php

if (!isset($_SESSION)) {
    session_start();    
}

$boolAdminLoggedIn = false;
if (isset($_SESSION) and isset($_SESSION['AdminUsername'])) {
    $boolAdminLoggedIn = true;     
}

$navBar="";

if(!$boolAdminLoggedIn){
    $navBar = "
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class='container-fluid'>
        <a class='navbar-brand' >ADMIN</a>
            <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='../index.php'>Home</a>
                    </li>
                </ul>
            </div>
      </div>
    </nav>
    ";
}
else{
    $navTitle = $_SESSION["AdminUsername"];
    $navBody = "
                <div class='collapse navbar-collapse' id='navbarNav'>
                    <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='../admin/adminQueries.php'>Queries</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='../admin/adminLogOut.php'>log Out</a>
                        </li>
                    </ul>
                </div>";
    
    $navHead = "<a class='navbar-brand' href='../admin/home.php' >$navTitle</a>";

    $navBar = "
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class='container-fluid'>
        $navHead
        $navBody
      </div>
    </nav>
    ";
    
}


echo $navBar;


?>