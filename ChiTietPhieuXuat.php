<html>
<head>
<meta charset="utf-8">
<title>Chi tiết phiếu xuất</title>
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
		.tb2 td{
			border: 1px solid;
		}
		.hoantat{
			margin-top: 10px;
			margin-left: 68%;
			margin-right: 10px;
		}
		.tong{
			margin-left: 22%;
			margin-top: 5px;
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
	$maPhieu = $_GET["id"];
	$_SESSION["maPhieu"] = $maPhieu;
	$sqlPhieu = "SELECT `maPhieu`, `ngayXuat`, `maNV`, `maDaiLy` FROM `phieuxuat` WHERE maPhieu = 		$maPhieu";
	$phieu = mysqli_fetch_assoc(mysqli_query($conn,$sqlPhieu));
	$maDaiLy = $phieu["maDaiLy"];
	$sqlDaiLy = "SELECT `maDaiLy`, `tenDaiLy`, `sDT`, `diaChi` FROM `daily` WHERE maDaiLy = 			$maDaiLy";
	$daiLy = mysqli_fetch_assoc(mysqli_query($conn,$sqlDaiLy));
	$tenDaiLy = $daiLy["tenDaiLy"];
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Phiếu xuất sản phẩm</h2>
	<form action="#" method="post">
		<table class="tb1">
		<tr>
			<td>Mã nhân viên:</td>
			<td><?php echo $phieu["maNV"] ?></td>
		</tr>
		<tr>
			<td>Ngày xuất:</td>
			<td><input type="date" name="ngayXuat" value="<?php echo $phieu["ngayXuat"] ?>"></td>
		</tr>
		<tr>
			<td>Đại lý:</td>
			<td><select name="maDaiLy">
				<option disabled>Mã đại lý - Tên đại lý</option>
				<option value="<?php echo $maDaiLy ?>"><?php echo("$maDaiLy - $tenDaiLy") ?></option>
				<?php
				$sql = "SELECT `maDaiLy`, `tenDaiLy`, `sDT`, `diaChi` FROM `daily`";
				$dsDL = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($dsDL)){
					$mdl = $row["maDaiLy"];
					$tdl = $row["tenDaiLy"];
				?>
				<option value="<?php echo $row["maDaiLy"] ?>"><?php echo("$mdl - $tdl") ?></option>
				<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Số điện thoại:</td>
			<td><?php echo $daiLy["sDT"] ?></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><?php echo $daiLy["diaChi"] ?></td>
		</tr>
		</table>
		<h3 align="center">Danh sách sản phẩm</h3>
		<table class="tb2">
			<tr>
				<td>Tên sản phẩm</td>
				<td>Ngày sản xuất</td>
				<td>Hạn sử dụng</td>
				<td>Số lượng xuất</td>
				<td>Đơn vị tính</td>
				<td>Đơn giá</td>
				<td>Thành tiền</td>
				<td>Chức năng</td>
			</tr>
			<?php
			$sqlSPX = "SELECT `maSP`, `maCTSP`, `soLuongXuat`, `donGia` FROM `phieuxuatsanpham` WHERE 	maPhieu = $maPhieu";
			$dsSPX = mysqli_query($conn,$sqlSPX);
			while($row = mysqli_fetch_assoc($dsSPX)){
				$maCTSP = $row["maCTSP"];
				$sqlSanPham = "SELECT  `ngaySanXuat`, `hanSD`, tenSP, donViTinh 
					FROM `chitietsanpham` INNER JOIN sanpham on sanpham.maSP=chitietsanpham.maSP
					WHERE maCTSP = $maCTSP";
				$sanPham = mysqli_fetch_assoc(mysqli_query($conn,$sqlSanPham));
				$date = date_create($sanPham["ngaySanXuat"]);
			?>
			<tr>
				<td><?php echo $sanPham["tenSP"] ?></td>
				<td><?php echo date_format($date,"d-m-Y") ?></td>
				<td><?php echo $sanPham["hanSD"] ?></td>
				<td><?php echo $row["soLuongXuat"] ?></td>
				<td><?php echo $sanPham["donViTinh"] ?></td>
				<td><?php echo $row["donGia"] ?></td>
				<td><?php echo $row["donGia"]*$row["soLuongXuat"] ?></td>
				<td align="center"><a href="#">Sửa</a></td>
			</tr>
			<?php
			}
			$sqlTong = "SELECT SUM(soLuongXuat*donGia) FROM `phieuxuatsanpham` 
				WHERE maPhieu = $maPhieu
				GROUP BY maPhieu";
			$tong = mysqli_fetch_assoc(mysqli_query($conn,$sqlTong));
			$tongTien = $tong["SUM(soLuongXuat*donGia)"];
			?>
		</table>
		<p class="tong"><?php echo("Tổng tiền: $tongTien") ?></p>
		<input type="submit" value="Hoàn tất" class="hoantat">
		<input type="button" value="Quay lại" onClick="QuayLai()">
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
	function QuayLai(){
		location.replace("PhieuXuat.php");
	}
</script>