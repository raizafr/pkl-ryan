<?php 
ob_start();
session_start();
include "../config/connection.php";
include "../helper/validasi.php";
if(empty($_SESSION['username'])){
  header("location: ../index.php");
}

  $nobp =  $_POST['nobp'];
  $nama =  $_POST['namaMhs'];
  $jurusan =  $_POST['jurusan'];
  $kelas =  $_POST['kelas'];
  
  checked($nama, "pages/mahasiswa.php");
  checked($nobp, "pages/mahasiswa.php");
  checked($jurusan, "pages/mahasiswa.php");
  checked($kelas, "pages/mahasiswa.php");
  
  $query = "UPDATE tb_mhs SET nama_mhs='$nama', jurusan='$jurusan', kelas='$kelas' WHERE nobp='$nobp'";
  $result = mysqli_query($db, $query);

  if($result){
    header('Location: ../pages/mahasiswa.php?message=data berhasil di Edit!&code=200');
  } else {
    header('location : ../pages/mahasiswa.php?message=Edit data gagal!&code=400');
  }
?>