-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2026 at 05:02 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes_sirojul_quran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$gnyV3nWmjEndEvUG13j6/ulkrBQiTKF/oO1I6Etd..oEqGBWLMV/K'),
(2, 'admin2', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(1, 'Kegiatan Muhadoroh Santri', 'Kegiatan muhadoroh dilaksanakan setiap malam Jumat untuk melatih keberanian santri dalam berbicara di depan umum dan meningkatkan kemampuan dakwah.', 'logo.png\r\n', '2026-04-20'),
(5, 'FASILITAS', 'ada lapangan', '69ede3b477540.png', '2026-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `foto`, `deskripsi`) VALUES
(2, 'banner.jpg', 'Dokumentasi kegiatan pondok pesantren'),
(4, 'logo.png', 'mengaji');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `jabatan`, `foto`) VALUES
(1, 'Bambang Pamungkas', 'guru', 'WhatsApp Image 2026-04-23 at 22.51.02.jpeg'),
(2, 'adsd', 'guru', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int NOT NULL,
  `jam` varchar(100) NOT NULL,
  `kegiatan` text NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `jam`, `kegiatan`, `keterangan`) VALUES
(1, '03.30 - 04.00', 'Bangun tidur dan Tahajud / Menghafal / Sahur', 'Santri'),
(2, '04.00 - 05.00', 'Persiapan Sholat Subuh Berjamaah', 'Masjid An-Nimah'),
(3, '05.00 - 06.30', 'Persiapan Berangkat ke Sekolah', 'Pondok'),
(4, '06.30 - 14.00', 'Kegiatan Sekolah', 'Sekolah'),
(5, '14.00 - 16.00', 'Ashar & Istirahat', 'Aula'),
(6, '16.00 - 17.30', 'Sholat Ashar Berjamaah', 'Masjid An-Nimah'),
(7, '17.30 - 18.30', 'Ta\'lim Sore', 'Aula'),
(8, '18.30 - 19.00', 'Persiapan Maghrib', 'Kamar Masing-masing'),
(9, '19.00 - 19.30', 'Sholat Maghrib Berjamaah', 'Masjid An-Nimah'),
(10, '19.30 - 20.00', 'Dzikir & Makan Malam', 'Aula'),
(11, '20.00 - 20.30', 'Sholat Isya Berjamaah', 'Masjid An-Nimah'),
(12, '20.30 - 21.00', 'Ta\'lim Malam', 'Aula'),
(13, '21.00 - 22.00', 'Belajar dan Menghafal', 'Aula'),
(14, '22.00 - 03.30', 'Istirahat / Tidur', 'Aula');

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id` int NOT NULL,
  `isi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `misi`
--

INSERT INTO `misi` (`id`, `isi`) VALUES
(1, 'Mencetak generasi yang berilmu, bertaqwa, disiplin, mandiri, berpertasi dan berakhlak mulia.'),
(2, 'Membekali dan mempasilitasi santri agar menjadi penghafal Al-Qur\'an, mengenal ajaran islam yang berakidah ahlus Sunnah wal jama\'ah dan mengamalkan islam dalam kehidupan sehari-hari');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id` int NOT NULL,
  `hari` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id`, `hari`, `nama`) VALUES
(1, 'Senin', 'Ust. Abdul Kholik'),
(2, 'Selasa', 'Ust. Muhammad Irfan'),
(3, 'Rabu', 'Ust. Saadavi'),
(4, 'Kamis', 'Ust. Ridwan'),
(5, 'Jum\'at', 'Ust. Faisal'),
(6, 'Sabtu', 'Ust. Fikri');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `pimpinan` varchar(255) DEFAULT NULL,
  `tahun_berdiri` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `waktu_belajar` varchar(255) DEFAULT NULL,
  `tempat_belajar` varchar(255) DEFAULT NULL,
  `status_tempat` varchar(255) DEFAULT NULL,
  `materi` text,
  `jumlah_pengajar` varchar(100) DEFAULT NULL,
  `jumlah_santri_mukim` varchar(100) DEFAULT NULL,
  `jumlah_santri_non_mukim` varchar(100) DEFAULT NULL,
  `kegiatan_lainnya` text,
  `pengajian_masyarakat` varchar(255) DEFAULT NULL,
  `sumber_dana` varchar(255) DEFAULT NULL,
  `biaya_pondok` varchar(255) DEFAULT NULL,
  `rekening` varchar(255) DEFAULT NULL,
  `qris` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `pimpinan`, `tahun_berdiri`, `alamat`, `no_hp`, `email`, `waktu_belajar`, `tempat_belajar`, `status_tempat`, `materi`, `jumlah_pengajar`, `jumlah_santri_mukim`, `jumlah_santri_non_mukim`, `kegiatan_lainnya`, `pengajian_masyarakat`, `sumber_dana`, `biaya_pondok`, `rekening`, `qris`, `logo`) VALUES
(1, 'SIROJUL QUR\'AN', 'KH. ABDUL ROZAQ, S.Pd.I', '2022', 'Jl. Cendrawasih Perumahan Villa Japos Blok D/12 Rt. 01/08 Jurangmangu Barat, Pondok Aren, Tangerang Selatan Banten', '0857 1547 0971', '-', 'Pagi, Siang, Sore dan Malam', 'Rumah', 'Hak Guna Pakai', 'Tahsin, Tahfidz, Tilawah, Tajwid dan Kutub Al-Turats', 'Laki-laki 7 Orang', 'Laki-laki 15 Orang', 'Laki-laki 15 Orang dan Perempuan 5 Orang', 'Hadroh, Futsal, Pembacaan Ratibul Haddad, Pembacaan Maulid Nabi dan Aqidatul Awam, Seni Baca Qur\'an', 'Ada', 'Tidak Mengikat', 'Gratis', NULL, NULL, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text,
  `tahun` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id`, `judul`, `isi`, `tahun`) VALUES
(1, 'Awal Berdirinya Pondok', 'Pondok Pesantren Sirojul Qur`an didirikan dengan tujuan mencetak generasi islami yang berilmu, berakhlak, dan berprestasi...', '2005');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `nama`, `jabatan`, `foto`, `urutan`) VALUES
(1, 'Ust. H. Abdul Rozaq, S.Pd.I', 'Pimpinan Pondok Pesantren', NULL, 1),
(2, 'Ust. Miftahul Arifin, S.Pd', 'Wakil Pimpinan', NULL, 2),
(3, 'Ust. M. Irfan', 'Sekretaris', NULL, 3),
(4, 'Ust. Ridwan Aruzi', 'Bendahara', NULL, 4),
(5, 'Ust. Sa\'adavi', 'Bid. Keamanan', NULL, 5),
(6, 'Ust. Faisal Pasha', 'Bid. Kebersihan', NULL, 6),
(7, 'Ust. Idris', 'Bid. Pendidikan', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `file_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `judul`, `file_video`) VALUES
(1, 'kegiatan santri', 'ponpes2.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` int NOT NULL,
  `isi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visi`
--

INSERT INTO `visi` (`id`, `isi`) VALUES
(1, 'Menjadikan Insan-Insan yang Berjiwa Qur\'ani dan Berakhlak Mulia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
