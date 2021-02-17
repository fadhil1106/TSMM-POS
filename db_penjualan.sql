-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table tsmm-pos.tbl_barang
CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `barang_id` varchar(15) NOT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_satuan` varchar(30) DEFAULT NULL,
  `barang_harpok` double DEFAULT NULL,
  `barang_harjul` double DEFAULT NULL,
  `barang_harjul_grosir` double DEFAULT NULL,
  `barang_stok` int(11) DEFAULT '0',
  `barang_min_stok` int(11) DEFAULT '0',
  `barang_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `barang_tgl_last_update` datetime DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `barang_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`barang_id`),
  KEY `barang_user_id` (`barang_user_id`),
  KEY `barang_kategori_id` (`barang_kategori_id`),
  CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`barang_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`barang_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tsmm-pos.tbl_barang: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_barang` DISABLE KEYS */;
INSERT INTO `tbl_barang` (`barang_id`, `barang_nama`, `barang_satuan`, `barang_harpok`, `barang_harjul`, `barang_harjul_grosir`, `barang_stok`, `barang_min_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `barang_user_id`) VALUES
	('BR000001', 'Bunga Matqahari', 'PCS', 500000, 500000, 500000, -2, 1, '2021-02-16 16:32:27', NULL, 40, 1);
/*!40000 ALTER TABLE `tbl_barang` ENABLE KEYS */;

-- Dumping structure for table tsmm-pos.tbl_beli
CREATE TABLE IF NOT EXISTS `tbl_beli` (
  `beli_nofak` varchar(15) DEFAULT NULL,
  `beli_tanggal` date DEFAULT NULL,
  `beli_suplier_id` int(11) DEFAULT NULL,
  `beli_user_id` int(11) DEFAULT NULL,
  `beli_kode` varchar(15) NOT NULL,
  PRIMARY KEY (`beli_kode`),
  KEY `beli_user_id` (`beli_user_id`),
  KEY `beli_suplier_id` (`beli_suplier_id`),
  KEY `beli_id` (`beli_kode`),
  CONSTRAINT `tbl_beli_ibfk_1` FOREIGN KEY (`beli_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_beli_ibfk_2` FOREIGN KEY (`beli_suplier_id`) REFERENCES `tbl_suplier` (`suplier_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tsmm-pos.tbl_beli: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_beli` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_beli` ENABLE KEYS */;

-- Dumping structure for table tsmm-pos.tbl_detail_beli
CREATE TABLE IF NOT EXISTS `tbl_detail_beli` (
  `d_beli_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_beli_nofak` varchar(15) DEFAULT NULL,
  `d_beli_barang_id` varchar(15) DEFAULT NULL,
  `d_beli_harga` double DEFAULT NULL,
  `d_beli_jumlah` int(11) DEFAULT NULL,
  `d_beli_total` double DEFAULT NULL,
  `d_beli_kode` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`d_beli_id`),
  KEY `d_beli_barang_id` (`d_beli_barang_id`),
  KEY `d_beli_nofak` (`d_beli_nofak`),
  KEY `d_beli_kode` (`d_beli_kode`),
  CONSTRAINT `tbl_detail_beli_ibfk_1` FOREIGN KEY (`d_beli_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_detail_beli_ibfk_2` FOREIGN KEY (`d_beli_kode`) REFERENCES `tbl_beli` (`beli_kode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tsmm-pos.tbl_detail_beli: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_detail_beli` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_detail_beli` ENABLE KEYS */;

-- Dumping structure for table tsmm-pos.tbl_detail_jual
CREATE TABLE IF NOT EXISTS `tbl_detail_jual` (
  `d_jual_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL,
  PRIMARY KEY (`d_jual_id`),
  KEY `d_jual_barang_id` (`d_jual_barang_id`),
  KEY `d_jual_nofak` (`d_jual_nofak`),
  CONSTRAINT `tbl_detail_jual_ibfk_1` FOREIGN KEY (`d_jual_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_detail_jual_ibfk_2` FOREIGN KEY (`d_jual_nofak`) REFERENCES `tbl_jual` (`jual_nofak`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table tsmm-pos.tbl_detail_jual: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_detail_jual` DISABLE KEYS */;
INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
	(1, '160221000001', 'BR000001', 'Bunga Matqahari', 'PCS', 500000, 50000, 1, 0, 50000),
	(2, '160221000002', 'BR000001', 'Bunga Matqahari', 'PCS', NULL, NULL, 4, NULL, 2800000),
	(3, '160221000003', 'BR000001', 'Bunga Matqahari', 'PCS', 0, 500000, 1, 0, 500000);
/*!40000 ALTER TABLE `tbl_detail_jual` ENABLE KEYS */;

-- Dumping structure for table tsmm-pos.tbl_jual
CREATE TABLE IF NOT EXISTS `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`jual_nofak`),
  KEY `jual_user_id` (`jual_user_id`),
  CONSTRAINT `tbl_jual_ibfk_1` FOREIGN KEY (`jual_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tsmm-pos.tbl_jual: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_jual` DISABLE KEYS */;
INSERT INTO `tbl_jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`) VALUES
	('160221000001', '2021-02-16 17:01:23', 50000, 50000, 0, 1, 'eceran'),
	('160221000002', '2021-02-16 18:41:16', 2800000, 3000000, 200000, 1, 'eceran'),
	('160221000003', '2021-02-16 18:48:34', 500000, 500000, 0, 1, 'eceran');
/*!40000 ALTER TABLE `tbl_jual` ENABLE KEYS */;

-- Dumping structure for table tsmm-pos.tbl_kategori
CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table tsmm-pos.tbl_kategori: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
	(40, 'Tenant Amel');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;

-- Dumping structure for table tsmm-pos.tbl_retur
CREATE TABLE IF NOT EXISTS `tbl_retur` (
  `retur_id` int(11) NOT NULL AUTO_INCREMENT,
  `retur_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `retur_barang_id` varchar(15) DEFAULT NULL,
  `retur_barang_nama` varchar(150) DEFAULT NULL,
  `retur_barang_satuan` varchar(30) DEFAULT NULL,
  `retur_harjul` double DEFAULT NULL,
  `retur_qty` int(11) DEFAULT NULL,
  `retur_subtotal` double DEFAULT NULL,
  `retur_keterangan` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`retur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tsmm-pos.tbl_retur: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_retur` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_retur` ENABLE KEYS */;

-- Dumping structure for table tsmm-pos.tbl_suplier
CREATE TABLE IF NOT EXISTS `tbl_suplier` (
  `suplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `suplier_nama` varchar(35) DEFAULT NULL,
  `suplier_alamat` varchar(60) DEFAULT NULL,
  `suplier_notelp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`suplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tsmm-pos.tbl_suplier: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_suplier` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_suplier` ENABLE KEYS */;

-- Dumping structure for table tsmm-pos.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL,
  `user_status` varchar(2) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table tsmm-pos.tbl_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_status`) VALUES
	(1, 'helpdesk', 'helpdesk', '2aa5361c6d9a8966f35ddf6def64edd4', '1', '1'),
	(2, 'Kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', '2', '1');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
