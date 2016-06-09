<?php
include 'koneksi.php';
require('fpdf/fpdf.php');

//Menampilkan data dari tabel di database

$result=mysql_query("SELECT p.id_proker, p.nama_proker, k.nama, p.anggaran_dana, p.status_proker, p.waktu_mulai_proker, p.waktu_akhir_proker FROM proker p, karyawan k WHERE (p.status_proker='TERLAKSANA' OR p.status_proker='TIDAK TERLAKSANA') AND p.nip=k.nip ORDER BY p.id_proker") or die(mysql_error());



//Inisiasi untuk membuat header kolom
$column_id = "";
$column_nama = "";
$column_karyawan = "";
$column_dana = "";
$column_status = "";
$column_waktu_mulai = "";
$column_waktu_akhir ="";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
    $id = $row["id_proker"];
    $nama = $row["nama_proker"];
    $karyawan = $row["nama"];
    $anggaran_dana = $row["anggaran_dana"];
    $status = $row["status_proker"];
    $waktu_mulai = $row["waktu_mulai_proker"];
    $waktu_akhir = $row["waktu_akhir_proker"];
 
    

    $column_id = $column_id.$id."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_karyawan = $column_karyawan.$karyawan."\n";
    $column_dana = $column_dana.$anggaran_dana."\n";
    $column_status = $column_status.$status."\n";
    $column_waktu_mulai = $column_waktu_mulai.$waktu_mulai."\n";
    $column_waktu_akhir = $column_waktu_akhir.$waktu_akhir."\n";
    

//Create a new PDF file
$pdf = new FPDF('L','mm',array(297,210)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(125);
$pdf->Cell(30,10,'PROGRAM KERJA',0,0,'C');
$pdf->Ln();
$pdf->Cell(125);
$pdf->Cell(30,10,'PROGRAM STUDI SISTEM INFORMASI',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(5,8,'ID',1,0,'C',1);
$pdf->SetX(10);
$pdf->Cell(80,8,'Nama Proker',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(70,8,'Koordinator',1,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'Anggaran Dana',1,0,'C',1);
$pdf->SetX(200);
$pdf->Cell(30,8,'Status',1,0,'C',1);
$pdf->SetX(230);
$pdf->Cell(30,8,'Waktu Mulai',1,0,'C',1);
$pdf->SetX(260);
$pdf->Cell(30,8,'Waktu Selesai',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(5,6,$column_id,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(80,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(70,6,$column_karyawan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(40,6,$column_dana,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(200);
$pdf->MultiCell(30,6,$column_status,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(230);
$pdf->MultiCell(30,6,$column_waktu_mulai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(260);
$pdf->MultiCell(30,6,$column_waktu_akhir,1,'C');

$pdf->Output();
?>
