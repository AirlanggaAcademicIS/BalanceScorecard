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
        <li ><a href="karyawan_home.php">Home</a></li>
        <li><a href="karyawan_viewbsc.php">Balance Score Card</a></li>
        <li><a href="karyawan_viewproker.php">Program Kerja</a></li>
        <li class="active"><a href="karyawan_viewlpj.php">Laporan Pertanggung Jawaban</a></li>
      </ul>
      </li>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     <img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
    	<p><button type="button" class="btn btn-primary btn-block disabled ">View LPJ</button></a></p>
		<p><a href="karyawan_inputlpj.php"><button type="button" class="btn btn-primary btn-block actived">Input LPJ</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Laporan Pertanggung Jawaban</h2>
				<form id="form1" name="form1" method="post" action="karyawan_viewlpj.php">
				<label for="sel1">Tahun</label>            
				<select class="form-control" name="tahun" onChange='this.form.submit();'>
				<option>Tahun</option>
 			<?php 
 				for($i=2016;$i<=2021;$i++)
 					{
 						echo "<option value=".$i.">".$i."</option>";
					 }
					?>
  		</select>
  </form>
	<br>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nomor</th>
							<th>Id LPJ</th>
                            <th>Nama Proker</th>
                            <th>Evaluasi</th>
                            <th>Keberlanjutan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
 <?php 
if($_POST['tahun']!="Tahun"){	
$queri="Select distinct l.id_lpj, p.nama_proker, l.evaluasi, l.keberlanjutan From laporan_pertanggung_jawaban l, proker p where l.id_proker=p.id_proker and YEAR(WAKTU_MULAI_PROKER) = \"".$_POST['tahun']."\"";
$hasil=MySQL_query ($queri);    //fungsi untuk SQL  
$id = 0;
while ($data = mysql_fetch_array ($hasil)){  
 			$id++; 
 			echo "      
        			<tr>  
        			<td>".$id."</td>
					<td>".$data[0]."</td>  
        			<td>".$data[1]."</td>  
        			<td>".$data[2]."</td>  
        			<td>".$data[3]."</td>  
					<td><a href=\"kaprodi_viewdetaillpj.php?id=".$id."\">"."Detail</a> "."
        		</tr>   
        	";      
			}
				if($id==0){
		echo "<div class='alert alert-danger  alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               Data tidak ada
                </div>";
		}
	
		} 
	
	
 ?>  
</table><br><br><br><br><br>
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