-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 07:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemodelandata`
--

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id_klien` int(10) NOT NULL,
  `nama_klien` varchar(50) NOT NULL,
  `umur` int(3) NOT NULL,
  `kode_model` char(5) NOT NULL,
  `kode_pernyataan` longtext NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `kode_model` char(5) NOT NULL,
  `nama_model` varchar(100) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`kode_model`, `nama_model`, `solusi`) VALUES
('M01', 'Model Data Hierarkis', 'Di pemodelan data hierarki, Anda dapat merepresentasikan hubungan antara berbagai elemen data dalam format seperti pohon. Model data hierarkis merepresentasikan hubungan satu-ke-banyak, dengan pemetaan kelas data induk atau akar ke beberapa turunan. - basis data yang cocok:XML databases, JSON databases'),
('M02', 'Model Data Grafik', 'Pemodelan data hierarkis dari waktu ke waktu telah berevolusi menjadi pemodelan data grafik. Model data grafik merepresentasikan hubungan data yang memperlakukan entitas secara sama. Entitas dapat terhubung satu sama lain dalam hubungan satu-ke-banyak atau banyak-ke-banyak tanpa konsep induk atau turunan. - Basis data yang cocok: Amazon Neptune, Neo4j, ArangoDB'),
('M03', 'Model Data Relasional', 'Pemodelan data relasional merupakan pendekatan pemodelan populer yang memvisualisasikan kelas data sebagai tabel. Tabel data yang berbeda digabungkan atau dihubungkan dengan menggunakan kunci yang merepresentasikan hubungan entitas dunia nyata. Anda juga dapat menggunakan teknologi basis data relasional untuk menyimpan data terstruktur, dan model data relasional merupakan metode yang sangat berguna untuk merepresentasikan struktur basis data relasional Anda. - Basis data yang cocok: MySQL, PostgreSQL, Oracle Database, SQL Server, Amazon RDS'),
('M04', 'Model Data Hubungan Entitas', 'Pemodelan data hubungan entitas (ER) menggunakan diagram formal untuk merepresentasikan hubungan antara entitas dalam basis data. Arsitek data menggunakan beberapa alat pemodelan ER untuk merepresentasikan data. Basis data yang cocok: Entity-Relationship Model (ER Model).'),
('M05', 'Model Data Berorientasi Objek', 'Pemrograman berorientasi objek menggunakan struktur data yang disebut objek untuk menyimpan data. Objek data ini merupakan abstraksi perangkat lunak entitas dunia nyata. Misalnya, dalam model data berorientasi objek, dealer mobil akan memiliki data objek seperti Pelanggan dengan atribut seperti nama, alamat, dan nomor telepon. Anda akan menyimpan data pelanggan sehingga setiap pelanggan dunia nyata direpresentasikan sebagai objek data pelanggan. Basis data yang cocok: db4o, ObjectDB.'),
('M06', 'Model Data Dimensional', 'Komputasi korporasi modern menggunakan teknologi gudang data untuk menyimpan data untuk analitik dalam jumlah besar. Anda dapat menggunakan proyek pemodelan data dimensional untuk penyimpanan dan pengambilan data dari gudang data dengan kecepatan tinggi. Model dimensional menggunakan data duplikasi atau redundan serta memprioritaskan performa daripada penggunaan sedikit ruang untuk penyimpanan data. Basis data yang cocok: Amazon Redshift - Snowflake');

-- --------------------------------------------------------

--
-- Table structure for table `pernyataan`
--

