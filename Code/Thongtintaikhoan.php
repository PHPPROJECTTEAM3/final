<?php
ob_start();
session_start();
$pageTitle = "Tài Khoản";
$activeMenu = "home";
include_once '../PRJ_Library/header.php';
include_once '../PRJ_Library/connect_DB.php';
include_once '../PRJ_Library/data_product.inc';
?>

<div class="container" style="padding-bottom: 5%;">
    <div class="row">
        <div class="col-sm-3" style="padding-top: 5%;">
            <ul style="list-style-type: none">
                <li><button style="margin: 10px" id="bt_profile" class="btn btn-info"><i class="fa fa-eye" style="color: black;"></i>Thông tin tài khoản</button></li>
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
                    if (!preg_match("/^([0-9]*)$/", $phone_)) {
                        // $phone is valid
                        exit('<h2>Số điện thoại phải là số</h2>');
                    }
                    $age = date_create($Dob_)->diff(date_create('today'))->y;
                    if ($age < 16) {
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
        <?php
        include_once '../PRJ_Library/footer.html';
        ?>