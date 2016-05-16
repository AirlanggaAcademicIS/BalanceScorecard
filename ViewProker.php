<?php  
//membuat koneksi ke database  
include "koneksi.php"; 
?> 

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
        <li><a href="viewbsc.php">Balance Score Card</a></li>
        <li class="active"><a href="viewproker.php">Program Kerja</a></li>
        <li><a href="viewlpj.php"> Laporan Pertanggung Jawaban</a></li>
		<li><a href="monitoring.php">Monitoring</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
		<img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
    	<p><button type="button" class="btn btn-primary btn-block disabled ">View Proker</button></p>
	 	<p><a href="inputproker.php"><button type="button" class="btn btn-primary btn-block active">Input Proker</button></a></p>
	 	<p><a href="deleteproker.php"><button type="button" class="btn btn-primary btn-block active">Delete Proker</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">View Program Kerja</h2>
            <div class="box-body table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Program Kerja</th>
						<th>Nama Koordinator</th>
						<th>Target Waktu</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$i=0;
						$query = mysql_query("SELECT p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, karyawan k WHERE p.NIP=k.NIP ");
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  </tr>";}
							echo '</table>';
						?>
					</tr>
				</tbody>
			</table>
			</div><!-- /.box-body -->
        </div>
	</div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html>