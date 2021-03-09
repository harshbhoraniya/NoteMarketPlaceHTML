<?php include "../includes/db.php"; ?>

<?php 

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
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container p-0">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-md-3 navbar-header">
                        <a class="navbar-brand text-left" href="HomePage.php">
                            <img src="../images/logo.png" alt="logo">
                        </a>
                    </div>

                    <!-- Link -->
                    <div class="text-right col-md-9 collapse navbar-collapse p-0" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="Search.php">Search Notes</a></li>
                            <li class="nav-item"><a class="nav-link active" href="AddNotes.php">Sell Your Notes</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="BuyerRequest.php">Buyer Requests</a></li>
                            <li class="nav-item"><a class="nav-link" href="FAQ.php">FAQ</a></li>
                            <li class="nav-item"><a class="nav-link" href="ContactUs.php">Contact Us</a></li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <img src="../images/reviewer-1.png" width="30" height="30" alt="user-image"
                                            class="d-inline-block align-top avatar-header rounded-circle">
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="MyProfile.php">My Profile</a>
                                        <a class="dropdown-item" href="MyDownload.php">My Download</a>
                                        <a class="dropdown-item" href="MySoldNote.php">My Sold Notes</a>
                                        <a class="dropdown-item" href="MyRejectedNote.php">My Rejected Notes</a>
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
                                <li class="nav-item"><a class="nav-link" href="Search.php">Search Notes</a></li>
                                <li class="nav-item"><a class="nav-link active" href="AddNotes.php">Sell Your Notes</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="BuyerRequest.php">Buyer Requests</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="FAQ.php">FAQ</a></li>
                                <li class="nav-item"><a class="nav-link" href="ContactUs.php">Contact Us</a></li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a href="#collapseExample3" data-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="collapseExample3"
                                            class="nav-link nav-link-custom">
                                            <img src="../images/reviewer-1.png" width="30" height="30" alt="user-image"
                                                class="d-inline-block align-top avatar-header rounded-circle">
                                        </a>

                                        <div id="collapseExample3" class="collapse">
                                            <a class="dropdown-item" href="MyProfile.php">My Profile</a>
                                            <a class="dropdown-item" href="MyDownload.php">My Download</a>
                                            <a class="dropdown-item" href="MySoldNote.php">My Sold Notes</a>
                                            <a class="dropdown-item" href="MyRejectedNote.php">My Rejected Notes</a>
                                            <a class="dropdown-item" href="ChangePassword.php">Change Password</a>
                                            <a class="dropdown-item btn-logout" href="Login.php">LogOut</a>
                                        </div>
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
        <form method="post">
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
                        <input type="text" name="note-title" class="form-control" id="inputTitle" placeholder="Enter your notes title">
                    </div>

                    <label for="file-image">Display Picture</label>
                    <div id="file-upload-form" class="uploader form-group">
                        <input type="file" name="note-picture" id="file" style="visibility: hidden;" accept="image/*"  required>
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

                    <div class="form-group">
                        <label id="type" for="dropdownType">Type</label>
                        <select name="note_type" id="dropdownType" class="form-control">
                            <option selected>Select your category</option>
                        <?php

                            $query = "SELECT * FROM notetype";
                            $select_type = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_type )) {
                            $type_id = $row['NoteTypeID'];
                            $type_name = $row['Name'];            
            
                            echo "<option value='$type_id'>{$type_name}</option>";            
                            }
                        ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dropdownCategory">Category <span>*</span></label>
                        <select name="note-category" id="dropdownCategory" class="form-control">
                            <option selected>Select your category</option>
                            <?php

                            $query = "SELECT * FROM notecategories";
                            $select_category = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_category )) {
                            $category_id = $row['NoteCategoryID'];
                            $category_name = $row['Name'];            
            
                            echo "<option value='$category_id'>{$category_name}</option>";            
                            }
                            ?>
                        </select>
                    </div>

                    <label for="file-image">Upload Notes <span>*</span></label>
                    <div id="file-upload-form" class="uploader form-group">
                        <input type="file" name="note-file[]" id="file" style="visibility: hidden;" accept="application/pdf" multiple required>
                        <label for="file-upload" id="file-drag">
                            <img id="file-image" src="#" alt="Preview" class="hidden">
                            <div id="start">
                                <img src="../images/upload-note.png" height="46" width="50" />
                                <div>Upload your notes</div>
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

                    <div class="form-group">
                        <label id="noOfPages" for="inputNumberofPages">Number of Pages</label>
                        <input type="text" name="numberofpages" class="form-control" id="inputNumberofPages"
                            placeholder="Enter number of note pages">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-0 p-0">
                        <label for="description">Description <span>*</span></label>
                        <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter your description" required></textarea>
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
                        <select name="country" id="dropdownCountry" class="form-control">
                            <option selected>Select your country</option>
                            <?php

                            $query = "SELECT * FROM countries";
                            $select_countries = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_countries )) {
                            $country_id = $row['CountryID'];
                            $country_name = $row['Name'];            
            
                            echo "<option value='$country_name' id='$category_id'>{$country_name}</option>";            
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="institutionname">Institution Name</label>
                        <input type="text" name="institute-name" class="form-control" id="institutionname"
                            placeholder="Enter your institution name">
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
                        <input type="text" name="course-name" class="form-control" id="coursename" placeholder="Enter your course name">
                    </div>
                    <div class="form-group">
                        <label for="proflecturer">Professor / Lecturer</label>
                        <input type="email" name="professor-name" class="form-control" id="proflecturer" aria-describedby="emailHelp"
                            placeholder="Enter your professor name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coursecode">Course Code</label>
                        <input type="email" name="course-code" class="form-control" id="coursecode" aria-describedby="emailHelp"
                            placeholder="Enter your course code">
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
                            <input type="radio" name="free-paid" id="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Free</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="free-paid" id="customRadioInline2" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Paid</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sellPrice">Sell Price</label>
                        <input type="email" name="sell-price" class="form-control" id="sellPrice" aria-describedby="emailHelp"
                            placeholder="Enter your price">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="file-image">Note Preview</label>
                    <div id="file-upload-form" class="uploader form-group">
                        <input id="file-upload" name="note-preview" type="file" name="fileUpload" accept="application/pdf" required />
                        <label for="file-upload" id="file-drag" class="customInput">
                            <img id="file-image" src="#" alt="Preview" class="hidden">
                            <div id="start">
                                <img src="../images/upload-file.png" height="46" width="50" />
                                <div>Upload a file</div>
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

            <div class="row btn-line">
                <div class="form-group">
                    <a href="#" name="save" id="btn-Submit" class="btn">SUBMIT</a>
                </div>

                <div class="form-group">
                    <a href="#" name="publish" id="btn-Publish" class="btn" style="margin-left: 30px;">PUBLISH</a>
                </div>
            </div>
        </form>
    </section>
    <!-- End Add Notes   -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Copyright -->
                <div class="col-md-6 col-sm-8 foot-text text-left">
                    <p>Copyright &copy; TatvaSoft All Rights Reserved.</p>
                </div>
                <!-- Social Icon -->
                <div class="col-md-6 col-sm-4 foot-icon col-sm-4 text-right">
                    <ul class="social-list">
                        <li>
                            <a href="#">
                                <img src="../images/facebook.png" alt="facebook-image">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../images/twitter.png" alt="twitter-image">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../images/linkedin.png" alt="linkedin-image">
                            </a>
                        </li>
                    </ul>
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


<?php

if (isset($_POST['save'])) {

    echo $country_id;

    /*$sellerID = 1 ;
    $Status = 6 ;
    $title = $_POST['note-title'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $noOfPages = (int)$_POST['number-of-pages'];
    $description = $_POST['book-description'];
    $counrty = $_POST['country'];
    $institutionName = $_POST['institute-name'];
    $courseName = $_POST['course-name'];
    $courseCode = $_POST['course-code'];
    $professor = $_POST['pofessor-name'];
    $sellFor = $_POST['free-paid'];
    $sellPrice = (int)$_POST['sell-price'];

    $sellFor = mysqli_query($connection, "SELECT * FROM ReferenceData WHERE Value = '$sellFor' ");
    $sellForResult = mysqli_fetch_assoc($sellFor);
    $isPaid = (int)$sellForResult['ID'];

    $getCountry = mysqli_query($connection, "SELECT * FROM Countries WHERE Name = '$counrty'");
    $getCountryResult = mysqli_fetch_assoc($getCountry);
    $countryID = (int)$getCountryResult['ID'];

    $getType = mysqli_query($connection, "SELECT * FROM NoteTypes WHERE Name = '$type' ");
    $getTypeResult = mysqli_fetch_assoc($getType);
    $typeID = (int)$getTypeResult['ID'];

    $getCategory = mysqli_query($connection, "SELECT * FROM NoteCategories WHERE Name =  '$category' ");
    $getCategoryResult = mysqli_fetch_assoc($getCategory);
    $categoryID = (int)$getCategoryResult['ID'];

    // $queryAddNotes = "INSERT INTO NotesDetails( SellerID , Status , Title , Category , NoteType , NumberofPages , Description ,  Country , Course , CourseCode , Professor , IsPaid , SellingPrice  ) VALUES( $sellerID ,  6 , '$title' , $categoryID   , $typeID  ,  $noOfPages , '$description' , $countryID  , '$courseName' , '$courseCode' , '$professor' , $isPaid , $sellPrice )";
    $queryAddNotes = "INSERT INTO NotesDetails( SellerID , Status , Title , Category , NoteType , NumberofPages , Description ,
     UniversityName , Country , Course , CourseCode , Professor , IsPaid , SellingPrice ) VALUES( $sellerID , 
     $Status , '$title' , $categoryID , $type , $noOfPages , '$description' , '$institutionName' , $countryID ,'$courseName' , 
     '$courseCode' , '$professor' , $isPaid , $sellPrice )";
    $queryAddNotesResult = mysqli_query($connection,  $queryAddNotes);

    if ($queryAddNotesResult) {

        $addedNote = mysqli_insert_id($connection);
        $pathToCreateNoteFolder = "../members/" . $sellerID . "/" . $addedNote . "/";
        mkdir($pathToCreateNoteFolder, $mode = 0777, $recursive = false, $context = null);
        $FolderNotesAttachments = $pathToCreateNoteFolder . "Attachements/";
        mkdir($pathToCreateNoteFolderNotesAttachments, $mode = 0777, $recursive = false, $context = null);
 
    // file To upload 
    $dateTime  = new DateTime();
    $timeStamp = $dateTime->getTimestamp();

    // Book Image
    if (isset($_FILES['book-image'])) {

        $book_image  = $_FILES['book-image']['tmp_name'];
        $book_path = $pathToCreateNoteFolder . "DP_" . $timeStamp;
        $bookImageUploades = move_uploaded_file($book_image, $book_path);
        if ($bookImageUploades) {
            mysqli_query($connection, "UPDATE NotesDetails SET DisplayPicture = '$book_path' WHERE ID =  $addedNote");
        }
    }

    //Book Preview
    if (isset($_FILES['notes-preview'])) {

        $bookPreview = $_FILES['notes-preview']['tmp_name'];
        $preview_path = $pathToCreateNoteFolder . "Preview_" . $timeStamp;
        $notePreviewUploaded =  move_uploaded_file($bookPreview, $preview_path);

        if ($notePreviewUploaded) {
            mysqli_query($connection, "UPDATE NotesDetails SET NotesPreview = '$preview_path' WHERE ID =  $addedNote");
        }
    }

    //Book PDF
    if (isset($_FILES['note-file'])) {

        $book_file = $_FILES['note-file']['tmp_name'];
        $fileNumber = count($book_file);

        for ($i = 0; $i < $fileNumber; $i++) {

            $result = mysqli_query($connection, "SELECT MAX('ID') FROM NotesAttachments ");
            $row = mysqli_fetch_row($result);
            $highest_id = $row[0];
            $currentID = (int)$highest_id + 1;

            $fileName = $_FILES['note-file']['name'][$i];
            $fileTempName = $_FILES['note-file']['tmp_name'][$i];

            $file_path = $FolderNotesAttachments . $currentID . "_" . $timeStamp;


            $fileUploaded = move_uploaded_file($fileTempName, $file_path);

            if ($fileUploaded) {
                mysqli_query($connection, "INSERT INTO NotesAttachments( ID , NoteID , FileName , FilePath ) VALUES( $currentID , $addedNote , '$fileName' , '$file_path' )");
            }
        }
    }

} else {
    echo "Not Inserted";
}*/

}

?>