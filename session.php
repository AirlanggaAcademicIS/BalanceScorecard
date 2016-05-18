<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include "koneksi.php";
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from karyawan where NIP='$user_check'");
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['NAMA'];
$login_session1 =$row['NIP'];

if(!isset($login_session)){
header('Location: home.php'); // Redirecting To Home Page
}
?>
 

<body>
</body>
</html>
