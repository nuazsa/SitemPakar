-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 02:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gangguankecemasan`
--

-- --------------------------------------------------------

--
-- Table structure for table `gangguan`
--

CREATE TABLE `gangguan` (
  `kode_gangguan` char(5) NOT NULL,
  `nama_gangguan` varchar(100) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gangguan`
--

INSERT INTO `gangguan` (`kode_gangguan`, `nama_gangguan`, `solusi`) VALUES
('G01', 'Gangguan Kecemasan Umum', 'Penanganan pasien gangguan kecemasan umum yang efektif adalah kombinasi antara psikoterapi dan farmakoterapi.\r\nPsikoterapi:\r\n- Kongnitis perilaku\r\n- Suportif\r\n- Berorientasi insight\r\nFarmakoterapi:\r\n- Benzodiazepine\r\n- Buspiron\r\n- Antidepressan\r\n- Beta bloker\r\n'),
('G02', 'Gangguan Panik', 'Penatalaksanaan utama untuk gangguan panik mencangkup intervensi psikologis dan farmakologis.\r\nFarmakoterapi:\r\n- Diazepam, Alprazolam\r\n- Imipramin\r\n- Buspiran\r\n- Antidepresan\r\n- Valproate, Gabapentin\r\nPsikoterapi :\r\n- Terapi kognitif-behaviour\r\n- Relaksasi\r\n- Desensitisasi'),
('G03', 'Gangguan Fobia Spesifik', 'Pentalaksaan untuk fobia spesifik sebagian besar berfokus pada intervensi psikososial.\r\nFarmakoterapi: \r\n- SSRI\r\n- Benzodiazepine\r\n- Buspar\r\n-Beta bloker\r\nPsikoterapi:\r\n- Suportif\r\n- Behaviour therapy\r\n- Hipnosa'),
('G04', 'Gangguan Fobia Sosial', 'Penatalaksanaan utama untuk gangguan fobia sosial mencangkup intervensi psikososial, psikologis dan farmakologis.\r\nFarmakoterapi: \r\n- SSRI\r\n- Benzodiazepine\r\n- Buspar\r\n- Beta bloker\r\nPsikoterapi:\r\n- Suportif\r\n- Behaviour therapy\r\n- Hipnosa'),
('G05', 'Gangguan Agorafobia', 'Penatalaksanaan utama untuk gangguan agorafobia terdiri dari psikoterapi dan farmakoterapi. \r\nFarmakoterapi: \r\n- SSRI \r\n- Benzodiazepine \r\n- Buspar\r\n- Beta bloker \r\nPsikoterapi: \r\n- Suportif \r\n- Behaviour therapy \r\n- Hipnosa');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` char(5) NOT NULL,
  `nama_gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
