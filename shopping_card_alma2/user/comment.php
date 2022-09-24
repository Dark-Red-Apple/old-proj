<?php
require_once('define_session.php');
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_customer_name']) && isset($_POST['comment_submit'])) {
        $customer_id = $_SESSION['user'];
        $c_customer_name = $_POST['comment_customer_name'];
        $c_product_id = $_GET['product_id'];
        $c_customer_desc = $_POST['comment_desc'];
        $c_rating1 = isset($_POST['rating1']) ? $_POST['rating1'] : null;
        $c_rating2 = isset($_POST['rating2']) ? $_POST['rating2'] : null;
        $c_rating3 = isset($_POST['rating3']) ? $_POST['rating3'] : null;
        $stmt = $con->query("INSERT INTO pcomments (comment_customer_id,comment_product_id,comment_customer_name,comment_desc,comment_rating1,comment_rating2,comment_rating3)
VALUES ('$customer_id','$c_product_id', '$c_customer_name','$c_customer_desc', '$c_rating1', '$c_rating2', '$c_rating3')");
        if ($stmt) {
            $_SESSION['message'] = 2;
            header('location:single_product.php' . htmlspecialchars('?' . $_SERVER['QUERY_STRING']));
        }
    } else {
        header('error.php');
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}