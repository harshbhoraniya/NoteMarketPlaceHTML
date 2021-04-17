<?php include "../includes/db.php"?>
<?php ob_start(); session_start(); ?>

<?php 
    if(isset($_GET['id'])){
        $type_id = $_GET['id'];
    }
    $user_id = $_SESSION['ID'];
    $currentdate = date("Y-m-d H:m:s");

    $query = "UPDATE `notetype` SET `IsDeleted` = '1', `ModifiedDate` = '$currentdate', `ModifiedBy` = '$user_id' WHERE `NoteTypeID` = '$type_id'";
    $update_type = mysqli_query($connection, $query);
    if($update_type){
        header('location: '.$url);
    }
?>