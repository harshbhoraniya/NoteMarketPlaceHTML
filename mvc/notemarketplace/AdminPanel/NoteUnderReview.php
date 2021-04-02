<?php include "../includes/db.php";
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Under Review | Notes Marketplace</title>

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
                    <div class="col-md-6 col-sm-6 p-0">
                        <h3 class="heading-1">Notes Under Review</h3>
                    </div>
                </div>

                <div class="row heading">
                    <div class="col-md-6 col-sm-6" style="padding-left: 5px">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 search-dropdown">
                                <label>Seller</label>
                                <select class="form-control customDropDown-Multiple">
                                    <option>Select seller</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 text-right p-0 search-1" style="align-items: flex-end">
                        <img src="../images/search-icon.png" class="form-control-feedback" alt="search-icon"
                            style="bottom: 8px">
                        <input class="input-search" type="search" placeholder="Search">
                        <a class="btn btn-general">Search</a>
                    </div>
                </div>

                <div class="row">
                    <div class="table-top table-responsive">
                        <table class="table" style="white-space: nowrap; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Sr No.</th>
                                    <th scope="col">Note Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Seller</th>
                                    <th scope="col"></th>
                                    <th scope="col">Date Added</th>
                                    <th scope="col">Status</th>
                                    <th class="text-center" scope="col">Action</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" scope="row">1</td>
                                    <td class="td-blue">Software Engineer</td>
                                    <td>IT</td>
                                    <td>Khyati Patel</td>
                                    <td>
                                        <img src="../images/eye.png" alt="eye-image">
                                    </td>
                                    <td style="white-space: nowrap;">09-10-2020, 10:10</td>
                                    <td>InReview</td>
                                    <td class="text-center ">
                                        <div class="td-action">
                                            <button type="button" class="btn btn-action btn-approve">Approve</button>
                                            <a type="button" href="#" class="btn btn-action btn-reject"
                                                data-toggle="modal" data-target="#exampleModal">Reject</a>
                                            <button type="button"
                                                class="btn btn-action btn-interview ">InReview</button>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" scope="row">2</td>
                                    <td class="td-blue">Computer Basic</td>
                                    <td>Computer</td>
                                    <td>Khyati Patel</td>
                                    <td>
                                        <img src="../images/eye.png" alt="eye-image">
                                    </td>
                                    <td>10-10-2020, 11:25</td>
                                    <td>Submitted for Review</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-action btn-approve">Approve</button>
                                        <a type="button" href="#" class="btn btn-action btn-reject" data-toggle="modal"
                                            data-target="#exampleModal">Reject</a>
                                        <button type="button" class="btn btn-action btn-interview ">InReview</button>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" scope="row">3</td>
                                    <td class="td-blue">Human Body</td>
                                    <td>Science</td>
                                    <td>Khyati Patel</td>
                                    <td>
                                        <img src="../images/eye.png" alt="eye-image">
                                    </td>
                                    <td>11-10-2020, 01:00</td>
                                    <td>InReview</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-action btn-approve">Approve</button>
                                        <a type="button" href="#" class="btn btn-action btn-reject" data-toggle="modal"
                                            data-target="#exampleModal">Reject</a>
                                        <button type="button" class="btn btn-action btn-interview ">InReview</button>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" scope="row">4</td>
                                    <td class="td-blue">world war 2</td>
                                    <td>History</td>
                                    <td>Khyati Patel</td>
                                    <td>
                                        <img src="../images/eye.png" alt="eye-image">
                                    </td>
                                    <td>12-10-2020, 10:10</td>
                                    <td>InReview</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-action btn-approve">Approve</button>
                                        <a type="button" href="#" class="btn btn-action btn-reject" data-toggle="modal"
                                            data-target="#exampleModal">Reject</a>
                                        <button type="button" class="btn btn-action btn-interview ">InReview</button>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" scope="row">5</td>
                                    <td class="td-blue">Accounting</td>
                                    <td>Accounts</td>
                                    <td>Khyati Patel</td>
                                    <td>
                                        <img src="../images/eye.png" alt="eye-image">
                                    </td>
                                    <td>13-10-2020, 11:25</td>
                                    <td>InReview</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-action btn-approve">Approve</button>
                                        <a type="button" href="#" class="btn btn-action btn-reject" data-toggle="modal"
                                            data-target="#exampleModal">Reject</a>
                                        <button type="button" class="btn btn-action btn-interview ">InReview</button>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 100px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title heading-2" id="exampleModalLabel">Human Body - Science</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="../images/close.png" alt="close-image" aria-hidden="true">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputRemarks">Remarks</label>
                        <textarea name="remarks" class="form-control" id="exampleInputRemarks"
                            placeholder="Write Remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: flex-end">
                    <div class="form-group">
                        <div class="row text-right">
                            <a href="#" class="btn btn-modal btn-reject">Reject</a>
                            <a href="#" class="btn btn-modal btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

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