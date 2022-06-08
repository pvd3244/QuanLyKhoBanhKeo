
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	session_start();
	unset($_SESSION['taiKhoan']);
	unset($_SESSION['maNV']);
	unset($_SESSION['tenNV']);
	header("Location: /CodeBTL/DangNhap.php");
	?>
<body>
</body>
</html>