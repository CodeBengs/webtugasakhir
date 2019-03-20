<?php 
include "../pengaturan/koneksi.php";
// session_start();
// $awal = (empty($_GET['tgl_mulai']))?'':$_GET['tgl_akhir'];
echo $awal = $_GET['tgl_mulai'];
echo "<br>";
echo $akhir = $_GET['tgl_akhir'];
echo "<br>";
// $akhir = (empty($_GET['tgl_akhir']))?'':$_GET['tgl_akhir'];
// $period = "WHERE tanggal BETWEEN '".$awal."'AND'". $akhir."'"; 
// $period = ""; 

// // $sql = mysqli_query($conn,"SELECT * FROM transaksi $period ")or die(mysqli_error($conn));
// // $data= mysqli_fetch_assoc($sql); 

$sql=$koneksi->query("SELECT * FROM `transaksi`")or die("Erro <br>".mysqli_error($koneksi));
$data=$sql->fetch_assoc();
// print_r($sql);
?>
<?php

// memanggil library FPDF
// require('fpdf.php');
include "fpdf.php";
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);

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
$pdf->Cell(60,8,'NAMA',1,0,'C');
$pdf->Cell(60,8,'Nilai',1,0,'C');

$pdf->SetFont('Arial','',10);

$pdf->ln();
// include '../pengaturan/koneksi.php';
 // $i=1;
// while ($result=$sql->fetch_assoc()) {
  # code...


                ?>

<?php 
//               $pdf->Cell(25,8,$result['id_transaksi'],1,0,'C');
//               $pdf->Cell(60,8,$result['id_pelanggan'],1,0,'C');
//               $pdf->Cell(60,8,$result[id_pengiriman],1,0,'C');
              
// $pdf->ln();
            // $pdf->Cell(60,8,'$status',1,1,'C');
                // $pdf->cell(20,6,$val['nis'],1,0,'L');
                // $pdf->cell(20,6,$val['nama_siswa'],1,0,'C');
        // $pdf->cell(20,6,$daftar[good],1,0,’C’);

                 ?>
               


                  <?php
                  //   $i++;
                  // }
                  ?>
<?php
 
// $pdf->Output();
?>

<strong style="color: orange;" >ddd</strong>