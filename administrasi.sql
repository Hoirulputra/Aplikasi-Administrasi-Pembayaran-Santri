-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 09:35 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `hak_akses` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `pass`, `hak_akses`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin'),
(2, 'Bendahara', 'bendahara', 'bendahara', 'bendahara'),
(6, 'test', 'test_0011', 'test_0011', 'santri');

-- --------------------------------------------------------

--
-- Table structure for table `keluar_pendaftaran_baru`
--

CREATE TABLE `keluar_pendaftaran_baru` (
  `id` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nominal_pengeluaran` varchar(30) NOT NULL,
  `ket_pengeluaran` varchar(250) NOT NULL,
  `jenis` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar_pendaftaran_baru`
--

INSERT INTO `keluar_pendaftaran_baru` (`id`, `tanggal_pembayaran`, `nominal_pengeluaran`, `ket_pengeluaran`, `jenis`) VALUES
(4, '2020-05-07', '200000', 'beli jubah 3', 'Uang Kostum Jubah'),
(5, '2020-05-07', '900000', 'Pembelian 9 kostum jubah', 'Uang Kostum Olahraga'),
(6, '2020-05-07', '100000', 'Sewa 3 lemari', 'Uang Sewa Lemari'),
(7, '2020-05-08', '500000', 'beli kertas 1 rim', 'Uang Ujian'),
(8, '2020-05-07', '500000', 'Beli belangko', 'Uang Pendaftaran Baru'),
(9, '2020-05-07', '300000', 'Beli tinta', 'Lainnya'),
(10, '2020-05-11', '50000', 'beli kertas', 'Uang Pendaftaran Baru'),
(11, '2020-05-11', '60000', 'beli semen', 'Uang Pendaftaran Baru');

-- --------------------------------------------------------

--
-- Table structure for table `keluar_pendaftaran_ulang`
--

CREATE TABLE `keluar_pendaftaran_ulang` (
  `id` int(11) NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `nominal_pengeluaran` varchar(30) DEFAULT NULL,
  `ket_pengeluaran` varchar(250) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar_pendaftaran_ulang`
--

INSERT INTO `keluar_pendaftaran_ulang` (`id`, `tanggal_pembayaran`, `nominal_pengeluaran`, `ket_pengeluaran`, `jenis`) VALUES
(3, '2020-05-07', '500000', 'beli kertas 1 rim', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `keluar_uang_bulanan`
--

CREATE TABLE `keluar_uang_bulanan` (
  `id` int(11) NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `nominal_pengeluaran` varchar(30) DEFAULT NULL,
  `ket_pengeluaran` varchar(250) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar_uang_bulanan`
--

INSERT INTO `keluar_uang_bulanan` (`id`, `tanggal_pembayaran`, `nominal_pengeluaran`, `ket_pengeluaran`, `jenis`) VALUES
(1, '2020-05-07', '500000', 'uang makan 1 minggu', 'Uang Makan'),
(2, '2020-05-07', '700000', 'uang asrama 1 bulan untuk 5 santri', 'Uang Asrama'),
(3, '2020-05-07', '1000000', 'listrik 1 bulan', 'Uang Listrik'),
(4, '2020-05-07', '50000', 'beli semen', 'Lainnya'),
(5, '2020-05-09', '250000', 'nasi 100 box', 'Uang Makan');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_baru`
--

CREATE TABLE `pendaftaran_baru` (
  `id` int(10) NOT NULL,
  `id_santri` varchar(30) DEFAULT NULL,
  `uang_pendafaftaran_baru` varchar(30) DEFAULT NULL,
  `uang_sewa_lemari` varchar(30) DEFAULT NULL,
  `uang_seragam_pondok` varchar(30) DEFAULT NULL,
  `uang_pembangunan` varchar(30) DEFAULT NULL,
  `uang_ujian` varchar(30) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `tahun_pembayaran` varchar(30) DEFAULT NULL,
  `semester_pembayaran` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran_baru`
--

INSERT INTO `pendaftaran_baru` (`id`, `id_santri`, `uang_pendafaftaran_baru`, `uang_sewa_lemari`, `uang_seragam_pondok`, `uang_pembangunan`, `uang_ujian`, `tanggal_pembayaran`, `tahun_pembayaran`, `semester_pembayaran`) VALUES
(6, '000002', '100000', '150000', '100000', '100000', '100000', '2020-05-07', '2020', 'Ganjil'),
(8, '000001', '500000', '100000', '100000', '10000', '100000', '2020-05-08', '2020', 'Ganjil'),
(9, '000005', '100000', '500000', '100000', '100000', '100000', '2020-05-08', '2019', 'Ganjil'),
(10, '000006', '200000', '150000', '100000', '100000', '100000', '2020-05-09', '2020', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_ulang`
--

CREATE TABLE `pendaftaran_ulang` (
  `id` int(11) NOT NULL,
  `id_santri` varchar(30) DEFAULT NULL,
  `uang_pendafaftaran_ulang` varchar(30) DEFAULT NULL,
  `uang_ujian` varchar(30) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `tahun_pembayaran` varchar(30) DEFAULT NULL,
  `semester_pembayaran` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran_ulang`
--

INSERT INTO `pendaftaran_ulang` (`id`, `id_santri`, `uang_pendafaftaran_ulang`, `uang_ujian`, `tanggal_pembayaran`, `tahun_pembayaran`, `semester_pembayaran`) VALUES
(1, '1111', '100000', '50000', '2020-05-06', '2020', 'Ganjil'),
(2, '1234', '50000', '50000', '2020-05-06', '2020', 'Ganjil'),
(3, '12333', '90000', '200000', '2020-05-06', '2020', 'Genap'),
(4, '000004', '200000', '200000', '2020-05-07', '2020', 'Genap'),
(5, '000001', '150000', '150000', '2020-05-07', '2020', 'Genap'),
(6, '000003', '100000', '50000', '2020-05-07', '2020', 'Genap'),
(7, '000001', '500000', '500000', '2020-05-08', '2020', 'Ganjil'),
(8, '000005', '100000', '200000', '2020-05-08', '2020', 'Ganjil'),
(9, '000006', '50000', '100000', '2020-05-09', '2020', 'Ganjil'),
(10, '000002', '500000', '100000', '2020-05-11', '2021', 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int(11) NOT NULL,
  `id_santri` varchar(30) NOT NULL,
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
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id`, `id_santri`, `nama_santri`, `jenis_kelamin`, `alamat`, `ayah_santri`, `ibu_santri`, `status`, `tahun_masuk`, `semester`, `daftar_ulang`, `uang_bulanan`) VALUES
(1, '0012', 'test', 'Pria', 'test', 'test', 'test', 'baru', '0012', 'Ganjil', NULL, NULL),
(2, '000001', 'Joko', 'Pria', 'Padang', 'Budi', 'Ayu', 'Baru', '2020', 'Ganjil', 'Belum', 'Belum'),
(3, '000002', 'Bono', 'Pria', 'Padang', 'Jiki', 'Miko', 'Lama', '2020', 'Ganjil', 'Sudah', 'Belum'),
(4, '000003', 'Dori', 'Pria', 'Padang', 'Ciri', 'Nomi', 'Lama', '2020', 'Ganjil', 'Belum', 'Belum'),
(5, '000004', 'Hono', 'Pria', 'Padang', 'Noki', 'Budi', 'Lama', '2019', 'Ganjil', 'Belum', 'Sudah'),
(6, '000005', 'Miko', 'Wanita', 'Padang', 'Jiyo', 'Soro', 'Lama', '2019', 'Ganjil', 'Sudah', 'Sudah'),
(7, '000006', 'Wiki', 'Wanita', 'Padang', 'Gui', 'Doi', 'Lama', '2019', 'Ganjil', 'Belum', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `uang_bulanan`
--

CREATE TABLE `uang_bulanan` (
  `id` int(20) NOT NULL,
  `id_santri` varchar(30) NOT NULL,
  `tanggal_pembayaran` varchar(30) NOT NULL,
  `bulan_pembayaran` varchar(30) NOT NULL,
  `tahun_pembayaran` varchar(30) NOT NULL,
  `uang_makan` varchar(30) NOT NULL,
  `uang_asrama` varchar(30) NOT NULL,
  `uang_listrik` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uang_bulanan`
--

INSERT INTO `uang_bulanan` (`id`, `id_santri`, `tanggal_pembayaran`, `bulan_pembayaran`, `tahun_pembayaran`, `uang_makan`, `uang_asrama`, `uang_listrik`) VALUES
(1, '1234', '2020-05-07', 'Januari', '2020', '100000', '100000', '80000'),
(2, '12333', '2020-05-07', 'Februari', '2020', '90000', '80000', '70000'),
(3, '1234', '2020-05-07', 'Februari', '2020', '1000', '1000', '1000'),
(4, '000001', '2020-05-07', 'Juli', '2020', '100000', '100000', '100000'),
(5, '000002', '2020-05-07', 'Juli', '200000', '200000', '200000', '200000'),
(6, '000004', '2020-05-07', 'Juli', '2020', '200000', '200000', '200000'),
(7, '000001', '2020-05-07', 'Agustus', '2020', '100000', '100000', '100000'),
(8, '000002', '2020-05-07', 'Agustus', '2020', '180000', '100000', '100000'),
(9, '000004', '2020-05-07', 'Agustus', '2020', '150000', '100000', '100000'),
(10, '000001', '2020-05-07', 'Maret', '2020', '100000', '100000', '100000'),
(11, '000001', '2020-05-07', 'Maret', '2020', '100000', '100000', '100000'),
(12, '000001', '2020-05-07', 'Maret', '2019', '80000', '90000', '90000'),
(13, '000001', '2020-05-08', 'Januari', '2021', '900000', '100000', '500000'),
(14, '000005', '2020-05-08', 'Mei', '2020', '100000', '100000', '100000'),
(15, '000005', '2020-05-08', 'Juni', '2020', '50000', '100000', '100000'),
(16, '000004', '2020-05-09', 'Januari', '2020', '100000', '100000', '100000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `keluar_pendaftaran_baru`
--
ALTER TABLE `keluar_pendaftaran_baru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keluar_pendaftaran_ulang`
--
ALTER TABLE `keluar_pendaftaran_ulang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluar_uang_bulanan`
--
ALTER TABLE `keluar_uang_bulanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendaftaran_baru`
--
ALTER TABLE `pendaftaran_baru`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendaftaran_ulang`
--
ALTER TABLE `pendaftaran_ulang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uang_bulanan`
--
ALTER TABLE `uang_bulanan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
