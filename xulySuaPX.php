<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	require("KetNoiCSDL.php");
	session_start();
	$maPhieu = $_SESSION["maPhieu"];
	$ngayXuat = $_POST["ngayXuat"];
	$maDaiLy = $_POST["maDaiLy"];
	$sql = "UPDATE `phieuxuat` SET `ngayXuat`='$ngayXuat',`maDaiLy`=$maDaiLy WHERE maPhieu = $maPhieu";
	mysqli_query($conn,$sql);
	header("location: /CodeBTL/PhieuXuat.php");
?>
<body>
</body>
</html>