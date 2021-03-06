<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cake</title>
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
                     <a class="nav-link" href="#">
                        Trang ch???
                     </a>
                  </li>
                  <li class="nav-item" id="">
                     <a class="nav-link" href="SanPham.php">
                        Qu???n l?? s???n ph???m
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="KiemTraTK.php">
                        Qu???n l?? nh??n vi??n
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="DaiLy.php">
                        Qu???n l?? ?????i l??
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="KhoChua.php">
                        Qu???n l?? kho
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
		<p align="right">Xin ch??o, <a href="ThongTinNhanVien.php"><?php echo $_SESSION["tenNV"] ?></a> <a href="xulyDX.php">????ng xu???t</a></p>
	</div>
   <section class="slider">
      <i class="fa fa-angle-left slider-prev" onclick="changeImage()"></i>
      <div class="slider-wrapper">
         <div class="slide-main" id="slideMain">
               <div class="slider-item active">
                  <img id="img1" alt="..." onclick="changeImage()"
                     src="https://lh4.googleusercontent.com/-EU1KSZdZ9EQ/Xy4m7ghdVqI/AAAAAAAAACE/Sq0op9maOSMXKQpT8wQZF6y3gPv6ASOhACLcBGAsYHQ/d/banner-kingdom-1.jpg">
               </div>
               <!-- <div class="slider-item">
                  <img alt="..."
                     src="https://lh4.googleusercontent.com/-zHGXAq8h5CI/Xy4b_W4fjtI/AAAAAAAAABs/VcEuG64wnfI0hMcG53J6qTpuAClpmJw9gCLcBGAsYHQ/d/banner-kingdom.jpg">
               </div> -->
         </div>
      </div>
      <i class="fa fa-angle-right slider-next" onclick="changeImage()"></i>
   </section>

   <div id="footer-wapper">
      <div class="container">
         <div class="no-items section" id="footer-wapper"></div>
      </div>
   </div>

   <div class="copy-right-bottom text-center">
      Copyright ?? 2022. <a class="sitename" href="/" title="B??nh trung thu Kingdom">B??nh trung thu Kingdom</a>, Design
      by <a href="/" rel="nofllow" target="_blank">DHK Group</a>
   </div>
</body>
<script>
   window.addEventListener('load', function(){

   });
   var number = 0;
   changeImage = function() {
      var s1 = "https://lh4.googleusercontent.com/-EU1KSZdZ9EQ/Xy4m7ghdVqI/AAAAAAAAACE/Sq0op9maOSMXKQpT8wQZF6y3gPv6ASOhACLcBGAsYHQ/d/banner-kingdom-1.jpg" ;
      var s2 = "https://lh4.googleusercontent.com/-zHGXAq8h5CI/Xy4b_W4fjtI/AAAAAAAAABs/VcEuG64wnfI0hMcG53J6qTpuAClpmJw9gCLcBGAsYHQ/d/banner-kingdom.jpg";
      document.getElementById('img1').src= s2;
      number = number + 1;
      if (number > 1){
         number = 0;
         document.getElementById('img1').src= s1;
      }
   }
   
   setInterval(changeImage, 2000);
</script>
</html>