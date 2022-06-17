<?php
$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
if(!$conn){
	echo("Không thể kết nối tới cơ sở dữ liệu");
}
header("Content-type: text/html; charset=utf-8");
mysqli_set_charset($conn, 'UTF8');
?>