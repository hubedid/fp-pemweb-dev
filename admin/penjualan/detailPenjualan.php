<?php
include "../../database/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Penjualan</title>

  <!-- Logo -->
  <link rel="icon" href="../image/logoatas.png" type="image/x-icon" />

  <!-- Bootrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

  <!-- CSS -->
  <link rel="stylesheet" href="../../css/admin.css" />
</head>

<body>
  <div class="container">
    <div class="header-name">
      <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left"></i></a>
      <h2>Detail Penjualan</h2>
    </div>
    <div class="container-detail">
      <table class="table">
        <tbody>
          <?php
          $id_penjualan = $_GET["id_penjualan"];
          $queryDataPenjualan = "SELECT * FROM penjualan WHERE id_penjualan = $id_penjualan";
          $resultDataPenjualan = mysqli_query(connection(), $queryDataPenjualan);
          $dataDataPenjualan = mysqli_fetch_array($resultDataPenjualan)
          ?>
          <tr>
            <th>Id Penjualan</th>
            <td><?= $dataDataPenjualan['id_penjualan'] ?></td>
          </tr>
          <tr>
            <th>Id Properti</th>
            <td><?= $dataDataPenjualan['id_properti'] ?></td>
          </tr>
          <tr>
            <th>Id Agen</th>
            <td><?= $dataDataPenjualan['id_agen'] ?></td>
          </tr>
          <tr>
            <th>Nama</th>
            <td><?= $dataDataPenjualan['nama'] ?></td>
          </tr>
          <tr>
            <th>Nik</th>
            <td><?= $dataDataPenjualan['nik'] ?></td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td><?= $dataDataPenjualan['alamat'] ?></td>
          </tr>
          <tr>
            <th>No Telepon</th>
            <td><?= $dataDataPenjualan['no_telp'] ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?= $dataDataPenjualan['email'] ?></td>
          </tr>
          <tr>
            <th>Tanggal Pesan</th>
            <td><?= $dataDataPenjualan['tgl_pesan'] ?></td>
          </tr>
          <tr>
            <th>Tanggal Selesai</th>
            <td><?= $dataDataPenjualan['tgl_selesai'] ?></td>
          </tr>
          <tr>
            <th>Jumlah Dp</th>
            <td><?= $dataDataPenjualan['jumlah_dp'] ?></td>
          </tr>
          <tr>
            <th>Sisa bayar</th>
            <td><?= $dataDataPenjualan['sisa_bayar'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Fontawsome -->
  <script src="https://kit.fontawesome.com/ee9e0f07f2.js" crossorigin="anonymous"></script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>