<?php
include "../components/kepala_menu.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <a class="btn btn-primary pt-1 pb-1 pl-2 pr-2 mt-1 mb-1" href="../pages/addKrs.php">Tambah data</a>
  <h2>Report</h2>
  <div class="table-responsive">
    <?php
    if (isset($_GET['message']) && isset($_GET['code'])) {
      if ($_GET['code'] == '404' || $_GET['code'] == '400' || $_GET['code'] == '500') {
        echo "<p class='p-2 bg-danger w-25 text-center text-capitalize fs-3 text-white'>" . $_GET['message'] . "</p>";
      }
    }
    if (isset($_GET['message']) && isset($_GET['code'])) {
      if ($_GET['code'] == '200' || $_GET['code'] == '201') {
        echo "<p class='p-2 bg-success w-25 text-center text-capitalize fs-3 text-white'>" . $_GET['message'] . "</p>";
      }
    }
    ?>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nip</th>
          <th scope="col">Nama Pegawai</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php
        $datas = mysqli_query($db, "select t1.*, t2.nama_pegawai from tb_pegawai t1 join tb_pegawai t2 on t1.nip=t2.nip group by t1.nip, t2.nama_pegawai ");
        $data = mysqli_fetch_all($datas, MYSQLI_ASSOC);
        ?>
        <?php foreach ($data as $result) : ?>
          <tr class="tbl-row">
            <td><?php echo $i ?></td>
            <td><?php echo $result['nip'] ?> </td>
            <td><?php echo $result['nama_pegawai'] ?> </td>
            <td>
              <a class="btn btn-warning pt-1 pt-1 pb-1 pl-4 pr-4" href="./tampilanReport.php?nip=<?php echo $result['nip'] ?>" target="_blank">Cetak Report</a>
            </td>
          </tr>
          <?php $i++ ?>
        <?php endforeach ?>

      </tbody>
    </table>
  </div>

</main>
<?php
include "../components/bawah.php";
?>