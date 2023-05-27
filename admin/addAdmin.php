<?php
if (isset($_POST['username'])) {
  $query = "INSERT INTO admin (username, password) VALUES ('" . $_POST['username'] . "', '" . password_hash($_POST['password'], PASSWORD_BCRYPT) . "')";
  $result = mysqli_query(connection(), $query);
  if ($result) {
    echo '<h1>berhasil</h1>';
  } else {
    echo '<h1>gagal</h1>';
  }
}
if ($_GET['aksi'] == 'hapus' && $_GET['kode']) {
  mysqli_query(connection(), "DELETE FROM admin WHERE username = '$_GET[kode]'");
}
?>
<div class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center">
  <h2>Welcome To Your Admin Menu</h2>
  <form action="" method="GET" class="d-flex mt-2 mb-2" role="search">
    <input name="page" type="hidden" value="showSale" />
    <input class="form-control me-2" name="search" type="search" placeholder="Search" <?= isset($_GET['search']) ? 'value="' . $_GET['search'] . '"' : '' ?> aria-label="Search" />
    <button class="btn btn-outline-light" type="submit">
      Search
    </button>
    <?= isset($_GET['search']) ? '<a class="btn btn-outline-dark"  href="?page=showSale">Reset</a>' : '' ?>
  </form>
</div>

<!-- Form -->
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Tambah Admin</h1>
<form class="form p-4 needs-validation" action="" method="POST" novalidate>
  <div class="mb-3">
    <label for="#" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="username" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a username.</div>
  </div>
  <div class="mb-3">
    <label for="#" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="password" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a password.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- Akhir form -->

<!-- Tampil data -->
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Data Admin</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <!-- <th scope="col">Foto</th> -->
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody id="table-body">

    <?php
    $queryDataAdmin = "SELECT * FROM admin";
    $resultDataAdmin = mysqli_query(connection(), $queryDataAdmin);
    while ($dataDataAdmin = mysqli_fetch_array($resultDataAdmin)) {
    ?>
      <tr>
        <td><?= $dataDataAdmin['id_admin'] ?></td>
        <td><?= $dataDataAdmin['username'] ?></td>
        <td><?= $dataDataAdmin['password'] ?></td>
        <!-- <td>
          <img src="../image/agent1.jpg" alt="" style="width: 8rem" />
        </td> -->
        <td class="d-flex gap-1">
          <a href="?page=addAdmin&kode=<?= $dataDataAdmin['username']; ?>&aksi=hapus" onclick="return confirm('Apakah anda yakin?')" ;><i class="fa-solid fa-trash"></i></a>
        </td>
      </tr>
    <?php
    } ?>
  </tbody>
</table>
<!-- Akhir tampil data -->