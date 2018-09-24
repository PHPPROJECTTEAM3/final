<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once './HeaderAdmin.php';

if (!isset($_GET["id"])) {
    exit('Chưa Có Mã Đơn Hàng');
}
$id = $_GET["id"];
include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT * FROM `invoice` WHERE `ID` =$id";
$result = mysqli_query($link, $query);
if (!$result) {
    die('Không Tìm Thấy Hóa Đơn');
}
$col = mysqli_fetch_array($result);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="../blue/style2.css" rel="stylesheet" type="text/css"/>
<div class="margin5px">
<h2>Edit Invoice: <?php echo $col[0] ?></h2>
<div style="overflow: hidden">
    <div style="float: left"> 
        <a href="admin_manage_invoice.php" style="text-decoration: none" >Back to Manage Invoice</a>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>   
<form method="get" action="admin_edit_invoice2.php">
    <p>ID Invoice: <?php echo $col[0] ?> <input type="hidden" name="id_invoice" value="<?php echo $col[0] ?>"></p>
    <p>Account: <input type="text" maxlength="15" value="<?php echo $col[1] ?>" name="account" required></p>
    <?php
    $total_product = ($col[2]);
    $leght2 = strlen($total_product);
    $price2 = 0;
    if ($leght2 == 7) {
        $addd = substr_replace($total_product, '.', 1, 0);
        $addd2 = substr_replace($addd, '.', 5, 0);
        $price2 = $addd2;
    }
    if ($leght2 == 8) {
        $addd = substr_replace($total_product, '.', 2, 0);
        $addd2 = substr_replace($addd, '.', 6, 0);
        $price2 = $addd2;
    }
    ?>
    <p>Price: <?php echo $price2 ?> VND</p>
    Note
    <p><textarea name="note" maxlength="500" rows="6" cols="100"><?php echo $col[3] ?></textarea></p>
    <p>Date and Time Order: <input name="date_time_or" type="datetime" value="<?php echo $col[4] ?>" required</p>
    <p>Estimate Date Recive: <input type="date" name="es_date_re" value="<?php echo $col[5] ?>" required></p>
    <p>Deposit: <select name="deposit">
            <option value="<?php echo $col[6] ?>"><?php echo $col[6] ?> (present value)</option>
            <option value="Không">Không</option>
            <option value="50%">50%</option>
            <option value="100%">100%</option>
        </select>

    <p>Status: <select name="status">
           <option value="<?php echo $col[7] ?>"><?php echo $col[7] ?> (present value)</option>
            <option value="Chờ Xác Nhận">Chờ Xác Nhận</option>
            <option value="Đã Xác Nhận">Đã Xác Nhận</option>
            <option value="Đã Nhận Hàng">Đã Nhận Hàng</option>           
            <option value="Đã Hủy">Đã Hủy</option>
            <option value="Khác">Khác</option>
        </select>
        </p>
    <p>Date Receive: <input type="date" name="date_re" value="<?php echo $col[9] ?>" > </p>
    <p>Admin Comfirm: <select name="admin_confirm">

            <?php
            $query2 = "SELECT `acc` FROM `admin`";
            $result2 = mysqli_query($link, $query2);
            $num2 = mysqli_num_rows($result2);
            if ($num2 == 0) {
                echo "<option value='0'>No Data</option>";
                die();
            }
            echo "<option value='$col[8]'>$col[8] (present value
)</option>";
            while ($col2 = mysqli_fetch_array($result2)) {
                echo "<option value='$col2[0]'>$col2[0]</option>";
            }
            mysqli_close($link);
            ?>
        </select>
    <p><input name="bt_edit_invoice" type="submit" value="Edit" class="btn btn-success"></p>
</form>

</div>