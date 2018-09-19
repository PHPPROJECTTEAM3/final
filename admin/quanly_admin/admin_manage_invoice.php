<?php
include_once './HeaderAdmin.php';
include_once '../../PRJ_Library/connect_DB.php';

$query = "SELECT * FROM `invoice`";
$result = mysqli_query($link, $query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../jquery-latest.js" type="text/javascript"></script>
        <script src="../jquery.tablesorter.js" type="text/javascript"></script>
        <link href="../blue/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
    </head>
    <body class="margin5px">

        <h2>Invoice List</h2>
        <div style="overflow: hidden">
            <div style="float: left"> 
                <a href="Addproduct.php" style="text-decoration: none" >Back to Manage Product</a>
            </div>
            <div style="float: right; margin-right: 20px">
                <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
            </div> 
        </div>
        <hr/>   

        <form>
            <p>ID Invoice: <input name="id_search" type="number" value="0" required> <input name="bt_search" type="submit" value="Search" class="btn btn-info active"></p>
        </form>
        
<?php
if (isset($_GET["bt_search"])) {
    $id_search = $_GET["id_search"];
    $query = "SELECT * FROM `invoice` WHERE `ID` = $id_search";
    $result = mysqli_query($link, $query);
    echo "<a href='admin_manage_invoice.php'>Refesh</a>";
}
?>
        <table id="myTable" class="tablesorter"> 
            <thead> 
                <tr> 
                    <th style="width: 4%">ID</th>
                    <th style="width: 7%" >Account</th>
                    <th style="width: 8%" >Total (VND)</th>
                    <th style="width: 20%">Note</th>
                    <th style="width: 8%">Date Order</th>
                    <th style="width: 13%" >Estimate Date Recive</th>
                    <th style="width: 7%" >Deposit</th>
                    <th style="width: 7%">Status</th>
                    <th style="width: 10%" >Admin Confirm</th>
                    <th style="width: 9%" >Date Receive</th>
                    <th  colspan="3">....</th>
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
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td><center>$row[0]</center></td>";
                    echo "<td><center>$row[1]</center></td>";
                    $leght = strlen($row[2]);
                    $price = 0;
                    if ($leght == 7) {
                        $add = substr_replace($row[2], '.', 1, 0);
                        $add2 = substr_replace($add, '.', 5, 0);
                        $price = $add2;
                    }
                    if ($leght == 8) {
                        $add = substr_replace($row[2], '.', 2, 0);
                        $add2 = substr_replace($add, '.', 6, 0);
                        $price = $add2;
                    }
                    echo "<td><center>$price</center></td>";
                    echo "<td><center>$row[3]</center></td>";
                    echo "<td><center>$row[4]</center></td>";
                    echo "<td><center>$row[5]</center></td>";
                    echo "<td><center>$row[6]</center></td>";
                    echo "<td class='hien' ><center>$row[7]</center></td>";
                    echo "<td><center>$row[8]</center></td>";
                    echo "<td><center>$row[9]</center></td>";
                    echo "<td><center><a href='admin_detail_invoice.php?id=$row[0]'>Detail</a></center></td>";
                    echo "<td><center><a href='admin_edit_Invoice.php?id=$row[0]'>Edit</a></center></td>";
                    echo "<td><center><a href='admin_delete_Invoice.php?id=$row[0]' onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
                    echo "</tr>";

                    // tự động cập nhật khi đơn hàng tróng
                    $query2 = "SELECT `ID_Pro` FROM `detail_invoice` WHERE `ID_Invoice` =$row[0];";
                    $result2 = mysqli_query($link, $query2);
                    $num = mysqli_num_rows($result2);
                    if ($num == 0) {
                        $query3 = "DELETE FROM `invoice` WHERE `ID` = $row[0]";
                        $result3 = mysqli_query($link, $query3);

                        if ($result3 == FALSE) {
                            echo "<tr><td><h4>Delete Invoice Empty Faile</h4><td><tr>";
                        }
                    }

                    // tự động update giá sản phẩm 
                    $query3 = "SELECT SUM(`total`) FROM `detail_invoice` WHERE `ID_Invoice`= $row[0]";
                    $result3 = mysqli_query($link, $query3);
                    $num3 = mysqli_num_rows($result3);
                    if ($num3==0) {
                        echo "<tr><td><h4>Update Total Invoice Faile</h4><td><tr>";
                    }
                    else {
                        $row2 = mysqli_fetch_array($result3);
                        $total_update = $row2[0];
                        if ($total_update == NULL) {
                            $total_update = 0;
                        }
                        $query4 = "UPDATE `invoice` SET `total`=$total_update WHERE `ID`= $row[0]";
                        $result4 = mysqli_query($link, $query4);
                        if ($result4 == FALSE) {
                            echo "<tr><td><h4>Update Total Invoice Faile</h4><td><tr>";
                        }
                    }
                }
                ?>
            </tbody> 
        </table> 


        <script type="text/javascript">
            $(document).ready(function ()
            {
                $("#myTable").tablesorter();

            }
            );
        </script>
<?php
mysqli_close($link);
exit();
?>
    </body>
</html>
