
   <!-- breadcrumb -->
 	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Produk </li>
      </ol>
      <!-- end breadcrumb -->

      <!-- tabel produk -->

      <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Produk
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
	
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Gambar</th>
						<th>Stok</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php 
						$query = mysqli_query ($conn, "SELECT * FROM produk");
						while($produk = mysqli_fetch_array($query)){
					 ?>
					<tr>
						<th><?php echo $nomor; ?></th>
						<th><?php echo $produk['nm_produk']; ?></th>
						<th>Rp. <?php echo $produk['harga']; ?></th>
						<th><img src="img/imgproduk/<?php echo $produk['gambar']; ?>" alt="" style="height: 50px; width: 100px;"></th>
						<th><?php echo $produk['stok']; ?> pcs</th>
						<th>
							<!-- <a href="beranda.php?halaman=detailproduk&id=<?php echo $produk['id_produk'] ;?>" class="btn btn-info">Detail</a> -->
							<a href="beranda.php?halaman=ubahproduk&id=<?php echo $produk['id_produk'] ;?>" class="btn btn-primary"><i class="fa fa-edit "></i>Ubah</a>
							<a href="beranda.php?halaman=hapusproduk&id=<?php echo $produk['id_produk'] ;?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Hapus</a>				
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

<a href="beranda.php?halaman=tambahproduk" class="btn btn-success">Tambah Produk</a>
<br><br>

<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		<!-- end tabel -->