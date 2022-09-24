<?php
session_start();
//echo '</br>';
//echo $_GET['pageNumber'];
//echo '</br>';
//echo $_GET['category'];
//echo '</br>';
//echo $_GET['filters'];
//echo '</br>';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pageNumber']) && isset($_GET['category']) && isset($_GET['filters'])) {
    try {
        require_once('../include/connect.php');
        $cat_id = $_GET['category'];
        $stmt0 = $con->query("SELECT * FROM products WHERE cat_id='$cat_id' ");
        $rowCount0 = $stmt0->rowCount();
        $numberOfPages = ceil($rowCount0 / 9);

        $pageNumber = $_GET['pageNumber'];
        $fromProduct = ($pageNumber - 1) * 9;
        $toProduct = $fromProduct + 9;
        $sql = "SELECT * FROM products WHERE cat_id='$cat_id' LIMIT $fromProduct,$toProduct";
        $stmt = $con->query($sql);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $con = null;
}
while ($row = $stmt->fetchObject()) {
    $rating = ceil(($row->product_rate) * 2) / 2;
//            echo $rating." ".'</break>';
    ?>
    <div class="product">
        <a href="/almaprojects/shopping_card_alma2/user/single_product.php?product_id=<?php echo $row->product_id ?>"><img
                src="/almaprojects/shopping_card_alma2/photo/product/<?php echo $row->product_pic ?>"></a>
        <div>
            <p class="product-Brief-desc"><?php echo $row->product_title ?></p>
            <div class="product-rating">
                <i class="full  <?php if ($rating == 5) echo 'rated-value' ?>" id="p-ra-5"></i>
                <i class="half <?php if ($rating == 4.5) echo 'rated-value' ?>" id="p-ra-4.5"></i>
                <i class="full <?php if ($rating == 4) echo 'rated-value' ?>" id="p-ra-4"></i>
                <i class="half <?php if ($rating == 3.5) echo 'rated-value' ?>" id="p-ra-3.5"></i>
                <i class="full <?php if ($rating == 3) echo 'rated-value' ?>" id="p-ra-3"></i>
                <i class="half <?php if ($rating == 2.5) echo 'rated-value' ?>" id="p-ra-2.5"></i>
                <i class="full <?php if ($rating == 2) echo 'rated-value' ?>" id="p-ra-2"></i>
                <i class="half  <?php if ($rating == 1.5) echo 'rated-value' ?>" id="p-ra-1.5"></i>
                <i class="full <?php if ($rating == 1) echo 'rated-value' ?>" id="p-ra-1"></i>
                <i class="half <?php if ($rating == 0.5) echo 'rated-value' ?>" id="p-ra-0.5"></i>
            </div>
            <div class="product-options">
                <a id="add-to-card" class="sweep"
                   onclick="addCart('1','<?php echo $row->product_id ?>','<?php echo $_SESSION['user'] ?>','basket-item-numbers')">
                    + سبد خرید
                </a>
                <div class="float-left"><?php echo number_format($row->product_price) ?>&nbsp;تومان</div>
            </div>

        </div>
    </div>

<?php } ?>
<div id="pages-main" style="width:<?php echo ($numberOfPages * 44) . 'px' ?>">
    <?php for ($i = 1; $i <= $numberOfPages; $i++) { ?>
        <a id="go-to-sc-top"
           onclick="loadProducts(' <?php echo $i; ?> ','<?php echo $cat_id; ?> ','all');scrollTo(document.getElementById('sc-top').offsetTop, this,1000);"<?php if ($i == $pageNumber) echo 'style="border-color:black;"'; ?>
        >
            <?php echo $i; ?>
        </a>
    <?php } ?>
</div>


<!--<script>document.getElementById('go-to-sc-top').addEventListener('click', (e) => { scrollTo(document.getElementById('sc-top').offsetTop, e,1000) }, false);</script>-->
