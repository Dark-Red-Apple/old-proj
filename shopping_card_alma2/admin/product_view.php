<!doctype html>
<?php
require_once('../include/connect.php');
$sql = "SELECT * FROM products LEFT OUTER JOIN categories ON categories.cat_id=products.cat_id LEFT OUTER JOIN brands ON brands.brand_id=products.brand_id";

if (isset($_POST['search'])) $search = $_POST['search'];
if (isset($search) && $search != "") $sql = ("SELECT * FROM products LEFT OUTER JOIN categories ON categories.cat_id=products.cat_id LEFT OUTER JOIN brands ON brands.brand_id=products.brand_id WHERE product_title LIKE '%$search%'");
//if (isset($search)) $search = "%$search%";
$stmt = $con->query($sql);
$rowCount = $stmt->rowCount();

if (isset($_POST['delete-sub']) && isset($_POST['delete-checkbox'])) {
    $count = count($_POST['delete-checkbox']);
    $check = $_POST['delete-checkbox'];
    foreach ($check as $i)
        $con->query("DELETE FROM products WHERE product_id='$i'");
}
if (isset($_POST['delete-field'])) {
    $deleteId = $_POST['delete-field'];
    $con->query("DELETE FROM products WHERE product_id='$deleteId'");
}

$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : null;
if ($message == 1) {
    $div_class = 'success-message';
    $message = 'رکورد با موفقیت ذخیره شد';
} else if ($message == 2) {
    $div_class = 'not-success-message';
    $message = 'خطا در ثبت';
}
?>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>form</title>
    <?php require_once("main_links.html"); ?>
    <?php require_once("table_links.html"); ?>
    <script src="/almaprojects/shopping_card_alma2/template/template1/javascript/changeURL.js"></script>
</head>
<body>
<?php require_once("header.php"); ?>
<?php if (isset($message)) {
    echo '<div class="' . $div_class . '">' . $message . '</div>';
}
?>
<div class="container">
    <br/>
    <div>
        <form name="search-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="search" name="search" id="search" placeholder="عنوان محصول">
            <input type="submit" value="جستجو">
        </form>
    </div>
    <br>
    <div>
        <form id="delete-checkbox-form" name="delete-checkbox-form"
              action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input id="delete-sub" name="delete-sub" type="submit" value="حذف">
        </form>
    </div>
    <div>
        <form id="edit-form" name="edit-form" action="product_edit.php" method="get">
        </form>
    </div>
    <br/>
    <div class="info"><a href="product_add.php">افزودن محصول جدید</a></div>

    <table id="table-list">
        <tr>
            <td><input type="checkbox" onchange="checkAll(this)" name="delete-checkbox[]"/></td>
            <td>حذف درجا</td>
            <td>ویرایش</td>
            <td>کد محصول</td>
            <td>عنوان محصول</td>
            <td>نام انگلیسی محصول</td>
            <td>دسته</td>
            <td>برند</td>
            <td>سایز محصول</td>
            <td>وزن محصول(گرم)</td>
            <td>تاریخ محصول</td>
            <td>قیمت محصول(تومان)</td>
            <td>گارانتی محصول</td>
            <td>موجودی محصول</td>
            <td>عکس محصول</td>
        </tr>
        <?php
        echo '<br><div class="info">تعداد رکورد(ها): ' . $rowCount . '</div>';
        // object oriented show all rows
        while ($row = $stmt->fetchObject()) {
            echo '<tr>';
            echo '<td><input form="delete-checkbox-form" type="checkbox" name="delete-checkbox[]" value="' . $row->product_id . '" /></td>';
            echo '<td><button class="little-image" form="delete-checkbox-form" name="delete-field" value="' . $row->product_id . '"><i class=" table-icon color-light-blue ">&#xf014;</i></button></td>';
            echo '<td><button class="little-image" form="edit-form" name="edit-field" value="' . $row->product_id . '"><i class="table-icon color-light-blue ">&#xf044;</i></button></td>';
            echo '<td>' . $row->product_id . '</td>';
            echo '<td>' . $row->product_title . '</td>';
            echo '<td>' . $row->product_name . '</td>';
            echo '<td>' . $row->cat_title . '</td>';
            echo '<td>' . $row->brand_title . '</td>';
            echo '<td>' . $row->product_size . '</td>';
            echo '<td>' . $row->product_weight . '</td>';
            echo '<td>' . $row->product_date . '</td>';
            echo '<td>' . $row->product_price . '</td>';
            echo '<td>' . $row->product_warranty . '</td>';

            if ($row->product_exist == 1) {
                $product_exist = "موجود است";
            } else if ($row->product_exist == 0) {
                $product_exist = "موجود نیست";
            }
            echo '<td>' . $product_exist . '</td>';
            echo '<td>' . '<img src="../photo/product/' . $row->product_pic . '">' . '</td>';
            echo '<tr>';
        }
        echo '</table>';
        echo '</div>';

        $con = null;

        ?>
        <?php require_once('footer.php'); ?>
        <script src="/almaprojects/shopping_card_alma2/template/template1/javascript/allCheckBoxesSelector.js"></script>
</body>
</html>