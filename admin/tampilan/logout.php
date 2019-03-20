<?php 

unset($_SESSION['id_admin']);
unset($_SESSION['email']);
unset($_SESSION['nm_lengkap']);
session_destroy(); //menghancurkan sesi
// echo "<script>location='index.php';</script>";
echo "<script>alert('anda telah logout');</script>";
header('location:index.php'); //mendirect ke index.php
?>