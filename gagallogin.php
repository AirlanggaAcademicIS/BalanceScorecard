<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Balance Scorecard Universitas Airlangga</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<div id="theme-login-wrapper">
		
<div class="grid_12">
			
<div class="theme-login-body">
				
<div class="theme-login-title" align="center">Terjadi Kesalahan!!!</div>
				
<div class="theme-login-form" align="center">
					

<?php
include "koneksi.php";				
$username=strip_tags($_POST['NIP/NIK']);				
$password=md5($_POST['password']);
						
echo "NIP atau Password Salah. Silahkan Masukkan NIP dan Password Anda dengan benar <a href=\"login.php\">Di Sini</a>";
?>					
<body>
</body>
</html>
