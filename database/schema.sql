/*
 Navicat Premium Data Transfer

 Source Server         : Dicky Ilham Ramdhani 1903040171
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : sd_muhammadiyah

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 15/05/2026 01:21:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'bcrypt hash',
  `full_name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` enum('superadmin','admin','editor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'editor',
  `last_login` datetime(0) NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES (1, 'admin', '$2y$10$1Rt5q5w1a.cdi6vFcdlmIetUEhFJrk6dU/K1w8Z09rJfXFv3Komz2', 'Administrator', 'admin@sdmuh1gentasari.sch.id', NULL, 'superadmin', '2026-05-14 18:28:34', 1, '2026-05-05 13:36:55', '2026-05-14 18:28:34');

-- ----------------------------
-- Table structure for announcements
-- ----------------------------
DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(280) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('umum','akademik','kegiatan','penting') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'umum',
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `author_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `is_pinned` tinyint(1) NULL DEFAULT 0,
  `is_published` tinyint(1) NULL DEFAULT 1,
  `views` int(10) UNSIGNED NULL DEFAULT 0,
  `published_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slug`(`slug`) USING BTREE,
  INDEX `author_id`(`author_id`) USING BTREE,
  INDEX `idx_published`(`is_published`, `published_at`) USING BTREE,
  INDEX `idx_pinned`(`is_pinned`) USING BTREE,
  CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `admin_users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of announcements
-- ----------------------------
INSERT INTO `announcements` VALUES (1, 'Libur Hari Raya Idul Adha dan Cuti Hari Raya', 'libur-hari-raya-idul-adha-dan-cuti-hari-raya', '<p>Libur Hari Raya Idulfitri 1447 H/2026 M jatuh pada bulan Maret, dengan libur nasional tanggal 21–22 Maret dan cuti bersama tanggal 20, 23, 24 Maret. Kantor dan pelayanan umumnya tutup 19–25 Maret, sementara sekolah mulai aktif kembali sekitar tanggal 25 Maret atau disesuaikan dengan kebijakan pendidikan. [<a href=\"https://s3pendsains.fmipa.unesa.ac.id/post/jadwal-libur-sekolah-ramadan-dan-idul-fitri-2026-awal-puasa-libur-lebaran-ikut-skb-3-menteri\" rel=\"noopener noreferrer\" target=\"_blank\">1</a>, <a href=\"https://pendidikan-matematika.fmipa.unesa.ac.id/post/libur-nasional-dan-cuti-bersama-2026\" rel=\"noopener noreferrer\" target=\"_blank\">2</a>, <a href=\"https://www.instagram.com/p/DWBVZZSEsp3/\" rel=\"noopener noreferrer\" target=\"_blank\">3</a>, <a href=\"https://unmas.ac.id/informasi/berita/pengumuman-libur-hari-raya-nyepi-dan-idul-fitri-tahun-2026\" rel=\"noopener noreferrer\" target=\"_blank\">4</a>]</p><p>Info Libur Idulfitri 1447 H (2026)</p><ul><li>Libur Nasional: Sabtu, 21 Maret 2026 &amp; Minggu, 22 Maret 2026.</li><li>Cuti Bersama: Jumat (20/3), Senin (23/3), dan Selasa (24/3).</li><li>Kembali Bekerja/Sekolah: Umumnya Rabu, 25 Maret 2026.</li><li>Catatan: Beberapa instansi/perusahaan mungkin memiliki jadwal penyesuaian (libur/tutup) lebih awal seperti mulai 19 Maret 2026. [<a href=\"https://id.medanaktual.com/apakah-25-maret-masih-libur-lebaran-ini-jadwal-resmi-skb-3-menteri/\" rel=\"noopener noreferrer\" target=\"_blank\">1</a>, <a href=\"https://s3pendsains.fmipa.unesa.ac.id/post/jadwal-libur-sekolah-ramadan-dan-idul-fitri-2026-awal-puasa-libur-lebaran-ikut-skb-3-menteri\" rel=\"noopener noreferrer\" target=\"_blank\">2</a>, <a href=\"https://pendidikan-matematika.fmipa.unesa.ac.id/post/libur-nasional-dan-cuti-bersama-2026\" rel=\"noopener noreferrer\" target=\"_blank\">3</a>, <a href=\"https://unmas.ac.id/informasi/berita/pengumuman-libur-hari-raya-nyepi-dan-idul-fitri-tahun-2026\" rel=\"noopener noreferrer\" target=\"_blank\">4</a>, <a href=\"https://www.instagram.com/p/DWBVZZSEsp3/\" rel=\"noopener noreferrer\" target=\"_blank\">5</a>]</li></ul><p>Pastikan untuk memeriksa surat edaran resmi dari instansi atau perusahaan masing-masing untuk detail operasional.</p>', 'akademik', 'img_6a0067047ed165.66078914.jpg', 1, 0, 1, 5, '2026-05-30 11:01:00', '2026-05-10 11:02:36', '2026-05-10 18:08:17');

-- ----------------------------
-- Table structure for complaints
-- ----------------------------
DROP TABLE IF EXISTS `complaints`;
CREATE TABLE `complaints`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `category` enum('fasilitas','pembelajaran','administrasi','keamanan','lainnya') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'lainnya',
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` enum('masuk','diproses','selesai','ditutup') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'masuk',
  `admin_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `responded_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `responded_at` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `ticket_no`(`ticket_no`) USING BTREE,
  INDEX `responded_by`(`responded_by`) USING BTREE,
  INDEX `idx_status`(`status`) USING BTREE,
  CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`responded_by`) REFERENCES `admin_users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of complaints
-- ----------------------------
INSERT INTO `complaints` VALUES (1, 'PGD-20260510-3FA6', 'RIfqi', '', '085232323423', 'administrasi', 'Sulit Mengurus Administrasi', 'asdasdasasda', NULL, 'diproses', 'Terima kasih atas laporannya. Mohon maaf atas ketidaknyamanan Anda. Pengaduan terkait Administrasi sudah kami terima dan akan segera kami tindak lanjuti dalam 1x24 jam', 1, '2026-05-10 11:07:02', '2026-05-10 11:05:14');
INSERT INTO `complaints` VALUES (2, 'PGD-20260510-49D6', 'testing1', 'dickyramdhani128@gmail.com', '085878681819', 'fasilitas', 'Testing Subject 1', 'asdasdasdaw', NULL, 'ditutup', 'okey', 1, '2026-05-10 18:17:18', '2026-05-10 11:07:57');
INSERT INTO `complaints` VALUES (3, 'PGD-20260510-7477', 'rivqi', '', '', 'fasilitas', 'balabala', 'amsbdja', 'PGD-20260510-7477.jpg', 'masuk', NULL, NULL, NULL, '2026-05-10 18:08:55');
INSERT INTO `complaints` VALUES (4, 'PGD-20260510-8A9B', 'rivqi', '', '', 'fasilitas', 'balabala', 'amsbdja', 'PGD-20260510-8A9B.jpg', 'selesai', 'baik, akan kami tindak lanjuti masalah berikut.', 1, '2026-05-10 18:16:47', '2026-05-10 18:14:49');

-- ----------------------------
-- Table structure for contact_messages
-- ----------------------------
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_read`(`is_read`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact_messages
-- ----------------------------
INSERT INTO `contact_messages` VALUES (1, 'Widodo', 'testkontak@gmail.com', '0865464546456', 'Follow-up Seminar', 'SiraMedia ignin menginfokan test seminar 27 Mei 2026. Izin untuk konfirmasi', 1, '2026-05-10 11:49:42');
INSERT INTO `contact_messages` VALUES (2, 'test', 'raviqsese@gmail.com', '', 'follow up perencanaan seminar', 'denbjhtfgbvg', 1, '2026-05-10 18:45:09');
INSERT INTO `contact_messages` VALUES (3, 'rrdrdf', 'ygyg@gmail.com', '', 'otw', 'otw jam 9', 1, '2026-05-10 18:48:24');

-- ----------------------------
-- Table structure for extracurricular
-- ----------------------------
DROP TABLE IF EXISTS `extracurricular`;
CREATE TABLE `extracurricular`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `schedule` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Jadwal singkat, e.g. Selasa & Kamis, 14.00-16.00',
  `coach` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `sort_order` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of extracurricular
-- ----------------------------
INSERT INTO `extracurricular` VALUES (1, 'Pramuka', 'organisasi pendidikan nonformal di Indonesia yang berfokus pada pembentukan karakter, kepribadian, kemandirian, dan disiplin melalui metode belajar sambil melakukan (learning by doing), interaksi sosial, serta aktivitas luar ruangan yang menyenangkan, seperti kemah, tali-temali, dan penjelajahan alam.', 'Jumat, 13.00 - 14.00', 'Pak Rifqi', '', 'layout', 1, 0, '2026-05-10 11:01:16');
INSERT INTO `extracurricular` VALUES (2, 'Bahasa Jepang', 'Belum aktif dikarenakan penyesuaian jadwal', 'Sabtu, 08.00–10.00', 'Jumadi', '', '', 0, 0, '2026-05-14 21:45:53');

-- ----------------------------
-- Table structure for facilities
-- ----------------------------
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE `facilities`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Lucide icon name',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `count` int(11) NULL DEFAULT 1,
  `condition` enum('baik','cukup','rusak_ringan','rusak_berat') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'baik',
  `sort_order` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facilities
-- ----------------------------
INSERT INTO `facilities` VALUES (2, 'Perpustakaan', 'asdabshbdw', 'library', 'img_6a05b256a26d29.00790871.jfif', 1, 'baik', 2, '2026-05-05 13:36:55');
INSERT INTO `facilities` VALUES (3, 'Lab Komputer', NULL, 'monitor', NULL, 1, 'baik', 3, '2026-05-05 13:36:55');
INSERT INTO `facilities` VALUES (5, 'UKS', NULL, 'heart-pulse', NULL, 1, 'baik', 5, '2026-05-05 13:36:55');
INSERT INTO `facilities` VALUES (6, 'Lapangan Olahraga', NULL, 'trophy', NULL, 2, 'baik', 6, '2026-05-05 13:36:55');
INSERT INTO `facilities` VALUES (7, 'Kantin Sehat', NULL, 'utensils', NULL, 1, 'baik', 7, '2026-05-05 13:36:55');
INSERT INTO `facilities` VALUES (8, 'Toilet Siswa', NULL, 'droplets', NULL, 6, 'baik', 8, '2026-05-05 13:36:55');
INSERT INTO `facilities` VALUES (12, 'Masjid', 'Masjid digunakan untuk sholat berjamaah', '', 'img_6a05dfaa1f9f12.84205432.jfif', 1, 'rusak_ringan', 0, '2026-05-14 21:43:54');

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NULL DEFAULT 0,
  `sort_order` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_category`(`category_id`) USING BTREE,
  INDEX `idx_featured`(`is_featured`) USING BTREE,
  CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `gallery_categories` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES (1, 4, 'Juara Lomba Pencak Silat', 'Juara 3', 'img_6a00659fa62264.79341695.jpg', 1, 0, '2026-05-10 18:01:51');
INSERT INTO `gallery` VALUES (2, NULL, 'asdad', '', 'img_6a0073bf3d1ab3.36843612.jpg', 0, 0, '2026-05-10 19:02:07');

-- ----------------------------
-- Table structure for gallery_categories
-- ----------------------------
DROP TABLE IF EXISTS `gallery_categories`;
CREATE TABLE `gallery_categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slug`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery_categories
-- ----------------------------
INSERT INTO `gallery_categories` VALUES (1, 'Kegiatan Belajar', 'kegiatan-belajar', 1);
INSERT INTO `gallery_categories` VALUES (2, 'Fasilitas Sekolah', 'fasilitas', 2);
INSERT INTO `gallery_categories` VALUES (3, 'Ekstrakurikuler', 'ekskul', 3);
INSERT INTO `gallery_categories` VALUES (4, 'Prestasi', 'prestasi', 4);
INSERT INTO `gallery_categories` VALUES (5, 'Event & Perayaan', 'event', 5);

-- ----------------------------
-- Table structure for school_profile
-- ----------------------------
DROP TABLE IF EXISTS `school_profile`;
CREATE TABLE `school_profile`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `village` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `district` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `postal_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `website` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hero_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `visi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `misi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sejarah` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `akreditasi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_berdiri` year NULL DEFAULT NULL,
  `facebook` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `instagram` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `youtube` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `maps_embed` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of school_profile
-- ----------------------------
INSERT INTO `school_profile` VALUES (1, 'SD Muhammadiyah 01 Gentasari', '20300791', 'Jl. Temulawak 1', 'Gentasari', 'Kroya', 'Cilacap', 'Jawa Tengah', '53282', '(0282) 123456', 'info@sdmuh1gentasari.sch.id', 'https://sites.google.com/view/musarimedia', 'img_6a05783b5140b8.32334452.png', 'img_6a057b1cef3918.35781729.png', 'Menjadi sekolah Islam unggul yang menghasilkan generasi cerdas, berkarakter, dan berakhlak mulia berlandaskan nilai-nilai Al-Islam dan Kemuhammadiyahan.', 'Menyelenggarakan pendidikan Islam berkualitas tinggi; Membentuk karakter siswa yang berakhlak mulia; Mengembangkan potensi akademik dan non-akademik secara optimal; Menciptakan lingkungan belajar yang inovatif dan menyenangkan.', 'SD Muhammadiyah 01 Gentasari merupakan lembaga pendidikan dasar yang berada di bawah naungan Muhammadiyah yang bergerak di bidang dakwah dan pendidikan. Sekolah ini didirikan pada tahun 1989 atas prakarsa tokoh Muhammadiyah setempat, yaitu Prof. Dr. drh. Cahyono Purbomartono, M.Sc., dengan dukungan masyarakat yang memiliki kepedulian tinggi terhadap pentingnya pendidikan dasar berbasis nilai-nilai Islam.\r\n\r\nBerlokasi di Gentasari, SD Muhammadiyah 01 Gentasari hadir sebagai wujud nyata komitmen Muhammadiyah dalam mencerdaskan kehidupan bangsa melalui pendidikan yang berkualitas dan berkarakter. Pada masa awal berdirinya, kegiatan pembelajaran dilaksanakan dengan sarana dan prasarana yang sederhana serta jumlah peserta didik yang masih terbatas.\r\n\r\nSeiring berjalannya waktu, SD Muhammadiyah 01 Gentasari mengalami perkembangan yang signifikan. Peningkatan jumlah peserta didik, kualitas tenaga pendidik, serta fasilitas pendidikan menjadi indikator kemajuan sekolah ini. Dalam proses pembelajaran, sekolah mengintegrasikan kurikulum nasional dengan pendidikan keislaman untuk membentuk peserta didik yang unggul secara akademik sekaligus memiliki akhlak mulia dan karakter Islami.\r\n\r\nDalam bidang prestasi, SD Muhammadiyah 01 Gentasari aktif berpartisipasi dalam berbagai ajang kompetisi, baik di tingkat lokal maupun daerah. Sekolah secara konsisten mengirimkan perwakilan siswa dalam berbagai kegiatan yang diselenggarakan oleh PDM Kabupaten Cilacap, termasuk dalam ajang seperti Muhammadiyah Competition VII. Partisipasi ini menjadi bukti komitmen sekolah dalam mendorong pengembangan potensi dan prestasi siswa.\r\n\r\nSelain itu, sekolah memiliki fokus kuat pada pendidikan karakter dan pembentukan generasi Qurani. Dengan visi menjadi sekolah unggul dan mandiri, SD Muhammadiyah 01 Gentasari terus berupaya menanamkan nilai-nilai keislaman dalam setiap aspek pembelajaran. Upaya ini menjadikan sekolah dikenal sebagai salah satu sekolah berprestasi di wilayahnya.\r\n\r\nDengan dukungan seluruh pemangku kepentingan, SD Muhammadiyah 01 Gentasari berkomitmen untuk terus meningkatkan mutu pendidikan, mencetak generasi yang berilmu, beriman, dan berakhlak mulia, serta mampu berkontribusi positif bagi masyarakat, bangsa, dan negara.', 'A', 1989, '', 'https://www.instagram.com/musarimedia/', 'https://www.youtube.com/@BERITAMUSARI', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d988.679132814972!2d109.218905!3d-7.605795!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e654188fb30c06b%3A0xf7cf8b960fa61b62!2sSD%20Muhammadiyah%2001%20Gentasari!5e0!3m2!1sid!2sid!4v1777967700032!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2026-05-14 14:34:52');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `label` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `group` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'general',
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('canonical_url', '', NULL, 'general', '2026-05-13 13:48:30');
INSERT INTO `settings` VALUES ('favicon', 'img_6a041a31f102a4.01757300.png', NULL, 'general', '2026-05-13 13:29:05');
INSERT INTO `settings` VALUES ('google_analytics', '', NULL, 'general', '2026-05-13 13:29:05');
INSERT INTO `settings` VALUES ('hero_cta_primary', 'Kenali Kami', NULL, 'general', '2026-05-14 21:34:02');
INSERT INTO `settings` VALUES ('hero_cta_secondary', 'Kontak', NULL, 'general', '2026-05-13 21:27:18');
INSERT INTO `settings` VALUES ('hero_image', 'img_6a057aead14653.14488967.jpg', 'Gambar Hero', 'homepage', '2026-05-14 14:34:02');
INSERT INTO `settings` VALUES ('hero_subtitle', 'Membentuk Generasi Cerdas Berakhlak Mulia', 'Subjudul Hero', 'homepage', '2026-05-14 21:34:02');
INSERT INTO `settings` VALUES ('hero_title', 'Sekolah Dasar Islam Unggulan', 'Judul Hero', 'homepage', '2026-05-14 21:34:02');
INSERT INTO `settings` VALUES ('maintenance_mode', '0', 'Mode Maintenance', 'general', '2026-05-05 13:36:55');
INSERT INTO `settings` VALUES ('meta_description', 'Website resmi SD Muhammadiyah 01 Gentasari — sekolah dasar unggulan dengan pendidikan Islami, pembelajaran modern, prestasi siswa, guru profesional, dan lingkungan belajar yang nyaman serta inspiratif.', NULL, 'general', '2026-05-13 13:48:30');
INSERT INTO `settings` VALUES ('meta_keywords', 'SD Muhammadiyah 01 Gentasari, SD Muhammadiyah Gentasari, sekolah dasar Islam, sekolah Muhammadiyah, SD unggulan, sekolah dasar terbaik, pendidikan Islami, sekolah dasar Banyumas, SD modern, sekolah ramah anak, sekolah dasar berprestasi, website sekolah, profil sekolah Muhammadiyah, pendidikan karakter Islami, sekolah dasar swasta, SDIT Muhammadiyah, sekolah dengan pembelajaran modern, sekolah dasar favorit, SD Muhammadiyah Jawa Tengah, sekolah dasar berkualitas', NULL, 'general', '2026-05-13 13:48:30');
INSERT INTO `settings` VALUES ('og_image', '', NULL, 'general', '2026-05-13 13:29:05');
INSERT INTO `settings` VALUES ('robots_txt', 'index,follow', NULL, 'general', '2026-05-13 13:48:30');
INSERT INTO `settings` VALUES ('site_tagline', 'Cerdas, Berkarakter, Islami', 'Tagline Situs', 'general', '2026-05-05 13:36:55');
INSERT INTO `settings` VALUES ('site_title', 'SD Muhammadiyah 01 Gentasari', 'Judul Situs', 'general', '2026-05-13 13:29:05');
INSERT INTO `settings` VALUES ('stats_ekskul', '8', 'Jumlah Ekskul', 'homepage', '2026-05-13 13:43:21');
INSERT INTO `settings` VALUES ('stats_students', '300', 'Jumlah Siswa', 'homepage', '2026-05-13 13:43:21');
INSERT INTO `settings` VALUES ('stats_teachers', '9', 'Jumlah Guru', 'homepage', '2026-05-13 13:43:21');
INSERT INTO `settings` VALUES ('stats_years', '27', 'Tahun Berdiri', 'homepage', '2026-05-13 13:43:21');

-- ----------------------------
-- Table structure for student_achievements
-- ----------------------------
DROP TABLE IF EXISTS `student_achievements`;
CREATE TABLE `student_achievements`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `level` enum('sekolah','kecamatan','kabupaten','provinsi','nasional','internasional') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'sekolah',
  `year` year NULL DEFAULT NULL,
  `student_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `grade` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_achievements
-- ----------------------------
INSERT INTO `student_achievements` VALUES (1, 'JUARA LOMBA GAMBAR', 'Juara 2 lomba gambar sekecamatan Kroya.', 'kecamatan', 2026, 'Rivqi', 'V', 'img_6a0072a8e71360.03720102.jpg', '2026-05-10 17:59:48');
INSERT INTO `student_achievements` VALUES (2, 'Lomba Pencak Silat', 'Keren banget', 'internasional', 2026, 'Raviq', 'V', 'img_6a0065515650a1.22767658.jpg', '2026-05-10 18:00:33');

-- ----------------------------
-- Table structure for student_stats
-- ----------------------------
DROP TABLE IF EXISTS `student_stats`;
CREATE TABLE `student_stats`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `academic_year` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '2024/2025',
  `grade` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kelas I - VI',
  `gender` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(10) UNSIGNED NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_stats
-- ----------------------------
INSERT INTO `student_stats` VALUES (1, '2026/2027', 'I', 'L', 10, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (2, '2026/2027', 'I', 'P', 17, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (3, '2026/2027', 'II', 'L', 5, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (4, '2026/2027', 'II', 'P', 15, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (5, '2026/2027', 'III', 'L', 12, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (6, '2026/2027', 'III', 'P', 10, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (7, '2026/2027', 'IV', 'L', 15, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (8, '2026/2027', 'IV', 'P', 15, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (9, '2026/2027', 'V', 'L', 12, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (10, '2026/2027', 'V', 'P', 11, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (11, '2026/2027', 'VI', 'L', 6, '2026-05-14 20:25:47');
INSERT INTO `student_stats` VALUES (12, '2026/2027', 'VI', 'P', 18, '2026-05-14 20:25:47');

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `full_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `birth_date` date NULL DEFAULT NULL,
  `education` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `subject` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `position` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Jabatan struktural',
  `type` enum('guru','staff') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'guru',
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sort_order` int(11) NULL DEFAULT 0,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (4, '-', 'Nur Sangidah, S. Pd. SD', 'Bu Nur', 'P', NULL, 'S1 /  2010', '-', 'Kepala Sekolah', 'guru', 'img_6a05c1d540f0f6.20518215.png', '', 0, 1, '2026-05-14 19:36:37', '2026-05-14 19:36:37');
INSERT INTO `teachers` VALUES (5, '-', 'Nisa Amaliyah, S. Pd. SD', 'Bu Nisa', 'P', NULL, 'S1 / 2010', '-', 'Wali Kelas', 'guru', 'img_6a05c264b95470.33401800.png', '', 0, 1, '2026-05-14 19:39:00', '2026-05-14 19:39:00');
INSERT INTO `teachers` VALUES (6, '', 'Nur Laela, S. Pd. I', 'Bu Ela', 'P', NULL, 'S1 / 2009', 'PAI', 'Guru PAI', 'guru', 'img_6a05c306964828.26132758.jpeg', '', 0, 1, '2026-05-14 19:41:42', '2026-05-14 19:41:42');
INSERT INTO `teachers` VALUES (7, '', 'Tohiroh, S. Ag', 'Bu Iroh', 'P', NULL, 'S1 / 1999', '-', 'Wali Kelas', 'guru', 'img_6a05c411e7db03.76929759.png', '', 0, 1, '2026-05-14 19:46:09', '2026-05-14 19:46:09');
INSERT INTO `teachers` VALUES (8, '', 'Umi Baroroh., S.Pd', 'Bu Umi', 'L', NULL, 'S1', '-', 'Wali Kelas', 'guru', 'img_6a05cac5cd57a1.60657669.png', '', 0, 1, '2026-05-14 20:12:52', '2026-05-14 20:14:45');
INSERT INTO `teachers` VALUES (9, '', 'Achmad Dwi Antono', 'Pak Antono', 'L', NULL, 'SMA', 'PJOK', 'Guru', 'guru', 'img_6a05cb79050112.45237196.png', '', 0, 1, '2026-05-14 20:16:21', '2026-05-14 20:17:45');
INSERT INTO `teachers` VALUES (10, '', 'Suhartono', 'Pak Tono', 'L', NULL, 'S1', '-', '-', 'staff', '', '', 0, 1, '2026-05-14 20:17:25', '2026-05-14 20:17:25');
INSERT INTO `teachers` VALUES (11, '', 'Adela Laura Putri', 'Bu Adela', 'P', NULL, 'SMA / 2022', '', 'Guru', 'guru', 'img_6a05cbe94c0d99.52008076.png', '', 0, 1, '2026-05-14 20:19:37', '2026-05-14 20:19:37');
INSERT INTO `teachers` VALUES (12, '', 'Fernanda Anindya Putri, S.Pd', 'Bu Anin', 'P', NULL, 'S1 / 2024', '', 'Guru', 'guru', 'img_6a05cc8362c7d3.86377008.jpeg', '', 0, 1, '2026-05-14 20:22:11', '2026-05-14 20:22:11');
INSERT INTO `teachers` VALUES (13, '', 'Annisa Zahroh', 'Bu Zahroh', 'P', NULL, 'S1 / 2025', '', 'Guru', 'guru', 'img_6a05ccc9804550.34474991.jpeg', '', 0, 1, '2026-05-14 20:23:21', '2026-05-14 20:23:21');

SET FOREIGN_KEY_CHECKS = 1;
