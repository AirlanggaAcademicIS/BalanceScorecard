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
        <li ><a href="karyawan_home.php">Home</a></li>
        <li><a href="karyawan_viewbsc.php">Balance Score Card</a></li>
        <li><a href="karyawan_viewproker.php">Program Kerja</a></li>
        <li class="active"><a href="karyawan_viewlpj.php"> Laporan Pertanggung Jawaban</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav"">
	<img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
    <p><a href="karyawan_viewlpj.php"> <button type="button" class="btn btn-primary btn-block active ">View LPJ</button></a></p>
	<p><button type="button" class="btn btn-primary btn-block disabled">Input LPJ</button></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Input Laporan Pertanggung Jawaban</h2>
     
	 <?php 
	   if(isset($_POST['Submit']))
	   {
	   		
			if(!empty(trim($_POST['keberlanjutan']))&&!empty(trim($_POST['eval']))&&$_FILES['myFile']['name'] != "")
			{
				$sql = "INSERT INTO laporan_pertanggung_jawaban (EVALUASI, KEBERLANJUTAN, ID_PROKER) VALUES('".$_POST['eval']."','".$_POST['keberlanjutan']."',".$_REQUEST['idproker'].")";			$query = mysql_query($sql);
				
				$sql = "SELECT * FROM laporan_pertanggung_jawaban WHERE ID_PROKER = ".$_REQUEST['idproker'];
				$query = mysql_query($sql);
				$data2 = mysql_fetch_array($query);
				
				$sql2 = "UPDATE proker SET ID_LPJ = ".$data2['ID_LPJ']." WHERE ID_PROKER = ".$_REQUEST['idproker'];
				mysql_query($sql2);
				
				if(isset($_FILES["myFile"]["error"]))
				{
   					if($_FILES["myFile"]["error"] > 0){
 						echo "Error: " . $_FILES["myFile"]["error"] . "<br>";
					} 
					else
					{
       					$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf" => "application/pdf", "doc" => "application/msword", "docx" => "application/msword");
       					$filename = $_FILES["myFile"]["name"];
      					$filetype = $_FILES["myFile"]["type"];
      					$filesize = $_FILES["myFile"]["size"];
     					// Verify file extension
      					$ext = pathinfo($filename, PATHINFO_EXTENSION);
      					if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
     					// Verify file size - 5MB maximum
     					$maxsize = 5 * 1024 * 1024;
    					if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
     					// Verify MYME type of the file
     					if(in_array($filetype, $allowed)){
        				// Check whether file exists before uploading it
        					if(file_exists("" . $_SESSION['idnya'])){
             					echo $_SESSION['idnya'] . " is already exists.";
							} 
							else
							{
           						move_uploaded_file($_FILES["myFile"]["tmp_name"], "" . $_SESSION['idnya'] .".". end(explode(".", $_FILES["myFile"]["name"])));
								
           					} 
						} 
						else
						{
          					echo "Error: There was a problem uploading your file - please try again."; 
    					}
					}
				} 
				else
				{
				 	echo "Error: Invalid parameters - please contact your server administrator.";
				}
				echo "<meta http-equiv='Refresh' content='0; url=karyawan_viewproker.php'>";
				echo "<div class=\"form-group\"><div class=\"col-sm-12\"><div class=\"alert alert-success\">Data berhasil disimpan.</div></div></div>";
			}
			else
			{
				echo "<div class=\"form-group\"><div class=\"col-sm-12\"><div class=\"alert alert-danger alert alert-dismissable\">";
				echo"Anda belum memasukkan data :";
				if(empty(trim($_POST['keberlanjutan'])))
				{
					echo "<br>- Keberlanjutan";
				}
				if(empty(trim($_POST['eval'])))
				{
					echo "<br>- Evaluasi";
				}
				if ($_FILES['myFile']['name'] == "")
				{
   				 	echo "<br>- Upload file LPJ";
				}
				echo "</div></div></div>";
			}
	   }
	   ?>
	 
	 
	 <form name = "form" action="karyawan_inputlpj.php?id=<?php echo $_SESSION['idnya']; session_destroy();?>" method="post" enctype="multipart/form-data">
	 <div class="form-group">
      		<label class="control-label col-sm-2">Nama Proker :</label>
      <div class="col-sm-10">
         <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];    
	  		$hasil=mysql_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' name='idproker' value='".$data['ID_PROKER']."' style=\"display:none\">";
				echo "<input type='text'  class='form-control' name='namaproker' disabled value='".$data['NAMA_PROKER']."'><br>";
			}
				?>   
      </div>
    </div>
      <div class="form-group">
      	<label class="control-label col-sm-2">Latar Belakang :</label>
     	<div class="col-sm-10">
      <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];    
	  		$hasil=mysql_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text' class='form-control' name='latarbelakang' disabled value='".$data['LATAR_BELAKANG']."'><br>";
			}
				?> 
      </div>	
    </div>
      <div class="form-group">
      	<label class="control-label col-sm-2">Tujuan :</label>
     	<div class="col-sm-10">
        <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];    
	  		$hasil=mysql_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text' class='form-control' name='tujuan' disabled value='".$data['TUJUAN']."'><br>";
			}
				?> 
      </div>	
    </div>
      <div class="form-group">
      	<label class="control-label col-sm-2">Deskripsi :</label>
     	<div class="col-sm-10">
        <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];    
	  		$hasil=mysql_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' name='deskripsi' disabled value='".$data['DESKRIPSI']."'><br>";
			}
				?> 
      </div>	
    </div>
