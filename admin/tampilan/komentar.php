<?php 
// include 'perintah/koenksi.php';
if (isset($_GET['id'])) {
	# code...
$hapus = mysqli_query($conn,"DELETE FROM komentar WHERE id_komentar='$_GET[id]'");
	if ($hapus) {
		# code...
		echo "<script>location='beranda.php?halaman=komentar';</script>";
		
	}
}

 ?>
   <!-- breadcrumb -->
 	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Komentar </li>
      </ol>
      <!-- end breadcrumb -->

      <!-- tabel produk -->

      <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Komentar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
	
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>Id Produk</th>
						<th>Id Pelanggan</th>
						<th>Isi Komentar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php 
						$query = mysqli_query ($conn, "SELECT * FROM komentar  ");
						while($produk = mysqli_fetch_array($query)){
					 ?>
					<tr>
						<th><?php echo $nomor; ?></th>
						<th><?php echo $produk['id_produk']; ?></th>
						<th><a href="beranda.php?halaman=pelanggan">
							<?php echo $produk['id_pelanggan']; ?></a></th>
						<th><?php echo $produk['isi_komentar']; ?></th>

						
						<th>
							<!-- <a href="beranda.php?halaman=detailproduk&id=<?php echo $produk['id_produk'] ;?>" class="btn btn-info">Detail</a> -->
							<a href="beranda.php?halaman=balaskoem&id=<?php echo $produk['id_komentar'] ;?>" class="btn btn-primary"><i class="fa fa-edit "></i>Balas</a>
							<a href="beranda.php?halaman=komentar&id=<?php echo $produk['id_komentar'] ;?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Hapus</a>				
						</th>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
</div>
</div>
</div>
</div>
</div>


<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		<!-- end tabel -->