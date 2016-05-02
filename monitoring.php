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
        <li><a href="viewproker.php">Program Kerja</a></li>
        <li><a href="viewlpj.php">Laporan Pertanggung Jawaban</a></li>
		<li class="active"><a href="monitoring.php">Monitoring</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Monitoring</h2>
			<form action="" method="post">
			<select name="tahun" style="width:200px; height:35px; border:1px dotted #333333; border-radius:4px; -moz-border-radius:4px; font-family:Garamond; font-size:24px; margin-left:10px;">
			<?php
			$q2 = mysql_query("SELECT DISTINCT date_format(WAKTU_MULAI_PROKER, '%Y') as bulantahun FROM proker order by WAKTU_MULAI_PROKER ASC");
			echo '<form method="POST" action="monitoring.php">';
			while ($row2 = mysql_fetch_array($q2)){
			echo '<option value="'.$row2['bulantahun'].'">'.$row2['bulantahun'].'</option>';
			}
			?>
			</select>
			<input type="submit" name="lihat" value="Lihat" style="width:75px; height:35px; border:1px dotted #333333; border-radius:4px; -moz-border-radius:4px; font-family:Garamond; font-size:24px; margin-left:10px;">
			</form>
			<div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="background:#F9F9F9; font-size:18px; font-family:Geneva, Arial, Helvetica, sans-serif;" >
                    <thead>
                        <tr>
							<td>Terlaksana</td>
						</tr>
						<tr>
							<td>
							<?php
							if(isset($_POST['lihat'])){
							$tahun = $_POST['tahun'];
							$query = "SELECT * FROM proker WHERE STATUS_PROKER='Terlaksana' AND date_format(WAKTU_MULAI_PROKER, '%Y') = '$tahun'";
							$hasil = mysql_query($query);
							while ($data = mysql_fetch_array($hasil))
							{
							echo "<h1>"."<a href=\"viewlpj.php\">".$data['NAMA_PROKER']."</a></h1>";
							}
							}
							?>
							</td>
						</tr>
						<tr>
							<td>Tidak Terlaksana</td>
						</tr>
						<tr>
							<td>
							<?php
							if(isset($_POST['lihat'])){
							$tahun = $_POST['tahun'];
							$query = "SELECT * FROM proker WHERE STATUS_PROKER='Tidak Terlaksana' AND date_format(WAKTU_MULAI_PROKER, '%Y') = '$tahun'";
							$hasil = mysql_query($query);
							while ($data = mysql_fetch_array($hasil))
							{
							echo "<h1>"."<a href=\"viewlpj.php\">".$data['NAMA_PROKER']."</a></h1>";
							}
							}
							?>

							</td>
						</tr>
						
                    </thead>  
				</table>
				<input type="submit" name="lihat" value="Print" style="width:75px; height:35px; border:1px dotted #333333; border-radius:4px; -moz-border-radius:4px; font-family:Garamond; font-size:24px; margin-left:10px;">
            </div><!-- /.box-body -->
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html>