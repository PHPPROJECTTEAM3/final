<script src="../Lib_/jquery-3.3.1.min.js" type="text/javascript"></script>
<?php
include_once '../PRJ_Library/data_product.inc';
include_once '../PRJ_Library/connect_DB.php';
session_start();
if (isset($_GET["note_cus"])) {
    $_SESSION["note"] = $_GET["note_cus"];
}
if (!(isset($_SESSION["cartuser"]))) {
    header("location:Home.php");
    exit();
}

if (!(isset($_SESSION["username"]))) {
    header("location:Giohang.php?check_DatHang=1");
    exit();
}
date_default_timezone_set("Asia/Ho_Chi_Minh");
$query6 = "SELECT * FROM `cancel_invoice` WHERE `Member` like '" . $_SESSION["username"] . "' ORDER BY `cancel_invoice`.`Date_Request` DESC";
$result6 = mysqli_query($link, $query6);
$countt = 0;


$date_now = date("Y-m-d");
$check = 0;
while ($countt != 3) {
    $col6 = mysqli_fetch_array($result6);
    $date = new DateTime("$col6[4]");
    $date_cancel = $date->format("Y-m-d");
    if ($date_cancel == $date_now) {
        $check++;
    }
    $countt++;
}
if ($check == 3) {
    header("location:Giohang.php?check_DatHang=9");
    exit();
}


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


$acc_name = $_SESSION["username"];
// Kiểm tra tài khoản đã cập nhật rồi hay chưa
$query4 = "SELECT * FROM `member` WHERE `acc` like '$acc_name'";
$result4 = mysqli_query($link, $query4);
$col = mysqli_fetch_array($result4);
if ($col[2] == NULL || $col[3] == NULL || $col[5] == NULL || $col[6] == NULL || $col[7] == NULL) {
    header("location:Giohang.php?check_DatHang=2");
    exit();
}
if ($col[8] == 'Yếu') {
    header("location:Giohang.php?check_DatHang=3");
    exit();
}
if ($col[8] == 'Khá') {
    if ($total_price2 > 50000000 || $total_quantity2 > 3) {
        header("location:Giohang.php?check_DatHang=4");
        exit();
    }
}
if ($col[8] == 'Tốt') {
    if ($total_price2 > 60000000 || $total_quantity2 > 4) {
        header("location:Giohang.php?check_DatHang=5");
        exit();
    }
}
$query5 = "SELECT `ID`,`status` FROM `invoice` WHERE `ac_name` like '$acc_name' ORDER BY `date_or` DESC";
$result5 = mysqli_query($link, $query5);

$num2 = mysqli_num_rows($result5);
if ($num2 != 0) {
    $col2 = mysqli_fetch_array($result5);
    if ($col2[1] != 'Đã Nhận Hàng' && $col2[1] != 'Đã Hủy') {
        header("location:Giohang.php?check_DatHang=7&MS=$col2[0]");
        exit();
    }
}

$date_or = date("Y-m-d H:i:s");
$dateor = date("Y-m-d");
$date = new DateTime("$dateor");
$date->modify("+2 day");
$es_date_re = $date->format("Y-m-d");
$total_invoice = NULL;

if (isset($_GET["bt_order"])) {
    $total_invoice = $_GET["total_invoice"];
}
$query = "INSERT INTO `invoice`(`ac_name`, `total`, `note` , `date_or`, `es_date_re`,`deposit`,`status`) VALUES ('$acc_name',' $total_invoice','" . $_SESSION["note"] . "','$date_or','$es_date_re','Không','Chờ Xác Nhận')";
echo $query;
$result = mysqli_query($link, $query);
if (!$result) {
    header("location:Giohang.php?check_DatHang=6");
    die();
}

$query2 = "SELECT * FROM `invoice`";
$result2 = mysqli_query($link, $query2);

$num = mysqli_num_rows($result2);
while ($row = mysqli_fetch_array($result2)) {
    $id_inv[] = $row[0];
}

$ID_Invoice = 0;
if ($num == 0) {
    $ID_Invoice = 1;
} else {
    $ID_Invoice = max($id_inv);
}


foreach ($_SESSION["cartuser"] as $ID => $SP) {

    $id_pro = $SP->proID;
    $Name_pro = $SP->proName;
    $img_pro = $SP->proImg;
    $price_pro = $SP->proPrice;
    $quantity_pro = $SP->proAmount;
    $total_pro = ($SP->proPrice * $SP->proAmount);
    $query3 = "INSERT INTO `detail_invoice`(`ID_Invoice`, `ID_Pro`, `Name_pro`, `img`, `price_pro`, `quantity_pro`, `total`) VALUES ($ID_Invoice,$id_pro,'$Name_pro','$img_pro',$price_pro,$quantity_pro,$total_pro)";
    $result3 = mysqli_query($link, $query3);
}






if (!$result3) {
    header("location:Giohang.php?check_DatHang=6");
    die();
} else {
    header("location:Giohang.php?check_DatHang=8");
    unset($_SESSION["count_cart"]);
    unset($_SESSION["cartuser"]);
    unset($_SESSION["note"]);
}
mysqli_close($link);
exit();
?>
