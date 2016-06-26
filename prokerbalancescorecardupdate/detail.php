<?php include "koneksi.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Balance Score Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
  <style type="text/css">
<!--
.style2 {color: #F0F0F0}
-->
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     <img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
     	<p><a href="admin_tujuan.php"><button type="button" class="btn btn-primary btn-block active">Tujuan</button></a></p>
	 	<p><a href="admin_indikatortujuan.php"><button type="button" class="btn btn-primary btn-block active">Indikator Tujuan</button></a></p>
		<p><a href="admin_karyawan.php"><button type="button" class="btn btn-primary btn-block active">Karyawan</button></a></p>
		<p><a href="admin_proker.php"><button type="button" class="btn btn-primary btn-block active">Proker</button></a></p>
		<p><a href="admin_lpj.php"><button type="button" class="btn btn-primary btn-block active">Laporan Pertanggungjawaban</button></a></p>
		<p><a href="admin_notifikasi.php"><button type="button" class="btn btn-primary btn-block active">Notifikasi</button></a></p>
		<p><a href="admin_userregister.php"><button type="button" class="btn btn-primary btn-block active">Daftarkan user</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Detail</h2>
            <?php
include "koneksi.php";
$id = $_GET['id'];
$tipe = $_GET['tipe'];

switch($tipe)
{
	case "proker" :
	$sql = "SELECT * FROM PROKER WHERE ID_PROKER=".$id;
	tampilkan($sql);
	break;
	case "tujuan" :
	$sql = "SELECT * FROM TUJUAN WHERE ID_TUJUAN=".$id;
	tampilkan($sql);
	break;
	case "indikator" :
	$sql = "SELECT * FROM INDIKATOR_TUJUAN WHERE ID_INDIKATOR_TUJUAN=".$id;
	tampilkan($sql);
	break;
	case "notifikasi" :
	$sql = "SELECT * FROM NOTIFIKASI WHERE ID_NOTIFIKASI=".$id;
	tampilkan($sql);
	break;
	case "lpj" :
	$sql = "SELECT * FROM LAPORAN_PERTANGGUNG_JAWABAN WHERE ID_LPJ=".$id;
	tampilkan($sql);
	break;
	case "karyawan" :
	$sql = "SELECT NIP,NAMA,JABATAN,TANGGAL_LAHIR,EMAIL FROM KARYAWAN WHERE NIP='".$id."'";
	tampilkan($sql);
	break;
}

function tampilkan($sql)
{
	include "koneksi.php";
	$hasil = mysqli_query($konek_db,$sql);
	$kolom = mysqli_num_fields($hasil);
	$data = mysqli_fetch_array($hasil);
		for($i=0;$i<$kolom;$i++)
		{
			echo mysqli_fetch_field($hasil)->name;
			echo "<input type='text'  class='form-control' disabled value='".$data[$i]."'><br>";
		}	
}
?>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html>

