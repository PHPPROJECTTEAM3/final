<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../quanly_admin/HeaderAdmin.php';
$activeMenu = "";


include_once '../../PRJ_Library/connect_DB.php';
?>
<?php
$query = "SELECT * FROM `advertise`";
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
                    <a href="admin_add_adv.php">Thêm quảng cáo</a>
            </div>
                <div style="float: right; margin-right: 10px; margin-top: -9%;">
                    <button name="bt_log_out">Log Out</button>
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
                    <th style="width: 2%">id_adv</th>
                    <th style="width: 12%">img_adv</th>                   
                    <th style="width: 8%"colspan="2">Action</th>
                </tr>
                <?php 
                while ($col = mysqli_fetch_array($result))
                {
                    echo '<tr>';
                    echo"<td><center>$col[id_adv]</center></td>";
                   echo"<td><center>$col[img_adv]</center></td>";                  
                   echo"<td><center><a href='pageeditadv.php?id=$col[id_adv]'>Edit</a></center></td>";
                   echo"<td><center><a href='deleteadv.php?id=$col[id_adv]' onclick=\"javascript: return confirm('Bạn chắc chắn muốn xóa?');\">Delete</a></center></td>";
                    echo '</tr>';
                }
                ?>
            </table>
