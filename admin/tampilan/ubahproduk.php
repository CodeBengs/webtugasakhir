<h2>Tambah Produk</h2>
<?php 
$result = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$data = mysqli_fetch_assoc($result);




 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nm">Nama</label>
		<input type="text" id="nm" class="form-control" name="nama" value="<?php echo $data['nm_produk'];?>">
	</div>
	<div class="form-group">
		<label for="jns">Kategori</label>
		<input type="text" id="jns" class="form-control" name="kat" value="<?php echo $data['id_kategori'];?>">
	</div>
	<div class="form-group">
		<label for="rp">Harga (Rp)</label>
		<input type="number" id="rp" class="form-control" name="harga" value="<?php echo $data['harga'];?>">
	</div>
	<div class="form-group">
		<label for="gr">Berat (Gr)</label>
		<input type="number" id="gr" class="form-control" name="berat" value="<?php echo $data['berat'];?>">
	</div>
	<div class="form-group">
		<label for="st">Stok</label>
		<input type="number" id="st" class="form-control" name="stok" value="<?php echo $data['stok'];?>">
	</div>
	<div class="form-group">
		<label for="">Foto</label>
		<img src="img/imgproduk/<?php echo $data['gambar']; ?>" alt="" style="width = 200px; height: 200px;">
	</div>
	<div class="form-group">
		<label for="ft">Ganti foto</label>
		<input type="file" class="form-control" id="ft" name="gambar">
	</div>
	<div class="form-group">
		<label for="des">Deskripsi</label>
		<textarea class="form-control" id="des" cols="30" rows="10" name="deskripsi"><?php echo $data['deskripsi'];?></textarea>
	</div>
	<!-- <div class="form-group">
		<label for="adm">Admin</label>
		<input type="number" id="adm" class="form-control" name="admin" value="<?php echo $data['id_admin'];?>">
	</div>
 -->
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
	if (isset($_POST['ubah'])) {
	 	$foto = $_FILES['gambar']['name'];
	 	$lokasi = $_FILES['gambar']['tmp_name'];

	 	//jika foto dirubah
	 	if(!empty($lokasi)){
	 		move_uploaded_file($lokasi,"img/imgproduk/$foto");

			$result2 = mysqli_query($conn,"UPDATE produk 
											SET 
									nm_produk ='$_POST[nama]',
									jns_produk ='$_POST[kat]',
									harga='$_POST[harga]',
									gambar='$foto',
									stok ='$_POST[stok]',
									deskripsi='$_POST[deskripsi]',
									berat='$_POST[berat]'								
											WHERE  
									id_produk ='$_GET[id]'");	 		
	 	}else{

	 		$result2 = mysqli_query ($conn,"UPDATE produk 
	 									SET 
	 								nm_produk ='$_POST[nama]',
	 								jns_produk ='$_POST[kat]',
	 								harga='$_POST[harga]',
	 								stok='$_POST[stok]',
	 								deskripsi='$_POST[deskripsi]',
	 								berat='$_POST[berat]' 
	 									WHERE 
	 								id_produk ='$_GET[id]'");
	 	}
	 	if ($result2) {
					echo "<script>alert ('Data telah Diubah');</script>";
			    	echo "<script>location='beranda.php?halaman=produk';</script>";
				}else{
					echo "<script>alert ('Data gagal Diubah');</script>";
			    	echo "<script>location='beranda.php?halaman=produk';</script>";
				}
	 } 

 ?>