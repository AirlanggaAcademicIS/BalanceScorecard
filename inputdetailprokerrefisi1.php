<?php include "koneksi.php";

/*echo $_GET['id'];*/


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<title>Untitled Document</title>
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
        <li><a href="#">Balance Score Card</a></li>
        <li class="active"><a href="proker.php">Program Kerja</a></li>
        <li><a href="viewlpj.php">Laporan Pertanggung Jawaban</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <p><a href="proker.php"> <button type="button" class="btn btn-primary btn-block active ">View Proker</button></a></p>
	<p><a href="#"> <button type="button" class="btn btn-primary btn-block disabled">Input Proker</button></a></p>
	</div>


<div class="col-sm-8 text-left">
  <h2 class="text-center">Input Program Kerja</h2>
  <form id="form2" name="form2" method="post" action="inputdetailprokerrefisi1.php">
  		
            <h3>Program Kerja :</h3>
        <div class="panel panel-default">
      <div class="panel-body">
        Menjalin kerjasama dengan Stakeholder
      </div>
    </div>
    
    <div class="form-group">
   		<h3>Pendahuluan :</h3>
		<textarea name="pendahuluan" textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
    
    <div class="form-group">
   		<h3>Latar Belakang :</h3>
		<textarea name="latarbelakang" textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
    
    
    <div class="form-group">
    	<h3>Tujuan :</h3>
      <textarea name="tujuan" textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
    
    <div class="form-group">
    	<h3>Mekanisme dan Rancangan :</h3>
      <textarea name="mekanisme_rancangan" textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
        
        
		<div class="form-group">
  		<h3>Anggaran Dana :</h3>
  		<input name="anggaran" input type="text" class="form-control" id="usr">
			</div>  	
    
       	<h3>Koordinator :</h3>
    <div class="panel panel-default">
  		<div class="panel-body">
    Putratama Geza
  </div>
  </div>

    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:5px; margin-bottom:5px ;"/>
  
  <?php
if(isset ($_POST['simpan'])){

echo $_GET['id'];

mysql_query("UPDATE `proker` SET `ANGGARAN_DANA`='".$_POST['anggaran']."',`LATAR_BELAKANG`='".$_POST['latarbelakang']."',`TUJUAN`='".$_POST['tujuan']."',`MEKANISME_DAN_RANCANGAN`='".$_POST['mekanisme_rancangan']."',`PENDAHULUAN`='".$_POST['pendahuluan']."' WHERE ID_PROKER =1");
}

?>
</form>
</div>

</body>
</html>