('GJ01', 'Gangguan tidak berasal dari zat yang memberikan efek pada fisiologis (memakai obat-obatan) atau kondisi medis lainnya (seperti hipertiroid)'),
('GJ02', 'Kecemasan atau kekhawatiran yang berlebihan yang timbul hampir setiap hari, sepanjang hari, terjadi sekurangnya 6 bulan, tentang sejumlah aktivitas atau kejadian (seperti pekerjaan atau aktivitas sekolah)'),
('GJ03', 'Individu sulit untuk mengendalikan kecemasan dan kekhawatiran'),
('GJ04', 'Kecemasan diasosiasikan dengan 6 gejala berikut ini (dengan sekurang-kurangnya beberapa gejala lebih banyak terjadi dibandingkan tidak selama 6 bulan terakhir), yaitu kegelisahan, mudah lelah, sulit berkonsentrasi atau pikiran kosong, iritabilitas, ketegangan otot, dan gangguan tidur (sulit tidur, tidur gelisah atau tidak memuaskan)'),
('GJ05', 'Mengalami serangan panik seperti: detak jantung cepat, sesak napas, panas dan berkeringat, nyeri dada, kram perut, gemetar, pusing, merasa ingin pingsan, atau takut mati'),
('GJ06', 'Serangan panik timbul secara tidak terduga dan berulang dengan hitungan menit dalam waktu sekurang-kurangnya 1 bulan'),
('GJ07', 'Khawatir tentang panik tambahan atau konsekuensinya (Seperti, kehilangan kontrol, mengalami serangan jantung, “menjadi gila”)'),
('GJ08', 'Muncul perasaan bahwa dirinya dan lingkungan sekitar tidak nyata'),
('GJ09', 'Menandai ketakutan atau kecemasan terhadap suatu objek atau situasi tertentu (terbang, ketinggian, binatang, jarum suntik, darah)'),
('GJ10', 'Objek atau situasi fobia hampir selalu memancing ketakutan atau kecemasan tiba-tiba'),
('GJ11', 'Objek atau situasi fobia secara aktif dihindari atau diatasi dengan ketakutan atau kecemasan yang kuat'),
('GJ12', 'Ketakutan atau kecemasan itu tidak sesuai dengan bahaya sebenarnya yang ditimbulkan oleh objek atau situasi tertentu dan pada konteks kultur sosial'),
('GJ13', 'Menandai ketakutan atau kecemasan terhadap satu atau lebih situasi sosial dimana individu terlihat oleh pengamatan yang mungkin dilakukan oleh orang lain. Contohnya termasuk interaksi sosial (melakukan percakapan, bertemu orang asing), merasa diamati (makan dan minum), dan tampil di depan orang lain (memberi pidato)'),
('GJ14', 'Situasi sosial hampir selalu memancing ketakutan atau kecemasan'),
('GJ15', 'Situasi sosial dihindari atau diatasi dengan ketakutan atau kecemasan yang tinggi'),
('GJ16', 'Individu merasa takut melakukan sesuatu jika menunjukkan gejala kecemasan akan ditanggapi negatif (akan dipermalukan, menuju pada penolakan atau penyerangan orang lain)'),
('GJ17', 'Terdapat ketakutan atau kecemasan yang nyata tentang dua atau lebih dari lima kelompok situasi, menggunakan transportasi umum (misalnya, bus, kereta api, mobil, pesawat), berada di ruang terbuka (misalnya, taman, pusat perbelanjaan, tempat parker), berada di ruang tertutup (misalnya, toko, lift, teater), dalam keramaian atau berdiri dalam antrian dan keluar dari rumah'),
('GJ18', 'Rasa takut disebabkan oleh keyakinan bahwa akan sulit untuk keluar dari situasi tersebut, serta tidak adanya bantuan jika terjadi gejala menyerupai panik, maupun gejala yang memalukan, misalnya pasien lanjut usia takut jatuh atau mengalami inkontinensia'),
('GJ19', 'Situasi agorafobik dihindari secara aktif, membutuhkan teman jika harus berhadapan dengan situasi tersebut, atau bertahan dalam situasi yang ditakuti dengan rasa takut yang hebat'),
('GJ20', 'Selalu meminta untuk ditemani setiap perjalanan atau meninggalkan rumah'),
('GJ21', 'Takut berpergian atau keluar sendirian'),
('GJ22', 'Kecemasan, kekhawatiran, atau gejala fisik menyebabkan distress atau terganggunya fungsi sosial, pekerjaan, dan fungsi penting lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(10) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `umur` int(3) NOT NULL,
  `kode_gangguan` char(5) NOT NULL,
  `kode_gejala` longtext NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `umur`, `kode_gangguan`, `kode_gejala`, `hasil`) VALUES
