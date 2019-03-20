<?php include "pengaturan/koneksi.php"; ?>

<div class="row">
  
<?php 
$per_hal=8;
          $jumlah_record=mysqli_query($conn, "SELECT COUNT(*) as jml FROM produk");
          $jumx=mysqli_fetch_array($jumlah_record);
          $jum=$jumx['jml'];
          $halaman=ceil($jum/$per_hal);
          $page=(isset($_GET['page'])) ? (int)$_GET['page']:1;
          $start=($page-1)*$per_hal;

$result = mysqli_query ($conn, "SELECT * FROM produk $where
LIMIT $start, $per_hal;");
while ($data = mysqli_fetch_assoc($result)){

 ?>

  <div class="col-md-3">   
    <div class="thumbnail"><a href="?halaman=detail&id=<?php echo $data['id_produk']; ?>">  <img src="admin/img/imgproduk/<?php echo $data['gambar']; ?>" style = "width: 200px; height: 200px;" alt=""></a>
    
      <div class="caption">
        <h3><?php echo $data['nm_produk']; ?></h3>
        <h5>IDR. <?php echo number_format($data['harga']); ?></h5>
        <a href="tampilan/beli2.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-success">Beli</a>
        <a href="?halaman=detail&id=<?php echo $data['id_produk']; ?>" class ="btn btn-info">Detail</a>
      </div>
    </div>
  </div>

  <?php } ?>
</div>
<!-- /.row -->
        <?php //echo $halaman;
        if ($page==1) {
          $tampilprev='style="display:none;"';
        } else {
          $tampilprev='';

        }
        if ($page==$halaman) {
          $tampilnext='style=display:none;"';

        } else {
          $tampilnext='';
        }
        ?>
        <ul class="pagination pagination-sm">
        <li <?php echo $tampilprev;?>><a href="index.php?page=<?php echo $page-1 ?>"><i class="fa fa-long-arrow-left"> </i> Previous </a></li>
        <?php
          for($x=1;$x<=$halaman;$x++) {
            ($page==$x)? $activ='class="active"':$activ='';
        ?>          
        <li <?php echo $activ;?>><a href="index.php?page=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php } ?>
        <li <?php echo $tampilnext;?>><a href="index.php?page=<?php echo $page+1 ?>"><i class="fa fa-long-arrow-right"> </i> Next</a></li>
    </ul>