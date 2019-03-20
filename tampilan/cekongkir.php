  <?php 



if (!isset($_SESSION["idpelanggan"])) {
  echo "<script>alert('Anda harus login');</script>"; 
  echo "<script>location='../index.php';</script>"; 
}else{
  $id_pelanggan=$_SESSION["idpelanggan"];
}

$id_transaksi=bikinkode('transaksi','TR');
$tgl=date("Y-m-d");

$carikode = mysqli_query($koneksi, "select max(id_pengiriman) from pengiriman") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 5);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "PNG".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "PNG0001";
  }
// print_r($kode_otomatis);

if (isset($_POST['cekongkir'])) {
$xkota = explode("|",$_POST['kota']);
$idkota_penerima = $xkota[0];
 //echo "<br>";
  $kota_penerima = $xkota[1];
  $kota=$_POST['kota'];

  $xpropinsi = explode("|",$_POST['propinsi']);
  $idprop_penerima = $xpropinsi[0];
  $propinsi_penerima = $xpropinsi[1];

  $qwrongkir=$koneksi->query("SELECT * FROM kota WHERE idkota='$idkota_penerima'")or die(mysqli_error($koneksi));
  $ongkir=$qwrongkir->fetch_assoc();
  print_r($ongkir);


  if ($ongkir['ongkir'] > 0) {
    $tarif=$ongkir['ongkir'];
    // $id_pengiriman=$ongkir['id_pengiriman'];
  }else{
    $tarif=10000;
    // $id_pengiriman=$ongkir['id_pengiriman'];

  } 
}else{
  
    $tarif="";
}

$prop="SELECT * FROM propinsi;";
$qpro=mysqli_query($conn, $prop);

 ?>


    <!-- CHECKOUT -->
    <section class="konten" id="menu">
      <div class="container">
       <h3>Check Out</h3>
       <hr>
       <!-- tabel -->
              <table class="table table-bordered table-responsive">
         <thead>
           <th>No</th>
           <th>Produk</th>
           <th>Gambar</th>
           <th>Harga</th>
           <th>Jumlah</th>
           <th>Ukuran</th>
           <th>Subtotal</th>
           <!-- <th>Aksi</th> -->
         </thead>

         <tbody>
<?php 
$nomor=1;
$total=0;
$qwrkeranjang=$koneksi->query("SELECT *FROM keranjang  LEFT JOIN produk ON keranjang.id_produk=produk.id_produk WHERE id_pelanggan='$id_pelanggan'");

while ($data=$qwrkeranjang->fetch_assoc()) {
  
      $subtotal = $data["harga"]*$data['jumlah'];



?> 
         <tr>
           <td><?php echo $nomor; ?></td>
           <td><?php echo $data["nm_produk"]; ?></td>
           <td><img src="admin/img/imgproduk/<?php echo $data['gambar']; ?>" alt="" style="height: 50px; width: 100px;"></td>
           <td>Rp. <?php echo number_format($data["harga"]); ?></td>
           <td>
            <?php echo $data['jumlah'] ?>

           </td>
           <!-- <td><?php //echo $_POST["ukuran"]  ; ?></td> -->
           <td><?php echo $data['ukuran'] ?>
           </td>
           <td>Rp. <?php echo number_format($subtotal); ?> </td>
           
         </tr>
           <?php 
           $nomor++;
           $total+=$subtotal;
            }
            $totalbelanja=$total+$tarif;
             ?>
        <tr>  
          <th colspan="6">Grand Total</th>
          <th>Rp. <?php echo number_format($total); ?></th>
        </tr>
         </tbody>
       </table>
       <!-- tabel -->
       <hr>
      <!-- FORM -->
       <form method="POST" action="tampilan/simpencheckout.php">  
       <input type="hidden" name="idkota_penerima" value="<?= $idkota_penerima ?>">       
            <input type="hidden" name ="idkota_penerima" value="<?php echo $idkota_penerima;?>" class="form-control">
            <input type="hidden" name ="id_transaksi" value="<?php echo $id_transaksi;?>" class="form-control">
            <input type="hidden" name ="tanggal" value="<?php echo $tgl;?>" class="form-control">          
            <input type="hidden" name ="idpel" value="<?php echo $_SESSION["pelanggan"]['id_pelanggan'];?>" class="form-control">
           
        <div class="row">
        </div>

        <div class="row">
          <div class="col-md-4 col-md-offset-2">
            <div class="form-group">
              <label for="">Telepon</label>
              <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon'];?>" class="form-control">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="">Provinsi</label>
              <input type="text" readonly value="<?php echo $propinsi_penerima;?>" class="form-control">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 col-md-offset-2">
            <div class="form-group">
              <label for="">Kota</label>
              <input type="text" readonly value="<?php echo $kota_penerima;?>" class="form-control">
            </div>
          </div>

          <div class="col-sm-4"><br>
                <label for="" class="control-label">Ongkir</label><br>
                <input type="text" readonly class="form-control" value="Rp. <?php echo number_format($tarif); ?>">
                <input type="hidden" value="<?= $tarif ?>" name="ongkir" >
            <input type="hidden" name ="id_pengiriman" value="<?php echo $kode_otomatis;?>" class="form-control">
                
            </div>
        </div>

        <div class="col-md-4 col-md-offset-2">
            <div class="form-group">
              <label for="">Kecamatan</label>
              <input type="text"  required="" name="kecamatan" class="form-control">
            </div>
          </div>

        <input type="hidden" name ="totalbelanja" value="<?php echo $totalbelanja;?>" class="form-control">
          <div class="row">
          <div class="col-md-8 col-md-offset-2">              
                <label for="">Alamat lengkap</label>
                <textarea class="form-control" id="des" required="" cols="10" rows="5" name="alamat"></textarea>        
          </div>
        </div><br>
                
       <div class="row">
         <div class="col-md-4 col-md-offset-2">
       <a href="checkout.php" class="btn btn-danger" >Kembali</a> 
       <button type="submit" class="btn btn-success" name ="checkout" >Checkout</button> 
           

         </div>
       </div>     
       </div>

       </form>
              <!-- END FORM -->
    </section>

    <!-- end CHECKOUT -->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../admin/assets/js/bootstrap.min.js"></script>
    <!-- script ajax tampil alamat -->
    <script>    
    $("#propinsi").change(function(){
    
      // variabel dari nilai combo box provinsi
      var id_provinsi = $("#propinsi").val();
      
      // tampilkan image load
      $("#imgLoad").show("");
      
      // mengirim dan mengambil data
      $.ajax({
        type: "POST",
        dataType: "html",
        url: "get_kota.php",
        data: "prov="+id_provinsi,
        success: function(msg){
          
          // jika tidak ada data
          if(msg == ''){
            alert('Tidak ada data');
          }
          
          // jika dapat mengambil data,, tampilkan di combo box kota
          else{
            $("#kota").html(msg);                                                      
          }
          
          // hilangkan image load
          $("#imgLoad").hide();
        }
      });     
    });
  </script>
  