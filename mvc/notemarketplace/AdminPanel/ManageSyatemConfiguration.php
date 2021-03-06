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
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container p-0">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-md-4 navbar-header">
                        <a class="navbar-brand text-left" href="Dashboard.php">
                            <img src="../images/logo.png" alt="logo">
                        </a>
                    </div>

                    <!-- Link -->
                    <div class="text-right col-md-8 collapse navbar-collapse p-0" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="Dashboard.php">Dashboard</a></li>
                            <li class="nav-item dropdown">
                                <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" class="nav-link nav-link-custom">
                                    Notes
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="NoteUnderReview.php">Notes Under Review</a>
                                    <a class="dropdown-item" href="PublishedNote.php">Published Notes</a>
                                    <a class="dropdown-item" href="DownloadedNote.php">Downloaded Notes</a>
                                    <a class="dropdown-item" href="RejectedNote.php">Rejected Notes</a>

                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="Members.php">Members</a></li>
                            <li class="nav-item"><a class="nav-link" href="SpamReports.php">Reports</a></li>
                            <li class="nav-item dropdown">
                                <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" class="nav-link nav-link-custom">
                                    Setting
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item  active" href="ManageSyatemConfiguration.php">Manage System
                                        Configuration</a>
                                    <a class="dropdown-item" href="ManageAdministrator.php">Manage Administrator</a>
                                    <a class="dropdown-item" href="ManageCategory.php">Manage Category</a>
                                    <a class="dropdown-item" href="ManageType.php">Manage Type</a>
                                    <a class="dropdown-item" href="ManageCountry.php">Manage Countries</a>

                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <img src="../images/reviewer-1.png" width="30" height="30" alt="user-image"
                                            class="d-inline-block align-top avatar-header rounded-circle">
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="MyProfile.php">Update Profile</a>
                                        <a class="dropdown-item" href="ChangePassword.php">Change Password</a>
                                        <a class="dropdown-item btn-logout" href="Login.php">LogOut</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="Login.php">LogOut</a></li>
                        </ul>
                    </div>

                    <!-- Mobile link -->
                    <div class="mobile-nav col-md-8 text-right">
                        <img src="../images/menu.png" alt="menu" id="mobile-nav-open-btn" class="text-right">
                    </div>

                    <div id="mobile-nav" class="text-left">
                        <span id="mobile-nav-close-btn">
                            <img src="../images/xmark.png" alt="close-image">
                        </span>
                        <div id="mobile-nav-content">
                            <ul class="nav navig">
                                <li class="nav-item"><a class="nav-link " href="Dashboard.php">Dashboard</a></li>
                                <li class="nav-item">
                                    <a href="#collapseExample1" data-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="collapseExample1"
                                        class="nav-link nav-link-custom">
                                        Notes
                                    </a>

                                    <div id="collapseExample1" class="collapse">
                                        <a class="dropdown-item" href="NoteUnderReview.php">Notes Under Review</a>
                                        <a class="dropdown-item" href="PublishedNote.php">Published Notes</a>
                                        <a class="dropdown-item" href="DownloadedNote.php">Downloaded Notes</a>
                                        <a class="dropdown-item" href="RejectedNote.php">Rejected Notes</a>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="Members.php">Members</a></li>
                                <li class="nav-item"><a class="nav-link" href="SpamReports.php">Reports</a></li>
                                <li class="nav-item">
                                    <a href="#collapseExample2" data-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="collapseExample2"
                                        class="nav-link nav-link-custom">
                                        Setting
                                    </a>

                                    <div id="collapseExample2" class="collapse">
                                        <a class="dropdown-item  active" href="ManageSyatemConfiguration.php">Manage System
                                            Configuration</a>
                                        <a class="dropdown-item" href="ManageAdministrator.php">Manage
                                            Administrator</a>
                                        <a class="dropdown-item" href="ManageCategory.php">Manage Category</a>
                                        <a class="dropdown-item" href="ManageType.php">Manage Type</a>
                                        <a class="dropdown-item" href="ManageCountry.php">Manage Countries</a>

                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#collapseExample3" data-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="collapseExample3"
                                        class="nav-link nav-link-custom">
                                        <img src="../images/reviewer-1.png" width="30" height="30" alt="user-image"
                                            class="d-inline-block align-top avatar-header rounded-circle">
                                    </a>

                                    <div id="collapseExample3" class="collapse">
                                        <a class="dropdown-item" href="MyProfile.php">Update Profile</a>
                                        <a class="dropdown-item" href="ChangePassword.php">Change Password</a>
                                        <a class="dropdown-item btn-logout" href="Login.php">LogOut</a>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="Login.php">LogOut</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
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
    <footer>
        <div class="container">
            <div class="row">
                <!-- Copyright -->
                <div class="col-md-6 col-sm-2 foot-text text-left">
                    <p>Version : 1.1.24</p>
                </div>
                <!-- Social Icon -->
                <div class="col-md-6 col-sm-10 foot-text col-sm-4 text-right">
                    <p>Copyright &copy; TatvaSoft All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
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