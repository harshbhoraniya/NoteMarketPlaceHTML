<?php include "../includes/db.php"?>
<?php ob_start(); session_start(); ?>

<?php 
    if(isset($_GET['id'])){
        $category_id = $_GET['id'];
    }
    $user_id = $_SESSION['ID'];
    $currentdate = date("Y-m-d H:m:s");

    $query = "UPDATE `notecategories` SET `IsDeleted` = '1', `ModifiedDate` = '$currentdate', `ModifiedBy` = '$user_id' WHERE `NoteCategoryID` = '$category_id'";
    $update_category = mysqli_query($connection, $query);
    if($update_category){
        header('location: '.$url);
    }
?>