
<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';

if (!(isset($_GET["id_search"])) && !(isset($_GET["acc_search"])))
{
    die("ID or Name of Product not exist !!!");
}
if (isset($_GET["id_search"])) {
    $id_search = $_GET["id_search"];
    $query = "SELECT * FROM `cancel_invoice` WHERE `ID_invoice` = $id_search";
    
    if ($_GET["id_search"] == NULL) {
        die("Enter ID");
    }
    if (isset($_GET["acc_search"])) {
        unset($_GET["acc_search"]);
    }
}

if (isset($_GET["acc_search"])) {
    $acc_search = $_GET["acc_search"];
    $query = "SELECT * FROM `cancel_invoice` WHERE `Member` LIKE '%$acc_search%'";
    if (isset($_GET["id_search"])) {
        unset($_GET["id_search"]);
    }
}
$result = mysqli_query($link, $query);
?>
<table id="myTable" class="tablesorter">
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
                echo "<td><center><a href='admin_edit_brand.php?id=$row[0]'>Edit</a></center></td>";
                echo "<td><center><a href='admin_delete_brand.php?id=$row[0]'onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
