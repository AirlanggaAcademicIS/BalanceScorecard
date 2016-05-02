<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Balance Scorecard Universitas Airlangga</title>
</head>
<?php
include "koneksi.php";//mengambil isian username dan password dari form
if(isset($_POST['Login'])) {
$username = $_POST['NIP/NIK'];
$password = $_POST['password'];
$sql = mysql_query("SELECT * FROM karyawan WHERE NIP='$username' &&
PASSWORD='$password'");
$num = mysql_num_rows($sql);
if($num==1) {
// login benar //
$_SESSION['NIP/NIK'] = $username;
$_SESSION['password'] = $password;
?><script language="JavaScript">alert('Selamat, Login Anda Sukses!!');
document.location='file/deleteproker.php'</script><?
include "tampillogin.php";
}
//jika password tidak sesuai
else {	
include "gagallogin.php";
}
?>

<body>
</body>
</html>
