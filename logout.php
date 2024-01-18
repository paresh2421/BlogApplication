<?php 
    // $_SESSION = [];
    session_start();
    session_unset();
    session_destroy();
    header('location: signinPage.php');
    exit;
?>  