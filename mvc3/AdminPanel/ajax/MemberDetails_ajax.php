<?php include "../../includes/db.php";
session_start(); ?>

<?php

$user_id = $_SESSION['MemberID'];

if(isset($_GET['page'])){
    $page = mysqli_real_escape_string($connection, $_GET['page']);
    $page = htmlentities($page);
}
else{
    $page = 1;
}

$num_per_page = 5;
$start_from = ($page-1) * $num_per_page;

$query = "SELECT SN.SellerNoteID, SN.Title, NC.Name, RD.Value, SN.PublishedDate, SN.CreatedDate FROM notecategories AS NC 
            INNER JOIN sellernotes AS SN on SN.Category = NC.NoteCategoryID
            INNER JOIN referencedata AS RD ON RD.ReferenceDataID = SN.Status
                WHERE SN.SellerID = '$user_id' AND SN.IsDeleted = '0'";

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
                    <th scope="col" class="text-center">Sr No.</th>
                    <th scope="col">Note Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Downloaded Notes</th>
                    <th scope="col" class="text-center">Total Earnings</th>
                    <th scope="col">Date Added</th>
                    <th scope="col">Published Date</th>
                    <th scope="col" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($row = mysqli_fetch_array($select_notes)){
                    if($start_from<$i){
                        $note_id = $row['SellerNoteID'];
            ?>
                <tr>
                    <td scope="row" class="text-center"><?php echo $srno++ ?></td>
                    <td class="td-text"><?php echo $row['Title'] ?></td>
                    <td><?php echo $row['Name'] ?></td>
                    <td><?php echo $row['Value'] ?></td>
                    <td class="text-center td-text">
                        <?php
                            $query = "SELECT COUNT(D.DownloadID) AS Total FROM downloads AS D WHERE D.NoteID = '$note_id' AND D.IsSellerHasAllowedDownload = '1'";
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
                            $query = "SELECT SUM(D.PurchasedPrice) AS Total FROM downloads AS D WHERE D.NoteID = '$note_id' AND D.IsSellerHasAllowedDownload = '1'";
                            $select_total = mysqli_query($connection, $query); 
                            $results = mysqli_fetch_array($select_total);
                            if($results['Total'] != null)
                                echo $results['Total'];
                            else
                                echo "0";
                        ?>
                    </td>
                    <td><?php echo date('d-m-Y, H:m', strtotime($row['CreatedDate'])) ?></td>
                    <td><?php echo date('d-m-Y, H:m', strtotime($row['PublishedDate'])) ?></td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="../images/dots.png" alt="dot-image">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Download Notes</a>
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
                <a class="page-link" onclick="showMemberNotesList(<?php echo $page-1; ?>)" aria-label="Previous">
                    <img src="../images/left-arrow.png" alt="left-arrow">
                </a>
            </li>
            <?php 
                for($i=1;$i<=$total_pages;$i++){
            ?>
            <li class="page-item">
                <a class="page-link <?php if($page == $i) { echo 'active'; }?>" onclick="showMemberNotesList(<?php echo $i ; ?>)"><?php echo $i ;?></a>
            </li>
                
            <?php 
                }
            ?>
            <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
                <a class="page-link" onclick="showMemberNotesList(<?php echo $page+1; ?>)" aria-label="Next">
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