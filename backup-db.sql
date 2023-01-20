-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for intra_masjid
CREATE DATABASE IF NOT EXISTS `intra_masjid` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `intra_masjid`;

-- Dumping structure for table intra_masjid.artikels
CREATE TABLE IF NOT EXISTS `artikels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint(20) DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi_artikel` text COLLATE utf8mb4_unicode_ci,
  `status` enum('draft','publish') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.artikels: ~0 rows (approximately)
/*!40000 ALTER TABLE `artikels` DISABLE KEYS */;
/*!40000 ALTER TABLE `artikels` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table intra_masjid.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.jabatan: ~8 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`id`, `nm_jabatan`, `created_at`, `updated_at`) VALUES
	(1, 'Ketua Umum Dewan Kemakmuran Masjid', '2023-01-17 00:11:39', '2023-01-17 00:11:57'),
	(2, 'Wakil Ketua', '2023-01-17 00:12:23', '2023-01-17 00:12:23'),
	(3, 'Sekretaris', '2023-01-17 00:12:32', '2023-01-17 00:12:32'),
	(4, 'Bendahara', '2023-01-17 00:12:41', '2023-01-17 00:12:41'),
	(5, 'Bidang Ibadah', '2023-01-17 00:12:57', '2023-01-17 00:13:12'),
	(6, 'Bidang Pendidikan dan Dakwah', '2023-01-17 00:13:35', '2023-01-17 00:13:35'),
	(7, 'Bidang Rumah Tangga', '2023-01-17 00:13:53', '2023-01-17 00:13:53'),
	(8, 'Bidang Sosial dan Kemasyarakatan', '2023-01-17 00:14:13', '2023-01-17 00:14:13'),
	(9, 'Bidang Humas dan Teknologi Informasi', '2023-01-17 00:14:33', '2023-01-17 00:14:33'),
	(10, 'Bidang Peringatan Hari Besar Islam', '2023-01-17 00:15:18', '2023-01-17 00:15:18');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.jamaah
CREATE TABLE IF NOT EXISTS `jamaah` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kd_jamaah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_jamaah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_users` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.jamaah: ~1 rows (approximately)
/*!40000 ALTER TABLE `jamaah` DISABLE KEYS */;
INSERT INTO `jamaah` (`id`, `kd_jamaah`, `nm_jamaah`, `jk`, `no_hp`, `email`, `alamat`, `id_users`, `created_at`, `updated_at`) VALUES
	(1, 'JMHEXTL', 'Warkim', 'L', '081314408686', 'x1syah@gmail.com', 'Taman Alamanda Blok C1 No. 20', 13, '2023-01-17 13:48:18', '2023-01-17 13:48:18');
/*!40000 ALTER TABLE `jamaah` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.jenis_kegiatans
CREATE TABLE IF NOT EXISTS `jenis_kegiatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_jenis_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.jenis_kegiatans: ~14 rows (approximately)
/*!40000 ALTER TABLE `jenis_kegiatans` DISABLE KEYS */;
INSERT INTO `jenis_kegiatans` (`id`, `nm_jenis_kegiatan`, `created_at`, `updated_at`) VALUES
	(1, 'Kajian Islam Kamis Malam', '2023-01-17 13:52:02', '2023-01-17 14:03:26'),
	(2, 'Kajian Islam Ahad Pagi', '2023-01-17 13:53:36', '2023-01-17 14:03:03'),
	(3, 'Pembacaan Hadis Riyadus Sholihin', '2023-01-17 13:54:04', '2023-01-17 14:04:12'),
	(4, 'Pengajian Muslimat Sabtu Sore', '2023-01-17 13:54:24', '2023-01-17 14:05:16'),
	(5, 'Jum\'at Berkah', '2023-01-17 13:56:47', '2023-01-17 14:05:53'),
	(6, 'Gebyar Muharram', '2023-01-17 13:57:25', '2023-01-17 14:07:24'),
	(7, 'Penyembelihan Hewan Kurban', '2023-01-17 14:08:26', '2023-01-17 14:08:26'),
	(8, 'Sholat Jum\'at Berjamaah', '2023-01-17 14:13:12', '2023-01-17 14:13:12'),
	(9, 'Sholat Taraweh Berjamaah', '2023-01-17 14:13:28', '2023-01-17 14:13:28'),
	(10, 'Tadarus Al Qur\'an', '2023-01-17 14:13:42', '2023-01-17 14:13:42'),
	(11, 'Buka Puasa Bersama', '2023-01-17 14:14:01', '2023-01-17 14:14:01'),
	(12, 'Pesantren Kilat', '2023-01-17 14:14:21', '2023-01-17 14:14:21'),
	(13, 'Penerimaan dan Pembagian Zakat Fitrah', '2023-01-17 14:15:21', '2023-01-17 14:15:21'),
	(14, 'Santunan Anak Yatim dan Dhuafa', '2023-01-17 14:18:16', '2023-01-17 14:18:16');
