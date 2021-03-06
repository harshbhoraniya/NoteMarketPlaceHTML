<?php include "../includes/db.php";
    ob_start();
    $msg = "";
    if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email  = mysqli_real_escape_string($connection, $email);
    $password  = mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT u.* FROM user AS u  WHERE u.EmailID = '{$email}' and u.Password = '{$password}'";
    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query){
        die("FAILED TO EXECUTE YOUR REQUEST" . mysqli_error($connection));
    }
    $count = 0;
    while($row = mysqli_fetch_assoc($select_user_query)){
        $db_role_id = $row['RoleID'];
        echo $db_first_name = $row['FirstName'];
        $db_last_name = $row['FirstName'];
        $db_email_id = $row['EmailID'];
        $db_password = $row['Password'];
        $count = $count+1;
    }
    if($count == 0){
         $msg ="please enter valid email id & password";
    }
    else if($email == $db_email_id &&  $password ==$db_password && $db_role_id=='1' )
    {
        
        ?>
<script>
location.replace('../FrontPanel/Homepage.php');
</script>
<?php
    }
    else if($email == $db_email_id &&  $password ==$db_password && $db_role_id=='2' ){
                          

    ?>
<script>
location.replace('../AdminPanel/Dashboard.php');
</script>
<?php
                              
    }                
    else if($email == $db_email_id &&  $password ==$db_password && $db_role_id=='3' ){
                          

?>
<script>
location.replace('../FrontPanel/Homepage.php');
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
            <!-- Login Box -->
            <div class="row box">
                <div class="col-md-12 m-0 p-0">

                    <!-- Box -->
                    <form method="post">
                        <h1 class="text-center">Login</h1>
                        <p id="text-login" class="text-center">
                            Enter your email address and password to login
                        </p>
                        <div class="form-group text-center message">
                            <strong><?php echo $msg ?></strong>
                        </div>

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
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter Your Password" />
                            <p id="passwordHelp" class="p-0 m-0">
                                <!-- The password that you've entered is incorrect. -->
                            </p>
                        </div>

                        <!-- Remember me -->
                        <div class="form-group">
                            <div class="form-check d-flex align-content-center p-0 m-0 div__custom">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="checkbox" />
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