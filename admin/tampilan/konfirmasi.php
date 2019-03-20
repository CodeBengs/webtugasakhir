
 	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Konfirmasi Pembayaran </li>
      </ol>
      <!-- end breadcrumb -->

      <!-- tabel produk -->

      <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Konfirmasi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
	
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Pelanggan</th>
						<th>ID Transaksi</th>
						<th>Gambar</th>
						<th>Aksi</th>
						<!-- <th>Tanggal</th> -->
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php 
						$query = mysqli_query ($conn, "SELECT * FROM konfirmasi");
						while($konfirmasi = mysqli_fetch_array($query)){
					 ?>
					<tr>
						<td><?php echo $nomor;?> </td>
						<td><?php echo $konfirmasi['id_pelanggan'];?> </td>
						<td>
							<a href="beranda.php?halaman=ubahstatus&id=<?php echo $konfirmasi['id_transaksi'];?>"><?php echo $konfirmasi['id_transaksi'];?></a>
							 </td>
						<td><a href="../img/buktipembayaran/<?php echo $konfirmasi['gambar'];?>"><img src="../img/buktipembayaran/<?php echo $konfirmasi['gambar'];?>" style="height: 100px; width: 100px;"></a></td>
						<td>
							<a href="beranda.php?halaman=hapuskonfirmasi&id=<?php echo $konfirmasi['id_konfirmasi'] ;?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Hapus</a>
						</td>
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

<br><br>

<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		<!-- end tabel