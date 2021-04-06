<?php include "../includes/db.php";
ob_start();
session_start();
    if(isset($_GET['id'])){
        $admin_id = $_GET['id'];
    }
    $user_id = $_SESSION['ID'];
?>
<?php
    if(!empty($admin_id)){
        $query = "SELECT U.`UserID`, U.`FirstName`, U.`LastName`, U.`EmailID`, UP.`CountryCode`, UP.`PhoneNumber` FROM `userprofile` AS UP 
        INNER JOIN `user` AS U on U.`UserID` = UP.`UserProfileID`
            WHERE U.`IsDeleted` = '0' AND U.`UserID` = '$admin_id'";
        $selecy_country = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($selecy_country);
    }
?>
<?php 
$process = "";
    if(empty($admin_id)){ 
        $process = "add";
    }else{ 
        $process = "edit";
    }
$valid = true;
$errors = array();

    if(isset($_POST['save'])){
        if(empty($_POST['firstname'])){
            $valid = false;
            $errors['firstname'] = "You must enter your first name";
        }
        else{
            $fname = mysqli_real_escape_string($connection, $_POST['firstname']);
            $_SESSION['FNAME'] = $fname;
        }

        if(empty($_POST['lastname'])){
            $valid = false;
            $errors['lastname'] = "You must enter your last name";
        }
        else{
            $lname = mysqli_real_escape_string($connection, $_POST['lastname']);
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

        if(empty($_POST['phoneno'])){
            $valid = false;
            $errors['phoneno'] = "You must enter your phone number";
        }
        else{
            $phone = mysqli_real_escape_string($connection, $_POST['phoneno']);
        }
        $country_code = $_POST['countrycode'];
        $currentdate = date("Y-m-d H:m:s");

        if($valid){
            
            if($process == 'edit'){
                
                $query = "UPDATE `user` SET `FirstName` = '$fname', `LastName` = '$lname', `EmailID` = '$email', ModifiedDate = '$currentdate', ModifiedBy = '$user_id' WHERE `UserID` = '$admin_id';";
                $update_admin = mysqli_query($connection, $query);
                $query1 = "UPDATE `userprofile` SET `CountryCode` = '$country_code', `PhoneNumber` = '$phone', ModifiedDate = '$currentdate', ModifiedBy = '$user_id' WHERE `UserID` = '$admin_id'";
                $update_profile = mysqli_query($connection, $query1);
                if($update_admin && $update_profile){
                    ?>
                        <script>
                            alert("Admin updated !!");
                            location.replace('../AdminPanel/ManageAdministrator.php');
                        </script>
                    <?php
                }
                else{
                    ?>
                        <script>
                            alert("Admin updated faild!!");
                        </script>
                    <?php
                }
            }
            else{
                $token = openssl_random_pseudo_bytes(16);
                //Convert the binary data into hexadecimal representation.
                $token = bin2hex($token);
                $query = "INSERT INTO `user` (`RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `IsEmailVerified`, `Token`, `CreatedDate`, `CreatedBY`, `ModifiedDate`, `ModifiedBy`, `IsActive`, `IsDeleted`) 
                                VALUES ( '2', '$fname', '$lname', '$email', 'admin123', '1', '$token', '$currentdate', '$user_id', '$currentdate', '$user_id', '1', '0' ) ";
                //$insert_admin = mysqli_query($connection, $query);
                $added_admin_id = mysqli_insert_id($connection);
                
                $query1 = "INSERT  INTO `userprofile` ( `UserID`, `CountryCode`, `PhoneNumber`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) 
                            VALUES ( '$added_admin_id', '$country_code', '$phone', '$currentdate', '$user_id', '$currentdate', '$user_id' )";
                $inser_profile = mysqli_query($connection, $query1);
                echo json_encode($query1);
                if($insert_admin && $inser_profile){
                    ?>
                        <script>
                            alert("Admin updated !!");
                            location.replace('../AdminPanel/ManageAdministrator.php');
                        </script>
                    <?php
                }
                else{
                    ?>
                        <script>
                            alert("Admin updated faild!!");
                        </script>
                    <?php
                }
            }
        }
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">

    <title><?php if(empty($admin_id)){ echo "Add ";} else{ echo "Edit ";} ?>Administrator | Notes Marketplace</title>

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
    <?php include "includes/header.php"; ?>
    <!-- End Navigation -->

    <!-- Add Administrator  -->
    <section id="content">
        <div class="container">
            <form method="POST">
                <!-- Add Administrator Details -->
                <div id="admin-heading" class="row heading">
                    <div class="col-md-12">
                        <h3 class="heading-1"><?php if(empty($admin_id)){ echo "Add ";} else{ echo "Edit ";} ?>Administrator</h3>
                    </div>
                </div>
                <?php if(!$valid):?>
                <div class="error" style="color: red;">
                    <?php foreach($errors as $message):?>
                        <div><?php echo htmlspecialchars($message); ?></div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <div class="row heading">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="InputFirstName">First Name <span>*</span></label>
                            <input type="text" name="firstname" class="form-control" id="InputFirstName" 
                                placeholder="Enter your first name" value="<?php if(!empty($admin_id)){ echo $row['FirstName'];} ?>">
                        </div>

                        <div class="form-group">
                            <label for="InputLastName">Last Name <span>*</span></label>
                            <input type="text" name="lastname" class="form-control" id="InputLastName"
                                placeholder="Enter your last name" value="<?php if(!empty($admin_id)){ echo $row['LastName'];} ?>">
                        </div>

                        <div class="form-group">
                            <label for="InputEmail1">Email <span>*</span></label>
                            <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter your email address" value="<?php if(!empty($admin_id)){ echo $row['EmailID'];} ?>">
                        </div>

                        <div class="mb-3">
                            <label for="phoneNo">Phone Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select name="countrycode" class="form-control customDropDown-Multiple">
                                        <option>select</option>
                                        <?php 
                                        $query = "SELECT C.`CountryCode` FROM `countries` AS C WHERE C.`IsDeleted` = '0' ORDER BY C.`CountryCode` ASC";
                                        $select_type = mysqli_query($connection,$query);
                                        $country_code = $row['CountryCode'];
                                        while($coa = mysqli_fetch_assoc($select_type )) {
                                        $countrycode = $coa['CountryCode'];            
                                        
                                        ?>
                                            <option value="<?php echo $countrycode;?>" <?php if($country_code == $countrycode){ echo "selected";}  ?>><?php echo $countrycode; ?></option>
                                        <?php 
                                        }
                                    ?>
                                    </select>
                                </div>
                                <input id="phoneNo" name="phoneno" type="text" class="form-control"
                                    placeholder="Enter your phone number" value="<?php if(!empty($admin_id)){ echo $row['PhoneNumber'];} ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="margin-left: 15px">
                            <button  name="save" id="btnSubmit" class="btn">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Add Administrator  -->

    <hr class="p-0 m-0">

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