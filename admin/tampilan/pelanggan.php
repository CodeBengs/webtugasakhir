<!-- breadcrumb -->
 	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Pelanggan </li>
      </ol>
      <!-- end breadcrumb -->

<?php $query = mysqli_query($conn,"SELECT * FROM pelanggan")?>

<!-- tabelpelanggan -->
  <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Pelanggan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th>Nama</th>
          <th>E-mail</th>
          <th>Telepon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      
      <tbody>

        <?php              
         while($pelanggan = mysqli_fetch_array ($query)) {
         ?>
       
        <tr>
          <td><?php echo $pelanggan['nm_pelanggan']; ?></td>
          <td><?php echo $pelanggan['email'] ;?></td>
          <td><?php echo $pelanggan['telepon'] ;?></td>
          <td>
            <a href="beranda.php?halaman=hapuspelanggan&id=<?php echo $pelanggan['id_pelanggan'] ;?>" class="btn btn-danger"><i class="fa fa-pencil">Hapus</i></a>
          </td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
  </div>
<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
<!--end tabelpelanggan -->

<!-- pagination -->
<!-- <nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
	    <li><a href="#">1</a></li>
	    <li><a href="#">2</a></li>
	    <li><a href="#">3</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav> -->
<!-- end pagination -->