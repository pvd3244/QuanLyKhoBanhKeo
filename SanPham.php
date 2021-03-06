<html>
<head>
<meta charset="utf-8">
<title>Quản lý sản phẩm</title>
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
		.tbSanPham td{
			border: 1px solid;
			border-collapse: collapse;
			padding: 5px;
		}
		.tbSanPham{
			display: flex;
			justify-content: center;
		}
		.them{
			margin-left: 24%;
			margin-bottom: 10px;
		}
		.nhap{
			margin-bottom: 10px;
			margin-left: 10px;
			margin-right: 10px;
		}
		.ql{
			margin-left: 69%;
			margin-top: 10px;
		}
		.footer{
			margin-top: 15%;
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
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Danh sách sản phẩm</h2>
	<input type="button" value="Thêm sản phẩm" class="them" onClick="ThemSP()">
	<input type="button" value="Nhập sản phẩm" class="nhap" onClick="NhapSP()">
	<input type="button" value="Xuất sản phẩm" class="xuat" onClick="XuatSP()">
	<table class="tbSanPham">
		<tr>
			<td>Mã sản phẩm</td>
			<td>Tên sản phẩm</td>
			<td>Số lượng</td>
			<td>Đơn vị tính</td>
			<td>Kích thước</td>
			<td>Loại sản phẩm</td>
			<td colspan="3" align="center">Chức năng</td>
		</tr>
		<?php
			$sqlGoiSanPham = "SELECT * FROM `sanpham`";
			$dsSanPham = mysqli_query($conn, $sqlGoiSanPham);
			while($row = mysqli_fetch_assoc($dsSanPham)){
				$maSP = $row["maSP"];
				$sqlGoiSoNhap = "SELECT  sum(soLuongNhap)
				from phieunhapsanpham
				WHERE maSP = $maSP
				GROUP by maSP";
				$soLuongNhap = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSoNhap));
				$sqlGoiSoXuat = "SELECT  sum(soLuongXuat)
				from phieuxuatsanpham
				WHERE maSP = $maSP
				GROUP by maSP";
				$soLuongXuat = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSoXuat));
				if($soLuongXuat)
					$soLuong = $soLuongNhap["sum(soLuongNhap)"]-$soLuongXuat["sum(soLuongXuat)"];
				else if($soLuongNhap)
					$soLuong = $soLuongNhap["sum(soLuongNhap)"];
				else
					$soLuong = 0;
		?>
		<tr>
			<td><?php echo $maSP ?></td>
			<td><?php echo $row["tenSP"] ?></td>
			<td><?php echo $soLuong ?></td>
			<td><?php echo $row["donViTinh"] ?></td>
			<td><?php echo $row["kichThuoc"] ?></td>
			<td><?php echo $row["loaiSP"] ?></td>
			<td><a href="ChiTietSanPham.php?id=<?php echo $maSP ?>">Chi tiết</a></td>
			<td><a href="SuaSanPham.php?id=<?php echo $maSP ?>">Sửa</a></td>
			<td><a href="xulyXoaSP.php?id=<?php echo $maSP ?>">Xóa</a></td>
		</tr>
		<?php
			}
			?>
	</table>
	<input type="button" class="ql" value="Về trang chủ" onClick="QuayLai()">
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
	<?php
	mysqli_close($conn);
	?>
</body>
</html>
<script>
	function ThemSP(){
		location.replace("ThemSanPham.php");
	}
	function NhapSP(){
		location.replace("PhieuNhap.php");
	}
	function XuatSP(){
		location.replace("PhieuXuat.php");
	}
	function QuayLai(){
		location.replace("TrangChu.php");
	}
</script>