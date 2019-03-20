<?php 
// session_start();
// include "../pengaturan/koneksi.php";
if (isset($_SESSION['idpelanggan'])) {
  # code...
 $id_pelanggan=$_SESSION['idpelanggan'];
}else{
echo $id_pelanggan="";
}
$qwr=$koneksi->query("SELECT *FROM keranjang WHERE id_pelanggan='$id_pelanggan' ");
$jmlkeranjang=$qwr->num_rows;
if ($jmlkeranjang > 0) {
  
      // echo "<script>alert('data telah dihapus');</script>";
}else{
      echo "<script>alert('Keranjang Anda Kososng, silahkan berbelanja');</script>";
      echo "<script>location='index.php';</script>";

}
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";


// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";


if ((isset($_GET['aksi'])=="hapuskeranjang") and (isset($_GET['id']))){
//   # code...
      // echo "<script>alert('data telah dihapus');</script>";
$hapusker=mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_keranjang='$_GET[id]' ")or die("apanya <br>".mysqli_error($koneksi));
      echo "<script>location='index.php?halaman=keranjang';</script>";
      // 
}elseif ((isset($_GET['hapus'])=="satu") and (isset($_GET['id']))){
//   # code...
      // echo "<script>alert('data telah dihapus');</script>";
$hapusker=mysqli_query($koneksi,"UPDATE keranjang SET jumlah=jumlah-1 WHERE id_pelanggan='$id_pelanggan' AND id_produk='$_GET[id]'")or die("apanya <br>".mysqli_error($koneksi));
      echo "<script>location='index.php?halaman=keranjang';</script>";
      // 
}elseif ((isset($_GET['tambah'])=="satu") and (isset($_GET['id']))){
//   # code...
      // echo "<script>alert('data telah ditambahkan');</script>";
$hapusker=mysqli_query($koneksi,"UPDATE keranjang SET jumlah=jumlah+1 WHERE id_pelanggan='$id_pelanggan' AND id_produk='$_GET[id]'")or die("apanya <br>".mysqli_error($koneksi));
      echo "<script>location='index.php?halaman=keranjang';</script>";
      // 
 }

if ((isset($_GET['tambahukuran'])) and (isset($_GET['id_produk']))) {
  # code...
  $ukuran=$_GET['tambahukuran'];
  // if (isset($_GET['ukuran']) {
  //   # code...
  $hapusker=mysqli_query($koneksi,"UPDATE keranjang SET ukuran='$ukuran' WHERE id_pelanggan='$id_pelanggan' AND id_produk='$_GET[id_produk]'")or die("apanya <br>".mysqli_error($koneksi));
      // echo "<script>alert('data $ukuran telah ditambahkan');</script>";
      echo "<script>location='index.php?halaman=keranjang';</script>";
  // }
}
    

 ?>



  <hr>
    <!-- keranjang belanja -->
    <section class="konten" id="menu">
      <div class="container">
       <h3>Keranjang Belanja</h3>
       <hr>
       <table class="table table-bordered table-responsive">
         <thead>
           <th>No</th>
           <th>Produk</th>
           <th>Gambar</th>
           <th>Harga</th>
           <th>Jumlah</th>
           <th>Ukuran</th>
           <th>Subtotal</th>
           <th>Aksi</th>
         </thead>

         <tbody>
