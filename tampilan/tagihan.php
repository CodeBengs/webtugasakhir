    <!-- detail produk-->
    <section class="#" id="menu">
      <div class="container">
        <h3> Data Transaksi anda </h3>
        <section class="konten" id="menu">
      <div class="container">

        <?php 

$id_pelanggan=$_SESSION['idpelanggan'];



         ?>
       
       <hr>
       <!-- tabel -->
       <div class="row">
          <div class="col-md-12">
      <table class="table table-bordered table-responsive">
         <thead>
           <th>No</th>
           <th>Id Transaksi</th>
           <th>Nama Penerima</th>
           <th>Subtotal</th>
           <th>Tanggal</th>
           <th>Status</th>
           <th>Aksi</th>
           <!-- <th>Aksi</th> -->
         </thead>

         <tbody>
<?php 
$nomor=1;
$total=0;
$qwrkeranjang=$koneksi->query("SELECT *FROM transaksi LEFT JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE transaksi.id_pelanggan='$id_pelanggan'");
while ($data=$qwrkeranjang->fetch_assoc()) {
  // print_r($data);
  # code...
      // $subtotal = $data["harga"]*$data['jumlah'];?> 
         <tr>
           <td><?php echo $nomor; ?></td>
           <td><?php echo $data["id_transaksi"]; ?></td>
           <td><?php echo $data["nm_pelanggan"]; ?></td>
           <td>IDR. <?php echo number_format($data['subtotal']); ?></td>
           <td>
            <?php echo $data['tanggal'] ?>

           </td>
           <!-- <td><?php //echo $_POST["ukuran"]  ; ?></td> -->
           <td>
            <?php 
            switch ($data['status']) {
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
            
           

           </td>
           <td>
            <a href="?halaman=nota&id_transaksi=<?php echo $data['id_transaksi'] ?> " class="btn btn-default">Detail</a>

<?php if ($data['status']=="Pending"): ?>
  
            <a href="?halaman=konfirmasi&id_transaksi=<?php echo $data['id_transaksi'] ?> " class="btn btn-info">Konfirmasi</a>
<?php endif ?>
           

           </td>
           
         </tr>
           <?php 
           $nomor++;
           
            }
            
             ?>

        
         </tbody>
       </table>
       <hr>
      </div>         
    </section>