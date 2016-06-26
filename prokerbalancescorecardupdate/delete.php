<?php 
include "koneksi.php";
$id=$_GET['id'];
$tipe=$_GET['tipe'];

switch($tipe)
{
	case "proker" : 
	$sql="DELETE FROM PROKER WHERE ID_PROKER=".$id;
	mysqli_query($konek_db,$sql);
	echo "<meta http-equiv='Refresh' content='0; url=admin_proker.php'>";
	break;
	case "tujuan" :
	$sql="DELETE FROM TUJUAN WHERE ID_TUJUAN=".$id;
	mysqli_query($konek_db,$sql);
	echo "<meta http-equiv='Refresh' content='0; url=admin_tujuan.php'>";
	break;
	case "indikator" : 
	$sql="DELETE FROM INDIKATOR_TUJUAN WHERE ID_INDIKATOR_TUJUAN=".$id;
	mysqli_query($konek_db,$sql);
	echo "<meta http-equiv='Refresh' content='0; url=admin_indikatortujuan.php'>";
	break;
	case "notifikasi" : 
	$sql="DELETE FROM NOTIFIKASI WHERE ID_NOTIFIKASI=".$id." AND ID_PROKER=".$_GET['id2'];
	mysqli_query($konek_db,$sql);
	echo "<meta http-equiv='Refresh' content='0; url=admin_notifikasi.php'>";
	break;
	case "lpj" : 
	$sql="DELETE FROM LAPORAN_PERTANGGUNG_JAWABAN WHERE ID_LPJ=".$id;
	mysqli_query($konek_db,$sql);
	echo "<meta http-equiv='Refresh' content='0; url=admin_lpj.php'>";
	break;
	case "karyawan" : 
	$sql="DELETE FROM KARYAWAN WHERE NIP='".$id."'";
	mysqli_query($konek_db,$sql);
	echo "<meta http-equiv='Refresh' content='0; url=admin_karyawan.php'>";
	break;
}
?>