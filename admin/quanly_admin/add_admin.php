<?php
    include_once '../../PRJ_Library/connect_DB.php';
    session_start();

	$username = $_POST["username"];
	$password = $_POST["password"];
        $role = $_POST["role"];
            
        $p = md5($password);
        $query = "INSERT INTO admin (acc, pass, role) VALUES ('$username','$p', '$role')";
        $result = mysqli_query($link, $query);
        
	// Nếu thông tin đăng nhập chính xác, trả về giá trị là 1
	if ($result) {
               
		echo "success";
		exit();
	} else {
           // Nếu thông tin đăng nhập sai, trả về giá trị là 0
            echo 0; 
        }
 
	
	
?>