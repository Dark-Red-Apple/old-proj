<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>صفحه ورود</title>
    <meta name="keywords" content="فروش اینترنتی گیاهان دارویی، خرید گیاهان خشک، گیاهان دارویی با کیفیت مطلوب" />
    <meta name="desciption" content="انواع گیاهان دارویی با کیفیت از مناطق مختلف ایران" />
    <meta name"author" content="alma ziaabadi" />
    <link rel="icon"   type="image/png"   href="../MediaAndAttach/images/logo.png">
    <link href="../css/general/nav.css" rel="stylesheet" />
    <link href="../css/general/main.css" rel="stylesheet" />
    <link href="main.css" rel="stylesheet">
    <link href="../css/general/login.css" rel="stylesheet">
</head>
<body>
<?php require("../header-footer/header.php");
if (isset($_SESSION['user'])){ header("location:userProfile.php");}
?>

<?php
$err="";

// start login search --------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user']) && isset($_POST['pass'])) {
    echo "hvkhm";
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $dbServer = "localhost";
    $dbUser = "alma";
    $dbPass = "111111";
    $dbName = "onlineherbshop";
    try {
        $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        $con->exec("SET CHARACTER SET utf8");      // set encoding to utf-8
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "<br>$user $pass<br>";
        $sql = "SELECT *  FROM siteuser WHERE username='$user' AND pass='$pass'";
        $stmt = $con->query($sql);
        $n = $stmt->rowCount();
        echo '<br><div class="info"> تعداد ' . $n . ' رکورد یافت شد' . '<br>';
        if ($n <= 0) {
           $err="dontmatch";
        } else {
            $_SESSION['user'] = $user;
            if(isset($_POST['remember'])){
                setcookie('user', $user, time() + (86400 * 30), "/"); // 86400 = 1 day, total  1 month
                echo "user cookie value is: " . $_COOKIE['user'];
            }
            header('Location:userprofile.php');
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

?>

<form id="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <br>
    <input type="text" name="user" id="user" placeholder="نام کاربری" />
    <br><br>
    <input type="password" name="pass" id="pass" placeholder="رمز عبور" />
    <br><br>
    <input type="checkbox" name="remember" id="remember"> <label for="remember" /> مرا به خاطر بسپار</label>
    <br><br>
    <a href="register">ثبت نام</a>
    <div><?php echo $err;  ?></div>

    <input type="submit" name="submit" value="ورود" />


</form>
<?php require("../header-footer/footer.php"); ?>
</body>
</html>