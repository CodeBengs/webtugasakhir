<h2>Ubah Status Transaksi</h2>
<?php 
$query = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_transaksi='$_GET[id]'");
$data = mysqli_fetch_assoc($query);
$dat = mysqli_fetch_array($query);

 ?>
<form action="prosesstatus.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nm">ID Transaksi</label>
		<input type="text" id="nm" readonly class="form-control" name="idtrans" value="<?php echo $_GET['id'];?>">
	</div>
	<div class="form-group">
		<label for="jns">ID Pelanggan</label>
		<input type="text" id="jns" readonly class="form-control" name="idpel" value="<?php echo $data['id_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label for="rp">ID Pengiriman</label>
		<input type="text" id="rp" readonly class="form-control" name="idpeng" value="<?php echo $data['id_pengiriman'];?>">
	</div>
	<div class="form-group">
		<label for="gr">Alamat</label>
		<input type="text" id="gr" class="form-control" name="alamat" value="<?php echo $data['alamat'];?>" readonly >
	</div>
	<div class="form-group">
		<label for="st">Subtotal</label>
		<input type="text" id="st" readonly class="form-control" name="subto" value="<?php echo $data['subtotal'];?>">
	</div>
	<div class="form-group">
		<label for="st">Tangal</label>
		<input type="date" id="st" readonly class="form-control" name="tgl" value="<?php echo $data['tanggal'];?>">
	</div>
	<div class="form-group">
		<label for="st">Status</label>
	<select id="stat" class="form-control" name="status">
	<?php 
	switch ($data['status']) {
		case 'Pending':
			echo "<option value='Pending' selected>Pending</option>";
			echo "<option value='Proses' >Proses</option>";
			echo "<option value='Sukses' >Sukses</option>";
			break;
		case 'Proses':
			echo "<option value='Pending' >Pending</option>";
			echo "<option value='Proses' selected>Proses</option>";
			echo "<option value='Sukses' >Sukses</option>";
			break;
		case 'Sukses':
			echo "<option value='Pending' >Pending</option>";
			echo "<option value='Proses' >Proses</option>";
			echo "<option value='Sukses' selected >Sukses</option>";
			break;
		default:
			# code...
			break;
	}

	 ?>



	
</select>
	</div>
<input type="submit" value="simpan" name="simpan" class="btn btn-info" >

</form>



