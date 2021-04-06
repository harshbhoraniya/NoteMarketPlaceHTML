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

$query = "SELECT U.`FirstName` AS FirstName, U.`LastName` AS LastName, C.`CountryID` AS CountryID , C.`Name` AS CountryName, C.`CountryCode` AS CountryCode, C.`CreatedDate` AS CreatedDate, C.`IsActive` as IsActive FROM `user` AS U 
            INNER JOIN `countries` AS C ON C.`CreatedBy` = U.`UserID`
                WHERE C.`IsDeleted` = '0'";
if ($search_input != "") {
    $query .= " AND ( U.`FirstName` LIKE '%$search_input%' OR U.`LastName` LIKE '%$search_input%' 
    OR C.`Name` LIKE '%$search_input%' 
    OR C.`CountryCode` LIKE '%$search_input%' 
    OR C.`CreatedDate` LIKE '%$search_input%' 
    OR C.`IsActive` LIKE '%$search_input%')";
}
$select_country = mysqli_query($connection, $query);
$total_records = mysqli_num_rows($select_country);
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
                <th scope="col" class="text-center">Country Name</th>
                <th class="text-center" scope="col">Country Code</th>
                <th scope="col" class="text-center">Date Added</th>
                <th scope="col" class="text-center">Added By</th>
                <th scope="col" class="text-center">Active</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($row = mysqli_fetch_array($select_country)){
                if($start_from<$i){
                    $country_id = $row['CountryID'];
            
        ?>
            <tr>
                <td scope="row" class="text-center"><?php echo $srno++; ?></td>
                <td class="text-center"><?php echo $row['CountryName']; ?></td>
                <td class="text-center"><?php echo $row['CountryCode']; ?></td>
                <td class="text-center"><?php echo $row['CreatedDate']; ?></td>
                <td class="text-center"><?php echo $row['FirstName']; echo " "; echo $row['LastName']; ?></td>
                <td class="text-center"><?php if($row["IsActive"] == 1){ echo "Yes"; }else{ echo "No"; } ?></td>
                <td class="text-center">
                    <a href="../AdminPanel/AddCountry.php?id=<?php echo $country_id;?>"><img src="../images/edit.png" alt="edit-image"></a>
                    <a href="../AdminPanel/DeleteCountry.php?id=<?php echo $country_id;?>"><img src="../images/delete.png" alt="delete-image"></a>
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
            <a class="page-link" onclick="showCountryList(<?php echo $page-1; ?>)" aria-label="Previous">
                <img src="../images/left-arrow.png" alt="left-arrow">
            </a>
        </li>
        <?php 
            for($i=1;$i<=$total_pages;$i++){
        ?>
        <li class="page-item">
            <a class="page-link <?php if($page == $i) { echo 'active'; }?>" onclick="showCountryList(<?php echo $i ; ?>)"><?php echo $i ;?></a>
        </li>
        
        <?php 
            }
        ?>
        <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
            <a class="page-link" onclick="showCountryList(<?php echo $page+1; ?>)" aria-label="Next">
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