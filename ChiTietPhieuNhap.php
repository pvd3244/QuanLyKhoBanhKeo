<html>
<head>
<meta charset="utf-8">
<title>Chi tiết phiếu nhập</title>
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
		.tb1{
			display: flex;
			justify-content: center;
		}
		.tb1 td{
			padding-left: 10px;
		}
		.tb2{
			display: flex;
			justify-content: center;
		}
		.tb2 td{
			padding: 5px;
			border: 1px solid;
		}
		.cn{
			margin-left: 71.5%;
			margin-top: 10px;
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
	$maPN = $_GET['id'];
	$_SESSION['maPN'] = $maPN;
	$sql = "SELECT * FROM `phieunhap` 
		WHERE maPhieu = $maPN";
	$phieuNhap = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$date = $phieuNhap["ngayNhap"];
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Chi tiết phiếu nhập</h2>
	<form action="xulySuaPN.php" method="post">
		<table class="tb1">
			<tr>
				<td>Mã phiếu nhập:</td>
				<td><?php echo $phieuNhap["maPhieu"] ?></td>
			</tr>
			<tr>
				<td>Mã nhân viên:</td>
				<td><?php echo $phieuNhap["maNV"] ?></td>
			</tr>
			<tr>
				<td>Ngày nhập:</td>
				<td><input type="date" name="ngayNhap" value="<?php echo($date) ?>"></td>
			</tr>
		</table>
	<h3 align="center">Danh sách sản phẩm</h3>
	<table class="tb2" cellpadding="0" cellspacing="0">
		<tr>
			<td>Tên sản phẩm</td>
			<td>Đơn vị tính</td>
			<td>Số lượng nhập</td>
			<td>Kích thước</td>
			<td>Loại sản phẩm</td>
			<td>Ngày sản xuất</td>
			<td>Hạn sử dụng</td>
			<td>Mã kho</td>
			<td>Chức năng</td>
		</tr>
		<?php
			$sql = "SELECT `maCTSP`, `soLuongNhap`, `maKho` FROM `phieunhapsanpham` 
				WHERE maPhieu = $maPN";
			$dsSP = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($dsSP)){
				$maCTSP = $row["maCTSP"];
				$sql = "SELECT tenSP, donViTinh, kichThuoc, loaiSP, `ngaySanXuat`, `hanSD` 
					FROM `chitietsanpham` INNER JOIN sanpham on chitietsanpham.maSP = sanpham.maSP
					WHERE maCTSP = $maCTSP";
				$sanPham = mysqli_query($conn, $sql);
				while($SP = mysqli_fetch_assoc($sanPham)){
					$date = date_create($SP["ngaySanXuat"]);
		?>
		<tr>
			<td><?php echo $SP["tenSP"] ?></td>
			<td><?php echo $SP["donViTinh"] ?></td>
			<td><?php echo $row["soLuongNhap"] ?></td>
			<td><?php echo $SP["kichThuoc"] ?></td>
			<td><?php echo $SP["loaiSP"] ?></td>
			<td><?php echo date_format($date, "d-m-Y") ?></td>
			<td><?php echo $SP["hanSD"] ?></td>
			<td><?php echo $row["maKho"] ?></td>
			<td align="center"><a href="SuaPhieuNhap.php?id=<?php echo $maCTSP ?>">Sửa</a></td>
		</tr>
		<?php
		}
		}
		?>
	</table>
	<input type="submit" value="Hoàn tất" class="cn">
	<input type="button" value="Quay lại" onClick="Quaylai()">
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
		location.replace("PhieuNhap.php");
	}
</script>