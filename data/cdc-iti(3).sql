-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 05:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdc-iti`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(5) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`, `gambar`) VALUES
(1, 'BCA', 123456789, 'bca.png'),
(2, 'BRI', 4567890, 'bri.png');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_bayar`
--

CREATE TABLE `bukti_bayar` (
  `id_bukti` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `foto_bukti` varchar(120) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_bayar`
--

INSERT INTO `bukti_bayar` (`id_bukti`, `id_user`, `foto_bukti`, `tanggal`, `jam`) VALUES
(1, 18, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_user`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(3, 2, 'Ini Event Pertama', 'Ini Event Dibulan Agustus ', 'ad1.png', '06-August-2017'),
(4, 2, 'Ini Event Kedua', ' Ini Event Kedua Dibulan Agustus', 'ad3.png', '11-August-2017'),
(5, 2, 'Event KEtiga', 'ini ceritanya isi dari event ', 'Penguins.jpg', '07-September-2017');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(5) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `gaji` varchar(20) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `job_sekeer` int(5) NOT NULL,
  `id_comp` int(5) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `jam` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `judul`, `isi`, `gaji`, `provinsi`, `jenis`, `job_sekeer`, `id_comp`, `tanggal`, `jam`) VALUES
(1, 'it application support (itas - q08)', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><strong>Reqiwuyqwqw:</strong></p>\r\n<ul>\r\n<li>askjahsjas aksjahs ajh</li>\r\n<li>askjhas aksja skjas kajs as</li>\r\n<li>akjashajkshashajkshkasjh</li>\r\n</ul>\r\n<p><strong>Reiuhasjhas:</strong></p>\r\n<ul>\r\n<li>askljahs askj asas as as</li>\r\n<li>as askjahs ashga sjash as</li>\r\n<li>aksahshasjhasjahsjghajhags</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', '4000000-4000001', 'jakarta', 'ft', 0, 7, '30-Jul-2017', '19:13:56'),
(3, 'analyst procurement', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><strong>skjabskjabs :</strong></p>\r\n<ul>\r\n<li>asjhasas</li>\r\n<li>asjbaslaskas</li>\r\n<li>aslkajsas</li>\r\n<li>alsknas</li>\r\n<li>kasjhaskjhakjshsa</li>\r\n</ul>\r\n</body>\r\n</html>', '4000000-5000000', 'dki-jakarta', 'ft', 0, 2, '30-Jul-2017', '20:08:20'),
(6, 'database staff', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<ul style=\"list-style-type: disc;\">\r\n<li style=\"text-align: justify;\">PT Techsiap Technology is a start up ITES (Information Technology and Enterprise Solutions) company based in Jakarta, Indonesia. We are a young enterprise, dedicated to provide customised IT solutions and services to our customers. Our solutions are powered with the cutting edge technology to get the most out of any organisations IT infrastructure and business processes.</li>\r\n<li style=\"text-align: justify;\">PT. Techsiap Technology wants to become a leading Information Technology, Consulting &amp; Outsourcing Services company in Jakarta, Indonesia. We would like to be recognized as a leading IT Company from Indonesia which will provide world-class solutions and services.</li>\r\n</ul>\r\n</body>\r\n</html>', '4000000-4300000', 'dki-jakarta', 'ft', 0, 29, '06-Aug-2017', '14:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_bank` int(5) NOT NULL,
  `waktu` int(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `id_bank`, `waktu`, `foto`) VALUES
(1, 16, 2, 3, 'Desert.jpg'),
(2, 19, 1, 2, ''),
(3, 3, 1, 6, 'IMG-20151101-WA0000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cv`
--

CREATE TABLE `tbl_cv` (
  `id_cv` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `file` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cv`
--

INSERT INTO `tbl_cv` (`id_cv`, `id_user`, `file`) VALUES
(1, 16, 'kuesioner.docx'),
(2, 3, 'cv.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lamar`
--

CREATE TABLE `tbl_lamar` (
  `id_lamar` int(5) NOT NULL,
  `id_lowongan` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lamar`
--

INSERT INTO `tbl_lamar` (`id_lamar`, `id_lowongan`, `id_user`, `tanggal`, `jam`) VALUES
(1, 3, 16, '5', '9'),
(2, 3, 3, '06-Aug-2017', '19:47:43'),
(3, 6, 3, '06-Aug-2017', '19:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nik` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `telepon` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level_pendidikan` varchar(20) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kapasitas` int(2) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `telepon`, `email`, `foto`, `level_pendidikan`, `pendidikan`, `username`, `password`, `status`, `kapasitas`, `jenis`, `deskripsi`, `website`) VALUES
(2, 2, 'PT.Arwana Citra Mulia', 'Jakarta', '03-08-2017', 'Jalan. Puri Indah ', 989878, 'hrd@arwnacitra.com', 'arna.png', '', '', 'arwana', '4644bbf484a6fd117c460718d499c4d3', '', 0, 'Perusahaan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>PT Arwana Citramulia Tbk (Arwana) is a public company listed on the main board of the Indonesian Stock Exchange (IDX) traded under the \"ARNA\" stock code. Arwana is dedicated to producing cost-competitive ceramic tiles to serve the medium-low market segment nationwide. The products are sold under the \"Arwana Ceramic Tiles\" brand, a brand name that signifies high-quality product with competitive pricing. In 2011, a new product line with even better quality was introduced to capture the medium-high market segment, sold under the brand name &ldquo;UNO Ceramic Tiles&rdquo;.</p>\r\n</body>\r\n</html>', 'www.arwanacitra.com'),
(3, 2147483647, 'Karjo Salim', 'Jakarta', '10-07-2017', 'Jl.swadaya B5', 87676282, 'daljks@gmail.com', 'Penguins.jpg', '', '', 'karjo', '27c634e70d9fa3091558e402a505cb9f', '2', 0, 'Pelamar', '', ''),
(16, 16, 'Dimas', 'Jakarta', '05-07-2017', 'Jalan Buntu', 980980989, 'dsullistyana94@gmail.com', 'Jellyfish.jpg', 'S1', 'Universitas Prof.dr.Hamka ', 'dimas', 'd41d8cd98f00b204e9800998ecf8427e', '2', 0, 'pelamar', '', ''),
(18, 18, 'aa', 'kjash', '31-07-2017', 'asnask', 19827, 'asa@gmail.com', 'Penguins.jpg', 'S1', 'Institut Teknologi Indonesia', 'aa', 'd41d8cd98f00b204e9800998ecf8427e', '0', 0, 'pelamar', '', ''),
(19, 19, 'bimo', 'jakarta', '10-08-2017', 'jalan kepodang raya nomor 14a', 9876767, 'bimo@gmail.com', 'Koala.jpg', 'S1', 'Institut Teknologi Bandung', 'bimo', 'd41d8cd98f00b204e9800998ecf8427e', '2', 0, 'pelamar', '', ''),
(21, 87686, 'admin1', 'Bandung', '07-08-2017', 'jalan buntu', 1098201928, 'admi11@yahoo.com', 'IMG_20150914_172339.jpg', '', '', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', '0', 0, 'Admin', '', ''),
(29, 87686, 'Pt.Karya Cipta Abadi', 'Bandung', '14-08-2017', 'Jalan Buntu', 92872, 'karya.cipta@gmail.com', '2209.jpg', '', '', 'cipta', 'dd08db284de56776a2f7fe12ad2f2324', '0', 9, 'Perusahaan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div style=\"text-align: justify;\">PT Techsiap Technology is a start up ITES (Information Technology and Enterprise Solutions) company based in Jakarta, Indonesia. </div>\r\n</body>\r\n</html>', 'www.ciptaabadi.com'),
(33, 33, 'mamat', 'Magetan', '06-08-2017', 'Jalan Buntu Nmr 5', 19821092, 'mamat@gmail.com', 'Roofing_.jpg', 'S1', 'Institut Teknologi Indonesia', 'mamat', 'd41d8cd98f00b204e9800998ecf8427e', '0', 0, 'pelamar', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_cv`
--
ALTER TABLE `tbl_cv`
  ADD PRIMARY KEY (`id_cv`);

--
-- Indexes for table `tbl_lamar`
--
ALTER TABLE `tbl_lamar`
  ADD PRIMARY KEY (`id_lamar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_cv`
--
ALTER TABLE `tbl_cv`
  MODIFY `id_cv` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_lamar`
--
ALTER TABLE `tbl_lamar`
  MODIFY `id_lamar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
