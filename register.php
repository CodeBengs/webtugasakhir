<?php 
session_start();

include "pengaturan/koneksi.php";

date_default_timezone_set("Asia/Jakarta");
// mencari kode barang dengan nilai paling besar
$query = mysqli_query($koneksi,"SELECT max(id_pelanggan) as maxKode FROM pelanggan");

$data = mysqli_fetch_array($query);
$koderegis = $data['maxKode'];
 
 
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($koderegis, 13, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "PLG". date('Y'). date('m'). date('d');
$koderegis = $char . sprintf("%04s", $noUrut);

print_r($koderegis);


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
  <hr>
    <!-- keranjang belanja -->
    <section class="konten" id="menu">
      <div class="container">
        <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>Register Akun</strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="register.php" method="post">
<br/>

 <div class="form-group input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"  ></i></span>
  <input type="text" class="form-control" required placeholder=""
   value="<?php echo $koderegis;?>" readonly name="id" />
</div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"  ></i></span>
                                            <input type="text" class="form-control" required placeholder="Masukan Nama Lengkap" name="nama" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"  ></i></span>
                                            <input type="text" required class="form-control" placeholder="Masukan Email " name="email" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                            <input type="text" class="form-control" required placeholder="Masukan No telepon" name="telp" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"  ></i></span>
                                            <input type="password" class="form-control" required placeholder="Masukan Password" name="pass" />
                                        </div>

                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i i class="glyphicon glyphicon-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Retype Password" name="retype" />
                                          </div>
                                     
                                     <button type="submit" class="btn btn-success" name="regis">Register</button>
                                    <hr />
                                    sudah punya akun ?  <a href="login.php" >Klik Disini</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
      </div>
    </section>
    <?php 
      if (isset($_POST["regis"])) {

         $nama = $_POST["nama"];
         $email = $_POST["email"];
         $telp = $_POST["telp"];
         $pass = $_POST["pass"];
         $retype = $_POST["retype"];
         
         $query = mysqli_query($conn,"SELECT * FROM pelanggan WHERE email ='$email'");
         $data = mysqli_num_rows($query);

         if ($data==1) {

           echo "<script>alert('E-mail Sudah Digunakan, Silahkan register kembali');</script>";
           echo "<script>location='register.php';</script>";
          
           }else{

            if ($pass == $retype) {
        
         $result = mysqli_query($conn,"INSERT INTO pelanggan(id_pelanggan,nm_pelanggan,email,telepon,password)
                                          VALUES
                              ('$koderegis', '$nama','$email','$telp','$pass')");

          echo "<script>alert('Anda Sukses Register,Silahkan Login Akun');</script>";
          echo "<script>location='login.php';</script>";
            }else{
              echo "<script>alert('Password tidak Sesuai');</script>";
            }
        }     
      }
     ?>


    <!-- end keranjang belanja -->

    <!-- footer -->
    <?php //include "footer.php"; ?>
    

    <!-- end footer -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="admin/assets/js/bootstrap.min.js"></script>
  </body>
</html>