<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>افزودن دسته </title>
    <?php require_once("main_links.html"); ?>
    <?php require_once("form_links.html"); ?>
</head>
<body>
<?php require_once("header.php"); ?>
<?php
$cat_name_err = "";
$cat_title_err = "";
$cat_id_err = "";
$cat_pic_err = "";
$cat_desc_err = "";
//echo $_POST['image-edit'];
try {
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit-field'])) {
        require_once('../include/connect.php');

        $id = $_GET['edit-field'];
        $stmt = $con->query("SELECT * FROM categories WHERE cat_id='$id'");
        $row = $stmt->fetchObject();
        $cat_name = $row->cat_name;
        $cat_desc = $row->cat_desc;
        $cat_title = $row->cat_title;
        $old_cat_pic = $row->cat_pic;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-submit'])) {
        require_once('../include/connect.php');
        require_once('../include/upload.php');

        $id = $_POST['cat_id'];
        $cat_name = $_POST['cat_name'];
        $cat_title = $_POST['cat_title'];
        $cat_desc = $_POST['cat_desc'];
        $old_cat_pic = $_POST['old_cat_pic'];

        if ($_FILES['cat_pic']['name'] != "") {
            $form_file_name = 'cat_pic';
            $new_cat_pic = upload_photo($form_file_name, $cat_name, 'category');
        } else {
            echo "ni";
            echo $_POST['old_cat_pic'];
            $new_cat_pic = $_POST['old_cat_pic'];
        }

        $stmt = $con->query("UPDATE categories SET cat_name='$cat_name', cat_title='$cat_title', cat_desc='$cat_desc', cat_pic='$new_cat_pic' WHERE cat_id='$id'");
        echo '<div class="info">دسته جدید با موفقیت به روز شد</div>';
        echo '<br><br><div class="info">شما  پس از 3 ثانیه به لیست دسته ها منتقل خواهید شد</div>';
        $mess = $stmt ? 1 : 2;
        header("location:category_view.php?message=" . $mess);
        $con = null;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="container">
    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          enctype="multipart/form-data">

        <div>
            <div>کد دسته</div>
            <div><input type="text" name="cat_id" id="cat_id" value="<?php echo $id; ?>" readonly/></div>
            <div id="cat_id_err"></div>
        </div>

        <div>
            <div>نام انگلیسی دسته</div>
            <div><input type="text" name="cat_name" id="cat_name" value="<?php echo $cat_name; ?>" placeholder="فقط حروف انگیسی بدون فاصله /></div>
        <div id=" cat_name_err"><?php echo $cat_name_err; ?></div>
        </div>
        <div>
            <div>نام دسته</div>
            <div><input type="text" name="cat_title" id="cat_title" value="<?php echo $cat_title; ?>" "/></div>
            <div id="cat_title_err"><?php echo $cat_title_err; ?></div>
        </div>
        <div>
            <div>توضیحات</div>
            <div><textarea type="text" name="cat_desc" id="cat_desc"> <?php echo $cat_desc; ?></textarea></div>
            <div id="cat_desc_err"><?php echo $cat_desc_err; ?></div>
        </div>
        <div>
            <div>عکس دسته</div>
            <div><input type="file" name="cat_pic" id="cat_pic"/></div>
            <div id="cat_pic_err"><?php echo $cat_pic_err; ?></div>
        </div>
        <br/>
        <div>
            <div></div>
            <div>
                <input type="submit" id="update-submit" name="update-submit" value="ثبت فرم" name="submit"/>
                <input type="reset" value="پاک کردن"/>
            </div>
            <div></div>
        </div>
    </form>
    <img class="edit-image" src="../photo/category/<?php echo $old_cat_pic; ?>"/>
    <input form="form" type="hidden" id="old_cat_pic" name="old_cat_pic" readonly value="<?php echo $old_cat_pic; ?>"/>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>