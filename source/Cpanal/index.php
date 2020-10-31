<?php
require_once 'template/header.php';
require_once 'template/navbar.php';
session_start();
if(!isset($_SESSION['username'], $_SESSION['loggedIn'])){
    // redirect to login page
    header("Location: login.php");
    // for security
    exit();
}
?>
<div id="content">
    welcome
</div>
<?php
require_once 'template/footer.php';
?>
