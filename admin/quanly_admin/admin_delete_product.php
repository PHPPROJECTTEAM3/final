<?php
 if(!(isset($_GET["id"])))
{
    header("location:admin_manage_product.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
$id = $_GET["id"];

        $query = "DELETE FROM product WHERE id = '$id'";
$result = mysqli_query($link, $query);
        mysqli_close($linknk);
        header("location:admin_manage_product.php");
        
        ?>
