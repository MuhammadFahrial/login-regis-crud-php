-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2022 pada 07.00
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id` int(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mhs`
--

INSERT INTO `tb_mhs` (`id`, `foto`, `nama`, `nim`, `jurusan`, `email`) VALUES
(50, '62c4bf1bbcf80.jpg', 'Farhan', '13020190008', 'Kedokteran', 'farhan@gmail.com'),
(54, '62cb667a7c806.jpg', 'Rial', '13020190028', 'Teknik Informatika', 'Rial@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(3, 'andimuhammadfahrials@gmail.com', 'rial', '$2y$10$ywXJXj8Gr3oWTKkY9lOGCu40pFeTkUDL1gflUmpD22Ldnc2xiBjP.'),
(4, 'gareth.akbar.ga@gmail.com', 'admin', '$2y$10$RFLMr4PXsP3v9LazuJPvXeNOTFtl5UNi4zFr4MFMe4bk426Fzh0rC'),
(5, 'TUndercover2021@gmail.com', 'qwe', '$2y$10$8XXXowKk0lw2auBtNbyx0eWSHdFtwNlCfIaM0AnvIARcY69zRRUju'),
(6, 'gareth.akbar.ga@gmail.com', 'qwert', '$2y$10$caUbI0JvMECY.72ZPIer3.83Baz8PG.oVB65QBmRqf87bEA5zAYAC'),
(7, 'sahrul@gmail.com', 'sahrul', '$2y$10$L0vv659dZuk7OR8RljtJ3ezcBen8.tba9EWH0I5RokvpNLEMmYH0i');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
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
-- AUTO_INCREMENT untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
