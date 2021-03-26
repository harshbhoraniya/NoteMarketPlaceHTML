<?php include "../includes/db.php" ?>
<?php 
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- important meta tags -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- Title -->
    <title>Forget Password | Notes Marketplace</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
          rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css"/>
</head>

<body id="loginScreen">

<!-- preloader -->
<div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

<!-- Logo -->
<section id="top-logo">
    <div class="center">
        <!-- Logo -->
        <div class="row logo">
            <div class="col-md-12">
                <img src="../images/top-logo.png" alt="logo" class="img-fluid"/>
            </div>
        </div>
    </div>
</section>

<!-- Forget Passwords Box -->
<section id="login-box">
    <div class="center">
        <!-- Forget Box -->
        <div class="row box">
            <div class="col-md-12 m-0 p-0">

                <!-- Box -->
                <form method="POST">
                    <h1 class="text-center">Change Password</h1>
                    <p id="text-login" class="text-center">
                        Enter your new password to change your password
                    </p>

                    <!-- Old Password-->
                    <div class="form-group">
                        <label for="old-password">Old Password</label>
                        <input type="password" name="old-password" class="form-control" id="old-password" placeholder="Enter your password">
                    </div>

                    <!-- New Password-->
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" name="new-password" class="form-control" id="new-password" placeholder="Enter your password">
                    </div>

                    <!-- Confirm Password-->
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" name="conf-password" class="form-control" id="confirm-password" placeholder="Re enter your password">
                    </div>

                    <!-- Submit Button -->
                    <button id="submit-btn" name="save" type="submit" class="btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- Jquery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap JS -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="js/script.js"></script>
</body>

</html>


<?php
    $currentdate = date("Y-m-d H:m:s");
    
    if(isset($_POST['save'])){
        
        $id = $_SESSION['ID'];

        $query = "SELECT U.`Password` FROM `user` AS U
        WHERE U.`UserID` = '$id'";
        $select_password = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($select_password);
        $new_password = $_POST['new-password'];
        $conf_password = $_POST['conf-password'];

        if($_POST['old-password'] == $row['Password']){
            if($new_password == $conf_password){
                $query = "UPDATE `user` set `Password` = '$new_password', `ModifiedDate` = '$currentdate', `ModifiedBy` = '$id' WHERE `UserID` = '$id'";
                $update_password = mysqli_query($connection, $query);
                if($update_password){
                    ?>
                    <script>
                        alert("Password changed..");
                        location.replace("../FrontPanel/HomePage.php");
                    </script>
                    <?php
                }
            
            }
            else{
                ?>
                    <script>
                        alert("Enter New Password and Conferm Password Same.");
                    </script>
                    <?php
            }
        }
        else{
            ?>
                    <script>
                        alert("Enter valid old password");
                    </script>
                    <?php
        }
        
        
    }



?>
