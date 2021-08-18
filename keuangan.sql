-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Agu 2021 pada 11.31
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `hak_akses` varchar(30) NOT NULL,
  `id_santri` int(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `hak_akses`, `id_santri`) VALUES
(1, 'Hoirul_Putra', 'admin', 'admin', 'admin', 0),
(2, 'Bendahara', 'bendahara', 'bendahara', 'bendahara', 0),
(3, 'Hoirul', 'hoirul', 'hoirul', 'santri', 20211),
(4, 'Tomi', 'tomi', 'tomi', 'santri', 20212),
(5, 'Putri', 'putri', 'putri', 'santri', 20214);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar_pendaftaran_baru`
--

CREATE TABLE IF NOT EXISTS `keluar_pendaftaran_baru` (
`id` int(11) NOT NULL,
  `tanggal_tagihan` date NOT NULL,
  `nominal_tagihan` varchar(30) NOT NULL,
  `ket_tagihan` varchar(250) NOT NULL,
  `jenis_tagihan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluar_pendaftaran_baru`
--

INSERT INTO `keluar_pendaftaran_baru` (`id`, `tanggal_tagihan`, `nominal_tagihan`, `ket_tagihan`, `jenis_tagihan`) VALUES
(12, '2021-08-13', 'Rp.50.000', 'Formulir Pendaftaran', 'Uang Pendaftaran Baru'),
(13, '2021-08-13', 'Rp.100.000', 'Sewa 1 Lemari', 'Uang Sewa Lemari'),
(14, '2021-08-13', 'Rp.300.000', 'Beli 2 Seragam Pondok', 'Uang Seragam Pondok'),
(15, '2021-08-13', 'Rp.500.000', 'SPP', 'Uang Pembagunan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar_pendaftaran_ulang`
--

