<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	$tenSP = $_POST["tenSP"];
	$donVT = $_POST["dVT"];
	$kichThuoc = $_POST["kichThuoc"];
	$loaiSP = $_POST["loaiSP"];
	$sql = "INSERT INTO `sanpham`(`tenSP`, `donViTinh`, `kichThuoc`, `loaiSP`) VALUES ('$tenSP','$donVT',$kichThuoc,'$loaiSP')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	header("location: SanPham.php");
	?>
<body>
</body>
</html>