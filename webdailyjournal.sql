-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2026 pada 15.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Pegunungan', 'Deretan pegunungan Indonesia menawarkan pemandangan yang menyejukkan dengan udara segar dan panorama hijau yang luas. Setiap puncaknya menyuguhkan keheningan dan keindahan alam yang memukau mata, menghadirkan rasa damai bagi siapa pun yang memandangnya', '20260106212750.jpg', '2025-11-17 08:27:54', 'admin'),
(2, 'Dasar Laut', 'Keindahan bawah laut Indonesia menyimpan ribuan jenis terumbu karang dan biota laut yang menakjubkan. Warna-warni ikan dan panorama alami di kedalaman laut menjadi surga bagi para penyelam dan pecinta alam', 'dasarlaut.jpg', '2025-11-15 08:33:48', 'admin'),
(3, 'Danau', 'Danau-danau di Indonesia menyajikan suasana tenang dengan air yang jernih dan pemandangan sekitar yang asri. Tempat ini menjadi destinasi sempurna untuk melepas penat dan menikmati ketenangan alam', 'danau.jpeg', '2025-11-15 09:19:07', 'admin'),
(11, 'Persawahan', 'Persawahan Indonesia membentang hijau mengikuti kontur alam dengan petak-petak rapi yang menenangkan. Irama alam dan kesederhanaan lanskapnya menghadirkan keindahan yang hangat dan menyejukkan', '20260106212439.jpg', '2025-11-17 08:24:39', 'admin'),
(12, 'Sabana', 'Hamparan sabana Indonesia menampilkan bentang alam terbuka dengan rumput luas dan pepohonan yang tersebar. Latar pegunungan dan langit lepas menghadirkan suasana tenang serta keindahan alami yang memanjakan mata', '20260106212303.jpg', '2025-11-17 08:13:03', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Pantai', 'Pantai adalah tempat bertemunya daratan dan laut, dengan hamparan pasir, debur ombak, dan angin laut yang menenangkan', '20260115160142.jpg', '2026-01-15 16:01:42', 'april'),
(2, 'Sungai', 'Sungai adalah aliran air yang mengalir dari hulu ke hilir, menghidupi alam sekitar dan menjadi sumber kehidupan', 'sungai.jpg', '2025-11-19 08:44:18', 'admin'),
(3, 'Hutan', 'Hutan merupakan kawasan hijau yang dipenuhi pepohonan lebat, menjadi rumah bagi berbagai makhluk hidup dan penjaga keseimbangan alam', 'hutan.jpg', '2025-11-19 08:44:18', 'admin'),
(4, 'Matahari', 'Matahari adalah sumber cahaya dan panas bagi bumi, memberi energi dan kehidupan bagi seluruh makhluk', 'matahari.jpg', '2025-11-19 08:47:13', 'admin'),
(5, 'Kawah', 'Kawah adalah cekungan di permukaan bumi yang terbentuk akibat aktivitas vulkanik, sering mengeluarkan gas, asap, atau air panas, dan menjadi tanda kekuatan alam dari dalam bumi', 'kawah.jpg', '2025-11-19 08:47:13', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'profile_1_1768481463.jpg'),
(2, 'april', '37d153a06c79e99e4de5889dbe2e7c57', 'profile_2_1768481424.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
