<?php
$statusUpdate = ""; //digunakan untuk menyimpan status berhasil atau tidaknya dalam mengupdate data agen (ok/err)
$queryShow = mysqli_query(connection(), "SELECT * FROM agen WHERE id_agent = '$_GET[kode]'"); //mencari data agen sesuai id(kode)
$resultShow = mysqli_fetch_array($queryShow); //mengisi nilai default di form update data agen.

if (isset($_POST['kirim'])) { //mengupdate tabel agaen berdasarkan data yang dikirim (method post)
  $queryUpdate = "UPDATE agen SET 
  nama = '$_POST[nama]',
  jenis_kelamin = '$_POST[jenis_kelamin]',
  umur = '$_POST[umur]', 
  alamat = '$_POST[alamat]', 
  no_telp = '$_POST[no_telp]', 
  email = '$_POST[email]' WHERE id_agent='$_GET[kode]'";
  $resultUpdate = mysqli_query(connection(), $queryUpdate); //menyimpan status update
  if ($resultUpdate) { //pengecekan status update
    if (isset($_POST['currentGambar']) && is_uploaded_file($_FILES['gambar']['tmp_name'])) { //pengecekan format gambar
      $ext  = array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png'); // daftar ekstensi file yang diperbolehkan
      $tipe = $_FILES['gambar']['type'];//menyimpan informasi type file gambar yang diunggah
      $size = $_FILES['gambar']['size'];//menyimpan informasi size file gambar yang diunggah
      if (is_uploaded_file($_FILES['gambar']['tmp_name'])) { //cek apakah ada file yang di upload
        if (!in_array(($tipe), $ext)) { //Pengecekan ekstensi file
          echo '<script type="text/javascript">alert("Format gambar tidak diperbolehkan!");window.history.go(-1)</script>';
        } else if ($size > 2097152) { //Pengecekan Ukuran file
          echo '<script type="text/javascript">alert("Ukuran gambar terlalu besar!");window.history.go(-1);</script>';
        } else { //jika berhasil melalui pengecekan
          $extractFile = pathinfo($_FILES['gambar']['name']); //Mengambil informasi path dan nama file
          $dir         = "../image/";  //Menentukan direktori
          $newName = microtime() . '.' . $extractFile['extension']; // deklarasi nama baru =  timestamp dan ekstensi file
          //memindahkan file yang di upload ke directory tujuan
          if (move_uploaded_file($_FILES['gambar']['tmp_name'], $dir . $newName)) {
            unlink("../image/" . $_POST['currentGambar']);
            $queryUpdateGambar = "UPDATE agen SET gambar = '$newName' WHERE gambar = '$_POST[currentGambar]' ";
            $resultUpdateGambar = mysqli_query(connection(), $queryUpdateGambar);
            if ($resultUpdateGambar) { //Pengecekan hasil update gambar 
              $status = "ok"; //berhasil
              header('Location: ?page=showAgent&statusUpdate=' . $statusUpdate);
            } else { //gagal
              echo '<script type="text/javascript">alert("Error Query Gambar");window.history.go(-1);</script>'; /
            }
          } else {
            echo '<script type="text/javascript">alert("Foto gagal diupload");window.history.go(-1);</script>';
          }
        }
      } else {
        echo '<script type="text/javascript">alert("Tidak ada foto yang dipilih");window.history.go(-1);</script>';
      }
    }
    $statusUpdate = "ok";
  } else {
    $statusUpdate = "err";
  }
  header('Location: ?page=showAgent&statusUpdate=' . $statusUpdate);
}

//header
?>
<div class="welcome-box">
  <h2>Welcome To Your Agent Menu</h2>
</div>
<h1 class="heading-1">Ubah Agen</h1>

<!-- Form -->
<form class="form" action="" method="POST" novalidate enctype="multipart/form-data">
  <div>
    <label for="#" class="form-label">Nama Agen</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="name" value="<?php echo $resultShow['nama']; ?>" required />
  </div>

  <div>
    <label for="#" class="form-label">Jenis Kelamin</label>
    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
      <option selected value="<?php echo $resultShow['jenis_kelamin']; ?>"><?php echo $resultShow['jenis_kelamin']; ?></option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
  </div>

  <div>
    <label for="#" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $resultShow['email']; ?>" required />
  </div>

  <div>
    <label for="#" class="form-label">Umur</label>
    <input type="text" class="form-control" id="umur" name="umur" placeholder="age" value="<?php echo $resultShow['umur']; ?>" required />
  </div>

  <div>
    <label for="#" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="addres" value="<?php echo $resultShow['alamat']; ?>" required />
  </div>

  <div>
    <label for="#" class="form-label">No Telepon</label>
    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="phone number" value="<?php echo $resultShow['no_telp']; ?>" required />
  </div>

  <div>
    <label for="#" class="form-label">Foto</label>
    <div id="imagePreviewGambar">
      <img src="../image/<?= $resultShow['gambar'] ?>" width="200px" />
    </div>
    <div id="currentDivGambar"></div>
    <input type="file" class="form-control" aria-label="file example" name="gambar" id="gambar" onchange="return fileValidation('<?= $resultShow['gambar'] ?>')" />
  </div>

  <button type="submit" class="button button-submit" name="kirim">Submit</button>
</form>
<!-- Akhir form -->

<script>
  function fileValidation(current = null) { //validasi file gambar
    var fileInput = document.getElementById('gambar');
    var filePath = fileInput.value; 
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(filePath)) { 
      alert('Invalid file type');
      fileInput.value = '';
      return false;
    } else { 
      if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          if (current != null) document.getElementById('currentDivGambar').innerHTML = '<input type="hidden" name="currentGambar" value="' + current + '">';
          document.getElementById('imagePreviewGambar').innerHTML = '<img src="' + e.target.result + '" width="200px" />';
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  }
</script>
