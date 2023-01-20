-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2023 pada 13.34
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
-- Struktur dari tabel `tbl_checkup_pasien`
--

CREATE TABLE `tbl_checkup_pasien` (
  `id_checkup` int(50) NOT NULL,
  `tglPendaftaran` date NOT NULL,
  `typePoli` varchar(255) NOT NULL,
  `namaPasien` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_checkup_pasien`
--

INSERT INTO `tbl_checkup_pasien` (`id_checkup`, `tglPendaftaran`, `typePoli`, `namaPasien`, `status`, `id_user`) VALUES
(25, '2023-01-19', 'BP Usia Lanjut', 'Prasetyono Putri', 'Ditolak', 9),
(27, '2023-01-19', 'Poli KIA & KB', 'Prasetyono Putro', 'Diproses', 9),
(28, '2023-01-19', 'MTBS', 'Prasetyono', 'Disetujui', 9),
(29, '2023-01-19', 'IGD', 'Prasetyono Putra', 'Diajukan', 9),
(30, '2023-01-19', 'Poli Gigi', 'Prasetyono Putra', 'Ditolak', 35),
(31, '2023-01-19', 'Poli Gigi', 'Prasetyono Putra', 'Diajukan', 35),
(32, '2023-01-19', 'BP Umum', 'Prasetyono Putra', 'Diajukan', 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(50) NOT NULL,
  `namaPoli` varchar(255) NOT NULL,
  `namaDokter` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `tglMasuk` date NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `namaPoli`, `namaDokter`, `spesialis`, `tglMasuk`, `gambar`) VALUES
(17, 'BP Usia Lanjut', 'Prasetyono Putra', 'Kaki', '2023-02-03', 'null'),
(19, 'BP Usia Lanjut', 'Adindaku..', 'Rambut', '2023-01-11', 'null');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id_obat` int(50) NOT NULL,
  `namaObat` varchar(255) NOT NULL,
  `hargaObat` varchar(255) NOT NULL,
  `expire` date NOT NULL,
  `typeObat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_obat`
--

INSERT INTO `tbl_obat` (`id_obat`, `namaObat`, `hargaObat`, `expire`, `typeObat`) VALUES
(17, 'Oskadon', '3000', '2023-01-26', 'Sakit Kepala'),
(18, 'OBH', '1500', '2023-02-02', 'Batuk & Flu'),
(20, 'Polysilent', '20000', '2023-01-25', 'Pencernaan'),
(21, 'Balsem', '10000', '2023-02-02', 'Anti Nyeri'),
(24, 'Panadolx', '5000', '2023-01-20', 'Vitamin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemesanan_obat`
--

CREATE TABLE `tbl_pemesanan_obat` (
  `id_pemesanan` int(50) NOT NULL,
  `tglPemesanan` date NOT NULL,
  `typeObat` varchar(255) NOT NULL,
  `namaPasien` varchar(255) NOT NULL,
  `namaObat` varchar(255) NOT NULL,
  `hargaObat` int(100) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(50) NOT NULL,
  `id_obat` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pemesanan_obat`
--

INSERT INTO `tbl_pemesanan_obat` (`id_pemesanan`, `tglPemesanan`, `typeObat`, `namaPasien`, `namaObat`, `hargaObat`, `keluhan`, `status`, `id_user`, `id_obat`) VALUES
(26, '2023-01-19', 'Sakit Kepala', 'Prasetyono Putra', 'Oskadon', 3000, 'Kesemutan di otak', 'Disetujui', 9, 17),
(28, '2023-01-19', 'Vitamin', 'Prasetyono Putra', 'Vitacimin', 2500, 'Sariawan', 'Diproses', 9, 19),
(30, '2023-01-19', 'Batuk & Flu', 'Prasetyono Putrax', 'Balsem', 100000, 'Sakit pinggangg', 'Diajukan', 9, 21),
(31, '2023-01-19', 'Anti Covid', 'Prasetyono Putra', 'Sanitizer Dettol', 25000, 'Mamam', 'Disetujui', 9, 22),
(32, '2023-01-19', 'Anti Covid', 'Prasetyono Putra', 'Sanitizer Dettol', 25000, 'dasdaw', 'Diajukan', 9, 22),
(34, '2023-01-20', 'Batuk & Flu', 'Dinda', 'Oskadon', 2000, 'kjdhakds', 'Diajukan', 0, 0),
(35, '2023-01-19', 'Sakit Kepala', 'Prasetyono Putra', 'Oskadon', 3000, 'dwasdas', 'Diajukan', 35, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(50) NOT NULL,
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
(33, 'admin', 'admin@gmail.com', '$2y$10$Unl94UNi5h8qcaGJGGqmruXPViaLGsuJI35EHwRYDJak9/7ixaoP.', '12345678', 'WAG1a0cf_400x400.jpg'),
(35, 'Prasetyono Putra', 'prasetyono@gmail.com', '$2y$10$yRA5KnTZHLyTXzyTynrbfOrfmFNJMvsAzjUtMX/uC2yVhZ4qbENCy', '1231412', 'stamp_20230119_072905.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_checkup_pasien`
--
ALTER TABLE `tbl_checkup_pasien`
  ADD PRIMARY KEY (`id_checkup`);

--
-- Indeks untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tbl_pemesanan_obat`
--
ALTER TABLE `tbl_pemesanan_obat`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_checkup_pasien`
--
ALTER TABLE `tbl_checkup_pasien`
  MODIFY `id_checkup` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id_obat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemesanan_obat`
--
ALTER TABLE `tbl_pemesanan_obat`
  MODIFY `id_pemesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
