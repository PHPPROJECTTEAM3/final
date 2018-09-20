<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../quanly_admin/HeaderAdmin.php';
$activeMenu = "addadmin";


include_once '../../PRJ_Library/connect_DB.php';
?>
<?php
$query = "SELECT * FROM `member`";
$result = mysqli_query($link, $query);
$num = mysqli_num_rows($result);
if($num == 0)
{
    die("No Data");
}
?>

<form method="GET">
<h2>Member List</h2>
             <div>
                <div style="float: left">                   
            </div>
                <div style="float: right; margin-right: 10px; margin-top: -9%;">
                   <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
                    </div> 
                
            </div>
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

  
            <table border="1">
                <tr>
                    <th style="width: 2%">id</th>
                    <th style="width: 12%">Account Name</th>                   
                    <th style="width: 12%">Last Name</th>
                    <th style="width: 8%">First Name</th>
                    <th style="width: 18%">Mail</th>
                    <th style="width: 8%">Phone</th>
                    <th style="width: 3%">Gender</th>
                    <th style="width: 7%">Date Of Birth</th>
                    <th style="width: 7%">Reliability</th>
                    <th style="width: 8%"colspan="2">Action</th>
                </tr>
                <?php 
                while ($col = mysqli_fetch_array($result))
                {
                    echo '<tr>';
                    echo"<td><center>$col[id]</center></td>";
                   echo"<td><center>$col[acc]</center></td>";                  
                   echo"<td><center>$col[l_name]</center></td>";
                   echo"<td><center>$col[f_name]</center></td>";
                   echo"<td><center>$col[mail]</center></td>";
                   echo"<td><center>$col[phone]</center></td>";
                   echo"<td><center>$col[gender]</center></td>";
                   echo"<td><center>$col[date_birth]</center></td>";
                   echo"<td><center>$col[reliability]</center></td>";
                   echo"<td><center><a href='pageeditmember.php?id=$col[id]'>Edit</a></center></td>";
                   echo"<td><center><a href='delete_member.php?id=$col[0]' onclick=\"javascript: return confirm('Bạn chắc chắn muốn xóa?');\">Delete</a></center></td>";
                    echo '</tr>';
                }
                ?>
            </table>
