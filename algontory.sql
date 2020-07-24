-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 02:38 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `algontory`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id`, `nama`, `foto`) VALUES
(2, 'Seni Kempo', 'kempo.jpg'),
(3, 'Pantomim', 'pantomim.jpg'),
(4, 'Seni Reog', 'reog.jpg'),
(5, 'Pramuka', 'pramuka.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `foto`) VALUES
(6, 'Manasik Haji', 'haji.jpg'),
(7, 'Kelas Memasak', 'masak.jpg'),
(8, 'Kelas Outdoor', 'outing.jpg'),
(9, 'Pengajian Rutin', 'pengajian.jpg'),
(10, 'Praktikum Sains', 'sains.jpg'),
(11, 'Salat jamaah', 'solat.jpg'),
(13, 'Tahfidz Quran', 'tahfidz.jpg'),
(14, 'Pondok Ramadan', 'ponram.jpeg'),
(16, 'Pondok Ramadhan', 'IMG-20190511-WA0012.jpg'),
(17, 'Rihlah ustadz ustadzah yysan Algontory', 'DSC_0004.JPG'),
(18, 'Rihlah ustadz ustadzah yysan Algontory', 'IMG_0814.JPG'),
(19, 'Seminar Parenting oleh Ust Suhadi Fadjaray', 'IMG20190407122150.jpg'),
(22, 'Lomba mewarnai dalam rangka PPDB', 'IMG-20190516-WA0024.jpg'),
(23, 'Pemenang lomba mewarnai', 'IMG-20190516-WA0038.jpg'),
(24, 'Haflah Akhirussanah', 'IMG-20190517-WA0004.jpg'),
(25, 'Wisudawan Wisudawati SD Al Gontory Tulungagung pada acara Haflah Akhirussanah', 'IMG-20190518-WA0036.jpg'),
(26, 'Metode gasing SD Algontory,, memudahkan belajar matematika', 'IMG-20190705-WA0017.jpg'),
(27, 'Metode gasing \" gampang,asyik, menyenangkan', 'IMG-20190705-WA0015.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama`, `foto`) VALUES
(2, 'JUARA II ARANSEMEN LAGU TERBAIK LOMBA PLAYING PASS DRUMBAND Se-EKS KARISIDENAN KEDIRI', ''),
(3, 'AMANDA QUEENSYA W.S. JUARA 2 BHS.INGGRIS TINGKAT JATIM', 'ing.jpg'),
(4, 'RUNNER UP PREMIER KIDS FUTSAL TOURNAMENT FEBRUARI 2019', 'futsal.jpg'),
(5, 'AUSTRIN RUFA, A.Z.A.S JUARA 5 MATEMATIKA TINGKAT JATIM', 'mat.jpg'),
(6, 'NAJWA FARADIBA S. JUARA III SAINS TINGKAT JATIM', 'sains.jpg'),
(7, 'JUSTIN IBNU ARJANTA JUARA V MATEMATIKA FESMAT 2017 TINGKAT KABUPATEN', 'mate.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
