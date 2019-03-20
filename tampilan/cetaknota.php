<?php 
session_start();

include "../pengaturan/koneksi.php";
$id_pelanggan=$_SESSION['idpelanggan'];
$id_transaksi=$_GET['id_transaksi'];
$qwr=$koneksi->query("SELECT *FROM transaksi LEFT JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi LEFT JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan INNER JOIN pengiriman ON transaksi.id_pengiriman=pengiriman.id_pengiriman  WHERE transaksi.id_transaksi='$id_transaksi' ")or die(mysqli_error($koneksi));
$detail=$qwr->fetch_assoc();



// print_r($detail);
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
  </head>
  <body onload="window.print();" >
    <!-- <body> -->
  


    <!-- detail produk-->
    <section class="#" id="menu">
      <div class="container"><br>
        <h3 class="text-center"> Struk Pembelian </h3>
        <section class="konten" id="menu">
      <div class="container">

        <?php 

$qwrkota =$koneksi->query("SELECT *FROM pengiriman LEFT JOIN kota ON kota.idkota=pengiriman.idkota  LEFT JOIN propinsi ON propinsi.idprop=kota.idprop WHERE kota.idkota='$detail[idkota]'")or die(mysqli_error($koneksi));


$resultkota  = mysqli_fetch_array($qwrkota);
// print_r($resultkota);



         ?>
       
       <hr>
       <!-- tabel -->
       <div class="row">
         
       </div>
       <div class="row">
          <div class="col-md-12">
            <table >
              <thead>
                <th style="width: 400px;"><h4>Transaksi</h4></th>
                <th style="width: 400px;"><h4>Data Pelanggan</h4></th>
                <th style="width: 400px;"><h4>Data Pengiriman</h4></th>
              </thead>
              <tbody>
                <tr>
                  <td><label for="">ID : <?php echo $detail['id_transaksi']; ?></label></td>
                  <td><label for="">Nama   : <?php echo $detail['nm_pelanggan']; ?></label></td>
                  <td><label for="">Provinsi : <?php echo $resultkota['nm_prop']; ?></td>
                </tr>

                <tr>
                  <td> <label for="">Tanggal : <?php echo $detail['tanggal']; ?></label></td>
                  <td><label for="">E-mail : <?php echo $detail['email']; ?></label></td>
                  <td><label for="">Kota : <?php echo $resultkota['nm_kota']; ?></label></td>
                </tr>

                <tr>
                  <td>
                    <label for="">Status : 
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

             ?></label>
                  </td>
                  <td><label for="">Telp    : <?php echo $detail['telepon']; ?></label></td>
                  <td><label for="">Kecamatan : <?php echo $detail['kecamatan']; ?></label></td>
                </tr>

                <tr>
                  <td></td>
                  <td></td>
                  <td><label for="">Alamat : <?php echo $detail['alamat']; ?></label></td>
                </tr>
              </tbody>
            </table>
            <br>

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
           <td><img src="../admin/img/imgproduk/<?php echo $data['gambar']; ?>" alt="" style="height: 50px; width: 100px;"></td>
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
    </section>

    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../admin/assets/js/bootstrap.min.js"></script>
  </body>
</html>
  
  