<?php
include "../components/kepala_menu.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <a class="btn btn-primary pt-1 pb-1 pl-2 pr-2 mt-1 mb-1" href="../pages/addPegawai.php">Tambah data</a>
    <h2>Pegawai</h2>
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
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
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
                        <td><?php echo $result['nip'] ?> </td>
                        <td><?php echo $result['nama_pegawai'] ?> </td>
                        <td><?php echo $result['jabatan'] ?> </td>
                        <td><?php echo $result['golongan'] ?> </td>
                        <td>
                            <a class="btn btn-danger pt-1 pb-1 pl-4 pr-4" href="../actions/deletePegawai.php?id=<?php echo $result['nip'] ?>">Delete</a>
                            <a class="btn btn-success pt-1 pb-1 pl-4 pr-4" href="../pages/editPegawai.php?id=<?php echo $result['nip'] ?>">Edit</a>
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