CREATE TABLE IF NOT EXISTS `keluar_pendaftaran_ulang` (
`id` int(11) NOT NULL,
  `tanggal_tagihan` date DEFAULT NULL,
  `nominal_tagihan` varchar(30) DEFAULT NULL,
  `ket_tagihan` varchar(250) DEFAULT NULL,
  `jenis_tagihan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluar_pendaftaran_ulang`
--

INSERT INTO `keluar_pendaftaran_ulang` (`id`, `tanggal_tagihan`, `nominal_tagihan`, `ket_tagihan`, `jenis_tagihan`) VALUES
(5, '2021-08-13', 'Rp.50.000', 'Daftar Ulang', 'Uang Pendaftaran Ulang'),
(6, '2021-08-15', 'Rp.50.000', 'Ujian Semester', 'Uang Ujian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar_uang_bulanan`
--

CREATE TABLE IF NOT EXISTS `keluar_uang_bulanan` (
`id` int(11) NOT NULL,
  `tanggal_tagihan` date DEFAULT NULL,
  `nominal_tagihan` varchar(30) DEFAULT NULL,
  `ket_tagihan` varchar(250) DEFAULT NULL,
  `jenis_tagihan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluar_uang_bulanan`
--

INSERT INTO `keluar_uang_bulanan` (`id`, `tanggal_tagihan`, `nominal_tagihan`, `ket_tagihan`, `jenis_tagihan`) VALUES
(6, '2021-08-15', 'Rp.500.000', 'Makan 2X', 'Uang Makan'),
(7, '2021-08-15', 'Rp.50.000', 'Kebersihan', 'Uang Asrama'),
(9, '2021-08-17', 'Rp.50.000', 'Listrik', 'Uang Listrik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_baru`
--

CREATE TABLE IF NOT EXISTS `pendaftaran_baru` (
`id` int(10) NOT NULL,
  `id_santri` varchar(30) DEFAULT NULL,
  `uang_pendaftaran_baru` varchar(30) DEFAULT NULL,
  `uang_sewa_lemari` varchar(30) DEFAULT NULL,
  `uang_seragam_pondok` varchar(30) DEFAULT NULL,
  `uang_pembangunan` varchar(30) DEFAULT NULL,
  `uang_ujian` varchar(30) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `semester_pembayaran` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran_baru`
--

INSERT INTO `pendaftaran_baru` (`id`, `id_santri`, `uang_pendaftaran_baru`, `uang_sewa_lemari`, `uang_seragam_pondok`, `uang_pembangunan`, `uang_ujian`, `tanggal_pembayaran`, `semester_pembayaran`) VALUES
(11, '3', '500000', '500000', '500000', '500000', '500000', '2021-08-13', 'Ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_ulang`
--

CREATE TABLE IF NOT EXISTS `pendaftaran_ulang` (
`id` int(11) NOT NULL,
  `id_santri` varchar(30) DEFAULT NULL,
  `uang_pendaftaran_ulang` varchar(30) DEFAULT NULL,
  `uang_ujian` varchar(30) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `semester_pembayaran` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran_ulang`
--

INSERT INTO `pendaftaran_ulang` (`id`, `id_santri`, `uang_pendaftaran_ulang`, `uang_ujian`, `tanggal_pembayaran`, `semester_pembayaran`) VALUES
(11, '2', '500000', '500000', '2021-08-13', 'Ganjil'),
(12, '20211', '', '', '2021-08-16', 'Ganjil'),
(13, '20214', '', '', '2021-08-17', 'Ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE IF NOT EXISTS `santri` (
  `id` varchar(30) NOT NULL,
  `nama_santri` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `ayah_santri` varchar(50) DEFAULT NULL,
  `ibu_santri` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `tahun_masuk` varchar(30) NOT NULL,
  `semester` varchar(30) DEFAULT NULL,
  `daftar_ulang` varchar(30) DEFAULT NULL,
  `uang_bulanan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id`, `nama_santri`, `jenis_kelamin`, `alamat`, `ayah_santri`, `ibu_santri`, `status`, `tahun_masuk`, `semester`, `daftar_ulang`, `uang_bulanan`) VALUES
('20211', 'Hoirul', 'Pria', 'Dampit', 'Alim', 'Sholihah', 'Lama', '2021', 'Ganjil', 'Sudah', 'Sudah'),
('20212', 'Tomi', 'Pria', 'Kalimantan', 'Doni', 'Dini', 'Lama', '2021', 'Ganjil', 'Belum', 'Sudah'),
('20213', 'Tiwi', 'Wanita', 'Malang', 'Tono', 'Tini', 'Baru', '2021', 'Ganjil', 'Belum', 'Belum'),
('20214', 'Putri', 'Wanita', 'Kepanjen', 'Koko', 'Kiki', 'Lama', '2021', 'Ganjil', 'Sudah', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_bulanan`
--

CREATE TABLE IF NOT EXISTS `uang_bulanan` (
`id` int(20) NOT NULL,
  `id_santri` varchar(30) NOT NULL,
  `tanggal_pembayaran` varchar(30) NOT NULL,
  `bulan_pembayaran` varchar(30) NOT NULL,
  `uang_makan` varchar(30) NOT NULL,
  `uang_asrama` varchar(30) NOT NULL,
  `uang_listrik` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `uang_bulanan`
--

INSERT INTO `uang_bulanan` (`id`, `id_santri`, `tanggal_pembayaran`, `bulan_pembayaran`, `uang_makan`, `uang_asrama`, `uang_listrik`) VALUES
(17, '3', '2021-08-13', 'Januari', '500000', '500000', '500000'),
(18, '20211', '2021-08-16', 'Januari', '', '', ''),
(19, '20212', '2021-08-16', 'Januari', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `keluar_pendaftaran_baru`
--
ALTER TABLE `keluar_pendaftaran_baru`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar_pendaftaran_ulang`
--
ALTER TABLE `keluar_pendaftaran_ulang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar_uang_bulanan`
--
ALTER TABLE `keluar_uang_bulanan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_baru`
--
ALTER TABLE `pendaftaran_baru`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_ulang`
--
ALTER TABLE `pendaftaran_ulang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uang_bulanan`
--
ALTER TABLE `uang_bulanan`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keluar_pendaftaran_baru`
--
ALTER TABLE `keluar_pendaftaran_baru`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `keluar_pendaftaran_ulang`
--
ALTER TABLE `keluar_pendaftaran_ulang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `keluar_uang_bulanan`
--
ALTER TABLE `keluar_uang_bulanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pendaftaran_baru`
--
ALTER TABLE `pendaftaran_baru`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pendaftaran_ulang`
--
ALTER TABLE `pendaftaran_ulang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `uang_bulanan`
--
ALTER TABLE `uang_bulanan`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
