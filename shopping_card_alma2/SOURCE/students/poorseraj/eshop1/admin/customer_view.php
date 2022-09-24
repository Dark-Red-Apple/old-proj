<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>مدیریت مشتریان</title>
    <link href="../template/template1/css/main.css" rel="stylesheet">
    <link href="../template/template1/css/menu.css" rel="stylesheet">
    <link href="../template/template1/css/table.css" rel="stylesheet">
    <link href="../template/template1/css/list.css" rel="stylesheet">
</head>
<body>

<div id="container">
    <div id="menu">
        <ul id="ul">
            <li><a href="index.php"><img src="../template/template1/image/icon/manage.png">&nbsp; مدیریت</a></li>
            <li><a href="category_view.php"><img src="../template/template1/image/icon/category.png">&nbsp;دسته</a></li>
            <li><a href="brand_view.php"><img src="../template/template1/image/icon/brand.png">&nbsp;برند</a></li>
            <li><a href="product_view.php"><img src="../template/template1/image/icon/product.png">&nbsp;محصول</a></li>
            <li><a href="customer_view.php"><img src="../template/template1/image/icon/customer.png">&nbsp;مشتریان</a>
            </li>
            <li><a href="#"><img src="../template/template1/image/icon/sale.png">&nbsp;فروش</a></li>
        </ul>
    </div>
    <div id="head" style="padding:5px;box-sizing:border-box;">
        <br/>
        <div class="center">
            <form name="search-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="search" name="search" id="search" placeholder="نام مشتری">
                <input type="submit" value="جستجو">
            </form>
        </div>
        <br>
        <div class="center">
            <form name="edit-form" action="edit.php" method="post">
                <input type="search" name="edit" id="edit" placeholder="نام مشتری">
                <input type="submit" value="ویرایش">
            </form>
        </div>
        <br>
        <div class="center">
            <form name="delete-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="search" name="delete" id="delete" placeholder="نام مشتری">
                <input type="submit" value="حذف">
            </form>
        </div>

        <br/>
        <div class="info"><a href="customer_add.php">افزودن مشتری</a></div>
        <table id="table-list">
            <tr>
                <td>کد</td>
                <td>نام</td>
                <td>نام خانوادگی</td>
                <td>نوع مشتری</td>
                <td>نام شرکت</td>
                <td>شماره تلفن</td>
                <td>شماره موبایل</td>
                <td>ایمیل</td>
                <td>آدرس</td>
                <td>کد پستی</td>
                <td>جنسیت</td>
                <td>عکس</td>
            </tr>
            <?php
            $customer_sex = $customer_type = "";
            require_once('../include/connect.php');

            // start delete --------------------------------------------------
            if (isset($_POST['delete'])) {
                $delete = trim($_POST['delete']);
                $sql = "DELETE FROM customer WHERE customer_name='$delete'";
                $stmt = $con->query($sql);
                echo '<br><div class="info"> تعداد ' . $stmt->rowCount() . ' رکورد با موفقیت حذف شد</div>';
            }
            // end delete --------------------------------------------------// start delete --------------------------------------------------

            // select all rows
            $sql = "SELECT * FROM customer";

            // start search --------------------------------------------------
            if (isset($_POST['search'])) $search = $_POST['search'];

            if (isset($search) && $search != "") $sql = "SELECT * FROM customer WHERE customer_name like '%$search%'";
            $stmt = $con->prepare($sql);
            if (isset($search)) $search = "%$search%";
            // end search --------------------------------------------------

            $stmt = $con->query($sql);

            $rowCount = $stmt->rowCount();
            echo '<br><div class="info">تعداد رکورد(ها): ' . $rowCount . '</div>';

            // object oriented show all rows
            while ($row = $stmt->fetchObject()) {

                if ($row->customer_type == 1) {
                    $customer_type = "حقوقی";
                } else if ($row->customer_type == 0) {
                    $customer_type = "حقیقی";
                }


                if ($row->customer_sex == 1) {
                    $customer_sex = "زن";
                } else if ($row->customer_sex == 0) {
                    $customer_sex = "مرد";
                }
                echo '<tr>';
                echo '<td>' . $row->customer_id . '</td>';
                echo '<td>' . $row->customer_name . '</td>';
                echo '<td>' . $row->customer_family . '</td>';
                echo '<td>' . $customer_type . '</td>';
//            echo '<td>'.$row->customer_type.'</td>';
                echo '<td>' . $row->customer_company_name . '</td>';
                echo '<td>' . $row->customer_tel . '</td>';
                echo '<td>' . $row->customer_mobile . '</td>';
                echo '<td>' . $row->customer_email . '</td>';
                echo '<td>' . $row->customer_address . '</td>';
                echo '<td>' . $row->customer_postal_code . '</td>';
                echo '<td>' . $customer_sex . '</td>';
//            echo '<td>'.$row->customer_sex.'</td>';

                echo '<td>' . '<img style="width:60px;height:60px;" src="../photo/customer/' . $row->customer_pic . '">' . '</td>';
                echo '<tr>';
            }
            echo "</table>";


            $con = null;

            ?>
    </div>
</body>
</html>