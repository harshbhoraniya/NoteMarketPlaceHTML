
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
                            <li class="nav-item"><a id="a-search" onclick="dodajAktywne(this)" class="nav-link " href="Search.php">Search Notes</a></li>
                            <li class="nav-item"><a id="a-sell" onclick="dodajAktywne(this)" class="nav-link" href="AddNotes.php">Sell Your Notes</a></li>
                            <li class="nav-item"><a id="a-faq" onclick="dodajAktywne(this)" class="nav-link" href="FAQ.php">FAQ</a></li>
                            <li class="nav-item"><a id="a-contact" onclick="dodajAktywne(this)" class="nav-link" style="margin-right: 10px;" href="ContactUs.php">Contact Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>
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
                                <li class="nav-item"><a class="nav-link" href="AddNotes.php">Sell Your Notes</a></li>
                                <li class="nav-item"><a class="nav-link" href="FAQ.php">FAQ</a></li>
                                <li class="nav-item"><a class="nav-link" href="ContactUs.php">Contact Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>