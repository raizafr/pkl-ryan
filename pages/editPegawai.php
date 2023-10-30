<?php
ob_start();
include "../components/kepala_menu.php";
include "../helper/validasi.php";

$id = $_GET['id'];
checked($id, "pages/matakuliah.php");

  $query = "SELECT * FROM tb_mhs WHERE nobp='$id'";
  $result = mysqli_query($db, $query);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      

      <h2> Edit Mata Kuliah</h2>
      <form class="p-5" action="../actions/editMhs.php" method="POST">
        <?php foreach($data as $result): ?>
        <div class="form-floating mb-2">
          <input name="nobp" type="text" class="form-control" id="floatingInput" placeholder="NOBP" value="<?php echo $result['nobp'] ?>" readonly>
          <label for="floatingInput">NOBP</label>
        </div>
        <div class="form-floating mb-2">
          <input name="namaMhs" type="text" class="form-control" id="floatingInput" placeholder="Nama" value="<?php echo $result['nama_mhs'] ?>" required>
          <label for="floatingInput">Nama</label>
        </div>
        <div class="form-floating mb-2">
          <input name="jurusan" type="text" class="form-control" id="floatingInput" placeholder="Jurusan" value="<?php echo $result['jurusan'] ?>" required>
          <label for="floatingInput">Jurusan</label>
        </div>
        <div class="form-floating mb-2">
          <input name="kelas" type="text" class="form-control" id="floatingInput" placeholder="Kelas" value="<?php echo $result['kelas'] ?>" required>
          <label for="floatingInput">Kelas</label>
        </div>
        <?php endforeach ?>
        <input type="submit" value="Submit" class="w-100 btn btn-lg btn-primary">
    </form>

    </main>
    <?php
include "../components/bawah.php";
?>