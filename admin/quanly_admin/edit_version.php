<?php
session_start();
include_once './HeaderAdmin.php';
include_once '../../PRJ_Library/connect_DB.php';

if (isset($_GET["bt_edit"])) {
    $curr_ver = $_GET["current_version"];
    if ($_GET["new_version"] == NULL) {
        $ver = $_GET["current_version"];
    } else {
        $ver = $_GET["new_version"];
    }



    if ($_GET["new_file"] == NULL) {
        $file = $_GET["current_file"];
    } else {
        $file = $_GET["new_file"];
    }

    



    $query2 = "UPDATE `version` SET `ver_code`='$ver',`File_PDF`='$file' WHERE `ver_code`='$curr_ver'";
    $result2 = mysqli_query($link, $query2);

    if (!$result2) {
        die("Edit Faile !!!");
    }
    header("location:admin_manage_version.php");
     exit();
            mysqli_close($link);
}
?>
