<?php
ob_start();
include "../components/kepala_menu.php";

$id = $_GET['id'];

checked($id, "pages/krs.php");
$query = "SELECT * FROM tb_krs_mhs WHERE id='$id'";
$result = mysqli_query($db, $query);
$datas = mysqli_fetch_array($result, MYSQLI_ASSOC);

$query = "SELECT * FROM tb_jadwal";
$result = mysqli_query($db, $query);
$jadwal = mysqli_fetch_all($result, MYSQLI_ASSOC);

$query = "SELECT nobp, nama_mhs FROM tb_mhs";
$result = mysqli_query($db, $query);
$nobp = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2 class="mt-2">Tambah data KRS</h2>

      <div class="table-responsive mt-4">
        <h5>Tabel Jadwal</h5>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">NIDN</th>
              <th scope="col">KD_MK</th>
              <th scope="col">Kelas</th>
              <th scope="col">Lokal</th>
              <th scope="col">Hari</th>
              <th scope="col">Jam kuliah</th>
              <th scope="col">Jam kuliah berakhir</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach($jadwal as $result): ?>
                <tr class="tbl-row">
                  <td><?php echo $result['id'] ?></td>
                  <td><?php echo $result['nidn'] ?> </td>
                  <td><?php echo $result['kd_mk'] ?> </td>
                  <td><?php echo $result['kelas'] ?> </td>
                  <td><?php echo $result['lokal'] ?> </td>
                  <td><?php echo $result['hari'] ?> </td>
                  <td><?php echo $result['jam_kuliah'] ?> </td>
                  <td><?php echo $result['jam_kuliah_berakhir'] ?> </td>
                </tr>
              <?php endforeach ?>
            
          </tbody>
        </table>
      </div>

      <h2 class="mt-2">Form Tambah data KRS</h2>
      <form class="p-3 w-50" action="../actions/editKrs.php" method="POST">
          <input type="hidden" name="id" id="" value="<?php echo $datas['id'] ?>">
        <div class=" mb-2">
          <label class="fw-semibold fs-6">Nama</label>
          <select class="form-select form-select-sm p-2" aria-label=".form-select-sm example" name="nobp" id="nobp">
            <?php foreach($nobp as $result): 
                if ($result['nobp'] == $datas['nobp']) {
                  # code...
                  $select = "selected";
                } else {
                  $select = '';
                }
              ?>
              <option value="<?php echo $result['nobp'] ?>" <?php echo $select ?> ><?php echo $result['nama_mhs'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="mt-1 mb-2">
          <label class="fw-semibold fs-6">ID Jadwal</label>
          <select class="form-select form-select-sm p-2" aria-label=".form-select-sm example" name="idJadwal" id="idJadwal">
            <?php foreach($jadwal as $result):
              if ($result['id'] == $datas['idJadwal']) {
                # code...
                $select = "selected";
              } else {
                $select = '';
              }
              ?>
              <option value="<?php echo $result['id'] ?>" <?php echo $select ?> ><?php echo $result['id'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="mt-1 mb-2">
          <label class="fw-semibold fs-6">ID Jadwal</label>
          <select class="form-select form-select-sm p-2" aria-label=".form-select-sm example" name="program" id="program">
            <?php 
              if ($datas['regular'] == "Reguler") {
              } else {
                echo '<option value="Regular" >Regular</option>';
                echo '<option value="Kombinasi" selected>Kombinasi</option>';
              }
            ?>
          </select>
        </div>
        <input type="submit" value="Submit" class="w-25 btn btn-lg btn-primary">
    </form>

    </main>
    <?php
include "../components/bawah.php";
?>