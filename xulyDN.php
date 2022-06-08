
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST['dangnhap']))
{
$conn = mysqli_connect ('localhost', 'root', '123456', 'quanlykhohang');
  
$username = $_POST['username'];
$password = $_POST['password'];
  
if (!$username || !$password) {
echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
exit;
}
  
$sql = "SELECT maNV, tenNV, taiKhoan, matKhau FROM nhanvien WHERE taiKhoan='$username'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (!$row) {
echo "Tên đăng nhập hoặc mật khẩu không đúng!";
} else {
	if($row["matKhau"] == $password){
		$_SESSION['taiKhoan'] = $username;
		$_SESSION['maNV'] = $row["maNV"];
		$_SESSION['tenNV'] = $row["tenNV"];
		header("Location: /CodeBTL/TrangChu.php");
		
	die();
	$connect->close();
	}
	else
		echo "Tên đăng nhập hoặc mật khẩu không đúng!";
}
}
?>
</body>
	
</html>