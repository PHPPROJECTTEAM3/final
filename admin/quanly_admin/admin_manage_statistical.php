<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once './HeaderAdmin.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");
include_once '../../PRJ_Library/connect_DB.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../blue/style.css" rel="stylesheet" type="text/css"/>
 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="../jquery-latest.js" type="text/javascript"></script>
        <script src="../jquery.tablesorter.js" type="text/javascript"></script>
      
    </head>
    <body class="margin5px">
       <h2>Statistical</h2>
<div style="overflow: hidden">
    <div style="float: left"> 
        <a href="admin_manage_invoice.php" style="text-decoration: none" >Back to Manage Invoice</a>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>  
<form>
    <p>
        <input class="btn btn-info active" name="current_month" type="submit" value="Invoice In Current Month">
        <input class="btn btn-info active" style="margin-left: 50px" name="current_year" type="submit" value="Invoice In Current Year">
        <input class="btn btn-info active" style="margin-left: 50px" name="option_bt" type="submit" value="Option"> 
    </p>
</form>


<!-- 1-->

<?php
if (isset($_GET["current_month"])) {
    $query = "SELECT * FROM `invoice`";
    $result = mysqli_query($link, $query);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        die('No data');
    }
    $month_now = date("m");
    $year_now2 = date("Y");
    $year_now = date("y");
    ?>
    <center><h3>Invoice in Month: <?php echo $month_now ?> Year: <?php echo $year_now2 ?></h3></center>
    <center><table style="width: 80%" id="myTable" class="tablesorter">
            <thead>
            <tr>
                <th >ID</th>
                <th >Account</th>
                <th >Total (VNĐ)</th>
                <th >Date Order</th>                        
                <th >Status</th>   
            </tr>
            
            </thead>
            <tbody>
            <?php
            $count = 0;

            while ($col = mysqli_fetch_array($result)) {

                $month_order = date("m", strtotime($col[4]));

                $year_order = date("y", strtotime($col[4]));
                if ($month_now == $month_order && $year_now == $year_order) {
                    echo "<tr>";
                    echo "<td><center>$col[0]</center></td>";
                    echo "<td><center>$col[1]</center></td>";
                    $leght = strlen($col[2]);
                    $price = 0;
                    if ($leght == 7) {
                        $add = substr_replace($col[2], '.', 1, 0);
                        $add2 = substr_replace($add, '.', 5, 0);
                        $price = $add2;
                    }
                    if ($leght == 8) {
                        $add = substr_replace($col[2], '.', 2, 0);
                        $add2 = substr_replace($add, '.', 6, 0);
                        $price = $add2;
                    }
                    echo "<td><center>$price</center></td>";

                    echo "<td><center>$col[4]</center></td>";
                    echo "<td><center>$col[7]</center></td>";
                    echo "</tr>";

                    $count++;
                } else {
                    continue;
                }
            }
            echo "<tbody></table></center>";
            echo "<center><p>Total Invoice: <strong>$count</strong> </p></center><br/>";
            ?>


            <center><h3>Invoice Has Been Receive And Paid in Month: <?php echo $month_now ?> Year: <?php echo $year_now2 ?></h3></center>
            <center><table id="myTable2" class="tablesorter" style="width: 80%">
                    <thead>
                    <tr>
                        <th >ID</th>
                        <th >Account</th>
                        <th >Total (VND)</th>
                        <th >Date Order</th>                        
                        <th >Status</th>   
                        <th >Date Receive</th>   
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count2 = 0;
                    $totall = 0;
                    $query2 = "SELECT * FROM `invoice`";
                    $result2 = mysqli_query($link, $query);
                    while ($col2 = mysqli_fetch_array($result2)) {

                        $month_order2 = date("m", strtotime($col2[4]));

                        $year_order2 = date("y", strtotime($col2[4]));
                        if ($month_now == $month_order2 && $year_now == $year_order2 && $col2[7] == 'Đã Nhận Hàng') {
                            echo "<tr>";
                            echo "<td><center>$col2[0]</center></td>";
                            echo "<td><center>$col2[1]</center></td>";
                            $leght = strlen($col2[2]);
                            $price = 0;
                            if ($leght == 7) {
                                $add = substr_replace($col2[2], '.', 1, 0);
                                $add2 = substr_replace($add, '.', 5, 0);
                                $price = $add2;
                            }
                            if ($leght == 8) {
                                $add = substr_replace($col2[2], '.', 2, 0);
                                $add2 = substr_replace($add, '.', 6, 0);
                                $price = $add2;
                            }
                            echo "<td><center>$price</center></td>";

                            echo "<td><center>$col2[4]</center></td>";
                            echo "<td><center>$col2[7]</center></td>";
                            echo "<td><center>$col2[9]</center></td>";
                            echo "</tr>";

                            $count2++;
                            $totall += $col2[2];
                        } else {
                            continue;
                        }
                    }
                    echo "</tbody></table></center>";
                    $leght2 = strlen($totall);
                    $price2 = 0;
                    if ($leght2 == 7) {
                        $add3 = substr_replace($totall, '.', 1, 0);
                        $add4 = substr_replace($add3, '.', 5, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 8) {
                        $add3 = substr_replace($totall, '.', 2, 0);
                        $add4 = substr_replace($add3, '.', 6, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 9) {
                        $add3 = substr_replace($totall, '.', 3, 0);
                        $add4 = substr_replace($add3, '.', 7, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 10) {
                        $add3 = substr_replace($totall, '.', 4, 0);
                        $add4 = substr_replace($add3, '.', 8, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 11) {
                        $add3 = substr_replace($totall, '.', 5, 0);
                        $add4 = substr_replace($add3, '.', 9, 0);
                        $price2 = $add4;
                    }
                    echo "<center><p>Total Invoice: <strong>$count2</strong> <br/> Total Revenue: <strong>$price2</strong>    VNĐ</p></center><br/>";
                }
                ?>

                        <!-- end 1 -->
                        

                <!-- Xử lý hóa đơn năm hiện tại -->
                <?php
                if (isset($_GET["current_year"])) {
                    $query = "SELECT * FROM `invoice`";
                    $result = mysqli_query($link, $query);
                    $num = mysqli_num_rows($result);
                    if ($num == 0) {
                        die('No data');
                    }

                    $year_now2 = date("Y");
                    $year_now = date("y");
                    ?>
                    <center><h3>Invoice in Year: <?php echo $year_now2 ?></h3></center>
                    <center><table id="myTable" class="tablesorter" style="width: 80%">
                            <thead>
                            <tr>
                                <th >ID</th>
                                <th >Account</th>
                                <th >Total (VND)</th>
                                <th >Date Order</th>                        
                                <th >Status</th>   
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;

                            while ($col = mysqli_fetch_array($result)) {



                                $year_order = date("y", strtotime($col[4]));
                                if ($year_now == $year_order) {
                                    echo "<tr>";
                                    echo "<td><center>$col[0]</center></td>";
                                    echo "<td><center>$col[1]</center></td>";
                                    $leght = strlen($col[2]);
                                    $price = 0;
                                    if ($leght == 7) {
                                        $add = substr_replace($col[2], '.', 1, 0);
                                        $add2 = substr_replace($add, '.', 5, 0);
                                        $price = $add2;
                                    }
                                    if ($leght == 8) {
                                        $add = substr_replace($col[2], '.', 2, 0);
                                        $add2 = substr_replace($add, '.', 6, 0);
                                        $price = $add2;
                                    }
                                    echo "<td><center>$price</center></td>";

                                    echo "<td><center>$col[4]</center></td>";
                                    echo "<td><center>$col[7]</center></td>";
                                    echo "</tr>";

                                    $count++;
                                } else {
                                    continue;
                                }
                            }
                            echo "<tbody></table></center>";
                            echo "<center><p>Total Invoice: <strong>$count</strong> </p></center><br/>";
                            ?>


                            <center><h3>Invoice Has Been Receive And Paid In Year: <?php echo $year_now2 ?></h3></center>
                            <center><table id="myTable2" class="tablesorter" style="width: 80%">
                                    <thead>
                                    <tr>
                                        <th >ID</th>
                                        <th >Account</th>
                                        <th >Total (VND)</th>
                                        <th >Date Order</th>                        
                                        <th >Status</th>   
                                        <th >Date Receive</th>   
                                    </tr>
                                    <thead>
                                    <tbody>
                                    <?php
                                    $count2 = 0;
                                    $totall = 0;
                                    $query2 = "SELECT * FROM `invoice`";
                                    $result2 = mysqli_query($link, $query2);
                                    while ($col2 = mysqli_fetch_array($result2)) {

                                        $month_order2 = date("m", strtotime($col2[4]));

                                        $year_order2 = date("y", strtotime($col2[4]));
                                        if ($year_now == $year_order2 && $col2[7] == 'Đã Nhận Hàng') {
                                            echo "<tr>";
                                            echo "<td><center>$col2[0]</center></td>";
                                            echo "<td><center>$col2[1]</center></td>";
                                            $leght = strlen($col2[2]);
                                            $price = 0;
                                            if ($leght == 7) {
                                                $add = substr_replace($col2[2], '.', 1, 0);
                                                $add2 = substr_replace($add, '.', 5, 0);
                                                $price = $add2;
                                            }
                                            if ($leght == 8) {
                                                $add = substr_replace($col2[2], '.', 2, 0);
                                                $add2 = substr_replace($add, '.', 6, 0);
                                                $price = $add2;
                                            }
                                            echo "<td><center>$price</center></td>";

                                            echo "<td><center>$col2[4]</center></td>";
                                            echo "<td><center>$col2[7]</center></td>";
                                            echo "<td><center>$col2[9]</center></td>";
                                            echo "</tr>";

                                            $count2++;
                                            $totall += $col2[2];
                                        } else {
                                            continue;
                                        }
                                    }
                                    ?>
                                    </tbody></table></center>
                            <?php
                            $leght2 = strlen($totall);
                            $price2 = 0;
                            if ($leght2 == 7) {
                                $add3 = substr_replace($totall, '.', 1, 0);
                                $add4 = substr_replace($add3, '.', 5, 0);
                                $price2 = $add4;
                            }
                            if ($leght2 == 8) {
                                $add3 = substr_replace($totall, '.', 2, 0);
                                $add4 = substr_replace($add3, '.', 6, 0);
                                $price2 = $add4;
                            }
                            if ($leght2 == 9) {
                                $add3 = substr_replace($totall, '.', 3, 0);
                                $add4 = substr_replace($add3, '.', 7, 0);
                                $price2 = $add4;
                            }
                            if ($leght2 == 10) {
                                $add3 = substr_replace($totall, '.', 4, 0);
                                $add4 = substr_replace($add3, '.', 8, 0);
                                $price2 = $add4;
                            }
                            if ($leght2 == 11) {
                                $add3 = substr_replace($totall, '.', 5, 0);
                                $add4 = substr_replace($add3, '.', 9, 0);
                                $price2 = $add4;
                            }
                            echo "<center><p>Total Invoice: <strong>$count2</strong> <br/>Total Revenue: <strong>$price2</strong>    VNĐ</p></center><br/>";
                        }
                        ?>


                        <!-- Chọn Option -->  
                        <?php
                        if (isset($_GET["option_bt"])) {
                            $now = date("Y-m-d");
                            ?>
                            <form>
                                <center><p>Your Option: <input name="option" type="date" required value="<?php echo $now ?>"  max="<?php echo $now ?>"> <input name="bt_option" type="submit" value="Choice" class="btn btn-success"></p></center>
                            </form>
                            </div>
                            <?php
                        }
                        ?>

                        <!-- xử lý option -->  

                        <?php
                        if (isset($_GET["bt_option"])) {

                            $option = $_GET["option"];
                           

                            $query = "SELECT * FROM `invoice`";
                            $result = mysqli_query($link, $query);
                            $num = mysqli_num_rows($result);
                            if ($num == 0) {
                                die('No data');
                            }
                            $day_now = date("d", strtotime($option));
                            $month_now = date("m", strtotime($option));
                            $year_now = date("y", strtotime($option));
                            ?>
                            <center><h3>Invoice in <?php echo $option ?></h3></center>
                            <center><table id="myTable" class="tablesorter" style="width: 80%">
                                    <thead>
                                    <tr>
                                        <th >ID</th>
                                        <th >Account</th>
                                        <th >Total (VND)</th>
                                        <th >Date Order</th>                        
                                        <th >Status</th>   
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 0;

                                    while ($col = mysqli_fetch_array($result)) {

                                        $month_order = date("m", strtotime($col[4]));
                                        $year_order = date("y", strtotime($col[4]));
                                        $day_order = date("d", strtotime($col[4]));
                                        if ($month_now == $month_order && $year_now == $year_order && $day_now == $day_order) {
                                            echo "<tr>";
                                            echo "<td><center>$col[0]</center></td>";
                                            echo "<td><center>$col[1]</center></td>";
                                            $leght = strlen($col[2]);
                                            $price = 0;
                                            if ($leght == 7) {
                                                $add = substr_replace($col[2], '.', 1, 0);
                                                $add2 = substr_replace($add, '.', 5, 0);
                                                $price = $add2;
                                            }
                                            if ($leght == 8) {
                                                $add = substr_replace($col[2], '.', 2, 0);
                                                $add2 = substr_replace($add, '.', 6, 0);
                                                $price = $add2;
                                            }
                                            echo "<td><center>$price </center></td>";
                                            echo "<td><center>$col[4]</center></td>";
                                            echo "<td><center>$col[7]</center></td>";
                                            echo "</tr>";

                                            $count++;
                                        } else {
                                            continue;
                                        }
                                    }
                                    echo "<tbody></table></center>";
                                    echo "<center><p>Total Invoice: <strong>$count</strong> </p></center><br/>";
                                    ?>


                                    <center><h3>Invoice Has Been Receive And Paid In Date: <?php echo $option ?> </h3></center>
                                    <center><table id="myTable2" class="tablesorter" style="width: 80%">
                                            <thead>
                                            <tr>
                                                <th >ID</th>
                                                <th >Account</th>
                                                <th >Total (VND)</th>
                                                <th >Date Order</th>                        
                                                <th >Status</th>   
                                                <th >Date Receive</th>   
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count2 = 0;
                                            $totall = 0;
                                            $query2 = "SELECT * FROM `invoice`";
                                            $result2 = mysqli_query($link, $query2);
                                            $num2 = mysqli_num_rows($result2);
                                            if ($num2 == 0) {
                                                die("no Data");
                                            }

                                            while ($col2 = mysqli_fetch_array($result2)) {

                                                $month_order2 = date("m", strtotime($col2[4]));
                                                $day_order2 = date("d", strtotime($col2[4]));
                                                $year_order2 = date("y", strtotime($col2[4]));
                                                if ($year_now == $year_order2 && $month_order2== $month_now && $day_order2== $day_now && $col2[7] == 'Đã Nhận Hàng') {
                                                    echo "<tr>";
                                                    echo "<td><center>$col2[0]</center></td>";
                                                    echo "<td><center>$col2[1]</center></td>";
                                                    $leght = strlen($col2[2]);
                                                    $price = 0;
                                                    if ($leght == 7) {
                                                        $add = substr_replace($col2[2], '.', 1, 0);
                                                        $add2 = substr_replace($add, '.', 5, 0);
                                                        $price = $add2;
                                                    }
                                                    if ($leght == 8) {
                                                        $add = substr_replace($col2[2], '.', 2, 0);
                                                        $add2 = substr_replace($add, '.', 6, 0);
                                                        $price = $add2;
                                                    }
                                                    echo "<td><center>$price</center></td>";

                                                    echo "<td><center>$col2[4]</center></td>";
                                                    echo "<td><center>$col2[7]</center></td>";
                                                    echo "<td><center>$col2[9]</center></td>";
                                                    echo "</tr>";

                                                    $count2++;
                                                    $totall += $col2[2];
                                                } else {
                                                    continue;
                                                }
                                            }
                                            ?>
                                            <tbody></table></center>
                                    <?php
                                    $leght2 = strlen($totall);
                                    $price2 = 0;
                                    if ($leght2 == 7) {
                                        $add3 = substr_replace($totall, '.', 1, 0);
                                        $add4 = substr_replace($add3, '.', 5, 0);
                                        $price2 = $add4;
                                    }
                                    if ($leght2 == 8) {
                                        $add3 = substr_replace($totall, '.', 2, 0);
                                        $add4 = substr_replace($add3, '.', 6, 0);
                                        $price2 = $add4;
                                    }
                                    if ($leght2 == 9) {
                                        $add3 = substr_replace($totall, '.', 3, 0);
                                        $add4 = substr_replace($add3, '.', 7, 0);
                                        $price2 = $add4;
                                    }
                                    if ($leght2 == 10) {
                                        $add3 = substr_replace($totall, '.', 4, 0);
                                        $add4 = substr_replace($add3, '.', 8, 0);
                                        $price2 = $add4;
                                    }
                                    if ($leght2 == 11) {
                                        $add3 = substr_replace($totall, '.', 5, 0);
                                        $add4 = substr_replace($add3, '.', 9, 0);
                                        $price2 = $add4;
                                    }
                                    echo "<center><p>Total Invoice: <strong>$count2</strong> <br/>Total Revenue: <strong>$price2</strong>    VNĐ</p></center><br/>";
                                }
                                ?>
                                     <script type="text/javascript">
            $(document).ready(function ()
            {
                $("#myTable").tablesorter();
$("#myTable2").tablesorter();

            }
            );
        </script>
        <?php 
    mysqli_close($link);
    exit();
        ?>
    </body>
</html>
