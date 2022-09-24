<?php

require_once('define_session.php');
require_once('../include/connect.php');
$link = '';
try {
    if (isset($_GET['cat_id'])) $cat_id = $_GET['cat_id'];
    else $cat_id = 3;
    $stmtcat = $con->query("SELECT cat_title,cat_pic FROM categories WHERE cat_id='$cat_id'");
    $rowcat = $stmtcat->fetchObject();
    $cat_title = $rowcat->cat_title;
    $cat_pic = $rowcat->cat_pic;
    if (isset($_GET['page_number'])) $page_number = $_GET['page_number'];
    else  $page_number = 1;
} catch (PDOException $e) {
//    header('location:error.php');
    echo "Error: " . $e->getMessage();
}
$title = $cat_title;
echo '<script> window.onload = function() { loadProducts(' . $page_number . ',' . $cat_id . ',null); };</script>';
$colors = array('red', 'blue', 'yellow', 'green');
require("header.php");
$con = null;
?>

<div class="banner">
    <div class="banner-page-location">
        <a href="/almaprojects/shopping_card_alma2/index.php">خانه</a>
        &nbsp&nbsp&nbsp&nbsp>&nbsp&nbsp&nbsp&nbsp
        <a href="/almaprojects/shopping_card_alma2/cat/<?php echo $cat_id ?>"><?php echo $cat_title ?></a>
    </div>
    <img src="/almaprojects/shopping_card_alma2/photo/category/<?php echo $cat_pic ?>"/>
</div>
<a id="sc-top"></a>
<!--<form name="product" method="post" id="product" action="single_product.php" enctype="multipart/form-data">-->
<div class="container">
    <a id="product-start" name="product-start"></a>
    <div id="filter-options-container">
        <div id="filter-options-main">
            <div class="filter">
                <select name="filter-color-input" id="filter-color-input">
                    <option value="--">رنگ مورد نظر خود را انتخاب کنید</option>
                    <?php foreach ($colors as $color) {
                        echo '<option value = "' . $color . '" >' . $color . '</option >';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div id="products-main">
    </div>
</div>
<!--</form>-->
<script src="/almaprojects/shopping_card_alma2/template/template1/javascript/ajax.js"></script>
<script src="/almaprojects/shopping_card_alma2/template/template1/javascript/scrollMove.js"></script>
<?php require_once('footer.php'); ?>
