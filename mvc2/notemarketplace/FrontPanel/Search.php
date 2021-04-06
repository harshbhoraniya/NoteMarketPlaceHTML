<?php include "../includes/db.php"; 
$total_records =0;
session_start();

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

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>


    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>

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
        <form action="" method="post">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="search_input" class="form-control" onkeyup="showNotes()" id="search_input" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-6">
                        <select id="type" name="type" onchange="showNotes()" class="form-control">
                            <option value="0">Select type</option>
                            <?php

                            $query = "SELECT NT.`NoteTypeID`, NT.`Name` FROM `notetype` AS NT";
                            $select_type = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_type )) {
                            $type_id = $row['NoteTypeID'];
                            $type_name = $row['Name'];            
            
                            ?>
                                <option value="<?php echo $type_id;?>"><?php echo $type_name; ?></option>
                            <?php         
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select id="category" name="category" onchange="showNotes()" class="form-control">
                            <option value="0">Select category</option>
                            <?php

                            $query = "SELECT NC.`NoteCategoryID`, NC.`Name` FROM `notecategories` AS NC";
                            $select_category = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_category )) {
                                $category_id = $row['NoteCategoryID'];
                                $category_name = $row['Name'];            
                                ?>
                                <option value="<?php echo $category_id;?>"><?php echo $category_name; ?></option>
                            <?php         
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select id="university" name="university" onchange="showNotes()" class="form-control">
                            <option value="0">Select university</option>
                            <?php

                            $query = "SELECT DISTINCT(SN.`UniversityName`) FROM `sellernotes` AS SN";
                            $select_university = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_university )) {
                            $university_name = $row['UniversityName'];            
            
                            ?>
                                <option value="<?php echo $university_name;?>"><?php echo $university_name; ?></option>
                            <?php          
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select id="course" name="course" onchange="showNotes()" class="form-control">
                            <option value="0">Select course</option>
                            <?php

                            $query = "SELECT DISTINCT(SN.`Course`) FROM `sellernotes` AS SN";
                            $select_course = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_course )) {
                            $course = $row['Course'];            
            
                            ?>
                                <option value="<?php echo $course;?>"><?php echo $course; ?></option>
                            <?php          
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select id="country" name="country" onchange="showNotes()" class="form-control">
                            <option value="0">Select country</option>
                            <?php

                            $query = "SELECT C.`CountryID`, C.`Name` FROM `countries` AS C";
                            $select_countries = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_countries )) {
                                $country_id = $row['CountryID'];
                            $country_name = $row['Name'];            
            
                            ?>
                                <option value="<?php echo $country_id;?>"><?php echo $country_name; ?></option>
                            <?php          
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select id="rating" onchange="showNotes()" class="form-control">
                            <option value="">Select rating</option>
                            <option value="5">4.0 - 5.0</option>
                            <option value="4">3.0 - 4.0</option>
                            <option value="3">2.0 - 3.0</option>
                            <option value="2">1.0 - 2.0</option>
                            <option value="1">0.0 - 1.0</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript"> 
            function showNotes(page){
                let search_input = $("#search_input").val();
                let search_type = $("select#type").val();
                let search_category = $("select#category").val();
                let search_university = $("select#university").val();
                let search_course = $("select#course").val();
                let search_country = $("select#country").val();
                let search_rating = $("select#rating").val();

                $.ajax({
                    type: "GET",
                    url: "ajax/search_ajax.php",
                    data: {
                        page: page,
                        search_input: search_input,
                        search_type: search_type,
                        search_category: search_category,
                        search_university: search_university,
                        search_course: search_course,
                        search_country: search_country,
                        search_rating: search_rating
                    },
                    success: function(data){
                        $("#search_result").html(data);
                    }
                });
            }
            $(function() {
                showNotes(1);
            });
        </script>
        
            <div id="search_result"></div>
        
        </form>
    </section>
    <!-- End Search   -->

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    
</body>

</html>