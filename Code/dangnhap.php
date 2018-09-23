<?php
$pageTitle = "Đăng Nhập";
$activeMenu = "";
include_once '../PRJ_Library/header.php';
?>

    <div style="margin-top: 5%; margin-bottom: 5%;">	
                            <div class="header">
                                
                                <h2>Đăng Nhập</h2>
                                </div>
    
                            <div class="sign-in-html">
                            <div id="error" style="color: red;"></div><div id="ok" style="color: green"></div>
				<div class="groupacc">
					
                                    <input id = "username" name="username" type="text" class="input" placeholder="Username">
				</div>
				<div class="groupacc">
					
                                    <input id = "password" name="password" type="password" class="input" data-type="password" placeholder="Password">
				</div>
				
				<div class="groupacc">
					<input style="width: 93%;" type="submit" class="btnacc"  id="btn_submit" name="btn_submit" value="Đăng Nhập">
				</div>
				<div class="hr"></div>
                                <div class="foot-lnk" style="text-align: center; padding-bottom: 5%; padding-top: 10%;">
                                    <a href="resetpass.php">Quên Mật Khẩu</a> 
				</div>
                                <div class="foot-lnk" style="text-align: center; padding-top: 5%;">
                                    <a href="dangky.php">Đăng Ký</a> <a>|</a> <a href="Home.php">Trang Chủ</a>
				</div>
                                </div>
                                
    </div>	


        
<?php
include_once '../PRJ_Library/footer.html';
?>


<script type="text/javascript">
	$("#btn_submit").on("click", function(){
		var username = $("#username").val().trim();
		var password = $("#password").val();
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
                
		
		// Chạy ajax gửi thông tin username và password về server check_dang_nhap.php
		// để kiểm tra thông tin đăng nhập hợp lệ hay chưa
		$.ajax({
		  url: "checkdangnhap.php",
		  method: "POST",
		  data: { username : username, password : password },
		  success : function(response){
		  	if (response == "1") {
		  		window.location = "home.php";
		  	}else{
		  		error.html("Tên đăng nhập hoặc mật khẩu không chính xác !");
                            }
		  }
		});
 
	});
</script>
