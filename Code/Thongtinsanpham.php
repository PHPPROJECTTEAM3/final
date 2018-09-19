

<?php
include_once '../PRJ_Library/data_product.inc';
session_start();
$pageTitle = "ThongTinSanPham";
$activeMenu = "home";
include_once '../PRJ_Library/header.php';
?>



<?php
if (!isset($_GET["ID"])) {
   
    exit();
}
$ID = $_GET["ID"];
$query = "SELECT * FROM `product` WHERE ID = $ID";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}
$col = mysqli_fetch_array($result);
?>



<div style="background-color:#fff ">
    <div class="container" style="padding-bottom: 10%;">
        <div class="row" style="margin: 3%">
            <p style="font-size: 20px ;border-bottom: #cccccc 1px solid;color: #288ad6"><strong>Điện thoại <?php echo $col[1] ?></strong></p>
            <div style="overflow: hidden; margin: 0%">
                <div style="float: left; margin-left: 20px;"> 
                    <img src="<?php echo "../Images/$col[2]/$col[img]" ?>" width="450px" height="500px"/>
                </div>
                <div style="float: left; margin-left: 30px; margin-top: 5%;margin-right: 35px">
                    <p style="font-size: 18px;"><strong>Thương Hiệu: <?php echo $col[2] ?></strong></p>
                    <?php
                    $date = date_create($col[7]);
                    $datee = date_format($date, "d/m/Y");
                    ?>
                    <p style="font-size: 16px"><strong>Ngày Ra Mắt: <?php echo $datee ?></strong></p>
                    <?php
                    $leght = strlen($col[5]);
                    $price = 0;
                    if ($leght == 7) {
                        $add = substr_replace($col[5], '.', 1, 0);
                        $add2 = substr_replace($add, '.', 5, 0);
                        $price = $add2;
                    }
                    if ($leght == 8) {
                        $add = substr_replace($col[5], '.', 2, 0);
                        $add2 = substr_replace($add, '.', 6, 0);
                        $price = $add2;
                    }
                    ?>
                    <p class="price2"><strong>Giá: <?php echo $price ?>₫</strong></p><br/><br/>
                    <p> <a style="text-decoration: none; width: 210px;" href="<?php echo "addproduct.php?ID=$col[0]" ?>" class="buy_now">Thêm Vào Giỏ Hàng</a></p>

                </div> 
                <div style="float: left; margin-top: 5%">

                    <ul class="policy">
                        <li class="inpr">
                            Cam kết hàng chính hãng
                        </li>
                        <li class="wrpr">
                            Bảo hành chính hãng 12 tháng<br/>
                            <a href="#">Xem chi tiết</a>
                        </li>
                        <li class="wrpr">
                            <strong>1 đổi 1 trong 1 tháng</strong> nếu lỗi,<br> đổi sản phẩm tại nhà trong 1 ngày.
                        </li>

                    </ul>

                </div>

            </div>
            <div style="font-size: 25px">
                <p><center><strong>Thông Số Chi Tiết Của Sản Phẩm</strong></center></p>
                <p><center><iframe src="<?php echo "../PDF/$col[2]/$col[4]" ?> " 
                                   style="width:80%; height:500px;" frameborder="0"></iframe></center></p>

            </div>
            <div style="margin-top: 3% ">
                <p style="font-size: 20px">Các Sản Phẩm Khác</p>
                <div style=" width: 100%">

                    <?php
                    $query2 = "SELECT * FROM `product` Where `ID` != $col[0]";
                    $result2 = mysqli_query($link, $query2);
                    $num2 = mysqli_num_rows($result2);
                    if ($num2 == 0) {
                        die("No Data");
                    }
                    $count = 0;

                    while ($col2 = mysqli_fetch_array($result2)) {
                        echo "";
                        $price_search = ($col2[5] - $col[5]);

                        if ($price_search < -1000000 || $price_search > 1000000) {

                            continue;
                        } else {
                            $count++;
                        }

                        $leght = strlen($col2[5]);
                        $price2 = 0;
                        if ($leght == 7) {
                            $addd = substr_replace($col2[5], '.', 1, 0);
                            $addd2 = substr_replace($addd, '.', 5, 0);
                            $price2 = $addd2;
                        }
                        if ($leght == 8) {
                            $addd = substr_replace($col2[5], '.', 2, 0);
                            $addd2 = substr_replace($addd, '.', 6, 0);
                            $price2 = $addd2;
                        }
                        ?>
                        <div style="float: left; width: 20%;font-size: 16px">
                            <center><a href="<?php echo "Thongtinsanpham.php?ID=$col2[0]" ?>"><img src="<?php echo "../Images/$col2[2]/$col2[img]" ?>" width="100%" height="250px" ></a></center>
                            <center><p><a href="<?php echo "Thongtinsanpham.php?ID=$col2[0]" ?>"><strong><?php echo $col2[1] ?></strong></a></p></center>
                            <center><p class="price2"><strong><?php echo $price2 ?>₫</strong></p></center>
                        </div>
                        <?php
                        if ($count == 4) {
                            break;
                        }
                    }
                    ?>
                </div>      



            </div>
        </div>
    </div>




<?php
include_once '../PRJ_Library/footer.html';
?>