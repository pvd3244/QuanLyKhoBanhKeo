<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	
	if(isset($_POST["doiMK"])){
		session_start();
	header('X-UA-Compatible: IE=edge; charset=UTF-8');
		require("KetNoiCSDL.php");
		$maNV = $_SESSION["maNV"];
		$mkCu = $_POST["mkCu"];
		$mkMoi = $_POST["mkMoi"];
		$mkXN = $_POST["mkXN"];
		$sql = "SELECT `matKhau` 
		FROM `nhanvien` 
		WHERE maNV = $maNV";
		$mk = mysqli_fetch_assoc(mysqli_query($conn, $sql));
		$mkSQL = $mk["matKhau"];
		if($mkCu=="" || $mkMoi=="" || $mkXN==""){
			echo("Bạn cần điền đầy đủ các mật khẩu.");
		}
		else if($mkCu != $mkSQL){
			echo("Ma");
		}
		else if($mkMoi != $mkXN){
			echo("a");
		}
		else{
			
		}
	}
	?>
<body>
</body>
</html>