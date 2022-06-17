<html>
<head>
<meta charset="utf-8">
<title>Thêm phiếu xuất</title>
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
			border-collapse: collapse;
		}
		.canhbao{
			text-align: center;
			color: red;
		}
		.them{
			margin-left: 31%;
			margin-top: 5px;
		}
		.tong{
			margin-left: 22%;
		}
		.ht{
			margin-right: 10px;
			margin-left: 70%;
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
	$khoiTao = "CREATE TABLE if NOT EXISTS sanphamxuat(
    					maCTSP int,
						soLuongXuat int,
    					donGia int
    					)";
	mysqli_query($conn,$khoiTao);
	function TruyVan($sql){
		$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
		$dsTruyVan = mysqli_query($conn, $sql);
		return $dsTruyVan;
	}
	function GoiGiaTri($tenGiaTri, $sql){
		$conn = mysqli_connect("localhost","root","123456","quanlykhohang");
		$gtTruyVan = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		if(isset($gtTruyVan))
			return $gtTruyVan["$tenGiaTri"];
		else
			return 0;
	}
	?>
	<div>
		<p align="right">Xin chào, <?php echo $_SESSION["tenNV"] ?> <a href="xulyDX.php">Đăng xuất</a></p>
	</div>
	
	<form action="ThemPhieuXuat.php" method="post">
	<h2 align="center">Phiếu xuất sản phẩm</h2>
		<table class="tb1">
			<tr>
				<td>Mã nhân viên:</td>
				<td><?php echo $_SESSION["maNV"] ?></td>
			</tr>
			<tr>
				<td>Ngày xuất:</td>
				<td><input type="date" name="ngayXuat" value="<?php echo date("Y-m-d") ?>"></td>
			</tr>
			<tr>
				<td>Đại lý:</td>
				<td><select name="maDaiLy">
					<option disabled>Tên đại lý -- Địa chỉ</option>
					<?php
					$dsDaiLy = TruyVan("SELECT `maDaiLy`, `tenDaiLy`, `diaChi` FROM `daily`");
					while($row = mysqli_fetch_assoc($dsDaiLy)){
						$tenDaiLy = $row["tenDaiLy"];
						$diaChi = $row["diaChi"];
					?>
					<option value="<?php echo $row["maDaiLy"] ?>"><?php echo("$tenDaiLy -- $diaChi") ?></option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>
		</table>
	<h3 align="center">Sản phẩm xuất</h3>
		<form>
			<table class="tb2">
				<tr>
					<td>Sản phẩm:</td>
					<td><select name="maCTSP">
						<option disabled>Tên sản phẩm - Ngày sản xuất - Hạn sử dụng - Còn lại
						</option>
						<?php
						$dsSanPham = TruyVan("SELECT maCTSP,`ngaySanXuat`, `hanSD`, tenSP, donViTinh 
							FROM `chitietsanpham` INNER JOIN sanpham on chitietsanpham.maSP = sanpham.maSP");
						while($row = mysqli_fetch_assoc($dsSanPham)){
							$maCTSP = $row["maCTSP"];
							$soLuongNhap = GoiGiaTri("soLuongNhap","SELECT `soLuongNhap` FROM `phieunhapsanpham` WHERE maCTSP = $maCTSP");
							$soLuongXuat = GoiGiaTri("SUM(soLuongXuat)","SELECT SUM(soLuongXuat) FROM `phieuxuatsanpham` WHERE maCTSP = $maCTSP GROUP BY maCTSP");
							$soLuongCon = $soLuongNhap - $soLuongXuat;
							$tenSP = $row["tenSP"];
							$ngaySX = date_create($row["ngaySanXuat"]);
							$ngaySX = date_format($ngaySX,'d-m-Y');
							$hanSD = $row["hanSD"];
							$dVT = $row["donViTinh"];
						?>
						<option value="<?php echo $row["maCTSP"] ?>"><?php echo("$tenSP - $ngaySX - $hanSD - $soLuongCon $dVT")?>
						</option>
						<?php
						}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Số lượng xuất:</td>
					<td><input type="text" name="soLuongXuat"></td>
				</tr>
				<tr>
					<td>Đơn giá:</td>
					<td><input type="text" name="donGia"></td>
				</tr>
			</table>
			<input type="submit" name="them" class="them" value="Thêm">
		</form>
		<?php
		if(isset($_POST["them"])){
			$maCTSP = $_POST["maCTSP"];
			$soLuongXuat = $_POST["soLuongXuat"];
			$donGia = $_POST["donGia"];
			$ngayXuat = $_POST["ngayXuat"];
			$maDaiLy = $_POST["maDaiLy"];
			$_SESSION["ngayXuat"] = $ngayXuat;
				$_SESSION["maDaiLy"] = $maDaiLy;
			if(is_numeric($soLuongXuat) || is_numeric($donGia)){
				if($soLuongXuat<0 || $donGia<0){
					echo("<p class='canhbao'>Số lượng xuất và đơn giá là số nguyên lớn hơn 0</p>");
				}
				else{
					$soLuongNhap = GoiGiaTri("soLuongNhap","SELECT `soLuongNhap` FROM `phieunhapsanpham` WHERE maCTSP = $maCTSP");
					$soLuongDaXuat = GoiGiaTri("SUM(soLuongXuat)","SELECT SUM(soLuongXuat) FROM 		`phieuxuatsanpham` WHERE maCTSP = $maCTSP GROUP BY maCTSP");
					$soLuongCon = $soLuongNhap - $soLuongDaXuat;
					if($soLuongXuat <= $soLuongCon){
						$sqlCheck = "SELECT * FROM `sanphamxuat` WHERE maCTSP = $maCTSP";
						$check = mysqli_fetch_assoc(mysqli_query($conn,$sqlCheck));
						if(isset($check)){
							echo("<p class='canhbao'>Sản phẩm này đã có trong danh sách, vui lòng chọn sản phẩm khác</p>");
						}
						else{
							$sql = "INSERT INTO `sanphamxuat`(`maCTSP`, `soLuongXuat`, `donGia`) 	VALUES ($maCTSP,$soLuongXuat,$donGia)";
							mysqli_query($conn,$sql);
						}
					}
					else{
						echo("<p class='canhbao'>Trong kho còn lại $soLuongCon sản phẩm này, vui lòng nhập lại số lượng xuất</p>");
					}
				}
			}
			else{
				echo("<p class='canhbao'>Số lượng xuất và đơn giá là số nguyên lớn hơn 0</p>");
			}
		}
		?>
	<h3 align="center">Danh sách sản phẩm</h3>
	<table class="tb3">
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
		$tongTien = GoiGiaTri("SUM(soLuongXuat*donGia)","SELECT SUM(soLuongXuat*donGia) FROM `sanphamxuat`");
		$dsSPX = TruyVan("SELECT `maCTSP`, `soLuongXuat`, `donGia` FROM `sanphamxuat`");
		while($row = mysqli_fetch_assoc($dsSPX)){
			$maCTSP = $row["maCTSP"];
			$ttSP = TruyVan("SELECT `ngaySanXuat`, `hanSD`, tenSP, donViTinh 
				FROM `chitietsanpham` INNER JOIN sanpham on chitietsanpham.maSP = sanpham.maSP
				WHERE maCTSP = $maCTSP");
			while($SP = mysqli_fetch_assoc($ttSP)){
				$date = date_create($SP["ngaySanXuat"]);
		?>
		<tr>
			<td><?php echo $SP["tenSP"] ?></td>
			<td><?php echo date_format($date,"d-m-Y") ?></td>
			<td><?php echo $SP["hanSD"] ?></td>
			<td><?php echo $row["soLuongXuat"] ?></td>
			<td><?php echo $SP["donViTinh"] ?></td>
			<td><?php echo $row["donGia"] ?></td>
			<td><?php echo $row["donGia"]*$row["soLuongXuat"] ?></td>
			<td align="center"><a href="xulyXoaSPX.php?id=<?php echo $maCTSP?>">Xóa</a></td>
		</tr>
		<?php
			}
		}
		?>
	</table>
	<p class="tong">Tổng tiền: <?php echo $tongTien ?></p>
	<input type="button" value="Hoàn tất" class="ht" onClick="HoanTat()">
	<input type="button" value="Hủy" onClick="QuayLai()">
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
		location.replace("xulyHuyPX.php");
	}
	function HoanTat(){
		location.replace("xulyThemPX.php");
	}
</script>