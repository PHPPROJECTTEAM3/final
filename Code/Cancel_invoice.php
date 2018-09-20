<?php
session_start();
include_once '../PRJ_Library/connect_DB.php';
if (!$_SESSION["username"]) {
    header("location:Home.php");
    exit();
}
if (!isset($_GET["ID"])) {
    die('ID Invoice not exist!!!');
}



if (isset($_GET["choice"])) {
    if($_GET["choice"]=='Khác')
    {
        if(!isset($_GET["rs_khac"]))
        {
            die("rs_khac not exist !!!");
        }  
    }
}

$ID = $_GET["ID"];
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date_cancel = date("Y-m-d H:i:s");

if(isset($_GET["rs_khac"]))
{
    $rs_khac=$_GET["rs_khac"];
    $query ="INSERT INTO `cancel_invoice`(`ID_invoice`, `Member`, `Reason`, `Date_Request`) VALUES ($ID,'".$_SESSION["username"]."','$rs_khac','$date_cancel')";
} 
if(!isset($_GET["rs_khac"]))
{
      $choice = $_GET["choice"];   
    $query ="INSERT INTO `cancel_invoice`(`ID_invoice`, `Member`, `Reason`, `Date_Request`) VALUES ($ID,'".$_SESSION["username"]."','$choice','$date_cancel')";
}


$result = mysqli_query($link, $query);
if($result)
{
    $query2="UPDATE `invoice` SET `status`='Đã Hủy' WHERE `ID`=$ID";
    $result2= mysqli_query($link, $query2);
    if(!$result2)
    {
        die("Cancel Invoice Faile !!!"); 
    } 
    mysqli_close($link);
    exit("Hủy Đơn Hàng Thành Công\nPHPMobile Mong Muốn Được Tiếp Tục Phục Vụ Bạn Trong Tương Lai");
} else {
     mysqli_close($link);
    exit("Hủy Đơn Hàng Thất Bại\nĐơn Hàng Của Bạn Đã Bị Hủy Hoặc Chưa Tồn Tại\nVui Lòng Kiểm Tra Lại");
}

?>


