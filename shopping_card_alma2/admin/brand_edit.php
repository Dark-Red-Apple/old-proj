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

$brand_name_err = "";
$brand_title_err = "";
$brand_logo_err = "";
$brand_desc_err = "";
$logo_err = "";
try {
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit-field'])) {
        require_once('../include/connect.php');

        $id = $_GET['edit-field'];
        $stmt = $con->query("SELECT * FROM brands WHERE brand_id='$id'");
        $row = $stmt->fetchObject();
        $brand_name = $row->brand_name;
        $brand_desc = $row->brand_desc;
        $brand_title = $row->brand_title;
        $old_logo = $row->logo;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-submit'])) {
        require_once('../include/connect.php');
        require_once('../include/upload.php');

        $id = $_POST['brand_id'];
        $brand_name = $_POST['brand_name'];
        $brand_title = $_POST['brand_title'];
        $brand_desc = $_POST['brand_desc'];

        if ($_FILES['brand_logo']['name'] != "") {
            $form_file_name = 'brand_logo';
            $new_logo = upload_photo($form_file_name, $brand_name, 'logo');
        } else {
            $new_logo = $_POST['old_logo'];
        }
        echo $logo;
        $stmt = $con->query("UPDATE brands SET brand_name='$brand_name',brand_title='$brand_title',brand_desc='$brand_desc',logo='$new_logo' WHERE brand_id='$id'");
        echo '<div class="info">دسته جدید با موفقیت به روز شد</div>';
        echo '<br><br><div class="info">شما  پس از 3 ثانیه به لیست دسته ها منتقل خواهید شد</div>';
//        flush();
        $mess = $stmt ? 1 : 2;
        header("location:brand_view.php?message=" . $mess);
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
            <div>کد برند</div>
            <div><input type="text" name="brand_id" id="brand_id" value="<?php echo $id; ?>" readonly/></div>
            <div id="brand_id_err"></div>
        </div>
        <div>
            <div>نام انگلیسی برند</div>
            <div><input type="text" name="brand_name" id="brand_name" value="<?php echo $brand_name; ?>"
                        placeholder="لطفا فقط حروف انگلیسی وارد کنید"/></div>
            <div id="brand_name_err"><?php echo $brand_name_err; ?></div>
        </div>
        <div>
            <div>نام برند</div>
            <div><input type="text" name="brand_title" id="brand_title" value="<?php echo $brand_title; ?>"/></div>
            <div id="brand_title_err"><?php echo $brand_title_err; ?></div>
        </div>
        <div>
            <div>توضیحات</div>
            <div><textarea type="text" name="brand_desc" id="brand_desc"><?php echo $brand_desc; ?></textarea></div>
            <div id="brand_desc_err"><?php echo $brand_desc_err; ?></div>
        </div>
        <div>
            <div>عکس برند</div>
            <div><input type="file" name="brand_logo" id="brand_logo"/></div>
            <div id="logo_err"><?php echo $logo_err; ?></div>
        </div>
        <br/>
        <div>
            <div></div>
            <div>
                <input type="submit" id="update-submit" name="update-submit" value="ثبت فرم""/>
                <input type="reset" value="پاک کردن"/>
            </div>
            <div></div>
        </div>
    </form>
    <img class="edit-image" src="../photo/logo/<?php echo $old_logo; ?>"/>
    <input form="form" type="hidden" id="old_logo" name="old_logo" readonly value="<?php echo $old_logo; ?>"/>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>