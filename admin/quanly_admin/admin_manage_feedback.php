<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../quanly_admin/HeaderAdmin.php';
include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT * FROM `feed_back` ORDER BY `con_rep`";
$result = mysqli_query($link, $query);
?>
<h2>Feedback List</h2>
<div >
    <div style="float: left"> 

    </div>
    <div style="float: right; margin-right: 10px; margin-top: -5%;">
        <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>  
<form>
    <p>

        Account: <input id="name_fb" type="text" style="margin-right: 10px"</p>
    <input class="btn btn-default" id="btnPrint" type="button" value="Print">
    <input class="btn btn-default" name="bt_refesh" type="submit" value="Refesh" style="margin-right: 50px">
</form>
<?php
if (isset($_GET["bt_refesh"])) {
    header("location:admin_manage_feedback.php");
    mysqli_close($link);
    exit();
}
?>
<center><table id="myTable" class="tablesorter" style="width: 80%" border="1" cellpadding="3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Account</th>
                <th>Content Feedback</th>
                <th>Date Feedback</th>
                <th>Content Reply</th>
                <th>Date Reply</th>
                <th>Admin Reply</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Title</th>
                <th>Theme</th>
                <th colspan="2">...</th>
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
                echo "<td><center>$row[2]</center></td>";
                echo "<td><center>$row[3]</center></td>";
                echo "<td><center>$row[4]</center></td>";
                echo "<td><center>$row[5]</center></td>";
                echo "<td><center>$row[6]</center></td>";
                echo "<td><center>$row[7]</center></td>";
                echo "<td><center>$row[8]</center></td>";
                echo "<td><center>$row[9]</center></td>";
                echo "<td><center>$row[10]</center></td>";
                echo "<td><center><a href='admin_edit_feedback.php?id=$row[0]'>Edit</a></center></td>";
                echo "<td><center><a href='admin_delete_feedback.php?id=$row[0]'onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
                echo "</tr>";
            }
            mysqli_close($link);
            ?>
        </tbody></table></center>
<script type="text/javascript">
    $(document).ready(function () {
        $('#btnPrint').click(function () {
            PrintElem();
        });

        $("#myTable").tablesorter();

        $("#name_fb").keyup(function () {
            var feedback_search = $(this).val();
            $.get("admin_search_feedback.php", {feedback_search: feedback_search}, function (data) {
                $("#myTable").html(data);
            });
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
<?php
exit();
?>
</body>
</html>
