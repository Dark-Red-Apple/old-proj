<?php //session_set_cookie_params(0);
session_start(); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['submit'])) {
    require_once('config.php');

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    try {
        $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->exec("SET CHARACTER SET utf8");      // set encoding to utf-8

        $sql = "SELECT *  FROM admin WHERE admin_username='$user' AND admin_pass='$pass'";
        $stmt = $con->query($sql);
        $n = $stmt->rowCount();
        echo '<br><div class="info"> تعداد ' . $n . ' رکورد یافت شد' . '<br>';
        if ($n <= 0) {
            die('<div class="wrong">اطلاعات ورود اشتباه می باشد</div>');
        } else {
            $_SESSION['admin'] = $user;
            echo $_SESSION['admin'];
            if (isset($_POST['remember'])) {
                setcookie('admin', $user, time() + (86400 * 30), "/", false); // 86400 = 1 day, total  1 month
                echo isset($_COOKIE['admin']);
                echo "user cookie value is: " . $_COOKIE['admin'];
            }

            header('Location:admin/index.php');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $con = null;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>صفحه ورود</title>
    <link rel="icon" type="image/png" href="../template/template1/image/logo6.png">
    <link href="template/template1/css/login.css" rel="stylesheet">
</head>
<body>

</body>
<div class="login-banner">"The writer's job is to tell the truth," Ernest Hemingway said, I think a programmer's jop is
    to alter it.</br> Well I hope it's in a good way!
</div>
<form name="loginForm" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
      enctype="multipart/form-data" method="post">
    <br>
    <input type="text" name="user" id="user" placeholder="نام کاربری">
    <br><br>
    <input type="password" name="pass" id="pass" placeholder="رمز عبور">
    <br><br>
    <input type="checkbox" name="remember" id="remember"> <label for="remember"> مرا به خاطر بسپار</label>
    <br><br>
    <input type="submit" name="submit" value="ورود">
</form>
</html>
