<?php
include "../pengaturan/koneksi.php";

$oi=$_POST['idtrans'];
$uu=$_POST['status'];
	if (isset($_POST['simpan'])) {
		$query = mysqli_query($conn,"UPDATE transaksi SET status='$uu' where id_transaksi='$oi'");
	
		if ($query) {
			
					echo "<script>alert ('Status telah Diubah');</script>";
		 	    	echo "<script>location='beranda.php?halaman=transaksi';</script>";	 		
	 	}else{

	 		echo "<script>alert ('Status gagal Diubah');</script>";
		    echo "<script>location='beranda.php?halaman=transaksi';</script>";
		}
		}
	 	

 ?>