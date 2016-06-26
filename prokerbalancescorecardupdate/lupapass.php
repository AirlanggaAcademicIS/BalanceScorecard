<?php include "koneksi.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
<title>Balance Scorecard Universitas Airlangga</title>
	
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<style type="text/css">
<!--
.style2 {
	font-size: 17px;
	color: #FFFFFF;
}
.style4 {font-size: 21px}
-->
</style>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar"> </div>
  </div>
  <br>
    <div align="center" class="style2">Balanced ScoreCard</div>
</nav>
<div id="theme-login-wrapper">
		
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
  </div>
  <div class="collapse navbar-collapse" id="div"> </div>
</div>
            <h2 class="text-center">Masukkan NIP Anda</h2>
    
    <form action="lupapass.php" method="post">
    
    <div class="form-group">
    <div class="col-sm-4">  		
      
         <input name="NIP/NIK" type="text" id="NIP/NIK" class="form-control" placeholder="NIP atau NIK" required="required" />
		 <br>
		 <input name="email" type="text" id="email" class="form-control" placeholder="e-mail" required="required" />
      
    <br />
    <br />
    <p onfocus="MM_validateForm('NIP/NIK','','RisNum');return document.MM_returnValue">
         <input type="submit" name="reset" value="Reset Password" class="btn btn-primary">
       </p>  
       </div>
       </div>
       </form>
       <?php
	   if (isset($_POST['reset'])){
	   $sql="select * from KARYAWAN where NIP='".$_POST['NIP/NIK']."' AND EMAIL ='".$_POST['email']."'";
	   $query = mysqli_query($konek_db,$sql);
	   $rows = mysqli_num_rows($query);
	   if ($rows==1){
			$angka=rand(111111111,999999999);
			$sql="UPDATE KARYAWAN set PASSWORD ='".md5($angka)."' WHERE NIP='".$_POST['NIP/NIK']."' AND EMAIL ='".$_POST['email']."'";
			mysqli_query($konek_db,$sql);
			$to = $_POST['email'];
 			$subject = "Reset Password";
 			$txt = "Password : ".$angka." Silakan login dan ubah password anda";
 			$headers = 'From: Balance Scorecard UA <noreply@balancesc.com>' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

			mail($to,$subject,$txt,$headers);
			echo "Password anda berhasil direset. Silahkan buka email anda untuk mendapatkan password baru dan login <a href='index.php'>di sini</a>.";	
	   }
	   else
	   		echo "NIP atau email yang anda masukkan salah.";
	   }
	   ?>
       <div class="navbar navbar-inverse navbar-fixed-bottom">
<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</div>  
</footer>
</body>
</html>
