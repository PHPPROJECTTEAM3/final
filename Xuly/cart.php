<?php

include_once '../PRJ_Library/data_product.inc';
session_start();
$count = 0;
if (isset($_SESSION["cartuser"])) {
    foreach ($_SESSION["cartuser"] as $ID => $SP) {
        $count += $SP->proAmount;
    }
}
echo $count;
?>

