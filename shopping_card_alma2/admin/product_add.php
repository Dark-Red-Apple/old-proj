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

$product_id_err = "";
$cat_id_err = "";
$product_title_err = "";
$brand_id_err = "";
$product_name_err = "";
$product_size_err = "";// 111*222*333
$product_weight_err = "";  //100000 gram
$product_date_err = ""; // 1395/07/22
$product_price_err = ""; //99 000 000 0
$product_warranty_err = "";
$product_exist_err = "";
$product_pic_err = "";
$product_desc_err = "";
require_once('../include/connect.php');
$stmtb = $con->query("SELECT brand_id,brand_name FROM brands");
$stmtc = $con->query("SELECT cat_id,cat_name FROM categories");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_id = $_POST['product_id'];
    $cat_id = $_POST['cat_id'];
    $brand_id = $_POST['brand_id'];
    $product_name = $_POST['product_name'];
    $product_title = $_POST['product_title'];
    $product_size = $_POST['product_size'];// 111*222*333
    $product_weight = $_POST['product_weight'];  //100000 gram
    $product_date = $_POST['product_date']; // 1395/07/22
    $product_price = $_POST['product_price']; //99 000 000 0
    $product_warranty = $_POST['product_warranty'];
    $product_exist = isset($_POST['product_exist']) ? $_POST['product_exist'] : null;
    $product_desc = isset($_POST['product_desc']) ? $_POST['product_desc'] : null;;
    echo $product_exist;


    if ($product_exist == 'exist') {
        $exist = 1;
    } else if ($product_exist == 'not_exist') {
        $exist = 0;
    } else {
        $exist = "-";
    }
//    if($_POST['cat_photo']) $cat_photo = $_POST['cat_photo'];

    //echo '<br />'.$cat_name . ', ' . $cat_id . ', ' . $cat_photo.'<br />';


    require_once('../include/upload.php');

    if ($_FILES['product_pic']['name'] != "") {
        $form_file_name = 'product_pic';
        $product_pic = upload_photo($form_file_name, $product_name, 'product');
    } else {
        $product_pic = "sample_product.png";
    }

    $stmt = $con->query("INSERT INTO products (product_id, cat_id, brand_id, product_name,product_title,product_size,
        product_weight,product_date,product_desc,product_price,product_warranty,product_exist,product_pic) 
        VALUES ('$product_id', '$cat_id','$brand_id', '$product_name','$product_title','$product_size','$product_weight',
        '$product_date','$product_desc','$product_price','$product_warranty','$exist','$product_pic')");
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
            <div>کد محصول</div>
            <div><input type="text" name="product_id" id="product_id"/></div>
            <div id="email_err"><?php echo $product_id_err; ?></div>
        </div>
        <div>
            <div>کد دسته</div>
            <div><select name="cat_id" id="cat_id">
                    <?php while ($rowc = $stmtc->fetchObject()) {
                        echo '<option value = "' . $rowc->cat_id . '" >' . $rowc->cat_name . '</option >';
                    } ?>
                </select>
            </div>
            <div id="id_err"><?php echo $cat_id_err; ?></div>
        </div>
        <div>
            <div> برند</div>
            <div><select name="brand_id" id="brand_id">
                    <?php while ($rowb = $stmtb->fetchObject()) {
                        echo "<option value = $rowb->brand_id>$rowb->brand_name</option >";
                    } ?>
                </select>
            </div>
            <div id="id_err"><?php echo $brand_id_err; ?></div>
        </div>
        <div>
            <div>نام انگلیسی محصول</div>
            <div><input type="text" name="product_name" id="product_name"/></div>
            <div id="$product_name_err"><?php echo $product_name_err; ?></div>
        </div>
        <div>
            <div>نام محصول</div>
            <div><input type="text" name="product_title" id="product_title"/></div>
            <div id="product_title_err"><?php echo $product_title_err; ?></div>
        </div>
        <div>
            <div>توضیحات</div>
            <div><textarea type="text" name="product_desc" id="product_desc"></textarea></div>
            <div id="product_desc_err"><?php echo $product_desc_err; ?></div>
        </div>
        <div>
            <div>سایز محصول</div>
            <div><input type="text" name="product_size" id="product_size"/></div>
            <div id="size_err"><?php echo $product_size_err; ?></div>
        </div>
        <div>
            <div>وزن محصول</div>
            <div><input type="text" name="product_weight" id="product_weight"/></div>
            <div id="weight_err"><?php echo $product_weight_err; ?></div>
        </div>
        <div>
            <div>تاریخ تولید محصول</div>
            <div><input type="text" name="product_date" id="product_date"/></div>
            <div id="date_err"><?php echo $product_date_err; ?></div>
        </div>
        <div>
            <div>قیمت محصول</div>
            <div><input type="text" name="product_price" id="product_price"/></div>
            <div id="price_err"><?php echo $product_price_err; ?></div>
        </div>
        <div>
            <div>گارانی محصول</div>
            <div><input type="text" name="product_warranty" id="product_warranty"/></div>
            <div id="warranty_err"><?php echo $product_warranty_err; ?></div>
        </div>
        <div>
            <div> موجودی محصول</div>
            <div><input type="radio" name="product_exist" value="exist" id="product_exist"/><label
                    for="product_exist"><span></span>موجود است </label>
                <input type="radio" name="product_exist" value="not_exist" id="product_exist"/><label
                    for="product_exist"><span></span>موجود نیست </label></div>
            <div id="exist_err"><?php echo $product_exist_err; ?></div>
        </div>
        <div>
            <div>عکس محصول جدید</div>
            <div><input type="file" name="product_pic" id="product_pic"/></div>
            <div id="pic_err"><?php echo $product_pic_err; ?></div>
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
<?php require_once('footer.php'); ?>
</body>
</html>