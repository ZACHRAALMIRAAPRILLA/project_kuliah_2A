-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_medikaapp.tb_kategori_pasien
CREATE TABLE IF NOT EXISTS `tb_kategori_pasien` (
  `id_kat_pasien` int NOT NULL AUTO_INCREMENT,
  `jenis_pasien` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_kat_pasien`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_medikaapp.tb_kategori_pasien: ~3 rows (approximately)
DELETE FROM `tb_kategori_pasien`;
INSERT INTO `tb_kategori_pasien` (`id_kat_pasien`, `jenis_pasien`, `kategori_pasien`) VALUES
	(2, 'Asuransi', 'rujukan'),
	(3, 'Umum', 'rawat inap');

-- Dumping structure for table db_medikaapp.tb_list_pemeriksaan
CREATE TABLE IF NOT EXISTS `tb_list_pemeriksaan` (
  `id_list_pemeriksaan` int NOT NULL AUTO_INCREMENT,
  `pasien` int DEFAULT NULL,
  `kode_pemeriksaan` bigint DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `catatan` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_list_pemeriksaan`),
  KEY `pasien` (`pasien`),
  KEY `kode_pemeriksaan` (`kode_pemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_medikaapp.tb_list_pemeriksaan: ~0 rows (approximately)
DELETE FROM `tb_list_pemeriksaan`;

-- Dumping structure for table db_medikaapp.tb_pembayaran
CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
  `id_bayar` bigint NOT NULL,
  `no_asuransi` bigint DEFAULT NULL,
  `total_bayar` bigint DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_medikaapp.tb_pembayaran: ~0 rows (approximately)
DELETE FROM `tb_pembayaran`;

-- Dumping structure for table db_medikaapp.tb_pemeriksaan
CREATE TABLE IF NOT EXISTS `tb_pemeriksaan` (
  `id_pemeriksaan` bigint NOT NULL AUTO_INCREMENT,
  `pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruangan` int DEFAULT NULL,
  `perawat` int DEFAULT NULL,
  `waktu_pemeriksaan` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pemeriksaan`) USING BTREE,
  KEY `perawat` (`perawat`),
  CONSTRAINT `FK_tb_pemeriksaan_tb_user` FOREIGN KEY (`perawat`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2312241137129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_medikaapp.tb_pemeriksaan: ~7 rows (approximately)
DELETE FROM `tb_pemeriksaan`;
INSERT INTO `tb_pemeriksaan` (`id_pemeriksaan`, `pasien`, `ruangan`, `perawat`, `waktu_pemeriksaan`) VALUES
	(2312232059834, 'hh', 8, 1, '2023-12-23 13:59:47'),
	(2312232126230, 'jara', 6, 1, '2023-12-23 14:26:48'),
	(2312232201271, 'raaa', 1, 1, '2023-12-23 15:01:53'),
	(2312232300673, 'eja', 7, 1, '2023-12-23 16:00:37'),
	(2312232305999, 'j', 5, 1, '2023-12-23 16:05:52'),
	(2312232317540, 'jara', 1, 1, '2023-12-23 16:17:22'),
	(2312241137128, 'k', 8, 1, '2023-12-24 04:38:13');

-- Dumping structure for table db_medikaapp.tb_riwayat_pasien
CREATE TABLE IF NOT EXISTS `tb_riwayat_pasien` (
  `id_pasien` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pasien` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `hasil` int DEFAULT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `kategori` (`kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_medikaapp.tb_riwayat_pasien: ~0 rows (approximately)
DELETE FROM `tb_riwayat_pasien`;

-- Dumping structure for table db_medikaapp.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int DEFAULT '0',
  `nohp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_medikaapp.tb_user: ~4 rows (approximately)
DELETE FROM `tb_user`;
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(1, 'admin', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '123456789', 'langsa'),
	(2, 'dokter', 'dokter@dokter.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '123456789', 'lhokseumawe'),
	(3, 'pasien', 'pasien@pasien.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '12345678999', 'bandaaceh'),
	(4, 'operator', 'operator@operator.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '123456789', 'medan');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
