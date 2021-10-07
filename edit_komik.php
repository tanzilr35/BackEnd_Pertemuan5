<?php
include 'koneksi.php';
  
  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM tb_komik WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);
      if (!count($data)) {
        echo "<script>alert('Cannot find data record in database!');window.location='index.php';</script>";
      }
  } else {
    echo "<script>alert('Input id. data!');window.location='index.php';</script>";
  }         
?>

<!DOCTYPE html>
<html>
  <head>
    <title>ZILMANHWA</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }

      h1 {
        text-transform: uppercase;
        color: #e35e37;
      }

      button {
          background-color: #e35e37;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
      }

      label {
        margin-top: 10px;
        float: left;
        text-align: left;
        width: 100%;
      }

      input {
        padding: 6px;
        width: 100%;
        box-sizing: border-box;
        background: #f8f8f8;
        border: 2px solid #ccc;
        outline-color: #e35e37;
      }

      div {
        width: 100%;
        height: auto;
      }
      
      .base {
        width: 400px;
        height: auto;
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
        background: #85cdb6;
      }
    </style>
  </head>
  <body>
      <center>
        <h1>Manhwa Edit <?php echo $data['nama_komik']; ?></h1>
      <center>
        
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Genre</label>
          <input type="text" name="genre" autofocus="" required="" value="<?php echo $data['genre']; ?>" />
        </div>
        <div>
          <label>Manhwa Name</label>
         <input type="text" name="nama_komik" required="" value="<?php echo $data['nama_komik']; ?>" />
        </div>
        <div>
          <label>Cover</label>
          <img src="img/<?php echo $data['cover']; ?>">
          <input type="file" name="cover" />
        </div>
        <div>
          <label>Synopsis</label>
         <input type="text" name="sinopsis" value="<?php echo $data['sinopsis']; ?>" />
        </div>
        <div>
         <button type="submit">Save Changes</button>
        </div>
        </section>
      </form>
  </body>
</html>