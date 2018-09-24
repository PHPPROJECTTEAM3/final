<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
include_once './HeaderAdmin.php';
$query = "SELECT * FROM `cancel_invoice`";
$result = mysqli_query($link, $query);
?>
<h2>Cancel Invoice List</h2>
<div style="overflow: hidden">
    <div style="float: left"> 
        <a href="admin_manage_invoice.php" style="text-decoration: none" >Back to Manage Invoice</a>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>  
<form>
    ID Invoice: <input id="id_search" type="number" value="0" style="margin-right: 50px"> 
            Account: <input id="acc_search" type="text" style="margin-right: 50px" />
            <input class="btn btn-default" name="bt_refesh" type="submit" value="Refesh">
             <button id="Print" style="float: right;" class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button>
</form>
<center><table id="myTable" border="1" class="tablesorter">
        <thead>
            <tr>
                <th style="width: 20%">ID Invoice</th>
                <th style="width: 20%">Member</th>
                <th style="width: 20%">Reason</th>
                <th style="width: 20%">Date Request</th>
                <th style="width: 10%"colspan="2">...</th>
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
                echo "<td><center>$row[1]</center></td>";
                echo "<td><center>$row[2]</center></td>";
                echo "<td><center>$row[3]</center></td>";
                echo "<td><center>$row[4]</center></td>";
                echo "<td><center><a href='admin_edit_cancel.php?id=$row[1]'>Edit</a></center></td>";
                echo "<td><center><a href='admin_delete_cancel.php?id=$row[1]'onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table></center>
  <script>
    $(document).ready(function () {
          $("#myTable").tablesorter();
          $("#id_search").keyup(function () {
            var id_search = $(this).val();
            $.get("admin_search_cancel.php", {id_search: id_search}, function (data) {
                $("#myTable").html(data);

            });
        });
        $("#acc_search").keyup(function () {
            var name_search = $(this).val();
            $.get("admin_search_cancel.php", {acc_search: name_search}, function (data) {
                $("#myTable").html(data);
            }); 
        });
        $('#Print').click(function () {
                    PrintElem();
                });
    });
     function PrintElem()
            {
                var divToPrint = document.getElementById("myTable");
                newWin = window.open("");
                newWin.document.write(divToPrint.outerHTML);
                newWin.print();
                newWin.close();
            }
</script>