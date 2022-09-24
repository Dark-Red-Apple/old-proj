<?php
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
try {

    $sql = "SELECT customer_id  FROM customers WHERE customer_username='$user' AND customer_pass='$pass'";
    $stmt = $con->query($sql);
    $n = $stmt->rowCount();
    echo '<br><div class="info"> تعداد ' . $n . ' رکورد یافت شد' . '<br>';
    if ($n <= 0) {
        die('<div class="wrong">اطلاعات ورود اشتباه می باشد</div>');
    } else {
        $n = $stmt->rowCount();
        $row_login = $stmt->fetchObject();
        $customer_id = $row_login->customer_id;
        $_SESSION['user'] = $customer_id;
        echo $_SESSION['user'];
        echo '</br>';
        if (isset($_POST['remember'])) {
            setcookie('user', $user, time() + (86400 * 30), "/", false); // 86400 = 1 day, total  1 month
            echo isset($_COOKIE['user']);
            echo "user cookie value is: " . $_COOKIE['user'];
        }
        echo 'ffg' . $_COOKIE['user'];
//            header('Location:user/products.php');
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}