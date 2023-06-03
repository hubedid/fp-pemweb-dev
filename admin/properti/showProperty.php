<?php
if(isset($_GET['kode'])){
  $queryDeletePenjualan = "DELETE FROM penjualan WHERE id_properti = '$_GET[kode]'";
  $resultDeletePenjualan = mysqli_query(connection(),$queryDeletePenjualan);
  if($resultDeletePenjualan){
    $queryDeleteGambar = "DELETE FROM gambar_properti WHERE id_properti = '$_GET[kode]'";
    $resultDeleteGambar = mysqli_query(connection(),$queryDeleteGambar);
    if($resultDeleteGambar){
      $queryDeleteProperty = "DELETE FROM properti WHERE id_properti = '$_GET[kode]'";
      $resultDeleteProperty = mysqli_query(connection(),$queryDeleteProperty);
      if($resultDeleteProperty){
        echo "<script>alert('Data berhasil dihapus!')</script>";
        echo "<script>location='?page=showProperty'</script>";
      }
    }
  }
}
?>
<div class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center">
  <h2>Welcome To Your Property Menu</h2>
  <form action="" method="GET" class="d-flex mt-2 mb-2" role="search">
    <input name="page" type="hidden" value="showProperty" />
    <input class="form-control me-2" name="search" type="search" placeholder="Search" <?= isset($_GET['search']) ? 'value="' . $_GET['search'] . '"' : '' ?> aria-label="Search" />
    <button class="btn btn-outline-light" type="submit">
      Search
    </button>
    <?= isset($_GET['search']) ? '<a class="btn btn-outline-info ms-2"  href="?page=showProperty">Reset</a>' : '' ?>
  </form>
</div>
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Data Properti</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Id Properti</th>
      <th scope="col">Nama Properti</th>
      <th scope="col">Tipe Properti</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kota</th>
      <th scope="col">Provinsi</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody id="table-body">
    <?php
    $queryShowProperty = "SELECT * FROM properti";
    if (isset($_GET['search'])) {
      $search = mysqli_real_escape_string(connection(), $_GET['search']);
      $queryShowProperty = "SELECT * FROM properti WHERE nama_properti LIKE '%$search%' OR tipe_properti LIKE '%$search%' OR alamat LIKE '%$search%' OR kota LIKE '%$search%' OR provinsi LIKE '%$search%' OR status LIKE '%$search%'";
    }
    $resultShowProperty = mysqli_query(connection(), $queryShowProperty);
    $no = 1;
    while ($dataShowProperty = mysqli_fetch_array($resultShowProperty)) {
    ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $dataShowProperty['id_properti'] ?></td>
        <td><?= $dataShowProperty['nama_properti'] ?></td>
        <td><?= $dataShowProperty['tipe_properti'] ?></td>
        <td><?= $dataShowProperty['alamat'] ?></td>
        <td><?= $dataShowProperty['kota'] ?></td>
        <td><?= $dataShowProperty['provinsi'] ?></td>
        <td><?= $dataShowProperty['status'] ?></td>
        <td class="d-flex gap-1">
          <a href="?page=detailProperty&id_properti=<?php echo $dataShowProperty["id_properti"]; ?>"><i class="fa-solid fa-circle-info"></i></a>
          <a href="?page=updateProperty&kode=<?= $dataShowProperty['id_properti']; ?> "><i class="fa-solid fa-pen"></i></a>
          <a href="?page=showProperty&kode=<?= $dataShowProperty['id_properti']; ?>" onclick="return confirm('Menghapus properti akan menghapus data penjualan dengan properti yang berkaitan. Apakah anda yakin?');"><i class="fa-solid fa-trash"></i></a>
        </td>
      </tr>
    <?php
      $no++;
    } ?>
  </tbody>
</table>