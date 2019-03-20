<?php 
session_start();
include '../pengaturan/koneksi.php';
//ambil id di url
$idproduk = $_GET['id'];
if (isset($_SESSION['idpelanggan'])) {
 $id_pelanggan=$_SESSION['idpelanggan'];
}else{
$id_pelanggan="";
echo "<script>alert('Anda belum login, Silahkan Login terlebih dahulu.');</script>";
echo "<script>location='../index.php';</script>";
}


$data=mysqli_query($koneksi,"SELECT *FROM keranjang WHERE id_produk='$idproduk' AND id_pelanggan='$id_pelanggan'");
$cek=mysqli_num_rows($data);
if ($cek==0) {
	//echo "haruh";
	$simpan=mysqli_query($koneksi,"INSERT INTO keranjang() VALUES(null,'$id_pelanggan','$idproduk',39, 1)") or die("error".mysqli_error($koneksi));
  if ($simpan) {
  	echo "<script>alert('Produk telah ditambahkan ke keranjang');</script>";
echo "<script>location='../index.php?halaman=keranjang';</script>";

  }else{
  	echo "<script>alert('Produk gagal ditambahkan ke keranjang');</script>";
echo "<script>location='?halaman=keranjang';</script>";
  }
}else{
	$update=mysqli_query($koneksi,"UPDATE keranjang SET jumlah=jumlah+1 WHERE id_pelanggan='$id_pelanggan' AND id_produk='$idproduk'")or die(mysqli_error($koneksi));
	if ($update) {
  	echo "<script>alert('Produk sama telah ditambahkan ke keranjang');</script>";
echo "<script>location='../index.php?halaman=keranjang';</script>";

  }else{
  	echo "<script>alert('Produk gagal ditambahkan ke keranjang');</script>";
echo "<script>location='?halaman=keranjang';</script>";
  }
}

// $data=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_pelanggan='$id_pelanggan' AND id_produk='$idproduk'"))or die(mysqli_error($koneksi));
// echo $data;
// // jika barang sudah ada dikeranjan, maka ++
// if ($data == 1) {
// 	$simpan=mysqli_fetch_array(mysqli_query($koneksi,"UPDATE keranjang SET jumlah+1 WHERE id_pelanggan='$id_pelanggan' AND id_produk='$idproduk'"))or die(mysqli_error($koneksi));
//   $simpan=mysqli_fetch_array(mysqli_query($koneksi,"INSERT INTO keranjang() VALUES(null,'$id_pelanggan','$idproduk',1)"))or die(mysqli_error($koneksi));
//   if ($simpan) {
//   	echo "<script>alert('Produk telah ditambahkan ke keranjang');</script>";
// echo "<script>location='keranjang.php';</script>";

//   }else{
//   	echo "<script>alert('Produk gagal ditambahkan ke keranjang');</script>";
// echo "<script>location='keranjang.php';</script>";
//   }
  
// }else{
//   $simpan=mysqli_fetch_array(mysqli_query($koneksi,"INSERT INTO keranjang() VALUES(null,'$id_pelanggan','$idproduk',1)"))or die(mysqli_error($koneksi));
//   if ($simpan) {
//   	echo "<script>alert('Produk telah ditambahkan ke keranjang');</script>";
// echo "<script>location='keranjang.php';</script>";

//   }else{
//   	echo "<script>alert('Produk gagal ditambahkan ke keranjang');</script>";
// echo "<script>location='keranjang.php';</script>";
//   }
// }

//cek udah jalan belum
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

//goto keranjang

// echo "<script>alert('Produk telah ditambahkan ke keranjang');</script>";
// echo "<script>location='keranjang.php';</script>";




 ?>

 
