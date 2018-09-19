<?php

session_start();

if (!(isset($_GET["id"]))) {
    header("location:admin_manage_invoice.php");
    exit();
}
$id = $_GET["id"];
include_once '../../PRJ_Library/connect_DB.php';

$query = "DELETE FROM `invoice` WHERE `invoice`.`ID` = $id";
$result = mysqli_query($link, $query);


if ($result) {
    header("location:admin_manage_invoice.php");
    exit();
} else {
    echo '<h4>Delete Faile !!! </h4>';
}
mysqli_close($linknk);
exit();
?>
