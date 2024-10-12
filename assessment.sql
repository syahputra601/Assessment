-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Agu 2019 pada 06.06
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assessment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `kd_jabatan` varchar(20) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`kd_jabatan`, `tingkat`, `nama_jabatan`) VALUES
('KJA1', 'Ahli', 'Prakom Utama'),
('KJA2', 'Ahli', 'Prakom Madya'),
('KJA3', 'Ahli', 'Prakom Muda'),
('KJA4', 'Ahli', 'Prakom Pertama'),
('KJT1', 'Terampil', 'Prakom Penyelia'),
('KJT2', 'Terampil', 'Prakom Pelaksana Lanjutan'),
('KJT3', 'Terampil', 'Prakom Pelaksana'),
('KJT4', 'Terampil', 'Prakom Pelaksana Pemula');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_angka_kredit`
--

CREATE TABLE IF NOT EXISTS `laporan_angka_kredit` (
`kd_laporan_angkakredit` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_angka_kredit`
--

INSERT INTO `laporan_angka_kredit` (`kd_laporan_angkakredit`, `nip`, `total`) VALUES
(7, '196205221986032001', '125'),
(8, '1231231', '60.00'),
(9, '197808081002122001', '120');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_butir_kegiatan`
--

CREATE TABLE IF NOT EXISTS `master_butir_kegiatan` (
`kd_butirkegiatan` int(11) NOT NULL,
  `kd_subunsur` int(11) NOT NULL,
  `butir_kegiatan` text NOT NULL,
  `angka_kredit` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_butir_kegiatan`
--

