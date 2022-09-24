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
$customer_id_err = "";
$customer_name_err = "";
$customer_family_err = "";// 111*222*333
$customer_title_err = "";
$customer_type_err = "";  //100000 gram
$customer_company_name_err = ""; // 1395/07/22
$customer_tel_err = ""; //99 000 000 0
$customer_mobile_err = "";
$customer_email_err = "";
$customer_address_err = "";
$customer_postal_code_err = "";
$customer_sex_err = "";
$customer_pic_err = "";
//echo $_POST['image-edit'];
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['image-edit'])) {
        require_once('../include/connect.php');

        $id = $_POST['image-edit'];
        $stmt = $con->query("SELECT * FROM customers WHERE customer_id='$id'");
        $row = $stmt->fetchObject();
        $customer_name = $row->customer_name;
        $customer_family = $row->customer_family;
        $customer_title = $row->customer_title;
        $customer_type = $row->customer_type;
        $customer_company_name = $row->customer_company_name;
        $customer_address = $row->customer_address;
        $customer_tel = $row->customer_tel;
        $customer_mobile = $row->customer_mobile;
        $customer_email = $row->customer_email;
        $customer_postal_code = $row->customer_postal_code;
        $customer_sex = $row->customer_sex;
        $old_customer_pic = $row->customer_pic;
        if ($customer_sex == 0) {
            $sex = "male";
        } else if ($customer_sex == 1) {
            $sex = "female";
        }
        //person
        if ($customer_type == 1) {
            $person = 'natural';
        } else if ($customer_type == 0) {
            $person = 'legal';
        }
        echo $person;
        echo $person;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-submit'])) {

        $customer_id = $_POST['customer_id'];
        $customer_name = $_POST['customer_name'];
        $customer_family = $_POST['customer_family'];
        $customer_title = $_POST['customer_title'];
        $customer_type = $_POST['customer_type'];
        $customer_company_name = $_POST['customer_company_name'];
        $customer_address = $_POST['customer_address'];
        $customer_tel = $_POST['customer_tel'];
        $customer_mobile = $_POST['customer_mobile'];
        $customer_email = $_POST['customer_email'];
        $customer_postal_code = $_POST['customer_postal_code'];
        $customer_sex = $_POST['customer_sex'];
        $customer_sex = $_POST['customer_sex'];

        //sex
        if ($customer_sex == 'male') {
            $sex = 0;
        } else if ($customer_sex == 'female') {
            $sex = 1;
        }
        //person
        if ($customer_type == 'natural') {
            $person = 1;
        } else if ($customer_type == 'legal') {
            $person = 0;
        }

        require_once('../include/connect.php');
        require_once('../include/upload.php');

        if ($_FILES['customer_pic']['name'] != "") {
            $form_file_name = 'customer_pic';
            $new_customer_pic = upload_photo($form_file_name, $customer_name, 'customer');
        } else {
            $new_customer_pic = $_POST['old_customer_pic'];
        }

        $stmt = $con->query("UPDATE customers SET customer_name='$customer_name',customer_family='$customer_family',customer_title='$customer_title',
        customer_type='$person',customer_company_name='$customer_company_name',customer_tel='$customer_tel',customer_mobile='$customer_mobile',customer_email='$customer_email',customer_address='$customer_address',customer_postal_code='$customer_postal_code',customer_sex='$sex',customer_pic='$new_customer_pic' WHERE customer_id='$customer_id'");
        echo '<br><br><div class="info">شما  پس از 3 ثانیه به لیست دسته ها منتقل خواهید شد</div>';
        $mess = $stmt ? 1 : 2;
        header("location:customer_view.php?message=" . $mess);

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
            <div>نام کاربری</div>
            <div><input type="text" name="customer_id" id="customer_id" value="<?php echo $id; ?>" readonly/></div>
        </div>
        <div>
            <div>نام انگلیسی</div>
            <div><input type="text" name="customer_name" id="customer_name" value="<?php echo $customer_name; ?>"/>
            </div>
            <div id="customer_name_err"><?php echo $customer_name_err; ?></div>
        </div>
        <div>
            <div>فامیل</div>
            <div><input type="text" name="customer_family" id="customer_family"
                        value="<?php echo $customer_family; ?>"/></div>
            <div id="customer_family_err"><?php echo $customer_family_err; ?></div>
        </div>
        <div>
            <div>عنوان</div>
            <div><input type="text" name="customer_title" id="customer_title" value="<?php echo $customer_title; ?>"/>
            </div>
            <div id="customer_title_err"><?php echo $customer_title_err; ?></div>
        </div>
        <div>
            <div>نوع</div>
            <div><input type="radio" name="customer_type" value="natural"
                        id="natural_person" <?php if ($person == 'natural') echo 'checked' ?> /><label
                    for="natural"><span></span>حقیقی </label>
                <input type="radio" name="customer_type" value="legal"
                       id="legal_person" <?php if ($person == 'legal') echo 'checked' ?> /><label
                    for="legal"><span></span>حقوقی </label></div>
            <div id="customer_type_err"><?php echo $customer_type_err; ?></div>
        </div>
        <div>
            <div>نام شرکت</div>
            <div><input type="text" name="customer_company_name" id="customer_company_name"
                        value="<?php echo $customer_company_name; ?>"/></div>
            <div id="customer_company_name_err"><?php echo $customer_company_name_err; ?></div>
        </div>
        <div>
            <div>آدرس</div>
            <div><input type="text" name="customer_address" id="customer_address"
                        value="<?php echo $customer_address; ?>"/></div>
            <div id="address_err"><?php echo $customer_address_err; ?></div>
        </div>
        <div>
            <div>موبایل</div>
            <div><input type="text" name="customer_mobile" id="customer_mobile"
                        value="<?php echo $customer_mobile; ?>"/></div>
            <div id="customer_mobile_err"><?php echo $customer_mobile_err; ?></div>
        </div>
        <div>
            <div>شماره تلفن</div>
            <div><input type="text" name="customer_tel" id="customer_tel" value="<?php echo $customer_tel; ?>"/></div>
            <div id="customer_tel_err"><?php echo $customer_tel_err; ?></div>
        </div>
        <div>
            <div>ایمیل</div>
            <div><input type="text" name="customer_email" id="customer_email" value="<?php echo $customer_email; ?>"/>
            </div>
            <div id="customer_email_err"><?php echo $customer_email_err; ?></div>
        </div>
        <div>
            <div>کد پستی</div>
            <div><input type="text" name="customer_postal_code"
                        id="customer_postal_code" <?php echo $customer_postal_code; ?>" />
            </div>
            <div id="customer_postal_code_err"><?php echo $customer_postal_code_err; ?></div>
        </div>
        <div>
            <div>جنسیت</div>
            <div><input type="radio" name="customer_sex" value="female"
                        id="female" <?php if ($sex == 'female') echo 'checked' ?> /><label for="female"><span></span>زن
                </label>
                <input type="radio" name="customer_sex" value="male"
                       id="male" <?php if ($sex == 'male') echo 'checked' ?> /><label for="male"><span></span>مرد
                </label></div>
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
                <input type="submit" id="update-submit" name="update-submit" value="ثبت فرم"/>
                <input type="reset" value="پاک کردن"/>
            </div>
            <div></div>
        </div>
    </form>
    <img class="edit-image" src="../photo/customer/<?php echo $old_customer_pic; ?>"/>
    <input form="form" type="hidden" id="old_customer_pic" name="old_customer_pic" readonly
           value="<?php echo $old_customer_pic; ?>"/>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>