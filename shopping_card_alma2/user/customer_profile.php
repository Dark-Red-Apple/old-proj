<?php
require_once('define_session.php');
$title = 'پروفایل';
$link = '';
if ($is_guest == 1) {
    header('location:products.php');
    object_get();
}
require_once("header.php");
?>
<div style="height: 200px; line-height: 200px;text-align: center;font-size: 30px; color:green; " class="container">

</div>
<?php require_once('footer.php'); ?>
<script src="/almaprojects/shopping_card_alma2/template/template1/javascript/ajax.js"></script>