/*!40000 ALTER TABLE `jenis_kegiatans` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.jenis_transaksi
CREATE TABLE IF NOT EXISTS `jenis_transaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_jenis_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.jenis_transaksi: ~18 rows (approximately)
/*!40000 ALTER TABLE `jenis_transaksi` DISABLE KEYS */;
INSERT INTO `jenis_transaksi` (`id`, `nm_jenis_transaksi`, `tipe_transaksi`, `created_at`, `updated_at`) VALUES
	(1, 'Saldo Awal', 'masuk', '2023-01-17 00:55:44', '2023-01-17 00:55:44'),
	(2, 'Penarikan Celengan Bulanan', 'masuk', '2023-01-17 00:56:20', '2023-01-17 00:56:20'),
	(3, 'Kotak Amal Jum\'at', 'masuk', '2023-01-17 00:56:30', '2023-01-17 00:56:30'),
	(4, 'Kotak Amal Subuh', 'masuk', '2023-01-17 00:56:42', '2023-01-17 08:58:15'),
	(5, 'Konsumsi Kajian Ahad Pagi', 'keluar', '2023-01-17 00:57:13', '2023-01-17 00:57:13'),
	(6, 'Konsumsi Kajian Kamis Malam', 'keluar', '2023-01-17 00:57:28', '2023-01-17 00:57:28'),
	(7, 'Biaya Operasional Sholat Jum\'at', 'keluar', '2023-01-17 00:57:49', '2023-01-17 00:57:49'),
	(8, 'Biaya Kafalah Guru Ngaji', 'keluar', '2023-01-17 00:58:05', '2023-01-17 00:58:05'),
	(9, 'Biaya Perlengkapan Bulanan Masjid', 'keluar', '2023-01-17 00:58:21', '2023-01-17 00:58:21'),
	(10, 'Tagihan Internet Masjid', 'keluar', '2023-01-17 00:59:04', '2023-01-17 00:59:04'),
	(11, 'Tagihan Listrik Masjid', 'keluar', '2023-01-17 00:59:41', '2023-01-17 00:59:41'),
	(12, 'Biaya Kajian Kamis Malam', 'keluar', '2023-01-17 09:11:58', '2023-01-17 09:11:58'),
	(13, 'Biaya Kajian Ahad Pagi', 'keluar', '2023-01-17 09:12:10', '2023-01-17 09:12:10'),
	(14, 'Biaya Fotocopi Undangan', 'keluar', '2023-01-17 09:14:50', '2023-01-17 09:14:50'),
	(15, 'Donasi Lingkungan Sekitar Masjid', 'keluar', '2023-01-17 09:19:38', '2023-01-17 09:19:38'),
	(16, 'Biaya Gaji Marbot', 'keluar', '2023-01-17 09:24:40', '2023-01-17 09:24:40'),
	(17, 'Biaya Cetak Kalender', 'keluar', '2023-01-17 09:27:13', '2023-01-17 09:27:13'),
	(18, 'Biaya Pembuatan Pagar', 'keluar', '2023-01-17 09:33:30', '2023-01-17 09:33:30');
