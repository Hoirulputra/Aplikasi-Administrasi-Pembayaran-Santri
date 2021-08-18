<?php 
    unset($_COOKIE['logged_username']);
    setcookie('logged_username', null, -1);
    unset($_COOKIE['logged_akses']);
    setcookie('logged_akses', null, -1);
    header('location:login.php');
?>