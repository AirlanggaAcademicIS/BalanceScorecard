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
	 	<p><button type="button" class="btn btn-primary btn-block disabled">Input BSC</button></p>
	 	<p><a href="kaprodi_editbsc.php"><button type="button" class="btn btn-primary btn-block active">Edit BSC</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Input Balance Score Card</h2>
			<form id="form2" name="form2" method="post" action="kaprodi_inputbsc.php">
		  
		    <select name="Perspektif" style="width:100%" class="form-control" >
				<option value="">Pilih Perspektif</option> 
				<option value="Customer">Customer</option>
				<option value="Proses bisnis intenal">Proses bisnis intenal</option>
				<option value="Finansial">Finansial</option>
				<option value="Pertumbuhan dan pembelajaran">Pertumbuhan dan pembelajaran</option>
					
        	</select>
			<label>
       <br><label>
          <div align="left">Tujuan</div>
          </label>
			<div align="left">
			  <input type="text" name="Tujuan" class="form-control" >
			</div>
			<label>
			<div align="left">Indikator</div>
			</label>
			<input name="input_indikator" type="text" placeholder="indikator" id="input_indikator" size="27" class="form-control"/>
             <input type="button" id = "tambah_indikator" class="btn btn-primary" value="Tambah">
			  <script>
				$(document).ready(function(){
					$('#input_indikator').keypress(function(e){
					  if(e.keyCode==13)
					  $('#tambah_indikator').click();
					});
				});
			  </script>
			<textarea name="list_indikator" id="list_indikator" style="width: 310px; height: 100px; border: 0; padding-left: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 12px;background-color: rgba(255, 255, 255, 0.5); resize:none;" class="form-control" readonly></textarea>
		<script>
			var x=1;
			$(document).ready(function(){
				$("#tambah_indikator").click(function(){
					if ($('#input_indikator').val() != '') {
						$('#list_indikator').append($("#input_indikator").val()+"\n");
						$("#input_indikator").val("");
						x++;
					}
				});
			});
		</script>
		  
		  <div align="left">
		   
			  <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:5px; margin-bottom:5px ;"/>
		  </div>
		</form>
    
    <label></label>
  
  <?php 
	if(isset($_POST['simpan']))
		{if($_POST['Tujuan']!=NULL&&$_POST['Perspektif']!=""&&$_POST['list_indikator']!=NULL)
			{
			
				$sql = "INSERT INTO tujuan (TUJUAN_ORGANISASI, PERSPEKTIF) VALUES ('".$_POST['Tujuan']."','".$_POST['Perspektif']."')";
				mysql_query($sql);
				$sql = "SELECT * FROM tujuan WHERE TUJUAN_ORGANISASI ='".$_POST['Tujuan']."'";
				$query = mysql_query($sql);
  				$data2 = mysql_fetch_array($query);
				
				if($_POST['list_indikator']!=NULL){
					$array = explode("\n",$_POST['list_indikator']);
					$size = sizeof($array);	
					for($i=0;$i<$size-1;$i++)
					{
						$sql = "INSERT INTO indikator_tujuan (NAMA_INDIKATOR_TUJUAN,ID_TUJUAN) VALUES ('".$array[$i]."',".$data2['ID_TUJUAN'].")";
						mysql_query($sql);
					}	
				}
				else
				{
					if(isset($_POST['simpan'])){
					echo "<script>alert('maaf data anda belum lengkap');</script>";
					}
				}
			}
		}
		
		?>
   
    </div>
    </form>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html> 
