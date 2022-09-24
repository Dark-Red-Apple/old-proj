<?php
session_start();
if($_SERVER['REQUEST_METHOD']='POST' && $_POST['customer_id'] ){
    $j = 1;
    $customer_id=$_SESSION['user'];
//    $customer_id=$_POST['$customer_id'];
    require_once('basket_functions.php');
    $stmt=basketItems($customer_id); ?>
<table style="position: relative" id="table-list">
    <tr>
        <td>عکس</td>
        <td>نام محصول</td>
        <td>قیمت واحد</td>
        <td>تعداد</td>
        <td>قیمت</td>
    </tr>

    <!--        object oriented show all rows-->
    <?php while ($row = $stmt->fetchObject()) { ?>
        <tr id="row<?php echo $j; ?>">
            <td><a href="single_product.php?product_id=<?php echo $row->product_id ?>"><img
                        class="basket-image"
                        src="../photo/product/<?php echo $row->product_pic ?>"></a>
            </td>
            <td><?php echo $row->product_title ?></td>
            <td><?php echo number_format($row->product_price) ?></td>
            <td><select class="quantity-change-basket"
                        onchange="changeQuantity(this.options[this.selectedIndex].value,'<?php echo $row->product_id ?>','<?php echo $_SESSION['user'] ?>','row<?php echo $j; ?>')">
                    <?php for ($i = 1; $i < 30; $i++) {
                        echo '<option value="' . $i . '"';
                        if ($i == ($row->order_count)) echo 'selected';
                        echo '>' . $i . '</option>';
                    } ?>
                </select></td>
            <td><?php echo number_format($row->order_count * $row->product_price) ?></td>
            <td>
                <button class="little-image" form="delete-form" name="delete" onclick="deleteItems('<?php echo $customer_id ?>','<?php echo $row->order_id ?>','basket-items')"
                        value="<?php echo $row->order_id ?>"><i
                        class="delete-icon font-awesome">&times;</i></button>
            </td>
        </tr>
        <?php $j++; ?>
    <?php } ?>
    <div id="loading-div">
        <div></div>
    </div>
</table>
<?php } ?>