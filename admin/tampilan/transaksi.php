
   <!-- breadcrumb -->
 	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Transaksi </li>
      </ol>
      <!-- end breadcrumb -->

      <!-- tabel produk -->

      <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
	
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr><th>No</th>
						<th>ID Transaksi</th>
						<th>ID pelanggan</th>
						<th>ID Pengiriman</th>
						<th>Alamat</th>
						<th>Tanggal</th>
						<th>Subtotal</th>
						<th>Status</th>
						<th>aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php 
						$query = mysqli_query ($conn, "SELECT * FROM transaksi");
						while($transaksi = mysqli_fetch_array($query)){
					 ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $transaksi['id_transaksi']; ?></td>
						<td><?php echo $transaksi['id_pelanggan']; ?></td>
						<td><?php echo $transaksi['id_pengiriman']; ?></td>
						<td><?php echo $transaksi['alamat']; ?></td>
						<td><?php echo $transaksi['tanggal']; ?></td>
						<td>IDR. <?php echo number_format($transaksi['subtotal']); ?></td>
						<td>

							<?php 
            switch ($transaksi['status']) {
              case 'Pending':
                # code...
              echo "<button class='btn btn-danger'>Pending</button>";
                break;
              case 'Proses':
                # code...
              echo "<button class='btn btn-info'>Proses</button>";
                break;
              case 'Sukses':
                # code...
              echo "<button class='btn btn-success'>Sukses</button>";
                break;
              case 'Konfirmasi':
                # code...
              echo "<label class='btn btn-primary'>Konfirmasi</label>";
                break;
              default:
                # code...
                break;
            }

             ?>
         </td>
						<td>				
							<a href="beranda.php?halaman=ubahstatus&id=<?php echo $transaksi['id_transaksi'] ;?>" class="btn btn-default"><i class="fa fa-edit "></i>Ubah</a>
							<a href="beranda.php?halaman=hapustransaksi&id=<?php echo $transaksi['id_transaksi'] ;?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Hapus</a>				
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
<br>

<!-- <a href="tampilan/laporan.php" class="btn btn-primary">Cetak</a><br><br> -->


<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		<!-- end tabel -->