<?php
require_once('define_session.php');
require_once('specific_products.php');
$link = '<link type="text/css" rel="stylesheet" href="/almaprojects/shopping_card_alma2/template/template1/css/tab2.css"/>
        <link type="text/css" rel="stylesheet" href="/almaprojects/shopping_card_alma2/template/template1/css/index.css"/>
       ';
$title = 'صفحه ی اول';
$stmtBestSelling = bestSellingProducts(4);
$stmtnew = newProducts(4);
require_once('header.php');
?>
<div id="slider"></div>
<div id="welcome"><p>&#9644;&#9644;&#9644;&#9644;
        </br>
        شرکت لوندر تولید کننده و پروروش دهنده ی گیاهان خانگی و تولید کننده ی میوه های ارگانیک است.
        </br>
        ما در تلاشیم که افراد را ترغیب کنیم تا خودشان با دستان خود گیاهان را پرورش دهند
        </br>
        تا در نتیجه مراقبت و محافظت از آن ها برایشان نهادینه شود.
    </p></div>
<div id="featured-wrapper">
    <div id="featured-main">
        <div><span>گلهایتان را بیشتر بشناسید
            <br>&#9644;</span></div>
        <div><span>گیاهان درباره شما چه می گویند<br>&#9644;</span></div>
    </div>
</div>
<div id="product-view">
    <div>
        <div>
            <div><p>
                    مجموعه ی بینظیر از گل های رنگی
                </p>
                <a>خرید</a>
            </div>
        </div>
        <div>
            <div><p>
                    مجموعه ی بینظیر از گل های رنگی
                </p>
                <a>خرید</a>
            </div>
        </div>
        <div>
            <div><p>
                    مجموعه ی بینظیر از گل های رنگی
                </p>
                <a>خرید</a>
            </div>
        </div>
        <div>
            <div><p>
                    مجموعه ی بینظیر از گل های رنگی
                </p>
                <a>خرید</a>
            </div>
        </div>

    </div>
</div>
<div id="introduction-wrapper">
    <div id="introduction-main">
        <div id="persuasion">
            <span>
                اولین بارتان در اینجاست؟
                <br>
                کلی گل بامزه در انتظارتان است!
            </span>

        </div>
        <div class="float-left" id="main-tab">
            <div id="tabs-list-main">
                <ul>
                    <li onclick="showTab(1,this)">
                        <a> پرفروش ترین ها </a>
                        <span></span>
                    </li>
                    <li onclick="showTab(2,this)">
                        <a>جدید ترین ها</a>
                        <span></span>
                    </li>
                    <li onclick="showTab(3,this)">
                        <a>محبوبترین ها</a>
                    </li>
                </ul>
            </div>
            <div id="items-container">
                <div id="item-cont-main-1" class="items-container">
                    <i class="displace-button left-position" onclick="moveLeft('item-cont-1')">&#xf104;</i>
                    <i class="displace-button right-position" onclick="moveRight('item-cont-1')">&#xf105;</i>
                    <div id="item-cont-1" class="items-container" style="right: 0">
                        <?php
                        while ($rowb = $stmtBestSelling->fetchObject()) {
                            echo '<div class="product">
                               <a href="/almaprojects/shopping_card_alma2/user/single_product.php?product_id=' . $rowb->product_id . '"><img src="/almaprojects/shopping_card_alma2/photo/product/' . $rowb->product_pic . '"></a>
                               <div>
                                     <p class="product-Brief-desc">' . $rowb->product_title . '</p>                                                                
                                     <div class="product-options">
                                            <div onclick="addCart(\'1\',\'' . $rowb->product_id . '\',\'' . $_SESSION['user'] . '\',\'basket-item-numbers\'),\'null\'">
                                                 <i class="product-cart-icon float-right">
                                                 &#xf217;
                                                 </i>
                                     </div>
                               <div class="float-left">' . $rowb->product_price . ' ' . 'تومان' . '</div></div>
                            
                         </div>
             </div>';
                        }
                        ?>
                    </div>
                </div>
                <div id="item-cont-main-2" class="items-container">
                    <i class="displace-button left-position" onclick="moveLeft('item-cont-2')">&#xf104;</i>
                    <i class="displace-button right-position" onclick="moveRight('item-cont-2')">&#xf105;</i>
                    <div id="item-cont-2" class="items-container" style="right: 0">
                        <?php
                        while ($rown = $stmtnew->fetchObject()) {
                            echo '<div class="product">
                               <a href="/almaprojects/shopping_card_alma2/user/single_product.php?product_id=' . $rown->product_id . '"><img src="/almaprojects/shopping_card_alma2/photo/product/' . $rown->product_pic . '"></a>
                               <div>
                                     <p class="product-Brief-desc">' . $rown->product_title . '</p>                                                                
                                     <div class="product-options">
                                            <div onclick="addCart(\'1\',\'' . $rown->product_id . '\',\'' . $_SESSION['user'] . '\',\'basket-item-numbers\'),\'null\'">
                                                 <i class="product-cart-icon float-right">
                                                 &#xf217;
                                                 </i>
                                     </div>
                               <div class="float-left">' . $rown->product_price . ' ' . 'تومان' . '</div></div>
                            
                         </div>
             </div>';
                        }
                        ?>
                    </div>
                </div>
                <div id="item-cont-main-3" class="items-container">
                    <i class="displace-button left-position" onclick="moveLeft('item-cont-3')">&#xf104;</i>
                    <i class="displace-button right-position" onclick="moveRight('item-cont-3')">&#xf105;</i>
                    <div id="item-cont-3" class="items-container" style="right: 0">
                        <?php
                        $stmtBestSelling = bestSellingProducts(4);
                        while ($rowb = $stmtBestSelling->fetchObject()) {
                            echo '<div class="product">
                                <a href="/almaprojects/shopping_card_alma2/user/single_product.php?product_id=' . $rowb->product_id . '"><img src="/almaprojects/shopping_card_alma2/photo/product/' . $rowb->product_pic . '"></a>
                               <div>
                                     <p class="product-Brief-desc">' . $rowb->product_title . '</p>                                                                
                                     <div class="product-options">
                                            <div onclick="addCart(\'1\',\'' . $rowb->product_id . '\',\'' . $_SESSION['user'] . '\',\'basket-item-numbers\'),\'null\'">
                                                 <i class="product-cart-icon float-right">
                                                 &#xf217;
                                                 </i>
                                     </div>
                               <div class="float-left">' . $rowb->product_price . ' ' . 'تومان' . '</div></div>
                            
                         </div>
             </div>';
                        }
                        ?>
                    </div>
                </div>


            </div>


        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
<script src="/almaprojects/shopping_card_alma2/template/template1/javascript/ajax.js"></script>
<script src="/almaprojects/shopping_card_alma2/template/template1/javascript/tab2.js"></script>

