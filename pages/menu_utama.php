<?php
include "../components/kepala_menu.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat Datang Dihalaman Administrator, <?php echo $_SESSION['username'] ?></h1>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">NIP</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Golongan</th>
        </tr>
      </thead>
      <tbody>

        <?php $i = 1 ?>
        <?php
        $datas = mysqli_query($db, "select * from tb_pegawai");
        $data = mysqli_fetch_all($datas, MYSQLI_ASSOC);
        ?>
        <?php foreach ($data as $result) : ?>
          <tr class="tbl-row">
            <td><?php echo $i ?></td>
            <td><?php echo $result['nama_pegawai'] ?> </td>
            <td><?php echo $result['nip'] ?> </td>
            <td><?php echo $result['jabatan'] ?> </td>
            <td><?php echo $result['golongan'] ?> </td>
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