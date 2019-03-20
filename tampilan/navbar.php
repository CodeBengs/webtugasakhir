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

              <li><a href="?halaman=about">About</a></li>
              <li><a href="?halaman=kontak"><span class="glyphicon glyphicon-question-sign"></span> Info</a></li>
              <!-- jika udah login -->
              <?php if (isset($_SESSION["pelanggan"])): ?>
              <li><a href="?halaman=keranjang"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge"><?php echo  $jmlkeranjang ?></span></a></li>
              <li><a href="?halaman=tagihan"><span class="glyphicon glyphicon-question-sign"></span> Konfirmasi</a></li>
              <li><a href="tampilan/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                <!-- selain itu -->
                <?php else: ?>
              <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
              <?php endif ?>
              <!-- ok -->
            </ul> 

            <form class="navbar-form navbar-right" role="search" method="POST" action="index.php">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="cari">
              </div>
              <button type="submit" name="search" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
            </form>
          </div>


      </div>
    </nav>