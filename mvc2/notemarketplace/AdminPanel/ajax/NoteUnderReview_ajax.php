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
    
                    $query = "SELECT SN.`SellerNoteID`, SN.`Title`, NC.`Name`, U.`UserID`, U.`FirstName`, U.`LastName`, SN.`CreatedDate`, Rd.`Value` FROM `user` AS U
                                INNER JOIN `sellernotes` AS SN ON SN.`SellerID` = U.`UserID`
                                INNER JOIN `notecategories` AS NC on NC.`NoteCategoryID` = SN.`Category`
                                INNER JOIN `referencedata` AS RD on RD.`ReferenceDataID` = SN.`Status`
                                    WHERE SN.`Status` IN (7,8) ";

                    if($search_seller != ""){
                        $query .= " AND SN.`SellerID` = '$search_seller' ";
                    }

                    if ($search_input != "") {
                        $query .= " AND ( U.`FirstName` LIKE '%$search_input%' OR U.`LastName` LIKE '%$search_input%' 
                        OR NC.`Name` LIKE '%$search_input%' 
                        OR SN.`Title` LIKE '%$search_input%' 
                        OR SN.`CreatedDate` LIKE '%$search_input%' 
                        OR RD.`Value` LIKE '%$search_input%') ";
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

                <form method="POST">
                <div class="row">
                    <div class="table-top table-responsive">
                        <table class="table" style="white-space: nowrap; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Sr No.</th>
                                    <th scope="col">Note Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Seller</th>
                                    <th scope="col"></th>
                                    <th scope="col">Date Added</th>
                                    <th scope="col">Status</th>
                                    <th class="text-center" scope="col">Action</th>
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
                                    <td class="text-center" scope="row"><?php echo $srno++; ?></td>
                                    <td class="td-blue"><?php echo $row['Title'] ?></td>
                                    <td><?php echo $row['Name'] ?></td>
                                    <td><?php echo $row['FirstName']. " ". $row['LastName'] ?></td>
                                    <td>
                                        <a href="MemberDetails.php?id=<?php echo $row['UserID'] ?>"><img src="../images/eye.png" alt="eye-image"></a>
                                    </td>
                                    <td style="white-space: nowrap;"><?php echo date('d-m-Y, H:m', strtotime($row['CreatedDate'])) ?></td>
                                    <td><?php echo $row['Value'] ?></td>
                                    <td class="text-center ">
                                        <div class="td-action">
                                            <a href="Approve.php?noteid=<?php echo $note_id;?>" name="approve" class="btn btn-action btn-approve">Approve</button>
                                            <a type="button" href="#" class="btn btn-action btn-reject"
                                                data-toggle="modal" data-target="#exampleModal">Reject</a>
                                            <button type="button"
                                                class="btn btn-action btn-interview ">InReview</button>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <img src="../images/dots.png" alt="dot-image">
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
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
                            <a class="page-link" onclick="showNoteUnderReviewList(<?php echo $page-1; ?>)" aria-label="Previous">
                                <img src="../images/left-arrow.png" alt="left-arrow">
                            </a>
                        </li>
                        <?php 
                            for($i=1;$i<=$total_pages;$i++){
                        ?>
                        <li class="page-item">
                            <a class="page-link <?php if($page == $i) { echo 'active'; }?>" onclick="showNoteUnderReviewList(<?php echo $i ; ?>)"><?php echo $i ;?></a>
                        </li>
                        
                        <?php 
                            }
                        ?>
                        <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
                            <a class="page-link" onclick="showNoteUnderReviewList(<?php echo $page+1; ?>)" aria-label="Next">
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
        </form>

        <!-- Modal -->
    <form method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 100px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title heading-2" id="exampleModalLabel">Human Body - Science</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="../images/close.png" alt="close-image" aria-hidden="true">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputRemarks">Remarks</label>
                        <textarea name="remarks" class="form-control" id="exampleInputRemarks"
                            placeholder="Write Remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: flex-end">
                    <div class="form-group">
                        <div class="row text-right">
                            <button href="" name="rejected" class="btn btn-modal btn-reject">Reject</button>
                            <a href="#" class="btn btn-modal btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- End Modal -->

