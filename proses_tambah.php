<?php 
  include 'koneksi.php';

  $genre      = $_POST['genre'];
  $nama_komik = $_POST['nama_komik'];
  $cover      = $_FILES['cover']['name'];
  $sinopsis   = $_POST['sinopsis'];

  if($cover != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $cover);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['cover']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_cover_baru = $angka_acak.'-'.$cover;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      move_uploaded_file($file_tmp, 'img/'.$nama_cover_baru);

      $query = "INSERT INTO tb_komik (genre, nama_komik, cover, sinopsis) 
        VALUES ('$genre', '$nama_komik', '$cover', '$sinopsis')";
      $result = mysqli_query($koneksi, $query);

      if(!$result) {
        die("Query gagal dijalankan : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
      } else {
        echo "<script>alert('Data added succesfully!');window.location='index.php'</script>";
      }

    } else {
      echo "<script>alert('You can only upload png, jpg, jpeg files!');
        window.location='tambah_komik.php'</script>";
    }
  } else {
    $query = "INSERT INTO tb_komik (genre, nama_komik, cover, sinopsis) 
      VALUES ('$genre', '$nama_komik', null, '$sinopsis')";
      $result = mysqli_query($koneksi, $query);

      if(!$result) {
        die("Query gagal dijalankan : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
      } else {
        echo "<script>alert('Data added succesfully!');window.location='index.php'</script>";
      }
  }
?>