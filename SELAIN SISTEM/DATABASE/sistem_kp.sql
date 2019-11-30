-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 08:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `bagian` enum('TU','BKA','BKD') NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `hapus` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `bagian`, `jabatan`, `hapus`) VALUES
(37, '1231', 'naum1', 'perempuan', 'tapung1', '01-11-2019', 'panam1', 'TU', 'jabatan1', '1'),
(38, '3211', 'een1', 'laki-laki', 'tapung1', '01-10-2019', 'panam1', 'BKD', 'jabatan4', '0'),
(40, '3210', 'asdf', 'laki-laki', 'tapung1', '29-10-2019', 'panam1', 'BKA', 'jabatan3', '0');

-- --------------------------------------------------------

--
-- Table structure for table `surat_disposisi`
--

CREATE TABLE `surat_disposisi` (
  `id_surat_disposisi` int(11) NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `no_surat_masuk` varchar(128) NOT NULL,
  `tgl_surat_masuk` varchar(128) NOT NULL,
  `ringkasan` varchar(128) NOT NULL,
  `tujuan` enum('BKD','BKA') DEFAULT NULL,
  `file_disposisi_sudah_disetujui` varchar(128) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `status_spt` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_disposisi`
--

INSERT INTO `surat_disposisi` (`id_surat_disposisi`, `pengirim`, `no_surat_masuk`, `tgl_surat_masuk`, `ringkasan`, `tujuan`, `file_disposisi_sudah_disetujui`, `status`, `status_spt`) VALUES
(56, 'lapas indragirihilir', 'W4.PAS.1', '01-11-2019', 'penelitian masyarakat an. ilham sauly', 'BKD', 'persetujuan_disposisi.pdf', '1', '1'),
(57, 'lapas indragirihulu', 'W4.PAS.2', '20-11-2019', 'penelitian masyarakat an. reza purnomo', 'BKA', 'persetujuan_disposisi1.pdf', '1', '1'),
(58, 'lapas pekanbaru', '23434', '14-11-2019', 'penelitian masyarakat an. suwantono', 'BKD', 'transaksi.pdf', '1', '1'),
(59, 'asdf', 'sdf', '01-11-2019', 'fda', 'BKD', 'transaksi1.pdf', '1', '1'),
(60, 'surat masuk', '1341', '29-11-2019', 'ini surat masuk', 'BKA', 'transaksi2.pdf', '1', '1'),
(61, 'bka', '134', '22-11-2019', 'bka', 'BKA', 'transaksi3.pdf', '1', '1'),
(62, 'aaa', 'aaa', '31-10-2019', 'aaa', 'BKD', 'transaksi4.pdf', '1', '1'),
(63, 'bbbb', '134', '30-10-2019', 'bbb', 'BKA', 'transaksi5.pdf', '1', '1'),
(64, 'surat baru', '313413', '30-10-2019', 'surat', 'BKD', 'transaksi6.pdf', '1', '1'),
(65, 'surat si kuning ', '134341', '05-11-2019', 'efsd', 'BKA', 'transaksi7.pdf', '1', '1'),
(66, 'aa', 'a', '07-11-2019', 'a', 'BKD', 'transaksi8.pdf', '1', '1'),
(67, 'bb', 'bbb', '06-11-2019', 'bb', 'BKA', 'transaksi9.pdf', '1', '1'),
(68, 'cccc', '1314', '30-10-2019', 'cccc', 'BKD', '2-converted.pdf', '1', '1'),
(69, 'ini surat masuk', '123432', '07-11-2019', 'ini surat masuk', 'BKD', '2-converted1.pdf', '1', '1'),
(70, 'zzzz', 'qerewq', '14-11-2019', 'zzzz', 'BKD', 'BAB_II.pdf', '1', '1'),
(71, 'asasasa', 'sasasa', '07-11-2019', 'sasa', 'BKD', 'jbptunikompp-gdl-muhammadsy-35135-3-unikom_m-i.pdf', '1', '1'),
(72, 'riyan', '237377', '31-10-2019', 'riyan', 'BKD', 'jbptunikompp-gdl-muhammadsy-35135-3-unikom_m-i1.pdf', '1', '1'),
(73, 'ujang', '14', '12-11-2019', 'ujang', 'BKD', 'BAB_III.pdf', '1', '1'),
(74, 'adfdsa', '134', '06-11-2019', 'asdf', 'BKD', 'BAB_III1.pdf', '1', '1'),
(75, 'adf', '14', '29-10-2019', 'adsf', 'BKD', 'jbptunikompp-gdl-muhammadsy-35135-3-unikom_m-i2.pdf', '1', '1'),
(76, 'zcxczx', '14', '07-11-2019', 'daf', 'BKD', 'jbptppolban-gdl-sarrinoorf-4117-3-bab2--7.pdf', '1', '1'),
(77, 'tfgyy', '134', '06-11-2019', 'qwewqe', 'BKD', 'BAB_III2.pdf', '1', '1'),
(78, 'sdf', 'sfg', '29-10-2019', 'sf', 'BKD', NULL, NULL, '0'),
(79, 'df', '123', '30-10-2019', 'asdf', 'BKA', 'jbptppolban-gdl-sarrinoorf-4117-3-bab2--71.pdf', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `file_surat_masuk` varchar(128) NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `no_surat_masuk` varchar(128) NOT NULL,
  `tgl_surat_masuk` varchar(128) NOT NULL,
  `ringkasan` varchar(128) NOT NULL,
  `disposisi` enum('0','1') NOT NULL,
  `hapus` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `file_surat_masuk`, `pengirim`, `no_surat_masuk`, `tgl_surat_masuk`, `ringkasan`, `disposisi`, `hapus`) VALUES
(73, 'data_pengawas.pdf', 'lapas indragirihilir', 'W4.PAS.1', '01-11-2019', 'penelitian masyarakat an. ilham sauly', '1', '0'),
(74, 'transaksi.pdf', 'lapas indragirihulu', 'W4.PAS.2', '20-11-2019', 'penelitian masyarakat an. reza purnomo', '1', '0'),
(75, 'transaksi1.pdf', 'lapas pekanbaru', '23434', '14-11-2019', 'penelitian masyarakat an. suwantono', '1', '0'),
(76, 'transaksi2.pdf', 'asdf', 'sdf', '01-11-2019', 'fda', '1', '0'),
(77, 'transaksi3.pdf', 'surat masuk', '1341', '29-11-2019', 'ini surat masuk', '1', '0'),
(78, 'transaksi4.pdf', 'bka', '134', '22-11-2019', 'bka', '1', '0'),
(79, 'transaksi5.pdf', 'aaa', 'aaa', '31-10-2019', 'aaa', '1', '0'),
(80, 'transaksi6.pdf', 'bbbb', '134', '30-10-2019', 'bbb', '1', '0'),
(81, 'transaksi7.pdf', 'surat baru', '313413', '30-10-2019', 'surat', '1', '0'),
(82, 'transaksi8.pdf', 'surat si kuning ', '134341', '05-11-2019', 'efsd', '1', '0'),
(83, 'Dok_baru_2019-10-30_00_14.pdf', 'aa', 'a', '07-11-2019', 'a', '1', '0'),
(84, 'transaksi9.pdf', 'bb', 'bbb', '06-11-2019', 'bb', '1', '0'),
(85, '2-converted.pdf', 'cccc', '1314', '30-10-2019', 'cccc', '1', '0'),
(86, '2-converted1.pdf', 'ini surat masuk', '123432', '07-11-2019', 'ini surat masuk', '1', '0'),
(87, 'BAB_III.pdf', 'zzzz', 'qerewq', '14-11-2019', 'zzzz', '1', '0'),
(88, 'jbptunikompp-gdl-muhammadsy-35135-3-unikom_m-i.pdf', 'asasasa', 'sasasa', '07-11-2019', 'sasa', '1', '1'),
(89, 'BAB_III1.pdf', 'riyan', '237377', '31-10-2019', 'riyan', '1', '1'),
(91, 'BAB_II.pdf', 'ujang', '14', '12-11-2019', 'ujang', '1', '0'),
(92, 'BAB_II1.pdf', 'adfdsa', '134', '06-11-2019', 'asdf', '1', '0'),
(93, 'jbptppolban-gdl-sarrinoorf-4117-3-bab2--7.pdf', 'adf', '14', '29-10-2019', 'adsf', '1', '0'),
(94, 'jbptunikompp-gdl-muhammadsy-35135-3-unikom_m-i1.pdf', 'zcxczx', '14', '07-11-2019', 'daf', '1', '0'),
(95, 'BAB_III3.pdf', 'tfgyy', '134', '06-11-2019', 'qwewqe', '1', '0'),
(96, 'jbptppolban-gdl-sarrinoorf-4117-3-bab2--71.pdf', 'sdf', 'sfg', '29-10-2019', 'sf', '1', '0'),
(97, 'jbptunikompp-gdl-muhammadsy-35135-3-unikom_m-i2.pdf', 'df', '123', '30-10-2019', 'asdf', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `surat_spt`
--

CREATE TABLE `surat_spt` (
  `id_surat_spt` int(11) NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `no_surat_masuk` varchar(128) NOT NULL,
  `tgl_surat_masuk` varchar(128) NOT NULL,
  `tgl_akhir_spt` varchar(128) NOT NULL,
  `ringkasan` varchar(256) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `nip_pegawai` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `bagian` enum('BKD','BKA') NOT NULL,
  `status_pengajuan` enum('0','1') NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `file_spt_sudah_disetujui` varchar(128) DEFAULT NULL,
  `file_spt_lengkap` varchar(128) DEFAULT NULL,
  `status_telat` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_spt`
--

INSERT INTO `surat_spt` (`id_surat_spt`, `pengirim`, `no_surat_masuk`, `tgl_surat_masuk`, `tgl_akhir_spt`, `ringkasan`, `nama_pegawai`, `nip_pegawai`, `jabatan`, `bagian`, `status_pengajuan`, `status`, `file_spt_sudah_disetujui`, `file_spt_lengkap`, `status_telat`) VALUES
(20, 'lapas indragirihilir', 'W4.PAS.1', '01-11-2019', '20-11-2019', 'penelitian masyarakat an. ilham sauly', 'mariana', '11', 'jabatan 2', 'BKD', '1', '1', 'persetujuan_disposisi.pdf', 'BAB_III.pdf', '1'),
(21, 'lapas indragirihulu', 'W4.PAS.2', '20-11-2019', '20-11-2019', 'penelitian masyarakat an. reza purnomo', 'surya', '12', 'jabatan 6', 'BKA', '1', '1', 'persetujuan_disposisi1.pdf', 'jbptunikompp-gdl-muhammadsy-35135-3-unikom_m-i1.pdf', '0'),
(22, 'lapas pekanbaru', '23434', '14-11-2019', '27-11-2019', 'penelitian masyarakat an. suwantono', 'riyan bngst', '27', 'jabatan1', 'BKD', '1', '1', 'transaksi.pdf', 'transaksi.pdf', '0'),
(23, 'surat masuk', '1341', '29-11-2019', '24-11-2019', 'ini surat masuk', 'pegawai bka edit', '21', '', 'BKA', '1', '1', 'transaksi3.pdf', NULL, '0'),
(24, 'asdf', 'sdf', '01-11-2019', '28-11-2019', 'fda', 'pegawai bkd edit', '19', '', 'BKD', '1', '1', 'transaksi1.pdf', 'BAB_II.pdf', '0'),
(25, 'bka', '134', '22-11-2019', '24-11-2019', 'bka', 'silvia', '2', 'jabatan 3', 'BKA', '1', '1', 'jbptppolban-gdl-sarrinoorf-4117-3-bab2--7.pdf', NULL, '0'),
(26, 'aaa', 'aaa', '31-10-2019', '28-11-2019', 'aaa', 'mariana', '11', 'jabatan 2', 'BKD', '0', NULL, NULL, NULL, NULL),
(27, 'bbbb', '134', '30-10-2019', '24-11-2019', 'bbb', 'pegawai bka edit', '21', '', 'BKA', '1', NULL, NULL, NULL, NULL),
(28, 'surat baru', '313413', '30-10-2019', '28-11-2019', 'surat', 'pegawai bkd', '3210', 'jabatan2', 'BKD', '0', NULL, NULL, NULL, NULL),
(29, 'surat si kuning ', '134341', '05-11-2019', '24-11-2019', 'efsd', 'pegawai bka', '4321', 'jabatan3', 'BKA', '1', NULL, NULL, NULL, NULL),
(30, 'aa', 'a', '07-11-2019', '29-11-2019', 'a', 'pegawai bkd', '3210', 'jabatan2', 'BKD', '1', NULL, 'transaksi2.pdf', NULL, NULL),
(31, 'bb', 'bbb', '06-11-2019', '25-11-2019', 'bb', 'pegawai bka', '', '', 'BKA', '1', NULL, NULL, NULL, NULL),
(32, 'cccc', '1314', '30-10-2019', '24-11-2019', 'cccc', 'een1', '3211', 'jabatan4', 'BKD', '1', '1', '2-converted.pdf', 'BAB_II1.pdf', '1'),
(33, 'ini surat masuk', '123432', '07-11-2019', '24-11-2019', 'ini surat masuk', 'een1', '3211', 'jabatan4', 'BKD', '1', '1', '2-converted1.pdf', '2-converted.pdf', '0'),
(34, 'zzzz', 'qerewq', '14-11-2019', '04-12-2019', 'zzzz', 'een1', '3211', 'jabatan4', 'BKD', '1', NULL, NULL, NULL, NULL),
(35, 'adf', '14', '29-10-2019', '04-12-2019', 'adsf', 'een1', '3211', 'jabatan4', 'BKD', '1', NULL, NULL, NULL, NULL),
(36, 'ujang', '14', '12-11-2019', '04-12-2019', 'ujang', 'een1', '3211', 'jabatan4', 'BKD', '1', '1', 'BAB_III.pdf', 'jbptunikompp-gdl-muhammadsy-35135-3-unikom_m-i.pdf', '0'),
(37, 'riyan', '237377', '31-10-2019', '04-12-2019', 'riyan', 'een1', '3211', 'jabatan4', 'BKD', '1', NULL, NULL, NULL, NULL),
(38, 'asasasa', 'sasasa', '07-11-2019', '04-12-2019', 'sasa', 'een1', '3211', 'jabatan4', 'BKD', '1', '1', 'BAB_II.pdf', NULL, NULL),
(39, 'zcxczx', '14', '07-11-2019', '05-12-2019', 'daf', 'een1', '3211', 'jabatan4', 'BKD', '1', NULL, NULL, NULL, NULL),
(40, 'adfdsa', '134', '06-11-2019', '05-12-2019', 'asdf', 'een1', '3211', 'jabatan4', 'BKD', '1', NULL, NULL, NULL, NULL),
(41, 'tfgyy', '134', '06-11-2019', '06-12-2019', 'qwewqe', 'een1', '3211', 'jabatan4', 'BKD', '1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `hapus` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `hapus`) VALUES
(5, 'admin', 'admin@gmail.com', 'yandayanda7.jpg', '$2y$10$GQqx57xSYwweXknlxNLiZ.WF5ohSYavlv1elk3g71xmmN6ZmYZeDi', 1, 1, 1568817562, '0'),
(12, 'Admin TU', 'admintu@gmail.com', 'default.jpg', '$2y$10$GQqx57xSYwweXknlxNLiZ.WF5ohSYavlv1elk3g71xmmN6ZmYZeDi', 3, 1, 1569952744, '0'),
(13, 'Admin BKD', 'adminbkd@gmail.com', 'default.jpg', '$2y$10$GQqx57xSYwweXknlxNLiZ.WF5ohSYavlv1elk3g71xmmN6ZmYZeDi', 4, 1, 1569952744, '0'),
(14, 'Admin BKA', 'adminbka@gmail.com', 'default.jpg', '$2y$10$GQqx57xSYwweXknlxNLiZ.WF5ohSYavlv1elk3g71xmmN6ZmYZeDi', 5, 1, 1569952744, '0'),
(15, 'kepala', 'kepala@gmail.com', 'default.jpg', '$2y$10$GQqx57xSYwweXknlxNLiZ.WF5ohSYavlv1elk3g71xmmN6ZmYZeDi', 6, 1, 1569952744, '0'),
(16, 'kurniado', 'kurniado729@gmail.com', 'default.jpg', '$2y$10$eGkesCi6vbfZb5xEarspvOsJilbwDXJX./ok3PIRo.VNbGQb7LVny', 2, 1, 1574694274, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(16, 2, 2),
(38, 1, 14),
(44, 1, 18),
(46, 3, 2),
(50, 3, 17),
(52, 4, 20),
(54, 4, 2),
(57, 5, 2),
(58, 6, 2),
(63, 5, 23),
(64, 6, 19),
(65, 6, 24),
(493, 3, 1),
(494, 4, 1),
(495, 5, 1),
(496, 6, 1),
(497, 11, 2),
(498, 11, 3),
(499, 12, 2),
(504, 3, 66),
(505, 1, 2),
(506, 1, 3),
(507, 1, 1),
(508, 1, 16),
(531, 1, 17),
(532, 1, 19),
(533, 1, 20),
(534, 1, 23),
(535, 1, 24),
(536, 1, 66);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(16, 'Pegawai'),
(17, 'Surat_Masuk'),
(19, 'Surat_Disposisi'),
(20, 'BKD'),
(23, 'BKA'),
(24, 'Surat_Perintah_Tugas'),
(66, 'Kontrol_SPT');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Admin TU'),
(4, 'Admin BKD'),
(5, 'Admin BKA'),
(6, 'Kepala'),
(18, 'aa'),
(19, 'v');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(15, 17, 'Surat Masuk', 'surat_masuk', 'fas fa-fw fa-envelope-open-text', 1),
(16, 17, 'Trash', 'surat_masuk/trash', 'fas fa-fw fa-trash-alt', 1),
(17, 16, 'Pegawai TU', 'pegawai', 'fas fa-fw fa-street-view', 1),
(18, 16, 'Pegawai BKD', 'pegawai/pegawaibkd', 'fas fa-fw fa-male', 1),
(19, 16, 'Pegawai BKA', 'pegawai/pegawaibka', 'fas fa-fw fa-child', 1),
(20, 16, 'Trash', 'pegawai/trash', 'fas fa-fw fa-trash-alt', 1),
(21, 19, 'Persetujuan Disposisi', 'surat_disposisi', 'fas fa-fw fa-user-tie', 1),
(22, 19, 'Disposisi BKD', 'surat_disposisi/disposisibkd', 'fas fa-fw fa-user-tie', 1),
(23, 19, 'History Disposisi BKD', 'surat_disposisi/historydisposisibkd', 'fas fa-fw fa-user-tie', 0),
(27, 19, 'Disposisi BKA', 'surat_disposisi/disposisibka', 'fas fa-fw fa-user-tie', 1),
(29, 19, 'History Disposisi BKA', 'surat_disposisi/historydisposisibka', 'fas fa-fw fa-user-tie', 0),
(30, 20, 'Surat BKD', 'bkd', 'fas fa-fw fa-user-tie', 1),
(33, 20, 'Surat Perintah Tugas', 'bkd/spt', 'fas fa-fw fa-user-tie', 1),
(34, 23, 'Surat BKA', 'bka', 'fas fa-fw fa-user-tie', 1),
(35, 23, 'Surat Perintah Tugas', 'bka/spt', 'fas fa-fw fa-user-tie', 1),
(36, 24, 'Persetujuan SPT BKD', 'surat_perintah_tugas', 'fas fa-fw fa-user-tie', 1),
(37, 24, 'Persetujuan SPT BKA', 'surat_perintah_tugas/sptbka', 'fas fa-fw fa-user-tie', 1),
(38, 28, 'Dashboard', 'admin_tu', 'fas fa-fw fa-user-tie', 1),
(42, 66, 'SPT BKD', 'kontrol_spt', 'fas fa-fw fa-user-tie', 1),
(43, 66, 'SPT BKA', 'kontrol_spt/kontrolsptbka', 'fas fa-fw fa-user-tie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(7, 'kurniado729@gmail.com', 'hIDuD9pM9QIwt0/8F95FlPbbCraHrcvkNkvI6smUuZQ=', 1574694348),
(8, 'admin@gmail.com', 'jbbl9gKzGzQtsBJGbi27TvPBp9VgIdj+af7Je3duRlM=', 1574694400),
(9, 'admin@gmail.com', 'WAfX4sbbEqQKi+EoIbTbwe0+7U41iOIZ14Fge2iCzKM=', 1574694563),
(10, 'kurniado729@gmail.com', 'Zpiylue5Lpovj24bMm5pXcB2mD/KdJavwu/OyUxiOwM=', 1574872167),
(11, 'kurniado729@gmail.com', '0QHju8F87rPEoZz3AJdDgMi850xy1ismZs+hxUl+5C0=', 1575039450),
(12, 'kurniado729@gmail.com', '431m7AbBoqwBuOZYnJmn/5rug816uIOYaG8ogtIgq90=', 1575039720);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `surat_disposisi`
--
ALTER TABLE `surat_disposisi`
  ADD PRIMARY KEY (`id_surat_disposisi`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `surat_spt`
--
ALTER TABLE `surat_spt`
  ADD PRIMARY KEY (`id_surat_spt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `surat_disposisi`
--
ALTER TABLE `surat_disposisi`
  MODIFY `id_surat_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `surat_spt`
--
ALTER TABLE `surat_spt`
  MODIFY `id_surat_spt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=537;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
