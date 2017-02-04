-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2017 at 03:21 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disposisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dinas`
--

CREATE TABLE `dinas` (
  `id_dinas` int(10) UNSIGNED NOT NULL,
  `nama_dinas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dinas`
--

INSERT INTO `dinas` (`id_dinas`, `nama_dinas`) VALUES
(1, 'Dinas Komunikasi dan Informasi'),
(2, 'Dinas Pariwisata');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(10) UNSIGNED NOT NULL,
  `isi_disposisi` longtext,
  `instruksi_disposisi` varchar(255) DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keamanan` varchar(255) DEFAULT NULL,
  `kecepatan` varchar(255) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT '0',
  `waktu_kirim` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lampiran` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `isi_disposisi`, `instruksi_disposisi`, `tanggal_selesai`, `keamanan`, `kecepatan`, `selesai`, `waktu_kirim`, `lampiran`) VALUES
(2, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'Ditanggapi Tertulis', '2017-01-31', 'Rahasia', 'Biasa', 0, '2017-01-27 10:10:46', NULL),
(3, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'Ditanggapi Tertulis', '2017-01-30', 'Sangat Rahasia', 'Amat Segera', 0, '2017-01-27 10:10:46', NULL),
(4, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'Disiapkan makalah/sambutan/presentasi sesuai tema', '2017-01-31', 'Biasa', 'Biasa', 0, '2017-01-27 10:10:46', NULL),
(5, '<p>Praesent vel nisi non erat ullamcorper accumsan et a quam. Morbi vehicula ipsum eget mi laoreet, et eleifend arcu convallis. Pellentesque faucibus ornare lectus, non dictum urna. Sed vitae enim maximus ligula venenatis efficitur eu eu augue. Cras gravida vitae nunc id sagittis. Mauris pretium elementum bibendum. Phasellus id mattis odio, a lacinia massa. Duis vel augue massa. Ut non lacus lacus. Vestibulum malesuada dui turpis. Ut at vulputate magna.</p><p>Sed nec leo enim. Curabitur ac dolor a tellus mattis suscipit. In hac habitasse platea dictumst. Duis ac odio lobortis, fringilla tellus sed, consectetur metus. Fusce vitae lacus posuere, venenatis mi eget, dapibus ipsum. Nulla eget ipsum placerat, efficitur magna vel, condimentum augue. Sed gravida finibus magna, nec sollicitudin magna ullamcorper quis. Phasellus dapibus placerat felis. Proin in vehicula lorem. Sed vitae ante urna. Phasellus id tincidunt magna, ac sodales mi. Duis sapien ligula, pulvinar sit amet ullamcorper vitae, scelerisque eget libero. Sed sollicitudin a orci non malesuada. Aliquam vitae posuere ex. Phasellus sed turpis ut massa auctor malesuada a quis lacus. Curabitur ullamcorper venenatis purus, eget condimentum dolor dictum nec.</p><p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed fermentum blandit gravida. Curabitur feugiat diam magna, et blandit neque fermentum in. Cras a mollis neque. Proin aliquam nunc a magna placerat iaculis. Praesent ut sapien sit amet neque volutpat pretium. Proin laoreet, ex non commodo tincidunt, sem risus tristique purus, non viverra dolor sapien quis nunc. Mauris aliquet mauris et felis gravida, ac convallis libero iaculis. Morbi sed urna dapibus, varius sapien et, volutpat dolor. Aliquam erat volutpat. Morbi nec urna ac ipsum pellentesque vestibulum vel quis odio. Nulla rhoncus mi id nunc imperdiet finibus. Aliquam fringilla turpis vel imperdiet imperdiet.</p><p>Donec sit amet elit varius, varius lorem id, rhoncus mi. Proin ultricies at dui ut sodales. Sed rhoncus augue tellus, a feugiat tellus suscipit vel. Suspendisse eu tortor quis odio ultricies ultrices rhoncus eu quam. Sed nec aliquam metus, ac semper neque. Mauris ac ipsum in sapien iaculis sagittis. Curabitur tincidunt ultrices lectus, quis suscipit nibh ullamcorper eu. Maecenas ornare, felis nec scelerisque consequat, est mauris molestie massa, non condimentum dolor elit lobortis mauris. Maecenas lobortis lacus sed urna malesuada ultricies. Morbi vulputate dictum tellus, tristique varius ante faucibus eu. Suspendisse iaculis ornare fringilla. Donec condimentum nibh at volutpat egestas. Donec in quam mauris. Nam condimentum metus sit amet mauris viverra congue. Vestibulum quis nisi non mi congue posuere.</p><p>Donec posuere, sapien quis tempor feugiat, nunc lectus mollis eros, at ornare eros ligula sed turpis. Vestibulum ipsum nunc, vehicula in lobortis pulvinar, blandit ut augue. Integer mollis varius leo, sed lobortis risus. Nam interdum blandit eleifend. Nullam dolor ex, rhoncus ut sollicitudin non, iaculis a enim. Suspendisse consequat, nisl vitae hendrerit molestie, lacus augue tincidunt magna, vel eleifend tellus est a nisl. Fusce nec hendrerit eros. Nunc vitae quam quis justo semper semper. In cursus, ligula et feugiat euismod, magna diam tincidunt felis, et mattis ligula urna sed orci. In quis lobortis orci, maximus posuere risus. Cras venenatis in felis bibendum imperdiet. Proin ac imperdiet mauris. Curabitur finibus dictum velit sed venenatis. Cras et sem nisi. Mauris sit amet diam nec metus auctor fringilla vitae sed metus.</p><p><br></p><p>Generated 5 paragraphs, 531 words, 3554 bytes of <a href="http://www.lipsum.com/" title="Lorem Ipsum">Lorem Ipsum</a></p><p><br></p><p><br></p>', 'Koordinasikan dengan', '2017-01-23', 'Rahasia', 'Segera', 0, '2017-01-27 10:10:46', NULL),
(6, '<p>arwerwerwer</p>', 'Diketahui', '2017-02-03', 'Rahasia', 'Segera', 0, '2017-01-29 11:46:58', '[{"file":"588dd63258be2_82533283d92179131d34a2102b0aed71.jpg","judul":"Screenshot_2016-07-21-21-12-44.jpg"},{"file":"588dd6325f0e6_e0a51c1e1649783880dd1c64f441ecca.pdf","judul":"Teknik Pembobotan Dengan Algoritma Savoy.pdf"}]');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Administrator'),
(2, 'Kepala Dinas'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id_pemberitahuan` int(10) UNSIGNED NOT NULL,
  `id_pengguna` int(10) UNSIGNED NOT NULL,
  `pesan` text,
  `waktu` timestamp NULL DEFAULT NULL,
  `dibaca` tinyint(1) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(10) UNSIGNED NOT NULL,
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `id_dinas` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `blokir` tinyint(1) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `disposisi` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_jabatan`, `id_dinas`, `username`, `password`, `blokir`, `nama_lengkap`, `disposisi`) VALUES
(1, 1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'System Administrator', 1),
(3, 2, 2, 'kadispar', '42dbb05752bc916b842ec8ad4377381a', 0, 'Kepala Dinas Pariwisata', 1),
(4, 3, 2, 'staffpar', '0b4298156891acef967e6afb9c345790', 0, 'Staff Pariwisata', NULL),
(5, 3, 2, 'staffpar2', '127341fb9544cedc7d07d663875530f0', 0, 'Staff Pariwisata 2', NULL),
(6, 3, 1, 'staffkominfo', '5d8f2b230bb4386ad1d57b8c6d2d0d32', 0, 'Staff Kominfo', 0),
(7, 2, 1, 'kadiskominfo', '4cf415df65206f9456786bd1f4c518b3', 0, 'Kepala Dinas Komunikasi dan Informasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(10) UNSIGNED NOT NULL,
  `isi_pesan` longtext,
  `waktu_kirim` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `subjek` varchar(255) DEFAULT NULL,
  `lampiran` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `isi_pesan`, `waktu_kirim`, `subjek`, `lampiran`) VALUES
(2, '<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2017-01-26 10:37:49', 'What is lorem ipsum?', NULL),
(4, '<p>test</p>', '2017-01-29 09:21:58', 'test', '[{"file":"588db4364475a_73a22dd46f7afaefcaa6fe92fee1837d.pdf","judul":"IL DIVO LYRICS - Mama.pdf"},{"file":"588db436464b1_f85ade3b58295f1a75f875eb438a10a8.png","judul":"intro.png"}]');

-- --------------------------------------------------------

--
-- Table structure for table `relasi_disposisi`
--

CREATE TABLE `relasi_disposisi` (
  `id_relasi_disposisi` int(10) UNSIGNED NOT NULL,
  `id_disposisi` int(10) UNSIGNED NOT NULL,
  `id_pesan` int(10) UNSIGNED NOT NULL,
  `dari_user` int(10) UNSIGNED DEFAULT NULL,
  `ke_user` int(10) UNSIGNED DEFAULT NULL,
  `dibaca` tinyint(1) DEFAULT '0',
  `kode_disposisi` varchar(255) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT '0',
  `catatan_selesai` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi_disposisi`
