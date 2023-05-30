<?php
$statusUpdate = "";
$queryShow = mysqli_query(connection(), "SELECT * FROM agen WHERE id_agent = '$_GET[kode]'");
$resultShow = mysqli_fetch_array($queryShow);

if (isset($_POST['kirim'])) {
  $queryUpdate = "UPDATE agen SET 
  nama = '$_POST[nama]',
  jenis_kelamin = '$_POST[jenis_kelamin]',
  umur = '$_POST[umur]', 
  alamat = '$_POST[alamat]', 
  no_telp = '$_POST[no_telp]', 
  email = '$_POST[email]' WHERE id_agent='$_GET[kode]'";
  $resultUpdate = mysqli_query(connection(), $queryUpdate);
  if ($resultUpdate) {
    $statusUpdate = "ok";
  } else {
    $statusUpdate = "err";
  }
  // header('Location: showAgent.php?statusDelete=' . $statusUpdate);
  header('Location: ?page=showAgent&statusUpdate=' . $statusUpdate);
}

?>
<div class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center">
  <h2>Welcome To Your Agent Menu</h2>
</div>
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Ubah Agen</h1>

<!-- Form -->
<form class="form p-4 needs-validation" action="" method="POST" novalidate enctype="multipart/form-data">
  <div class="mb-3">
    <label for="#" class="form-label">Nama Agen</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="name" value="<?php echo $resultShow['nama']; ?>" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a name agen.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">Jenis Kelamin</label>
    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
      <option selected><?php echo $resultShow['jenis_kelamin']; ?></option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please select a valid sex.</div>
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
    <label for="#" class="form-label">Alamat</label>
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