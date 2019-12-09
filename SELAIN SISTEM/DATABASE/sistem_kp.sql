-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 07:24 PM
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
(56, '196501011986031002', 'Sudirman ,S.Sos', 'laki-laki', 'pekanbaru', '24-12-2019', 'pekanbaru', 'TU', 'Pengadministrasian Umum', '0'),
(57, '198508052008012003', 'Wessy Agustin', 'perempuan', 'indragiri hilir', '26-12-2019', 'panam', 'TU', 'Bendahara Pengeluaran', '0'),
(58, '196709271993032001', 'Dermi Sitanggang, SH', 'laki-laki', 'indragiri hulu', '15-12-2019', 'sudirman', 'BKD', 'PK Muda', '0'),
(59, '199005282009122001', 'Meila Khatami, SH', 'perempuan', 'pekanbaru', '24-11-2019', 'pekanbaru', 'BKD', 'PK Pertama', '0'),
(60, '198412022009121008', 'Arif Sugianto,SH', 'laki-laki', 'pekanbaru', '25-11-2019', 'panam', 'BKA', 'PK Pertama', '0'),
(61, '198602052015032003', 'Lina Yati Manullang,SH', 'perempuan', 'pekanbaru', '06-12-2019', 'pekanbaru', 'BKA', 'PK Muda', '0');

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
  `file_surat_masuk` varchar(128) NOT NULL,
  `tujuan` enum('BKD','BKA') DEFAULT NULL,
  `file_disposisi_sudah_disetujui` varchar(128) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `status_spt` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_disposisi`
--

INSERT INTO `surat_disposisi` (`id_surat_disposisi`, `pengirim`, `no_surat_masuk`, `tgl_surat_masuk`, `ringkasan`, `file_surat_masuk`, `tujuan`, `file_disposisi_sudah_disetujui`, `status`, `status_spt`) VALUES
(96, 'lapas indragiri hilir', 'W4-PS-12', '27-11-2019', 'penelitian masyarakat an. ilham sauly', 'data_pengawas2.pdf', 'BKD', 'transaksi16.pdf', '1', '1'),
(97, 'lapas indragiri hulu', 'W4.PAS.2', '05-12-2019', 'penelitian masyarakat an. reza purnomo', 'data_pengawas3.pdf', 'BKA', 'data_pengawas1.pdf', '0', '0'),
(98, 'lapas bengkalis', 'W4-PS-121', '28-11-2019', 'penelitian masyarakat an. fauzan', 'data_pengawas5.pdf', 'BKA', 'data_pengawas2.pdf', '1', '1');

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
(114, 'data_pengawas2.pdf', 'lapas indragiri hilir', 'W4-PS-12', '27-11-2019', 'penelitian masyarakat an. ilham sauly', '1', '0'),
(115, 'data_pengawas3.pdf', 'lapas indragiri hulu', 'W4.PAS.2', '05-12-2019', 'penelitian masyarakat an. reza purnomo', '1', '0'),
(116, 'data_pengawas4.pdf', 'lapas bengkalis', 'W4.PAS.1', '05-12-2019', 'peninjauan napi an. riyan setiawan', '0', '0'),
(117, 'transaksi18.pdf', 'lapas indragiri hilir', 'W4.PAS.11', '28-11-2019', 'penelitian masyarakat an. merry', '0', '1'),
(118, 'data_pengawas5.pdf', 'lapas bengkalis', 'W4-PS-121', '28-11-2019', 'penelitian masyarakat an. fauzan', '1', '0');

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
(56, 'lapas indragiri hilir', 'W4-PS-12', '27-11-2019', '16-12-2019', 'penelitian masyarakat an. ilham sauly', 'Meila Khatami, SH', '199005282009122001', 'PK Pertama', 'BKD', '1', '1', 'transaksi7.pdf', NULL, NULL),
(57, 'lapas bengkalis', 'W4-PS-121', '28-11-2019', '12-12-2019', 'penelitian masyarakat an. fauzan', 'Arif Sugianto,SH', '198412022009121008', 'PK Pertama', 'BKA', '1', '1', 'transaksi8.pdf', NULL, NULL);

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
(5, 'admin', 'admin@gmail.com', 'default1.jpg', '$2y$10$GQqx57xSYwweXknlxNLiZ.WF5ohSYavlv1elk3g71xmmN6ZmYZeDi', 1, 1, 1568817562, '0'),
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
(506, 1, 3),
(507, 1, 1),
(508, 1, 16),
(546, 1, 2);

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
(3, 'Admin TU'),
(4, 'Admin BKD'),
(5, 'Admin BKA'),
(6, 'Kepala');

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
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `surat_disposisi`
--
ALTER TABLE `surat_disposisi`
  MODIFY `id_surat_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `surat_spt`
--
ALTER TABLE `surat_spt`
  MODIFY `id_surat_spt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
