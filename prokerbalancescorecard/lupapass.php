<?php include "koneksi.php";
session_start();
$_SESSION['NIP']=$_GET['NIP'];
?>

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
            <h2 class="text-center">Masukkan Nomor HP Anda</h2>
<form name="form2" method="post" action="lupapass.php?NIP=<?php echo $_SESSION['NIP'];?>">
<div class="form-group">
      <div class="col-sm-10">
      
      	<input type='text'  class='form-control' name='nomorhp'/>
        <input type="submit" name="cek" value="Cek" class="btn btn-primary"/>
        
        <br />
        <br />
      
       <?php
	   if(isset ($_POST['cek'])){
	   
	   
	   
	   $queri="Select * From karyawan where NIP='".$_SESSION['NIP']."'";  //menampikan SEMUA data dari tabel siswa  
	  		$hasil=MySQL_query ($queri);
			
			
			while ($data = mysql_fetch_array ($hasil)){
				if($_POST['nomorhp']==$data['NOMOR_HP']){
				
				echo "<input type='text'  class='form-control' name='resetpass'>";
				echo "<input type='submit' name='reset' value='Reset' class='btn btn-primary'/>";
				
			}
			}
}
		
			
				?>   
                </form>
                <?php
				if(isset ($_POST['reset'])){
				 	mysql_query("UPDATE `karyawan` SET `PASSWORD`='".$_POST['resetpass']."' WHERE NIP =".$_REQUEST['NIP']);
				 	echo "<div class=\"form-group\"><div class=\"col-sm-12\"><div class=\"alert alert-success\">Password berhasil direset !</div></div></div>";
				 	echo "<meta http-equiv='Refresh' content='0; url=index.php'>";
					}
				?>
      </div>
		</div>
		<div class="navbar navbar-inverse navbar-fixed-bottom">
<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</div>  
</footer>


</body>
</html>
