<?php  
//membuat koneksi ke database  
include "koneksi.php"
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Balance Score Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
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
        <li><a href="kaprodi_viewproker.php">Program Kerja</a></li>
        <li><a href="kaprodi_viewlpj.php">Laporan Pertanggung Jawaban</a></li>
		<li class="active"><a href="kaprodi_monitoring.php">Monitoring</a></li>
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
	</div>
	
    <div class="col-sm-8 text-left"> 
		<h2 class="text-center">Monitoring</h2>
			<form action="kaprodi_monitoring.php" method="post" >
			<div class="form-group">
				<label for="sel1">Pilih Tahun:</label>
				<select name='tahun' class="form-control" id="sel1" style="width:200px; height:35px;" onChange='this.form.submit()'>
				<option value="">--Pilih--</option>
					<?php
						$q2 = mysql_query("SELECT DISTINCT date_format(WAKTU_MULAI_PROKER, '%Y') as bulantahun FROM proker order by WAKTU_MULAI_PROKER ASC");
						while ($row2 = mysql_fetch_array($q2)){
						if ($_POST['tahun'] == $row2['bulantahun'])
							echo "<option value=".$row2['bulantahun']." selected>".$row2['bulantahun']."</option>";
						else
							echo "<option value=".$row2['bulantahun'].">".$row2['bulantahun']."</option>";}
					?>
      			</select>
      <br>
    </div>
			
	<div class="box-body table-responsive">
		<table class="table table-hover">
    		<tbody>
      			<tr>
        			<td style="font-size:16px;"><b>Terlaksana</b></td>
      			</tr>
      			<tr>
					<td>
					<?php
					if(isset($_POST['tahun'])){
						$tahun = $_POST['tahun'];
						$query = mysql_query("SELECT * FROM proker WHERE STATUS_PROKER='Terlaksana' AND date_format(WAKTU_MULAI_PROKER, '%Y') = '$tahun'");
						while ($data = mysql_fetch_array($query)){
							echo "<a href=\"kaprodi_viewdetaillpj.php?id=".$data['ID_LPJ']."\">".$data['NAMA_PROKER']."</a>";
							echo "</br>";
							}
						}
						?>
					</td>
      			</tr>
				<tr>
        			<td style="font-size:16px;"><b>Tidak Terlaksana</b></td>
      			</tr>
      			<tr>
        			<td>
				<?php
					if(isset($_POST['tahun'])){
						$tahun = $_POST['tahun'];
						$query = mysql_query("SELECT * FROM proker WHERE STATUS_PROKER='Tidak Terlaksana' AND date_format(WAKTU_MULAI_PROKER, '%Y') = '$tahun'");
						while ($data = mysql_fetch_array($query)){
							echo "<a href=\"kaprodi_viewnotif.php?id1=".$data['ID_NOTIFIKASI']."\">".$data['NAMA_PROKER']."</a>";
							}
						}
						?>
					</td>
      			</tr>
    		</tbody>
  		</table>
		<!--<input type="submit" name="print" value="Print" class="btn btn-info">-->
		</form>
		<form action="kaprodi_print.php" method="post">
			<?php if (isset($_POST['tahun'])){
					  $tahun=$_POST['tahun'];
					  }
				  else{
				  	  $tahun="";}
			?>
			<div class="btn-group">
				<button type="submit" class="btn btn-default" name="printsemua" value="printsemua">Print</button>
			</div>
		</form>
	  </div><!-- /.box-body -->
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html>
