<?php include "../includes/db.php";
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members | Notes Marketplace</title>

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

    <!-- Popper Js -->
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
                    <div class="col-md-6 col-sm-6 p-0">
                        <h3 class="heading-1">Members</h3>
                    </div>

                    <div class="col-md-6 col-sm-6 text-right p-0 search-1">
                        <input class="input-search" id="search_input" type="search" placeholder="Search">
                        <button onclick="showMemberList()" class="btn btn-general">Search</button>
                    </div>
                </div>

                <script type="text/javascript">
                function showMemberList(page){
                    let search_input = $("#search_input").val();

                    $.ajax({
                    type: "GET",
                    url: "ajax/Members_ajax.php",
                    data: {
                        page: page,
                        search_input: search_input
                    },
                    success: function(data){
                        $("#member_list").html(data);
                    }
                });

                }
                $(function() {
                    showMemberList(1);
                });
            </script>

            <div id="member_list"></div>

        </div>
    </section>

    <hr class="p-0 m-0">

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    
</body>

</html>