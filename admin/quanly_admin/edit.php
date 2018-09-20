<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';

if (isset($_GET["bt_edit"])) {
    $curr_name = $_GET["current_name"];
    if ($_GET["new_name"] == NULL) {
        $name = $_GET["current_name"];
    } else {
        $name = $_GET["new_name"];
    }



    if ($_GET["new_logo"] == NULL) {
        $logo = $_GET["current_image"];
    } else {
        $logo = $_GET["new_logo"];
    }

    



    $query2 = "UPDATE `brand` SET `name`='$name',`logo`='$logo' WHERE name='$curr_name'";
    $result2 = mysqli_query($link, $query2);

    if (!$result2) {
        die("Edit Faile !!!");
    }
    header("location:admin_manage_brand.php");
  
            mysqli_close($link);
               exit();
}
?>
