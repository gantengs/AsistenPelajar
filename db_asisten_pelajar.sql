-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 03:49 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_asisten_pelajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `even`
--

CREATE TABLE IF NOT EXISTS `even` (
`id_ev` int(11) NOT NULL,
  `nama_ev` text,
  `tgl_ev` date DEFAULT NULL,
  `des_ev` text,
  `selesai_ev` text,
  `id_sub` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `even`
--

INSERT INTO `even` (`id_ev`, `nama_ev`, `tgl_ev`, `des_ev`, `selesai_ev`, `id_sub`) VALUES
(1, 'Ulangan', '2016-11-15', 'halaman 26-23', 'Belum Selesai', 1),
(4, 'Buat Project', '2016-11-03', 'mboh', 'Belum Selesai', 2),
(6, 'even2222', '2016-11-10', 'eerrmskbx dckbdjbckdn kecdnjnc encjklecn elknc', 'Sudah Selesai', 7),
(9, 'akukekahhhh', '2016-01-14', '', 'Belum Selesai', 8),
(10, 'rrrrrrrrr', '2016-11-18', 'gggwwwwwwwwwwwwwwwwww', 'Sudah Selesai', 2),
(12, 'egeg', '2016-02-04', 'egeg', 'Belum Selesai', 7),
(21, 'asd', '2016-11-10', 'kjkjn', 'Belum Selesai', 2),
(22, 'gggg4', '2016-11-10', 'gggfgf', 'Belum Selesai', 7),
(23, '1sv', '2016-11-22', '', 'Belum Selesai', 13),
(24, 'mhj', '2016-11-22', '', 'Belum Selesai', 13),
(25, 'nnn', '2016-11-22', '', 'Belum Selesai', 1),
(26, 'even1coba', '2016-11-17', '', 'Belum Selesai', 17),
(27, 'asdfghhjjkklll', '2013-06-01', 'jkwnkjne eknrvjenrkvje vkvkjenvkj ej vkje k\r\nekvmkevm ekjnvjkenjnvjkenv vernvjevnrjnenjveknvjneknvkenkvnevnekj', 'Sudah Selesai', 16),
(28, 'bnnn', '2013-05-28', 'ggggggggggggggg', 'Belum Selesai', 17),
(29, 'wweeeeeeeeeee', '2013-05-30', '', 'Sudah Selesai', 16),
(31, 'bbgtbtbt', '2013-05-30', 'rtbtgsebgtew', 'Belum Selesai', 16),
(32, 'UAS', '2016-11-23', '', 'Belum Selesai', 19),
(33, 'UTS', '2016-11-23', 'buka halaman 23-26', 'Sudah Selesai', 19),
(34, 'Quis', '2016-11-23', '', 'Sudah Selesai', 20),
(35, 'Tugas 5', '2016-11-10', 'buat makalah kelompok mak 5 org', 'Sudah Selesai', 19),
(36, 'evene neenbenenebnbenbnen nec me c emcm', '2016-11-10', 'nsbchsbhj csjhbjhsdcb cjsbhdcbsjc s dcjbsjhc sdcdcs cksbdc ', 'Belum Selesai', 7),
(38, 'ggggggggg', '2016-12-10', '', 'Sudah Selesai', 21);

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
`id_ins` int(11) NOT NULL,
  `nama_ins` text,
  `id_user` int(11) NOT NULL,
  `id_jnjg` int(11) NOT NULL,
  `hps_ins` text
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_ins`, `nama_ins`, `id_user`, `id_jnjg`, `hps_ins`) VALUES
(1, 'Karaban 02 N', 1, 5, 'yes'),
(2, 'Abadiyah', 1, 8, 'yes'),
(3, 'Abadiyah 2', 1, 13, 'yes'),
(4, 'Muria Kudus', 1, 15, 'no'),
(5, 'Al-asahr', 1, 1, 'yes'),
(6, 'coba coba', 1, 7, 'yes'),
(7, 'ASDF', 1, 3, 'yes'),
(8, 'Wahid Hasyim', 2, 19, 'no'),
(9, 'Perang', 1, 15, 'yes'),
(10, 'hhhhhhh', 1, 10, 'yes'),
(11, 'Gabus 01', 3, 4, 'no'),
(12, 'Tuan Sokolangu v', 4, 13, 'no'),
(13, 'Agama Islam Kudus', 4, 18, 'yes'),
(14, 'AAAA', 5, 13, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE IF NOT EXISTS `jenjang` (
  `id_jnjg` int(11) NOT NULL DEFAULT '0',
  `singkat_jnjg` text,
  `nama_jnjg` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jnjg`, `singkat_jnjg`, `nama_jnjg`) VALUES
