<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	require("KetNoiCSDL.php");
	session_start();
	function TruyVan($sql){
		require("KetNoiCSDL.php");
		$dsTruyVan = mysqli_query($conn, $sql);
		return $dsTruyVan;
	}
	function GoiGiaTri($tenGiaTri, $sql){
		require("KetNoiCSDL.php");
		$gtTruyVan = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		if(isset($gtTruyVan))
			return $gtTruyVan["$tenGiaTri"];
		else
			return 0;
	}
	$maNV = $_SESSION["maNV"];
	$check = mysqli_fetch_assoc(TruyVan("SELECT * FROM `sanphamxuat`"));
	if(isset($check)){
		$ngayXuat = $_SESSION["ngayXuat"];
		$maDaiLy = $_SESSION["maDaiLy"];
		$sqlThem = "INSERT INTO `phieuxuat`(`ngayXuat`, `maNV`, `maDaiLy`) VALUES ('$ngayXuat',$maNV,$maDaiLy)";
		mysqli_query($conn,$sqlThem);
		$maPhieu = GoiGiaTri("MAX(maPhieu)","SELECT MAX(maPhieu) FROM `phieuxuat`");
		$dsSPX = TruyVan("SELECT `maCTSP`, `soLuongXuat`, `donGia` FROM `sanphamxuat`");
		while($row = mysqli_fetch_assoc($dsSPX)){
			$maCTSP = $row["maCTSP"];
			$soLuongXuat = $row["soLuongXuat"];
			$donGia = $row["donGia"];
			$maSP = GoiGiaTri("maSP","SELECT `maSP` FROM `chitietsanpham` WHERE maCTSP = $maCTSP");
			$sql = "INSERT INTO `phieuxuatsanpham`(`maPhieu`, `maSP`, `maCTSP`, `soLuongXuat`, `donGia`) VALUES ($maPhieu,$maSP,$maCTSP,$soLuongXuat,$donGia)";
			mysqli_query($conn,$sql);
		}
		$sqlXoa = "DROP TABLE IF EXISTS sanphamxuat";
		mysqli_query($conn,$sqlXoa);
		header("location: /CodeBTL/PhieuXuat.php");
	}
	else{
		echo("<script>
			alert('Vui lòng thêm ít nhất 1 sản phẩm vào danh sách');
			location.replace('ThemPhieuXuat.php');
		</script>");
	}
?>
<body>
</body>
</html>
<script>
	alert("Vui lòng thêm ít nhất 1 sản phẩm vào danh sách");
	location.replace("ThemPhieuXuat.php");
</script>