<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
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
        <script>
            $(document).ready(function () {

                $("#id_search").keyup(function () {
                    var id_search = $(this).val();
                    $.get("admin_search_invoice.php", {id_search: id_search}, function (data) {
                        $("#myTable").html(data);

                    });
                });
                $("#acc_search").keyup(function () {
                    var name_search = $(this).val();
                    $.get("admin_search_invoice.php", {acc_search: name_search}, function (data) {
                        $("#myTable").html(data);
                    });
                    $()
                });
            });
        </script>
    </head>
    <body class="margin5px">

        <h2>Invoice List</h2>
        <div style="overflow: hidden">
            
            <div style="float: right; margin-right: 20px">
                <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
            </div> 
        </div>
        <hr/>
        <form>
            <p><input style="margin-right: 50px"  class="btn btn-info active" name="manage_statistical" type="submit" value="Statistical">
                <input class="btn btn-info active" name="manage_cancel_Invoice" type="submit" value="Manage Cancel Invoice"></p>
            ID Invoice: <input id="id_search" type="number" value="0" style="margin-right: 50px"> 
            Account: <input id="acc_search" type="text" style="margin-right: 50px" />
            <input class="btn btn-default" name="bt_refesh" type="submit" value="Refesh">
            <button id="Print" style="float: right;" class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button>
        </form>

        <?php
        if (isset($_GET["manage_statistical"])) {
            header("location:admin_manage_statistical.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["manage_cancel_Invoice"])) {
            header("location:admin_manage_cancel_Invoice.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["bt_refesh"])) {
            header("location:admin_manage_invoice.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["bt_search"])) {
            $id_search = $_GET["id_search"];
            $query = "SELECT * FROM `invoice` WHERE `ID` = $id_search";
            $result = mysqli_query($link, $query);
            echo "<a href='admin_manage_invoice.php'>Refesh</a>";
        }
        ?>
        <table id="myTable" border="1" class="tablesorter"> 
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

                    // tự động update giá sản phẩm 
                    $query3 = "SELECT SUM(`total`) FROM `detail_invoice` WHERE `ID_Invoice`= $row[0]";
                    $result3 = mysqli_query($link, $query3);
                    $num3 = mysqli_num_rows($result3);
                    if ($num3 == 0) {
                        echo "<tr><td><h4>Update Total Invoice Faile</h4><td><tr>";
                    } else {
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

                $('#Print').click(function () {
                    PrintElem();
                });
            }
            );
            function PrintElem()
            {
                var divToPrint = document.getElementById("myTable");
                newWin = window.open("");
                newWin.document.write(divToPrint.outerHTML);
                newWin.print();
                newWin.close();
            }
        </script>
<?php
mysqli_close($link);
exit();
?>
    </body>
</html>
