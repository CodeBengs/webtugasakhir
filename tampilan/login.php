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

include "../pengaturan/koneksi.php";

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
  <body style="background-image: url(../img/bgt.jpg); background-size: cover;">

    <!-- Navbar -->
    <?php include "navbar.php"; ?>
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
                                            <span class="pull-right">
                                                   <a href="#" >Lupa password ? </a> 
                                            </span>
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
           echo "<script>location='../index.php';</script>";

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
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../admin/assets/js/bootstrap.min.js"></script>
  </body>
</html>