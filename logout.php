<?php
    session_start();
    if(!isset($_SESSION['email'])){
        die('Access Denied');
    }
    unset($_SESSION['email']);
    header('Location:index.php');
    return;
?>