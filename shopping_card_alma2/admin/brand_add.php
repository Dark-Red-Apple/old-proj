<!doctype html>
<html lang="fa" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>افزودن برند </title>
    <?php require_once("main_links.html"); ?>
    <?php require_once("form_links.html"); ?>
</head>
<body>
<?php require_once("header.php"); ?>
<?php
$brand_name_err = "";
$brand_logo_err = "";
$brand_desc_err = "";
$brand_title_err = "";
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $brand_name = $_POST['brand_name'];
        $brand_title = $_POST['brand_title'];
        $brand_desc = $_POST['brand_desc'];
        require_once('../include/connect.php');
        require_once('../include/upload.php');

        if ($_FILES['brand_logo']['name'] != "") {
            $form_file_name = 'brand_logo';
            $logo = upload_photo($form_file_name, $brand_title, 'logo');
        } else {
            $logo = "sample_logo.png";
        }

        $stmt = $con->query("INSERT INTO brands (brand_name,brand_title, logo, brand_desc) VALUES 
              ('$brand_name','$brand_title','$logo', '$brand_desc')");
        if ($stmt) $message = "رکورد با موفقیت ثبت شد";
//    echo '<br><br><div class="info">شما  پس از 3 ثانیه به لیست برند ها منتقل خواهید شد</div>';
//    echo '<script>window.setTimeout(function(){ window.location = "brand_view.php"; },3000);</script>';
        $con = null;
    }
} catch (PDOException $e) {
    echo "error" . $e->getMessage();
}
?>
<?php if (isset($message)) echo '<div class="success-message">' . $message . '</div>' ?>
<div class="container">
    <form class="form" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          enctype="multipart/form-data">
        <div>
            <div>نام برند جدید</div>
            <div><input type="text" name="brand_name" id="brand_name" placeholder="لطفا فقط حروف فارسی وارد کنید"/>
            </div>
            <div id="brand_name_err"><?php echo $brand_name_err; ?></div>
        </div>
        <div>
            <div>نام انگلیسی برند</div>
            <div><input type="text" name="brand_title" id="brand_title" placeholder="لطفا فقط حروف انگلیسی وارد کنید"/>
            </div>
            <div id="brand_title_err"><?php echo $brand_title_err; ?></div>
        </div>
        <div>
            <div>توضیحات</div>
            <div><textarea name="brand_desc" id="brand_desc"></textarea></div>
            <div id="brand_desc_err"><?php echo $brand_desc_err; ?></div>
        </div>
        <div>
            <div>لوگو برند جدید</div>
            <div><input type="file" name="brand_logo" id="brand_logo"/></div>
            <div id="brand_logo_err"><?php echo $brand_logo_err; ?></div>
        </div>

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