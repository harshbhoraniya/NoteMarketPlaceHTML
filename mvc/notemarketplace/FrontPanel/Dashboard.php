<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Notes Marketplace</title>

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
        .card {
            height: 151px;
            border: 1px solid #d1d1d1;
        }

        .card-count {
            font-family: 'Open Sans', sans-serif;
            font-size: 30px;
            font-weight: 700;
            line-height: 34px;
            color: #6255a5;
        }

        .my-earning {
            font-family: 'Open Sans', sans-serif;
            font-size: 26px;
            font-weight: 400;
            line-height: 30px;
            color: #6255a5;
        }

        .count-text {
            font-family: 'Open Sans', sans-serif;
            font-size: 18px;
            font-weight: 400;
            line-height: 22px;
            color: #333333;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php include "includes/header.php"; ?>
    <!-- End Navigation -->

    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!-- Content -->
    <section id="content">
        <div class="container">

            <div class="row heading">
                <div class="col-md-6 col-sm-6 p-0">
                    <h3 class="heading-1">Dashboard</h3>
                </div>

                <div class="col-md-6 col-sm-6 text-right p-0">
                    <a class="btn btn-general" role="button">Add Note</a>
                </div>
            </div>

            <div class="row" style="margin-bottom: 60px;">
                <div class="col-md-6">
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center">
                                    <img src="../images/my-earning.png" alt="my-earning">
                                </p>
                                <p class="text-center my-earning">My Earning</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center card-count">100</p>
                                <p class="text-center count-text">Number of Notes Sold</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center card-count">$1,00,000</p>
                                <p class="text-center count-text">Money Earned</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center card-count">38</p>
                                    <p class="text-center count-text">My Download</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center card-count">12</p>
                                    <p class="text-center count-text">My Rejected Notes</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center card-count">102</p>
                                    <p class="text-center count-text">Buyer Requests</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row heading">
                <div class="col-md-6 col-sm-6 p-0">
                    <h3 class="heading-1">In Progress Notes</h3>
                </div>

                <div class="col-md-6 col-sm-6 text-right search-1 p-0">
                    <img src="../images/search-icon.png" class="form-control-feedback" alt="search-icon">
                    <input class="input-search" type="search" placeholder="Search">
                    <a class="btn btn-general">Search</a>
                </div>
            </div>

            <div class="row">
                <div class="table-top table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Added Date</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">09-10-2020</td>
                                <td class="td-blue">Data Science</td>
                                <td>Science</td>
                                <td>Draft</td>
                                <td class="text-center">
                                    <img src="../images/edit.png" alt="edit-image">
                                    <img src="../images/delete.png" alt="delete-image">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">10-10-2020</td>
                                <td class="td-blue">Accounts</td>
                                <td>Commerce</td>
                                <td>In Review</td>
                                <td class="text-center">
                                    <img src="../images/eye.png" alt="eye-image">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">11-10-2020</td>
                                <td class="td-blue">Social Studies</td>
                                <td>Social</td>
                                <td>Submitted</td>
                                <td class="text-center">
                                    <img src="../images/eye.png" alt="eye-image">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">12-10-2020</td>
                                <td class="td-blue">AI</td>
                                <td>IT</td>
                                <td>Submitted</td>
                                <td class="text-center">
                                    <img src="../images/eye.png" alt="eye-image">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">13-10-2020</td>
                                <td class="td-blue">Lorem ipsum</td>
                                <td>Lorem</td>
                                <td>Draft</td>
                                <td class="text-center">
                                    <img src="../images/edit.png" alt="edit-image">
                                    <img src="../images/delete.png" alt="delete-image">
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

            <div class="row heading">
                <div class="col-md-6 col-sm-6 p-0">
                    <h3 class="heading-1">Published Notes</h3>
                </div>

                <div class="col-md-6 col-sm-6 text-right search-1 p-0">
                    <img src="../images/search-icon.png" class="form-control-feedback" alt="search-icon">
                    <input class="input-search" type="search" placeholder="Search">
                    <a class="btn btn-general">Search</a>
                </div>
            </div>

            <div class="row">
                <div class="table-top table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Added Date</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sell Type</th>
                                <th scope="col">Price</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">09-10-2020</td>
                                <td class="td-blue">Data Science</td>
                                <td>Science</td>
                                <td>Paid</td>
                                <td>$575</td>
                                <td class="text-center">
                                    <img src="../images/eye.png" alt="eye-image">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">10-10-2020</td>
                                <td class="td-blue">Accounts</td>
                                <td>Commerce</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td class="text-center">
                                    <img src="../images/eye.png" alt="eye-image">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">11-10-2020</td>
                                <td class="td-blue">Social Studies</td>
                                <td>Social</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td class="text-center">
                                    <img src="../images/eye.png" alt="eye-image">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">12-10-2020</td>
                                <td class="td-blue">AI</td>
                                <td>IT</td>
                                <td>Paid</td>
                                <td>$3542</td>
                                <td class="text-center">
                                    <img src="../images/eye.png" alt="eye-image">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">13-10-2020</td>
                                <td class="td-blue">Lorem ipsum</td>
                                <td>Lorem</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td class="text-center">
                                    <img src="../images/eye.png" alt="eye-image">
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

        </div>
    </section>

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
    <script src="js/script.js"></script>
</body>

</html>