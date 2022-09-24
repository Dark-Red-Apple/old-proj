<?php include "../include/menu.php"; ?>

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
    <link href="../template/template1/css/form.css" rel="stylesheet"/>
</head>
<body>

<?php

$product_id_err = "";
$cat_id_err = "";
$brand_id_err = "";
$product_name_err = "";
$product_size_err = "";// 111*222*333
$product_weight_err = "";  //100000 gram
$product_date_err = ""; // 1395/07/22
$product_price_err = ""; //99 000 000 0
$product_warranty_err = "";
$product_exist_err = "";
$product_pic_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_id = $_POST['product_id'];
    $cat_id = $_POST['cat_id'];
    $brand_id = $_POST['brand_id'];
    $product_name = $_POST['product_name'];
    $product_size = $_POST['product_size'];// 111*222*333
    $product_weight = $_POST['product_weight'];  //100000 gram
    $product_date = $_POST['product_date']; // 1395/07/22
    $product_price = $_POST['product_price']; //99 000 000 0
    $product_warranty = $_POST['product_warranty'];
    $product_exist = $_POST['product_exist'];
    echo $product_exist;

    if ($product_exist == 'exist') {
        $exist = 1;
    } else if ($product_exist == 'not_exist') {
        $exist = 0;
    }
//    if($_POST['cat_photo']) $cat_photo = $_POST['cat_photo'];

    //echo '<br />'.$cat_name . ', ' . $cat_id . ', ' . $cat_photo.'<br />';

    require_once('../include/connect.php');
    require_once('../include/upload.php');

    if ($_FILES['product_pic']['name'] != "") {
        $form_file_name = 'product_pic';
        $product_pic = upload_photo($form_file_name, $product_id, 'product');
    } else {
        $product_pic = "sample_product.png";
    }

    $stmt = $con->query("INSERT INTO product (product_id, cat_id, brand_id, product_name,product_size,
        product_weight,product_date,product_price,product_warranty,product_exist,product_pic) 
        VALUES ('$product_id', '$cat_id','$brand_id', '$product_name','$product_size','$product_weight',
        '$product_date','$product_price','$product_warranty','$exist','$product_pic')");
    echo "New records created successfully";

    $con = null;
}
?>


<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
      enctype="multipart/form-data">
    <div>
        <div>کد محصول</div>
        <div><input type="text" name="product_id" id="product_id"/></div>
        <div id="email_err"><?php echo $product_id_err; ?></div>
    </div>
    <div>
        <div>کد دسته</div>
        <div><input type="text" name="cat_id" id="cat_id"/></div>
        <div id="email_err"><?php echo $cat_id_err; ?></div>
    </div>
    <div>
        <div>کد برند</div>
        <div><input type="text" name="brand_id" id="brand_id"/></div>
        <div id="email_err"><?php echo $brand_id_err; ?></div>
    </div>
    <div>
        <div>نام محصول</div>
        <div><input type="text" name="product_name" id="product_name"/></div>
        <div id="email_err"><?php echo $product_name_err; ?></div>
    </div>
    <div>
        <div>سایز محصول</div>
        <div><input type="text" name="product_size" id="product_size"/></div>
        <div id="email_err"><?php echo $product_size_err; ?></div>
    </div>
    <div>
        <div>وزن محصول</div>
        <div><input type="text" name="product_weight" id="product_weight"/></div>
        <div id="email_err"><?php echo $product_weight_err; ?></div>
    </div>
    <div>
        <div>تاریخ تولید محصول</div>
        <div><input type="text" name="product_date" id="product_date"/></div>
        <div id="email_err"><?php echo $product_date_err; ?></div>
    </div>
    <div>
        <div>قیمت محصول</div>
        <div><input type="text" name="product_price" id="product_price"/></div>
        <div id="email_err"><?php echo $product_price_err; ?></div>
    </div>
    <div>
        <div>گارانی محصول</div>
        <div><input type="text" name="product_warranty" id="product_warranty"/></div>
        <div id="email_err"><?php echo $product_warranty_err; ?></div>
    </div>
    <div>
        <div> موجودی محصول</div>
        <div><input type="radio" name="product_exist" value="exist" id="product_exist"/><label
                for="product_exist"><span></span>موجود است </label>
            <input type="radio" name="product_exist" value="not_exist" id="product_exist"/><label
                for="product_exist"><span></span>موجود نیست </label></div>
        <div id="email_err"><?php echo $product_exist_err; ?></div>
    </div>
    <div>
        <div>عکس محصول جدید</div>
        <div><input type="file" name="product_pic" id="product_pic"/></div>
        <div id="email_err"><?php echo $product_pic_err; ?></div>
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

</body>
</html>