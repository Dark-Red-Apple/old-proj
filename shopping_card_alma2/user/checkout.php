<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {

    date_default_timezone_set("Asia/Tehran");
    $date = date("Y/m/d H:i:s e P");
    require_once('../include/connect.php');
    $customer_id = $_SESSION['user'];
    try {
        $stmt = $con->query("SELECT * FROM customers WHERE customer_id='$customer_id'");
        $row_customer = $stmt->fetchObject();
        $is_guest = $row_customer->customer_is_guest;
        $invoice_delivery_method = $_POST['invoice_shipping_method'];
        $invoice_payment_method = $_POST['invoice_payment_method'];

        if ($is_guest == 0) {
            $address_choices = $_POST['address_choices'];
            if ($address_choices == 'new') {
                $invoice_email = $row_customer->customer_email;
                $invoice_name = $_POST['customer_title'] . ' ' . $_POST['customer_family'];
                $invoice_address = $_POST['customer_address'] . '-' . $_POST['customer_postal_code'];
                $invoice_tel = $_POST['customer_tel'];
            } else {
                $invoice_email = $row_customer->customer_email;
                $invoice_name = $row_customer->customer_title . ' ' . $row_customer->customer_family;
                $invoice_address = $row_customer->customer_address . '-' . $row_customer->customer_postal_code;
                $invoice_tel = $row_customer->customer_tel;
            }
        } else {
            $invoice_email = $_POST['customer_email'];
            $invoice_name = $_POST['customer_title'] . ' ' . $_POST['customer_family'];
            $invoice_address = $_POST['customer_address'] . '-' . $_POST['customer_postal_code'];
            $invoice_tel = $_POST['customer_tel'];
        }
        $stmt = $con->query("SELECT invoice_id FROM invoices WHERE customer_id='$customer_id' AND invoice_state='unconfirmed'");
        if ($stmt) {
            $row = $stmt->fetchObject();
            $invoice_id = $row->invoice_id;
            echo $invoice_name;
            $stmt_invoice = $con->query("UPDATE invoices SET invoice_email='$invoice_email',invoice_name='$invoice_name',invoice_address='$invoice_address',invoice_tel='$invoice_tel',invoice_state='confirmed',invoice_date='$date',invoice_delivery_method='$invoice_delivery_method',invoice_payment_method='$invoice_payment_method',customer_kind='$is_guest' WHERE invoice_id='$invoice_id'");
        }
        if ($stmt_invoice) header('location:checkout_successful.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header('location:error.php');
}