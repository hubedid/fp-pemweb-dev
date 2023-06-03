<?php
include 'database/connection.php';
if (isset($_GET['property'])) {
  $query = "SELECT * FROM properti WHERE id_properti = '$_GET[property]'";
  $result = mysqli_query(connection(), $query);
  $data = mysqli_fetch_array($result);
} else {
  header("Location: ./");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail</title>

  <!-- Logo -->
  <link rel="icon" href="image/logoatas.png" type="image/x-icon" />

  <!-- Bootrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/app.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar-container">
    <img src="image/logo.png" alt="logo" />
    <div class="navbar-menu">
      <a href="index.php">home</a>
      <a href="aboutMe.html">about me</a>
      <a href="contact.html">contact</a>
      <a href="property.php">property</a>
      <a href="agent.php">agent</a>
    </div>
  </nav>
  <!-- Akhir navbar -->

  <!-- Detail -->
  <div class="detail-container">
    <div class="header-name">
      <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left"></i></a>
      <h2>Detail properti</h2>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <?php
        $queryGambar = "SELECT * FROM gambar_properti WHERE id_properti = '$_GET[property]'";
        $resultGambar = mysqli_query(connection(), $queryGambar);
        $no = 0;
        while ($dataGambar = mysqli_fetch_array($resultGambar)) {
        ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" <?= $no == 0 ? 'class="active" aria-current="true"' : '' ?> data-bs-slide-to="<?= $no ?>" aria-label="Slide <?= $no + 1 ?>"></button>
        <?php $no++;
        } ?>
      </div>
      <div class="carousel-inner">
        <?php
        $queryGambar2 = "SELECT * FROM gambar_properti WHERE id_properti = '$_GET[property]'";
        $resultGambar2 = mysqli_query(connection(), $queryGambar2);
        $no = 1;
        while ($dataGambar2 = mysqli_fetch_array($resultGambar2)) {
        ?>
          <div class="carousel-item <?= $no == 1 ? 'active' : '' ?>">
            <img style="max-height: 40rem" src="image/<?= $dataGambar2['gambar'] ?>" class="d-block w-100" alt="..." />
          </div>
        <?php $no++;
        } ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <p class="status-property"><?= $data['status'] ?></p>
    <div class="detail-box-1">
      <h3 class="name"><?= $data['nama_properti'] ?></h3>
      <h3 class="price">Rp <?= number_format($data['harga'], 2, ',', '.') ?></h3>
    </div>
    <div class="detail-box-2">
      <div class="detail-addres-box">
        <i class="fa-sharp fa-solid fa-location-dot"></i>
        <h5><?= $data['alamat'] ?>, <?= $data['kota'] ?>, <?= $data['provinsi'] ?></h5>
      </div>
      <p>Price</p>
    </div>
    <div class="detail-box-3">
      <div class="detail-boxs">
        <h5><?= $data['kamar_tidur'] ?></h5>
        <h6>Bedroom</h6>
      </div>
      <div class="detail-boxs">
        <h5><?= $data['kamar_mandi'] ?></h5>
        <h6>Bathroom</h6>
      </div>
      <div class="detail-boxs">
        <h5><?= $data['balkon'] ?></h5>
        <h6>Balcony</h6>
      </div>
      <div class="detail-boxs">
        <h5><?= $data['ruang_keluarga'] ?></h5>
        <h6>Hall</h6>
      </div>
      <div class="detail-boxs">
        <h5><?= $data['dapur'] ?></h5>
        <h6>Kitchen</h6>
      </div>
    </div>
    <div class="description">
      <h3>Deskripsi</h3>
      <p><?= $data['deskripsi'] ?></p>
    </div>
    <div class="contact-agent">
      <h3>Hubungi agen</h3>
      <?php
      $queryAgen = mysqli_query(connection(), "SELECT * FROM agen WHERE id_agent = '$data[id_agen]'");
      $dataAgen = mysqli_fetch_assoc($queryAgen);
      ?>
      <div class="detail-contact-box">
        <img src="image/<?= $dataAgen['gambar'] ?>" alt="" />
        <div class="detail-contact">
          <h4><?= $dataAgen['nama'] ?></h4>
          <h5><?= $dataAgen['no_telp'] ?></h5>
          <h5><?= $dataAgen['email'] ?></h5>
          <a class="whatsapp" href="https://wa.me/<?= '62' . substr(trim($dataAgen['no_telp']), 1) ?>">
            <i class="fa-brands fa-square-whatsapp"></i>
            <p>whatsapp</p>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir detail -->

  <!-- Footer -->
  <footer class="footer-container">
    <div class="footer-boxs">
      <div class="footer-box bayview">
        <img src="image/logo.png" alt="logo" />
        <p>
          Kami mengutamakan kualitas dalam setiap aspek pekerjaan yang kami
          lakukan. Tim kami terdiri dari profesional berpengalaman yang ahli
          di bidang penjualan properti.
        </p>
      </div>
      <div class="footer-box">
        <h5>Tautan langsung</h5>
        <div class="footer-menu">
          <a href="aboutMe.html">about me</a>
          <a href="contact.html">contact</a>
          <a href="property.php">property</a>
          <a href="agent.php">agent</a>
        </div>
      </div>
      <div class="footer-box">
        <h5>Kontak</h5>
        <div class="footer-menu">
          <a href="#">Surabaya, Indonesia</a>
          <a href="#">085730130649</a>
          <a href="#">bayview@gmail.com</a>
        </div>
      </div>
    </div>
    <hr style="border-top: 2px solid white" />
    <p>&copy; 2023 Property Website - Dikembangkan Oleh bayview</p>
  </footer>
  <!-- Akhir footer -->

  <!-- Fontawsome -->
  <script src="https://kit.fontawesome.com/ee9e0f07f2.js" crossorigin="anonymous"></script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>