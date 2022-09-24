<?php
ob_start();
//session_set_cookie_params(0);
session_start();
//echo isset($_COOKIE['user']);
//echo isset($_SESSION['user']);

if (isset($_COOKIE['admin'])) {
    $_SESSION['admin'] = $_COOKIE['admin'];
}

if (!isset($_SESSION['admin'])) header('Location:../admin_loginsga35fggs.php');

?>
<header>

    <div id="nav-logo-wrapper">
        <div id="nav-logo-main">
            <div id="nav-logo">

                <div id="logo"><a href="index.php"><img src="../template/template1/image/logo6.png"></a></div>
                <nav id="nav">
                    <ul>
                        <li id="menuli1">
                            <a href="index.php">مدیریت</a>
                            <div id="submenu1">
                                <ul>
                                    <li>
                                        <a href="">پنل کاربری</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li id="menuli3">
                            <a href="product_view.php">محصولات</a>
                            <div id="submenu3">
                                <ul>
                                    <li>
                                        <a href="product_view.php">لیست محصولات</a>
                                    </li>
                                    <li>
                                        <a href="product_add.php">افزودن محصول</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li id="menuli2">
                            <a href="category_view.php">دسته بندی</a>
                            <div id="submenu2">
                                <ul>
                                    <li>
                                        <a href="category_add.php">افزودن دسته</a>
                                    </li>
                                    <li>
                                        <a href="category_view.php">لیست دسته</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li id="menuli3">
                            <a href="brand_view.php">برند</a>
                            <div id="submenu3">
                                <ul>
                                    <li>
                                        <a href="brand_add.php">افزودن برند</a>
                                    </li>
                                    <li>
                                        <a href="brand_view.php">لیست برند</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li id="menuli3">
                            <a href="customer_view.php">مشتریان</a>
                            <div id="submenu3">
                                <ul>
                                    <li>
                                        <a href="customer_view.php">لیست مشتریان</a>
                                    </li>
                                    <li>
                                        <a href="product_comment_view.php">نظرات محصولات</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li id="menuli3">
                            <a href="invoice_view.php">بخش فروش</a>
                            <div id="submenu3">
                                <ul>
                                    <li>
                                        <a href="invoice_view.php">سفارش ها</a>
                                    </li>
                                    <li>
                                        <a>محاسبه سود</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </nav>
                <div id="menu-icons">
                    <div id="user-menu">
                        <a href="user_profile.php"
                           class="cursor-pointer width-height-100 display-block position-relative">
                            <i class="fa fa-user  fa-3x color-light-blue"></i>
                        </a>
                        <div>
                            <ul>
                                <li>
                                    <a href="admin_profile.php">ناحیه ی کاربری</a>
                                <li>
                                    <a href="logout.php">خروج</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <a href="#" class="cursor-pointer width-height-100 display-block">
                            <i class=" fa fa-search  fa-3x color-light-blue "></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<script src="../template/template1/javascript/menu.js"></script>