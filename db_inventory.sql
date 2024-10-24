-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 05:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `jenis`, `stok`, `keterangan`) VALUES
('12345', 'Monitor', 'MSI', 21, ''),
('3100203001', 'CPU', 'MSI', 32, ''),
('CPU0002', 'CPU', 'MSI', 5, ''),
('M00023', 'mouse', 'MSI', 35, '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(11) NOT NULL,
  `kode_barang` varchar(15) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `lokasi_tujuan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `kode_barang`, `tanggal_masuk`, `lokasi_tujuan`, `jumlah`, `keterangan`) VALUES
(16, '12345', '2024-01-12', NULL, 45, 'ditambahkan'),
(17, '12345', '2024-01-12', NULL, 10, 'ditambahkan');

-- --------------------------------------------------------

--
-- Table structure for table `barang_mutasi`
--

CREATE TABLE `barang_mutasi` (
  `id_mutasi` int(15) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `tgl_mutasi` date NOT NULL,
  `lokasi_asal` int(11) NOT NULL,
  `lokasi_tujuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nama_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_mutasi`
--

INSERT INTO `barang_mutasi` (`id_mutasi`, `kode_barang`, `tgl_mutasi`, `lokasi_asal`, `lokasi_tujuan`, `jumlah`, `keterangan`, `nama_barang`) VALUES
(25, 'M00023', '2024-01-12', 6, 9, 2, 'dipindahkan', ''),
(26, 'M00023', '2024-01-12', 6, 5, 4, 'dipindahkan', '');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `id_user`, `kode_barang`, `tgl_pinjam`, `tgl_kembali`, `jumlah`, `status`) VALUES
(1, 0, '3100203001', '2024-01-12', '2024-01-25', 5, 'dikembalikan'),
(2, 0, '3100203001', '2024-01-12', '2024-01-25', 2, 'dikembalikan'),
(3, 0, '12345', '2024-01-12', '2024-01-20', 5, 'dikembalikan'),
(4, 0, '3100203001', '2024-01-12', '2024-01-26', 2, 'dikembalikan'),
(5, 0, '12345', '2024-01-12', '2024-01-24', 3, 'dikembalikan'),
(6, 0, '12345', '2024-01-12', '2024-01-25', 4, 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`) VALUES
(5, 'E301'),
(6, 'E302'),
(7, 'E303'),
(9, 'Ruang Teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `password`, `level`, `nohp`, `jenis_kelamin`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '0820302030', ''),
(2, 'Nada Yuliani', 'Nada Yuliani', '123', 'user', '0812345', 'perempuan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `barang_mutasi`
--
ALTER TABLE `barang_mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `barang_mutasi`
--
ALTER TABLE `barang_mutasi`
  MODIFY `id_mutasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Constraints for table `barang_mutasi`
--
ALTER TABLE `barang_mutasi`
  ADD CONSTRAINT `barang_mutasi_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Constraints for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `peminjam_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
