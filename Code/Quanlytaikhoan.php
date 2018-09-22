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
                    <li><button style="margin: 10px" id="bt_profile" class="btn btn-info"><i class="fa fa-eye" style="color: black;"></i>Thông tin tài khoản</button></li>
                    <li><button style="margin: 10px" id="bt_invoice" class="btn btn-info">Quản lí đơn hàng</button></li>
                     <li><button style="margin: 10px" id="bt_invoice2" class="btn btn-info">Đơn hàng đã hủy</button></li>
                     
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
                $query3 = "SELECT `ac_name`,`ID`,`status` FROM `invoice` WHERE ac_name= '$acc' AND `status` not like 'Đã Hủy'";
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
                   
                                        <td><div style="margin-top:24%;"><button  id_invoice="<?php echo $col[1]; ?>"  class="btn btn-danger cancel"  data-toggle="modal" data-target="#myModal">Hủy Đơn Hàng</button></div></td>
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
                                            <?php $query5 = "SELECT `name_brand` FROM `product` WHERE `ID` LIKE '$col2[1]'";
                                                    $result5= mysqli_query($link, $query5);
                                                    $col3= mysqli_fetch_array($result5);
                                                    ?>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><img src="<?php echo "../Images/$col3[0]/$col2[0]"; ?>" width="100px"></a></td>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><?php echo $col2[2] ?></a></td>
                                            <?php
                                            $leght = strlen($col2[4]);
                                            $price = 0;
                                            if ($leght == 7) {
                                                $add = substr_replace( $col2[4], '.', 1, 0);
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
                $query3 = "SELECT `ac_name`,`ID`,`status` FROM `invoice` WHERE ac_name= '$acc' AND `status` like 'Đã Hủy'";
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
                                        <td><h3 style="width: 200px">Mã Đơn Hàng: <?php echo $col[1]; ?></h3>Tình Trạng: <?php echo $col[2]; ?></td>
                                           <?php 
                                        $style ="";
                                        if($col[2] == 'Đã Hủy')
                                        {
                                             $style = "style='display:none;'";
                                            
                                        }
                                        ?>
                                        <td><div style="margin-top:24%;"><button  id_invoice="<?php echo $col[1]; ?>"  <?php echo $style;?> class="btn btn-danger cancel" data-toggle="modal" data-target="#myModal">Hủy Đơn Hàng</button></div></td>
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
                                            <?php $query5 = "SELECT `name_brand` FROM `product` WHERE `ID` LIKE '$col2[1]'";
                                                    $result5= mysqli_query($link, $query5);
                                                    $col3= mysqli_fetch_array($result5);
                                                    ?>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><img src="<?php echo "../Images/$col3[0]/$col2[0]"; ?>" width="100px"></a></td>
                                            <td><a href="<?php echo "Thongtinsanpham.php?ID=$col2[1]" ?>" class="listchr"><?php echo $col2[2] ?></a></td>
                                            <?php
                                            $leght = strlen($col2[4]);
                                            $price = 0;
                                            if ($leght == 7) {
                                                $add = substr_replace( $col2[4], '.', 1, 0);
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
                <div id="profile">

                    <?php
                    $query = "SELECT * FROM `member` WHERE `acc` LIKE '$acc'";
                    $result5 = mysqli_query($link, $query);

                    $col = mysqli_fetch_array($result5);
                    ?>  

                    <form method="POST">                      
                        <table class="table table-striped">
                            <thead>   
                                <tr>
                                    <th style="text-align: center; color: cadetblue;"><h2>Thông Tin Tài Khoản</h2></th>
                                </tr>
                            </thead>

                            <tbody style="width: 100%;">
                                <tr>
                                    <td> <div class="groupcntt"><label>Họ và Tên Đệm</label> 
                                            <input class="cntt" name="L_Name_profile" type="text" maxlength="30" required value="<?php echo $col['l_name']; ?>"></div></td>

                                </tr>
                                <tr> <td>
                                        <div class="groupcntt"><label>Tên</label>
                                            <input class="cntt" name="F_Name_profile" type="text" maxlength="20" required value="<?php echo $col['f_name']; ?>"></div></td></tr>
                                <tr>
                                    <td><div class="groupcntt"><label>Số Điện Thoại</label>
                                            <input class="cntt" name="Phone_profile" type="tel" maxlength="10" required value="0<?php echo $col['phone']; ?>"></div></td>
                                </tr>
                                <tr>
                                    <td><div class="groupcntt"><label>Địa Chỉ Email</label>
                                            <input class="cntt" name="Email_profile" type="email" maxlength="50" readonly required value="<?php echo $col['mail']; ?>"></div></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="groupcntt"> <label>Giới Tính</label>
                                            <select class="cnttop" name="Gender_profile">
                                                <option value="<?php echo $col['gender']; ?>"><?php echo $col['gender'] . ' (Đã Chọn)' ?></option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select></div>
                                    </td>
                                </tr>
                                <tr> 
                                    <td><div class="groupcntt"><label>Ngày Sinh</label>
                                            <input class="cntt" name="Dob_profile" type="date" maxlength="10" required value="<?php echo $col['date_birth']; ?>"></div></td>
                                </tr>
                                <tr> 
                                    <td><p><strong>Mức Độ Tin Cậy:</strong> <?php echo $col['reliability'] ?></p></td>
                                </tr>
                                <tr>      
                                    <td><input class="btncntt" name="bt_profile" type="submit" value="Cập Nhật Thông Tin" ></td>
                                </tr>
                            </tbody>
                        </table>
                    </form> <!-- Thông Tin Tài Khoản -->


                    <?php
                    if (isset($_POST["bt_profile"])) {
                        $l_name = $_POST["L_Name_profile"];
                        $f_name = $_POST["F_Name_profile"];
                        $phone_ = $_POST["Phone_profile"];
                        $email_ = $_POST["Email_profile"];
                        $gender_ = $_POST["Gender_profile"];
                        $Dob_ = $_POST["Dob_profile"];
                        if(!preg_match("/^([0-9]*)$/", $phone_)) {
                            // $phone is valid
                            exit('<h2>Số điện thoại phải là số</h2>');
                        }
                        $age =  date_create($Dob_)->diff(date_create('today'))->y;
                        if($age < 16){
                            exit('<h2>Tuổi phải lớn hơn 16 tuổi</h2>');
                        }
                        $query2 = "UPDATE `member` SET `l_name`='$l_name',`f_name`='$f_name',`mail`='$email_',`phone`= $phone_,`gender`= '$gender_',`date_birth`= '$Dob_' WHERE acc like '$acc'";
                        $result2 = mysqli_query($link, $query2);
                        if ($result2 != false) {
                            header("Refresh:0");
                        } else {
                            echo '<h2>Cập Nhật Thất Bại</h2>';
                        }
                    }
                    ?>
                </div>
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
    $("#initial_invoice").hide();
     $("#initial_invoice2").hide();
    // function Hóa Đơn
    $("document").ready(function () {
        $("#bt_invoice").click(function () {
            $("#initial_invoice").toggle();
            $("#profile").hide();
            $("#initial_invoice2").hide();
            $("#initial_invoice").show();
        })
        $("#bt_invoice2").click(function () {
            $("#initial_invoice2").toggle();
            $("#profile").hide();
            $("#initial_invoice").hide();
            $("#initial_invoice2").show();
        })
        //function Profile
        $("#bt_profile").click(function () {
            $("#profile").toggle();
            $("#initial_invoice").hide();
            $("#initial_invoice2").hide();
            $("#profile").show();
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