<?php
    session_start();
    if(isset($_SESSION['username'], $_SESSION['loggedIn'])){
        // unset session
        //unset($_SESSION['username']);
        //unset($_SESSION['loggedIn']);

        // destroy all sessions
        session_destroy();
        // redirect to login page
        header("Location: login.php");
        // for security
        exit();
    }else{
        sleep(3);
        // redirect to login page
        header("Location: login.php");
        // for security
        exit();
    }
?>
