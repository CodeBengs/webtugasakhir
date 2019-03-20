<h2>Balas Komentar</h2>
<?php 
$query = mysqli_query($conn,"SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
$data = mysqli_fetch_assoc($query);
$dat = mysqli_fetch_array($query);

 ?>
<form  method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nm">ID Komentar</label>
		<input type="text" id="nm" readonly class="form-control" name="id_komentar" value="<?php echo $_GET['id'];?>">
	</div>
	<div class="form-group">
		<label for="jns">ID Pelanggan</label>
		<input type="text" id="jns" readonly class="form-control" name="idpel" value="<?php echo $data['id_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label for="rp">ID Produk</label>
		<input type="text" id="rp" readonly class="form-control" name="id_produk" value="<?php echo $data['id_produk'];?>">
	</div>
	<div class="form-group">
		<label for="gr">Isi Koemntar</label>
		<textarea name="isi_komentar" class="form-control" readonly="" cols="30" rows="10"><?php echo $data['isi_komentar'];?></textarea>
	</div>
	<div class="form-group">
		<label for="balas_komentar">Balas Koemntar</label>
		<textarea name="balas_komentar" class="form-control"  cols="30" rows="10"></textarea>
	</div>
	
<input type="submit" value="Balas" name="balas" class="btn btn-info" >

</form>
<?php 
if (isset($_POST['balas'])) {
	# code...
	$update = mysqli_query($conn,"UPDATE komentar SET isi_balas='$_POST[balas_komentar]' WHERE id_komentar='$_GET[id]'")or die(mysqli_error($conn));
	if ($update) {
		# code...
		echo "<script>location='beranda.php?halaman=komentar';</script>";
	}
}

 ?>


