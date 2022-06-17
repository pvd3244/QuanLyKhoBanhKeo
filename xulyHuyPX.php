<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	require("KetNoiCSDL.php");
	$sql = "DROP TABLE IF EXISTS sanphamxuat";
	mysqli_query($conn,$sql);
	header("location: /CodeBTL/PhieuXuat.php");
	?>
<body>
</body>
</html>