<?php
session_start();
    include_once '../../PRJ_Library/connect_DB.php';
	$username = $_POST["username"];
	$password = $_POST["password"];
        $p=md5($password);
        $query = "SELECT * FROM admin WHERE acc = '$username' AND pass= '$p'";
        $result = mysqli_query($link, $query);
        $col= mysqli_fetch_array($result);
	// Nếu thông tin đăng nhập chính xác, trả về giá trị là 1
	if (mysqli_num_rows($result)==1) {
            $sql= mysqli_fetch_array($result);
            $_SESSION["admin"]=$col['acc'];
            $_SESSION["role"]=$col["role"];
		echo 1;
		exit();
            } else {
                // Nếu thông tin đăng nhập sai, trả về giá trị là 0
             echo 0; 
             exit();
}
	
	
	
?>