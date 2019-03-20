<?php 

// error_reporting(0);
include 'pengaturan/koneksi.php';
include "pengaturan/fungsi.php";

session_start();

 if (isset($_SESSION["pelanggan"])) {
 $id_pelanggan=$_SESSION["pelanggan"]['id_pelanggan'];
 }else{
  $id_pelanggan="";
 }

if (isset($_GET['id'])) {
  $id=$_GET['id'];
}else{
  $id="";
}

if ($_GET['tampilan']='kategori' and (isset($_GET['id'])) and (isset($_GET['ket'])) ) {
  // echo "<script>alert('ok');</script>";
  $where="WHERE id_kategori='$id'";
}else{
  $where="";
}

// WHERE `nm_produk` LIKE '%adidas%'
if (isset($_POST['cari']) And isset($_POST['search'])) {
  $cari=$_POST['cari'];
  $where="WHERE `nm_produk` LIKE '%".$cari."%'";
}else{
  $where="";
}

$data=mysqli_query($koneksi,"SELECT *FROM keranjang WHERE id_pelanggan='$id_pelanggan'");
$jmlkeranjang=mysqli_num_rows($data);
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
  <body>

    <!-- Navbar -->
    <?php include "tampilan/navbar.php"; ?>
    <!-- akhir Navbar -->
  
    <!-- isi -->
    <?php 
    if (isset($_GET['halaman']))
                        {
                            if ($_GET['halaman']=="detail") {
                                include 'tampilan/detailproduk.php';
                            }
                            elseif ($_GET['halaman']=="keranjang") {
                                include "tampilan/keranjang.php";
                            }
                            elseif ($_GET['halaman']=="tagihan") {
                                include 'tampilan/tagihan.php';  
                            }
                            elseif ($_GET['halaman']=="checkout"){
                                include 'tampilan/checkout.php';
                            }
                            elseif ($_GET['halaman']=="konfirmasi"){
                                include 'tampilan/konfirmasi.php';
                            }
                            elseif ($_GET['halaman']=="cekongkir"){
                                include 'tampilan/cekongkir.php';
                            }
                            elseif ($_GET['halaman']=="hapusproduk"){
                                include 'tampilan/hapusproduk.php';
                            }
                        elseif ($_GET['halaman']=="hapuskonfirmasi"){
                                include 'tampilan/hapuskonfirmasi.php';
                            }
                            elseif($_GET['halaman']=="tagihan"){
                                include "tampilan/tagihan.php";
                            }
                            elseif($_GET['halaman']=="nota"){
                                include "tampilan/nota.php";
                            }
                            elseif($_GET['halaman']=="about"){
                                include "tampilan/about.php";
                            }
                            elseif($_GET['halaman']=="kontak"){
                                include "tampilan/kontak.php";
                            }
                        elseif($_GET['halaman']=="logout"){
                                include "tampilan/logout.php";
                            }

                        }
                else {
                    include 'tampilan/home.php';
                    }



    ?>

    <!-- footer -->
    <?php include "tampilan/footer.php"; ?>
    

    <!-- end footer -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="admin/assets/js/bootstrap.min.js"></script>
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