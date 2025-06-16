-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2025 at 09:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1740201681),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1740201681;', 1740201681),
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:1;', 1738902689),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1738902689;', 1738902689),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1737879691),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1737879691;', 1737879691),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1740370941),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1740370941;', 1740370941);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','notactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Kegiatan', 'kegiatan', 'active', '2025-01-21 18:33:42', '2025-01-25 07:25:28', NULL),
(3, 'Promo', 'promo', 'active', '2025-01-21 18:39:53', '2025-01-21 18:39:53', NULL),
(5, 'Event', 'event', 'active', '2025-01-26 09:37:37', '2025-01-26 09:37:37', NULL),
(6, 'Informasi', 'informasi', 'active', '2025-02-19 09:48:37', '2025-02-19 09:48:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_galeries`
--

CREATE TABLE `category_galeries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_galeries`
--

INSERT INTO `category_galeries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MD Swalayan', '2025-02-11 08:50:01', '2025-02-14 11:49:08'),
(2, 'Eight Cafe', '2025-02-11 09:52:05', '2025-02-11 09:52:05'),
(8, 'Holy Kids', '2025-02-12 07:59:15', '2025-02-12 07:59:15'),
(9, 'Olive Eatery & Coffee', '2025-02-16 09:28:06', '2025-02-16 09:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `category_promosis`
--

CREATE TABLE `category_promosis` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_promosis`
--

INSERT INTO `category_promosis` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Promo Murah', '2025-02-11 11:35:24', '2025-02-11 11:35:24'),
(2, 'Promo Super', '2025-02-11 11:35:34', '2025-02-12 03:12:27'),
(3, 'Promo Menarik', '2025-02-13 03:13:37', '2025-02-13 03:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeries`
--

CREATE TABLE `galeries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeries`
--

INSERT INTO `galeries` (`id`, `name`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'Holy Kids Lantai 2 MD Mall', '01JM2305W8SK598R5Q0YSTT31P.jpg', 8, '2025-02-14 11:18:58', '2025-02-14 11:20:15'),
(4, 'Eight Cafe', '01JM23227C6S94YG9H3TQA7KQ1.jpg', 2, '2025-02-14 11:21:17', '2025-02-14 11:21:17'),
(5, 'Outing Class', '01JM233M60V9A4EZ9PPP3M9BGZ.jpg', 2, '2025-02-14 11:22:08', '2025-02-14 11:22:08'),
(6, 'Keramaian MD Mall Blora', '01JM24JHQ00VNDYVAFDFT8ZS6T.jpg', 1, '2025-02-14 11:47:46', '2025-02-14 11:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_pages`
--

CREATE TABLE `landing_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tentangkami` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fotodepan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_pages`
--

INSERT INTO `landing_pages` (`id`, `home`, `tentangkami`, `blog`, `kontak`, `created_at`, `updated_at`, `fotodepan`) VALUES
(1, '<p><span style=\"font-size: 36pt;\"><span style=\"color: #ba372a;\">MD</span> <span style=\"color: #169179;\">Group</span></span></p>\n<p><span style=\"font-size: 36pt;\">Berkarya Berjaya Selamanya</span></p>', '<p>Timeline Sejarah <span style=\"color: #e03e2d;\">MD </span><span style=\"color: #2dc26b;\">Group</span></p>', '<p><span style=\"color: #7e8c8d;\">Temukan informasi, event, serta kegiatan <span style=\"color: #ba372a;\">MD&nbsp;</span><span style=\"color: #169179;\">Group</span></span></p>', '<p>Kami senang mendengar informasi, pertanyaan serta kritik dan saran anda.</p>', '2025-01-25 04:26:41', '2025-02-21 09:54:10', '01JK0DY6YCQKH28RCYZHB5ZC2J.png');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `maps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `name`, `image`, `deskripsi`, `wa`, `instagram`, `tiktok`, `facebook`, `alamat`, `maps`, `created_at`, `updated_at`, `thumbnail`) VALUES
(1, 'MD Mall', '01JJZXAQKPHD0D33621K6HGSM0.png', '<p style=\"text-align: justify;\">MD Mall Blora adalah sebuah pusat perbelanjaan yang terletak di jantung kota Blora, Jawa Tengah. Mall ini menawarkan berbagai fasilitas yang memudahkan pengunjung untuk berbelanja, makan, maupun menikmati hiburan. Di MD Mall, pengunjung dapat menemukan berbagai macam produk-produk fashion, elektronik, aksesori, serta kebutuhan sehari-hari. Mall ini juga sering menjadi tempat berkumpulnya warga sekitar, karena selain toko, ada juga kafe, dan tempat hiburan lainnya yang membuat suasana lebih hidup. Dimana MD Mall Memiliki beberapa tenant antara lain :</p>\n<ul>\n<li style=\"text-align: justify;\">Hitz Chicken</li>\n<li style=\"text-align: justify;\">Miniso</li>\n<li style=\"text-align: justify;\">Platinum Cineplex</li>\n</ul>\n<p style=\"text-align: justify;\">MD Mall menjadi salah satu destinasi favorit bagi keluarga dan para pengunjung. Dengan fasilitas yang nyaman, tempat parkir yang luas, dan adanya berbagai acara menarik, MD Mall Blora berusaha untuk memberikan pengalaman berbelanja yang menyenangkan bagi semua kalangan.</p>\n<p style=\"text-align: justify;\">Selain itu, MD Mall juga menjadi bagian dari perkembangan kota Blora yang semakin pesat, menciptakan lapangan pekerjaan bagi warga lokal serta memberikan kontribusi bagi perekonomian setempat.</p>', '6285641076164', 'mdmallblora', '@mdmallblora', 'mdmallblora', 'Jl. Pemuda No.3, Kunden, Kec. Blora, Kabupaten Blora, Jawa Tengah 58211', 'https://maps.app.goo.gl/UHRZ3XCGvkWaQWpc8', '2025-01-27 05:20:31', '2025-02-20 09:57:22', '01JJX82K7FWRMQGJGNRH5MTVEV.png'),
(2, 'Olive', '01JJZXB90RZXQKTGCY7Z0233QF.png', '<p style=\"text-align: justify;\">Olive Resto Blora adalah sebuah restoran yang menawarkan berbagai pilihan menu makanan dengan cita rasa yang lezat dan suasana yang nyaman. Terletak di Blora, Jawa Tengah, Olive Resto menjadi tempat favorit bagi masyarakat lokal maupun pengunjung yang sedang berkunjung ke Blora untuk menikmati hidangan yang berkualitas.</p>\n<p style=\"text-align: justify;\">Restoran ini dikenal dengan konsep desain interior yang modern dan suasana yang cozy, cocok untuk berbagai acara, mulai dari makan keluarga, pertemuan bisnis, hingga perayaan spesial seperti ulang tahun atau reuni. Olive Resto juga menyediakan menu yang beragam, mulai dari masakan Indonesia hingga internasional, yang siap memanjakan selera pengunjung.</p>\n<p style=\"text-align: justify;\">Salah satu hal yang membedakan Olive Resto adalah perhatian mereka pada kualitas bahan makanan dan pelayanan yang ramah. Pengunjung dapat menikmati hidangan dengan rasa yang konsisten dan segar, serta pilihan minuman yang menyegarkan. Selain itu, mereka sering memberikan penawaran spesial atau paket menarik untuk menarik lebih banyak pengunjung.</p>\n<p style=\"text-align: justify;\">Bagi warga Blora atau mereka yang sedang berkunjung, Olive Resto menjadi pilihan yang tepat untuk menikmati waktu makan yang menyenangkan, baik untuk bersantai bersama keluarga, teman, atau rekan kerja.</p>', NULL, 'oliveeaterycoffee', NULL, NULL, NULL, 'https://maps.app.goo.gl/eoUxnAMcu1CTK35GA', '2025-01-27 05:21:30', '2025-02-01 05:06:05', '01JJXE70A6ATYCMAR7SX015XHR.jpg'),
(3, 'Holy Kids', '01JJZXC1G61X6XZS1RVMWSEGD9.png', '<p>Holy Kids merupakan wahana ketangkasan anak yang berlokasi di beberapa cabang MD Group antara lain di :</p>\n<ul>\n<li>Lantai 2 MD Mall Blora</li>\n<li>Lantai 2 MD Jepon</li>\n<li>LAntai 2 MD Kuwu</li>\n</ul>\n<p>Holy kids menawarkan tempat permainan anak yang nyaman dan aman.</p>', NULL, 'holykidsmdmall', NULL, NULL, NULL, 'https://maps.app.goo.gl/BKNm1f82nVBtrdKw5', '2025-01-27 05:24:53', '2025-02-21 09:47:28', '01JMETTHCPMBDX1ZFRGFHEYP6R.png'),
(4, 'Eight', '01JJZXCT0PDC7BA4HRN7RP7D90.png', '<p>Eight Cafe terletak di lantai 2 MD Mall Blora. Eight Cafe menawarkan berbagai menu kuliner yang menggugah selera. Eight Cafe menawarkan tempat yang nyaman dan aman untuk berbincang dengan rekan. Tidak hanya sebagai tempat bersantai Eight Cefe jua dapat digunakan sebagai tempat edukasi seperti outing class dll</p>\n<p>Jam Operasional Eight Cafe 08.30 - 21.30</p>', NULL, 'eightcafe.blora', NULL, NULL, 'Jl. Pemuda No.3, Kunden, Kec. Blora, Kabupaten Blora, Jawa Tengah 58211', 'https://maps.app.goo.gl/CihzE1xGn1BxjdTP8', '2025-01-27 05:25:16', '2025-02-19 02:34:07', '01JME0M2R96A1F8KKTPN1N094F.png'),
(7, 'MD Jepon', '01JJZXD9JXDD8ZXFP7DC7BT3SH.png', '<p>MD Jepon beralamat di Jl. Nasional Blora - Cepu No.Km. 7, Jepon, Kec. Jepon, Kabupaten Blora, Jawa Tengah, tidak hanya sebagai tempat utuk berbelanja, namun juga dapat digunakan sebagai destinasi hiburan anak dan bersantai. Dimana pada MD Jepon terdapat beberapa fasilitas antara lain :</p>\n<ul>\n<li>Tempat Bermain Anak (Holy Kids)</li>\n<li>Holy Chicken</li>\n<li>MD Swalayan</li>\n</ul>\n<p>MD Jepon buka setiap hari pukul 08.30 - 21.30</p>', NULL, NULL, NULL, NULL, NULL, 'https://maps.app.goo.gl/rdMZ39NkgTZqWYDt5', '2025-01-31 07:42:23', '2025-02-20 10:32:00', '01JMHEM4ZYW27RCFSWG2747NKB.jpg'),
(8, 'MD Kuwu', '01JJZXDP34WJTW6AC5SJK895XD.png', '<p>MD Kuwu beralamat di Jl. Honggokusuman No.52, Tegalkembangan, Kuwu, Kec. Kradenan, Kabupaten Grobogan tidak hanya sebagai tempat utuk berbelanja, namun juga dapat digunakan sebagai destinasi hiburan anak dan bersantai. Dimana pada MD Jepon terdapat beberapa fasilitas antara lain :</p>\n<ul>\n<li>Tempat Bermain Anak (Holy Kids)</li>\n<li>Hitz Chicken</li>\n<li>MD Swalayan</li>\n</ul>\n<p>MD Kuwu buka setiap hari pukul 08.30 - 21.30</p>', NULL, NULL, NULL, NULL, NULL, 'https://maps.app.goo.gl/kPE7CjXAEgqACzk97', '2025-01-31 07:42:42', '2025-02-22 05:20:25', '01JMP1K1P4MRPHPX67SQJK6P8A.jpg'),
(9, 'MD Ngawen', '01JJZXE5E0GAVRPYW1NHJ4XJAE.png', '<p>MD Ngawen beralamat di Jl. Raya Ngawen - Blora No.Km, RW.12, Warudoyong, Ngawen, Kec. Ngawen, Kabupaten Blora, Jawa Tengah. MD Ngawen merupakan tempat untuk berbelanja retail maupun grosiran.</p>\n<p>Jam Operasional Pukul 08.30 - 21.30</p>', NULL, NULL, NULL, NULL, NULL, 'https://maps.app.goo.gl/XLuxGkSyadybUeuW9', '2025-01-31 07:43:08', '2025-02-19 02:39:45', '01JJXN0J1C71J1RP4WG7PDRVZE.png'),
(10, 'MD Purwodadi', '01JJXYEX8WCYCY4YVZ4D1PN0QV.svg', '<p>MD Purwodadi beralamat di Jl Usaha Purwodadi. MD Purwodadi tempat yang tepat untuk melakukan transaksi barang dengan jumlah kartonan. Tidak hanya barang barang kartonan, MD Purwodadi juga menawarkan minyak curah dengan harga yang kompetitif.</p>\n<p>Jam Operasional Pukul 08.30 - 21.30</p>', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-31 07:43:38', '2025-02-19 02:13:01', '01JJXN1F7SBK4MX70GDFEN8PCA.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_21_084105_create_categories_table', 1),
(9, '2025_01_21_084202_create_posts_table', 2),
(10, '2025_01_24_031442_create_tags_table', 2),
(11, '2025_01_24_032442_add_tag_to_table_posts', 2),
(12, '2025_01_24_034355_delete_field_tag_table_posts', 3),
(13, '2025_01_24_034950_create_post_tags_table', 4),
(15, '2025_01_24_042907_create_sosials_table', 5),
(16, '2025_01_25_111908_create_landing_pages_table', 6),
(17, '2025_01_27_120705_create_logos_table', 7),
(18, '2025_01_31_084132_add_deskripsi_to_table_logos', 8),
(20, '2025_01_31_091303_add_alamat_to_table_logos', 9),
(21, '2025_01_31_105310_add_thumbnail_to_table_logos', 10),
(23, '2025_02_01_150822_create_timelines_table', 11),
(24, '2025_02_01_162451_add_fotodepan_to_table_landingpages', 12),
(28, '2025_02_03_111728_create_visi_misis_table', 13),
(31, '2025_02_11_154425_create_category_galeries_table', 14),
(32, '2025_02_11_154501_create_galeries_table', 15),
(33, '2025_02_11_183053_create_category_promosis_table', 16),
(34, '2025_02_11_183550_create_promosis_table', 17),
(35, '2025_02_12_152604_add_table_image1-5_to_table_promosi', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `author_id`, `category_id`, `status`, `thumbnail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 'Barongan Blora: Tradisi Budaya yang Menggugah Jiwa', 'barongan-blora-tradisi-budaya-yang-menggugah-jiwa', '<p style=\"text-align: left;\" data-start=\"56\" data-end=\"471\">Barongan Blora adalah salah satu bentuk kesenian tradisional yang berasal dari daerah Blora, Jawa Tengah. Sebagai bagian dari warisan budaya lokal, barongan memiliki nilai-nilai budaya yang mendalam dan menjadi simbol keberagaman serta keunikan masyarakat Blora. Barongan ini tidak hanya menjadi hiburan semata, tetapi juga sarana untuk menjaga keberlanjutan tradisi leluhur yang telah ada sejak ratusan tahun lalu.</p>\n<h3 style=\"text-align: left;\" data-start=\"473\" data-end=\"503\"><strong data-start=\"477\" data-end=\"503\">Sejarah Barongan Blora</strong></h3>\n<p style=\"text-align: left;\" data-start=\"505\" data-end=\"918\">Barongan di Blora merupakan bagian dari kebudayaan Jawa yang berakar pada berbagai ritual dan kepercayaan masyarakat setempat. Di dalam konteks Barongan Blora, tari topeng dan penggunaan kostum berbentuk kepala singa atau macan merupakan simbol dari kekuatan dan keberanian. Secara tradisional, Barongan di Blora sering dipentaskan dalam berbagai acara adat, seperti perayaan, pesta rakyat, atau ritual keagamaan.</p>\n<p style=\"text-align: left;\" data-start=\"920\" data-end=\"1175\">Menurut beberapa cerita lisan, Barongan di Blora dulunya digunakan untuk menghormati leluhur dan dewa-dewa dalam mitologi Jawa. Setiap gerakan dan tariannya dipercaya memiliki makna tertentu, yang berfungsi sebagai bentuk komunikasi dengan alam spiritual.</p>\n<h3 style=\"text-align: left;\" data-start=\"1177\" data-end=\"1213\"><strong data-start=\"1181\" data-end=\"1213\">Karakteristik Barongan Blora</strong></h3>\n<p style=\"text-align: left;\" data-start=\"1215\" data-end=\"1593\">Salah satu ciri khas dari Barongan Blora adalah kostum dan topeng yang digunakan oleh para penarinya. Topeng Barongan Blora berbentuk kepala singa atau macan yang besar, dengan mata yang tajam dan taring yang mengerikan. Penari yang mengenakan topeng ini akan bergerak dengan penuh semangat, mengikuti irama musik yang dimainkan oleh gamelan atau alat musik tradisional lainnya.</p>\n<p style=\"text-align: left;\" data-start=\"1595\" data-end=\"2068\">Gerakan dalam Barongan Blora juga sangat dinamis, mencerminkan karakter hewan buas yang penuh dengan energi. Penari Barongan Blora biasanya akan melompat, berputar, atau bahkan melakukan atraksi yang menegangkan seperti \"nglencer,\" yaitu aksi di mana penari akan berjalan sambil berjongkok dengan kepala yang hampir menyentuh tanah. Gerakan-gerakan ini memberi kesan bahwa Barongan Blora bukan sekadar pertunjukan seni, tetapi juga bentuk meditasi dan komunikasi spiritual.</p>\n<h3 style=\"text-align: left;\" data-start=\"2070\" data-end=\"2109\"><strong data-start=\"2074\" data-end=\"2109\">Fungsi dan Makna Barongan Blora</strong></h3>\n<p style=\"text-align: left;\" data-start=\"2111\" data-end=\"2507\">Barongan Blora bukan hanya menjadi tontonan atau hiburan rakyat, melainkan juga memiliki makna filosofis yang mendalam. Pertunjukan Barongan sering kali dianggap sebagai sarana untuk mengusir roh jahat atau energi negatif. Oleh karena itu, acara yang melibatkan Barongan sering kali diadakan dalam rangka perayaan dan acara penting lainnya, seperti pernikahan, syukuran, atau acara besar lainnya.</p>\n<p style=\"text-align: left;\" data-start=\"2509\" data-end=\"2965\">Selain itu, Barongan Blora juga mencerminkan nilai gotong royong dan kebersamaan. Dalam pementasannya, Barongan tidak hanya melibatkan satu orang, melainkan sekelompok orang yang saling bekerja sama. Setiap penari memiliki peran yang berbeda, dari yang mengenakan topeng Barongan hingga yang memainkan gamelan atau alat musik lainnya. Semua elemen ini menyatu dalam satu kesatuan yang harmonis, menunjukkan pentingnya kolaborasi dalam kehidupan masyarakat.</p>\n<h3 style=\"text-align: left;\" data-start=\"2967\" data-end=\"3014\"><strong data-start=\"2971\" data-end=\"3014\">Barongan Blora dalam Perkembangan Zaman</strong></h3>\n<p style=\"text-align: left;\" data-start=\"3016\" data-end=\"3402\">Di tengah arus globalisasi yang semakin pesat, kesenian Barongan Blora tetap bertahan dan berkembang. Meskipun tantangan untuk menjaga tradisi semakin besar, banyak pihak yang berusaha untuk melestarikan Barongan Blora sebagai warisan budaya yang harus dijaga. Komunitas seni di Blora aktif dalam mengadakan pertunjukan dan melibatkan generasi muda dalam proses pelestarian tradisi ini.</p>\n<p style=\"text-align: left;\" data-start=\"3404\" data-end=\"3770\">Salah satu upaya yang dilakukan adalah melalui penyelenggaraan festival seni Barongan yang diikuti oleh berbagai kelompok seni dari Blora dan daerah sekitar. Selain itu, semakin banyak sekolah atau lembaga kebudayaan yang mengajarkan Barongan sebagai bagian dari kurikulum seni budaya, sehingga generasi muda dapat lebih mengenal dan mencintai warisan budaya mereka.</p>\n<h3 style=\"text-align: left;\" data-start=\"3772\" data-end=\"3790\"><strong data-start=\"3776\" data-end=\"3790\">Kesimpulan</strong></h3>\n<p style=\"text-align: left;\" data-start=\"3792\" data-end=\"4253\" data-is-last-node=\"\">Barongan Blora adalah contoh nyata dari betapa pentingnya melestarikan kebudayaan lokal yang kaya akan makna dan simbolisme. Sebagai salah satu bentuk seni tradisional, Barongan Blora tidak hanya sekadar hiburan, tetapi juga sarana untuk menjaga hubungan spiritual dan sosial masyarakat. Dengan upaya pelestarian yang berkelanjutan, diharapkan Barongan Blora akan terus berkembang dan menjadi kebanggaan bagi masyarakat Blora serta Indonesia secara keseluruhan.</p>\n<p style=\"text-align: left;\"><iframe src=\"https://www.youtube.com/embed/u1Qo7G6Umvs\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 1, 6, 'published', 'thumbnails/01JKW6KEA9WJ72R6KRADWFTTHA.png', '2025-01-30 01:32:53', '2025-02-19 09:49:11', NULL),
(19, 'Blora: Kota yang Memiliki Keindahan Alam dan Kekayaan Budaya', 'blora-kota-yang-memiliki-keindahan-alam-dan-kekayaan-budaya', '<p style=\"text-align: left;\" data-start=\"66\" data-end=\"515\">Blora adalah sebuah kabupaten yang terletak di Provinsi Jawa Tengah, Indonesia. Meskipun kota ini tidak sepopuler kota-kota besar lainnya, Blora memiliki potensi yang luar biasa dengan keindahan alam, sejarah, dan budaya yang kaya. Blora sering kali dijuluki sebagai \"Kota Kembang\" atau \"Kota Kecil dengan Potensi Besar.\" Meskipun mungkin kurang dikenal oleh sebagian orang, Blora menawarkan berbagai daya tarik yang sangat menarik untuk dijelajahi.</p>\n<h3 style=\"text-align: left;\" data-start=\"517\" data-end=\"545\">Sejarah dan Budaya Blora</h3>\n<p style=\"text-align: left;\" data-start=\"547\" data-end=\"995\">Blora memiliki sejarah yang panjang dan kaya, dengan akar yang dapat ditelusuri hingga era kerajaan-kerajaan Jawa kuno. Pada masa penjajahan Belanda, Blora merupakan salah satu daerah yang memiliki peran penting dalam sektor perkebunan dan sumber daya alam, khususnya minyak bumi dan kayu jati. Kota ini memiliki banyak peninggalan sejarah, termasuk bangunan-bangunan tua dan situs-situs bersejarah yang menjadi saksi bisu perjalanan panjang Blora.</p>\n<p style=\"text-align: left;\" data-start=\"997\" data-end=\"1352\">Budaya masyarakat Blora sangat dipengaruhi oleh tradisi Jawa. Salah satu kebudayaan yang terkenal adalah seni pertunjukan seperti <em data-start=\"1127\" data-end=\"1141\">wayang kulit</em> dan <em data-start=\"1146\" data-end=\"1155\">gamelan</em>. Di sini, Anda juga bisa menemukan berbagai upacara adat yang masih dilestarikan hingga saat ini, seperti <em data-start=\"1262\" data-end=\"1276\">sedekah bumi</em> yang merupakan ritual untuk menghormati hasil bumi dan memohon keselamatan.</p>\n<h3 style=\"text-align: left;\" data-start=\"1354\" data-end=\"1378\">Keindahan Alam Blora</h3>\n<p style=\"text-align: left;\" data-start=\"1380\" data-end=\"1814\">Blora terkenal dengan keindahan alamnya yang memikat. Kabupaten ini dikelilingi oleh pegunungan, hutan, dan ladang yang hijau, menciptakan pemandangan alam yang luar biasa. Salah satu destinasi alam yang populer di Blora adalah <strong data-start=\"1608\" data-end=\"1641\">Taman Nasional Gunung Merbabu</strong> yang berada tidak jauh dari Blora. Gunung Merbabu adalah salah satu gunung favorit bagi pendaki, menawarkan pemandangan yang spektakuler dan jalur pendakian yang menantang.</p>\n<p style=\"text-align: left;\" data-start=\"1816\" data-end=\"2134\">Selain itu, Blora juga memiliki beberapa tempat wisata alam lainnya, seperti <strong data-start=\"1893\" data-end=\"1911\">Sendang Ngipik</strong> yang merupakan sumber mata air alami yang dikelilingi oleh pepohonan hijau, serta <strong data-start=\"1994\" data-end=\"2011\">Waduk Greneng</strong>, waduk yang menawarkan pemandangan yang indah dan cocok untuk berbagai kegiatan rekreasi, seperti memancing dan berperahu.</p>\n<h3 style=\"text-align: left;\" data-start=\"2136\" data-end=\"2161\">Potensi Ekonomi Blora</h3>\n<p style=\"text-align: left;\" data-start=\"2163\" data-end=\"2582\">Blora memiliki potensi ekonomi yang cukup besar, terutama di sektor pertanian, kehutanan, dan industri minyak dan gas. Kabupaten ini dikenal sebagai salah satu daerah penghasil kayu jati terbesar di Indonesia, dan hutan jati Blora menjadi salah satu sumber daya alam yang sangat berharga. Selain itu, keberadaan ladang minyak di sekitar wilayah Blora juga memberikan kontribusi penting terhadap perekonomian daerah ini.</p>\n<p style=\"text-align: left;\" data-start=\"2584\" data-end=\"2966\">Selain sektor alam, Blora juga mulai berkembang di sektor pariwisata, dengan banyaknya tempat wisata alam yang menawarkan potensi besar untuk menarik wisatawan domestik dan internasional. Pemerintah setempat terus berupaya untuk mengembangkan infrastruktur dan mempromosikan destinasi wisata untuk meningkatkan sektor pariwisata yang bisa menjadi salah satu sumber pendapatan utama.</p>\n<h3 style=\"text-align: left;\" data-start=\"3417\" data-end=\"3431\">Kesimpulan</h3>\n<p style=\"text-align: left;\" data-start=\"3433\" data-end=\"3890\" data-is-last-node=\"\">Blora adalah kota kecil yang kaya akan potensi dan memiliki pesona alam serta budaya yang tidak bisa diabaikan. Dengan keindahan alamnya yang menakjubkan, sejarah yang menarik, dan kekayaan budaya yang terjaga, Blora adalah tempat yang layak untuk dijelajahi. Meskipun kota ini mungkin tidak terkenal seperti kota-kota besar lainnya, namun Blora menawarkan pengalaman yang berbeda dan menyegarkan bagi mereka yang ingin menikmati sisi lain dari Jawa Tengah.</p>', 1, 6, 'published', 'thumbnails/01JM23NRJMAP3T8N5HFS8WJ5Q3.jpg', '2025-02-14 11:32:02', '2025-02-19 09:48:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(18, 17, 1, NULL, NULL),
(20, 19, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promosis`
--

CREATE TABLE `promosis` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promosis`
--

INSERT INTO `promosis` (`id`, `name`, `image`, `image2`, `category_id`, `start_date`, `end_date`, `created_at`, `updated_at`, `image3`, `image4`, `image5`) VALUES
(1, 'Promo 1', '01JKTHP5CXWQNNF3JCN5FZ4J8R.jpg', '01JKYFHQC4DRS5WPX8AM6PWQFZ.jpg', 2, '2025-02-09', '2025-03-31', '2025-02-11 11:41:48', '2025-02-19 02:48:44', '01JKYH2PVFB7H5D8ZH8GP2DH4Q.jpg', '01JKYH2PVNYN08V9QP4Q5TY6Q0.jpg', '01JKYH2PVR4BX4K374YP0JRQZC.jpg'),
(2, 'Mie Sedap', '01JKWKXZETWP4CX54D7P8FFBEN.jpg', '01JKYH56GKNACTA2ZMP4DXRBGS.jpg', 1, '2025-02-12', '2025-02-28', '2025-02-11 12:13:12', '2025-02-19 02:49:11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('412GVEYdghZ9dNLn5kIbOlQjoPq3tdxVONJk4DdF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2tRdHZ3OTc2MjhnNGFPc2hpUXdCbU5xNnBESXBKYkxFalVHbldUQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9jbXMudGVzdDo4MDgwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740187718),
('6FTqx4jQ5LlJP7AD2P6tqESRAYfpfeCRiifvO6wH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidmswWFBsaGo0S3ZJSFpvM2owQ00xNGRJZzNXUVJocmkzNUswWlk4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9jbXMudGVzdDo4MDgwL2FkbWluL3Nvc2lhbHMvMi9lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJDZleFRueDRRa3B0V2VEWXdEOUMzYi54SnRPNVNmM0lhOGtUY2Y0V2R5SUsxbG9NY2ZLLkpPIjt9', 1740371427),
('gacERXP9142xtSlyWrekWF7JubuvWR3sFIgnZGPy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibXk5YzlmcFRReXpKYk5WREg1aU9MWUc0a3FrWlJOTGNOajdUVGo3diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODA6Imh0dHA6Ly9jbXMudGVzdDo4MDgwL2xpc3QtcG9zdC9iYXJvbmdhbi1ibG9yYS10cmFkaXNpLWJ1ZGF5YS15YW5nLW1lbmdndWdhaC1qaXdhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740389072),
('noQEjoBaeRGj1DI80O9hmgur9RrY7zShBebsvERz', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTHcyM3EwMHQxenVrRTFTaE5jV3VaY0pUQmJEZkpYQzNYU1F0dm5lTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9jbXMudGVzdDo4MDgwL2FkbWluIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJDZleFRueDRRa3B0V2VEWXdEOUMzYi54SnRPNVNmM0lhOGtUY2Y0V2R5SUsxbG9NY2ZLLkpPIjt9', 1740133148),
('t7PvzGSOPQTDXAWfHPCi7rYbrqEkCsEaSEKeKaGu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNkRWZnVnZHdYUVZldjQ5Z01pSWI5UENKT2d6V043SmtBR1dhS0tWeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740201481),
('vPNheLGyQM2DOJkfqcMDm7hK2sAxwqvKsafHoQez', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTDBoOWNSR2hqdnE1WjhxSExpbUhKRERaUWZQNU1RMTlxazJhSzhPWCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIwOiJodHRwOi8vY21zLnRlc3Q6ODA4MCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiQ2ZXhUbng0UWtwdFdlRFl3RDlDM2IueEp0TzVTZjNJYThrVGNmNFdkeUlLMWxvTWNmSy5KTyI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1740203764);

-- --------------------------------------------------------

--
-- Table structure for table `sosials`
--

CREATE TABLE `sosials` (
  `id` bigint UNSIGNED NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sosials`
--

INSERT INTO `sosials` (`id`, `instagram`, `facebook`, `twitter`, `linkedin`, `youtube`, `website`, `whatsapp`, `telegram`, `tiktok`, `email`, `created_at`, `updated_at`) VALUES
(2, 'mdmallblora', 'mdmallblora', NULL, NULL, NULL, NULL, '6285641076164', '72.056.336.0-514.000', '@mdmallblora', 'mdmall@gmail.com', '2025-01-23 23:03:34', '2025-02-21 08:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MD Group', '2025-01-23 20:30:50', '2025-01-23 20:30:50'),
(2, 'Murah Setiap Hari', '2025-01-23 20:31:01', '2025-01-23 20:31:10'),
(3, 'Promo Murah', '2025-01-23 20:31:27', '2025-01-23 20:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `icon`, `date`, `title`, `description`, `position`, `created_at`, `updated_at`) VALUES
(1, 'ri-stack-line', '2003-02-12', 'Berdirinya MD Group', 'MD Group didirikan oleh Ibu Sri Mulyani pada tahun ... yaitu berawal dari sebuah toko sembako kecil yang beralamat di kelurahan Kauman Kecamatan Blora yang menjadi cikal bakal berdirinya MD Group.', 'left', '2025-02-01 08:20:13', '2025-02-20 02:02:11'),
(2, 'ri-stack-line', '2005-09-15', 'Berkarya Lebih Maju', 'Seiring berjalannya waktu, MD atau Morodadi yang berawal dari sebuah toko kecil mulai berkembang untuk membangun sebuah toko yang lebih besar pada tahun 2005, yang saat ini dikenal dengan nama MD Mall.', 'right', '2025-02-01 08:24:32', '2025-02-10 09:27:05'),
(3, 'ri-stack-line', '2008-08-10', 'Business Expansion', 'Setelah membangun toko yang lebih besar yaitu MD Mall. Beberapa tahun kemudian tepatnya pada tahun 2008. MD Group kembali membangun toko lainnya untuk sebuah pengembangan. Toko ini adalah MD Ngawen yang beralamat di Jl. Raya Ngawen - Blora No.Km, RW.12, Warudoyong, Ngawen, Kec. Ngawen, Kabupaten Blora.', 'left', '2025-02-01 08:25:17', '2025-02-19 01:43:34'),
(4, 'ri-stack-line', '2009-05-24', 'Business Expansion', 'Setelah membangun toko MD Ngawen. MD Group kembali memacu pembangunan cabang lainnya yaitu MD Kuwu pada tahun 2009 beralamat di Jl. Honggokusuman No.52, Tegalkembangan, Kuwu, Kec. Kradenan, Kabupaten Grobogan.', 'right', '2025-02-01 08:25:40', '2025-02-19 01:45:28'),
(5, 'ri-stack-line', '2010-04-04', 'Business Expansion', 'Setelah membangun toko MD Kuwu. MD Group kembali memacu pembangunan cabang lainnya yaitu MD Jepon pada tahun 2010 beralamat di Jl. Nasional Blora - Cepu No.Km. 7, Jepon, Kec. Jepon, Kabupaten Blora.', 'left', '2025-02-10 09:43:57', '2025-02-19 01:47:11'),
(6, 'ri-stack-line', '2014-10-16', 'Business Expansion', 'Setelah membangun toko MD Jepon, selang beberapa tahun MD Group kembali membangun cabang lainnya yaitu MD Purwodadi pada tahun 2014. beralamat di Jl. Usaha, Purwodadi', 'right', '2025-02-10 09:50:07', '2025-02-19 01:50:03'),
(7, 'ri-stack-line', '2019-09-19', 'Business Expansion', 'MD Group bukan hanya membuka toko retail tapi juga mengembanhkan bisnis lainya yaitu dibidang FnB, berawal dari sebuah restoran yang beralamat di Jl. RA. Kartini No.5, Kunden, Kec. Blora, Kabupaten Blora, Jawa Tengah yang dikenal dengan nama Olive Eatery & Coffee. Kemudian MD Group kembali membangun cabang FnB lainnya yaitu Eight Cafe yang beralamat di lantai 2 MD Mall Jl Pemuda No 3 Kunden Blora.', 'left', '2025-02-10 09:54:13', '2025-02-19 01:51:11'),
(8, 'ri-stack-line', '2024-04-06', 'Business Expansion', 'Setelah sukses mengembangkan bisnis di bidang FnB, MD Group kembali mencoba membuat bisnis lainnya yaitu dibidang wahana permainan anak. Dimulai dari membangun wahana permainan anak yang ada di Kamolan dengan nama MD Playland. Kemudian MD Playland berkembang membangun cabang lainnya yaitu Holy Kids yang terletak di lantai 2 MD Mall Blora, MD Grosir Kuwu dan MD Jepon.', 'right', '2025-02-10 10:13:24', '2025-02-19 01:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$6exTnx4QkptWeDYwD9C3b.xJtO5Sf3Ia8kTcf4WdyIK1loMcfK.JO', 'ImfS87q3AhwYD1Pn4Aagk9xqceYj7ntssEnY7IyM0zvv9dIrNVcXBAjf4oeW', '2025-01-21 02:14:59', '2025-01-21 02:14:59'),
(2, 'Imam', 'imam@mdgroup.id', NULL, '$2y$12$pNFTcA475RsDRBUU1igQ3uSDaaQ2Uqj385V6gB4xKqCB/Z1L/1OqC', NULL, '2025-01-26 03:55:09', '2025-02-03 05:20:01'),
(3, 'Aziz', 'aziz@mdgroup.id', NULL, '$2y$12$W7lCX3i.ABzwd077CrHkwuw3tZETy02bCPpCy1NF3aXyK2cx/WogO', NULL, '2025-02-03 05:20:24', '2025-02-03 05:20:24'),
(4, 'Admin Posting', 'adminposting@gmail.com', NULL, '$2y$12$I.X95Et36l/ZetKvtqpKaeekCj8NPGZeIyfrBqwqXgy5o7qese2ai', NULL, '2025-02-21 08:46:52', '2025-02-21 08:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misis`
--

CREATE TABLE `visi_misis` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi_misis`
--

INSERT INTO `visi_misis` (`id`, `type`, `content`, `created_at`, `updated_at`) VALUES
(1, 'visi', '- Sebagai pelopor modern market', '2025-02-12 03:48:39', '2025-02-12 03:48:39'),
(2, 'visi', '- Menjadi pusat bisnis yang tepat dan menguntungkan ', '2025-02-12 03:55:55', '2025-02-12 03:55:55'),
(3, 'visi', '- Sebagai pusat wisata belanja', '2025-02-12 03:56:19', '2025-02-12 03:56:19'),
(4, 'misi', 'Menciptakan suasana belanja yang nyaman dan aman', '2025-02-12 03:56:54', '2025-02-12 03:56:54'),
(5, 'misi', 'Menciptakan pelayanan yang prima', '2025-02-12 03:57:20', '2025-02-12 03:57:20'),
(6, 'misi', 'Menyediakan kebutuhan masyarakat tepat sasaran', '2025-02-12 03:58:15', '2025-02-12 03:58:15'),
(7, 'misi', 'Menjalin hubungan kerjasama dengan dengan berbagai sektor', '2025-02-12 03:58:55', '2025-02-12 03:58:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_galeries`
--
ALTER TABLE `category_galeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_promosis`
--
ALTER TABLE `category_promosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeries_category_id_foreign` (`category_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_pages`
--
ALTER TABLE `landing_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_author_id_foreign` (`author_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tags_post_id_foreign` (`post_id`),
  ADD KEY `post_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `promosis`
--
ALTER TABLE `promosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promosis_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sosials`
--
ALTER TABLE `sosials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visi_misis`
--
ALTER TABLE `visi_misis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_galeries`
--
ALTER TABLE `category_galeries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_promosis`
--
ALTER TABLE `category_promosis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_pages`
--
ALTER TABLE `landing_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `promosis`
--
ALTER TABLE `promosis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sosials`
--
ALTER TABLE `sosials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visi_misis`
--
ALTER TABLE `visi_misis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galeries`
--
ALTER TABLE `galeries`
  ADD CONSTRAINT `galeries_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_galeries` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promosis`
--
ALTER TABLE `promosis`
  ADD CONSTRAINT `promosis_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_promosis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
