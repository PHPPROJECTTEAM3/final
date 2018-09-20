<?php
    include_once '../PRJ_Library/connect_DB.php';
    session_start();

	$username = $_POST["username"];
	$password = $_POST["password"];
        $p=md5($password);
        $query = "SELECT * FROM member WHERE acc = '$username' AND pass= '$p'";
        $result = mysqli_query($link, $query);
        
	// Nếu thông tin đăng nhập chính xác, trả về giá trị là 1
	if (mysqli_num_rows($result)==1) {
                $_SESSION['username'] = $username;
		echo 1;
		exit();
	}
 
	// Nếu thông tin đăng nhập sai, trả về giá trị là 0
	echo 0;
	
?>