<html>
<head>
<meta charset="utf-8">
<title>Quản lý nhân viên</title>
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
			border: 1px solid;
			padding: 5px;
		}
		.them{
			margin-left: 27%;
			margin-bottom: 10px;
		}
		.ql{
			margin-left: 66.5%;
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
                     <a class="nav-link" href="KhoChua.php">
                        Quản lý kho
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </div>
	<?php
	require("KetNoiCSDL.php");
	session_start();
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Quản lý nhân viên</h2>
	<input type="button" value="Thêm mới" onClick="DieuHuong()" class="them">
	<table>
		<tr>
			<td>Mã nhân viên</td>
			<td>Tên nhân viên</td>
			<td>Tuổi</td>
			<td>Địa chỉ</td>
			<td>Số điện thoại</td>
			<td>Tên tài khoản</td>
			<td colspan="2">Chức năng</td>
		</tr>
		<?php
		$sql = "SELECT * FROM `nhanvien` where taiKhoan != 'admin'";
		$nhanVien = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($nhanVien)){
		?>
		<tr>
			<td><?php echo $row["maNV"] ?></td>
			<td><?php echo $row["tenNV"] ?></td>
			<td><?php echo $row["tuoi"] ?></td>
			<td><?php echo $row["diaChi"] ?></td>
			<td><?php echo $row["sDT"] ?></td>
			<td><?php echo $row["taiKhoan"] ?></td>
			<td><a href="SuaNhanVien.php?id=<?php echo $row["maNV"] ?>">Sửa</a></td>
			<td><a href="xulyXoaNV.php?id=<?php echo $row["maNV"] ?>">Xóa</a></td>
		</tr>
		<?php
		}
		mysqli_close($conn);
		?>
	</table>
	<input type="button" value="Về trang chủ" onClick="Quaylai()" class="ql">
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
		location.replace("ThemNhanVien.php");
	}
	function Quaylai(){
		location.replace("TrangChu.php");
	}
</script>
