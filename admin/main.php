<div class="welcome-box bg-primary p-4 rounded-2">
  <h2>Hii, Admin</h2>
  <h2>Welcome To Your Dashboard</h2>
</div>
<div class="grid-boxs mt-5">
  <div class="grid-1 grid-box rounded-2 p-3">
    <div class="bg-icon">
      <i class="fa-solid fa-building-circle-check"></i>
    </div>
    <?php 
      $dataProperty = mysqli_query(connection(), "SELECT * FROM properti");
      $countProperty = mysqli_num_rows($dataProperty);
    ?>
    <h1 class="text-center"><?= $countProperty ?></h1>
    <h6 class="text-center">Data property</h6>
  </div>
  <div class="grid-2 grid-box rounded-2 p-3">
    <div class="bg-icon">
      <i class="fa-solid fa-user"></i>
    </div>
    <?php 
      $dataAgen = mysqli_query(connection(), "SELECT * FROM agen");
      $countAgen = mysqli_num_rows($dataAgen);
    ?>
    <h1 class="text-center"><?= $countAgen ?></h1>
    <h6 class="text-center">Data agen</h6>
  </div>
  <div class="grid-3 grid-box rounded-2 p-3">
    <div class="bg-icon">
      <i class="fa-solid fa-cart-shopping"></i>
    </div>
    <?php 
      $dataPenjualan = mysqli_query(connection(), "SELECT * FROM penjualan");
      $countPenjualan = mysqli_num_rows($dataPenjualan);
    ?>
    <h1 class="text-center"><?= $countPenjualan ?></h1>
    <h6 class="text-center">Data penjualan</h6>
  </div>
  <div class="grid-4 grid-box rounded-2 p-3">
    <div class="bg-icon">
      <i class="fa-solid fa-user-gear"></i>
    </div>
    <?php 
      $dataAdmin = mysqli_query(connection(), "SELECT * FROM admin");
      $countAdmin = mysqli_num_rows($dataAdmin);
    ?>
    <h1 class="text-center"><?= $countAdmin ?></h1>
    <h6 class="text-center">Data admin</h6>
  </div>
</div>