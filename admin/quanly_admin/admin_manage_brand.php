<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
include_once './HeaderAdmin.php';
$query = "SELECT * FROM `brand`";
$result = mysqli_query($link, $query);
?>

<h2>Brand List</h2>
             <div style="overflow: hidden">
                <div style="float: left"> 
                    <a href="Addproduct.php" style="text-decoration: none" >Back to Manage Product</a>
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
            <hr/>   

        <form   
            <p><input class="btn btn-info active" name="bt_add" type="submit" value="Add Brand"></p>
        </form>
<?php
if (isset($_GET["bt_add"])) {
    header("location:admin_add_brand.php");
    mysqli_close($link);
    exit();
}
?>
        <center><table id="myTable" class="tablesorter">
                <thead>
            <tr>
                <th style="width: 20%">Brand Name</th>
                <th style="width: 20%">Logo</th>
                <th style="width: 10%"colspan="2">Action</th>
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
                echo "<td><center><a href='admin_edit_brand.php?id=$row[0]'>Edit</a></center></td>";
                echo "<td><center><a href='admin_delete_brand.php?id=$row[0]'onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
                echo "</tr>";
            }
            
            ?>
                </tbody>
            </table></center>

<?php 
mysqli_close($link);
exit();
?>
    </body>
</html>
