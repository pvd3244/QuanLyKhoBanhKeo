<html>
<head>
<meta charset="utf-8">
<title>Thêm nhân viên</title>
	<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
			margin-top: 8%;
		}
		table{
			display: flex;
			justify-content: center;
		}
		table td{
			padding: 5px;
		}
		.them{
			margin-top: 10px;
			margin-left: 52%;
			margin-right: 10px;
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
                     <a class="nav-link" href="KiemTraTK.php">
                        Quản lý nhân viên
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="DaiLy.php">
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
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Thêm nhân viên</h2>
	<form action="ThemNhanVien.php" method="post">
		<table align="center">
			<tr>
				<td>Tên nhân viên:</td>
				<td><input type="text" name="tenNV"></td>
			</tr>
			<tr>
				<td>Tuổi:</td>
				<td><input type="text" name="tuoi"></td>
			</tr>
			<tr>
				<td>Số điện thoại:</td>
				<td><input type="text" name="sDT"></td>
			</tr>
			<tr>
				<td>Địa chỉ:</td>
				<td><input type="text" name="diaChi"></td>
			</tr>
			<tr>
				<td>Tài khoản:</td>
				<td><input type="text" name="taiKhoan"></td>
			</tr>
			<tr>
				<td>Mật khẩu:</td>
				<td><input type="text" name="matKhau"></td>
			</tr>
		</table>
		<input class="them" type="submit" value="Thêm" name="themMoi">
		<input class="ql" type="button" value="Quay lại" onClick="DieuHuong()">
	</form>
	<?php
	if(isset($_POST["themMoi"])){
		$tenNV = $_POST["tenNV"];
		$diaChi = $_POST["diaChi"];
		$sDT = $_POST["sDT"];
		$tuoi = $_POST["tuoi"];
		$tk = $_POST["taiKhoan"];
		$mk = $_POST["matKhau"];
		if($tenNV=="" || $diaChi=="" || $sDT=="" || $tuoi=="" || $tk=="" || $mk==""){
			echo("<p align='center'>Vui lòng điền đầy đủ thông tin</p>");
		}
		else{
			$sqlCheck = "SELECT * FROM `nhanvien` WHERE taiKhoan = '$tk'";
			$check = mysqli_fetch_assoc(mysqli_query($conn, $sqlCheck));
			if(isset($check)){
				echo("<p align='center'>Tên tài khoản đã tồn tại</p>");
			}
			else{
			$sql="INSERT INTO `nhanvien`( `tenNV`, `tuoi`, `sDT`, `diaChi`, `taiKhoan`, `matKhau`) VALUES ('$tenNV',$tuoi,'$sDT','$diaChi','$tk','$mk')";
			mysqli_query($conn,$sql);
			mysqli_close($conn);
		?>
	<script>
		function DieuHuong(){
			location.replace("NhanVien.php");
		}
		DieuHuong();
	</script>
	<?php
		}
		}
	}
	?>
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
	function DieuHuong(){
		location.replace("NhanVien.php");
	}
</script>