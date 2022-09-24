<?php

require_once('define_session.php');
require_once('../include/connect.php');
require_once('basket_functions.php');
// start delete --------------------------------------------------
// end delete --------------------------------------------------
$title = 'سبد خرید';
$link = '<link href="/almaprojects/shopping_card_alma2/template/template1/css/basket.css" rel="stylesheet"/>';
$customer_id = $_SESSION['user'];
// select all rows
if ($is_guest == 0) {
    $stmt_customer = $con->query("SELECT * FROM customers WHERE customer_id='$customer_id'");
    $row_c = $stmt_customer->fetchObject();
//    $rowCount_address = $stmt_customer->rowCount();
//    $row=$stmt_add->fetcthObject();
//    echo $row->customer_address;
}
function englishToPersianNumber($English_Number)
{
    $Persian_Number = str_replace(
        array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),
        array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'),
        $English_Number);
    return ($Persian_Number);
}

$customer_title_err = "";
$customer_family_err = "";// 111*222*333
$customer_tel_err = ""; //99 000 000 0
$customer_email_err = "";
$customer_address_err = "";
$customer_postal_code_err = "";
require_once("header.php");
$con = null;
?>
<div class="container">
    <?php if ($basket_items <= 0) { ?>
        <div class="empty-basket">سبد خرید شما خالی است
        &nbsp;
            <a>از دسته های بالا انتخاب کنید</a>
        </div>
    <?php } else { ?>
        <div>
<!--            <form id="delete-form" name="delete-form" action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?><!-- "-->
<!--                  method="post">-->
<!--            </form>-->
            <form id="purchase-form" name="purchase-form" action="checkout.php"
                  method="post">
            </form>
        </div>
        <div id="stage">
            <div id="select-stage-1" onclick="showStage('select-stage-1', 'stage1')">
                <span>۱.</span>
                وارد کردن اطلاعات ارسال
            </div>
            <div id="select-stage-2" onclick="stage1Checker(<?php echo $is_guest ?>)">
                <span>۲.</span>
                نحوه ی ارسال و پرداخت
            </div>
            <div id="select-stage-3" onclick="stage2Checker(<?php echo $is_guest ?>,<?php echo $customer_id ?>)">
                <span>۳.</span>
                مرور سفارش و تکمیل
            </div>
        </div>
        <div id="stage-content">
            <div id="stage1">
                <div id="addressing-info">
                    <?php if ($is_guest == 0) { ?>
                        <div id="stage-err" class="color-red"></div>
                        <p>از آدرس های زیر انتخاب کنید</p>

                        <p id="addresses"><select name="address_choices" id="address_choices" form="purchase-form">
                                <!--                        --><?php //while ($row_m = $stmt_customer->fetchObject()) { ?>
                                <option onclick="changeAddressEntry('none')"
                                        value="<?php echo $row_c->customer_address ?>"><?php echo $row_c->customer_address ?>
                                </option>
                                <!--                        --><?php //} ?>
                                <option onclick="changeAddressEntry('block')" value="new">آدرس جدید</option>
                            </select></p>
                        <div class="basket-customer-info" style="display: none" onload="changeAddressEntry('none')"
                             id="new-info">
                            <div>
                                <div>نام<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_title" id="customer_title" form="purchase-form"
                                            value="<?php echo $row_c->customer_title ?>"/></div>
                                <div id="customer_title_err"><?php echo $customer_title_err; ?></div>
                            </div>
                            <div>
                                <div>فامیل<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_family" id="customer_family" form="purchase-form"
                                            value="<?php echo $row_c->customer_family ?>"/></div>
                                <div id="customer_family_err"><?php echo $customer_family_err; ?></div>
                            </div>
                            <div>
                                <div>آدرس<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_address" id="customer_address"
                                            form="purchase-form"/></div>
                                <div id="customer_address_err"><?php echo $customer_address_err; ?></div>
                            </div>
                            <div>
                                <div>شماره تلفن<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_tel" id="customer_tel" form="purchase-form"/>
                                </div>
                                <div id="customer_tel_err"><?php echo $customer_tel_err; ?></div>
                            </div>
                            <div>
                                <div>کد پستی<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_postal_code" id="customer_postal_code"
                                            form="purchase-form"/></div>
                                <div id="customer_postal_code_err"><?php echo $customer_postal_code_err; ?></div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div id="stage-err" class="color-red"></div>
                        <div style="font-size: 16px">ثبت نام کرده اید؟<a href="#user-login">وارد شوید</a></div>

                        <div class="basket-customer-info" id="guest_info">
                            <div>
                                <div>ایمیل<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_email" id="customer_email" form="purchase-form"/>
                                </div>
                                <div id="customer_email_err"><?php echo $customer_email_err; ?></div>
                            </div>
                            <div>
                                <div>نام<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_title" id="customer_title" form="purchase-form"/>
                                </div>
                                <div id="customer_title_err"><?php echo $customer_title_err; ?></div>
                            </div>
                            <div>
                                <div>فامیل<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_family" id="customer_family"
                                            form="purchase-form"/></div>
                                <div id="customer_family_err"><?php echo $customer_family_err; ?></div>
                            </div>
                            <div>
                                <div>آدرس<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_address" id="customer_address"
                                            form="purchase-form"/></div>
                                <div id="customer_address_err"><?php echo $customer_address_err; ?></div>
                            </div>
                            <div>
                                <div>شماره تلفن<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_tel" id="customer_tel" form="purchase-form"/>
                                </div>
                                <div id="customer_tel_err"><?php echo $customer_tel_err; ?></div>
                            </div>
                            <div>
                                <div>کد پستی<span class="color-red">*</span></div>
                                <div><input type="text" name="customer_postal_code" id="customer_postal_code"
                                            form="purchase-form"/></div>
                                <div id="customer_postal_code_err"><?php echo $customer_postal_code_err; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div id="stage2" class="stage-disabled">
                <div>
                    <div class="basket-cont-main"><input type="text" id="coupon" name="coupon" form="purchase-form"
                                                         placeholder="اگر کد تخیفی دارید وارد نمایید"/></div>
                    <div class="basket-cont-main">
                        <div class="cont-title">
                            انتخاب نحوه ی ارسال
                        </div>
                        <div>
                            <div><input type="radio" id="shipping-method1" name="invoice_shipping_method"
                                        form="purchase-form" value="1" checked="checked"/><label for="shipping-method1">ارسال
                                    یک هفته ای، 3 هزار تومان</label></div>
                            <div><input type="radio" id="shipping-method2" name="invoice_shipping_method"
                                        form="purchase-form" value="2"/><label for="shipping-method2">ارسال
                                    3 روزه، 6 هزار تومان</label></div>
                        </div>
                        <div>
                            <div class="cont-title">
                                انتخاب نحوه ی پرداخت
                            </div>
                            <div>
                                <img src="/almaprojects/shopping_card_alma2/template/template1/image/bank-mellat.png"/>
                                <input type="radio" id="payment-method1" name="invoice_payment_method"
                                       form="purchase-form" value="1" checked="checked"/><label for="payment-method1">
                                    پرداخت الکترونیکی بانک ملت</label>

                                <input type="radio" id="payment-method2" name="invoice_payment_method"
                                       form="purchase-form" value="2"/><label for="payment-method2">
                                    پرداخت درب منزل</label>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="stage3" class="stage-disabled">
                <div style="width: 100%;" id="basket-items">
                </div>
                <div id="complete">
                </div>
                <input type="submit" form="purchase-form" name="checkout" id="checkout" value="تکمیل خرید"/>
            </div>
        </div>
    <?php } ?>
</div>

<?php require_once('footer.php'); ?>
<script src="../template/template1/javascript/basket.js"></script>
<script src="../template/template1/javascript/ajax.js"></script>
<script>showBasketItems('<?php echo $customer_id;?>','basket-items')</script>
<!--<script>stage1()</script>-->
<?php
//if (!isset($_GET['stage'])) {
//    $stage = 'stage1';
//}
//else{
//    $stage=$_GET['stage'];
//}
//switch ($stage) {
//    case 'stage1':echo '<script>showStage(\'select-stage-1\','.$stage.')</script>';
//    case 'stage2':echo '<script>showStage(\'select-stage-2\','.$stage.')</script>';
//    case 'stage3':echo '<script>showStage(\'select-stage-3\','.$stage.')</script>';
//    case 'stage4':echo '<script>showStage(\'select-stage-4\','.$stage.')</script>';
//}
?>
 
