<?php 

session_start();

include "../pengaturan/koneksi.php";
include "../pengaturan/fungsi.php";

if (isset($_POST["checkout"])) {
 // $idprod = $_SESSION['pelanggan']['id_pelanggan'];
 $id_transaksi = $_POST["id_transaksi"];
 // $id_pengriman = $_SESSION["id_pengiriman"];
 $idpelanggan = $_POST["idpel"];
 $idkota_penerima = $_POST["idkota_penerima"];
 $ongkir = $_POST["ongkir"];
 // $id_pengiriman = $_POST["id_pengiriman"];
 $totalbelanja = $_POST["totalbelanja"];
 $kecamatan = $_POST["kecamatan"];
 $tanggal=date("Y-m-d");
 $alamat = $_POST['alamat'];
 // // $tanggal = $_POST['tanggal'];
 // $tanggal =date("Y-m-d");

 // $subtotal = $totalbelanja+$tarif;

 // date_default_timezone_set("Asia/Jakarta");
 // // $tanggal = Date("Y-m-d");
 $simpan = mysqli_query($conn,"INSERT INTO transaksi() VALUES ('$id_transaksi','$idpelanggan','$_POST[id_pengiriman]','$kecamatan','$alamat','$totalbelanja', '$tanggal','Pending' )")or die(mysqli_error($conn));

 $simpanpengiriman = mysqli_query($conn,"INSERT INTO pengiriman() VALUES ('$_POST[id_pengiriman]','$idkota_penerima','$ongkir','$id_transaksi')")or die(mysqli_error($conn));


 
 $dtkeranjang=$koneksi->query("SELECT *FROM keranjang LEFT JOIN produk ON keranjang.id_produk=produk.id_produk WHERE id_pelanggan='$idpelanggan'");

 while ($data=$dtkeranjang->fetch_assoc()) {
   $simpanker = mysqli_query($koneksi,"INSERT INTO detail_transaksi() VALUES (null,'$id_transaksi','$data[id_produk]','$data[ukuran]','$data[jumlah]','$data[harga]')")or die(mysql_error($koneksi));

   //update stok barang
    $updatestok = mysqli_query($koneksi,"UPDATE produk SET stok=stok-'$data[jumlah]' WHERE id_produk='$data[id_produk]' ")or die(mysql_error($koneksi));

   if ($simpanker) {
     $hapuskeranjang=$koneksi->query("DELETE FROM keranjang WHERE id_pelanggan='$idpelanggan'");
   }
 }
 
 // endforeach;
 
 if ($simpan) {
   # code...
 echo "<script>alert('Pembelian Berhasil')</script>";
 echo "<script>location='../index.php?halaman=tagihan';</script>";
 }else{
 echo "<script>location='tagihan.php';</script>";

 }

}
 // echo "<script>alert('ok')</script>";


 ?>