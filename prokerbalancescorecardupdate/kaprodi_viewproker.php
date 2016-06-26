<?php  
//membuat koneksi ke database  
include "koneksi.php"; 
include('session.php');
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
					$query = "SELECT * FROM TUJUAN WHERE ID_TUJUAN =".$_GET['id'];
					$hasil = mysqli_query($konek_db,$query);
					$data = mysqli_fetch_array($hasil);
					echo "<label>Perspektif : ".$data['PERSPEKTIF']."<br>Tujuan	: ".$data['TUJUAN_ORGANISASI']."</label>";
				}
				else
				if(isset($_GET['idindikator']))
				{
					$query = "SELECT * FROM INDIKATOR_TUJUAN i, TUJUAN t WHERE i.ID_TUJUAN=t.ID_TUJUAN AND i.ID_INDIKATOR_TUJUAN =".$_GET['idindikator'];
					$hasil = mysqli_query($konek_db,$query);
					$data = mysqli_fetch_array($hasil);
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
						$query = mysqli_query($konek_db,"SELECT distinct t.PERSPEKTIF, p.ID_PROKER, p.NAMA_PROKER, k.NAMA, DATE_FORMAT(p.WAKTU_MULAI_PROKER, '%d/%m/%Y') AS WAKTU_MULAI_PROKER, DATE_FORMAT(p.WAKTU_AKHIR_PROKER, '%d/%m/%Y') AS WAKTU_AKHIR_PROKER FROM PROKER p, MENUNJANG m, KARYAWAN k, INDIKATOR_TUJUAN i, TUJUAN t WHERE p.NIP=k.NIP AND p.ID_PROKER=m.ID_PROKER AND m.ID_INDIKATOR_TUJUAN=i.ID_INDIKATOR_TUJUAN AND i.ID_TUJUAN=t.ID_TUJUAN AND p.STATUS_PROKER='Terlaksana' AND t.ID_TUJUAN=".$_GET['id']);
						while ($data = mysqli_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['NAMA_PROKER'])."</td>
								  <td>".ucwords($data['NAMA'])."</td>
								  <td>".$data['WAKTU_MULAI_PROKER']." - ".$data['WAKTU_AKHIR_PROKER']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						if(isset($_GET['idindikator']))
						{
						$i=0;
						$query = mysqli_query($konek_db,"SELECT distinct t.PERSPEKTIF, p.ID_PROKER, p.NAMA_PROKER, k.NAMA, DATE_FORMAT(p.WAKTU_MULAI_PROKER, '%d/%m/%Y') AS WAKTU_MULAI_PROKER, DATE_FORMAT(p.WAKTU_AKHIR_PROKER, '%d/%m/%Y') AS WAKTU_AKHIR_PROKER FROM PROKER p, MENUNJANG m, KARYAWAN k, INDIKATOR_TUJUAN i, TUJUAN t WHERE p.NIP=k.NIP AND p.ID_PROKER=m.ID_PROKER AND m.ID_INDIKATOR_TUJUAN=i.ID_INDIKATOR_TUJUAN AND i.ID_TUJUAN=t.ID_TUJUAN AND p.STATUS_PROKER='Terlaksana' AND i.ID_INDIKATOR_TUJUAN=".$_GET['idindikator']);
						while ($data = mysqli_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['NAMA_PROKER'])."</td>
								  <td>".ucwords($data['NAMA'])."</td>
								  <td>".$data['WAKTU_MULAI_PROKER']." - ".$data['WAKTU_AKHIR_PROKER']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						{
						$i=0;
						$query = mysqli_query($konek_db,"SELECT distinct t.PERSPEKTIF, p.ID_PROKER, p.NAMA_PROKER, k.NAMA, DATE_FORMAT(p.WAKTU_MULAI_PROKER, '%d/%m/%Y') AS WAKTU_MULAI_PROKER, DATE_FORMAT(p.WAKTU_AKHIR_PROKER, '%d/%m/%Y') AS WAKTU_AKHIR_PROKER FROM PROKER p, MENUNJANG m, KARYAWAN k, INDIKATOR_TUJUAN i, TUJUAN t WHERE p.NIP=k.NIP AND p.ID_PROKER=m.ID_PROKER AND m.ID_INDIKATOR_TUJUAN=i.ID_INDIKATOR_TUJUAN AND p.STATUS_PROKER='Terlaksana' AND i.ID_TUJUAN=t.ID_TUJUAN");
						while ($data = mysqli_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['NAMA_PROKER'])."</td>
								  <td>".ucwords($data['NAMA'])."</td>
								  <td>".$data['WAKTU_MULAI_PROKER']." - ".$data['WAKTU_AKHIR_PROKER']."</td>
								  <td>".ucwords($data['PERSPEKTIF'])."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "."</td>
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
						$query = mysqli_query($konek_db,"SELECT distinct t.PERSPEKTIF, p.ID_PROKER, p.NAMA_PROKER, k.NAMA, DATE_FORMAT(p.WAKTU_MULAI_PROKER, '%d/%m/%Y') AS WAKTU_MULAI_PROKER, DATE_FORMAT(p.WAKTU_AKHIR_PROKER, '%d/%m/%Y') AS WAKTU_AKHIR_PROKER FROM PROKER p, MENUNJANG m, KARYAWAN k, INDIKATOR_TUJUAN i, TUJUAN t WHERE p.NIP=k.NIP AND p.ID_PROKER=m.ID_PROKER AND m.ID_INDIKATOR_TUJUAN=i.ID_INDIKATOR_TUJUAN AND i.ID_TUJUAN=t.ID_TUJUAN AND p.STATUS_PROKER='Tidak terlaksana' AND t.ID_TUJUAN=".$_GET['id']);
						while ($data = mysqli_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['NAMA_PROKER'])."</td>
								  <td>".ucwords($data['NAMA'])."</td>
								  <td>".$data['WAKTU_MULAI_PROKER']." - ".$data['WAKTU_AKHIR_PROKER']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						if(isset($_GET['idindikator']))
						{
						$i=0;
						$query = mysqli_query($konek_db,"SELECT distinct t.PERSPEKTIF, p.ID_PROKER, p.NAMA_PROKER, k.NAMA, DATE_FORMAT(p.WAKTU_MULAI_PROKER, '%d/%m/%Y') AS WAKTU_MULAI_PROKER, DATE_FORMAT(p.WAKTU_AKHIR_PROKER, '%d/%m/%Y') AS WAKTU_AKHIR_PROKER FROM PROKER p, MENUNJANG m, KARYAWAN k, INDIKATOR_TUJUAN i, TUJUAN t WHERE p.NIP=k.NIP AND p.ID_PROKER=m.ID_PROKER AND m.ID_INDIKATOR_TUJUAN=i.ID_INDIKATOR_TUJUAN AND i.ID_TUJUAN=t.ID_TUJUAN AND p.STATUS_PROKER='Tidak terlaksana' AND i.ID_INDIKATOR_TUJUAN=".$_GET['idindikator']);
						while ($data = mysqli_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['NAMA_PROKER'])."</td>
								  <td>".ucwords($data['NAMA'])."</td>
								  <td>".$data['WAKTU_MULAI_PROKER']." - ".$data['WAKTU_AKHIR_PROKER']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						{
						$i=0;
						$query = mysqli_query($konek_db,"SELECT distinct t.PERSPEKTIF, p.ID_PROKER, p.NAMA_PROKER, k.NAMA, DATE_FORMAT(p.WAKTU_MULAI_PROKER, '%d/%m/%Y') AS WAKTU_MULAI_PROKER, DATE_FORMAT(p.WAKTU_AKHIR_PROKER, '%d/%m/%Y') AS WAKTU_AKHIR_PROKER FROM PROKER p, MENUNJANG m, KARYAWAN k, INDIKATOR_TUJUAN i, TUJUAN t WHERE p.NIP=k.NIP AND p.ID_PROKER=m.ID_PROKER AND m.ID_INDIKATOR_TUJUAN=i.ID_INDIKATOR_TUJUAN AND i.ID_TUJUAN=t.ID_TUJUAN AND p.STATUS_PROKER='Tidak terlaksana'");
						while ($data = mysqli_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['NAMA_PROKER'])."</td>
								  <td>".ucwords($data['NAMA'])."</td>
								  <td>".$data['WAKTU_MULAI_PROKER']." - ".$data['WAKTU_AKHIR_PROKER']."</td>
								  <td>".ucwords($data['PERSPEKTIF'])."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "."</td>
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
						$query = mysqli_query($konek_db,"SELECT distinct t.PERSPEKTIF, p.ID_PROKER, p.NAMA_PROKER, k.NAMA, DATE_FORMAT(p.WAKTU_MULAI_PROKER, '%d/%m/%Y') AS WAKTU_MULAI_PROKER, DATE_FORMAT(p.WAKTU_AKHIR_PROKER, '%d/%m/%Y') AS WAKTU_AKHIR_PROKER FROM PROKER p, MENUNJANG m, KARYAWAN k, INDIKATOR_TUJUAN i, TUJUAN t WHERE p.NIP=k.NIP AND p.ID_PROKER=m.ID_PROKER AND m.ID_INDIKATOR_TUJUAN=i.ID_INDIKATOR_TUJUAN AND i.ID_TUJUAN=t.ID_TUJUAN AND (p.STATUS_PROKER='Belum terlaksana' OR p.STATUS_PROKER='Proker baru') AND t.ID_TUJUAN=".$_GET['id']);
						while ($data = mysqli_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['NAMA_PROKER'])."</td>
								  <td>".ucwords($data['NAMA'])."</td>
								  <td>".$data['WAKTU_MULAI_PROKER']." - ".$data['WAKTU_AKHIR_PROKER']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						if(isset($_GET['idindikator']))
						{
						$i=0;
						$query = mysqli_query($konek_db,"SELECT distinct t.PERSPEKTIF, p.ID_PROKER, p.NAMA_PROKER, k.NAMA, DATE_FORMAT(p.WAKTU_MULAI_PROKER, '%d/%m/%Y') AS WAKTU_MULAI_PROKER, DATE_FORMAT(p.WAKTU_AKHIR_PROKER, '%d/%m/%Y') AS WAKTU_AKHIR_PROKER FROM PROKER p, MENUNJANG m, KARYAWAN k, INDIKATOR_TUJUAN i, TUJUAN t WHERE p.NIP=k.NIP AND p.ID_PROKER=m.ID_PROKER AND m.ID_INDIKATOR_TUJUAN=i.ID_INDIKATOR_TUJUAN AND i.ID_TUJUAN=t.ID_TUJUAN AND (p.STATUS_PROKER='Belum terlaksana' OR p.STATUS_PROKER='Proker baru') AND i.ID_INDIKATOR_TUJUAN=".$_GET['idindikator']);
						while ($data = mysqli_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['NAMA_PROKER'])."</td>
								  <td>".ucwords($data['NAMA'])."</td>
								  <td>".$data['WAKTU_MULAI_PROKER']." - ".$data['WAKTU_AKHIR_PROKER']."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "."</td>
								  </tr>";}
							echo '</table>';
						}
						else
						{
						$i=0;
						$query = mysqli_query($konek_db,"SELECT distinct t.PERSPEKTIF, p.ID_PROKER, p.NAMA_PROKER, k.NAMA, DATE_FORMAT(p.WAKTU_MULAI_PROKER, '%d/%m/%Y') AS WAKTU_MULAI_PROKER, DATE_FORMAT(p.WAKTU_AKHIR_PROKER, '%d/%m/%Y') AS WAKTU_AKHIR_PROKER FROM PROKER p, MENUNJANG m, KARYAWAN k, INDIKATOR_TUJUAN i, TUJUAN t WHERE p.NIP=k.NIP AND p.ID_PROKER=m.ID_PROKER AND m.ID_INDIKATOR_TUJUAN=i.ID_INDIKATOR_TUJUAN AND i.ID_TUJUAN=t.ID_TUJUAN AND (p.STATUS_PROKER='Belum terlaksana' OR p.STATUS_PROKER='Proker baru')");
						while ($data = mysqli_fetch_array($query)){
							$i++;
							echo "<td>".$i."</td>
								  <td>".ucwords($data['NAMA_PROKER'])."</td>
								  <td>".ucwords($data['NAMA'])."</td>
								  <td>".$data['WAKTU_MULAI_PROKER']." - ".$data['WAKTU_AKHIR_PROKER']."</td>
								  <td>".ucwords($data['PERSPEKTIF'])."</td>
								  <td><a href=\"kaprodi_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "."</td>
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
