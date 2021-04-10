<?php include "../includes/db.php";
ob_start();
session_start();
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

    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>

</head>

<body>
    <!-- Navigation -->
    <?php include "includes/header.php"; ?>
    <!-- End Navigation -->

    <!-- Content -->
    <section id="content">
        <div class="container">

            <div class="row heading">
                <div class="col-md-6 col-sm-12 p-0">
                    <h3 class="heading-1">Dashboard</h3>
                </div>

                <div class="col-md-6 col-sm-12 text-right p-0">
                    <a class="btn btn-general" href="#">Add Note</a>
                </div>
            </div>

            <div class="row" style="margin-bottom: 60px;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center card-count">
                                        <?php
                                            $query = "SELECT COUNT(SN.`SellerNoteID`) AS Total FROM sellernotes AS SN WHERE SN.Status IN (7,8) AND SN.IsDeleted = '0'";
                                            $select_total = mysqli_query($connection, $query); 
                                            $results = mysqli_fetch_array($select_total);
                                            if($results['Total'] != null)
                                                echo $results['Total'];
                                            else
                                                echo "0";
                                        ?>
                                    </p>
                                    <p class="text-center count-text">Numbers of Notes in Review for Publish</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center card-count">
                                        <?php
                                            $query = "SELECT COUNT(D.`DownloadID`) AS Total FROM downloads AS D WHERE DATE(D.CreatedDate) > (NOW() - INTERVAL 7 DAY) AND D.IsDeleted = '0'";
                                            $select_total = mysqli_query($connection, $query); 
                                            $results = mysqli_fetch_array($select_total);
                                            if($results['Total'] != null)
                                                echo $results['Total'];
                                            else
                                                echo "0";
                                        ?>
                                    </p>
                                    <p class="text-center count-text">Numbers of New Notes Downloaded (Last 7 days)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center card-count">
                                        <?php
                                            $query = "SELECT COUNT(U.UserID) AS Total FROM user AS U WHERE DATE(U.CreatedDate) > (NOW() - INTERVAL 30 DAY) AND U.IsDeleted = '0' AND U.RoleID = '3'";
                                            $select_total = mysqli_query($connection, $query); 
                                            $results = mysqli_fetch_array($select_total);
                                            if($results['Total'] != null)
                                                echo $results['Total'];
                                            else
                                                echo "0";
                                        ?>
                                    </p>
                                    <p class="text-center count-text">Numbers of New Registrations (Last 7 days)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row heading">
                <div class="col-md-6 col-sm-6 p-0">
                    <h3 class="heading-2">Published Notes</h3>
                </div>

                <div class="col-md-6 col-sm-6 search-2 ">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 inner-search p-0">
                            <input class="input-search" id="search_input" type="search" placeholder="Search">
                            <button class="btn btn-general" onclick="showDashPublishNotesList()" role="button">Search</button>
                        </div>
                        <div class="col-md-4 col-sm-4 search-dropdown">
                            <select id="month" onchange="showDashPublishNotesList()" class="form-control customDropDown-Multiple">
                                <option value="">Select month</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function showDashPublishNotesList(page){
                    let search_input = $("#search_input").val();
                    let search_month = $("select#month").val();

                    $.ajax({
                    type: "GET",
                    url: "ajax/Dashboard_ajax.php",
                    data: {
                        page: page,
                        search_input: search_input,
                        search_month: search_month
                    },
                    success: function(data){
                        $("#dashpublished_list").html(data);
                    }
                });

                }
                $(function() {
                    showDashPublishNotesList(1);
                });
            </script>

            <div id="dashpublished_list"></div>

        </div>
    </section>
    <!-- End Content -->

    <hr class="p-0 m-0">

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    
</body>

</html>