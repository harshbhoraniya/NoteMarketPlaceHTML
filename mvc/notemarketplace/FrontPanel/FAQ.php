<?php
    include "../includes/db.php";
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | Notes Marketplace</title>

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
    <?php 
        if(isset($_SESSION['ID'])){
            include "includes/header.php"; 
        }
        else{
            include "includes/header_non.php"; 
        }
    ?>
    <!-- End Navigation -->

    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!-- Head -->
    <section class="head">
        <div class="head-content">
            <div class="container">
                <div class="row">
                    <div class="head-content-inner">
                        <div class="head-heading">
                            Frequently Asked Questions
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Head -->

    <!-- Collapse  -->
    <section>
        <div class="container">
            <div class="row heading">
                <div class="col-md-12 p-0">
                    <h1 class="uploaders">General Questions</h1>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card col-md-12 m-0 p-0">
                    <div id="headingone">
                        <h2 class="mb-0 panel-title">
                            <div class="btn btn-block text-left collapsed collapse-heading" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="false" aria-controls="collapseThree">
                                What is Marketplace-Notes?
                            </div>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, laboriosam
                            consectetur! Dolorum doloribus optio iusto maiores aperiam? Molestias voluptatum culpa
                            officia?
                            Aspernatur delectus, accusantium laboriosam provident eos quaerat cum assumenda.
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card col-md-12 m-0 p-0">
                    <div id="headingone">
                        <h2 class="mb-0 panel-title">
                            <div class="btn btn-block text-left collapsed collapse-heading" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
                                What do the University say?
                            </div>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, laboriosam
                            consectetur! Dolorum doloribus optio iusto maiores aperiam? Molestias voluptatum culpa
                            officia?
                            Aspernatur delectus, accusantium laboriosam provident eos quaerat cum assumenda.
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card col-md-12 m-0 p-0">
                    <div id="headingone">
                        <h2 class="mb-0 panel-title">
                            <div class="btn btn-block text-left collapsed collapse-heading" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Is this legal?
                            </div>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, laboriosam
                            consectetur! Dolorum doloribus optio iusto maiores aperiam? Molestias voluptatum culpa
                            officia?
                            Aspernatur delectus, accusantium laboriosam provident eos quaerat cum assumenda.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row heading">
                <div class="col-md-12 p-0">
                    <h1 class="uploaders">Uploaders</h1>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card col-md-12 m-0 p-0">
                    <div id="headingone">
                        <h2 class="mb-0 panel-title">
                            <div class="btn btn-block text-left collapsed collapse-heading" data-toggle="collapse"
                                data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                What can't I sell?
                            </div>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, laboriosam
                            consectetur! Dolorum doloribus optio iusto maiores aperiam? Molestias voluptatum culpa
                            officia?
                            Aspernatur delectus, accusantium laboriosam provident eos quaerat cum assumenda.
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card col-md-12 m-0 p-0">
                    <div id="headingone">
                        <h2 class="mb-0 panel-title">
                            <div class="btn btn-block text-left collapsed collapse-heading" data-toggle="collapse"
                                data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                What notes can I sell?
                            </div>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, laboriosam
                            consectetur! Dolorum doloribus optio iusto maiores aperiam? Molestias voluptatum culpa
                            officia?
                            Aspernatur delectus, accusantium laboriosam provident eos quaerat cum assumenda.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row heading">
                <div class="col-md-12 p-0">
                    <h1 class="downloaders">Downloaders</h1>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card col-md-12 m-0 p-0">
                    <div id="headingone">
                        <h2 class="mb-0 panel-title">
                            <div class="btn btn-block text-left collapsed collapse-heading" data-toggle="collapse"
                                data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                How do I buy notes?
                            </div>
                        </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, laboriosam
                            consectetur! Dolorum doloribus optio iusto maiores aperiam? Molestias voluptatum culpa
                            officia?
                            Aspernatur delectus, accusantium laboriosam provident eos quaerat cum assumenda.
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card col-md-12 m-0 p-0">
                    <div id="headingone">
                        <h2 class="mb-0 panel-title">
                            <div class="btn btn-block text-left collapsed collapse-heading" data-toggle="collapse"
                                data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
                                Can I edit the notes I purchased?
                            </div>
                        </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, laboriosam
                            consectetur! Dolorum doloribus optio iusto maiores aperiam? Molestias voluptatum culpa
                            officia?
                            Aspernatur delectus, accusantium laboriosam provident eos quaerat cum assumenda.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Collapse  -->

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