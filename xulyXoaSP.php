<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	$maSP = $_GET["id"];
	
	$sqlGoiSoNhap = "SELECT  sum(soLuongNhap)
	from phieunhapsanpham
	WHERE maSP = $maSP
	GROUP by maSP";
	$soLuongNhap = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSoNhap));
	
	$sqlGoiSoXuat = "SELECT  sum(soLuongXuat)
	from phieuxuatsanpham
	WHERE maSP = $maSP
	GROUP by maSP";
	$soLuongXuat = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSoXuat));
	
	if($soLuongXuat)
		$soLuong = $soLuongNhap["sum(soLuongNhap)"]-$soLuongXuat["sum(soLuongXuat)"];
	else if($soLuongNhap)
		$soLuong = $soLuongNhap["sum(soLuongNhap)"];
	else
		$soLuong = 0;
	if($soLuong == 0){
		$sqlXoaSP = "DELETE FROM `sanpham` WHERE maSP = $maSP";
		mysqli_query($conn, $sqlXoaSP);
	?>
	<script>
		function DieuHuong(){
			alert("Xóa sản phẩm thành công.");
			location.replace("SanPham.php");
		}
		setTimeout('DieuHuong()', 1);
	</script>
	<?php
	}
	else{
	?>
	<script>
		function DieuHuong(){
			alert("Không thể xóa loại sản phẩm có số lượng lớn hơn 0.");
			location.replace("SanPham.php");
		}
		setTimeout('DieuHuong()', 1);
	</script>
	<?php
	}
	mysqli_close($conn);
	?>
<body>
</body>
</html>