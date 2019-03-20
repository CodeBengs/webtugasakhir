<?php
session_start();
 include "perintah/koneksi.php";?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>I-Sport Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- <link href="asset/css/dataTables.bootstrap4.css" rel="stylesheet"> -->
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- databases style -->
   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">I-Sport</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust">Logout </a> &nbsp;<span><?php echo Date('d-m-Y'); ?></span> &nbsp;</div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<!-- <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li> -->
				
					
                    <li>
                        <a  href="beranda.php"><i class="fa fa-dashboard fa-2x"></i> Home</a>
                    </li>
                    <li>
                        <a  href="beranda.php?halaman=produk"><i class="fa fa-dashboard fa-2x"></i> Produk</a>
                    </li>
                    <li>
                        <a  href="beranda.php?halaman=pelanggan"><i class="fa fa-dashboard fa-2x"></i> Pelanggan</a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-2x"></i> Transaksi <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="beranda.php?halaman=transaksi">Data Transaksi</a>
                            </li>
                            <li>
                                <a href="beranda.php?halaman=laporan">Laporan Transaksi</a>
                            </li>
                        </ul>
                      </li>  
                    <li>
                        <a  href="beranda.php?halaman=konfirmasi"><i class="fa fa-dashboard fa-2x"></i> Konfirmasi</a>
                    </li>
                    <li>
                        <a  href="beranda.php?halaman=pengirimandata"><i class="fa fa-dashboard fa-2x"></i> Pengiriman</a>
                    </li>
                   
                    
                    <!-- <li>
                        <a  href="beranda.php?halaman=komentar"><i class="fa fa-dashboard fa-2x"></i> Komentar</a>
                    </li>  -->                  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php 
                if (isset($_GET['halaman']))
                        {
                            if ($_GET['halaman']=="produk") {
                                include 'tampilan/produk.php';
                            }
                            elseif ($_GET['halaman']=="pelanggan") {
                                include "tampilan/pelanggan.php";
                            }
                            elseif ($_GET['halaman']=="balaskoem") {
                                include "tampilan/balaskoem.php";
                            }
                            elseif ($_GET['halaman']=="transaksi") {
                                include 'tampilan/transaksi.php';  
                            }
                            elseif ($_GET['halaman']=="pengirimandata"){
                                include 'tampilan/pengirimandata.php';
                            }
                            elseif ($_GET['halaman']=="konfirmasi"){
                                include 'tampilan/konfirmasi.php';
                            }
                            elseif ($_GET['halaman']=="komentar"){
                                include 'tampilan/Komentar.php';
                            }
                            elseif ($_GET['halaman']=="ubahkota"){
                                include 'tampilan/ubahkota.php';
                            }
                            elseif ($_GET['halaman']=="hapusproduk"){
                                include 'tampilan/hapusproduk.php';
                            }
                            elseif ($_GET['halaman']=="hapuskonfirmasi"){
                                include 'tampilan/hapuskonfirmasi.php';
                            }
                            elseif($_GET['halaman']=="ubahproduk"){
                                include "tampilan/ubahproduk.php";
                            }
                            elseif($_GET['halaman']=="ubahstatus"){
                                include "tampilan/ubahstatus.php";
                            }
                            elseif($_GET['halaman']=="tambahkota"){
                                include "tampilan/tambahkota.php";
                            }
                            elseif($_GET['halaman']=="tambahproduk"){
                                include "tampilan/tambahproduk.php";
                            }
                            elseif($_GET['halaman']=="laporan"){
                                include "tampilan/laporan.php";
                            }
                            elseif($_GET['halaman']=="logout"){
                                include "tampilan/logout.php";
                            }

                        }
                else {
                    include 'tampilan/home.php';
                    }


                 ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="asset/css/jquery.dataTables.js"></script>
    <script src="asset/css/dataTables.bootstrap4.js"></script>
    <script src="asset/js/sb-admin-datatables.min.js"></script></div> -->
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script> 
</body>
</html>