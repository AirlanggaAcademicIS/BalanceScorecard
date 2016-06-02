<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Balanc e Scorecard Universitas Airlangga</title>
</head>

<?php
include "koneksi.php";
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

// Define $username and $password
$username=$_POST['NIP/NIK'];
$password=$_POST['password'];
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from karyawan where NIP='$username' AND PASSWORD='$password'");
$rows = mysql_num_rows($query);
$data = mysql_fetch_array($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
$_SESSION['jabatan'] = $data['JABATAN'];
if($_SESSION['jabatan'] == "kaprodi"){
header("location: kaprodi_home.php"); // Redirecting To Other Page
}
if($_SESSION['jabatan'] == "koordinator"){
header("location: karyawan_home.php"); // Redirecting To Other Page
}
} 



else {	
include "gagallogin.php";
}
?>

<body>
</body>
</html>
