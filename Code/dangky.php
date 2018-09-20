<?php
$pageTitle = "Đăng Ký";
$activeMenu = "";
include_once '../PRJ_Library/header.php';
?>
     <div style="margin-top: 5%; margin-bottom: 5%;">
                        <div class="header">
                                
                                <h2>Đăng Ký</h2>
                                </div>       
    
			<div class="sign-up-html">
                            <div id="error" style="color: red;"></div><div id="ok" style="color: green"></div>
				<div class="groupacc">
					
					<input id = "username" name="username" type="text" class="input" placeholder="Username">
				</div>
				<div class="groupacc">
					
					<input id = "password_1" name="password_1" type="password" class="input" data-type="password" placeholder="Password">
				</div>
                            <div class="groupacc">
					
					<input id = "password_2" name="password_2" type="password" class="input" data-type="password" placeholder="Confirm Password">
				</div>
                            <div class="groupacc">
					
                                        <input id = "mail" name="mail" type="email" class="input" data-type="mail" placeholder="Email">
				</div>
				
				<div class="groupacc">
                                    <input style="width: 93%;" type="submit" class="btnacc"  id="btn_submit" name="btn_submit" value="Đăng Ký">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
                                  <a href="dangnhap.php">Đăng Nhập</a> <a>|</a> <a href="Home.php">Trang Chủ</a>
				</div>
			</div>
     </div>
    
<?php
include_once '../PRJ_Library/footer.html';
?>


<script type="text/javascript">
    
     function validateEmail(email) {
                 var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                 return re.test(email);
            }
            
            $("#btn_submit").on("click", function () {
                var username = $("#username").val();
                var password_1 = $("#password_1").val();
                var password_2 = $("#password_2").val();
                var mail = $("#mail").val();
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
                if (password_1 == "") {
                    error.html("Mật khẩu không được để trống");
                    return false;
                }
                if (password_2 == "") {
                    error.html("Vui Lòng Nhập Lại Mật Khẩu");
                    return false;
                }
                if (password_1 != password_2) {
                    error.html("Mật khẩu không trùng khớp");
                    return false;
                }
                if (mail == "") {
                    error.html("Email không được để trống");
                    return false;
                }
                if (!validateEmail(mail)) {
                    error.html("Email không hợp lệ!");
                    return false;
                }






                // Chạy ajax gửi thông tin username và password về server check_dang_nhap.php
                // để kiểm tra thông tin đăng nhập hợp lệ hay chưa
                $.ajax({
                    url: "checkdangky.php",
                    method: "POST",
                    data: {username: username, password_1: password_1, password_2: password_2, mail: mail},
                    success: function (response) {
                        if (response == "success") {
                            window.location = "dangnhap.php";
                        } else {

                            error.html("Đăng Ký Thất Bại !");
                        }
                    }
                });

            });
        </script>
</body>
</html>