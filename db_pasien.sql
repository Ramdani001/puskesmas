-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 16 Jan 2023 pada 09.30
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pasien`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_checkup`
--

CREATE TABLE `tbl_checkup` (
  `id` int(11) NOT NULL,
  `tglPendaftaran` date NOT NULL,
  `tipePendaftaran` varchar(255) NOT NULL,
  `namaPasien` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `waktuCheckup` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id` int(11) NOT NULL,
  `namaPoli` varchar(255) NOT NULL,
  `namaDokter` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id` int(11) NOT NULL,
  `namaObat` varchar(255) NOT NULL,
  `hargaObat` varchar(255) NOT NULL,
  `expire` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `telp` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id` int(11) NOT NULL,
  `tglPemesanan` date NOT NULL,
  `typeObat` int(255) NOT NULL,
  `namaPasien` int(255) NOT NULL,
  `namaObat` int(255) NOT NULL,
  `hargaObat` int(11) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_checkup`
--
ALTER TABLE `tbl_checkup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_checkup`
--
ALTER TABLE `tbl_checkup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
