<?php include "../includes/db.php"?>
<?php ob_start(); session_start(); ?>

<?php 
    if(isset($_GET['id'])){
        $country_id = $_GET['id'];
    }
    $user_id = $_SESSION['ID'];
    $currentdate = date("Y-m-d H:m:s");

    $query = "UPDATE `countries` SET `IsDeleted` = '1', `ModifiedDate` = '$currentdate', `ModifiedBy` = '$user_id' WHERE `CountryID` = '$country_id'";
    $update_country = mysqli_query($connection, $query);
    if($update_country){
        header('location: '.$url);
    }
?>