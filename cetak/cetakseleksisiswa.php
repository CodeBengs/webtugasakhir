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
// class PDF extends FPDF
// {
// function Header()
// {
//    //Pilih font Arial bold 15
//    $pdf->SetFont('Arial','B',15);
//    //Geser ke kanan
//    $pdf->Cell(80);
//    //Judul dalam bingkai
//    $pdf->Cell(30,10,'Title',1,0,'C');
//    //Ganti baris
//    $pdf->Ln(20);
// }


$pdf->Cell(190,7,'SMA PODO MORO',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'LAPORAN SELEKSI ',0,1,'C');
$tgl= date('Y-m-d');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','I',9);
$pdf->Cell(0, 8, $tgl, '0', 1, 'P');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,8,'NIS',1,0,'C');
$pdf->Cell(60,8,'NAMA',1,0,'C');
$pdf->Cell(60,8,'Nilai',1,0,'C');
// $pdf->Cell(60,8,'STATUS',3,0,'C');

// $pdf->Cell(10,6,'NIS',1,0,'C');
// $pdf->cell(50,6,'NAMA',1,0,'C');
// $pdf->cell(20,6,'STATUS',1,0,'C');
// $pdf->cell(20,6,'Ba',1,0,'C',1);
// $pdf->cell(20,6,'Good',1,0,'C',1);

// $pdf->Cell(1,0.5,'ID',1,0,'C');
// $pdf->Cell(2,0.5,'NPM',1,0,'C');
// $pdf->Cell(5,0.5,'NAMA',1,0,'C');
// $pdf->Cell(6,0.5,'ALAMAT',1,0,'C');
// $pdf->Ln();
// $pdf->Cell(60,8,'Nilai KKM',1,2,'C');
// $pdf->Cell(50,8,'STATUS PEMBAYARAN',1,0,'C');
// $pdf->Cell(50,8,'TANGGAL PEMBAYARAN',1,1,'C');
 
$pdf->SetFont('Arial','',10);

$pdf->ln();
include '../pengaturan/koneksi.php';
// $data = mysqli_query($link, "SELECT * FROM siswa");
// $data = mysqli_query($link, "SELECT AVG(b.nilai) as avg_nilai, a.* FROM siswa a INNER JOIN nilai_mapel_siswa b ON a.id_siswa = b.id_siswa WHERE b.nilai > 75 AND a.status = 'Aktif' GROUP BY b.id_siswa");
// while ($row = mysqli_fetch_array($data)){
//     $pdf->Cell(25,8,$row['nis'],1,0,'C');
//     $pdf->Cell(60,8,$row['nama_siswa'],1,1,'C');
//     // $pdf->Cell(60,8,$row['nama_siswa'],1,2,'C');
//     // $pdf->Cell(50,8,$row['status_pembayaran'],1,0,'C');
//     // $pdf->Cell(50,8,$row['created_at'],1,1,'C'); 
// }


$sql = "SELECT AVG(b.nilai) as avg_nilai, a.* FROM siswa a INNER JOIN nilai_mapel_siswa b ON a.id_siswa = b.id_siswa WHERE b.nilai > 75 AND a.status = 'Aktif' GROUP BY b.id_siswa";
                  $result = mysqli_query($link, $sql);
                  $i=1;
                  while ($val = mysqli_fetch_assoc ($result)){
                    $pelanggaran = ""; $status = "";
                    
                    //mencari variable pelanggaran
                    $sql_pelanggaran = "SELECT * FROM `pelanggaran` WHERE `id_siswa` = '$val[id_siswa]'";
                    $hasil_pelanggaran = mysqli_query($link, $sql_pelanggaran);
                    while ($poin_pelanggaran = mysqli_fetch_assoc ($hasil_pelanggaran)){ $pelanggaran = $poin_pelanggaran['point']; }
                    $pelanggaran = mysqli_num_rows($hasil_pelanggaran) > 0 ? $pelanggaran:"Belum Diisi";

                    //mencari variable nilai
                    $sql_nilai = "SELECT * FROM `nilai_mapel_siswa` WHERE `id_siswa` = '$val[id_siswa]'";
                    $hasil_nilai = mysqli_query($link, $sql_nilai); 
                    $nilai = mysqli_num_rows($hasil_nilai); 
                    
                    if ( $nilai < 1 ) { $nilai = "Belum Diisi"; $status = "Data Tidak Sesuai"; }
                    else {
                      $hasil_nilai = mysqli_query($link, $sql_nilai); 
                      $nilai = ""; 
                      while ($nilai_siswa = mysqli_fetch_assoc ($hasil_nilai)){ 
                        $nilai = $nilai_siswa['nilai'];
                        if ( $nilai < 7.5 ) { 
                          $status == "Data Tidak Sesuai" ? "<strong style='color:orange'>" . "Data Tidak Sesuai" . "</strong>" : "<strong style='color: red'>" . "Gagal" . "</strong>"; 
                          break; 
                        }
                      }
                      $hasil_nilai = mysqli_query($link, $sql_nilai); 
                      $nilai = ""; 
                      while ($nilai_siswa = mysqli_fetch_assoc ($hasil_nilai)){ 
                        $nilai .= ( $nilai_siswa['nilai'] < 7.5 ) ? "<strong style='color:red'>" . $nilai_siswa['nilai'] ."; " : $nilai_siswa['nilai'] ."; ";  
                      }
                    }

                    // if ( empty($status) && ($pelanggaran <= 40) ) { 
                    //   $status = $status == "Data Tidak Sesuai" ? "<strong style='color:orange'>" . "Data Tidak Sesuai" . "</strong>" : "<strong style='color:Green'>" . "Lulus" . "</strong>"; 
                    // }
                    // else { 
                    //   $status = $status == "Data Tidak Sesuai" ? "<strong style='color:orange'>" . "Data Tidak Sesuai" . "</strong>" : "<strong style='color:red'>" . "Gagal" . "</strong>"; {
                    // }}
                    if ( empty($status) && ($pelanggaran <= 40) ) { 
                      // $status = $status == "Data Tidak Sesuai";
                      //   "Lulus"; 
                      $status="Lulus";
                    }
                    else { 
                      // $status = $status == "Data Tidak Sesuai" ? "<strong style='color:orange'>" . "Data Tidak Sesuai" . "</strong>" : "<strong style='color:red'>" . "Gagal" . "</strong>"; {
                      $status="Gagal";
                   // }
                  }


                ?>

                <?php 
              $pdf->Cell(25,8,$val['nis'],1,0,'C');
              $pdf->Cell(60,8,$val['nama_siswa'],1,0,'C');
              $pdf->Cell(60,8,$status,1,0,'C');
              
$pdf->ln();
            // $pdf->Cell(60,8,'$status',1,1,'C');
                // $pdf->cell(20,6,$val['nis'],1,0,'L');
                // $pdf->cell(20,6,$val['nama_siswa'],1,0,'C');
        // $pdf->cell(20,6,$daftar[good],1,0,’C’);

                 ?>
               


                  <?php
                    $i++;
                  }
                  ?>
<?php
 
$pdf->Output();
?>
<strong style="color: orange;" ></strong>