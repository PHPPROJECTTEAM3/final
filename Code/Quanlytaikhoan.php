<?php
ob_start();
session_start();
$pageTitle = "Tài Khoản";
$activeMenu = "home";
include_once '../PRJ_Library/header.php';
include_once '../PRJ_Library/connect_DB.php';
include_once '../PRJ_Library/data_product.inc';
?>
<div>
    <div class="container" style="padding-bottom: 5%;">
        <div class="row">
            <div class="col-sm-3" style="padding-top: 5%;">
                <ul style="list-style-type: none">
                    <li><button style="margin: 10px; width:200px " id="bt_invoice" class="btn btn-info">Đơn hàng đã đặt</button></li>
                     <li><button style="margin: 10px; width:200px " id="bt_invoice3" class="btn btn-info">Đơn hàng đã nhận</button></li>
                    <li><button style="margin: 10px; width:200px " id="bt_invoice2" class="btn btn-info">Đơn hàng đã hủy</button></li>
                </ul>     
            </div>


            <?php
            if (!isset($_SESSION["username"])) {
                exit('Bặn Chưa Đăng Nhập');
            }
            $acc = $_SESSION["username"];
            ?>
            <!-- Phần Hóa Đơn -->          
            <div class="col-sm-8" style="background-color: white; text-align: center; border-radius:5px; margin-top: 20px;">
                <?php
                $query3 = "SELECT `ac_name`,`ID`,`status`,`es_date_re`,`date_or`  FROM `invoice` WHERE ac_name= '$acc' AND `status` like 'Chờ Xác Nhận' OR `status` like 'Đã Xác Nhận' ORDER BY `date_or` DESC LIMIT 10";
                $result3 = mysqli_query($link, $query3);
                $num = mysqli_num_rows($result3); //Xuất ra thông báo nếu ko có đơn       
                ?>
                <div id="initial_invoice">       
                    <?php
                    if ($num == 0) {
                        echo " <div id='initial_invoice'>";
                        echo "<table class='table table-striped'>";
                        echo '<thead>';
                        echo '<tr>';
                        echo '<td><h3>Mã Đơn Hàng: 0 </h3></td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>STT</th>';
                        echo '<th>Hình Ảnh</th>';
                        echo '<th>Mã Sản Phẩm</th>';
                        echo '<th>Tên Sản phẩm</th>';
                        echo '<th>Số Lượng</th>';
                        echo '<th>Tổng Tiền</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tr><td><h4>Không Có Hóa Đơn</h4></td></tr>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        while ($col = mysqli_fetch_array($result3)) {
                            $num = mysqli_num_rows($result3);
                            $count = 1;
                            ?>
                            <table class="table table-striped">
                                <thead>      
                                    <tr>            
                                        <td><h3 style="width: 200px">Mã Đơn Hàng: <?php echo $col[1]; ?></h3>Tình Trạng: <?php echo $col[2]; ?></td>
                                        <td style="width: 300px; padding-top: 51px"><strong>Ngày Đặt Hàng <?php
                                                $date = new DateTime("$col[4]");
                                                $date_or = $date->format("d-m-Y");
                                                echo $date_or . "<br/>";
                                                ?></strong>
                                            <?php
                                            if ($col[2] == 'Đã Xác Nhận') {
                                                $date = new DateTime("$col[3]");
                                                $es_date = $date->format("d-m-Y");
                                                echo "<strong>Thời Hạn Nhận Hàng: $es_date</strong>";
                                            }
                                            ?>
                                        </td>
                                        <td><div style="margin-top:24%;"><button   id_invoice="<?php echo $col[1]; ?>"  class="btn btn-danger cancel"  data-toggle="modal" data-target="#myModal">Hủy Đơn Hàng</button></div></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%">STT</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <?php
                                $query4 = " SELECT detail_invoice.img, detail_invoice.ID_Pro,detail_invoice.Name_pro,detail_invoice.Quantity_pro,detail_invoice.total 
                                FROM detail_invoice , invoice 
                                WHERE invoice.ID = detail_invoice.ID_Invoice AND invoice.ac_name ='$col[0]' AND invoice.ID =$col[1]";
                                $result4 = mysqli_query($link, $query4);
                                while ($col2 = mysqli_fetch_array($result4)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td ><?php echo $count ?></td>
                                            <?php
                                            $query5 = "SELECT `name_brand` FROM `product` WHERE `ID` LIKE '$col2[1]'";
                                            $result5 = mysqli_query($link, $query5);
                                            $col3 = mysqli_fetch_array($result5);
                                            ?>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><img src="<?php echo "../Images/$col3[0]/$col2[0]"; ?>" width="100px"></a></td>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><?php echo $col2[2] ?></a></td>
                                            <?php
                                            $leght = strlen($col2[4]);
                                            $price = 0;
                                            if ($leght == 7) {
                                                $add = substr_replace($col2[4], '.', 1, 0);
                                                $add2 = substr_replace($add, '.', 5, 0);
                                                $price = $add2;
                                            }
                                            if ($leght == 8) {
                                                $add = substr_replace($col2[4], '.', 2, 0);
                                                $add2 = substr_replace($add, '.', 6, 0);
                                                $price = $add2;
                                            }
                                            ?>
                                            <td><strong><?php echo $col2[3] ?></strong></td>
                                            <td style="color: #c1000c"><strong><?php echo $price ?>₫</strong></td>
                                        </tr>
                                    </tbody> 
                                    <?php
                                    $count++;
                                }
                                ?>
                            </table>
                            <?php
                        }
                    }
                    ?>
                </div>

                <!-- Đơn Hàng Đã Nhận -->
                <div id="initial_invoice3">
                    <?php
                    $query3 = "SELECT `ac_name`,`ID`,`status`,`date_re` FROM `invoice` WHERE ac_name= '$acc' AND `status` like 'Đã Nhận Hàng' ORDER BY `date_or` DESC LIMIT 10";
                    $result3 = mysqli_query($link, $query3);
                    $num = mysqli_num_rows($result3); //Xuất ra thông báo nếu ko có đơn       
                    ?>
                    <?php
                    if ($num == 0) {
                        echo " <div id='initial_invoice'>";
                        echo "<table class='table table-striped'>";
                        echo '<thead>';
                        echo '<tr>';
                        echo '<td><h3>Mã Đơn Hàng: 0 </h3></td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>STT</th>';
                        echo '<th>Hình Ảnh</th>';
                        echo '<th>Mã Sản Phẩm</th>';
                        echo '<th>Tên Sản phẩm</th>';
                        echo '<th>Số Lượng</th>';
                        echo '<th>Tổng Tiền</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tr><td><h4>Không Có Hóa Đơn</h4></td></tr>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        while ($col = mysqli_fetch_array($result3)) {
                            $num = mysqli_num_rows($result3);
                            $count = 1;
                            ?>
                            <table class="table table-striped">
                                <thead>      
                                    <tr>            
                                        <td><h3 style="width: 200px">Mã Đơn Hàng: <?php echo $col[1]; ?></h3></td>
                                        <?php 
                                         $date = new DateTime("$col[3]");
                                        $date_re = $date->format("d-m-Y");
                                        ?>
                                        <td style="width: 250px; padding-top: 50px"><strong>Ngày Nhận Hàng: <?php echo $date_re ?></strong></td>                                       
                                        <td><div style="margin-top:24%;"></div></td>
                                    </tr>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <?php
                                $query4 = " SELECT detail_invoice.img, detail_invoice.ID_Pro,detail_invoice.Name_pro,detail_invoice.Quantity_pro,detail_invoice.total 
                                FROM detail_invoice , invoice 
                                WHERE invoice.ID = detail_invoice.ID_Invoice AND invoice.ac_name ='$col[0]' AND invoice.ID =$col[1]";
                                $result4 = mysqli_query($link, $query4);
                                while ($col2 = mysqli_fetch_array($result4)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <?php
                                            $query5 = "SELECT `name_brand` FROM `product` WHERE `ID` LIKE '$col2[1]'";
                                            $result5 = mysqli_query($link, $query5);
                                            $col3 = mysqli_fetch_array($result5);
                                            ?>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><img src="<?php echo "../Images/$col3[0]/$col2[0]"; ?>" width="100px"></a></td>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><?php echo $col2[2] ?></a></td>
                                            <?php
                                            $leght = strlen($col2[4]);
                                            $price = 0;
                                            if ($leght == 7) {
                                                $add = substr_replace($col2[4], '.', 1, 0);
                                                $add2 = substr_replace($add, '.', 5, 0);
                                                $price = $add2;
                                            }
                                            if ($leght == 8) {
                                                $add = substr_replace($col2[4], '.', 2, 0);
                                                $add2 = substr_replace($add, '.', 6, 0);
                                                $price = $add2;
                                            }
                                            ?>
                                            <td><strong><?php echo $col2[3] ?></strong></td>
                                            <td style="color: #c1000c"><strong><?php echo $price ?>₫</strong></td>
                                        </tr>
                                    </tbody> 
                                    <?php
                                    $count++;
                                }
                                ?>
                            </table>
                            <?php
                        }
                    }
                    ?>
                </div>

                <!-- Hoa Don Đã Hủy -->


                <div id="initial_invoice2">
                    <?php
                    $query3 = "SELECT `ac_name`,`ID`,`status` FROM `invoice` WHERE ac_name= '$acc' AND `status` like 'Đã Hủy' ORDER BY `date_or` DESC LIMIT 10";
                    $result3 = mysqli_query($link, $query3);
                    $num = mysqli_num_rows($result3); //Xuất ra thông báo nếu ko có đơn       
                    ?>
                    <?php
                    if ($num == 0) {
                        echo " <div id='initial_invoice'>";
                        echo "<table class='table table-striped'>";
                        echo '<thead>';
                        echo '<tr>';
                        echo '<td><h3>Mã Đơn Hàng: 0 </h3></td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>STT</th>';
                        echo '<th>Hình Ảnh</th>';
                        echo '<th>Mã Sản Phẩm</th>';
                        echo '<th>Tên Sản phẩm</th>';
                        echo '<th>Số Lượng</th>';
                        echo '<th>Tổng Tiền</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tr><td><h4>Không Có Hóa Đơn</h4></td></tr>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        while ($col = mysqli_fetch_array($result3)) {
                            $num = mysqli_num_rows($result3);
                            $count = 1;
                            ?>
                            <table class="table table-striped">
                                <thead>      
                                    <tr>            
                                        <td><h3 style="width: 200px">Mã Đơn Hàng: <?php echo $col[1]; ?></h3></td>               
                                        <td><div style="margin-top:24%;"></div></td>
                                    </tr>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <?php
                                $query4 = " SELECT detail_invoice.img, detail_invoice.ID_Pro,detail_invoice.Name_pro,detail_invoice.Quantity_pro,detail_invoice.total 
                                FROM detail_invoice , invoice 
                                WHERE invoice.ID = detail_invoice.ID_Invoice AND invoice.ac_name ='$col[0]' AND invoice.ID =$col[1]";
                                $result4 = mysqli_query($link, $query4);
                                while ($col2 = mysqli_fetch_array($result4)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <?php
                                            $query5 = "SELECT `name_brand` FROM `product` WHERE `ID` LIKE '$col2[1]'";
                                            $result5 = mysqli_query($link, $query5);
                                            $col3 = mysqli_fetch_array($result5);
                                            ?>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><img src="<?php echo "../Images/$col3[0]/$col2[0]"; ?>" width="100px"></a></td>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><?php echo $col2[2] ?></a></td>
                                            <?php
                                            $leght = strlen($col2[4]);
                                            $price = 0;
                                            if ($leght == 7) {
                                                $add = substr_replace($col2[4], '.', 1, 0);
                                                $add2 = substr_replace($add, '.', 5, 0);
                                                $price = $add2;
                                            }
                                            if ($leght == 8) {
                                                $add = substr_replace($col2[4], '.', 2, 0);
                                                $add2 = substr_replace($add, '.', 6, 0);
                                                $price = $add2;
                                            }
                                            ?>
                                            <td><strong><?php echo $col2[3] ?></strong></td>
                                            <td style="color: #c1000c"><strong><?php echo $price ?>₫</strong></td>
                                        </tr>
                                    </tbody> 
                                    <?php
                                    $count++;
                                }
                                ?>
                            </table>
                            <?php
                        }
                    }
                    ?>
                </div>

                <!-- End Hóa Đơn -->
                <!-- Phẩn Thông tin Tài Khoản -->
            </div>      
        </div>
    </div>
