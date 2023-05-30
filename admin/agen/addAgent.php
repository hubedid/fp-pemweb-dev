<?php
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
        $queryInsert = "INSERT INTO agen (nama, email, umur, alamat, no_telp, gambar) VALUES ('" . $_POST['nama'] . "','" . $_POST['email'] . "','" . $_POST['umur'] . "','" . $_POST['alamat'] . "','" . $_POST['no_telp'] . "','" . $newName . "')";
        $resultInsert = mysqli_query(connection(), $queryInsert);
        if ($resultInsert) {
          echo '<script type="text/javascript">alert("Berhasil")</script>';
        } else {
          echo '<script type="text/javascript">alert("Gagal")</script>';
        }
      } else {
        echo '<script type="text/javascript">alert("Foto gagal diupload");window.history.go(-1);</script>';
      }
    }
  } else {
    echo '<script type="text/javascript">alert("Tidak ada foto yang dipilih");window.history.go(-1);</script>';
  }
}
if (isset($_POST['kirim'])) {
  $query = "INSERT INTO agen (id_agen, nama, umur, jenis_kelamin, alamat, no_telp, email) VALUES (NULL, '" . $_POST['nama'] . "', '" . $_POST['umur'] . "', '" . $_POST['jenis_kelamin'] . "', '" . $_POST['alamat'] . "', '" . $_POST['no_telp'] . "', '" . $_POST['email'] . "')";
  $result = mysqli_query(connection(), $query);
  if ($result) {
    echo '<script type="text/javascript">alert("Berhasil")</script>';
  } else {
    echo '<script type="text/javascript">alert("Gagal")</script>';
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
    <input type="text" class="form-control" id="nama" name="nama" placeholder="name" required />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a name agen.</div>
  </div>

  <div class="mb-3">
    <label for="#" class="form-label">Jenis Kelamin</label>
    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
      <option selected disabled value="">Choose...</option>
      <option value="laki_laki">Laki-laki</option>
      <option value="perempuan">Perempuan</option>
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