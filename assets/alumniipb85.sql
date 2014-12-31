-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.6.11 - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for alumniipb85
CREATE DATABASE IF NOT EXISTS `alumniipb85` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `alumniipb85`;


-- Dumping structure for table alumniipb85.alumni
CREATE TABLE IF NOT EXISTS `alumni` (
  `id_alumni` int(11) NOT NULL AUTO_INCREMENT,
  `nama_alumni` varchar(200) DEFAULT NULL,
  `nama_panggilan` varchar(200) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `nrp` varchar(50) DEFAULT NULL,
  `kelompok` varchar(10) DEFAULT NULL,
  `id_prodi` int(11),
  `alamat_rumah` text,
  `alamat_kantor` text,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profesi` varchar(200) DEFAULT NULL,
  `bidang_keahlian` text,
  `foto` varchar(200) DEFAULT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_alumni`),
  UNIQUE KEY `Index 2` (`nrp`),
  UNIQUE KEY `Index 4` (`email`),
  KEY `FK_alumni_prodi` (`id_prodi`),
  CONSTRAINT `FK_alumni_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table alumniipb85.alumni: ~2 rows (approximately)
/*!40000 ALTER TABLE `alumni` DISABLE KEYS */;
INSERT INTO `alumni` (`id_alumni`, `nama_alumni`, `nama_panggilan`, `jenis_kelamin`, `nrp`, `kelompok`, `id_prodi`, `alamat_rumah`, `alamat_kantor`, `no_hp`, `email`, `password`, `profesi`, `bidang_keahlian`, `foto`, `tanggal_daftar`, `status`) VALUES
	(1, 'Firman Fiqri Firdaus', 'Aku', 'Laki-laki', '12345', '5', 5, 'jlasjbaa adflkakdf;a af;adjf a;fad fa;jfa djf', 'asdasd ads ad asd asd ads asd ad asd asd as d', '23456', 'firman.fiqri@gmil.com', '12345', 'salto', 'salto', '/assets/foto/profile/12345.png', '2014-12-28 17:29:24', 0),
	(7, 'Firman Fiqri Firdaus', NULL, 'Laki-laki', '12345ww', NULL, 1, NULL, NULL, NULL, 'firman.fiqri@gmail.com', '123', NULL, NULL, NULL, '2014-12-30 00:33:50', 0);
/*!40000 ALTER TABLE `alumni` ENABLE KEYS */;


-- Dumping structure for table alumniipb85.event
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `nama_event` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_event` date NOT NULL,
  `tempat_event` varchar(200) NOT NULL,
  `foto_event` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table alumniipb85.event: ~2 rows (approximately)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id_event`, `nama_event`, `deskripsi`, `tanggal_event`, `tempat_event`, `foto_event`, `keterangan`, `biaya`) VALUES
	(1, 'Reuni Akbar', 'Acara ini ditujukan untuk memadukan kasih sayang bersama antara alumni IPB angkatan 1985', '2015-12-29', 'Balai Sarbini', 'assets/foto/event/1.jpg', 'Ini keterangan', 0),
	(2, 'Reuni Kecil', 'Ini acara kecil', '2015-01-01', 'Taman Mini Indonesia Indah', 'assets/foto/event/2.jpg', 'Keterangan', 0);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;


-- Dumping structure for table alumniipb85.fakultas
CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table alumniipb85.fakultas: ~2 rows (approximately)
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
	(1, 'FPMIPA'),
	(2, 'FPTK');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;


-- Dumping structure for table alumniipb85.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `id_fakultas` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jurusan`),
  KEY `FK_jurusan_fakultas` (`id_fakultas`),
  CONSTRAINT `FK_jurusan_fakultas` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table alumniipb85.jurusan: ~4 rows (approximately)
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`id_jurusan`, `id_fakultas`, `nama_jurusan`) VALUES
	(1, 1, 'Komputer'),
	(2, 1, 'Kimia'),
	(3, 2, 'Mesin'),
	(4, 2, 'Sipil');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;


-- Dumping structure for table alumniipb85.peserta_event
CREATE TABLE IF NOT EXISTS `peserta_event` (
  `id_peserta_event` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumni` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `no_registrasi` varchar(50) NOT NULL,
  `bank_kami` varchar(100) NOT NULL,
  `jumlah_transfer` int(11) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `bukti_foto` varchar(100) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah_dewasa` int(11) NOT NULL,
  `jumlah_anak` int(11) NOT NULL,
  `tanggal_tiba` date NOT NULL,
  PRIMARY KEY (`id_peserta_event`),
  KEY `FK_peserta_event_alumni` (`id_alumni`),
  KEY `FK_peserta_event_event` (`id_event`),
  CONSTRAINT `FK_peserta_event_alumni` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`),
  CONSTRAINT `FK_peserta_event_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table alumniipb85.peserta_event: ~1 rows (approximately)
/*!40000 ALTER TABLE `peserta_event` DISABLE KEYS */;
INSERT INTO `peserta_event` (`id_peserta_event`, `id_alumni`, `id_event`, `status_pembayaran`, `no_registrasi`, `bank_kami`, `jumlah_transfer`, `atas_nama`, `tanggal_transfer`, `bukti_foto`, `tanggal_daftar`, `jumlah_dewasa`, `jumlah_anak`, `tanggal_tiba`) VALUES
	(4, 7, 1, 0, 'RA10001', '', 0, '', '0000-00-00', '', '2014-12-31 17:07:42', 1, 1, '2014-12-02');
/*!40000 ALTER TABLE `peserta_event` ENABLE KEYS */;


-- Dumping structure for table alumniipb85.prodi
CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `FK_prodi_jurusan` (`id_jurusan`),
  CONSTRAINT `FK_prodi_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table alumniipb85.prodi: ~8 rows (approximately)
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` (`id_prodi`, `id_jurusan`, `nama_prodi`) VALUES
	(1, 1, 'Ilmu Komputer'),
	(2, 1, 'Informatika'),
	(3, 2, 'Kimia Murni'),
	(4, 2, 'Pendidikan Kimia'),
	(5, 3, 'Mesin Bubut'),
	(6, 3, 'Mesin Catok'),
	(7, 4, 'Teknik Sipil'),
	(8, 4, 'Sipil');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
