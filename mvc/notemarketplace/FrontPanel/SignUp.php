<?php include "../includes/db.php";?>
<?php ob_start();?>

<?php 

session_start();    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '../src/Exception.php';
require_once __DIR__ . '../src/PHPMailer.php';
require_once __DIR__ . '../src/SMTP.php';


$success = false;
$msg = "";

if(isset($_POST['signup'])){
    $user_email = $_POST['email'];
    $check = mysqli_num_rows(mysqli_query($connection, "SELECT U.`EmailID` FROM `user` AS U WHERE U.`EmailID` = '$user_email'"));
    $currentdate = date("Y-m-d H:m:s");
    if($check>0){
        $msg="email is already Registered.";
    }
    else{
        if($_POST['password'] == $_POST['repassword']){
            $user_firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
            $user_lastname  = mysqli_real_escape_string($connection, $_POST['lastname']);
            $user_email     = mysqli_real_escape_string($connection, $_POST['email']);
            $user_password  = mysqli_real_escape_string($connection, $_POST['password']);
            $user_roleid = 3;
            $Isemailverified = 0;
            $Isactive =1;
            $token = openssl_random_pseudo_bytes(16);
            //Convert the binary data into hexadecimal representation.
            $token = bin2hex($token);

            $query = "INSERT INTO `user` (`RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `IsEmailVerified`, `Token`, `IsActive`) VALUES('$user_roleid','$user_firstname','$user_lastname','$user_email','$user_password', '0' , '$token', '1' ) ";
            $create_user_query = mysqli_query($connection, $query);

            if($create_user_query){
                $success = true;
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
                        $mail->Password = 'H@rsh1199';   // YOUR gmail password for above account
                        // Sender and recipient settings
                        $mail->setFrom($config_email, 'Harsh');  // This email address and name will be visible as sender of email
                        $mail->addAddress($user_email, $user_firstname.' '.$user_lastname);  // This email is where you want to send the email
                        $mail->addReplyTo($config_email, 'Harsh');   // If receiver replies to the email, it will be sent to this email address
                        // Setting the email content
                        $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                        $mail->Subject = "About verifying EmailID for NotesMarketplace";       //subject line of email
                        $mail->Body = '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
                            <title>Notes Market Place-Email verification</title>
                            <!-- Google Fonts -->
                            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
                        </head>
                        <body >
                            <table style="height:40%;width: 40%; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-family:Open Sans !important;background: #fff;border-radius: 3px;padding-left: 2%;padding-right: 2%;">
                                <thead>
                                    <th>
                                        <img src="https://i.ibb.co/HVyPwqM/top-logo1.png" alt="logo" style="margin-top: 5%;">
                                    </th>
                                </thead>
                                <tbody>
                                    <tr style="height: 60px;font-family: Open Sans;font-size: 26px;font-weight: 600;line-height: 30px;color: #6255a5;">
                                        <td class="text-1">Email Verification</td>
                                    </tr>
                                    <tr style="height: 40px;font-family: Open Sans;font-size: 18px;font-weight: 600;line-height: 22px;color: #333333;margin-bottom: 20px;">
                                        <td class="text-2">Dear '.$user_firstname.' '.$user_lastname.',</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="text-3">
                                            Thanks for Signing up! <br>
                                            Simply click below for email verification.
                                        </td>
                                    </tr>
                                    <tr style="height: 120px;font-size: 16px;font-weight: 400;line-height: 22px;color: #333333;margin-bottom: 50px;">
                                        <td style="text-align: center;">
                                            <a href="http://localhost:8080/notemarketplace/FrontPanel/EmailVerify.php?id='.$token.'">
                                            <button class="btn btn-verify" style="width: 100% !important;height:50px;font-family: Open Sans; font-size: 18px;font-weight: 600;line-height: 22px;color: #fff;background-color: #6255a5;border-radius: 3px;">VERIFY EMAIL ADDRESS</button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>
                        </html>';   //Email body
                        $mail->AltBody = 'Verify emailid registered for notesmarket.';   //Alternate body of email
                        $mail->send();
                    } catch (Exception $e) {
                        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                    }
            }
            else
            {
                die("Query failed" . mysqli_error($connection));
            }
        }
        else{
            $msg = "password and confirm password should be equal";
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
    #signup-box .message {
        color: red;
    }

    #signup-box .message1 {
        color: Green;
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
                        <?php
                            if($success){
                            ?>
                            <div id="success-inform" class="form-group text-center">
                            <p><img src="../images/Success-Green.png" alt="success-image" style="height: 20px;width: 20px;"> Your
                                account has been succesdfully created.</p>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="text-center error" style="color:red;">
                                <p><?php echo $msg; ?></p>
                            </div>
                            <?php
                        ?>
                        <!-- First Name -->
                        <div class="form-group">
                            <label for="first-name-1">First Name <span>*</span></label>
                            <input type="text" name="firstname" class="form-control" id="first-name-1"
                                placeholder="Enter your First Name" required/>

                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last-name">Last Name <span>*</span></label>
                            <input type="text" name="lastname" class="form-control" id="last-name"
                                placeholder="Enter your last name" required/>

                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email-1">Email <span>*</span></label>
                            <input type="email" name="email" class="form-control" id="email-1"
                                placeholder="Enter your email address" required/>

                        </div>

                        <!-- Password-->
                        <div class="form-group">
                            <label for="password-1">Password</label>
                            <input type="password" name="password" class="form-control" id="password-1"
                                placeholder="Enter your password" required/>
                            <span toggle="#password" class="fa fa-eye-slash fa-eye field-icon toggle-password signup-eye"></span>
                        </div>

                        <!-- Confirm Password-->
                        <div class="form-group">
                            <label for="confirm-password-1">Confirm Password</label>
                            <input type="password" name="repassword" class="form-control" id="confirm-password-1"
                                placeholder="Re enter your password" required />
                            <span toggle="#confirmpassword" class="fa fa-eye-slash fa-eye field-icon toggle-password signup-eye"></span>
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