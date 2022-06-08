<html>
<head>
<meta charset="utf-8">
<title>Thông tin người dùng</title>
	<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
    />
   <link rel="stylesheet" href="self.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<style>
		a{
		text-decoration: none;
		}
		.footer{
			
		}
		.tb{
			display: flex;
			justify-content: center;
		}
		.tb td{
			padding: 5px;
		}
		.in{
			margin-top: 10px;
			margin-left: 54%;
		}
		.cn{
			margin-left: 57%;
			margin-top: 10px;
		}
	</style>
</head>

<body>
	<div id="navigation" class="">
      <nav class="navbar navbar-expand-lg">
         <div class="container-fluid">
            <a class="navbar-brand" href="TrangChu.php">
               <img alt="00066 - KIDO Logo" id="Header1_headerimg"
                  src="https://lh4.googleusercontent.com/-Xn_d78h5vDw/Xy4dZ8hcaLI/AAAAAAAAAB4/aiOZmkJI1FICVHWqs1ZtO4cHhmWTG5q8wCLcBGAsYHQ/s0/kido-logo.png"
                  style="display: block">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="TrangChu.php">
                        Trang chủ
                     </a>
                  </li>
                  <li class="nav-item" id="">
                     <a class="nav-link" href="SanPham.php">
                        Quản lý sản phẩm
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="">
                        Quản lý nhân viên
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="">
                        Quản lý đại lý
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="">
                        Quản lý kho
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </div>
	<?php
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	$maNV = $_SESSION["maNV"];
	$sql = "SELECT * FROM `nhanvien` 
	WHERE maNV = $maNV";
	$user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Thông tin người dùng</h2>
	<form action="xulySuaND.php" method="post">
		<table class="tb">
			<tr>
				<td>Tên người dùng</td>
				<td><input type="text" name="tenNV" value="<?php echo $user["tenNV"] ?>"></td>
			</tr>
			<tr>
				<td>Tuổi</td>
				<td><input type="text" name="tuoi" value="<?php echo $user["tuoi"] ?>"></td>
			</tr>
			<tr>
				<td>Số điện thoại</td>
				<td><input type="text" name="sDT" value="<?php echo $user["sDT"] ?>"></td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td><input type="text" name="diaChi" value="<?php echo $user["diaChi"] ?>"></td>
			</tr>
		</table>
		<input type="submit" value="Cập nhật" class="cn">
	</form>
	<?php
	mysqli_close($conn);
	?>
	<h2 align="center">Đổi mật khẩu</h2>
	<form action="ThongTinNhanVien.php" method="post">
		<table class="tb">
			<tr>
				<td>Mật khẩu cũ</td>
				<td><input type="password" name="mkCu"></td>
			</tr>
			<tr>
				<td>Mật khẩu mới</td>
				<td><input type="password" name="mkMoi"></td>
			</tr>
			<tr>
				<td>Xác nhận mật khẩu mới</td>
				<td><input type="password" name="mkXN"></td>
			</tr>
		</table>
		<div class="in">
			<input type="submit" value="Hoàn tất" name="doiMK">
			<input type="button" value="Quay về" onClick="Quaylai()">
		</div>
		<?php
		if(isset($_POST["doiMK"])){
		$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
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
			echo ("<p align='center'>Bạn cần điền đầy đủ các mật khẩu.</p>");
		}
		else if($mkCu != $mkSQL){
			echo("<p align='center'>Mật khẩu cũ sai.</p>");
		}
		else if($mkMoi != $mkXN){
			echo("<p align='center'>Xác nhận mật khẩu mới khác mật khẩu mới.</p>");
		}
		else{
			$sql = "UPDATE `nhanvien` SET `matKhau`='$mkMoi' 
				WHERE maNV = $maNV";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			echo("<p align='center'>Thay đổi mật khẩu thành công.</p>");
		}
		}
		?>
	</form>
	<div class="footer">
		<div id="footer-wapper">
      <div class="container">
         <div class="no-items section" id="footer-wapper"></div>
      </div>
   </div>
	<div class="copy-right-bottom text-center">
      Copyright © 2022. <a class="sitename" href="/" title="Bánh trung thu Kingdom">Bánh trung thu Kingdom</a>, Design
      by <a href="/" rel="nofllow" target="_blank">DHK Group</a>
   </div>
	</div>
</body>
</html>
<script>
	function Quaylai(){
		location.replace("TrangChu.php");
	}
</script>