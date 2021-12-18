<?php

$boolAdminLoggedIn = false;
session_start();
if(isset($_SESSION) and isset($_SESSION["AdminUsername"])){  
    $boolAdminLoggedIn = true;   
}
else{
    $boolAdminLoggedIn = false;
    header("location: ./index.php");
}

$cardBlock = "";
$boolContactFetch = false;

if($boolAdminLoggedIn){
    require "../partials/dbContactUs.php";

    $sql = "SELECT * FROM $tableName;";
    $result = mysqli_query($conn,$sql);

    $aff = mysqli_affected_rows($conn);

    if($aff<1){
        $boolContactFetch = false;
    }
    else{
        $boolContactFetch = true;

        while($data = mysqli_fetch_object($result)){
            $contactName = $data->{"name"};
            $contactEmail = $data->{"email"};
            $contactMssg = $data->{"mssg"};
            $contactTime = $data->{"time"};
            $newDate = date("j F Y", strtotime($contactTime));
            $newTime = date("l, g:i a", strtotime($contactTime));


            $cardBlock .= "
                            <div class='container mx-5 my-5'>       
                                <div class='card  bg-dark text-white'>
                                    <div class='card-header'>
                                        $contactName || $contactEmail
                                    </div>
                                    <div class='card-body'>
                                        <blockquote class='blockquote mb-0'>
                                        <p>$contactMssg.</p>
                                        <footer class='blockquote-footer'>$newDate  <cite title='Source Title'> $newTime</cite></footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>   ";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queries</title>
    <?php  require "../partials/links.php"?>
</head>
<body>
    <?php require "../partials/adminNavbar.php";  ?>

    <div class="container my-5">
        <h1>All Queries</h1>

        <?php
            if($boolContactFetch){

                echo $cardBlock;
            }
            else{
                echo "<h1> No Queries </h1>";
            }
        ?>

    </div>

</body>
</html>