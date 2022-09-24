<!doctype html>
<?php
require_once('../include/connect.php');
$comment_customer_name_err = "";
$comment_rating1_err = "";
$comment_rating2_err = "";
$comment_rating3_err = "";
$comment_state_err = "";
$comment_desc_err = "";
try {
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit-field'])) {
        $comment_id = $_GET['edit-field'];
        $stmt = $con->query("SELECT pcomments.*,products.product_title,products.product_rate FROM pcomments INNER JOIN products ON pcomments.comment_product_id=products.product_id WHERE pcomments.comment_id='$comment_id'");
        $row = $stmt->fetchObject();
        $rating1 = ceil(($row->comment_rating1) * 2) / 2;
        $rating2 = ceil(($row->comment_rating2) * 2) / 2;
        $rating3 = ceil(($row->comment_rating3) * 2) / 2;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-submit'])) {
        $product_rate = $_POST['product_rate'];
        $comment_id = $_POST['comment_id'];
        $customer_id = $_POST['comment_customer_id'];
        $c_customer_name = $_POST['comment_customer_name'];
        $c_product_id = $_POST['comment_product_id'];
        $c_desc = $_POST['comment_desc'];
        $c_rating1 = isset($_POST['rating1']) ? $_POST['rating1'] : null;
        $c_rating2 = isset($_POST['rating2']) ? $_POST['rating2'] : null;
        $c_rating3 = isset($_POST['rating3']) ? $_POST['rating3'] : null;
        $comment_state = $_POST['comment_state'];
        $stmt = $con->query("UPDATE pcomments SET comment_customer_name='$c_customer_name',comment_desc='$c_desc',comment_state='$comment_state' WHERE comment_id='$comment_id'");
        if ($stmt) {
            if ($comment_state == 'show') {
                $product_rate = ($c_rating1 + $c_rating2 + $c_rating3 + $product_rate) / (($c_rating1 != null ? 1 : 0) + ($c_rating2 != null ? 1 : 0) + ($c_rating3 != null ? 1 : 0) + ($product_rate != null ? 1 : 0));
                $stmt = $con->query("UPDATE products SET product_rate='$product_rate' WHERE product_id='$c_product_id'");
            }
            $_SESSION['message'] = 1;
//            header('location:product_comment_view.php');
        }
    } else {
        header('error.php');
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<html lang="fa" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>افزودن دسته </title>
    <?php require_once("main_links.html"); ?>
    <?php require_once("form_links.html"); ?>
</head>
<body>
<?php require_once("header.php"); ?>
<div class="container">
    <form id="form" method="post"
          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?' . $_SERVER['QUERY_STRING']) ?>"
          enctype="multipart/form-data">
        <input type="hidden" name="product_rate" id="product_rate" value="<?php echo $row->product_rate; ?>">
        <div>
            <div>کد نظر</div>
            <div><input type="text" name="comment_id" id="comment_id"
                        value="<?php echo $row->comment_id; ?>" readonly/></div>
        </div>
        <div>
            <div>کد مشتری</div>
            <div><input type="text" name="comment_customer_id" id="comment_customer_id"
                        value="<?php echo $row->comment_customer_id; ?>" readonly/></div>
        </div>
        <div>
            <div>نام مشتری</div>
            <div><input type="text" name="comment_customer_name" id="comment_customer_name"
                        value="<?php echo $row->comment_customer_name; ?>"/>
            </div>
            <div id="comment_customer_name_err"><?php echo $comment_customer_name_err; ?></div>
        </div>
        <div>
            <div>کد محصول</div>
            <div><input type="text" name="comment_product_id" id="comment_product_id"
                        value="<?php echo $row->comment_product_id; ?>" readonly/>
            </div>
        </div>
        <div>
            <div>نام محصول</div>
            <div><input type="text" name="product_name" id="product_name"
                        value="<?php echo $row->product_title; ?>" readonly/></div>
        </div>
        <div>
            <div>متن نظر</div>
            <div><textarea name="comment_desc" id="comment_desc" value=""><?php echo $row->comment_desc; ?></textarea>
            </div>
            <div id="comment_desc"><?php echo $comment_desc_err; ?></div>
        </div>
        <div>
            <div class="float-right">کیفیت</div>
            <div class="rating">
                <input type="radio" id="r1-star5" name="rating1"
                       value="5" <?php if ($rating1 == 5) echo 'checked' ?>/><label class="full"
                                                                                    for="r1-star5"
                                                                                    title="عالی"></label>
                <input type="radio" id="r1-star4half" name="rating1"
                       value="4.5" <?php if ($rating1 == 4.5) echo 'checked' ?>/><label class="half"
                                                                                        for="r1-star4half"
                                                                                        title="خیلی خوب"></label>
                <input type="radio" id="r1-star4" name="rating1"
                       value="4" <?php if ($rating1 == 3) echo 'checked' ?>/><label class="full"
                                                                                    for="r1-star4"
                                                                                    title="خوب"></label>
                <input type="radio" id="r1-star3half" name="rating1"
                       value="3.5" <?php if ($rating1 == 3.5) echo 'checked' ?>/><label class="half"
                                                                                        for="r1-star3half"
                                                                                        title="بهتر از معمولی"></label>
                <input type="radio" id="r1-star3" name="rating1"
                       value="3" <?php if ($rating1 == 3) echo 'checked' ?>/><label class="full"
                                                                                    for="r1-star3"
                                                                                    title="معمولی"></label>
                <input type="radio" id="r1-star2half" name="rating1"
                       value="2.5" <?php if ($rating1 == 2.5) echo 'checked' ?>/><label class="half"
                                                                                        for="r1-star2half"
                                                                                        title="کمتر از معمولی"></label>
                <input type="radio" id="r1-star2" name="rating1"
                       value="2" <?php if ($rating1 == 2) echo 'checked' ?>/><label class="full"
                                                                                    for="r1-star2"
                                                                                    title="کمی بد"></label>
                <input type="radio" id="r1-star1half" name="rating1"
                       value="1.5" <?php if ($rating1 == 1.5) echo 'checked' ?>/><label class="half"
                                                                                        for="r1-star1half"
                                                                                        title="بد"></label>
                <input type="radio" id="r1-star1" name="rating1"
                       value="1" <?php if ($rating1 == 1) echo 'checked' ?>/><label class="full"
                                                                                    for="r1-star1"
                                                                                    title="خیلی بد"></label>
                <input type="radio" id="r1-starhalf" name="rating1"
                       value="0.5" <?php if ($rating1 == 0.5) echo 'checked' ?>/><label class="half"
                                                                                        for="r1-starhalf"
                                                                                        title="فاجعه"></label>
            </div>
            <div id="comment_desc"><?php echo $comment_rating1_err; ?></div>
        </div>
        <div>
            <div class="float-right">زیبایی</div>
            <div class="rating">
                <input type="radio" id="r2-star5" name="rating2" value="5" <?php if ($rating3 == 5) echo 'checked'; ?>/><label
                    class="full"
                    for="r2-star5"
                    title="عالی"></label>
                <input type="radio" id="r2-star4half" name="rating2"
                       value="4.5" <?php if ($rating3 == 4.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r2-star4half"
                                                                                         title="خیلی خوب"></label>
                <input type="radio" id="r2-star4" name="rating2" value="4" <?php if ($rating3 == 4) echo 'checked'; ?>/><label
                    class="full"
                    for="r2-star4"
                    title="خوب"></label>
                <input type="radio" id="r2-star3half" name="rating2"
                       value="3.5" <?php if ($rating3 == 3.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r2-star3half"
                                                                                         title="بهتر از معمولی"></label>
                <input type="radio" id="r2-star3" name="rating2" value="3" <?php if ($rating3 == 3) echo 'checked'; ?>/><label
                    class="full"
                    for="r2-star3"
                    title="معمولی"></label>
                <input type="radio" id="r2-star2half" name="rating2"
                       value="2.5" <?php if ($rating3 == 2.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r2-star2half"
                                                                                         title="کمتر از معمولی"></label>
                <input type="radio" id="r2-star2" name="rating2" value="2" <?php if ($rating3 == 2) echo 'checked'; ?>/><label
                    class="full"
                    for="r2-star2"
                    title="کمی بد"></label>
                <input type="radio" id="r2-star1half" name="rating2"
                       value="1.5" <?php if ($rating3 == 1.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r2-star1half"
                                                                                         title="بد"></label>
                <input type="radio" id="r2-star1" name="rating2" value="1" <?php if ($rating3 == 1) echo 'checked'; ?>/><label
                    class="full"
                    for="r2-star1"
                    title="خیلی بد"></label>
                <input type="radio" id="r2-starhalf" name="rating2"
                       value="0.5" <?php if ($rating3 == 0.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r2-starhalf"
                                                                                         title="فاجعه"></label>
            </div>
            <div id="comment_desc"><?php echo $comment_rating2_err; ?></div>
        </div>
        <div>
            <div class="float-right">مقاومت</div>
            <div class="rating">
                <input type="radio" id="r3-star5" name="rating3" value="5" <?php if ($rating3 == 5) echo 'checked'; ?>/><label
                    class="full" for="r3-star5"
                    title="عالی"></label>
                <input type="radio" id="r3-star4half" name="rating3"
                       value="4.5" <?php if ($rating3 == 4.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r3-star4half"
                                                                                         title="خیلی خوب"></label>
                <input type="radio" id="r3-star4" name="rating3" value="4" <?php if ($rating3 == 4) echo 'checked'; ?>/><label
                    class="full"
                    for="r3-star4"
                    title="خوب"></label>
                <input type="radio" id="r3-star3half" name="rating3"
                       value="3.5" <?php if ($rating3 == 3.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r3-star3half"
                                                                                         title="بهتر از معمولی"></label>
                <input type="radio" id="r3-star3" name="rating3" value="3" <?php if ($rating3 == 3) echo 'checked'; ?>/><label
                    class="full"
                    for="r3-star3"
                    title="معمولی"></label>
                <input type="radio" id="r3-star2half" name="rating3"
                       value="2.5" <?php if ($rating3 == 2.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r3-star2half"
                                                                                         title="کمتر از معمولی"></label>
                <input type="radio" id="r3-star2" name="rating3" value="2" <?php if ($rating3 == 2) echo 'checked'; ?>/><label
                    class="ful"
                    for="r3-star2"
                    title="کمی بد"></label>
                <input type="radio" id="r3-star1half" name="rating3"
                       value="1.5" <?php if ($rating3 == 1.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r3-star1half"
                                                                                         title="بد"></label>
                <input type="radio" id="r3-star1" name="rating3" value="1" <?php if ($rating3 == 1) echo 'checked'; ?>/><label
                    class="full"
                    for="r3-star1"
                    title="خیلی بد"></label>
                <input type="radio" id="r3-starhalf" name="rating3"
                       value="0.5" <?php if ($rating3 == 0.5) echo 'checked'; ?>/><label class="half"
                                                                                         for="r3-starhalf"
                                                                                         title="فاجعه"></label>
            </div>
            <div id="comment_desc"><?php echo $comment_rating3_err; ?></div>
        </div>
        <div>
            <div>وضعیت</div>
            <div><select name="comment_state" id="comment_state">
                    <option value="hide" <?php if ($row->comment_state == 'hide') echo 'selected' ?> >hide</option>
                    <option value="show" <?php if ($row->comment_state == 'show') echo 'selected' ?> >show</option>
                </select>
            </div>
            <div id="comment_state_err"><?php echo $comment_state_err; ?></div>
        </div>
        <br/>
        <div>
            <div></div>
            <div>
                <input type="submit" id="update-submit" name="update-submit" value="ثبت فرم"/>
                <input type="reset" value="پاک کردن"/>
            </div>
            <div></div>
        </div>
    </form>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>