<?php
ob_start();
include_once './HeaderAdmin.php';
session_start();
include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT * FROM `version`";
$result = mysqli_query($link, $query);
?>

        <h2>Version List</h2>
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
            <p>
                <input name="bt_add" type="submit" value="Add Version" class="btn btn-info active" style="margin-right: 20px"> 
                Name Version: <input id="name_ver" type="text" style="margin-right: 10px"</p>
                <input class="btn btn-default" name="bt_refesh" type="submit" value="Refesh" style="margin-right: 50px">
        </form>
        <?php
        if (isset($_GET["bt_add"])) {
            header("location:admin_add_version.php");
            exit();
        }
        if (isset($_GET["bt_refesh"])) {
            header("location:admin_manage_version.php");
            mysqli_close($link);
            exit();
        }
        ?>

    <center><table id="myTable" class="tablesorter" style="width: 80%">
            <thead>
                <tr>
                    <th style="width: 20%">Name Version</th>
                    <th style="width: 20%">File PDF</th>
                    <th style="width: 10%"  colspan="2">....</th>
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
                    echo "<td><center><a href='admin_edit_version?id=$row[0]'>Edit</a></center></td>";
                    echo "<td><center><a href='admin_delete_version.php?id=$row[0]' onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
                    echo "</tr>";
                }
                ?>

            </tbody> </table></center>
    <script type="text/javascript">
        $(document).ready(function () {

            $("#myTable").tablesorter();
            
            $("#name_ver").keyup(function () {
                    var version_search = $(this).val();
                    $.get("admin_search_version.php", {version_search: version_search}, function (data) {
                        $("#myTable").html(data);
                    });
                });

        });
    </script>
    <?php
    mysqli_close($link);
    exit();
    ?>
</body>
</html>
