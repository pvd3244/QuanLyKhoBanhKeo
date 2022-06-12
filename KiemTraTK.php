<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	session_start();
	$tenTK = $_SESSION["taiKhoan"];
	if($tenTK == "admin"){
		header("location: /CodeBTL/NhanVien.php");
	}
	else{
		?>
	<script>
		function DieuHuong(){
			alert("Đây là chức năng dành cho người quản trị.");
			location.replace("TrangChu.php");
		}
		DieuHuong();
	</script>
	<?php
	}
	?>
<body>
</body>
</html>