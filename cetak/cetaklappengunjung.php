<?php 
include "../pengaturan/koneksi.php";
?>


<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm','A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('../assets/img/sma.png',10,10,20);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'SMAN 27 KAB. TANGERANG',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'LAPORAN DATA PENGUNJUNG PERPUSTAKAAN ',0,1,'C');
$tgl= date('Y-m-d');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','I',9);
$pdf->Cell(0, 8, $tgl, '0', 1, 'l');
$pdf->SetFillColor(135,206,235);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,8,'Nama',1,0,'C');
$pdf->Cell(20,8,'Kelas',1,0,'C');
$pdf->Cell(70,8,'Keterangan',1,0,'C');
$pdf->Cell(40,8,'Waktu',1,1,'C');
 
$pdf->SetFont('Arial','',10);
 
include '../pengaturan/koneksi.php';
$data = mysql_query("SELECT * FROM pengunjung ORDER BY id_pengunjung");
while ($row = mysql_fetch_array($data)){
    $pdf->Cell(50,8,$row['nama_pengunjung'],1,0,'L');
    $pdf->Cell(20,8,$row['kelas'],1,0,'L');
    $pdf->Cell(70,8,$row['keterangan'],1,0,'L');
    $pdf->Cell(40,8,$row['waktu'],1,1,'L'); 
}
 
$pdf->Output();
?>