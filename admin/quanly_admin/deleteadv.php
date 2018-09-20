<?php
include_once '../../PRJ_Library/connect_DB.php';
session_start();

if (!isset($_GET["id"])){
    header("Location:Addadvertise.php");
    exit();
}
$ID = $_GET["id"];
$query = "DELETE FROM advertise WHERE id_adv = $ID";
$result = mysqli_query($link, $query);
mysqli_close($link);
header("Location:Addadvertise.php");
exit();
?>