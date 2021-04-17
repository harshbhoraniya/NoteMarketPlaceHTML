<?php include "../includes/db.php"?>
<?php ob_start(); session_start(); ?>

<?php 
    $url = $_SERVER['HTTP_REFERER'];
    if(isset($_GET['id'])){
        $admin_id = $_GET['id'];
    }
    $user_id = $_SESSION['ID'];
    $currentdate = date("Y-m-d H:m:s");

    $query = "UPDATE `user` SET `IsDeleted` = '1', `ModifiedDate` = '$currentdate', `ModifiedBy` = '$user_id' WHERE `UserID` = '$admin_id'";
    $update_admin = mysqli_query($connection, $query);
    if($update_admin){
        header('location: '.$url);
    }
?>