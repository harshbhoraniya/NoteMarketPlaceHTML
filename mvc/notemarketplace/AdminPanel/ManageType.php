<?php include "../includes/db/php";
ob_start();
session_start();
?>
<?php include "../includes/db.php" ?>
<?php ob_start(); session_start(); 
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
    <title>Manage Type | Notes Marketplace</title>

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

    <!-- Content -->
    <section id="content">
        <form method="POST">
        <div class="container">
            <div class="row heading">
                <div class="col-md-12 p-0">
                    <h3 class="heading-1">Manage Type</h3>
                </div>
            </div>

            <div class="row heading">
                <div class="col-md-6 col-sm-6 p-0">
                    <a class="btn btn-general" href="AddType.php">Add Type</a>
                </div>
                <div id="managetype-search" class="col-md-6 col-sm-6 text-right search-1 p-0">
                    <input class="input-search" name="search-input" type="search" placeholder="Search">
                    <button name="search" class="btn btn-general">Search</button>
                </div>
            </div>
            <?php
                if(isset($_GET['page'])){
                    $page = mysqli_real_escape_string($connection, $_GET['page']);
                    $page = htmlentities($page);
                }
                else{
                    $page = 1;
                }

                $num_per_page = 5;
                $start_from = ($page-1) * $num_per_page;

                $query = "SELECT NT.`NoteTypeID`, NT.`Name`, NT.`Description`, NT.`CreatedDate`, U.`FirstName`, U.`LastName`, NT.`IsActive` FROM `user` AS U
                            INNER JOIN `notetype` AS NT on NT.`CreatedBy` = U.`UserID`
                                WHERE NT.`IsDeleted` = '0'";
                if (isset($_POST['search'])) {
                    $search_result = $_POST['search-input'];
                    $query .= " AND ( U.`FirstName` LIKE '%$search_result%' OR U.`LastName` LIKE '%$search_result%' 
                    OR NT.`Name` LIKE '%$search_result%' 
                    OR NT.`Description` LIKE '%$search_result%' 
                    OR NT.`CreatedDate` LIKE '%$search_result%' 
                    OR NT.`IsActive` LIKE '%$search_result%')";
                }
                $select_type = mysqli_query($connection, $query);
                $total_records = mysqli_num_rows($select_type);
                $total_pages = ceil($total_records / $num_per_page);
                $i=1;
                $k = $num_per_page + $start_from;
                $srno = 1;
                if($total_records != 0){
            ?>

            <div class="row">
                <div class="table-top table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Sr No.</th>
                                <th scope="col" class="text-center">Type</th>
                                <th scope="col" class="text-center">Description</th>
                                <th scope="col" class="text-center">Date Added</th>
                                <th scope="col" class="text-center">Added By</th>
                                <th scope="col" class="text-center">Active</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row = mysqli_fetch_array($select_type)){
                                if($start_from<$i){
                                    $type_id = $row['NoteTypeID'];
                            
                        ?>
                            <tr>
                                <td scope="row" class="text-center"><?php echo $srno++ ?></td>
                                <td class="text-center"><?php echo $row['Name'] ?></td>
                                <td class="text-center"><?php echo $row['Description'] ?></td>
                                <td class="text-center"><?php echo $row['CreatedDate'] ?></td>
                                <td class="text-center"><?php echo $row['FirstName'] ?><?php echo " " ?><?php echo $row['LastName'] ?></td>
                                <td class="text-center"><?php if($row["IsActive"] == 1){ echo "Yes"; }else{ echo "No"; } ?></td>
                                <td class="text-center">
                                    <a href="../AdminPanel/AddType.php?id=<?php echo $type_id;?>"><img src="../images/edit.png" alt="edit-image"></a>
                                    <a href="../AdminPanel/DeleteType.php?id=<?php echo $type_id;?>"><img src="../images/delete.png" alt="delete-image"></a>
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
                            <a class="page-link" href="ManageType.php?page=<?php echo $page-1; ?>" aria-label="Previous">
                                <img src="../images/left-arrow.png" alt="left-arrow">
                            </a>
                        </li>
                        <?php 
                            for($i=1;$i<=$total_pages;$i++){
                        ?>
                        <li class="page-item">
                            <a class="page-link <?php if($page == $i) { echo 'active'; }?>" href="ManageType.php?page=<?php echo $i ; ?>"><?php echo $i ;?></a>
                        </li>
                        
                        <?php 
                            }
                        ?>
                        <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
                            <a class="page-link" href="ManageType.php?page=<?php echo $page+1; ?>" aria-label="Next">
                                <img src="../images/right-arrow.png" alt="right-arrow">
                            </a>
                        </li>
                    </ul>
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

    <hr class="p-0 m-0">

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

<?php
    if(isset($_POST['delete']))
    {
        echo $type_id;
    }
?>