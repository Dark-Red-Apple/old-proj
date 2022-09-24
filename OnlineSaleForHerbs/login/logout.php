<?php
session_start();

if(isset($_SESSION['user'])){
    echo "تلنعلا";
    session_unset($_SESSION['user']);
    session_destroy();
    if (isset($_COOKIE['user'])) setcookie("user", "",time( -3600),"/");
}

header("location:login.php");