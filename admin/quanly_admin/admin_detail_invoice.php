<?php

if (!isset($_GET["id"])) {
    if (!isset($_SESSION["invoice"])) {
        header("location:admin_manage_invoice.php");
        exit();
    }
}
if (isset($_GET["id"])) {
    $ID = $_GET["id"];
    $_SESSION["invoice"] = $ID;
}

$invoice = 0;
if (isset($_SESSION["invoice"])) {
    $invoice = $_SESSION["invoice"];
}
include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT `ID_Pro`,`Name_pro`,`img`,`price_pro`,`Quantity_pro`,`total` FROM `detail_invoice` WHERE `ID_Invoice` =  $invoice ";
$result = mysqli_query($link, $query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="../blue/style2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="margin5px">

        <h2>Detail Invoice : <?php echo $invoice; ?></h2>     
        <div style="overflow: hidden">
            <div style="float: left"> 
                <a href="admin_manage_invoice.php" style="text-decoration: none" >Back to Manage Invoice</a>
            </div>
            <div style="float: right; margin-right: 20px">
                <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
            </div> 
        </div>
        <hr/>    
        <form method="get">
            <p><button class="btn btn-info active" name="bt_addDetail">Add</button></p>
        </form>
<?php
if (isset($_GET["bt_addDetail"])) {
    header("location:admin_addProduct_DetailInvoice.php");
    exit();
}
?>
        <table id="myTable" class="tablesorter" style=" width: 100%;"> 
            <thead>
                <tr>
                    <th style="width:5%;">STT</th>
                    <th style="width:10%">ID Product</th>
                    <th style="width:20%">Name Product</th>
                    <th style="width:22%">Image</th>
                    <th style="width:8%">Price Product</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:12%">Total</th>
                    <th style="width:15%" colspan="2">....</th>    
                </tr>
            </thead>
            <tbody>
<?php
if (mysqli_num_rows($result) == 0) {
    echo "<tr><td><h3>No Data</h3</td></tr>";
    mysqli_close($link);
    exit();
}
?>
                <?php
                $count = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $query2 = "SELECT  `name_brand` FROM `product` WHERE `ID` =$row[0]";
                    $result2 = mysqli_query($link, $query2);
                    $row2 = mysqli_fetch_array($result2);
                    echo "<tr>";
                    echo "<td><center>$count</center></td>";
                    echo "<td><center>$row[0]</center></td>";
                    echo "<td><center>$row[1]</center></td>";
                    echo "<td><center><img src='../../Images/$row2[0]/$row[2]' height='130px'></center></td>";
                    echo "<td><center>$row[3]</center></td>";
                    echo "<td><center>$row[4]</center></td>";
                    echo "<td><center>$row[5]</center></td>";
                    echo "<td><center><a href='admin_edit_detail_invoice.php?id=$row[0]'>Edit Quantity</a></center></td>";
                    echo "<td><center><a href='admin_delete_DetailInvoice.php?id=$row[0]' onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
                    echo "</tr>";
                    $count++;
                }
                mysqli_close($link);
                ?>
            <tbody>
        </table>


    </body>
</html>
