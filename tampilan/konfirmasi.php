
<?php 


$idtrans = $_GET["id_transaksi"];


 ?>


  <hr>
    <!-- Bukti Transaski-->
    <section class="#" id="menu">
      <div class="container">
    <div class="row" >
      <form action="tampilan/simpankonfirmasi.php" method="post" enctype="multipart/form-data">
      <div class="col-md-6 col-md-offset-3">
        <h4>Bukti Pembayaran</h4>
        <hr>
        <div class="form-group">
          <label for="st">ID Transaksi</label>
          <input type="text" id="st" readonly class="form-control" name="idtrans" value="<?php echo $idtrans; ?>">
        </div><br>
        <div class="form-group">
          <label for="st">ID Pelanggan</label>
          <input type="text" id="st" readonly class="form-control" name="id_pelanggan" value="<?= $_SESSION['idpelanggan'] ?>">
        </div><br>
        <div class="form-group">
          <label for="ft">Bukti Transaksi</label>
          <input type="file" class="form-control" id="ft" name="foto">
        </div>
      <button class="btn btn-primary" name="save">Simpan</button>
      </div>
      
        
      
    </form>

    </div>
    </div>         
    </section>

    <!-- end Bukti transaksi-->



    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../admin/assets/js/bootstrap.min.js"></script>
  </body>
</html>