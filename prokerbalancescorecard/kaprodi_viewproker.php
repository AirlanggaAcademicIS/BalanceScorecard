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
        <li ><a href="kaprodi_home.php">Home</a></li>
        <li><a href="kaprodi_viewbsc.php">Balance Score Card</a></li>
        <li class="active"><a href="kaprodi_viewproker.php">Program Kerja</a></li>
        <li><a href="kaprodi_viewlpj.php"> Laporan Pertanggung Jawaban</a></li>
		<li><a href="kaprodi_monitoring.php">Monitoring</a></li>
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
    	<p><button type="button" class="btn btn-primary btn-block disabled ">View Proker</button></p>
	 	<p><a href="kaprodi_inputproker.php"><button type="button" class="btn btn-primary btn-block active">Input Proker</button></a></p>
	 	<p><a href="kaprodi_deleteproker.php"><button type="button" class="btn btn-primary btn-block active">Delete Proker</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">View Program Kerja</h2>
            <?php 
			if(isset($_GET['id']))
				{
					$query = "SELECT * FROM tujuan WHERE ID_TUJUAN =".$_GET['id'];
					$hasil = mysql_query($query);
					$data = mysql_fetch_array($hasil);
					echo "<label>Perspektif : ".$data['PERSPEKTIF']."<br>Tujuan	: ".$data['TUJUAN_ORGANISASI']."</label>";
				}
				else
				if(isset($_GET['idindikator']))
				{
					$query = "SELECT * FROM indikator_tujuan i, tujuan t WHERE i.ID_TUJUAN=t.ID_TUJUAN AND i.ID_INDIKATOR_TUJUAN =".$_GET['idindikator'];
					$hasil = mysql_query($query);
					$data = mysql_fetch_array($hasil);
					echo "<label>Perspektif : ".$data['PERSPEKTIF']."<br>Tujuan	: ".$data['TUJUAN_ORGANISASI']."<br>Indikator	: ".$data['NAMA_INDIKATOR_TUJUAN']."</label>";
				}
				else
				{
				
				}?>
			<div class="box-body table-responsive">
			<label>Terlaksana</label>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Program Kerja</th>
						<th>Nama Koordinator</th>
						<th>Target Waktu</th>
						<?php if(isset($_GET['id'])||isset($_GET['idindikator']))
						{
						}
						else
						{
							echo "<th>Perspektif</th>";
						}?>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						if(isset($_GET['id']))
						{
						$i=0;
						$query = mysql_query("SELECT distinct t.perspektif, p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, menunjang m, karyawan k, indikator_tujuan i, tujuan t WHERE p.NIP=k.NIP AND p.id_proker=m.id_proker AND m.id_indikator_tujuan=i.id_indikator_tujuan AND i.id_tujuan=t.id_tujuan AND p.status_proker='Terlaksana' AND t.id_tujuan=".$_GET['id']);
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['id_proker']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						if(isset($_GET['idindikator']))
						{
						$i=0;
						$query = mysql_query("SELECT distinct t.perspektif, p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, menunjang m, karyawan k, indikator_tujuan i, tujuan t WHERE p.NIP=k.NIP AND p.id_proker=m.id_proker AND m.id_indikator_tujuan=i.id_indikator_tujuan AND i.id_tujuan=t.id_tujuan AND p.status_proker='Terlaksana' AND i.id_indikator_tujuan=".$_GET['idindikator']);
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['id_proker']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						{
						$i=0;
						$query = mysql_query("SELECT distinct t.perspektif, p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, menunjang m, karyawan k, indikator_tujuan i, tujuan t WHERE p.NIP=k.NIP AND p.id_proker=m.id_proker AND m.id_indikator_tujuan=i.id_indikator_tujuan AND p.status_proker='Terlaksana' AND i.id_tujuan=t.id_tujuan");
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  <td>".ucwords($data['perspektif'])."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['id_proker']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
							}
						?>
					</tr>
				</tbody>
			</table>
			</div><!-- /.box-body -->
			
			<div class="box-body table-responsive">
			<label>Tidak Terlaksana</label>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Program Kerja</th>
						<th>Nama Koordinator</th>
						<th>Target Waktu</th>
						<?php if(isset($_GET['id'])||isset($_GET['idindikator']))
						{
						}
						else
						{
							echo "<th>Perspektif</th>";
						}?>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						if(isset($_GET['id']))
						{
						$i=0;
						$query = mysql_query("SELECT distinct t.perspektif, p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, menunjang m, karyawan k, indikator_tujuan i, tujuan t WHERE p.NIP=k.NIP AND p.id_proker=m.id_proker AND m.id_indikator_tujuan=i.id_indikator_tujuan AND i.id_tujuan=t.id_tujuan AND p.status_proker='Tidak terlaksana' AND t.id_tujuan=".$_GET['id']);
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['id_proker']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						if(isset($_GET['idindikator']))
						{
						$i=0;
						$query = mysql_query("SELECT distinct t.perspektif, p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, menunjang m, karyawan k, indikator_tujuan i, tujuan t WHERE p.NIP=k.NIP AND p.id_proker=m.id_proker AND m.id_indikator_tujuan=i.id_indikator_tujuan AND i.id_tujuan=t.id_tujuan AND p.status_proker='Tidak terlaksana' AND i.id_indikator_tujuan=".$_GET['idindikator']);
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['id_proker']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						{
						$i=0;
						$query = mysql_query("SELECT distinct t.perspektif, p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, menunjang m, karyawan k, indikator_tujuan i, tujuan t WHERE p.NIP=k.NIP AND p.id_proker=m.id_proker AND m.id_indikator_tujuan=i.id_indikator_tujuan AND i.id_tujuan=t.id_tujuan AND p.status_proker='Tidak terlaksana'");
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  <td>".ucwords($data['perspektif'])."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['id_proker']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
							}
						?>
					</tr>
				</tbody>
			</table>
			</div><!-- /.box-body -->
			
			<div class="box-body table-responsive">
			<label>Belum Terlaksana</label>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Program Kerja</th>
						<th>Nama Koordinator</th>
						<th>Target Waktu</th>
						<?php if(isset($_GET['id'])||isset($_GET['idindikator']))
						{
						}
						else
						{
							echo "<th>Perspektif</th>";
						}?>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						if(isset($_GET['id']))
						{
						$i=0;
						$query = mysql_query("SELECT distinct t.perspektif, p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, menunjang m, karyawan k, indikator_tujuan i, tujuan t WHERE p.NIP=k.NIP AND p.id_proker=m.id_proker AND m.id_indikator_tujuan=i.id_indikator_tujuan AND i.id_tujuan=t.id_tujuan AND (p.status_proker='Belum terlaksana' OR p.status_proker='Proker baru') AND t.id_tujuan=".$_GET['id']);
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['id_proker']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						if(isset($_GET['idindikator']))
						{
						$i=0;
						$query = mysql_query("SELECT distinct t.perspektif, p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, menunjang m, karyawan k, indikator_tujuan i, tujuan t WHERE p.NIP=k.NIP AND p.id_proker=m.id_proker AND m.id_indikator_tujuan=i.id_indikator_tujuan AND i.id_tujuan=t.id_tujuan AND (p.status_proker='Belum terlaksana' OR p.status_proker='Proker baru') AND i.id_indikator_tujuan=".$_GET['idindikator']);
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['id_proker']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						{
						$i=0;
						$query = mysql_query("SELECT distinct t.perspektif, p.id_proker, p.nama_proker, k.nama, DATE_FORMAT(p.waktu_mulai_proker, '%d/%m/%Y') AS waktu_mulai_proker, DATE_FORMAT(p.waktu_akhir_proker, '%d/%m/%Y') AS waktu_akhir_proker FROM proker p, menunjang m, karyawan k, indikator_tujuan i, tujuan t WHERE p.NIP=k.NIP AND p.id_proker=m.id_proker AND m.id_indikator_tujuan=i.id_indikator_tujuan AND i.id_tujuan=t.id_tujuan AND (p.status_proker='Belum terlaksana' OR p.status_proker='Proker baru')");
						while ($data = mysql_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['nama_proker'])."</td>
								  <td>".ucwords($data['nama'])."</td>
								  <td>".$data['waktu_mulai_proker']." - ".$data['waktu_akhir_proker']."</td>
								  <td>".ucwords($data['perspektif'])."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['id_proker']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
							}
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
