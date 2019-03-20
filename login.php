<?php 
session_start();
// $keranjang=$_SESSION['keranjang'][1];

// print_r($keranjang);
if (isset($_SESSION['keranjang'][1])) {
  # code...
// $datakeranjang=$_SESSION['keranjang'];
$keranjang=1;

}else{
  
$keranjang=0;
}

include "pengaturan/koneksi.php";

 ?>

<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> I-Sport.com</title>

    <!-- Bootstrap -->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-image: url(../img/bgt.jpg); background-size: cover;">

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
            <a href="index.php" class="navbar-brand">I-Sport</a> 
          </div>  
        </div>
    
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produk <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="index.php">All</a></li>
                  <?php $qry = mysqli_query($conn,"SELECT * FROM kategori ORDER BY id_kategori");
                  while ($data = mysqli_fetch_assoc($qry)) { ?>
                  <li><a href="index.php?tampilan=kategori&id=<?php echo $data['id_kategori'];?>&ket=<?php echo $data['kategori']; ?>"><?php echo ucwords($data['kategori']); ?></a></li>

                  <?php } ?>
                  
                </ul>
              </li>

              <li><a href="index.php?halaman=about">About</a></li>
              <li><a href="index.php?halaman=kontak"><span class="glyphicon glyphicon-question-sign"></span> Contact</a></li>
              <!-- jika udah login -->
              <?php if (isset($_SESSION["pelanggan"])): ?>
              <li><a href="index.php?halaman=keranjang"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge"><?php echo  $jmlkeranjang ?></span></a></li>
              <li><a href="index.php?halaman=tagihan"><span class="glyphicon glyphicon-question-sign"></span> Konfirmasi</a></li>
              <li><a href="tampilan/logout.php"><span class="glyphicon glyphicon-off"></span> logout</a></li>
                <!-- selain itu -->
                <?php else: ?>
              <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> login</a></li>
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
    <!-- keranjang belanja -->
    <section class="konten" id="menu">
      <div class="container">
       <h3 class="text-center">Silahkan Login</h3>
       <hr>
       <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Login Pelanggan </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="login.php" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"  ></i></span>
                                            <input type="text" class="form-control" name="email" placeholder="Masukan E-mail " required="Silahkan isi Email Anda" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="password" class="form-control" name="pass" placeholder="Masukan Password" required />
                                        </div>
                                    <div class="form-group">
                                            <!-- <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label> -->
                                            <!-- <span class="pull-right">
                                                   <a href="#" >Lupa password ? </a> 
                                            </span> -->
                                        </div>
                                     
                                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                                    <hr />
                                    Daftar Baru ? <a href="register.php" >klik disini </a> 
                                    </form>
                            </div>
                           
                        </div>
                    </div>
       
      </div>
    </section>
    <?php 
      if (isset($_POST['login'])) {

        $email = $_POST["email"];
        $password = $_POST["pass"];
        $result = mysqli_query($conn,"SELECT * FROM pelanggan WHERE email = '$email' AND password = '$password'");
        $data = mysqli_num_rows($result);

        if ($data==1) {
           $akun = mysqli_fetch_assoc($result);
           $_SESSION["pelanggan"] = $akun;
           $_SESSION["idpelanggan"] = $akun['id_pelanggan'];

           if ($keranjang==1) {
             # code...
           echo "<script>alert('Anda Sukses login diarahkan ke chekout');</script>";
           echo "<script>location='checkout.php';</script>";
           }else{
           echo "<script>alert('Anda Sukses login diarahkan ke index');</script>";
           echo "<script>location='index.php';</script>";

           }
        }
      else{
        echo "<script>alert('Anda Gagal Login');</script>";
           echo "<script>location='login.php';</script>";
      }
      }



     ?>


    <!-- end keranjang belanja -->

    <!-- footer -->
    <!-- <?php //include"footer.php"; ?> -->
    

    <!-- end footer -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="admin/assets/js/bootstrap.min.js"></script>
  </body>
</html>