<?php 
session_start();

include "../pengaturan/koneksi.php";
$id_transaksi=$_GET['id_transaksi'];
$id_pelanggan=$_SESSION['idpelanggan'];
$qwr=$koneksi->query("SELECT *FROM transaksi LEFT JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi LEFT JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE transaksi.id_transaksi='$id_transaksi' ")or die(mysqli_error($koneksi));
$detail=$qwr->fetch_assoc();
// print_r($detail);

$qwrkota =$koneksi->query("SELECT *FROM pengiriman LEFT JOIN kota ON kota.idkota=pengiriman.idkota  LEFT JOIN propinsi ON propinsi.idprop=kota.idprop WHERE id_pengiriman='$detail[id_pengiriman]'")or die(mysqli_error($koneksi));


$resultkota  = mysqli_fetch_array($qwrkota);


//print_r($detail);
 ?>

<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struk Pembelian <?php echo $detail['id_transaksi']; ?></title>

    <!-- Bootstrap -->
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();" >
  <!-- <body  > -->

  
  <hr>
    <!-- detail produk-->
    <section class="#" id="menu">
      <div class="container">
        <h3> Detail Transaksi </h3>
        <section class="konten" id="menu">
      <div class="container">
       
       <hr>
       
        <div class="row">
          <div class="col-md-12">
            <div class="row">
          <div class="col-md-4">

            <label for="">ID : <?php echo $detail['id_transaksi']; ?></label><br>
            <label for=""><?php echo $detail['tanggal']; ?></label><br><br><br>
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
             </label>
          </div>

          <div class="col-md-4">
            <h4>Pelanggan</h4>
            <label for=""><?php echo $detail['nm_pelanggan']; ?></label><br>
            <label for=""><?php echo $detail['email']; ?></label><br>
            <label for=""><?php echo $detail['telepon']; ?></label><br>
          </div>

           <div class="col-md-4">
            <h4>Pengiriman</h4>
            <label for=""><?php echo $resultkota['nm_prop']; ?></label><br>
            <label for=""><?php echo $resultkota['nm_kota']; ?></label><br>
            <label for=""><?php echo $detail['kecamatan']; ?></label><br>
            <label for=""><?php echo $detail['alamat']; ?></label>
          </div>
        </div>

            


          </div>
        </div>
        
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
           <!-- <th>Aksi</th> -->
         </thead>

         <tbody>
<?php 
$nomor=1;
$total=0;
$qwrkeranjang=$koneksi->query("SELECT *FROM detail_transaksi  LEFT JOIN transaksi ON detail_transaksi.id_transaksi=detail_transaksi.id_transaksi LEFT JOIN produk ON produk.id_produk=detail_transaksi.id_produk WHERE transaksi.id_transaksi='$detail[id_transaksi]'");
while ($data=$qwrkeranjang->fetch_assoc()) {
  # code...
      $subtotal = $data["harga"]*$data['jumlah'];



?> 
         <tr>
           <td><?php echo $nomor; ?></td>
           <td><?php echo $data["nm_produk"]; ?></td>
           <td><img src="../admin/img/imgproduk/<?php echo $data['gambar']; ?>" alt="" style="height: 50px; width: 100px;"></td>
           <td>Rp. <?php echo number_format($data["harga"]); ?></td>
           <td>
            <?php echo $data['jumlah'] ?>

           </td>
           <!-- <td><?php //echo $_POST["ukuran"]  ; ?></td> -->
           <td><?php echo $data['ukuran'] ?>
           </td>
           <td>Rp. <?php echo number_format($subtotal); ?></td>
           
         </tr>
           <?php 
           $nomor++;
           $total+=$subtotal;
            }
            // $totalbelanja=$total+$tarif;
             ?>
        <tr>
          <th colspan="6">Ongkir</th>
        <th>IDR <?php echo number_format($resultkota['ongkir']); ?></th>
      </tr>
        <tr>  
          <th colspan="6"> Total</th>
          <th>IDR <?php echo number_format($total+$resultkota['ongkir']); ?></th>
        </tr>
         </tbody>
       </table>

       <div class="row">
         <div class="col-md-4">
           <p class="bg-success">
            Silahkan lakukan Pembayaran Melalui Via Bank <br>
            BCA : 80802480284 <br>
            MANDIRI : 897498798 <br>
            BNI : 009888979

           </p>
         </div>

         <div class="col-md-4">
           <p class="bg-danger">
            Pesanan anda akan di proses selama 24 jam <br>
            Silahkan lakukan Pembayaran. <br>
           </p>
         </div>
       </div>
        
        <!-- <a href="cetaknota.php" class="btn btn-success">Cetak</a> -->
      </div>         
    </section>

    <!-- end detail produk-->



    <!-- end footer -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../admin/assets/js/bootstrap.min.js"></script>
  </body>
</html>