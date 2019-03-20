<?php
error_reporting(0);
include "../pengaturan/koneksi.php";
$a=$_POST['idkot'];
$b=$_POST['nmkota'];
$c=$_POST['ongkir'];


$query=mysqli_query($koneksi,"INSERT INTO pengiriman (idkota,kota,ongkir) VALUES ('$a', '$b', '$c' ) ");
$result=mysqli_fetch_array($query);

if ($result) {
           echo "<script>alert ('data berhasil ditambahkan');</script>";
            echo "<script>location='beranda.php?halaman=pengirimandata';</script>";
      }else{
     echo "<script>alert ('Data Gagal Ditambahkan');</script>";
            echo "<script>location='beranda.php?halaman=tambahkota';</script>";
     }


?>