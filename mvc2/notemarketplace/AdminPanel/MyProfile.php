<?php include "../includes/db.php";
ob_start();
session_start();
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

    <!-- My Profile  -->
    <section id="content">
        <div class="container">
            <!-- My Profile Details -->
            <div class="row heading">
                <div class="col-md-12">
                    <h1 class="heading-1">My Profile</h1>
                </div>
            </div>
            <div class="row heading">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="InputFirstName">First Name <span>*</span></label>
                        <input type="text" class="form-control" id="InputFirstName" value="Harsh"
                            placeholder="Enter your first name">
                    </div>

                    <div class="form-group">
                        <label for="InputLastName">Last Name <span>*</span></label>
                        <input type="text" class="form-control" id="InputLastName" value="Bhoraniya"
                            placeholder="Enter your last name">
                    </div>

                    <div class="form-group">
                        <label for="InputEmail1">Email <span>*</span></label>
                        <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                            value="harshbhoraniya@gmail.com" placeholder="Enter your email address">
                    </div>

                    <div class="form-group">
                        <label for="InputEmail2">Secondary Email</label>
                        <input type="email" class="form-control" id="InputEmail2" aria-describedby="emailHelp"
                            placeholder="Enter your email address">
                    </div>

                    <div class="mb-3">
                        <label for="phoneNo">Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <select class="form-control customDropDown-Multiple">
                                    <option selected>+91</option>
                                    <option>+92</option>
                                    <option>+93</option>
                                    <option>+94</option>
                                </select>
                            </div>
                            <input id="phoneNo" type="text" class="form-control" placeholder="Enter your phone number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file-image">Profile Picture</label>
                        <div id="file-upload-form" class="uploader form-group">
                            <input id="file-upload" type="file" name="fileUpload" class="form-control"
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
                        <a href="#" id="btnSubmit" class="btn">SUBMIT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End My Profile  -->

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
    <script src="js/upload.js"></script>
    <script src="js/script.js"></script>
</body>

</html>