CREATE TABLE `pernyataan` (
  `kode_pernyataan` char(5) NOT NULL,
  `nama_pernyataan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pernyataan`
--

INSERT INTO `pernyataan` (`kode_pernyataan`, `nama_pernyataan`) VALUES
('MP01', 'Data yang akan disimpan memiliki struktur yang kompleks dan dapat berubah dengan cepat.'),
('MP02', 'Hubungan antar data sangat penting dan perlu dijaga dengan baik.'),
('MP03', 'Data yang akan disimpan berhubungan dalam struktur hierarkis yang jelas.'),
('MP04', 'Data yang akan disimpan bersifat multidimensional dan perlu dianalisis dari berbagai dimensi.'),
('MP05', 'Data yang akan disimpan memiliki banyak hubungan yang kompleks antar entitas.'),
('MP06', 'Struktur data yang akan disimpan tidak terlalu kompleks dan dapat direpresentasikan dengan baik dalam tabel.'),
('MP07', 'Aplikasi akan sering melakukan agregasi data untuk analisis tingkat tinggi.'),
('MP08', 'Data yang akan disimpan memiliki banyak atribut yang kompleks dan saling terkait.'),
('MP09', 'Kinerja sistem dalam melakukan query kompleks adalah faktor kunci.'),
('MP10', 'Struktur data yang akan disimpan dapat direpresentasikan dengan baik dalam bentuk grafik.'),
('MP11', 'Aplikasi memerlukan fleksibilitas dalam menangani struktur data yang berubah secara dinamis.'),
('MP12', 'Data yang akan disimpan memiliki tingkat kompleksitas yang tinggi dan memerlukan representasi yang fleksibel.'),
('MP13', 'Data yang akan disimpan memiliki tingkat redundansi yang rendah.'),
('MP14', 'Aplikasi akan sering melakukan operasi CRUD (Create, Read, Update, Delete) pada data.'),
('MP15', 'Data yang akan disimpan memiliki hubungan yang kompleks antar entitas.'),
('MP16', 'Integrasi data dari berbagai sumber eksternal adalah kebutuhan utama.'),
('MP17', 'Data yang akan disimpan memiliki struktur yang sederhana dan tidak berubah sering.'),
('MP18', 'Konsistensi data dan pengendalian versi adalah hal yang krusial.'),
('MP19', 'Aplikasi memerlukan kemampuan untuk melakukan query yang kompleks dan bergabung antar tabel.'),
('MP20', 'Data yang akan disimpan memiliki pola akses yang berbeda-beda tergantung pada kebutuhan aplikasi.'),
('MP21', 'Aplikasi memerlukan kemampuan untuk menyimpan data dalam struktur yang kompleks dan terstruktur dengan baik.'),
('MP22', 'Aplikasi akan sering melakukan agregasi data untuk keperluan laporan dan analisis.'),
('MP23', 'Data yang akan disimpan memiliki banyak atribut yang saling terkait dan perlu dianalisis dari berbagai sudut pandang.'),
('MP24', 'Aplikasi memerlukan konsistensi data yang tinggi dan memerlukan transaksi yang aman.'),
('MP25', 'Struktur data yang akan disimpan memerlukan representasi dalam bentuk grafik untuk memudahkan analisis dan visualisasi.'),
('MP26', 'Aplikasi memerlukan kemampuan untuk menyimpan dan mengelola data dalam struktur hierarkis.'),
('MP27', 'Data yang akan disimpan memiliki banyak dimensi yang saling terkait dan perlu dianalisis dari berbagai sudut pandang.'),
('MP28', 'Aplikasi memerlukan kemampuan untuk menyimpan data dalam struktur yang fleksibel dan dapat diubah sesuai kebutuhan.'),
('MP29', 'Integrasi data dari berbagai sumber eksternal dengan format yang berbeda adalah kebutuhan utama.'),
('MP30', 'Aplikasi memerlukan kemampuan untuk melakukan query kompleks yang melibatkan operasi penggabungan data.');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `kode_pernyataan` char(5) NOT NULL DEFAULT '0',
  `kode_model` char(5) NOT NULL DEFAULT '0',
  `nilai_densitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `kode_pernyataan`, `kode_model`, `nilai_densitas`) VALUES
(1, 'MP01', 'M05', 0.7),
(2, 'MP02', 'M03', 0.6),
(3, 'MP03', 'M01', 0.8),
(4, 'MP04', 'M06', 0.6),
(5, 'MP05', 'M02', 0.7),
(6, 'MP06', 'M03', 0.5),
(7, 'MP07', 'M06', 0.6),
(8, 'MP08', 'M05', 0.7),
(9, 'MP09', 'M03', 0.6),
(10, 'MP10', 'M02', 0.7),
(11, 'MP11', 'M05', 0.8),
(12, 'MP12', 'M05', 0.8),
(13, 'MP13', 'M03', 0.6),
(14, 'MP14', 'M03', 0.5),
(15, 'MP15', 'M02', 0.7),
(16, 'MP16', 'M03', 0.6),
(17, 'MP17', 'M03', 0.4),
(18, 'MP18', 'M03', 0.6),
(19, 'MP19', 'M03', 0.7),
(20, 'MP20', 'M06', 0.6),
(21, 'MP21', 'M05', 0.8),
(22, 'MP22', 'M06', 0.7),
(23, 'MP23', 'M05', 0.7),
(24, 'MP24', 'M03', 0.6),
(25, 'MP25', 'M02', 0.7),
(26, 'MP26', 'M01', 0.7),
(27, 'MP27', 'M06', 0.8),
(28, 'MP28', 'M05', 0.8),
(29, 'MP29', 'M03', 0.6),
(30, 'MP30', 'M03', 0.7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'dr. Nur Azis Saputra, Sp.Kj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`kode_model`);

--
-- Indexes for table `pernyataan`
--
ALTER TABLE `pernyataan`
  ADD PRIMARY KEY (`kode_pernyataan`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`),
  ADD KEY `fk_gangguan` (`kode_model`) USING BTREE,
  ADD KEY `fk_gejala` (`kode_pernyataan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
