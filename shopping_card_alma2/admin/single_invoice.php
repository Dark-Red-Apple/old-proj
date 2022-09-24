<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>سفارش</title>
    <?php require_once("main_links.html"); ?>
    <?php require_once("form_links.html"); ?>

</head>
<body>
<?php require_once("header.php");
require_once('../include/connect.php');
?>
<?php
require_once('connectDB.php');
function sumOfProducts($invoice_id){
    $con=connectDB2();
    $sql = "SELECT product_price,order_count FROM  orders INNER JOIN products ON orders.product_id=products.product_id WHERE invoice_id='$invoice_id'";
    $stmt = $con->query($sql);
    $rowCount = $stmt->rowCount();
    $sum_of_products_price = 0;
    while ($row = $stmt->fetchObject()) {
        $sum_of_products_price = ($row->product_price)*($row->order_count) + $sum_of_products_price;
    }
    return($sum_of_products_price);
}
$invoice_state_err = "";
$invoice_payment_state_err = "";
//$brand_id_err = "";
//$product_name_err = "";
//$product_name_err = "";
//$product_title_err = "";
//$product_desc_err = "";
//$product_size_err = "";// 111*222*333
//$product_weight_err = "";  //100000 gram
//$product_date_err = ""; // 1395/07/22
//$product_price_err = ""; //99 000 000 0
//$product_warranty_err = "";
//$product_exist_err = "";
//$product_pic_err = "";

