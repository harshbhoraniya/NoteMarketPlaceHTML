<?php 
ob_start();
include "../includes/db.php";

if(isset($_GET["id"])){
    $token = $_GET["id"];
}

    $query = "UPDATE user SET IsEmailVerified = 1 WHERE Token = '$token'";
    $update_user_table = mysqli_query($connection,$query);
    if($update_user_table){
    echo "Your Account Verified";
    ?>
        <script>
        location.replace('../FrontPanel/Login.php');
        </script>
    <?php
    }
?>

