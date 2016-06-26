<?php
include "koneksi.php";

function getSql($tipe)
{
	switch($tipe)
	{
		case "proker" :
		return "SELECT * FROM PROKER WHERE ID_PROKER=".$_GET['id'];
		break;
		case "tujuan" :
		return "SELECT * FROM TUJUAN WHERE ID_TUJUAN=".$_GET['id'];
		break;
		case "indikator" :
		return "SELECT * FROM INDIKATOR_TUJUAN WHERE ID_INDIKATOR_TUJUAN=".$_GET['id'];
		break;
		case "notifikasi" :
		return "SELECT * FROM NOTIFIKASI WHERE ID_NOTIFIKASI=".$_GET['id'];
		break;
		case "lpj" :
		return "SELECT * FROM LAPORAN_PERTANGGUNG_JAWABAN WHERE ID_LPJ=".$_GET['id'];
		break;
		case "karyawan" :
		return "SELECT NIP,NAMA,JABATAN,TANGGAL_LAHIR,EMAIL FROM KARYAWAN WHERE NIP='".$_GET['id']."'";
		break;
	}
}

function tampilkan($sql)
{	
	include "koneksi.php";
	$hasil = mysqli_query($konek_db,$sql);
	$kolom = mysqli_num_fields($hasil);
	$data = mysqli_fetch_array($hasil);
	$namakolom = array();
		for($i=0;$i<$kolom;$i++)
		{
			$namakolom[$i] = mysqli_fetch_field($hasil)->name;			
		}
	return $namakolom;
}

function formLoop($arraykolom)
{
	$sql="";
		$form=$_POST['form'];
		for($i=0;$i<sizeof($arraykolom);$i++)
		{
			if($i==sizeof($arraykolom)-1)
			$sql = $sql.$arraykolom[$i]."='".$form[$i]."'";
			else
			$sql = $sql.$arraykolom[$i]."='".$form[$i]."', ";
		}
	
	return $sql;
}

switch($_GET['tipe'])
		{
			case "proker" :
			$sql = "UPDATE PROKER SET ".formLoop(tampilkan(getSql($_GET['tipe'])))." WHERE ID_PROKER=".$_GET['id'];
			echo "<meta http-equiv='Refresh' content='0; url=admin_proker.php'>";
			mysqli_query($konek_db,$sql);
			break;
			case "tujuan" :
			$sql = "UPDATE TUJUAN SET ".formLoop(tampilkan(getSql($_GET['tipe'])))." WHERE ID_TUJUAN=".$_GET['id'];
			echo "<meta http-equiv='Refresh' content='0; url=admin_tujuan.php'>";
			mysqli_query($konek_db,$sql);
			break;
			case "indikator" :
			$sql = "UPDATE INDIKATOR_TUJUAN SET ".formLoop(tampilkan(getSql($_GET['tipe'])))." WHERE ID_INDIKATOR_TUJUAN=".$_GET['id'];
			echo "<meta http-equiv='Refresh' content='0; url=admin_indikatortujuan.php'>";
			mysqli_query($konek_db,$sql);
			break;
			case "notifikasi" :
			$sql = "UPDATE NOTIFIKASI SET ".formLoop(tampilkan(getSql($_GET['tipe'])))." WHERE ID_NOTIFIKASI=".$_GET['id'];
			echo "<meta http-equiv='Refresh' content='0; url=admin_notifikasi.php'>";
			mysqli_query($konek_db,$sql);
			break;
			case "lpj" :
			$sql = "UPDATE LAPORAN_PERTANGGUNG_JAWABAN SET ".formLoop(tampilkan(getSql($_GET['tipe'])))." WHERE ID_LPJ=".$_GET['id'];
			echo "<meta http-equiv='Refresh' content='0; url=admin_lpj.php'>";
			mysqli_query($konek_db,$sql);
			break;
			case "karyawan" :
			$sql = "UPDATE KARYAWAN SET ".formLoop(tampilkan(getSql($_GET['tipe'])))." WHERE NIP='".$_GET['id']."'";
			echo "<meta http-equiv='Refresh' content='0; url=admin_karyawan.php'>";
			mysqli_query($konek_db,$sql);
			break;
		}
?>
