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
        <li ><a href="index.php">Home</a></li>
        <li><a href="#">Balance Score Card</a></li>
        <li class="active"><a href="viewprokerkaprodi.php">Program Kerja</a></li>
        <li class="active"><a href="#">Laporan Pertanggung Jawaban</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     <p><button type="button" class="btn btn-primary btn-block disabled ">View LPJ</button></p>
	 <p><a href="inputlpj.php"><button type="button" class="btn btn-primary btn-block active">Input LPJ</button></a></p>
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
			$queri="Select * From notifikasi where ID_NOTIFIKASI=".$_GET['id1'];  //menampikan SEMUA data dari tabel notifikasi  
	  		$hasil=MySQL_query ($queri);
			
			
			while ($data = mysql_fetch_array ($hasil)){
				echo $data['NOTIFIKASI'];

			}
			
			if ($hasil= NULL){
			echo "notifikasi belum di input";}
			
				?>    	</td>
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