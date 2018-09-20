<?php

include_once '../PRJ_Library/connect_DB.php';
?>

<?php

if (isset($_GET["name_pro"])) {
    $name_pro = $_GET["name_pro"];
    $query = "SELECT * FROM `product` WHERE `name` LIKE '%$name_pro%' LIMIT 5";
    $result = mysqli_query($link, $query);
    if($_GET["name_pro"]==NULL)
    {
        die();
    }
}
while($col = mysqli_fetch_array($result))
{
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
    echo "<li><a href='Thongtinsanpham.php?ID=$col[0]'><img src='../Images/$col[2]/$col[3]' width='50px'><p>$col[1]<br/><br/>$price ₫</p></a></li>";
}
?>
