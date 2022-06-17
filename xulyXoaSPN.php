<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	require("KetNoiCSDL.php");
	$maKho  = $_GET["id"];
	$sql = "DELETE FROM `sanphamnhap` WHERE maKho = $maKho";
	mysqli_query($conn,$sql);
	header("location: /CodeBTL/ThemPhieuNhap.php");
	?>
<body>
</body>
</html>