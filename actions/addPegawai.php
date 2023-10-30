<?php
session_start();
include "../config/connection.php";
include "../helper/validasi.php";
if (empty($_SESSION['username'])) {
  header("location: ../index.php");
}
$nip = $_POST['nip'];
$nama_pegawai = $_POST['nama_pegawai'];
$jabatan = $_POST['jabatan'];
$golongan = $_POST['golongan'];
checked($nip, "pages/pegawai.php");
checked($nama, "pages/pegawai.php");
checked($jabatan, "pages/pegawai.php");
checked($golongan, "pages/pegawai.php");

$query = "INSERT INTO tb_pegawai (nip, nama_pegawai, jabatan, golongan)
VALUES ('$nip', '$nama_pegawai', '$jabatan', '$golongan')";

$result = mysqli_query($db, $query);

if ($result) {
  header("location: ../pages/pegawai.php?message=data berhasil di tambahkan!&code=201");
} else {
  header('location : ../pages/pegawai.php?message=tambah data gagal!&code=400');
}
