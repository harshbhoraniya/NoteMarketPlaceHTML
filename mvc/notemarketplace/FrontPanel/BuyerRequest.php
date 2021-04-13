<?php include "../includes/db.php"; ?>
<?php ob_start(); ?>

<?php 
    session_start(); 
    if(!isset($_SESSION['ID'])){
        ?>
        <script>
            location.replace('../FrontPanel/Login.php');
        </script>
        <?php
    }
    $id = $_SESSION['ID'];
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Requests | Notes Marketplace</title>

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
    <?php include "includes/header.php"; ?>
    <!-- End Navigation -->

    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!-- Content -->
    <section id="content">
        <form action="" method="post">
        <div class="container">

            <div class="row heading">
                <div class="col-md-6 col-sm-6 p-0">
                    <h3 class="heading-1">Buyer Requests</h3>
                </div>

                <div class="col-md-6 col-sm-6 text-right search-1 p-0">
                    <input class="input-search" name="search-input" type="search" placeholder="Search">
                    <button name="search" class="btn btn-general">Search</button>
                </div>
            </div>
            <?php
                if(isset($_GET['page'])){
                    $page =mysqli_real_escape_string($connection, $_GET['page']);
                    $page = htmlentities($page);
                }
                else{
                    $page = 1;
                }

                $num_per_page = 5;
                $start_from = ($page-1) * $num_per_page;

                $query = "SELECT D.`DownloadID`, D.`NoteTitle`, D.`NoteCategory`, U.`EmailID`, UP.`CountryCode`, UP.`PhoneNumber`, D.`IsPaid`, D.`PurchasedPrice`, D.`CreatedDate` FROM `user` AS U
                            INNER JOIN `userprofile` AS UP ON UP.`UserID` = U.`UserID` 
                            INNER JOIN `downloads` AS D ON d.`Downloader` = U.`UserID`
                                WHERE D.`IsSellerHasAllowedDownload` = '0' AND U.`IsEmailVerified` = '1' AND D.`Seller` = '$id' AND D.`IsDeleted` = '0'";
                if (isset($_POST['search'])) {
                    $search_result = $_POST['search-input'];
                    $query .= " AND (D.`NoteTitle` LIKE '%$search_result%' OR D.`NoteCategory` LIKE '%$search_result%' 
                    OR U.`EmailID` LIKE '%$search_result%' OR UP.`CountryCode` LIKE '%$search_result%' 
                    OR UP.`PhoneNumber` LIKE '%$search_result%' 
                    OR D.`IsPaid` LIKE '%$search_result%' 
                    OR D.`PurchasedPrice` LIKE '%$search_result%')";
                }
                $select_query = mysqli_query($connection, $query);
                $total_records = mysqli_num_rows($select_query);
                $total_pages = ceil($total_records / $num_per_page);
                $i=1;
                $k=  $num_per_page + $start_from;
                $srno=1;
                if($total_records != 0){
            ?>

            <div class="row">
                <div class="table-top table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Sr No.</th>
                                <th class="text-center" scope="col">Note Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Buyer</th>
                                <th scope="col">Phone no.</th>
                                <th scope="col">Sell Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">Download Date/Time</th>
                                <th class="text-center" scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            
                            while($row = mysqli_fetch_array($select_query))
                            {
                                
                                if($start_from < $i){
                                    $downloadid = $row['DownloadID'];
                        ?>
                            <tr>
                                <td class="text-center" scope="row"><?php echo $srno++; ?></td>
                                <td class="td-blue"><?php echo $row["NoteTitle"] ?></td>
                                <td><?php echo $row["NoteCategory"] ?></td>
                                <td><?php echo $row["EmailID"] ?></td>
                                <td><?php echo $row["CountryCode"] ?><?php echo " " ?><?php echo $row["PhoneNumber"] ?></td>
                                <td><?php if($row["IsPaid"] == 1){ echo "Paid"; }else{ echo "Free"; } ?></td>
                                <td>$<?php echo $row["PurchasedPrice"] ?></td>
                                <td><?php echo $row["CreatedDate"] ?></td>
                                <td class="text-center">
                                    <img src="../images/eye.png" alt="eye-image">
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <img src="../images/dots.png" alt="dot-image">
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" name="accept" href="Acceptbook.php?id=<?php echo $downloadid ?>">Yes, I Received</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                }
                                $i++;
                                if($i>$k){
                                    break;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-12 num">
                    <ul class="pagination justify-content-center">
                        <li class="<?php if($page == 1){ echo 'disabled'; }?> page-item">
                            <a class="page-link" href="buyerrequest.php?page=<?php echo $page-1 ; ?>" aria-label="Previous">
                                <img src="../images/left-arrow.png" alt="left-arrow">
                            </a>
                        </li>
                        <?php 
                            for($i=1;$i<=$total_pages;$i++){
                        ?>
                        <li class=" page-item">
                            <a class="page-link <?php if($page == $i) { echo 'active'; }?>" href="buyerrequest.php?page=<?php echo $i ; ?>"><?php echo $i ;?></a>
                        </li>
                        
                        <?php 
                            }
                        ?>

                        <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
                            <a class="page-link" href="buyerrequest.php?page=<?php echo $page+1 ; ?>" aria-label="Next">
                                <img src="../images/right-arrow.png" alt="right-arrow">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
            }
            else{
                ?>

                <div class="row">
                    <div class="col-md-12 text-center no-records">
                        <h4>No Records Found.</h4>
                    </div>
                </div>

                <?php
            }
        ?>
        </form>
    </section>
    <!-- End Content -->

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="js/jquery.js"></script>

    <!-- Popper Js -->
    <script src="js/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>

</html>
