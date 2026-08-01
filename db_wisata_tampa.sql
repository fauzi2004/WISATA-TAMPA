-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2026 at 04:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wisata_tampa`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_wisata` int(11) UNSIGNED NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `ikon` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `id_wisata`, `nama_fasilitas`, `deskripsi`, `ikon`, `foto`, `created_at`, `updated_at`) VALUES
(1, 3, 'Gazebo', 'Gazebo di Permandian Rumah Kebun merupakan fasilitas yang disediakan untuk memberikan kenyamanan bagi para pengunjung. Berlokasi di tengah suasana alam yang asri dan rindang, gazebo menjadi tempat yang ideal untuk beristirahat, bersantai, menikmati hidangan bersama keluarga, maupun menikmati pemandangan alam sekitar.', 'fas fa-check', '1783914327_94340c49e00359905f60.jpeg', NULL, NULL),
(3, 3, 'Rumah Singgah Wisata', 'Rumah Singgah Wisata merupakan fasilitas pendukung di kawasan Permandian Rumah Kebun, Desa Tampa, yang disediakan sebagai tempat beristirahat bagi pengunjung. Dengan suasana yang nyaman, bersih, dan dikelilingi lingkungan yang asri, rumah singgah ini menjadi tempat yang ideal untuk melepas lelah setelah menikmati berbagai aktivitas wisata alam.', 'fas fa-check', '1783914599_09e7c763f88e37b9c7af.jpeg', NULL, NULL),
(4, 3, 'Warung ', 'Warung Wisata merupakan fasilitas pendukung di kawasan Permandian Rumah Kebun, Desa Tampa, yang menyediakan berbagai kebutuhan pengunjung selama berwisata. Warung ini menawarkan aneka makanan ringan, minuman, serta kebutuhan dasar lainnya, sehingga pengunjung dapat menikmati waktu rekreasi dengan lebih nyaman tanpa harus keluar dari kawasan wisata.', 'fas fa-check', '1783914761_6cee892a791f9870f5e2.jpeg', NULL, NULL),
(5, 3, 'Wahana Ban Air', 'Lengkapi liburan Anda dengan fasilitas wahana ban air. Aman, seru, dan menjadi pilihan favorit pengunjung untuk bersantai mengikuti arus sungai atau sekadar mengapung di area pemandian alam.', 'fas fa-check', '1783914924_4520ca3a5114dabc8c00.jpeg', NULL, NULL),
(6, 3, 'Kamar Ganti / Toilet Bersih', ' Jangan khawatir jika Anda basah kuyup setelah seru-seruan bermain air! Kami telah menyiapkan fasilitas toilet dan kamar ganti yang bersih dan terawat. Anda bisa membilas diri dan berganti pakaian kering dengan tenang di sini sebelum melanjutkan perjalanan pulang.', 'fas fa-check', '1783917650_7af1b9e121ea97e4115a.jpeg', NULL, NULL),
(7, 1, 'Warung Jajanan', 'Tersedia warung yang menjual aneka camilan, mi seduh, dan minuman segar dengan harga bersahabat untuk menemani waktu bersantai Anda di area wisata.', 'fas fa-check', '1783919202_42d5603561f014d93fd4.jpeg', NULL, NULL),
(9, 1, 'Ruang Bilas & Toilet', ' Tersedia fasilitas toilet dan ruang bilas yang bersih dengan air mengalir yang memadai. Anda dapat membersihkan diri dan berganti pakaian dengan nyaman setelah puas bermain air.', 'fas fa-check', '1783919292_06abc90a67cf2998049e.jpeg', NULL, NULL),
(10, 1, 'Tempat Ibadah', 'Kami menyediakan fasilitas Tempat Ibadah yang bersih dan nyaman, lengkap dengan perlengkapan salat (sajadah dan mukena) agar Anda tetap dapat menunaikan ibadah dengan tenang selama berwisata.', 'fas fa-check', '1783919343_eaf3faf5e58886aabbbd.jpeg', NULL, NULL),
(11, 1, 'Rumah Singgah / Tempat Istirahat', 'Fasilitas rumah kayu tradisional yang difungsikan sebagai area istirahat. Memiliki teras berkeramik yang sejuk dan nyaman, sangat cocok untuk duduk bersantai menikmati pemandangan alam dan aliran sungai bersama rombongan.', 'fas fa-check', '1783919442_0cb6b3fee5da10202a0d.jpeg', NULL, NULL),
(12, 1, 'Area Parkir Luas', 'Area parkir yang teduh dan sangat memadai untuk menampung kendaraan pengunjung, baik mobil maupun sepeda motor. Aksesnya mudah dan letaknya berdekatan dengan area utama wisata.', 'fas fa-check', '1783919478_b21682b5212593d1db8a.jpeg', NULL, NULL),
(13, 2, 'Area Parkir', ' Area parkir yang teduh dan luas, dikelilingi pepohonan hijau dengan latar belakang pemandangan perbukitan. ', 'fas fa-check', '1783920719_29957819366382b4209e.jpeg', NULL, NULL),
(14, 2, 'Toilet', 'Kami menyediakan fasilitas toilet umum yang memadai dan mudah diakses di sekitar area wisata, untuk menunjang kenyamanan aktivitas pengunjung.', 'fas fa-check', '1783920853_bbbfde638a29aae87ef0.jpeg', NULL, NULL),
(15, 2, 'Gazebo', 'Tersedia fasilitas gazebo atau saung yang teduh di pinggir perairan. Sangat cocok digunakan sebagai tempat istirahat dan berkumpul bersama rombongan sambil menikmati pemandangan alam sekitar.', 'fas fa-check', '1783920925_92625d1b2d4cbf1e2ad9.jpeg', NULL, NULL),
(16, 2, 'Pondok ', 'Fasilitas pondok kayu asri yang disediakan khusus sebagai Mushola. Pengunjung dapat menunaikan ibadah salat dengan tenang dan nyaman di sela-sela waktu liburan.', 'fas fa-check', '1783921041_cf03c380d8cdb4b0294c.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeri_wisata`
--

CREATE TABLE `galeri_wisata` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_wisata` int(11) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_wisata`
--

CREATE TABLE `kategori_wisata` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_wisata`
--

INSERT INTO `kategori_wisata` (`id`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Wisata Desa Tampa', 'Semua pesona dan aktivitas wisata di Desa Tampa', '2026-07-12 23:05:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kontak_pengelola`
--

CREATE TABLE `kontak_pengelola` (
  `id` int(11) UNSIGNED NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `maps_url` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `judul` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `judul`, `pesan`, `tipe`, `link`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 2, 'Pesanan Baru Masuk', 'Pesanan baru (TB036F24) telah dibuat dan menunggu pembayaran.', 'info', 'admin/pemesanan/detail/2', 0, '2026-07-13 09:47:28', '2026-07-13 09:47:28'),
(2, 2, 'Pesanan Baru Masuk', 'Pesanan baru (TB40FDE7) telah dibuat dan menunggu pembayaran.', 'info', 'admin/pemesanan/detail/3', 0, '2026-07-13 09:50:44', '2026-07-13 09:50:44'),
(3, 2, 'Pesanan Baru Masuk', 'Pesanan baru (TB91FC5A) telah dibuat dan menunggu pembayaran.', 'info', 'admin/pemesanan/detail/4', 0, '2026-07-13 09:54:49', '2026-07-13 09:54:49'),
(4, 2, 'Pesanan Baru Masuk', 'Pesanan baru (TBE415FB) telah dibuat dan menunggu pembayaran.', 'info', 'admin/pemesanan/detail/5', 0, '2026-07-13 09:58:54', '2026-07-13 09:58:54'),
(5, 2, 'Pesanan Baru Masuk', 'Pesanan baru (TB0A1FA7) telah dibuat dan menunggu pembayaran.', 'info', 'admin/pemesanan/detail/6', 0, '2026-07-13 10:02:40', '2026-07-13 10:02:40'),
(6, 2, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TB0A1FA7) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/6', 0, '2026-07-13 10:04:13', '2026-07-13 10:04:13'),
(7, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Gazebo 99 telah dikonfirmasi.', 'success', 'pesanan/detail/6', 0, '2026-07-13 10:05:06', '2026-07-13 10:05:06'),
(8, 2, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Gazebo 99 telah lunas.', 'success', 'admin/pemesanan/detail/6', 0, '2026-07-13 10:05:06', '2026-07-13 10:05:06'),
(9, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Gazebo 99 telah dikonfirmasi.', 'success', 'pesanan/detail/5', 0, '2026-07-13 10:21:53', '2026-07-13 10:21:53'),
(10, 2, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Gazebo 99 telah lunas.', 'success', 'admin/pemesanan/detail/5', 0, '2026-07-13 10:21:53', '2026-07-13 10:21:53'),
(11, 2, 'Pesanan Baru Masuk', 'Pesanan baru (TBE4120D) telah dibuat dan menunggu pembayaran.', 'info', 'admin/pemesanan/detail/7', 0, '2026-07-13 10:49:50', '2026-07-13 10:49:50'),
(12, 2, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TBE4120D) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/7', 0, '2026-07-13 10:53:48', '2026-07-13 10:53:48'),
(13, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Gazebo 99 telah dikonfirmasi.', 'success', 'pesanan/detail/7', 0, '2026-07-13 10:54:19', '2026-07-13 10:54:19'),
(14, 2, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Gazebo 99 telah lunas.', 'success', 'admin/pemesanan/detail/7', 0, '2026-07-13 10:54:19', '2026-07-13 10:54:19'),
(15, 5, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TB7AF244) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/9', 0, '2026-07-13 11:40:30', '2026-07-13 11:40:30'),
(16, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Permandian Rumah Kebunn telah dikonfirmasi.', 'success', 'pesanan/detail/9', 0, '2026-07-13 11:40:49', '2026-07-13 11:40:49'),
(17, 5, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Permandian Rumah Kebunn telah lunas.', 'success', 'admin/pemesanan/detail/9', 0, '2026-07-13 11:40:49', '2026-07-13 11:40:49'),
(18, 4, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TB030B45) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/10', 0, '2026-07-13 13:25:33', '2026-07-13 13:25:33'),
(19, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Pesona Batu Papan telah dikonfirmasi.', 'success', 'pesanan/detail/10', 0, '2026-07-13 13:25:53', '2026-07-13 13:25:53'),
(20, 4, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Pesona Batu Papan telah lunas.', 'success', 'admin/pemesanan/detail/10', 0, '2026-07-13 13:25:53', '2026-07-13 13:25:53'),
(21, 2, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TB4AF950) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/12', 0, '2026-07-21 15:47:21', '2026-07-21 15:47:21'),
(22, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Gazebo 99 telah dikonfirmasi.', 'success', 'pesanan/detail/12', 0, '2026-07-21 15:50:07', '2026-07-21 15:50:07'),
(23, 2, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Gazebo 99 telah lunas.', 'success', 'admin/pemesanan/detail/12', 0, '2026-07-21 15:50:07', '2026-07-21 15:50:07'),
(24, 5, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TBB53A0D) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/16', 0, '2026-07-22 21:46:11', '2026-07-22 21:46:11'),
(25, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Permandian Rumah Kebun telah dikonfirmasi.', 'success', 'pesanan/detail/16', 0, '2026-07-22 21:50:53', '2026-07-22 21:50:53'),
(26, 5, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Permandian Rumah Kebun telah lunas.', 'success', 'admin/pemesanan/detail/16', 0, '2026-07-22 21:50:53', '2026-07-22 21:50:53'),
(27, 5, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TB1220C7) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/18', 0, '2026-07-23 02:36:01', '2026-07-23 02:36:01'),
(28, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Permandian Rumah Kebun telah dikonfirmasi.', 'success', 'pesanan/detail/18', 0, '2026-07-23 02:36:59', '2026-07-23 02:36:59'),
(29, 5, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Permandian Rumah Kebun telah lunas.', 'success', 'admin/pemesanan/detail/18', 0, '2026-07-23 02:36:59', '2026-07-23 02:36:59'),
(30, 5, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TBF3A077) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/19', 0, '2026-07-24 23:56:27', '2026-07-24 23:56:27'),
(31, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Permandian Rumah Kebun telah dikonfirmasi.', 'success', 'pesanan/detail/19', 0, '2026-07-24 23:56:58', '2026-07-24 23:56:58'),
(32, 5, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Permandian Rumah Kebun telah lunas.', 'success', 'admin/pemesanan/detail/19', 0, '2026-07-24 23:56:58', '2026-07-24 23:56:58'),
(33, 5, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TB9D217D) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/20', 0, '2026-08-01 21:54:28', '2026-08-01 21:54:28'),
(34, 3, 'Pembayaran Dikonfirmasi', 'Hore! Pembayaran tiket Anda untuk wisata Permandian Rumah Kebun telah dikonfirmasi.', 'success', 'pesanan/detail/20', 0, '2026-08-01 21:54:58', '2026-08-01 21:54:58'),
(35, 5, 'Transaksi Selesai', 'Transaksi baru! Pembayaran tiket untuk Permandian Rumah Kebun telah lunas.', 'success', 'admin/pemesanan/detail/20', 0, '2026-08-01 21:54:58', '2026-08-01 21:54:58'),
(36, 2, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TB999273) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/21', 0, '2026-08-01 22:12:02', '2026-08-01 22:12:02'),
(37, 4, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TBA53826) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/22', 0, '2026-08-01 22:12:37', '2026-08-01 22:12:37'),
(38, 5, 'Pesanan Menunggu Konfirmasi', 'Pesanan baru (TBC2CBD4) menunggu konfirmasi pembayaran.', 'info', 'admin/pemesanan/detail/23', 0, '2026-08-01 22:13:08', '2026-08-01 22:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `objek_wisata`
--

CREATE TABLE `objek_wisata` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `id_pengelola` int(11) UNSIGNED NOT NULL,
  `nama_wisata` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kontak_wa` varchar(20) DEFAULT NULL,
  `kontak_email` varchar(100) DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `harga_tiket` int(11) DEFAULT 0,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `bank_nama` varchar(50) DEFAULT NULL,
  `bank_rekening` varchar(50) DEFAULT NULL,
  `bank_atas_nama` varchar(100) DEFAULT NULL,
  `ewallet_nama` varchar(50) DEFAULT NULL,
  `ewallet_nomor` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `objek_wisata`
--

INSERT INTO `objek_wisata` (`id`, `id_kategori`, `id_pengelola`, `nama_wisata`, `deskripsi`, `kontak_wa`, `kontak_email`, `lokasi`, `harga_tiket`, `jam_buka`, `jam_tutup`, `gambar`, `status`, `bank_nama`, `bank_rekening`, `bank_atas_nama`, `ewallet_nama`, `ewallet_nomor`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Gazebo 99', 'Gazebo99 merupakan pemandian alam yang berada di Desa Tampa. Dengan suasana yang asri, air yang jernih, dan lingkungan yang sejuk, tempat ini menjadi destinasi yang cocok untuk bersantai dan menikmati keindahan alam bersama keluarga maupun teman.', '082192905751', 'Gazebo99@gmail.com', 'Desa Tampa, Kecamatan Ponrang,Kabupaten Luwu, Provinsi Sulawesi Selatan', 10000, '07:00:00', '16:30:00', '1783906501_a8047f4ae78b39ef494a.jpeg', 'aktif', 'BRI', '783901014145572', 'Rina', 'DANA', '082192905751', NULL, NULL),
(2, 1, 4, 'Pesona Batu Papan', 'Pesona Batu Papan merupakan pemandian alam di Desa Tampa yang menawarkan air yang jernih, suasana sejuk, dan pemandangan alam yang asri. Dikelilingi batuan alami yang unik, tempat ini menjadi destinasi yang cocok untuk berenang, bersantai, dan menikmati keindahan alam bersama keluarga maupun teman.', '081343540289', 'BatuPapan@gmail.com', 'Desa Tampa, Kecamatan Ponrang, Kabupaten Luwu, Provinsi Sulawesi Selatan', 10000, '08:00:00', '16:30:00', '1783921078_fcafb98596ace9f0480a.jpeg', 'aktif', 'BRI', '783901014145289', 'bambang', 'DANA', '081343540289', NULL, NULL),
(3, 1, 5, 'Permandian Rumah Kebun', 'Permandian Rumah Kebun merupakan wisata permandian alam yang berada di Desa Tampa. Dengan air yang jernih, suasana yang sejuk, dan lingkungan yang asri, tempat ini menjadi destinasi yang cocok untuk rekreasi bersama keluarga maupun teman. Keindahan alam dan ketenangan yang ditawarkan menjadikan Permandian Rumah Kebun sebagai salah satu daya tarik wisata desa yang patut dikunjungi.', '08282827271', 'RumahKebun@gmail.com', 'Desa Tampa, Kecamatan Ponrang, Kabupaten Luwu, Provinsi Sulawesi Selatan', 10000, '07:00:00', '17:00:00', '1783913821_1b35da618ab4230e38e8.jpeg', 'aktif', 'BRI', '783901014145789', 'Andrie', 'DANA', '02828821717', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pemesanan` int(11) UNSIGNED NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `metode_bayar` varchar(50) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `status` enum('pending','verified','dikonfirmasi','rejected') DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pemesanan`, `jumlah_bayar`, `metode_bayar`, `bukti_bayar`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 80000, 'tunai', NULL, 'dikonfirmasi', NULL, NULL),
(2, 7, 5000000, 'transfer', '1783911228_419753ae52a4a894efdb.png', 'dikonfirmasi', NULL, NULL),
(3, 9, 10000000, 'transfer', '1783914030_30ba5f032a5768725010.png', 'dikonfirmasi', NULL, NULL),
(4, 10, 1500000, 'transfer', '1783920333_2eab83959632e11a091a.png', 'dikonfirmasi', NULL, NULL),
(5, 12, 180000, 'tunai', NULL, 'dikonfirmasi', NULL, NULL),
(6, 16, 1000000, 'tunai', NULL, 'dikonfirmasi', NULL, NULL),
(7, 18, 50000, 'tunai', NULL, 'dikonfirmasi', NULL, NULL),
(8, 19, 2147483647, 'transfer', '1784908587_9ca35aa2ab364ef6338e.jpeg', 'dikonfirmasi', NULL, NULL),
(9, 20, 100000, 'transfer', '1785592468_ba57e15f96c385adc2a4.jpeg', 'dikonfirmasi', NULL, NULL),
(10, 21, 150000, 'tunai', NULL, 'pending', NULL, NULL),
(11, 22, 190000, 'tunai', NULL, 'pending', NULL, NULL),
(12, 23, 40000, 'tunai', NULL, 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_booking` varchar(50) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_wisata` int(11) UNSIGNED NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_pembayaran` enum('belum_bayar','pending','menunggu_konfirmasi','lunas','batal') DEFAULT 'belum_bayar',
  `status_tiket` enum('aktif','dikonfirmasi','digunakan','batal') DEFAULT 'aktif',
  `catatan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `kode_booking`, `id_user`, `id_wisata`, `tanggal_kunjungan`, `jumlah_tiket`, `total_harga`, `status_pembayaran`, `status_tiket`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 'TBA0ACC4', 3, 1, '2026-07-22', 100, 1000000, 'belum_bayar', 'aktif', NULL, '2026-07-13 10:20:41', NULL),
(2, 'TB036F24', 3, 1, '2026-07-23', 1, 10000, 'belum_bayar', 'aktif', NULL, '2026-07-13 10:20:41', NULL),
(3, 'TB40FDE7', 3, 1, '2026-07-22', 1, 10000, 'belum_bayar', 'aktif', NULL, '2026-07-13 10:20:41', NULL),
(4, 'TB91FC5A', 3, 1, '2026-07-22', 1, 10000, 'belum_bayar', 'aktif', NULL, '2026-07-13 10:20:41', NULL),
(5, 'TBE415FB', 3, 1, '2026-07-15', 1, 10000, 'lunas', 'dikonfirmasi', NULL, '2026-07-13 10:20:41', NULL),
(6, 'TB0A1FA7', 3, 1, '2026-07-22', 8, 80000, 'lunas', 'dikonfirmasi', NULL, '2026-07-13 10:20:41', NULL),
(7, 'TBE4120D', 3, 1, '2026-07-28', 500, 5000000, 'lunas', 'dikonfirmasi', NULL, '2026-07-13 10:49:50', '2026-07-13 10:53:48'),
(8, 'TB1DE92C', 3, 1, '2026-07-22', 1, 10000, 'belum_bayar', 'aktif', NULL, '2026-07-13 10:55:13', '2026-07-13 10:55:13'),
(10, 'TB030B45', 3, 2, '2026-07-15', 150, 1500000, 'lunas', 'dikonfirmasi', NULL, '2026-07-13 13:25:20', '2026-07-13 13:25:33'),
(11, 'TB82E522', 3, 1, '2026-07-22', 7, 70000, 'belum_bayar', 'aktif', NULL, '2026-07-20 20:22:16', '2026-07-20 20:22:16'),
(12, 'TB4AF950', 3, 1, '2026-07-22', 18, 180000, 'lunas', 'dikonfirmasi', NULL, '2026-07-21 15:47:00', '2026-07-21 15:47:21'),
(13, 'TBB7AEF4', 3, 2, '2026-07-23', 4, 40000, 'belum_bayar', 'aktif', NULL, '2026-07-22 18:47:39', '2026-07-22 18:47:39'),
(14, 'TB802806', 3, 2, '2026-07-23', 1, 10000, 'belum_bayar', 'aktif', NULL, '2026-07-22 18:59:52', '2026-07-22 18:59:52'),
(15, 'TBB3255E', 3, 2, '2026-07-24', 1, 10000, 'belum_bayar', 'aktif', NULL, '2026-07-22 19:20:11', '2026-07-22 19:20:11'),
(16, 'TBB53A0D', 3, 3, '2026-07-31', 100, 1000000, 'lunas', 'dikonfirmasi', NULL, '2026-07-22 21:46:03', '2026-07-22 21:46:11'),
(17, 'TBE0D22D', 3, 1, '2026-07-23', 100, 1000000, 'belum_bayar', 'aktif', NULL, '2026-07-22 21:49:02', '2026-07-22 21:49:02'),
(18, 'TB1220C7', 3, 3, '2026-07-24', 5, 50000, 'lunas', 'dikonfirmasi', NULL, '2026-07-23 02:35:45', '2026-07-23 02:36:01'),
(20, 'TB9D217D', 3, 3, '2026-08-10', 10, 100000, 'lunas', 'dikonfirmasi', NULL, '2026-08-01 21:54:01', '2026-08-01 21:54:28'),
(21, 'TB999273', 6, 1, '2026-08-12', 15, 150000, 'menunggu_konfirmasi', 'aktif', NULL, '2026-08-01 22:11:53', '2026-08-01 22:12:02'),
(22, 'TBA53826', 6, 2, '2026-08-20', 19, 190000, 'menunggu_konfirmasi', 'aktif', NULL, '2026-08-01 22:12:26', '2026-08-01 22:12:37'),
(23, 'TBC2CBD4', 6, 3, '2026-08-27', 4, 40000, 'menunggu_konfirmasi', 'aktif', NULL, '2026-08-01 22:13:00', '2026-08-01 22:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `profile_desa`
--

CREATE TABLE `profile_desa` (
  `id` int(11) UNSIGNED NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `konten` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_desa`
--

INSERT INTO `profile_desa` (`id`, `tipe`, `judul`, `konten`, `created_at`, `updated_at`) VALUES
(1, 'tentang', 'Pesona Alam Desa Tampa', 'Desa Tampa adalah permata tersembunyi yang menawarkan keindahan alam yang masih asri dan belum tersentuh. Dikelilingi oleh perbukitan hijau, sungai jernih, dan udara yang segar, Desa Tampa menjadi destinasi wisata yang sempurna untuk melepas penat dari hiruk-pikuk perkotaan. Kami bangga melestarikan alam dan budaya lokal.', NULL, NULL),
(2, 'visi', 'Visi Desa Tampa', 'Menjadi desa ekowisata terkemuka yang berkelanjutan, mandiri, dan mampu memberikan kesejahteraan bagi masyarakat lokal tanpa merusak kelestarian alam dan nilai-nilai budaya luhur warisan leluhur.', NULL, NULL),
(3, 'misi', 'Misi Desa Tampa', '<ol><li>Menjaga kelestarian lingkungan dan ekosistem desa.</li><li>Memberdayakan ekonomi masyarakat sekitar melalui pariwisata.</li><li>Menyediakan fasilitas wisata alam yang aman, nyaman, dan edukatif bagi semua pengunjung.</li></ol>', NULL, NULL),
(4, 'sejarah', 'Sejarah Desa Tampa', 'Desa Tampa memiliki sejarah panjang sejak masa lampau. Seiring berjalannya waktu, potensi alamnya yang menakjubkan mulai disadari dan dikembangkan secara swadaya oleh masyarakat menjadi area wisata edukasi dan rekreasi keluarga yang damai.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_wisata` int(11) UNSIGNED NOT NULL,
  `rating` int(1) DEFAULT 5,
  `komentar` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `id_user`, `id_wisata`, `rating`, `komentar`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 5, 'Wisata Yg Indah', 'approved', NULL, NULL),
(2, 3, 2, 5, 'Mantapp', 'approved', NULL, NULL),
(3, 3, 3, 4, 'mantap', 'approved', NULL, NULL),
(4, 3, 3, 5, 'Wisata yg Indah', 'approved', NULL, NULL),
(5, 3, 1, 4, 'Mantapppppppppppp', 'pending', NULL, NULL),
(6, 6, 1, 5, 'Mantap', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `role` enum('admin','pengelola','wisatawan') DEFAULT 'wisatawan',
  `id_wisata` int(11) UNSIGNED DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `bank_nama` varchar(50) DEFAULT NULL,
  `bank_rekening` varchar(50) DEFAULT NULL,
  `bank_atas_nama` varchar(100) DEFAULT NULL,
  `ewallet_nama` varchar(50) DEFAULT NULL,
  `ewallet_nomor` varchar(50) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `no_telp`, `alamat`, `role`, `id_wisata`, `foto`, `bank_nama`, `bank_rekening`, `bank_atas_nama`, `ewallet_nama`, `ewallet_nomor`, `reset_token`, `reset_expires_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin Utama', 'AhmadFauzi@gmail.com', '$2y$10$Pt24BwLOUWMmsg8tEKixauWmQDDoKBwDa904Xz1WEalSx3fVP2usi', NULL, NULL, 'admin', NULL, '1784723810_0a7444283f661a9e0cad.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-07-12 16:51:22', NULL),
(2, 'Rina', 'Gazebo99@gmail.com', '$2y$10$6tyNKEkUPjTfPo62JrQupezCVXKrTAdnJ20yjDe2h2dSy/oT4qJGe', NULL, NULL, 'pengelola', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'WISATAWAN', 'Wisatawan@gmail.com', '$2y$10$kb/yz7t4Nl7VBC1JrYpY8.5jdcXlIvBqD9MPhnxFzknF2EMfPWCxe', '08299292921', 'Desa Mario', '', NULL, '1783910913_c6565830b3d7af37b0f1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Bambang', 'BatuPapan@gmail.com', '$2y$10$JcAfLoQyRKjNR4bYETYYp.Vof/Ynj9B38NQJHIv9H0Z1bzNllWyOy', NULL, NULL, 'pengelola', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Andrie ', 'RumahKebun@gmail.com', '$2y$10$2NgV7Ta01lIHYqyYk4Obye6DqO8BJ9Eeb0bllED6E6GGvl3q4CSHK', NULL, NULL, 'pengelola', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'OJI', 'Oji@gmail.com', '$2y$10$d.t50lDn6ZzkdnEglyT2YOw02OacrY9K3U17ftFm/hHwX4zgRYB/i', '087717665422', 'PALOPO', '', NULL, '1785593489_28ddc279e583e74ceb0a.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_wisata`
--
ALTER TABLE `galeri_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak_pengelola`
--
ALTER TABLE `kontak_pengelola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objek_wisata`
--
ALTER TABLE `objek_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_desa`
--
ALTER TABLE `profile_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `galeri_wisata`
--
ALTER TABLE `galeri_wisata`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak_pengelola`
--
ALTER TABLE `kontak_pengelola`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `objek_wisata`
--
ALTER TABLE `objek_wisata`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profile_desa`
--
ALTER TABLE `profile_desa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
