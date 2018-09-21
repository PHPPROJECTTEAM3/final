<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
include_once '../quanly_admin/HeaderAdmin.php';
$activeMenu = "";

?>
<form method="GET">
<h2>Admin List</h2>
             <div>
                <div style="float: left">                   
            </div>
                <div style="float: right; margin-right: 10px; margin-top: -5%;">
                    <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
                    </div> 
                
            </div>
<a href="admin_add_admin.php">Thêm Mới</a>
            <hr/> 
</form>            
<?php
    if(isset($_GET["bt_log_out"]))
    {
        unset($_SESSION["admin"]);
        header("location:Login.php");
        mysqli_close($link);
        exit();
    }  
?>

            <center><table border="2">
                <tr>
                    <th style="width: 2%">ID</th>
                    <th style="width: 20%">Account Name</th>
                   
                    <th style="width: 20%">Role</th>
                    <th colspan="2" style="text-align: center">Action</th>
                </tr>
                <?php
                $query = "SELECT * FROM `admin`";
                $result = mysqli_query($link, $query);
                $num = mysqli_num_rows($result);
                if($num == 0)
                {
                    die("<tr><td>No Data</td></tr>");
                }
                while ($col = mysqli_fetch_array($result))
                {
                echo '<tr>';
                echo "<td><center>$col[id]</center></td>";
                echo "<td><center>$col[acc]</center></td>";
                
                echo "<td><center>$col[role]</center></td>";
                echo "<td><center><a href='pageeditadmin.php?id=$col[id]'>Edit</a></center></td>";
                echo"<td><center><a href='delete_admin.php?id=$col[id]' onclick=\"javascript: return confirm('Bạn chắc chắn muốn xóa?');\">Delete</a></center></td>";
                echo '</tr>';
                }
                ?>
                </table></center>
          </div>
        
        
        
        
    </body>
</html>
