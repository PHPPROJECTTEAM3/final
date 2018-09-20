<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
if (isset($_GET["member_search"])) {
    $member_search = $_GET["member_search"];
   $query = "SELECT * FROM `member` WHERE `acc` LIKE '%$member_search%'";
    $result = mysqli_query($link, $query);    
}

?>

<table id="myTable" class="tablesorter" style="width: 80%">
            <thead>
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
                while ($col = mysqli_fetch_array($result)) {
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

            </tbody> </table>
