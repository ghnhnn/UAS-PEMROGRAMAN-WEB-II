-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 06:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `jeniscucian`
--

CREATE TABLE `jeniscucian` (
  `id_jenis` int(5) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jeniscucian`
--

INSERT INTO `jeniscucian` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Cuci Basah'),
(2, 'Cuci Kering'),
(3, 'Cuci Setrika'),
(4, 'Setrika');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat_karyawan` varchar(100) NOT NULL,
  `noTelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `noTelp`) VALUES
(0, 'Hanifah', 'Jl.Al-Falah, RT.17, RW.14, NO.50', '6287859887677'),
(33001, 'Humaira', 'Jl.Al-Falah, RT.04, RW.07, NO.28', '6281988236755'),
(33002, 'Munirah', 'Jl.Batuah, NO.38', '6281989234567'),
(33003, 'Raudah', 'Jl.Jafri ZamZam, RT.02, RW.01, NO.46', '6287869083568'),
(33004, 'Nutzira', 'Jl.Al-Falah, RT.14, RW.17, NO.50', '6288952775469');

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE `pakaian` (
  `id_pakaian` int(5) NOT NULL,
  `nama_pakaian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakaian`
--

INSERT INTO `pakaian` (`id_pakaian`, `nama_pakaian`) VALUES
(1, 'Pakaian'),
(2, 'Bed Cover'),
(3, 'Selimut'),
(4, 'Sprei'),
(5, 'Boneka'),
(6, 'Bantal/Guling');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `noTelp` varchar(15) NOT NULL,
  `jenkel` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `noTelp`, `jenkel`) VALUES
(1, 'Reviana Elita', 'Jl. BrigJend H.Hasan Basry, RT.03, RW.01, NO.22', '6205319187645', 'Perempuan'),
(2, 'Erwana', 'Jl.BrigJend H.Hasan Basry, RT.04, RW.06, NO.58', '6285217679148', 'Perempuan'),
(3, 'Afiat Auniy', 'Jl.Al-Falah RT.06, RW.03, NO.65', '6285217676598', 'Laki-laki'),
(4, 'Dailami', 'Jl.A.Yani RT.256, RW.03, NO.46', '6288917193486', 'Perempuan'),
(5, 'Ghinaa', 'Jl.A.Yani, RT.256, RW.03, NO.89', '628656786534', 'Perempuan'),
(6, 'Khairina', 'Jl.Al-Falah, RT.07, Rw.04, NO.77', '6289823649364', 'Perempuan'),
(7, 'Windy Yanur', 'Jl.BrigJend H.Hasan Basry, RT.02, Rw.06, NO.32', '6282168248756', 'Laki-laki'),
(8, 'Mariatul Qibtiah', 'Jl.Kapten Piere Tendean NO.68', '6282389547812', 'Perempuan'),
(9, 'Ramira', 'Jl.Kapten Piere Tendean NO.58', '6281952738977', 'Perempuan'),
(10, 'Muhammad Najib', 'Jl.H.R.Sukadani, RT.01, Rw.03, No.14', '6287752798348', 'Laki-laki'),
(11, 'Zain Anwar', 'Jl. BrigJend H.Hasan Basry, RT.13, RW.01, NO.58', '6287852318235', 'Laki-laki'),
(12, 'Ayudiya', 'Jl.Al-Falah, RT.09, RW.08, NO.29', '6287852476656', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `tanggalkeluar` date NOT NULL,
  `berat` int(10) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `id_pakaian` int(5) NOT NULL,
  `bayar` int(20) NOT NULL,
  `totalbayar` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `tanggalmasuk`, `tanggalkeluar`, `berat`, `id_jenis`, `id_pakaian`, `bayar`, `totalbayar`) VALUES
(12, 5, '2022-01-11', '2022-01-14', 3, 2, 2, 5000, 15000),
(11, 1, '2022-01-12', '2022-01-17', 5, 1, 1, 6000, 30000),
(10, 3, '2022-01-14', '2022-01-17', 4, 3, 1, 5000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `nama_lengkap`, `password`) VALUES
(1, 'admin@gmail.com', 'Admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeniscucian`
--
ALTER TABLE `jeniscucian`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`id_pakaian`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`) USING BTREE;

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `No_Identitas` (`id_pelanggan`),
  ADD KEY `No_Identitas_2` (`id_pelanggan`),
  ADD KEY `No_Identitas_3` (`id_pelanggan`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `Id_Pakaian` (`id_pakaian`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeniscucian`
--
ALTER TABLE `jeniscucian`
  MODIFY `id_jenis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `id_pakaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2214;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
