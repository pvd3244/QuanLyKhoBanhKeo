<html>
<head>
<meta charset="utf-8">
<title>Xem sản phẩm trong kho</title>
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
		h3{
			color: red;
		}
		table{
			margin-top: 10px;
			display: flex;
			justify-content: center;
		}
		table td{
			border: 1px solid;
			padding: 5px;
		}
		.ql{
			margin-left: 63%;
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
	$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
	session_start();
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Danh sách sản phẩm trong kho</h2>
	<?php
	$maKho = $_GET["id"];
	$sqlKT = "SELECT `maSP`, `maCTSP`, `soLuongNhap` FROM `phieunhapsanpham` 
			WHERE maKho = $maKho";
	$kiemTra1 = mysqli_query($conn, $sqlKT);
	$kiemTra = mysqli_query($conn, $sqlKT);
	$check = mysqli_fetch_assoc($kiemTra1);
	if(!isset($check)){
		echo("<h3 align = 'center'>Kho chứa này không chứa sản phẩm nào</h3>");	
	}
	else{
		?>
	<table>
		<tr>
			<td>Tên sản phẩm</td>
			<td>Đơn vị tính</td>
			<td>Số lượng</td>
			<td>Ngày sản xuất</td>
			<td>Hạn sử dụng</td>
		</tr>
		<?php
		while($kho = mysqli_fetch_assoc($kiemTra)){
			$maSP = $kho["maSP"];
			$maCTSP = $kho["maCTSP"];
			$sqlGoiSanPham = "SELECT `tenSP`, `donViTinh` FROM `sanpham` WHERE maSP = $maSP";
			$sanPham = mysqli_fetch_assoc(mysqli_query($conn, $sqlGoiSanPham));
			$tenSP = $sanPham["tenSP"];
			$donViTinh = $sanPham["donViTinh"];
			$sqlCTSP = "SELECT `maCTSP`,`ngaySanXuat`, `hanSD` FROM `chitietsanpham` 
			WHERE maCTSP = $maCTSP";
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
		</tr>
		<?php
			}
			}
			?>
	</table>
	<?php
	}
	?>
	<input type="button" value="Quay lại" onClick="DieuHuong()" class="ql">
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
		location.replace("KhoChua.php");
	}
</script>