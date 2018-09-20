<?php

include_once '../PRJ_Library/connect_DB.php';
session_start();
//$email = $_GET["email"];

$email = $_POST["mail"];
$Password_1 = $_POST["password_1"];
$Password_2 = $_POST["password_2"];
$password = md5($Password_1);
$query = "UPDATE member SET pass = '$password' WHERE mail = '$email'";
if ($result = mysqli_query($link, $query)) {
    echo 1;
    exit();
} else{
    echo 0;
}
?>