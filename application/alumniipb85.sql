-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2014 at 06:10 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumniipb85`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `id_alumni` int(11) NOT NULL AUTO_INCREMENT,
  `nama_alumni` varchar(200) DEFAULT NULL,
  `nama_panggilan` varchar(200) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `nrp` varchar(50) DEFAULT NULL,
  `kelompok` varchar(10) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `alamat_rumah` text,
  `alamat_kantor` text,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profesi` varchar(200) DEFAULT NULL,
  `bidang_keahlian` varchar(200) DEFAULT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_alumni`),
  UNIQUE KEY `Index 2` (`nrp`),
  KEY `FK_alumni_prodi` (`id_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `alumni`
--


-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_event` date NOT NULL,
  `tempat_event` varchar(200) NOT NULL,
  `foto_event` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--


-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--


-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jurusan`),
  KEY `FK_jurusan_fakultas` (`id_fakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--


-- --------------------------------------------------------

--
-- Table structure for table `peserta_event`
--

CREATE TABLE IF NOT EXISTS `peserta_event` (
  `id_peserta_event` int(11) NOT NULL,
  `id_alumni` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `status_event` int(11) NOT NULL,
  `no_registrasi` varchar(50) NOT NULL,
  `bank_kami` varchar(100) NOT NULL,
  `bank_anda` varchar(100) NOT NULL,
  `metode_transfer` varchar(100) NOT NULL,
  `jumlah_transfer` int(11) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `bukti_foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_peserta_event`),
  KEY `FK_peserta_event_alumni` (`id_alumni`),
  KEY `FK_peserta_event_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta_event`
--


-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `FK_prodi_jurusan` (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `FK_alumni_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `FK_jurusan_fakultas` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `peserta_event`
--
ALTER TABLE `peserta_event`
  ADD CONSTRAINT `FK_peserta_event_alumni` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`),
  ADD CONSTRAINT `FK_peserta_event_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `FK_prodi_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
