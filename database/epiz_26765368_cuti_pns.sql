-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.epizy.com
-- Generation Time: Oct 27, 2020 at 02:34 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26765368_cuti_pns`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `bidang_id` int(255) NOT NULL COMMENT 'Identitas Bidang/Divisi/Bagian',
  `bidang_nama` varchar(255) NOT NULL COMMENT 'Nama Bidang/Divisi/Bagian',
  `bidang_created` datetime NOT NULL COMMENT 'Tanggal Bidang/Divisi/Bagian dibuat'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`bidang_id`, `bidang_nama`, `bidang_created`) VALUES
(1, 'Kepaniteraan', '2020-09-15 02:39:13'),
(2, 'Kesekretariatan', '2020-09-15 02:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `cuti_id` int(255) NOT NULL COMMENT 'Identitas Cuti',
  `cuti_tanggal` varchar(255) NOT NULL COMMENT 'Tanggal Pengajuan Cuti',
  `pegawai_id` int(255) NOT NULL COMMENT 'Identitas Pegawai diambil dari Tabel Pegawai',
  `cuti_nomor` varchar(255) NOT NULL COMMENT 'Nomor Cuti',
  `cuti_jenis` varchar(255) NOT NULL COMMENT 'Jenis Cuti',
  `cuti_alasan` text NOT NULL,
  `cuti_lama` varchar(255) NOT NULL COMMENT 'Lamanya Cuti',
  `cuti_awal` varchar(255) NOT NULL COMMENT 'Tanggal Awal Cuti',
  `cuti_akhir` varchar(255) NOT NULL COMMENT 'Tanggal Akhir Cuti',
  `cuti_alamat` varchar(255) NOT NULL COMMENT 'Alamat Selama Menjalankan Cuti',
  `cuti_no_hp` varchar(255) NOT NULL COMMENT 'No HP yang bisa dihubungi',
  `cuti_atasanlangsung_id` int(255) NOT NULL COMMENT 'Atasan Langsung diambil dari ID Atasan / Pegawai ID',
  `cuti_atasanlangsung_status` enum('Belum dikonfirmasi','Disetujui','Ditolak','Ditangguhkan','Perubahan') NOT NULL COMMENT 'Status Pengajuan cuti dari atasan langsung',
  `cuti_atasanlangsung_deskripsi` varchar(255) DEFAULT NULL COMMENT 'Alasan/Penjelasan Cuti Sesuai status',
  `cuti_pejabat_id` int(255) NOT NULL COMMENT 'ID Pegawai yang berwenang selaku Pejabat Memberi Ijin Cuti yakni User berlevel 1, Ketua dan Wakil Ketua',
  `cuti_pejabat_status` enum('Belum dikonfirmasi','Disetujui','Ditolak','Ditangguhkan','Perubahan') NOT NULL COMMENT 'Status pengajuan cuti dari pejabat',
  `cuti_pejabat_deskripsi` varchar(255) DEFAULT NULL COMMENT 'Alasan/Penjelasan status pengajuan',
  `cuti_created` datetime NOT NULL COMMENT 'Tanggal Dibuat Cuti',
  `cuti_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`cuti_id`, `cuti_tanggal`, `pegawai_id`, `cuti_nomor`, `cuti_jenis`, `cuti_alasan`, `cuti_lama`, `cuti_awal`, `cuti_akhir`, `cuti_alamat`, `cuti_no_hp`, `cuti_atasanlangsung_id`, `cuti_atasanlangsung_status`, `cuti_atasanlangsung_deskripsi`, `cuti_pejabat_id`, `cuti_pejabat_status`, `cuti_pejabat_deskripsi`, `cuti_created`, `cuti_status`) VALUES
