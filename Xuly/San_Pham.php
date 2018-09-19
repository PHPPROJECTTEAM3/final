<?php
session_start();
include_once '../PRJ_Library/connect_DB.php';
$result2 = mysqli_query($link, "SELECT `ID`  FROM `product`");
$num = mysqli_num_rows($result2);
$total_records = $num;


$limit = 20;
$count = 0;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
settype($page, "int");
$total_page = ceil($total_records / $limit);

//if ($page > $total_page) {
//    exit();
//}


$start = ($page - 1) * $limit;


$query = "SELECT * FROM `product` ORDER BY `L_Date` DESC LIMIT $start, $limit";

//brand

if (isset($_GET["brand"])) {

    $query = "SELECT * FROM product WHERE `name_brand` like '" . $_GET["brand"] . "' ORDER BY `L_Date` DESC LIMIT $start, $limit";
    if (isset($_GET["duoi_2_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_GET["brand"] . "' AND `price`< 2000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["tu_2_4_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_GET["brand"] . "' AND `price` >= 2000000 AND `price` < 4000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["tu_4_7_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_GET["brand"] . "' AND `price` >= 4000000 AND `price` < 7000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["tu_7_13_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_GET["brand"] . "' AND `price` >= 7000000 AND `price` < 13000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["tren_13_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_GET["brand"] . "' AND `price` > 13000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["SPBC"])) {
        $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_GET["brand"] . "' ORDER BY `a_s` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["GTD"])) {
        $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_GET["brand"] . "' ORDER BY `product`.`price` ASC LIMIT $start, $limit";
    }
    if (isset($_GET["GGD"])) {
        $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_GET["brand"] . "' ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
}



if (!isset($_GET["brand"])) {
    if (isset($_GET["duoi_2_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `price`< 2000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["tu_2_4_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `price` >= 2000000 AND `price` < 4000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["tu_4_7_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `price` >= 4000000 AND `price` < 7000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["tu_7_13_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `price` >= 7000000 AND `price` < 13000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["tren_13_trieu"])) {
        $query = "SELECT * FROM `product` WHERE `price` > 13000000 ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["SPBC"])) {
        $query = "SELECT * FROM `product` ORDER BY `a_s` DESC LIMIT $start, $limit";
    }
    if (isset($_GET["GTD"])) {
        $query = "SELECT * FROM `product` ORDER BY `product`.`price` ASC LIMIT $start, $limit";
    }
    if (isset($_GET["GGD"])) {
        $query = "SELECT * FROM `product` ORDER BY `product`.`price` DESC LIMIT $start, $limit";
    }
}

$result = mysqli_query($link, $query);
$num = mysqli_num_rows($result);
if ($num == 0) {
    die();
}

while ($col = mysqli_fetch_array($result)) {
    $col_half = "";
    if ($count % 5 == 0) {
        $col_half = "col-sm-offset-1";
    }
    ?>
    <div  >
        <div  class="col-sm-2 <?= $col_half ?>">
            <div class="col-sm-12 mobile nopaddingsp" style="margin-top:5%; padding-bottom: 3%;">
                <div class="phone">
                    <img width="120px" height="150px" src="<?php echo "../Images/$col[2]/$col[img]"; ?>"/>
                    <div class="overlay"><!--hover xem chi tiet-->
                        <a href="<?php echo "Thongtinsanpham.php?ID=$col[0]" ?>" class="detailsmb">
                            <i class="fa fa-eye"></i>
                        </a><br/>
                        <?php
                        echo "<div class='id_H' id_sanpham='$col[0]'>";
                        echo "<div class='detailsmb' >";
                        echo "<i class='glyphicon glyphicon-shopping-cart'></i>";
                        echo "</div></div><br/>";
                        ?>
                    </div>
                </div>
                <h5><?php echo "$col[name]"; ?></h5>
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

                <span><strong><?php echo $price ?>₫</strong></span>
            </div>
        </div>

    </div>
    <?php
    $count++;
}
?>


<script>
    $(document).ready(function () {
        $(".id_H").click(function () {
            var id = $(this).attr("id_sanpham");
            $.get("../Code/addproduct.php", {ID: id});
            alert("Thêm Thành Công");
            $.get("../Xuly/cart.php", function (data) {
                $("#count_cart").html(data);
            });
        });
       
    })
</script>
