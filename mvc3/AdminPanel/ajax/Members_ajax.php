<?php include "../../includes/db.php";
session_start(); ?>

<?php

(!empty(isset($_GET['search_input'])))
? $search_input = $_GET['search_input'] : $search_input = "";


if(isset($_GET['page'])){
    $page = mysqli_real_escape_string($connection, $_GET['page']);
    $page = htmlentities($page);
}
else{
    $page = 1;
}

$num_per_page = 5;
$start_from = ($page-1) * $num_per_page;

$query = "SELECT U.`UserID`, U.`FirstName`, U.`LastName`, U.`EmailID`, U.`CreatedDate` FROM user AS U
            WHERE U.`IsDeleted` = '0' AND U.`IsActive` = '1'";
if ($search_input != "") {
    $query .= " AND ( U.`FirstName` LIKE '%$search_input%' OR U.`LastName` LIKE '%$search_input%' 
    OR U.`EmailID` LIKE '%$search_input%' 
    OR U.`CreatedDate` LIKE '%$search_input%' )";
}
$select_member = mysqli_query($connection, $query);
$total_records = mysqli_num_rows($select_member);
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
                    <th class="text-center" scope="col">Sr No.</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Joining Date</th>
                    <th class="text-center" scope="col">Under Review Notes</th>
                    <th class="text-center" scope="col">Published Notes</th>
                    <th class="text-center" scope="col">Downloaded Notes</th>
                    <th class="text-center" scope="col">Total Expenses</th>
                    <th class="text-center" scope="col">Total Earnings</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($row = mysqli_fetch_array($select_member)){
                    if($start_from<$i){
                        $user_id = $row['UserID'];
            ?>
                <tr>
                    <td class="text-center" scope="row"><?php echo $srno++; ?></td>
                    <td><?php echo $row['FirstName'] ?></td>
                    <td><?php echo $row['LastName'] ?></td>
                    <td><?php echo $row['EmailID'] ?></td>
                    <td><?php echo date('d-m-Y, H:m', strtotime($row['CreatedDate'])) ?></td>
                    <td class="text-center table-td td-blue">
                        <?php
                            $query = "SELECT COUNT(SN.`SellerNoteID`) AS Total FROM `sellernotes` AS SN WHERE SN.`SellerID` = '$user_id' AND SN.`Status` IN ( 7,8) AND SN.`IsDeleted` = '0'";
                            $select_total = mysqli_query($connection, $query); 
                            $results = mysqli_fetch_array($select_total);
                            echo $results['Total'];
                        ?>
                    </td>
                    <td class="text-center table-td td-blue">
                        <?php
                            $query = "SELECT COUNT(SN.`SellerNoteID`) AS Total FROM `sellernotes` AS SN WHERE SN.`SellerID` = '$user_id' AND SN.`Status` ='9' AND SN.`IsDeleted` = '0'";
                            $select_total = mysqli_query($connection, $query); 
                            $results = mysqli_fetch_array($select_total);
                            echo $results['Total'];
                        ?>
                    </td>
                    <td class="text-center table-td td-blue">
                        <?php
                            $query = "SELECT COUNT(D.`DownloadID`) AS Total FROM `downloads` AS D WHERE D.`Downloader` = '$user_id' AND D.`IsSellerHasAllowedDownload` = '1'";
                            $select_total = mysqli_query($connection, $query); 
                            $results = mysqli_fetch_array($select_total);
                            echo $results['Total'];
                        ?>
                    </td>
                    <td class="text-center table-td td-blue">$
                        <?php
                            $query = "SELECT SUM(D.`PurchasedPrice`) AS Total FROM `downloads` AS D WHERE D.`Downloader` = '$user_id' AND D.`IsSellerHasAllowedDownload` = '1'";
                            $select_total = mysqli_query($connection, $query); 
                            $results = mysqli_fetch_array($select_total);
                            if($results['Total'] != null)
                                echo $results['Total'];
                            else
                                echo "0";
                        ?>
                    </td>
                    <td class="text-center">$
                        <?php
                            $query = "SELECT SUM(D.`PurchasedPrice`) AS Total FROM `downloads` AS D WHERE D.`Seller` = '$user_id' AND D.`IsSellerHasAllowedDownload` = '1'";
                            $select_total = mysqli_query($connection, $query); 
                            $results = mysqli_fetch_array($select_total);
                            if($results['Total'] != null)
                                echo $results['Total'];
                            else
                                echo "0";
                        ?>
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="../images/dots.png" alt="dot-image">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="MemberDetails.php?id=<?php echo $row['UserID'] ?>">View More Details</a>
                                <a class="dropdown-item" href="#">Deactive</a>
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
                <a class="page-link" onclick="showMemberList(<?php echo $page-1; ?>)" aria-label="Previous">
                    <img src="../images/left-arrow.png" alt="left-arrow">
                </a>
            </li>
            <?php 
                for($i=1;$i<=$total_pages;$i++){
            ?>
            <li class="page-item">
                <a class="page-link <?php if($page == $i) { echo 'active'; }?>" onclick="showMemberList(<?php echo $i ; ?>)"><?php echo $i ;?></a>
            </li>
                
            <?php 
                }
            ?>
            <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
                <a class="page-link" onclick="showMemberList(<?php echo $page+1; ?>)" aria-label="Next">
                    <img src="../images/right-arrow.png" alt="right-arrow">
                </a>
            </li>
        </ul>
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