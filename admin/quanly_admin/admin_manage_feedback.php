<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}

include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT * FROM `feed_back` ORDER BY `con_rep`";
$result = mysqli_query($link, $query);
?>
<h2>Feedback List</h2>
<div style="overflow: hidden">
    <div style="float: left"> 
        <a href="../product/admin_manage_product.php" style="text-decoration: none" >Back to Manage Product</a>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>   
<center><table border="2" style="width: 90%">
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