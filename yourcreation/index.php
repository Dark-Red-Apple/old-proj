<!doctype html>
    <html>
<head>
    <meta charset="utf-16" />
    <title>yourcreation</title>
    <meta name="keywords" content="website desing, creating modules" />
    <meta name="description" content="designing websites and modules" />
    <meta name="author" content="Alma Ziaabadi" />
    <link rel="icon" type="image/png" href="MediaAndAttach/images/icon2.png" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/index.css" />
    <script src="javascript/index.js" ></script>
    <script src="javascript/menu.js" ></script>


</head>

<body>
<header>
    <div id="top">
        <div id="login">
          <a>login</a>

        </div>

        <div id="contactme">
            <a>contactme</a>
        </div>

        <div id="language">

<!--            <a id="eng">english</a>-->
            <a id="eng">فارسی</a>

        </div>
    </div>
<div id="logoAndnav">

<div id="logo"><img src="MediaAndAttach/images/logo6.png"></div>
    <nav>
        <ul>
            <li id="menuli1" onmouseover="showSubmenu('submenu1','menuli1')"  onmouseout="hideSubmenu('submenu1','menuli1')" onclick>
                <a href="elements.php">ELEMENTS</a>
                <div  id="submenu1" onmouseout="hideSubmenu('submenu1','menuli1')">
                    <ul>
                        <li>
                            <a href="elements/elementsAll.php">All</a>
                        </li>
                        <li>
                            <a>cute</a>
                        </li>
                        <li>
                            <a>Practical</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li id="menuli2" onmouseover="showSubmenu('submenu2','menuli2')"  onmouseout="hideSubmenu('submenu2','menuli2')">
                <a href="sitesamples.php">SITE SAMPLES</a>
                <div id="submenu2" onmouseout="hideSubmenu('submenu2','menuli2')">
                    <ul>
                        <li>
                            <a>All</a>
                        </li>
                        <li>
                            <a>Onlineshop</a>
                        </li>
                        <li>
                            <a>Static</a>
                        </li>
                        <li>
                            <a>Dynamic</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li id="menuli3" onmouseover="showSubmenu('submenu3','menuli3')"  onmouseout="hideSubmenu('submenu3','menuli3')">
                <a href="javascript.php">JAVASCRIPT</a>
                <div id="submenu3" onmouseout="hideSubmenu('submenu3','menuli3')">
                    <ul>
                        <li>
                            <a>All</a>
                        </li>
                        <li>
                            <a>Menu</a>
                        </li>
                        <li>
                            <a>Slideshow</a>
                        </li>
                        <li>
                            <a>Cute</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </nav>


<div id="searchMain">
    <input type="text" placeholder="search your thoughts">

</div>
</div>
</header>
<div id="sliderContainer"><div id="slider"> </div></div>
<div id="mainintro">
    
<div id="intro" >
    <div id="intro1" onclick="changeZindex('intro1')">
        <p>
            Welcome to yourCreation! YourCreation is a place for showing myworks in the field of website designe.
            so don't be shy and look around; don't forget to give me some hints before you leave.
        </p>

    </div>
    <div id="intro2" onclick="changeZindex('intro2')">
        <p>
            Tip2: See more websites that has wined prizes! like
        </p>
    </div >
    <div id="intro3" onclick="changeZindex('intro3')">
        <p>
            Tip1: For a better design you should imagine out of logic and break more rules!
        </p>
    </div>
    <div id="intro4" onclick="changeZindex('intro4')">
        <p>
            Tip3: Be more poetic!
        </p>
    </div>

</div>
</div>

</body>

</html>