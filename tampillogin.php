<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Balance Scorecard Universitas Airlangga</title>
</head>
<?php
session_start();
include "koneksi.php";
echo "<center>";
echo "<h3> Menu </h3>";
if ($_SESSION['JABATAN'] == "kaprodi") {
echo " Anda Login sebagai Kaprodi";
}
else if ($_SESSION['JABATAN'] == "a") {
echo " Anda Login sebagai Karyawan";
}
?>
<body>
</body>
</html>
