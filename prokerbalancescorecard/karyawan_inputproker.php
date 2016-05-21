<?php include "koneksi.php";?>

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
        <li class="active"><a href="karyawan_inputproker.php">Program Kerja</a></li>
        <li><a href="karyawan_viewlpj.php"> Laporan Pertanggung Jawaban</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    	<img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
    	<p><a href="kaprodi_viewproker.php"><button type="button" class="btn btn-primary btn-block active ">View Proker</button></p>
	 	<p><a href="karyawan_deleteproker.php"><button type="button" class="btn btn-primary btn-block disabled">Input Proker</button></a></p>
	 	<p><a href="karyawan_deleteproker.php"><button type="button" class="btn btn-primary btn-block active">Delete Proker</button></a></p>
	</div>
    <div class="col-sm-8 text-left"> 
    	<h2 class="text-center">Input Program Kerja</h2>
      	
		<form id="form2" name="form2" method="post" action="karyawan_inputproker.php">
			<label>Nama Proker</label>
			<input name="proker" class="form-control" 
			<?php 
			if(isset($_POST['proker'])){
				if($_POST['proker']!=NULL){
					echo "value=\"".$_POST['proker']."\"";
				}	
			}
			?>
			> 
			<label>Tujuan</label>
			
			<select name="tujuan" style="width : 100%" class="form-control" id="tujuan" onChange='this.form.submit();'>
				<option value="">Pilih tujuan</option>
				<option value="">------ Finansial -----</option>
				<?php $data = "select * from tujuan where perspektif ='Finansial'";
				
 		 		$query = mysql_query($data);
  				while($data2 = mysql_fetch_array($query))
  				{
					echo "<option value=\"".$data2['ID_TUJUAN']."\"";
					if(isset($_POST['tujuan']))
					if($_POST['tujuan']==$data2['ID_TUJUAN'])
					{
						echo "selected=\"selected\"";
					}
					echo ">".$data2['TUJUAN_ORGANISASI']."</option>";
  				}
				?>
				
				<option value="">------ Customer -----</option>
				<?php $data = "select * from tujuan where perspektif ='Customer'";
				
 		 		$query = mysql_query($data);
  				while($data2 = mysql_fetch_array($query))
  				{
  					echo "<option value=\"".$data2['ID_TUJUAN']."\"";
					if(isset($_POST['tujuan']))
					if($_POST['tujuan']==$data2['ID_TUJUAN'])
					{
						echo "selected=\"selected\"";
					}
					echo ">".$data2['TUJUAN_ORGANISASI']."</option>";
  				}
				?>
				
				<option value="">------ Proses bisnis internal -----</option>
				<?php $data = "select * from tujuan where perspektif ='Proses bisnis internal'";
				
 		 		$query = mysql_query($data);
  				while($data2 = mysql_fetch_array($query))
  				{
  					echo "<option value=\"".$data2['ID_TUJUAN']."\"";
					if(isset($_POST['tujuan']))
					if($_POST['tujuan']==$data2['ID_TUJUAN'])
					{
						echo "selected=\"selected\"";
					}
					echo ">".$data2['TUJUAN_ORGANISASI']."</option>";
  				}
				?>
				
				<option value="">------ Pertumbuhan dan pembelajaran -----</option>
				<?php $data = "select * from tujuan where perspektif ='Pertumbuhan dan pembelajaran'";
				
 		 		$query = mysql_query($data);
  				while($data2 = mysql_fetch_array($query))
  				{
  					echo "<option value=\"".$data2['ID_TUJUAN']."\"";
					if(isset($_POST['tujuan']))
					if($_POST['tujuan']==$data2['ID_TUJUAN'])
					{
						echo "selected=\"selected\"";
					}
					echo ">".$data2['TUJUAN_ORGANISASI']."</option>";
  				}
				?>
				
			</select>
			    
				<input type ="checkbox" name="check_list[]" value="" style="display:none" checked="checked">
				<?php 
				
				
				if(isset($_POST['tujuan'])){
				$data = "select i.ID_INDIKATOR_TUJUAN, i.NAMA_INDIKATOR_TUJUAN from tujuan t, indikator_tujuan i where t.ID_TUJUAN = i.ID_TUJUAN and t.ID_TUJUAN = '".$_POST['tujuan']."'";
 		 		$query = mysql_query($data);
  				while($data2 = mysql_fetch_array($query))
  				{
  					echo "<input type=\"checkbox\" name=\"check_list[]\" value=\"".$data2['ID_INDIKATOR_TUJUAN']."\"/> ".$data2['NAMA_INDIKATOR_TUJUAN']."<br>";
  				}
				}				
				?>
			
			
			<label>Koordinator</label>
			<select name="koordinator" style="width:100%" class="form-control" >
				<option value="">Pilih koordinator</option> 
				<?php $data = "select * from karyawan";
				
 		 		$query = mysql_query($data);
  				while($data2 = mysql_fetch_array($query))
  				{
  					
					echo "<option value=\"".$data2['NIP']."\"";
					if(isset($_POST['koordinator']))
					if($_POST['koordinator']==$data2['NIP'])
					{
						echo "selected=\"selected\"";
					}
					echo ">".$data2['NAMA']."</option>";	
  				}
				?>
			</select>
			
			<label>Target Waktu</label> <br>
			<input type="date" id="coldate1" name="coldate1"
			<?php 
			if(isset($_POST['coldate1']))
			if($_POST['coldate1']!=NULL)
			echo "value=\"".$_POST['coldate1']."\"";
			?>
			>
			
			<input type="date" id="coldate2" name="coldate2"
			<?php 
			if(isset($_POST['coldate2']))
			if($_POST['coldate2']!=NULL)
			echo "value=\"".$_POST['coldate2']."\"";
			?>
			><br>

			
			<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:5px; margin-bottom:5px ;"/>
		</form>
		
		
		<?php 
		if(isset($_POST['simpan']))
		{
			if($_POST['proker']!=NULL&&$_POST['tujuan']!=""&&$_POST['koordinator']!=""&&$_POST['coldate1']!=NULL&&$_POST['coldate2']!=NULL&&sizeof($_POST['check_list'])!=1)
			{
				$sql = "INSERT INTO proker (NAMA_PROKER,NIP,WAKTU_MULAI_PROKER,WAKTU_AKHIR_PROKER,STATUS_PROKER) VALUES ('".$_POST['proker']."','".$_POST['koordinator']."','".$_POST['coldate1']."','".$_POST['coldate2']."','Belum terlaksana')";
				mysql_query($sql);
				
				$sql = "SELECT ID_PROKER from proker WHERE NAMA_PROKER ='".$_POST['proker']."'";
				$query = mysql_query($sql);
				
				$data2 = mysql_fetch_array($query);
				$checklist = $_POST['check_list'];
				$size = sizeof($checklist);
				
				for($i=0;$i<$size;$i++)
				{
					$sql = "INSERT INTO menunjang (ID_PROKER, ID_INDIKATOR_TUJUAN) VALUES ('".$data2['ID_PROKER']."','".$checklist[$i]."')";
					mysql_query($sql);
				}
				
				echo "Data berhasil disimpan";
				
			}
			else
			{
				echo"Anda belum memasukkan data :";
				if($_POST['proker']==NULL)
				{
					echo "<br>- Nama proker";
				}
				
				if($_POST['tujuan']==NULL)
				{
					echo "<br>- Tujuan";
				}
				
				if($_POST['koordinator']==NULL)
				{
					echo "<br>- Nama koordinator";
				}
				
				if($_POST['coldate1']==NULL)
				{
					echo "<br>- Tanggal mulai proker";
				}
				
				if($_POST['coldate2']==NULL)
				{
					echo "<br>- Tanggal akhir proker";
				}
				
				if($_POST['tujuan']!="")
				{
					$tess = $_POST['check_list'];
					$size = sizeof($tess);
					if($size==1)
					echo "<br>- Indikator tujuan";
				}
			}			
		}
		?>
        </div>
        </div>	 
    </div>
<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>
</body>
</html>
