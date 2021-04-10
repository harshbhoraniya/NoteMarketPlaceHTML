
<header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container p-0">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-md-3 navbar-header">
                        <a class="navbar-brand text-left" href="HomePage.php">
                            <img src="../images/logo.png" alt="logo">
                        </a>
                    </div>

                    <!-- Link -->
                    <div class="text-right col-md-9 collapse navbar-collapse p-0" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a id="a-search"  class="nav-link " href="../FrontPanel/Search.php">Search Notes</a></li>
                            <li class="nav-item"><a id="a-sell"  class="nav-link" href="../FrontPanel/Dashboard.php">Sell Your Notes</a>
                            </li>
                            <li class="nav-item"><a id="a-buyer"  class="nav-link" href="../FrontPanel/BuyerRequest.php">Buyer Requests</a></li>
                            <li class="nav-item"><a id="a-faq"  class="nav-link" href="../FrontPanel/FAQ.php">FAQ</a></li>
                            <li class="nav-item"><a id="a-contact"  class="nav-link" href="../FrontPanel/ContactUs.php">Contact Us</a></li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <?php
                                            $user_id = $_SESSION['ID'];
                                            $query = "SELECT UP.`ProfilePicture` FROM `userprofile` AS UP WHERE UP.`UserID` = '$user_id' AND UP.`IsDeleted` = '0'";
                                            $select_photo = mysqli_query($connection, $query);
                                            $result = mysqli_fetch_array($select_photo);
                                            if($result['ProfilePicture'] != ""){
                                        ?>
                                        <img src="../upload/<?php echo $user_id; ?>/<?php echo $result['ProfilePicture'] ?>" width="30" height="30" alt="user-image"
                                            class="d-inline-block align-top avatar-header rounded-circle">
                                        <?php
                                            }
                                            else{
                                        ?>
                                        <img src="../upload/defult/avatar.png" width="30" height="30" alt="user-image"
                                            class="d-inline-block align-top avatar-header rounded-circle">
                                        <?php
                                            }
                                        ?>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="../FrontPanel/UserProfile.php">My Profile</a>
                                        <a class="dropdown-item" href="../FrontPanel/MyDownload.php">My Download</a>
                                        <a class="dropdown-item" href="../FrontPanel/MySoldNote.php">My Sold Notes</a>
                                        <a class="dropdown-item" href="../FrontPanel/MyRejectedNote.php">My Rejected Notes</a>
                                        <a class="dropdown-item" href="../FrontPanel/ChangePassword.php">Change Password</a>
                                        <a class="dropdown-item btn-logout" href="../FrontPanel/Login.php">LogOut</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../FrontPanel/Login.php">LogOut</a></li>
                        </ul>
                    </div>

                    <!-- Mobile link -->
                    <div class="mobile-nav col-md-8 text-right">
                        <img src="../images/menu.png" alt="menu" id="mobile-nav-open-btn" class="text-right">
                    </div>

                    <div id="mobile-nav" class="text-left">
                        <span id="mobile-nav-close-btn">
                            <img src="../images/xmark.png" alt="close-image">
                        </span>
                        <div id="mobile-nav-content">
                            <ul class="nav navig">
                                <li class="nav-item"><a class="nav-link active" href="Search.php">Search Notes</a></li>
                                <li class="nav-item"><a class="nav-link" href="Dashboard.php">Sell Your Notes</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="BuyerRequest.php">Buyer Requests</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="FAQ.php">FAQ</a></li>
                                <li class="nav-item"><a class="nav-link" href="ContactUs.php">Contact Us</a></li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a href="#collapseExample3" data-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="collapseExample3"
                                            class="nav-link nav-link-custom">
                                            <?php
                                            $user_id = $_SESSION['ID'];
                                            $query = "SELECT UP.`ProfilePicture` FROM `userprofile` AS UP WHERE UP.`UserID` = '$user_id' AND UP.`IsDeleted` = '0'";
                                            $select_photo = mysqli_query($connection, $query);
                                            $result = mysqli_fetch_array($select_photo);
                                            if($result['ProfilePicture'] != ""){
                                        ?>
                                        <img src="../upload/<?php echo $user_id; ?>/<?php echo $result['ProfilePicture'] ?>" width="30" height="30" alt="user-image"
                                            class="d-inline-block align-top avatar-header rounded-circle">
                                        <?php
                                            }
                                            else{
                                        ?>
                                        <img src="../upload/defult/avatar.png" width="30" height="30" alt="user-image"
                                            class="d-inline-block align-top avatar-header rounded-circle">
                                        <?php
                                            }
                                        ?>
                                        </a>

                                        <div id="collapseExample3" class="collapse">
                                            <a class="dropdown-item" href="UserProfile.php">My Profile</a>
                                            <a class="dropdown-item" href="MyDownload.php">My Download</a>
                                            <a class="dropdown-item" href="MySoldNote.php">My Sold Notes</a>
                                            <a class="dropdown-item" href="MyRejectedNote.php">My Rejected Notes</a>
                                            <a class="dropdown-item" href="ChangePassword.php">Change Password</a>
                                            <a class="dropdown-item btn-logout" href="Login.php">LogOut</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="Login.php">LogOut</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>