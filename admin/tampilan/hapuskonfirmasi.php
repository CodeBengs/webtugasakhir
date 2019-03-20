<?php 
 $result = mysqli_query($conn, "SELECT * FROM Konfirmasi WHERE id_konfirmasi = '$_GET[id]'");
 $data = mysqli_fetch_assoc($result);
 $fotokonfirm = $konfirmasi['foto_konfirm'];
 if (file_exists("../../img/buktipembayaran/$fotokonfirm") ) {
 	unlink("../../img/buktipembayaran/$fotokonfirm");
 }

 $result2 = mysqli_query($conn,"DELETE FROM Konfirmasi WHERE id_konfirmasi='$_GET[id]'");

if ($result2) 
 	{
		echo "<script>alert ('Konfirmasi telah Dihapus');</script>";
    	echo "<script>location='beranda.php?halaman=konfirmasi';</script>";
	}

 ?>