<?php 
$nomor=1;
$total=0;
$qwrkeranjang=$koneksi->query("SELECT *FROM keranjang  LEFT JOIN produk ON keranjang.id_produk=produk.id_produk WHERE id_pelanggan='$id_pelanggan'");
while ($data=$qwrkeranjang->fetch_assoc()) {
  # code...
      $subtotal = $data["harga"]*$data['jumlah'];



?> 
         <tr>
           <td><?php echo $nomor; ?></td>
           <td><?php echo $data["nm_produk"]; ?></td>
           <td><img src="admin/img/imgproduk/<?php echo $data['gambar']; ?>" alt="" style="height: 50px; width: 100px;"></td>
           <td>IDR. <?php echo number_format($data["harga"]); ?></td>
           <td>
            <?php 
             if (!($data['jumlah'] == $data['stok']  )) {
              # code...
            
             ?>

             <a href="index.php?halaman=keranjang&tambah=satu&id=<?php echo $data['id_produk']; ?>" class="btn btn-primary btn-sm"><strong>+</strong></a>
             <?php } ?>
             <button class="btn-sm btn-default"><?php echo $data['jumlah']; ?></button>

            <?php
            // $jmlstok=mysqli_fetch_array(mysqli_query($koneksi,"SELECT jumlah FROM keranjang WHERE id_produk='$data[id_produk]' "));
            // print_r($jmlstok);
            if ($data['jumlah'] > 1  ) {
              # code...
            
            ?>
             <a href="index.php?halaman=keranjang&hapus=satu&id=<?php echo $data['id_produk']; ?>" class="btn btn-danger btn-sm"><strong>-</strong></a>
             <?php }else{

              ?>
              
              <?php } ?>

           </td>
           <!-- <td><?php //echo $_POST["ukuran"]  ; ?></td> -->
           <td>
             
             Ukuran
             <!-- untk ukuran 39 -->
             <?php if ($data['ukuran']==39): ?>
             <a href="index.php?halaman=keranjang&tambahukuran=39&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-danger btn-sm"><strong>39</strong></a>
             <?php else: ?>               
             <a href="index.php?halaman=keranjang&tambahukuran=39&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-primary btn-sm"><strong>39</strong></a>
             <?php endif ?>
             <!-- untk ukuran 40 -->
              <?php if ($data['ukuran']==40): ?>
             <a href="index.php?halaman=keranjang&tambahukuran=40&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-danger btn-sm"><strong>40</strong></a>
             <?php else: ?>               
             <a href="index.php?halaman=keranjang&tambahukuran=40&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-primary btn-sm"><strong>40</strong></a>
             <?php endif ?>
             <!-- untk ukuran 41 -->
              <?php if ($data['ukuran']==41): ?>
             <a href="index.php?halaman=keranjang&tambahukuran=41&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-danger btn-sm"><strong>41</strong></a>
             <?php else: ?>               
             <a href="index.php?halaman=keranjang&tambahukuran=41&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-primary btn-sm"><strong>41</strong></a>
             <?php endif ?>

             <!-- untk ukuran 42 -->
              <?php if ($data['ukuran']==42): ?>
             <a href="index.php?halaman=keranjang&tambahukuran=42&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-danger btn-sm"><strong>42</strong></a>
             <?php else: ?>               
             <a href="index.php?halaman=keranjang&tambahukuran=42&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-primary btn-sm"><strong>42</strong></a>
             <?php endif ?>

            
             

           </td>
           <td>IDR. <?php echo number_format($subtotal); ?> </td>
           <td>
             <a href="index.php?halaman=keranjang&aksi=hapuskeranjang&id=<?php echo $data['id_keranjang']; ?>" class="btn btn-danger">X</a>

           </td>
         </tr>
           <?php 
           $nomor++;
           $total+=$subtotal;
            } ?>
        <tr>  
          <th colspan="6">Total</th>
          <th>IDR. <?php echo number_format($total); ?></th>
        </tr>
         </tbody>
       </table>
       
       <form action="" method="post">
         <a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
       <!-- <a href="login.php" class="btn btn-primary">Checkout</a> -->
       
       <?php if ($id_pelanggan==1): ?>
        <!-- <?php //print_r($id_pelanggan); ?> -->
       <a href="login.php" class="btn btn-primary">Checkout</a>
         <?php else: ?>
       <a href="index.php?halaman=checkout" class="btn btn-primary">Checkout</a>
       <?php endif ?>


      <!-- <button type="submit" class="btn btn-primary" name="checkout">Checkout</button> -->
       </form>
    </div>
  </section>

   