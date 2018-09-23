<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        
        <link href="dangkydangnhap_admin.css" rel="stylesheet" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body style="background-color: #FFFF;">
        <img width="20%" style="margin-top: 1%; margin-left: 39%;" src="../../Images/phpmobile.jpg">
<div style="margin-bottom: 5%;">	
                            <div class="headerform">
                                
                                <h2>Đăng Nhập</h2>
                                </div>
    
                            <div class="sign-in-html">
                            <div id="error" style="color: red;"></div><div id="ok" style="color: green"></div>
				<div class="groupacc">

                                        <input id = "username" name="username" type="text" class="input" placeholder="UserName">
				</div>
				<div class="groupacc">
					
					<input id = "password" name="password" type="password" class="input" data-type="password" placeholder="Password">
				</div>
				
				<div class="groupacc">
					<input style="width: 99%;" type="submit" class="btnacc"  id="btn_submit" name="btn_submit" value="Đăng Nhập">
				</div>
			</div>
                                
    </div>	


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
		  url: "checkdangnhapad.php",
		  method: "POST",
		  data: { username : username, password : password },
		  success : function(response){
		  	if (response == "1") {
		  		window.location = "pageadmin.php";
		  	}else{
		  		error.html("Tên đăng nhập hoặc mật khẩu không chính xác !");
                            }
		  }
		});
 
	});
</script>

    </body>
</html>
