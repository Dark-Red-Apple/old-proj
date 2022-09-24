<?php
require_once('define_session.php');
require_once('../include/connect.php');
$link = '<link href="/almaprojects/shopping_card_alma2/template/template1/css/single_tab.css" rel="stylesheet"/>
         <script src="/almaprojects/shopping_card_alma2/template/template1/javascript/tab.js"></script>';
$message = isset($_SESSION['message']) ? $_SESSION['message'] : null;
unset($_SESSION['message']);
if ($message == 1) {
    $div_class = 'not-success-message';
    $message = 'خطا در ثبت';
} else if ($message == 2) {
    $div_class = 'success-message';
    $message = "نظر شما برای بررسی ارسال شد.";
}

try {
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $stmt = $con->query("SELECT * FROM products WHERE product_id='$product_id'");
        $row_product = $stmt->fetchObject();
        $cat_id = $row_product->cat_id;
        $stmt = $con->query("SELECT cat_title FROM categories WHERE cat_id='$cat_id'");
        $row_cat = $stmt->fetchObject();
        $cat_title = $row_cat->cat_title;
        $stmt_comm = $con->query("SELECT * FROM pcomments WHERE comment_product_id='$product_id' && comment_state='show'");
        $row_omm = $stmt_comm->rowCount();
    } else {
        header('error.php');
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$title = $row_product->product_title;
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {

        require_once('basket_functions.php');
        $order_counts = $_POST['quantity'];
        $customer_id = $_SESSION['user'];
        $product_id = $_POST['product_id'];
        addToBasket($product_id, $order_counts, $customer_id);
        header('location:basket.php');
        exit();
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

require_once("header.php");
?>

<div id="page-location">
    <a href="/almaprojects/shopping_card_alma2/index.php">خانه</a>
    &nbsp&nbsp&nbsp&nbsp>&nbsp&nbsp&nbsp&nbsp
    <a href="/almaprojects/shopping_card_alma2/cat/<?php echo $cat_id ?>"><?php echo $cat_title ?></a>
    &nbsp&nbsp&nbsp&nbsp>&nbsp&nbsp&nbsp&nbsp
    <a href="/almaprojects/shopping_card_alma2/user/single_product.php?product_id=<?php echo $row_product->product_id; ?>"><?php echo $row_product->product_title; ?></a>
</div>
<div class="container">
    <?php if (isset($message)) {
        echo '<div class="' . $div_class . '">' . $message . '</div>';
    } ?>
    <form name="add_to_cart" method="post" id="add_to_cart"
          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

        <div id="single-image"><img
                src="/almaprojects/shopping_card_alma2/photo/product/<?php echo $row_product->product_pic; ?>"></div>
        <div id="single-detail">
            <div id="single-title"><?php echo $row_product->product_title; ?></div>
            <div><select>
                    <option>کوچک</option>
                    <option>متوسط</option>
                    <option>بزرگ</option>
                </select>
            </div>
            <div><select name="quantity">
                    <?php for ($i = 1; $i < 30; $i++) {
                        echo '<option value="' . $i . '">';
                        echo $i . '</option>';
                    } ?>
                </select>
            </div>
            <div>
                <button type="submit" id="single-add-to-cart">افزودن به سبد خرید</button>
            </div>
            <input name="product_id" type="hidden" value="<?php echo $product_id; ?>"/>
        </div>

    </form>
    <div class="float-right" id="main-tab">
        <div id="tabs-list-main">
            <ul>
                <li onclick="showTab(1,this)">
                    <span></span>
                    <a> توضیحات </a>
                </li>
                <li onclick="showTab(2,this)">
                    <span></span>
                    <a>نظرات</a>
                </li>
                <li onclick="showTab(3,this)">
                    <span></span>
                    <a>جدول گل ها</a>
                </li>
            </ul>
        </div>
        <div id="items-container">
            <div id="item-cont-main-1">
                <p><?php echo $row_product->product_desc; ?></p>
            </div>
            <div id="item-cont-main-2">
                <form id="comment-from" method="post"
                      action="comment.php<?php echo htmlspecialchars('?' . $_SERVER['QUERY_STRING']) ?>">
                    <div id="comment-rating">
                        <fieldset id="first-rating" class="rating">
                            <h4>کیفیت</h4>
                            <input type="radio" id="star5" name="rating1" value="5"/><label class="full" for="star5"
                                                                                            title="عالی"></label>
                            <input type="radio" id="star4half" name="rating1" value="4.5"/><label class="half"
                                                                                                  for="star4half"
                                                                                                  title="خیلی خوب"></label>
                            <input type="radio" id="star4" name="rating1" value="4"/><label class="full" for="star4"
                                                                                            title="خوب"></label>
                            <input type="radio" id="star3half" name="rating1" value="3.5"/><label class="half"
                                                                                                  for="star3half"
                                                                                                  title="بهتر از معمولی"></label>
                            <input type="radio" id="star3" name="rating1" value="3"/><label class="full" for="star3"
                                                                                            title="معمولی"></label>
                            <input type="radio" id="star2half" name="rating1" value="2.5"/><label class="half"
                                                                                                  for="star2half"
                                                                                                  title="نه خیلی خوب"></label>
                            <input type="radio" id="star2" name="rating1" value="2"/><label class="full" for="star2"
                                                                                            title="کمی بد"></label>
                            <input type="radio" id="star1half" name="rating1" value="1.5"/><label class="half"
                                                                                                  for="star1half"
                                                                                                  title="بد"></label>
                            <input type="radio" id="star1" name="rating1" value="1"/><label class="full" for="star1"
                                                                                            title="خیلی بد"></label>
                            <input type="radio" id="starhalf" name="rating1" value="0.5"/><label class="half"
                                                                                                 for="starhalf"
                                                                                                 title="فاجعه"></label>
                        </fieldset>
                        <fieldset id="second-rating" class="rating">
                            <h4>زیبایی</h4>
                            <input type="radio" id="r2-star5" name="rating2" value="5"/><label class="full"
                                                                                               for="r2-star5"
                                                                                               title="عالی"></label>
                            <input type="radio" id="r2-star4half" name="rating2" value="4.5"/><label class="half"
                                                                                                     for="r2-star4half"
                                                                                                     title="خیلی خوب"></label>
                            <input type="radio" id="r2-star4" name="rating2" value="4"/><label class="full"
                                                                                               for="r2-star4"
                                                                                               title="خوب"></label>
                            <input type="radio" id="r2-star3half" name="rating2" value="3.5"/><label class="half"
                                                                                                     for="r2-star3half"
                                                                                                     title="بهتر از معمولی"></label>
                            <input type="radio" id="r2-star3" name="rating2" value="3"/><label class="full"
                                                                                               for="r2-star3"
                                                                                               title="معمولی"></label>
                            <input type="radio" id="r2-star2half" name="rating2" value="2.5"/><label class="half"
                                                                                                     for="r2-star2half"
                                                                                                     title="کمتر از معمولی"></label>
                            <input type="radio" id="r2-star2" name="rating2" value="2"/><label class="full"
                                                                                               for="r2-star2"
                                                                                               title="کمی بد"></label>
                            <input type="radio" id="r2-star1half" name="rating2" value="1.5"/><label class="half"
                                                                                                     for="r2-star1half"
                                                                                                     title="بد"></label>
                            <input type="radio" id="r2-star1" name="rating2" value="1"/><label class="full"
                                                                                               for="r2-star1"
                                                                                               title="خیلی بد"></label>
                            <input type="radio" id="r2-starhalf" name="rating2" value="0.5"/><label class="half"
                                                                                                    for="r2-starhalf"
                                                                                                    title="فاجعه"></label>
                        </fieldset>
                        <fieldset id="third-rating" class="rating">
                            <h4>مقاومت</h4>
                            <input type="radio" id="r3-star5" name="rating3" value="5"/><label class="full"
                                                                                               for="r3-star5"
                                                                                               title="عالی"></label>
                            <input type="radio" id="r3-star4half" name="rating3" value="4.5"/><label class="half"
                                                                                                     for="r3-star4half"
                                                                                                     title="خیلی خوب"></label>
                            <input type="radio" id="r3-star4" name="rating3" value="4"/><label class="full"
                                                                                               for="r3-star4"
                                                                                               title="خوب"></label>
                            <input type="radio" id="r3-star3half" name="rating3" value="3.5"/><label class="half"
                                                                                                     for="r3-star3half"
                                                                                                     title="بهتر از معمولی"></label>
                            <input type="radio" id="r3-star3" name="rating3" value="3"/><label class="full"
                                                                                               for="r3-star3"
                                                                                               title="معمولی"></label>
                            <input type="radio" id="r3-star2half" name="rating3" value="2.5"/><label class="half"
                                                                                                     for="r3-star2half"
                                                                                                     title="کمتر از معمولی"></label>
                            <input type="radio" id="r3-star2" name="rating3" value="2"/><label class="full"
                                                                                               for="r3-star2"
                                                                                               title="کمی بد"></label>
                            <input type="radio" id="r3-star1half" name="rating3" value="1.5"/><label class="half"
                                                                                                     for="r3-star1half"
                                                                                                     title="بد"></label>
                            <input type="radio" id="r3-star1" name="rating3" value="1"/><label class="full"
                                                                                               for="r3-star1"
                                                                                               title="خیلی بد"></label>
                            <input type="radio" id="r3-starhalf" name="rating3" value="0.5"/><label class="half"
                                                                                                    for="r3-starhalf"
                                                                                                    title="فاجعه"></label>
                        </fieldset>
                    </div>
                    <div>
                        <input type="text" id="comment_name" name="comment_customer_name" placeholder="نام">
                    </div>
                    <div>
                        <textarea id="comment_desc" name="comment_desc"
                                  placeholder="لطفا دیدگاه خود را نسبت به محصول بنویسید"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="comment_submit" value="ارسال نظر"/>
                    </div>
                </form>
                <?php if ($row_omm != 0) { ?>
                    <div id="customers-comments">
                        <h2>نظرات مشتریان</h2>
                        <?php while ($row = $stmt_comm->fetchObject()) {
                            $rating1 = ceil(($row->comment_rating1) * 2) / 2;
                            $rating2 = ceil(($row->comment_rating2) * 2) / 2;
                            $rating3 = ceil(($row->comment_rating3) * 2) / 2;
                            ?>
                            <div>
                                <div><span>&#9600;<span> <?php echo ' ' . $row->comment_customer_name ?></span></span>

                                </div>
                                <div>
                                    <div class="float-right">کیفیت
                                        <div class="product-rating">
                                            <i class="full <?php if ($rating1 == 5) echo 'rated-value' ?>"
                                               id="p-ra-5"></i>
                                            <i class="half <?php if ($rating1 == 4.5) echo 'rated-value' ?>"
                                               id="p-ra-4.5"></i>
                                            <i class="full <?php if ($rating1 == 4) echo 'rated-value' ?>"
                                               id="p-ra-4"></i>
                                            <i class="half <?php if ($rating1 == 3.5) echo 'rated-value' ?>"
                                               id="p-ra-3.5"></i>
                                            <i class="full <?php if ($rating1 == 3) echo 'rated-value' ?>"
                                               id="p-ra-3"></i>
                                            <i class="half <?php if ($rating1 == 2.5) echo 'rated-value' ?>"
                                               id="p-ra-2.5"></i>
                                            <i class="full <?php if ($rating1 == 2) echo 'rated-value' ?>"
                                               id="p-ra-2"></i>
                                            <i class="half <?php if ($rating1 == 1.5) echo 'rated-value' ?>"
                                               id="p-ra-1.5"></i>
                                            <i class="full <?php if ($rating1 == 1) echo 'rated-value' ?>"
                                               id="p-ra-1"></i>
                                            <i class="half<?php if ($rating1 == 0.5) echo 'rated-value' ?>"
                                               id="p-ra-0.5"></i>
                                        </div>
                                    </div>
                                    <div class="float-right">زیبایی
                                        <div class="product-rating">
                                            <i class="full <?php if ($rating2 == 5) echo 'rated-value' ?>"
                                               id="p-ra-5"></i>
                                            <i class="half <?php if ($rating2 == 4.5) echo 'rated-value' ?>"
                                               id="p-ra-4.5"></i>
                                            <i class="full <?php if ($rating2 == 4) echo 'rated-value' ?>"
                                               id="p-ra-4"></i>
                                            <i class="half <?php if ($rating2 == 3.5) echo 'rated-value' ?>"
                                               id="p-ra-3.5"></i>
                                            <i class="full <?php if ($rating2 == 3) echo 'rated-value' ?>"
                                               id="p-ra-3"></i>
                                            <i class="half <?php if ($rating2 == 2.5) echo 'rated-value' ?>"
                                               id="p-ra-2.5"></i>
                                            <i class="full <?php if ($rating2 == 2) echo 'rated-value' ?>"
                                               id="p-ra-2"></i>
                                            <i class="half <?php if ($rating2 == 1.5) echo 'rated-value' ?>"
                                               id="p-ra-1.5"></i>
                                            <i class="full <?php if ($rating2 == 1) echo 'rated-value' ?>"
                                               id="p-ra-1"></i>
                                            <i class="half <?php if ($rating2 == 0.5) echo 'rated-value' ?>"
                                               id="p-ra-0.5"></i>
                                        </div>
                                    </div>
                                    <div class="float-right">مقاومت
                                        <div class="product-rating">
                                            <i class="full <?php if ($rating3 == 5) echo 'rated-value' ?>"
                                               id="p-ra-5"></i>
                                            <i class="half <?php if ($rating3 == 4.5) echo 'rated-value' ?>"
                                               id="p-ra-4.5"></i>
                                            <i class="full <?php if ($rating3 == 4) echo 'rated-value' ?>"
                                               id="p-ra-4"></i>
                                            <i class="half <?php if ($rating3 == 3.5) echo 'rated-value' ?>"
                                               id="p-ra-3.5"></i>
                                            <i class="full <?php if ($rating3 == 3) echo 'rated-value' ?>"
                                               id="p-ra-3"></i>
                                            <i class="half <?php if ($rating3 == 2.5) echo 'rated-value' ?>"
                                               id="p-ra-2.5"></i>
                                            <i class="full <?php if ($rating3 == 2) echo 'rated-value' ?>"
                                               id="p-ra-2"></i>
                                            <i class="half <?php if ($rating3 == 1.5) echo 'rated-value' ?>"
                                               id="p-ra-1.5"></i>
                                            <i class="full <?php if ($rating3 == 1) echo 'rated-value' ?>"
                                               id="p-ra-1"></i>
                                            <i class="half <?php if ($rating3 == 0.5) echo 'rated-value' ?>"
                                               id="p-ra-0.5"></i>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <?php echo ' ' . $row->comment_desc ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div id="item-cont-main-3">
            </div>
        </div>
    </div>
</div>
<script src="/almaprojects/shopping_card_alma2/template/template1/javascript/ajax.js"></script>
<?php require_once('footer.php');

?>

