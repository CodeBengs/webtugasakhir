<h3>Ubah Data Kota Pengiriman</h3><hr>

<?php $result = mysqli_query($conn,"SELECT * FROM kota WHERE idkota='$_GET[id]'");
$kota = mysqli_fetch_assoc($result); ?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nm">ID Kota</label>
		<input type="text" id="nm" class="form-control" name="idkota" value="<?php echo $kota['idkota'];?>">
	</div>
	<div class="form-group">
		<label for="jns">Nama Kota</label>
		<input type="text" id="jns" class="form-control" name="namakota" value="<?php echo $kota['nm_kota'];?>">
	</div>
	<div class="form-group">
		<label for="rp">Ongkir</label>
		<input type="number" id="rp" class="form-control" name="ongkos" value="<?php echo $kota['ongkir'];?>">
	</div>

<button type="submit" class="btn btn-success" name="simpan">Simpan</button>
</form>



<?php 
	if (isset($_POST["simpan"])) {
		
		$result2 = mysqli_query($conn,"UPDATE kota SET idkota ='$_POST[idkota]',nm_kota='$_POST[namakota]',ongkir='$_POST[ongkos]' WHERE idkota='$_GET[id]'");
	

  
 if ($result2) {
					echo "<script>alert ('Data telah Diubah');</script>";
			    	echo "<script>location='beranda.php?halaman=pengirimandata';</script>";
				}else{
					echo "<script>alert ('Data gagal Diubah');</script>";
			    	echo "<script>location='beranda.php?halaman=pengirimandata';</script>";
				}
				}


  ?>