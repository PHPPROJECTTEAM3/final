<?php
session_start();
include_once './HeaderAdmin.php';
if (isset($_SESSION["invoice"])) {
    $invoice = $_SESSION["invoice"];
} else {
    header("location:admin_detail_invoice.php");
    exit();
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="../blue/style2.css" rel="stylesheet" type="text/css"/>
        <div class="margin5px">
<h2>Add Product to Detail Invoice : <?php echo $invoice; ?></h2>     
<div style="overflow: hidden">
    <div style="float: left"> 
        <a href="admin_detail_invoice.php" style="text-decoration: none" >Back to Manage Invoice</a>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>    
<?php
include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT `ID`, `name` FROM `product`";
$result = mysqli_query($link, $query);
$num = mysqli_num_rows($result);
if ($num == 0) {
    die("No Data");
}
?>
<form method="get">               
    <p>Name Product: <select name="id_pro"> 
<?php
while ($col = mysqli_fetch_array($result)) {
    echo "<option value='$col[0]'>$col[1]</option>";
}
?>
        </select></p>
        <p>Quantity: <input name="quantity_pro" type="number" max="3" min="1" value="1"></p>
        <p><input class="btn btn-success" name="bt_add" type="submit" value="Add"></p>
</form>
            <?php
            if(isset($_GET["bt_add"]))
            {
                $id_pro = $_GET["id_pro"];
                $quantity_pro = $_GET["quantity_pro"];
                
                $query2 = "SELECT * FROM `product` WHERE `ID`= $id_pro";
                $result2 = mysqli_query($link, $query2);
                $col2 = mysqli_fetch_array($result2);
                $total = $quantity_pro*$col2[5];
               
                $query3 = "INSERT INTO `detail_invoice`(`ID_Invoice`, `ID_Pro`, `Name_pro`, `img`, `price_pro`, `Quantity_pro`, `total`) VALUES ($invoice,$col2[0],'$col2[1]','$col2[3]',$col2[5],$quantity_pro,$total)";
                $result3 = mysqli_query($link, $query3);
                
                                                                                                                                    
                if ($result3)
                {
                    echo 'Add Success';
                } else {
                    echo 'Add Faile';
                }
                 
            }
           mysqli_close($link);
            exit();
            ?>
</div>