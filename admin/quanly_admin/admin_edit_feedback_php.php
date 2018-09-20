<?php
session_start();

include_once '../../PRJ_Library/connect_DB.php';

if (isset($_GET["bt_edit"])) {
    $id_feed = $_GET["id_feed"];
    $con_rep = $_GET["conrep"];
    $date_rep = $_GET["date_rep"];
    $addmin_rep = $_GET["addmin_rep"];
    
    $query2 = "UPDATE `feed_back` SET `con_rep`='$con_rep',`date_rep`='$date_rep',`admin_rep`='$addmin_rep' WHERE `id` = $id_feed";
    $result2 = mysqli_query($link, $query2);

    if ($result2) {
         $_SESSION['conrep'] = $con_rep;
    header("location:admin_manage_feedback.php");

     exit();  
    }else
   die("Edit Faile !!!");
}
?>
