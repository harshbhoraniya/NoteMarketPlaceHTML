<?php   include "../includes/db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once __DIR__ . '../src/Exception.php';
require_once __DIR__ . '../src/PHPMailer.php';
require_once __DIR__ . '../src/SMTP.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $query = "SELECT * FROM user WHERE EmailID = '{$email}'";
        $select_query = mysqli_query($connection,$query);
        if(!$select_query){
            die("FaILED".mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_query)){
            $user_name = $row['FirstName'];
        }

        if(mysqli_num_rows($select_query)==0){
            $invalid_email_error = "This email id is invalid!";
        }
        if(mysqli_num_rows($select_query)==1){
            $password = rand(1000,10000);
            $query = "UPDATE user SET Password ='{$password}' WHERE EmailID = '{$email}'";
            $password_change_query = mysqli_query($connection,$query);

            if(!$password_change_query ){
                die("FAILED TO CHANGE YOUR PASSWORD".mysqli_error($connection));
            }
            if($password_change_query ){

                $mail = new PHPMailer(true);

                try {
                // Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;        // You can enable this for detailed debug output
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;  // This is fixed port for gmail SMTP
                    $config_email = '';
                    $mail->Username = $config_email; // YOUR gmail email which will be used as sender and PHPMailer configuration 
                    $mail->Password = '';   // YOUR gmail password for above account
                    // Sender and recipient settings
                    $mail->setFrom($config_email, 'Harsh');  // This email address and name will be visible as sender of email
                    $mail->addAddress($email, $user_name);  // This email is where you want to send the email
                    $mail->addReplyTo($config_email, 'Harsh');   // If receiver replies to the email, it will be sent to this email address
                    // Setting the email content
                    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                    $mail->Subject = "New Temporary Password has been Created for you";       //subject line of email
                    $mail->Body = "<p><b>Hello,</b></p><p>We have generated a new password for you</p><p>Password : <b>$password</b></p>";   //Email body
                    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
                    $mail->send();

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
                    <form method="post">
                        <h1 class="text-center">Forget Password?</h1>
                        <p id="text-login" class="text-center">
                            Enter your email to reset your password
                        </p>

                        <div>
                        <b>
                            <?php
                                echo "Email message sent.";
                            ?>
                        </b>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email"/>
                        </div>

                        <!-- Submit Button -->
                        <button id="submit-btn" name="submit" type="submit"  class="btn"> Submit</button>

                        <?php
                        } catch (Exception $e) {
                            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                        }
                        }
                        }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Forget Passwords Box -->

    <!-- Jquery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>

</html>
