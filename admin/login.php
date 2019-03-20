<?php 
  // session_start();

  include "perintah/koneksi.php";
  if (isset($_POST['login']) ) 
  {

    $result = mysqli_query ($conn,"SELECT * FROM admin WHERE email = '$_POST[user]' AND password='$_POST[pass]'");
    $jumdata = mysqli_num_rows($result);
    $user = mysqli_fetch_assoc($result);

    if ($jumdata===1) {
      // $_SESSION['admin'] = mysqli_fetch_assoc($result);
    //  echo "<div class = 'alert alert-info'>login Sukses</div>";
    //  echo "<meta http-equiv='refresh' content='1;url=index2.php'>";
      $_SESSION['id_admin'] = $user['id_admin'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['nm_admin'] = $user['nm_admin'];
      $_SESSION['login'] = 1;
      
    ?>
      <script language="javascript">
        alert("Selamat datang, Saudara/i <?php echo $user['nm_admin'];?>");
        document.location="beranda.php";
      </script>

    <?php }else{ ?>
      
    
      <!-- echo "<div class = 'alert alert-danger'>login gagal</div>";
      echo "<meta http_equiv='refresh' content='1;url=index.php'>";
       -->
       <script language="javascript">
        alert("Username atau Password yang anda masukan salah, ulangi lagi?");
        history.go(-1);
      </script>
  
  <?php }  ?> 
  <?php } ?>