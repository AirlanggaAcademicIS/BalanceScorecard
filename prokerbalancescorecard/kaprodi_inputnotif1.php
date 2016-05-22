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
        <li><a href="viewlpj.php">Laporan Pertanggung Jawaban</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
       <h2 class="text-center">Input Notifikasi</h2>
        	<div class="form-group">
      			<label class="control-label col-sm-2">Nama Proker :</label>
      		<div class="col-sm-10">
            <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id1'];  //menampikan SEMUA data dari tabel siswa  
	  		$hasil=MySQL_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' id='namaproker' disabled value='".$data['NAMA_PROKER']."'><br>";
			}
				?>    	
     		 </div>
        </div>	
         	<div class="form-group">
      			<label class="control-label col-sm-2">Notifikasi :</label>
     		<div class="col-sm-10">
     		  <form name="notif" method="post" action="inputnotif1.php" >
              <textarea name="Notifikasi" rows="5" class="form-control" id="dp" type="text">
        	  </textarea>
     		  <br>
      		</div>
      </div>	
         <div class="col-sm-14 text-right">
       <input class="btn btn-primary" type="submit" name="Submit" value="Simpan"/><br>
       <form/>
		<?php 
		if(isset($_POST['Submit']))
		{
			if($_POST['Notifikasi']!="")
			{
				$sql = "INSERT INTO notifikasi (NOTIFIKASI,ID_PROKER) VALUES ('".$_POST['Notifikasi']."',".$_GET['id1'].")";// db
				mysql_query($sql);
				
			}
			else
			{
			
			}
			
		}
		?>
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
