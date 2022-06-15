<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	$maNV = $_SESSION["maNV"];
	
	$goiSPN = "SELECT `maSP`, `ngaySX`, `soLuongNhap`, `maKho`, `hanSD` FROM `sanphamnhap`";
	$check = mysqli_fetch_assoc(mysqli_query($conn,$goiSPN));
	if(isset($check)){
		$taoPhieuNhap = "INSERT INTO `phieunhap`(`ngayNhap`, `maNV`) VALUES (CURDATE(),$maNV)";
		mysqli_query($conn,$taoPhieuNhap);
		
		$dsSPN = mysqli_query($conn,$goiSPN);
		while($row = mysqli_fetch_assoc($dsSPN)){
			$maSP = $row["maSP"];
			$ngaySX = $row["ngaySX"];
			$soLuongNhap = $row["soLuongNhap"];
			$maKho = $row["maKho"];
			$hanSD = $row["hanSD"];
			
			$layMaxCTSP = "SELECT MAX(maCTSP) FROM `chitietsanpham`";
			$ctsp = mysqli_fetch_assoc(mysqli_query($conn,$layMaxCTSP));
			$maxCTSP = $ctsp["MAX(maCTSP)"];
	
			$themCTSP = "INSERT INTO `chitietsanpham`(`maSP`, `ngaySanXuat`, `hanSD`) VALUES ($maSP,'$ngaySX',$hanSD)";
			mysqli_query($conn,$themCTSP);
			
			$goiMaCTSP = "SELECT `maCTSP` FROM `chitietsanpham` WHERE maCTSP > $maxCTSP";
			$mact = mysqli_fetch_assoc(mysqli_query($conn,$goiMaCTSP));
			$maCTSP = $mact["maCTSP"];
			$goiMaPhieu = "SELECT MAX(maPhieu) FROM `phieunhap`";
			$phieu = mysqli_fetch_assoc(mysqli_query($conn,$goiMaPhieu));
			$maPhieu = $phieu["MAX(maPhieu)"];
			$themPNSP = "INSERT INTO `phieunhapsanpham`(`maPhieu`, `maSP`, `maCTSP`, `soLuongNhap`, `maKho`) VALUES ($maPhieu,$maSP,$maCTSP,$soLuongNhap,$maKho)";
			mysqli_query($conn,$themPNSP);
		}
		$xoaBang = "DROP TABLE IF EXISTS sanphamnhap";
		mysqli_query($conn,$xoaBang);
		header("location: /CodeBTL/PhieuNhap.php");
	}
	else{
		
		?>
	<script>
		alert("Chưa có sản phẩm nào trong phiếu. Vui lòng thêm ít nhất 1 sản phẩm");
		location.replace("ThemPhieuNhap.php");
	</script>
	<?php
	}
	?>
<body>
</body>
</html>