<?php  
//membuat koneksi ke database  
include "koneksi.php";
include('session.php');
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
   <script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script>
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
        
      </ul>
     <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
		<img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
     	<p><a href="admin_tujuan.php"><button type="button" class="btn btn-primary btn-block active">Tujuan</button></a></p>
	 	<p><a href="admin_indikatortujuan.php"><button type="button" class="btn btn-primary btn-block active">Indikator Tujuan</button></a></p>
		<p><a href="admin_karyawan.php"><button type="button" class="btn btn-primary btn-block active">Karyawan</button></a></p>
		<p><a href="admin_proker.php"><button type="button" class="btn btn-primary btn-block active">Proker</button></a></p>
		<p><a href="admin_lpj.php"><button type="button" class="btn btn-primary btn-block active">Laporan Pertanggungjawaban</button></a></p>
		<p><a href="admin_notifikasi.php"><button type="button" class="btn btn-primary btn-block active">Notifikasi</button></a></p>
		<p><a href="admin_userregister.php"><button type="button" class="btn btn-primary btn-block active">Daftarkan user</button></a></p>
		<p><a href="admin_password.php"><button type="button" class="btn btn-primary btn-block active">Ubah Password</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Pendaftaran User</h2>
			<form method="post" action="admin_userregister.php">
			<input type='text' name='NIP' class='form-control' placeholder='NIP' required="required"><br>
			<input type='text' name='Nama' class='form-control' placeholder='Nama User' required="required"><br>
			<input type='text' name='email' class='form-control' placeholder='email user' required="required"><br>
			<select name="jabatan" style="width:100%" class="form-control" required="required">
			<option value="Pilih jabatan"> Pilih Jabatan </option>
				<option value="kaprodi"> Kaprodi </option>
				<option value="koordinator"> Koordinator </option> 				
			</select>
			<br><input placeholder='Tanggal Lahir' type="text" id="coldate1" name="coldate1" class="IP_calendar" alt="date" title="Y/m/d" style="width:100%" required="required"/><br>
			<br><input type='submit' name='simpan' value='Daftarkan' class='btn btn-primary'>
			</form>
			<?php 
			if(isset($_POST['simpan']))
			{
				$password = rand(111111111,999999999);
				$sql = "INSERT INTO KARYAWAN (NIP,NAMA,EMAIL,TANGGAL_LAHIR,JABATAN,PASSWORD) VALUES ('".$_POST['NIP']."','".$_POST['Nama']."','".$_POST['email']."','".$_POST['coldate1']."','".$_POST['jabatan']."','".md5($password)."')";
				mysqli_query($konek_db,$sql);
				$to = $_POST['email'];
 				$subject = "Password Awal";
 				$txt = "Password : ".$password." Silakan login dan ubah password anda";
 				$headers = 'From: Balance Scorecard UA <noreply@balancesc.com>' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
				mail($to,$subject,$txt,$headers);
				echo "<br>User berhasil terdaftar";
			}?>
			
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html> 
