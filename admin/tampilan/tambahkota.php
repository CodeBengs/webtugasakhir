<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<form action="simpankota.php" method="POST">
      <div class="col-md-6">
        <h3> Tambah data pengiriman</h3>
        <hr>
        <div class="form-group">
          <label for="st">Id Provinsi</label>
          <input type="text" id="st" class="form-control" name="idkot" placeholder="Masukan ID Provinsi">
        </div><br>
        <div class="form-group">
          <label for="st">Id Kota</label>
          <input type="text" id="st" class="form-control" name="idkot" placeholder="Masukan ID Kota">
        </div><br>
        <div class="form-group">
          <label for="ft">Nama Kota</label>
          <input type="text" class="form-control" id="nmkota"  placeholder="Masukan Nama Kota"  name="nmkota">
        </div>
        <div class="form-group">
          <label for="ft">Ongkir</label>
          <input type="text" class="form-control" id="ongkir"  placeholder="Ongkir" name="ongkir">
        </div>
      <button class="btn btn-primary" name="save">Simpan</button>
      </div>
    </form>
</body>
</html>

