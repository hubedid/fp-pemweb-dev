<?php 
include('../database/connection.php'); 
?>
<div
  class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center"
>
  <h2>Welcome To Your Agent Menu</h2>
  <form action="" method="GET" class="d-flex mt-2 mb-2" role="search">
    <input 
      name="page"
      type="hidden"
      value="showAgent"
    />
    <input
      class="form-control me-2"
      name="search"
      type="search"
      placeholder="Search"
      <?= isset($_GET['search']) ? 'value="'.$_GET['search'].'"' : '' ?>
      aria-label="Search"
    />
    <button class="btn btn-outline-light" type="submit">
      Search
    </button>
    <?= isset($_GET['search']) ? '<a class="btn btn-outline-dark"  href="?page=showAgent">Reset</a>' : '' ?>
  </form>
</div>
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Data Agen</h1>
<table class="table">
  <thead>
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
      $queryDataAgen = "select * from agen";
      if(isset($_GET['search'])){
        $search = mysqli_real_escape_string(connection(), $_GET['search']);
        $queryDataAgen = "select * from agen where nama like '%$search%' or email like '%$search%' or no_telp like '%$search%' or alamat like '%$search%' or umur like '%$search%'";
      }
      $resultDataAgen = mysqli_query(connection(),$queryDataAgen);
      $no = 1;
      while($dataDataAgen = mysqli_fetch_array($resultDataAgen)){
    ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $dataDataAgen['id_agen'] ?></td>
      <td><?= $dataDataAgen['nama'] ?></td>
      <td><?= $dataDataAgen['umur'] ?></td>
      <td><?= $dataDataAgen['jenis_kelamin'] ?></td>
      <td><?= $dataDataAgen['alamat'] ?></td>
      <td><?= $dataDataAgen['email'] ?></td>
      <td><?= $dataDataAgen['no_telp'] ?></td>
      <td>
        <img src="../image/<?= $dataDataAgen['gambar'] ?>" alt="" style="width: 8rem" />
      </td>
      <td class="d-flex gap-1">
        <a href="?page=updateAgent&kode=<?= $dataDataAgen['id_agen']; ?>"><i class="fa-solid fa-pen"></i></a>
        <a href="?page=showAgent&aksi=hapus&kode=<?= $dataDataAgen['id_agen']; ?>" onclick="return confirm('Apakah anda yakin?');"
          ><i class="fa-solid fa-trash"></i
        ></a>
      </td>
    </tr>
    <?php $no++; } ?>
  </tbody>
</table>
<?php
if($_GET['aksi']=='hapus'&&$_GET['kode']){
  mysqli_query(connection(), "DELETE FROM agen WHERE id_agen = '$_GET[kode]'");
}
?>
