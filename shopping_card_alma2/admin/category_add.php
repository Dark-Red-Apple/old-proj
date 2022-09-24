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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $cat_name = $_POST['cat_name'];
    $cat_title = $_POST['cat_title'];
    $cat_desc = $_POST['cat_desc'];

    require_once('../include/connect.php');
    require_once('../include/upload.php');

    if ($_FILES['cat_pic']['name'] != "") {
        $form_file_name = 'cat_pic';
        $cat_pic = upload_photo($form_file_name, $cat_name, 'category');
    } else {
        $cat_pic = "sample_category.png";
    }

    $stmt = $con->query("INSERT INTO categories (cat_name, cat_title, cat_desc, cat_pic) VALUES 
              ('$cat_name','$cat_title','$cat_desc', '$cat_pic')");
    if ($stmt) $message = "رکورد با موفقیت ثبت شد";
//    echo '<br><br><div class="info">شما  پس از 3 ثانیه به لیست برند ها منتقل خواهید شد</div>';
//    echo '<script>window.setTimeout(function(){ window.location = "brand_view.php"; },3000);</script>';

    $con = null;
}
?>
<?php if (isset($message)) echo '<div class="success-message">' . $message . '</div>' ?>
<div class="container">
    <form class="form" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          enctype="multipart/form-data">
        <div>
            <div>نام انگلیسی دسته</div>
            <div><input type="text" name="cat_name" id="cat_name" placeholder="فقط حروف انگیسی بدون فاصله"/></div>
            <div id="cat_name_err"><?php echo $cat_name_err; ?></div>
        </div>
        <div>
            <div>نام دسته</div>
            <div><input type="text" name="cat_title" id="cat_title"/></div>
            <div id="cat_title_err"><?php echo $cat_title_err; ?></div>
        </div>
        <div>
            <div>توضیحات</div>
            <div><textarea type="text" name="cat_desc" id="cat_desc"></textarea></div>
            <div id="cat_desc_err"><?php echo $cat_desc_err; ?></div>
        </div>
        <div>
            <div>عکس دسته جدید</div>
            <div><input type="file" name="cat_pic" id="cat_pic"/></div>
            <div id="cat_pic_err"><?php echo $cat_pic_err; ?></div>
        </div>
        <br/>
        <div>
            <div></div>
            <div>
                <input type="submit" value="ثبت فرم" name="submit"/>
                <input type="reset" value="پاک کردن"/>
            </div>
            <div></div>
        </div>


    </form>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>