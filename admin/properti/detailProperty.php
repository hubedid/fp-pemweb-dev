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
            <h2>Detail Properti</h2>
        </div>
        <div class="container-detail">
            <table class="table">
                <tbody>
                    <?php
                    $id_properti = $_GET["id_properti"];
                    $queryShowProperty = "SELECT * FROM properti WHERE id_properti = $id_properti";
                    $resultShowProperty = mysqli_query(connection(), $queryShowProperty);
                    $dataShowProperty = mysqli_fetch_array($resultShowProperty);
                    ?>
                    <tr>
                        <th>Id Properti</th>
                        <td><?= $dataShowProperty['id_properti'] ?></td>
                    </tr>
                    <tr>
                        <th>Id Agen</th>
                        <td><?= $dataShowProperty['id_agen'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Properti</th>
                        <td><?= $dataShowProperty['nama_properti'] ?></td>
                    </tr>
                    <tr>
                        <th>Tipe Properti</th>
                        <td><?= $dataShowProperty['tipe_properti'] ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td><?= $dataShowProperty['deskripsi'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $dataShowProperty['alamat'] ?></td>
                    </tr>
                    <tr>
                        <th>Kota</th>
                        <td><?= $dataShowProperty['kota'] ?></td>
                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <td><?= $dataShowProperty['provinsi'] ?></td>
                    </tr>
                    <tr>
                        <th>Luas Bangunan</th>
                        <td><?= $dataShowProperty['luas_bangunan'] ?></td>
                    </tr>
                    <tr>
                        <th>Kamar Tidur</th>
                        <td><?= $dataShowProperty['kamar_tidur'] ?></td>
                    </tr>
                    <tr>
                        <th>Kamar mandi</th>
                        <td><?= $dataShowProperty['kamar_mandi'] ?></td>
                    </tr>
                    <tr>
                        <th>Dapur</th>
                        <td><?= $dataShowProperty['dapur'] ?></td>
                    </tr>
                    <tr>
                        <th>Ruang Keluarga</th>
                        <td><?= $dataShowProperty['ruang_keluarga'] ?></td>
                    </tr>
                    <tr>
                        <th>Balkon</th>
                        <td><?= $dataShowProperty['balkon'] ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td><?= $dataShowProperty['harga'] ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= $dataShowProperty['status'] ?></td>
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