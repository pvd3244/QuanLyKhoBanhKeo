<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	$maSP = $_SESSION["maSP"];
	$tenSP = $_POST["tenSP"];
	$donViTinh = $_POST["donViTinh"];
	$kichThuoc = $_POST["kichThuoc"];
	$loaiSP = $_POST["loaiSP"];
	$sql = "UPDATE `sanpham` SET `tenSP`='$tenSP',`donViTinh`='$donViTinh',`kichThuoc`= 			$kichThuoc,`loaiSP`='$loaiSP' WHERE maSP = $maSP";
	mysqli_query($conn, $sql);
	header("location: /CodeBTL/SanPham.php");
	?>
<body>
</body>
</html>