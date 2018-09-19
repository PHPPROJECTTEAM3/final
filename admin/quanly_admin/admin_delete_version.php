<?php
 if(!(isset($_GET["id"])))
{
    header("location:admin_manage_version.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
$id = $_GET["id"];

        $query = "DELETE FROM `version` WHERE ver_code = '$id'";
$result = mysqli_query($link, $query);
        mysqli_close($link);
        header("location:admin_manage_version.php");
        
        ?>