/*!40000 ALTER TABLE `jenis_transaksi` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.jenis_transaksi_bmm
CREATE TABLE IF NOT EXISTS `jenis_transaksi_bmm` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_jenis_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.jenis_transaksi_bmm: ~0 rows (approximately)
/*!40000 ALTER TABLE `jenis_transaksi_bmm` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis_transaksi_bmm` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.kajians
CREATE TABLE IF NOT EXISTS `kajians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topikkajian_id` bigint(20) DEFAULT NULL,
  `kegiatan_id` bigint(20) DEFAULT NULL,
  `isi_kajian` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.kajians: ~2 rows (approximately)
/*!40000 ALTER TABLE `kajians` DISABLE KEYS */;
INSERT INTO `kajians` (`id`, `topikkajian_id`, `kegiatan_id`, `isi_kajian`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '<div>Iringilah kejelekan itu dengan kebaikan niscaya kebaikan itu akan menghapusnya (kejelekan). Dan pergaulilah manusia dengan pergaulan yang baik.”<br>(HR. At Tirmidzi)<br><br></div><div><strong>Bergaul dengan manusia dengan akhlak yang baik.<br></strong><br></div><div>Agama dibagi 3 :<br><br></div><ul><li>aqidah,</li><li>syariah ,</li><li>akhlak.</li></ul><div><strong>Aqidah :</strong> sumber dan hakikat keberadaan agama.<br><strong>Syariah</strong> : menggambarkan fungsi agama.<br><br></div><div><strong>Definisi ahlak</strong> :<br><br></div><div>Akhlak adalah perangai,tabiat/ karakter.<br>Ahlak terbagi menjadi 2 :<br><br></div><div>Yaitu Akhlak yang terpuji dan Akhlak yang tercela.<br><br></div><div><strong>Perbedaan adab dan ahlak.<br></strong><br></div><ul><li>Ahlak adalah karakter ,</li><li>Adab adalah Perbuatan</li></ul><div><strong>Ahlak mulia berat timbangannya di akherat</strong> .<br><br></div><div>Ada didalam hadits, diantaranya hadits berikut ini :<br><br></div><div dir="rtl">عَنْ أَبِي الدَّرْدَاءِ أَنَّ النَّبِيَّ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ قَالَ مَا شَيْءٌ أَثْقَلُ فِي مِيزَانِ الْمُؤْمِنِ يَوْمَ الْقِيَامَةِ مِنْ خُلُقٍ حَسَنٍ وَإِنَّ اللَّهَ لَيُبْغِضُ الْفَاحِشَ الْبَذِيءَ<br><br></div><div>Dari Abu Darda’ radhiallahu anhu bahwasanya Nabi shallallahu alaihi was sallam bersabda, “Tidak ada sesuatu yang lebih berat dalam timbangan seorang mukmin kelak ada hari kiamat daripada akhlak yang baik. Sesungguhnya Allah amatlah murka terhadap seseorang yang keji lagi jahat.” (HR. Tirmidzi)<br><br></div><div>&nbsp;<br><br></div><div dir="rtl">أَنَا زَعِيمٌ بِبَيْتٍ فِي رَبَضِ الْجَنَّةِ لِمَنْ تَرَكَ الْمِرَاءَ وَإِنْ كَانَ مُحِقًّا وَبِبَيْتٍ فِي وَسَطِ الْجَنَّةِ لِمَنْ تَرَكَ الْكَذِبَ وَإِنْ كَانَ مَازِحًا وَبِبَيْتٍ فِي أَعْلَى الْجَنَّةِ لِمَنْ حَسَّنَ خُلُقَهُ<br><br></div><div>“Aku adalah penjamin sebuah rumah di sekitar taman (Surga) bagi seseorang yang meniggalkan perdebatan walaupun ia benar, penjamin rumah ditengah Surga bagi orang yang meninggalkan dusta walaupun ia bercanda, juga menjadi penjamin sebuah rumah di Surga paling atas bagi orang yang memiliki akhlak yang baik.”<br><br></div><div>(HR. Abu Dawud)<br><br></div>', 'Administrator', '2023-01-17 15:26:12', '2023-01-17 17:34:55'),
	(2, 3, 1, '<div>Aku adalah penjamin sebuah rumah di sekitar taman (Surga) bagi seseorang yang meniggalkan perdebatan walaupun ia benar, penjamin rumah ditengah Surga bagi orang yang meninggalkan dusta walaupun ia bercanda, juga menjadi penjamin sebuah rumah di Surga paling atas bagi orang yang memiliki akhlak yang baik.” xxxxxxxxxxx</div>', 'Administrator', '2023-01-17 17:40:43', '2023-01-17 18:09:23');
