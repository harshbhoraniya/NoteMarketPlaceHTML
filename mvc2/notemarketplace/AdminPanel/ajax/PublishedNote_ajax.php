<?php include "../../includes/db.php";
session_start(); ?>

<?php

(!empty(isset($_GET['search_input'])))
? $search_input = $_GET['search_input'] : $search_input = "";

(!empty(isset($_GET['search_seller'])))
? $search_seller = $_GET['search_seller'] : $search_seller = "";

if(isset($_GET['page'])){
    $page = mysqli_real_escape_string($connection, $_GET['page']);
    $page = htmlentities($page);
}
else{
    $page = 1;
}
$num_per_page = 5;
$start_from = ($page-1) * $num_per_page;
$query = "SELECT SN.`SellerNoteID` AS `SellerNoteID`, SN.`Title` AS `Title`, NC.`Name` AS `Name`, SN.`IsPaid` AS `IsPaid`, SN.`SellingPrice` AS `SellPrice`, SL.`UserID` AS `UserID`, SL.`FirstName` AS `SlFName`, SL.`LastName` AS `SlLName`, SN.`PublishedDate` AS `Date`, AC.`FirstName` AS `AcFName`, AC.`LastName` AS `AcLName` FROM `user` AS SL
            INNER JOIN `sellernotes` SN on SN.`SellerID` = SL.`UserID`
            INNER JOIN `user` AS AC on AC.`UserID` = SN.`ActionedBy`
            INNER JOIN `notecategories` AS NC on NC.`NoteCategoryID` = SN.`Category`
                WHERE SN.`Status` = '9' AND SN.`IsDeleted` = '0'";
if($search_seller != ""){
    $query .= " AND SN.`SellerID` = '$search_seller' ";
}
if ($search_input != "") {
    $query .= " AND ( SL.`FirstName` LIKE '%$search_input%' OR SL.`LastName` LIKE '%$search_input%' 
    OR AC.`FirstName` LIKE '%$search_input%' OR AC.`LastName` LIKE '%$search_input%' 
    OR NC.`Name` LIKE '%$search_input%' 
    OR SN.`Title` LIKE '%$search_input%' 
    OR SN.`IsPaid` LIKE '%$search_input%' 
    OR SN.`SellingPrice` LIKE '%$search_input%' 
    OR SN.`PublishedDate` LIKE '%$search_input%' ) ";
}


$query .= "ORDER BY SN.`SellerNoteID`";

$select_notes = mysqli_query($connection, $query);
$total_records = mysqli_num_rows($select_notes);
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
                    <th scope="col">Note Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sell Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Seller</th>
                    <th scope="col"></th>
                    <th scope="col">Published Date</th>
                    <th scope="col">Approved By</th>
                    <th class="text-center" scope="col">Number of<br>Downloads</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($row = mysqli_fetch_array($select_notes)){
                    if($start_from<$i){
                        $note_id = $row['SellerNoteID'];
            ?>
                <tr>
                    <td class="text-center" scope="row"><?php echo $srno++ ?></td>
                    <td class="td-blue"><?php echo $row['Title'] ?></td>
                    <td><?php echo $row['Name'] ?></td>
                    <td>Paid</td>
                    <td>$<?php echo $row['SellPrice'] ?></td>
                    <td><?php echo $row['SlFName'] . " " . $row['SlLName'] ?></td>
                    <td>
                        <a href="MemberDetails.php?id=<?php echo $row['UserID'] ?>"><img src="../images/eye.png" alt="eye-image"></a>
                    </td>
                    <td><?php echo date('d-m-Y, H:m', strtotime($row['Date'])) ?></td>
                    <td><?php echo $row['AcFName'] . " " . $row['AcLName'] ?></td>
                    <td class="text-center td-blue">
                    <?php
                        $query = "SELECT COUNT(D.`DownloadID`) AS `Total` FROM `downloads` AS D WHERE D.`NoteID` = '$note_id'";
                        $get_count = mysqli_query($connection, $query);
                        $row = mysqli_fetch_array($get_count);
                        echo $row['Total'];
                    ?>
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="../images/dots.png" alt="dot-image">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Download Notes</a>
                                <a class="dropdown-item" href="#">View More Details</a>
                                <a class="dropdown-item" href="#">Unpublished</a>
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
            <a class="page-link" onclick="showNotePublishedNotesList(<?php echo $page-1; ?>)" aria-label="Previous">
                <img src="../images/left-arrow.png" alt="left-arrow">
            </a>
        </li>
        <?php 
            for($i=1;$i<=$total_pages;$i++){
        ?>
        <li class="page-item">
            <a class="page-link <?php if($page == $i) { echo 'active'; }?>" onclick="showNotePublishedNotesList(<?php echo $i ; ?>)"><?php echo $i ;?></a>
        </li>
        
        <?php 
            }
        ?>
        <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
            <a class="page-link" onclick="showNotePublishedNotesList(<?php echo $page+1; ?>)" aria-label="Next">
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