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

-- Dumping structure for table db_decafe.tb_bayar
CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` bigint NOT NULL,
  `nominal_uang` bigint DEFAULT NULL,
  `jumlah` bigint DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_decafe.tb_bayar: ~0 rows (approximately)

-- Dumping structure for table db_decafe.tb_daftar_menu
CREATE TABLE IF NOT EXISTS `tb_daftar_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_menu` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `harga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `stok` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_tb_daftar_menu_tb_kategori_menu` (`kategori`) USING BTREE,
  CONSTRAINT `FK_tb_daftar_menu_tb_kategori_menu` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_menu` (`id_kat_menu`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_decafe.tb_daftar_menu: ~4 rows (approximately)
INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
	(1, '15906-1.png', 'Mie', 'Pedes', 8, '5000', '8'),
	(2, '82801-2.png', 'Burger', 'Pakai keju', 8, '4000', '12'),
	(3, '86393-12.png', 'Jus mangga', 'Dingin', 6, '2000', '10'),
	(4, '41339-11.png', 'Boba', 'Panas', 4, '3000', '4');

-- Dumping structure for table db_decafe.tb_kategori_menu
CREATE TABLE IF NOT EXISTS `tb_kategori_menu` (
  `id_kat_menu` int NOT NULL AUTO_INCREMENT,
  `jenis_menu` int DEFAULT NULL,
  `kategori_menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kat_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_decafe.tb_kategori_menu: ~4 rows (approximately)
INSERT INTO `tb_kategori_menu` (`id_kat_menu`, `jenis_menu`, `kategori_menu`) VALUES
	(4, 2, 'Kopi'),
	(6, 2, 'Teh'),
	(7, 1, 'Nasi'),
	(8, 1, 'Snack');

-- Dumping structure for table db_decafe.tb_list_order
CREATE TABLE IF NOT EXISTS `tb_list_order` (
  `id_list_order` int NOT NULL AUTO_INCREMENT,
  `menu` int DEFAULT NULL,
  `kode_order` bigint DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `catatan` varchar(300) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_list_order`) USING BTREE,
  KEY `menu` (`menu`),
  KEY `order` (`kode_order`) USING BTREE,
  CONSTRAINT `FK_tb_list_order_tb_daftar_menu` FOREIGN KEY (`menu`) REFERENCES `tb_daftar_menu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_list_order_tb_order` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_decafe.tb_list_order: ~6 rows (approximately)
INSERT INTO `tb_list_order` (`id_list_order`, `menu`, `kode_order`, `jumlah`, `catatan`, `status`) VALUES
	(1, 2, 2, 3, 'n', NULL),
	(2, 1, 2, 4, '', NULL),
	(3, 1, 5, 5, '', NULL),
	(4, 2, 5, 7, '', NULL),
	(7, 2, 2311050817783, 66, 'feer', NULL),
	(8, 1, 2311050817783, 2, 'jhshgd', NULL);

-- Dumping structure for table db_decafe.tb_order
CREATE TABLE IF NOT EXISTS `tb_order` (
  `id_order` bigint NOT NULL DEFAULT '0',
  `pelanggan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `meja` int DEFAULT NULL,
  `pelayan` int DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `waktu_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`) USING BTREE,
  KEY `pelayan` (`pelayan`),
  CONSTRAINT `FK_tb_order_tb_user` FOREIGN KEY (`pelayan`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_decafe.tb_order: ~6 rows (approximately)
INSERT INTO `tb_order` (`id_order`, `pelanggan`, `meja`, `pelayan`, `status`, `waktu_order`) VALUES
	(2311060508714, 'ani', 1, 2, NULL, '2023-11-05 22:08:41'),
	(2311060508717, 'beala', 2, 2, NULL, '2023-11-05 22:09:04'),
	(2311060509141, 'cipa', 3, 2, NULL, '2023-11-05 22:09:29'),
	(2311060509258, 'andi', 5, 2, NULL, '2023-11-05 22:09:56'),
	(2311060510641, 'budi', 5, 2, NULL, '2023-11-05 22:10:14');

-- Dumping structure for table db_decafe.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_decafe.tb_user: ~3 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(2, 'owner', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '089561728910', 'lhokseumawe'),
	(3, 'abc2', 'abc2@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '089561728910', 'lhokseumawe'),
	(4, 'abc3', 'abc3@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '089561728910', 'lhokseumawe'),
	(37, 'abc1', 'abc1@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '1234567890', 'Lhokseumawe\r\n');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
