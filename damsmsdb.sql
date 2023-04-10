-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2023 pada 09.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damsmsdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl`
--

CREATE TABLE `tbl` (
  `ID` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(1) NOT NULL,
  `MobileNumber` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl`
--

INSERT INTO `tbl` (`ID`, `email`, `password`, `role`, `MobileNumber`) VALUES
(1, 'anu@gmail.com', '202cb962ac59075b964b07152d234b70', '2', '9787979798'),
(2, 'pra@gmail.com', '202cb962ac59075b964b07152d234b70', '2', '6464654646'),
(3, 'gs123@test.com', '202cb962ac59075b964b07152d234b70', '2', '14253625'),
(4, 'skmr123@test.com', '202cb962ac59075b964b07152d234b70', '2', '1231231230'),
(5, 'djae123@test', '202cb962ac59075b964b07152d234b70', '2', '8111456783'),
(6, 'saribu0204@Test', '202cb962ac59075b964b07152d234b70', '2', '8133829445'),
(7, 'adi123@gmail.com', '202cb962ac59075b964b07152d234b70', '2', '9888867433'),
(8, 'abdul123@test', '202cb962ac59075b964b07152d234b70', '2', '85666372119'),
(9, 'adang123@test', '202cb962ac59075b964b07152d234b70', '2', '99888654321'),
(10, 'chumaidi123@gmail.co', '202cb962ac59075b964b07152d234b70', '2', '765834577'),
(11, 'abdi123@gmail.com', '202cb962ac59075b964b07152d234b70', '2', '89797665523'),
(12, 'abdul123@test', '202cb962ac59075b964b07152d234b70', '2', '9888867432'),
(13, 'Thema123@test', '202cb962ac59075b964b07152d234b70', '2', '8133829446'),
(14, 'adinda123@test', '202cb962ac59075b964b07152d234b70', '2', '85666372118'),
(15, 'aan123@test', '202cb962ac59075b964b07152d234b70', '2', '89797665521'),
(16, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '9898908070');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AppointmentNumber` int(10) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `MobileNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Doctor` int(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AppointmentNumber`, `Name`, `MobileNumber`, `Email`, `AppointmentDate`, `AppointmentTime`, `Specialization`, `Doctor`, `Message`, `ApplyDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 141561395, 'Rajesh Kaur', '989', 'raj@gmail.com', '2022-11-12', '12:41:00', '2', 2, 'Thanks', '2022-11-10 06:11:50', 'Cancelled due to incorrect mobile number', 'Cancelled', '2022-11-10 12:40:35'),
(2, 499219152, 'Mukesh Yadav', '7977797979', 'mukesh@gmail.com', '2022-11-13', '12:30:00', '2', 2, 'bmnbmngfugwakJDiowhfdgr', '2022-11-10 07:08:58', 'Your appointment has been approved, kindly came at mention time', 'Approved', '2022-11-10 12:34:41'),
(3, 485109480, 'Tina Yadav', '4654564464', 'tina@gmail.com', '2022-11-11', '13:00:00', '1', 1, 'bjnbjh', '2022-11-10 12:08:51', 'Appointment request has been approved', 'Approved', '2022-11-10 14:32:29'),
(4, 611388102, 'Jyoti', '7897987987', 'jyoti@gmail.com', '2022-11-12', '02:00:00', '1', 1, 'Thanks', '2022-11-10 14:31:17', NULL, NULL, NULL),
(5, 607441873, 'Anuj kumar', '1425362514', 'anujkkk@hmak.com', '2022-11-16', '20:50:00', '1', 1, 'NA', '2022-11-11 01:19:37', NULL, NULL, NULL),
(6, 667282012, 'Rahul', '1425251414', 'rk@gmail.com', '2022-11-15', '18:31:00', '2', 2, 'NA', '2022-11-11 01:48:52', 'Approved', 'Approved', '2022-11-11 07:24:25'),
(7, 599829368, 'Anita', '4563214563', 'anta@test.com', '2022-11-25', '15:20:00', '2', 2, 'NA', '2022-11-11 01:49:54', NULL, NULL, NULL),
(8, 940019123, 'Amit Kumar', '1425362514', 'amitkr123@test.com', '2022-11-15', '12:30:00', '13', 4, 'NA', '2022-11-11 01:56:17', 'Your appointment has been approved.', 'Approved', '2022-11-11 01:56:55'),
(9, 811517340, 'dian eka', '08133821', 'anu@gmail.com', '2022-12-20', '06:34:00', '8', 11, '', '2022-12-16 01:34:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldoctor`
--

