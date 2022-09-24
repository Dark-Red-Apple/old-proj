<?php
require_once('../include/connect.php');
function bestSellingProducts($numbers)
{
    //the view I used:
    // CREATE VIEW `ordersperproduct` AS select `orders`.`product_id` AS `Product_id`,sum(`orders`.`order_count`) AS `TotalQuantity` from `orders` WHERE invoice_id IN (SELECT invoice_id FROM invoices where invoice_state='confirmed' ) group by `orders`.`product_id` order by `TotalQuantity` desc
    //CREATE VIEW `productsales` AS select `products`.`product_price` AS `product_price`,`products`.`product_id` AS `product_id`,`products`.`product_pic` AS `product_pic`,`products`.`product_name` AS `product_name`,`products`.`product_title` AS `product_title`,`ordersperproduct`.`TotalQuantity` AS `TotalQuantity`,`products`.`product_price`*`ordersperproduct`.`TotalQuantity` AS `totalsale` from (`ordersperproduct` join `products` on((`products`.`product_id` = `ordersperproduct`.`Product_id`))) order by `ordersperproduct`.`TotalQuantity` desc
    //$sql="SELECT COUNT(*) AS order_ount, product_id FROM orders GROUP BY product_id ORDER by order_ount DESC  LIMIT $numbers";this does not contain orders_count and
    // you should use an array to select from products based on this array because it may have too many or conditions
    //limit inside in clause is not supported
    // this query is not sorted an therefor does not give the most selling products:
    // $stmtBestSellingProducts = $con->query("SELECT product_price, product_id, product_pic, product_name, product_title FROM products WHERE product_id IN ( SELECT product_id FROM ordersperproduct) LIMIT $numbers");
    global $con;
    $stmtBestSellingProducts = $con->query("SELECT product_price, products.product_id, product_pic, product_name, product_title,TotalQuantity from `ordersperproduct` INNER JOIN products ON products.product_id=ordersperproduct.product_id order by `TotalQuantity` desc LIMIT $numbers");
    return ($stmtBestSellingProducts);
}

function newProducts($numbers)
{
    global $con;
    $stmtNewProducts = $con->query("SELECT product_price, product_id, product_pic, product_name, product_title FROM products ORDER BY product_id DESC LIMIT $numbers");
    return ($stmtNewProducts);
}



