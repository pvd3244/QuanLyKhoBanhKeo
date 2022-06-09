<html>
<head>
<meta charset="utf-8">
<title>Chi tiết sản phẩm</title>
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
			margin-top: 15%;
		}
		.tbSanPham{
			display: flex;
			justify-content: center;
		}
		.tbSanPham td{
			padding: 5px;
			border: 1px solid;
			border-collapse: collapse;
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
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Chi tiết sản phẩm</h2>
	<table class="tbSanPham">
		<tr>
			<td>Tên sản phẩm</td>
			<td>Đơn vị tính</td>
			<td>Số lượng</td>
			<td>Ngày sản xuất</td>
			<td>Hạn sử dụng</td>
			<td colspan="2">Chức năng</td>
		</tr>
		<?php
			$maSP = $_GET["id"];
			$_SESSION["maSP"] = $maSP;
			$sqlGoiSanPham = "SELECT `tenSP`, `donViTinh` FROM `sanpham` WHERE maSP = $maSP";
			$sanPham = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSanPham));
			$tenSP = $sanPham["tenSP"];
			$donViTinh = $sanPham["donViTinh"];
			$sqlCTSP = "SELECT `maCTSP`,`ngaySanXuat`, `hanSD` FROM `chitietsanpham` 
			WHERE maSP = $maSP";
			$CTSP = mysqli_query($conn, $sqlCTSP);
			while($row = mysqli_fetch_assoc($CTSP)){
				$date = date_create($row["ngaySanXuat"]);
				$maCTSP = $row["maCTSP"];
				$sqlGoiSoNhap = "SELECT  sum(soLuongNhap)
				from phieunhapsanpham
				WHERE maCTSP = $maCTSP
				GROUP by maCTSP";
				$soLuongNhap = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSoNhap));
				$sqlGoiSoXuat = "SELECT  sum(soLuongXuat)
				from phieuxuatsanpham
				WHERE maCTSP = $maCTSP
				GROUP by maCTSP";
				$soLuongXuat = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSoXuat));
				if($soLuongXuat)
					$soLuong = $soLuongNhap["sum(soLuongNhap)"]-$soLuongXuat["sum(soLuongXuat)"];
				else
					$soLuong = $soLuongNhap["sum(soLuongNhap)"];
		?>
		<tr>
			<td><?php echo $tenSP ?></td>
			<td><?php echo $donViTinh ?></td>
			<td><?php echo $soLuong ?></td>
			<td><?php echo date_format($date,"d-m-Y") ?></td>
			<td><?php echo $row["hanSD"] ?></td>
			<td><a href="SuaCTSanPham.php?id=<?php echo $maCTSP ?>">Sửa</a></td>
			<td><a href="xulyXoaCTSP.php?id=<?php echo $maCTSP ?>">Xóa</a></td>
		</tr>
		<?php
			}
		?>
	</table>
	<input class="ql" type="button" value="Quay lại" onClick="Quaylai()">
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
	function Quaylai(){
		location.replace("SanPham.php");
	}
</script>