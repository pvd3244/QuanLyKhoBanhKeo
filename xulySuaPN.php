<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	$maPN = $_SESSION["maPN"];
	$ngayNhap = $_POST["ngayNhap"];
	$sql = "UPDATE `phieunhap` SET `ngayNhap`='$ngayNhap'
		WHERE maPhieu = $maPN";
	mysqli_query($conn, $sql);
	header("location: /CodeBTL/PhieuNhap.php");
	?>
<body>
</body>
</html>