/*!40000 ALTER TABLE `kajians` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.kasbmm
CREATE TABLE IF NOT EXISTS `kasbmm` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `waktu` datetime DEFAULT NULL,
  `nominal_masuk` bigint(20) DEFAULT NULL,
  `nominal_keluar` bigint(20) DEFAULT NULL,
  `jenistransaksibmm_id` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.kasbmm: ~0 rows (approximately)
/*!40000 ALTER TABLE `kasbmm` DISABLE KEYS */;
/*!40000 ALTER TABLE `kasbmm` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.kasmasjid
CREATE TABLE IF NOT EXISTS `kasmasjid` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `waktu` datetime DEFAULT NULL,
  `nominal_masuk` bigint(20) DEFAULT NULL,
  `nominal_keluar` bigint(20) DEFAULT NULL,
  `jenistransaksi_id` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.kasmasjid: ~44 rows (approximately)
/*!40000 ALTER TABLE `kasmasjid` DISABLE KEYS */;
INSERT INTO `kasmasjid` (`id`, `waktu`, `nominal_masuk`, `nominal_keluar`, `jenistransaksi_id`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, '2022-12-01 08:45:12', 19863700, 0, 1, 'Administrator', '2023-01-17 08:45:12', NULL),
	(2, '2022-12-04 08:57:42', 9306000, 0, 2, 'Administrator', '2023-01-17 08:57:42', NULL),
	(3, '2022-12-02 08:58:38', 700000, 0, 3, 'Administrator', '2023-01-17 08:58:38', NULL),
	(4, '2022-12-02 08:59:02', 600000, 0, 4, 'Administrator', '2023-01-17 08:59:02', NULL),
	(5, '2022-12-09 08:59:29', 1060000, 0, 3, 'Administrator', '2023-01-17 08:59:29', NULL),
	(7, '2022-12-16 09:01:12', 750000, 0, 3, 'Administrator', '2023-01-17 09:01:12', NULL),
	(8, '2022-12-16 09:01:29', 650000, 0, 4, 'Administrator', '2023-01-17 09:01:29', NULL),
	(9, '2022-12-23 09:01:45', 800000, 0, 3, 'Administrator', '2023-01-17 09:01:45', NULL),
	(10, '2022-12-23 09:02:05', 650000, 0, 4, 'Administrator', '2023-01-17 09:02:05', NULL),
	(11, '2022-12-30 09:02:25', 1000000, 0, 3, 'Administrator', '2023-01-17 09:02:25', NULL),
	(12, '2022-12-30 09:02:44', 650000, 0, 4, 'Administrator', '2023-01-17 09:02:44', NULL),
	(13, '2022-12-09 09:09:46', 650000, 0, 4, 'Administrator', '2023-01-17 09:09:46', NULL),
	(14, '2022-12-01 09:12:36', 0, 400000, 12, 'Administrator', '2023-01-17 09:12:36', NULL),
	(15, '2022-12-01 09:13:00', 0, 100000, 6, 'Administrator', '2023-01-17 09:13:00', NULL),
	(16, '2022-12-01 09:13:47', 0, 150000, 10, 'Administrator', '2023-01-17 09:13:47', NULL),
	(17, '2022-12-01 09:15:19', 0, 100000, 14, 'Administrator', '2023-01-17 09:15:19', NULL),
	(18, '2022-12-02 09:15:48', 0, 600000, 7, 'Administrator', '2023-01-17 09:15:48', NULL),
	(19, '2022-12-03 09:16:10', 0, 2400000, 8, 'Administrator', '2023-01-17 09:16:10', NULL),
	(20, '2022-12-04 09:16:45', 0, 400000, 13, 'Administrator', '2023-01-17 09:16:45', NULL),
	(21, '2022-12-04 09:17:04', 0, 250000, 5, 'Administrator', '2023-01-17 09:17:04', NULL),
	(22, '2022-12-04 09:17:26', 0, 421000, 11, 'Administrator', '2023-01-17 09:17:26', NULL),
	(23, '2022-12-04 09:17:42', 0, 352000, 9, 'Administrator', '2023-01-17 09:17:42', NULL),
	(24, '2022-12-08 09:18:16', 0, 400000, 12, 'Administrator', '2023-01-17 09:18:16', NULL),
	(25, '2022-12-08 09:18:38', 0, 100000, 6, 'Administrator', '2023-01-17 09:18:38', NULL),
	(26, '2022-12-09 09:19:09', 0, 600000, 7, 'Administrator', '2023-01-17 09:19:09', NULL),
	(27, '2022-12-09 09:20:33', 0, 500000, 15, 'Administrator', '2023-01-17 09:20:33', NULL),
	(28, '2022-12-11 09:21:16', 0, 500000, 13, 'Administrator', '2023-01-17 09:21:16', NULL),
	(29, '2022-12-11 09:21:47', 0, 250000, 5, 'Administrator', '2023-01-17 09:21:47', NULL),
	(30, '2022-12-15 09:22:12', 0, 400000, 6, 'Administrator', '2023-01-17 09:22:12', NULL),
	(31, '2022-12-15 09:22:33', 0, 100000, 6, 'Administrator', '2023-01-17 09:22:33', NULL),
	(32, '2022-12-16 09:23:02', 0, 600000, 7, 'Administrator', '2023-01-17 09:23:02', NULL),
	(33, '2022-12-18 09:23:30', 0, 300000, 13, 'Administrator', '2023-01-17 09:23:30', NULL),
	(34, '2022-12-18 09:24:07', 0, 250000, 5, 'Administrator', '2023-01-17 09:24:07', NULL),
	(35, '2022-12-19 09:25:29', 0, 1200000, 16, 'Administrator', '2023-01-17 09:25:29', NULL),
	(36, '2022-12-22 09:26:09', 0, 400000, 12, 'Administrator', '2023-01-17 09:26:09', NULL),
	(37, '2022-12-22 09:26:32', 0, 100000, 6, 'Administrator', '2023-01-17 09:26:32', NULL),
	(38, '2022-12-22 09:27:41', 0, 3600000, 17, 'Administrator', '2023-01-17 09:27:41', NULL),
	(39, '2022-12-23 09:28:02', 0, 600000, 7, 'Administrator', '2023-01-17 09:28:02', NULL),
	(40, '2022-12-25 09:31:48', 0, 400000, 13, 'Administrator', '2023-01-17 09:31:48', NULL),
	(41, '2022-12-25 09:32:06', 0, 250000, 5, 'Administrator', '2023-01-17 09:32:06', NULL),
	(42, '2022-12-29 09:32:29', 0, 300000, 12, 'Administrator', '2023-01-17 09:32:29', NULL),
	(43, '2022-12-29 09:32:53', 0, 100000, 6, 'Administrator', '2023-01-17 09:32:53', NULL),
	(44, '2022-12-30 09:33:59', 0, 1000000, 18, 'Administrator', '2023-01-17 09:33:59', NULL),
	(45, '2022-12-30 09:37:42', 0, 600000, 7, 'Administrator', '2023-01-17 09:37:42', NULL);
