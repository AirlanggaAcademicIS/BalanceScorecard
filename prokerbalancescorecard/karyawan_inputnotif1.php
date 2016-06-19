<?php include "koneksi.php";
session_start();
$_SESSION['id']=$_GET['id'];?>
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
        <li><a href="index.php">Home</a></li>
        <li><a href="viewbsc.php">Balance Score Card</a></li>
        <li><a href="karyawan_viewproker.php">Program Kerja</a></li>
        <li><a href="viewlpj.php">Laporan Pertanggung Jawaban</a></li>
      </ul>
      </li>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     
    </div>
    
    <div class="col-sm-8 text-left"> 
       <h2 class="text-center">Input Notifikasi</h2>
        	<div class="form-group">
      			<label class="control-label col-sm-2">Nama Proker :</label>
      		<div class="col-sm-10">
            <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];  //menampikan SEMUA data dari tabel 
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
     		  <form name="notif" method="post" action="karyawan_inputnotif1.php?id=<?php echo $_SESSION['id'];?>" >
              <textarea name="Notifikasi" rows="5" class="form-control" id="dp" type="text">
        	  </textarea>
     		  <br><div class="col-sm-14">
			  
			  <div class="radio">
<label><input type="radio" name="optradio" value="belum terlaksana">Belum terlaksana</label>
<label><input type="radio" name="optradio" value="tidak terlaksana">Tidak terlaksana</label>
</div>

			 
    <input class="btn btn-primary" type="submit" name="Submit" value="Simpan" style="float:right"/></div><br>
       <form/>
		<?php 
		if(isset($_POST['Submit']))
		{
			if(empty(trim($_POST['Notifikasi']))||(!isset($_POST['optradio'])))
			{
				echo "<br><div class=\"form-group\"><div class=\"col-sm-14\"><div class=\"alert alert-danger alert alert-dismissable\">";
				if(empty(trim($_POST['Notifikasi'])))
				{echo "Notifikasi belum diinputkan<br>";}
				if(!isset($_POST['optradio']))
				{echo "Status belum terpilih";}
				echo "</div>";
				
			}
			else
			{
				$sql = "INSERT INTO notifikasi (NOTIFIKASI,ID_PROKER) VALUES ('".$_POST['Notifikasi']."',".$_GET['id'].")";// db
				mysql_query($sql);
				
				echo "<meta http-equiv='Refresh' content='0; url=karyawan_viewproker.php'>";
				echo "<br><div class=\"form-group\"><div class=\"col-sm-14\"><div class=\"alert alert-success\">Data berhasil disimpan.</div></div></div>";
		
		
				$queri="Select * From notifikasi where ID_PROKER=".$_GET['id']." ORDER BY ID_NOTIFIKASI DESC";  //menampikan SEMUA data dari tabel 
	  			$hasil=mysql_query ($queri);
				$data= mysql_fetch_array($hasil);
				if($_POST['optradio']=="belum terlaksana"){
					mysql_query("UPDATE `proker` SET `ID_NOTIFIKASI`='".$data['ID_NOTIFIKASI']."', STATUS_PROKER ='Belum terlaksana' WHERE ID_PROKER =".$_GET['id']);
				}
				else
				{
					mysql_query("UPDATE `proker` SET `ID_NOTIFIKASI`='".$data['ID_NOTIFIKASI']."', STATUS_PROKER ='Tidak terlaksana' WHERE ID_PROKER =".$_GET['id']);
				}
			}
		
			
			
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
