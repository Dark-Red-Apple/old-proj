<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>form</title>
    <link href="main.css" rel="stylesheet">
    <link href="table.css" rel="stylesheet">
    <link href="list.css" rel="stylesheet">
</head>
<script>
function pageDest(des) {
    document.getElementById("deledit-check").action = des;
    document.forms['deledit-check'].submit();

}



</script>
<body>

<br>
<div class="center">
    <form name="search-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);   ?>" method="post">
        <input type="search" name="search" id="search">
        <input type="submit" value="جستجو">
    </form>
</div>
<br>
<div class="center">
    <form name="edit-form" action="edit.php" method="post">
        <input type="text" name="edit" id="edit" placeholder="ایمیل جهت ویرایش">
        <input type="submit" value="ویرایش">
    </form>
</div>
<br>
<div class="center">
    <form name="delete-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);   ?>" method="post">
        <input type="text" name="delete" id="delete" placeholder="نام جهت حذف">
        <input type="submit" value="حذف">
    </form>
</div>

<table id="table-list">
    <tr>
        <td>---</td>
        <td>کد محصول</td>
        <td>نام محصول</td>
        <td>قیمت</td>
        <td>کاربرد</td>
        <td>ماده</td>
        <td>نوع</td>
         <td>عکس</td>
    </tr>
    <div class="center">
    <form name="deledit-check" id="deledit-check" method="post">
<?php

$dbServer = "localhost";
$dbUser = "alma";
$dbPass = "111111";
$dbName = "onlineherbshop";

try {
    $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec("SET CHARACTER SET utf8");      // set encoding to utf-8

    // start delete --------------------------------------------------
    if(isset($_POST['delete'])){
        $delete=$_POST['delete'];
        $sql="DELETE FROM medicinalherbs WHERE pid='$delete'";
        $stmt=$con->query($sql);
        echo '<br><div class="info"> تعداد '. $stmt->rowCount().' رکورد با موفقیت حذف شد</div>';
    }
    if(isset($_POST['deletecheck'])){
        $count=count($_POST['check']);
        $check=$_POST['check'];
        if($count>0)
        {
            foreach($check as $i)
            $sql="DELETE FROM medicinalherbs WHERE pid='$i'";
            $stmt=$con->query($sql);
        }
    }
    // end delete --------------------------------------------------

    // select all rows
    $sql="SELECT * FROM medicinalherbs";

    // start search --------------------------------------------------
    if(isset($search) && $search!=""){
        $search=$_POST['search'];
        $sql="SELECT * FROM medicinalherbs WHERE pid like '%$search%' ";
    }
    // end search --------------------------------------------------

    /*$stmt = $con->prepare($sql);
    $stmt->execute();*/
    $stmt=$con->query($sql);

    $rowCount = $stmt->rowCount();
    echo '<br><div class="info">تعداد رکورد(ها): ' .$rowCount.'</div>';

    // object oriented show all rows
    while($row=$stmt->fetchObject()) {

        echo '<tr>';
        echo '<td><input name="check[]" type="checkbox" value="'.$row->pid.'"></td>';
        echo '<td>'.$row->pid.'</td>';
        echo '<td>'.$row->pname.'</td>';
        echo '<td>'.$row->price.'</td>';
        echo '<td>'.$row->application.'</td>';
        echo '<td>'.$row->material.'</td>';
        echo '<td>'.$row->kind.'</td>';
        echo '<td>'.$row->pic.'</td>';
        echo '<tr>';
    }
    echo '</table>';

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


$con = null;
?>

        <input type="submit" onclick="pageDest('<?php echo htmlspecialchars($_SERVER['PHP_SELF']);   ?>')" name="deletecheck" id="deletecheck" value="حذف">
        <input type="submit" onclick="pageDest('edit.php')" name="editcheck" id="editcheck" value="ویرایش">
    </form>
        </div>
</body>
</html>