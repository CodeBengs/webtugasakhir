
 	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Kota Pengiriman  </li>
      </ol>
      <!-- end breadcrumb -->

	<!-- button tambah -->
      <div style="padding-left: 800px;">
      <a href="beranda.php?halaman=tambahkota" class="btn btn-default"><i class="fa fa-link"> Tambah Kota Pengiriman</i></a>	
      </div><hr>
      <!-- end button tambah -->
      <?php 
      $prop="SELECT * FROM propinsi;";
	  $qpro=mysqli_query($conn, $prop);
       ?>

      <!-- option prov -->
      <form action="" method="POST">
      		<div class="row">
             <div class="form-group">
              <div class="col-sm-4">
              <label for="" class="control-label">Propinsi</label>
                <select id="propinsi" name="propinsi" class="form-control" onchange="this.form.submit();">
                  <option value="">Pilih Propinsi</option>
                  <?php while($dtpro=mysqli_fetch_array($qpro)){ ?>
                  <option value="<?php echo $dtpro['idprop']."|".$dtpro['nm_prop'];?>"><?php echo $dtpro['nm_prop'];?></option>
                  <?php } ?>
                </select>
              </div>
              </div>
            </div>  	
      </form><br>
      <!-- end option prov -->
      <?php 
      if (isset($_POST["propinsi"])) {
      	# code...
      	 $xpropinsi = explode("|",$_POST['propinsi']);
  		$idprop_penerima = $xpropinsi[0];
  		$propinsi_penerima = $xpropinsi[1];
  		$where = "WHERE idprop = '$idprop_penerima'";

      }else{
      	$where = ""; 
      }

       ?>

      <!-- tabel produk -->

      <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Data Kota Pengiriman
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
	
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Kota</th>
						<th>Nama Kota</th>
						<th>Ongkir</th>
						<th>Aksi</th>
						
						<!-- <th>Tanggal</th> -->
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php 
						$query = mysqli_query ($conn, "SELECT * FROM kota $where") or die(mysqli_error($conn));
						while($pengiriman = mysqli_fetch_array($query)){
					 ?>
					<tr>
						<td><?php echo $nomor;?> </td>
						<td><?php echo $pengiriman['idkota'];?> </td>
						<td><?php echo $pengiriman['nm_kota'];?> </td>
						<td>IDR <?php echo number_format($pengiriman['ongkir']);?></td>
						<td>
						<a href="beranda.php?halaman=ubahkota&id=<?php echo $pengiriman['idkota'] ;?>" class="btn btn-primary"" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
						<button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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

<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		<!-- end tabel