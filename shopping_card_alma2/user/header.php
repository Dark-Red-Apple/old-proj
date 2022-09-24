<?php
require_once('connectDB.php');
require_once('login.php');
require_once('basket_functions.php');
$basket_items = countBasketItems($_SESSION['user']);
try {
    require_once('../include/connect.php');
    $stmt_cat = $con->query("SELECT * FROM categories ");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $title ?></title>
        <meta name="keywords" content="<?php ?>"/>
        <meta name="description" content="<?php ?>"/>
        <?php require("main_links.html"); ?>
        <?php echo $link ?>
    </head>
<body>
<header>
    <div id="nav-logo-wrapper">
        <div id="nav-logo-main">
            <div id="nav-logo">
                <div id="logo"><a href="/almaprojects/shopping_card_alma2/index.php"><img
                            src="/almaprojects/shopping_card_alma2/template/template1/image/logo6.png"></a></div>
                <nav id="nav">
                    <ul>
                        <?php
                        while ($row = $stmt_cat->fetchObject()) {
                            echo '<li>
                    <a href="/almaprojects/shopping_card_alma2/cat/' . $row->cat_id . '">' . $row->cat_title . '</a>
                    <div class="wide-submenu">
                        <ul>
                            <li>
                                <a href="">کاکتوس ها</a>
                            </li>
                             <li>
                                <a href="">گیاهان سردسیر</a>
                            </li>
                             <li>
                                <a href="">گیاهان گرم سیر</a>
                            </li>
                             <li>
                                <a href="">گیاهان استوایی</a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="">کاکتوس ها</a>
                            </li>
                             <li>
                                <a href="">کاکتوس ها</a>
                            </li>
                             <li>
                                <a href="">کاکتوس ها</a>
                            </li>
                             <li>
                                <a href="">کاکتوس ها</a>
                            </li>
                        </ul>
                        <img class="wide-submenu-image" src="/almaprojects/shopping_card_alma2/photo/category/' . $row->cat_pic . '" />
                    </div>
                </li>';
                        }
                        ?>
                    </ul>
                </nav>
                <div id="menu-icons">

                    <div>
                        <a href="/almaprojects/shopping_card_alma2/user/basket.php"
                           class="cursor-pointer width-height-100 display-block position-relative">
                            <i class=" fa fa-shopping-basket  fa-3x color-light-blue "></i>
                            <span class="circle circle-text"
                                  id="basket-item-numbers"><?php echo $basket_items; ?></span>
                        </a>
                    </div>
                    <div id="user-menu">
                        <a class="cursor-pointer width-height-100 display-block position-relative">
                            <i class="fa fa-user  fa-3x color-light-blue"></i>
                        </a>
                        <div>
                            <ul>
                                <?php if ($is_guest == 0) {
                                    echo '
                                <li>
                                    <a href="">' . $row_customer->customer_name . '&nbsp&nbsp&nbsp' . 'خوش آمدید</a>
                                </li>
                                <li>
                                    <a href="/almaprojects/shopping_card_alma2/user/customer_profile.php">ناحیه ی کاربری</a>
                                </li>
                                <li>
                                    <a href="">آرزوها</a>
                                </li>
                                <li>
                                    <a href="">سفارشات</a>
                                </li>
                                 <li>
                                    <a href="/almaprojects/shopping_card_alma2/user/logout.php">خروج</a>
                                </li>';
                                } else {
                                    echo '
                                <li>
                                    <a href="">مهمان عزیز خوش آمدید</a>
                                </li>
                                <li><a href="#user-login">ورود</a>
                                </li>
                                <li><a href="/almaprojects/shopping_card_alma2/user/customer_register.php">ثبت نام</a>
                                </li>';
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <div>
                        <a href="#modal" class="cursor-pointer width-height-100 display-block">
                            <i class=" fa fa-search  fa-3x color-light-blue "></i>
                        </a>

                    </div>

                </div>
            </div>
        </div>
</header>

<div id="modal" class="modal">
    <a href="#close" class="closebtn"><i>&times;</i></a>
    <a id="close"></a>
    <div class="modal-dialog search-dialog">
        <form id="search-form" method="get" onsubmit="return formChecker()"
              action="/almaprojects/shopping_card_alma2/user/search.php">
            <div class="search-content  search-dialog">
                <div class="search">
                    <input type="text" id="search_item" name="search_item"
                           placeholder="کلمه ی مورد نظر خود را واد کنید"/>
                </div>
                <button class="search-button">
                    <i>&#xf002;</i>
                </button>
            </div>
        </form>
    </div>

</div>
<div id="user-login" class="modal">
    <a href="#close" class="closebtn"><i>&times;</i></a>
    <a id="close"></a>
    <div class="modal-dialog login-dialog">
        <div class="modal-content login-dialog">
            <form name="loginForm" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                  enctype="multipart/form-data" method="post">

                <br>
                <input type="text" name="user" id="user" placeholder="نام کاربری">
                <br><br>
                <input type="password" name="pass" id="pass" placeholder="رمز عبور">
                <br><br>
                <input type="checkbox" name="remember" id="remember"> <label for="remember"> مرا به خاطر بسپار</label>
                <br><br>
                <a class="font-default" style="color: black"
                   href="/almaprojects/shopping_card_alma2/user/customer_register.php">ثبت نام نکرده اید؟</a>
                <br><br>
                <input type="submit" name="submit" value="ورود">
            </form>
        </div>
    </div>
</div>

<script src="/almaprojects/shopping_card_alma2/template/template1/javascript/menu.js"></script>
<script>
    function formChecker() {
        var valid = true;
        var searched_item = document.getElementById('search_item').value;
        if (searched_item == "") {
            document.getElementById("search_item").className = 'focus';
            valid = false;
        }
        return (valid);
    }
</script>
<?php if (isset($login_err)) echo '<script> location.href = "#"+"user-login";document.getElementById("login-err").innerHTML="اطلاعات وارد شده صحیح نمی باشد"</script>'; ?>