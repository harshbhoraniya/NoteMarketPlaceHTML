<?php include "../includes/db.php";

$id = mysqli_real_escape_string($connection,$_GET['id']);

$query = "UPDATE user SET IsEmailVerified = 1 WHERE UserID = '$id'";
mysqli_query($connection,$query);
echo "Your Account Verified";

?>

<a href="http://localhost:8080/notemarketplace/FrontPanel/Login.php">Click Here to Login</a>