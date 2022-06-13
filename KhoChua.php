<html>
<head>
<meta charset="utf-8">
<title>Quản lý kho chứa</title>
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
		.them{
			margin-left: 30.5%;
			margin-bottom: 10px;
		}
		.ql{
			margin-top: 10px;
			margin-left: 63%;
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
	<h2 align="center">Danh sách kho chứa</h2>
	<input type="button" value="Thêm kho chứa" class="them" onClick="Themmoi()">
	<table>
		<tr>
			<td>Tên kho</td>
			<td>Địa chỉ</td>
			<td>Kích thước</td>
			<td>Loại kho</td>
			<td>Tình trạng</td>
			<td colspan="3" align="center">Chức năng</td>
		</tr>
		<?php
			$sqlKho = "SELECT `maKho`, `tenKho`, `diaChi`, `kichThuoc`, `loaiKho` FROM `kho` ";
			$khoChua = mysqli_query($conn, $sqlKho);
			while($dsKho = mysqli_fetch_assoc($khoChua)){
				$maKho = $dsKho["maKho"];
				$kichThuoc = $dsKho["kichThuoc"];
				$sqlKT = "SELECT `maSP`, `maCTSP`, `soLuongNhap` FROM `phieunhapsanpham` 
					WHERE maKho = $maKho";
				$tinhTrang = "";
				$daDung = 20;
				$kiemTra1 = mysqli_query($conn, $sqlKT);
				$kiemTra = mysqli_query($conn, $sqlKT);
				$check = mysqli_fetch_assoc($kiemTra1);
				if(!isset($check)){
					$tinhTrang = "Chưa sử dụng";
				}
				else{
					while($row = mysqli_fetch_assoc($kiemTra)){
						$maSP = $row["maSP"];
						$maCTSP = $row["maCTSP"];
						$soLuongNhap = $row["soLuongNhap"];
						$soLuongXuat = 0;
						
						$sqlSP = "SELECT  `kichThuoc` FROM `sanpham` WHERE maSP = $maSP";
						$sanPham = mysqli_fetch_assoc(mysqli_query($conn,$sqlSP));
						$ktSP = $sanPham["kichThuoc"];
						
						$sqlCTSP = "SELECT sum(soLuongXuat) FROM `phieuxuatsanpham` WHERE maCTSP = $maCTSP 	GROUP by maCTSP";
						$ctsp = mysqli_fetch_assoc(mysqli_query($conn,$sqlCTSP));
						if(isset($ctsp)){
							$soLuongXuat = $ctsp["sum(soLuongXuat)"];
						}
						$daDung += (($soLuongNhap-$soLuongXuat)*$ktSP)/$kichThuoc*100;
					}
					$daDung = ceil($daDung);
					$tinhTrang = "Đã dùng $daDung%";
				}
		?>
		<tr>
			<td><?php echo $dsKho["tenKho"] ?></td>
			<td><?php echo $dsKho["diaChi"] ?></td>
			<td><?php echo $dsKho["kichThuoc"] ?></td>
			<td><?php echo $dsKho["loaiKho"] ?></td>
			<td><?php echo $tinhTrang ?></td>
			<td><a href="ChiTietKhoChua.php?id=<?php echo $dsKho["maKho"] ?>">Chi tiết</a></td>
			<td><a href="SuaKhoChua.php?id=<?php echo $dsKho["maKho"] ?>">Sửa</a></td>
			<td><a href="xulyXoaKho.php?id=<?php echo $dsKho["maKho"] ?>">Xóa</a></td>
		</tr>
		<?php
			}
			?>
	</table>
	<input type="button" value="Về trang chủ" class="ql" onClick="DieuHuong()">
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
	function Themmoi(){
		location.replace("ThemKhoChua.php");
	}
	function DieuHuong(){
		location.replace("TrangChu.php");
	}
</script>