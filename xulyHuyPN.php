<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	$sql = "DROP TABLE IF EXISTS sanphamnhap";
	mysqli_query($conn,$sql);
	header("location: /CodeBTL/PhieuNhap.php");
	?>
<body>
</body>
</html>