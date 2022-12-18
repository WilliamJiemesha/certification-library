-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2022 at 03:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sertifikasi_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `auto_num` int(10) NOT NULL,
  `id_admin` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`auto_num`, `id_admin`, `username`, `password`) VALUES
(1, '', 'admin', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `auto_num` int(20) NOT NULL,
  `id_buku` varchar(21) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `summary` varchar(1000) NOT NULL,
  `release_year` varchar(4) NOT NULL,
  `image_string` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`auto_num`, `id_buku`, `judul`, `authors`, `summary`, `release_year`, `image_string`) VALUES
(1, 'B1', 'White Fang', 'Jack London', 'The adventures in the northern wilderness of a dog who is part wolf and how he comes to make his peace with man', '2001', 'white_fang.jpg'),
(4, 'B4', 'The adventures of Tom Sawyer', 'Mark Twain', 'The classic story of a mischievous nineteenth-century boy in a Mississippi River town and his friends, Huck Finn and Becky Thatcher, as they run away from home, witness a murder, and find treasure in a cave', '2019', 'tom_sawyer.jpg'),
(5, 'B5', 'Moby-Dick', 'Herman Melville (Author), Hester Blum (Editor)', 'Moby-Dick has a monumental reputation. Less well known are the novel\'s unexpectedly weird, funny, tantalizing, messy, and wondrous moments. Narrator Ishmael, along with the whaleship Pequod\'s other \"meanest mariners, and renegades and castaways\", is beguiled into joining Captain Ahab in his vengeful pursuit of the white whale that \"dismasted\" him. But along the way, Ishmael takes the reader along many a detour into variegated ways of knowing. In a tone \"strangely compounded of fun and fury\", Moby-Dick brings outlandish curiosity to bear on the multitudinous, oceanic scale of our diverse world', '2022', 'moby_dick.jpg'),
(6, 'B6', 'Madame Bovary', 'Gustave Flaubert, Lowell Bair, Leo Bersani', 'A powerful nineteenth-century French classic depicting the moral degeneration of a weak-willed woman', '1981', 'madame_bovary.jpg');

--
-- Triggers `buku`
--
DELIMITER $$
CREATE TRIGGER `GenerateIDBuku` BEFORE INSERT ON `buku` FOR EACH ROW BEGIN

SET @id = (SELECT COALESCE(MAX(auto_num),0)+1 FROM buku);

SET new.id_buku = CONCAT('B', @id);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `auto_num` int(10) NOT NULL,
  `id_peminjam` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`auto_num`, `id_peminjam`, `username`, `password`) VALUES
(1, 'U1', 'WilliamJie', '12345678'),
(2, 'U2', 'Sardine', '12345678');

--
-- Triggers `peminjam`
--
DELIMITER $$
CREATE TRIGGER `GenerateIDPeminjam` BEFORE INSERT ON `peminjam` FOR EACH ROW BEGIN

SET @id = (SELECT COALESCE(MAX(auto_num),0)+1 FROM peminjam);

SET new.id_peminjam = CONCAT('U', @id);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `auto_num` int(20) NOT NULL,
  `id_pinjaman` varchar(21) NOT NULL,
  `id_peminjam` varchar(11) NOT NULL,
  `id_buku` varchar(21) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`auto_num`, `id_pinjaman`, `id_peminjam`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(1, 'P1', '\'U1\'', '\'B2\'', '2022-12-18', '2022-12-25'),
(2, 'P2', '\'U1\'', '\'B2\'', '2022-12-18', '2022-12-25'),
(3, 'P3', '\'U1\'', '\'B2\'', '2022-12-18', '2022-12-25'),
(4, 'P4', 'U1', 'B2', '2022-12-18', '2022-12-25'),
(5, 'P5', 'U1', 'B2', '2022-12-06', '2022-12-13'),
(6, 'P6', 'U1', 'B3', '2022-12-15', '2022-12-22'),
(7, 'P7', 'U1', 'B4', '2022-12-30', '2023-01-06'),
(8, 'P8', 'U1', 'B3', '2022-12-07', '2022-12-14'),
(9, 'P9', 'U1', 'B5', '2022-12-14', '2022-12-21'),
(10, 'P10', 'U1', 'B5', '2022-12-03', '2022-12-10'),
(11, 'P11', 'U1', 'B6', '2022-12-12', '2022-12-19');

--
-- Triggers `pinjaman`
--
DELIMITER $$
CREATE TRIGGER `GenerateIDPinjaman` BEFORE INSERT ON `pinjaman` FOR EACH ROW BEGIN

SET @id = (SELECT COALESCE(MAX(auto_num),0)+1 FROM pinjaman);

SET new.id_pinjaman = CONCAT('P', @id);

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`auto_num`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`auto_num`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`auto_num`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`auto_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `auto_num` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `auto_num` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `auto_num` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `auto_num` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
