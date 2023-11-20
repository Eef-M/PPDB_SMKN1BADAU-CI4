-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2023 pada 18.52
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdbsmkn1badau`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(186, '::1', 'eudora@mail.com', 3, '2023-11-02 08:37:59', 1),
(187, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-02 09:12:48', 1),
(188, '::1', 'eudora@mail.com', 3, '2023-11-02 09:18:05', 1),
(189, '::1', 'eudora@mail.com', 3, '2023-11-02 09:54:25', 1),
(190, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-02 10:18:30', 1),
(191, '::1', 'eudora@mail.com', 3, '2023-11-02 10:19:46', 1),
(192, '::1', 'eudora@mail.com', 3, '2023-11-02 15:08:47', 1),
(193, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-02 20:52:28', 1),
(194, '::1', 'eudora@mail.com', 3, '2023-11-03 12:05:50', 1),
(195, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-03 12:07:28', 1),
(196, '::1', 'eudora@mail.com', 3, '2023-11-06 08:18:38', 1),
(197, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-06 08:19:15', 1),
(198, '::1', 'eudora@mail.com', 3, '2023-11-06 11:17:02', 1),
(199, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-06 11:17:27', 1),
(200, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-06 13:29:03', 1),
(201, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-07 06:02:27', 1),
(202, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-07 10:29:54', 1),
(203, '::1', 'eudora@mail.com', 3, '2023-11-07 11:08:35', 1),
(204, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-07 11:13:45', 1),
(205, '::1', 'eudora@mail.com', 3, '2023-11-07 11:14:16', 1),
(206, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-07 11:45:49', 1),
(207, '::1', 'eudora@mail.com', 3, '2023-11-07 12:37:44', 1),
(208, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-07 12:55:58', 1),
(209, '::1', 'eudora@mail.com', 3, '2023-11-07 14:08:05', 1),
(210, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-07 14:13:05', 1),
(211, '::1', 'eudora@mail.com', 3, '2023-11-07 17:59:59', 1),
(212, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-07 18:00:45', 1),
(213, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-10 01:43:27', 1),
(214, '::1', 'eudora@mail.com', 3, '2023-11-10 01:58:50', 1),
(215, '::1', 'eudora@mail.com', 3, '2023-11-10 08:24:17', 1),
(216, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-10 08:49:00', 1),
(217, '::1', 'eudora@mail.com', 3, '2023-11-10 08:49:31', 1),
(218, '::1', 'eudora@mail.com', 3, '2023-11-10 15:49:47', 1),
(219, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-10 15:50:30', 1),
(220, '::1', 'eudora@mail.com', 3, '2023-11-10 16:03:40', 1),
(221, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-10 16:04:53', 1),
(222, '::1', 'eudora@mail.com', 3, '2023-11-10 16:14:47', 1),
(223, '::1', 'eudora@mail.com', 3, '2023-11-11 04:29:58', 1),
(224, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-11 07:01:35', 1),
(225, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-11 11:56:20', 1),
(226, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-12 12:45:24', 1),
(227, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-13 17:55:43', 1),
(228, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-14 16:02:52', 1),
(229, '::1', 'eudora@mail.com', 3, '2023-11-14 16:06:12', 1),
(230, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-14 16:06:30', 1),
(231, '::1', '1234567890', NULL, '2023-11-14 16:07:03', 0),
(232, '::1', '1234567890', NULL, '2023-11-16 12:28:47', 0),
(233, '::1', 'eudora@email.com', 5, '2023-11-16 12:29:00', 1),
(234, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-16 12:29:06', 1),
(235, '::1', 'eudora@email.com', 5, '2023-11-16 12:32:31', 1),
(236, '::1', '1234567890', NULL, '2023-11-16 14:13:59', 0),
(237, '::1', 'eudora@email.com', 5, '2023-11-16 14:14:11', 1),
(238, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-16 14:18:06', 1),
(239, '::1', 'eudora@email.com', 5, '2023-11-16 14:19:21', 1),
(240, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-16 14:28:55', 1),
(241, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-20 11:59:14', 1),
(242, '::1', 'eudora@gmail.com', 6, '2023-11-20 12:34:16', 1),
(243, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-20 12:34:59', 1),
(244, '::1', 'eudora@gmail.com', 6, '2023-11-20 12:36:15', 1),
(245, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-20 12:42:41', 1),
(246, '::1', 'eudora@gmail.com', 6, '2023-11-20 12:44:38', 1),
(247, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-20 13:00:19', 1),
(248, '::1', 'eudora@gmail.com', 6, '2023-11-20 13:01:11', 1),
(249, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-20 13:01:44', 1),
(250, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-20 13:02:38', 1),
(251, '::1', 'eudora@gmail.com', 6, '2023-11-20 13:02:57', 1),
(252, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-20 13:03:29', 1),
(253, '::1', '1234567890', NULL, '2023-11-20 13:04:00', 0),
(254, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-20 13:04:21', 1),
(255, '::1', 'ppdbsmknbadau@gmail.com', 1, '2023-11-20 13:54:06', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-profile', 'Manage user\'s profile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('islam','kristen','hindu','budha') NOT NULL,
  `status_dlm_kel` enum('suami','istri','anak','') NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(50) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `kelurahan` varchar(125) NOT NULL,
  `kecamatan` varchar(125) NOT NULL,
  `kab_kota` varchar(125) NOT NULL,
  `provinsi` varchar(125) NOT NULL,
  `nohp_siswa` varchar(50) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nik_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `nik_ibu` varchar(255) NOT NULL,
  `nohp_ortu` varchar(50) NOT NULL,
  `jalur` varchar(128) NOT NULL,
  `status` int(1) NOT NULL,
  `verif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `profile` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `ig` varchar(200) NOT NULL,
  `fb` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `footer`
