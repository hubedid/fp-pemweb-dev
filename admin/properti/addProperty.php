
<div
  class="welcome-box bg-primary p-4 rounded-2 d-flex justify-content-between align-items-center"
>
  <h2>Welcome To Your Property Menu</h2>
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
<h1 class="heading-1 mt-3 mb-5 fw-bolder">Tambah Properti</h1>

<!-- Form -->
<form
  class="form row g-3 p-4 needs-validation"
  action=""
  method="POST"
  novalidate
  enctype="multipart/form-data"
>
  
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
    <label for="#" class="form-label">Tipe Properti</label>
    <select id="tipe_properti" name="tipe_properti" class="form-select" required>
      <option selected disabled value="">Choose...</option>
      <option value="Minimalis">Minimalis</option>
      <option value="Klasik">Klasik</option>
      <option value="Etnik">Etnik</option>
      <option value="Mediterranean">Mediterranean</option>
      <option value="Skandinavia">Skandinavia</option>
      <option value="Vintage">Vintage</option>
      <option value="Rustic">Rustic</option>
      <option value="Industrial">Industrial</option>
      <option value="Scandinavian">Scandinavian</option>
      <option value="Farmhouse">Farmhouse</option>
      <option value="Mid-Century Modern">Mid-Century Modern</option>
      <option value="Contemporary">Contemporary</option>
      <option value="Traditional">Traditional</option>
      <option value="Transitional">Transitional</option>
      <option value="Modern">Modern</option>
      <option value="Coastal">Coastal</option>
      <option value="Eclectic">Eclectic</option>
      <option value="Shabby Chic">Shabby Chic</option>
      <option value="Hamptons">Hamptons</option>
      <option value="French Country">French Country</option>
      <option value="Tropical">Tropical</option>
      <option value="Asian">Asian</option>
      <option value="Beach Style">Beach Style</option>
      <option value="Southwestern">Southwestern</option>
    </select>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">
      Please select a valid type property.
    </div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Nama Properti</label>
    <input
      type="text"
      class="form-control"
      id="nama_properti"
      name="nama_properti"
      required
      placeholder="name property"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a property name.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Status</label>
    <select id="status" name="status" class="form-select" required>
      <option selected disabled value="">Choose...</option>
      <option value="Available">Available</option>
      <option value="Not Available">Not Available</option>
    </select>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please select a valid status.</div>
  </div>

  <div class="col-md-12">
    <label for="#" class="form-label">Alamat Properti</label>
    <input
      type="text"
      class="form-control"
      id="alamat"
      name="alamat"
      required
      placeholder="addres"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a addres.</div>
  </div>

  <div class="col-12">
    <label for="#" class="form-label">Deskripsi</label>
    <textarea
      class="form-control"
      id="deskripsi"
      name="deskripsi"
      rows="3"
      required
      placeholder="description"
    ></textarea>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a description.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Kota</label>
    <input
      type="text"
      class="form-control"
      id="kota"
      name="kota"
      required
      placeholder="city"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a city.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Provinsi</label>
    <input
      type="text"
      class="form-control"
      id="provinsi"
      name="provinsi"
      required
      placeholder="province"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a province.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Luas Bangunan</label>
    <input
      type="text"
      class="form-control"
      id="luas_bangunan"
      name="luas_bangunan"
      required
      placeholder="Luas bangunan"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a building area.</div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Kamar Mandi</label>
    <input
      type="text"
      class="form-control"
      id="kamar_mandi"
      name="kamar_mandi"
      required
      placeholder="jumlah kamar mandi 1-10"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">
      Please write a number of bathroom.
    </div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Kamar Tidur</label>
    <input
      type="text"
      class="form-control"
      id="kamar_tidur"
      name="kamar_tidur"
      required
      placeholder="jumlah kamar tidur 1-10"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">
      Please write a number of bedhroom.
    </div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Dapur</label>
    <input
      type="text"
      class="form-control"
      id="dapur"
      name="dapur"
      required
      placeholder="jumlah dapur 1-10"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">
      Please write a number of kitchen.
    </div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Ruang Keluarga</label>
    <input
      type="text"
      class="form-control"
      id="ruang_keluarga"
      name="ruang_keluarga"
      required
      placeholder="jumlah ruang keluarga 1-10"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">
      Please write a number of family room.
    </div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Balkon</label>
    <input
      type="text"
      class="form-control"
      id="balkon"
      name="balkon"
      required
      placeholder="jumlah balkon 1-10"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">
      Please write a number of balcony.
    </div>
  </div>

  <div class="col-md-6">
    <label for="#" class="form-label">Harga</label>
    <input
      type="text"
      class="form-control"
      id="harga"
      name="harga"
      required
      placeholder="harga"
    />
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please write a vprice.</div>
  </div>

  <div class="col-12">
    <label for="#" class="form-label">Gambar 1</label>
    <input
      type="file"
      class="form-control"
      id="#"
      name="gambar1"
      aria-label="file example"
      required
    />
    <div class="invalid-feedback">
      Example invalid form file feedback
    </div>
  </div>

  <div id="formfield">
  </div>
  <div class="col-12">
    <button type="button" class="btn btn-primary" onclick="addUpload()">add Upload</button>
    <button type="button" class="btn btn-primary" onclick="addUpload()">add Upload</button>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
<!-- Akhir form -->
<script>
  let no = 2;
  function addUpload(){
    var form = '<div class="col-12">'+
      '<label for="#" class="form-label">Gambar '+ no +'</label>'+
      '<input type="file" class="form-control"id="#"name="gambar'+ no +'" aria-label="file example" required />'+
      '<div class="invalid-feedback">Example invalid form file feedback</div></div>';
    document.getElementById('formfield').insertAdjacentHTML("beforeend", form);
    no++;
  }
</script>
