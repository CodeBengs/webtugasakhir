<?php 
session_start();

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
              <li><a href="tampilan/keranjang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
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
    <!-- detail produk-->
    <section class="#" id="menu">
      <div class="container">
        
      </div>         
    </section>

    <!-- end detail produk-->



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
  </body>
</html>