(1, 'TK', 'Taman Kanak-kanak'),
(2, 'RA', 'Raudlatul Athfal'),
(3, 'KB', 'Kelompok Bermain'),
(4, 'SD', 'Sekolah Dasar'),
(5, 'MI', 'Madrasah Ibtidaiyah'),
(6, 'PA', 'Kelompok Belajar Paket A'),
(7, 'SMP', 'Sekolah Menengah Pertama'),
(8, 'MTs', 'Madrasah Tsanawiyah'),
(9, 'PB', 'Kelompok Belajar Paket B'),
(10, 'SMA', 'Sekolah Menengah Atas'),
(11, 'SMK', 'Sekolah Menengah Kejuruan'),
(12, 'MA', 'Madrasah Aliyah'),
(13, 'MAK', 'Madrasah Aliyah Kejuruan'),
(14, 'PC', 'Kelompok Belajar Paket C'),
(15, 'Akademi', 'Akademi'),
(16, 'Institute', 'Institute'),
(17, 'Politeknik', 'Politeknik'),
(18, 'Sekolah Tinggi', 'Sekolah Tinggi'),
(19, 'Universitas', 'Universitas');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kls` int(11) NOT NULL,
  `nama_kls` text,
  `smtr_kls` text,
  `tgl_kls` date DEFAULT NULL,
  `id_ins` int(11) NOT NULL,
  `hps_kls` text
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kls`, `nama_kls`, `smtr_kls`, `tgl_kls`, `id_ins`, `hps_kls`) VALUES
(1, '1', 'Ganjil', '2003-12-14', 1, 'no'),
(2, '11', 'Genap', '2016-02-19', 3, 'no'),
(3, '4', '', '2016-11-12', 6, 'no'),
(4, '10', 'Genap', '2016-11-14', 3, 'no'),
(5, '9', 'Ganjil', '2016-11-12', 3, 'no'),
(6, '10', 'Ganjil', '2016-11-21', 2, 'yes'),
(7, '4', 'Ganjil', '2014-11-21', 1, 'yes'),
(8, '2', 'Genap', '2008-10-30', 4, 'no'),
(9, '7', 'Genap', '2016-11-21', 2, 'yes'),
(10, '10', 'Ganjil', '2016-11-21', 3, 'no'),
(11, '4', 'Genap', '2016-11-21', 7, 'no'),
(12, '7', 'Ganjil', '2016-11-21', 4, 'yes'),
(13, '3', 'Ganjil', '1901-01-03', 4, 'yes'),
(14, '1', 'Ganjil', '0000-00-00', 4, 'yes'),
(15, '3', 'Ganjil', '2014-11-01', 8, 'no'),
(16, '4', 'Genap', '2011-01-01', 1, 'yes'),
(17, '10', 'Genap', '2016-11-10', 10, 'no'),
(18, '1', 'Ganjil', '2016-11-22', 11, 'no'),
(19, '11', 'Genap', '2010-11-01', 12, 'no'),
(20, '2', 'Genap', '2013-11-01', 13, 'no'),
(21, '10', 'Ganjil', '2009-11-01', 12, 'no'),
(22, '12', 'Genap', '2016-12-19', 14, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`id_log` int(11) NOT NULL,
  `isi_log` text,
  `id_user` int(11) NOT NULL,
  `tgl_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=437 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `isi_log`, `id_user`, `tgl_log`) VALUES
(13, 'Membersihkah Catatan Aktifitas (Log Aktifitas)', 1, '2016-11-22 08:37:59'),
(14, 'Menghapus data Universitas Muria Kudus ', 1, '2016-11-22 09:04:47'),
(15, 'Menghapus data(9 Ganjil) pada MAK Abadiyah 2 ', 1, '2016-11-22 09:05:20'),
(16, 'Menghapus data (7 Genap) pada MTs Abadiyah ', 1, '2016-11-22 09:06:18'),
(17, 'Menghapus data MNNNNNNNNN pada KB ASDF (4 Genap) ', 1, '2016-11-22 09:06:48'),
(18, 'Mengembalikan data Universitas Muria Kudus ', 1, '2016-11-22 09:07:16'),
(19, 'Mengembalikan data (9 Ganjil) pada MAK Abadiyah 2 ', 1, '2016-11-22 09:07:32'),
(20, 'Mengembalikan data MNNNNNNNNN pada KB ASDF (4 Genap) ', 1, '2016-11-22 09:07:53'),
(22, 'Masuk', 1, '2016-11-22 09:11:43'),
(23, 'Keluar', 1, '2016-11-22 09:12:25'),
(24, 'Masuk', 1, '2016-11-22 09:12:37'),
(25, 'Keluar', 1, '2016-11-22 09:27:44'),
(26, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:28:02'),
(27, 'Mengggunakan fasilitas Lupa Password pada Tahap 2', 1, '2016-11-22 09:28:25'),
(28, 'Mengggunakan fasilitas Lupa Password pada Tahap Akhir', 1, '2016-11-22 09:28:37'),
(29, 'Atur Ulang Password Mengggunakan fasilitas Lupa Password', 1, '2016-11-22 09:28:53'),
(30, 'Membatalkan fasilitas Lupa Password', 1, '2016-11-22 09:29:57'),
(31, 'Masuk', 1, '2016-11-22 09:30:08'),
(32, 'Keluar', 1, '2016-11-22 09:30:17'),
(34, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:32:05'),
(35, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:32:22'),
(36, 'Mengggunakan fasilitas Lupa Password pada Tahap 2', 1, '2016-11-22 09:35:06'),
(37, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:35:20'),
(38, 'Mengggunakan fasilitas Lupa Password pada Tahap 2', 1, '2016-11-22 09:35:33'),
(39, 'Mengggunakan fasilitas Lupa Password pada Tahap Akhir', 1, '2016-11-22 09:35:41'),
(40, 'Masuk', 1, '2016-11-22 09:35:58'),
(41, 'Keluar', 1, '2016-11-22 09:39:27'),
(42, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:39:56'),
(43, 'Membatalkan fasilitas Lupa Password', 1, '2016-11-22 09:40:00'),
(44, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:40:08'),
(45, 'Mengggunakan fasilitas Lupa Password pada Tahap 2', 1, '2016-11-22 09:40:25'),
(46, 'Membatalkan fasilitas Lupa Password', 1, '2016-11-22 09:40:29'),
(47, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:40:38'),
(48, 'Mengggunakan fasilitas Lupa Password pada Tahap 2', 1, '2016-11-22 09:40:50'),
(49, 'Mengggunakan fasilitas Lupa Password pada Tahap Akhir', 1, '2016-11-22 09:40:58'),
(50, 'Membatalkan fasilitas Lupa Password', 1, '2016-11-22 09:41:02'),
(51, 'Masuk', 1, '2016-11-22 09:41:17'),
(52, 'Keluar', 1, '2016-11-22 09:45:09'),
(53, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:45:41'),
(54, 'Membatalkan fasilitas Lupa Password', 1, '2016-11-22 09:45:51'),
(55, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:46:00'),
(56, 'Mengggunakan fasilitas Lupa Password pada Tahap 2', 1, '2016-11-22 09:46:11'),
(57, 'Mengggunakan fasilitas Lupa Password pada Tahap Akhir', 1, '2016-11-22 09:46:19'),
(58, 'Atur Ulang Password Mengggunakan fasilitas Lupa Password', 1, '2016-11-22 09:46:55'),
(60, 'Atur Ulang Password Mengggunakan fasilitas Lupa Password', 1, '2016-11-22 09:49:15'),
(61, 'Masuk', 1, '2016-11-22 09:49:21'),
(62, 'Keluar', 1, '2016-11-22 09:50:11'),
(63, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:50:21'),
(64, 'Membatalkan fasilitas Lupa Password', 1, '2016-11-22 09:50:25'),
(65, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-11-22 09:50:34'),
(66, 'Mengggunakan fasilitas Lupa Password pada Tahap 2', 1, '2016-11-22 09:50:47'),
(67, 'Mengggunakan fasilitas Lupa Password pada Tahap Akhir', 1, '2016-11-22 09:50:57'),
(68, 'Membatalkan fasilitas Lupa Password', 1, '2016-11-22 09:51:07'),
(69, 'Masuk', 1, '2016-11-22 09:51:10'),
(70, 'Kirim saran kepada Developer : hekjne ekjvekvn eknvjenjrkv\r\nejkvnkejvn erkvevj ekremlvkmekmvel', 1, '2016-11-22 09:55:14'),
(71, 'Ubah status Even Ulangan menjadi Belum Selesai', 1, '2016-11-22 10:01:21'),
(72, 'Ubah status Even Ulangan menjadi Sudah Selesai', 1, '2016-11-22 10:01:37'),
(73, 'Ubah status Even Ulangan menjadi Belum Selesai pada subjek B.Indo  Karaban 02 N (1 Ganjil) ', 1, '2016-11-22 10:04:20'),
(74, 'Ubah status Even Ulangan menjadi Sudah Selesai pada subjek B.Indo MI Karaban 02 N (1 Ganjil) ', 1, '2016-11-22 10:04:44'),
(75, 'Ubah status Even Ulangan menjadi Belum Selesai pada subjek B.Indo MI Karaban 02 N (1 Ganjil) ', 1, '2016-11-22 10:04:52'),
(76, 'Ubah status Even even1 menjadi Sudah Selesai pada subjek AAA KB ASDF (2 Genap) ', 1, '2016-11-22 10:06:18'),
(77, 'Ubah status Even Buat Project menjadi Belum Selesai pada subjek Matematika KB ASDF (2 Genap) ', 1, '2016-11-22 10:06:26'),
(78, 'Ubah Even hjbnbjbj menjadi sssssssssssss ', 1, '2016-11-22 10:21:10'),
(79, 'Ubah Even sssssssssssss menjadi gvhvvhhvg ', 1, '2016-11-22 10:21:59'),
(80, 'Ubah Even even1 menjadi even23 ', 1, '2016-11-22 10:22:50'),
(81, 'Ubah Even gvhvvhhvg pada subjek AAA menjadi vvvvvvv pada subjek Matematika ', 1, '2016-11-22 10:24:35'),
(82, 'Ubah Even even23 pada subjek Matematika menjadi even2222 pada subjek AAA   ( )', 1, '2016-11-22 10:28:19'),
(83, 'Ubah Even vvvvvvv pada subjek Matematika menjadi asd pada subjek AAA KB ASDF (2 Genap)', 1, '2016-11-22 10:29:34'),
(84, 'Tambah Even gggggggg pada subjek Matematika ', 1, '2016-11-22 10:36:31'),
(85, 'Ubah Even gggggggg pada subjek Matematika menjadi gggg4 pada subjek AAA KB ASDF (2 Genap)', 1, '2016-11-22 10:36:53'),
(86, 'Tambah Instansi PC hhhhhhhhhhhhh ', 1, '2016-11-22 10:41:39'),
(87, 'Ubah Instansi PC hhhhhhhhhhhhh menjadi SMA hhhhhhh ', 1, '2016-11-22 10:42:05'),
(88, 'Tambah Kelas/Semester SMA hhhhhhh (12 Genap) ', 1, '2016-11-22 10:47:41'),
(89, 'Ubah Kelas/Semester SMA hhhhhhh (12 Genap) Telah berhasil diubah menjadi SMA hhhhhhh (10 Genap) ', 1, '2016-11-22 10:48:25'),
(90, 'Tambah Subjek mega pty pada SMA hhhhhhh (10 Genap) ', 1, '2016-11-22 10:52:53'),
(91, 'Ubah Subjek mega pty pada SMA hhhhhhh (10 Genap) Telah berhasil diubah menjadi mega xxxxx pada MAK Abadiyah 2 (10 Ganjil) ', 1, '2016-11-22 10:53:43'),
(92, 'Ubah Subjek mega xxxxx pada MAK Abadiyah 2 (10 Ganjil) menjadi mvvvvvvv pada SMA hhhhhhh (10 Genap) ', 1, '2016-11-22 10:54:56'),
(93, 'Tambah Subjek oiii pada SMA hhhhhhh (10 Genap) ', 1, '2016-11-22 10:55:34'),
(94, 'Ubah Profil', 1, '2016-11-22 11:00:01'),
(95, 'Ubah Username & Password', 1, '2016-11-22 11:00:42'),
(96, 'Keluar', 1, '2016-11-22 11:01:56'),
(97, 'Masuk', 1, '2016-11-22 11:11:17'),
(98, 'Keluar', 1, '2016-11-22 11:11:45'),
(99, 'Masuk', 1, '2016-11-22 11:16:50'),
(100, 'Keluar', 1, '2016-11-22 11:17:16'),
(101, 'Masuk', 1, '2016-11-22 11:17:39'),
(102, 'Masuk', 1, '2016-11-22 11:18:25'),
(103, 'Keluar', 1, '2016-11-22 11:18:37'),
(104, 'Masuk', 1, '2016-11-22 11:18:53'),
(105, 'Masuk', 2, '2016-11-22 11:19:06'),
(106, 'Keluar', 2, '2016-11-22 11:19:39'),
(107, 'Masuk', 1, '2016-11-22 11:25:19'),
(108, 'Keluar', 1, '2016-11-22 11:25:47'),
(109, 'Masuk', 1, '2016-11-22 11:25:58'),
(110, 'Keluar', 1, '2016-11-22 11:26:32'),
(111, 'Masuk', 1, '2016-11-22 11:26:48'),
(112, 'Keluar', 1, '2016-11-22 11:27:33'),
(113, 'Masuk', 1, '2016-11-22 11:28:01'),
(114, 'Keluar', 1, '2016-11-22 11:28:26'),
(115, 'Masuk', 1, '2016-11-22 11:28:35'),
(116, 'Tambah Subjek akhir pada Universitas Muria Kudus (1 Ganjil) ', 1, '2016-11-22 11:29:51'),
(117, 'Tambah Subjek nnn pada Universitas Muria Kudus (1 Ganjil) ', 1, '2016-11-22 11:30:17'),
(118, 'Tambah Even 1sv pada subjek akhir ', 1, '2016-11-22 11:30:58'),
(119, 'Tambah Even mhj pada subjek akhir ', 1, '2016-11-22 11:31:15'),
(120, 'Tambah Even nnn pada subjek B.Indo ', 1, '2016-11-22 11:31:53'),
(121, 'Ubah status Even akukekahhhh menjadi Belum Selesai pada subjek eeeeddddd Universitas Muria Kudus (1 Ganjil) ', 1, '2016-11-22 11:32:51'),
(122, 'Keluar', 1, '2016-11-22 11:33:24'),
(123, 'Masuk', 2, '2016-11-22 11:33:32'),
(124, 'Keluar', 2, '2016-11-22 11:39:29'),
(125, 'Masuk', 2, '2016-11-22 11:39:44'),
(126, 'Keluar', 2, '2016-11-22 11:56:23'),
(127, 'Masuk', 3, '2016-11-22 11:57:23'),
(128, 'Tambah Instansi SD Gabus 01 ', 3, '2016-11-22 12:08:09'),
(129, 'Keluar', 3, '2016-11-22 12:14:13'),
(130, 'Masuk', 3, '2016-11-22 12:15:03'),
(131, 'Tambah Kelas/Semester SD Gabus 01 (1 Ganjil) ', 3, '2016-11-22 12:15:41'),
(132, 'Keluar', 3, '2016-11-22 12:16:08'),
(158, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 3, '2016-11-22 12:45:57'),
(159, 'Membatalkan fasilitas Lupa Password', 3, '2016-11-22 12:46:03'),
(174, 'Membersihkah Catatan Aktifitas (Log Aktifitas)', 4, '2016-11-22 13:03:47'),
(175, 'Menghapus data Sekolah Tinggi Agama Islam Kudus ', 4, '2016-11-22 13:04:08'),
(176, 'Masuk', 2, '2016-11-23 04:54:11'),
(177, 'Tambah Subjek IPA pada Universitas Wahid Hasyim (3 Ganjil) ', 2, '2016-11-23 04:55:00'),
(178, 'Tambah Subjek IPS pada Universitas Wahid Hasyim (3 Ganjil) ', 2, '2016-11-23 04:55:44'),
(179, 'Tambah Even UAS pada subjek IPA ', 2, '2016-11-23 04:56:36'),
(180, 'Tambah Even UTS pada subjek IPA ', 2, '2016-11-23 04:57:27'),
(181, 'Tambah Even Quis pada subjek IPS ', 2, '2016-11-23 04:57:53'),
(182, 'Tambah Even Tugas 5 pada subjek IPA ', 2, '2016-11-23 04:58:37'),
(183, 'Ubah status Even Tugas 5 menjadi Sudah Selesai pada subjek IPA Universitas Wahid Hasyim (3 Ganjil) ', 2, '2016-11-23 04:58:49'),
(184, 'Ubah status Even UTS menjadi Sudah Selesai pada subjek IPA Universitas Wahid Hasyim (3 Ganjil) ', 2, '2016-11-23 04:59:05'),
(185, 'Ubah status Even Quis menjadi Sudah Selesai pada subjek IPS Universitas Wahid Hasyim (3 Ganjil) ', 2, '2016-11-23 05:02:17'),
(186, 'Keluar', 2, '2016-11-23 05:19:17'),
(187, 'Masuk', 1, '2016-11-23 05:19:23'),
(188, 'Ubah Kelas/Semester KB ASDF (2 Genap) menjadi Universitas Muria Kudus (2 Genap) ', 1, '2016-11-23 05:20:29'),
(189, 'Menghapus data Akademi Perang ', 1, '2016-11-23 05:21:19'),
(190, 'Menghapus data MAK Abadiyah 2 ', 1, '2016-11-23 05:21:33'),
(191, 'Menghapus data SMA hhhhhhh ', 1, '2016-11-23 05:22:04'),
(192, 'Menghapus data MTs Abadiyah ', 1, '2016-11-23 05:22:17'),
(193, 'Menghapus data KB ASDF ', 1, '2016-11-23 05:22:35'),
(194, 'Menghapus data TK Al-asahr ', 1, '2016-11-23 05:22:48'),
(195, 'Ubah Kelas/Semester Universitas Muria Kudus (1 Ganjil) menjadi Universitas Muria Kudus (3 Ganjil) ', 1, '2016-11-23 05:23:32'),
(196, 'Menghapus data (7 Ganjil) pada Universitas Muria Kudus ', 1, '2016-11-23 05:24:25'),
(197, 'Menghapus data (3 Ganjil) pada Universitas Muria Kudus ', 1, '2016-11-23 05:24:51'),
(198, 'Menghapus data (1 Ganjil) pada Universitas Muria Kudus ', 1, '2016-11-23 05:25:06'),
(199, 'Ubah Kelas/Semester MI Karaban 02 N (4 Genap) menjadi MI Karaban 02 N (4 Ganjil) ', 1, '2016-11-23 05:25:24'),
(200, 'Menghapus data (4 Ganjil) pada MI Karaban 02 N ', 1, '2016-11-23 05:26:13'),
(201, 'Menghapus data (4 Genap) pada MI Karaban 02 N ', 1, '2016-11-23 05:26:25'),
(202, 'Masuk', 1, '2016-12-05 03:38:29'),
(203, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 04:33:29'),
(204, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 04:33:54'),
(205, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 04:48:49'),
(206, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 04:49:10'),
(207, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 04:51:34'),
(208, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 04:52:22'),
(209, 'Hapus Kriteria aaaaggggggggggg ()', 1, '2016-12-05 04:58:41'),
(210, 'Hapus Kriteria Jarak sekolah (Tinggi lebih baik)', 1, '2016-12-05 05:00:07'),
(211, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 05:00:22'),
(212, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 05:00:39'),
(213, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 05:03:47'),
(214, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 05:04:03'),
(215, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria aaaaaaaaaass *Rendah lebih baik*)', 1, '2016-12-05 05:04:12'),
(216, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 05:29:43'),
(217, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 05:29:53'),
(218, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria lkk *Tinggi lebih baik*)', 1, '2016-12-05 05:50:18'),
(219, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria kgkggkhghg *Tinggi lebih baik*)', 1, '2016-12-05 05:50:23'),
(220, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria ggggggggggggg *Rendah lebih baik*)', 1, '2016-12-05 05:50:28'),
(221, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 05:50:41'),
(222, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 05:50:49'),
(223, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 05:56:03'),
(224, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 06:16:48'),
(225, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 06:21:18'),
(226, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 06:23:30'),
(227, 'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)', 1, '2016-12-05 06:35:59'),
(228, 'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)', 1, '2016-12-05 06:37:03'),
(229, 'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)', 1, '2016-12-05 06:42:13'),
(230, 'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)', 1, '2016-12-05 06:42:36'),
(231, 'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)', 1, '2016-12-05 06:43:31'),
(232, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 07:04:38'),
(233, 'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)', 1, '2016-12-05 07:05:21'),
(234, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria msrfgd)', 1, '2016-12-05 07:12:40'),
(235, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif Ma iii23hhhbbb)', 1, '2016-12-05 07:14:19'),
(236, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 07:29:50'),
(237, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 07:30:09'),
(238, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 07:30:24'),
(239, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif xyzbnm)', 1, '2016-12-05 07:30:44'),
(240, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif mmmmmmmmmmmmmmmm)', 1, '2016-12-05 07:30:49'),
(241, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 07:31:11'),
(242, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 07:31:28'),
(243, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 07:35:16'),
(244, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 07:37:39'),
(245, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria kkkkkkkkk *Tinggi lebih baik*)', 1, '2016-12-05 07:44:36'),
(246, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria jnknkn *Tinggi lebih baik*)', 1, '2016-12-05 07:44:51'),
(247, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria cob *Rendah lebih baik*)', 1, '2016-12-05 07:46:10'),
(248, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria xxxxxx *Tinggi lebih baik*)', 1, '2016-12-05 07:46:24'),
(249, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 07:46:46'),
(250, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 07:47:04'),
(251, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 07:47:20'),
(252, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif aaaaaa)', 1, '2016-12-05 07:52:59'),
(253, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif bbbbbbbb)', 1, '2016-12-05 07:55:04'),
(254, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 07:55:23'),
(255, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 07:55:40'),
(256, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 07:57:43'),
(257, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 07:58:28'),
(258, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria 444 *Tinggi lebih baik*)', 1, '2016-12-05 08:03:28'),
(259, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria www *Tinggi lebih baik*)', 1, '2016-12-05 08:03:33'),
(260, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria sss *Tinggi lebih baik*)', 1, '2016-12-05 08:03:38'),
(261, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 08:03:56'),
(262, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 08:04:13'),
(263, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 08:04:35'),
(264, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif jkjbb)', 1, '2016-12-05 08:04:46'),
(265, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif nnj)', 1, '2016-12-05 08:04:54'),
(266, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif eefre)', 1, '2016-12-05 08:05:01'),
(267, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif fwfw23)', 1, '2016-12-05 08:05:06'),
(268, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria gkghgkh *Tinggi lebih baik*)', 1, '2016-12-05 08:05:22'),
(269, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 08:05:40'),
(270, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 08:06:06'),
(271, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria hbkbhkk *Tinggi lebih baik*)', 1, '2016-12-05 08:08:34'),
(272, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 08:14:14'),
(273, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 08:14:32'),
(274, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 08:19:00'),
(275, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 08:19:18'),
(276, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria kjbkjkjk *Tinggi lebih baik*)', 1, '2016-12-05 08:19:31'),
(277, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 08:19:46'),
(278, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 08:19:57'),
(279, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-05 08:20:26'),
(280, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-05 08:20:47'),
(281, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-05 08:21:21'),
(282, 'Masuk', 1, '2016-12-07 01:13:21'),
(283, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-07 01:20:48'),
(284, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-07 01:22:08'),
(285, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-07 01:27:31'),
(286, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria coba coba *Rendah lebih baik*)', 1, '2016-12-07 01:39:03'),
(287, 'Masuk', 1, '2016-12-07 04:51:17'),
(288, 'Mengembalikan data MAK Abadiyah 2 ', 1, '2016-12-07 05:14:08'),
(289, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria sjb *Tinggi lebih baik*)', 1, '2016-12-07 05:44:54'),
(290, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria uiwewkg *Tinggi lebih baik*)', 1, '2016-12-07 05:45:02'),
(291, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria khkghkg *Tinggi lebih baik*)', 1, '2016-12-07 05:45:08'),
(292, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-07 05:58:33'),
(293, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria shbhbd *Tinggi lebih baik*)', 1, '2016-12-07 06:01:25'),
(294, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria, menggunakan kriteria yang disarankan sistem)', 1, '2016-12-07 06:01:36'),
(295, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya per Semester *Rendah lebih baik*)', 1, '2016-12-07 06:06:45'),
(296, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya Masuk *Rendah lebih baik*)', 1, '2016-12-07 06:07:22'),
(297, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria, menggunakan kriteria yang disarankan sistem)', 1, '2016-12-07 06:07:32'),
(298, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya per Semester *Rendah lebih baik*)', 1, '2016-12-07 06:07:42'),
(299, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya per Semester *Rendah lebih baik*)', 1, '2016-12-07 06:07:49'),
(300, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya Masuk *Rendah lebih baik*)', 1, '2016-12-07 06:07:56'),
(301, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Akreditasi *Tinggi lebih baik*)', 1, '2016-12-07 06:08:03'),
(302, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Jarak Instansi dengan Rumah *Rendah lebih baik*)', 1, '2016-12-07 06:08:10'),
(303, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria, menggunakan kriteria yang disarankan sistem)', 1, '2016-12-07 06:08:22'),
(304, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Jarak Instansi dengan Rumah *Rendah lebih baik*)', 1, '2016-12-07 06:09:08'),
(305, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya per Semester *Rendah lebih baik*)', 1, '2016-12-07 06:09:15'),
(306, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Akreditasi *Tinggi lebih baik*)', 1, '2016-12-07 06:09:24'),
(307, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya per Semester *Rendah lebih baik*)', 1, '2016-12-07 06:09:31'),
(308, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya Masuk *Rendah lebih baik*)', 1, '2016-12-07 06:09:37'),
(309, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria, menggunakan kriteria yang disarankan sistem)', 1, '2016-12-07 06:09:48'),
(310, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-07 06:11:17'),
(311, 'Keluar', 1, '2016-12-07 06:12:53'),
(312, 'Masuk', 1, '2016-12-07 06:16:16'),
(313, 'Masuk', 1, '2016-12-08 01:52:18'),
(314, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Jarak Instansi dengan Rumah *Rendah lebih baik*)', 1, '2016-12-08 01:52:36'),
(315, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Akreditasi *Tinggi lebih baik*)', 1, '2016-12-08 01:52:42'),
(316, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya per Semester *Rendah lebih baik*)', 1, '2016-12-08 01:52:48'),
(317, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya Masuk *Rendah lebih baik*)', 1, '2016-12-08 01:52:53'),
(318, 'Ubah Profil', 1, '2016-12-08 01:54:49'),
(319, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria, menggunakan kriteria yang disarankan sistem)', 1, '2016-12-08 01:59:24'),
(320, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-08 02:00:57'),
(321, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-08 02:02:33'),
(322, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-08 02:03:10'),
(323, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-08 02:03:37'),
(324, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria kkkkk *Rendah lebih baik*)', 1, '2016-12-08 02:04:00'),
(325, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Akreditasi *Tinggi lebih baik*)', 1, '2016-12-08 02:04:05'),
(326, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya per Semester *Rendah lebih baik*)', 1, '2016-12-08 02:04:09'),
(327, 'Masuk', 1, '2016-12-08 05:04:44'),
(328, 'Menghapus data MAK Abadiyah 2 ', 1, '2016-12-08 05:05:35'),
(329, 'Masuk', 1, '2016-12-10 02:34:43'),
(330, 'Mengggunakan fasilitas Lupa Password pada Tahap 1', 1, '2016-12-14 07:03:54'),
(331, 'Mengggunakan fasilitas Lupa Password pada Tahap 2', 1, '2016-12-14 07:04:31'),
(332, 'Mengggunakan fasilitas Lupa Password pada Tahap Akhir', 1, '2016-12-14 07:05:17'),
(333, 'Membatalkan fasilitas Lupa Password', 1, '2016-12-14 07:05:41'),
(334, 'Masuk', 1, '2016-12-14 07:05:46'),
(335, 'Ubah Even even2222 pada subjek AAA menjadi even2222 pada subjek AAA Universitas Muria Kudus (2 Genap)', 1, '2016-12-14 07:43:25'),
(336, 'Ubah Even asd pada subjek AAA menjadi asd pada subjek Matematika Universitas Muria Kudus (2 Genap)', 1, '2016-12-14 08:09:43'),
(337, 'Tambah Even evene neenbenenebnbenbnen nec me c emcm pada subjek AAA ', 1, '2016-12-14 08:15:47'),
(338, 'Ubah Instansi Universitas Muria Kudus menjadi Politeknik Muria Kudus ', 1, '2016-12-14 08:23:34'),
(339, 'Keluar', 5, '2016-12-19 03:14:49'),
(340, 'Masuk', 5, '2016-12-19 03:15:10'),
(341, 'Tambah Instansi MAK AAAA ', 5, '2016-12-19 03:15:31'),
(342, 'Tambah Kelas/Semester MAK AAAA (12 Genap) ', 5, '2016-12-19 03:16:04'),
(343, 'Tambah Subjek STI pada MAK AAAA (12 Genap) ', 5, '2016-12-19 03:16:44'),
(344, 'Tambah Subjek SSS pada MAK AAAA (12 Genap) ', 5, '2016-12-19 03:17:19'),
(345, 'Tambah Even kkkkkk pada subjek SSS ', 5, '2016-12-19 03:18:01'),
(346, 'Tambah Even gggg pada subjek STI ', 5, '2016-12-19 03:18:24'),
(347, 'Ubah status Even gggg menjadi Sudah Selesai pada subjek STI MAK AAAA (12 Genap) ', 5, '2016-12-19 03:19:06'),
(348, 'MAK AAAA (12 Genap) Hapus Even kkkkkk pada subjek SSS', 5, '2016-12-19 03:20:34'),
(349, 'Ubah Even gggg pada subjek STI menjadi ggggggggg pada subjek STI MAK AAAA (12 Genap)', 5, '2016-12-19 03:20:47'),
(350, 'Keluar', 5, '2016-12-19 03:22:27'),
(351, 'Keluar', 6, '2016-12-19 03:34:32'),
(352, 'Masuk', 7, '2016-12-19 03:36:05'),
(353, 'Masuk', 1, '2016-12-20 11:41:31'),
(354, 'Keluar', 1, '2016-12-20 18:04:10'),
(355, 'Masuk', 1, '2016-12-20 18:11:51'),
(356, 'Keluar', 1, '2016-12-20 18:13:21'),
(357, 'Masuk', 1, '2016-12-20 18:13:50'),
(358, 'Ubah Subjek AAA pada Politeknik Muria Kudus (2 Genap) menjadi IPA pada Politeknik Muria Kudus (2 Genap) ', 1, '2016-12-20 18:18:22'),
(359, 'Ubah Subjek Matematika pada Politeknik Muria Kudus (2 Genap) menjadi Matematika pada Politeknik Muria Kudus (2 Genap) ', 1, '2016-12-20 18:19:35'),
(360, 'Ubah Instansi Politeknik Muria Kudus menjadi Akademi Muria Kudus ', 1, '2016-12-20 18:23:24'),
(361, 'Menghapus data MI Karaban 02 N ', 1, '2016-12-20 18:29:58'),
(362, 'Keluar', 1, '2016-12-20 18:42:00'),
(363, 'Masuk', 1, '2016-12-21 13:11:28'),
(364, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Jarak Instansi dengan Rumah *Rendah lebih baik*)', 1, '2016-12-21 13:11:43'),
(365, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya Masuk *Rendah lebih baik*)', 1, '2016-12-21 13:11:47'),
(366, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria, menggunakan kriteria yang disarankan sistem)', 1, '2016-12-21 13:11:55'),
(367, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 13:12:57'),
(368, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-21 13:13:21'),
(369, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:13:51'),
(370, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya per Semester *Rendah lebih baik*)', 1, '2016-12-21 13:14:49'),
(371, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:15:15'),
(372, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:19:14'),
(373, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:19:32'),
(374, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-21 13:19:57'),
(375, 'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)', 1, '2016-12-21 13:20:31'),
(376, 'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)', 1, '2016-12-21 13:21:40'),
(377, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 13:22:26'),
(378, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:22:45'),
(379, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif bjkbkbk)', 1, '2016-12-21 13:23:10'),
(380, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Jarak Instansi dengan Rumah 1 *Tinggi lebih baik*)', 1, '2016-12-21 13:23:24'),
(381, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:23:40'),
(382, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:23:52'),
(383, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif bhb)', 1, '2016-12-21 13:24:03'),
(384, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif ihiuh)', 1, '2016-12-21 13:24:10'),
(385, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:24:24'),
(386, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif hbjhbj)', 1, '2016-12-21 13:24:43'),
(387, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Akreditasi *Tinggi lebih baik*)', 1, '2016-12-21 13:26:06'),
(388, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria Biaya Masuk *Rendah lebih baik*)', 1, '2016-12-21 13:29:42'),
(389, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 13:29:59'),
(390, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:30:15'),
(391, 'Fasilitas Bantu Pilih Sekolah (Hapus Alternatif kjnjknk)', 1, '2016-12-21 13:30:27'),
(392, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 13:51:19'),
(393, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 13:58:28'),
(394, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria aaaccccccccc *Rendah lebih baik*)', 1, '2016-12-21 13:59:23'),
(395, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 14:01:33'),
(396, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 14:02:33'),
(397, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria kjjh *Tinggi lebih baik*)', 1, '2016-12-21 14:02:46'),
(398, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 14:06:01'),
(399, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 14:06:25'),
(400, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 14:12:19'),
(401, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria nkjjnkn *Tinggi lebih baik*)', 1, '2016-12-21 14:12:50'),
(402, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 14:19:18'),
(403, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 14:21:00'),
(404, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria fevefv *Tinggi lebih baik*)', 1, '2016-12-21 14:22:28'),
(405, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 14:27:00'),
(406, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 14:28:15'),
(407, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 14:28:50'),
(408, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria jknjknn *Tinggi lebih baik*)', 1, '2016-12-21 14:31:11'),
(409, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria vfevf *Tinggi lebih baik*)', 1, '2016-12-21 14:31:57'),
(410, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 14:39:05'),
(411, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria kjjnjkkn *Tinggi lebih baik*)', 1, '2016-12-21 14:39:22'),
(412, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria hjvhjbj *Rendah lebih baik*)', 1, '2016-12-21 14:39:29'),
(413, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 14:39:39'),
(414, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 14:39:54'),
(415, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 16:15:44'),
(416, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria lkeklmelv *Tinggi lebih baik*)', 1, '2016-12-21 16:37:29'),
(417, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 17:18:48'),
(418, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria hbhb *Tinggi lebih baik*)', 1, '2016-12-21 17:38:43'),
(419, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 17:41:32'),
(420, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 17:41:40'),
(421, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-21 17:41:53'),
(422, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 17:59:41'),
(423, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 18:01:16'),
(424, 'Fasilitas Bantu Pilih Sekolah (Ubah Alternatif)', 1, '2016-12-21 18:02:24'),
(425, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-21 18:09:15'),
(426, 'Masuk', 1, '2016-12-22 01:13:37'),
(427, 'Fasilitas Bantu Pilih Sekolah (Hapus Kriteria jenjvek *Tinggi lebih baik*)', 1, '2016-12-22 03:30:15'),
(428, 'Fasilitas Bantu Pilih Sekolah (Tambah Kriteria)', 1, '2016-12-22 03:30:31'),
(429, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-22 03:31:00'),
(430, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-22 03:31:29'),
(431, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-22 03:31:43'),
(432, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-22 03:31:58'),
(433, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-22 03:32:10'),
(434, 'Fasilitas Bantu Pilih Sekolah (Ubah Kriteria)', 1, '2016-12-22 03:32:22'),
(435, 'Fasilitas Bantu Pilih Sekolah (Tambah Alternatif)', 1, '2016-12-22 03:37:35'),
(436, 'Masuk', 1, '2017-01-13 02:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE IF NOT EXISTS `saran` (
`id_srn` int(11) NOT NULL,
  `tgl_srn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `isi_srn` text
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_srn`, `tgl_srn`, `id_user`, `isi_srn`) VALUES
(1, '2016-11-18 11:54:17', 1, 'sarahabhchchnshjdcnskjcnkjnsjcnsjcsckmsklmcksmckml'),
(2, '2016-11-18 11:54:26', 1, 'knjkjwnjkcnkwjnkjqnkdnwkjndnnuidnui2ndunwjindw'),
(3, '2016-11-18 11:54:36', 1, 'gvvbjvhbbjhbjhbhbhjbhbkhbbkj'),
(4, '0000-00-00 00:00:00', 1, 'jknjdwnkjnsnckjwnsjcwnjnxcwjkc'),
(5, '0000-00-00 00:00:00', 1, 'kjsncjknkcnjknjkdnwkjnekcjdnksnjnckdjenjsdmc'),
(6, '2016-11-18 12:00:34', 1, 'kwjfjwnjnckdnjwfnjeknjswncj'),
(7, '2016-11-18 12:23:12', 1, 'ghvjhjbjh uhhih i iuhuhuih ui hiu  h ihih iuh uii '),
(8, '2016-11-18 12:24:06', 2, 'hcfhgcgf gygug y u guygyu gyu g yu g uyg yu gyu gu guyguug '),
(9, '2016-11-22 09:55:14', 1, 'hekjne ekjvekvn eknvjenjrkv\r\nejkvnkejvn erkvevj ekremlvkmekmvel'),
(10, '2016-11-22 12:53:00', 4, 'jkannjncw wkjnckwnk kwnjecjknjkwc weknkcj'),
(11, '2016-11-22 12:53:14', 4, 'ejcwknjncj wjncjwnk cjwejnwjnkd wkj ednjnjwo dowjnd o'),
(12, '2016-11-22 12:53:25', 4, 'kjwnej jwendjdj wjeidniwed jewnjdnj j'),
(13, '2016-11-22 12:53:40', 4, 'xxxxxxxxxxxx wwwwwwwwwwwwwww');

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE IF NOT EXISTS `spk` (
`id_spk` int(11) NOT NULL,
  `nilai_spk` int(11) DEFAULT NULL,
  `id_a` int(11) NOT NULL,
  `id_c` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `nilai_spk`, `id_a`, `id_c`) VALUES
(161, 76887, 20, 63),
(162, 898, 20, 62),
(163, 89798, 20, 61),
(164, 8979, 20, 60),
(165, 98798, 20, 59),
(166, 97, 20, 58);

-- --------------------------------------------------------

--
-- Table structure for table `spkb`
--

CREATE TABLE IF NOT EXISTS `spkb` (
`id_spkb` int(11) NOT NULL,
  `id_c1` int(11) DEFAULT NULL,
  `id_c2` int(11) DEFAULT NULL,
  `nilai_b` decimal(11,3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spkb`
--

INSERT INTO `spkb` (`id_spkb`, `id_c1`, `id_c2`, `nilai_b`) VALUES
(174, 63, 63, '1.000'),
(175, 63, 62, '3.000'),
(176, 63, 61, '5.000'),
(177, 63, 60, '5.000'),
(178, 63, 59, '3.000'),
(179, 63, 58, '3.000'),
(180, 62, 63, '0.333'),
(181, 62, 62, '1.000'),
(182, 62, 61, '1.000'),
(183, 62, 60, '1.000'),
(184, 62, 59, '0.200'),
(185, 62, 58, '0.333'),
(186, 61, 63, '0.200'),
(187, 61, 62, '1.000'),
(188, 61, 61, '1.000'),
(189, 61, 60, '1.000'),
(190, 61, 59, '0.333'),
(191, 61, 58, '0.333'),
(192, 60, 63, '0.200'),
(193, 60, 62, '1.000'),
(194, 60, 61, '1.000'),
(195, 60, 60, '1.000'),
(196, 60, 59, '0.333'),
(197, 60, 58, '0.333'),
(198, 59, 63, '0.333'),
(199, 59, 62, '5.000'),
(200, 59, 61, '3.000'),
(201, 59, 60, '3.000'),
(202, 59, 59, '1.000'),
(203, 59, 58, '1.000'),
(204, 58, 63, '0.333'),
(205, 58, 62, '3.000'),
(206, 58, 61, '3.000'),
(207, 58, 60, '3.000'),
(208, 58, 59, '1.000'),
(209, 58, 58, '1.000');

-- --------------------------------------------------------

--
-- Table structure for table `spk_a`
--

CREATE TABLE IF NOT EXISTS `spk_a` (
`id_a` int(11) NOT NULL,
  `nama_a` text,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_a`
--

INSERT INTO `spk_a` (`id_a`, `nama_a`, `id_user`) VALUES
(20, 'snjfnsdnjin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spk_c`
--

CREATE TABLE IF NOT EXISTS `spk_c` (
`id_c` int(11) NOT NULL,
  `nama_c` text,
  `minmax_c` text,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_c`
--

INSERT INTO `spk_c` (`id_c`, `nama_c`, `minmax_c`, `id_user`) VALUES
(58, 'Alima', 'Tinggi lebih baik', 1),
(59, 'Aempat', 'Tinggi lebih baik', 1),
(60, 'Atiga', 'Tinggi lebih baik', 1),
(61, 'Adua', 'Tinggi lebih baik', 1),
(62, 'Asatu', 'Tinggi lebih baik', 1),
(63, 'Harga	', 'Rendah lebih baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjek`
--

CREATE TABLE IF NOT EXISTS `subjek` (
`id_sub` int(11) NOT NULL,
  `nama_sub` text,
  `pengampu_sub` text,
  `wkt_hari_sub` text,
  `wkt_jam_sub` int(11) DEFAULT NULL,
  `wkt_mnt_sub` int(11) DEFAULT NULL,
  `warna_sub` text,
  `id_kls` int(11) NOT NULL,
  `hps_sub` text
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjek`
--

INSERT INTO `subjek` (`id_sub`, `nama_sub`, `pengampu_sub`, `wkt_hari_sub`, `wkt_jam_sub`, `wkt_mnt_sub`, `warna_sub`, `id_kls`, `hps_sub`) VALUES
(1, 'B.Indo', 'Fatim. S.Pd', 'Selasa', 7, 0, 'rgba(39,186,28,0.5)', 1, 'no'),
(2, 'Matematika', 'Pengampu 2', 'Jumat', 10, 15, 'rgba(182,177,59,0.68)', 8, 'no'),
(3, 'B.Inggris', 'Suwadi2', 'Selasa', 12, 30, '#1c28ba', 7, 'no'),
(4, 'CB', '', 'Jumat', 3, 30, '#c5159b', 11, 'no'),
(5, 'LC', 'bawa a a', 'Selasa', 12, 59, '#f647ac', 11, 'no'),
(6, 'MNNNNNNNNN', 'MMMMMMMMMMMMMMMMMMMMMMMMMMMMMM', 'Selasa', 10, 6, '#70ff20', 11, 'no'),
(7, 'IPA', 'Pengampu 1', 'Kamis', 22, 0, 'rgba(28,92,186,0.31)', 8, 'no'),
(8, 'eeeeddddd', 'peng', 'Jumat', 7, 15, '#192332', 14, 'no'),
(9, 'uuuuu', 'yyyyyyyyyyyyyyyyyy', 'Rabu', 8, 25, '#1cbaab', 12, 'no'),
(10, 'IPA', 'ibu', 'Selasa', 9, 12, '#1bb1cb', 7, 'no'),
(11, 'mvvvvvvv', 'mnn', 'Rabu', 5, 0, '#b2c8e9', 17, 'no'),
(12, 'oiii', '', 'Senin', 5, 0, '#1c5cba', 17, 'no'),
(13, 'akhir', '', 'Senin', 6, 3, 'rgba(28,92,186,0.41)', 13, 'no'),
(14, 'nnn', '', 'Senin', 5, 2, '#b57fc5', 13, 'no'),
(15, 'MTK', '', 'Selasa', 8, 0, '#e63a3a', 19, 'no'),
(16, 'IPA', 'Siti', 'Senin', 5, 1, '#1cba26', 19, 'no'),
(17, 'IPS', 'Karsan', 'Rabu', 9, 45, '#3894f1', 19, 'no'),
(18, 'A', 'n', 'Rabu', 9, 0, '#bab71c', 20, 'no'),
(19, 'IPA', '', 'Senin', 8, 0, '#ba1c42', 15, 'no'),
(20, 'IPS', 'Sri Handayani', 'Selasa', 10, 0, 'rgba(28,92,186,0.63)', 15, 'no'),
(21, 'STI', '', 'Senin', 8, 45, '#0dde24', 22, 'no'),
(22, 'SSS', 'Sayayayayyaya', 'Jumat', 12, 40, '#1c5cba', 22, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama_user` text,
  `jekel_user` text,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `hp_user` text,
  `ayah_user` text,
  `ibu_user` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jekel_user`, `username`, `password`, `hp_user`, `ayah_user`, `ibu_user`) VALUES
(1, 'Ahmad Faid al-Basyar', 'male', 'ahmadfaidulbasyar95@gmail.com', 'f4fourone1r', '+62 0823-2706-4384', 'mustofa', 'yati'),
(2, 'Ira Mega N', 'female', 'irameganovianti@gmail.com', 'f4fourone1r', '+62 9877-8979-7987', 'saribun', ''),
(3, 'kanxsnajknxk', 'male', 'asdf@gmail.com', 'asdfgh', '+89 9878-9799-8897', 'kjjhjjnkn', 'jknjnjnn'),
(4, 'ahmaddddddddddddd', 'male', '1234567@gmail.com', '1234567', '+12 3456-7890-1234', 'ayah', 'ibuu'),
(5, 'SAya', 'male', 'saya@gmail.com', 'sayasaya', '+62 0823-2706-4384', 'sayaayah', 'sayaibu'),
(6, 'hhhhh', 'male', 'kkkk@gmail.com', 'assssss', '+89 7878-7897-7879', 'hbjb', 'jhbjbj'),
(7, 'yyyy', 'male', 'tttt@gmail.com', 'asdfgh', '+87 6768-6868-7867', 'hbjhbbbh', 'ygyuggguy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `even`
--
ALTER TABLE `even`
 ADD PRIMARY KEY (`id_ev`), ADD KEY `fk_ev` (`id_sub`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
 ADD PRIMARY KEY (`id_ins`), ADD KEY `fk_user` (`id_user`), ADD KEY `fk_jnjg` (`id_jnjg`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
 ADD PRIMARY KEY (`id_jnjg`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kls`), ADD KEY `fk_ins` (`id_ins`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`id_log`), ADD KEY `fk_log` (`id_user`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
 ADD PRIMARY KEY (`id_srn`), ADD KEY `fk_srn` (`id_user`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
 ADD PRIMARY KEY (`id_spk`);

--
-- Indexes for table `spkb`
--
ALTER TABLE `spkb`
 ADD PRIMARY KEY (`id_spkb`);

--
-- Indexes for table `spk_a`
--
ALTER TABLE `spk_a`
 ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `spk_c`
--
ALTER TABLE `spk_c`
 ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `subjek`
--
ALTER TABLE `subjek`
 ADD PRIMARY KEY (`id_sub`), ADD KEY `fk_sub` (`id_kls`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `even`
--
ALTER TABLE `even`
MODIFY `id_ev` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
MODIFY `id_ins` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kls` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=437;
--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
MODIFY `id_srn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `spkb`
--
ALTER TABLE `spkb`
MODIFY `id_spkb` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `spk_a`
--
ALTER TABLE `spk_a`
MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `spk_c`
--
ALTER TABLE `spk_c`
MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `subjek`
--
ALTER TABLE `subjek`
MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `even`
--
ALTER TABLE `even`
ADD CONSTRAINT `even_ibfk_1` FOREIGN KEY (`id_sub`) REFERENCES `subjek` (`id_sub`);

--
-- Constraints for table `instansi`
--
ALTER TABLE `instansi`
ADD CONSTRAINT `instansi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
ADD CONSTRAINT `instansi_ibfk_2` FOREIGN KEY (`id_jnjg`) REFERENCES `jenjang` (`id_jnjg`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_ins`) REFERENCES `instansi` (`id_ins`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `saran`
--
ALTER TABLE `saran`
ADD CONSTRAINT `saran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `subjek`
--
ALTER TABLE `subjek`
ADD CONSTRAINT `subjek_ibfk_1` FOREIGN KEY (`id_kls`) REFERENCES `kelas` (`id_kls`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
