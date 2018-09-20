<?php
include_once '../PRJ_Library/connect_DB.php';
if (!isset($_GET["email"])) {
    header("Location:forgotpass.php");
    exit();
}
?>

<?php
$pageTitle = "Đổi Mật Khẩu";
$activeMenu = "";
include_once '../PRJ_Library/header.php';
?>

        <div style="margin-top: 5%; margin-bottom: 5%; ">
        <div class="header">

            <h2>Đổi Mật Khẩu</h2>
        </div> 
        <div class="sign-in-html">
            <div id="error" style="color: red;"></div><div id="ok" style="color: green"></div>
            <div class="groupacc">
                
                <input id = "password_1" name="password_1" type="password" class="input" data-type="password" placeholder="Mật Khẩu Mới">
            </div>
            <div class="groupacc">

                <input id = "password_2" name="password_2" type="password" class="input" data-type="password" placeholder="Xác Nhận Mật Khẩu">
            </div>

            <div class="groupacc">
                <input style="width: 93%;" type="submit" class="btn"  id="btn_submit" name="btn_submit" value="Đổi mật khẩu">
                <input type="hidden" id="email" name="email" value="<?= $_GET["email"] ?>">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
                <a href="Home.php">Trang Chủ</a>
            </div>
        </div>
        </div>

<?php
include_once '../PRJ_Library/footer.html';
?>

        <script type="text/javascript">
            $("#btn_submit").on("click", function () {
                var password_1 = $("#password_1").val();
                var password_2 = $("#password_2").val();
                var error = $("#error");
                var ok = $("#ok");
                var mail = $("#email").val();

                // resert 2 thẻ div thông báo trở về rỗng mỗi khi click nút đăng nhập
                error.html("");
                ok.html("");

                // Kiểm tra nếu username rỗng thì báo lỗi
                if (password_1 == "") {
                    error.html("Mật khẩu không được để trống");
                    return false;
                }
                // Kiểm tra nếu password rỗng thì báo lỗi
                if (password_2 == "") {
                    error.html("Vui lòng xác nhận mật khẩu");
                    return false;
                }
                if (password_1 != password_2) {
                    error.html("Mật khẩu không trùng khớp");
                    return false;
                }


                // Chạy ajax gửi thông tin username và password về server check_dang_nhap.php
                // để kiểm tra thông tin đăng nhập hợp lệ hay chưa
                $.ajax({
                    url: "resetPassword.php",
                    method: "POST",
                    data: {mail: mail, password_1: password_1, password_2: password_2},
                    success: function (response) {
                        if (response == "1") {
                            ok.html("Đổi mật khẩu thành công");
                        } else {
                            error.html("Đổi mật khẩu thất bại");
                        }
                    }
                });

            });
        </script>