/*!40000 ALTER TABLE `kasmasjid` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.kategoris: ~5 rows (approximately)
/*!40000 ALTER TABLE `kategoris` DISABLE KEYS */;
INSERT INTO `kategoris` (`id`, `nm_kategori`, `created_at`, `updated_at`) VALUES
	(1, 'Khazanah Islam', '2023-01-17 14:20:18', '2023-01-17 14:20:18'),
	(2, 'Tafsir Qur\'an', '2023-01-17 14:20:36', '2023-01-17 14:20:36'),
	(3, 'Hadist', '2023-01-17 14:21:19', '2023-01-17 14:21:19'),
	(4, 'Fiqih', '2023-01-17 14:21:28', '2023-01-17 14:21:28'),
	(5, 'Siroh Nabi', '2023-01-17 14:21:40', '2023-01-17 14:21:40');
/*!40000 ALTER TABLE `kategoris` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.kegiatans
CREATE TABLE IF NOT EXISTS `kegiatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jeniskegiatan_id` bigint(20) DEFAULT NULL,
  `mubaligh_id` bigint(20) DEFAULT NULL,
  `nm_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keg_kajian` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.kegiatans: ~1 rows (approximately)
/*!40000 ALTER TABLE `kegiatans` DISABLE KEYS */;
INSERT INTO `kegiatans` (`id`, `jeniskegiatan_id`, `mubaligh_id`, `nm_kegiatan`, `photo`, `tgl`, `waktu`, `video_url`, `keg_kajian`, `keterangan`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 2, 4, 'Kajian Rutin Subuh Ahad Pagi 15 Januari 2023', 'img-kegiatan/8BbqSY6FcCra3lYvRkpysaO6SPujX5C3eO9JcWUF.jpg', '2023-01-15', '04:45:00', 'https://youtu.be/lJEqqsHPq4s', 'N', '<div>Hadirilah Kajian Rutin Ahad Pagi bersama Ustadz Rahmat Prihatin, S. Sos.<br>dengan Temah Siroh Nabi Muhammad SAW<br><br>Disediakan sarapan pagi</div>', 'Administrator', '2023-01-17 15:20:24', '2023-01-17 17:07:34');
/*!40000 ALTER TABLE `kegiatans` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.level
CREATE TABLE IF NOT EXISTS `level` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.level: ~8 rows (approximately)
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`id`, `level`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'bph', 'Badan Pengurus Harian', '2023-01-16 22:42:30', '2023-01-16 22:42:30'),
	(2, 'ibadah', 'Bidang Ibadah', '2023-01-16 22:43:17', '2023-01-16 22:43:17'),
	(3, 'dakwah', 'Bidang Pendidikan dan Dakwah', '2023-01-16 22:43:42', '2023-01-16 22:43:42'),
	(4, 'rumahtangga', 'Bidang Rumah Tangga', '2023-01-16 22:44:14', '2023-01-16 22:44:14'),
	(5, 'bmm', 'Bidang Sosial dan Kemasyarakatan', '2023-01-16 22:44:45', '2023-01-16 22:44:45'),
	(6, 'humasti', 'Bidang Humas dan Teknologi Informasi', '2023-01-16 22:45:16', '2023-01-16 22:45:16'),
	(7, 'phbi', 'Bidang Peringatan Hari Besar Islam', '2023-01-16 22:45:45', '2023-01-16 22:45:45'),
	(8, 'admin', 'Administrator', '2023-01-16 22:47:57', '2023-01-16 22:47:57'),
	(9, 'bendahara', 'Bendahara Dewan Kemakmuran Masjid', '2023-01-16 23:02:38', '2023-01-16 23:02:38');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.migrations: ~22 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2021_02_24_111246_create_nasabah_table', 1),
	(2, '2021_02_24_111304_create_pegawai_table', 1),
	(3, '2021_02_24_111316_create_rekening_table', 1),
	(4, '2021_02_24_111327_create_transfer_table', 1),
	(5, '2021_02_24_111338_create_transaksi_table', 1),
	(6, '2022_07_20_101118_create_pengurus_table', 1),
	(7, '2022_07_20_103334_create_level_table', 1),
	(8, '2022_07_20_201739_create_jabatan_table', 1),
	(9, '2022_07_22_205810_create_jamaah_table', 1),
	(10, '2022_12_22_053606_create_jenis_kegiatans_table', 1),
	(11, '2022_12_22_115350_create_peran_mubalighs_table', 1),
	(12, '2022_12_22_190609_create_mubalighs_table', 1),
	(13, '2022_12_25_200940_create_kegiatans_table', 1),
	(14, '2022_12_25_214908_create_topik_kajians_table', 1),
	(15, '2022_12_25_225734_create_kajians_table', 1),
	(16, '2022_12_26_003059_create_yatim_duafas_table', 1),
	(17, '2023_01_03_143937_create_kasmasjid_table', 1),
	(18, '2023_01_14_084058_create_kategoris_table', 1),
	(19, '2023_01_15_090226_create_artikels_table', 1),
	(20, '2023_01_16_171658_create_jenis_transaksi_table', 1),
	(21, '2023_01_16_172117_create_jenis_transaksi_bmm_table', 1),
	(22, '2023_01_16_172543_create_kasbmm_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.mubalighs
CREATE TABLE IF NOT EXISTS `mubalighs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil` text COLLATE utf8mb4_unicode_ci,
  `peranmubaligh_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.mubalighs: ~4 rows (approximately)
/*!40000 ALTER TABLE `mubalighs` DISABLE KEYS */;
INSERT INTO `mubalighs` (`id`, `nm_lengkap`, `email`, `hp`, `jk`, `alamat`, `photo`, `profil`, `peranmubaligh_id`, `created_at`, `updated_at`) VALUES
	(1, 'Saepudin, M. Pd.', 'xxxxxx@gmail.com', '08128263573', 'L', 'Taman Alamanda Blok C8 No.', 'img-mubaligh/x72wRA79FyoSVfQ17oLo85mn8FiY8wiTLQTD6u4S.jpg', '<div>Profil Ustadz Saepudin, M. Pd</div>', 5, '2023-01-17 14:41:43', '2023-01-17 14:41:43'),
	(2, 'Nurhadi, M. Pd', 'xxxxxx@gmail.com', '082210728904', 'L', 'Taman Alamanda Blok C8 No.', 'img-mubaligh/F02JZwR9WtpRuAaMvJqCe8VhLqlajpGOvkVsktmv.png', '<div>Profil Ustadz Nurhadi, M. Pd.</div>', 2, '2023-01-17 14:43:07', '2023-01-17 14:43:21'),
	(3, 'Abbas', 'xxxxxx@gmail.com', '08161383868', 'L', 'Taman Alamanda Blok C', 'img-mubaligh/ddJVjzDLJ1zUN8zFellL5Ax8wnmb87xVjUj4sVIO.png', '<div>Profil Ustadz Abbas</div>', 2, '2023-01-17 14:44:33', '2023-01-17 14:44:48'),
	(4, 'Rahmat Prihatin, S. Sos.', 'xxxxxx@gmail.com', '089628578057', 'L', 'Taman Alamanda Blok C', 'img-mubaligh/eeoiO9EorgcL3AvlPOqH8d58pZ0fMKuXMerEn2fw.png', '<div>Profil Ustadz Rahmat Prihatin, S. Sos.</div>', 5, '2023-01-17 14:46:41', '2023-01-17 14:46:41');
