<!doctype html>
<?php
require_once('../include/connect.php');
//start delete
if (isset($_POST['delete-sub']) && isset($_POST['delete-checkbox'])) {
    $count = count($_POST['delete-checkbox']);
    $check = $_POST['delete-checkbox'];
    foreach ($check as $i)
        $con->query("DELETE FROM customers WHERE customer_id='$i'");
}
if (isset($_POST['delete-field'])) {
    $deleteId = $_POST['delete-field'];
    $con->query("DELETE FROM customers WHERE customer_id='$deleteId'");
}
// end delete --------------------------------------------------
// select all rows
$sql = "SELECT * FROM customers";
// start search --------------------------------------------------
if (isset($_POST['search'])) $search = $_POST['search'];
if (isset($search) && $search != "") $sql = "SELECT * FROM customers WHERE customer_title like '%$search%'";
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
        <form id="edit-form" name="edit-form" action="customer_edit.php" method="get">
        </form>
    </div>
    <br/>

    <table id="table-list">
        <tr>
            <td><input type="checkbox" onchange="checkAll(this)" name="delete-checkbox[]"/></td>
            <td>حذف درجا</td>
            <td>ویرایش</td>
            <td>کد مشتری</td>
            <td>نام کاربری</td>
            <!--            <td>نام انگلیسی</td>-->
            <td>نام</td>
            <td>فامیل</td>
            <!--            <td>نوع</td>-->
            <!--            <td> نام شرکت</td>-->
            <td>تلفن</td>
            <td>موبایل</td>
            <td>ایمیل</td>
            <!--            <td>آدرس</td>-->
            <!--            <td>کد پستی</td>-->
            <!--            <td>جنسیت</td>-->
            <td>عکس</td>
        </tr>
        <?php
        echo '<br><div class="info">تعداد رکورد(ها): ' . $rowCount . '</div>';
        // object oriented show all rows
        while ($row = $stmt->fetchObject()) {

            if ($row->customer_type == 1) {
                $customer_type = "حقیقی";
            } else if ($row->customer_type == 0) {
                $customer_type = "حقوقی";
            }
            if ($row->customer_sex == 2) {
                $sex = "نامشخص";
            } else if ($row->customer_sex == 1) {
                $sex = "زن";
            } else if ($row->customer_sex == 0) {
                $sex = "مرد";
            }

            echo '<tr>';
            echo '<td><input form="delete-checkbox-form" type="checkbox" name="delete-checkbox[]" value="' . $row->customer_id . '" /></td>';
            echo '<td><button  class="little-image" form="delete-checkbox-form" name="delete-field" value="' . $row->customer_id . '"><i class=" table-icon color-light-blue ">&#xf014;</i></button></td>';
            echo '<td><button  class="little-image" form="edit-form" name="edit-field" value="' . $row->customer_id . '"><i class="table-icon color-light-blue ">&#xf044;</i></button></td>';
            echo '<a>';
            echo '<td>' . $row->customer_id . '</td>';
            echo '<td>' . $row->customer_username . '</td>';
//            echo '<td>' . $row->customer_title . '</td>';
            echo '<td>' . $row->customer_name . '</td>';
            echo '<td>' . $row->customer_family . '</td>';
//            echo '<td>' . $customer_type . '</td>';
//            echo '<td>' . $row->customer_company_name . '</td>';
            echo '<td>' . $row->customer_tel . '</td>';
            echo '<td>' . $row->customer_mobile . '</td>';
            echo '<td>' . $row->customer_email . '</td>';
//            echo '<td>' . $row->customer_address . '</td>';
//            echo '<td>' . $row->customer_postal_code . '</td>';
//            echo '<td>' . $sex . '</td>';
            echo '<td>' . '<img src="../photo/customer/' . $row->customer_pic . '">' . '</td>';
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