-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 08:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpussekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `idAdmin` char(10) NOT NULL,
  `Nama` char(30) DEFAULT NULL,
  `Alamat` char(50) DEFAULT NULL,
  `JK` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`idAdmin`, `Nama`, `Alamat`, `JK`) VALUES
('ADN01', 'Khairul Azman', 'Lhokseumawe', 'L'),
('ADN02', 'Nishra Ilkhalisya', 'Lhokseumawe', 'P'),
('ADN03', 'M. Fadil Khairunnas', 'Lhokseumawe', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tbakunadmin`
--

CREATE TABLE `tbakunadmin` (
  `username` char(10) NOT NULL,
  `password` char(20) DEFAULT NULL,
  `jabatan` char(30) DEFAULT NULL,
  `idAdmin` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbakunadmin`
--

INSERT INTO `tbakunadmin` (`username`, `password`, `jabatan`, `idAdmin`) VALUES
('ADN01', 'Azman123', 'Admin', 'ADN01'),
('ADN02', 'ADN02', 'Admin', 'ADN02'),
('ADN03', 'ADN03', 'Admin', 'ADN03');

-- --------------------------------------------------------

--
-- Table structure for table `tbakunanggota`
--

CREATE TABLE `tbakunanggota` (
  `username` char(20) NOT NULL,
  `password` char(20) DEFAULT NULL,
  `id_anggota` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbakunanggota`
--

INSERT INTO `tbakunanggota` (`username`, `password`, `id_anggota`) VALUES
('AGT01', 'Azman1111', 'AGT01'),
('AGT02', 'AGT02', 'AGT02');

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `id_anggota` char(10) NOT NULL,
  `Nama` char(20) DEFAULT NULL,
  `Alamat` char(50) DEFAULT NULL,
  `JK` enum('L','P') DEFAULT NULL,
  `jenis_anggota` enum('Guru','Siswa','','') NOT NULL,
  `kd_kelas` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`id_anggota`, `Nama`, `Alamat`, `JK`, `jenis_anggota`, `kd_kelas`) VALUES
('AGT01', 'azman', 'Lhokseumawe', 'L', 'Guru', '-'),
('AGT02', 'Khairul Azman', 'Lhokseumawe', 'L', 'Guru', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbgenre`
--

CREATE TABLE `tbgenre` (
  `id_genre` char(10) NOT NULL,
  `genre` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbgenre`
--

INSERT INTO `tbgenre` (`id_genre`, `genre`) VALUES
('GEN01', 'Buku Pelajaran'),
('GEN02', 'Majalah'),
('GEN03', 'Kamus'),
('GEN04', 'Peta'),
('GEN05', 'Buku UNBK/UAS'),
('GEN06', 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `tbkelas`
--

CREATE TABLE `tbkelas` (
  `kd_kelas` char(10) NOT NULL,
  `nm_kelas` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbkelas`
--

INSERT INTO `tbkelas` (`kd_kelas`, `nm_kelas`) VALUES
('-', '-'),
('IPA01', 'IPA 01'),
('IPA02', 'IPA 02'),
('IPA03', 'IPA 03'),
('IPA04', 'IPA 04'),
('IPA05', 'IPA 05'),
('IPA06', 'IPA 06'),
('IPA07', 'IPA 07'),
('IPA08', 'IPA 08'),
('IPA09', 'IPA 09'),
('IPA10', 'IPA 10'),
('IPS01', 'IPS 01'),
('IPS02', 'IPS 02'),
('IPS03', 'IPS 03'),
('IPS04', 'IPS 04');

-- --------------------------------------------------------

--
-- Table structure for table `tbkoleksi`
--

CREATE TABLE `tbkoleksi` (
  `id_koleksi` char(10) NOT NULL,
  `nm_buku` char(30) DEFAULT NULL,
  `id_penerbit` char(10) DEFAULT NULL,
  `nm_pengarang` char(30) DEFAULT NULL,
  `thn_terbit` char(4) DEFAULT NULL,
  `id_genre` char(10) NOT NULL,
  `jenis_koleksi` enum('Buku Digital','Buku Offline','','') NOT NULL,
  `total_stok` int(4) DEFAULT NULL,
  `sisa_stok` int(4) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbkoleksi`
--

INSERT INTO `tbkoleksi` (`id_koleksi`, `nm_buku`, `id_penerbit`, `nm_pengarang`, `thn_terbit`, `id_genre`, `jenis_koleksi`, `total_stok`, `sisa_stok`, `foto`) VALUES
('K0001', 'Majalah Bobo', 'PEN002', 'Bobo Sitompul', '2005', 'GEN02', 'Buku Digital', 12, 11, 'foto-200505-147d1c831f.jpg'),
('K0004', 'JAVA JDE', 'PEN001', 'Rubiah', '2020', 'GEN01', 'Buku Offline', 10, 10, 'foto-200607-9ed1669bd4.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbpeminjaman`
--

CREATE TABLE `tbpeminjaman` (
  `id_peminjaman` char(10) NOT NULL,
  `id_anggota` char(10) DEFAULT NULL,
  `id_koleksi` char(10) DEFAULT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_harusdikembalikan` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbpeminjaman`
--

INSERT INTO `tbpeminjaman` (`id_peminjaman`, `id_anggota`, `id_koleksi`, `tgl_peminjaman`, `tgl_harusdikembalikan`, `tgl_pengembalian`) VALUES
('P000000001', 'AGT01', 'K0001', '2020-06-14', '2020-06-20', '2020-06-14'),
('P000000002', 'AGT02', 'K0001', '2020-06-14', '2020-06-20', '2020-06-14'),
('P000000003', 'AGT01', 'K0001', '2020-06-14', '2020-06-20', '2020-07-21'),
('P000000004', 'AGT02', 'K0001', '2020-06-14', '2020-06-20', '2020-06-14'),
('P000000005', 'AGT01', 'K0001', '2020-07-21', '2020-07-27', NULL),
('P000000006', 'AGT02', 'K0004', '2020-07-08', '2020-07-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbpenerbit`
--

CREATE TABLE `tbpenerbit` (
  `id_penerbit` char(10) NOT NULL,
  `nm_penerbit` varchar(25) DEFAULT NULL,
  `Alamat` varchar(25) DEFAULT NULL,
  `Telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbpenerbit`
--

INSERT INTO `tbpenerbit` (`id_penerbit`, `nm_penerbit`, `Alamat`, `Telepon`) VALUES
('PEN001', 'ERLANGGA', 'Jl. H. Baping Raya No. 10', '(021) 8717006'),
('PEN002', 'AGROMEDIA PUSTAKA', 'Jl. Haji Montong No 57. C', '(021) 78883030');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id` char(10) NOT NULL,
  `Nama` char(20) DEFAULT NULL,
  `Alamar` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id`, `Nama`, `Alamar`) VALUES
('1', 'Azman 1', 'Kp.jawa Baru 1'),
('2', 'Azman 2', 'Kp.jawa Baru 2'),
('3', 'Azman 3', 'Kp.jawa Baru 4'),
('4', 'Azman 4', 'Kp.jawa Baru 8'),
('5', 'Azman 5', 'Kp.jawa Baru 9'),
('6', 'Azman 6', 'Kp.jawa Baru 8'),
('7', 'Azman 7', 'Kp.jawa Baru 7');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vanggota`
-- (See below for the actual view)
--
CREATE TABLE `vanggota` (
`id_anggota` char(10)
,`Nama` char(20)
,`Alamat` char(50)
,`JK` enum('L','P')
,`jenis_anggota` enum('Guru','Siswa','','')
,`nm_kelas` char(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vbelummengembalikan`
-- (See below for the actual view)
--
CREATE TABLE `vbelummengembalikan` (
`id_peminjaman` char(10)
,`id_anggota` char(10)
,`id_koleksi` char(10)
,`Nama` char(20)
,`nm_buku` char(30)
,`foto` varchar(500)
,`tgl_peminjaman` date
,`tgl_harusdikembalikan` date
,`tgl_pengembalian` date
,`keterlambatan` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vkoleksi`
-- (See below for the actual view)
--
CREATE TABLE `vkoleksi` (
`id_genre` char(10)
,`id_koleksi` char(10)
,`nm_buku` char(30)
,`id_penerbit` char(10)
,`nm_penerbit` varchar(25)
,`nm_pengarang` char(30)
,`thn_terbit` char(4)
,`genre` char(30)
,`jenis_koleksi` enum('Buku Digital','Buku Offline','','')
,`total_stok` int(4)
,`sisa_stok` int(4)
,`foto` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpeminjaman`
-- (See below for the actual view)
--
CREATE TABLE `vpeminjaman` (
`id_peminjaman` char(10)
,`id_anggota` char(10)
,`id_koleksi` char(10)
,`Nama` char(20)
,`nm_buku` char(30)
,`foto` varchar(500)
,`tgl_peminjaman` date
,`tgl_harusdikembalikan` date
,`tgl_pengembalian` date
,`keterlambatan` int(7)
);

-- --------------------------------------------------------

--
-- Structure for view `vanggota`
--
DROP TABLE IF EXISTS `vanggota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vanggota`  AS  select `ta`.`id_anggota` AS `id_anggota`,`ta`.`Nama` AS `Nama`,`ta`.`Alamat` AS `Alamat`,`ta`.`JK` AS `JK`,`ta`.`jenis_anggota` AS `jenis_anggota`,`tk`.`nm_kelas` AS `nm_kelas` from (`tbanggota` `ta` join `tbkelas` `tk`) where `ta`.`kd_kelas` = `tk`.`kd_kelas` group by `ta`.`id_anggota` ;

-- --------------------------------------------------------

--
-- Structure for view `vbelummengembalikan`
--
DROP TABLE IF EXISTS `vbelummengembalikan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbelummengembalikan`  AS  select `tp`.`id_peminjaman` AS `id_peminjaman`,`tp`.`id_anggota` AS `id_anggota`,`tp`.`id_koleksi` AS `id_koleksi`,`ta`.`Nama` AS `Nama`,`tk`.`nm_buku` AS `nm_buku`,`tk`.`foto` AS `foto`,`tp`.`tgl_peminjaman` AS `tgl_peminjaman`,`tp`.`tgl_harusdikembalikan` AS `tgl_harusdikembalikan`,`tp`.`tgl_pengembalian` AS `tgl_pengembalian`,to_days(current_timestamp()) - to_days(`tp`.`tgl_harusdikembalikan`) AS `keterlambatan` from ((`tbpeminjaman` `tp` join `tbkoleksi` `tk`) join `tbanggota` `ta`) where `tp`.`id_anggota` = `ta`.`id_anggota` and `tp`.`id_koleksi` = `tk`.`id_koleksi` and `tp`.`tgl_pengembalian` is null ;

-- --------------------------------------------------------

--
-- Structure for view `vkoleksi`
--
DROP TABLE IF EXISTS `vkoleksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vkoleksi`  AS  select `tk`.`id_genre` AS `id_genre`,`tk`.`id_koleksi` AS `id_koleksi`,`tk`.`nm_buku` AS `nm_buku`,`tk`.`id_penerbit` AS `id_penerbit`,`tp`.`nm_penerbit` AS `nm_penerbit`,`tk`.`nm_pengarang` AS `nm_pengarang`,`tk`.`thn_terbit` AS `thn_terbit`,`tg`.`genre` AS `genre`,`tk`.`jenis_koleksi` AS `jenis_koleksi`,`tk`.`total_stok` AS `total_stok`,`tk`.`sisa_stok` AS `sisa_stok`,`tk`.`foto` AS `foto` from ((`tbkoleksi` `tk` join `tbpenerbit` `tp`) join `tbgenre` `tg`) where `tk`.`id_penerbit` = `tp`.`id_penerbit` and `tk`.`id_genre` = `tg`.`id_genre` order by `tk`.`id_koleksi` ;

-- --------------------------------------------------------

--
-- Structure for view `vpeminjaman`
--
DROP TABLE IF EXISTS `vpeminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpeminjaman`  AS  select `tp`.`id_peminjaman` AS `id_peminjaman`,`tp`.`id_anggota` AS `id_anggota`,`tp`.`id_koleksi` AS `id_koleksi`,`ta`.`Nama` AS `Nama`,`tk`.`nm_buku` AS `nm_buku`,`tk`.`foto` AS `foto`,`tp`.`tgl_peminjaman` AS `tgl_peminjaman`,`tp`.`tgl_harusdikembalikan` AS `tgl_harusdikembalikan`,`tp`.`tgl_pengembalian` AS `tgl_pengembalian`,to_days(current_timestamp()) - to_days(`tp`.`tgl_harusdikembalikan`) AS `keterlambatan` from ((`tbpeminjaman` `tp` join `tbkoleksi` `tk`) join `tbanggota` `ta`) where `tp`.`id_anggota` = `ta`.`id_anggota` and `tp`.`id_koleksi` = `tk`.`id_koleksi` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbakunadmin`
--
ALTER TABLE `tbakunadmin`
  ADD PRIMARY KEY (`username`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indexes for table `tbakunanggota`
--
ALTER TABLE `tbakunanggota`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `kd_kelas` (`kd_kelas`);

--
-- Indexes for table `tbgenre`
--
ALTER TABLE `tbgenre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `tbkelas`
--
ALTER TABLE `tbkelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `tbkoleksi`
--
ALTER TABLE `tbkoleksi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `tbpeminjaman`
--
ALTER TABLE `tbpeminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_koleksi` (`id_koleksi`);

--
-- Indexes for table `tbpenerbit`
--
ALTER TABLE `tbpenerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbakunadmin`
--
ALTER TABLE `tbakunadmin`
  ADD CONSTRAINT `tbakunadmin_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `tbadmin` (`idAdmin`);

--
-- Constraints for table `tbakunanggota`
--
ALTER TABLE `tbakunanggota`
  ADD CONSTRAINT `akunanggota_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tbanggota` (`id_anggota`);

--
-- Constraints for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD CONSTRAINT `tbanggota_ibfk_1` FOREIGN KEY (`kd_kelas`) REFERENCES `tbkelas` (`kd_kelas`),
  ADD CONSTRAINT `tbanggota_ibfk_2` FOREIGN KEY (`kd_kelas`) REFERENCES `tbkelas` (`kd_kelas`);

--
-- Constraints for table `tbkoleksi`
--
ALTER TABLE `tbkoleksi`
  ADD CONSTRAINT `tbkoleksi_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `tbpenerbit` (`id_penerbit`),
  ADD CONSTRAINT `tbkoleksi_ibfk_3` FOREIGN KEY (`id_genre`) REFERENCES `tbgenre` (`id_genre`);

--
-- Constraints for table `tbpeminjaman`
--
ALTER TABLE `tbpeminjaman`
  ADD CONSTRAINT `tbpeminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tbanggota` (`id_anggota`),
  ADD CONSTRAINT `tbpeminjaman_ibfk_2` FOREIGN KEY (`id_koleksi`) REFERENCES `tbkoleksi` (`id_koleksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
