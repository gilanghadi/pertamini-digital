-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2023 pada 10.13
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertamini`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_bakar`
--

CREATE TABLE `bahan_bakar` (
  `id` int(11) NOT NULL,
  `bahan_bakar` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `liter` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bahan_bakar`
--

INSERT INTO `bahan_bakar` (`id`, `bahan_bakar`, `harga`, `liter`) VALUES
(1, 'Pertamax Racing', 42000, 1),
(2, 'Pertamax Turbo', 15100, 1),
(3, 'Pertamax', 13300, 1),
(4, 'Pertalite', 10000, 1),
(5, 'Pertamina Dex', 13550, 1),
(6, 'Dexlite', 12650, 1),
(7, 'Bio Solar', 6800, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_model`
--

CREATE TABLE `order_model` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bahan_bakar_id` int(11) NOT NULL,
  `harga` int(255) NOT NULL,
  `jumlah_uang` int(255) NOT NULL,
  `jumlah_liter` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_model`
--

CREATE TABLE `user_model` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `retype_password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_bakar`
--
ALTER TABLE `bahan_bakar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_model`
--
ALTER TABLE `order_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bahan_bakar_id` (`bahan_bakar_id`);

--
-- Indeks untuk tabel `user_model`
--
ALTER TABLE `user_model`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_bakar`
--
ALTER TABLE `bahan_bakar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `order_model`
--
ALTER TABLE `order_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `user_model`
--
ALTER TABLE `user_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order_model`
--
ALTER TABLE `order_model`
  ADD CONSTRAINT `bahan_bakar_id` FOREIGN KEY (`bahan_bakar_id`) REFERENCES `bahan_bakar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
