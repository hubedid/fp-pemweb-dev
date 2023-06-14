<?php
$statusDelete = ""; //digunakan untuk menyimpan status berhasil atau tidaknya dalam menghapus data agen (ok/err)
if (isset($_GET['kode'])) { //pengecekan kode untuk agen yg akan dihapus
  $queryDeletePenjualan = "DELETE FROM penjualan WHERE id_agen = '$_GET[kode]'"; // menghapus data penjualan
  $resultDeletePenjualan = mysqli_query(connection(), $queryDeletePenjualan);
  if ($resultDeletePenjualan) { /
    $querySearchProperty = "SELECT * FROM properti WHERE id_agen = '$_GET[kode]'"; // mencari data properti yg terkait dg agen
    $resultSearchProperty = mysqli_query(connection(), $querySearchProperty);
    while ($dataSearchProperty = mysqli_fetch_array($resultSearchProperty)) {
      $queryDeleteGambar = "DELETE FROM gambar_properti WHERE id_properti = '$dataSearchProperty[id_properti]'"; // menghapus data gambar 
      $resultDeleteGambar = mysqli_query(connection(), $queryDeleteGambar);
    }
    $queryDeleteProperty = "DELETE FROM properti WHERE id_agen = '$_GET[kode]'"; // menghapus data yg terkait dengan agen dari tabel properti
    $resultDeleteProperty = mysqli_query(connection(), $queryDeleteProperty);
    if ($resultDeleteProperty) {
      $queryDelete = "DELETE FROM agen WHERE id_agent = '$_GET[kode]'"; //menghapus data agen dari tabel agen
      $resultDelete = mysqli_query(connection(), $queryDelete);
      if ($resultDelete) { //jika operasi berhasil, status=ok
        $statusDelete = "ok";
      } else {
        $statusDelete = "err"; //jika operasi berhasil, status=error
      }
    }
  }
}
?>
<!-- Header  -->
<div class="welcome-box welcome-box-search">
  <h2>Welcome To Your Agent Menu</h2>
  
  <form action="" method="GET" class="search-form" role="search"> <!-- form pencarian data agen  -->
    <input name="page" type="hidden" value="showAgent" /> 
    <!-- input teks untuk keyword  --> 
    <input class="form-input" name="search" type="search" placeholder="Search" <?= isset($_GET['search']) ? 'value="' . $_GET['search'] . '"' : '' ?> aria-label="Search" />
    <button class="button search-button" type="submit"> <!-- tombol Pencarian -->
      Search
    </button>
    <?= isset($_GET['search']) ? '<a class="button search-button"  href="?page=showAgent">Reset</a>' : '' ?>  <!-- search untuk menanmpilkan data sesuai keywoard; reset untuk mengembalikan page seperti awal   -->
  </form>
</div>
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Data Agen</h1>


<?php
// Alert delete
if ($statusDelete == "ok") { //popup yg muncul saat operasi berhasil(ok)
  echo '<div class="alert alert-success">
            <p><strong>Berhasil!</strong> Menghapus data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
} else if ($statusDelete == "err") { //popup yg muncul saar operasi gagal (error)
  echo '<div class="alert alert-danger">
            <p><strong>Gagal!</strong> Menghapus data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
}

// Alert update
if (@$_GET["statusUpdate"] !== NULL) {
  $statusUpdate = $_GET["statusUpdate"];
  if ($statusUpdate == "ok") { //pop yg muncul saar operasi berhasil (ok)
    echo '<div class="alert alert-success"> 
            <p><strong>Berhasil!</strong> Mengubah data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
  } else { //pop yg muncul saar operasi gagal (error)
    echo '<div class="alert alert-danger">
            <p><strong>Gagal!</strong> Mengubah data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
  }
}
?>

<table class="table">
  <thead> <!--header tabel-->
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Id Agen</th>
      <th scope="col">Nama Agen</th>
      <th scope="col">Umur</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Alamat</th>
      <th scope="col">Email</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody id="table-body">
    <?php
    $queryDataAgen = "SELECT * FROM agen"; // mengambil  data dari tabel agen.
    if (isset($_GET['search'])) { //mencari data agen berdasarkan keywoard
      $search = mysqli_real_escape_string(connection(), $_GET['search']);
      $queryDataAgen = "select * from agen where nama like '%$search%' or email like '%$search%' or no_telp like '%$search%' or alamat like '%$search%' or umur like '%$search%' or jenis_kelamin like '%$search%' or id_agent like '%$search%'";
    }
    //mendapatkan hasil data agen dari db 
    $resultDataAgen = mysqli_query(connection(), $queryDataAgen);
    $no = 1;
    while ($dataDataAgen = mysqli_fetch_array($resultDataAgen)) { //mengambil setiap baris data agen
    ?>
      <tr> <!--kolom menampilkan data agen-->
        <td><?= $no; ?></td>
        <td><?= $dataDataAgen['id_agent'] ?></td>
        <td><?= $dataDataAgen['nama'] ?></td>
        <td><?= $dataDataAgen['umur'] ?></td>
        <td><?= $dataDataAgen['jenis_kelamin'] ?></td>
        <td><?= $dataDataAgen['alamat'] ?></td>
        <td><?= $dataDataAgen['email'] ?></td>
        <td><?= $dataDataAgen['no_telp'] ?></td>
        <td>
          <img src="../image/<?= $dataDataAgen['gambar'] ?>" alt="" style="width: 8rem" /> <!--menampilkan gambar dari data agen-->
        </td>
        <td class="action" style="width: 5.5rem;">
          <a href="?page=updateAgent&kode=<?= $dataDataAgen['id_agent']; ?>"><i class="fa-solid fa-pen"></i></a> <!--untuk mengupdate(edit) dan menghapus data agen-->
          <a href="?page=showAgent&kode=<?= $dataDataAgen['id_agent']; ?>" onclick="return confirm('Menghapus properti akan menghapus data properti dan penjualan dengan agen yang berkaitan. Apakah anda yakin?');"><i class="fa-solid fa-trash"></i></a>
        </td>
      </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>
