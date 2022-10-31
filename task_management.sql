-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 31 Okt 2022 pada 12.53
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `status` enum('New','On Progress','Finish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tasks`
--

INSERT INTO `tasks` (`id`, `category_id`, `title`, `description`, `start_date`, `finish_date`, `status`) VALUES
(3, 7, 'Analisis market size produk AAA', 'Market size adalah persentase dari total pendapatan atau penjualan di pasar yang dibuat oleh bisnis perusahaan. Misalnya, jika ada 50.000 unit terjual per tahun di industri tertentu, perusahaan yang penjualannya 5.000 unit akan memiliki 10 persen pangsa pasar itu.', '2022-10-03', '2022-10-10', 'Finish'),
(4, 5, 'Prototype Aplikasi Buku Pintar', 'Prototype adalah standar ukuran dari sebuah entitas. Dalam bidang desain, sebuah prototipe dibuat sebelum dikembangkan atau justru dibuat khusus untuk pengembangan sebelum dibuat dalam skala sebenarnya atau sebelum diproduksi secara massal', '2022-10-10', '2022-10-17', 'On Progress'),
(5, 6, 'Pembuatan UI / UX aplikasi Buku Pintar', 'UI Design adalah tampilan produk yang ingin kita perlihatkan (yang visible atau bisa dilihat oleh mata). UX adalah memastikan bahwa langkah demi langkah berjalan dengan logis dan jelas, serta memahami kebutuhan user', '2022-10-24', '2022-11-07', 'New'),
(6, 8, 'Pengembangan Aplikasi Buku Pintar', 'Developer adalah adalah profesi yang menulis program perangkat lunak menggunakan bahasa pemrograman ', '2022-11-14', '2022-12-05', 'New'),
(11, 7, 'Analisis System Jadwal Pelajaran', 'Analisis system kebutuhan client terkait aplikasi jadwal yang akan di buat', '2022-10-28', '2022-10-30', 'Finish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_categories`
--

CREATE TABLE `task_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `task_categories`
--

INSERT INTO `task_categories` (`id`, `name`) VALUES
(5, 'Prototype'),
(6, 'UI / UX Design'),
(7, 'Analysis'),
(8, 'Developer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_fl_task_categories` (`category_id`);

--
-- Indeks untuk tabel `task_categories`
--
ALTER TABLE `task_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `task_categories`
--
ALTER TABLE `task_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_fl_task_categories` FOREIGN KEY (`category_id`) REFERENCES `task_categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
