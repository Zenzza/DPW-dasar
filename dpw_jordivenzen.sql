-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 04:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpw_jordivenzen`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `kd_dokter` varchar(10) NOT NULL,
  `nm_dokter` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `nm_dokter`, `telpon`, `alamat`) VALUES
('D001', 'Dr. Agus', '081212341234', 'Jl.Kampung Bintang'),
('D002', 'Dr. Alex', '081912345678', 'Jl. Pasir Putih'),
('D003', 'Dr. Putra', '083801230055', 'Jl. Selindung Baru');

-- --------------------------------------------------------

--
-- Table structure for table `isi`
--

CREATE TABLE `isi` (
  `no_resep` varchar(5) NOT NULL,
  `kd_obat` varchar(5) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `aturan_pakai` varchar(10) NOT NULL,
  `dosis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(5) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jenis_obat` varchar(25) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `satuan`, `jenis_obat`, `stok`) VALUES
('O001', 'Paracetamol', 'Tablet', 'Obat Demam', 102),
('O002', 'Panadol', 'Kaplet', 'Peringan Nyeri', 200),
('O003', 'Paratusin', 'Kaplet', 'Obat Gejala Demam', 40);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kd_pasien` varchar(5) NOT NULL,
  `nm_pasien` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `goldar` varchar(3) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `alamat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kd_pasien`, `nm_pasien`, `tempat_lahir`, `tgl_lahir`, `agama`, `goldar`, `jenkel`, `alamat`) VALUES
('P001', 'Alex', 'Pangkalpinang', '2006-10-04', 'Budha', 'O', 'Laki-laki', 'Jl. Perma'),
('P002', 'Agustina', 'Sungailiat', '2007-03-05', 'Kristen', 'O', 'Perempuan', 'Jl. Parai'),
('P003', 'Baro', 'Belinyu', '2005-10-02', 'Islam', 'B', 'Laki-laki', 'Jl. Kasih');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `no_resep` varchar(5) NOT NULL,
  `tgl_resep` date NOT NULL,
  `kd_pasien` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `full_name` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `full_name`, `password`, `level`) VALUES
(1, 'Zen', 'jordivenzen', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin'),
(2, 'admin', 'admin', '24c05ce1409afb5dad4c5bddeb924a4bc3ea00f5', 'admin'),
(3, 'Jordi Venzen', 'zen', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kd_dokter`);

--
-- Indexes for table `isi`
--
ALTER TABLE `isi`
  ADD PRIMARY KEY (`no_resep`,`kd_obat`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`no_resep`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