try {
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['single-invoice'])) {
        $con=connectDB2();

        $id = $_GET['single-invoice'];
        $stmt = $con->query("SELECT * FROM orders INNER JOIN products ON orders.product_id=products.product_id WHERE invoice_id='$id'");
        $stmt_i =  $con->query("SELECT * FROM invoices WHERE invoice_id='$id'");
        $row_i = $stmt_i->fetchObject();
        if ($row_i->customer_kind == 0) {
            $stmt_i = $con->query("SELECT invoices.*,customers.customer_address,customers.customer_tel,customers.customer_title FROM invoices INNER JOIN customers ON customers.customer_id=invoices.customer_id WHERE invoice_id='$id'");
            $row_i = $stmt_i->fetchObject();
        }

        $invoice_id = $row_i->invoice_id;
        $invoice_name = $row_i->invoice_name;
        $invoice_email = $row_i->invoice_email;
        $invoice_date = $row_i->invoice_date;
        $invoice_state = $row_i->invoice_state;
        $invoice_delivery_method = ($row_i->invoice_delivery_method == '1') ? 'یک هفته ای، 3 هزار تومان' : '  3 روزه، 6 هزار تومان';
        $invoice_payment_method = ($row_i->invoice_payment_method == '1') ? 'پرداخت الکترونیکی  بانک ملت' : 'پرداخت درب منزل';
        $invoice_payment_state = $row_i->invoice_payment_state;
        $invoice_address = $row_i->invoice_address;
        $invoice_tel = $row_i->invoice_tel;
        $customer_tel = isset($row_i->customer_tel) ? $row_i->customer_tel : $row_i->invoice_tel;
        $customer_address = (isset($row_i->customer_address)) ? $row_i->customer_address : $row_i->invoice_address;
        $customer_title= (isset($row_i->customer_title)) ? $row_i->customer_title : $row_i->invoice_name;
        if ($row_i->customer_kind == 1) $customer_kind = 'مهمان';
        else if ($row_i->customer_kind == 0) $customer_kind = 'عضو';
        else $customer_kind = 'نامشخص';
        if ($invoice_payment_method == "2") $shipping = "60000";
        else $shipping = "30000";
        $products_payment=sumOfProducts($invoice_id);
        $total=$products_payment+$shipping;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-submit'])) {

        $invoice_id = $_POST['invoice_id'];
        $invoice_delivery_state = $_POST['invoice_delivery_state'];

        $stmt = $con->query("UPDATE invoices SET invoice_state='$invoice_state',invoice_delivery_state='$invoice_delivery_state' WHERE product_id='$product_id'");

        $mess = $stmt ? 1 : 2;
        header("location:invoice_view.php?message=" . $mess);
        $con = null;
    }
    $con = null;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="container">
    <form id='invoice-form' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          enctype="multipart/form-data">
        <div class="invoice right-child">
            <h3>اطلاعات سفارش</h3>
            <div>
                <div>کد سفارش</div>
                <div><?php echo $invoice_id ?></div>
            </div>
            <div>
                <div> تاریخ سفارش</div>
                <div><?php echo $invoice_date ?></div>
            </div>
            <div>
                <div>نام مشتری سفارش</div>
                <div><?php echo $invoice_name ?></div>
            </div>
             <div>
                <div> آدرس سفارش</div>
                <div><?php echo $invoice_address ?></div>
            </div>
            <div>
                <div> تلفن سفارش</div>
                <div><?php echo $invoice_tel ?></div>
            </div>
        </div>
        <div class="invoice">
            <h3>اطلاعات مشتری</h3>
            <div>
                <div> نوع مشتری</div>
                <div><?php echo $customer_kind ?></div>
            </div>
            <div>
                <div> میل مشتری</div>
                <div><?php echo $invoice_email ?></div>
            </div>
            <div>
                <div> نام مشتری</div>
                <div><?php echo $customer_title; ?></div>
            </div>
            <div>
                <div> آدرس مشتری</div>
                <div><?php echo $customer_address ?></div>
            </div>
            <div>
                <div> تلفن مشتری</div>
                <div><?php echo $customer_tel ?></div>
            </div>
        </div>
        <div class="invoice  right-child">
            <h3>اطلاعات ارسال</h3>
            <div>
                <div>روش پرداخت</div>
                <div><?php echo $invoice_payment_method ?></div>
            </div>
            <div>
                <div>روش ارسال</div>
                <div><?php echo $invoice_delivery_method ?></div>
            </div>
            <h3>اطلاعات هزینه</h3>
            <div>
                <div>هزینه محصولات</div>
                <div><?php echo $products_payment ?></div>
            </div>
            <div>
                <div>هزینه ارسال</div>
                <div><?php echo $shipping ?></div>
            </div>
            <div>
                <div>هزینه کل</div>
                <div><?php echo $total ?></div>
            </div>
        </div>
        <div class="invoice">
            <h3>وضعیت سفارش</h3>
            <div>
                <div>وضعیت سفارش</div>
                <div><select name="invoice_state" id="invoice_state">
                        <option value="hide" <?php if ($invoice_state == 'confirmed') echo 'selected' ?> >تایید شده
                        </option>
                        <option value="show" <?php if ($invoice_state == 'delivered') echo 'selected' ?> >تحویل داده شده
                        </option>
                    </select>
                    <div id="comment_state_err"><?php echo $invoice_state_err; ?></div>
                </div>
            </div>
            <div>
                <div>وضعیت پرداخت</div>
                <div><select name="invoice_payment_state" id="invoice_payment_state">
                        <option value="hide" <?php if ($invoice_payment_state == '1') echo 'selected' ?> >پرداخت شده
                        </option>
                        <option value="show" <?php if ($invoice_payment_state == '0') echo 'selected' ?> >پرداخت نشده
                        </option>
                    </select>
                    <div id="comment_state_err"><?php echo $invoice_payment_state_err; ?></div>
                </div>
            </div>
            <div>
                <input type="submit" id="update-submit" name="update-submit" value="ثبت فرم"/>
            </div>
        </div>
    </form>
    <div class="invoice_products">

        <table style="position: relative" id="table-list">
            <tr>
                <td>عکس</td>
                <td>نام محصول</td>
                <td>قیمت واحد</td>
                <td>تعداد</td>
                <td>قیمت</td>
            </tr>

            <!--        object oriented show all rows-->
            <?php $j=0; while ($row = $stmt->fetchObject()) { ?>
                <tr id="row<?php echo $j; ?>">
                    <td><a href="single_product.php?product_id=<?php echo $row->product_id ?>"><img
                                class="basket-image"
                                src="../photo/product/<?php echo $row->product_pic ?>"></a>
                    </td>
                    <td><?php echo $row->product_title ?></td>
                    <td><?php echo number_format($row->product_price) ?></td>
                    <td><select class="quantity-change-basket"
                                onchange="changeQuantity(this.options[this.selectedIndex].value,'<?php echo $row->product_id ?>','<?php echo $_SESSION['user'] ?>','row<?php echo $j; ?>')">
                            <?php for ($i = 1; $i < 30; $i++) {
                                echo '<option value="' . $i . '"';
                                if ($i == ($row->order_count)) echo 'selected';
                                echo '>' . $i . '</option>';
                            } ?>
                        </select></td>
                    <td><?php echo number_format($row->order_count * $row->product_price) ?></td>
                    <td>
                        <button class="little-image" form="delete-form" name="delete"
                                value="<?php echo $row->order_id ?>"><i
                                class="invoice-delete-items">&times;</i></button>
                    </td>
                </tr>
                <?php $j++; ?>
            <?php } ?>
            <div id="loading-div">
                <div></div>
            </div>
        </table>
        <div id="complete">
        </div>
        <input type="submit" form="purchase-form" name="checkout" id="checkout" value="تغییر سفارش"/>
    </div>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>