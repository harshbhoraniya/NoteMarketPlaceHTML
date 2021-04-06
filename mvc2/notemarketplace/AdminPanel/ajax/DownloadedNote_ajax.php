<?php include "../../includes/db.php";
session_start(); ?>

<?php

(!empty(isset($_GET['search_input'])))
? $search_input = $_GET['search_input'] : $search_input = "";

(!empty(isset($_GET['search_seller'])))
? $search_seller = $_GET['search_seller'] : $search_seller = "";

(!empty(isset($_GET['search_buyer'])))
? $search_buyer = $_GET['search_buyer'] : $search_buyer = "";

        if(isset($_GET['page'])){
            $page = mysqli_real_escape_string($connection, $_GET['page']);
            $page = htmlentities($page);
        }
        else{
            $page = 1;
        }
        $num_per_page = 5;
        $start_from = ($page-1) * $num_per_page;
        $query = "SELECT D.`NoteTitle` AS Title, D.`NoteCategory` AS Category, BU.`UserID` AS BuyerID, BU.`FirstName` AS BuFName, BU.`LastName` AS BuLName, SL.`UserID` AS SellerID, SL.`FirstName` AS SlFName, SL.`LastName` AS SlLName, D.`IsPaid` As IsPaid, D.`PurchasedPrice` AS SellPrice, D.`AttachmentDownloadedDate` AS DownloadDate FROM `user` AS SL
                    INNER JOIN `downloads` AS D on D.`Seller` = SL.`UserID`
                    INNER JOIN `user` AS BU on BU.`UserID` = D.`Downloader`
                        WHERE D.`IsSellerHasAllowedDownload` = '1' AND D.`IsDeleted` = '0'";
        if($search_seller != ""){
            $query .= " AND D.`Seller` = '$search_seller' ";
        }
        if($search_buyer != ""){
            $query .= " AND D.`Downloader` = '$search_buyer' ";
        }
        if ($search_input != "") {
            $query .= " AND ( SL.`FirstName` LIKE '%$search_input%' OR SL.`LastName` LIKE '%$search_input%' 
            OR BU.`FirstName` LIKE '%$search_input%' OR BU.`LastName` LIKE '%$search_input%' 
            OR D.NoteCategory LIKE '%$search_input%' 
            OR D.`NoteTitle` LIKE '%$search_input%' 
            OR D.`AttachmentDownloadedDate` LIKE '%$search_input%' 
            OR D.`PurchasedPrice` LIKE '%$search_input%' 
            OR D.`IsPaid` LIKE '%$search_input%') ";
        }
        
        
        $query .= "ORDER BY Title";
        
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
                    <th scope="col">Buyer</th>
                    <th scope="col"></th>
                    <th scope="col">Seller</th>
                    <th scope="col"></th>
                    <th scope="col">Sell Type</th>
                    <th scope="col">Price</th>
                    <th class="text-center" scope="col">Downloaded<br>Date/Time</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($row = mysqli_fetch_array($select_notes)){
                    if($start_from<$i){
            ?>
                <tr>
                    <td class="text-center" scope="row"><?php echo $srno++ ?></td>
                    <td class="td-blue"><?php echo $row['Title'] ?></td>
                    <td><?php echo $row['Category'] ?></td>
                    <td><?php echo $row['BuFName']." ".$row['BuLName'] ?></td>
                    <td>
                        <img src="../images/eye.png" alt="eye-image">
                    </td>
                    <td><?php echo $row['SlFName'] ." ". $row['SlLName'] ?></td>
                    <td>
                        <img src="../images/eye.png" alt="eye-image">
                    </td>
                    <td><?php if($row['IsPaid'] == 0){ echo "Free";}else{ echo "Paid"; } ?></td>
                    <td>$<?php echo $row['SellPrice'] ?></td>
                    <td class="text-center"><?php echo date('d-m-Y, H:m', strtotime($row['Category'])) ?></td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="../images/dots.png" alt="dot-image">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Download Notes</a>
                                <a class="dropdown-item" href="#">View More Details</a>
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
            <a class="page-link" onclick="showDownloadedNotesList(<?php echo $page-1; ?>)" aria-label="Previous">
                <img src="../images/left-arrow.png" alt="left-arrow">
            </a>
        </li>
        <?php 
            for($i=1;$i<=$total_pages;$i++){
        ?>
        <li class="page-item">
            <a class="page-link <?php if($page == $i) { echo 'active'; }?>" onclick="showDownloadedNotesList(<?php echo $i ; ?>)"><?php echo $i ;?></a>
        </li>
        
        <?php 
            }
        ?>
        <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
            <a class="page-link" onclick="showDownloadedNotesList(<?php echo $page+1; ?>)" aria-label="Next">
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