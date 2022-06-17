<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	require("KetNoiCSDL.php");;
	session_start();
	$maSP = $_SESSION['maSP'];
	$maCTSP = $_GET["id"];
	$sqlGoiSoNhap = "SELECT  sum(soLuongNhap)
				from phieunhapsanpham
				WHERE maCTSP = $maCTSP
				GROUP by maCTSP";
	$soLuongNhap = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSoNhap));
	$sqlGoiSoXuat = "SELECT  sum(soLuongXuat)
				from phieuxuatsanpham
				WHERE maCTSP = $maCTSP
				GROUP by maCTSP";
	$soLuongXuat = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSoXuat));
	if($soLuongXuat)
		$soLuong = $soLuongNhap["sum(soLuongNhap)"]-$soLuongXuat["sum(soLuongXuat)"];
	else
		$soLuong = $soLuongNhap["sum(soLuongNhap)"];
	if($soLuong <= 0){
		$sql = "DELETE FROM `chitietsanpham` WHERE maCTSP = $maCTSP";
		mysqli_query($conn, $sql);
		header("location: /CodeBTL/ChiTietSanPham.php?id=$maSP");
	}
	else{
	?>
	<script>
		function DieuHuong(){
			alert("Không thể xóa sản phẩm có số lượng lớn hơn 0.");
			location.replace("ChiTietSanPham.php?id=<?php echo $maSP ?>")
		}
		DieuHuong();
	</script>
	<?php
	}
	?>
<body>
</body>
</html>