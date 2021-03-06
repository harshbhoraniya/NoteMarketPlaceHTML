<?php include "../includes/db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '../src/Exception.php';
require_once __DIR__ . '../src/PHPMailer.php';
require_once __DIR__ . '../src/SMTP.php';

$id = "";
$msg = "";
$msg1 = "";
function email_validation($str) { 
    return (!preg_match( 
"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
        ? FALSE : TRUE; 
}

function password_validation($str){

    $uppercase = preg_match('@[A-Z]@', $str);
    $lowercase = preg_match('@[a-z]@', $str);
    $number    = preg_match('@[0-9]@', $str);
    $specialChars = preg_match('@[^\w]@', $str);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($str) < 6) {
        return false;
    }
    return true;

}

if(isset($_POST['signup'])){

$user_role      = 3;
$user_firstname = $_POST['firstname'];
$user_lastname  = $_POST['lastname'];
$user_email = $_POST['email'];
$user_password  = $_POST['password'];
$user_repassword  = $_POST['repassword'];
$user_IsEmailVerified = 0;
$user_IsActive  = 1;

$check = mysqli_num_rows(mysqli_query($connection, "select * from user where EmailID = '{$user_email}'"));

if($check>0){
    $msg = "Email Id Alerady Exist.";
}
else{
    if($user_firstname==""|| empty($user_firstname)){
        $msg= "Enter First Name";
    }
    else if($user_lastname==""|| empty($user_lastname)){
        $msg= "Enter Last Name";
    }
    else if($user_email==""|| empty($user_email)){
        $msg= "Enter Email Address";
    }
    else if($user_password==""|| empty($user_password)){
        $msg= "Enter Password";
    }
    else if($user_password!= $user_repassword){
        $msg= "Password and Re-Password does not match";
    }
    else if(!email_validation($user_email)) { 
        $msg= "Invalid email address."; 
    }
    else if(!password_validation($user_password)){
        $msg= 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }
    else{
        $query = "INSERT INTO user (RoleID, FirstName, LastName, EmailID, Password, IsEmailVerified, IsActive) ";
        $query .= "VALUES('{$user_role}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_password}','{$user_IsEmailVerified}','{$user_IsActive}') ";

        $create_user_query = mysqli_query($connection, $query);
        $id = mysqli_insert_id($connection);
        
        $msg1 = "Your account has been succesdfully created.";
        if(!$create_user_query){
            die('QUERY FAILED' . mysqli_error($connection));
        }

        $mail = new PHPMailer(true);

                try {
                // Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;        // You can enable this for detailed debug output
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;  // This is fixed port for gmail SMTP
                    $config_email = 'hdrsh19@gmail.com';
                    $mail->Username = $config_email; // YOUR gmail email which will be used as sender and PHPMailer configuration 
                    $mail->Password = 'bhoraniyaharsh';   // YOUR gmail password for above account
                    // Sender and recipient settings
                    $mail->setFrom($config_email, 'Harsh');  // This email address and name will be visible as sender of email
                    $mail->addAddress($user_email, $user_firstname);  // This email is where you want to send the email
                    $mail->addReplyTo($config_email, 'Harsh');   // If receiver replies to the email, it will be sent to this email address
                    // Setting the email content
                    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                    $mail->Subject = "Account Verification";       //subject line of email
                    $mail->Body = '<html>
                    <head>
                    <style>
                    #email-verify h2 {
                        font-family: "Open Sans", sans-serif;
                        font-size: 26px;
                        font-weight: 600;
                        line-height: 30px;
                        color: #6255a5;
                        margin-bottom: 30px;
                    }
                    .table-email {
                        margin-top: 25%;
                    }
                    .table-email tr:hover {
                        box-shadow: none;
                    }
                    #content-email {
                        margin: 50px 0;
                    }
                    #email-verify p:nth-child(0) {
                        font-family: "Open Sans", sans-serif;
                        font-size: 18px;
                        font-weight: 600;
                        line-height: 20px;
                        color: #333333;
                        margin-bottom: 20px;
                    }
                    #email-verify p:nth-child(1) {
                        font-family: "Open Sans", sans-serif;
                        font-size: 16px;
                        font-weight: 400;
                        line-height: 20px;
                        color: #333333;
                    }
                    #email-verify-btn {
                        color: #fff;
                        width: 200px;
                        height: 50px;
                        border-radius: 4px;
                        font-family: "Open Sans", sans-serif;
                        font-size: 18px;
                        line-height: 22px;
                        background-color: #6255a5;
                    }
                    </style>
                </head>
                <body>
                    <section id="email-verify">
                    <div class="center">
                        <div class="row">
                            <table class="table-email">
                                <tr>
                                    <td class="table-logo">
                                        <img src="logo.png" alt="logo" class="img-fluid" />
                                    </td>
                                </tr>
                                <tr class="email-heading">
                                    <td>
                                        <h2>Email Verification</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Dear Harsh,</b></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Thanks for Signing up! <br>Simply click below for email verification.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="btn">
                                            <button id="email-verify-btn"><a type="submit" style="color: #fff;" href="http://localhost:8080/notemarketplace/FrontPanel/EmailVerify.php?id='.$id.'" >Verifiy email Address</a></button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>
                </body>
                </html>';   //Email body
                    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
                    $mail->send();
                } catch (Exception $e) {
                    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                }




    }
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
    <title>Sign Up | Notes Marketplace</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
        #signup-box .message{
            color: red;
        }
        #signup-box .message1{
            color: Green;
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


    <!-- Signup Box -->
    <section id="signup-box">
        <div class="center">
            <!-- Login Box -->
            <div class="row box">
                <div class="col-md-12 m-0 p-0">

                    <!-- Box -->
                    <form method="post">
                        <h1 class="text-center">Create An Account</h1>
                        <p id="text-login" class="text-center">
                            Enter your details to signup
                        </p>
                        <div class="form-group text-center message1">
                            <strong><?php echo $msg1 ?></strong>
                        </div> 
                        <div class="form-group text-center message">
                            <strong><?php echo $msg ?></strong>
                        </div>
                        
                        <!-- First Name -->
                        <div class="form-group">
                            <label for="first-name-1">First Name <span>*</span></label>
                            <input type="text" name="firstname" class="form-control" id="first-name-1"
                                placeholder="Enter your First Name" />
                                
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last-name">Last Name <span>*</span></label>
                            <input type="text" name="lastname" class="form-control" id="last-name"
                                placeholder="Enter your last name" />
                                
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email-1">Email <span>*</span></label>
                            <input type="email" name="email" class="form-control" id="email-1"
                                placeholder="Enter your email address" />
                                
                        </div>

                        <!-- Password-->
                        <div class="form-group">
                            <label for="password-1">Password</label>
                            <input type="password" name="password" class="form-control" id="password-1"
                                placeholder="Enter your password">
                                
                        </div>

                        <!-- Confirm Password-->
                        <div class="form-group">
                            <label for="confirm-password-1">Confirm Password</label>
                            <input type="password" name="repassword" class="form-control" id="confirm-password-1"
                                placeholder="Re enter your password">
                                
                        </div>

                        <!-- Signup Button -->
                        <button id="login-btn" name="signup" type="submit" class="btn">Sign up</button>
                        <p class="text-center p-0 m-0">
                            Alrady have an account? <a href="Login.php">Login</a>
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

