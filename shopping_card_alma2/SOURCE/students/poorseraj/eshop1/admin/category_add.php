<?php session_start();

if (isset($_POST['submit'])) {


//if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']) && !empty($_POST['code'])) {
    if (!empty($_POST['code'])) {

        if ($_POST['code'] == $_SESSION['rand_code']) {

// send email
            $accept = "Thank you for contacting me.";

        } else {

            $error = "Please verify that you typed in the correct code.";

        }

    } else {

        $error = "Please fill out the entire form.";

    }
}

?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>افزودن دسته </title>
    <link href="../template/template1/css/main.css" rel="stylesheet"/>
    <link href="../template/template1/css/menu.css" rel="stylesheet"/>
    <link href="../template/template1/css/form.css" rel="stylesheet"/>
</head>
<body>
<div id="container">
    <div id="menu">
        <ul id="ul">
            <li><a href="index.php"><img src="../template/template1/image/icon/manage.png">&nbsp; مدیریت</a></li>
            <li><a href="category_view.php"><img src="../template/template1/image/icon/category.png">&nbsp;دسته</a></li>
            <li><a href="brand_view.php"><img src="../template/template1/image/icon/brand.png">&nbsp;برند</a></li>
            <li><a href="product_view.php"><img src="../template/template1/image/icon/product.png">&nbsp;محصول</a></li>
            <li><a href="customer_view.php"><img src="../template/template1/image/icon/customer.png">&nbsp;مشتریان</a>
            </li>
            <li><a href="#"><img src="../template/template1/image/icon/sale.png">&nbsp;فروش</a></li>
        </ul>
    </div>
    <div id="head" style="padding:5px;box-sizing:border-box;">
        <br/>
        <?php
        $cat_name_err = "";
        $cat_alias_err = "";
        $cat_id_err = "";
        $cat_pic_err = "";
        $cat_desc_err = "";

        if (($_SERVER["REQUEST_METHOD"] == "POST") && !empty($_POST) && isset($_POST["submit"])) {
            $cat_name = $_POST['cat_name'];
            $cat_alias = $_POST['cat_alias'];
            $cat_desc = $_POST['cat_desc'];

            require_once('../include/connect.php');
            require_once('../include/upload.php');

            if ($_FILES['cat_pic']['name'] != "") {
                $form_file_name = 'cat_pic';
                $cat_pic = upload_photo($form_file_name, $cat_alias, 'category');
            } else {
                $cat_pic = "sample_category.png";
            }

            $stmt = $con->query("INSERT INTO category (cat_name, cat_alias, cat_desc, cat_pic) VALUES 
              ('$cat_name','$cat_alias','$cat_desc', '$cat_pic')");
            echo '<div class="info">دسته جدید با موفقیت افزوده شد</div>';
            echo '<br><br><div class="info">شما  پس از 3 ثانیه به لیست دسته ها منتقل خواهید شد</div>';

            echo '<script>window.setTimeout(function(){ window.location = "category_view.php"; },3000);</script>';
            $con = null;
        }
        ?>


        <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              enctype="multipart/form-data">
            <div>
                <div>نام دسته جدید</div>
                <div><input type="text" name="cat_name" id="cat_name"/></div>
                <div id="cat_name_err"><?php echo $cat_name_err; ?></div>
            </div>
            <div>
                <div>نام مستعار</div>
                <div><input type="text" name="cat_alias" id="cat_alias" placeholder="فقط حروف انگیسی بدون فاصله"/></div>
                <div id="cat_alias_err"><?php echo $cat_alias_err; ?></div>
            </div>
            <div>
                <div>توضیحات</div>
                <div><input type="text" name="cat_desc" id="cat_desc"/></div>
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
</body>
</html>