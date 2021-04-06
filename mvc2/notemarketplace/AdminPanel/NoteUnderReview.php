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
                        <h3 class="heading-1">Notes Under Review</h3>
                    </div>
                </div>

                <div class="row heading">
                    <div class="col-md-6 col-sm-6" style="padding-left: 5px">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 search-dropdown">
                                <label>Seller</label>
                                <select id="seller" onchange="showNoteUnderReviewList()" class="form-control customDropDown-Multiple">
                                    <option value="" >Select seller</option>
                                <?php

                                    $query = "SELECT U.`UserID`, U.`FirstName`, U.`LastName` FROM `user` As U WHERE U.`IsDeleted` = '0' ORDER BY U.`FirstName`, U.`LastName`";
                                    $select_user = mysqli_query($connection,$query);

                                    while($row = mysqli_fetch_assoc($select_user )) {
                                    $user_id = $row['UserID'];
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
                        <input class="input-search" id="search_input" type="search" name="search-input" placeholder="Search">
                        <button name="search" onclick="showNoteUnderReviewList()" class="btn btn-general">Search</button>
                    </div>
                </div>
                
                <script type="text/javascript">
                function showNoteUnderReviewList(page){
                    let search_input = $("#search_input").val();
                    let search_seller = $("select#seller").val();

                    $.ajax({
                    type: "GET",
                    url: "ajax/NoteUnderReview_ajax.php",
                    data: {
                        page: page,
                        search_input: search_input,
                        search_seller: search_seller
                    },
                    success: function(data){
                        $("#noteunderreview_list").html(data);
                    }
                });

                }
                $(function() {
                    showNoteUnderReviewList(1);
                });
            </script>

            <div id="noteunderreview_list"></div>
                
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
                            <button name="rejected" class="btn btn-modal btn-reject">Reject</button>
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

    
</body>

</html>