
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	$maDaiLy = $_GET["id"];
	$sql = "DELETE FROM `daily` WHERE maDaiLy = $maDaiLy";
	mysqli_query($conn,$sql);
	header("location: /CodeBTL/DaiLy.php");
	?>
<body>
</body>
</html>