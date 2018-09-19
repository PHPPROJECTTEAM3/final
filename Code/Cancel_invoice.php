<!--header-->
<?php
session_start();
$pageTitle = "Giohangcuaban";
$activeMenu = "cart";
include_once '../PRJ_Library/header.php';
if (isset($_GET["name"])) {
    $_SESSION["username"] = $_GET["name"];
}
?>




<?php
include_once '../PRJ_Library/footer.html';
mysqli_close($link);
exit();
?>