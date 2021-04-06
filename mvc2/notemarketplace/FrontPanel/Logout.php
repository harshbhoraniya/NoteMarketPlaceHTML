<?php 
session_start();
$_SESSION['ID'] = null;
session_destroy();
?>
    <script>
        location.replace('../FrontPanel/Login.php');
    </script>
<?php
?>


