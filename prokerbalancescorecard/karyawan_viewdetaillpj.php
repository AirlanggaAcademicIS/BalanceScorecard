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
        <li><a href="karyawan_viewproker.php">Program Kerja</a></li>
        <li class="active"><a href="karyawan_viewlpj.php">Laporan Pertanggung Jawaban</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      </li>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     <p><a href="karyawan_viewlpj.php"><button type="button" class="btn btn-primary btn-block active">View LPJ</button></a></p>
    </div>
    
    <div class="col-sm-8 text-left"> 
       <h2 class="text-center">Detail LPJ</h2>
        	<div class="form-group"  action="print.php" method="POST">
      			<label class="control-label col-sm-2">ID LPJ :</label>
      		<div class="col-sm-10">
           <?php
			$queri1="Select * From laporan_pertanggung_jawaban where ID_LPJ=".$_GET['id'];   
	  		$hasil1=MySQL_query ($queri1);
			while ($data = mysql_fetch_array ($hasil1)){
				echo "<input type='text'  class='form-control' id='idlpj' disabled value='".$data['ID_LPJ']."'><br>";
			}
				?>     	
     		 </div>
        </div>	
        <div class="form-group">
      			<label class="control-label col-sm-2">ID Proker :</label>
      		<div class="col-sm-10">
           	<?php
			$queri1="Select * From laporan_pertanggung_jawaban where ID_LPJ=".$_GET['id'];   
	  		$hasil1=MySQL_query ($queri1);
			while ($data = mysql_fetch_array ($hasil1)){
				echo "<input type='text'  class='form-control' id='idproker' disabled value='".$data['ID_PROKER']."'><br>";
			}
				?> 
     		 </div>
        </div>	
         <div class="form-group">
      			<label class="control-label col-sm-2">Nama Proker :</label>
      		<div class="col-sm-10">
           	<?php
			$queri1="Select p.NAMA_PROKER From laporan_pertanggung_jawaban l, proker p where l.ID_LPJ=p.ID_LPJ and l.ID_LPJ=".$_GET['id'];
	  		$hasil1=MySQL_query ($queri1);
			while ($data = mysql_fetch_array ($hasil1)){
				echo "<input type='text'  class='form-control' id='namaproker' disabled value='".$data['NAMA_PROKER']."'><br>";
			}
				?> 
     		 </div>
        </div>
         <div class="form-group">
      			<label class="control-label col-sm-2">Tujuan :</label>
      		<div class="col-sm-10">
           	<?php
			$queri1="Select p.TUJUAN From laporan_pertanggung_jawaban l, proker p where l.ID_LPJ=p.ID_LPJ and l.ID_LPJ=".$_GET['id'];
	  		$hasil1=MySQL_query ($queri1);
			while ($data = mysql_fetch_array ($hasil1)){
				echo "<input type='text'  class='form-control' id='namaproker' disabled value='".$data['TUJUAN']."'><br>";
			}
				?> 
     		 </div>
        </div>
         <div class="form-group">
      			<label class="control-label col-sm-2">Anggaran dana :</label>
      		<div class="col-sm-10">
           	<?php
			$queri1="Select p.ANGGARAN_DANA From laporan_pertanggung_jawaban l, proker p wherel.ID_LPJ=p.ID_LPJ and l.ID_LPJ=".$_GET['id'];
	  		$hasil1=MySQL_query ($queri1);
			while ($data = mysql_fetch_array ($hasil1)){
				echo "<input type='text'  class='form-control' id='ad' disabled value='".$data['anggaran_dana']."'><br>";
			}
				?> 
     		 </div>
        </div>	    
       <div class="form-group">
      	<label class="control-label col-sm-2">Waktu :</label>
     	<div class="col-sm-5">
          <?php
			$queri="Select p.WAKTU_MULAI_PROKER From laporan_pertanggung_jawaban l, proker p where p.ID_PROKER=l.ID_PROKER and l.ID_LPJ=".$_GET['id'];  
	  		$hasil=MySQL_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' id='waktumulai' disabled value='".$data['WAKTU_MULAI_PROKER']."'><br>";
			}
				?>    
      </div>
     
      <div class="col-sm-5">
         <?php
			$queri="Select p.WAKTU_AKHIR_PROKER From laporan_pertanggung_jawaban l, proker p where p.ID_PROKER=l.ID_PROKER and l.ID_LPJ=".$_GET['id'];  
	  		$hasil=MySQL_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' id='waktuberakhir' disabled value='".$data['WAKTU_AKHIR_PROKER']."'><br>";
			}
				?>    
      </div>	
         <div class="form-group">
      			<label class="control-label col-sm-2">Evaluasi :</label>
      		<div class="col-sm-10">
           	<?php
			$queri1="Select * From laporan_pertanggung_jawaban where ID_LPJ=".$_GET['id'];
	  		$hasil1=MySQL_query ($queri1);
			while ($data = mysql_fetch_array ($hasil1)){
				echo "<input type='text'  class='form-control' id='eval' disabled value='".$data['EVALUASI']."'><br>";
			}
				?> 
     		 </div>
        </div>	   
        <div class="form-group">
      			<label class="control-label col-sm-2">Keberlanjutan :</label>
      		<div class="col-sm-10">
           	<?php
			$queri1="Select * From laporan_pertanggung_jawaban where ID_LPJ=".$_GET['id'];
	  		$hasil1=MySQL_query ($queri1);
			while ($data = mysql_fetch_array ($hasil1)){
				echo "<input type='text'  class='form-control' id='eval' disabled value='".$data['KEBERLANJUTAN']."'><br>";
			}
				?> 
     		 </div>
        </div>	    
		
    </div>
    </div>
</div>

<div class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container">
      <p class="navbar-text center-block">&#169; Sistem Informasi Universitas Airlangga</p>
      </div>
 </div>

</body>
</html>
