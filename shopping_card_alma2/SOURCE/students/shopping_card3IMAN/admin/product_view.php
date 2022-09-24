<?php include "../include/menu.php"; ?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>form</title>
    <link href="../template/template1/css/main.css" rel="stylesheet">
    <link href="../template/template1/css/table.css" rel="stylesheet">
    <link href="../template/template1/css/list.css" rel="stylesheet">
</head>
<body>


<table id="table-list">
    <tr>
        <td>کد محصول</td>
        <td>نام کاتالوگ</td>
        <td>کد برند</td>
        <td>نام محصول</td>
        <td>سایز محصول</td>
        <td>وزن محصول(گرم)</td>
        <td>تاریخ محصول</td>
        <td>قیمت محصول(تومان)</td>
        <td>گارانتی محصول</td>
        <td>موجودی محصول</td>
        <td>عکس محصول</td>
    </tr>
    <?php

    require_once('../include/connect.php');

    // select all rows, below statements results are the same

    //$sql="SELECT * FROM brand, item WHERE brand.brandId=item.brandId";
    //$sql="SELECT brand.brandId, brand.brandName, item.itemId, item.itemName, item.price FROM brand INNER JOIN item ON brand.brandId=item.brandId";
    //        $sql="SELECT * FROM category INNER JOIN item ON brand.brandId=item.brandId";
    $sql = "SELECT * FROM product";


    //$sql="SELECT * FROM brand INNER JOIN item ON brand.brandId=item.brandId WHERE ....";


    $stmt = $con->query($sql);

    $rowCount = $stmt->rowCount();
    echo '<br><div class="info">تعداد رکورد(ها): ' . $rowCount . '</div>';

    // object oriented show all rows
    while ($row = $stmt->fetchObject()) {
        echo '<tr>';
        echo '<td>' . $row->product_id . '</td>';
        echo '<td>' . $row->cat_id . '</td>';
        echo '<td>' . $row->brand_id . '</td>';
        echo '<td>' . $row->product_name . '</td>';
        echo '<td>' . $row->product_size . '</td>';
        echo '<td>' . $row->product_weight . '</td>';
        echo '<td>' . $row->product_date . '</td>';
        echo '<td>' . $row->product_price . '</td>';
        echo '<td>' . $row->product_warranty . '</td>';

        if ($row->product_exist == 1) {
            $product_exist = "موجود است";
        } else if ($row->product_exist == 0) {
            $product_exist = "موجود نیست";
        }
        echo '<td>' . $product_exist . '</td>';
        echo '<td>' . '<img style="width:50px;height:50px;" src="../photo/product/' . $row->product_pic . '">' . '</td>';
        echo '<tr>';
    }
    echo '</table>';


    $con = null;

    ?>

</body>
</html>