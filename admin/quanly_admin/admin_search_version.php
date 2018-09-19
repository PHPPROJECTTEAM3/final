<?php
include_once '../../PRJ_Library/connect_DB.php';
if (isset($_GET["version_search"])) {
    $version_search = $_GET["version_search"];
   $query = "SELECT * FROM `version` WHERE `ver_code` LIKE '%$version_search%'";
    $result = mysqli_query($link, $query);    
}
if (!isset($_GET["version_search"]))
{
    die("Version Not Exist Yet !!!");
}
?>

<table id="myTable" class="tablesorter" style="width: 80%">
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

            </tbody> </table>
