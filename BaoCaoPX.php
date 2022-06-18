<html>
<head>
<meta charset="utf-8">
<title>Hoạt động xuất kho</title>
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
			border: 1px solid;
		}
		.ql{
			margin-left: 77%;
			margin-top: 10px;
		}
		.thoigian{
			margin-left: 35%;
			margin-top: 10px;
		}
		.thongbao{
			margin-left: 18%;
		}
		.tong{
			margin-left: 18%;
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
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	function TruyVan($sql){
		$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
		$dsTruyVan = mysqli_query($conn,$sql);
		return $dsTruyVan;
	}
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Thống kê hoạt động xuất kho</h2>
	<form method="post" action="BaoCaoPX.php">
		<p class="thoigian">Ngày bắt đầu <input type="date" name="ngayBatDau" value="<?php echo date("Y-m-d") ?>"> Ngày kết thúc <input type="date" name="ngayKetThuc" value="<?php echo date("Y-m-d") ?>"> <input type="submit" value="Thống kê" name="thongKe"></p>
		<h3 align="center">Danh sách sản phẩm</h3>
		<?php
			if(isset($_POST["thongKe"])){
				$ngayBatDau = $_POST["ngayBatDau"];
				$ngayKetThuc = $_POST["ngayKetThuc"];
				$ngayBD = date_create($ngayBatDau);
				$ngayKT = date_create($ngayKetThuc);
				echo("<p class='thongbao'>Từ ".date_format($ngayBD,"d-m-Y")." đến ".date_format($ngayKT,"d-m-Y")." </p>");
			}
		?>
		<table>
			<tr>
			<td>Tên sản phẩm</td>
			<td>Loại sản phẩm</td>
			<td>Số lượng xuất</td>
			<td>Đơn vị tính</td>
			<td>Kích thước</td>
			<td>Ngày sản xuất</td>
			<td>Hạn sử dụng</td>
			<td>Đơn giá</td>
			<td>Thành tiền</td>
		</tr>
		<?php
		if(isset($_POST["thongKe"])){
			$ngayBatDau = $_POST["ngayBatDau"];
			$ngayKetThuc = $_POST["ngayKetThuc"];
			$dsSP = TruyVan("SELECT tenSP,donViTinh,kichThuoc,soLuongXuat,`ngaySanXuat`, `hanSD`,loaiSP,donGia  
			FROM `chitietsanpham` INNER JOIN sanpham on chitietsanpham.maSP = sanpham.maSP INNER JOIN phieuxuatsanpham
			ON chitietsanpham.maCTSP = phieuxuatsanpham.maCTSP INNER JOIN phieuxuat on phieuxuat.maPhieu = phieuxuatsanpham.maPhieu
			WHERE phieuxuat.ngayXuat BETWEEN '$ngayBatDau' AND '$ngayKetThuc'");
			while($row = mysqli_fetch_assoc($dsSP)){
				$date = date_create($row["ngaySanXuat"]);
			?>
			<tr>
				<td><?php echo $row["tenSP"] ?></td>
				<td><?php echo $row["loaiSP"] ?></td>
				<td><?php echo $row["soLuongXuat"] ?></td>
				<td><?php echo $row["donViTinh"] ?></td>
				<td><?php echo $row["kichThuoc"] ?></td>
				<td><?php echo date_format($date,"d-m-Y") ?></td>
				<td><?php echo $row["hanSD"] ?></td>
				<td><?php echo $row["donGia"] ?></td>
				<td><?php echo $row["soLuongXuat"]*$row["donGia"] ?></td>
			</tr>
		<?php
			}
		}
		else{
			$dsSP = TruyVan("SELECT tenSP,donViTinh,kichThuoc,soLuongXuat,`ngaySanXuat`, `hanSD`,loaiSP ,donGia 
			FROM `chitietsanpham` INNER JOIN sanpham on chitietsanpham.maSP = sanpham.maSP INNER JOIN phieuxuatsanpham
			ON chitietsanpham.maCTSP = phieuxuatsanpham.maCTSP");
			while($row = mysqli_fetch_assoc($dsSP)){
				$date = date_create($row["ngaySanXuat"]);
		?>
			<tr>
				<td><?php echo $row["tenSP"] ?></td>
				<td><?php echo $row["loaiSP"] ?></td>
				<td><?php echo $row["soLuongXuat"] ?></td>
				<td><?php echo $row["donViTinh"] ?></td>
				<td><?php echo $row["kichThuoc"] ?></td>
				<td><?php echo date_format($date,"d-m-Y") ?></td>
				<td><?php echo $row["hanSD"] ?></td>
				<td><?php echo $row["donGia"] ?></td>
				<td><?php echo $row["soLuongXuat"]*$row["donGia"] ?></td>
			</tr>
		<?php
			}
		}
		?>
		</table>
		<?php
		$tongTien = 0;
		if(isset($_POST["thongKe"])){
			$ngayBatDau = $_POST["ngayBatDau"];
			$ngayKetThuc = $_POST["ngayKetThuc"];
			$dsSP = TruyVan("SELECT tenSP,donViTinh,kichThuoc,soLuongXuat,`ngaySanXuat`, `hanSD`,loaiSP,donGia  
			FROM `chitietsanpham` INNER JOIN sanpham on chitietsanpham.maSP = sanpham.maSP INNER JOIN phieuxuatsanpham
			ON chitietsanpham.maCTSP = phieuxuatsanpham.maCTSP INNER JOIN phieuxuat on phieuxuat.maPhieu = phieuxuatsanpham.maPhieu
			WHERE phieuxuat.ngayXuat BETWEEN '$ngayBatDau' AND '$ngayKetThuc'");
			while($row = mysqli_fetch_assoc($dsSP)){
				$tongTien += $row["soLuongXuat"]*$row["donGia"];
			}
			echo("<p class='tong'>Tổng tiền: $tongTien</p>");
		}
		else{
			$dsSP = TruyVan("SELECT tenSP,donViTinh,kichThuoc,soLuongXuat,`ngaySanXuat`, `hanSD`,loaiSP ,donGia 
			FROM `chitietsanpham` INNER JOIN sanpham on chitietsanpham.maSP = sanpham.maSP INNER JOIN phieuxuatsanpham
			ON chitietsanpham.maCTSP = phieuxuatsanpham.maCTSP");
			while($row = mysqli_fetch_assoc($dsSP)){
				$tongTien += $row["soLuongXuat"]*$row["donGia"];
			}
			echo("<p class='tong'>Tổng tiền: $tongTien</p>");
		}
		?>
	</form>
	<input type="button" value="Quay lại" onClick="QuayLai()" class="ql">
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
	function QuayLai(){
		location.replace("PhieuXuat.php");
	}
</script>