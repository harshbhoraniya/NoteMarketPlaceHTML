<?php include "../includes/db.php"; ?>
<?php 
    ob_start();
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception; 

    require_once __DIR__ . '../src/Exception.php';
    require_once __DIR__ . '../src/PHPMailer.php';
    require_once __DIR__ . '../src/SMTP.php';

    if(!isset($_SESSION['ID'])){
        ?>
        <script>
            location.replace('../FrontPanel/Login.php');
        </script>
        <?php
    }
?>

<?php
    $ID = $_SESSION['ID'];
    $loginID = $_SESSION['ID'];
    $currentdate = date("Y-m-d H:m:s");

    if (isset($_POST['save'])){

        $title = mysqli_real_escape_string($connection, $_POST['note-title']);
        $_SESSION['title'] = $title;

        $category = mysqli_real_escape_string($connection, $_POST['note-category']);
        $_SESSION['category'] = $category;

        $displaypicture = $_FILES['display-picture'];
        $_SESSION['displaypicture'] = $displaypicture;

        $uploadnote = $_FILES['notes-file'];
        $_SESSION['uploadnote'] = $uploadnote;

        $type = mysqli_real_escape_string($connection, $_POST['note-type']);
        $_SESSION['type'] = $type;

        $pages = mysqli_real_escape_string($connection, $_POST['numberofpages']);
        $_SESSION['pages'] = $pages;

        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $_SESSION['description'] = $description;

        $country = mysqli_real_escape_string($connection, $_POST['country']);
        $_SESSION['country'] = $country;

        $institute = mysqli_real_escape_string($connection, $_POST['institute-name']);
        $_SESSION['institute'] = $institute;

        $course = mysqli_real_escape_string($connection, $_POST['course-name']);
        $_SESSION['course'] = $course;

        $coursecode = mysqli_real_escape_string($connection, $_POST['course-code']);
        $_SESSION['coursecode'] = $coursecode;
        
        $professor = mysqli_real_escape_string($connection, $_POST['professor-name']);
        $_SESSION['professor'] = $professor;

        $country = mysqli_real_escape_string($connection, $_POST['country']);
        $_SESSION['country'] = $country;

        $sellfor = mysqli_real_escape_string($connection, $_POST['sellfor']);
        $_SESSION['sellfor'] = $sellfor;

        $price = mysqli_real_escape_string($connection, $_POST['sell-price']);
        if($sellfor == 0){
            $price = 0;
        }
        $_SESSION['price'] = $price;

        $preview = $_FILES['notepreview'];
        $_SESSION['preview'] = $preview;

        $loginID = $_SESSION['ID'];
        $isactive = 1;

        $displaypicname = $displaypicture['name'];
        $displaypic_ext = explode('.',$displaypicname);
        $displaypic_ext_check = strtolower(end($displaypic_ext));
        $valid_displaypic_ext = array('png','jpg','jpeg');
        $displaypicnewname = "bp_".date("dmyhis").'.'.$displaypic_ext_check;

        $previewname = $preview['name'];
        $preview_ext = explode('.',$previewname);
        $preview_ext_check = strtolower(end($preview_ext));
        $valid_preview_ext = array('pdf');
        $previewnewname = "preview_".date("dmyhis").'.'.$preview_ext_check;

        $countfiles = count($uploadnote['name']);
        for($i=0 ; $i<$countfiles ; $i++){
            $uploadnotename = $uploadnote['name'][$i];
            $uploadnote_ext = explode('.',$uploadnotename);
            $uploadnote_ext_check = strtolower(end($uploadnote_ext));
            $valid_uploadnote_ext = array('pdf');
        }

        if(!in_array($displaypic_ext_check,$valid_displaypic_ext)){
            ?>
                <script>
                    alert("please choose proper file type !! for display picture jpg , jpeg , png !!");
                </script>
            <?php
        } 
        else if(!in_array($uploadnote_ext_check,$valid_uploadnote_ext) ){
            ?>
                <script>
                    alert("please choose proper file type !! for Upload attachment file pdf ");
                </script>
            <?php
        }
        else if( !in_array($preview_ext_check,$valid_preview_ext) ) {
            ?>
                <script>
                    alert("please choose proper file type !! for note preview file pdf ");
                </script>
            <?php
        }
        else{

            $query = "INSERT INTO `sellernotes`(`SellerID`, `Status`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) 
                            VALUES ('$loginID','6','$title','$category','$displaypicnewname','$type','$pages','$description','$institute','$country' , '$course', '$coursecode', '$professor', '$sellfor', '$price', '$previewnewname', '$currentdate', '$loginID', '$currentdate', '$loginID', '$isactive')";
            $insert_note = mysqli_query($connection, $query);
            $noteid = mysqli_insert_id($connection);
            $_SESSION['noteid'] = $noteid;
            $_SESSION['notetitle']  = $title;

            $displaypicturepath = $displaypicture['tmp_name'];
            if(!is_dir("../upload/$loginID/$noteid/")){
                mkdir("../upload/".$loginID."/".$noteid."/",0777,true);
            }
            $displaypicture_desti = '../upload/'.$loginID.'/'.$noteid.'/'.$displaypicnewname;
            move_uploaded_file($displaypicturepath, $displaypicture_desti);

            $previewpath = $preview['tmp_name'];
            $preview_dest = '../upload/'.$loginID.'/'.$noteid.'/'.$previewnewname;
            move_uploaded_file($previewpath,$preview_dest);


            for($i=0;$i<$countfiles;$i++){
                $uploadnotenewname = "Attachment_[$i]_".date("dmyhis").'.'.$uploadnote_ext_check;
                $uploadnotepath = $uploadnote['tmp_name'];
    
                if(!is_dir("../upload/$loginID/$noteid/Attachment/")){
                    mkdir("../upload/".$loginID."/".$noteid."/Attachment"."/",0777,true);
                }
                $uploadnote_dest = '../upload/'.$loginID.'/'.$noteid.'/Attachment'.'/'.$uploadnotenewname;
                move_uploaded_file($uploadnotepath[$i],$uploadnote_dest);
            
                $query ="INSERT INTO `sellernotesattachements`( `NoteID` , `FileName` , `FilePath` ,`CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) 
                                VALUES ('$noteid','$uploadnotenewname','$uploadnote_dest', '$currentdate', '$loginID', '$currentdate', '$loginID', 1 )";
                $insert_attechment= mysqli_query($connection,$query);
                $attachmentid = mysqli_insert_id($connection);
            }

            if($insert_note && $insert_attechment){
                ?>
                    <script>
                        alert("note added !!");
                    </script>
                <?php
            }
            else{
                ?>
                    <script>
                        alert("note added  faild!!");
                    </script>
                <?php
            }

        }
    }

    if(isset($_POST['publish'])){      
    ?>
        <script>
        $result = confirm('Publishing this note will send note to administrator for review, once administrator review and approve then this note will be published to portal. Press yes to continue.');
        if ($result) {
            <?php 
                $noteid = $_SESSION['noteid'];
                $note_title = $_SESSION['notetitle'];
                $seller_name = $_SESSION['FNAME'];
                $query = "UPDATE `sellernotes` SET `Status` = 7, `ModifiedDate` = '$currentdate', `ModifiedBy` = '$loginID' WHERE `SellerNoteID` = '$noteid'";
                $uquery = mysqli_query($connection, $query);

                $mail = new PHPMailer(true);
                try{
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
                    $config_email = 'hdrsh19@gmail.com';
                    $mail->Username = $config_email;
                    $mail->Password = 'harshkumarbhoraniya';
                    $mail->setFrom($config_email, 'NotesMarketPlace');  // This email address and name will be visible as sender of email
                    $mail->addAddress('hdrsh128@gmail.com', 'Harsh Patel');  // This email is where you want to send the email
                    $mail->addReplyTo($config_email, 'NotesMarketPlace');   // If receiver replies to the email, it will be sent to this email address
                    // Setting the email content
                    $mail->IsHTML(true);  
                    $mail->Subject = "$seller_name sent his note for review";    
                    $mail->Body ="<table style='height:60%;width: 60%; position: absolute;margin-left:10%;font-family:Open Sans !important;background: white;border-radius: 3px;padding-left: 2%;padding-right: 2%;'>
                        <thead>
                            <th>
                                <img src='https://i.ibb.co/HVyPwqM/top-logo1.png' alt='logo' style='margin-top: 5%;'>
                            </th>
                        </thead>
                        <tbody>
                            <br>
                            <tr style='height: 60px;font-family: Open Sans;font-size: 26px;font-weight: 600;line-height: 30px;color: #6255a5;'>
                                <td class='text-1'>New Note Published</td>
                            </tr>
                            <tr style='height: 40px;font-family: Open Sans;font-size: 18px;font-weight: 600;line-height: 22px;color: #333333;margin-bottom: 20px;'>
                                <td class='text-2'>Hello Admins,</td>
                            </tr>
                            <tr style='height: 60px;'>
                                <td class='text-3'>
                                    We want to inform you that, <b>".$seller_name."</b> sent his note <br> <b>".$note_title."</b> for review. Please look at the notes and take required actions.
                                </td>
                            </tr>
                            <tr style='height: 60px;'>
                                <td class='text-3'>
                                    Regards,<br>
                                    NotesMarketPlace
                                </td>
                            </tr>
                        </tbody>
                    </table>";   //Email body
                    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
                    $mail->send();
                } catch (Exception $e) {
                    ?>
                        alert(<?php echo "Error in sending email. Mailer Error: ".$e ?>);
                    <?php
                }
                ?>
            }
            
        </script>
        <?php
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Notes | Notes Marketplace</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">

    <style>
        label {
            margin-bottom: 10px !important;
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 20px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 30px !important;
        }

        #noOfPages,
        #type {
            margin-top: 20px !important;
        }

        textarea {
            border: 1px solid #d1d1d1;
            width: 1440px;
            height: 153px !important;
            border-radius: 3px;
        }

        #btn-submit {
            margin-left: 15px;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include "includes/header.php"; ?>
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
                            Add Notes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Head -->

    <!-- Add Notes  -->
    <section class="container">
        <form method="post" enctype="multipart/form-data">
            <!-- Basic Note Details -->
            <div class="row heading">
                <div class="col-md-12 p-0">
                    <h1 class="title">Basic Note Details</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputTitle">Title <span>*</span></label>
                        <input type="text" name="note-title" class="form-control" id="inputTitle" placeholder="Enter your notes title" required <?php if(isset($_POST['save'])){ echo "value="."'".$_SESSION['title']."'" ; }?>>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dropdownCategory">Category <span>*</span></label>
                        <select name="note-category" id="dropdownCategory" class="form-control" required>
                            <option selected>Select your category</option>
                            <?php

                            $query = "SELECT NC.`NoteCategoryID`, NC.`Name` FROM `notecategories` AS NC WHERE NC.`IsDeleted` = '0'";
                            $select_category = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_category )) {
                            $category_id = $row['NoteCategoryID'];
                            $category_name = $row['Name'];            
                                ?>
                                <option value="<?php echo $category_id;?>" <?php if(isset($_POST['save'])){if($row['NoteCategoryID']==$_SESSION['category']){echo "selected";}}?>><?php echo $category_name; ?></option>
                            <?php         
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="display">Display Picture</label>
                    <input type="file" name="display-picture" class="form-control-file display" id="displaypicture" required <?php if(isset($_POST['save'])){ echo "disabled" ; }?>>
                </div>
                <div class="col-md-6">
                        <label for="display">Upload Notes</label>
                        <input type="file" name="notes-file[]" class="form-control-file upload-notes" id="uploadnote" required multiple <?php if(isset($_POST['save'])){ echo "disabled" ; }?>>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label id="type" for="dropdownType">Type</label>
                        <select name="note-type" id="dropdownType" class="form-control" required>
                            <option selected>Select your category</option>
                        <?php

                            $query = "SELECT NT.`NoteTypeID`, NT.`Name` FROM `notetype` AS NT WHERE NT.`IsDeleted` = '0'";
                            $select_type = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_type )) {
                            $type_id = $row['NoteTypeID'];
                            $type_name = $row['Name'];            
            
                            ?>
                                <option value="<?php echo $type_id;?>" <?php if(isset($_POST['save'])){if($row['NoteTypeID']==$_SESSION['type']){echo "selected";}}?>><?php echo $type_name; ?></option>
                            <?php         
                            }
                        ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label id="noOfPages" for="inputNumberofPages">Number of Pages</label>
                        <input type="text" name="numberofpages" class="form-control" id="inputNumberofPages" placeholder="Enter number of note pages" required <?php if(isset($_POST['save'])){ echo "value="."'".$_SESSION['pages']."'" ; }?>>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-0 p-0">
                        <label for="description">Description <span>*</span></label>
                        <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter your description" required><?php if(isset($_POST['save'])){  echo $_SESSION['description']; }?></textarea>
                    </div>
                </div>
            </div>

            <!-- Institution Information -->
            <div class="row">
                <div class="col-md-12"> 
                    <h1 class="title" style="margin-top: 40px;">Institution Information</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dropdownCountry">Country</label>
                        <select name="country" id="dropdownCountry" class="form-control" required>
                            <option selected>Select your country</option>
                            <?php

                            $query = "SELECT C.`CountryID`, C.`Name` FROM `countries` AS C WHERE C.IsDeleted = '0'";
                            $select_countries = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_countries )) {
                            $country_id = $row['CountryID'];
                            $country_name = $row['Name'];            
            
                            ?>
                                <option value="<?php echo $country_id;?>" <?php if(isset($_POST['save'])){if($row['CountryID']==$_SESSION['country']){echo "selected";}}?>><?php echo $country_name; ?></option>
                            <?php          
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="institutionname">Institution Name</label>
                        <input type="text" name="institute-name" class="form-control" id="institutionname" placeholder="Enter your institution name" required <?php if(isset($_POST['save'])){ echo "value="."'".$_SESSION['institute']."'" ; }?>s>
                    </div>
                </div>
            </div>

            <!-- Course Details -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title" style="margin-top: 40px;">Course Details</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coursename">Course Name</label>
                        <input type="text" name="course-name" class="form-control" id="coursename" placeholder="Enter your course name" required <?php if(isset($_POST['save'])){ echo "value="."'".$_SESSION['course']."'" ; }?>>
                    </div>
                    <div class="form-group">
                        <label for="proflecturer">Professor / Lecturer</label>
                        <input type="text" name="professor-name" class="form-control" id="proflecturer" 
                            placeholder="Enter your professor name" required <?php if(isset($_POST['save'])){ echo "value="."'".$_SESSION['professor']."'" ; }?>>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coursecode">Course Code</label>
                        <input type="text" name="course-code" class="form-control" id="coursecode" 
                            placeholder="Enter your course code" required <?php if(isset($_POST['save'])){ echo "value="."'".$_SESSION['coursecode']."'" ; }?>>
                    </div>
                </div>
            </div>

            <!-- Selling Information -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title" style="margin-top: 40px;">Selling Information</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Sell For <span>*</span></label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="sellfor" value="0" id="customRadioInline1" class="custom-control-input" required <?php if(isset($_POST['save'])){if($_SESSION['sellfor']==0){echo "checked"; } }?>>
                            <label class="custom-control-label" for="customRadioInline1" >Free</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="sellfor" value="1" id="customRadioInline2" class="custom-control-input" <?php if(isset($_POST['save'])){if($_SESSION['sellfor']==1){echo "checked"; } }?>>
                            <label class="custom-control-label" for="customRadioInline2">Paid</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sellPrice">Sell Price</label>
                        <input type="text" name="sell-price" class="form-control" id="sellPrice"  placeholder="Enter your price" required <?php if(isset($_POST['save'])){ echo "value="."'".$_SESSION['price']."'" ; }?>> 
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="file-image">Note Preview</label>
                    <input type="file" name="notepreview" class="form-control upload-notes" id="noteprevie" name="Upload a picture" required <?php if(isset($_POST['save'])){ echo "disabled" ; }?>>
                </div>
            </div>

            <div class="row btn-line">
                <div class="form-group">
                    <button href="#" name="save" id="btn-Submit" class="btn" <?php if(isset($_POST['save'])){echo "disabled";}?>>SUBMIT</button>
                </div>

                <div class="form-group">
                    <button href="#" name="publish" id="btn-Publish" class="btn" style="margin-left: 30px;" <?php if(!isset($_POST['save'])){echo "disabled";}?>>PUBLISH</button>
                </div>
            </div>
        </form>
    </section>
    <!-- End Add Notes   -->

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
    <script src="js/upload.js"></script>
    <script src="js/script.js"></script>
</body>

</html>


