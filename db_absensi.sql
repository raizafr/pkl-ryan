-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2023 pada 09.39
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_krs_mhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id` int(11) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `nohp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id`, `nidn`, `nama_dosen`, `nohp`) VALUES
(1, '1013059104', 'cendra wadisman', '085317826473'),
(4, '1224', 'Ucok', '085234897567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen_pembng`
--

CREATE TABLE `tb_dosen_pembng` (
  `id` int(11) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `nobp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_dosen_pembng`
--

INSERT INTO `tb_dosen_pembng` (`id`, `nidn`, `nobp`) VALUES
(1, '1013059104', '21101152600007'),
(2, '1013059104', '21101152600017'),
(3, '1013059104', '21101152600018'),
(4, '1013059104', '21101152600019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `kd_mk` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `lokal` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam_kuliah` time NOT NULL,
  `jam_kuliah_berakhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `nidn`, `kd_mk`, `kelas`, `lokal`, `hari`, `jam_kuliah`, `jam_kuliah_berakhir`) VALUES
(1, '1013059104', 'KBKM42010', 'MI-1', 'A2', 'Senin', '08:00:00', '09:15:00'),
(2, '1013059104', 'PKBM43101', 'MI-1', 'LAB-2', 'Selasa', '16:00:00', '18:15:00'),
(9, '1224', 'PKBM43101', 'MI-5', 'A4', 'kamis', '07:45:00', '09:30:00'),
(10, '1224', 'KBKM42010', 'SI', 'A-5', 'Selasa', '13:25:00', '15:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_krs_mhs`
--

CREATE TABLE `tb_krs_mhs` (
  `id` int(11) NOT NULL,
  `nobp` varchar(255) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `program` varchar(16) NOT NULL,
  `absen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_krs_mhs`
--

INSERT INTO `tb_krs_mhs` (`id`, `nobp`, `id_jadwal`, `program`, `absen`) VALUES
(18, '21101152600018', 9, 'regular', 0),
(20, '21101152600018', 10, 'regular', 0),
(21, '21101152600007', 1, 'regular', 0),
(22, '21101152600018', 1, 'regular', 0),
(26, '21101152600017', 10, 'Regular', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `Pasword` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `Pasword`, `nama_lengkap`, `level`) VALUES
(1, '21101152600018', '7fc56270e7a70fa81a5935b72eacbe29', 'Muhammad Fadhil', 'Mahasiswa'),
(2, '210018', '698d51a19d8a121ce581499d7b701668', 'Muhammad Fadhil', 'mahasiswa'),
(3, 'Dimas', 'bcbe3365e6ac95ea2c0343a2395834dd', 'dimas', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_makul`
--

CREATE TABLE `tb_makul` (
  `id` int(11) NOT NULL,
  `kd_mk` varchar(255) NOT NULL,
  `nama_makul` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_makul`
--

INSERT INTO `tb_makul` (`id`, `kd_mk`, `nama_makul`, `sks`, `semester`) VALUES
(1, 'KBKM42010', 'Arsitektur Komputer', 2, 4),
(2, 'PKBM43101', 'Pemrograman Web 2', 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id` int(11) NOT NULL,
  `nobp` varchar(255) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `ips` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_mhs`
--

INSERT INTO `tb_mhs` (`id`, `nobp`, `nama_mhs`, `jurusan`, `kelas`, `ips`) VALUES
(2, '21101152600017', 'M. Mai Rizal', 'Manajmene informatika', 'MI-1', 2.75),
(3, '21101152600018', 'Muhammad Fadhil', 'Manajemen informatika', 'MI-2', 2.87),
(4, '21101152600019', 'Muhammad Azzahran', 'Manajemen informatika', 'MI-2', 2.5),
(6, '21101152600007', 'Bimo romero', 'Manajemen informatika', 'MI-3', 3.32);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vkrs`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vkrs` (
`nama_mhs` varchar(255)
,`jurusan` varchar(30)
,`nobp` varchar(255)
,`ips` double
,`kelas_mhs` varchar(10)
,`program` varchar(16)
,`absen` int(11)
,`nama_makul` varchar(255)
,`sks` int(11)
,`semester` int(11)
,`nama_dosen` varchar(255)
,`nohp` varchar(14)
,`kelas` varchar(255)
,`lokal` varchar(255)
,`hari` varchar(255)
,`jam_kuliah` time
,`kd_mk` varchar(255)
,`jam_kuliah_berakhir` time
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpembimbing`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpembimbing` (
`id` int(11)
,`nidn` varchar(255)
,`nobp` varchar(255)
,`nama_dosen` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vkrs`
--
DROP TABLE IF EXISTS `vkrs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vkrs`  AS SELECT `m`.`nama_mhs` AS `nama_mhs`, `m`.`jurusan` AS `jurusan`, `k`.`nobp` AS `nobp`, `m`.`ips` AS `ips`, `m`.`kelas` AS `kelas_mhs`, `k`.`program` AS `program`, `k`.`absen` AS `absen`, `ma`.`nama_makul` AS `nama_makul`, `ma`.`sks` AS `sks`, `ma`.`semester` AS `semester`, `d`.`nama_dosen` AS `nama_dosen`, `d`.`nohp` AS `nohp`, `j`.`kelas` AS `kelas`, `j`.`lokal` AS `lokal`, `j`.`hari` AS `hari`, `j`.`jam_kuliah` AS `jam_kuliah`, `j`.`kd_mk` AS `kd_mk`, `j`.`jam_kuliah_berakhir` AS `jam_kuliah_berakhir` FROM (`tb_dosen` `d` left join (`tb_makul` `ma` left join (`tb_jadwal` `j` left join (`tb_mhs` `m` left join `tb_krs_mhs` `k` on(`k`.`nobp` = `m`.`nobp`)) on(`k`.`id_jadwal` = `j`.`id`)) on(`j`.`kd_mk` = `ma`.`kd_mk`)) on(`j`.`nidn` = `d`.`nidn`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpembimbing`
--
DROP TABLE IF EXISTS `vpembimbing`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpembimbing`  AS SELECT `t1`.`id` AS `id`, `t1`.`nidn` AS `nidn`, `t1`.`nobp` AS `nobp`, `t2`.`nama_dosen` AS `nama_dosen` FROM (`tb_dosen_pembng` `t1` join `tb_dosen` `t2` on(`t1`.`nidn` = `t2`.`nidn`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`);

--
-- Indeks untuk tabel `tb_dosen_pembng`
--
ALTER TABLE `tb_dosen_pembng`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `nobp` (`nobp`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `kd_mk` (`kd_mk`);

--
-- Indeks untuk tabel `tb_krs_mhs`
--
ALTER TABLE `tb_krs_mhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nobp` (`nobp`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indeks untuk tabel `tb_makul`
--
ALTER TABLE `tb_makul`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_mk` (`kd_mk`);

--
-- Indeks untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nobp` (`nobp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_dosen_pembng`
--
ALTER TABLE `tb_dosen_pembng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_krs_mhs`
--
ALTER TABLE `tb_krs_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_makul`
--
ALTER TABLE `tb_makul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_dosen_pembng`
--
ALTER TABLE `tb_dosen_pembng`
  ADD CONSTRAINT `tb_dosen_pembng_ibfk_1` FOREIGN KEY (`nobp`) REFERENCES `tb_mhs` (`nobp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_dosen_pembng_ibfk_2` FOREIGN KEY (`nidn`) REFERENCES `tb_dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `tb_dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`kd_mk`) REFERENCES `tb_makul` (`kd_mk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_krs_mhs`
--
ALTER TABLE `tb_krs_mhs`
  ADD CONSTRAINT `tb_krs_mhs_ibfk_1` FOREIGN KEY (`nobp`) REFERENCES `tb_mhs` (`nobp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_krs_mhs_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
