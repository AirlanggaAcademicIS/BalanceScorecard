<?php include "koneksi.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
        <li><a href="viewlpj.php"> Laporan Pertanggung Jawaban</a></li>
      </ul>
      </li>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <p><a href="viewlpj.php"> <button type="button" class="btn btn-primary btn-block active ">View LPJ</button></a></p>
	<p><button type="button" class="btn btn-primary btn-block disabled">Input LPJ</button></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Masukkan NIP Anda</h2>
    
    <form action="niplupapass.php" method="post">
    
    <div class="form-group">
      		<label class="control-label col-sm-1">NIP :</label>
      
         <input name="NIP/NIK" type="text" id="NIP/NIK" onBlur="MM_validateForm('NIP/NIK','','NisNum');return document.MM_returnValue" size="25" required="required">
      
    <br />
    <br />
    <p onfocus="MM_validateForm('NIP/NIK','','RisNum');return document.MM_returnValue">
         <input type="submit" name="next" value="Next" class="btn btn-primary" ; mm_validateform('nip/nik','','risnum');return document.mm_returnvalue">
       </p>  
       </div>
       </form>
       <?php
	   if (isset($_POST['next'])){
	   $sql="select * from karyawan where NIP='".$_POST['NIP/NIK']."'";
	   $query = mysql_query("select * from karyawan where NIP='".$_POST['NIP/NIK']."'");
	   $rows = mysql_num_rows($query);
	   if ($rows==1){
		header("location: lupapass.php?NIP=".$_POST['NIP/NIK']);
	   }
	   }
	   ?>
</body>
</html>