--

INSERT INTO `footer` (`id`, `profile`, `phone`, `email`, `alamat`, `ig`, `fb`) VALUES
(3, 'Era globalisasi dengan segala implikasinya menjadi salah satu pemicu cepatnya perubahan yang terjadi pada berbagai aspek kehidupan masyarakat, termasuk dalam penyediaan tenaga kerja trampil pada dunia kerja. Dalam hal ini dunia pendidikan, khususnya SMK Negeri 1 Badau mempunyai tanggung jawab yang besar dalam menyiapkan sumber daya manusia yang tangguh sehingga mampu hidup selaras didalam perubahan teknologi. Dalam masa kepemimpinan Drs. Erli Pranajaya, SMK Negeri 1 Badau bertekad memberikan pelayanan pendidikan yang terbaik bagi siswa-siswanya. Semua perkembangan teknologi dicoba untuk diikuti dan diberikan kepada siswa sehingga lulusannya diharapkan mampu beradaptasi dengan dunia kerja sesuai dengan jurusannya.', '081929001122', 'admin@smkn1badau.sch.id  ', 'Jl. Badau - Simpang Renggiang', 'https://instagram.com/smkn1_badau?igshid=MzRlODBiNWFlZA==', 'https://web.facebook.com/smkn1badau/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `guru` varchar(128) NOT NULL,
  `jurusan` varchar(256) NOT NULL,
  `siswa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1683115003, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigation_menu`
--

CREATE TABLE `navigation_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(225) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_mapel`
--

CREATE TABLE `nilai_mapel` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `bindo_1` double NOT NULL,
  `bindo_2` double NOT NULL,
  `bindo_3` double NOT NULL,
  `bindo_4` double NOT NULL,
  `bindo_5` double NOT NULL,
  `bing_1` double NOT NULL,
  `bing_2` double NOT NULL,
  `bing_3` double NOT NULL,
  `bing_4` double NOT NULL,
  `bing_5` double NOT NULL,
  `mtk_1` double NOT NULL,
  `mtk_2` double NOT NULL,
  `mtk_3` double NOT NULL,
  `mtk_4` double NOT NULL,
  `mtk_5` double NOT NULL,
  `ipa_1` double NOT NULL,
  `ipa_2` double NOT NULL,
  `ipa_3` double NOT NULL,
  `ipa_4` double NOT NULL,
  `ipa_5` double NOT NULL,
  `ips_1` double NOT NULL,
  `ips_2` double NOT NULL,
  `ips_3` double NOT NULL,
  `ips_4` double NOT NULL,
  `ips_5` double NOT NULL,
  `bobot_bindo` double NOT NULL,
  `bobot_bing` double NOT NULL,
  `bobot_mtk` double NOT NULL,
  `bobot_ipa` double NOT NULL,
  `bobot_ips` double NOT NULL,
  `bobot_hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sertifikat`
--

CREATE TABLE `nilai_sertifikat` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `foto`, `judul`, `isi`, `created_at`) VALUES
(6, '1685955659_c4012bd5da9f683c7b50.jpg', 'PENGLEPASAN KELAS XII TA 2022/2023', 'Selasa, 2 Mei 2023 SMKN 1 Badau mengadakan acara perpisahan sekaligus pelepasan siswa-siswi kelas XII SMKN 1 Badau yang telah dinyatakan lulus pada tanggal 5 Mei 2023. Acara bertajuk Purna Wiyata XII atau penglepasan siswa kelas XII ini berjalan hikmat dengan dihadiri juga oleh Kepala Dinas Pendidikan Kabupaten Belitung yang diwakili oleh Kasi SMK, Ketua Komite SMKN 1 Badau, Pengawas SMK Cabdin wilayah V, dewan guru SMKN 1 Badau, Kepala dan Wakil SMKN 1 Badau.\r\n\r\nDalam kegiatan tersebut ketua OSIS SMKN 1 Badau mengucapkan selamat dan sukses kepada kakak kelas XII yang telah lulus dari SMKN 1 Badau.\r\n\r\nUntuk mengapresiasi siswa-siswi yang berprestasi diadakan penyerahan penghargaan berupa sertifikat dan pengalungan medali kepada siswa-siswi 3 besar terbaik dalam setiap jurusan yang diberikan oleh ketua kompetensi keahlian jurusan Akuntansi Keuangan dan Lembaga, Bisnis Daring dan Pemasaran dan Multimedia.\r\n\r\nAcara yang juga dihadiri oleh seluruh dewan guru dan tenaga kependidikan SMKN 1 Badau dan Orang tua siswa kelas XII berjalan khidmat, dilanjut dengan proses pelepasan bet sekolah sebagai simbolis bahwa kami telah resmi melepas siswa-siswi yang telah lulus untuk menempuh kehidupan selanjutnya diluar lingkungan sekolah.\r\n\r\nDengan dilepasnya 127 orang siswa-siswi SMKN 1 Badau pada tanggal 2 Mei kemarin diharapkan dapat menyumbangkan lulusan yang bermanfaat bagi agama, orang tua, bangsa dan negara.\r\n\r\nSerupa dengan pesan yang disampaikan oleh Bapak Kusniardi, S.Pd selaku Kepala SMKN 1 Badau “Untuk siswa-siswi yang telah dinyatakan lulus kedepannya baik untuk yang melanjutkan ke perguruan tinggi, bekerja maupun berwirausaha dapat menjadi insan yang berguna saat terjun dalam masyarakat sesuai dengan kecapakan dan kompetensi kalian masing-masing” .\r\n\r\nSelama acara perpisahan dan pelepasan siswa-siswi SMKN 1 Badau dimeriahkan juga dengan penampilan dari siswa-siswi kelas XI dan X eskul Tari SMKN 1 Badau, dan penampilan persembahan dari bapak-ibu guru.\r\n\r\nKegiatan Purna Wiyata XII atau pelepasan siswa kelas XII SMKN 1 Badau ini diharapkan bisa menjadi momen yang berarti bagi para lulusan SMKN 1 Badau yang akan melanjutkan perjalanan kehidupan selanjutnya dan seluruh ilmu yang didapatkan selama 3 tahun di SMKN 1 Badau dapat menjadi bekal bagi perjalanan para lulusan.', '2023-06-05 09:00:59'),
(7, '1685955715_3326b5e26d9b5a5e5630.jpg', 'SOSIALISASI ZAKAT PROFESI', 'Baznas Kabupaten Belitung melakukan sosialisasi Zakat Profesi di SMKN 1 Badau Kabupaten Belitung dalam rangka optimalisasi secara terukur pengumpulan zakat, infak dan sedekah. Sosialisasi Zakat profesi ini dilaksanakan di ruang mushola SMKN 1 Badau pada tanggal 6 April 2023 dihadiri oleh pimpinan Baznas Kabupaten Belitung (Bapak Drs Muhamadiyah) sebagai pemateri pada kegiatan sosialisasi.\r\n\r\nSelaku narasumber kegiatan ini menyampaikan bahwa perlunya meningkatkan kesadaran kepada masyarakat khususnya ASN dilingkungan SMK Negeri 1 Badau untuk dapat membayar zakat mal melalui pihak Baznas, karena selama ini masyarakat hanya terfokus kepada pembayaran zakat fitrah saja yang dibayarkan setiap setahun sekali pada bulan Ramadhan saja, sedangkan untuk pembayaran zakat mal masih sangat kurang.\r\n\r\nPeserta sosialisasi guru dan siswa mengikuti dengan antusias karena terhitung masih minim pengetahuan terkait zakat profesi ini. Acara diakhiri dengan diskusi dan tanya jawab seputar zakat mal.', '2023-06-05 09:01:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(225) NOT NULL,
  `lokasi` enum('ONLINE','OFFLINE') NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `persyaratan`
--

INSERT INTO `persyaratan` (`id`, `deskripsi`) VALUES
(1, '<p></p><p><ol><li style=\"text-align: justify; \">Calon peserta didik baru akses laman Situs PPDB Online.</li><li style=\"text-align: justify; \">Calon peserta didik baru melakukan Registrasi Akun secara online. Setelah Registrasi Calon Peserta\r\ndidik baru di harap Login untuk melakukan pendaftaran online.</li><li style=\"text-align: justify; \">Calon peserta didik baru memilih salah satu jalur pendaftaran. Zonasi, Afirmasi, Mutasi dan Prestasi.</li><li style=\"text-align: justify; \">Calon peserta didik baru mengisi form biodata diri.</li><li style=\"text-align: justify; \">Calon peserta didik baru mengisi form nilai dari mata pelajaran Bahasa Indonesia, Bahasa Inggris,\r\nMatematika, IPA, dan IPS. semester 1 sampai 5. </li><li style=\"text-align: justify; \">Calon peserta didik baru mengupload berkas foto, Kartu Keluarga, Scan Kartu NSIN.</li><li style=\"text-align: justify; \">Calon peserta didik baru menunggu verifikasi dan pernyataan kelulusan dari ADMIN.</li><li style=\"text-align: justify; \">Calon peserta didik bisa melihat pernyataan kelulusan pada menu pengumuman.</li></ol></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `slideshow`
--

INSERT INTO `slideshow` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(5, 'SMK Negeri 1 Badau', 'Situs Resmi PPDB Online SMK Negeri 1 Badau', '1685966633_06ed635df3d8fbf78fe3.jpeg'),
(6, 'SMK Negeri 1 Badau', 'Situs Resmi PPDB Online SMK Negeri 1 Badau', '1685966906_fcfa901ce819c5d9db67.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(128) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tata_cara`
--

CREATE TABLE `tata_cara` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tata_cara`
--

INSERT INTO `tata_cara` (`id`, `deskripsi`) VALUES
(1, '<p></p><ol><li>Calon&nbsp;siswa mendaftar melalui laman PPDB http://ppdbsmkn1badau.unaux.com/ jika calon pendaftar tidak memiliki smarthphone atau jaringan internet, pendaftaran dapat di lakukan dengan cara langsung datang ke SMK Negeri 1 Badau.</li><li>Setelah mendaftar calon siswa mengupload berkas lalu mencetak bukti pendaftaran, pernyataan lalu diserahkan bersama berkas lainnya saat daftar ulang. Untuk jalur zonasi, penentuan lokasi tempat tinggal berdasarkan zona yang telah ditetapkan.</li><li>Panitia SMK Negeri 1 Badau bertugas:<ul><li>Membuat data rekapitulasi pendaftar dari aplikasi web PPDB.</li><li>Mendowload berkas (KK, Kartu NISN, dan Surat Keterangan Prestasi, Piagam).</li><li>Melakukan verifikasi dan validasi.</li><li>Melakukan proses seleksi (perangkingan) sesuai jalur penerimaan.</li><li>Mengumumkan&nbsp;nominasi sementara calon peserta didik baru yang telah dilakukan verifikasi pada setiap hari kerja melalui Papan Pengumuman Sekolah atau melalui laman pengumuman PPDB Online SMK Negeri 1 Badau.</li></ul></li><li>Seleksi&nbsp;calon peserta didik baru melalui jalur Zonasi, Mutasi dan Prestasi dengan melampirkan Rata-rata Nilai Raport semester 1-5 pada mata pelajaran Bahasa Indonesia, Bahasa Inggris, Matematika, IPA dan IPS serta Sertifikat/Piagam Kejuaraan Akademik maupun prestasi Non-Akademik (jika ada) yang di akumulasikan dengan ketentuan lain.</li><li>Seleksi&nbsp;calon peserta didik baru melalui jalur Mutasi Orang Tua/Wali dengan memenuhi ketentuan sebagai berikut:<ul><li>Mutasi domisili orang tua/wali peserta didik.</li><li>Dibuktikan dengan surat pindah tugas orang tua/wali calon peserta didik.</li></ul></li></ol><p></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload_berkas`
--

CREATE TABLE `upload_berkas` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kartu_keluarga` varchar(255) NOT NULL,
  `scan_nisn` varchar(255) NOT NULL,
  `rpt_smstr_1sd5` varchar(255) NOT NULL,
  `kel_kur_mampu` varchar(255) NOT NULL,
  `st_ortu` varchar(225) NOT NULL,
  `sertif_prestasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nisn`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ppdbsmknbadau@gmail.com', 'ppdb_admin', '12345', 'default.jpg', '$2y$10$oGdRX21OACjjopc20LEhIOPRqSu.GY1mF3QYtP579XWycZrzZ/Ynu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-09-11 12:06:29', '2023-09-11 12:06:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `navigation_menu`
--
ALTER TABLE `navigation_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `nilai_sertifikat`
--
ALTER TABLE `nilai_sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tata_cara`
--
ALTER TABLE `tata_cara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `upload_berkas`
--
ALTER TABLE `upload_berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `navigation_menu`
--
ALTER TABLE `navigation_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `nilai_sertifikat`
--
ALTER TABLE `nilai_sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tata_cara`
--
ALTER TABLE `tata_cara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `upload_berkas`
--
ALTER TABLE `upload_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `navigation_menu` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  ADD CONSTRAINT `nilai_mapel_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_sertifikat`
--
ALTER TABLE `nilai_sertifikat`
  ADD CONSTRAINT `nilai_sertifikat_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `upload_berkas`
--
ALTER TABLE `upload_berkas`
  ADD CONSTRAINT `upload_berkas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
