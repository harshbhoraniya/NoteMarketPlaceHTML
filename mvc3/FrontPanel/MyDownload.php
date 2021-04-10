<?php ob_start() ?>
<?php include "../includes/db.php"; ?>

<?php 
    session_start();
    if(!isset($_SESSION['ID'])){
        ?>
        <script>
            location.replace('../FrontPanel/Login.php');
        </script>
        <?php
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Download | Notes Marketplace</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css\fontawesome\css\font-awesome.min.css">

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

    <style>
        .title {
            margin-top: 20px;
            margin-bottom: 20px;
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            line-height: 38px;
            color: #6255a5;
        }

        textarea {
            border: 1px solid #d1d1d1;
            height: 130px !important;
            border-radius: 3px;
        }

        /* rating */
        .rate {
            float: left;
            height: 20px;
            margin-bottom: 30px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 46px;
            height: 46px;
            margin-right: 18px;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: url("../images/star-white.png");
        }

        .rate>input:checked~label {
            content: url("../images/star.png");
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            content: url("../images/star.png");
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            content: url("../images/star.png");
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
                    <h3 class="heading-1">My Download</h3>
                </div>

                <div class="col-md-6 col-sm-6 text-right search-1 p-0">
                    <input name="search-input" id="search_input" class="input-search" type="search" placeholder=" Search">
                    <button name="search" onclick="showMyDownloads()" class="btn btn-general">Search</button>
                </div>
            </div>

            <script type="text/javascript">
                function showMyDownloads(page){
                    let search_input = $("#search_input").val();

                    $.ajax({
                    type: "GET",
                    url: "ajax/MyDownload_ajax.php",
                    data: {
                        page: page,
                        search_input: search_input
                    },
                    success: function(data){
                        console.log(data);
                        $("#mydownload_list").html(data);
                    }
                });

                }
                $(function() {
                    showMyDownloads(1);
                });
            </script>
            
            <div id="mydownload_list"></div>
    </section>
    <!-- End Content -->

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    
</body>

</html>