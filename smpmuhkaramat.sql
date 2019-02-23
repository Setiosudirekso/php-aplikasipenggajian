-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2019 pada 07.23
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smpmuhkaramat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(1, 'setyo', '$2y$10$ljCtXTtZQlkRtOtnW1hZLeDqeLIFSdyHrA4jRjAF2zyh2zb/BqvLC'),
(2, 'admin', '$2y$10$K2FAIcDZ5USx6SssaGdo.us.cMqMwA0Cn.9zlAEeZF5D7G.8p4y1q');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `gaji_pokok` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `id_jabatan`, `nip`, `nama`, `posisi`, `gaji_pokok`) VALUES
(0, 'jab01', '0002001', 'Saripudin,S.Pd', 'Kepala Sekolah', '2500000'),
(0, 'jab02', '0002002', 'SETIO SUDI REKSO', 'Bendahara', '1500000'),
(0, 'jab03', '0002003', 'Dra.Atthoatin', 'Wakil Kepsek', '2000000'),
(0, 'jab04', '0002004', 'Bagus Maulana', 'Staff Administrasi', '700000'),
(0, 'jab05', '0002005', 'Ahmad Buchori,S.Pd', 'Humas', '1800000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `id_jabatan` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `no_rekening` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nip`, `id_jabatan`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `tanggal_bergabung`, `nama_bank`, `no_rekening`) VALUES
(0, '0002001', 'jab01', 'Saripudin,S.Pd', 'Tegal', '1984-10-02', 'L', 'Jl. Asem Tiga Tegal Barat - Kota Tegal', '089234334664', '2004-06-01', 'BRI', '00351066612'),
(0, '0002002', 'jab02', 'SETIO SUDI REKSO', 'Tegal', '1997-05-15', 'L', 'Tegal', '082326013922', '2017-03-22', 'BNI', '00036768001'),
(0, '0002003', 'jab03', 'Dra.Atthoatin', 'Tegal', '1978-08-14', 'W', 'Tegal', '085528190312', '2002-06-01', 'BCA', '00036763001'),
(0, '0002004', 'jab04', 'Bagus Maulana', 'Tegal', '1999-06-15', 'L', 'Tegal', '085528190312', '2017-11-06', 'MANDIRI', '00055662235'),
(0, '0002005', 'jab05', 'Ahmad Buchori,S.Pd', 'Tegal', '1975-10-12', 'L', 'mejasem barat', '081662013333', '2005-07-01', 'BRI', '00055662230');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `id` int(11) NOT NULL,
  `id_gaji` varchar(15) NOT NULL,
  `nip` int(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `gaji_pokok` int(20) NOT NULL,
  `total_tunjangan` int(20) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `bulan_gaji` varchar(15) NOT NULL,
  `tanggal_gaji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap`
--

CREATE TABLE `rekap` (
  `id` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `gaji_total` varchar(15) NOT NULL,
  `bulan_gaji` date NOT NULL,
  `tahun_gaji` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id` int(11) NOT NULL,
  `id_tunjangan` varchar(10) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `masa kerja` int(10) NOT NULL,
  `lembur` varchar(10) NOT NULL,
  `transport` varchar(10) NOT NULL,
  `total_tunjangan` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
