<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}

include_once './HeaderAdmin.php';
if (!(isset($_GET["id"]))) {
    header("location:Addproduct.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';

$id = $_GET["id"];
$query = "SELECT * FROM `product` Where id =$id";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}
$row = mysqli_fetch_array($result);

//Lấy ra Brand Name để admin chọn 
$query2 = "SELECT * FROM `brand`";
$result2 = mysqli_query($link, $query2);
if (mysqli_num_rows($result2) == 0) {
    die("Error Brand !!!");
}

//Lấy ra Mã Phiên Bản để admin chọn
$query3 = "SELECT `ver_code` FROM `version`";
$result3 = mysqli_query($link, $query3);
if (mysqli_num_rows($result3) == 0) {
    die("Error Brand !!!");
}
$current_id = $row[0];

$query3 = "SELECT `ver_code` FROM `version`";
?>
<h2>Edit Product ID: <?php echo $id ?></h2>
<div style="overflow: hidden">
    <div style="float: left"> 
        <a href="Addproduct.php" style="text-decoration: none" >Back to Manage Product</a>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>   


<form method="GET" action="edit_pro.php">
    <input type="hidden" name="current_ID" value="<?php echo $current_id ?>" readonly="">
    <p>ID:
        <?php echo $row[0] ?></p>
    <p>Product Name</p>
    <input name="name_pro" type="text" maxlength="50" value="<?php echo $row[1] ?>" required>
    <p>Brand Name</p>
    <select name="brand_pro" >
        <?php
        echo "<option value='$row[2]'>$row[2](default)</option>";
        while ($row2 = mysqli_fetch_array($result2)) {
            echo "<option value='$row2[0]'>$row2[0]</option>";
        }
        ?>
    </select>
    <p>Current Image</p>

    <img src="<?php echo "../../Images/$row[name_brand]/$row[img]" ?>" width=200px height=150px><input name="current_image_pro" type="hidden" value="<?php echo $row[3] ?>">
    <p>New Image</p>
    <input name="new_image_pro" type="file" >
    <p>Version</p>
    <select name="ver_pro">
        <?php
        echo"<option value='$row[4]'>$row[4](default)</option>";
        while ($row3 = mysqli_fetch_array($result3)) {
            echo "<option value='$row3[0]'>$row3[0]</option>";
        }
        ?>
    </select>
    <p>Price</p>
    <input name="price_pro" type="number" maxlength="9" min="500000" value="<?php echo $row[5] ?>" required>
    <p>Quantity Sold</p>
    <input name="a_s_pro" type="number" maxlength="5" value="<?php echo $row[6] ?>" required>
    <p>Launch Date</p>
    <input name="l_date_pro" type="date" value="<?php echo $row[7] ?>">
    <p>Status</p>
    <select name="status">
        <?php
        echo"<option value='$row[8]'>$row[8]</option>";
        if ($row[8] == 'Còn Hàng') {
            echo"<option value='Hết Hàng'>Hết Hàng</option>";
        }
        if ($row[8] == 'Hết Hàng') {
            echo"<option value='Còn Hàng'>Còn Hàng</option>";
        }
        ?>
    </select><br/><br/>
    <input class="btn btn-success" name="edit_pro" type="submit" value="Edit"> 

</form>

</body>
</html>
