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
require_once('validate.php');
$dbServer = "localhost";
$dbUser = "alma";
$dbPass = "111111";
$dbName = "onlineherbshop";

//for first time  when redirect from list.php
if(isset($_POST['editcheck']) && !empty($_POST['check'])) {
    $edit=implode($_POST['check']);
    $id=$edit;

    try {
        $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8


        $sql="SELECT * FROM medicinalherbs WHERE pid='$edit'";
        $stmt = $con->query($sql);
        echo "rows :". $stmt->rowCount().'<br>';
        if($stmt->rowCount()>0) echo 'found<br>'; else die('not found<br>');
        $row=$stmt->fetchObject();

        //$email = $row->email;
        $pid = $row->pid;
        $pname = $row->pname;
        $price = $row->price;
        $application = $row->application;
        $kind = $row->kind;
        $material = $row->material;
        $pic = $row->pic;

        $photo = "sample.jpg";
        echo '<br>'.$id . ', ' . $pid . ', ' . $price . ', ' . $application . ', ' . $kind . ', ' . $material .
            ', ' . $pic .'<br>';

    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}


// when form submitted:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $application = $_POST['application'];
    $material = $_POST['material'];
    $kind = $_POST['kind'];
    $pic = $_POST['pic'];
    $pid = $_POST['pid'];
    $application = implode(",", $application);
    echo $pname . ', ' . $price . ', ' . $application . ', ' . $material . ', ' . $kind . ', ' . $pic;

    $dbServer = "localhost";
    $dbUser = "alma";
    $dbPass = "111111";
    $dbName = "onlineherbshop";

    try {
        $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8


        $sql = "UPDATE  medicinalherbs SET pname='$pname', price='$price', application='$application', material='$material',
kind='$kind', pic='$pic'  WHERE pid='$pid'";
        $stmt = $con->query($sql);
        echo "editedt rows: " . $stmt->rowCount() . '<br>';
        //if($stmt->rowCount()>0) echo 'found<br>'; else die('not found<br>');
        die('edited');

        $con = null;


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    $con = null;
}
?>


<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <div>
        <div>کد محصول</div>
        <div><input type="text" name="pid" id="pid" value="<?php echo $pid ?>" readonly/></div>
    </div>

    <div>
        <div>نام محصول</div>
        <div><input type="text" name="pname" id="pname" value="<?php echo $pname ?>"/></div>
        <div id="pname_err"><?php echo $pname_err; ?></div>
    </div>
    <div>
        <div>قیمت</div>
        <div><input type="text" name="price" id="price"  value="<?php echo $price ?>"/></div>
        <div id="price_err"><?php echo $price_err; ?></div>
    </div>
    <div>
        <div>کاربرد</div>

        <div><input type="checkbox" name="application[]" value="skin" id="skin" <?php if (strpos($application,'skin')!==false ) echo 'checked' ?>/><label for="skin"><span></span> پوست</label>
            <input type="checkbox" name="application[]" value="hand" id="hand"<?php if (strpos($application,'hand')!==false ) echo 'checked' ?>/><label for="hand"><span></span> دست</label>
            <input type="checkbox" name="application[]" value="face" id="face"<?php if (strpos($application,'face')!==false ) echo 'checked' ?>/><label for="face"><span></span> صورت</label></div>
        <div id="application_err"><?php echo $application_err; ?></div>
    </div>
    <div>
        <div>ماده</div>
        <div><input type="radio" name="material" value="liquid" id="liquid"  <?php if ($material=="liquid" ) echo 'checked="checked"' ?>/><label for="liquid"><span></span>مایع </label>
            <input type="radio" name="material" value="iliquid" id="iliquid" <?php if ($material=='iliquid' ) echo 'checked' ?>/><label for="iliquid"><span></span>جامد </label>
        </div>
        <div id="material_err"><?php echo $material_err; ?></div>
    </div>
    <div>
        <div>نوع</div>
        <div><select name="kind">
                <option id="tripledash" name="tripledash" value="tripledash" <?php if ($kind=='tripledash' ) echo 'selected="selected"' ?>>---</option>
                <option id="soap" name="soap" value="soap" <?php if ($kind=='soap' ) echo 'selected="selected"' ?>>صابون</option>
                <option id="cream" name="cream" value="cream" <?php if ($kind=='cream' ) echo 'selected="selected"' ?>>کرم</option>
                <option id="mask" name="mask" value="mask"<?php if ($kind=='mask' ) echo 'selected="selected"' ?> >ماسک</option>
            </select></div>

        <div id="kind_err"><?php echo $kind_err; ?></div>
    </div>
    <div>
        <div>عکس</div>
        <div><input type="text" name="pic" id="pic" value="<?php echo $pic ?>"/></div>
        <div id="pic_err"><?php echo $pic_err; ?></div>
    </div>
    <!--    <div>-->
    <!--        <div>وبسایت</div>-->
    <!--        <div><input type="text" name="pic" id="pic"/></div>-->
    <!--        <div id="pic_err">--><?php //echo $pic_err; ?><!--</div>-->
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
            <input type="submit" name="submit" value="ثبت فرم"/>
            <input type="reset" value="پاک کردن"/>
        </div>
        <div></div>
    </div>


</form>

</body>
</html>