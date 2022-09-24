<?php
require_once('define_session.php');
require_once('../include/connect.php');
require_once('../include/upload.php');
$message = isset($_SESSION['message']) ? $_SESSION['message'] : null;
unset($_SESSION['message']);
if ($message == 1) {
    $div_class = 'not-success-message';
    $message = 'رمز عبور یا نام کاربری اشتباه می باشد.' . '&nbsp' . '<a style="color:#f3ff83;" href="recover_pass.php">رمز عبور خود را فراموش کرده اید؟</a>';
} else if ($message == 2) {
    $div_class = 'not-success-message';
    $message = 'خطا در ثبت';
}

$title = 'ثبت نام';
$link = '<link href="/almaprojects/shopping_card_alma2/template/template1/css/form.css" rel="stylesheet"/>';
if ($is_guest == 0) {
    header('location:customer_profile.php');
}

$customer_id_err = "";
$customer_username_err = "";
$customer_pass_err = "";
$customer_name_err = "";
$customer_family_err = "";// 111*222*333
$customer_title_err = "";// 111*222*333
$customer_type_err = "";  //100000 gram
$customer_company_name_err = ""; // 1395/07/22
$customer_tel_err = ""; //99 000 000 0
$customer_mobile_err = "";
$customer_email_err = "";
$customer_address_err = "";
$customer_postal_code_err = "";
$customer_sex_err = "";
$customer_pic_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer_username = $_POST['customer_username'];
    $customer_pass = $_POST['customer_pass'];
    $customer_repeat_pass = $_POST['customer_repeat_pass'];
    $customer_name = $_POST['customer_name'];
    $customer_family = $_POST['customer_family'];
    $customer_title = $_POST['customer_title'];
    $customer_company_name = $_POST['customer_company_name'];
    $customer_address = $_POST['customer_address'];
    $customer_tel = $_POST['customer_tel'];
    $customer_mobile = $_POST['customer_mobile'];
    $customer_email = $_POST['customer_email'];
    $customer_postal_code = $_POST['customer_postal_code'];
    if (isset($_SESSION['user'])) $customer_id = $_SESSION['user'];

    $valid = true;
    if ($customer_repeat_pass == $customer_pass) {
        $valid = false;
    }
    //sex
    if (!isset($_POST['customer_sex'])) {
        $sex = null;
    } elseif ($customer_sex == 'female') {
        $sex = "1";
    } else if ($customer_sex == 'male') {
        $sex = "0";
    }
    //type
    if (!isset($_POST['customer_type'])) {
        $type = null;
    } elseif ($customer_type == 'Natural') {
        $type = 1;
    } else if ($customer_sex == 'legal') {
        $type = 0;
    }

    if ($_FILES['customer_pic']['name'] != "") {
        $form_file_name = 'customer_pic';
        $customer_pic = upload_photo($form_file_name, $customer_id, 'customer');
    } else {
        $customer_pic = "sample_customer.png";
    }
    $stmt = $con->query("SELECT * FROM customers WHERE customer_email like '$customer_email' AND customer_username like '$customer_username' ");
    $rowCount = $stmt->rowCount();
    if ($rowCount == 0 && !isset($_SESSION['user'])) {
        $stmt = $con->query("INSERT INTO customers (customer_username,customer_pass,customer_name,customer_family,customer_title,
        customer_type,customer_company_name,customer_tel,customer_mobile,customer_email,customer_address,customer_postal_code,customer_sex,customer_pic,customer_is_guest) 
        VALUES ('$customer_username', '$customer_pass', '$customer_name','$customer_family','$customer_title','$type',
        '$customer_company_name','$customer_tel','$customer_mobile','$customer_email','$customer_address','$customer_postal_code','$sex','$customer_pic','0')");
        echo "New records created successfully";
        $last_id = $con->lastInsertId();

        setcookie('user', "", time() - 30600, "/"); // 1 hour ago
        session_unset($_SESSION['user']);
        $_SESSION['user'] = $last_id;
        header('location:register_successfull.php');
    } elseif ($rowCount == 0 && isset($_SESSION['user']) && $valid == true) {
        $stmt = $con->query("UPDATE customers SET customer_username='$customer_username',customer_pass='$customer_pass',customer_name='$customer_name',customer_family='$customer_family',customer_title='$customer_title',
        customer_type='$type',customer_company_name='$customer_company_name',customer_tel='$customer_tel',customer_mobile='$customer_mobile',customer_email='$customer_email',customer_address='$customer_address',customer_postal_code='$customer_postal_code',customer_sex='$sex',customer_pic='$customer_pic',customer_is_guest='0' WHERE customer_id='$customer_id'");
        echo "New records created successfully";
        header('location:register_successfull.php');
    } else {
        echo 'رمز کاربری یا ایمیل وجود دارد';
    }
    $con = null;
}

