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
        <li ><a href="index.php">Home</a></li>
        <li><a href="viewbsc.php">Balance Score Card</a></li>
        <li class="active"><a href="viewproker.php">Program Kerja</a></li>
        <li><a href="viewlpj.php"> Laporan Pertanggung Jawaban</a></li>
      </ul>
      </li>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <p><a href="viewlpj.php"> <button type="button" class="btn btn-primary btn-block active ">View LPJ</button></a></p>
	<p><button type="button" class="btn btn-primary btn-block disabled">Input LPJ</button></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Detail Program Kerja</h2>
      		<form name="form2" method="post" action="viewdetailproker.php">
      		
     
       <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];  //menampikan SEMUA data dari tabel siswa  
	  		$hasil=MySQL_query ($queri);
		
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' name='idproker' value='".$data['ID_PROKER']."' style='display:none'><br>";
			}
				?>    	
     
      <div class="form-group">
      		<label class="control-label col-sm-2">Nama Koordinator :</label>
      <div class="col-sm-10">
       <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];  //menampikan SEMUA data dari tabel siswa  
	  		$hasil=MySQL_query ($queri);
			$data = mysql_fetch_array ($hasil);
			
			$queri="Select * From karyawan where NIP='".$data['NIP']."'";  //menampikan SEMUA data dari tabel siswa  
	  		$hasil=MySQL_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' name='nip' disabled value='".$data['NAMA']."'><br>";
			}
				?>    	
      </div>
     <div class="form-group">
      		<label class="control-label col-sm-2">Nama Proker :</label>
      <div class="col-sm-10">
       <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];  //menampikan SEMUA data dari tabel siswa  
	  		$hasil=MySQL_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' name='namaproker' disabled value='".$data['NAMA_PROKER']."'><br>";
			}
				?>    	
      </div>
    </div>
     <div class="form-group">
      	<label class="control-label col-sm-2">Pendahuluan :</label>
     	<div class="col-sm-10">
         <?php
			
				echo "<textarea class='form-control' name='pendahuluan' > </textarea><br>";
			
				?> 
      </div>	
    </div>
      <div class="form-group">
      	<label class="control-label col-sm-2">Latar Belakang :</label>
     	<div class="col-sm-10">
         <?php
			
				echo "<textarea class='form-control' name='latarbelakang' > </textarea><br>";
			
				?> 
      </div>	
    </div>
      <div class="form-group">
      	<label class="control-label col-sm-2">Tujuan :</label>
     	<div class="col-sm-10">
        <?php
			
				echo "<textarea class='form-control' name='tujuan' > </textarea><br>";
			
				?> 
      </div>	
    </div>
      
    
    <div class="form-group">
      	<label class="control-label col-sm-2">Mekanisme dan Rancangan :</label>
     	<div class="col-sm-10">
         <?php
			
				echo "<textarea class='form-control' name='mekanisme_rancangan' > </textarea><br>";
		
				?> 
      </div>	
    </div>
    

     <div class="form-group">
      		<label class="control-label col-sm-2">Anggaran :</label>
      <div class="col-sm-10">
         <?php
			
				echo "<input type='text'  class='form-control' name='anggaran'><br>";
			
				?>    
      </div>
    </div>
    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"/><br><br><br><br><br>  
    </form>
	<?php
if(isset ($_POST['simpan'])){



mysql_query("UPDATE `proker` SET `ANGGARAN_DANA`='".$_POST['anggaran']."',`LATAR_BELAKANG`='".$_POST['latarbelakang']."',`TUJUAN`='".$_POST['tujuan']."',`MEKANISME_DAN_RANCANGAN`='".$_POST['mekanisme_rancangan']."',`PENDAHULUAN`='".$_POST['pendahuluan']."' WHERE ID_PROKER =".$_REQUEST['idproker']);

}
?>
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
