<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	$maCTSP = $_GET["id"];
	$sql = "DELETE FROM `sanphamxuat` WHERE maCTSP = $maCTSP";
	mysqli_query($conn,$sql);
	header("location: /CodeBTL/ThemPhieuXuat.php");
	?>
<body>
</body>
</html>