<?php
$link = '<link href="template/template1/css/login.css" rel="stylesheet">';
$title = 'ورود';
session_start();
require_once('config.php');
// you can not have any output before the functions that change header like cookie, session or header;
//ob_start will buffer codes and send them when meets ob_flush and ob_end_flush .but you should not use this methos, instead put your output separately 
//from any backend code. using object oriented or like below put your codes before the html codes
try {
    $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec("SET CHARACTER SET utf8");
///************these lines will effect this page echos of session and cookie
    //    echo 'session'.$_SESSION['user'];
    //    echo '</br>';
    if (isset($_COOKIE['user'])) {
        $_SESSION['user'] = $_COOKIE['user'];
    } else if (!isset($_SESSION['user'])) {
        $stmt = $con->query("INSERT INTO customers (customer_is_guest) VALUES ('1')");
        $last_id = $con->lastInsertId();
        setcookie('user', $last_id, time() + (86400 * 30), "/", false);
        $_SESSION['user'] = $last_id;
    }
//////////////////////////////////////*************
    if (isset($_SESSION['user'])) {
        $customer_id = $_SESSION['user'];
        $stmt_customer = $con->query("SELECT customer_is_guest,customer_name FROM customers WHERE customer_id='$customer_id'");
        $row_customer = $stmt_customer->fetchObject();
        $is_guest = $row_customer->customer_is_guest;
    }
    //    echo 'is guest'.$is_guest;
    //    echo '</br>';
    $stmt_cat = $con->query("SELECT * FROM categories ");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
if (isset($_SESSION['user']) && $is_guest == 0) {
    header('Location:user/products.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['submit']) && $is_guest == 1) {

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    try {

        $sql = "SELECT customer_id  FROM customers WHERE customer_username='$user' AND customer_pass='$pass'";
        $stmt = $con->query($sql);
        $n = $stmt->rowCount();
        echo '<br><div class="info"> تعداد ' . $n . ' رکورد یافت شد' . '<br>';
        if ($n <= 0) {
            die('<div class="wrong">اطلاعات ورود اشتباه می باشد</div>');
        } else {
            ob_start();
            setcookie('user', "", time() - 30600, "/"); // 1 hour ago
            //    echo 'cookie after remove it:'.$_COOKIE['user'];
            //    echo '</br>';
            session_unset($_SESSION['user']);
            $row_login = $stmt->fetchObject();
            $customer_id = $row_login->customer_id;
            $_SESSION['user'] = $customer_id;
            echo 'session after login:' . $_SESSION['user'];
            echo '</br>';
            if (isset($_POST['remember'])) {
                setcookie('user', $_SESSION['user'], time() + (86400 * 30), "/", false); // 86400 = 1 day, total  1 month
                echo 'cookie is set?:' . isset($_COOKIE['user']);
                echo '</br>';
                echo "user cookie value is: " . $_COOKIE['user'];
                echo '</br>';
            }
            echo 'cookie after login:' . $_COOKIE['user'];
            header('Location:user/products.php');
            ob_end_flush();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
require_once('user/basket_functions.php');
$basket_items = countBasketItems($_SESSION['user']);
//you can not put these here because the cookies and session has not changed yet and these ifs will execute
//    if (isset($_COOKIE['user'])) {
//        $_SESSION['user'] = $_COOKIE['user'];
//    } else if (!isset($_SESSION['user'])) {
//        $stmt = $con->query("INSERT INTO customers (customer_is_guest) VALUES ('1')");
//        $last_id = $con->lastInsertId();
//        setcookie('user', $last_id, time() + (86400 * 30), "/", false);
//        $_SESSION['user'] = $last_id;
//    }

//    echo '</br>';
//    echo  'session after login codes'.$_SESSION['user'];
//    echo  'cookie after login codes'.$_COOKIE['user'];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?php echo $title ?></title>
    <meta name="keywords" content="<?php ?>"/>
    <meta name="description" content="<?php ?>"/>
    <link href="template/template1/css/footer.css" rel="stylesheet"/>
    <link href="template/template1/css/main.css" rel="stylesheet"/>
    <link href="template/template1/css/header.css" rel="stylesheet"/>
    <link href="template/template1/css/login.css" rel="stylesheet">
    <link href="template/font-awesome/css/font-awesome.css" rel="stylesheet"/>

</head>
<body>

<header>
    <div id="nav-logo-wrapper">
        <div id="nav-logo-main">
            <div id="nav-logo">

                <div id="logo"><a href="user/index.php"><img src="template/template1/image/logo6.png"></a></div>
                <nav id="nav">
                    <ul>
                        <?php
                        while ($row = $stmt_cat->fetchObject()) {
                            echo '<li>
                    <a href="user/products.php?cat_id=' . $row->cat_id . '">' . $row->cat_title . '</a>
                    <div>
                        <ul>
                            <li>
                                <a href="">کاکتوس ها</a>
                            </li>
                             <li>
                                <a href="">کاکتوس ها</a>
                            </li>
                        </ul>
                    </div>
                </li>';
                        }
                        ?>
                    </ul>
                </nav>
                <div id="menu-icons">

                    <div>
                        <a href="basket.php" class="cursor-pointer width-height-100 display-block position-relative">
                            <i class=" fa fa-shopping-basket  fa-3x color-light-blue "></i>
                            <span class="circle circle-text"
                                  id="basket-item-numbers"><?php echo $basket_items; ?></span>
                        </a>
                    </div>
                    <div id="user-menu">
                        <a href=""
                           class="cursor-pointer width-height-100 display-block position-relative">
                            <i class="fa fa-user  fa-3x color-light-blue"></i>
                        </a>
                        <div>
                            <ul>
                                <?php if ($is_guest == 0) {
                                    echo '
                                <li>
                                    <a href="">' . $row_customer->customer_name . 'خوش آمدید</a>
                                </li>
                                <li>
                                    <a href="">ناحیه ی کاربری</a>
                                </li>
                                <li>
                                    <a href="">آرزوها</a>
                                </li>
                                <li>
                                    <a href="">سفارشات</a>
                                </li>
                                 <li>
                                    <a href="user/logout.php">خروج</a>
                                </li>';
                                } else {
                                    echo '
                                <li>
                                    <a href="">مهمان عزیز خوش آمدید</a>
                                </li>
                                <li><a href="customer_login.php">ورود</a>
                                </li>
                                <li><a href="user/customer_register.php">ثبت نام</a>
                                </li>';
                                }
                                ?>

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
</header>
<form name="loginForm" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
      enctype="multipart/form-data" method="post">
    <br>
    <input type="text" name="user" id="user" placeholder="نام کاربری">
    <br><br>
    <input type="password" name="pass" id="pass" placeholder="رمز عبور">
    <br><br>
    <input type="checkbox" name="remember" id="remember"> <label for="remember"> مرا به خاطر بسپار</label>
    <br><br>
    <a style="color: black" href="user/customer_register.php">ثبت نام نکرده اید؟</a>
    <br><br>
    <input type="submit" name="submit" value="ورود">
</form>
<script src="template/template1/javascript/menu.js"></script>
<?php require_once("user/footer.php");
//echo 'session after footer:' . $_SESSION['user']; ?>