(1, 'Febrian', 33, 'G03', 'a:3:{i:0;s:4:\"GJ09\";i:1;s:4:\"GJ10\";i:2;s:4:\"GJ12\";}', 98.41),
(2, 'Apul Prasetio', 19, 'G05', 'a:3:{i:0;s:4:\"GJ01\";i:1;s:4:\"GJ17\";i:2;s:4:\"GJ18\";}', 93.52),
(3, 'Granada Titania', 25, 'G04', 'a:3:{i:0;s:4:\"GJ13\";i:1;s:4:\"GJ15\";i:2;s:4:\"GJ22\";}', 93.35),
(4, 'Dinda Septari', 15, 'G01', 'a:6:{i:0;s:4:\"GJ02\";i:1;s:4:\"GJ03\";i:2;s:4:\"GJ04\";i:3;s:4:\"GJ13\";i:4;s:4:\"GJ15\";i:5;s:4:\"GJ22\";}', 66.74),
(5, 'Fitri Annisa', 29, 'G01', 'a:5:{i:0;s:4:\"GJ01\";i:1;s:4:\"GJ02\";i:2;s:4:\"GJ03\";i:3;s:4:\"GJ04\";i:4;s:4:\"GJ22\";}', 96.79),
(6, 'Willy Andi', 22, 'G02', 'a:3:{i:0;s:4:\"GJ01\";i:1;s:4:\"GJ05\";i:2;s:4:\"GJ07\";}', 86.74),
(7, 'Ferdi Gunawan', 45, 'G02', 'a:3:{i:0;s:4:\"GJ01\";i:1;s:4:\"GJ08\";i:2;s:4:\"GJ22\";}', 48),
(8, 'Sandra Aulia Putri', 17, 'G02', 'a:4:{i:0;s:4:\"GJ06\";i:1;s:4:\"GJ08\";i:2;s:4:\"GJ11\";i:3;s:4:\"GJ12\";}', 53.88),
(9, 'Dira Gustika', 26, 'G01', 'a:7:{i:0;s:4:\"GJ01\";i:1;s:4:\"GJ02\";i:2;s:4:\"GJ05\";i:3;s:4:\"GJ12\";i:4;s:4:\"GJ16\";i:5;s:4:\"GJ20\";i:6;s:4:\"GJ22\";}', 45.41),
(10, 'Nada Rizki Ananda', 30, 'G04', 'a:5:{i:0;s:4:\"GJ03\";i:1;s:4:\"GJ04\";i:2;s:4:\"GJ14\";i:3;s:4:\"GJ15\";i:4;s:4:\"GJ16\";}', 73.02),
(11, 'Muhammad Rasyid', 25, 'G05', 'a:4:{i:0;s:4:\"GJ05\";i:1;s:4:\"GJ17\";i:2;s:4:\"GJ18\";i:3;s:4:\"GJ19\";}', 93.96),
(12, 'Suci Nadilla', 18, 'G04', 'a:5:{i:0;s:4:\"GJ13\";i:1;s:4:\"GJ14\";i:2;s:4:\"GJ19\";i:3;s:4:\"GJ20\";i:4;s:4:\"GJ22\";}', 67.95),
(13, 'Mia Luise', 26, 'G03', 'a:5:{i:0;s:4:\"GJ02\";i:1;s:4:\"GJ03\";i:2;s:4:\"GJ09\";i:3;s:4:\"GJ10\";i:4;s:4:\"GJ11\";}', 93.49),
(14, 'Ronaldi Eka Putra', 30, 'G05', 'a:5:{i:0;s:4:\"GJ13\";i:1;s:4:\"GJ16\";i:2;s:4:\"GJ19\";i:3;s:4:\"GJ20\";i:4;s:4:\"GJ21\";}', 50.87),
(15, 'Indah Permata Sari', 31, 'G02', 'a:5:{i:0;s:4:\"GJ05\";i:1;s:4:\"GJ06\";i:2;s:4:\"GJ07\";i:3;s:4:\"GJ15\";i:4;s:4:\"GJ16\";}', 88.78),
(16, 'Daniel Hidayatullah', 24, 'G05', 'a:6:{i:0;s:4:\"GJ05\";i:1;s:4:\"GJ07\";i:2;s:4:\"GJ17\";i:3;s:4:\"GJ18\";i:4;s:4:\"GJ20\";i:5;s:4:\"GJ21\";}', 88.95),
(17, 'Mega Gusnia', 27, 'G04', 'a:4:{i:0;s:4:\"GJ12\";i:1;s:4:\"GJ13\";i:2;s:4:\"GJ20\";i:3;s:4:\"GJ21\";}', 46.59),
(18, 'Rofi Abdullah', 30, 'G04', 'a:3:{i:0;s:4:\"GJ10\";i:1;s:4:\"GJ13\";i:2;s:4:\"GJ14\";}', 71.99),
(19, 'Isro Dini', 41, 'G05', 'a:7:{i:0;s:4:\"GJ14\";i:1;s:4:\"GJ15\";i:2;s:4:\"GJ16\";i:3;s:4:\"GJ17\";i:4;s:4:\"GJ18\";i:5;s:4:\"GJ20\";i:6;s:4:\"GJ21\";}', 79.83),
(20, 'Muhammad Ridwan', 26, 'G02', 'a:11:{i:0;s:4:\"GJ01\";i:1;s:4:\"GJ02\";i:2;s:4:\"GJ03\";i:3;s:4:\"GJ04\";i:4;s:4:\"GJ05\";i:5;s:4:\"GJ06\";i:6;s:4:\"GJ07\";i:7;s:4:\"GJ08\";i:8;s:4:\"GJ14\";i:9;s:4:\"GJ16\";i:10;s:4:\"GJ22\";}', 71.61),
(21, 'Dio Doni', 20, 'G03', 'a:4:{i:0;s:4:\"GJ08\";i:1;s:4:\"GJ09\";i:2;s:4:\"GJ10\";i:3;s:4:\"GJ14\";}', 90.1),
(22, 'Jihan Ramadhani', 15, 'G01', 'a:4:{i:0;s:4:\"GJ02\";i:1;s:4:\"GJ03\";i:2;s:4:\"GJ04\";i:3;s:4:\"GJ05\";}', 91.12),
(23, 'Rivaldo', 17, 'G01', 'a:3:{i:0;s:4:\"GJ02\";i:1;s:4:\"GJ04\";i:2;s:4:\"GJ12\";}', 88.76),
(24, 'Yohanna Melisa Putri', 27, 'G03', 'a:6:{i:0;s:4:\"GJ01\";i:1;s:4:\"GJ09\";i:2;s:4:\"GJ10\";i:3;s:4:\"GJ11\";i:4;s:4:\"GJ12\";i:5;s:4:\"GJ18\";}', 99.12),
(25, 'Santa Katerina', 31, 'G03', 'a:4:{i:0;s:4:\"GJ09\";i:1;s:4:\"GJ10\";i:2;s:4:\"GJ21\";i:3;s:4:\"GJ22\";}', 94.17),
(26, 'Nur Aini', 27, 'G03', 'a:22:{i:0;s:4:\"GJ01\";i:1;s:4:\"GJ02\";i:2;s:4:\"GJ03\";i:3;s:4:\"GJ04\";i:4;s:4:\"GJ05\";i:5;s:4:\"GJ06\";i:6;s:4:\"GJ07\";i:7;s:4:\"GJ08\";i:8;s:4:\"GJ09\";i:9;s:4:\"GJ10\";i:10;s:4:\"GJ11\";i:11;s:4:\"GJ12\";i:12;s:4:\"GJ13\";i:13;s:4:\"GJ14\";i:14;s:4:\"GJ15\";i:15;s:4:\"GJ16\";i:16;s:4:\"GJ17\";i:17;s:4:\"GJ18\";i:18;s:4:\"GJ19\";i:19;s:4:\"GJ20\";i:20;s:4:\"GJ21\";i:21;s:4:\"GJ22\";}', 44.77);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `kode_gejala` char(5) NOT NULL DEFAULT '0',
  `kode_gangguan` char(5) NOT NULL DEFAULT '0',
  `nilai_densitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `kode_gejala`, `kode_gangguan`, `nilai_densitas`) VALUES
(1, 'GJ01', 'G01', 0.4),
(2, 'GJ02', 'G01', 0.83),
(3, 'GJ03', 'G01', 0.49),
(4, 'GJ04', 'G01', 0.63),
(5, 'GJ22', 'G01', 0.8),
(6, 'GJ01', 'G02', 0.37),
(7, 'GJ05', 'G02', 0.66),
(8, 'GJ06', 'G02', 0.84),
(9, 'GJ07', 'G02', 0.61),
(10, 'GJ08', 'G02', 0.48),
(11, 'GJ22', 'G02', 0.79),
(12, 'GJ01', 'G03', 0.38),
(13, 'GJ09', 'G03', 0.85),
(14, 'GJ10', 'G03', 0.8),
(15, 'GJ11', 'G03', 0.8),
(16, 'GJ12', 'G03', 0.47),
(17, 'GJ22', 'G03', 0.79),
(18, 'GJ01', 'G04', 0.39),
(19, 'GJ13', 'G04', 0.81),
(20, 'GJ14', 'G04', 0.62),
(21, 'GJ15', 'G04', 0.65),
(22, 'GJ16', 'G04', 0.51),
(23, 'GJ22', 'G04', 0.77),
(24, 'GJ01', 'G05', 0.39),
(25, 'GJ17', 'G05', 0.82),
(26, 'GJ18', 'G05', 0.64),
(27, 'GJ19', 'G05', 0.67),
(28, 'GJ20', 'G05', 0.5),
(29, 'GJ21', 'G05', 0.5),
(30, 'GJ22', 'G05', 0.78);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'dr. Willy Jaya Suento, Sp.Kj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gangguan`
--
ALTER TABLE `gangguan`
  ADD PRIMARY KEY (`kode_gangguan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`),
  ADD KEY `fk_gangguan` (`kode_gangguan`) USING BTREE,
  ADD KEY `fk_gejala` (`kode_gejala`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
