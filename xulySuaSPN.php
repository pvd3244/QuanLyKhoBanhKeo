<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	require("KetNoiCSDL.php");
	session_start();
	$maCTSP = $_SESSION["maCTSP"];
	$maPN = $_SESSION["maPN"];
	$soLuongNhap = $_POST["soLuongNhap"];
	$maKho = $_SESSION["maKho"];
	
	$sqlKichThuoc = "SELECT sum(soLuongNhap*kichThuoc) 
		FROM `phieunhapsanpham` INNER JOIN sanpham on sanpham.maSP = phieunhapsanpham.maSP
		WHERE maKho = $maKho AND maCTSP != $maCTSP
		GROUP by maKho";
	$kichThuoc = mysqli_fetch_assoc(mysqli_query($conn, $sqlKichThuoc));
	$ktDung = $kichThuoc["sum(soLuongNhap*kichThuoc)"];
	
	$sqlKho = "SELECT `kichThuoc` FROM `kho` WHERE maKho = $maKho";
	$ktKho = mysqli_fetch_assoc(mysqli_query($conn, $sqlKho));
	$ktConLai = $ktKho["kichThuoc"]*0.8 - $ktDung;
	
	$sqlSP = "SELECT kichThuoc 
		FROM `chitietsanpham` INNER JOIN sanpham on sanpham.maSP = chitietsanpham.maSP 
		WHERE maCTSP = $maCTSP";
	$sanPham = mysqli_fetch_assoc(mysqli_query($conn, $sqlSP));
	$ktSP = $sanPham["kichThuoc"];
	
	$soLuongChua = $ktConLai/$ktSP;
	
	if($soLuongChua >= $soLuongNhap){
		$sql = "UPDATE `phieunhapsanpham` SET `soLuongNhap`=$soLuongNhap WHERE maCTSP = $maCTSP";
		mysqli_query($conn, $sql);
		header("location: /CodeBTL/ChiTietPhieuNhap.php?id=$maPN");
	}
	else{
		?>
	<script>
		function DieuHuong(){
			alert("Kho chứa chỉ có thể chứa thêm <?php echo floor($soLuongChua) ?> sản phẩm này");
			location.replace("ChiTietPhieuNhap.php?id=<?php echo $maPN ?>")
		}
		DieuHuong();
	</script>
	<?php
	}
	?>
<body>
</body>
</html>