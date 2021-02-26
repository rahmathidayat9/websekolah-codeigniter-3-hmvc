-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 03:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `our_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_menu`
--

CREATE TABLE `tbl_access_menu` (
  `id_access_menu` tinyint(4) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `menu_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_access_menu`
--

INSERT INTO `tbl_access_menu` (`id_access_menu`, `role_id`, `menu_id`) VALUES
(2, 1, 1),
(14, 3, 3),
(16, 2, 3),
(17, 2, 2),
(23, 1, 3),
(24, 1, 6),
(25, 1, 7),
(26, 1, 8),
(27, 1, 2),
(28, 2, 1),
(29, 3, 1),
(30, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL,
  `agenda_nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `agenda_mulai` varchar(45) NOT NULL,
  `agenda_selesai` varchar(45) NOT NULL,
  `agenda_waktu` varchar(45) NOT NULL,
  `agenda_deskripsi` text NOT NULL,
  `agenda_tempat` varchar(255) NOT NULL,
  `agenda_keterangan` text NOT NULL,
  `agenda_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_balasan`
--

CREATE TABLE `tbl_balasan` (
  `id_balasan` int(11) NOT NULL,
  `balasan_nama` varchar(45) NOT NULL,
  `balasan_isi` text NOT NULL,
  `komentar_id` mediumint(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id_blog` mediumint(9) NOT NULL,
  `blog_slug` varchar(255) NOT NULL,
  `blog_author` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_isi` text NOT NULL,
  `blog_img` varchar(255) NOT NULL,
  `blog_thumb` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_kategori_id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id_blog`, `blog_slug`, `blog_author`, `blog_title`, `blog_isi`, `blog_img`, `blog_thumb`, `created_at`, `blog_kategori_id`, `user_id`) VALUES
(33, 'fakta-unik-muramasa--eromanga-sensei', 'Rahmat User', 'Fakta Unik Muramasa| Eromanga Sensei', '<p>Muramasa senpai atau muramasa adalah seorang gadis novelis Muramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelis.</p>\r\n\r\n<p>Muramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelis</p>\r\n\r\n<p>Muramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelis<img alt=\"smiley\" src=\"http://localhost/our-school/asset/vendor/ckeditor/plugins/smiley/images/regular_smile.png\" xss=removed title=\"smiley\"><img alt=\"smiley\" src=\"http://localhost/our-school/asset/vendor/ckeditor/plugins/smiley/images/regular_smile.png\" xss=removed title=\"smiley\"><img alt=\"wink\" src=\"http://localhost/our-school/asset/vendor/ckeditor/plugins/smiley/images/wink_smile.png\" xss=removed title=\"wink\"></p>\r\n\r\n<p><em><s>Muramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelisMuramasa senpai atau muramasa adalah seorang gadis novelis.</s></em></p>\r\n', 'muramasa.jpg', 'muramasa1.jpg', '2020-07-11 14:53:57', 5, 53),
(34, 'contoh-lorem-ipsum', 'Administrator', 'Contoh Lorem Ipsum', '<p>Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit</p>\r\n\r\n<p>Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit</p>\r\n\r\n<p><u><strong><em>Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit</em></strong></u></p>\r\n', 'PHP-Framework-1140x694.png', 'PHP-Framework-1140x6941.png', '2021-02-26 14:29:55', 5, 51);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` int(11) NOT NULL,
  `file_slug` varchar(255) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_url` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `file_kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` tinyint(4) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `nama_lain_jurusan` varchar(55) NOT NULL,
  `deskripsi_jurusan` text NOT NULL,
  `img_jurusan` varchar(255) NOT NULL,
  `kategori_jurusan_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`, `nama_lain_jurusan`, `deskripsi_jurusan`, `img_jurusan`, `kategori_jurusan_id`) VALUES
