-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2020 pada 04.04
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponny`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `skin_type`
--

CREATE TABLE `skin_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skin_type`
--

INSERT INTO `skin_type` (`id`, `name`, `slug`, `icon`) VALUES
(1, 'Kulit Berminyak', 'kulit-berminyak', 'oily-skin.png'),
(2, 'Kulit Kombinasi', 'kulit-kombinasi', 'combination-skin.png'),
(3, 'Kulit Normal', 'kulit-normal', 'normal-skin.png'),
(4, 'Kulit Kering', 'kulit-kering', 'dry-skin.png'),
(5, 'Kulit Sensitif', 'kulit-sensitif', 'sensitive-skin.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `skin_type`
--
ALTER TABLE `skin_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `skin_type`
--
ALTER TABLE `skin_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
