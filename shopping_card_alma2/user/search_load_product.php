<?php
session_start();
//echo '</br>';
//echo $_GET['pageNumber'];
//echo '</br>';
//echo $_GET['category'];
//echo '</br>';
//echo $_GET['filters'];
//echo '</br>';

if (isset($_GET['search_item']) && $_GET['search_item'] == '') $row = null;
else if (isset($_GET['search_item']) && $_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        require_once('../include/connect.php');
        $pageNumber = $_GET['pageNumber'];
        $search_item = $_GET['search_item'];
        $stmt0 = $con->query("SELECT * FROM products WHERE product_title LIKE '%$search_item%' OR product_desc LIKE '%$search_item%'");
        $rowCount0 = $stmt0->rowCount();
        $numberOfPages = ceil($rowCount0 / 9);

        $fromProduct = ($pageNumber - 1) * 9;
        $toProduct = $fromProduct + 9;
        $sql = "SELECT * FROM products WHERE product_title LIKE '%$search_item%' OR product_desc LIKE '%$search_item%' LIMIT $fromProduct,$toProduct";
        $stmt = $con->query($sql);
        while ($row = $stmt->fetchObject()) {

            echo '<div class="product">
                               <a href="/almaprojects/shopping_card_alma2/user/single_product.php?product_id=' . $row->product_id . '"><img src="/almaprojects/shopping_card_alma2/photo/product/' . $row->product_pic . '"></a>
                               <div>
                                     <p class="product-Brief-desc">' . $row->product_title . '</p>                                                                
                                     <div class="product-options">
                                            <div onclick="addCart(\'1\',\'' . $row->product_id . '\',\'' . $_SESSION['user'] . '\',\'basket-item-numbers\')">
                                                 <i class="product-cart-icon float-right">
                                                 &#xf217;
                                                 </i>
                                             </div>
                                             <div class="float-left">' . $row->product_price . ' ' . 'تومان' . '</div>
                                     </div>
                            
                              </div>
           </div>';

        }
        echo '<div id="pages-main"';
        echo 'style="width:' . ($numberOfPages * 44) . 'px">';
        for ($i = 1; $i <= $numberOfPages; $i++) {
            echo '<div onclick="searchProductsLoad(' . $i . ',\'' . $search_item . '\',null)" ';
            if ($i == $pageNumber) {
                echo 'style="border-color:gray;"';
            }
            echo '>';
            echo $i;
            echo '</div>';
        }
        echo '</div>';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $con = null;
}