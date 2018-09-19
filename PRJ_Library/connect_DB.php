<?php

/* 
 * in ra danh sach database trong sql
 */

$host = "localhost"; //ten may chu database trong mysql
$uid = "root";       //tai khoan dang nhap mac dinh vao sql
$pwd = "";           //mat khau
$db = "php_project_ver2";
//tao ket noi
$link = mysqli_connect($host,$uid,$pwd,$db);
//kiem tra ket noi
if($link == null)
{
    die("loi sai: Ket noi that bai!!!");
}

//set chung nang in tieng viet unicode
mysqli_set_charset($link,"utf8");
?>
