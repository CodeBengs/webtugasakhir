<?php 
include "../pengaturan/koneksi.php";
?>


<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('../assets/img/sma.png',10,10,20);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',18);
// mencetak string 
$pdf->Cell(300,7,'SMAN 27 KAB. TANGERANG',0,5,'C');
$pdf->SetFont('Arial','B',18);
$pdf->Cell(300,7,'LAPORAN DATA ANGGOTA PERPUSTAKAAN ',0,5,'C');
$tgl= date('Y-m-d');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','I',9);
$pdf->Cell(0, 8, $tgl, '0', 1, 'l');

$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(135,206,235);
$pdf->Cell(30,8,'Id',1,0,'C');
$pdf->Cell(30,8,'NIS',1,0,'C');
$pdf->Cell(40,8,'Nama',1,0,'C');
$pdf->Cell(20,8,'Kelas',1,0,'C');
$pdf->Cell(40,8,'Email',1,0,'C');
$pdf->Cell(40,8,'No. Hp',1,0,'C');
$pdf->Cell(30,8,'Tgl Lahir',1,0,'C');
$pdf->Cell(50,8,'Alamat',1,1,'C');
 
$pdf->SetFont('Arial','',10);
 
include '../pengaturan/koneksi.php';
$data = mysql_query("SELECT * FROM anggota ORDER BY id_anggota");
while ($row = mysql_fetch_array($data)){
    $pdf->Cell(30,8,$row['id_anggota'],1,0,'l');
    $pdf->Cell(30,8,$row['nis'],1,0,'l');
    $pdf->Cell(40,8,$row['nama'],1,0,'l');
    $pdf->Cell(20,8,$row['kelas'],1,0,'l');
    $pdf->Cell(40,8,$row['email'],1,0,'l');
    $pdf->Cell(40,8,$row['no_hp'],1,0,'l');
    $pdf->Cell(30,8,$row['tgl_lahir'],1,0,'l');
    $pdf->Cell(50,8,$row['alamat'],1,1,'l'); 
}
 
$pdf->Output();
?>