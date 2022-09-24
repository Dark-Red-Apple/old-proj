<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>form</title>
    <link href="main.css" rel="stylesheet"/>
    <link href="table.css" rel="stylesheet"/>
    <link href="list.css" rel="stylesheet"/>
</head>
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
    <form name="delete-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);   ?>" method="post">
        <input type="text" name="delete" id="delete">
        <input type="submit" value="حذف">
    </form>
</div>

<table id="table-list">
    <tr>
        <td>نام</td>
        <td>نام خانوادگی</td>
        <td>نام شرکت</td>
        <td>تلفن</td>
        <td>موبایل</td>
        <td>ایمیل</td>
        <td>وبسایت</td>
        <td>آدرس</td>
        <td>عکس</td>
    </tr>
<?php

$dbServer = "localhost";
$dbUser = "addressbook";
$dbPass = "111111";
$dbName = "addressbook";

try {
    $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec("SET CHARACTER SET utf8");      // set encoding to utf-8

    // start delete --------------------------------
    if(isset($_POST['delete'])){
        $delete=$_POST['delete'];
        $sql="DELETE FROM contact WHERE firstname='$delete'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        echo '<br><div class="info"> تعداد '. $rowCount.' رکورد با موفقیت حذف شد</div>';
    }
    // end delete --------------------------------






    // prepare sql and bind parameters
    $sql="SELECT * FROM contact";
    if(isset($search) && $search!=""){
        $search=$_POST['search'];
        $sql="SELECT * FROM contact WHERE firstname like '%$search%' ";
    }
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    echo '<br><div class="info">تعداد رکورد(ها): ' .$rowCount.'</div>';



    // object
    while($row=$stmt->fetchObject()) {
        echo '<tr>';
        echo '<td>'.$row->firstname.'</td>';
        echo '<td>'.$row->family.'</td>';
        echo '<td>'.$row->company.'</td>';
        echo '<td>'.$row->phone.'</td>';
        echo '<td>'.$row->mobile.'</td>';
        echo '<td>'.$row->email.'</td>';
        echo '<td>'.$row->website.'</td>';
        echo '<td>'.$row->address.'</td>';
        echo '<td>'.$row->photo.'</td>';



        echo '<tr>';
    }
    echo '</table>';







} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


$con = null;
?>


</body>
</html>