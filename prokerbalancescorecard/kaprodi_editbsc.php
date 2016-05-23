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
        <li ><a href="kaprodi_home.php">Home</a></li>
        <li class="active"><a href="kaprodi_viewbsc.php">Balance Score Card</a></li>
        <li><a href="kaprodi_viewproker.php">Program Kerja</a></li>
        <li ><a href="kaprodi_viewlpj.php"> Laporan Pertanggung Jawaban</a></li>
		<li><a href="kaprodi_monitoring.php">Monitoring</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
		<img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
     	<p><a href="kaprodi_viewbsc.php"><button type="button" class="btn btn-primary btn-block active">View BSC</button></a></p>
	 	<p><a href="kaprodi_inputbsc.php"><button type="button" class="btn btn-primary btn-block active">Input BSC</button></a></p>
	 	<p><button type="button" class="btn btn-primary btn-block disabled">Edit BSC</button></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Edit Balance Score Card</h2>
            <form id="form2" name="form2" method="post" action="editbsc.php">
		 
		 <label>Tujuan yang mau diganti</label>
			<select name="Tujuan" style="width:100%" class="form-control" onChange="this.form.submit()">
				<option value="">Pilih Tujuan</option> 
				<?php $data = "select * from tujuan";
				
 		 		$query = mysql_query($data);
  				while($data2 = mysql_fetch_array($query))
  				{
  					if(isset($_POST['Tujuan']))
					{
						if($_POST['Tujuan']==$data2['ID_TUJUAN'])
						{
							echo "<option value=\"".$data2['ID_TUJUAN']."\" selected=\"selected\">".$data2['TUJUAN_ORGANISASI']."</option>";
						}
						else
						{
							echo "<option value=\"".$data2['ID_TUJUAN']."\">".$data2['TUJUAN_ORGANISASI']."</option>";
						}
  					}
					else
						{
							echo "<option value=\"".$data2['ID_TUJUAN']."\">".$data2['TUJUAN_ORGANISASI']."</option>";
						}
				}
				?>
			</select>  
			<label>
       <br><label>
          <div align="left">Tujuan yang baru</div>
          </label>
			<div align="left">
			  <input name="Tujuannew" class="form-control" >
			</div>
			<label>
       <br><label>
          <div align="left">Perspektif yang lama</div>
          </label>
			<div align="left">
			  <?php 
			  if(isset($_POST['Tujuan']))
			  {
			  	 echo "<input name=\"Perspektif\" disabled= \"disabled\" class=\"form-control\" value = \"";
			  $data = "select * from tujuan WHERE ID_TUJUAN = ".$_POST['Tujuan'];
				
 		 		$query = mysql_query($data);
  				while($data2 = mysql_fetch_array($query))
  				{
  					echo $data2['PERSPEKTIF'];
  				}
				echo "\">";
			  }
			  ?>
			 
			  <label>Perspektif yang baru</label>
			<select name="Perspektifnew" style="width:100%" class="form-control" >
			<option value="Pilih Perspektif"> Pilih Perspektif </option>
				<option value="Customer"> Customer </option>
				<option value="Finansial"> Finansial </option> 
				<option value="Proses bisnis intenal">Proses bisnis intenal </option> 
				<option value="Pertumbuhan dan pembelajaran"> Pertumbuhan dan pembelajaran </option>  
				
			</select>
			</div>
			
			 <label>Indikator 1 yang mau diganti</label>
			<select name="Indikator1" style="width:100%" class="form-control" >
				<option value="">Pilih Indikator </option> 
				 <?php 
			  if(isset($_POST['Tujuan']))
			  {
			  	 
			  $data = "select * from indikator_tujuan WHERE ID_TUJUAN = ".$_POST['Tujuan'];
				
 		 		$query = mysql_query($data);
  				while($data2 = mysql_fetch_array($query))
  				{
  					echo "<option Value = '".$data2['ID_INDIKATOR']."'>".$data2['NAMA_INDIKATOR_TUJUAN']."</option>>";
  				}
				echo "\">";
			  }
			  ?>
			</select> 
			<label>
			<div align="left">Indikator 1 baru</div>
			</label>
		  <div align="left">
		   
			  <input name="Indikator1new" class="form-control" > 
			  
			  </p>
			  
				
				 
				
			  
			  
			  
			  
			  <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:5px; margin-bottom:5px ;"/>
		  </div></div>
		</form>
    </div>
     </form>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html>
