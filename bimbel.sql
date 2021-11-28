-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 11:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idGuru` int(11) NOT NULL,
  `namaGuru` varchar(100) NOT NULL,
  `tanggalLahirGuru` date NOT NULL,
  `alamatGuru` varchar(255) NOT NULL,
  `noTelpGuru` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idGuru`, `namaGuru`, `tanggalLahirGuru`, `alamatGuru`, `noTelpGuru`) VALUES
(1, 'Jhosephine', '1990-08-28', 'Godean, Yogyakarta', '085345432657'),
(2, 'Jaguar', '2021-11-15', 'Kajar, Pati', '083234174254');

-- --------------------------------------------------------

--
-- Table structure for table `kelasmapel`
--

CREATE TABLE `kelasmapel` (
  `idKelasMapel` int(11) NOT NULL,
  `kodeMapel` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `idGuru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kodeMapel` varchar(10) NOT NULL,
  `namaMapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `idPresensi` int(11) NOT NULL,
  `idKelasMapel` int(11) NOT NULL,
  `pertemuanKe` int(3) NOT NULL,
  `idSiswa` int(11) NOT NULL,
  `tanggalPertemuan` date NOT NULL DEFAULT current_timestamp(),
  `idGuru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registrasikelas`
--

CREATE TABLE `registrasikelas` (
  `idSiswa` int(11) NOT NULL,
  `idKelasMapel` int(11) NOT NULL,
  `nilaiAkhir` int(3) NOT NULL,
  `predikat` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idSiswa` int(11) NOT NULL,
  `namaSiswa` varchar(100) NOT NULL,
  `tanggalLahirSiswa` date NOT NULL,
  `alamatSiswa` varchar(200) NOT NULL,
  `noTelpSiswa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `namaSiswa`, `tanggalLahirSiswa`, `alamatSiswa`, `noTelpSiswa`) VALUES
(3, 'Jono', '2021-11-15', 'Sagan No. 10, Yogyakarta', '081293817281'),
(6, 'Tika', '2021-11-16', 'Jalan Kaliurang Km. 7, Yogyakarta', '082675674635');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idGuru`);

--
-- Indexes for table `kelasmapel`
--
ALTER TABLE `kelasmapel`
  ADD PRIMARY KEY (`idKelasMapel`,`kodeMapel`,`kelas`),
  ADD KEY `fk_idGuru_guru` (`idGuru`),
  ADD KEY `fk_kodeMapel_mapel` (`kodeMapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kodeMapel`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`idPresensi`,`idKelasMapel`,`pertemuanKe`,`idSiswa`),
  ADD KEY `id_kelas` (`idKelasMapel`),
  ADD KEY `id_siswa` (`idSiswa`);

--
-- Indexes for table `registrasikelas`
--
ALTER TABLE `registrasikelas`
  ADD PRIMARY KEY (`idSiswa`,`idKelasMapel`),
  ADD KEY `fk_idKelasMapel_kelasMapel` (`idKelasMapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idSiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idGuru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelasmapel`
--
ALTER TABLE `kelasmapel`
  MODIFY `idKelasMapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `idPresensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idSiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelasmapel`
--
ALTER TABLE `kelasmapel`
  ADD CONSTRAINT `fk_idGuru_guru` FOREIGN KEY (`idGuru`) REFERENCES `guru` (`idGuru`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kodeMapel_mapel` FOREIGN KEY (`kodeMapel`) REFERENCES `mapel` (`kodeMapel`) ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `id_kelas` FOREIGN KEY (`idKelasMapel`) REFERENCES `kelasmapel` (`idKelasMapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_siswa` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registrasikelas`
--
ALTER TABLE `registrasikelas`
  ADD CONSTRAINT `fk_idKelasMapel_kelasMapel` FOREIGN KEY (`idKelasMapel`) REFERENCES `kelasmapel` (`idKelasMapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idSiswa_siswa` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
