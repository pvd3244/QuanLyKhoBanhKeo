<html>
<head>
<meta charset="utf-8">
<title>Sửa sản phẩm nhập</title>
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
		.tb{
			display: flex;
			justify-content: center;
		}
		.tb td{
			padding: 5px;
		}
		.cn{
			margin-left: 50%;
			margin-right: 10px;
			margin-top: 10px;
		}
		.footer{
			margin-top: 10%;
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
                     <a class="nav-link" href="">
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
	$maPN = $_SESSION["maPN"];
	$maCTSP = $_GET["id"];
	$_SESSION["maCTSP"] = $maCTSP;
	$sqlSP = "SELECT tenSP, donViTinh 
		FROM `chitietsanpham` INNER JOIN sanpham on chitietsanpham.maSP = sanpham.maSP
		WHERE maCTSP = $maCTSP";
	$sanPham = mysqli_fetch_assoc(mysqli_query($conn, $sqlSP));
	$sqlPN = "SELECT `soLuongNhap`, `maKho` 
		FROM `phieunhapsanpham` 
		WHERE maCTSP = $maCTSP";
	$PN = mysqli_fetch_assoc(mysqli_query($conn, $sqlPN));
	$_SESSION["maKho"] = $PN["maKho"];
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Sửa sản phẩm nhập</h2>
	<form action="xulySuaSPN.php" method="post">
		<table class="tb" cellpadding="0" cellspacing="0">
			<tr>
				<td>Tên sản phẩm:</td>
				<td><?php echo $sanPham["tenSP"] ?></td>
			</tr>
			<tr>
				<td>Đơn vị tính:</td>
				<td><?php echo $sanPham["donViTinh"] ?></td>
			</tr>
			<tr>
				<td>Số lượng nhập:</td>
				<td><input type="text" name="soLuongNhap" value="<?php echo $PN["soLuongNhap"] ?>"></td>
			</tr>
			<tr>
				<td>Mã kho:</td>
				<td><?php echo $PN["maKho"] ?></td>
			</tr>
		</table>
		<input type="submit" value="Cập nhật" class="cn" name="capnhat">
		<input type="button" value="Quay lại" onClick="DieuHuong()">
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
	function DieuHuong(){
		location.replace("ChiTietPhieuNhap.php?id=<?php echo $maPN ?>");
	}
</script>