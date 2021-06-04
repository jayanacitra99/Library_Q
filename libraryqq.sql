-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 04:41 AM
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
-- Database: `libraryqq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USERNAME`, `PASSWORD`) VALUES
(0, 'admin', 'admin'),
(1, 'jaya', 'jaya');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `KD_BUKU` int(11) NOT NULL,
  `KD_SUPPLIER` int(11) DEFAULT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `NM_BUKU` varchar(255) DEFAULT NULL,
  `PRODUSEN` varchar(255) DEFAULT NULL,
  `JML_STOK` varchar(255) DEFAULT NULL,
  `HARGA` varchar(255) DEFAULT NULL,
  `FOTO` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`KD_BUKU`, `KD_SUPPLIER`, `ID_ADMIN`, `NM_BUKU`, `PRODUSEN`, `JML_STOK`, `HARGA`, `FOTO`) VALUES
(12, 112, 0, 'bodrex migra', 'pt lalala', '200', '1231', '22.jpg'),
(123123, 112, 1, 'asdfasdf', 'asdfasdfasdf', '12', '1234123', 'ttd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `ID_DETIL_TRANSAKSI` int(11) NOT NULL,
  `KD_OBAT` int(11) DEFAULT NULL,
  `KD_TRANSAKSI` int(11) DEFAULT NULL,
  `NM_OBAT` varchar(255) DEFAULT NULL,
  `JUMLAH` varchar(1024) DEFAULT NULL,
  `SUB_TOTAL` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `KD_SUPPLIER` int(11) NOT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `NM_SUPPLIER` varchar(1024) DEFAULT NULL,
  `ALAMAT` varchar(1024) DEFAULT NULL,
  `KOTA` varchar(1024) DEFAULT NULL,
  `TELP` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`KD_SUPPLIER`, `ID_ADMIN`, `NM_SUPPLIER`, `ALAMAT`, `KOTA`, `TELP`) VALUES
(112, 0, 'Sergio', 'Bandung', 'Bandung', '123456789123'),
(1234, 0, 'JAYANAC', 'Ngunut', 'Malang', '81217668985');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `KD_TRANSAKSI` int(11) NOT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `NM_PEMBELI` varchar(255) DEFAULT NULL,
  `TOTAL` varchar(255) DEFAULT NULL,
  `TGL_BELI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`KD_TRANSAKSI`, `ID_ADMIN`, `NM_PEMBELI`, `TOTAL`, `TGL_BELI`) VALUES
(3, 0, 'asdfh', '6', '2017-05-Tue'),
(123, 0, 'Samuel', '20', '2020-04-Thu'),
(2323, 1, 'Agung', '25000', '2017-05-Tue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`KD_BUKU`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_ADMIN`),
  ADD KEY `FK_RELATIONSHIP_5` (`KD_SUPPLIER`);

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD PRIMARY KEY (`ID_DETIL_TRANSAKSI`),
  ADD KEY `FK_RELATIONSHIP_4` (`KD_TRANSAKSI`),
  ADD KEY `FK_RELATIONSHIP_6` (`KD_OBAT`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`KD_SUPPLIER`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_ADMIN`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`KD_TRANSAKSI`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_ADMIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  MODIFY `ID_DETIL_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`KD_SUPPLIER`) REFERENCES `supplier` (`KD_SUPPLIER`);

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`KD_TRANSAKSI`) REFERENCES `transaksi` (`KD_TRANSAKSI`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`KD_OBAT`) REFERENCES `buku` (`KD_BUKU`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
