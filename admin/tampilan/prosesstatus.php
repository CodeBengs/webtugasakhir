<?php
include "../../pengaturan/koneksi.php";
	if (isset($_POST['simpan'])) {
		$query = mysqli_query($conn,"UPDATE transaksi 
											SET 
								id_transaksi ='$_POST[idtrans]',
								id_pelanggan ='$_POST[idpel]',
								id_pengiriman='$_POST[idpeng]',
								alamat='$_POST[alamat]',
								subtotal='$_POST[subto]',
								tanggal='$_POST[tgl]',
								status='$_POST[st]',");
	
		if ($query>0) {
			
					echo "<script>alert ('Status telah Diubah');</script>";
		 	    	echo "<script>location='beranda.php?halaman=transaksi';</script>";	 		
	 	}else{

	 		echo "<script>alert ('Status gagal Diubah');</script>";
		    echo "<script>location='beranda.php?halaman=transaksi';</script>";
		}
		}
	 	

 ?>