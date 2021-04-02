<?php include "../includes/db.php" ?>
<?php ob_start(); session_start(); ?>

<?php 
    if(!isset($_SESSION['ID'])){
        ?>
        <script>
            location.replace('../FrontPanel/Login.php');
        </script>
        <?php
    }
    $userid = $_SESSION['ID'];
    $query = "SELECT * FROM user WHERE UserID = $userid";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if(isset($_POST['save'])){
        $userid = $_SESSION['ID'];
        $fname = mysqli_real_escape_string($connection, $_POST['fname']);
        $_SESSION['FNAME'] = $fname;

        $lname = mysqli_real_escape_string($connection, $_POST['lname']);
        $_SESSION['LNAME'] = $lname;

        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $_SESSION['MAILID'] = $email;

        $semail = mysqli_real_escape_string($connection, $_POST['semail']);
        $countrycode = mysqli_real_escape_string($connection, $_POST['countrycode']);
        $mobile = mysqli_real_escape_string($connection, $_POST['mobileno']);

        $userpic = $_FILES['dispic'];

        $displaypic = $userpic['name'];
        $displaypic_ext = explode('.',$displaypic);
        $displaypic_ext_check = strtolower(end($displaypic_ext));
        $valid_displaypic_ext = array('png','jpg','jpeg');
        $displaypicnewname = "bp_".date("dmyhis").'.'.$displaypic_ext_check;

        if(in_array($displaypic_ext_check,$valid_displaypic_ext)){
            

        }
        else{
            ?>
            <script>
                alert("please choose proper file type !! for display picture jpg , jpeg , png !!");
            </script>
            <?php
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

</head>

<body>
    <!-- Navigation -->
    <?php include "includes/header.php"; ?>
    <!-- End Navigation -->

    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!-- My Profile  -->
    <section id="content">
        <div class="container">
            <!-- My Profile Details -->
            <div class="row heading">
                <div class="col-md-12">
                    <h1 class="heading-1">My Profile</h1>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data">
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
                            placeholder="Enter your email address">
                    </div>

                    <div class="mb-3">
                        <label for="phoneNo">Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <select name="countrycode" class="form-control customDropDown-Multiple">
                                    <option selected>Select</option>
                                    <?php 
                                        $query = "SELECT * FROM countries";
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
                            <input id="phoneNo" name="mobileno" type="text" class="form-control" placeholder="Enter your phone number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file-image">Profile Picture</label>
                        <div id="file-upload-form" class="uploader form-group">
                            <input id="file-upload" name="dispic" type="file" name="fileUpload" class="form-control"
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
                        <button href="#" name="save" id="btn-Submit" class="btn">SUBMIT</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
    <!-- End My Profile  -->

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