<?php include "../includes/db.php";
ob_start();
session_start();
    if(isset($_GET['id'])){
        $type_id = $_GET['id'];
    }
    $user_id = $_SESSION['ID'];
?>

<?php
    if(!empty($type_id)){
        $query = "SELECT NT.`Name`, NT.`Description` FROM `notetype` AS NT
                    WHERE NT.`NoteTypeID` = '$type_id'";
        $selecy_country = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($selecy_country);
    }
?>
<?php 
$process = "";
    if(empty($type_id)){ 
        $process = "add";
    }else{ 
        $process = "edit";
    }
$valid = true;
$errors = array();

    if(isset($_POST['save'])){
        if(empty($_POST['name'])){
            $valid = false;
            $errors['name'] = "You must enter type name";
        }
        else{
            $name = mysqli_real_escape_string($connection, $_POST['name']);
        }

        if(empty($_POST['description'])){
            $valid = false;
            $errors['description'] = "You must enter description";
        }
        else{
            $description = mysqli_real_escape_string($connection, $_POST['description']);
        }
        $currentdate = date("Y-m-d H:m:s");

        if($valid){
            if($process == 'add'){
                $query = "INSERT INTO `notetype`(`Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES ('$name', '$description', '$currentdate', '$user_id', '$currentdate', '$user_id', '1')";
                $insert_country = mysqli_query($connection, $query);
                if($insert_country){
                    ?>
                        <script>
                            alert("Type added !!");
                            location.replace('../AdminPanel/ManageType.php');
                        </script>
                    <?php
                }
                else{
                    ?>
                        <script>
                            alert("Type added faild!!");
                        </script>
                    <?php
                }
            }
            else{
                $query = "UPDATE `notetype` SET `Name` = '$name', `Description` = '$description', `ModifiedDate` = '$currentdate', `ModifiedBy` = '$user_id', `IsActive` = '1' WHERE `NoteTypeID` = '$type_id'";
                $update_country = mysqli_query($connection, $query);
                if($update_country){
                    ?>
                        <script>
                            alert("Type updated !!");
                            location.replace('../AdminPanel/ManageType.php');
                        </script>
                    <?php
                }
                else{
                    ?>
                        <script>
                            alert("Type updated faild!!");
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
    <title><?php if(empty($type_id)){ echo "Add ";} else{ echo "Edit ";} ?>Type | Notes Marketplace</title>

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

    <!-- Add Type  -->
    <section id="content">
        <div class="container">
            <form method="POST">
                <!-- Add Type Details -->
                <div class="row heading">
                    <div class="col-md-12 p-0">
                        <h1 class="heading-1"><?php if(empty($type_id)){ echo "Add ";} else{ echo "Edit ";} ?>Type</h1>
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
                            <label for="InputType">Type <span>*</span></label>
                            <input type="text" name="name" class="form-control" id="InputType"
                                placeholder="Enter your type" value="<?php if(!empty($type_id)){ echo $row['Name'];} ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-0 p-0">
                            <label for="description">Description <span>*</span></label>
                            <textarea type="text" name="description" class="form-control" id="description"
                                placeholder="Enter your description" rows="5" ><?php if(!empty($type_id)){ echo $row['Description'];} ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button href="#" name="save" id="btnSubmit" class="btn">SUBMIT</button>
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

<?php 
    
?>