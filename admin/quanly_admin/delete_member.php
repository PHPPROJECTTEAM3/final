<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';

if (!isset($_GET["id"])){
    header("Location:Addmember.php");
    exit();
}
$ID = $_GET["id"];
$query = "DELETE FROM member WHERE id = $ID";
$result = mysqli_query($link, $query);
mysqli_close($link);
header("Location:Addmember.php");
exit();
?>