<html>
<head>
<meta charset="utf-8">
<title>Thêm phiếu nhập</title>
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
		.tb3 td{
			border: 1px solid;
		}
		.them{
			margin-left: 33%;
			margin-top: 10px;
		}
		.canhbao{
			text-align: center;
			color: red;
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
	$sqlKhoiTao = "CREATE TABLE IF NOT EXISTS SanPhamNhap(
    maSP int,
	ngaySX date,
    soLuongNhap int,
    maKho int
    )";
	mysqli_query($conn,$sqlKhoiTao);
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	<h2 align="center">Phiếu nhập sản phẩm</h2>
	<form action="ThemPhieuNhap.php" method="post">
		<table class="tb1">
			<tr>
				<td>Mã nhân viên:</td>
				<td><?php echo $_SESSION["maNV"] ?></td>
			</tr>
			<tr>
				<td>Ngày nhập:</td>
				<td><input type="date" name="ngayNhap" value="<?php echo date("Y-m-d") ?>"></td>
			</tr>
		</table>
		<h4 align="center">Thêm sản phẩm nhập</h4>
		<table>
			<tr>
				<td>Chọn sản phẩm:</td>
				<td><select name="sanPham">
					<option disabled>Tên sản phẩm - Đơn vị tính - Loại sản phẩm</option>
					<?php
					$sqlSanPham = "SELECT `maSP`, `tenSP`, `donViTinh`, `kichThuoc`, `loaiSP` FROM `sanpham` ";
					$dsSP = mysqli_query($conn,$sqlSanPham);
					while($row = mysqli_fetch_assoc($dsSP)){
						$tenSP = $row["tenSP"];
						$dVT = $row["donViTinh"];
						$loaiSP = $row["loaiSP"];
					?>
					<option value="<?php echo $row["maSP"] ?>"><?php echo("$tenSP - $dVT - $loaiSP") ?></option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Ngày sản xuất:</td>
				<td><input type="date" name="ngaySX" value="<?php echo date("Y-m-d") ?>"></td>
			</tr>
			<tr>
				<td>Số lượng nhập:</td>
				<td><input type="text" name="soLuongNhap"></td>
			</tr>
			<tr>
				<td>Chọn kho chứa</td>
				<td><select name="khoChua">
					<option disabled>Tên kho - Địa chỉ - Loại kho</option>
					<?php
					$sqlKho = "SELECT `maKho`, `tenKho`, `diaChi`, `loaiKho` FROM `kho`";
					$dsKho = mysqli_query($conn,$sqlKho);
					while($row = mysqli_fetch_assoc($dsKho)){
						$tenKho = $row["tenKho"];
						$diaChi = $row["diaChi"];
						$loaiKho = $row["loaiKho"];
					?>
					<option value="<?php echo $row["maKho"] ?>"><?php echo("$tenKho - $diaChi - $loaiKho") ?></option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">*Chú ý: Loại sản phẩm phải trùng với loại kho</td>
			</tr>
		</table>
		<input type="submit" value="Thêm" class="them" name="them">
	</form>
	<?php
	if(isset($_POST["them"])){
		$maSP = $_POST["sanPham"];
		$ktKho = 0;
		$ktDung = 0;
		$ktSP = 1;
		$soLuongNhap = $_POST["soLuongNhap"];
		$maKho = $_POST["khoChua"];
		$ngaySX = $_POST["ngaySX"];

		$lsp = "SELECT  `loaiSP` FROM `sanpham` WHERE maSP = $maSP";
		$sp = mysqli_fetch_assoc(mysqli_query($conn,$lsp));
		$loaisp = $sp["loaiSP"];
		
		$lkho = "SELECT `loaiKho` FROM `kho` WHERE maKho = $maKho";
		$kho = mysqli_fetch_assoc(mysqli_query($conn,$lkho));
		$loaikho = $kho["loaiKho"];
		
		if($loaikho != $loaisp){
			echo("<p class='canhbao'>Loại sản phẩm phải trùng với loại kho</p>");
		}
		else if(is_numeric($soLuongNhap)){
			$sqlSPK = "SELECT `maSP`,`maCTSP`, `soLuongNhap` FROM `phieunhapsanpham` WHERE maKho = $maKho";
			$dsSPK = mysqli_query($conn,$sqlSPK);
			$dsSPK1 = mysqli_query($conn,$sqlSPK);
			$check = mysqli_fetch_assoc($dsSPK1);
			if(isset($check)){
			while($row = mysqli_fetch_assoc($dsSPK)){
				$soLuongKho = $row["soLuongNhap"];
				
				$maSPK = $row["maSP"];
				
				$maCTSPK = $row["maCTSP"];
				
				$sqlKTSP = "SELECT  `kichThuoc` FROM `sanpham` WHERE maSP = $maSPK";
				$ktsp = mysqli_fetch_assoc(mysqli_query($conn,$sqlKTSP));
				$ktSP = $ktsp["kichThuoc"];
				
				$sqlSLN = "SELECT `soLuongNhap` FROM `phieunhapsanpham` WHERE maCTSP = $maCTSPK";
				$soluongnhap = mysqli_fetch_assoc(mysqli_query($conn,$sqlSLN));
				$slNhap = $soluongnhap["soLuongNhap"];
				
				$sqlSLX = "SELECT `soLuongXuat` FROM `phieuxuatsanpham` WHERE maCTSP = $maCTSPK";
				$soluongxuat = mysqli_fetch_assoc(mysqli_query($conn,$sqlSLX));
				if(isset($soluongxuat)){
					$slXuat = $soluongxuat["soLuongXuat"];
				}
				else{
					$slXuat = 0;
				}
				$ktDung += $ktSP*($slNhap-$slXuat);
				}
			}
			$sqlKTK = "SELECT  `kichThuoc` FROM `kho` WHERE maKho = $maKho";
			$kt = mysqli_fetch_assoc(mysqli_query($conn,$sqlKTK));
			$ktKho = $kt["kichThuoc"]*0.8;
			
			$sqlKTSP = "SELECT  `kichThuoc` FROM `sanpham` WHERE maSP = $maSP";
			$ktsp = mysqli_fetch_assoc(mysqli_query($conn,$sqlKTSP));
			$ktSP = $ktsp["kichThuoc"];
			
			$spTrong = ($ktKho - $ktDung)/$ktSP;
			$spTrong = floor($spTrong);
			
			if($soLuongNhap <= $spTrong){
				$sqlTam = "INSERT INTO `sanphamnhap`(`maSP`, `ngaySX`, `soLuongNhap`, `maKho`) VALUES ($maSP,'$ngaySX',$soLuongNhap,$maKho)";
				mysqli_query($conn,$sqlTam);
			}
			else{
				echo("<p class='canhbao'>Kho trên chỉ có thể chứa thêm tối đa $spTrong sản phẩm</p>");
			}
		}
		else{
			echo("<p class='canhbao'>Số lượng nhập là một số nguyên dương</p>");
		}
	}
	?>
	<h3 align="center">Danh sách sản phẩm</h3>
	<table class="tb3">
		<tr>
			<td>Tên sản phẩm</td>
			<td>Đơn vị tính</td>
			<td>Kích thước</td>
			<td>Số lượng nhập</td>
			<td>Loại sản phẩm</td>
			<td>Mã kho</td>
			<td>Chức năng</td>
		</tr>
		<?php
		$sqlSPN = "";
		?>
		<tr>
		</tr>
		<?php
			?>
	</table>
	<input type="button" value="Hoàn tất" class="hoantat">
	<input type="button" value="Hủy" onClick="QuayLai()">
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
		location.replace("PhieuNhap.php");
	}
</script>