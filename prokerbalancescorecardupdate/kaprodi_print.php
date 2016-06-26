<?php
include 'koneksi.php';

require('fpdf/fpdf.php');

//Menampilkan data dari tabel di database

$result=mysqli_query($konek_db,"SELECT p.ID_PROKER, p.NAMA_PROKER, k.NAMA, p.ANGGARAN_DANA, p.STATUS_PROKER, p.WAKTU_MULAI_PROKER, p.WAKTU_AKHIR_PROKER FROM PROKER p, KARYAWAN k WHERE (p.STATUS_PROKER='TERLAKSANA' OR p.STATUS_PROKER='TIDAK TERLAKSANA') AND p.NIP=k.NIP ORDER BY p.ID_PROKER") or die(mysqli_error());



//Inisiasi untuk membuat header kolom
$column_id = "";
$column_nama = "";
$column_karyawan = "";
$column_dana = "";
$column_status = "";
$column_waktu_mulai = "";
$column_waktu_akhir ="";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
    $id = $row["ID_PROKER"];
    $nama = $row["NAMA_PROKER"];
    $karyawan = $row["NAMA"];
    $anggaran_dana = $row["ANGGARAN_DANA"];
    $status = $row["STATUS_PROKER"];
    $waktu_mulai = $row["WAKTU_MULAI_PROKER"];
    $waktu_akhir = $row["WAKTU_AKHIR_PROKER"];
 
    

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
