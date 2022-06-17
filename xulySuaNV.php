<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	session_start();
	$maNV = $_SESSION["maNV"];
	require("KetNoiCSDL.php");
	$tenNV = $_POST["tenNV"];
	$diaChi = $_POST["diaChi"];
	$sDT = $_POST["sDT"];
	$tuoi = $_POST["tuoi"];
	$mk = $_POST["matKhau"];
	$sql = "UPDATE `nhanvien` SET `tenNV`='$tenNV',`tuoi`=$tuoi,`sDT`='$sDT',`diaChi`='$diaChi',`matKhau`='$mk' WHERE maNV = $maNV";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
	unset($_SESSION["maNV"]);
	header("location: /CodeBTL/NhanVien.php");
	?>
<body>
</body>
</html>