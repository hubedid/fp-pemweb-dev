<?php
$queryShow = mysqli_query(connection(), "SELECT * FROM agen WHERE id_agen = '$_GET[kode]'");
$resultShow = mysqli_fetch_array($queryShow);

if (isset($_POST['kirim'])) {
  $queryUpdate = "UPDATE agen SET 
  nama = '$_POST[nama]',
  umur = '$_POST[umur]', 
  alamat = '$_POST[alamat]', 
  no_telp = '$_POST[no_telp]', 
  email = '$_POST[email]' WHERE id_agen='$_GET[kode]'";
  $resultUpdate = mysqli_query(connection(), $queryUpdate);
  if ($resultUpdate) {
    echo '<script type="text/javascript">alert("Berhasil")</script>';
  } else {
    echo '<script type="text/javascript">alert("Berhasil")</script>';
  }
}

?>
<div class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center">
  <h2>Welcome To Your Agent Menu</h2>
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
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Tambah Agen</h1>

<!-- Form -->
<form class="form p-4 needs-validation" action="" method="POST" novalidate enctype="multipart/form-data">
  <div class="mb-3">
    <label for="#" class="form-label">Nama Agen</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="name" value="<?php echo $resultShow['nama']; ?>" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a name agen.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $resultShow['email']; ?>" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a email.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">Umur</label>
    <input type="text" class="form-control" id="umur" name="umur" placeholder="age" value="<?php echo $resultShow['umur']; ?>" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a age.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="addres" value="<?php echo $resultShow['alamat']; ?>" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a addres.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">No Telepon</label>
    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="phone number" value="<?php echo $resultShow['no_telp']; ?>" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a phone number.</div>
  </div>

  <!-- <div class="mb-3">
      <label for="#" class="form-label">Foto</label>
      <input
        type="file"
        class="form-control"
        aria-label="file example"
        name="gambar"
        required
      />
      <div class="invalid-feedback">
        Example invalid form file feedback
      </div>
    </div> -->

  <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
</form>
<!-- Akhir form -->