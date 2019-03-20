<?php 

include '../pengaturan/koneksi.php';

$qwr=mysqli_query($conn,"SELECT * FROM transaksi")or die(mysqli_error($koneksi));
$data= mysqli_fetch_assoc($qwr);
// print_r($data);


 ?>

<div class="row">
  <div class="col-md-12">
    <h3 align="center">Laporan Penjualan Sepatu Olahraga</h3><br>
  <form action="" method="POST">
    <input type="date" name="tgl_mulai">
    <input type="date" name="tgl_akhir">
    <input type="submit" name="cetak" value="Cek" class="btn btn-info">
  </form>
  <?php 
    $awal = (empty($_POST['tgl_mulai']))?'':$_POST['tgl_mulai'];
    $akhir = (empty($_POST['tgl_akhir']))?'':$_POST['tgl_akhir'];
    $period = "WHERE tanggal BETWEEN '".$awal."'AND'". $akhir."'"; 
  $query = mysqli_query($conn,"SELECT * FROM transaksi $period");
$jml=mysqli_num_rows($query);
    
    ?>
<hr>
<?php 

if ($jml == 0) {
  # code...
    echo "Data Tidak Tersedia";

}else{

  if (!isset($_POST['cetak'])) {
    echo "Data Tidak Tersedia";
  }else{

 ?>

<table align="center" border="1">
    <thead>
      <th>No</th>
      <th>ID Transaksi</th>
      <th>ID Pelanggan</th>
      <th>ID Pengiriman</th>
      <th>Alamat</th>
      <th>Tanggal</th>
      <th>Status</th>
    </thead>
  <?php
  $no=1; 
  include "perintah/koneksi.php";
  $query = mysqli_query($conn,"SELECT * FROM transaksi $period");

  while ($data = mysqli_fetch_array($query)) {

   ?>
    <tbody>
      <td><?php echo $no; ?></td>
      <td><?php echo $data['id_transaksi']; ?></td>
      <td><?php echo $data['id_pelanggan']; ?></td>
      <td><?php echo $data['id_pengiriman']; ?></td>
      <td><?php echo $data['alamat']; ?></td>
      <td><?php echo $data['subtotal']; ?></td>
      <td><?php echo $data['tanggal']; ?></td>
    </tbody>
    <?php $no++; }?>
      
  </table>

  <form action="../cetak/cetaklaporan2.php" method="POST">
    <input type="hidden" name="tgl_mulai" value="<?= $awal ?>">
    <input type="hidden" name="tgl_akhir" value="<?= $akhir ?>">
    <input type="submit" value="Cetak" class="btn btn-primary">
  </form>


<?php }} ?>
  </div>
</div>