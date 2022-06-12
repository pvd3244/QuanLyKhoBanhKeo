<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$maNV = $_GET["id"];
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	$sql = "DELETE FROM `nhanvien` WHERE maNV = $maNV";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
	header("location: /CodeBTL/NhanVien.php");
	?>
<body>
</body>
</html>