<div class="form-group">
      	<label class="control-label col-sm-2">Waktu :</label>
     	<div class="col-sm-4">
        <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];    
	  		$hasil=mysql_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' name='waktumulai' disabled value='".$data['WAKTU_MULAI_PROKER']."'><br>";
			}
				?>   
      </div>
	  <div class="col-sm-2" style="text-align:center">s/d</div>
      <div class="col-sm-4">
          <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id'];    
	  		$hasil=mysql_query ($queri);
			
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' name='waktuberakhir' disabled value='".$data['WAKTU_AKHIR_PROKER']."'><br>";
			}
				?>    
      </div>	
      
    </div>     
     <div class="form-group">
      		<label class="control-label col-sm-2">Anggaran :</label>
      <div class="col-sm-10">
        <?php
			$queri="Select * From proker where ID_PROKER=".$_GET['id']; 
	  		$hasil=mysql_query ($queri);
			while ($data = mysql_fetch_array ($hasil)){
				echo "<input type='text'  class='form-control' name='anggaran' disabled value='".$data['ANGGARAN_DANA']."'><br>";
			}
				?>   
      </div>
    </div>    
     <div class="form-group">
      		<label class="control-label col-sm-2">Indikator :</label>
      <div class="col-sm-10">
        <label class="checkbox-inline"><input type="checkbox" value="Acara">Acara</label> 
		<label class="checkbox-inline"><input type="checkbox" value="Publikasi">Publikasi</label>
		<label class="checkbox-inline"><input type="checkbox" value="Dok">Dokumentasi</label><br>
		<label class="checkbox-inline"><input type="checkbox" value="Dana">Dana</label>  
		<label class="checkbox-inline"><input type="checkbox" value="Konsumsi">Konsumsi</label> 
		<label class="checkbox-inline"><input type="checkbox" value="kesekretariatan">Kesekretariatan</label>
      <br></div>
    </div>    
     <div class="form-group">
      		<label class="control-label col-sm-2">Evaluasi :</label>
      <div class="col-sm-10">
        <textarea type="text" class="form-control" rows="5" name="eval">
        </textarea><br>
       	</div> 
   	  </div>
		<div class="form-group">
      		<label class="control-label col-sm-2">Keberlanjutan :</label>
      <div class="col-sm-10">
        <textarea type="text" class="form-control" rows="5" name="keberlanjutan">
        </textarea><br>
       	  </div> 
    	</div>
       <div class="form-group">
      		<label class="control-label col-sm-2">Upload LPJ :</label>
       <div class="col-sm-10">
       <input type="file" name="myFile" size="50"><br>
   		 </div> 
      </div>
       
      <div class="col-sm-12">
       <input class="btn btn-primary" type="submit" name="Submit" value="Simpan" style="float:right;"/><br><br><br><br><br>
      </div>
	   <form/>
	  
	</div> 
  </div>
</div>	

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html>
