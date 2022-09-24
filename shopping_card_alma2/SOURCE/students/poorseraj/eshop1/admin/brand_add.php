<!doctype html>
<html lang="fa">
<mata charset="utf-8"></mata>
<head>
    <meta charset="utf-8">
    <title>اافزودن برند</title>
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
        $brand_name_err = "";
        $brand_id_err = "";
        $brand_photo_err = "";
        $brand_alias_err = "";
        $flag = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["brand_name"])) {
                $brand_name = checkInput($_POST["brand_name"]);
            } else {
                $flag = false;
                $brand_name_err = "لطفا تکمیل نمایید";
            }
            if (!empty($_POST["brand_alias"])) {
                $brand_alias = checkInput($_POST["brand_alias"]);
            } else {
                $flag = false;
                $brand_alias_err = "لطفا تکمیل نمایید";
            }
            if (isset($_POST["submit"]) && $flag) {
                $brand_name = $_POST['brand_name'];
                $brand_desc = $_POST['brand_desc'];
                $brand_alias = $_POST['brand_alias'];


                require_once('../include/connect.php');
                require_once('../include/upload.php');
                if ($_FILES['logo']['name'] != "") {
                    $form_file_name = 'logo';
                    $brand_photo = upload_photo($form_file_name, $brand_alias, 'logo');
                } else {
                    $brand_photo = "sample_brand.jpg";
                }
                try {
                    $stmt = $con->query("INSERT INTO brand ( brand_name,brand_alias,logo, brand_desc) VALUES ('$brand_name','$brand_alias', '$brand_photo','$brand_desc')");
                    echo "برند جدید با موفقیت ثبت شد";
                    echo "<script>window.setTimeout(function(){ window.location='brand_view.php';},3000)</script>";
                } catch (PDOException $ex) {
                    $ex->getMessage();
                }
                $con = null;
            }
        }
        function checkInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        ?>


        <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              enctype="multipart/form-data">
            <div>
                <div>نام برند جدید</div>
                <div><input type="text" name="brand_name" id="brand_name"/></div>
                <div id="email_err"><?php echo $brand_name_err; ?></div>
            </div>

            <div>
                <div>نام مستعاربرند</div>
                <div><input type="text" name="brand_alias" id="brand_alias" placeholder="فقط حروف انگیسی بدون فاصله"/>
                </div>
                <div id="brand_alias_err"><?php echo $brand_alias_err; ?></div>
            </div>

            <div>
                <div>لوگو</div>
                <div><input type="file" name="logo" id="logo"/></div>
                <div id="email_err"><?php echo $brand_photo_err; ?></div>
            </div>
            <div class="textarea-row">
                <div>توضیحات</div>
                <div><textarea name="brand_desc" id="brand_desc"> </textarea></div>
                <div id="brief_err"></div>
            </div>
            <div>
                <div></div>
                <div>
                    <input type="submit" name="submit" id="submit" value="ثبت فرم"/>
                    <input type="reset" value="پاک کردن"/>
                </div>
                <div></div>
            </div>


        </form>
    </div>
</body>
</html>