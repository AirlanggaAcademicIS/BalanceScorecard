<?php include "koneksi.php"?>
<!DOCTYPE html>
<html lang="en" iostream>
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
        <li><a href="viewlpj.php">Laporan Pertanggung Jawaban</a></li>
      </ul>
      </li>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     <p><button type="button" class="btn btn-primary btn-block disabled ">View Proker</button></p>
	 <p><a href="inputproker.php"><button type="button" class="btn btn-primary btn-block active">Input Proker</button></a></p>
    </div>
    
    <div class="col-sm-8 text-left"> 
       <h2 class="text-center">Program Kerja</h2>
   		<div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        	<th>Nomor</th>
			    			<th>ID Proker</th>
                            <th>Nama Proker</th>
                            <th>Aksi </th>
                            
                        </tr>
                    </thead>  
                    <?php    
		// Perintah untuk menampilkan data  
		$queri="Select * From proker where status_proker='gagal'";  //menampikan SEMUA data dari tabel siswa  
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
		<td><a href=\"viewdetailproker.php?id=".$data['ID_PROKER']."\">"."Detail</a>"." </td> 
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
