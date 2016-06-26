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
     	<p><a href="admin_tujuan.php"><button type="button" class="btn btn-primary btn-block active">Tujuan</button></a></p>
	 	<p><a href="admin_indikatortujuan.php"><button type="button" class="btn btn-primary btn-block active">Indikator Tujuan</button></a></p>
		<p><a href="admin_karyawan.php"><button type="button" class="btn btn-primary btn-block active">Karyawan</button></a></p>
		<p><a href="admin_proker.php"><button type="button" class="btn btn-primary btn-block active">Proker</button></a></p>
		<p><a href="admin_lpj.php"><button type="button" class="btn btn-primary btn-block active">Laporan Pertanggungjawaban</button></a></p>
		<p><a href="admin_notifikasi.php"><button type="button" class="btn btn-primary btn-block active">Notifikasi</button></a></p>
		<p><a href="admin_userregister.php"><button type="button" class="btn btn-primary btn-block active">Daftarkan user</button></a></p>
		<p><a href="admin_password.php"><button type="button" class="btn btn-primary btn-block active">Ubah Password</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Tujuan Organisasi</h2>
			<table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nomor</th>
							<th>ID Tujuan</th>
                            <th>Tujuan Organisasi</th>
                            <th>Perspektif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
					<?php
	
$queri="SELECT * FROM TUJUAN";
$hasil=mysqli_query($konek_db,$queri);    //fungsi untuk SQL  
$id = 0;
while ($data = mysqli_fetch_array ($hasil)){  
 			$id++; 
 			echo "      
        			<tr>  
        			<td>".$id."</td>
					<td>".$data['ID_TUJUAN']."</td>  
        			<td>".$data['TUJUAN_ORGANISASI']."</td>  
        			<td>".$data['PERSPEKTIF']."</td>   
					<td><a href=\"detail.php?id=".$data['ID_TUJUAN']."&&tipe=tujuan\">"."Detail</a> "." || <a href=\"ubah.php?id=".$data['ID_TUJUAN']."&&tipe=tujuan\">"."Ubah</a>"." || <a href=\"delete.php?id=".$data['ID_TUJUAN']."&&tipe=tujuan\">"."Delete</a></td>
        		</tr>   
        	";      
			}
				if($id==0){
		echo "<div class='alert alert-danger  alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               Data tidak ada
                </div>";
		}
	
		 
	
	
 ?>  
			</table>
			
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html> 
