<?php
require_once('connectDB.php');
setlocale(LC_MONETARY, "fa_IR");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['shipping_method']) && isset($_POST['customer_id'])) {
    try {
        $shipping_method = $_POST['shipping_method'];
        $customer_id = $_POST['customer_id'];
        $payment=payment($_POST['shipping_method'],$_POST['customer_id']);
        echo '<div><div>جمع هزینه محصولات:</div>' . '<div>' . number_format($payment['sum_of_product_prices']) . '&nbsp&nbsp&nbsp' . 'ریال' . '</div></div>';
        echo '<div><div>هزینه ارسال</div>' . '<div>' . number_format($payment['shipping']) . '&nbsp&nbsp&nbsp' . 'ریال' . '</div></div>';
        echo '<div><div>جمع کل:</div>' . '<div>' . number_format($payment['sum_of_all']) . '&nbsp&nbsp&nbsp' . 'ریال' . '</div></div>';
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}
function payment($shipping_method,$customer_id){
    $con=connectDB2();
    $sql = "SELECT product_price,order_count FROM invoices INNER JOIN orders ON invoices.invoice_id=orders.invoice_id INNER JOIN products ON orders.product_id=products.product_id WHERE customer_id='$customer_id' AND invoice_state='unconfirmed'";
    $stmt = $con->query($sql);
    $rowCount = $stmt->rowCount();
    $sum_of_product_prices = 0;
    while ($row = $stmt->fetchObject()) {
        $sum_of_product_prices = ($row->product_price)*($row->order_count) + $sum_of_product_prices;
    }
    if ($shipping_method == "2") $shipping = "60000";
    else $shipping = "30000";

    $sum_of_all = $shipping + $sum_of_product_prices;
    $payment=array ('sum_of_product_prices'=>$sum_of_product_prices,'shipping'=>$shipping,'sum_of_all'=>$sum_of_all);
    return($payment);
}