<?php include "../../includes/db.php"; session_start();?>

<?php 
    $user_id = $_SESSION['ID'];

    (!empty(isset($_GET['search_input'])))
    ? $search_input = $_GET['search_input'] : $search_input = "";
    
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    $page =mysqli_real_escape_string($connection,$page);
                    $page = htmlentities($page);
                }
                else{
                    $page = 1;
                }
                $num_per_page = 5;
                $start_from = ($page-1) * $num_per_page;
                $query = "SELECT D.`NoteTitle`, D.`NoteCategory`, U.`EmailID`, D.`IsPaid`, D.`PurchasedPrice`, D.`AttachmentDownloadedDate`  FROM `user` AS U INNER JOIN downloads AS D ON D.`Downloader` = U.`UserID` WHERE D.`IsSellerHasAllowedDownload` = '1' AND U.`IsEmailVerified` = '1' AND D.`Downloader` = '$user_id'";
                if ($search_input != "") {
                    $query .= " AND (D.`NoteTitle` LIKE '%$search_input%' OR D.`NoteCategory` LIKE '%$search_input%' 
                    OR U.`EmailID` LIKE '%$search_input%' OR D.`IsPaid` LIKE '%$search_input%' 
                    OR D.`PurchasedPrice` LIKE '%$search_input%')";
                }
                $select_query = mysqli_query($connection, $query);
                
                $total_records = mysqli_num_rows($select_query);
                $total_pages = ceil($total_records / $num_per_page);
                $i=1;
                $k=  $num_per_page + $start_from;
                $srno = 1;
                if($total_records != 0 ){
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
                                <th scope="col">Sell Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">Download Date/Time</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            while($row = mysqli_fetch_array($select_query)){
                                if($start_from<$i){

                        ?>
                            <tr>
                                <td class="text-center" scope="row"><?php echo $srno++;?></td>
                                <td class="td-blue"><?php echo $row["NoteTitle"] ?></td>
                                <td><?php echo $row["NoteCategory"] ?></td>
                                <td><?php echo $_SESSION['MAILID'] ?></td>
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
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#exampleModal">Add
                                                Reviews/Feedback</a>
                                            <a class="dropdown-item" href="#">Report as Inappropriate</a>
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
                            <a class="page-link" onclick="showMyDownloads(<?php echo $page-1; ?>)" aria-label="Previous">
                                <img src="../images/left-arrow.png" alt="left-arrow">
                            </a>
                        </li>
                        <?php 
                            for($i=1;$i<=$total_pages;$i++){
                        ?>
                        <li class="page-item">
                            <a class="page-link <?php if($page == $i) { echo 'active'; }?>" onclick="showMyDownloads(<?php echo $i ; ?>)"><?php echo $i ;?></a>
                        </li>
                        
                        <?php 
                            }
                        ?>
                        <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
                            <a class="page-link" onclick="showMyDownloads(<?php echo $page+1; ?>)" aria-label="Next">
                                <img src="../images/right-arrow.png" alt="right-arrow">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" style="margin-top: 100px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title title" id="exampleModalLabel">Add Review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <img src="../images/close.png" alt="close-image" aria-hidden="true">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row p-0 m-0">
                                <div class="form-group">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputComment1">Comments <span>*</span></label>
                                <textarea name="comments" class="form-control" id="exampleInputComment1"
                                    placeholder="Comments..." rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <a href="#" id="btn-Submit" class="btn">SUBMIT</a>
                            </div>
                        </div>
                    </div>
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