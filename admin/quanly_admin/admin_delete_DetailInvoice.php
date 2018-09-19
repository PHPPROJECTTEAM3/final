<?php
session_start();

 if(!(isset($_GET["id"])))
{
    header("location:admin_detail_invoice.php");
    exit();
}
$id_pro = $_GET["id"];
if(!isset($_SESSION["invoice"]))
    {
       header("location:admin_detail_invoice.php");
       exit();
    }
 $invoice = $_SESSION["invoice"];
include_once '../../PRJ_Library/connect_DB.php';


        $query = "DELETE FROM `detail_invoice` WHERE `ID_Invoice` =$invoice AND `ID_Pro` = $id_pro";
$result = mysqli_query($link, $query);
       
        
        if($result)
        {
            header("location:admin_detail_invoice.php");
            exit();
        } else {
            echo '<h4>Delete Faile !!! </h4>';
}
        mysqli_close($linknk);
        exit();
        ?>
