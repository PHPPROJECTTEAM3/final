<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once './HeaderAdmin.php';
?>
<div style="margin-top: 5%;">
    <form method="POST" id="add-admin">
        <div class="headerform">

            <h2>Thêm Tài Khoản</h2>
        </div>       

        <div class="sign-up-html">
            <div id="error" style="color: red;"></div><div id="ok" style="color: green"></div>
            <div class="groupacc">

                <input id = "username" name="username" type="text" class="input" placeholder="Tên Truy Cập">
            </div>
            <div class="groupacc">

                <input id = "password" name="password" type="password" class="input" data-type="password" placeholder="Mật Khẩu"> 
            </div>
            <div class="groupacc">
                <select name="role" id="role">
                    <option>Quyền Truy Cập</option>
                    <option value="1">Master</option>
                    <option value="2">Staff</option>
                </select>
            </div>


            <div class="groupacc">
                <input style="width: 93%;" type="submit" class="btnacc"  id="btn_submit" name="btn_submit" value="Thêm">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
                <a href="Adduser.php">Quay về</a>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">
    $("#add-admin").submit(function (e) {
        e.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();
        var role = $("#role").val();

        var error = $("#error");
        var ok = $("#ok");

        // resert 2 thẻ div thông báo trở về rỗng mỗi khi click nút đăng nhập
        error.html("");
        ok.html("");

        // Kiểm tra nếu username rỗng thì báo lỗi
        if (username == "") {
            error.html("Tên đăng nhập không được để trống");
            return false;
        }
        // Kiểm tra nếu password rỗng thì báo lỗi
        if (password == "") {
            error.html("Mật khẩu không được để trống");
            return false;
        }
        if (role == "") {
            error.html("Quyền truy cập không được để trống");
            return false;
        }






        // Chạy ajax gửi thông tin username và password về server check_dang_nhap.php
        // để kiểm tra thông tin đăng nhập hợp lệ hay chưa
        $.ajax({
            url: "add_admin.php",
            type: "POST",          
            data: {username: username, password: password, role: role},
            dataType: "json",
            success: function (response) {
                if (response == "1") {
                    window.location = "Adduser.php";
                } else {
                    error.html("Thêm mới thất bại!");
                }
            }, error: function (jqXHR, exception) {
                console.log(jqXHR);
                console.log(exception);

            }
        });

    });
</script>
</body>
</html>