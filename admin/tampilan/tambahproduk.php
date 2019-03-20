
<?php
error_reporting(0);
session_start();
include '../pengaturan/koneksi.php';

$carikode = mysqli_query($koneksi, "select max(id_produk) from produk") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 4);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "SPT".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "SPT001";
  }
// print_r($kode_otomatis);
  
  


?>

<h3>Tambah Produk</h3>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nm">ID Produk</label>
		<input type="text" id="idd" value="<?php echo $kode_otomatis;?>" readonly class="form-control" name="idd">
	</div>
	<div class="form-group">
		<label for="nm">Nama</label>
		<input type="text" id="nm"  class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label for="jns">Kategori</label>
		<input type="text" id="jns" class="form-control" name="kat">
	</div>

	<div class="form-group">
		<label for="rp">Harga (Rp)</label>
		<input type="number" id="rp" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label for="gr">Berat (Gr)</label>
		<input type="number" id="gr" class="form-control" name="berat">
	</div>
	<div class="form-group">
		<label for="st">Stok</label>
		<input type="number" id="st" class="form-control" name="stok">
	</div>
	<div class="form-group">
		<label for="des">Deskripsi</label>
		<textarea class="form-control" id="des" cols="30" rows="10" name="deskripsi"></textarea>
	</div>
	<div class="form-group">
		<label for="ft">Foto</label>
		<input type="file" class="form-control" id="ft" name="gambar">
	</div>
	<!-- <div class="form-group">
		<label for="adm">Admin</label>
		<input type="text" class="form-control" id="adm" name="admin">
	</div> -->
	<button class="btn btn-primary" name="save">Simpan</button>
	
</form>

<?php 
if (isset($_POST['save']))
{
	$foto = $_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	move_uploaded_file($lokasi,"img/imgproduk/".$foto);
	
	$result = mysqli_query($conn,"INSERT INTO produk(id_produk,id_kategori,nm_produk,harga,berat,stok,gambar,deskripsi)
									 VALUES 
				('$_POST[idd]', '$_POST[kat]','$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[stok]','$foto','$_POST[deskripsi]')"); 
 
				if ($result) {
					echo "<script>alert ('Data telah tersimpan');</script>";
			    	echo "<script>location='beranda.php?halaman=produk';</script>";
				}else{
					echo "<script>alert ('Data gagal tersimpan');</script>";
			    	echo "<script>location='beranda.php?halaman=tambahproduk';</script>";
				}
}

 ?>
 
 