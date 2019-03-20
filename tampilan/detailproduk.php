    <!-- detail produk-->
    <?php
    $id_produk=$_GET['id'];
    if (isset($_SESSION['idpelanggan'])) {
      # code...
    $id_pelanggan=$_SESSION['idpelanggan']; 
    }else{
    $id_pelanggan=""; 

    }
    $result = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
    $data = mysqli_fetch_array($result);

     ?>
    <section class="detailproduk" id="menu">
      <div class="container">
        <form action="" method="post">
          <div class="row">
          <div class="col-md-12"><br>
            <h3 class="text-center">Detail Produk</h3>
              <hr>
          </div>
        </div>
        <div class="row">
        <div class="col-md-4">
          <h4>Gambar</h4>
          <img src="admin/img/imgproduk/<?php echo $data['gambar']; ?>" alt="" style = "width: 300px; height: 300px;" class="img-thumbnail">       
          </div>

          <div class="col-md-8">
          <hr> 
            
              <label for=""><h3><?php echo $data['nm_produk'];?></h3></label><br> 

              <label for=""><h4>IDR. <?php echo number_format($data['harga']);?></h4></label><br>
              <label for=""><h4>Stok : <?php echo $data['stok'];?> Pcs</h4></label><br>

              <!-- <a href="keranjang2.php?id=<?php //echo $data['id_produk']; ?>" class="btn btn-success">Beli</a> -->
              <a href="tampilan/beli2.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-success">Beli</a>           
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <h4>Deskripsi</h4>
            <?php echo $data['deskripsi'];?>
          </div>
        </div>
        </form>

          
<!-- <div class="media thumbnail col-md-5">
  <div class="media-body">
    <h4 class="media-heading">Nama KOmentar</h4>
    <hr>
    <p>Isi KOmendasjdanjdnasjassadasdjnasdnasjnasjndsjnsjss
      sfjsnfasfa
      sfasfnsdfsd
      safsa</p>
      <a href="#">	Balas</a>
      <hr>
  </div>
</div>
 -->
<?php

// Script cek apakah dia pernah beli produk ini apa belum
// SELECT *FROM transaksi INNER JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi WHERE transaksi.id_pelanggan='PLG201807190005'

$qwrcekproduk=$koneksi->query("SELECT *FROM transaksi WHERE id_pelanggan='$id_pelanggan' ")or die(mysqli_error($koneksi));
while($datacekproduk=$qwrcekproduk->fetch_assoc()){

// print_r($datacekproduk);
$id_transaksi=$datacekproduk['id_transaksi'];
echo  "<br>";
    //cek ke detail
    $qwrcekprodukdetail=$koneksi->query("SELECT * FROM `detail_transaksi` INNER JOIN produk ON detail_transaksi.id_produk=produk.id_produk WHERE id_transaksi='$id_transaksi' and detail_transaksi.id_produk='$id_produk'")or die(mysqli_error($koneksi));
    
    //cek apakah produk ada
      $cekjumlahproduk=$qwrcekprodukdetail->num_rows;


      while($datacekprodukdetail=$qwrcekprodukdetail->fetch_assoc()){
          // print_r($datacekprodukdetail);
          $id_produkdetail=$datacekprodukdetail['id_produk'];
          $id_transaksidetail=$datacekprodukdetail['id_transaksi'];
          $nama_produkdetail=$datacekprodukdetail['nm_produk'];
      }
}




 if (!isset($_SESSION['idpelanggan'])):


  ?>

<div class="row">
            <?php
            // $qwrkomentarsaya=$koneksi->query("SELECT *FROM komentar INNER JOIN pelanggan ON komentar.id_pelanggan=pelanggan.id_pelanggan WHERE  id_produk='$id_produk'")or die(mysqli_error($koneksi));

            // while ($row=$qwrkomentarsaya->fetch_assoc()) {
$per_hal=5;
          $jumlah_record=mysqli_query($conn, "SELECT COUNT(*) as jml FROM komentar");
          $jumx=mysqli_fetch_array($jumlah_record);
          $jum=$jumx['jml'];
          $halaman=ceil($jum/$per_hal);
          $page=(isset($_GET['page'])) ? (int)$_GET['page']:1;
          $start=($page-1)*$per_hal;

