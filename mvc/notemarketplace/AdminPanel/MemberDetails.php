<?php include "../includes/db.php";
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details | Notes Marketplace</title>

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

    <!-- Content -->
    <section id="content">
        <div class="container">
            <form>
                <div class="row heading">
                    <div class="col-md-12 p-0">
                        <h3 class="heading-1">Member Details</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <img src="../images/member.png" alt="member-image">
                    </div>
                    <div class="col-md-5 col-sm-4">
                        <div class="row">
                            <div class="col-md-5 td-1">
                                First Name:
                            </div>
                            <div class="col-md-7 td-3">
                                Harsh
                            </div>
                            <div class="col-md-5 td-1">
                                Last Name:
                            </div>
                            <div class="col-md-7 td-3">
                                Bhoraniya
                            </div>
                            <div class="col-md-5 td-1">
                                Email:
                            </div>
                            <div class="col-md-7 td-3">
                                harshbhoraniya@gmail.com
                            </div>
                            <div class="col-md-5 td-1">
                                DOB:
                            </div>
                            <div class="col-md-7 td-3">
                                01-11-1999
                            </div>
                            <div class="col-md-5 td-1">
                                Phone Number:
                            </div>
                            <div class="col-md-7 td-3">
                                1234567890
                            </div>
                            <div class="col-md-5  td-1">
                                College/University:
                            </div>
                            <div class="col-md-7 td-3">
                                University of California
                            </div>
                        </div>
                    </div>
                    <span class="vertical-line"></span>
                    <div class="col-md-4 col-sm-4">
                        <div class="row">
                            <div class="col-md-5 td-1">
                                Address 1:
                            </div>
                            <div class="col-md-7 td-3">
                                144-Diamond Height
                            </div>
                            <div class="col-md-5 td-1">
                                Address 2:
                            </div>
                            <div class="col-md-7 td-3">
                                Star Colony
                            </div>
                            <div class="col-md-5 td-1">
                                City:
                            </div>
                            <div class="col-md-7 td-3">
                                New York
                            </div>
                            <div class="col-md-5 td-1">
                                State:
                            </div>
                            <div class="col-md-7 td-3">
                                New York State
                            </div>
                            <div class="col-md-5 td-1">
                                Country:
                            </div>
                            <div class="col-md-7 td-3">
                                United State
                            </div>
                            <div class="col-md-5  td-1">
                                Zip Code:
                            </div>
                            <div class="col-md-7 td-3">
                                11004-05
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row heading">
                    <div class="col-md-12 p-0">
                        <h3 class="heading-1">Notes</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="table-top table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Sr No.</th>
                                    <th scope="col">Note Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Downloaded Notes</th>
                                    <th scope="col" class="text-center">Total Earnings</th>
                                    <th scope="col">Date Added</th>
                                    <th scope="col">Published Date</th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row" class="text-center">1</td>
                                    <td class="td-text">Software Development</td>
                                    <td>IT</td>
                                    <td>Published</td>
                                    <td class="text-center td-text">22</td>
                                    <td class="text-center">$177</td>
                                    <td>09-10-2020, 10:10</td>
                                    <td>09-10-2020, 10:10</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center">2</td>
                                    <td class="td-text">Computer Basic</td>
                                    <td>Computer</td>
                                    <td>Published</td>
                                    <td class="text-center td-text">4</td>
                                    <td class="text-center">$125</td>
                                    <td>10-10-2020, 11:25</td>
                                    <td>10-10-2020, 11:25</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center">3</td>
                                    <td class="td-text">Human Body</td>
                                    <td>Science</td>
                                    <td>InReview</td>
                                    <td class="text-center td-text">17</td>
                                    <td class="text-center">$978</td>
                                    <td>09-10-2020, 10:10</td>
                                    <td>09-10-2020, 10:10</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center">4</td>
                                    <td class="td-text">World War 2</td>
                                    <td>History</td>
                                    <td>Published</td>
                                    <td class="text-center td-text">28</td>
                                    <td class="text-center">$15254</td>
                                    <td>09-10-2020, 10:10</td>
                                    <td>09-10-2020, 10:10</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center">5</td>
                                    <td class="td-text">Accounting</td>
                                    <td>Account</td>
                                    <td>Published</td>
                                    <td class="text-center td-text">0</td>
                                    <td class="text-center">$69</td>
                                    <td>09-10-2020, 10:10</td>
                                    <td>09-10-2020, 10:10</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
            </form>
        </div>
    </section>
    <!-- End Content -->

    <hr class="p-0 m-0">

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="js/jquery.js"></script>

    <!-- Popper Js -->
    <script src="js/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>

</html>