INSERT INTO `master_butir_kegiatan` (`kd_butirkegiatan`, `kd_subunsur`, `butir_kegiatan`, `angka_kredit`) VALUES
(1, 1, 'Doktor (S3)', '150,000'),
(2, 1, 'Pasca Sarjana (S2)', '100,000'),
(3, 1, 'Sarjana/Diploma IV', '75,000'),
(4, 2, 'Lamanya Lebih dari 960 Jam', '15,000'),
(5, 2, 'Lamanya antara 641-960 Jam', '9,000'),
(6, 2, 'Lamanya antara 401-640 Jam', '6,000'),
(7, 2, 'Lamanya antara 161-400 Jam', '3,000'),
(8, 2, 'Lamanya antara 81-160 Jam', '2,000'),
(9, 2, 'Lamanya antara 31-80 Jam', '1,000'),
(10, 2, 'Lamanya antara 10-30 Jam', '0,500'),
(11, 3, 'Menelaah spesifikasi teknis komponen sistem komputer', '0,147'),
(12, 3, 'Mengatur alokasi area dalam media komputer', '0,435'),
(13, 3, 'Melakukan instalasi dan atau meningkatkan (Up Grade) sistem komputer', '0,371'),
(14, 3, 'Membuat program paket, untuk pengguna Internasional ', '2,319'),
(15, 3, 'Membuat program paket, untuk pengguna nasional ', '1,160'),
(16, 3, 'Membuat program paket, untuk pengguna antar instansi/lembaga ', '0,580'),
(17, 3, 'Membuat program paket, untuk kalangan sendiri  ', '0,290'),
(18, 3, 'Membuat program paket teknologi internet advanced ', '0,580'),
(19, 3, 'Membuat program paket teknologi internet sederhana ', '0,290'),
(20, 3, 'Melakukan uji coba sistem komputer', '0,380'),
(21, 3, 'Melakukan uji coba program paket untuk pengguna Internasional ', '1,241'),
(22, 3, 'Melakukan uji coba program paket untuk pengguna nasional', '0,414'),
(23, 3, 'Melakukan uji coba program paket untuk pengguna antar instansi/lembaga ', '0,138'),
(24, 3, 'Melakukan uji coba program paket untuk kalangan sendiri', '0,046'),
(25, 3, 'Melakukan uji coba program paket teknologi internet advanced ', '0,138'),
(26, 3, 'Melakukan uji coba program paket teknologi internet sederhana ', '0,046'),
(27, 3, 'Melakukan deteksi dan atau memperbaiki kerusakan sistem komputer dan atau paket program', '0,305'),
(28, 3, 'Membuat petunjuk opera-sional sistem komputer 29 halaman', '0,367'),
(29, 3, 'Membuat petunjuk opera-sional sistem komputer 20 – 29 halaman', '0,246'),
(30, 3, 'Membuat petunjuk opera-sional sistem komputer 10 – 19 halaman', '0,123'),
(31, 3, 'Membuat dokumentasi program paket', '0,305'),
(32, 4, 'Mengimplementasikan rancangan database', '0,652'),
(33, 4, 'Mengatur alokasi area database dan media komputer', '0,347'),
(34, 4, 'Membuat otorisasi akses kepada pemakai', '0,004'),
(35, 4, 'Memantau dan mengevaluasi penggunaan database', '0,186'),
(36, 4, 'Melaksanakan duplikasi database', '0,155'),
(37, 4, 'Melaksanakan perpindahan dari perangkat lunak yang lama ke yang baru', '0,418'),
(38, 4, 'Melakukan pencarian kembali database', '0,154'),
(39, 5, 'Menerapkan rancangan  konfigurasi sistem jaringan komputer', '0,292'),
(40, 5, 'Membuat sistem prosedur oemanfaatan sistem jaringan komputer', '0,223'),
(41, 5, 'Membuat sistem prosedur pemanfaatan sistem jaringan komputer', '0,27'),
(42, 5, 'Melakukan uji coba sistem operasi sistem jaringan komputer', '0,367'),
(43, 5, 'Melakukan monitoring akses', '0,239'),
(44, 5, 'Melakukan perbaikan kerusakan sistem jaringan komputer', '0,189'),
(45, 5, 'Melakukan sistem pencarian kembali sistem jaringan komputer', '0,187'),
(46, 5, 'Membuat laporan kejanggalan (anomali) sistem jaringan komputer', '0,119'),
(47, 5, 'Membuat dokumentasi penggunaan sistem jaringan komputer', '2,803'),
(48, 6, 'Menyusun rencana studi kelayakan pengolahan data', '0,666'),
(49, 6, 'Melaksanakan studi kelayak-an pendahuluan pengolahan data', '0,462'),
(50, 6, 'Melakukan studi kelayakan rinci pengolahan data', '1,077'),
(51, 6, 'Melaksanakan analisis sistem informasi', '2,163'),
(52, 6, 'Merancang pengujian verify-kasi atau validasi analisis sistem informasi', '0,555'),
(53, 6, 'Mengolah dan menganalisa hasil verifikasi atau validasi sistem informasi', '0,570'),
(54, 6, 'Memberikan pengarahan penerapan sistem informasi', '0,270'),
(55, 6, 'Melaksanakanpengintegrasian sistem informasi', '1,105'),
(56, 7, 'Membuat rancangan sistem informasi', '0,686'),
(57, 7, 'Membuat rancangan rinci sistem informasi', '1,229'),
(58, 7, 'Mengembangkan dan atau meremajakan rancangan rinci sistem Informasi', '0,737'),
(59, 7, 'Membuat dokumentasi rincian sistem informasi', '0,047'),
(60, 7, 'Membuat spesifikasi program', '2,515'),
(61, 7, 'Merancang pengujian verifikasi atau validasi program', '0,378'),
(62, 7, 'Melakukan verifikasi spesifikasi program', '1,509'),
(63, 7, 'Mengolah dan menganalisis hasil verifikasi atau validasi program', '0,251'),
(64, 7, 'Membuat algoritma pemrograman', '0,168'),
(65, 7, 'Memeriksa dokumentasi program dan petunjuk pengoperasian program', '0,339'),
(66, 7, 'Mengembangkan dan atau meremajakan program paket untuk pengguna internasional dan telah terbukti digunakan secara internasional', '1,392'),
(67, 7, 'Mengembangkan dan atau meremajakan program paket untuk pengguna nasional dan telah terbukti digunakan secara nasional', '0,696'),
(68, 7, 'Mengembangkan dan atau meremajakan program paket untuk pengguna antar instansi/lembaga pemerintah telah terbukti digunakan', '0,348'),
(69, 7, 'Mengembangkan dan atau meremajakan program paket untuk pengguna di kalangan instansi sendiri dan telah terbukti digunakan', '0,174'),
(70, 7, 'Mengembangkan dan atau meremajakan program paket teknologi internet advanced ', '0,348'),
(71, 7, 'Mengembangkan dan atau meremajakan program paket teknologi internet sederhana ', '0,174'),
(72, 8, 'Menyusun studi kelayakan sistem komputer ', '0,792'),
(73, 8, 'Membuat spesifikasi teknis sistem komputer ', '0,565'),
(74, 8, 'Merancang sistem komputer', '0,769'),
(75, 8, 'Mengoptimalkan kinerja sistem komputer', '0,244'),
(76, 9, 'Merancang sistem database', '1,349'),
(77, 9, 'Melakukan instalasi program database manajemen sistem (DBMS)', '0,288'),
(78, 9, 'Membuat prosedur pengamanan database', '0,526'),
(79, 9, 'Merancang otorisasi akses kepada pemakai', '0,764'),
(80, 9, 'Melakukan uji coba perangkat lunak baru dan memberikan saran-saran penggunaannya', '0,801'),
(81, 9, 'Mengembangkan sistem database', '0,747'),
(82, 9, 'Membuat dokumentasi rancangan database', '0,376'),
(83, 10, '1.	Merancang sistem jaringan komputer	Rancangan	0,760', ''),
(84, 10, 'Merancang prosedur pengamanan sistem jaringan komputer di akses dari luar\r\n', '0,901'),
(85, 10, 'Merancang prosedur pengamanan sistem jaringan komputer, tidak dapat di akses dari luar', '0,675'),
(86, 10, 'Merancang prosedur pengamanan sistem jaringan komputer, memiliki simpul di atas 50', '0,450'),
(87, 10, 'Merancang prosedur pengamanan sistem jaringan komputer. Simpul 10 – 50', '0,225'),
(88, 10, 'Merancang pengembangan sistem jaringan komputer\r\n', '0,901'),
(89, 11, 'Melakukan diskusi dalam rangka integrasi sistem informasi keseluruhan', '0,960'),
(90, 11, 'Mengidentifikasi kebutuhan pemakai dalam hal output, data, dan kinerja program', '1,891'),
(91, 11, 'Membuat spesifikasi peralatan teknologi informasi yang diperlukan', '1,684'),
(92, 11, 'Membuat rancangan sistem informasi keseluruhan', '8,930'),
(101, 12, 'Melaksanakan studi lengkap terhadap organisasi dan lingkungan organisasi dalam rangka menentukan kebu-tuhan organisasi terhadap informasi', '13,003'),
(102, 12, 'Menyusun rencana induk sistem informasi keseluruhan (master plan)', '11,483'),
(103, 12, 'Merintis revitalisasi rencana induk sistem informasi sesuai dengan kemajuan teknologi/organisasi', '7,343'),
(104, 12, 'Merumuskan rencana integrasi sistem informasi keseluruhan', '1,350'),
(111, 13, 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei dan atau evaluasi di bidang teknologi informasi yang tidak dipublikasikan: Dalam bentuk buku\r\n', '8,000'),
(112, 13, 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei dan atau evaluasi di bidang teknologi informasi yang tidak dipublikasikan: Dalam bentuk makalah', '4,000'),
(117, 13, 'Membuat karya tulis/karya ilmiah populer di bidang teknologi informasi yang disebarluaskan melalui media masa', '2,500'),
(118, 13, 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang teknologi informasi yang disampaikan dalam pertemuan ilmiah', '2,500'),
(119, 14, 'Menyusun petunjuk teknis pelaksanaan pengelolaan kegiatan teknologi informasi', '3,000'),
(123, 15, 'Menerjemahan/menyadur di bidang teknologi informasi yang tidak dipublikasikan', '7,000'),
(124, 15, 'Menerjemahan/menyadur di bidang teknologi informasi yang tidak dipublikasikan:	Dalam bentuk buku', '3,500'),
(125, 15, 'Menerjemahan/menyadur di bidang teknologi informasi yang tidak dipublikasikan:	Dalam bentuk makalah\r\n', '1,500'),
(126, 15, 'Membuat abstrak tulisan ilmiah yangdimuat dalam majalah ilmiah	', '1,000'),
(127, 16, 'Mengajar atau melatih bidang teknologi informasi pada unit - unit organisasi pemerintah', '0,030'),
(128, 17, 'Mengikuti seminar/ lokakarya/ Konferensi Sebagai	Pemrasaran \r\n', '3,000'),
(129, 17, 'Mengikuti seminar/ lokakarya/ Konferensi Sebagai	Moderator/pembahas/ nara sumber ', '2,000'),
(130, 17, 'Mengikuti seminar/ lokakarya/ Konferensi Sebagai Peserta	\r\n', '1,000'),
(131, 18, 'Menjadi anggota Tim Penilai Angka Kredit Jabatan Fungsional Pranata Komputer secara aktif\r\n', '0,500'),
(132, 19, 'Menjadi anggota organisasi profesi di tingkat nasional/ internasional sebagai Pengurus aktif', '1,000'),
(133, 19, 'Menjadi anggota organisasi profesi di tingkat nasional/ internasional sebagaiAnggota aktif\r\n', '0,500'),
(134, 20, 'Memperoleh penghargaan/ tanda jasa Satya Lencana Karya: Tiga puluh tahun	Piagam', '3,000'),
(135, 20, 'Memperoleh penghargaan/ tanda jasa Satya Lencana Karya Satya: Dua puluh tahun', '2,000'),
(136, 20, 'Memperoleh penghargaan/ tanda jasa Satya Lencana Karya Satya: Sepuluh tahun', '1,000'),
(137, 21, 'Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas: Doktor (S3)', '15,000'),
(138, 21, 'Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas: Pasca Sarjana (S2)', '10,000'),
(139, 21, 'Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas: Sarjana (S1)\r\n', '5,000'),
(140, 22, 'Diploma III', '60,000'),
(141, 22, 'Diploma II\r\n', '40,000'),
(142, 22, 'SLTA/Diploma I\r\n', '25,000'),
(143, 23, 'Lamanya lebih dari 960 jam', '15,000'),
(144, 23, 'Lamanya antara 641-960 jam', '9,000'),
(145, 23, 'Lamanya antara 401-640 jam', '6,000'),
(146, 23, 'Lamanya antara 161-400 jam', '3,000'),
(147, 23, 'Lamanya antara 81-160 jam', '2,000'),
(148, 23, 'Lamanya antara 31-80 jam', '1,000'),
(149, 23, 'Lamanya antara 10-30 jam', '0,500'),
(150, 24, 'Melakukan penggandaan data dan atau program', '0,013'),
(151, 24, 'Membuat laporan operasi komputer', '0,013'),
(152, 24, 'Membuat dokumentasi file yang tersimpan dalam media komputer', '0,048'),
(153, 25, 'Melakukan perekaman data tanpa validasi	', '0,001'),
(154, 25, 'Melakukan perekaman data dengan validasi', '0.004'),
(155, 25, 'Melakukan verifikasi perekaman data', '0,001'),
(156, 25, 'Melakukan dijitasi data spasial', '0,031'),
(157, 25, 'Melakukan editing data spasial', '0,017'),
(158, 25, 'Melakukan verifikasi data spasial\r\n', '0,060'),
(159, 25, 'Membuat laporan hasil perekaman data', '0,053'),
(160, 26, 'Melakukan pemasangan peralatan sistem komputer / sistem jaringan komputer', '0,004'),
(161, 26, 'Melakukan deteksi dan atau memperbaiki kerusakan sistem komputer', '0,006'),
(162, 26, 'Melakukan deteksi dan atau memperbaiki kerusakan sistem jaringan komputer', '0,006'),
(163, 27, 'Membuat program dasar', '0,081'),
(164, 27, 'Program berbasis Markup Language', '0,020'),
(165, 27, 'Mengembangkan dan atau meremajakan program dasar', '0,048'),
(166, 27, 'Membuat data uji coba untuk program dasar', '0,007'),
(167, 27, 'Melaksanakan uji coba pro-gram dasar', '0,012'),
(168, 27, 'Membuat petunjuk peng-operasian program dasar:	> 29 halaman', '0,247'),
(169, 27, 'Membuat petunjuk peng-operasian program dasar:	20 – 29 halaman	Buku', '0,124'),
(170, 27, 'Membuat petunjuk peng-operasian program dasar:	10 – 19 halaman	Buku\r\n', '0,062'),
(171, 27, 'Menyusun dokumentasi program dasar', '0,025'),
(172, 28, 'Membuat program menengah', '0,151'),
(173, 28, 'Mengembangkan dan atau meremajakan program menengah', '0,090'),
(174, 28, 'Membuat data uji coba untuk program menengah', '0,042'),
(175, 28, 'Melaksanakan uji coba pro-gram menengah', '0,022'),
(176, 28, 'Membuat petunjuk peng-operasian program menengah: > 29 halaman', '0,461'),
(177, 28, 'Membuat petunjuk peng-operasian program menengah: 20 – 29 halaman\r\n', '0,231'),
(178, 28, 'Membuat petunjuk peng-operasian program menengah : 10 – 19 halaman', '0,115'),
(179, 28, 'Menyusun dokumentasi program menengah', '0,042'),
(180, 29, 'Membuat program lanjutan', '0,259'),
(181, 29, 'Mengembangkan dan atau meremajakan program lanjutan', '0,132'),
(182, 29, 'Membuat data uji coba untuk program lanjutan', '0,074'),
(183, 29, 'Melaksanakan uji coba pro-gram lanjutan', '0,038'),
(184, 29, 'Membuat petunjuk peng-operasian program lanjutan: > 29 halaman', '0,476'),
(185, 29, 'Membuat petunjuk peng-operasian program lanjutan: 20 – 29 halaman', '0,238'),
(186, 29, 'Membuat petunjuk peng-operasian program lanjutan: 10 – 19 halaman', '0,238'),
(187, 29, 'Menyusun dokumentasi program lanjutan', '0,042'),
(188, 30, 'Membuat rencana rinci pemeliharaan komputer dan peralatannya', '0,112'),
(189, 30, 'Melakukan instalasi dan atau  meningkatkan (up grade) sistem operasi komputer/ perangkat lunak/sistem jaringan komputer', '0,500'),
(190, 30, 'Membuat sistem prosedur operasi komputer', '0,318'),
(191, 30, 'Melakukan uji coba sistem operasi komputer', '0,126'),
(192, 30, 'Melakukan deteksi dan atau memperbaiki kerusakan sistem operasi komputer', '0,125'),
(193, 30, 'Melakukan perbaikan terhadap gangguan sistem operasi komputer', '0,063'),
(194, 30, 'Membuat dokumentasi pengelolaan komputer', '0,264'),
(195, 31, 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian yang dipublikasikan dalam bentuk buku yang diterbitkan dan diedarkan secara nasional', '12,500'),
(196, 31, 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian yang dipublikasikan dalam majalah ilmiah yang diakui oleh LIPI', '6,000'),
(201, 31, 'Karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang teknologi informasi yang tidak dipublikasikan dalam bentuk buku', '7,000'),
(202, 31, 'Karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang teknologi informasi yang tidak dipublikasikan dalam bentuk makalah', '3,500'),
(203, 31, 'Membuat karya tulis/karya ilmiah populer di bidang teknologi informasi yang disebarluaskan melalui media masa', '2,500'),
(204, 31, 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah hasil gagasan sendiri di bidang teknologi informasi yang disampaikan dalam pertemuan ilmiah', '2,500'),
(205, 32, 'Menyusun petunjuk teknis pelaksanaan pengelolaan kegiatan teknologi informasi', '3,000'),
(208, 33, 'Menerjemahan/menyadur di bidang teknologi informasi yang tidak dipublikasikan dalam bentuk buku', '3,500'),
(209, 33, 'Menerjemahan/menyadur di bidang teknologi informasi yang tidak dipublikasikan dalam bentuk makalah', '1,500'),
(210, 33, 'Membuat abstrak tulisan ilmiah yang dimuat dalam majalah ilmiah', '1,000'),
(211, 34, 'Mengajar atau melatih bidang teknologi informasi pada unit-unit organisasi pemerintah', '0,030'),
(212, 35, 'Mengikuti seminar/ lokakarya/Konferensi Sebagai	Pemrasaran', '3,000'),
(213, 35, 'Mengikuti seminar/ lokakarya/Konferensi Sebagai Moderator/pembahas/ nara sumber', '2,000'),
(214, 35, 'Mengikuti seminar/ lokakarya/Konferensi Sebagai Peserta', '1,000'),
(215, 36, 'Menjadi anggota Tim Penilai Angka Kredit Jabatan Fungsional Pranata Komputer secara aktif', '0,500'),
(216, 37, 'Menjadi anggota organisasi profesi di tingkat nasional/ internasional sebagai Pengurus aktif', '1,000'),
(217, 37, 'Menjadi anggota organisasi profesi di tingkat nasional/ internasional sebagai Anggota aktif', '0,500'),
(218, 38, 'Memperoleh penghargaan/ tanda jasa Satya Lencana Karya Satya', '3,000'),
(219, 38, 'Memperoleh penghargaan/ tanda jasa Satya Lencana Karya Satya 30 (tiga puluh tahun)', '3,000'),
(220, 38, 'Memperoleh penghargaan/ tanda jasa Satya Lencana Karya Satya 20 (dua puluh tahun)', '2,000'),
(221, 38, 'Memperoleh penghargaan/ tanda jasa Satya Lencana Karya Satya 10 (sepuluh tahun)', '1,000'),
(222, 39, 'Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas Sarjana/D-IV', '5,000'),
(223, 39, 'Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas Diploma III (D-III)', '3,000'),
(224, 39, 'Memperoleh gelar kesarjanaan lainnya yang tidak sesuai dengan bidang tugas Diploma II (D-II)', '2,000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pranata`
--

CREATE TABLE IF NOT EXISTS `master_pranata` (
`id` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `periode1` int(20) DEFAULT NULL,
  `periode2` int(20) DEFAULT NULL,
  `unsur` varchar(50) DEFAULT NULL,
  `sub_unsur` varchar(100) DEFAULT NULL,
  `total` varchar(65) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pranata`
--

INSERT INTO `master_pranata` (`id`, `nip`, `tahun`, `periode1`, `periode2`, `unsur`, `sub_unsur`, `total`) VALUES
(6, '196208041986031001', NULL, NULL, 0, NULL, NULL, ''),
(7, '196208041986031001', 2018, NULL, NULL, NULL, NULL, ''),
(8, '196208041986031001', 2016, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pranatas`
--

CREATE TABLE IF NOT EXISTS `master_pranatas` (
`id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `unsur` text NOT NULL,
  `sub_unsur` text NOT NULL,
  `butir_kegiatan` text NOT NULL,
  `angka_kredit` varchar(50) NOT NULL,
  `sertifikat` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pranatas`
--

INSERT INTO `master_pranatas` (`id`, `nip`, `tahun`, `tingkat`, `unsur`, `sub_unsur`, `butir_kegiatan`, `angka_kredit`, `sertifikat`) VALUES
(7, '196205221986032001', 2020, 'Ahli', 'PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Ijazah / Gelar', 'Diploma III', '60,00', 'On Progress'),
(9, '196205221986032001', 2020, 'Ahli', 'PENDIDIKAN', 'Pendidikan dan Pelatihan Fungsional di Bidang Kepranataan Komputer dan Memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan', 'Lamanya antara 641-960 Jam', '9,00', 'On Progress'),
(10, '196205221986032001', 2016, 'Ahli', 'PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Ijazah / Gelar', 'Diploma III', '60,00', 'On Progress'),
(25, '196205221986032001', 2016, 'Ahli', 'PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Ijazah / Gelar', 'SLTA/Diploma I', '25,00', 'Pemodelan_proses_bisnis_modul_101.pdf'),
(26, '196205221986032001', 2017, 'Ahli', 'PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Ijazah / Gelar', 'Diploma II', '40,00', 'Pemodelan_proses_bisnis_modul_102.pdf'),
(27, '196205221986032001', 2018, 'Ahli', 'PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Ijazah / Gelar', 'Diploma III', '60,00', 'Pemodelan_proses_bisnis_modul_103.pdf'),
(30, '197808081002122001', 2016, 'Ahli', 'PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Ijazah / Gelar', 'Diploma III', '60,00', 'Pemodelan_proses_bisnis_modul_107.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_subunsur`
--

CREATE TABLE IF NOT EXISTS `master_subunsur` (
`kd_subunsur` int(11) NOT NULL,
  `kd_unsur` int(11) NOT NULL,
  `sub_unsur` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_subunsur`
--

INSERT INTO `master_subunsur` (`kd_subunsur`, `kd_unsur`, `sub_unsur`) VALUES
(1, 1, 'Pendidikan Sekolah dan Memperoleh Ijazah/Gelar'),
(2, 1, 'Pendidikan dan Pelatihan Fungsional di Bidang Kepranataan Komputer dan Memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan'),
(3, 3, 'Implementasi Sistem Komputer dan Program Paket'),
(4, 3, 'Implementasi Database'),
(5, 3, 'Implementasi Sistem Jaringan komputer'),
(6, 4, 'Analisis Sistem Informasi'),
(7, 4, 'Perancangan Sistem Informasi'),
(8, 4, 'Perancangan Sistem Komputer'),
(9, 4, 'Perancangan dan Pengembangan Database'),
(10, 4, 'Perancangan Sistem Jaringan Komputer'),
(11, 5, 'Perencanaan dan Pengembangan Sistem Informasi'),
(12, 5, 'Perumusan Visi, Misi, dan Strategi Informasi'),
(13, 6, 'Pembuatan Karya Tulis/Karya Ilmiah di Bidang Teknologi Informasi'),
(14, 6, 'Penyusunan Petunjuk Teknis Pelaksanaan Pengelolaan Kegiatan Teknologi Informasi '),
(15, 6, 'Penerjemahan/Penyaduran Buku dan Bahan-bahan Lain di Bidang Teknologi Informasi'),
(16, 7, 'Pengajar/Pelatih di Bidang Teknologi Informasi'),
(17, 7, 'Peran Serta Dalam Seminar/Lokakarya/Konferensi'),
(18, 7, 'Keanggotaan dalam Tim Penilai Angka Kredit Jabatan Fungsional Pranata Komputer'),
(19, 7, 'Keanggotaan dalam Organisasi Profesi'),
(20, 7, 'Perolehan Piagam Kehormatan'),
(21, 7, 'Perolehan Gelar Kesarjanaan Lainnya'),
(22, 2, 'Pendidikan Sekolah dan Memperoleh Ijazah/Gelar'),
(23, 2, 'Pendidikan dan Pelatihan Fungsional di Bidang Kepranataan Komputer dan Memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan'),
(24, 8, 'Pengoperasian Komputer'),
(25, 8, 'Perekaman Data'),
(26, 8, 'Pemasangan dan Pemeliharaan Sistem Komputer dan Sistem Jaringan Komputer'),
(27, 9, 'Pemrograman Dasar'),
(28, 9, 'Pemrograman Menengah'),
(29, 9, 'Pemrograman Lanjutan'),
(30, 9, 'Penerapan  Sistem Operasi Komputer'),
(31, 10, 'Pembuatan Karya Tulis/Karya Ilmiah di Bidang Teknologi Informasi'),
(32, 10, 'Penyusunan Petunjuk Teknis Pelaksanaan Pengelolaan Kegiatan Teknologi Informasi'),
(33, 10, 'Penerjemahan/Penyaduran Buku dan Bahan-bahan Lain di Bidang Teknologi Informasi'),
(34, 11, 'Pengajar/Pelatih di Bidang Teknologi Informasi'),
(35, 11, 'Peran Serta Dalam Seminar/Lokakarya/Konferensi'),
(36, 11, 'Keanggotaan dalam Tim Penilai Angka Kredit Jabatan Fungsional Pranata Komputer'),
(37, 11, 'Keanggotaan dalam Organisasi Profesi'),
(38, 11, 'Perolehan Piagam Kehormatan'),
(39, 11, 'Perolehan Gelar Kesarjanaan Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_unsur`
--

CREATE TABLE IF NOT EXISTS `master_unsur` (
`kd_unsur` int(11) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `unsur` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_unsur`
--

INSERT INTO `master_unsur` (`kd_unsur`, `tingkat`, `unsur`) VALUES
(1, 'Ahli', 'Pendidikan'),
(2, 'Terampil', 'Pendidikan'),
(3, 'Ahli', 'Implementasi Sitem Informasi'),
(4, 'Ahli', 'Analisis Dan Perancangan Sistem Informasi'),
(5, 'Ahli', 'Penyusunan Kebijaksanaan Sistem Informasi'),
(6, 'Ahli', 'Pengembangan Profesi'),
(7, 'Ahli', 'Pendukung Kegiatan Pranata Komputer'),
(8, 'Terampil', 'Operasi Teknologi Informasi'),
(9, 'Terampil', 'Implementasi Teknologi Informasi'),
(10, 'Terampil', 'Pengembangan Profesi'),
(11, 'Terampil', 'Pendukung Kegiatan Pranata Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`menu_id` int(11) NOT NULL,
  `menu_name` varchar(200) DEFAULT NULL,
  `menu_icon` varchar(100) DEFAULT NULL,
  `menu_info` varchar(1000) DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `menu_link` varchar(200) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `enabled` char(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_icon`, `menu_info`, `menu_parent_id`, `menu_link`, `menu_order`, `enabled`) VALUES
(1, 'Tabel Referensi', 'icon-diamond', 'menus', 0, '', 1, 'Y'),
(2, 'Master Pranata', 'icon-puzzle', 'master pranata', 0, '', 2, 'Y'),
(3, 'Laporan', 'icon-list', 'laporan', 0, 'javascript:;', 3, 'Y'),
(4, 'Utility', 'icon-wrench', 'utility', 0, 'javascript:;', 4, 'N'),
(5, 'Angka Kredit', '', 'C_angka_kredit', 2, 'C_angka_kredit', 2, 'Y'),
(6, 'Data Personil', '', 'data personil', 3, 'C_laporan/rekap_personil', 3, 'Y'),
(7, 'Rekap Pranata', '', 'C_laporan/rekap_pranata', 3, 'C_laporan/rekap_pranata', 3, 'N'),
(9, 'Tabel Personil', '', 'C_personil', 1, 'C_personil', 1, 'Y'),
(10, 'Tabel Jabatan', '', 'C_jabatan', 1, 'C_jabatan', 1, 'Y'),
(11, 'Tabel Pangkat', '', 'C_pangkat', 1, 'C_pangkat', 1, 'Y'),
(12, 'Back Up Data', 'unit', '', 4, '', 4, 'Y'),
(13, 'Restore Data aja', 'unit', '', 4, '', 4, 'Y'),
(14, 'Data Angka Kredit', NULL, 'data angka kredit', 3, 'C_laporan/rekap_angka_kredit', 3, 'Y'),
(15, 'Manajemen user', NULL, 'Manajemen User', 0, 'User', 5, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkat`
--

CREATE TABLE IF NOT EXISTS `pangkat` (
  `kd_pangkat` varchar(20) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `nama_pangkat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pangkat`
--

INSERT INTO `pangkat` (`kd_pangkat`, `golongan`, `nama_pangkat`) VALUES
('11', 'I/a', 'Juru Muda'),
('12', 'I/b', 'Juru Muda Tk.I'),
('13', 'I/c', 'Juru'),
('14', 'I/d', 'Juru Tingkat I'),
('21', 'II/a', 'Pengatur Muda'),
('22', 'II/b', 'Pengatur Muda Tk.I'),
('23', 'II/c', 'Pengatur'),
('24', 'II/d', 'Pengatur Tk.I'),
('31', 'III/a', 'Penata Muda'),
('32', 'III/b', 'Penata Muda Tk.I'),
('33', 'III/c', 'Penata'),
('34', 'III/d', 'Penata Tk.I'),
('41', 'IV/a', 'Pembina'),
('42', 'IV/b', 'Pembina Tk.I'),
('43', 'IV/c', 'Pembina Utama Muda'),
('44', 'IV/d', 'Pembina Utama Madya'),
('45', 'IV/e', 'Pembina Utama ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personil`
--

CREATE TABLE IF NOT EXISTS `personil` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kd_jabatan` varchar(20) NOT NULL,
  `kd_pangkat` varchar(20) NOT NULL,
  `bidang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `personil`
--

INSERT INTO `personil` (`nip`, `nama`, `tgl_lahir`, `kd_jabatan`, `kd_pangkat`, `bidang`) VALUES
('196205221986032001', 'Hetty Mainar', '1962-05-22', 'KJT1', '34', 'Pranata'),
('196208041986031001', 'M. Yasin', '1962-08-04', 'KJT1', '34', 'Pranata'),
('196211221987031001', 'Mujo Sularso', '1962-11-22', 'KJT1', '34', 'Pranata'),
('196304081988041001', 'Maryanto', '1963-04-08', 'KJT1', '34', 'Pranata'),
('196306031986032001', 'Riyanti', '1963-06-03', 'KJT1', '34', 'Bangsis'),
('196308071986031001', 'Agus Salim', '1963-08-07', 'KJT1', '34', 'Bangsis'),
('196508051989032001', 'Ani Agustina B', '1965-08-05', 'KJT1', '34', 'Bangsis'),
('197006051990031001', 'Firdaus Syafri,S.kom.', '1970-06-06', 'KJA3', '34', 'Bagian TU'),
('197011111991032001', 'Susilowati,S.I.P.', '1970-11-11', 'KJA3', '33', 'Pranata'),
('197607292002121001', 'Irfan Mountini, S.Kom', '1976-07-29', 'KJA3', '34', 'Bangsis'),
('197808081002122001', 'Dwi Utami', '1978-08-08', 'KJT2', '32', 'Pranata'),
('197901252003121001', 'Zulkifli Ali Riza, S.E.', '1979-01-25', 'KJT3', '24', 'Pranata'),
('198008312003122001', 'Thia Karmila', '1980-08-31', 'KJT2', '32', 'Pranata'),
('198102082006041001', 'Eko Yuniard S', '1981-02-08', 'KJT3', '24', 'Pranata'),
('198601102010121007', 'Eko Januardi, S.Kom.', '1986-01-10', 'KJA4', '32', 'Pranata'),
('198605172006042001', 'Meilinda Puji Pamungkas,S.Kom.', '1986-05-17', 'KJA4', '31', 'Bagian TU'),
('198708132010122001', 'Purry Diyah Agustin, Skom.,M.A.P.', '1987-08-13', 'KJA4', '32', 'Bangsis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
`iduser` int(11) NOT NULL,
  `user_name` varchar(10) DEFAULT NULL,
  `user_password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tusergroup`
--

CREATE TABLE IF NOT EXISTS `tusergroup` (
`autono` int(11) NOT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `description` text,
  `ordering` int(11) DEFAULT NULL,
  `enabled` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tusergroup`
--

INSERT INTO `tusergroup` (`autono`, `group_name`, `description`, `ordering`, `enabled`) VALUES
(1, 'Administrator', '', 1, 'Y'),
(2, 'Medis', '', 2, 'Y'),
(3, 'operator', 'operator', 3, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tusermenu`
--

CREATE TABLE IF NOT EXISTS `tusermenu` (
`usermenu_id` int(11) NOT NULL,
  `grup_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` int(11) NOT NULL,
  `permission_r` char(1) NOT NULL DEFAULT '0',
  `permission_w` char(1) NOT NULL DEFAULT '0',
  `permission_d` char(1) NOT NULL DEFAULT '0',
  `permission_a` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tusermenu`
--

INSERT INTO `tusermenu` (`usermenu_id`, `grup_id`, `user_id`, `menu_id`, `permission_r`, `permission_w`, `permission_d`, `permission_a`) VALUES
(1, 2, 0, 1, '0', '0', '0', '0'),
(2, 2, 0, 2, '0', '0', '0', '0'),
(5, 2, 0, 5, '0', '0', '0', '0'),
(6, 2, 0, 6, '0', '0', '0', '0'),
(7, 2, 0, 7, '0', '0', '0', '0'),
(9, 3, 0, 1, '1', '1', '1', '0'),
(10, 3, 0, 5, '1', '1', '1', '0'),
(11, 3, 0, 2, '1', '1', '1', '0'),
(12, 3, 0, 6, '1', '1', '1', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_password` varchar(32) DEFAULT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  `unit_id` varchar(15) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `profpict` varchar(100) DEFAULT 'M.jpg',
  `gender` enum('M','F') DEFAULT NULL,
  `createddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `notelp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `nip`, `user_name`, `user_fullname`, `user_password`, `role_id`, `unit_id`, `active`, `profpict`, `gender`, `createddate`, `notelp`, `alamat`, `email`, `created_id`) VALUES
(9, '197808081002122001', 'ocha', 'susilowati', '2ea4dce70aecd3a50945105a01aa2cba', '3', '1010001', 1, '', 'F', '2017-08-07 07:22:02', '08161831624', 'Pondok Labu', 'susi@kemhan.go.id', NULL),
(11, '198605172006042001', 'dwi', 'utami', 'ef9943e09ce2ae5f36761abb975e383f', '3', '1090001', 1, '', 'F', '2017-08-16 05:00:29', '0816777111', 'Pondok Labu', 'dwi.utami@kemhan.go.id', 9),
(12, '196205221986032001', 'mujo', 'sularso', 'e5f221e5e7fbe9df8a7c31a564a18abd', '2', '1080001', 1, '', 'M', '2017-08-16 05:03:55', '08112233', 'Pondok Indah', 'mujos@kemhan.go.id', 11),
(13, '197006051990031001', 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', 'pusdatin', 1, '20190805_51koala.jpg', 'M', '2017-08-23 06:46:06', '0818298291', 'Tanah Sereal Tambora', 'ajisyahputra601@gmail.com', 1),
(16, '197808081002122001', 'syahputra', 'syahputra', '1ee69f91c1b3813078ec5cdb0ce9575d', '1', NULL, 1, '', NULL, '2019-08-07 17:44:22', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `laporan_angka_kredit`
--
ALTER TABLE `laporan_angka_kredit`
 ADD PRIMARY KEY (`kd_laporan_angkakredit`);

--
-- Indexes for table `master_butir_kegiatan`
--
ALTER TABLE `master_butir_kegiatan`
 ADD PRIMARY KEY (`kd_butirkegiatan`);

--
-- Indexes for table `master_pranata`
--
ALTER TABLE `master_pranata`
 ADD PRIMARY KEY (`id`), ADD KEY `master_pranata_ibfk_1` (`nip`);

--
-- Indexes for table `master_pranatas`
--
ALTER TABLE `master_pranatas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_subunsur`
--
ALTER TABLE `master_subunsur`
 ADD PRIMARY KEY (`kd_subunsur`);

--
-- Indexes for table `master_unsur`
--
ALTER TABLE `master_unsur`
 ADD PRIMARY KEY (`kd_unsur`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
 ADD PRIMARY KEY (`kd_pangkat`);

--
-- Indexes for table `personil`
--
ALTER TABLE `personil`
 ADD PRIMARY KEY (`nip`), ADD KEY `kd_pangkat` (`kd_pangkat`), ADD KEY `kd_jabatan` (`kd_jabatan`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
 ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tusergroup`
--
ALTER TABLE `tusergroup`
 ADD PRIMARY KEY (`autono`);

--
-- Indexes for table `tusermenu`
--
ALTER TABLE `tusermenu`
 ADD PRIMARY KEY (`usermenu_id`), ADD KEY `umgrup_fkey` (`grup_id`), ADD KEY `ummenu_fkey` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_angka_kredit`
--
ALTER TABLE `laporan_angka_kredit`
MODIFY `kd_laporan_angkakredit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_butir_kegiatan`
--
ALTER TABLE `master_butir_kegiatan`
MODIFY `kd_butirkegiatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT for table `master_pranata`
--
ALTER TABLE `master_pranata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `master_pranatas`
--
ALTER TABLE `master_pranatas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `master_subunsur`
--
ALTER TABLE `master_subunsur`
MODIFY `kd_subunsur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `master_unsur`
--
ALTER TABLE `master_unsur`
MODIFY `kd_unsur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tusergroup`
--
ALTER TABLE `tusergroup`
MODIFY `autono` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tusermenu`
--
ALTER TABLE `tusermenu`
MODIFY `usermenu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `master_pranata`
--
ALTER TABLE `master_pranata`
ADD CONSTRAINT `master_pranata_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `personil` (`nip`);

--
-- Ketidakleluasaan untuk tabel `personil`
--
ALTER TABLE `personil`
ADD CONSTRAINT `personil_ibfk_1` FOREIGN KEY (`kd_pangkat`) REFERENCES `pangkat` (`kd_pangkat`),
ADD CONSTRAINT `personil_ibfk_2` FOREIGN KEY (`kd_jabatan`) REFERENCES `jabatan` (`kd_jabatan`);

--
-- Ketidakleluasaan untuk tabel `tusermenu`
--
ALTER TABLE `tusermenu`
ADD CONSTRAINT `tusermenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`menu_id`),
ADD CONSTRAINT `tusermenu_ibfk_2` FOREIGN KEY (`grup_id`) REFERENCES `tusergroup` (`autono`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