$result = mysqli_query ($conn, "SELECT *FROM komentar INNER JOIN pelanggan ON komentar.id_pelanggan=pelanggan.id_pelanggan WHERE  id_produk='$id_produk'
LIMIT $start, $per_hal;");
while ($data = mysqli_fetch_assoc($result)){

              ?>
            <div class="col-md-12">
                <div class="well">
            <div class="form-group">
                 <b><?php  echo $data['nm_pelanggan'];?></b>
                <p><i><?php  echo $data['isi_komentar'];?></i></p>
                <hr>
                <b>Jawab Admin :  </b><p><?php echo $data['isi_balas'];?></p>
                
              
            </div>
                </div>
              </div>
            <?php } ?>

      </div>
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
        <li <?php echo $tampilprev;?>><a href="index.php?halaman=detail&id=<?= $id_produk ?>&=<?php echo $page-1 ?>"><i class="fa fa-long-arrow-left"> </i> Previous </a></li>
        <?php
          for($x=1;$x<=$halaman;$x++) {
            ($page==$x)? $activ='class="active"':$activ='';
        ?>          
        <li <?php echo $activ;?>><a href="index.php?halaman=detail&id=<?= $id_produk ?>&page=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php } ?>
        <li <?php echo $tampilnext;?>><a href="iindex.php?halaman=detail&id=<?= $id_produk ?>&page=<?php echo $page+1 ?>"><i class="fa fa-long-arrow-right"> </i> Next</a></li>
    </ul>

<?php else: ?>
  

<!-- Ulasana -->
<!-- Ulasana -->

<div class="col-md-9">
  <div class="row">
            <?php

            // $qwrkomentarsaya=$koneksi->query("SELECT *FROM komentar INNER JOIN pelanggan ON komentar.id_pelanggan=pelanggan.id_pelanggan WHERE  id_produk='$id_produk'")or die(mysqli_error($koneksi));

            // while ($row=$qwrkomentarsaya->fetch_assoc()) {

$per_hal=5;
          $jumlah_record=mysqli_query($conn, "SELECT COUNT(*) as jml FROM komentar");
          $jumx=mysqli_fetch_array($jumlah_record);
          $jum=$jumx['jml'];
          $halaman=ceil($jum/$per_hal);
          $page=(isset($_GET['page'])) ? (int)$_GET['page']:1;
          $start=($page-1)*$per_hal;

$result = mysqli_query ($conn, "SELECT *FROM komentar INNER JOIN pelanggan ON komentar.id_pelanggan=pelanggan.id_pelanggan WHERE  id_produk='$id_produk'
LIMIT $start, $per_hal;");
while ($data = mysqli_fetch_assoc($result)){

              ?>
            <div class="col-md-12">
                <div class="well">
            <div class="form-group">
                 <b><?php  echo $data['nm_pelanggan'];?></b>
                <p><i><?php  echo $data['isi_komentar'];?></i></p>
                <hr>
                <b>Jawab Admin :  </b><p><?php echo $data['isi_balas'];?></p>
                
              
            </div>
          </div>
        </div>
        <?php } ?>
      </div>  
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
        <li <?php echo $tampilprev;?>><a href="index.php?halaman=detail&id=<?= $id_produk ?>&=<?php echo $page-1 ?>"><i class="fa fa-long-arrow-left"> </i> Previous </a></li>
        <?php
          for($x=1;$x<=$halaman;$x++) {
            ($page==$x)? $activ='class="active"':$activ='';
        ?>          
        <li <?php echo $activ;?>><a href="index.php?halaman=detail&id=<?= $id_produk ?>&page=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php } ?>
        <li <?php echo $tampilnext;?>><a href="index.php?halaman=detail&id=<?= $id_produk ?>&page=<?php echo $page+1 ?>"><i class="fa fa-long-arrow-right"> </i> Next</a></li>
    </ul>

      <!-- jika dia pernah beli maka munculkan -->
      <?php if ($cekjumlahproduk > 0 ): ?>
        
      


      <div class="form-group">
          <div class="panel panel-default">
            <div class="panel-heading">Ulasan Anda mengenai produk <strong> <?= $nama_produkdetail ?></strong> </div>
              <div class="panel-body">
                <form action="" method="post">
                  <input type="hidden" name="id_produk" value="<?php echo $id_produk ?>">
                  <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksidetail ?>">
                  <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan ?>">
                  <textarea class="form-control" rows="5" name="isi_komentar" required></textarea>
                  <br>
                  <input type="submit" name="ulasan" class="btn btn-block btn-info" value="Kirim Pesan">

                </form>
<!-- scrppit simpan komentar -->
<?php 
if (isset($_POST['ulasan'])) {
  # code...
  // mysqli_query($conn,"INSERT INTO komentar VALUES ")
  $tanggal=date("Y-m-d");
  $id_produk=$_POST['id_produk'];
  $id_transaksi=$_POST['id_transaksi'];
  $id_pelanggan=$_POST['id_pelanggan'];
  $isi_komentar=$_POST['isi_komentar'];
  $isi_balas="";


  $simpan=$koneksi->query("INSERT INTO komentar VALUES(null,'$id_pelanggan','$id_transaksi','$id_produk','$isi_komentar','$isi_balas','$tanggal')")or die(mysqli_error($koneksi));

  if ($simpan) {
    # code...
    echo "<script>alert('Terimakasih atas ulasan anda');</script>";
    echo "<script>location='index.php?halaman=detail&id=$id_produk';</script>";
  }
}

 ?>
              </div>
        </div>
      </div>
      <?php endif ?>
    </div>
<!-- End Ulasana -->
<?php endif ?>


      </div>
    </section>

<br>
<br>
<br>




    <!-- end detail produk-->