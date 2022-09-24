<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>صفحه اول</title>
    <?php require_once("main_links.html"); ?>

</head>
<body>
<?php require_once("header.php"); ?>
<div class="container index-menu">
    <div class="right-children">
        <i class="fright fa fa-product-hunt fa-5x light-blue-color circle"></i>
        <p>
            <a class="big-link fright" href="product_view.php">محصولات</a>
        </p>
    </div>
    <div class="left-children">
        <i class="fright fa fa-sitemap  fa-5x light-blue-color circle"></i>
        <p>
            <a class="big-link fright" href="category_view.php">دسته ها </a>

        </p>
    </div>
    <div class="right-children">
        <i class="fright fa fa-tags fa-5x light-blue-color circle"></i>
        <p>
            <a class="big-link fright" href="brand_view.php">برند</a>
        </p>
    </div>
    <div class="left-children">
        <i class=" fright fa fa-user-circle fa-5x light-blue-color circle"></i>
        <p>
            <a class="big-link fright" href="customer_view.php">مشتریان</a>
        </p>
    </div>
    <div class="right-children">
        <i class="fright fa fa-money fa-5x light-blue-color circle"></i>
        <p>
            <a class="big-link fright" href="invoice_view.php">فروش</a>
        </p>
    </div>
    <div class="left-children">
        <i class="fright fa fa-user-secret fa-5x light-blue-color circle"></i>
        <p>
            <a class="big-link fright" href="invoice_view.php">پروفایل</a>
            <a class="big-link fright" href="invoice_view.php">ایجاد حساب </a>
        </p>
    </div>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>