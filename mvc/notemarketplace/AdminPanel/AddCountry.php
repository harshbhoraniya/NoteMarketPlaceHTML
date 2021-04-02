<?php include "../includes/db.php";
ob_start();
session_start();
    if(isset($_GET['id'])){
        $country_id = $_GET['id'];
    }
    if(!isset($_SESSION['ID'])){
        ?>
        <script>
            location.replace('../FrontPanel/Login.php');
        </script>
        <?php
    }
    $user_id = $_SESSION['ID'];
?>

<?php
    if(!empty($country_id)){
        $query = "SELECT C.`CountryID`, C.`Name`, C.`CountryCode` FROM `countries` AS C
                    WHERE C.`CountryID` = '$country_id'";
        $selecy_country = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($selecy_country);
    }
?>
<?php 
$process = "";
    if(empty($country_id)){ 
        $process = "add";
    }else{ 
        $process = "edit";
    }
$valid = true;
$errors = array();

    if(isset($_POST['save'])){

        if(empty($_POST['countryname'])){
            $valid = false;
            $errors['name'] = "You must enter country name";
        }
        else{
            $country_name = mysqli_real_escape_string($connection, $_POST['countryname']);
        }
        if(empty($_POST['countrycode'])){
            $valid = false;
            $errors['code'] = "You must enter country code";
        }
        else{
            $country_code = mysqli_real_escape_string($connection, $_POST['countrycode']);
        }

        $currentdate = date("Y-m-d H:m:s");
        if($valid){
            if($process == 'add'){
                $query = "INSERT INTO `countries`(Name, CountryCode, CreatedDate, CreatedBy, ModifiedDate, ModifiedBy, IsActive) VALUES ('$country_name', '$country_code', '$currentdate', '$user_id', '$currentdate', '$user_id', '1')";
                $insert_country = mysqli_query($connection, $query);
                if($insert_country){
                    ?>
                        <script>
                            alert("Country added !!");
                            location.replace('../AdminPanel/ManageCountry.php');
                        </script>
                    <?php
                }
                else{
                    ?>
                        <script>
                            alert("Country added faild!!");
                        </script>
                    <?php
                }
            }
            else{
                $query = "UPDATE `countries` SET `Name` = '$country_name', `CountryCode` = '$country_code', `ModifiedDate` = '$currentdate', `ModifiedBy` = '$user_id', `IsActive` = '1' WHERE `CountryID` = '$country_id'";
                $update_country = mysqli_query($connection, $query);
                if($update_country){
                    ?>
                        <script>
                            alert("Country updated !!");
                            location.replace('../AdminPanel/ManageCountry.php');
                        </script>
                    <?php
                }
                else{
                    ?>
                        <script>
                            alert("Country updated faild!!");
                        </script>
                    <?php
                }
            }
        }   
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(empty($country_id)){ echo "Add ";} else{ echo "Edit ";} ?>Country | Notes Marketplace</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <!-- Navigation -->
    <?php include "includes/header.php"; ?>
    <!-- End Navigation -->

    <!-- Add Country  -->
    <section id="content">
        <div class="container">
            <form method="POST">
                <!-- Add Country Details -->
                <div class="row heading">
                    <div class="col-md-12 p-0">
                        <h1 class="heading-1"><?php if(empty($country_id)){ echo "Add ";} else{ echo "Edit ";} ?> Country</h1>
                    </div>
                </div>
                <?php if(!$valid):?>
                <div class="error" style="color: red;">
                    <?php foreach($errors as $message):?>
                        <div><?php echo htmlspecialchars($message); ?></div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="InputCountryName">Country Name <span>*</span></label>
                            <input type="text" name="countryname" class="form-control" id="InputCountryName" value="<?php if(!empty($country_id)){ echo $row['Name'];} ?>"
                                placeholder="Enter country name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="InputCountryCode">Country Code <span>*</span></label>
                            <input type="text" name="countrycode" class="form-control" id="InputCountryCode"
                                placeholder="Enter country code" value="<?php if(!empty($country_id)){ echo $row['CountryCode'];} ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button name="save" id="btnSubmit" class="btn">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Add Administrator  -->

    <hr class="p-0 m-0">

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- End Footer -->

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>

</html>