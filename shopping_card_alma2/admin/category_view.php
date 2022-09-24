<!doctype html>
<?php
require_once('../include/connect.php');
// start delete --------------------------------------------------
if (isset($_POST['delete-sub']) && isset($_POST['delete-checkbox'])) {
    $count = count($_POST['delete-checkbox']);
    $check = $_POST['delete-checkbox'];
    foreach ($check as $i)
        $sql = $con->query("DELETE FROM categories WHERE cat_id='$i'");
}
if (isset($_POST['delete-field'])) {
    echo $_POST['delete-field'];
    $deleteId = $_POST['delete-field'];
    $con->query("DELETE FROM categories WHERE cat_id='$deleteId'");
}
// end delete --------------------------------------------------
// select all rows
$sql = "SELECT * FROM categories";
// start search --------------------------------------------------
if (isset($_POST['search'])) $search = $_POST['search'];
if (isset($search) && $search != "") $sql = "SELECT * FROM categories WHERE cat_name like '%$search%'";
//if (isset($search)) $search = "%$search%";
// end search --------------------------------------------------
$stmt = $con->prepare($sql);
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
    <title>نمایش لیست دسته ها</title>
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
            <input type="search" name="search" id="search" placeholder="عنوان دسته">
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
        <form id="edit-form" name="edit-form" action="category_edit.php" method="get">
        </form>
    </div>


    <br/>
    <div class="info"><a href="category_add.php">افزودن دسته جدید</a></div>

    <table id="table-list">
        <tr>
            <td><input type="checkbox" onchange="checkAll(this)" name="delete-checkbox[]"/></td>
            <td>حذف در جا</td>
            <td>ویرایش</td>
            <td>کد دسته</td>
            <td>نام دسته</td>
            <td>نام انگلیسی دسته</td>
            <td>توضیحات دسته</td>
            <td>عکس دسته</td>
        </tr>
        <?php
        echo '<br><div class="info">تعداد رکورد(ها): ' . $rowCount . '</div>';
        // object oriented show all rows
        while ($row = $stmt->fetchObject()) {
            echo '<tr>';
            echo '<td><input form="delete-checkbox-form" type="checkbox" name="delete-checkbox[]" value="' . $row->cat_id . '" /></td>';
            echo '<td><button class="little-image" form="delete-checkbox-form" name="delete-field" value="' . $row->cat_id . '"><i class=" table-icon color-light-blue ">&#xf014;</i></button></td>';
//            echo '<td><input class="little-image" class="input-image" form="image-edit-form" alt="Submit" src="../template/template1/image/edit-icon-blue.png" type="image" name="image-edit" value="'.$row->cat_id.'" /></td>';
            echo '<td><button class="little-image" form="edit-form" name="edit-field" value="' . $row->cat_id . '"><i class="table-icon color-light-blue ">&#xf044;</i></button></td>';
            echo '<td>' . $row->cat_id . '</td>';
            echo '<td>' . $row->cat_title . '</td>';
            echo '<td>' . $row->cat_name . '</td>';
            echo '<td>' . $row->cat_desc . '</td>';
            echo '<td>' . '<img src="../photo/category/' . $row->cat_pic . '">' . '</td>';
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