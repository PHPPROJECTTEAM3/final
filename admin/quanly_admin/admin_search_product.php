
<?php
include_once '../../PRJ_Library/connect_DB.php';

if (!(isset($_GET["id_search"])) && !(isset($_GET["name_search"])))
{
    die("ID or Name of Product not exist yet!!!");
}
if (isset($_GET["id_search"])) {
    $id_search = $_GET["id_search"];
    $query = "SELECT * FROM `product` WHERE `ID` = $id_search";
    $result = mysqli_query($link, $query);
    if ($_GET["id_search"] == NULL) {
        die('Enter ID Product');
    }
    if (isset($_GET["name_search"])) {
        unset($_GET["name_search"]);
    }
}

if (isset($_GET["name_search"])) {
    $name_search = $_GET["name_search"];
    $query = "SELECT * FROM `product` WHERE `name` LIKE '%$name_search%'";
    if (isset($_GET["id_search"])) {
        unset($_GET["id_search"]);
    }
}
 

$result = mysqli_query($link, $query);
?>
<table id="myTable" class="tablesorter" > 
    <thead> 
        <tr>
            <th style="width: 4%">ID</th>
            <th >Name</th>
            <th >Brand</th>
            <th >Image</th>
            <th >Version</th>
            <th >Price (VND)</th>
            <th >Quantity Sold</th>
            <th >Launch Date</th>
            <th colspan="2">....</th>
        </tr>
    </thead> 

    <tbody>

<?php
if (mysqli_num_rows($result) == 0) {
    echo "<tr><td><h3>No Data</h3</td></tr>";
    mysqli_close($link);
    exit();
}
while ($row = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td><center>$row[0]</center></td>";
    echo "<td><center>$row[1]</center></td>";
    echo "<td><center>$row[2]</center></td>";
    echo "<td><center><img src='../../Images/$row[name_brand]/$row[img]' height='130px'></center></td>";
    echo "<td><center>$row[4]</center></td>";
    $leght = strlen($row[5]);
    $price = 0;
    if ($leght == 7) {
        $add = substr_replace($row[5], '.', 1, 0);
        $add2 = substr_replace($add, '.', 5, 0);
        $price = $add2;
    }
    if ($leght == 8) {
        $add = substr_replace($row[5], '.', 2, 0);
        $add2 = substr_replace($add, '.', 6, 0);
        $price = $add2;
    }

    echo "<td><center>$price</center></td>";
    echo "<td><center>$row[6]</center></td>";
    echo "<td><center>$row[7]</center></td>";
    echo "<td><center><a href='admin_edit_product.php?id=$row[0]'>Edit</a></center></td>";
    echo "<td><center><a href='admin_delete_product.php?id=$row[0]' onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
    echo "</tr>";
}
?>
    </tbody>
</table>
