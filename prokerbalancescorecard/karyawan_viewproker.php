<?php  
//membuat koneksi ke database  
include "koneksi.php";
session_start();
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
        <li ><a href="karyawan_home.php">Home</a></li>
        <li><a href="karyawan_viewbsc.php">Balance Score Card</a></li>
        <li class="active"><a href="karyawan_viewproker.php">Program Kerja</a></li>
        <li><a href="karyawan_viewlpj.php"> Laporan Pertanggung Jawaban</a></li>
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
	 	<p><a href="karyawan_inputdetailproker.php"><button type="button" class="btn btn-primary btn-block active">Detail Proker</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">View Program Kerja</h2>
            <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#belumterlaksana">Belum Terlaksana</a></li>
    <li><a data-toggle="tab" href="#terlaksana">Terlaksana</a></li>
    <li><a data-toggle="tab" href="#tidakterlaksana">Tidak Terlaksana</a></li>
  	</ul>
<div class="tab-content">
    <div id="terlaksana" class="tab-pane fade"><br>
      <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        	<th>Nomor</th>
			    			<th>ID Proker</th>
                            <th>Nama Proker</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>  
                    <?php    
     
		// Perintah untuk menampilkan data  
		$queri="Select * From proker where status_proker='Terlaksana' and nip='".$_SESSION['login_user']."'";  //menampikan SEMUA data dari tabel siswa  
  		$hasil=MySQL_query ($queri);  
		$id = 0;    //fungsi untuk SQL  
  		// perintah untuk membaca dan mengambil data dalam bentuk array  
			while ($data = mysql_fetch_array ($hasil)){  
				$id++; 	
 			echo "      
        <tr>  
			<td>".$id."</td>
			<td>".$data['ID_PROKER']."</td>  
        	<td>".$data['NAMA_PROKER']."</td>  
        	<td>".$data['WAKTU_MULAI_PROKER']." s/d ".$data['WAKTU_AKHIR_PROKER']."</td>  
        	<td>".$data['STATUS_PROKER']."</td>  
			<td><a href=\"karyawan_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a> "." || <a href=\"karyawan_viewdetaillpj.php?id=".$data['ID_LPJ']."\">"."LPJ</a>"."</td>  
        </tr>  
        		";            
		}    
 
?>  
				</table>
    		</div>
            
    </div>
    <div id="tidakterlaksana" class="tab-pane fade"><br>
   		<div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        	<th>Nomor</th>
			    			<th>ID Proker</th>
                            <th>Nama Proker</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Aksi </th>
                            
                        </tr>
                    </thead>  
                    <?php    
		// Perintah untuk menampilkan data  
		$queri="Select * From proker where status_proker='Tidak terlaksana' and nip='".$_SESSION['login_user']."'";  //menampikan SEMUA data dari tabel siswa  
  		$hasil=MySQL_query ($queri); 
		$id1=0;   //fungsi untuk SQL  
  		// perintah untuk membaca dan mengambil data dalam bentuk array  
			while ($data = mysql_fetch_array ($hasil)){  
				$id1++;
 			echo "      
        <tr>  
		<td>".$id1."</td>
		<td>".$data['ID_PROKER']."</td>  
        <td>".$data['NAMA_PROKER']."</td>  
        <td>".$data['WAKTU_MULAI_PROKER']." s/d ".$data['WAKTU_AKHIR_PROKER']."</td>  
        <td>".$data['STATUS_PROKER']."</td> 
		<td><a href=\"karyawan_viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a>"." || <a href=\"karyawan_viewnotif.php?id=".$data['ID_PROKER']."\">"."Notifikasi</a>"."</td>  
        </tr>  
        		";            
		}    
 
?>  
				</table>
    		</div>
        </div>	
    <div id="belumterlaksana" class="tab-pane fade in active"><br>
   		<div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        	<th>Nomor</th>
			    			<th>ID Proker</th>
                            <th>Nama Proker</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Aksi </th>
                            
                        </tr>
                    </thead>  
                    <?php    
		// Perintah untuk menampilkan data  
		$queri="Select * From proker where status_proker='Belum terlaksana' and nip='".$_SESSION['login_user']."'";  //sql yang diganti disini iz
  		$hasil=MySQL_query ($queri);  
		$id1=0;   //fungsi untuk SQL  
  		// perintah untuk membaca dan mengambil data dalam bentuk array  
			while ($data = mysql_fetch_array ($hasil)){  
				$id1++;
 			echo "      
        <tr>  
		<td>".$id1."</td>
		<td>".$data['ID_PROKER']."</td>  
        <td>".$data['NAMA_PROKER']."</td>  
        <td>".$data['WAKTU_MULAI_PROKER']." s/d ".$data['WAKTU_AKHIR_PROKER']."</td>  
        <td>".$data['STATUS_PROKER']."</td> 
		<td><a href=\"karyawan_inputdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a>"." || <a href=\"karyawan_inputnotif1.php?id=".$data['ID_PROKER']."\">"."Notifikasi</a>"." || <a href=\"karyawan_inputlpj.php?id=".$data['ID_PROKER']."\">"."LPJ</a>"."</td>  
        </tr>  
        		";            
		}    
 
?>  
				</table>
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
