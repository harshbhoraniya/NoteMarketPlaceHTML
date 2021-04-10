<?php include "../includes/db.php";
ob_start();
session_start();
?>
<?php
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
    }
    $_SESSION['MemberID'] = $user_id;

    $query = "SELECT U.`UserID`, U.`FirstName`, U.`LastName`, U.`EmailID`, UP.DOB, UP.PhoneNumber, UP.ProfilePicture, UP.College, UP.AddressLine1, UP.AddressLine2, UP.City, UP.State, UP.Country, UP.ZipCode FROM `user` AS U
	            INNER JOIN userprofile AS UP ON UP.UserID = U.`UserID`
                	WHERE U.`UserID` = '$user_id'";
    $select_user = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($select_user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details | Notes Marketplace</title>

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
                    <div class="col-md-12 p-0">
                        <h3 class="heading-1">Member Details</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <img src="../upload/<?php echo $row['UserID'] ?>/<?php echo $row['ProfilePicture'] ?>" width="175px;" height="175px;" alt="member-image">
                    </div>
                    <div class="col-md-5 col-sm-4">
                        <div class="row">
                            <div class="col-md-5 td-1">
                                First Name:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['FirstName'] ?>
                            </div>
                            <div class="col-md-5 td-1">
                                Last Name:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['LastName'] ?>
                            </div>
                            <div class="col-md-5 td-1">
                                Email:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['EmailID'] ?>
                            </div>
                            <div class="col-md-5 td-1">
                                DOB:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo date('d-m-Y', strtotime($row['DOB'])) ?>
                            </div>
                            <div class="col-md-5 td-1">
                                Phone Number:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['PhoneNumber'] ?>
                            </div>
                            <div class="col-md-5  td-1">
                                College/University:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['College'] ?>
                            </div>
                        </div>
                    </div>
                    <span class="vertical-line"></span>
                    <div class="col-md-4 col-sm-4">
                        <div class="row">
                            <div class="col-md-5 td-1">
                                Address 1:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['AddressLine1'] ?>
                            </div>
                            <div class="col-md-5 td-1">
                                Address 2:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['AddressLine2'] ?>
                            </div>
                            <div class="col-md-5 td-1">
                                City:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['City'] ?>
                            </div>
                            <div class="col-md-5 td-1">
                                State:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['State'] ?>
                            </div>
                            <div class="col-md-5 td-1">
                                Country:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['Country'] ?>
                            </div>
                            <div class="col-md-5  td-1">
                                Zip Code:
                            </div>
                            <div class="col-md-7 td-3">
                                <?php echo $row['ZipCode'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row heading">
                    <div class="col-md-12 p-0">
                        <h3 class="heading-1">Notes</h3>
                    </div>
                </div>

                <script type="text/javascript">
                function showMemberNotesList(page){

                    $.ajax({
                    type: "GET",
                    url: "ajax/MemberDetails_ajax.php",
                    data: {
                        page: page
                    },
                    success: function(data){
                        $("#notebook_list").html(data);
                    }
                });

                }
                $(function() {
                    showMemberNotesList(1);
                });
            </script>

            <div id="notebook_list"></div>
                
        </div>
    </section>
    <!-- End Content -->

    <hr class="p-0 m-0">

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    
</body>

</html>