<?php
require_once('define_session.php');
require_once('../include/connect.php');
try {
    if (isset($_GET['page_number'])) $page_number = $_GET['page_number'];
    else  $page_number = 1;
    $search_item = $_GET['search_item'];
} catch (PDOException $e) {
//    header('location:error.php');
    echo "Error: " . $e->getMessage();
}
$link = '<script> window.onload = function() { searchProductsLoad(' . $page_number . ',"' . $search_item . '",null); };</script>';
//$title = $cat_title;
$colors = array('red', 'blue', 'yellow', 'green');
$title = $search_item;
require("header.php");
$con = null;
?>
<div id="page-location">
    <?php echo 'جست و جو روی' . '&nbsp&nbsp' . $search_item ?>
</div>
<!--<form name="product" method="post" id="product" action="single_product.php" enctype="multipart/form-data">-->
<div class="container">
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
<?php ?>
<?php require_once('footer.php'); ?>
