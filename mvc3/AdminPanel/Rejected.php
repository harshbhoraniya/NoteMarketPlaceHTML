<?php include "../includes/db.php" ?>
<?php
session_start();
    $url = $_SERVER['HTTP_REFERER'];
    $user_id = $_SESSION['ID'];
    $currentdate = date("Y-m-d H:m:s");
    if(isset($_GET['noteid'])){
        $note_id = $_GET['noteid'];
    }
    $query = "UPDATE `sellernotes` SET `Status` = '10', AdminRemarks = 'Note is not appropiat', ModifiedDate = '$currentdate', ModifiedBy = '$user_id' WHERE `SellerNoteID` = '$note_id' ";
    $update_note = mysqli_query($connection, $query);
    if($update_note){
        header('location: '.$url);
    }


?>