<?php
include_once '../../PRJ_Library/connect_DB.php';
if (isset($_GET["bt_edit"])) {
    $curr_name = $_GET["current_name"];
    if ($_GET["new_name"] == NULL) {
        $name = $_GET["current_name"];
    } else {
        $name = $_GET["new_name"];
    }
    $id_cancel = $_GET["id_cancel"];
    $rs_cancel = $_GET["rs_cancel"];
    if($rs_cancel==NULL)
    {
        exit('Reason Empty!!!');
    }
    
    $query ="UPDATE `cancel_invoice` SET `Reason`='$rs_cancel' WHERE `ID_invoice` = $id_cancel";
    $result= mysqli_query($link, $query);
    if($result)
    {
        mysqli_close($link);
        header("location:admin_manage_cancel_Invoice.php");
        exit();
    }
 else   
    {

        mysqli_close($link);
        exit("Edit Faile !!!");
    }
     
}
?>

