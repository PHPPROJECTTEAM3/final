
<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';

if (!(isset($_GET["id_search"])) && !(isset($_GET["acc_search"])))
{
    die("ID or Name of Product not exist !!!");
}
if (isset($_GET["id_search"])) {
    $id_search = $_GET["id_search"];
    $query = "SELECT * FROM `invoice` WHERE `ID` = $id_search";
    
    if ($_GET["id_search"] == NULL) {
        die("Enter ID");
    }
    if (isset($_GET["acc_search"])) {
        unset($_GET["acc_search"]);
    }
}

if (isset($_GET["acc_search"])) {
    $acc_search = $_GET["acc_search"];
    $query = "SELECT * FROM `invoice` WHERE `ac_name` LIKE '%$acc_search%'";
    if (isset($_GET["id_search"])) {
        unset($_GET["id_search"]);
    }
}
$result = mysqli_query($link, $query);
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
                    <th  colspan="3">Action</th>
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
                }
                ?>
            </tbody> 
        </table> 
