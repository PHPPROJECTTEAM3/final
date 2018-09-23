<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once './HeaderAdmin.php';
include_once '../../PRJ_Library/connect_DB.php';

// mếu product ko có sản phẩm sẽ bị lỗi
// Lấy ID từ DB
$query = "SELECT `ID` FROM `product`";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("Error ID !!!");
}
while ($row = mysqli_fetch_array($result)) {
    $id_produt[] = $row[0];
}
$grater = max($id_produt);

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
    die("Error Version !!!");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link href="../blue/style2.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body class="margin5px">
        <h2>Add Product</h2>
        <hr/>
        <form>
            <p>ID</p>
            <input name="id_pro" value="<?php echo $grater + 1 ?>" > <!-- tự động tăng khỏi nhập -->
            <p>Product Name</p>
            <input name="name_pro" type="text" maxlength="50" required>
            <p>Brand Name</p>
            <select name="brand_pro" >
                <?php
                while ($row2 = mysqli_fetch_array($result2)) {
                    echo "<option value='$row2[0]'>$row2[0]</option>";
                }
                ?>
            </select>
            <p>Image</p>
            <input name="image_pro" type="file" required>
            <p>Version</p>
            <select name="ver_pro">
                <?php
                while ($row3 = mysqli_fetch_array($result3)) {
                    echo "<option value='$row3[0]'>$row3[0]</option>";
                }
                ?>
            </select>
            <p>Price</p>
            <input name="price_pro" type="number" maxlength="9" min="500000" value="500000" required>
            <p>Amount Sold</p>
            <input name="a_s_pro" type="number" maxlength="3" value="0">
            <p>Launch Date</p>
            <input name="l_date_pro" type="date">
            <p>Status</p>
            <select name="status_pro">
                <option value="Còn Hàng">Còn Hàng</option>
                <option value="Hết Hàng">Hết Hàng</option>
            </select><br><br>
            <input class="btn btn-success" name="bt_add" type="submit"> 

        </form>

        <?php
        if (isset($_GET["bt_add"])) {
            $id_pro = $_GET["id_pro"];
            $name_pro = $_GET["name_pro"];
            $brand_pro = $_GET["brand_pro"];
            $image_pro = $_GET["image_pro"];
            $ver_pro = $_GET["ver_pro"];
            $price_pro = $_GET["price_pro"];
            $a_s_pro = $_GET["a_s_pro"];
            $l_date_pro = $_GET["l_date_pro"];
            $status_pro = $_GET["status_pro"];
            $query4 = "INSERT INTO `product`(`ID`, `name`, `name_brand`, `img`, `ver`, `price`, `a_s`, `L_Date`,`status`) VALUES ('$id_pro','$name_pro','$brand_pro','$image_pro','$ver_pro',$price_pro,$a_s_pro,'$l_date_pro','$status_pro')";
            $result4 = mysqli_query($link, $query4);

            if (!($result4)) {
                die("Add Product Faile !!!");
            } else {
                echo 'Add Product Success !!!';
            }
        }
        ?>
       
        <p><a href="Addproduct.php">Back to Manage Product</a></p>
         <?php mysqli_close($link);
         exit(); ?>
    </body>
</html>
