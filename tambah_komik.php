<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZILMANHWA</title>
  <style type="text/css">
    * {
      font-family: "Trebuchet MS";
    }

    h1 {
      text-transform: uppercase;
      color: #e35e37;
    }

    .base {
      width: 400px;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background-color: #85cdb6;
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
      background-color: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #e35e37;
    }

    button {
      background-color: #e35e37;
      color: #fff;
      padding: 10px;
      font-size: 12px;
      border: 0;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <center><h1>Add Comic</h1></center>
  <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
    <section class="base">
      <div>
        <label>Genre</label>
        <input type="text" name="genre" autofocus="" required="" />
      </div>
      <div>
        <label>Manhwa Name</label>
        <input type="text" name="nama_komik" required="" />
      </div>
      <div>
        <label>Cover</label>
        <input type="file" name="cover" required="" />
      </div>
      <div>
        <label>Synopsis</label>
        <input type="text" name="sinopsis" />
      </div>
      <div>
        <button type="submit">Save</button>
      </div>
    </section>
  </form>
</body>
</html>