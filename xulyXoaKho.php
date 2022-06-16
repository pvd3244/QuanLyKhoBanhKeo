<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	$maKho = $_GET["id"];
	$sql = "SELECT * FROM `phieunhapsanpham` WHERE maKho = $maKho";
	$check = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	if(!isset($check)){
		$sqlXoa = "DELETE FROM `kho` WHERE maKho = $maKho";
		mysqli_query($conn,$sqlXoa);
		header("location: /CodeBTL/KhoChua.php");
	}
	else{
		?>
	<script>
		alert("Kho này đang chứa sản phẩm, không thể xóa");
		location.replace("KhoChua.php");
	</script>
	<?php
	}
	?>
<body>
</body>
</html>