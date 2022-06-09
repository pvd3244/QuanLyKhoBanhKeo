<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	$maSP = $_SESSION['maSP'];
	$maCTSP = $_SESSION["maCTSP"];
	$ngaySX = $_POST["ngaySX"];
	$hanSD = $_POST["hanSD"];
	$sql = "UPDATE `chitietsanpham` SET `ngaySanXuat`='$ngaySX',`hanSD`=$hanSD 
		WHERE maCTSP = $maCTSP";
	mysqli_query($conn, $sql);
	header("location: /CodeBTL/ChiTietSanPham.php?id=$maSP");
	?>
<body>
</body>
</html>