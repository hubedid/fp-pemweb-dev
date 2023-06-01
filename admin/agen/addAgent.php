<?php
$status = "";
if (isset($_POST['nama'])) {
  $ext  = array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
  $tipe = $_FILES['gambar']['type'];
  $size = $_FILES['gambar']['size'];
  if (is_uploaded_file($_FILES['gambar']['tmp_name'])) { //cek apakah ada file yang di upload
    if (!in_array(($tipe), $ext)) { //cek ekstensi file
      echo '<script type="text/javascript">alert("Format gambar tidak diperbolehkan!");window.history.go(-1)</script>';
    } else if ($size > 2097152) {
      echo '<script type="text/javascript">alert("Ukuran gambar terlalu besar!");window.history.go(-1);</script>';
    } else {
      $extractFile = pathinfo($_FILES['gambar']['name']);
      $dir         = "../image/";
      $newName = microtime() . '.' . $extractFile['extension'];
      //pindahkan file yang di upload ke directory tujuan
      if (move_uploaded_file($_FILES['gambar']['tmp_name'], $dir . $newName)) {
        $queryInsert = "INSERT INTO agen (nama, jenis_kelamin, email, umur, alamat, no_telp, gambar) VALUES ('" . $_POST['nama'] . "','" . $_POST['jenis_kelamin'] . "','" . $_POST['email'] . "','" . $_POST['umur'] . "','" . $_POST['alamat'] . "','" . $_POST['no_telp'] . "','" . $newName . "')";
        $resultInsert = mysqli_query(connection(), $queryInsert);
        if ($resultInsert) {
          $status = "ok";
        } else {
          $status = "err";
        }
      } else {
        // echo '<script type="text/javascript">alert("Foto gagal diupload");window.history.go(-1);</script>';
      }
    }
  } else {
    echo '<script type="text/javascript">alert("Tidak ada foto yang dipilih");window.history.go(-1);</script>';
  }
}
?>
<div class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center">
  <h2>Welcome To Your Agent Menu</h2>
</div>
<h1 class="heading-1 mt-3 mb-3 fw-bolder">Tambah Agen</h1>

<!-- Alert insert -->
<?php
if ($status == "ok") {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Berhasil!</strong> Menyimpan data agen.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
if ($status == "err") {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Gagal!</strong> Menyimpan data agen.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

?>

<!-- Form -->
<form class="form p-4 needs-validation" action="" method="POST" novalidate enctype="multipart/form-data">
  <div class="mb-3">
    <label for="#" class="form-label">Nama Agen</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="name" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a name agen.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">Jenis Kelamin</label>
    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
      <option selected disabled value="">Choose...</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please select a valid sex.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a email.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">Umur</label>
    <input type="text" class="form-control" id="umur" name="umur" placeholder="age" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a age.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="addres" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a addres.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">No Telepon</label>
    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="phone number" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a phone number.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">Foto</label>
    <input type="file" class="form-control" aria-label="file example" name="gambar" required />
    <div class="invalid-feedback">
      Example invalid form file feedback
    </div>
  </div>

  <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
</form>
<!-- Akhir form -->