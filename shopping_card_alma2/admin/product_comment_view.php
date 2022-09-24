<!doctype html>
<?php
require_once('../include/connect.php');
//start delete
if (isset($_POST['delete-sub']) && isset($_POST['delete-checkbox'])) {
    $count = count($_POST['delete-checkbox']);
    $check = $_POST['delete-checkbox'];
    foreach ($check as $i)
        $con->query("DELETE FROM pcomments WHERE comment_id='$i'");
}
if (isset($_POST['delete-field'])) {
    $deleteId = $_POST['delete-field'];
    $con->query("DELETE FROM pcomments WHERE comment_id='$deleteId'");
}
// end delete --------------------------------------------------
// select all rows
$sql = "SELECT product_title,product_id,comment_customer_name,comment_id,comment_state FROM pcomments INNER JOIN products ON pcomments.comment_product_id=products.product_id ";
// start search --------------------------------------------------
if (isset($_POST['search'])) $search = $_POST['search'];
if (isset($search) && $search != "") $sql = "SELECT product_title,product_id,comment_customer_name,comment_id,comment_state FROM pcomments INNER JOIN products ON pcomments.comment_product_id=prodcucts.product_id WHERE comment_customer_name like '%$search%'";
//if (isset($search)) $search = "%$search%";
// execute query
$stmt = $con->query($sql);
$rowCount = $stmt->rowCount();

//message setting
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
            <input type="search" name="search" id="search" placeholder="عنوان مشتری">
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
        <form id="edit-form" name="edit-form" action="product_comment_edit.php" method="get">
        </form>
    </div>
    <br/>

    <table id="table-list">
        <tr>
            <td>انتخاب</td>
            <td><input type="checkbox" onchange="checkAll(this)" name="delete-checkbox[]"/></td>
            <td>ویرایش</td>
            <td>کد نظر</td>
            <td>کد محصول</td>
            <td>نام محصول</td>
            <td>نام مشتری</td>
            <td>وضعیت نمایش</td>
        </tr>
        <?php
        echo '<br><div class="info">تعداد رکورد(ها): ' . $rowCount . '</div>';
        // object oriented show all rows
        while ($row = $stmt->fetchObject()) {

            echo '<tr>';
            echo '<td><input form="delete-checkbox-form" type="checkbox" name="delete-checkbox[]" value="' . $row->comment_id . '" /></td>';
            echo '<td><button  class="little-image" form="delete-checkbox-form" name="delete-field" value="' . $row->comment_id . '"><i class=" table-icon color-light-blue ">&#xf014;</i></button></td>';
            echo '<td><button  class="little-image" form="edit-form" name="edit-field" value="' . $row->comment_id . '"><i class="table-icon color-light-blue ">&#xf044;</i></button></td>';
            echo '<a>';
            echo '<td>' . $row->comment_id . '</td>';
            echo '<td>' . $row->product_id . '</td>';
            echo '<td>' . $row->product_title . '</td>';
            echo '<td>' . $row->comment_customer_name . '</td>';
            echo '<td>' . $row->comment_state . '</td>';
            echo '<tr>';
            echo '</a>';
        }
        echo '</table>';
        echo '</div>';

        $con = null;

        ?>
        <?php require_once('footer.php'); ?>
        <script src="/almaprojects/shopping_card_alma2/template/template1/javascript/allCheckBoxesSelector.js"></script>
</body>
</html>