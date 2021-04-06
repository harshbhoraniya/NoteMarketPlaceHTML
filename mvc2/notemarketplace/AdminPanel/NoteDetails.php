<?php include "../includes/db.php";
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Details | Notes Marketplace</title>

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

    <style>
        /* note detail modal*/

        .modal-body {
            padding: 0 55px 0 40px;
        }

        .modal {
            margin-top: 55px;
        }

        .popup-close-btn {
            padding: 10px 10px 0 0;
        }

        .modal-body img {
            height: auto;
            margin: auto;
            text-align: center;
            left: 50%;
            position: relative;
            transform: translateX(-50%);
            width: 63px;
            height: 63px;
        }

        .modal-body h2 {
            font-size: 26px;
            font-weight: 600;
            line-height: 30px;
            color: #6255a5;
            padding-top: 10px;
            padding-bottom: 20px;
        }

        .modal-body p {
            font-size: 16px;
            font-weight: 400;
            line-height: 22px;
            color: #333333;
            padding-bottom: 5px;
        }

        .modal-body h5 {
            font-size: 18px;
            font-weight: 600;
            line-height: 22px;
            color: #333333;
        }

        .delete-image {
            width: 20px !important;
            height: 20px !important;
            border-radius: 0 !important;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include "includes/header.php"; ?>
    <!-- End Navigation -->

    <!-- note detail section-->
    <section id="note-detail">
        <div class="content-box">
            <div class="container">
                <div class="row">
                    <!-- note details left -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <!-- Note details image -->
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
                                <div class="note-detail-img">
                                    <h4>Notes Details</h4>
                                    <img src="../images/computer-science.png" alt="image of note">
                                </div>
                            </div>

                            <!-- details of notes -->
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
                                <div class="note-info">
                                    <h4>Computer Science</h4>
                                    <h6>Sciences</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque iste autem,
                                        dolorem nemo a impedit fugiat alias tempore reprehenderit officia, eum necessit.
                                    </p>

                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                        data-target="#exampleModalScrollable">DOWNLOAD/$15
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- note details right -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="note-details">
                            <ul class="note-full-detail">
                                <li>institution:<span>University of California</span></li>
                                <li>Country:<span>United State</span></li>
                                <li>Course Name<span>Computer Engineering</span></li>
                                <li>Course Code:<span>248705</span></li>
                                <li>Professor:<span>Mr.Richard Brown</span></li>
                                <li>Number of Pages:<span>277</span></li>
                                <li>Approved Date:<span>November 25 2020</span></li>
                                <li>Rating:<span>
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
                                        </div>100 Reviews
                                    </span>
                                </li>
                                <li>5 Users make this note as inappropriate</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end note detail section-->

    <div class="container">
        <hr class="p-0 m-0">
    </div>

    <!-- note-preview section-->
    <section id="note-detail-preview">
        <div class="content-box">
            <div class="container">
                <div class="row">
                    <!-- note review left-->
                    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                        <div class="note-preview">
                            <h4>Note Preview</h4>
                            <iframe src="../images/sample.pdf"></iframe>
                        </div>
                    </div>

                    <!-- note review right -->
                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                        <div id="customer-review">
                            <h4>Customer Reviews</h4>
                            <div class="reviews">
                                <!-- customer review 1 -->
                                <div class="row">
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <img src="../images/reviewer-1.png" alt="customer1">
                                    </div>

                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 review-details">
                                        <ul class="customer-review-ul">
                                            <li>
                                                <h6>Richard Brown</h6>
                                                <img src="../images/delete.png" alt="" class="float-right delete-image">
                                            </li>
                                            <li>
                                                <div class="d-inline-block">
                                                    <div class="rate">
                                                        <input type="radio" id="star5.1" name="rate" value="5" />
                                                        <label for="star5.1" title="text" class="m-0"
                                                            style="padding-bottom: 10px">5 stars</label>
                                                        <input type="radio" id="star4.1" name="rate" value="4" />
                                                        <label for="star4.1" title="text" class="m-0"
                                                            style="padding-bottom: 10px">4 stars</label>
                                                        <input type="radio" id="star3.1" name="rate" value="3" />
                                                        <label for="star3.1" title="text" class="m-0"
                                                            style="padding-bottom: 10px">3 stars</label>
                                                        <input type="radio" id="star2.1" name="rate" value="2" />
                                                        <label for="star2.1" title="text" class="m-0"
                                                            style="padding-bottom: 10px">2 stars</label>
                                                        <input type="radio" id="star1.1" name="rate" value="1" />
                                                        <label for="star1.1" title="text" class="m-0"
                                                            style="padding-bottom: 10px">1 star</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt
                                                    deserunt odio consectetur.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>

                                <!-- customer review 2 -->
                                <div class="row">
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <img src="../images/reviewer-2.png" alt="customer2">
                                    </div>
                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 review-details">
                                        <ul class="customer-review-ul">
                                            <li>
                                                <h6>Alice Ortiaz</h6>
                                                <img src="../images/delete.png" alt="" class="float-right delete-image">
                                            </li>
                                            <li>
                                                <div class="d-inline-block">
                                                    <div class="rate">
                                                        <input type="radio" id="star5.2" name="rate" value="5" />
                                                        <label for="star5.2" title="text" class="m-0"
                                                            style="padding-bottom: 10px">5 stars</label>
                                                        <input type="radio" id="star4.2" name="rate" value="4" />
                                                        <label for="star4.2" title="text" class="m-0"
                                                            style="padding-bottom: 10px">4 stars</label>
                                                        <input type="radio" id="star3.2" name="rate" value="3" />
                                                        <label for="star3.2" title="text" class="m-0"
                                                            style="padding-bottom: 10px">3 stars</label>
                                                        <input type="radio" id="star2.2" name="rate" value="2" />
                                                        <label for="star2.2" title="text" class="m-0"
                                                            style="padding-bottom: 10px">2 stars</label>
                                                        <input type="radio" id="star1.2" name="rate" value="1" />
                                                        <label for="star1.2" title="text" class="m-0"
                                                            style="padding-bottom: 10px">1 star</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt
                                                    deserunt odio consectetur.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>

                                <!-- customer review 3 -->
                                <div class="row">
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <img src="../images/reviewer-3.png" alt="customer3">
                                    </div>
                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 review-details">
                                        <ul class="customer-review-ul">
                                            <li>
                                                <h6>Sara Passmore</h6>
                                                <img src="../images/delete.png" alt="" class="float-right delete-image">
                                            </li>
                                            <li>
                                                <div class="d-inline-block">
                                                    <div class="rate">
                                                        <input type="radio" id="star5.3" name="rate" value="5" />
                                                        <label for="star5.3" title="text" class="m-0"
                                                            style="padding-bottom: 10px">5 stars</label>
                                                        <input type="radio" id="star4.3" name="rate" value="4" />
                                                        <label for="star4.3" title="text" class="m-0"
                                                            style="padding-bottom: 10px">4 stars</label>
                                                        <input type="radio" id="star3.3" name="rate" value="3" />
                                                        <label for="star3.3" title="text" class="m-0"
                                                            style="padding-bottom: 10px">3 stars</label>
                                                        <input type="radio" id="star2.3" name="rate" value="2" />
                                                        <label for="star2.3" title="text" class="m-0"
                                                            style="padding-bottom: 10px">2 stars</label>
                                                        <input type="radio" id="star1.3" name="rate" value="1" />
                                                        <label for="star1.3" title="text" class="m-0"
                                                            style="padding-bottom: 10px">1 star</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt
                                                    deserunt odio consectetur.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end note-preview section-->

    <!-- thanks Popup box-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <!-- top close button -->
                <div class="popup-close-btn">
                    <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="../images/close.png"></span>
                    </button>
                </div>

                <!-- popup box content -->
                <div class="modal-body">
                    <img src="../images/Success-Blue.png">
                    <h2 class="text-center">Thank you for purchasing!</h2>
                    <h5>Dear Harsh,</h5>
                    <p>As this is paid notes - you need to pay to seller Rahil Shah offline. We will send him an email
                        that you want to download this note. He may contact you further process compietion.</p>
                    <p>In case, you have urgency,<br>Please contact us on +9195377345959</p>
                    <p>Once he receives the payment and acknowledge us - selected notes you can see over my downloads
                        tab for download.</p>
                    <p>Have a good day.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end thanks Popup box-->

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