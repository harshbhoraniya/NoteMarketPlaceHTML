<?php include "../includes/db.php";
ob_start();
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once __DIR__ . '../src/Exception.php';
require_once __DIR__ . '../src/PHPMailer.php';
require_once __DIR__ . '../src/SMTP.php';

?>
<?php 
    if(isset($_GET["id"])){
        $downloadid = $_GET['id'];
    }
    $result = mysqli_fetch_array(mysqli_query($connection, "SELECT D.`Seller`, D.`Downloader` FROM `downloads` AS D WHERE D.`DownloadID` = '$downloadid' AND D.`IsDeleted` = '0'"));
    $seller_id = $result['Seller'];
    $downloader = $result['Downloader'];


    $seller = mysqli_fetch_array(mysqli_query($connection, "SELECT U.`FirstName`, U.`LastName`, U.`EmailID` FROM `user` AS U WHERE U.`UserID` = '$seller_id' AND U.`IsDeleted` = '0'"));
    $seller_name = $seller['FirstName'];
    $seller_name .= " ";
    $seller_name .= $seller['LastName'];
    $seller_mail = $seller['EmailID'];

    $buyer = mysqli_fetch_array(mysqli_query($connection, "SELECT U.`FirstName`, U.`LastName`, U.`EmailID` FROM `user` AS U WHERE U.`UserID` = '$downloader' AND U.`IsDeleted` = '0'"));
    $buyer_name = $buyer['FirstName'];
    $buyer_name .= " ";
    $buyer_name .= $buyer['LastName'];
    $buyer_mail = $buyer['EmailID'];

    $date = date('Y-m-d H:m:s');
    $userid = $_SESSION['ID'];
    
    $query = "Update downloads set IsSellerHasAllowedDownload = '1', IsAttachmentDownloaded = '1', AttachmentDownloadedDate = '$date', ModifiedDate = '$date', ModifiedBy = '$userid' where DownloadID = '$downloadid'";
    $update = mysqli_query($connection, $query); 

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
        $mail->addAddress('hdrsh128@gmail.com', $buyer_name);  // This email is where you want to send the email
        $mail->addReplyTo($config_email, 'Harsh');   // If receiver replies to the email, it will be sent to this email address
        // Setting the email content
        $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
        $mail->Subject = "$seller_name Allow you to download a note";       //subject line of email
        $mail->Body = "<p>Hello <b>$buyer_name,</b></p><p>We would like to inform you that, <b>$seller_name</b> Allows you to download a note.
        Please login and see My Download tabs to download particular note.</p> <p></p><p>Regards,<br>Notes Marketplace</p>";   //Email body
        $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
        $mail->send();
    } catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }

    ?>
        <script>
        location.replace('../FrontPanel/BuyerRequest.php');
        </script>
    <?php

?>
