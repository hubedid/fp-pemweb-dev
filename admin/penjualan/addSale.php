<?php
if (isset($_POST['nama'])) {
  $query = "INSERT INTO penjualan VALUES (NULL,'" . $_POST['id_properti'] . "','" . $_POST['id_agen'] . "','" . $_POST['nama'] . "','" . $_POST['nik'] . "','" . $_POST['alamat'] . "','" . $_POST['no_telp'] . "','" . $_POST['email'] . "','" . $_POST['tanggal_pesan'] . "','" . $_POST['tanggal_selesai'] . "','" . $_POST['jumlah_dp'] . "','" . $_POST['sisa_bayar'] . "')";
  $result = mysqli_query(connection(), $query);
  if ($result) {
    echo '<script type="text/javascript">alert("Berhasil")</script>';
  } else {
    echo '<script type="text/javascript">alert("Gagal")</script>';
  }
}
?>
<div class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center">
  <h2>Welcome To Your Sale Menu</h2>
  <!-- <form class="d-flex mt-2 mb-2" role="search">
    <input
      class="form-control me-2"
      type="search"
      placeholder="Search"
      aria-label="Search"
    />
    <button class="btn btn-outline-light" type="submit">
      Search
    </button>
  </form> -->
</div>
<h1 class="heading-1 mt-3 mb-5 fw-bolder">Tambah Penjualan</h1>

<!-- Form -->
<form class="form row g-3 p-4 needs-validation" action="" method="POST" novalidate enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="#" class="form-label">Id Properti</label>
    <select id="id_properti" name="id_properti" class="form-select" required>
      <option selected disabled value="">Choose...</option>
      <?php
      $queryProperty = "SELECT * FROM properti";
      $resultProperty = mysqli_query(connection(), $queryProperty);
      while ($rowProperty = mysqli_fetch_array($resultProperty)) {
        echo "<option value='$rowProperty[id_properti]'>$rowProperty[nama_properti]</option>";
      }
      ?>
    </select>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">
      Please select a valid id property.
    </div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Id Agen</label>
    <select id="id_agen" name="id_agen" class="form-select" required>
      <option selected disabled value="">Choose...</option>
      <?php
      $queryAgen = "SELECT * FROM agen";
      $resultAgen = mysqli_query(connection(), $queryAgen);
      while ($rowAgen = mysqli_fetch_array($resultAgen)) {
        echo "<option value='$rowAgen[id_agent]'>$rowAgen[nama]</option>";
      }
      ?>
    </select>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">
      Please select a valid id agent.
    </div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" required placeholder="name pembeli" />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a name.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Nik</label>
    <input type="number" class="form-control" id="nik" name="nik" required placeholder="nik pembeli" />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a nik.</div>
  </div>

  <div class="col-md-12">
    <label for="#" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="addres" />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a addres.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">No Telepon</label>
    <input type="number" class="form-control" id="no_telp" name="no_telp" required placeholder="nomor telepon" />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a phoner number.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required placeholder="province" />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a email.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Tanggal Pesan</label>
    <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" required placeholder="Luas bangunan" />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a date order.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Tanggal Selesai</label>
    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required placeholder="Luas bangunan" />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a date finish.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Jumlah Dp</label>
    <input type="number" class="form-control" id="jumlah_dp" name="jumlah_dp" required placeholder="Dp" />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a Dp.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Sisa Bayar</label>
    <input type="number" class="form-control" id="sisa_bayar" name="sisa_bayar" required placeholder="Sisa bayar" />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a remaining pay.</div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
<!-- Akhir form -->