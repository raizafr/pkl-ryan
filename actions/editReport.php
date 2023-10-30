<?php 
ob_start();
session_start();
include "../config/connection.php";
include "../helper/validasi.php";
if(empty($_SESSION['username'])){
  header("location: ../index.php?message=anda belum login");
}

$id = $_POST['id'];
$nobp = $_POST['nobp'];
$idJadwal = $_POST['idJadwal'];

checked($id, "pages/krs.php");
checked($nobp, "pages/krs.php");
checked($idJadwal, "pages/krs.php");

$query = "UPDATE tb_krs_mhs SET nobp='$nobp', id_jadwal='$idJadwal' WHERE id='$id'";
$result = mysqli_query($db, $query);

if ($result) {
  header("location: ../pages/krs.php?message=data berhasil di Edit!&code=200");
} else {
  header('location : ../pages/krs.php?message=Edit data gagal!&code=400');
}