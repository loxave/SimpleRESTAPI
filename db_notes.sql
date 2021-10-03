-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 04:24 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `author` text NOT NULL,
  `year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `judul`, `author`, `year`) VALUES
(6, 'When the debate is lost, slander becomes the tool of the loser.', 'Socrates', '800SM'),
(7, 'Falling down is not a failure. Failure comes when you stay where you have fallen.\r\n', 'Socrates', '800SM'),
(8, 'When the debate is lost, slander becomes the tool of the loser.', 'Socrates', '800SM'),
(9, 'Falling down is not a failure. Failure comes when you stay where you have fallen.\r\n', 'Socrates', '800SM'),
(11, 'If you want to be wrong then follow the masses.', 'Socrates', '880SM'),
(12, 'Awareness of ignorance is the beginning of wisdom.', 'Socrates', '850SM'),
(14, 'bornei', 'Dhelpia', '550SM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `nama` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `nama`, `gambar`) VALUES
(5, 'darrelkurniawan', 'darrelkurniawan123', 'Darrelkurniawan@gmail.com', 'Darrel Kurniawan', '03a01477b75fcd8085a7f77c3a25368b.jpg'),
(6, 'filsufhebat', 'nietsche_bro', 'nietsche@gmail.com', 'Nietsche', '6898477_20141003082329.jpg'),
(7, 'darrelkurniawan', 'darrelkurniawan123', 'Darrelkurniawan@gmail.com', 'Darrel Kurniawan', '03a01477b75fcd8085a7f77c3a25368b.jpg'),
(8, 'filsufhebat', 'nietsche_bro', 'nietsche@gmail.com', 'Nietsche', '6898477_20141003082329.jpg'),
(9, 'socrates', 'socrates', 'socrates@mail.co.id', 'Socrates', '6898477_20141004122923.jpg'),
(10, 'phytagoras', 'math', 'phytagoras@gmail.com', 'phytagoras', 'a-1cak-com-27651714.png'),
(11, 'socrates', 'socrates', 'socrates@mail.co.id', 'Socrates', '6898477_20141004122923.jpg'),
(12, 'phytagoras', 'math', 'phytagoras@gmail.com', 'phytagoras', 'a-1cak-com-27651714.png'),
(13, '', '', '', '', ''),
(14, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
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
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
