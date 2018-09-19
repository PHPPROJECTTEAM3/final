<script src="../Lib_/jquery-3.3.1.min.js" type="text/javascript"></script>
<?php
include_once '../PRJ_Library/connect_DB.php';
include_once '../PRJ_Library/data_product.inc';

//if (!isset($_GET["ID"])) {
//    header("location:Home.php");
//    exit();
//}
session_start();

$ID = $_GET["ID"];
$query = "SELECT * FROM product WHERE ID = $ID";
$result = mysqli_query($link, $query);

$num = mysqli_num_rows($result);
if ($num == 0) {
    die("No Data");
}

if (isset($_SESSION["cartuser"][$ID])) {
    $_SESSION["cartuser"][$ID]->proAmount++;
} else {
    $row = mysqli_fetch_array($result);
    $product_amount = new product_amount();
    $product_amount->setValue($row[0], $row[1], $row[3], $row[2], $row[5], 1);
    $_SESSION["cartuser"][$ID] = $product_amount;
}


?>


<?php
mysqli_close($link);
exit();
?>




