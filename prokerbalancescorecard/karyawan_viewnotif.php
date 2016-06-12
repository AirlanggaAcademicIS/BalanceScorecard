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
        <li ><a href="karyawan_home.php">Home</a></li>
        <li><a href="karyawan_viewbsc.php">Balance Score Card</a></li>
        <li><a href="karyawan_proker.php">Program Kerja</a></li>
        <li class="active"><a href="karyawan_viewlpj.php">Laporan Pertanggung Jawaban</a></li>
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
     
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">notification</h2>
            <p>
              <!--ss -->
            </p>
            <table width="763" height="67" border="1" bordercolor="#000000">
              <caption align="top">
                notif
              </caption>
              <tr>
                <td>&nbsp;
                <?php
			$queri="Select * From notifikasi n, proker p where p.ID_PROKER=".$_GET['id']." AND p.ID_NOTIFIKASI=n.ID_NOTIFIKASI";  //menampikan SEMUA data dari tabel notifikasi  
	  		$hasil=MySQL_query ($queri);
			
			
			while ($data = mysql_fetch_array ($hasil)){
				echo $data['NOTIFIKASI'];

			}
			
			if ($hasil= NULL){
			echo "notifikasi belum di input";}
			
				?>
                </td>
              </tr>
            </table>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html>
