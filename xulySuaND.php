<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	$maNV = $_SESSION["maNV"];
	$tenNV = $_POST["tenNV"];
	$tuoi = $_POST["tuoi"];
	$sDT = $_POST["sDT"];
	$diaChi = $_POST["diaChi"];
	if($tenNV=="" || $tuoi=="" || $sDT=="" || $diaChi==""){
	?>
	<script>
		function Mess(){
			alert("Bạn cần điền đầy đủ thông tin.");
			location.replace("ThongTinNhanVien.php");
		}
		Mess();
	</script>
	<?php
	}
	else{
		$sql = "UPDATE `nhanvien` SET `tenNV`='$tenNV',`tuoi`=$tuoi,`sDT`='$sDT',`diaChi`='$diaChi'
		WHERE maNV = $maNV";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
	?>
	<script>
		function Mess(){
			alert("Thay đổi thông tin cá nhân thành công.");
			location.replace("ThongTinNhanVien.php");
		}
		Mess();
	</script>
	<?php
	}
	?>
<body>
</body>
</html>