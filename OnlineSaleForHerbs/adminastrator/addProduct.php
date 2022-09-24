<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>form</title>
    <link href="main.css" rel="stylesheet"/>
    <link href="addContact.css" rel="stylesheet"/>
</head>
<body>

<?php
require("validate.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $application = $_POST['application'];
    $material = $_POST['material'];
    $kind = $_POST['kind'];
    $pic = $_POST['pic'];
    $application=implode(",",$application);
    echo $pname . ', ' . $price . ', ' . $application . ', ' . $material . ', ' . $kind . ', ' . $pic ;

    $dbServer = "localhost";
    $dbUser = "alma";
    $dbPass = "111111";
    $dbName = "onlineherbshop";

    try {
        $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8


        // prepare sql and bind parameters
        $stmt = $con->prepare("INSERT INTO medicinalherbs (pname, price, application, material, kind, pic )
          VALUES ('$pname', '$price', '$application', '$material', '$kind', '$pic')");
        $stmt->execute();
        echo "New records created successfully";
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }


    $con = null;


}
?>


<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <div>
        <div>نام محصول</div>
        <div><input type="text" name="pname" id="pname" /></div>
        <div id="pname_err"><?php echo $pname_err; ?></div>
    </div>
    <div>
        <div>قیمت</div>
        <div><input type="text" name="price" id="price"/></div>
        <div id="price_err"><?php echo $price_err; ?></div>
    </div>
    <div>
        <div>کاربرد</div>

        <div><input type="checkbox" name="application[]" value="skin" id="skin"/><label for="skin"><span></span> پوست</label>
        <input type="checkbox" name="application[]" value="hand" id="hand"/><label for="hand"><span></span> دست</label>
        <input type="checkbox" name="application[]" value="face" id="face"/><label for="face"><span></span> صورت</label></div>
        <div id="application_err"><?php echo $application_err; ?></div>
    </div>
    <div>
        <div>ماده</div>
        <div><input type="radio" name="material" value="liquid" id="liquid"/><label for="liquid"><span></span>مایع </label>
        <input type="radio" name="material" value="iliquid" id="iliquid"/><label for="iliquid"><span></span>جامد </label></div>
        <div id="material_err"><?php echo $material_err; ?></div>
    </div>
    <div>
        <div>نوع</div>
        <div><select name="kind">
            <option id="tripledash" name="tripledash" value="tripledash" selected="selected">---</option>
            <option id="soap" name="soap" value="soap" >صابون</option>
            <option id="cream" name="cream" value="cream" >کرم</option>
            <option id="mask" name="mask" value="mask" >ماسک</option>
        </select></div>

        <div id="kind_err"><?php echo $kind_err; ?></div>
    </div>
    <div>
        <div>عکس</div>
        <div><input type="text" name="pic" id="pic"/></div>
        <div id="pic_err"><?php echo $pic_err; ?></div>
    </div>
<!--    <div>-->
<!--        <div>وبسایت</div>-->
<!--        <div><input type="text" name="website" id="website"/></div>-->
<!--        <div id="website_err">--><?php //echo $website_err; ?><!--</div>-->
<!--    </div>-->
<!--    <div>-->
<!--        <div>آدرس</div>-->
<!--        <div><input type="text" name="address" id="address"/></div>-->
<!--        <div id="address_err">--><?php //echo $address_err; ?><!--</div>-->
<!--    </div>-->
<!--    <div>-->
<!--        <div>عکس</div>-->
<!--        <div><input type="file" name="photo" id="photo"/></div>-->
<!--        <div id="photo_err">--><?php //echo $photo_err; ?><!--</div>-->
<!--    </div>-->


    <div>
        <div></div>
        <div>
            <input type="submit" value="ثبت فرم"/>
            <input type="reset" value="پاک کردن"/>
        </div>
        <div></div>
    </div>


</form>

</body>
</html>