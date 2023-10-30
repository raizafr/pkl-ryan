<?php 
ob_start();
session_start();
include "../config/connection.php";
if(empty($_SESSION['username'])){
  header("location: ../index.php");
}
  $id = $_GET['id'];
  if (!is_numeric($id)) {
    return header("location: ../pages/krs.php?message=Data tidak ditemukan!&code=404");
  }
$query = "DELETE FROM tb_krs_mhs WHERE id='$id'";
$result = mysqli_query($db, $query);

if($result) {
  header('Location: ../pages/krs.php?message=data berhasil di Hapus!&code=200');
} else {
  header('location : ../pages/krs.php?message=Hapus data gagal!&code=500');
}

?>