(1, 'Teknik Komputer Jaringan', 'TKJ', 'Berfokus pada informatika , khusunya sistem network / jaringan', '282_codeigniter-wallpaper.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_blog`
--

CREATE TABLE `tbl_kategori_blog` (
  `id_kategori_blog` mediumint(9) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_blog`
--

INSERT INTO `tbl_kategori_blog` (`id_kategori_blog`, `nama_kategori`) VALUES
(1, 'Pendidikan'),
(2, 'Sejarah'),
(3, 'Teknologi'),
(4, 'Olahraga'),
(5, 'Hiburan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_file`
--

CREATE TABLE `tbl_kategori_file` (
  `id_kategori_file` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_file`
--

INSERT INTO `tbl_kategori_file` (`id_kategori_file`, `kategori_nama`) VALUES
(1, 'Ebook'),
(2, 'Soure Code'),
(3, 'Template'),
(4, 'Musik'),
(5, 'Dokumen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_jurusan`
--

CREATE TABLE `tbl_kategori_jurusan` (
  `id_kategori_jurusan` tinyint(4) NOT NULL,
  `nama_kategori_jurusan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_jurusan`
--

INSERT INTO `tbl_kategori_jurusan` (`id_kategori_jurusan`, `nama_kategori_jurusan`) VALUES
(1, 'Informatika'),
(2, 'Otomotif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` bigint(20) NOT NULL,
  `blog_id` varchar(25) NOT NULL,
  `komentar_nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `komentar_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `blog_id`, `komentar_nama`, `created_at`, `komentar_isi`) VALUES
(1, '28', 'Darmawan', '2020-07-11 14:31:15', 'sssssssssssss'),
(2, '33', 'ashiaaap', '2020-07-26 02:31:10', 'asahsasojaojsoasas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` tinyint(4) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `menu`) VALUES
(1, 'ADMIN'),
(2, 'GURU'),
(3, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nav_home`
--

CREATE TABLE `tbl_nav_home` (
  `id_nav` tinyint(4) NOT NULL,
  `title` varchar(25) NOT NULL,
  `url` varchar(25) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nav_home`
--

INSERT INTO `tbl_nav_home` (`id_nav`, `title`, `url`, `is_active`) VALUES
(1, 'Home', 'home', 1),
(2, 'About', 'about', 1),
(3, 'Contact', 'contact', 1),
(4, 'Blog', 'blog', 1),
(5, 'Pengumuman', 'pengumuman', 1),
(6, 'Agenda', 'agenda', 1),
(7, 'Download', 'download', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `pengumuman_nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pengumuman_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `pengumuman_nama`, `created_at`, `pengumuman_deskripsi`) VALUES
(1, 'Pembagian Raport Siswa', '2021-02-26 14:26:16', '<p>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit.</p>\r\n\r\n<p><u><strong><em>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit </em></strong></u></p>\r\n\r\n<p>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit </p>\r\n'),
(2, 'Kenaikan Kelas', '2021-02-26 14:27:40', '<p>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit </p>\r\n\r\n<p><em><u>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit v</u></em></p>\r\n\r\n<p>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit </p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(80) NOT NULL,
  `isi` text NOT NULL,
  `status_pesan` tinyint(1) NOT NULL COMMENT '1=read,0=unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` tinyint(4) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` smallint(6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `role_id` smallint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `email`, `password`, `profile_image`, `role_id`, `is_active`, `date_created`) VALUES
(51, 'Administrator', 'admin@example.com', '$2y$10$ueeLDhDQTdTCsnQY2aO/EOrBz58xwpcphenzSn6YGgpuvxQOM24Di', 'sean-lim-NPlv2pkYoUA-unsplash.jpg', 1, 1, '2021-02-26 14:15:54'),
(52, 'Guru Sekolah', 'guru@example.com', '$2y$10$ueeLDhDQTdTCsnQY2aO/EOrBz58xwpcphenzSn6YGgpuvxQOM24Di', 'user.png', 2, 1, '2021-02-26 14:15:59'),
(53, 'Ezio ', 'ezio@example.com', '$2y$10$ueeLDhDQTdTCsnQY2aO/EOrBz58xwpcphenzSn6YGgpuvxQOM24Di', 'user.png', 3, 1, '2021-02-26 14:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id_user_menu` tinyint(4) NOT NULL,
  `user_menu_title` varchar(50) NOT NULL,
  `user_menu_icon` varchar(80) NOT NULL,
  `user_menu_url` varchar(50) NOT NULL,
  `user_menu_is_active` tinyint(1) NOT NULL,
  `menu_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`id_user_menu`, `user_menu_title`, `user_menu_icon`, `user_menu_url`, `user_menu_is_active`, `menu_id`) VALUES
(1, 'Dashboard', 'nav-icon fas fa-tachometer-alt', 'admin', 1, 1),
(2, 'User', 'nav-icon fas fa-users', 'admin/master-user', 1, 1),
(3, 'Jurusan', 'nav-icon fas fa-user-tie', 'admin/master-jurusan', 1, 1),
(4, 'Dashboard Guru', 'nav-icon fas fa-tachometer-alt\r\n', 'guru', 1, 2),
(5, 'Tulis Agenda', 'nav-icon fas fa-info', 'guru/write-agenda', 1, 2),
(6, 'Tulis Blog', 'nav-icon fas fa-book', 'guru/write-blog', 1, 2),
(7, 'Tulis Pengumuman', 'nav-icon fas fa-user-tie', 'guru/write-pengumuman', 1, 2),
(8, 'Edit Profil', 'nav-icon fas fa-user-edit', 'user/edit-profile', 1, 3),
(9, 'Ubah Password', 'nav-icon fas fa-lock', 'user/change-password', 1, 3),
(10, 'Profil Saya', 'nav-icon fas fa-user', 'user', 1, 3),
(12, 'Pesan', 'nav-icon fas fa-envelope', 'admin/master-pesan', 1, 1),
(13, 'Blog', 'nav-icon fas fa-book', 'admin/master-blog', 1, 1),
(14, 'Agenda', 'nav-icon fas fa-calendar', 'admin/master-agenda', 1, 1),
(15, 'Pengumuman', 'nav-icon fas fa-info', 'admin/master-pengumuman', 1, 1),
(16, 'Menu Sidebar', 'nav-icon fas fa-folder', 'admin/master-menu', 1, 1),
(17, 'Komentar', 'nav-icon fas fa-comment', 'admin/master-komentar', 0, 1),
(18, 'Balasan Komentar', 'nav-icon fas fa-reply', 'admin/master-balasan-komentar', 0, 1),
(19, 'Download', 'nav-icon fas fa-download', 'user/download', 0, 3),
(20, 'Hapus Akun Saya', 'nav-icon fa fa-ban', 'user/delete-my-account', 1, 3),
(21, 'File', 'nav-icon fas fa-file', 'admin/master-file', 1, 1),
(22, 'Token', 'nav-icon fas fa-key', 'admin/master-token', 0, 1),
(23, 'Akses Manager', 'nav-icon fa fa-user-secret', 'admin/access-manager', 1, 1),
(24, 'Menu Manager', 'nav-icon fa fa-folder-open', 'admin/menu-manager', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_token`
--

CREATE TABLE `tbl_user_token` (
  `id_user_token` mediumint(9) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  ADD PRIMARY KEY (`id_access_menu`);

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `tbl_balasan`
--
ALTER TABLE `tbl_balasan`
  ADD PRIMARY KEY (`id_balasan`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kategori_blog`
--
ALTER TABLE `tbl_kategori_blog`
  ADD PRIMARY KEY (`id_kategori_blog`);

--
-- Indexes for table `tbl_kategori_file`
--
ALTER TABLE `tbl_kategori_file`
  ADD PRIMARY KEY (`id_kategori_file`);

--
-- Indexes for table `tbl_kategori_jurusan`
--
ALTER TABLE `tbl_kategori_jurusan`
  ADD PRIMARY KEY (`id_kategori_jurusan`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_nav_home`
--
ALTER TABLE `tbl_nav_home`
  ADD PRIMARY KEY (`id_nav`);

--
-- Indexes for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD PRIMARY KEY (`id_user_menu`);

--
-- Indexes for table `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  ADD PRIMARY KEY (`id_user_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  MODIFY `id_access_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_balasan`
--
ALTER TABLE `tbl_balasan`
  MODIFY `id_balasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id_blog` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kategori_blog`
--
ALTER TABLE `tbl_kategori_blog`
  MODIFY `id_kategori_blog` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kategori_file`
--
ALTER TABLE `tbl_kategori_file`
  MODIFY `id_kategori_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kategori_jurusan`
--
ALTER TABLE `tbl_kategori_jurusan`
  MODIFY `id_kategori_jurusan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_nav_home`
--
ALTER TABLE `tbl_nav_home`
  MODIFY `id_nav` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  MODIFY `id_user_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  MODIFY `id_user_token` mediumint(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
