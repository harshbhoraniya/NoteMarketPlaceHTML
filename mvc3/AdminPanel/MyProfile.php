<?php include "../includes/db.php";
ob_start();
session_start();
if(!isset($_SESSION['ID'])){
    ?>
    <script>
        location.replace('../FrontPanel/Login.php');
    </script>
    <?php
}
?>
<?php

    $userid = $_SESSION['ID'];
    $query = "SELECT U.`UserID`, U.`FirstName`, U.`LastName`, U.`EmailID` FROM `user` AS U WHERE U.`UserID` = '$userid'";
    $user_info = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($user_info);
    $query = "SELECT UP.`SecondaryEmailAddress`, UP.`CountryCode`, UP.`PhoneNumber` FROM `userprofile` AS UP WHERE UP.`UserID` = '$userid'";
    $up_info = mysqli_query($connection, $query);
    $total = mysqli_num_rows($up_info);
    $up_data = mysqli_fetch_array($up_info);
    $valid = true;
    $errors = array();
    $currentdate = date("Y-m-d H:m:s");

    if(isset($_POST['save'])){
        $userid = $_SESSION['ID'];
        if(empty($_POST['fname'])){
            $valid = false;
            $errors['fname'] = "You must enter your first name";
        }
        else{
            $fname = mysqli_real_escape_string($connection, $_POST['fname']);
            $_SESSION['FNAME'] = $fname;
        }
   
        if(empty($_POST['lname'])){
            $valid = false;
            $errors['lname'] = "You must enter your last name";
        }
        else{
            $lname = mysqli_real_escape_string($connection, $_POST['lname']);
            $_SESSION['LNAME'] = $lname;
        }
   
        if(empty($_POST['email'])){
            $valid = false;
            $errors['email'] = "You must enter your email address";
        }
        elseif (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $valid = false;
            $errors['email'] = "You must enter valid email address";
        }
        else{
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $_SESSION['MAILID'] = $email;
        }

        $semail = mysqli_real_escape_string($connection, $_POST['semail']);
        $countrycode = mysqli_real_escape_string($connection, $_POST['countrycode']);
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);

        $displaypic = $_FILES['dispic'];

        $displaypicname = $displaypic['name'];
        $displaypic_ext = explode('.',$displaypicname);
        $displaypic_ext_check = strtolower(end($displaypic_ext));
        $valid_displaypic_ext = array('png','jpg','jpeg');
        $displaypicnewname = "pp_".date("dmyhis").'.'.$displaypic_ext_check;

        if($valid){
            if(!is_dir("../upload/$userid")){
                mkdir("../upload/".$userid."/",0777,true);
            }
            if(in_array($displaypic_ext_check,$valid_displaypic_ext)){
                $query = "UPDATE `user` SET `FirstName` = '$fname', `LastName` = '$lname', `EmailID` = '$email', `ModifiedDate` = '$currentdate', `ModifiedBy` = '$userid' WHERE `UserID` = '$userid'";
                $update_user = mysqli_query($connection, $query);

                $query = "SELECT UP.`UserProfileID` FROM `userprofile` AS UP WHERE UP.`UserID` = '$userid' AND UP.`IsDeleted` = '0'";
                $select_profile = mysqli_query($connection, $query);
                $total_records = mysqli_num_rows($select_profile);
                if($total_records != 0){
                    $query = "UPDATE userprofile SET `SecondaryEmailAddress` = '$semail', `CountryCode` = '$countrycode', `PhoneNumber` = '$phone', `ProfilePicture` = '$displaypicnewname', ModifiedDate = '$currentdate', ModifiedBy = '$userid' WHERE UserID = '$userid'";
                    $update_profile = mysqli_query($connection, $query);
                    $displaypic_path = $displaypic['tmp_name'];
                    $displaypic_desti = '../upload/'.$userid.'/'.$displaypicnewname;
                    move_uploaded_file($displaypic_path, $displaypic_desti);
                    if($update_profile){
                        ?>
                        <script>
                            alert("user profile Updated !!");
                        </script>
                    <?php
                    }
                    else{
                        ?>
                            <script>
                                alert("user profile Updated  faild!!");
                            </script>
                        <?php
                    }
                }
                else{
                    $query = "INSERT INTO userprofile ( UserID, SecondaryEmailAddress, CountryCode, PhoneNumber, ProfilePicture, CreatedDate, CreatedBy, ModifiedDate, ModifiedBy )
                                 VALUES ( '$userid', '$semail', '$countrycode', '$phone', '$displaypicnewname', '$currentdate', '$userid', '$currentdate', '$userid' )";
                    $insert_profile = mysqli_query($connection, $query);
                    $displaypic_path = $displaypic['tmp_name'];
                    
                    $displaypic_desti = '../upload/'.$userid.'/'.$displaypicnewname;
                    move_uploaded_file($displaypic_path, $displaypic_desti);
                    if($insert_profile){
                        ?>
                        <script>
                            alert("user profile Added !!");
                        </script>
                    <?php
                    }
                    else{
                        ?>
                            <script>
                                alert("userprofile added  faild!!");
                            </script>
                        <?php
                    }
                }
            }
            else{
                ?>
                <script>
                    alert("please choose proper file type !! for display picture jpg , jpeg , png !!");
                </script>
                <?php
            }
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Notes Marketplace</title>

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

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/upload.js"></script>
    <script src="js/script.js"></script>

</head>

<body>
    <!-- Navigation -->
    <?php include "includes/header.php" ?> -->
    <!-- End Navigation -->

    <!-- My Profile  -->
    <section id="content">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <!-- My Profile Details -->
            <div class="row heading">
                <div class="col-md-12">
                    <h1 class="heading-1">My Profile</h1>
                </div>
            </div>
            <?php if(!$valid):?>
                <div class="error">
                    <?php foreach($errors as $message):?>
                        <div><?php echo htmlspecialchars($message); ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="row heading">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="InputFirstName">First Name <span>*</span></label>
                        <input type="text" name="fname" class="form-control" id="InputFirstName"
                            placeholder="Enter your first name" value="<?php echo $row['FirstName'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="InputLastName">Last Name <span>*</span></label>
                        <input type="text" name="lname" class="form-control" id="InputLastName"
                            placeholder="Enter your last name" value="<?php echo $row['LastName'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="InputEmail1">Email <span>*</span></label>
                        <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                         placeholder="Enter your email address" value="<?php echo $row['EmailID'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="InputEmail2">Secondary Email</label>
                        <input type="email" name="semail" class="form-control" id="InputEmail2" aria-describedby="emailHelp"
                            placeholder="Enter your email address" value="<?php if($total != 0){echo $up_data['SecondaryEmailAddress']; }?>">
                    </div>

                    <div class="mb-3">
                        <label for="phoneNo">Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <select name="countrycode" class="form-control customDropDown-Multiple">
                                    <option >select</option>
                                    <?php 
                                        $query = "SELECT * FROM countries";
                                        $select_type = mysqli_query($connection,$query);
            
                                        while($row = mysqli_fetch_assoc($select_type )) {
                                        $countrycode = $row['CountryCode'];            
                        
                                        ?>
                                            <option value="<?php echo $countrycode;?>" <?php if($total != 0){if($up_data['CountryCode'] == $countrycode){ echo "selected";}} ?>><?php echo $countrycode; ?></option>
                                        <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                            <input id="phoneNo" type="text" name="phone" maxlength="10" class="form-control" placeholder="Enter your phone number" value="<?php if($total != 0){ echo $up_data['PhoneNumber']; } ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file-image">Profile Picture</label>
                        <div id="file-upload-form" class="uploader form-group">
                            <input name="dispic" id="file-upload"  type="file" name="fileUpload" 
                                accept="image/*" />
                            <label for="file-upload" id="file-drag">
                                <img id="file-image" src="#" alt="Preview" class="hidden">
                                <div id="start">
                                    <img src="../images/upload-file.png" height="46" width="50" />
                                    <div>Upload a picture</div>
                                    <div id="notimage" class="hidden">Please select an image</div>
                                </div>
                                <div id="response" class="hidden">
                                    <div id="messages"></div>
                                    <progress class="progress" id="file-progress" value="0">
                                        <span>0</span>%
                                    </progress>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" style="margin-left: 15px">
                        <button name="save" id="btnSubmit" class="btn">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
    <!-- End My Profile  -->

    <hr class="p-0 m-0">

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    
</body>

</html>