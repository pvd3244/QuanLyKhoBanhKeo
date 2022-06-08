 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
	<title>Đăng nhập hệ thống</title>
<style>
	.dangnhap {
width: 400px;
margin: 10px auto;
}
input[type=text], input[type=password] {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
box-sizing: border-box;
}
  
.button {
background-color: #4CAF50;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 100%;
}
  
.button:hover {
opacity: 0.8;
}
	h1{
		margin-top: 150px;
	}
	</style>
</head> 
<body> 
	<h1 align="center">Đăng nhập hệ thống</h1>
<form action='DangNhap.php' class="dangnhap" method='POST'> 
Tên đăng nhập : <input type='text' name='username' /> 
Mật khẩu : <input type='password' name='password' /> 
<input type='submit' class="button" name="dangnhap" value='Đăng nhập' /> 
	<?php require 'xulyDN.php';?> 
<form> 
</body> 
</html>