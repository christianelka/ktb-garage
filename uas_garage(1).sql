-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 04:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `nama_driver` varchar(25) NOT NULL,
  `level` int(10) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama_driver`, `level`, `deskripsi`, `foto`, `status`) VALUES
(1, 'Putra Setia', 1, 'Putra Setia adalah salah satu driver terbaik kami yang memiliki pelayanan yang sangat memuaskan, ramah, proffesional, dan memiliki pembawaaan yang lembut.', 'driver1.jpg', 1),
(2, 'Andre Permana', 1, 'Andre Permana adalah salah satu driver terbaik kami yang memiliki skill mengeemudi yang sangat baik, berpengalaman dalam mengikuti kegiatan protokoler dan kegiatan resmi.', 'driver2.jpg', 1),
(3, 'Bima Satria', 1, 'Bima Satria adalah salah satu driver terbaik kami yang memiliki pelayanan yang sangat memuaskan, ramah, proffesional, dan memiliki pembawaaan yang halus.', 'driver3.png', 0),
(4, 'Ezra Kinata', 2, 'Ezra Kinata adalah salah satu driver terbaik kami yang memiliki skill mengeemudi yang sangat baik, berpengalaman dalam mengikuti kegiatan protokoler dan kegiatan resmi.', 'driver4.png', 1),
(6, 'Dominicus Eri', 2, 'Dominicus Eri adalah salah satu driver terbaik kami yang memiliki skill mengeemudi yang sangat baik, berpengalaman dalam mengikuti kegiatan protokoler dan kegiatan resmi.', '7714_team-1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(25) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama_mobil`, `kelas`, `harga`, `foto`) VALUES
(1, 'Toyota Expander', '1', 300000, '1.png'),
(2, 'Toyota Alphard', '2', 400000, '7.png'),
(3, 'Daihatsu Terios', '3', 500000, '2.png'),
(4, 'Toyota Fortuner', '3', 500000, '4.png'),
(5, 'Toyota Vellfire', '2', 400000, '8.png'),
(6, 'Toyota Innova', '1', 300000, '3.png'),
(7, 'Mitsubishi Pajero', '3', 500000, '5.png'),
(8, 'Toyota Prado', '3', 500000, '6.png'),
(9, 'Toyota Hiace', '2', 400000, '9.png'),
(11, 'Naruto', '3', 23842394, '3294_naruto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `lama` int(11) NOT NULL,
  `pilihan` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_mobil`, `id_user`, `tanggal_sewa`, `waktu`, `lama`, `pilihan`, `id_driver`, `jumlah`, `status`) VALUES
(2, 7, 1, '0000-00-00', '00:12:00', 0, 1, 0, 0, 1),
(3, 7, 1, '0000-00-00', '00:12:00', 0, 1, 0, 0, 0),
(4, 7, 1, '0000-00-00', '01:11', 0, 1, 0, 0, 0),
(5, 7, 1, '0000-00-00', '14:22', 0, 1, 0, 0, 0),
(6, 7, 1, '0000-00-00', '17:05', 0, 1, 3, 0, 0),
(7, 7, 1, '0000-00-00', '11:01', 0, 1, 2, 0, 0),
(8, 7, 1, '2021-06-18', '11:22', 0, 1, 2, 0, 0),
(9, 7, 1, '2021-06-18', '11:11', 0, 2, 0, 0, 0),
(10, 7, 1, '2021-06-18', '03:45', 4, 1, 2, 0, 0),
(11, 7, 1, '2021-06-18', '00:34', 14, 1, 2, 600000, 0),
(12, 7, 1, '2021-06-18', '14:03', 30, 2, 0, 500000, 0),
(13, 7, 1, '2021-06-18', '13:23', 14, 1, 2, 600000, 0),
(14, 7, 1, '2021-06-18', '12:33', 7, 1, 2, 600000, 0),
(15, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(16, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(17, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(18, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(19, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(20, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(21, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(22, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(23, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(24, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(25, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(26, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(27, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(28, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(29, 7, 1, '2021-06-18', '12:33', 1, 1, 3, 600000, 0),
(30, 7, 1, '2021-06-18', '16:12', 4, 2, 0, 500000, 0),
(31, 7, 1, '2021-06-18', '14:22', 7, 2, 0, 500000, 0),
(32, 7, 1, '2021-06-18', '14:22', 7, 2, 0, 500000, 0),
(33, 7, 1, '2021-06-18', '14:22', 7, 2, 0, 500000, 0),
(34, 7, 1, '2021-06-18', '14:22', 7, 2, 0, 500000, 0),
(35, 7, 1, '2021-06-18', '14:22', 7, 2, 0, 500000, 0),
(36, 7, 1, '2021-06-18', '14:22', 7, 2, 0, 500000, 0),
(37, 7, 1, '2021-06-18', '14:21', 7, 1, 1, 600000, 0),
(38, 7, 1, '2021-06-18', '14:21', 7, 1, 1, 600000, 0),
(39, 7, 1, '2021-06-18', '14:21', 7, 1, 1, 600000, 0),
(40, 7, 1, '2021-06-18', '14:21', 7, 1, 1, 600000, 0),
(41, 7, 1, '2021-06-18', '12:31', 1, 1, 3, 600000, 0),
(42, 1, 1, '2021-06-18', '12:33', 14, 2, 0, 300000, 0),
(43, 1, 1, '2021-06-18', '12:03', 7, 2, 0, 300000, 0),
(44, 1, 1, '2021-06-18', '16:33', 30, 2, 0, 300000, 0),
(45, 3, 1, '2021-06-18', '14:34', 14, 2, 0, 500000, 0),
(46, 7, 1, '2021-06-18', '15:12', 4, 1, 2, 600000, 0),
(47, 1, 1, '2021-06-20', '14:13', 30, 2, 0, 300000, 0),
(48, 2, 1, '2021-06-20', '14:31', 14, 2, 0, 400000, 0),
(49, 2, 1, '2021-06-20', '00:23', 1, 1, 0, 500000, 0),
(50, 2, 1, '2021-06-21', '00:03', 1, 2, 0, 400000, 0),
(51, 2, 1, '2021-06-21', '01:03', 1, 2, 0, 400000, 0),
(52, 2, 1, '2021-06-21', '00:03', 1, 2, 0, 400000, 0),
(53, 2, 1, '2021-06-21', '11:11', 1, 2, 0, 400000, 0),
(54, 6, 1, '2021-06-21', '11:11', 1, 2, 0, 300000, 0),
(55, 1, 1, '2021-06-21', '00:12', 1, 1, 3, 400000, 0),
(56, 1, 1, '2021-06-21', '00:12', 1, 1, 6, 400000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `testi`
--

CREATE TABLE `testi` (
  `id_testi` int(11) NOT NULL,
  `nama_testi` varchar(25) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testi`
--

INSERT INTO `testi` (`id_testi`, `nama_testi`, `pekerjaan`, `pesan`, `rating`, `gambar`) VALUES
(1, 'Ananda Mikola', 'Protokoler Pemerintah', 'Terimakasih KTB Garage telah menjadi mitra kami dalam memenuhi kebutuhan mobil di lingkup pemerintah provinsi Jawa Tengah.', 5, 'testi1.png'),
(2, 'Dirman Syafitra', 'Protokoler Pemerintah', 'Kalau yang mau jalan-jalan di solo dan sekitarnya bisa sewa mobil di tempat ini. Owner sangat baik pelayanan bagus sekali.', 4, 'testi2.png'),
(3, 'Kunto Aji', 'Pengusaha', 'Terimakasih KTB Garage armada mobil bagus, drivernya ramah, owner sangat bersahabat dan harga ramah. Very Very Recomended!!!', 4, 'testi3.png'),
(4, 'Freya Kayonna', 'Ibu Rumah Tangga', 'Terima kasih Atas pelayanannya KTB Garage, mobil bersih, wangi, terawat. Drivernya Pak Bima juga handal & profesional, semoga tambah sukses & maju.', 5, 'testi4.png'),
(5, 'Sabrina Cahya', 'Pengusaha', 'Salah satu perusahaan rental mobil yang menyediakan mobil mewah dan juga armada dengan seat mulai dari 15 seat. Tersedia Toyota Hiace, Isuzu Elf dan Medium Bus.', 5, 'testi5.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama_user`, `no_hp`, `alamat`, `level`) VALUES
(1, 'anelka@anelka', 'anelka', 'anelka', '0812838123', 'Jl. Ir. Sutami No.36, Kentingan, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126', 1),
(4, 'anelka@admin.id', 'anelka', 'anelka', '2147483647', 'Solo', 1),
(5, 'anelka@anelka', 'anelka', 'anelka', '2147483647', 'Soloasd', 1),
(6, 'anelka@anelka', 'anelka', 'anelka', '0801231011', 'anelka', 1),
(7, 'dimas', 'dimas', 'dimas', '08123123312', 'dimas', 1),
(8, 'dito', 'dito', 'dito', '023012832', 'dito', 1),
(13, 'admin@admin', 'admin', 'admin', '000000', 'admin', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `testi`
--
ALTER TABLE `testi`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `testi`
--
ALTER TABLE `testi`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