/*!40000 ALTER TABLE `mubalighs` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.nasabah
CREATE TABLE IF NOT EXISTS `nasabah` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kd_nasabah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_nasabah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_users` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.nasabah: ~0 rows (approximately)
/*!40000 ALTER TABLE `nasabah` DISABLE KEYS */;
/*!40000 ALTER TABLE `nasabah` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table intra_masjid.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kd_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_users` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.pegawai: ~0 rows (approximately)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.pengurus
CREATE TABLE IF NOT EXISTS `pengurus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kd_pengurus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_pengurus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_jabatan` bigint(20) DEFAULT NULL,
  `id_users` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.pengurus: ~3 rows (approximately)
/*!40000 ALTER TABLE `pengurus` DISABLE KEYS */;
INSERT INTO `pengurus` (`id`, `kd_pengurus`, `nm_pengurus`, `jk`, `no_hp`, `email`, `alamat`, `photo`, `id_jabatan`, `id_users`, `created_at`, `updated_at`) VALUES
	(1, 'AFLXX3', 'Nurhadi, S.Pd.', 'L', '082210728904', 'xxxxxx@gmail.com', 'Taman Alamanda Blok C8 No.', NULL, 1, 9, '2023-01-17 00:36:24', '2023-01-17 00:36:24'),
	(2, 'AFFZ5L', 'Gunawan Ashari, SE.', 'L', '08129661804', 'gunawanashari@mail.com', 'Taman Alamanda Blok C4', NULL, 4, 10, '2023-01-17 00:43:16', '2023-01-17 00:43:16'),
	(3, 'AFXIPZ', 'Ahmad Hidayat', 'L', '081806159435', 'ahmadhidayat@gmail.com', 'Taman Alamanda Blok C1 No. 24', NULL, 8, 11, '2023-01-17 00:46:08', '2023-01-17 00:46:08'),
	(4, 'AFFNZ9', 'Nurindra', 'L', '087886186818', 'nurindra@gmail.com', 'Taman Alamanda Blok C', NULL, 9, 12, '2023-01-17 08:38:42', '2023-01-17 08:38:42');
