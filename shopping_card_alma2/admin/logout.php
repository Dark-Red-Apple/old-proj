<?php
session_start();

// remove user cookie
setcookie('admin', "", time() - 3600, "/"); // 1 hour ago


// Unset(remove) all session variables
//session_unset();

session_unset($_SESSION['admin']);

// Unset(remove) user session variable

// Destroy the session
session_destroy();

if (!isset($_SESSION['admin'])) echo "session removed successfully";
echo '<br><br><div class="info">شما  پس از 3 ثانیه به صفحه ورود منتقل خواهید شد</div>';

echo '<script>window.setTimeout(function(){ window.location = "../admin_loginsga35fggs.php"; },0);</script>';

