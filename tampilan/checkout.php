<?php 
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
  # code...
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
            } ?>
        <tr>  
          <th colspan="6">Grand Total</th>
          <th>Rp. <?php echo number_format($total); ?></th>
        </tr>
         </tbody>
       </table>
       <!-- tabel -->
       <hr>
   
      <!-- FORM SESSION PELANGGAN -->
       <form method="post">
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nm_pelanggan'];?>" class="form-control">
            </div>

            <div class="form-group">
              <label for="">E-mail</label>
              <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['email'];?>" class="form-control">
            </div>

            <div class="form-group">
              <label for="">Telepon</label>
              <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon'];?>" class="form-control">
            </div>
          </div>
        <div class="col-md-4">
          
        </div>
        </div >
  
       </form>
       <!-- END FORM SESSION PELANGGAN -->

       <!-- FORM KOTPROV -->
       <form action="?halaman=cekongkir" method="post">
         <!-- provinsi -->
            <div class="row">
             <div class="form-group">
              <div class="col-sm-4">
              <label for="" class="control-label">Propinsi</label>
                <select id="propinsi" name="propinsi" class="form-control" required>
                  <option value="">Pilih Propinsi</option>
                  <?php while($dtpro=mysqli_fetch_array($qpro)){ ?>
                  <option value="<?php echo $dtpro['idprop']."|".$dtpro['nm_prop'];?>"><?php echo $dtpro['nm_prop'];?></option>
                  <?php } ?>
                </select>
              </div>
              </div>
            </div>
            <!-- end provinsi --> 
            
            <!-- kota -->
            <div class="row">
              <div class="col-sm-4">
              <div class="form-group">
              <label for="" class="control-label">Kota/Kabupaten</label>
                <select id="kota"  name="kota" class="form-control">   
                </select>
              </div>
              </div>
            </div>
            
            
            <!-- end kota -->
       <button type="submit" class="btn btn-success" name ="cekongkir">Cek Ongkir</button>               <!-- END FORM KOTPROV-->
       </form>

      </div>
    </section>

    <!-- end CHECKOUT -->

    
  