/*!40000 ALTER TABLE `pengurus` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.peran_mubalighs
CREATE TABLE IF NOT EXISTS `peran_mubalighs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_peran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.peran_mubalighs: ~6 rows (approximately)
/*!40000 ALTER TABLE `peran_mubalighs` DISABLE KEYS */;
INSERT INTO `peran_mubalighs` (`id`, `nm_peran`, `created_at`, `updated_at`) VALUES
	(1, 'Khotib', '2023-01-17 00:47:51', '2023-01-17 00:47:51'),
	(2, 'Imam', '2023-01-17 00:47:58', '2023-01-17 00:47:58'),
	(3, 'Muadzin', '2023-01-17 00:48:06', '2023-01-17 00:48:06'),
	(4, 'Pemateri', '2023-01-17 00:48:20', '2023-01-17 00:48:20'),
	(5, 'Imam dan Khotib Jumat', '2023-01-17 00:48:44', '2023-01-17 00:48:44'),
	(6, 'Penceramah', '2023-01-17 00:49:29', '2023-01-17 00:49:29');
/*!40000 ALTER TABLE `peran_mubalighs` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.rekening
CREATE TABLE IF NOT EXISTS `rekening` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  `kd_jamaah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.rekening: ~1 rows (approximately)
/*!40000 ALTER TABLE `rekening` DISABLE KEYS */;
INSERT INTO `rekening` (`id`, `no_rekening`, `pin`, `kd_jamaah`, `saldo`, `created_at`, `updated_at`) VALUES
	(1, '99797585', 123456, 'JMHEXTL', 0, '2023-01-17 13:48:18', '2023-01-17 13:48:18');
