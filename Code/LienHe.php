<?php
session_start();
$pageTitle = "Liên Hệ";
$activeMenu = "LienHe";

date_default_timezone_set('Asia/Ho_Chi_Minh');

include_once '../PRJ_Library/header.php';


$querymail = "SELECT *FROM member";
$resultmail = mysqli_query($link, $querymail);
$rowmail = mysqli_fetch_array($resultmail);
?>



<div style="margin-top: 5%;">
    <div class="container">
        <div class="row">

            <?php if (!isset($_SESSION["username"])) { ?>
                <div class="col-sm-8">
                    <p style="font-size: 19px" > *Mời quý khách đăng nhập để sử dụng tính năng Feedback nếu như có phản hồi, ý kiến. </p>
                    <p style="border: 2px solid #ddd;"></p>
                    <p style="font-size: 20px"> <strong> THÔNG TIN LIÊN HỆ KHÁC </strong>
                    <hr/>
                    <p>Tìm cửa hàng PHP Mobile? <br/></p>
                    <p>Tổng đài tư vấn, hỗ trợ khách hàng (7h30 đến 22h): <strong> 19009090 </strong> <br/> </p>
                    <p>Email: <a href="mailto:phpmobile@gmail.com?Subject=Hello" target="_blank"><strong>phpmobile@gmail.com</strong></a></p>

                    <iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.325711139572!2d106.66413961463098!3d10.78634669231479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed23ec9a3ef%3A0x3a6f9c50875209d!2zVsSDbiBwaMOybmcgRlBUIEdyZWVud2ljaCBIQ00sIFRyxrDhu51uZyDEkOG6oWkgSOG7jWMgRlBU!5e0!3m2!1svi!2s!4v1536209391226" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>


            <?php
            } else {
                $acc = $_SESSION["username"];
                ?>

                <div class="col-sm-4">
                    <p style="font-size: 25px; border-left: 5px solid #09afdf; padding-left: 3%;"><strong> PHPMobile xin hân hạnh được hỗ trợ quý khách </strong> </p>
                    <form class="fedb" method="POST" id="feedback-form">
                        <div id="error" style="color: red;"></div><div id="ok" style="color: green"></div>
                        <strong>Quý Khách Quan Tâm Về: </strong>
                        <select class="fed" name="txttheme" id="txttheme">
                            <option>Chọn chủ đề</option>
                            <option>Khiếu Nại-Phản Ánh</option>
                            <option>Góp Ý</option>
                            <option>Tư Vấn</option> 
                        </select><br/>
                        <p style="border: 1px solid #09afdf;"></p>
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input class="fed form-control" type="text" name="txttitle" id="txttitle" value="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="fed form-control" type="email" value="<?php echo $rowmail['mail'] ?>" readonly="" name="txtmail" id="txtmail" style="background-color: white;">
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea  class="fed form-control" type="text" value="" name="txtcontent" id="txtcontent"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ngày</label>
                            <input  value="<?php echo date("Y-m-d - H:i:s"); ?>" readonly name="txtdate" id="txtdate"><br/>
                        </div>


                        <div class="form-group">
                            <input class="subfed" type="submit" name="btn_Submit" id="btn_Submit">

                        </div>
                    </form> 

                </div>
                <div class="col-sm-8">
                    <p style="border: 2px solid #ddd;"></p>
                    <p style="font-size: 20px"> <strong> THÔNG TIN LIÊN HỆ KHÁC </strong>
                    <hr/>
                    <p>Tìm cửa hàng PHP Mobile? <br/></p>
                    <p>Tổng đài tư vấn, hỗ trợ khách hàng (7h30 đến 22h): <strong> 19009090 </strong> <br/> </p>
                    <p>Email: <a href="mailto:phpmobile@gmail.com?Subject=Hello" target="_blank"><strong>phpmobile@gmail.com</strong></a></p>

                    <iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.325711139572!2d106.66413961463098!3d10.78634669231479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed23ec9a3ef%3A0x3a6f9c50875209d!2zVsSDbiBwaMOybmcgRlBUIEdyZWVud2ljaCBIQ00sIFRyxrDhu51uZyDEkOG6oWkgSOG7jWMgRlBU!5e0!3m2!1svi!2s!4v1536209391226" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
<?php } ?>

        <div class="row">
            <div class="col-sm-12" style="margin-bottom: 7%;">              

                <p style="font-size: 22px;margin-left: 3%;margin-top: 3%;border: #48a9ea;border-style: outset;text-align:  center;border-radius: 10px;position:  relative;">
                    <strong>Ý Kiến Khách Hàng</strong></p>

                <?php
                $sql = "Select * from feed_back where con_rep is not null";
                $sql3 = "Select * from feed_back where con_rep is null";
                $result = mysqli_query($link, $sql);
                $result3 = mysqli_query($link, $sql3);
                ?>
