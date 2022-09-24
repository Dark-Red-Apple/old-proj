<?php
session_start();
if (isset($_SESSION['user'])) {
    setcookie('user', "", time() - 3600, "/"); // 1 hour ago

    session_unset($_SESSION['user']);
    session_destroy();

//    if (!isset($_SESSION['user'])) echo "session removed successfully";
    header('location:index.php');
//    echo '<br><br><div class="info">شما  پس از 3 ثانیه به صفحه ورود منتقل خواهید شد</div>';
//    echo '<script>window.setTimeout(function(){ window.location = "index.php"; },0);</script>';
}


