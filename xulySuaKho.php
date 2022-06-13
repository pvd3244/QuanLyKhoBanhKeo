<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	$maKho = $_SESSION["maKho"];
	$tenKho = $_POST["tenKho"];
	$diaChi = $_POST["diaChi"];
	$kichThuoc = $_POST["kichThuoc"];
	$loaiKho = $_POST["loaiKho"];
	$sqlKho = "SELECT * FROM `phieunhapsanpham` WHERE maKho = $maKho";
	$check = mysqli_fetch_assoc(mysqli_query($conn,$sqlKho));
	if(isset($check)){
		$sqlLK = "SELECT  `loaiKho` FROM `kho` WHERE maKho = 14";
		$lk = mysqli_fetch_assoc(mysqli_query($conn,$sqlLK));
		$loaiKhoChua = $lk["loaiKho"];
		if($loaiKho == $loaiKhoChua){
			$sql = "UPDATE `kho` SET `tenKho`='$tenKho',`diaChi`='$diaChi',`kichThuoc`=$kichThuoc WHERE maKho = $maKho";
			mysqli_query($conn,$sql);
			header("location: /CodeBTL/KhoChua.php");
		}
		else{
			?>
	<script>
		alert("Kho này đang chứa sản phẩm, không thể thay đổi loại kho");
		location.replace("SuaKhoChua.php?id=<?php echo $maKho ?>")
	</script>
	<?php
		}
	}
	else{
		$sqlAll = "UPDATE `kho` SET `tenKho`='$tenKho',`diaChi`='$diaChi',`kichThuoc`=$kichThuoc,`loaiKho`='$loaiKho' WHERE maKho = $maKho";
		mysqli_query($conn,$sqlAll);
		header("location: /CodeBTL/KhoChua.php");
	}
	?>
<body>
</body>
</html>