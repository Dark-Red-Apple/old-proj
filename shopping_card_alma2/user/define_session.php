<?php
//ob_start();
session_start();
require_once('../include/connect.php');
require_once('connectDB.php');

try {
    if(isset($_SESSION['user'])){
        $stmt_customer=customerInfo();
    }elseif (isset($_COOKIE['user'])) {
        $_SESSION['user'] = $_COOKIE['user'];
        $stmt_customer=customerInfo();
    }else{
        newCustomer();
        $stmt_customer=customerInfo();
    }
    if ($stmt_customer->rowCount()<=0) {
        newCustomer();
        $stmt_customer=customerInfo();
    }
    $row_customer=$stmt_customer->fetchObject();
    $is_guest = $row_customer->customer_is_guest;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
function customerInfo(){
    try {
        $con = connectDB2();
        $customer_id = $_SESSION['user'];
        $stmt_customer = $con->query("SELECT customer_is_guest,customer_name FROM customers WHERE customer_id='$customer_id'");
        $con = null;
        return ($stmt_customer);
    }catch (PDOException $e){
        echo 'Error:'.$e->getMessage();
    }
}
function newCustomer(){
    try {
        $con = connectDB2();
        setcookie('user', "", time() - 3600, "/");
        session_destroy();
        session_unset();
        session_start();
        $stmt = $con->query("INSERT INTO customers (customer_is_guest) VALUES ('1')");
        $last_id = $con->lastInsertId();
        setcookie('user', $last_id, time() + (86400 * 30), "/", false);
        $_SESSION['user'] = $last_id;
        $con = null;
    }catch (PDOException $e){
        echo 'Error:'.$e->getMessage();
    }
}
?>