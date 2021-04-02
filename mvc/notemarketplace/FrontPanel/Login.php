<?php include "../includes/db.php";
    ob_start();
    session_start();
?>
<?php
    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email  = mysqli_real_escape_string($connection, $email);
        $password  = mysqli_real_escape_string($connection, $password);
        
        $query = "SELECT U.`UserID`, U.`RoleID`, U.`FirstName`, U.`LastName`, U.`EmailID`, U.`Password`, U.`IsEmailVerified` FROM `user` AS U WHERE U.`EmailID`= '$email' AND U.`IsEmailVerified` = '1' AND U.`IsActive` = '1' AND U.`IsDeleted` = '0'";
        $select_user_query = mysqli_query($connection, $query);
        $emailcount = mysqli_num_rows($select_user_query);
        
        if($emailcount){
            $row = mysqli_fetch_array($select_user_query);
            if($row['IsEmailVerified'] == 1)
            {
                $stored_password = $row['Password'];
                $_SESSION['ID'] = $row['UserID'];
                $_SESSION['ROLEID'] = $row['RoleID'];
                $_SESSION['FNAME'] = $row['FirstName'];
                $_SESSION['LNAME'] = $row['LastName'];
                $_SESSION['MAILID'] = $row['EmailID'];
            
                if($password == $stored_password){
                    if(isset($_POST['rememberme'])){
                        setcookie('emailidcookie',$email,time()+10800);
                        setcookie('passwordcookie',$password,time()+10800);
                    } 
                    if($row['RoleID'] == 2){
                        ?>
                            <script>
                            location.replace('../AdminPanel/Dashboard.php');
                            </script>
                        <?php
                    }else{
                        ?>
                            <script>
                            location.replace('../FrontPanel/Homepage.php');
                            </script>
                        <?php
                    }
                }
                else{
                    ?>
                    <script>
                        alert("Wrong Password");
                    </script>
                    <?php
                }
            }
            else{
                ?>
                <script>
                    alert("Please Verify Email.");
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                alert("Invalid EmailID");
            </script>
            <?php
        }
        
    }

                                      
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- important meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Title -->
    <title>Login | Notes Marketplace</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico">

    <!-- font awesome css -->
    <link rel="stylesheet" href="css/fontawesome/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
        .message{
            color : red;
        }
    </style>
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
                    <img src="../images/top-logo.png" alt="logo" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>


    <!-- Login Box -->
    <section id="login-box">
        <div class="center">
        <div class="center">
            <!-- Logo -->
            <div class="row logo">
                <div class="col-md-12">
                    <img src="../images/top-logo.png" alt="logo" class="img-fluid" />
                </div>
            </div>
        </div>
            <!-- Login Box -->
            <div class="row box">
            

                <div class="col-md-12 m-0 p-0">

                    <!-- Box -->
                    <form method="post">
                        <h1 class="text-center">Login</h1>
                        <p id="text-login" class="text-center">
                            Enter your email address and password to login
                        </p>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter Email" />
                        </div>

                        <!-- Password-->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <a class="float-right" id="forgot-password" href="ForgetPassword.php">Forgot Password?</a>
                            <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="Enter Your Password" />
                            <span toggle="#password" class="fa fa-eye-slash fa-eye field-icon toggle-password" onclick="togglepwd()"></span>
                        </div>

                        <!-- Remember me -->
                        <div class="form-group">
                            <div class="form-check d-flex align-content-center p-0 m-0 div__custom">
                                <input class="form-check-input p-0 m-0" name="rememberme" type="checkbox" id="checkbox" />
                                <label class="form-check-label p-0 label__custom" for="checkbox">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <button id="login-btn" name="login" type="submi" class="btn">Login</button>
                        <p class="text-center p-0 m-0">
                            Don't have an account? <a href="SignUp.php">Sign Up</a>
                        </p>
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