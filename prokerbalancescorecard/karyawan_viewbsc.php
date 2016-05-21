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
        <li class="active"><a href="kaprodi_viewbsc.php">Balance Score Card</a></li>
        <li><a href="kaprodi_viewproker.php">Program Kerja</a></li>
        <li><a href="kaprodi_viewlpj.php">Laporan Pertanggung Jawaban</a></li>
		<li><a href="kaprodi_monitoring.php">Monitoring</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">       
		<img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
     	<p><button type="button" class="btn btn-primary btn-block disabled ">View BSC</button></p>
	 	<p><a href="kaprodi_inputbsc.php"><button type="button" class="btn btn-primary btn-block active">Input BSC</button></a></p>
	 	<p><a href="kaprodi_editbsc.php"><button type="button" class="btn btn-primary btn-block active">Edit BSC</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Balance Score Card</h2>
            <div class="box-body table-responsive">
			</div><!-- /.box-body -->
			
			<table class="table">
                    <thead class="thead-inverse">
                        <?php
						include "koneksi.php";
						$sql = mysql_query("SELECT A.*, A.id_tujuan, (SELECT COUNT(PERSPEKTIF) FROM tujuan WHERE PERSPEKTIF=A.PERSPEKTIF) AS jumlah FROM tujuan A ORDER BY A.PERSPEKTIF");
						$no = 1;
						$jum = 1;
						echo '<tr style="text-align:center"><th>No</th><th>Perspektif</th><th>Tujuan Organisasi</th><th>Indikator Tujuan</th></tr>';
						while($row = mysql_fetch_array($sql)) {   
							echo '<tr>';
							if($jum <= 1) {
							echo '<td text-align="center" rowspan="'.$row['jumlah'].'">'.$no.'</td>';
							echo '<td rowspan="'.$row['jumlah'].'">'.ucwords($row['PERSPEKTIF']).'</td>';
							$jum = $row['jumlah'];       
							$no++;                     
							} else {
							$jum = $jum - 1;
							}
							echo "<td>"."<a href=\"kaprodi_viewproker.php\">".ucwords($row['TUJUAN_ORGANISASI'])."</a></td>";
							echo "<td>";
							$id_tujuan=$row['id_tujuan'];
							$query = mysql_query("SELECT nama_indikator_tujuan FROM indikator_tujuan WHERE id_tujuan='$id_tujuan'");
								while ($data = mysql_fetch_array($query)){
									echo "<a href=\"kaprodi_viewproker.php\">".ucwords($data['nama_indikator_tujuan'])."</a>";
									echo "</br>";
								}
							echo "</td>";
							echo '</tr>';              
							}
							?>
                    </thead>  
					</table>
        </div>	
        <script src="js/jquery-1.11.1.min.js"></script> 
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>	
        <script src="js/dataTables.bootstrap.js"></script>	
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>
    </div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html>