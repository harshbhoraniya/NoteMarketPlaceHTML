<?php
    include "../includes/db.php";
    ob_start();
    session_start();
    if(!isset($_SESSION['ID'])){
        ?>
        <script>
            location.replace('../FrontPanel/Login.php');
        </script>
        <?php
    }
    $user_id = $_SESSION['ID'];

?>
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

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>

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
                    <a class="btn btn-general" href="AddNotes.php" role="button">Add Note</a>
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
                            <?php
                                $query = "SELECT COUNT(D.`DownloadID`) AS Total FROM `downloads` AS D WHERE D.`Seller` = '$user_id'";
                                $select_total = mysqli_query($connection, $query);
                                $sold = mysqli_fetch_array($select_total);
                            ?> 
                                <p class="text-center card-count"><?php echo $sold['Total']; ?></p>
                                <p class="text-center count-text">Number of Notes Sold</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                            <?php
                                $query = "SELECT SUM(D.`PurchasedPrice`) AS Total FROM `downloads` AS D WHERE D.`Seller` = '$user_id'";
                                $select_total = mysqli_query($connection, $query);
                                $earned = mysqli_fetch_array($select_total);
                            ?> 
                                <p class="text-center card-count">$<?php echo $earned['Total']; ?></p>
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
                                <?php
                                    $query = "SELECT COUNT(D.`DownloadID`) AS Total FROM `downloads` AS D WHERE D.`Downloader` = '$user_id'";
                                    $select_total = mysqli_query($connection, $query);
                                    $download = mysqli_fetch_array($select_total);
                                ?> 
                                    <p class="text-center card-count"><?php echo $download['Total']; ?></p>
                                    <p class="text-center count-text">My Download</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                <?php
                                    $query = "SELECT COUNT(SN.`SellerNoteID`) AS Total FROM `sellernotes` AS SN WHERE SN.`Status` = '10' AND SN.SellerID = '$user_id'";
                                    $select_total = mysqli_query($connection, $query);
                                    $rejected = mysqli_fetch_array($select_total);
                                ?> 
                                    <p class="text-center card-count"><?php echo $rejected['Total']; ?></p>
                                    <p class="text-center count-text">My Rejected Notes</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                <?php
                                    $query = "SELECT COUNT(D.`DownloadID`) AS Total FROM `downloads` AS D WHERE D.`Seller` = '$user_id' AND D.`IsSellerHasAllowedDownload` = '0'";
                                    $select_total = mysqli_query($connection, $query);
                                    $request = mysqli_fetch_array($select_total);
                                ?> 
                                    <p class="text-center card-count"><?php echo $request['Total']; ?></p>
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
                    <input  class="input-search" id="search_input_inprogress" type="search" placeholder="Search">
                    <button onclick="showInprogressNotes()" class="btn btn-general">Search</button>
                </div>
            </div>

            <script type="text/javascript">
                function showInprogressNotes(page){
                    let search_input = $("#search_input_inprogress").val();

                    $.ajax({
                    type: "GET",
                    url: "ajax/inprogress.php",
                    data: {
                        page: page,
                        search_input: search_input
                    },
                    success: function(data){
                        $("#inprogress_note_list").html(data);
                    }
                });

                }
                $(function() {
                    showInprogressNotes(1);
                });
            </script>

            <div id="inprogress_note_list"></div>

            <div class="row heading">
                <div class="col-md-6 col-sm-6 p-0">
                    <h3 class="heading-1">Published Notes</h3>
                </div>

                <div class="col-md-6 col-sm-6 text-right search-1 p-0">
                    <input class="input-search" id="search_input_published" type="search" placeholder="Search">
                    <button onclick="showPublishNotes()" class="btn btn-general">Search</button>
                </div>
            </div>

            <script type="text/javascript">
                function showPublishNotes(page){
                    let search_input = $("#search_input_published").val();

                    $.ajax({
                    type: "GET",
                    url: "ajax/publishnote.php",
                    data: {
                        page: page,
                        search_input: search_input
                    },
                    success: function(data){
                        console.log(data);
                        $("#publish_note_list").html(data);
                    }
                });

                }
                $(function() {
                    showPublishNotes(1);
                });
            </script>
            
            <div id="publish_note_list"></div>

        </div>
    </section>

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    
</body>

</html>