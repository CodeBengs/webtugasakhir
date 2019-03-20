<?php 
// session_start();

// include "../pengaturan/koneksi.php";
$id_pelanggan=$_SESSION['idpelanggan'];
$id_transaksi=$_GET['id_transaksi'];
$qwr=$koneksi->query("SELECT *FROM transaksi LEFT JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi LEFT JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan INNER JOIN pengiriman ON transaksi.id_pengiriman=pengiriman.id_pengiriman  WHERE transaksi.id_transaksi='$id_transaksi' ")or die(mysqli_error($koneksi));
$detail=$qwr->fetch_assoc();



// print_r($detail);
 ?>


    <!-- detail produk-->
    <section class="#" id="menu">
      <div class="container"><br>
        <h3> Detail Transaksi Pembayaran </h3>
        <section class="konten" id="menu">
      <div class="container">

        <?php 
//         $query = mysqli_query($conn,"SELECT * FROM pengiriman WHERE kota='$detail[id_pengiriman]'")or die(mysqli_error($conn));
// $result  = mysqli_fetch_array($query);



// $qwrkota = mysqli_query($conn,"SELECT * FROM kota LEFT JOIN propinsi ON kota.idprop= propinsi.idprop WHERE idkota='$detail[id_pengiriman]'")or die(mysqli_error($koneksi));
$qwrkota =$koneksi->query("SELECT *FROM pengiriman LEFT JOIN kota ON kota.idkota=pengiriman.idkota  LEFT JOIN propinsi ON propinsi.idprop=kota.idprop WHERE kota.idkota='$detail[idkota]'")or die(mysqli_error($koneksi));


$resultkota  = mysqli_fetch_array($qwrkota);
// print_r($resultkota);



         ?>
       
       <hr>
       <!-- tabel -->
       <div class="row">
          <div class="col-md-12">
            
            <div class="row">
          <div class="col-md-4">

            <label for="">ID : <?php echo $detail['id_transaksi']; ?></label><br>
            <label for="">Tanggal : <?php echo $detail['tanggal']; ?></label><br><br><br>
            <label for="">Status Pembayaran : 
              <?php 
              
            switch ($detail['status']) {
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
                
              
          </div>

          <div class="col-md-4">
            <h4>Data Pelanggan</h4>
            <label for="">Nama   : <?php echo $detail['nm_pelanggan']; ?></label><br>
            <label for="">E-mail : <?php echo $detail['email']; ?></label><br>
            <label for="">Telp    : <?php echo $detail['telepon']; ?></label><br>
          </div>

           <div class="col-md-4">
            <h4>Data Pengiriman</h4>
            <label for="">Provinsi : <?php echo $resultkota['nm_prop']; ?></label><br>
            <label for="">Kota : <?php echo $resultkota['nm_kota']; ?></label><br>
            <label for="">Kecamatan : <?php echo $detail['kecamatan']; ?></label><br>
            <label for="">Alamat : <?php echo $detail['alamat']; ?></label>
          </div>
        </div>
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
$qwrkeranjang=$koneksi->query("SELECT *FROM detail_transaksi  LEFT JOIN produk ON produk.id_produk=detail_transaksi.id_produk WHERE detail_transaksi.id_transaksi='$_GET[id_transaksi]'");
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
            <?php echo $data['jumlah'] ?>

           </td>
           <!-- <td><?php //echo $_POST["ukuran"]  ; ?></td> -->
           <td><?php echo $data['ukuran'] ?>
           </td>
           <td>IDR. <?php echo number_format($subtotal); ?> </td>
           
         </tr>
           <?php 
           $nomor++;
           $total+=$subtotal;
            }
            // $totalbelanja=$total+$tarif;
             ?>

        <tr>
          <th colspan="6">Ongkir </th>
        <th>IDR. <?php echo number_format($detail["ongkir"]); ?></th>
      </tr>

        <tr>  
          <th colspan="6">Total</th>
          <th>IDR. <?php echo number_format($total+$detail["ongkir"]); ?></th>
        </tr>
         </tbody>
       </table>
       <div class="row">
         </div>
         <div class="col-md-4 col-sm-4">
                    <div class="well well-sm">
                        <p>
                        Silahkan lakukan Pembayaran Melalui Via Bank <br>
                        BCA : 80802480284 <br>
                        MANDIRI : 897498798 <br>
                        BNI : 009888979
                        </p>
                    </div>
                </div>

         <div class="col-md-4">
           <p class="bg-danger">
            *Pesanan anda akan di proses selama 24 jam <br>
            Silahkan lakukan Pembayaran. <br>
           </p>
         </div>
       </div>
        
        <a href="tampilan/cetaknota.php?id_transaksi=<?= $detail['id_transaksi'] ?>" target="blank" class="btn btn-success">Cetak</a>
      </div>   
      <?php //print_r($detail); ?>      
    </section>
  
  