<?php 
session_start();

include "../pengaturan/koneksi.php";

if (!isset($_SESSION["idpelanggan"])) {
  echo "<script>alert('Anda harus login');</script>"; 
  echo "<script>location='../index.php';</script>"; 
}

 if (isset($_POST['cekongkir'])) {
$xkota = explode("|",$_POST['kota']);
$idkota_penerima = $xkota[0];
 //echo "<br>";
  $kota_penerima = $xkota[1];
  $kota=$_POST['kota'];

  $xpropinsi = explode("|",$_POST['propinsi']);
  $idprop_penerima = $xpropinsi[0];
  $propinsi_penerima = $xpropinsi[1];
  $qwrongkir=$koneksi->query("SELECT *FROM pengiriman WHERE kota='$idkota_penerima'");
  $ongkir=$qwrongkir->fetch_assoc();
  // print_r($ongkir);
  if ($ongkir['ongkir'] > 0) {
    $tarif=$ongkir['ongkir'];
  }else{
    $tarif=3000;

  }
}
// }else{
  
//     $tarif="";
// }

$prop="SELECT * FROM propinsi;";
$qpro=mysqli_query($conn, $prop);

 ?>

<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> I-Sport.com</title>

    <!-- Bootstrap -->
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="class navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
       </button>
          <div>
            <a href="../index.php" class="navbar-brand">I-Sport</a> 
          </div>  
        </div>
    
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produk <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Futsal</a></li>
                  <li><a href="#">Sepak Bola</a></li>
                  <li><a href="#">Basket</a></li>
                  
                </ul>
              </li>

              <li><a href="#portfolio">About</a></li>
              <li><a href="#contact"><span class="glyphicon glyphicon-question-sign"></span> Contact</a></li>
              <li><a href="keranjang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
              <!-- jika udah login -->
              <?php if (isset($_SESSION["pelanggan"])): ?>
              <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> logout</a></li>
                <!-- selain itu -->
                <?php else: ?>
              <li><a href="tampilan/login.php"><span class="glyphicon glyphicon-user"></span> login</a></li>
              <?php endif ?>
              <!-- ok -->

            </ul> 

            <form class="navbar-form navbar-right" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
            </form>
          </div>


      </div>
    </nav>
    <!-- akhir Navbar -->
  
  <hr>
    <!-- CHECKOUT -->
    <section class="konten" id="menu">
      <div class="container">
       <h3>Check Out</h3>
       <hr>
       <!-- tabel -->
       <table class="table table-bordered">
         <thead>
           <th>No</th>
           <th>Produk</th>
           <th>Gambar</th>
           <th>Harga</th>
           <th>Jumlah</th>
           <th>Subtotal</th>
         </thead>

         <tbody>
<?php $nomor=1; ?>
<?php $totalbelanja=0; ?>

<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?> 
<?php $result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
      $data =mysqli_fetch_assoc($result);
      print_r($data);

      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";

      $subtotal = $data["harga"]*$jumlah;

?> 
         <tr>
           <td><?php echo $nomor; ?></td>
           <td><?php echo $data["nm_produk"]; ?></td>
           <td><img src="../admin/img/imgproduk/<?php echo $data['gambar']; ?>" alt="" style="height: 50px; width: 100px;"></td>
           <td>Rp. <?php echo number_format($data["harga"]); ?></td>
           <td><?php echo $jumlah; ?></td>
           <td>Rp. <?php echo number_format($subtotal); ?> </td>
         </tr>

         <?php $nomor++; ?>
         <?php $totalbelanja+=$subtotal; ?>
<?php endforeach ?> 
          
          <tr>
           <td colspan="5"><b>Total Harga</b></td>
           <td><b>Rp. <?php echo number_format($totalbelanja); ?></b></td>
         </tr>  
         </tbody>
       </table>
       <!-- tabel -->
       <hr>
      <!-- FORM -->
       <form method="post">
        
        <div class="row">
          <div class="col-md-4 col-md-offset-2">
            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nm_pelanggan'];?>" class="form-control">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="">E-mail</label>
              <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['email'];?>" class="form-control">
            </div>
          </div>
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
                <input type="text" value="Rp. <?php echo number_format($tarif); ?>">
            </div>
        </div>

        
        <form action="" method="post">
          <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <form action="" method="post">           
                <label for="">Alamat lengkap</label>
                <textarea class="form-control" id="des" cols="30" rows="10" name="alamat"></textarea>                 
            </form>   
          </div>
        </div><br>
               
       <div class="row">
         <div class="col-md-4 col-md-offset-2">
             <!-- <a href="checkout.php" class="btn btn-danger" >Kembali</a>  -->
             <button type="submit" class="btn btn-success" name ="checkout" >Checkout</button>   
         </div>
       </div>
      </form>   
       </div>              
    </section>

    <?php 
      if (isset($_POST["checkout2"])) {
        
        $alamat = $_POST["alamat"];
        $telponpelanggan = $_SESSION["pelanggan"]['telepon'];
        $emailpelanggan = $_SESSION["pelanggan"]['email'];
        $namapelanggan = $_SESSION["pelanggan"]['nm_pelanggan'];

        $query = mysqli_query($conn, "INSERT INTO detail_transaksi VALUES  ");

        
      }


     ?>

    <!-- end CHECKOUT -->



    <!-- footer -->
    <footer>
      <div class="container text-center">
        <div class="row">
         <div class="col-sm-12">
           <p>&copy; copyright 2018 | built by <a href="http//twitter.com/ibeengg_">Mulhadi Moch</a>.</p>
         </div>
        </div>
      </div>      
    </footer>
    

    <!-- end footer -->


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
  </body>
</html>