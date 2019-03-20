<?php 
include "../pengaturan/koneksi.php";
session_start();
$id=$_SESSION['id_siswa'];
$sql = mysqli_query($link,"SELECT * FROM siswa ");
$data= mysqli_fetch_array($sql);
?>

<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'SMA PODO MORO',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'LAPORAN DAFTAR DATA PEMBAYARAN PENERIMAAN SISWA BARU ',0,1,'C');
$tgl= date('Y-m-d');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','I',9);
$pdf->Cell(0, 8, $tgl, '0', 1, 'P');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,8,'NIS',1,0,'C');
$pdf->Cell(60,8,'NAMA',1,1,'C');
// $pdf->Cell(60,8,'Nilai KKM',1,2,'C');
// $pdf->Cell(50,8,'STATUS PEMBAYARAN',1,0,'C');
// $pdf->Cell(50,8,'TANGGAL PEMBAYARAN',1,1,'C');
 
$pdf->SetFont('Arial','',10);
 
include '../pengaturan/koneksi.php';
// $data = mysqli_query($link, "SELECT * FROM siswa");
$data = mysqli_query($link, "SELECT AVG(b.nilai) as avg_nilai, a.* FROM siswa a INNER JOIN nilai_mapel_siswa b ON a.id_siswa = b.id_siswa WHERE b.nilai > 75 AND a.status = 'Aktif' GROUP BY b.id_siswa");
while ($row = mysqli_fetch_array($data)){
    $pdf->Cell(25,8,$row['nis'],1,0,'C');
    $pdf->Cell(60,8,$row['nama_siswa'],1,1,'C');
    // $pdf->Cell(60,8,$row['nama_siswa'],1,2,'C');
    // $pdf->Cell(50,8,$row['status_pembayaran'],1,0,'C');
    // $pdf->Cell(50,8,$row['created_at'],1,1,'C'); 
}
 
$pdf->Output();
?>