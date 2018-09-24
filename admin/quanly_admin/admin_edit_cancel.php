<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}

include_once './HeaderAdmin.php';
if (!(isset($_GET["id"]))) {
    header("location:Addproduct.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';

$id = $_GET["id"];
$query = "SELECT * FROM `cancel_invoice` Where ID_invoice = $id";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}
$col =mysqli_fetch_array($result);
?>

        <h2>Edit Cancel Invoice</h2>
             <div style="overflow: hidden">
                <div style="float: left"> 
                    <a href="admin_manage_cancel_Invoice.php" style="text-decoration: none" >Back to Cancel Invoice List</a>
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
            <hr/>
            
            
            <form method="get" action="admin_edit_cancel2.php">
            <p>ID Invoice : <?php echo $id ?></p>
            <input type="hidden" value="<?php echo $id ?>" name="id_cancel">
            <p>Member: <?php echo $col[2] ?></p>
            Reason
            <p><textarea name="rs_cancel" cols="50" rows="5"><?php echo $col[3] ?></textarea></p>
            <p>Date Request: <?php echo $col[4] ?></p>
            <p><input class="btn btn-success" name="bt_edit" type="submit" value="Edit">
        </form>