
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	require("KetNoiCSDL.php");
	session_start();
	$maDaiLy = $_SESSION["maDaiLy"];
	$tenDaiLy = $_POST["tenDaiLy"];
	$diaChi = $_POST["diaChi"];
	$sDT = $_POST["sDT"];
	$sql = "UPDATE `daily` SET `tenDaiLy`='$tenDaiLy',`sDT`='$sDT',`diaChi`='$diaChi' WHERE maDaiLy = $maDaiLy";
	mysqli_query($conn,$sql);
	unset($_SESSION["maDaiLy"]);
	mysqli_close($conn);
	header("location: /CodeBTL/DaiLy.php");
	?>
<body>
</body>
</html>