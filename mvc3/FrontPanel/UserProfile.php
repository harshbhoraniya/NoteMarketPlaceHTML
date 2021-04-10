<?php include "../includes/db.php";
ob_start();
session_start();
 ?>
 <?php
    $fname = $_SESSION['FNAME'];
    $lname = $_SESSION['LNAME'];
    $email = $_SESSION['MAILID'];
    $valid = true;
 $errors = array();
 ?>
 <?php
 
 if(isset($_POST['save'])){
     

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

     $dob = date('Y-m-d', strtotime($_POST['dateofbirth']));
     $_SESSION['DOB'] = $dob;
     
     if(empty($_POST['gender'])){
         $valid = false;
         $errors['gender'] = "You must select gender";
     }
     else{
         $gender = mysqli_real_escape_string($connection, $_POST['gender']);
         $_SESSION['GENDER'] = $gender;
     }

     $country_code = mysqli_real_escape_string($connection, $_POST['countrycode']);
     
     $mobile = mysqli_real_escape_string($connection, $_POST['mobileno']);
     
     $profilepic = $_FILES['profilepic'];

     if(empty($_POST['address1'])){
         $valid= false;
         $errors['address1'] = "You must enter address";
     }
     else{
         $address1 = mysqli_real_escape_string($connection, $_POST['address1']);
     }

     $address2 = mysqli_real_escape_string($connection, $_POST['address2']);

     if(empty($_POST['city'])){
         $valid= false;
         $errors['city'] = "You must enter city";
     }
     else{
         $city = mysqli_real_escape_string($connection, $_POST['city']);
     }

     if(empty($_POST['state'])){
         $valid= false;
         $errors['state'] = "You must enter state";
     }
     else{
         $state = mysqli_real_escape_string($connection, $_POST['state']);
     }

     if(empty($_POST['zipcode'])){
         $valid= false;
         $errors['zipcode'] = "You must enter zipcode";
     }
     else{
         $zipcode = mysqli_real_escape_string($connection, $_POST['zipcode']);
     }

     if(empty($_POST['country'])){
         $valid= false;
         $errors['country'] = "You must enter country";
     }
     else{
         $country = mysqli_real_escape_string($connection, $_POST['country']);
     }

     $university = mysqli_real_escape_string($connection, $_POST['university']);

     $college = mysqli_real_escape_string($connection, $_POST['college']);
     
     $currentdatetime = date("Y-m-d H:m:s");

     $userid = $_SESSION['ID'];


     if($valid){
         $profilepicname = $profilepic['name'];
         $profilepic_ext = explode('.',$profilepicname);
         $profilepic_ext_check = strtolower(end($profilepic_ext));
         $valid_profilepic_ext = array('png','jpg','jpeg');
         $profilepicnewname = "pp_".date("dmyhis").'.'.$profilepic_ext_check;

         if(in_array($profilepic_ext_check,$valid_profilepic_ext)){
             $result = mysqli_query($connection, "SELECT UP.`UserProfileID` FROM `userprofile` AS UP WHERE UP.`UserID` = '$userid' AND UP.`IsDeleted` = '0'");
             $row = mysqli_fetch_array($result);
             if($row != 0){
                 $userprofileid = $row['UserProfileID'];
                 $_SESSION['USERPROFILEID'] = $userprofileid;
                 $query = "UPDATE `userprofile` SET `DOB` = '$dob', `Gender` = '$gender', `CountryCode` = '$country_code', `PhoneNumber` = '$mobile', `ProfilePicture` = '$profilepicnewname', `AddressLine1` = '$address1', `AddressLine2` = '$address2', `City` = '$city', `State` = '$state', `Zipcode` = '$zipcode', `Country` = '$country' , `University` = '$university', `College` = '$college', `ModifiedDate` = '$currentdatetime', `ModifiedBy` = '$userid' WHERE `UserProfileID` = '$userprofileid'";
                 $update_profile = mysqli_query($connection, $query);
                 $profilepicpath = $profilepic['tmp_name'];
                 $profilepic_desti = '../upload/'.$userid.'/'.$profilepicnewname;
                 move_uploaded_file($profilepicpath, $profilepic_desti);
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
                 $query = "INSERT INTO `userprofile`(`UserID`, `DOB`, `Gender`, `CountryCode`, `PhoneNumber`, `ProfilePicture`, `AddressLine1`, `AddressLine2`, `City`, `State`, `Zipcode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES ('$userid', '$dob', '$gender', '$country_code', '$mobile', '$profilepicnewname', '$address1', '$address2', '$city', '$state', '$zipcode', '$country', '$university', '$college', '$currentdatetime', '$userid', '$currentdatetime', '$userid')";
                 $insert_profile = mysqli_query($connection, $query);
                 $userprofileid = mysqli_insert_id($connection);
                 $_SESSION['USERPROFILEID'] = $userprofileid;

                 $profilepicpath = $profilepic['tmp_name'];
                 if(!is_dir("../upload/$userid")){
                     mkdir("../upload/".$userid."/",0777,true);
                 }
                 $profilepic_desti = '../upload/'.$userid.'/'.$profilepicnewname;
                 move_uploaded_file($profilepicpath, $profilepic_desti);
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
                     alert("please choose proper file type !! for profile picture jpg , jpeg , png !!");
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
    <title>User Profile | Notes Marketplace</title>

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
        .input-group-prepend {
            margin-right: 10px;
        }
    </style>
    <script type="text/javascript">
        function onlyNumberKey(evt){
            var ASCIIcode = (evt.which) ? evt.which : evt.keyCode
            if(ASCIIcode > 31 %% (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
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
                            User Profile
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Head -->

    <!-- User Profile  -->
    <section class="container">
        <form method="POST" enctype="multipart/form-data">
            <!-- Basic Profile Details -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">Basic Profile Details</h1>
                </div>
            </div>
            <?php if(!$valid):?>
                <div class="error">
                    <?php foreach($errors as $message):?>
                        <div><?php echo htmlspecialchars($message); ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputFirstName">First Name <span>*</span></label>
                        <input name="fname" type="text" class="form-control" id="exampleInputFirstName"
                            placeholder="Enter your first name" value="<?php echo $fname?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputLastName">Last Name <span>*</span></label>
                        <input name="lname" type="text" class="form-control" id="exampleInputLastName"
                            placeholder="Enter your last name" value="<?php echo $lname ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address <span>*</span></label>
                        <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter your email address" value="<?php echo $email ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-date">Date Of Birth</label>
                        <input name="dateofbirth" id="example-date" placeholder="Enter your date of birth" class="form-control"
                            type="date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dropdownGender">Gender <span>*</span></label>
                        <select name="gender" id="dropdownGender" class="form-control">
                            <option>Select your gender</option>
                            <?php 
                                        $query = "SELECT REF.`ReferenceDataID`, REF.`Value` FROM `referencedata` AS REF WHERE REF.`RefCategory` = 'Gender' AND REF.`IsDeleted` = '0'";
                                        $select_gender = mysqli_query($connection,$query);
            
                                        while($row = mysqli_fetch_assoc($select_gender )) {
                                        $ref_id = $row['ReferenceDataID'];
                                        $value = $row['Value'];            
                        
                                        ?>
                                            <option value="<?php echo $ref_id;?>" ><?php echo $value; ?></option>
                                        <?php 
                                        }
                                    ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phoneNo">Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <select name="countrycode" class="form-control customDropDown-Multiple">
                                    <option selected>select</option>
                                    <?php 
                                        $query = "SELECT C.`CountryCode` FROM `countries` AS C WHERE C.`IsDeleted` = '0' ORDER BY C.`CountryCode` ASC";
                                        $select_type = mysqli_query($connection,$query);
            
                                        while($row = mysqli_fetch_assoc($select_type )) {
                                        $countrycode = $row['CountryCode'];            
                        
                                        ?>
                                            <option value="<?php echo $countrycode;?>" ><?php echo $countrycode; ?></option>
                                        <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                            <input name="mobileno" id="phoneNo" type="text" class="form-control" maxlength="10" onkeypress="return onlyNumberKey(event)" placeholder="Enter your phone number">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="file-image">Profile Picture</label>
                    <div id="file-upload-form" class="uploader form-group">
                        <input name="profilepic" id="file-upload" type="file" name="fileUpload" accept="image/*" />
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

            <!-- Address Details -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">Address Details</h1>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="addressline1">Address Line 1 <span>*</span></label>
                            <input name="address1" type="text" class="form-control" id="addressline1" placeholder="Enter your address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="addressline2">Address Line 2</label>
                            <input name="address2" type="text" class="form-control" id="addressline2" placeholder="Enter your address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city">City <span>*</span></label>
                            <input name="city" type="text" class="form-control" id="city" placeholder="Enter your city">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State <span>*</span></label>
                            <input name="state" type="text" class="form-control" id="state" placeholder="Enter your state">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="zipcode">ZipCode <span>*</span></label>
                            <input name="zipcode" type="text" class="form-control" maxlength="6" id="zipcode" placeholder="Enter your zipcode">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dropdownCountry">Country <span>*</span></label>
                            <select name="country" id="dropdownCountry" class="form-control">
                                <option selected>Select your country</option>
                                <?php 
                                    $query = "SELECT C.`Name` FROM `countries` AS C WHERE C.`IsDeleted` = '0' ORDER BY C.`Name` ASC";
                                    $select_country = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($select_country)) {
                                    $countryname = $row['Name'];            
                                
                                    ?>
                                        <option value="<?php echo $countryname;?>" ><?php echo $countryname; ?></option>
                                    <?php 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- University and College Information -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title" style="margin-top: 40px;">University and College Information</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="university">University</label>
                        <input name="university" type="text" class="form-control" id="university" placeholder="Enter your university">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="college">College</label>
                        <input name="college" type="text" class="form-control" id="college" aria-describedby="emailHelp"
                            placeholder="Enter your college">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button href="#" name="save" id="btn-Submit" class="btn">SUBMIT</button>
            </div>
        </form>
    </section>
    <!-- End User Profile   -->

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