</div>
<!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">
    <div id="myModal2" class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="id_H" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Lý Do*<br/>
                <select id="choice">
                    <option value="">Chọn Lý Do</option>
                    <option value="Đặt Đơn Hàng Khác">Đặt Đơn Hàng Khác</option>
                    <option value="Đặt Trùng">Đặt Trùng</option>
                    <option value="Không Còn Nhu Cầu">Không Còn Nhu Cầu</option>
                    <option value="Khác">Khác</option>
                </select><br/><br/>

                <textarea id="rs_khac" style="resize: none;height: 100px;width: 100%;display: none"></textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="confirm_cancel" >Xác Nhận</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>

<script language="javascript">
    //Hide Hóa Đơn
    $("#initial_invoice2").hide();
    $("#initial_invoice3").hide();
    // function Hóa Đơn
    $("document").ready(function () {
        $("#bt_invoice").click(function () {
            $("#initial_invoice").toggle();
      
            $("#initial_invoice2").hide();
            $("#initial_invoice3").hide();
            $("#initial_invoice").show();
        })
        
        $("#bt_invoice2").click(function () {
            $("#initial_invoice2").toggle();
         
            $("#initial_invoice").hide();
            $("#initial_invoice3").hide();
            $("#initial_invoice2").show();
        })
        $("#bt_invoice3").click(function () {
            $("#initial_invoice3").toggle();
    
            $("#initial_invoice").hide();
            $("#initial_invoice2").hide();
            $("#initial_invoice3").show();
        });
        
        

        $(".cancel").click(function () {
            var id_invoice = $(this).attr("id_invoice");
            document.getElementById("id_H").innerHTML = 'Lý Do Hủy Đơn Hàng: ' + id_invoice;
            var rs_khac, choice;
            $("#choice").change(function () {
                choice = document.getElementById("choice").value;
                if (choice == 'Khác')
                {
                    $("#rs_khac").css("display", "block");
                }
                if (choice != 'Khác')
                {
                    $("#rs_khac").css("display", "none");
                }
            });

            $("#confirm_cancel").click(function () {
                if (choice == null)
                {
                    alert("Vui Lòng Chọn Lý Do");
                } else if (choice == 'Khác') {
                    rs_khac = document.getElementById("rs_khac").value;

                    if (rs_khac.length == 0)
                    {
                        alert("Vui Lòng Nhập Lý Do");
                    }
                    if (rs_khac.length != 0)
                    {
                        if (confirm("Bạn Có Chắc Muốn Hủy Đơn Hàng?") == true) {

                            $.get("Cancel_invoice.php", {ID: id_invoice, rs_khac: rs_khac}, function (data) {
                                alert(data);
                            });
                            window.location = "Quanlytaikhoan.php";
                        }
                    }

                } else {
                    if (confirm("Bạn Có Chắc Muốn Hủy Đơn Hàng?") == true) {
                        $.get("Cancel_invoice.php", {ID: id_invoice, choice: choice}, function (data) {
                            alert(data);
                        });
                        window.location = "Quanlytaikhoan.php";
                    }
                }
            });
        });

    });
    //End $(document).ready function
</script>

<?php
include_once '../PRJ_Library/footer.html';
mysqli_close($link);
?>"