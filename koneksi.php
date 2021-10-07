<?php 
  $host     = "localhost";
  $user     = "root";
  $pass     = "";
  $db       = "komik";
  $koneksi  = mysqli_connect($host,$user,$pass,$db);

  if(!$koneksi) {
    die("Database connection failed!: ".mysqli_connect_error());
  }
?>