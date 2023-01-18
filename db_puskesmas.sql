-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2023 pada 13.26
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
-- Database: `db_puskesmas`
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
  `expire` date NOT NULL,
  `typeObat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_obat`
--

INSERT INTO `tbl_obat` (`id`, `namaObat`, `hargaObat`, `expire`, `typeObat`) VALUES
(1, 'Inzana', '5000', '2023-01-02', 'Batuk & Flu'),
(2, 'Oskadon', '3000', '2023-01-20', 'Sakit Kepala'),
(3, 'VItacimin', '1500', '2023-01-25', 'Vitamin');

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
-- Struktur dari tabel `tbl_pemesanan_obat`
--

CREATE TABLE `tbl_pemesanan_obat` (
  `id` int(11) NOT NULL,
  `tglPemesanan` date NOT NULL,
  `typeObat` varchar(255) NOT NULL,
  `namaPasien` varchar(255) NOT NULL,
  `namaObat` varchar(255) NOT NULL,
  `hargaObat` int(100) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pemesanan_obat`
--

INSERT INTO `tbl_pemesanan_obat` (`id`, `tglPemesanan`, `typeObat`, `namaPasien`, `namaObat`, `hargaObat`, `keluhan`, `status`, `id_user`) VALUES
(5, '2023-01-17', 'kapsul', 'prasetyono', 'Inzana', 5000, 'qweasdawdasawsd', 'Diajukan', 0),
(7, '2023-01-17', 'Vitamin', 'prasetyono', 'VItacimin', 1500, 'adas', 'Diajukan', 0),
(8, '2023-01-17', 'Sakit Kepala', 'Prasetyono Putra', 'Oskadon', 3000, 'asd', 'Diajukan', 0),
(9, '2023-01-17', 'Batuk & Flu', 'Prasetyono Putra', 'Inzana', 5000, 'dasdasdas', 'Diajukan', 0),
(10, '2023-01-18', 'Sakit Kepala', 'Prasetyono Putra', 'Oskadon', 3000, 'poqwdksadkasl', 'Diajukan', 0),
(11, '2023-01-18', 'Sakit Kepala', 'Prasetyono Putra', 'Oskadon', 3000, 'dnfjabfahjsbajshfb', 'Diajukan', 0),
(12, '2023-01-18', 'Sakit Kepala', 'Prasetyono Putra', 'Oskadon', 3000, 'kjansfjhabfasd', 'Diajukan', 0),
(13, '2023-01-18', 'Sakit Kepala', 'Prasetyono Putra', 'Oskadon', 3000, 'isanjhasdbajsh', 'Diajukan', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemesanan_poli`
--

CREATE TABLE `tbl_pemesanan_poli` (
  `id_poli` int(11) NOT NULL,
  `tglPemesanan` date NOT NULL,
  `typePoli` varchar(255) NOT NULL,
  `namaPasien` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pemesanan_poli`
--

INSERT INTO `tbl_pemesanan_poli` (`id_poli`, `tglPemesanan`, `typePoli`, `namaPasien`, `status`, `id_user`) VALUES
(1, '2023-01-18', 'Poli Gigi', 'Prasetyono Putra', 'Diajukan', 9),
(2, '2023-01-18', 'Poli Gigi', 'Prasetyono Putra', 'Diajukan', 9),
(3, '2023-01-18', 'Poli Gigi', 'Prasetyono Putra', 'Diajukan', 9),
(4, '2023-01-18', 'Poli Gigi', 'Prasetyono Putra', 'Diajukan', 9),
(5, '2023-01-18', 'Poli Gigi', 'Prasetyono Putra', 'Diajukan', 9),
(6, '2023-01-18', 'Poli Gigi', 'Prasetyono Putra', 'Diajukan', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `src_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `email`, `password`, `no_telepon`, `src_gambar`) VALUES
(8, 'admin', 'admin@gmail.com', '$2y$10$JIOCUIfKegBb7Tkehsw6funGFS3nU3gmZT/FSjHV645gEoMBQpy1C', '1235', 'Pure Black Wallpaper - IdleWP.jpg'),
(9, 'Prasetyono Putra', 'prasetyono@gmail.com', '$2y$10$AKCE/tmGeSaIBxsHY.mHwud1fPAFpDOAxQFXp8amotI0f5.dUFp32', '456', 'WAG1a0cf_400x400.jpg'),
(11, 'asd', 'asd@gmail.com', '$2y$10$lF5L0EX9ojEJKxyHYCx48u2C7jL/oY3mLoAjlmd0E4OBLeejntSrm', '1254123213', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userpasien`
--

CREATE TABLE `userpasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` int(20) NOT NULL,
  `gambar` varchar(255) NOT NULL
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
-- Indeks untuk tabel `tbl_pemesanan_obat`
--
ALTER TABLE `tbl_pemesanan_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pemesanan_poli`
--
ALTER TABLE `tbl_pemesanan_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `userpasien`
--
ALTER TABLE `userpasien`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemesanan_obat`
--
ALTER TABLE `tbl_pemesanan_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemesanan_poli`
--
ALTER TABLE `tbl_pemesanan_poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `userpasien`
--
ALTER TABLE `userpasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
