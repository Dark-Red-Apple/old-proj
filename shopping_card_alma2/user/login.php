<?php
/**
 * Created by PhpStorm.
 * User: Alma
 * Date: 2/15/2017
 * Time: 3:21 PM
 *
 */
if (isset($_SESSION['message'])) unset($_SESSION['message']);
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['submit']) && $is_guest == 1) {

        login();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

function login()
{
    $con = connectDB2();
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    try {

        $sql = "SELECT customer_id  FROM customers WHERE customer_username='$user' AND customer_pass='$pass'";
        $stmt = $con->query($sql);
        $n = $stmt->rowCount();
//        echo '<br><div class="info"> تعداد ' . $n . ' رکورد یافت شد' . '<br>';
        if ($n <= 0) {
            $_SESSION['message'] = 1;
            header('Location:customer_register.php');
            $login_err = true;
        } else {
            ob_start();
            setcookie('user', "", time() - 30600, "/"); // 1 hour ago
            //    echo 'cookie after remove it:'.$_COOKIE['user'];
            //    echo '</br>';
            $row_login = $stmt->fetchObject();
            $customer_id = $row_login->customer_id;
            changeOrderCustomerID($_SESSION['user'], $customer_id);
            session_unset($_SESSION['user']);
            $_SESSION['user'] = $customer_id;
//            echo 'session after login:' . $_SESSION['user'];
            echo '</br>';
            if (isset($_POST['remember'])) {
                setcookie('user', $_SESSION['user'], time() + (86400 * 30), "/", false); // 86400 = 1 day, total  1 month
                echo 'cookie is set?:' . isset($_COOKIE['user']);
                echo '</br>';
                echo "user cookie value is: " . $_COOKIE['user'];
                echo '</br>';
            }
//            echo 'cookie after login:' . $_COOKIE['user'];
            header('Location:products.php');
            ob_end_flush();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function changeOrderCustomerID($old_customer_id, $new_customer_id)
{
    try {
        $con = connectDB2();
        $stmt = $con->query("SELECT invoice_id FROM invoices WHERE customer_id='$new_customer_id' AND invoice_state='unconfirmed'");
        $rowCount = $stmt->rowCount();
        if ($rowCount == 0) {
            $stmt = $con->query("UPDATE invoices SET customer_id='$new_customer_id' WHERE customer_id='$old_customer_id' ");
        } else {
            $row = $stmt->fetchObject();
            $new_invoice_id = $row->invoice_id;
            /////////////////
            $stmt = $con->query("SELECT product_id FROM orders WHERE invoice_id='$new_invoice_id'");
            while ($row = $stmt->fetchObject()) {
                $product_ids[] = $row->product_id;
            }
            $product_ids = implode("','", $product_ids);

            $con->query("UPDATE orders SET invoice_id='$new_invoice_id' WHERE
 invoice_id IN (SELECT invoice_id FROM invoices WHERE customer_id='$old_customer_id' AND invoice_state='unconfirmed')
  AND product_id  NOT IN ('$product_ids') ");

            /////////////////////
//        $stmt = $con->query("SELECT invoice_id FROM invoices WHERE customer_id='$old_customer_id' AND invoice_state='unconfirmed'");
//            $invoice_id = $row->invoice_id;
            ///////////////
//            $con->query("UPDATE orders SET invoice_id=' $new_invoice_id' WHERE (invoice_id IN
//        (SELECT invoice_id FROM invoices WHERE customer_id='$old_customer_id' AND invoice_state='unconfirmed'))
//        AND product_id  NOT IN (SELECT ord.product_id FROM (SELECT * FROM orders) AS ord WHERE ord.invoice_id=' $new_invoice_id') ");
            ///////////
//        $con->query("DELETE FROM invoices WHERE customer_id='$old_customer_id' AND invoice_state='unconfirmed'");
//            $con->query("UPDATE invoices SET customer_id='$new_customer_id' WHERE customer_id='$old_customer_id' AND invoice_state!='unconfirmed'");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
