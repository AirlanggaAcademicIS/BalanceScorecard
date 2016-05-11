<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Balance Scorecard Universitas Airlangga</title>
</head>
<?php
include "koneksi.php";//mengambil isian username dan password dari form

$username = $_POST['NIP/NIK'];
$password = $_POST['password'];

//query untuk mengambil data user dari database sesuai dengan username inputan form
$q = "SELECT * FROM karyawan WHERE NIP='".$username."'";
$result = mysql_query($q);
$data = mysql_fetch_array($result);

//cek kesesuaian password masukan dengan database
if ($password == $data[3]) {

// login benar //
$_SESSION['JABATAN'] = $data['JABATAN'];
$_SESSION['NIP/NIK'] = $data['NIP/NIK'];

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