--

INSERT INTO `relasi_disposisi` (`id_relasi_disposisi`, `id_disposisi`, `id_pesan`, `dari_user`, `ke_user`, `dibaca`, `kode_disposisi`, `selesai`, `catatan_selesai`) VALUES
(2, 3, 2, 3, 4, 1, '2e286709da496af2c4fdbfc34fa31ffc83eff45b', 1, 'sedang dikerjakan'),
(3, 3, 2, 3, 5, 1, '2e286709da496af2c4fdbfc34fa31ffc83eff45b', 1, 'Kerjaan sudah diselesaikan sesuai prosedur.'),
(4, 4, 2, 3, 4, 1, 'ef88f715455961058a1d36be0e46ad53259daaa4', 0, NULL),
(5, 5, 2, 3, 4, 0, '39d71a8cd011a15b598e8891d17f0ef67420763f', 0, NULL),
(6, 6, 4, 7, 6, 1, '1d674de3361bb9e3c760407c85d4a221224e27d0', 1, 'Lorem ipsum dolor sit amet');

-- --------------------------------------------------------

--
-- Table structure for table `relasi_pesan`
--

CREATE TABLE `relasi_pesan` (
  `id_relasi_pesan` int(10) UNSIGNED NOT NULL,
  `id_pesan` int(10) UNSIGNED NOT NULL,
  `dari_user` int(10) UNSIGNED DEFAULT NULL,
  `ke_user` int(10) UNSIGNED DEFAULT NULL,
  `dibaca` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi_pesan`
--

INSERT INTO `relasi_pesan` (`id_relasi_pesan`, `id_pesan`, `dari_user`, `ke_user`, `dibaca`) VALUES
(2, 2, 1, 3, 1),
(4, 4, 1, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id_pemberitahuan`),
  ADD KEY `pemberitahuan_FKIndex1` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `pengguna_FKIndex1` (`id_dinas`),
  ADD KEY `pengguna_FKIndex2` (`id_jabatan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `relasi_disposisi`
--
ALTER TABLE `relasi_disposisi`
  ADD PRIMARY KEY (`id_relasi_disposisi`),
  ADD KEY `relasi_disposisi_FKIndex1` (`id_pesan`),
  ADD KEY `relasi_disposisi_FKIndex2` (`id_disposisi`);

--
-- Indexes for table `relasi_pesan`
--
ALTER TABLE `relasi_pesan`
  ADD PRIMARY KEY (`id_relasi_pesan`),
  ADD KEY `relasi_pesan_FKIndex1` (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dinas`
--
ALTER TABLE `dinas`
  MODIFY `id_dinas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id_pemberitahuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `relasi_disposisi`
--
ALTER TABLE `relasi_disposisi`
  MODIFY `id_relasi_disposisi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `relasi_pesan`
--
ALTER TABLE `relasi_pesan`
  MODIFY `id_relasi_pesan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD CONSTRAINT `pemberitahuan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_dinas`) REFERENCES `dinas` (`id_dinas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pengguna_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relasi_disposisi`
--
ALTER TABLE `relasi_disposisi`
  ADD CONSTRAINT `relasi_disposisi_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relasi_disposisi_ibfk_2` FOREIGN KEY (`id_disposisi`) REFERENCES `disposisi` (`id_disposisi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relasi_pesan`
--
ALTER TABLE `relasi_pesan`
  ADD CONSTRAINT `relasi_pesan_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
