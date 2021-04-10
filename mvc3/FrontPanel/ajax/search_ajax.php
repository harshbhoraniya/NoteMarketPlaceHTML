<?php include "../../includes/db.php";

(!empty(isset($_GET['search_input'])))
? $search_input = $_GET['search_input'] : $search_input = "";

(!empty(isset($_GET['search_type'])))
? $search_type = $_GET['search_type'] : $search_type = "";

(!empty(isset($_GET['search_category'])))
? $search_category = $_GET['search_category'] : $search_category = "";

(!empty(isset($_GET['search_university'])))
? $search_university = $_GET['search_university'] : $search_university = "";

(!empty(isset($_GET['search_course'])))
? $search_course = $_GET['search_course'] : $search_course = "";

(!empty(isset($_GET['search_country'])))
? $search_country = $_GET['search_country'] : $search_country = "";

(!empty(isset($_GET['search_rating'])))
? $search_rating = $_GET['search_rating'] : $search_rating = "";


    $query = "SELECT SN.`SellerNoteID`, SN.`SellerID`, SN.`Title`, SN.`UniversityName`, SN.`NumberofPages`, SN.`DisplayPicture`, SN.`PublishedDate` FROM `sellernotes` AS SN WHERE SN.`Title` LIKE '%$search_input%' AND SN.`IsActive` = '1' AND SN.`IsDeleted` = '0'";

    ($search_type != 0 && $search_type != "")
        ? $query .= " AND SN.`NoteType` ='$search_type'" : "";

    ($search_category != 0 && $search_category != "")
        ? $query .= " AND SN.`Category` ='$search_category'" : "";

    ($search_university != 0 && $search_university != "")
        ? $query .= " AND SN.`UniversityName` ='$search_university'" : "";

    ($search_course != 0 && $search_course != "")
        ? $query .= " AND SN.`Course` ='$search_course'" : "";

    ($search_country != 0 && $search_country != "")
        ? $query .= " AND SN.`Country` ='$search_country'" : "";

    ($search_rating != 0 && $search_rating != "")
        ? $query .= " AND ratings>$search_rating " : "";


    $num_per_page = 15;
    
    $select_all_notes_query = mysqli_query($connection,$query);
    $total_records = mysqli_num_rows($select_all_notes_query);
    $total_pages = ceil($total_records / $num_per_page);
    if($total_records != 0){
?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <h1 class="title">Total <?php echo $total_records?> Notes</h1>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3">
            <?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $page =mysqli_real_escape_string($connection,$page);
        $page = htmlentities($page);
    }
    else{
        $page = 1;
    }
    $start_from = ($page-1) * $num_per_page;
    $i=1;
    $k=  $num_per_page + $start_from;
    while($row = mysqli_fetch_assoc($select_all_notes_query)){
        if($start_from < $i){
        $sellernoteid = $row['SellerNoteID'];
        $sellerid = $row['SellerID'];
        $note_title = $row['Title'];
        $note_university = $row['UniversityName'];
        $note_page = $row['NumberofPages'];
        $note_image = $row['DisplayPicture'];
        $note_publishedate = $row['PublishedDate'];
        
    ?>
            <div class="col mb-4">
                <div class="card">
                    <a
                        href="http://localhost:8080/notemarketplace/FrontPanel/Notedetails.php?id=<?php echo $sellernoteid?>">
                        <img src="../upload/<?php echo $sellerid ?>/<?php echo $sellernoteid ?>/<?php echo $note_image ?>"
                            class="card-img-top" alt="note-image">
                    </a>
                    <div class="card-body">
                        <div class="card-title"><?php echo $note_title ?></div>
                        <div class="card-text">
                            <div class="card-content">
                                <span class="icon-images">
                                    <img src="../images/university.png" alt="images">
                                </span>
                                <span class="span-content">
                                    <?php echo $note_university?>
                                </span>
                            </div>
                            <div class="card-content">
                                <span class="icon-images">
                                    <img src="../images/pages.png" alt="images">
                                </span>
                                <span class="span-content">
                                    <?php echo $note_page ?>
                                </span>
                            </div>
                            <div class="card-content">
                                <span class="icon-images">
                                    <img src="../images/date.png" alt="images">
                                </span>
                                <span class="span-content">
                                    <?php echo date("D, F d Y", strtotime($note_publishedate)) ?>
                                </span>
                            </div>
                            <div class="card-content">
                                <span class="icon-images">
                                    <img src="../images/flag.png" alt="images">
                                </span>
                                <span class="span-content text-danger" style="font-size: 14px;">
                                    5 Users marked this note as inappropriate
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $select_rating = mysqli_query($connection, "SELECT AVG(SR.Ratings) AS Average, COUNT(SR.`Ratings`) AS Total FROM `sellernotesreviews` AS SR WHERE SR.`NoteID` = '$sellernoteid'");
                        $result = mysqli_fetch_array($select_rating);
                        $rating_val = $result['Average'];
                        $rating_count = $result['Total'];
                    ?>
                    <div class="card-footer bg-transparent">
                        <div id="<?php echo $sellernoteid; ?>" class="rate">
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
                        <?php echo $rating_count > 0 ? $rating_count : ""; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        $i++;
        if($i>$k){
            break;
        }
}
?>
        </div>
        <div class="row text-center">
            <div class="col-md-12 num">
                <ul class="pagination justify-content-center">
                    <li class="<?php if($page == 1){ echo 'disabled'; }?> page-item">
                        <a class="page-link" onclick="showNotes(<?php echo $page-1 ; ?>)"
                            aria-label="Previous">
                            <img src="../images/left-arrow.png" alt="left-arrow">
                        </a>
                    </li>
                    <?php 
                for($i=1;$i<=$total_pages;$i++){
                    ?>
                    <li class="page-item">
                        <a class="page-link <?php if($page == $i) { echo 'active'; }?>"
                        onclick="showNotes(<?php echo $i; ?>)"><?php echo $i ;?></a>
                    </li>
                    <?php 
                }
                    ?>
                    <li class="<?php if($page == $total_pages){ echo 'disabled'; }?> page-item">
                        <a class="page-link" onclick="showNotes(<?php echo $page+1 ; ?>)"
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
    </div>