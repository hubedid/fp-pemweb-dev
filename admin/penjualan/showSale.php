
<div
  class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center"
>
  <h2>Welcome To Your Sale Menu</h2>
  <form action="" method="GET" class="d-flex mt-2 mb-2" role="search">
    <input 
      name="page"
      type="hidden"
      value="showSale"
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
    <?= isset($_GET['search']) ? '<a class="btn btn-outline-dark"  href="?page=showSale">Reset</a>' : '' ?>
  </form>
</div>
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Data Penjualan</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Properti</th>
      <th scope="col">Nama Agen</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Tanggal Pesan</th>
      <th scope="col">Tanggal Selesai</th>
      <!-- <th scope="col">Foto</th> -->
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody id="table-body">
    <?php
      $queryDataPenjualan = "SELECT * FROM penjualan";
      if(isset($_GET['search'])){
        $search = mysqli_real_escape_string(connection(), $_GET['search']);
        $queryDataPenjualan = "SELECT * FROM penjualan WHERE id_properti like '%$search%' or id_agen like '%$search%' or nama like '%$search%' or alamat like '%$search%' or no_telp like '%$search%' or tgl_pesan like '%$search%' or tgl_selesai like '%$search%'";
      }
      $resultDataPenjualan = mysqli_query(connection(),$queryDataPenjualan);
      $no = 1;
      while($dataDataPenjualan = mysqli_fetch_array($resultDataPenjualan)){
    ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $dataDataPenjualan['id_properti'] ?></td>
      <td><?= $dataDataPenjualan['id_agen'] ?></td>
      <td><?= $dataDataPenjualan['nama'] ?></td>
      <td><?= $dataDataPenjualan['alamat'] ?></td>
      <td><?= $dataDataPenjualan['no_telp'] ?></td>
      <td><?= $dataDataPenjualan['tgl_pesan'] ?></td>
      <td><?= $dataDataPenjualan['tgl_selesai'] ?></td>
      <!-- <td>
        <img src="../image/agent1.jpg" alt="" style="width: 8rem" />
      </td> -->
      <td class="d-flex gap-1">
        <i class="fa-solid fa-circle-info"></i>
        <a href="#"><i class="fa-solid fa-pen"></i></a>
        <a href="#" onclick="return confirm('Apakah anda yakin?');"
          ><i class="fa-solid fa-trash"></i
        ></a>
      </td>
    </tr>
    <?php $no++; } ?>
  </tbody>
</table>