<?php while ($row = mysqli_fetch_array($result)) { ?>

                    <div style="width: 500px; margin-bottom: 15px;">
                        <p style="font-size:17px"><strong><?php $row['acc'] ?></strong></p> 
                        <p style="width: 250%"><?php echo $row['con_feed'] ?></p>
                        <p style="margin-top: -2%; color:skyblue;""><?php echo $row['date_feed'] ?></p>
                        <p style="color: deepskyblue;margin-top: -2%;">Reply</p>
                        <div style="margin-top: -4%">
                            <i class="fa fa-sort-up" style="font-size:37px;margin-top: 8px;color: #f1f1f1;margin-left: 8px;"></i>
                            <div style="width: 250%;padding: 35px; background: #f1f1f1;margin-top: -24px; ">

                                <p style="margin-left: 6.3%"><strong> <?php echo $row['admin_rep'] ?></strong></p><p style="padding: 2px 6px; margin-top: -3%;  text-transform: uppercase; background: #eebc49; line-height: 18px; border-radius: 3px; height: 18px; width: 60px;"> Admin </p>
                                <p><?php echo $row['con_rep'] ?></p>  
                                <p style="color:skyblue;"><?php echo $row['date_rep'] ?></p>
                            </div>
                        </div>
                    </div>

<?php } ?>
<?php while ($row = mysqli_fetch_array($result3)) { ?>

                    <div style="width: 500px;padding: 35px;margin: 15px">
                        <p style="font-size:17px"><strong><?php echo $row['acc'] ?></strong></p> 
                        <p style="width: 250%"><?php echo $row['con_feed'] ?></p>  
                        <p style="color:skyblue;"><?php echo $row['date_feed'] ?></p> 
                    </div>
                    <div style="border-style: dashed; border-radius: 13px; width: 500px; color: #a1afb9e8; text-align: center; margin-left: 4%">
                        <p style="color:cornflowerblue; margin-top: 2%"> Thắc mắc của quý khách sẽ được phản hồi trong vòng 24h. </p>
                    </div>

<?php } ?>

            </div>
        </div>

    </div>
</div>    

<script type="text/javascript">

    $("#feedback-form").submit(function (e) {
        e.preventDefault();
        var txttheme = $("#txttheme").val();
        var txttitle = $("#txttitle").val();
        var txtname = $("#txtname").val();
        var txtmail = $("#txtmail").val();
        var txtcontent = $("#txtcontent").val();
        var txtdate = $("#txtdate").val();
        var error = $("#error");
        var ok = $("#ok");

        // resert 2 thẻ div thông báo trở về rỗng mỗi khi click nút đăng nhập
        error.html("");
        ok.html("");
        if (txttitle == "") {
            error.html("Tiêu đề không được để trống");
            return false;
        }
        // Kiểm tra nếu username rỗng thì báo lỗi
        if (txtmail == "") {
            error.html("Email không được để trống");
            return false;
        }
        // Kiểm tra nếu password rỗng thì báo lỗi
        if (txtcontent == "") {
            error.html("Nội dung không được để trống");
            return false;
        }


        $.ajax({
            type: "POST",
            url: "checkfeedback.php",
            data: {txttheme: txttheme, txttitle: txttitle, txtname: txtname, txtmail: txtmail, txtcontent: txtcontent, txtdate: txtdate},
            dataType: "json",
            success: function (response) {
                if (response == "1") {
                    ok.html("Cảm ơn bạn đã góp ý.");
                } else {
                    error.html(response);
                }
            },
            error: function (jqXHR, exception) {
                console.log(jqXHR);
                console.log(exception);

            }
        });

    });

</script>


<?php
include_once '../PRJ_Library/footer.html';
?>