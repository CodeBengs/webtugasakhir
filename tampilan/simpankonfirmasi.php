<?php 
session_start();

include "../pengaturan/koneksi.php";
include "../pengaturan/fungsi.php";

if (isset($_POST['save'])) {
  $id_transaksi=$_POST['idtrans'];
  $id_pelanggan=$_POST['id_pelanggan'];

  $foto = $_FILES['foto']['name'];
  $lokasi = $_FILES['foto']['tmp_name'];
  $foto=$id_transaksi."11".$id_pelanggan.".jpeg";
  $pindah= move_uploaded_file($lokasi,"../img/buktipembayaran/".$foto);
  if ($pindah) {   
    $simpankonfirmasi=$koneksi->query("INSERT INTO konfirmasi (id_transaksi,id_pelanggan,gambar)
     VALUES ('$id_transaksi','$id_pelanggan','$foto')")or die(mysqli_error($koneksi));
    $update=$koneksi->query("UPDATE transaksi SET status='Proses' WHERE id_transaksi='$id_transaksi' ")or die(mysqli_error($koneksi));

    echo "<script>alert('Konfirmasi Sukses');</script>";
    echo "<script>location='../index.php?halaman=tagihan';</script>";
  }else{
    echo "<script>alert(' Konfirmasi Gagal');</script>";
    // echo "<script>location='tampilan/tagihan.php';</script>";

  }



}
 ?>