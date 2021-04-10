<?php include "../includes/db.php";
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Published Notes | Notes Marketplace</title>

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
                        <h3 class="heading-1">Published Notes</h3>
                    </div>
                </div>

                <div class="row heading">
                    <div class="col-md-6 col-sm-6" style="padding-left: 5px">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 search-dropdown">
                                <label>Seller</label>
                                <select id="seller" onchange="showNotePublishedNotesList()" class="form-control customDropDown-Multiple">
                                    <option value="">Select seller</option>
                                    <?php

                                    $query = "SELECT DISTINCT(D.`Seller`) AS Seller, U.`FirstName`, U.`LastName` FROM `downloads` AS D INNER JOIN `user` AS U on U.`UserID` = D.`Seller` WHERE U.`IsDeleted` = '0'";
                                    $select_user = mysqli_query($connection,$query);

                                    while($row = mysqli_fetch_assoc($select_user )) {
                                    $user_id = $row['Seller'];
                                    $user_name = $row['FirstName'] ." ". $row['LastName'];            
                                        ?>
                                        <option value="<?php echo $user_id;?>"><?php echo $user_name; ?></option>
                                    <?php         
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 text-right p-0 search-1" style="align-items: flex-end">
                        <input class="input-search" id="search_input" type="search" placeholder="Search">
                        <button class="btn btn-general" onclick="showNotePublishedNotesList()" role="button">Search</button>
                    </div>
                </div>

                <script type="text/javascript">
                function showNotePublishedNotesList(page){
                    let search_input = $("#search_input").val();
                    let search_seller = $("select#seller").val();

                    $.ajax({
                    type: "GET",
                    url: "ajax/PublishedNote_ajax.php",
                    data: {
                        page: page,
                        search_input: search_input,
                        search_seller: search_seller
                    },
                    success: function(data){
                        $("#publishednote_list").html(data);
                    }
                });

                }
                $(function() {
                    showNotePublishedNotesList(1);
                });
            </script>

            <div id="publishednote_list"></div>

        </div>
    </section>

    <hr class="p-0 m-0">

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    
</body>

</html>