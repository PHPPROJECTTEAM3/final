<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
 if(!(isset($_GET["id"])))
{
    header("location:admin_manage_cancel_Invoice.php");
    exit();
}

include_once '../../PRJ_Library/connect_DB.php';
$id = $_GET["id"];
echo $id;
        $query = "DELETE FROM `cancel_invoice` WHERE `ID_invoice` = $id ";
$result = mysqli_query($link, $query);
        mysqli_close($link);
        header("location:admin_manage_cancel_Invoice.php");
        
        ?>