<?php
$queryShow = mysqli_query(connection(), "SELECT * FROM penjualan WHERE id_penjualan = '$_GET[kode]'");
$resultShow = mysqli_fetch_array($queryShow);

if (isset($_POST['kirim'])) {
    $queryUpdate = "UPDATE penjualan SET 
    id_properti = '$_POST[id_properti]',
    id_agen = '$_POST[id_agen]',
    nama = '$_POST[nama]',
    nik = '$_POST[nik]', 
    alamat = '$_POST[alamat]', 
    no_telp = '$_POST[no_telp]', 
    email = '$_POST[email]',
    tgl_pesan = '$_POST[tgl_pesan]', 
    tgl_selesai = '$_POST[tgl_selesai]',
    jumlah_dp = '$_POST[jumlah_dp]',
    sisa_bayar = '$_POST[sisa_bayar]' WHERE id_penjualan ='$_GET[kode]'";
    $resultUpdate = mysqli_query(connection(), $queryUpdate);
    if ($resultUpdate) {
        $statusUpdate = "ok";
    } else {
        $statusUpdate = "err";
    }
    header('Location: ?page=showSale&statusUpdate=' . $statusUpdate);
}
?>
<div class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center">
    <h2>Welcome To Your Sale Menu</h2>
</div>
<h1 class="heading-1 mt-3 mb-5 fw-bolder">Ubah Penjualan</h1>

<!-- Form -->
<form class="form row g-3 p-4 needs-validation" action="" method="POST" novalidate enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="#" class="form-label">Id Properti</label>
        <select id="id_properti" name="id_properti" class="form-select" required>
            <option selected value="<?php echo $resultShow['id_properti'] ?>"><?php echo $resultShow['id_properti'] ?></option>
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
            <option selected value="<?php echo $resultShow['id_agen'] ?>"><?php echo $resultShow['id_agen'] ?></option>
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
        <input type="text" value="<?php echo $resultShow['nama'] ?>" class=" form-control" id="nama" name="nama" required placeholder="nama pembeli" />
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please write a name.</div>
    </div>

    <div class="col-md-6">
        <label for="#" class="form-label">Nik</label>
        <input type="number" value="<?php echo $resultShow['nik'] ?>" class="form-control" id="nik" name="nik" required placeholder="nik pembeli" />
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please write a nik.</div>
    </div>

    <div class="col-md-12">
        <label for="#" class="form-label">Alamat</label>
        <input type="text" value="<?php echo $resultShow['alamat'] ?>" class="form-control" id="alamat" name="alamat" required placeholder="alamat pembeli" />
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please write a addres.</div>
    </div>

    <div class="col-md-6">
        <label for="#" class="form-label">No Telepon</label>
        <input type="number" value="<?php echo $resultShow['no_telp'] ?>" class="form-control" id="no_telp" name="no_telp" required placeholder="nomor telepon pembeli" />
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please write a phoner number.</div>
    </div>

    <div class="col-md-6">
        <label for="#" class="form-label">Email</label>
        <input type="email" value="<?php echo $resultShow['email'] ?>" class="form-control" id="email" name="email" required placeholder="email pembeli" />
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please write a email.</div>
    </div>

    <div class="col-md-6">
        <label for="#" class="form-label">Tanggal Pesan</label>
        <input type="date" value="<?php echo $resultShow['tgl_pesan'] ?>" class="form-control" id="tgl_pesan" name="tgl_pesan" required placeholder="tanggal pesan" />
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please write a date order.</div>
    </div>

    <div class="col-md-6">
        <label for="#" class="form-label">Tanggal Selesai</label>
        <input type="date" value="<?php echo $resultShow['tgl_selesai'] ?>" class="form-control" id="tgl_selesai" name="tgl_selesai" required placeholder="tanggal bayar" />
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please write a date finish.</div>
    </div>

    <div class="col-md-6">
        <label for="#" class="form-label">Jumlah Dp</label>
        <input type="number" value="<?php echo $resultShow['jumlah_dp'] ?>" class="form-control" id="jumlah_dp" name="jumlah_dp" required placeholder="jumlah dp" />
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please write a Dp.</div>
    </div>

    <div class="col-md-6">
        <label for="#" class="form-label">Sisa Bayar</label>
        <input type="number" value="<?php echo $resultShow['sisa_bayar'] ?>" class="form-control" id="sisa_bayar" name="sisa_bayar" required placeholder="Sisa bayar" />
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please write a remaining pay.</div>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
    </div>
</form>
<!-- Akhir form -->