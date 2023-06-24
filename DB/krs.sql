-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2023 pada 22.25
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` char(18) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `kelamin` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `kelamin`) VALUES
('196603091986031001', 'Dodon Yendri, M.Kom', 'L'),
('198112222008121004', 'Dr.Eng. Budi Rahmadya, M.Eng', 'L'),
('199111192018032001', 'Nefy Puteri Novani, M.T', 'P'),
('199404292022032014', 'Rizka Hadelina, M.T', 'P'),
('199506232022031014', 'Arrya Anandika, M.T', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosenkelas`
--

CREATE TABLE `dosenkelas` (
  `id_dosenkelas` int(11) NOT NULL,
  `nip` char(18) NOT NULL,
  `kode_kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosenkelas`
--

INSERT INTO `dosenkelas` (`id_dosenkelas`, `nip`, `kode_kelas`) VALUES
(23, '199111192018032001', 'CCE62110/A'),
(24, '196603091986031001', 'CCE62115/B'),
(25, '198112222008121004', 'CCE62110/B'),
(26, '199506232022031014', 'CCE62118/B'),
(27, '199506232022031014', 'CCE62118/A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(25) NOT NULL,
  `kode_matkul` char(8) NOT NULL,
  `jadwal` varchar(15) DEFAULT NULL,
  `ruangan` varchar(5) DEFAULT NULL,
  `hari` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kode_matkul`, `jadwal`, `ruangan`, `hari`) VALUES
('CCE62110/A', 'CCE62110', '07.30 - 09.10', 'H2.2', 'selasa'),
('CCE62110/B', 'CCE62110', '07.30 - 09.10', 'H2.4', 'senin'),
('CCE62115/B', 'CCE62115', '09.20 - 11.00', 'H2.4', 'senin'),
('CCE62118/A', 'CCE62118', '13.30 - 15.10', 'H2.4', 'selasa'),
('CCE62118/B', 'CCE62118', '13.30 - 15.10', 'H2.3', 'kamis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `nim` char(10) NOT NULL,
  `id_dosenkelas` int(11) NOT NULL,
  `id_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `nim`, `id_dosenkelas`, `id_status`) VALUES
(2111512006, '2111512006', 24, 'S'),
(2111512006, '2111512006', 25, 'S'),
(2111512006, '2111512006', 26, 'S');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_matkul` char(8) NOT NULL,
  `nama_matkul` varchar(255) DEFAULT NULL,
  `sks` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_matkul`, `nama_matkul`, `sks`) VALUES
('CCE62110', 'Organisasi dan Arsitektur Komputer 1', '3'),
('CCE62111', 'Praktikum Organisasi dan Arsitektur Komputer 1', '1'),
('CCE62112', 'Struktur Data', '2'),
('CCE62113', 'Rangkaian Listrik', '2'),
('CCE62114', 'Praktikum Rangkaian Listrik', '1'),
('CCE62115', 'Sistem Operasi', '2'),
('CCE62116', 'Sistem Tertanam 1', '2'),
('CCE62117', 'Keamanan Informasi 1', '2'),
('CCE62118', 'Sistem Basis Data', '2'),
('CCE62119', 'Perancangan Sistem Digital 1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

CREATE TABLE `mhs` (
  `nim` char(10) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `kelamin` char(1) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` char(5) NOT NULL,
  `id_sms` char(2) NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `nilai_semester_sebelumnya` varchar(4) NOT NULL,
  `gambar` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`nim`, `nama`, `kelamin`, `password`, `user_type`, `id_sms`, `nip`, `nilai_semester_sebelumnya`, `gambar`) VALUES
('2111512006', 'Muhammad Hafiz', 'L', '$2y$10$hw6cnLtAlMDfkyDExRkfou7JGhs2SlP92Zabur8UtBptdHnYGUdAu', '', '04', NULL, '', 0x36343937343636613730666432494d475f32303137313230325f3232313133395f3337362e4a5047),
('admin', 'admin', 'L', '$2y$10$5Z5Dgzk/VUSXI/PVNXa/mesJs6jfFNr9sV36ZSZzw5NaslcJm.TWe', 'admin', '01', NULL, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_sms` char(2) NOT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_sms`, `semester`) VALUES
('01', 1),
('02', 2),
('03', 3),
('04', 4),
('05', 5),
('06', 6),
('07', 7),
('08', 8),
('09', 9),
('10', 10),
('11', 11),
('12', 12),
('13', 13),
('14', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` char(1) NOT NULL,
  `setatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `setatus`) VALUES
('S', 'disetujui'),
('T', 'tidak disetujui');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `dosenkelas`
--
ALTER TABLE `dosenkelas`
  ADD PRIMARY KEY (`id_dosenkelas`,`nip`,`kode_kelas`),
  ADD KEY `nip` (`nip`,`kode_kelas`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `nip_2` (`nip`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`,`nim`,`id_dosenkelas`,`id_status`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_dosenkelas` (`id_dosenkelas`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indeks untuk tabel `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`,`id_sms`),
  ADD KEY `id_sms` (`id_sms`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_sms`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosenkelas`
--
ALTER TABLE `dosenkelas`
  MODIFY `id_dosenkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_dosenkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosenkelas`
--
ALTER TABLE `dosenkelas`
  ADD CONSTRAINT `dosenkelas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosenkelas_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `mata_kuliah` (`kode_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`id_dosenkelas`) REFERENCES `dosenkelas` (`id_dosenkelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`id_sms`) REFERENCES `semester` (`id_sms`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mhs_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
