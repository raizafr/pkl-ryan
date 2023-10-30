<?php 
session_start();
include "../config/connection.php";
include "../helper/validasi.php";
if(empty($_SESSION['username'])){
  header("location: ../index.php");
}
$nobp = $_POST['nobp'];
$idJadwal = $_POST['idJadwal'];
$program = $_POST['program'];
checked($nobp, "pages/krs.php");
checked($idJadwal, "pages/krs.php");
checked($program, "pages/krs.php");

$query = "SELECT * FROM tb_krs_mhs WHERE nobp='$nobp' AND id_jadwal='$idJadwal'" ;
$result = mysqli_query($db, $query);

$cek = mysqli_num_rows($result);
if($cek) {
  header("location: ../pages/krs.php?message=data gagal di tambahkan!&code=400");
} else {
  $query1 = "INSERT INTO tb_krs_mhs (nobp, id_jadwal, program) VALUES ('$nobp', '$idJadwal', '$program')";
  $result1 = mysqli_query($db, $query1);

  if ($result1) {
    header("location: ../pages/krs.php?message=data berhasil di tambahkan!&code=201");
  } else {
    header('location : ../pages/matakuliah.php?message=tambah data gagal!&code=400');
  }
}
