-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2015 at 04:38 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `febi`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(16) NOT NULL DEFAULT '0',
  `nama_mahasiswa` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `fakultas` varchar(20) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `fakultas`, `jurusan`, `agama`) VALUES
('13/344550', 'Febi Ramadhan', 'Cirebon', 'Cirebon', '1995-04-02', 'SEKOLAH VOKASI', 'KOMSI', 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `kode` varchar(16) NOT NULL DEFAULT '',
  `matkul` varchar(25) DEFAULT NULL,
  `sks` varchar(2) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `nim` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kode`, `matkul`, `sks`, `keterangan`, `nim`) VALUES
('123123123123', 'Kurniawan Hendi Wijaya', 'La', 'Pekalongan', ''),
('127654327600', 'Shinta Novitasari', 'Pe', 'Karanganyar', ''),
('145342655088', 'Deny Adiyasa', 'La', 'Bekasi', ''),
('150987600921', 'Nadia Suliestiyanti', 'Pe', 'Tasikmalaya', ''),
('234567123400', 'Fikri Aulia Zhulfikar', 'La', 'Magetan', ''),
('321321321321', 'Nadhia Nuri Tariana', 'Pe', 'Nganjuk', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
