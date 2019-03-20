<?php 
 $result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
 $data = mysqli_fetch_assoc($result);
 $fotoproduk = $produk['foto_produk'];
 if (file_exists("../img/imgproduk/$fotoproduk") ) {
 	unlink("../img/imgproduk/$fotoproduk");
 }

 $result2 = mysqli_query($conn,"DELETE FROM produk WHERE id_produk='$_GET[id]'");

if ($result2) 
 	{
		echo "<script>alert ('Data telah Dihapus');</script>";
    	echo "<script>location='beranda.php?halaman=produk';</script>";
	}

 ?>