(3, '2020-10-13', 15, '1', 'Cuti Tahunan', 'ulin', '2', '2020-10-15', '2020-10-16', 'dsa', '321', 12, 'Disetujui', 'setuju', 5, 'Belum dikonfirmasi', NULL, '2020-10-13 16:32:47', 2),
(4, '2020-10-20', 14, '2', 'Cuti Tahunan', 'dsa', '2', '2020-10-22', '2020-10-23', 'dsa', '32', 11, 'Disetujui', 'a', 5, 'Disetujui', 's', '2020-10-13 21:24:58', 3),
(5, '2020-10-17', 12, '3', 'Cuti Tahunan', 'alasan cuti', '2 hari', '2020-10-17', '2020-10-19', 'alamat cuti', '084197', 9, 'Belum dikonfirmasi', NULL, 5, 'Belum dikonfirmasi', NULL, '2020-10-17 07:29:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cuti_riwayat`
--

CREATE TABLE `cuti_riwayat` (
  `riwayat_cuti_id` int(255) NOT NULL COMMENT 'ID Riwayat Cuti',
  `pegawai_id` int(255) NOT NULL COMMENT 'ID Pegawai diambil dari Tabel Pegawai',
  `riwayat_cuti_tahun` varchar(255) NOT NULL COMMENT 'Tahun Riwayat Cuti',
  `riwayat_cuti_sisa` int(255) NOT NULL COMMENT 'Sisa Hari Cuti pada Tahun ',
  `riwayat_cuti_created` datetime NOT NULL COMMENT 'RIwayat Cuti Dibuat'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti_riwayat`
--

INSERT INTO `cuti_riwayat` (`riwayat_cuti_id`, `pegawai_id`, `riwayat_cuti_tahun`, `riwayat_cuti_sisa`, `riwayat_cuti_created`) VALUES
(1, 5, '2018', 12, '2020-09-18 19:27:54'),
(2, 5, '2019', 12, '2020-09-18 19:27:54'),
(3, 5, '2020', 12, '2020-09-18 19:27:54'),
(4, 10, '2018', 12, '2020-09-21 00:00:00'),
(5, 10, '2019', 12, '2020-09-21 00:00:00'),
(6, 10, '2020', 12, '2020-09-21 00:00:00'),
(7, 10, '2021', 12, '2020-09-21 03:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `golruang`
--

CREATE TABLE `golruang` (
  `golruang_id` int(255) NOT NULL COMMENT 'Identitas Golongan Ruang',
  `golruang_golongan` varchar(255) NOT NULL COMMENT 'Golongan',
  `golruang_ruang` varchar(255) NOT NULL COMMENT 'Ruang',
  `golruang_pangkat` varchar(255) NOT NULL COMMENT 'Pangkat',
  `golruang_created` datetime NOT NULL COMMENT 'Tanggal Golongan Ruang dibuat'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golruang`
--

INSERT INTO `golruang` (`golruang_id`, `golruang_golongan`, `golruang_ruang`, `golruang_pangkat`, `golruang_created`) VALUES
(1, 'I', 'A', 'Juru Muda', '2020-09-14 22:53:14'),
(2, 'I', 'B', 'Juru Muda Tingkat I', '2020-09-14 17:58:53'),
(3, 'I', 'C', 'Juru', '2020-09-14 21:35:21'),
(4, 'I', 'D', 'Juru Tingkat I', '2020-09-14 21:47:13'),
(5, 'II', 'A', 'Pengatur Muda', '2020-09-14 21:47:40'),
(6, 'II', 'B', 'Pengatur Muda Tingkat I', '2020-09-14 21:48:00'),
(7, 'II', 'C', 'Pengatur', '2020-09-14 21:48:19'),
(29, 'III', 'A', 'Penata Muda', '2020-09-15 02:11:27'),
(30, 'III', 'B', 'Penata Muda Tingkat 1', '2020-09-15 02:11:42'),
(34, 'IV', 'B', 'Pembina Tingkat 1', '2020-09-15 02:12:31'),
(33, 'IV', 'A', 'Pembina', '2020-09-15 02:12:22'),
(31, 'III', 'C', 'Penata', '2020-09-15 02:11:50'),
(32, 'III', 'D', 'Penata Tingkat 1', '2020-09-15 02:12:08'),
(28, 'II', 'D', 'Pengatur Tingkat 1', '2020-09-15 02:11:14'),
(35, 'IV', 'C', 'Pembina Utama Muda', '2020-09-15 02:12:40'),
(36, 'IV', 'D', 'Pembina Utama Madya', '2020-09-15 02:12:53'),
(37, 'IV', 'E', 'Pembina Utama', '2020-09-15 02:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `izin_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `izin_tanggal` date NOT NULL,
  `izin_mulai` varchar(20) NOT NULL,
  `izin_selesai` varchar(20) NOT NULL,
  `izin_alasan` text NOT NULL,
  `izin_atasanlangsung_id` int(11) NOT NULL,
  `izin_atasanlangsung_status` enum('Belum dikonfirmasi','Disetujui','Ditolak') NOT NULL,
  `izin_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`izin_id`, `pegawai_id`, `izin_tanggal`, `izin_mulai`, `izin_selesai`, `izin_alasan`, `izin_atasanlangsung_id`, `izin_atasanlangsung_status`, `izin_created`) VALUES
(1, 15, '2020-10-24', '11:00 WITA', '14:00 WITA', 'ab', 12, 'Disetujui', '2020-10-17 02:36:48'),
(2, 12, '2020-10-17', '10.00', '12.00', 'sdasfasga', 9, 'Disetujui', '2020-10-17 07:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(255) NOT NULL COMMENT 'Identitas Jabatan',
  `jabatan_nama` varchar(255) NOT NULL COMMENT 'Nama Jabatan',
  `jabatan_atasanlangsung` varchar(200) NOT NULL,
  `jabatan_created` datetime NOT NULL COMMENT 'Tanggal dan Waktu Jabatan dibuat'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_nama`, `jabatan_atasanlangsung`, `jabatan_created`) VALUES
(1, 'Ketua Pengadilan', '-', '2020-09-14 20:48:17'),
(2, 'Wakil Ketua', '-', '2020-09-14 20:48:17'),
(3, 'Hakim', 'Ketua Pengadilan', '2020-09-14 20:48:17'),
(4, 'Panitera', 'Ketua Pengadilan', '2020-09-14 20:50:01'),
(5, 'Sekretaris', 'Ketua Pengadilan', '2020-09-14 20:50:01'),
(6, 'Panitera Muda', 'Panitera', '2020-09-14 20:48:17'),
(7, 'Kepala Sub Bagian Perencanaan, TI dan Pelaporan', 'Sekretaris', '2020-09-14 20:48:17'),
(8, 'Kepala Sub Bagian Kepegawaian, Organisasi dan Tata Laksana', 'Sekretaris', '2020-09-15 02:34:32'),
(9, 'Kepala Sub Bagian Umum dan Keuangan', 'Sekretaris', '2020-09-14 20:48:17'),
(11, 'Fungsional Kepaniteraan', 'Panitera', '2020-10-12 14:19:15'),
(12, 'Staf Perencanaan, TI dan Pelaporan', 'Kepala Sub Bagian Perencanaan, TI dan Pelaporan', '2020-10-12 14:19:32'),
(13, 'Staf Kepegawaian, Organisasi dan Tata Laksana', 'Kepala Sub Bagian Kepegawaian, Organisasi dan Tata Laksana', '2020-10-12 14:19:51'),
(14, 'Staf Umum dan Keuangan', 'Kepala Sub Bagian Umum dan Keuangan', '2020-10-12 14:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(255) NOT NULL COMMENT 'Identitas Pegawai',
  `pegawai_nip` varchar(255) NOT NULL COMMENT 'Nomor Induk Pegawai (NIP)',
  `pegawai_nama_lengkap` varchar(255) NOT NULL COMMENT 'Nama Lengkap Pegawai',
  `pegawai_tempat_lahir` varchar(255) NOT NULL COMMENT 'Tempat Lahir Pegawai',
  `pegawai_tanggal_lahir` date NOT NULL COMMENT 'Tanggal Lahir Pegawai',
  `golruang_id` int(255) NOT NULL COMMENT 'Golongan Ruang Pegawai',
  `pegawai_masa_kerja` varchar(255) NOT NULL COMMENT 'Masa Kerja Pegawai',
  `bidang_id` int(255) NOT NULL COMMENT 'Bidang Pegawai\r\n',
  `jabatan_id` int(255) NOT NULL COMMENT 'Posisi / Jabatan Pegawai',
  `pegawai_jabatan_detail` varchar(255) NOT NULL COMMENT 'Detail Jabatan Pegawai',
  `pegawai_alamat` varchar(255) NOT NULL COMMENT 'Alamat Pegawai',
  `pegawai_no_telepon` varchar(255) NOT NULL COMMENT 'No Telepon Pegawai',
  `pegawai_foto_profil` text COMMENT 'foto profil pegawai',
  `pegawai_created` datetime NOT NULL COMMENT 'Tanggal dan Waktu Pegawai ditambahkan\r\n '
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nip`, `pegawai_nama_lengkap`, `pegawai_tempat_lahir`, `pegawai_tanggal_lahir`, `golruang_id`, `pegawai_masa_kerja`, `bidang_id`, `jabatan_id`, `pegawai_jabatan_detail`, `pegawai_alamat`, `pegawai_no_telepon`, `pegawai_foto_profil`, `pegawai_created`) VALUES
(1, '1988012902010011001', 'Nama Lengkap, Gelar', 'Tempat Lahir', '1988-01-29', 1, '10 Tahun 2 Bulan', 2, 4, 'Perencanaan TI dan Pelaporan', 'Alamat Pegawai', '08123456789', NULL, '2020-09-14 18:09:20'),
(5, '123123', 'Ramdhan', 'subang', '2020-09-01', 1, '5 Tahun 1 Bulan', 1, 1, 'fsa', 'afsa', '0890231434', 'IMG_20191014_124602_cv.jpg', '2020-09-17 22:39:44'),
(7, '2133243', 'Bagas', 'a', '2020-09-19', 4, '1', 1, 2, '1', '1', '1', NULL, '2020-09-19 03:00:35'),
(8, '1', 'Mudin', '1', '2020-09-19', 7, '1', 1, 3, '1', 's', '1', NULL, '2020-09-19 03:01:04'),
(9, '123', 'arafi', 'q', '2020-09-19', 5, '21', 2, 5, 'sa', 'dsa', '21', NULL, '2020-09-19 03:01:31'),
(10, '123123123123123', 'Muhamad Ramadhan, A.Md.Kom', 'Subang', '1999-01-03', 32, '5 Tahun 3 Bulan', 2, 6, 'abc', 'Jln, Tugu Selatan No. 13 Kab. Subang 41271', '089123123', NULL, '2020-09-21 02:34:52'),
(11, '21343254', 'abdul', 's', '2020-10-13', 7, '3', 2, 7, 'a', 'dsa', '45', NULL, '2020-10-13 00:27:08'),
(12, '4213523', 'cipa', 'a', '2020-10-13', 34, '4', 1, 8, 'fds', 'ds', '32', NULL, '2020-10-13 00:27:48'),
(13, '4325', 'viva', 's', '2020-10-13', 1, '4', 1, 11, 'ds', 'ds', '32', NULL, '2020-10-13 00:28:41'),
(14, '54362', 'Helfira', 'sda', '2020-10-13', 2, '5', 1, 12, 'ds', 'dsa', '32', NULL, '2020-10-13 00:29:09'),
(15, '432265', 'Singgih', 'a', '2020-10-13', 6, '4', 1, 13, 'dsa', 'dsa', '321', NULL, '2020-10-13 00:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `user_id` int(255) NOT NULL COMMENT 'User ID ',
  `pegawai_id` int(11) NOT NULL COMMENT 'Di ambil dari tabel pegawai',
  `user_username` varchar(255) NOT NULL COMMENT 'Username',
  `user_password` varchar(255) NOT NULL COMMENT 'Password',
  `user_level` varchar(255) NOT NULL COMMENT 'Level dari Pengguna',
  `user_created` datetime NOT NULL COMMENT 'Tanggal User Dibuat '
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan Seluruh User yang terdaftar dalam Sistem';

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`user_id`, `pegawai_id`, `user_username`, `user_password`, `user_level`, `user_created`) VALUES
(1, 1, 'panitera', '$2y$10$HQu06LXg3mVfTz/vDHlI7.QcazlYjCcACgT4dUpLFC5KnMUQFLPwa', '1', '2020-09-14 18:11:34'),
(14, 13, 'fungsi', '$2y$10$G.I0iVMZsy3qm6WYWARcseiILoDb5l17o1iPtIBsv86M9x5B/zVZ6', '1', '2020-10-13 00:40:05'),
(10, 8, 'hakim', '$2y$10$Kk5RU3FFuen.xYe4bIb5dOxzl7h1iWDcTzfbOQogXDN3bLq2FgkGS', '1', '2020-09-19 03:01:51'),
(9, 5, 'ketua', '$2y$10$BbMxZkoi5Oav18QyxxETz.tvwCXl87oQu18ImLGIIVkJ00Wh/0wQm', '1', '2020-09-19 01:51:44'),
(12, 7, 'wakil', '$2y$10$YUUKnEZnT65pQyC/SA7iq.9IIzsCB5IgJfz9QU1UBZ4qWdJhTDWye', '1', '2020-09-19 03:02:34'),
(13, 12, 'admin', '$2y$10$JIWRLZvpizc9mFBIXHRS6eg2ESY2u.4sGeIHoCCu/piKsPxeNSaju', '0', '2020-10-13 00:34:59'),
(15, 14, 'staf2', '$2y$10$i11NuK8Yqyl/jqsueM9zB.IDm7e228b5/4HVI6qdQbrcBICc5PMWG', '1', '2020-10-13 00:40:57'),
(16, 10, 'pm', '$2y$10$iOVXTM8T6nQruPLV3cWD6ei/UAFbae3ai3RjRFOSbgQauQtqLmAZe', '1', '2020-10-13 00:41:31'),
(17, 11, 'kasubag2', '$2y$10$kxR3ibm/EWi28Bza8T0lUuKXwXo.GGwOPD3W/Be7VIqz39vJtbsIe', '1', '2020-10-13 00:42:00'),
(18, 9, 'sekretaris', '$2y$10$j1sX9YPgpSvCkYZ4IwlzCu/D0d0g7ljMaitycJASNphq/ABCvWGwO', '1', '2020-10-13 00:43:34'),
(19, 15, 'staf1', '$2y$10$BOzaL1qqZIexbEPGF3po6Oc2D7RjzekQMLlMDo/el9Bs4EDv/Fk2G', '1', '2020-10-13 00:45:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`bidang_id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`cuti_id`);

--
-- Indexes for table `cuti_riwayat`
--
ALTER TABLE `cuti_riwayat`
  ADD PRIMARY KEY (`riwayat_cuti_id`);

--
-- Indexes for table `golruang`
--
ALTER TABLE `golruang`
  ADD PRIMARY KEY (`golruang_id`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`izin_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`,`jabatan_nama`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD UNIQUE KEY `pegawai_nip` (`pegawai_nip`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `bidang_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'Identitas Bidang/Divisi/Bagian', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `cuti_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'Identitas Cuti', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cuti_riwayat`
--
ALTER TABLE `cuti_riwayat`
  MODIFY `riwayat_cuti_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'ID Riwayat Cuti', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `golruang`
--
ALTER TABLE `golruang`
  MODIFY `golruang_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'Identitas Golongan Ruang', AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `izin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'Identitas Jabatan', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'Identitas Pegawai', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'User ID ', AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