/*!40000 ALTER TABLE `rekening` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.topik_kajians
CREATE TABLE IF NOT EXISTS `topik_kajians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_topik_kajian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.topik_kajians: ~3 rows (approximately)
/*!40000 ALTER TABLE `topik_kajians` DISABLE KEYS */;
INSERT INTO `topik_kajians` (`id`, `nm_topik_kajian`, `created_at`, `updated_at`) VALUES
	(1, 'Kitab Riyadus Sholihin', '2023-01-17 14:37:30', '2023-01-17 14:37:52'),
	(2, 'Siroh Nabi Muhammad SAW', '2023-01-17 15:24:06', '2023-01-17 15:27:35'),
	(3, 'Hadist Arba\'in', '2023-01-17 16:23:10', NULL);
/*!40000 ALTER TABLE `topik_kajians` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `waktu` datetime DEFAULT NULL,
  `nominal` bigint(20) DEFAULT NULL,
  `jns_transaksi` enum('setor','tarik','transfer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.transaksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.transfer
CREATE TABLE IF NOT EXISTS `transfer` (
  `id_transfer` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jns_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `id_transaksi` bigint(20) DEFAULT NULL,
  `rek_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transfer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.transfer: ~0 rows (approximately)
/*!40000 ALTER TABLE `transfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `transfer` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '$2y$10$1pec6NOp4NbuxkPeMbkXCOnxIU/mYagIfljT2lXPGXqsiwGwVvRG2',
  `level` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_users`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table intra_masjid.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_users`, `name`, `username`, `email`, `email_verified_at`, `password`, `level`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', 'ekselcorp@gmail.com', NULL, '$2y$10$sFjDfcoMSHEhj8U164NuqeNwOQfvQ2aULpcqzBdoA2hUZKEpPbkkS', 'admin', '1', NULL, '2023-01-16 23:45:57', '2022-12-16 20:16:03'),
	(9, 'Nurhadi, S.Pd.', 'nurhadi', 'xxxxxx@gmail.com', NULL, '$2y$10$QdixDYyx5PQmpuBAv8lCpOip8enRqzEYRBaM6eIXQmFoWSNE27W6q', 'bph', '1', NULL, '2023-01-17 00:36:24', '2023-01-17 00:41:26'),
	(10, 'Gunawan Ashari, SE.', 'gunawan', 'gunawanashari@mail.com', NULL, '$2y$10$JBx/0y6yWLiQFPaR9DNckexE3nKx8q144SKF7FwaDFQGkZdLfPZsq', 'bendahara', '1', NULL, '2023-01-17 00:43:16', '2023-01-17 00:44:03'),
	(11, 'Ahmad Hidayat', 'ahmadhidayat', 'ahmadhidayat@gmail.com', NULL, '$2y$10$FAop3G2G7aX00l9jZw.OdOeI83qZKXamxw7GHouETE3B6TT64rEMW', 'pengurus', '1', NULL, '2023-01-17 00:46:08', '2023-01-17 00:46:08'),
	(12, 'Nurindra', 'nurindra', 'nurindra@gmail.com', NULL, '$2y$10$9BMXvff8kR0pa5AMTZpEMO/grdi/qBWJNUANA4ZciZ/VLaWfwxkZy', 'humasti', '1', NULL, '2023-01-17 08:38:42', '2023-01-17 08:39:10'),
	(13, 'Warkim', 'warkim', 'x1syah@gmail.com', NULL, '$2y$10$shFevuOwbeBvcSFIvDh.8u8VHezBWr2eLOVzpMpRWgp0fy/Ov4QEi', 'jamaah', '1', NULL, '2023-01-17 13:48:18', '2023-01-17 13:48:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table intra_masjid.yatim_duafas
CREATE TABLE IF NOT EXISTS `yatim_duafas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Yatim','Piatu','Yatim Piatu','Duafa') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_by` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table intra_masjid.yatim_duafas: ~0 rows (approximately)
/*!40000 ALTER TABLE `yatim_duafas` DISABLE KEYS */;
/*!40000 ALTER TABLE `yatim_duafas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
