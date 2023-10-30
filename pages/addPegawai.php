<?php
include "../components/kepala_menu.php";

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h2 class="mt-2"> Tambah data Pegawai</h2>
  <form class="p-3" action="../actions/addPegawai.php" method="POST">
    <div class="form-floating mb-2">
      <input name="nip" type="text" class="form-control" id="floatingInput" placeholder="nip" required>
      <label for="floatingInput">NIP</label>
    </div>
    <div class="form-floating mb-2">
      <input name="nama_pegawai" type="text" class="form-control" id="floatingInput" placeholder="nama_pegawai" required>
      <label for="floatingInput">Nama Pegawai</label>
    </div>
    <div class="form-floating mb-2">
      <input name="jabatan" type="text" class="form-control" id="floatingInput" placeholder="jabatan" required>
      <label for="floatingInput">Jabatan</label>
    </div>
    <div class="form-floating mb-2">
      <input name="golongan" type="text" class="form-control" id="floatingInput" placeholder="golongan" required>
      <label for="floatingInput">Golongan</label>
    </div>
    <input type="submit" value="Submit" class="w-100 btn btn-lg btn-primary">
  </form>

</main>
<?php
include "../components/bawah.php";
?>