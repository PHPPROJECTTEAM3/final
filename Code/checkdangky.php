<?php
    include_once '../PRJ_Library/connect_DB.php';
    session_start();

	$username = $_POST["username"];
	$password_1 = $_POST["password_1"];
        $password_2 = $_POST["password_2"];
        $mail = $_POST["mail"];
        $default_reliability ="Khá";
        $Date = date("Y-m-d");
        $password = md5($password_1);
        $query = "INSERT INTO member (acc, pass, mail, reliability, Date) VALUES ('$username','$password', '$mail', '$default_reliability', '$Date')";
        $result = mysqli_query($link, $query);
        
	// Nếu thông tin đăng nhập chính xác, trả về giá trị là 1
	if ($result) {
               
		echo "success";
		exit();
	} else {
           // Nếu thông tin đăng nhập sai, trả về giá trị là 0
            echo $Date; 
        }
 
	
	
?>