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

    table {
      border: 1px solid #000000;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }

    table thead th {
      background-color: #85cdb6;
      border: 1px solid #000000;
      color: #000000;
      padding: 10px;
      text-align: center;
      text-shadow: 1px 1px 1px #fff;
    }

    table tbody td {
      border: 1px solid #000000;
      color: #000000;
      padding: 10px;
    }

    a {
      background-color: #e35e37;
      color: #fff;
      padding: 10px;
      font-size: 12px;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <center><h1>Manage Comics</h1></center>
  <center><a href="tambah_komik.php">+ &nbsp; Add Comic</a></center>
  <br>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Genre</th>
        <th>Comic Name</th>
        <th>Cover</th>
        <th>Synopsis</th>
        <th>Choose</th>
      </tr>
    </thead>

    <!-- Buat script php untuk melakukan perulangan dan menampilkan tabel produk -->
    <tbody>
      <?php 
        $query = 'SELECT * FROM tb_komik ORDER BY id ASC';
        $result = mysqli_query($koneksi, $query);

        if(!$result) {
          die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        }
        $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {
      ?>

      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row['genre']; ?></td>
        <td><?php echo $row['nama_komik']; ?></td>
        <td><img style="width: 120px" img src="img/<?php echo $row['cover']; ?>"></td>
        <td><?php echo substr($row['sinopsis'],0,150); ?>...</td>
        <td>
          <a href="edit_komik.php?id=<?php echo $row['id']; ?>">Edit</a>
          <br>
          <br>
          <a href="hapus_komik.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
        </td>
      </tr>

      <?php 
        $no++;
      }
      ?>
    </tbody>
  </table>
</body>
</html>