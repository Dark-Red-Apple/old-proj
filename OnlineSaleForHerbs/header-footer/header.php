<?php if (isset($_COOKIE['user'])){ $_SESSION['user']=$_COOKIE['user']; } ?>

<div id="topmenu" >
    <?php if (isset($_SESSION['user'])){
    echo '<div>'.$_SESSION['user'].'</div>';
        echo '<a href="../login/logout.php">خروج</a>';
    }
    else echo '<a href="../login/login.php" >login</a>'
?>

    </div>

<div id="slider">
    <div>
    </div>
</div>
<nav>
    <ul>
        <li><a href="../index.php">صفحه ی اصلی</a></li>
        <li id="li2"><a href="../IntroProducts/IntroProducts.php">محصولات</a></li>
        <li><a href="#">درباره ما</a></li>
        <li id="li4"><a href="../gallery/gallery.php">گالری</a></li>
        <li><a href="../contact/contact.php">تماس با ما</a></li>
    </ul>

</nav>