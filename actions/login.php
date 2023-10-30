<?php
session_start();

include('../config/connection.php');
include('../helper/validasi.php');

$username = $_POST['username'];
$password = $_POST['password'];

checked($username, "index.php", "username atau password salah");
checked($password, "index.php", "username atau password salah");

$password = md5($password);


$query = "SELECT * FROM tb_login WHERE username='$username' AND Pasword='$password'" ;

$result = mysqli_query($db, $query);

$cek = mysqli_num_rows($result);
if($cek) {
  $_SESSION['username'] = $username;
  header('location: ../pages/menu_utama.php');
} else {
  header('location: ../pages/menu_utama.php?message=login gagal!');
}

?>
