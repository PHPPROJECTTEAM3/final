<?php
include_once '../PRJ_Library/connect_DB.php';
include_once '../PRJ_Library/data_product.inc';
session_start();
$quantity_pro2 = 0;
$total_pro2 = 0;
$total_quantity2 = 0;
$total_price2 = 0;
foreach ($_SESSION["cartuser"] as $ID => $SP) {
    $quantity_pro2 = $SP->proAmount;
    $total_pro2 = ($SP->proPrice * $SP->proAmount);
    $total_quantity2 += $quantity_pro2;
    $total_price2 += $total_pro2;
}

echo "
 <br/>
$total_quantity2<br/>
$total_price2"
?>
