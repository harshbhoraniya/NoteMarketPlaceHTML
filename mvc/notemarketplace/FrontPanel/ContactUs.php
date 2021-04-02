<?php 
    include "../includes/db.php";
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Notes Marketplace</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <!-- Navigation -->
    <?php 
        if(isset($_SESSION['ID'])){
            include "includes/header.php"; 
        }
        else{
            include "includes/header_non.php"; 
        }
    ?>
    <!-- End Navigation -->

    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!-- Head -->
    <section class="head">
        <div class="head-content">
            <div class="container">
                <div class="row">
                    <div class="head-content-inner">
                        <div class="head-heading">
                            Contact US
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Head -->

    <!-- Contact US  -->
    <section class="container">
        <form method="post">
            <div class="row heading">
                <div class="col-md-12">
                    <h1 class="title">Get In Touch</h1>
                    <p id="pera1">Let us know how to get back to you</p>
                </div>
            </div>
            <div class="row heading">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputFullName1">Full Name <span>*</span></label>
                        <input type="text" name="fullname" class="form-control" id="exampleInputFullName1"
                            placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address <span>*</span></label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputSubject1">Subject <span>*</span></label>
                        <input type="text" name="subject" class="form-control" id="exampleInputSubject1"
                            placeholder="Enter your subject">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputComment1">Comments / Questions <span>*</span></label>
                        <textarea  name="comment" class="form-control" id="exampleInputComment1"
                            placeholder="Comments..."></textarea>
                    </div>
                </div>
            </div>
            <div class="row btn-contactus-submit">
                <div class="form-group">
                    <button name="submit" id="btn-Submit" class="btn">SUBMIT</button>
                </div>
            </div>
        </form>
    </section>
    <!-- End Contact US   -->

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>

</html>


<?php 
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
 
//include PHPMailer classes to your PHP file for sending email
require_once __DIR__ . '../src/Exception.php';
require_once __DIR__ . '../src/PHPMailer.php';
require_once __DIR__ . '../src/SMTP.php';
 
// Create an object of the PHPMailer class. Passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);



if(isset($_POST['submit'])){
    $sender_comment = "<b>Hello,<br></b>";

    $sender_name    = $_POST['fullname'];
    $sender_email   = $_POST['email'];
    $sender_subject = $_POST['subject'];
    $sender_comment .= $_POST['comment'];

    $sender_comment .= "<b> <br><br>Regards,<br></b>";
    $sender_comment .= $sender_name;
    
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
        $mail->setFrom($config_email, 'Harsh Bhoraniya');  // This email address and name will be visible as sender of email

    
        $mail->addAddress('badboys2811@gmail.com', 'Harsh');  // This email is where you want to send the email
        $mail->addReplyTo($sender_email, $sender_name);   // If receiver replies to the email, it will be sent to this email address
    
        // Setting the email content
        $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
        $mail->Subject = $sender_subject;       //subject line of email
        $mail->Body = $sender_comment;   //Email body
        $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
    
        $mail->send();
        echo "Email message sent.";
    } catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
}
 
?>