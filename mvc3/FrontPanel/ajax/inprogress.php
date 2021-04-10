<?php include "../../includes/db.php"; ?>
<?php
session_start();
$user_id = $_SESSION['ID'];
$total_records = 0;

(!empty(isset($_GET['search_input'])))
? $search_input = $_GET['search_input'] : $search_input = "";

    $query = "SELECT SN.`SellerNoteID`, SN.`CreatedDate`, SN.`Title`, NC.`Name`, RD.`Value` FROM `notecategories` AS NC 
                INNER JOIN `sellernotes` AS SN on SN.`Category` = NC.`NoteCategoryID` 
                INNER JOIN `referencedata` AS RD on RD.`ReferenceDataID` = SN.`Status` 
                    WHERE SN.`SellerID` = '$user_id' AND SN.`IsDeleted` = '0' ";

    if($search_input != ""){
        $query .= " AND (SN.`CreatedDate` LIKE '%$search_input%' 
                        OR SN.`Title` LIKE '%$search_input%' 
                        OR NC.`Name` LIKE '%$search_input%' 
                        OR RD.`Value` LIKE '%$search_input%')";
    }
    
    $num_per_page = 5;
    $select_notes = mysqli_query($connection, $query);
    $total_records = mysqli_num_rows($select_notes);
    $total_pages = ceil($total_records / $num_per_page);
    if($total_records != 0){

?>

<div class="row">
                <div class="table-top table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Added Date</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        (!empty(isset($_GET['page'])))
                        ? $page = $_GET['page'] : $page = 1;
                        $start_from = ($page-1) * $num_per_page;
                        $i=1;
                        $k=  $num_per_page + $start_from;
                        while($row = mysqli_fetch_assoc($select_notes)){
                            if($start_from < $i){
                                $created_date  = $row['CreatedDate'];
                        ?>
                            <tr>
                                <td scope="row"><?php echo date('d-m-Y', strtotime($created_date)); ?></td>
                                <td class="td-blue"><?php echo $row['Title']?></td>
                                <td><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['Value'] ?></td>
                                <td class="text-center">
                                    <img src="../images/edit.png" alt="edit-image">
                                    <img src="../images/delete.png" alt="delete-image">
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
                            <a class="page-link"onclick="showInprogressNotes(<?php echo $page-1 ; ?>)" aria-label="Previous">
                                <img src="../images/left-arrow.png" alt="left-arrow">
                            </a>
                        </li>
                        <?php 
                for($i=1;$i<=$total_pages;$i++){
                    ?>
                    <li class="page-item">
                        <a class="page-link <?php if($page == $i) { echo 'active'; }?>"
                        onclick="showInprogressNotes(<?php echo $i; ?>)"><?php echo $i ;?></a>
                    </li>
                    <?php 
                }
                    ?>
                    <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
                        <a class="page-link" onclick="showInprogressNotes(<?php echo $page+1 ; ?>)"
                            aria-label="Next">
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