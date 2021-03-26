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

<?php $note_id = $_SESSION['NOTEID'];
    $currentdate = date("Y-m-d H:m:s");
    if(isset($_POST['type'])){
        $type = $_POST['type'];
    }

    $query = "SELECT SN.`SellerID`, SN.`Title`, SN.`Category`, SN.`IsPaid`, SN.`SellingPrice` FROM `sellernotes` AS SN WHERE SN.`SellerNoteID` = '$note_id' AND SN.`IsDeleted` = '0'";
    $select_notebyid_query = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($select_notebyid_query);
    $seller = $row['SellerID'];
    $downloader = $_SESSION['ID'];
    $attechmentdownloaddate = date('Y-m-d H:m:s');
    $ispaid = $row['IsPaid'];
    $puechaesedprice = $row['SellingPrice'];
    $note_title = $row['Title'];
    $category = $row['Category'];

    $query = "SELECT NC.`Name` FROM `notecategories` AS NC WHERE NC.`NoteCategoryID` = '$category' AND NC.`IsDeleted` = '0'";
    $select_category = mysqli_query($connection, $query);
    $result_category = mysqli_fetch_array($select_category);
    $category = $result_category['Name'];
    if($type == 'free'){
        $IsAllowed=1;
        $IsAttechDownload = 1;
        $query = "INSERT INTO downloads(NoteID, Seller, Downloader, IsSellerHasAllowedDownload, IsAttachmentDownloaded, AttachmentDownloadedDate, IsPaid, PurchasedPrice, NoteTitle, NoteCategory, CreatedDate, CreatedBy, ModifiedDate, ModifiedBy) VALUES ('$note_id', '$seller', '$downloader', '$IsAllowed', '$IsAttechDownload', '$attechmentdownloaddate', '$ispaid', '$puechaesedprice', '$note_title', '$category', '$currentdate', '$downloader', '$currentdate', '$downloader')";
    }
    else{
        $IsAllowed=0;
        $IsAttechDownload = 0;
        $query = "INSERT INTO downloads(NoteID, Seller, Downloader, IsSellerHasAllowedDownload, IsAttachmentDownloaded, IsPaid, PurchasedPrice, NoteTitle, NoteCategory, CreatedDate, CreatedBy, ModifiedDate, ModifiedBy) VALUES ('$note_id', '$seller', '$downloader', '$IsAllowed', '$IsAttechDownload', '$ispaid', '$puechaesedprice', '$note_title', '$category', '$currentdate', '$downloader', '$currentdate', '$downloader')";
    }
    $insert = mysqli_query($connection, $query);


    if($type == 'paid'){
        $seller = mysqli_fetch_array(mysqli_query($connection, "SELECT U.`FirstName`, U.`LastName`, U.`EmailID` FROM `user` AS U WHERE U.`UserID` = '$seller_id' AND U.`IsDeleted` = '0'"));
        $seller_name = $seller['FirstName'];
        $seller_name = ." ";
        $seller_name = $seller['LastName'];
        $seller_mail = $seller['EmailID'];

        $buyer = mysqli_fetch_array(mysqli_query($connection, "SELECT U.`FirstName`, U.`LastName`, U.`EmailID` FROM `user` AS U WHERE U.`UserID` = '$downloader' AND U.`IsDeleted` = '0'"));
        $buyer_name = $buyer['FirstName'];
        $buyer_name = ." ";
        $buyer_name = $buyer['LastName'];
        $buyer_mail = $buyer['EmailID'];
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
            $mail->addAddress($seller_mail, $seller_name);  // This email is where you want to send the email
            $mail->addReplyTo($config_email, 'Harsh');   // If receiver replies to the email, it will be sent to this email address
            // Setting the email content
            $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
            $mail->Subject = "$buyer_name wants to purchase your notes";       //subject line of email
            $mail->Body = "<p>Hello <b>$seller_name,</b></p><p>We would like to inform you that, <b>$buyer_name</b> wants to purchase your notes. Please see Buyer Requests tab and allow download access to Buyer if you have received the payment from him.</p> <p></p><p>Regards,<br>Notes Marketplace</p>";   //Email body
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
            $mail->send();
        } catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>