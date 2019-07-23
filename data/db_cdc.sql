-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.17-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table cdc-iti_terbaru.konsul_time
CREATE TABLE IF NOT EXISTS `konsul_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table cdc-iti_terbaru.konsul_time: ~3 rows (approximately)
/*!40000 ALTER TABLE `konsul_time` DISABLE KEYS */;
REPLACE INTO `konsul_time` (`id`, `from`, `to`) VALUES
	(3, '2019-07-23', '2019-07-25'),
	(4, '2019-07-26', '2019-07-27'),
	(5, '2019-07-28', '2019-07-29');
/*!40000 ALTER TABLE `konsul_time` ENABLE KEYS */;

-- Dumping structure for table cdc-iti_terbaru.lowongan
CREATE TABLE IF NOT EXISTS `lowongan` (
  `id_lowongan` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `isi` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `gaji` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jenis` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `job_sekeer` int(5) NOT NULL,
  `id_comp` int(5) NOT NULL,
  `tanggal` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `jam` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `test_date` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `test_location` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `test_type` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `test_detail` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_lowongan`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cdc-iti_terbaru.lowongan: 4 rows
/*!40000 ALTER TABLE `lowongan` DISABLE KEYS */;
REPLACE INTO `lowongan` (`id_lowongan`, `judul`, `isi`, `gaji`, `provinsi`, `jenis`, `job_sekeer`, `id_comp`, `tanggal`, `jam`, `test_date`, `test_location`, `test_type`, `test_detail`) VALUES
	(1, 'it application support (itas - q08)', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><strong>Reqiwuyqwqw:</strong></p>\r\n<ul>\r\n<li>askjahsjas aksjahs ajh</li>\r\n<li>askjhas aksja skjas kajs as</li>\r\n<li>akjashajkshashajkshkasjh</li>\r\n</ul>\r\n<p><strong>Reiuhasjhas:</strong></p>\r\n<ul>\r\n<li>askljahs askj asas as as</li>\r\n<li>as askjahs ashga sjash as</li>\r\n<li>aksahshasjhasjahsjghajhags</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', '4000000-4000001', 'jakarta', 'ft', 0, 7, '30-Jul-2017', '19:13:56', '', '', '', ''),
	(3, 'analyst procurement', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>analyst procurement</p>\r\n</body>\r\n</html>', '4000000-5000000', 'dki-jakarta', 'ft', 0, 2, '20-Jul-2019', '14:12:21', '07/24/2019 9:30 AM', 'asd', 'Tes Tertulis', 'asd'),
	(6, 'database staff', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<ul style="list-style-type: disc;">\r\n<li style="text-align: justify;">PT Techsiap Technology is a start up ITES (Information Technology and Enterprise Solutions) company based in Jakarta, Indonesia. We are a young enterprise, dedicated to provide customised IT solutions and services to our customers. Our solutions are powered with the cutting edge technology to get the most out of any organisations IT infrastructure and business processes.</li>\r\n<li style="text-align: justify;">PT. Techsiap Technology wants to become a leading Information Technology, Consulting &amp; Outsourcing Services company in Jakarta, Indonesia. We would like to be recognized as a leading IT Company from Indonesia which will provide world-class solutions and services.</li>\r\n</ul>\r\n</body>\r\n</html>', '4000000-4300000', 'dki-jakarta', 'ft', 0, 29, '06-Aug-2017', '14:12:21', '', '', '', ''),
	(7, 'purchase', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<ul>\r\n<li>askjahsas<br />asbasas</li>\r\n<li>ashasas</li>\r\n<li>aslkasjalsas</li>\r\n<li>aslasjalsas</li>\r\n<li>aslkajsas</li>\r\n</ul>\r\n</body>\r\n</html>', '1000000-2000000', 'jakarta', 'ft', 1, 2, '15-May-2018', '20:04:10', '', '', '', '');
/*!40000 ALTER TABLE `lowongan` ENABLE KEYS */;

-- Dumping structure for table cdc-iti_terbaru.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nik` int(15) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `telepon` int(15) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level_pendidikan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pendidikan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kapasitas` int(2) NOT NULL,
  `jenis` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cdc-iti_terbaru.user: 20 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id_user`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `telepon`, `email`, `foto`, `level_pendidikan`, `pendidikan`, `username`, `password`, `status`, `kapasitas`, `jenis`, `deskripsi`, `website`) VALUES
	(2, 2, 'PT.Arwana Citra Mulia', 'Jakarta', '03-08-2017', 'Jalan. Puri Indah ', 989878, 'hrd@arwnacitra.com', 'arna.png', 'S1', '', 'arwana', '827ccb0eea8a706c4c34a16891f84e7b', '2', 28, 'Perusahaan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>PT Arwana Citramulia Tbk (Arwana) is a public company listed on the main board of the Indonesian Stock Exchange (IDX) traded under the "ARNA" stock code. Arwana is dedicated to producing cost-competitive ceramic tiles to serve the medium-low market segment nationwide. The products are sold under the "Arwana Ceramic Tiles" brand, a brand name that signifies high-quality product with competitive pricing. In 2011, a new product line with even better quality was introduced to capture the medium-high market segment, sold under the brand name &ldquo;UNO Ceramic Tiles&rdquo;.</p>\r\n</body>\r\n</html>', 'www.arwanacitra.com'),
	(3, 2147483647, 'Karjo Salim', 'Jakarta', '10-07-2017', 'Jl.swadaya B5', 87676282, 'daljks@gmail.com', 'Penguins.jpg', 'S2', '', 'karjo', '827ccb0eea8a706c4c34a16891f84e7b', '2', 0, 'Pelamar', '', ''),
	(16, 16, 'Dimas', 'Jakarta', '05-07-2017', 'Jalan Buntu', 980980989, 'dsullistyana94@gmail.com', 'Jellyfish.jpg', 'S1', 'Universitas Prof.dr.Hamka ', 'dimas', '827ccb0eea8a706c4c34a16891f84e7b', '2', 0, 'pelamar', '', ''),
	(18, 18, 'aa', 'kjash', '31-07-2017', 'asnask', 19827, 'asa@gmail.com', 'Penguins.jpg', 'S1', 'Institut Teknologi Indonesia', 'aa', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'pelamar', '', ''),
	(19, 19, 'bimo', 'jakarta', '10-08-2017', 'jalan kepodang raya nomor 14a', 9876767, 'bimo@gmail.com', 'Koala.jpg', 'S1', 'Institut Teknologi Bandung', 'bimo', '827ccb0eea8a706c4c34a16891f84e7b', '2', 0, 'pelamar', '', ''),
	(29, 87686, 'Pt.Karya Cipta Abadi', 'Bandung', '14-08-2017', 'Jalan Buntu', 92872, 'karya.cipta@gmail.com', '2209.jpg', 'S2', '', 'cipta', '827ccb0eea8a706c4c34a16891f84e7b', '0', 9, 'Perusahaan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div style="text-align: justify;">PT Techsiap Technology is a start up ITES (Information Technology and Enterprise Solutions) company based in Jakarta, Indonesia. </div>\r\n</body>\r\n</html>', 'www.ciptaabadi.com'),
	(33, 33, 'mamat', 'Magetan', '06-08-2017', 'Jalan Buntu Nmr 5', 19821092, 'mamat@gmail.com', 'Roofing_.jpg', 'S1', 'Institut Teknologi Indonesia', 'mamat', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'pelamar', '', ''),
	(34, 2147483647, 'bimo', 'Jakarta', '20-06-1995', 'jalan buntu', 298392039, 'bimo@gmail.com', 'Koala.jpg', '', '', 'bimo', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'Pelamar', '', ''),
	(35, 2147483647, 'Super Admin', 'Tangerang', '31-01-2018', 'Jalan Buntu', 39849328, 'sgilang872@gmail.com', 'Lighthouse.jpg', 'D3', 'Inst.Mantap Jiwa', 'super_admin', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'Super_Admin', '', ''),
	(36, 298302, 'Admin', 'Jakarta', '22-01-2018', 'aslkjasasaksj', 19281092, 'aaqw@yahoo.com', 'Koala.jpg', 'SLTA', 'SMA Panarukan', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'Admin', '', ''),
	(37, 1, 'maik', 'solo', '01-01-2018', 'dfd', 90983933, 'affifwokeyy@gmail.com', '', 'D3', '', 'maik', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'Pelamar', '', ''),
	(38, 1, 'maik', 's', '01-01-2018', 'df', 2389218, 'maik@gmail.com', '', 'SLTA', '', 'maik', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'Pelamar', '', ''),
	(39, 2147483647, 'Dede', 'Jakarta', '17-01-2018', 'Jalan buntu', 837, 'Gotzemaik@gmail.com', '', 'D3', '', 'dede', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'Pelamar', '', ''),
	(40, 115120035, 'maik', 'tangerang', '04-02-2018', 'sdad', 213565698, 'gotzemaik@gmail.com', '', 'D3', '', 'maik', '827ccb0eea8a706c4c34a16891f84e7b', '1', 0, 'Pelamar', '', ''),
	(41, 110100001, 'dsdfsdf', 'tangerang', '01-03-2018', 'sdaasd', 2147483647, 'aasdas@yahoo.com', '', 'S1', '', 'sika', '827ccb0eea8a706c4c34a16891f84e7b', '1', 0, 'Pelamar', '', ''),
	(42, 93483049, 'indomart', 'Jakrta', '15-02-1994', 'aksjdakdaskd', 2147483647, 'ss@gmail.com', 'IMG_20180510_185723 (1).jpg', 'S1', '', 'indo', '827ccb0eea8a706c4c34a16891f84e7b', '2', 0, 'Pelamar', '', ''),
	(43, 22840011, 'A F R I A', '', '', 'adasdkjkjasd, jakarta', 2938230, '022840011@iti.ac.id', '', 'S1', 'Institut Teknologi Indonesia', 'afria', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'pelamar', '', ''),
	(44, 98798989, 'dimass', 'Jonggol', '06-08-2018', 'alksja sasj alsjas', 9879879, 'aa@asjas.com', '84010.png', '', '', 'dimass', '827ccb0eea8a706c4c34a16891f84e7b', '1', 0, 'Pelamar', '', ''),
	(56, 0, '', '', '', '', 0, '', '', '', '', 'asdasd', '827ccb0eea8a706c4c34a16891f84e7b', '1', 0, 'Pelamar', '', ''),
	(55, 0, '', '', '', '', 0, '', '', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '0', 0, 'Pelamar', '', '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
