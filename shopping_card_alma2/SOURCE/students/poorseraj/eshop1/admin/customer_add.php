<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>افزودن مشتری</title>
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
            <li><a href="product_view.php"><img src="../template/template1/image/icon/customer.png">&nbsp;محصول</a></li>
            <li><a href="customer_view.php"><img src="../template/template1/image/icon/customer.png">&nbsp;مشتریان</a>
            </li>
            <li><a href="#"><img src="../template/template1/image/icon/sale.png">&nbsp;فروش</a></li>
        </ul>
    </div>
    <div id="head" style="padding:5px;box-sizing:border-box;">
        <?php

        $customer_name_err = $customer_family_err = $customer_alias_err = $customer_type_err = $customer_company_name_err = $customer_tel_err = $customer_mobile_err =
        $customer_email_err = $customer_address_err = $customer_postal_code_err = $customer_sex_err = $customer_pic_err = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $customer_name = $_POST['customer_name'];
            $customer_family = $_POST['customer_family'];
            $customer_alias = $_POST['customer_alias'];
            $customer_type = $_POST['customer_type'];
            $customer_company_name = $_POST['customer_company_name'];
            $customer_tel = $_POST['customer_tel'];
            $customer_mobile = $_POST['customer_mobile'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];
            $customer_postal_code = $_POST['customer_postal_code'];
            $customer_sex = $_POST['customer_sex'];


            if ($customer_type == 'person') {
                $type = 0;
            } else if ($customer_type == 'company') {
                $type = 1;
            }

            if ($customer_sex == 'male') {
                $gender = 0;
            } else if ($customer_sex == 'female') {
                $gender = 1;
            }

            require_once('../include/connect.php');
            require_once('../include/upload.php');

            if ($_FILES['customer_pic']['name'] != "") {
                $form_file_name = 'customer_pic';
                $customer_pic = upload_photo($form_file_name, $customer_alias, 'customer');
            } else {
                $customer_pic = "sample_customer.jpg";
            }

            $stmt = $con->query("INSERT INTO customer (customer_name,customer_family,customer_alias,customer_type,customer_company_name,customer_tel,customer_mobile,customer_email,
                        customer_address,customer_postal_code,customer_sex,customer_pic)
                        VALUES ( '$customer_name','$customer_family','$customer_alias', '$type','$customer_company_name','$customer_tel','$customer_mobile',
        '$customer_email','$customer_address','$customer_postal_code','$gender','$customer_pic')");
            echo "New records created successfully";

//    echo "<script>window.setTimeout(function(){ window.location='customer_view.php';},3000)</script>";
            $con = null;
        }
        ?>


        <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              enctype="multipart/form-data">
            <div>
                <div>نام مشتری</div>
                <div><input type="text" name="customer_name" id="customer_name"/></div>
                <div id="customer_name_err"><?php echo $customer_name_err; ?></div>
            </div>
            <div>
                <div>نام خانوادگی</div>
                <div><input type="text" name="customer_family" id="customer_family"/></div>
                <div id="customer_family_err"><?php echo $customer_family_err; ?></div>
            </div>
            <div>
                <div>نام مستعار</div>
                <div><input type="text" name="customer_alias" id="customer_alias"
                            placeholder="فقط حروف انگیسی بدون فاصله"/></div>
                <div id="customer_alias_err"><?php echo $customer_alias_err; ?></div>
            </div>
            <div>
                <div> نوع مشتری</div>
                <div>
                    <input type="radio" name="customer_type" value="person" id="customer_type1"/><label
                        for="customer_type1"><span></span> حقیقی </label>
                    <input type="radio" name="customer_type" value="company" id="customer_type2"/><label
                        for="customer_type2"><span></span> حقوقی </label>
                </div>
                <div id="customer_type_err"><?php echo $customer_type_err; ?></div>
            </div>
            <div>
                <div>نام شرکت</div>
                <div><input type="text" name="customer_company_name" id="customer_company_name"/></div>
                <div id="customer_company_name_err"><?php echo $customer_company_name_err; ?></div>
            </div>
            <div>
                <div>تلفن</div>
                <div><input type="text" name="customer_tel" id="customer_tel"/></div>
                <div id="customer_tel_err"><?php echo $customer_tel_err; ?></div>
            </div>

            <div>
                <div>موبایل</div>
                <div><input type="text" name="customer_mobile" id="customer_mobile"/></div>
                <div id="customer_size_err"><?php echo $customer_mobile_err; ?></div>
            </div>
            <div>
                <div>ایمیل</div>
                <div><input type="text" name="customer_email" id="customer_email"/></div>
                <div id="customer_email_err"><?php echo $customer_email_err; ?></div>
            </div>
            <div class="textarea-row">
                <div>آدرس</div>
                <div><textarea name="customer_address" id="customer_address"></textarea></div>
                <div id="customer_address_err"><?php echo $customer_address_err; ?></div>
            </div>
            <div>
                <div>کد پستی</div>
                <div><input type="text" name="customer_postal_code" id="customer_postal_code"/></div>
                <div id="customer_postal_code"><?php echo $customer_postal_code_err; ?></div>
            </div>
            <div>
                <div>جنسیت</div>
                <div>
                    <input type="radio" name="customer_sex" value="male" id="customer_sex1"/><label for="customer_sex1"><span></span>
                        مرد</label>
                    <input type="radio" name="customer_sex" value="female" id="customer_sex2"/><label
                        for="customer_sex2"><span></span> زن</label>
                </div>
                <div id="customer_sex_err"><?php echo $customer_sex_err; ?></div>
            </div>

            <div>
                <div>عکس</div>
                <div><input type="file" name="customer_pic" id="customer_pic"/></div>
                <div id="customer_pic_err"><?php echo $customer_pic_err; ?></div>
            </div>

            <div>
                <div></div>
                <div>
                    <input type="submit" value="ثبت فرم"/>
                    <input type="reset" value="پاک کردن"/>
                </div>
                <div></div>
            </div>


        </form>
    </div>
</body>
</html>