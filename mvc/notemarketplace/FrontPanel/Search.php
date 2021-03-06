<?php include "../includes/db.php"; 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | Notes Marketplace</title>

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
                            <li class="nav-item"><a class="nav-link active" href="Search.php">Search Notes</a></li>
                            <li class="nav-item"><a class="nav-link" href="AddNotes.php">Sell Your Notes</a>
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
                                <li class="nav-item"><a class="nav-link active" href="Search.php">Search Notes</a></li>
                                <li class="nav-item"><a class="nav-link" href="AddNotes.php">Sell Your Notes</a>
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
                            Search Notes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Head -->

    <!-- Search  -->
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title">Search and Filter notes</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-6">
                        <select class="form-control">
                            <option>Select type</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select class="form-control">
                            <option>Select category</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select class="form-control">
                            <option>Select university</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select class="form-control">
                            <option>Select course</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select class="form-control">
                            <option>Select country</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select class="form-control">
                            <option>Select rating</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php

        $query = "SELECT * FROM sellernotes";
        $select_all_post_query = mysqli_query($connection,$query);
        $count = 0;

        while($row = mysqli_fetch_assoc($select_all_post_query)){
        $count = $count + 1;
        }
            
    ?>
                <h1 class="title">Total <?php echo $count?> Notes</h1>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3">

            <?php

                $query = "SELECT * FROM sellernotes";
                $select_all_notes_query = mysqli_query($connection,$query);
                $count = 0;

                while($row = mysqli_fetch_assoc($select_all_notes_query)){
                    $id = $row['SellerNoteID'];
                    $note_title = $row['Title'];
                    $note_university = $row['UniversityName'];
                    $note_page = $row['NumberofPages'];
                    $note_image = $row['DisplayPicture'];
                    $note_publisheddate = $row['PublishedDate'];
                    $count = $count + 1;
                    
                ?>

            
            <div class="col mb-4">
                <div class="card">
                    <a href="http://localhost:8080/notemarketplace/frontPanel/Notedetails.php?id=<?php echo $id?>">
                    <img src="../uplodes/<?php echo $note_image ?>" class="card-img-top" alt="note-image">
                    </a>
                    <div class="card-body">
                        <div class="card-title"><?php echo $note_title ?></div>
                        <div class="card-text">
                            <div class="card-content">
                                <span class="icon-images">
                                    <img src="../images/university.png" alt="images">
                                </span>
                                <span class="span-content">
                                    <?php echo $note_university?>
                                </span>
                            </div>
                            <div class="card-content">
                                <span class="icon-images">
                                    <img src="../images/pages.png" alt="images">
                                </span>
                                <span class="span-content">
                                    <?php echo $note_page ?>
                                </span>
                            </div>
                            <div class="card-content">
                                <span class="icon-images">
                                    <img src="../images/date.png" alt="images">
                                </span>
                                <span class="span-content">
                                    <?php echo $note_publisheddate ?>
                                </span>
                            </div>
                            <div class="card-content">
                                <span class="icon-images">
                                    <img src="../images/flag.png" alt="images">
                                </span>
                                <span class="span-content text-danger">
                                    5 Users marked this note as inappropriate
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        100 reviews
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>

        <div class="row text-center">
            <div class="col-md-12 num">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <img src="../images/left-arrow.png" alt="left-arrow">
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <img src="../images/right-arrow.png" alt="right-arrow">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </section>
    <!-- End Search   -->

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
    <script src="js/script.js"></script>
</body>

</html>