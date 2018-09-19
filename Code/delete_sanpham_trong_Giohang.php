<?php

session_start();
if (!(isset($_GET["ID"]))) {
    header("location:Home.php");
    exit();
}

$ID = $_GET["ID"];

unset($_SESSION["cartuser"][$ID]);
unset($_SESSION["count_cart"][$ID]);
header("location:Giohang.php");
exit();
?>


