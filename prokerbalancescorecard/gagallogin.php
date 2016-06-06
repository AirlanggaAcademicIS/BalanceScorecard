<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Balance Score Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style type="text/css">
<!--
.style2 {font-size: 17px}
.style5 {font-size: 17px; font-weight: bold; }
.style6 {color: #FFFFFF}
-->
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
        <div class="panel-body style2 style1 style5">
          <div align="center" class="style6">Balance ScoreCard</div>
        </div>
  </div>
</nav>
<div class="grid_12">
			
<div class="theme-login-body">
				
<div class="theme-login-title" align="center">
  <p>&nbsp;</p>
  <p class="style5">Terjadi Kesalahan!!! </p>
</div>
				
<div class="theme-login-form" align="center">
					

<?php
include "koneksi.php";				
$username=strip_tags($_POST['NIP/NIK']);				
$password=md5($_POST['password']);
						
echo "NIP atau Password Salah. Silahkan Masukkan kembali NIP dan Password Anda dengan benar <a href=\"index.php\">Di Sini</a>";
?>					

</div>
        </div>	 
    </div>
<div class="navbar navbar-inverse navbar-fixed-bottom">
<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
 </div>  
</footer>
</body>
</html>
