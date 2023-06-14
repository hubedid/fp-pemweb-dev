<?php
$status = ""; //digunakan untuk menyimpan status berhasil atau tidaknya dalam menyimpan data agen (ok/err)
if (isset($_POST['nama'])) { //pengecekan apakah sudah mengisi form sebelumnya
  $ext  = array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png'); // daftar ekstensi file yang diperbolehkan
  $tipe = $_FILES['gambar']['type'];//menyimpan informasi type file gambar yang diunggah
  $size = $_FILES['gambar']['size'];//menyimpan informasi ukuran file gambar yang diunggah
  if (is_uploaded_file($_FILES['gambar']['tmp_name'])) { //cek apakah ada file yang di upload
    if (!in_array(($tipe), $ext)) { //Pengecekan ekstensi file
      echo '<script type="text/javascript">alert("Format gambar tidak diperbolehkan!");window.history.go(-1)</script>'; 
    } else if ($size > 2097152) { //pengecekan ukuran file
      echo '<script type="text/javascript">alert("Ukuran gambar terlalu besar!");window.history.go(-1);</script>'; 
    } else { //jika berhasil melalui pengecekan
      $extractFile = pathinfo($_FILES['gambar']['name']); //Mengambil informasi path dan nama file
      $dir         = "../image/"; //Menentukan direktori
      $newName = microtime() . '.' . $extractFile['extension']; // deklarasi nama baru =  timestamp dan ekstensi file
      //memindahkan file yang di upload ke directory tujuan
      if (move_uploaded_file($_FILES['gambar']['tmp_name'], $dir . $newName)) {
        $queryInsert = "INSERT INTO agen (nama, jenis_kelamin, email, umur, alamat, no_telp, gambar) VALUES ('" . $_POST['nama'] . "','" . $_POST['jenis_kelamin'] . "','" . $_POST['email'] . "','" . $_POST['umur'] . "','" . $_POST['alamat'] . "','" . $_POST['no_telp'] . "','" . $newName . "')";
        $resultInsert = mysqli_query(connection(), $queryInsert);
        if ($resultInsert) { //jika penyimpanan data berhasil
          $status = "ok";
        } else {
          $status = "err"; //jika penyimpanan data gagal
        }
      } else {
        echo '<script type="text/javascript">alert("Foto gagal diupload");window.history.go(-1);</script>';
      }
    }
  } else {
    echo '<script type="text/javascript">alert("Tidak ada foto yang dipilih");window.history.go(-1);</script>';
  }
}
//header
?>
<div class="welcome-box"> 
  <h2>Welcome To Your Agent Menu</h2>
</div>
<h1 class="heading-1">Tambah Agen</h1>

<!-- Alert insert -->
<?php
if ($status == "ok") {  //popup yg muncul saat operasi berhasil (ok)
  echo '<div class="alert alert-success">
            <p><strong>Berhasil!</strong> Menyimpan data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
}
if ($status == "err") { //popup yg muncul saat operasi gagal (error)
  echo '<div class="alert alert-danger">
            <p><strong>Gagal!</strong> Menyimpan data agen.</p>
            <button type="button" onclick="closeAlert(this)" class="btn-close">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>';
}

?>

<!-- Form tambah agen-->
<form class="form" action="" method="POST" novalidate enctype="multipart/form-data"> <!--data dikirim dg method post & dpt menerima file-->
  <div>
    <label for="#" class="form-label">Nama Agen</label> <!-- input field untuk nama agen -->
    <input type="text" class="form-control" id="nama" name="nama" placeholder="name" required />
  </div>

  <div>
    <label for="#" class="form-label">Jenis Kelamin</label> <!-- input field untukjenis kelamin  -->
    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
      <option selected disabled value="">Choose...</option> <!--  opsi jenis kelamin  -->
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
  </div>

  <div>
    <label for="#" class="form-label">Email</label>  <!-- input field untuk email  -->
    <input type="email" class="form-control" id="email" name="email" placeholder="email" required />
  </div>

  <div>
    <label for="#" class="form-label">Umur</label> <!-- input field untuk umur  -->
    <input type="text" class="form-control" id="umur" name="umur" placeholder="age" required />
  </div>

  <div>
    <label for="#" class="form-label">alamat</label> <!-- input field untuk alamat  -->
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="addres" required />
  </div>

  <div>
    <label for="#" class="form-label">No Telepon</label> <!-- input field untuk no tlp  -->
    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="phone number" required />
  </div>

  <div>
    <label for="#" class="form-label">Foto</label> <!-- input field untuk foto (berupa file)  -->
    <input type="file" class="form-control-file" aria-label="file example" name="gambar" required />
  </div>

  <button type="submit" class="button button-submit" name="kirim">Submit</button>  <!-- tombol submit  -->
</form>
<!-- Akhir form -->
