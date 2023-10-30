<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "db_absensi";

$db = new mysqli($host, $username, $password, $db_name);

if (!$db) {
  echo "Connection failed";
}
