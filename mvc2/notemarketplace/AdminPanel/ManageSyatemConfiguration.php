<?php include "../includes/db.php";
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Syatem Configuration | Notes Marketplace</title>

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

    <!-- Manage System Configuration  -->
    <section id="content">
        <div class="container">
            <form>
                <!-- Manage System Configuration Details -->
                <div class="row heading">
                    <div class="col-md-12">
                        <h1 class="heading-1">Manage Syatem Configuration</h1>
                    </div>
                </div>
                <div class="row heading">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="InputFirstName">Support email address <span>*</span></label>
                            <input type="text" class="form-control" id="InputFirstName" value="Harsh"
                                placeholder="Enter support email address">
                        </div>

                        <div class="form-group">
                            <label for="InputLastName">Support phone number <span>*</span></label>
                            <input type="text" class="form-control" id="InputLastName" placeholder="Enter phone number">
                        </div>

                        <div class="form-group">
                            <label for="InputEmail1">Email Address(es) (for various events system will send
                                notifications to
                                these users) <span>*</span></label>
                            <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter email address">
                        </div>

                        <div class="form-group">
                            <label for="InputFacebookURL">Facebook URL</label>
                            <input type="text" class="form-control" id="InputFacebookURL"
                                placeholder="Enter facebook url">
                        </div>

                        <div class="form-group">
                            <label for="InputTwitterURL">Twitter URL</label>
                            <input type="text" class="form-control" id="InputTwitterURL"
                                placeholder="Enter Twitter url">
                        </div>

                        <div class="form-group">
                            <label for="InputLinkedinURL">Linkedin URL</label>
                            <input type="text" class="form-control" id="InputLinkedinURL"
                                placeholder="Enter Linkedin url">
                        </div>

                        <div class="form-group">
                            <label for="file-image">Default image for notes (if seller do not upload)</label>
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

                        <div class="form-group">
                            <label for="file-image">Default profile picture (if seller do not upload)</label>
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
            </form>
        </div>
    </section>
    <!-- End Manage System Configuration  -->

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