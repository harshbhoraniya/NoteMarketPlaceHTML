<?php include "../../includes/db.php"; session_start(); ?>

<?php 
$user_id = $_SESSION['ID'];

(!empty(isset($_GET['search_input'])))
? $search_input = $_GET['search_input'] : $search_input = "";

                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    $page = mysqli_real_escape_string($connection, $page);
                    $page = htmlentities($page);
                }
                else{
                    $page = 1;
                }

                $num_per_page = 5;
                $start_from = ($page-1) * $num_per_page;

                $query = "SELECT D.`NoteTitle`, D.`NoteCategory`, U.`EmailID`, UP.`CountryCode`, UP.`PhoneNumber`, D.`IsPaid`, D.`PurchasedPrice`, D.`AttachmentDownloadedDate` FROM `user` AS U INNER JOIN `userprofile` AS UP ON UP.`UserID` = U.`UserID` INNER JOIN `downloads` AS D ON d.`Downloader` = U.`UserID` WHERE D.`IsSellerHasAllowedDownload` = '1' AND U.`IsEmailVerified` = '1' AND D.`Seller` = '$user_id'";
                if ($search_input != "") {
                    $query .= " AND (D.`NoteTitle` LIKE '%$search_input%' OR D.`NoteCategory` LIKE '%$search_input%' 
                    OR U.`EmailID` LIKE '%$search_input%' OR UP.`CountryCode` LIKE '%$search_input%' 
                    OR UP.`PhoneNumber` LIKE '%$search_input%'
                    OR D.`IsPaid` LIKE '%$search_input%' 
                    OR D.`PurchasedPrice` LIKE '%$search_input%')";
                }
                $select_query = mysqli_query($connection, $query);
                $total_records = mysqli_num_rows($select_query);
                $total_pages = ceil($total_records / $num_per_page);
                $i=1;
                $k = $num_per_page + $start_from;
                $srno = 1;
                if($total_records != 0){
            ?>

            <div class="row">
                <div class="table-top table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Sr No.</th>
                                <th scope="col">Note Title</th>
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
                           
                            while($row = mysqli_fetch_array($select_query)){
                                if($start_from<$i){
                        ?>
                            <tr>
                                <td class="text-center" scope="row"><?php echo $srno; ?></td>
                                <td class="td-blue"><?php echo $row["NoteTitle"] ?></td>
                                <td><?php echo $row["NoteCategory"] ?></td>
                                <td><?php echo $row['EmailID'] ?></td>
                                <td><?php echo $row["CountryCode"] ?><?php echo $row["PhoneNumber"] ?></td>
                                <td><?php if($row["IsPaid"] == 1){ echo "Paid"; }else{ echo "Free"; } ?></td>
                                <td>$<?php echo $row["PurchasedPrice"] ?></td>
                                <td><?php echo $row["AttachmentDownloadedDate"] ?></td>
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
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                                $i++;
                                $srno++;
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
                        <a class="page-link" onclick="showSoldNotes(<?php echo $page-1 ; ?>)" aria-label="Previous">
                            <img src="../images/left-arrow.png" alt="left-arrow">
                        </a>
                    </li>
                    <?php 
                            for($i=1;$i<=$total_pages;$i++){
                        ?>
                        <li class="page-item">
                            <a class="page-link <?php if($page == $i) { echo 'active'; }?>" onclick="showSoldNotes(<?php echo $i ; ?>)"><?php echo $i ;?></a>
                        </li>
                        
                        <?php 
                            }
                        ?>
                    <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
                        <a class="page-link" onclick="showSoldNotes(<?php echo $page+1 ; ?>)" aria-label="Next">
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