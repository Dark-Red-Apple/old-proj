<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//deleteItems(2);
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['function'])) {

        $order_counts =(isset($_POST['quantity']))?$_POST['quantity']:null;
        $customer_id = (isset($_POST['customer_id']))?$_POST['customer_id']:null;
        $product_id = (isset($_POST['product_id']))?$_POST['product_id']:null;
        $_POST['function']($product_id, $order_counts, $customer_id);
        if ($_POST['function'] == 'addToBasket') {
            $basket_items = countBasketItems($customer_id);
            echo $basket_items;
        }
        if ($_POST['function'] == 'deleteItems') {
            $order_id=$_POST['order_id'];
            $stmt=deleteItems($order_id);
            if($stmt) {
                $basket_items = countBasketItems($_SESSION['user']);
                echo($basket_items);
            }

        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
function connectDB()
{
    require('../config.php');
    $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec("SET CHARACTER SET utf8");      // set encoding to utf-8
    return ($con);
}

function addToBasket($product_id, $order_count, $customer_id)
{
    try {
        $con = connectDB();
        $stmt = $con->query("SELECT * FROM invoices WHERE customer_id='$customer_id' AND invoice_state='unconfirmed'");
        $rowCount = $stmt->rowCount();
        date_default_timezone_set("Asia/Tehran");
        $date = date("Y/m/d H:i:s e P");
        /////////////////////////////if there is no unconfirmed invoice for this customer
        if ($rowCount == 0) {
            $con->query("INSERT INTO invoices (customer_id, invoice_date, invoice_state) VALUES ('$customer_id','$date','unconfirmed')");
            $stmt2 = $con->query("SELECT invoice_id FROM invoices WHERE customer_id='$customer_id' AND invoice_state='unconfirmed'");
            $row = $stmt2->fetchObject();
            $invoice_id = $row->invoice_id;
            $con->query("INSERT INTO orders (invoice_id, product_id, order_count) VALUES ('$invoice_id','$product_id','$order_count')");
        } /////////////////////////////if there is unconfirmed invoice for this customer
        else if ($rowCount > 0) {
            $row = $stmt->fetchObject();
            $invoice_id = $row->invoice_id;
            $stmt3 = $con->query("SELECT * FROM orders WHERE product_id='$product_id' AND invoice_id='$invoice_id'");
            $rowCount3 = $stmt3->rowCount();

            if ($rowCount3 == 0) {
                $con->query("INSERT INTO orders (invoice_id, product_id, order_count) VALUES ('$invoice_id','$product_id','$order_count')");
            }
            if ($rowCount3 > 0) {
                $con->query("UPDATE orders SET order_count='$order_count' WHERE product_id='$product_id' AND invoice_id='$invoice_id'");
            }
            countBasketItems($customer_id);
        }
        $con = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function changeQuantity($product_id, $order_count, $customer_id)
{
    try {
        $con = connectDB();
        $stmt = $con->query("SELECT * FROM invoices WHERE customer_id='$customer_id' AND invoice_state='unconfirmed'");
        $rowCount = $stmt->rowCount();
        $row = $stmt->fetchObject();
        $invoice_id = $row->invoice_id;
        $con->query("UPDATE orders SET order_count='$order_count' WHERE product_id='$product_id' AND invoice_id='$invoice_id'");
        $con = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function countBasketItems($customer_id)
{
    try {
        $con = connectDB();
        $stmt = $con->query("SELECT * FROM invoices WHERE customer_id='$customer_id' AND invoice_state='unconfirmed'");
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            $row = $stmt->fetchObject();
            $invoice_id = $row->invoice_id;
            $stmt = $con->query("SELECT * FROM orders WHERE invoice_id='$invoice_id'");
            $rowCount2 = $stmt->rowCount();
            $basket_items = $rowCount2;
            $con = null;
        } else {
            $basket_items = 0;
        }
        return ($basket_items);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function basketItems($customer_id){
    try {
        $con = connectDB();
        $sql = "SELECT * FROM invoices INNER JOIN orders ON invoices.invoice_id=orders.invoice_id INNER JOIN products ON orders.product_id=products.product_id WHERE customer_id='$customer_id' AND invoice_state='unconfirmed'";
        $stmt = $con->query($sql);
        if($stmt){
            return($stmt);
        }
        $con = null;
    }catch(PDOException $e){
        echo 'Error:'.$e->getMessage();
    }
}
function deleteItems($order_id){
    $customer_id=$_SESSION['user'];
    try {
        $con = connectDB();
        $stmt=$con->query("DELETE FROM orders WHERE order_id='$order_id'");
        if($stmt) {
//            $basket_items = countBasketItems($customer_id);
////            echo $basket_items;
        }
        $con = null;
        return($stmt);
    }catch(PDOException $e){
        echo 'Error:'.$e->getMessage();
    }
}
?>