CREATE TABLE `tbldoctor` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `MobileNumber` varchar(13) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Password` varchar(259) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbldoctor`
--

INSERT INTO `tbldoctor` (`ID`, `FullName`, `MobileNumber`, `Email`, `Specialization`, `Password`, `CreationDate`, `role`) VALUES
(1, 'Dr. Anusakha Singh', '9787979798', 'anu@gmail.com', '1', 'f85482b140e528bc2e3ce555e502ed32', '2022-11-09 15:01:11', ''),
(2, 'Dr. Pradeep Chauhan', '6464654646', 'pra@gmail.com', '2', '5806325fbf4c1e879891a4f48237b9b9', '2022-11-09 15:01:59', ''),
(3, 'Garima Singh', '14253625', 'gs123@test.com', '3', 'e63f56d891426b54ad592f0f5537b17a', '2022-11-11 01:28:44', ''),
(4, 'Shiv Kumar Singh', '1231231230', 'skmr123@test.com', '4', '2f8dd83a23b9ab0601e134123e9a0d9b', '2022-11-11 01:54:44', ''),
(5, 'Dr. A. Djaenudin', '8111456783', 'djae123@test', '3', '0b7372ecb928215f28a646385fb2fcd4', '2022-11-29 14:47:59', ''),
(6, 'Dr. A. D. Pasaribu', '8133829445', 'saribu0204@Test', '5', '05be2014a8f408fea6e6c37ac73c3096', '2022-11-29 14:50:32', ''),
(7, 'Dr. Adi Pratama', '9888867433', 'adi123@gmail.com', '11', '2380822f5400a5f7a835546b057b1373', '2022-11-29 14:53:16', ''),
(8, 'Prof. Dr. dr. Abdul Qadar', '85666372119', 'abdul123@test', '13', '305abf7afd55b4abf0a6af207146b6a2', '2022-11-29 14:54:59', ''),
(9, 'dr. Adang Sunandar', '99888654321', 'adang123@test', '7', '805c83360a951c7208f1ee054784cedd', '2022-11-29 14:56:58', ''),
(10, 'dr. Achmad Chumaidi', '765834577', 'chumaidi123@gmail.com', '12', '6699b106c472bf44f11e5da46c1eac93', '2022-11-29 14:58:48', ''),
(11, 'dr. Abdi Kelana', '89797665523', 'abdi123@gmail.com', '8', '9e8a6110afe75f3a2458b0d99a62626f', '2022-11-29 15:00:24', ''),
(12, 'dr. Abdul Hakim Alkatiri', '9888867432', 'abdul123@test', '10', '428a78b4fee47253898d7918c0a09160', '2022-11-29 15:02:18', ''),
(13, 'dr. Archia Thema Maliny', '8133829446', 'Thema123@test', '9', '099129aef1511f3836cb62a46b6e05ab', '2022-11-29 15:04:43', ''),
(14, 'dr. Adinda Marita', '85666372118', 'adinda123@test', '6', '811ee5d0145a1aa502c01c9fd2319772', '2022-11-29 15:07:36', ''),
(15, 'drg. Aan Afrianto', '89797665521', 'aan123@test', '14', 'aa5f2bc8d375df527d301c8ec84728f3', '2022-11-29 15:09:43', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblemployee`
--

CREATE TABLE `tblemployee` (
  `ID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `MobileNumber` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblemployee`
--

INSERT INTO `tblemployee` (`ID`, `Name`, `MobileNumber`, `email`, `password`, `role`) VALUES
(16, 'admin', '9898908070', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbljadwal`
--

CREATE TABLE `tbljadwal` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Specialization` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hari` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbljadwal`
--

INSERT INTO `tbljadwal` (`ID`, `FullName`, `Specialization`, `hari`, `waktu`) VALUES
(1, 'Dr. Anusakha Singh', 'Ortopedi', 'senin,selasa', '08.00 - 11.00 WIB'),
(2, 'Dr. Pradeep Chauhan', 'Penyakit Dalam', 'rabu,jumat', '11.00 - 14.00 WIB'),
(3, 'Dr. Admin', 'Penyakit Dalam', 'kamis,sabtu', '08.00 - 11.00 WIB'),
(4, 'Garima Singh', 'Kandungan dan Kebidanan', 'senin,selasa,rabu', '11.00 - 14.00 WIB'),
(5, 'Dr. A. Djaenudin', 'Kandungan dan Kebidanan', 'kamis,jumat,sabtu', '08.00 - 11.00 WIB'),
(6, 'Shiv Kumar Singh', 'Dermatologi', 'senin,rabu', '08.00 - 15.00 WIB'),
(7, 'Dr. A. D. Pasaribu', 'Anak', 'selasa,kamis', '11.00 - 16.00 WIB'),
(8, 'dr. Adinda Marita', 'Bedah Plastik', 'senin,rabu', '11.00 - 14.00 WIB'),
(9, 'dr. Adang Sunandar', 'Bedah Umum', 'jumat,sabtu', '08.00 - 11.00 WIB'),
(10, 'dr. Abdi Kelana', 'Mata', 'senin,selasa,jumat', '11.00 - 14.00 WIB'),
(11, 'dr. Archia Thema Maliny', 'Dokter Umum', 'senin,rabu', '08.00 - 11.00 WIB'),
(12, 'dr. Abdul Hakim Alkatiri', 'Jantung dan Pembuluh Darah', 'selasa,kamis', '13.00 - 18.00 WIB'),
(13, 'Dr. Adi Pratama', 'Anestesi', 'senin,rabu', '11.00 - 14.00 WIB'),
(14, 'dr. Achmad Chumaidi', 'Jiwa', 'jumat,sabtu', '08.00 - 11.00 WIB'),
(15, 'Prof. Dr. dr. Abdul Qadar', 'THT', 'senin,selasa', '08.00 - 11.00 WIB'),
(16, 'drg. Aan Afrianto', 'Gigi', 'rabu,jumat', '11.00 - 14.00 WIB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(12) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'Tentang Kami', '<div><font color=\"#202124\" face=\"arial, sans-serif\"><b>On-Clinic merupakan karya buatan Teknik Elektro UNS.</b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b><br></b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b>Untuk membuat kenyamanan pasien.</b></font></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'Jl. Ir. Sutami No.36, Kentingan, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126', 'TEAM2@gmail.com', '082329421120', NULL, '08.00 WIB - 22.00 WIB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblspecialization`
--

CREATE TABLE `tblspecialization` (
  `ID` int(5) NOT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblspecialization`
--

INSERT INTO `tblspecialization` (`ID`, `Specialization`, `CreationDate`) VALUES
(1, 'Ortopedi', '2022-11-09 14:22:33'),
(2, 'Penyakit Dalam', '2022-11-09 14:23:42'),
(3, 'Kandungan dan Kebidanan', '2022-11-09 14:24:14'),
(4, 'Dermatologi', '2022-11-09 14:24:42'),
(5, 'Anak', '2022-11-09 14:25:06'),
(6, 'Bedah Plastik', '2022-11-09 14:25:31'),
(7, 'Bedah Umum', '2022-11-09 14:25:52'),
(8, 'Mata', '2022-11-09 14:27:18'),
(9, 'Dokter Umum', '2022-11-09 14:27:52'),
(10, 'Jantung dan Pembuluh Darah', '2022-11-09 14:28:32'),
(11, 'Anestesi', '2022-11-09 14:29:12'),
(12, 'Jiwa', '2022-11-09 14:29:51'),
(13, 'THT', '2022-11-09 14:30:13'),
(14, 'Gigi', '2022-11-29 14:41:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl`
--
ALTER TABLE `tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tbldoctor`
--
ALTER TABLE `tbldoctor`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tbljadwal`
--
ALTER TABLE `tbljadwal`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tblspecialization`
--
ALTER TABLE `tblspecialization`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl`
--
ALTER TABLE `tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbldoctor`
--
ALTER TABLE `tbldoctor`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbljadwal`
--
ALTER TABLE `tbljadwal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tblspecialization`
--
ALTER TABLE `tblspecialization`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
