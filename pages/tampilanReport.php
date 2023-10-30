<?php

include("../config/connection.php");
include("../helper/validasi.php");

$nip = $_GET['nip'];
checked($nip, "pages/report.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Absensi Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .header img {
            width: 100px;
            height: 100px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="logo.png" alt="Logo Perusahaan">
        <h1>Laporan Absensi Pegawai</h1>
    </div>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database (gantilah dengan informasi database Anda)
                $conn = new mysqli("localhost", "username", "password", "nama_database");

                if ($conn->connect_error) {
                    die("Koneksi database gagal: " . $conn->connect_error);
                }

                // Query untuk mengambil data absensi pegawai
                $sql = "SELECT nama, tanggal, jam_masuk, jam_keluar FROM absensi_pegawai";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["tanggal"] . "</td>";
                        echo "<td>" . $row["jam_masuk"] . "</td>";
                        echo "<td>" . $row["jam_keluar"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Tidak ada data absensi.";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>