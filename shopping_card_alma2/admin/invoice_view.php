<!doctype html>
<?php
require_once('../include/connect.php');

$sql = "SELECT * FROM customers INNER JOIN invoices ON invoices.customer_id=customers.customer_id WHERE invoices.invoice_state='confirmed'";

if (isset($_POST['delete-sub']) && isset($_POST['delete-checkbox'])) {
    $count = count($_POST['delete-checkbox']);
    $check = $_POST['delete-checkbox'];
    foreach ($check as $i)
        $con->query("DELETE FROM invoices WHERE invoice_id='$i'");
}
if (isset($_POST['delete-field'])) {
    $deleteId = $_POST['delete-field'];
    $con->query("DELETE FROM invoices WHERE invoice_id='$deleteId'");
}
//start search
if (isset($_POST['search'])) $search = $_POST['search'];
if (isset($search) && $search != "") $sql = "SELECT invoice.*,customers.customer_name,customers.customer_address FROM customers INNER JOIN invoices ON invoices.customer_id=customers.customer_id WHERE invoices.invoice_state='confirmed' AND customer_title LIKE '%$search%'";
//query exec
$stmt = $con->prepare($sql);
$stmt = $con->query($sql);
$rowCount = $stmt->rowCount();
$con = null;
?>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>form</title>
    <?php require_once("table_links.html"); ?>
    <?php require_once("main_links.html"); ?>
</head>
<body>
<?php require_once("header.php"); ?>
<div class="container">
    <br/>
    <div>
        <form name="search-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="search" name="search" id="search" placeholder="عنوان مشتری">
            <input type="submit" value="جستجو">
        </form>
    </div>
    <br>
    <div>
        <form name="factor-form" action="factor.php" method="post">
        </form>
    </div>
    <div>
        <form id="delete-checkbox-form" name="delete-checkbox-form"
              action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input id="delete-sub" name="delete-sub" type="submit" value="حذف">
        </form>
    </div>
    <div>
        <form id="single-invoice" name="single-invoice" action="single_invoice.php" method=get">
        </form>
    </div>
    <br/>

    <table id="table-list">
        <tr>
            <td><input type="checkbox" onchange="checkAll(this)" name="delete-checkbox[]"/></td>
            <td>حذف درجا</td>
            <td>ویرایش</td>
            <td>فاکتور</td>
            <td>کد سفارش</td>
            <td>وضعیت سفارش</td>
            <td>نام مشتری</td>
            <td>وضعیت پرداخت</td>
            <td>تاریخ</td>
            <td>آدرس مشتری</td>
            <td>آدرس سفارش</td>
        </tr>
        <?php
        echo '<br><div class="info">تعداد رکورد(ها): ' . $rowCount . '</div>';
        // object oriented show all rows
        while ($row = $stmt->fetchObject()) {
            if ($row->invoice_payment_state == 0) {
                $invoice_payment_state = 'پراخت نشده';
            } else if ($row->invoice_payment_state == 1) {
                $invoice_payment_state = 'پرداخت شده';
            } else  $invoice_payment_state = 'نامعلوم';
            if ($row->customer_address == "") $row->customer_address = $row->invoice_address;
            echo '<tr>';
            echo '<td><input form="delete-checkbox-form" type="checkbox" name="delete-checkbox[]" value="' . $row->invoice_id . '" /></td>';
            echo '<td><button class="little-image" form="delete-checkbox-form" name="delete-field" value="' . $row->invoice_id . '"><i class=" table-icon color-light-blue ">&#xf014;</i></button></td>';
            echo '<td><button class="little-image" form="edit-form" name="edit-field" value="' . $row->invoice_id . '"><i class="table-icon color-light-blue ">&#xf044;</i></button></td>';
            echo '<td><button class="little-image" form="single-invoice" name="single-invoice" value="' . $row->invoice_id . '"><i class="table-icon color-light-blue ">&#xf022;</i></button></td>';
            echo '<td>' . $row->invoice_id . '</td>';
            echo '<td>' . $row->invoice_state . '</td>';
            echo '<td>' . $row->invoice_name . '</td>';
            echo '<td>' . $invoice_payment_state . '</td>';
            echo '<td>' . $row->invoice_date . '</td>';
            echo '<td>' . $row->customer_address . '</td>';
            echo '<td>' . $row->invoice_address . '</td>';
            echo '<tr>';
        }
        echo '</table>';
        echo '</div>';
        ?>
        <?php require_once('footer.php'); ?>
        <script src="/almaprojects/shopping_card_alma2/template/template1/javascript/allCheckBoxesSelector.js"></script>
</body>
</html>