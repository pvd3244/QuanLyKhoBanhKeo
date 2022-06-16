<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	$maPhieu = $_SESSION["maPhieu"];
	$maCTSP = $_SESSION["maCTSP"];
	$soLuongXuat = $_POST["soLuongXuat"];
	$donGia = $_POST["donGia"];
	if(is_numeric($soLuongXuat) && is_numeric($donGia)){
		if($soLuongXuat<0 || $donGia<0){
			echo("<script>alert('Số lượng xuất và đơn giá là số nguyên lớn hơn 0');
			location.replace('SuaPhieuXuat.php?id=$maCTSP');
			</script>");
		}
		else{
			function GoiMotGiaTri($tenGiaTri,$sql){
				$truyVan=mysqli_fetch_assoc(mysqli_query
						(mysqli_connect("localhost","root","123456","quanlykhohang"),$sql));
				if(isset($truyVan)){
					return $truyVan["$tenGiaTri"];
				}
				else{
					return 0;
				}
			}
			$soLuongNhap = GoiMotGiaTri("soLuongNhap","SELECT `soLuongNhap` FROM `phieunhapsanpham` WHERE maCTSP = $maCTSP");
			$soLuongDaXuat = GoiMotGiaTri("sum(soLuongXuat)","SELECT sum(soLuongXuat) FROM `phieuxuatsanpham` WHERE maCTSP = $maCTSP AND maPhieu != $maPhieu GROUP BY soLuongXuat");
			$soLuongCon = $soLuongNhap-$soLuongDaXuat;
			if($soLuongXuat <= $soLuongCon){
				$sql = "UPDATE `phieuxuatsanpham` SET `soLuongXuat`=$soLuongXuat,`donGia`=$donGia WHERE maCTSP = $maCTSP AND maPhieu = $maPhieu";
				mysqli_query($conn,$sql);
				header("location: /CodeBTL/ChiTietPhieuXuat.php?id=$maPhieu");
			}
			else{
				echo("<script>alert('Trong kho chỉ còn $soLuongCon sản phẩm này');
				location.replace('SuaPhieuXuat.php?id=$maCTSP');
				</script>");
			}
		}
	}
	else{
		echo("<script>alert('Số lượng xuất và đơn giá là số nguyên lớn hơn 0');
		location.replace('SuaPhieuXuat.php?id=$maCTSP');
		</script>");
	}
?>
<body>
</body>
</html>