require_once("header.php");
?>
    <div class="banner">
        <div class="banner-page-location">
            <a href="/almaprojects/shopping_card_alma2/index.php">خانه</a>
            &nbsp&nbsp&nbsp&nbsp>&nbsp&nbsp&nbsp&nbsp
            <a href="/almaprojects/shopping_card_alma2/user/customer_register.php"><?php echo $title ?></a>
        </div>
        <img src="/almaprojects/shopping_card_alma2/template/template1/image/pic46.jpg"/>
    </div>

    <div class="container">
        <?php if (isset($message)) {
            echo '<div class="' . $div_class . '">' . $message . '</div>';
        } ?>
        <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              enctype="multipart/form-data">
            <div>
                <div>نام کاربری<span class="color-red">*</span></div>
                <div><input type="text" name="customer_username" id="customer_username"/></div>
                <div id="customer_username_err"><?php echo $customer_username_err; ?></div>
            </div>
            <div>
                <div>ایمیل<span class="color-red">*</span></div>
                <div><input type="text" name="customer_email" id="customer_email"/></div>
                <div id="customer_email_err"><?php echo $customer_email_err; ?></div>
            </div>
            <div>
                <div>رمز عبور<span class="color-red">*</span></div>
                <div><input type="password" name="customer_pass" id="customer_pass"/></div>
                <div id="customer_pass_err"><?php echo $customer_pass_err; ?></div>
            </div>
            <div>
                <div>تکرار رمز عبور<span class="color-red">*</span></div>
                <div><input type="password" name="customer_repeat_pass" id="customer_repeat_pass"/></div>
                <div id="customer_pass_err"><?php echo $customer_pass_err; ?></div>
            </div>
            <div>
                <div>نام</div>
                <div><input type="text" name="customer_title" id="customer_title"/></div>
                <div id="customer_title"><?php echo $customer_title_err; ?></div>
            </div>
            <div>
                <div>فامیل</div>
                <div><input type="text" name="customer_family" id="customer_family"/></div>
                <div id="customer_family_err"><?php echo $customer_family_err; ?></div>
            </div>
            <div>
                <div>نام انگلیسی</div>
                <div><input type="text" name="customer_name" id="customer_name"/></div>
                <div id="customer_name_err"><?php echo $customer_name_err; ?></div>
            </div>
            <div>
                <div>نوع</div>
                <div><input type="radio" name="customer_type" value="Natural" id="Natural_person"/><label
                        for="Natural"><span></span>حقیقی </label>
                    <input type="radio" name="customer_type" value="legal" id="legal_person"/><label
                        for="legal"><span></span>حقوقی
                    </label></div>
                <div id="customer_type_err"><?php echo $customer_type_err; ?></div>
            </div>
            <div>
                <div>نام شرکت</div>
                <div><input type="text" name="customer_company_name" id="customer_company_name"/></div>
                <div id="customer_company_name_err"><?php echo $customer_company_name_err; ?></div>
            </div>
            <div>
                <div>آدرس</div>
                <div><input type="text" name="customer_address" id="customer_address"/></div>
                <div id="customer_address_err"><?php echo $customer_address_err; ?></div>
            </div>
            <div>
                <div>موبایل</div>
                <div><input type="text" name="customer_mobile" id="customer_mobile"/></div>
                <div id="customer_mobile_err"><?php echo $customer_mobile_err; ?></div>
            </div>
            <div>
                <div>شماره تلفن</div>
                <div><input type="text" name="customer_tel" id="customer_tel"/></div>
                <div id="customer_tel_err"><?php echo $customer_tel_err; ?></div>
            </div>
            <div>
                <div>کد پستی</div>
                <div><input type="text" name="customer_postal_code" id="customer_postal_code"/></div>
                <div id="customer_postal_code_err"><?php echo $customer_postal_code_err; ?></div>
            </div>
            <div>
                <div>جنسیت</div>
                <div><input type="radio" name="customer_sex" value="female" id="female"/><label
                        for="female"><span></span>زن
                    </label>
                    <input type="radio" name="customer_sex" value="male" id="male"/><label for="male"><span></span>مرد
                    </label>
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
                    <input type="submit" value="ثبت نام"/>
                    <input type="reset" value="پاک کردن"/>
                </div>
                <div></div>
            </div>

        </form>
        <div id="user-login" class="float-left">

            <form name="loginForm" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                  enctype="multipart/form-data" method="post">

                <br>
                <input type="text" name="user" id="user" placeholder="نام کاربری">
                <br><br>
                <input type="password" name="pass" id="pass" placeholder="رمز عبور">
                <br><br>
                <input type="checkbox" name="remember" id="remember"> <label for="remember"> مرا به خاطر بسپار</label>
                <br><br>
                <input type="submit" name="submit" value="ورود">

            </form>
        </div>
    </div>
<?php
require_once("footer.php");
?>
<?php