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
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'SMAN 27 KAB. TANGERANG',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'LAPORAN DATA BUKU ',0,1,'C');
$tgl= date('Y-m-d');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','I',9);
$pdf->Cell(0, 8, $tgl, '0', 1, 'l');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,8,'Kode Buku',1,0,'C');
$pdf->Cell(80,8,'ISBN',1,0,'C');
$pdf->Cell(40,8,'Judul',1,0,'C');
$pdf->Cell(40,8,'Pengarang',1,0,'C');
$pdf->Cell(40,8,'Thn Terbit',1,0,'C');
$pdf->Cell(25,8,'Kategori',1,1,'C');
 
$pdf->SetFont('Arial','',10);
 
include '../pengaturan/koneksi.php';
$data = mysql_query("SELECT * FROM buku JOIN kategori ON buku.idkategori=kategori.idkategori");
while ($row = mysql_fetch_array($data)){
    $pdf->Cell(30,8,$row['kode_buku'],1,0,'C');
    $pdf->Cell(80,8,$row['isbn'],1,0,'C');
    $pdf->Cell(40,8,$row['judul'],1,0,'C');
    $pdf->Cell(25,8,$row['pengarang'],1,0,'C');
    $pdf->Cell(25,8,$row['tahun_terbit'],1,0,'C');
    $pdf->Cell(25,8,$row['idkategori'],1,1,'C'); 
}
 
$pdf->Output();
?>