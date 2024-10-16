-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 08:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kelurahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_control`
--

CREATE TABLE `access_control` (
  `id` int(11) NOT NULL,
  `user_level_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`id`, `user_level_id`, `module_id`, `content`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'a', 1, '2017-10-17 09:26:05', '2017-10-17 09:26:05'),
(2, 1, 2, 'a', 1, '2017-10-17 09:26:05', '2017-10-17 09:26:05'),
(3, 1, 3, 'a', 1, '2017-10-17 09:26:05', '2017-10-17 09:26:05'),
(4, 2, 1, 'a', 1, '2017-10-17 09:26:13', '2018-07-02 06:15:53'),
(5, 2, 2, 'a', 1, '2017-10-17 09:26:13', '2018-07-02 06:15:53'),
(6, 2, 3, 'a', 1, '2017-10-17 09:26:13', '2018-07-02 06:15:53'),
(7, 3, 1, 'v', 1, '2017-10-17 09:26:18', '2018-06-03 06:05:32'),
(8, 3, 2, 'v', 1, '2017-10-17 09:26:18', '2018-06-03 06:05:32'),
(9, 3, 3, 'v', 1, '2017-10-17 09:26:18', '2018-06-03 06:05:32'),
(10, 1, 4, 'a', 1, '2018-07-02 06:15:50', '2018-07-02 06:15:50'),
(11, 2, 4, 'a', 1, '2018-07-02 06:15:53', '2018-07-02 06:15:53'),
(12, 3, 4, 'v', 1, '2018-07-02 06:15:56', '2018-07-02 06:15:56'),
(13, 1, 5, 'a', 1, '2018-07-02 08:28:39', '2018-07-02 08:28:39'),
(14, 2, 5, 'a', 1, '2018-07-02 08:28:43', '2018-07-02 08:28:43'),
(15, 3, 5, 'v', 1, '2018-07-02 08:28:45', '2018-07-02 08:28:45'),
(16, 1, 6, 'a', 1, '2018-07-03 07:02:26', '2018-07-03 07:02:26'),
(17, 2, 6, 'a', 1, '2018-07-03 07:02:29', '2018-07-03 07:02:29'),
(18, 3, 6, 'v', 1, '2018-07-03 07:02:31', '2018-07-03 07:02:31'),
(19, 1, 7, 'a', 1, '2018-07-03 08:32:29', '2018-07-03 08:32:29'),
(20, 2, 7, 'a', 1, '2018-07-03 08:32:32', '2018-07-03 08:32:32'),
(21, 3, 7, 'v', 1, '2018-07-03 08:32:35', '2018-07-03 08:32:35'),
(22, 1, 9, 'a', 1, '2021-07-07 18:14:58', '2021-07-07 18:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `read` int(1) DEFAULT NULL,
  `active` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media_library`
--

CREATE TABLE `media_library` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_library`
--

INSERT INTO `media_library` (`id`, `name`, `type`, `url`, `size`, `user_created`, `created_at`, `updated_at`) VALUES
(0, 'noprofileimage', 'png', 'img/noprofileimage.png', '1159', 1, '2017-05-29 19:56:03', '2017-05-29 19:56:03'),
(11, '66713635_149669429554076_2774375852283274300_n', 'jpg', 'upload/img/66713635_149669429554076_2774375852283274300_n.jpg', '211347', 1, '2021-08-12 09:10:14', '2021-08-12 09:10:14'),
(3, 'EYSvtVzUMAEH7zX', 'jpg', 'upload/img/EYSvtVzUMAEH7zX.jpg', '375496', 1, '2021-07-04 17:09:56', '2021-07-04 17:09:56'),
(4, 'EQZI6m4VAAAuLCX', 'jpg', 'upload/img/EQZI6m4VAAAuLCX.jpg', '248843', 1, '2021-07-14 17:33:12', '2021-07-14 17:33:12'),
(5, 'EW2EMvMVAAEHYWD', 'jpg', 'upload/img/EW2EMvMVAAEHYWD.jpg', '86410', 1, '2021-08-04 16:49:36', '2021-08-04 16:49:36'),
(6, 'EQlvi2tU4AAOAuB', 'jpg', 'upload/img/EQlvi2tU4AAOAuB.jpg', '99056', 1, '2021-08-05 17:52:26', '2021-08-05 17:52:26'),
(2, 'EV-jmYFVAAYlrwH', 'jpg', 'upload/img/EV-jmYFVAAYlrwH.jpg', '27449', 1, '2021-04-05 18:15:35', '2021-04-05 18:15:35'),
(1, 'ESb4f0jU8AE-4SX', 'jpg', 'upload/img/ESb4f0jU8AE-4SX.jpg', '173512', 1, '2021-04-05 18:24:38', '2021-04-05 18:24:38'),
(10, 'Ej-SjFJUwAA--LA', 'jpg', 'upload/img/Ej-SjFJUwAA--LA.jpg', '880730', 1, '2021-08-12 07:56:10', '2021-08-12 07:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2021_05_17_204219_create_ref_pendidikan_table', 1),
(8, '2021_05_17_211130_create_ref_pekerjaan_table', 1),
(9, '2021_05_17_211152_create_ref_jenkel_table', 1),
(10, '2021_05_17_211231_create_ref_kewarganegaraan_table', 1),
(11, '2021_05_17_211249_create_ref_goldar_table', 1),
(12, '2021_05_17_211532_create_ref_agama_table', 1),
(15, '2021_05_18_223345_create_tbl_penduduk_table', 2),
(16, '2021_05_18_223543_create_tbl_keluarga_table', 2),
(19, '2021_05_24_231743_create_tbl_pindah_table', 3),
(20, '2021_05_24_232737_create_tbl_meninggal_table', 3),
(21, '2021_08_09_004955_add_jenkel_id_on_tbl_pindah_table', 4),
(22, '2021_08_09_005729_add_jenkel_id_on_tbl_meninggal_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(20) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`, `active`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, 'Master User Level', 'users-level', 1, 1, '2017-10-17 07:07:07', '2017-10-17 07:43:43'),
(2, 'Master User', 'users-user', 1, 1, '2017-10-17 07:16:51', '2017-10-17 07:49:30'),
(3, 'Media Library', 'media-library', 1, 1, '2017-10-17 07:19:28', '2018-06-03 05:40:18'),
(4, 'Data Keluarga', 'keluarga', 1, 1, '2018-07-02 06:15:45', '2021-05-23 10:18:23'),
(5, 'Data Penduduk', 'penduduk', 1, 1, '2018-07-02 08:28:31', '2021-05-23 09:58:35'),
(6, 'Data Penduduk Pindah', 'pindah', 1, 1, '2018-07-03 07:02:20', '2021-05-24 16:58:26'),
(7, 'Data Penduduk Meninggal', 'meninggal', 1, 1, '2018-07-03 08:32:24', '2021-05-24 17:45:34'),
(9, 'Modules', 'modules', 1, 1, '2021-07-07 18:06:17', '2021-07-07 18:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `ref_agama`
--

CREATE TABLE `ref_agama` (
  `id` int(10) UNSIGNED NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_agama`
--

INSERT INTO `ref_agama` (`id`, `agama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2021-05-17 14:35:38', '2021-05-17 14:35:38'),
(2, 'Kristen Protestan', '2021-05-17 14:35:38', '2021-05-17 14:35:38'),
(3, 'Katholik', '2021-05-17 14:35:38', '2021-05-17 14:35:38'),
(4, 'Hindu', '2021-05-17 14:35:38', '2021-05-17 14:35:38'),
(5, 'Buddha', '2021-05-17 14:35:38', '2021-05-17 14:35:38'),
(6, 'Konghucu', '2021-05-17 14:35:38', '2021-05-17 14:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `ref_goldar`
--

CREATE TABLE `ref_goldar` (
  `id` int(10) UNSIGNED NOT NULL,
  `goldar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_goldar`
--

INSERT INTO `ref_goldar` (`id`, `goldar`, `created_at`, `updated_at`) VALUES
(1, 'A', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(2, 'A+', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(3, 'A-', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(4, 'B', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(5, 'B+', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(6, 'B-', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(7, 'AB', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(8, 'AB+', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(9, 'AB-', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(10, 'O', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(11, 'O+', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(12, 'O+', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(13, 'Tidak Tahu', '2021-05-23 18:47:29', '2021-05-23 18:47:29'),
(14, 'Belum Mengisi', '2021-05-23 18:50:59', '2021-05-23 18:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenkel`
--

CREATE TABLE `ref_jenkel` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenkel` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jenkel`
--

INSERT INTO `ref_jenkel` (`id`, `jenkel`, `created_at`, `updated_at`) VALUES
(1, 'Laki-laki', '2021-05-17 14:27:43', '2021-05-17 14:27:43'),
(2, 'Perempuan', '2021-05-17 14:27:43', '2021-05-17 14:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kewarganegaraan`
--

CREATE TABLE `ref_kewarganegaraan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kewarganegaraan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_kewarganegaraan`
--

INSERT INTO `ref_kewarganegaraan` (`id`, `kewarganegaraan`, `created_at`, `updated_at`) VALUES
(1, 'WNI', '2021-05-17 14:26:04', '2021-05-17 14:26:04'),
(2, 'WNA', '2021-05-17 14:26:04', '2021-05-17 14:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pekerjaan`
--

CREATE TABLE `ref_pekerjaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_pekerjaan`
--

INSERT INTO `ref_pekerjaan` (`id`, `pekerjaan`, `created_at`, `updated_at`) VALUES
(1, 'Belum / Tidak Bekerja', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(2, 'Mengurus Rumah Tangga', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(3, 'Pelajar / Mahasiswa', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(4, 'Pensiunan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(5, 'Pegawai Negeri Sipil (PNS)', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(6, 'Tentara Nasional Indonesia (TNI)', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(7, 'Kepolisian RI (POLRI)', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(8, 'Perdagangan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(9, 'Petani / Pekebun', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(10, 'Peternak', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(11, 'Nelayan / Perikanan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(12, 'Industri', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(13, 'Konstruksi', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(14, 'Transportasi', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(15, 'Karyawan Swasta', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(16, 'Karyawan BUMN', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(17, 'Karyawan BUMD', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(18, 'Karyawan Honorer', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(19, 'Buruh Harian Lepas', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(20, 'Buruh Tani / Perkebunan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(21, 'Buruh Nelayan /  Perikanan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(22, 'Buruh Peternakan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(23, 'Pembantu Rumah Tangga', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(24, 'Tukang Cukur', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(25, 'Tukang Listrik', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(26, 'Tukang Batu', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(27, 'Tukang Kayu', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(28, 'Tukang Sol Sepatu', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(29, 'Tukang Las / Pandai Besi', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(30, 'Tukang Jahit', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(31, 'Tukang Gigi', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(32, 'Penata Rias', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(33, 'Penata Busana', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(34, 'Penata Rambut', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(35, 'Mekanik', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(36, 'Seniman', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(37, 'Tabib', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(38, 'Paraji', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(39, 'Perancang Busana', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(40, 'Penerjemah', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(41, 'Imam Masjid', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(42, 'Pendeta', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(43, 'Pastor', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(44, 'Wartawan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(45, 'Ustadz / Mubaligh', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(46, 'Juru Masak', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(47, 'Promotor Acara', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(48, 'Anggota DPR-RI', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(49, 'Anggota DPD', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(50, 'Anggota BPK', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(51, 'Presiden', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(52, 'Wakil Presiden', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(53, 'Anggota Mahkamah Konstitusi', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(54, 'Anggota Kabinet Kementerian', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(55, 'Duta Besar', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(56, 'Gubernur', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(57, 'Wakil Gubernur', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(58, 'Bupati', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(59, 'Wakil Bupati', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(60, 'Walikota', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(61, 'Wakil Walikota', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(62, 'Anggota DPRD Provinsi', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(63, 'Anggota DPRD Kabupaten / Kota', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(64, 'Dosen', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(65, 'Guru', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(66, 'Pilot', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(67, 'Pengacara', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(68, 'Notaris', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(69, 'Arsitek', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(70, 'Akuntan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(71, 'Konsultan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(72, 'Dokter', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(73, 'Bidan', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(74, 'Perawat', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(75, 'Apoteker', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(76, 'Psikiater / Psikolog', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(77, 'Penyiar Televisi', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(78, 'Penyiar Radio', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(79, 'Pelaut', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(80, 'Peneliti', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(81, 'Sopir', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(82, 'Pialang', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(83, 'Paranormal', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(84, 'Pedagang', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(85, 'Biarawati', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(86, 'Wiraswasta', '2021-05-17 14:32:56', '2021-05-17 14:32:56'),
(87, 'Lainnya', '2021-05-17 14:32:56', '2021-05-17 14:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pendidikan`
--

CREATE TABLE `ref_pendidikan` (
  `id` int(10) UNSIGNED NOT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_pendidikan`
--

INSERT INTO `ref_pendidikan` (`id`, `pendidikan`, `created_at`, `updated_at`) VALUES
(1, 'Tidak / Belum Sekolah', '2021-05-17 14:30:43', '2021-05-17 14:30:43'),
(2, 'Belum Tamat SD / Sederajat', '2021-05-17 14:30:43', '2021-05-17 14:30:43'),
(3, 'Tamat SD / Sederajat', '2021-05-17 14:30:43', '2021-05-17 14:30:43'),
(4, 'SLTP / Sederajat', '2021-05-17 14:30:43', '2021-05-17 14:30:43'),
(5, 'SLTA / Sederajat', '2021-05-17 14:30:43', '2021-05-17 14:30:43'),
(6, 'Diploma I / II', '2021-05-17 14:30:43', '2021-05-17 14:30:43'),
(7, 'Akademi / Diploma III / S. Muda', '2021-05-17 14:30:43', '2021-05-17 14:30:43'),
(8, 'Diploma IV / Strata I (S1)', '2021-05-17 14:30:43', '2021-05-17 14:30:43'),
(9, 'Strata II (S2)', '2021-05-17 14:30:43', '2021-05-17 14:30:43'),
(10, 'Strata III (S3)', '2021-05-17 14:30:43', '2021-05-17 14:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, 'web_title', 'Kelurahan Tangsi', 1, '2017-06-13 00:27:16', '2021-05-17 13:28:49'),
(2, 'logo', 'img/logo.png', 1, '2017-06-13 00:27:16', '2018-06-03 05:58:24'),
(3, 'email_admin', 'admin@admin.com', 1, '2017-06-13 00:27:16', '2018-06-03 05:58:52'),
(4, 'web_description', 'Sistem Informasi Administrasi Kependudukan (SIAK) Kelurahan Tangsi', 1, '2017-07-23 23:56:28', '2021-07-14 17:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluarga`
--

CREATE TABLE `tbl_keluarga` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_modified` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_keluarga`
--

INSERT INTO `tbl_keluarga` (`id`, `no_kk`, `nama`, `alamat`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, '1275021411076577', 'Ali Hasan', 'Jalan Veteran no. 5B', 1, '2021-05-23 18:56:31', '2021-05-23 18:56:31'),
(4, '1275021009161287', 'Fiony Alveria Tantri', 'Jalan Veteran no. 7B', 1, '2021-08-09 18:00:27', '2021-08-09 18:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meninggal`
--

CREATE TABLE `tbl_meninggal` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `user_modified` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_meninggal`
--

INSERT INTO `tbl_meninggal` (`id`, `no_kk`, `nik`, `nama`, `jenkel_id`, `tanggal`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, '1275021001081678', '1275026601880001', 'Fidly Immanda Azzahra', 2, '2020-03-19', 1, '2021-05-24 17:49:31', '2021-08-10 17:45:41'),
(2, '1275021111081978', '1275021611880003', 'Dimas Kamerad', 1, '2021-07-15', 1, '2021-07-14 17:51:01', '2021-08-08 18:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenkel_id` int(10) UNSIGNED NOT NULL,
  `goldar_id` int(10) UNSIGNED NOT NULL,
  `kewarganegaraan_id` int(10) UNSIGNED NOT NULL,
  `agama_id` int(10) UNSIGNED NOT NULL,
  `pendidikan_id` int(10) UNSIGNED NOT NULL,
  `pekerjaan_id` int(10) UNSIGNED NOT NULL,
  `user_modified` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`id`, `nik`, `nama`, `tempat`, `tgl_lahir`, `jenkel_id`, `goldar_id`, `kewarganegaraan_id`, `agama_id`, `pendidikan_id`, `pekerjaan_id`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, '1275021005790003', 'Ali Hasan', 'Lubuk Pakam', '1979-05-10', 1, 13, 1, 1, 8, 5, 1, '2021-05-23 18:53:29', '2021-08-09 18:00:21'),
(7, '1275026605800003', 'Seri Meilina', 'Medan', '1980-05-26', 2, 12, 1, 4, 7, 10, 1, '2021-05-24 14:36:50', '2021-08-12 17:55:41'),
(17, '1275026610020001', 'Fiony Alveria Tantri', 'Tangerang', '2002-10-26', 2, 1, 2, 2, 5, 3, 1, '2021-07-01 15:58:35', '2021-08-09 17:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pindah`
--

CREATE TABLE `tbl_pindah` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `user_modified` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pindah`
--

INSERT INTO `tbl_pindah` (`id`, `no_kk`, `nik`, `nama`, `jenkel_id`, `tanggal`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, '1275021108101354', '1275021207910001', 'Rezza Habibie', 1, '2020-11-12', 1, '2021-07-01 16:48:09', '2021-08-08 17:57:04'),
(2, '1275021108141191', '1275021303870004', 'Novaro Wisnu', 1, '2021-07-15', 1, '2021-07-14 17:46:08', '2021-08-09 17:52:48'),
(3, '1275021310070004', '1275020711870004', 'Angelina Christy', 2, '2021-08-10', 1, '2021-08-09 17:49:39', '2021-08-09 17:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_level_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `avatar_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_level_id`, `firstname`, `lastname`, `avatar_id`, `email`, `address`, `phone`, `gender`, `birthdate`, `username`, `password`, `active`, `user_modified`, `last_activity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhea', 'Angelina', 4, 'superadmin@admin.com', NULL, '08383xxxxxxx', 'female', '1986-07-25', 'superadmin', '$2y$10$TkX/dDYrtvIEXidPOag5T.V8qbyluUHJg5ssBjKe6WlVqpItuN8uy', 1, 1, '2021-08-12 15:31:01', '2017-03-13 20:51:35', '2021-08-12 15:31:01'),
(2, 2, 'Admin', 'Admin', 0, 'admin@admin.com', NULL, NULL, 'male', '1970-01-15', 'admin', '$2y$10$PQaUY4b0YsSo5qAuK8Cc.OB.WeEJHrJJ0FDgk6YE9xhXboVRou3We', 1, 1, '2021-08-03 18:28:59', '2017-04-19 14:29:01', '2021-08-03 18:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `active` int(1) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `name`, `active`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, 1, '2021-08-10 17:54:42', '2021-07-14 17:29:19'),
(2, 'Admin', 1, 1, '2021-08-10 17:54:50', '2021-07-14 17:29:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_control`
--
ALTER TABLE `access_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_library`
--
ALTER TABLE `media_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_agama`
--
ALTER TABLE `ref_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_goldar`
--
ALTER TABLE `ref_goldar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jenkel`
--
ALTER TABLE `ref_jenkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_kewarganegaraan`
--
ALTER TABLE `ref_kewarganegaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_pekerjaan`
--
ALTER TABLE `ref_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_pendidikan`
--
ALTER TABLE `ref_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_meninggal`
--
ALTER TABLE `tbl_meninggal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pindah`
--
ALTER TABLE `tbl_pindah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_control`
--
ALTER TABLE `access_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_library`
--
ALTER TABLE `media_library`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ref_goldar`
--
ALTER TABLE `ref_goldar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ref_jenkel`
--
ALTER TABLE `ref_jenkel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_kewarganegaraan`
--
ALTER TABLE `ref_kewarganegaraan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_pekerjaan`
--
ALTER TABLE `ref_pekerjaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `ref_pendidikan`
--
ALTER TABLE `ref_pendidikan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_meninggal`
--
ALTER TABLE `tbl_meninggal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pindah`
--
ALTER TABLE `tbl_pindah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
