-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Sep 2024 pada 04.14
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stunting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_data_balita`
--

CREATE TABLE `tabel_data_balita` (
  `id_data_balita` int(11) NOT NULL,
  `no_pendataan` varchar(10) NOT NULL,
  `kader` varchar(50) NOT NULL,
  `nama_balita` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `nik_ayah` varchar(16) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status_pengukuran` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_data_balita`
--

INSERT INTO `tabel_data_balita` (`id_data_balita`, `no_pendataan`, `kader`, `nama_balita`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `nik_ayah`, `nama_ayah`, `nik_ibu`, `nama_ibu`, `alamat`, `status_pengukuran`, `id_user`, `waktu`) VALUES
(1, '000001', 'MEKAR SARI 1', 'budi', 'tangerang', '2024-09-07', 'Laki-laki', '123', 'ayah', '123', 'ibu', 'tangerang', 'Sudah', 1, '2024-09-06 21:14:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_galeri`
--

CREATE TABLE `tabel_galeri` (
  `id_galeri` int(11) NOT NULL,
  `nama_gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_galeri`
--

INSERT INTO `tabel_galeri` (`id_galeri`, `nama_gambar`, `deskripsi`, `gambar`, `id_user`, `waktu`) VALUES
(2, 'testing gambar', 'testing gambar', 'bb222de4ebbf128a753bf12f9c948723.png', 1, '2024-09-17 01:47:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kader`
--

CREATE TABLE `tabel_kader` (
  `id_kader` int(11) NOT NULL,
  `nama_kader` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pengukuran`
--

CREATE TABLE `tabel_pengukuran` (
  `id_stunting` int(11) NOT NULL,
  `no_pendataan` varchar(10) NOT NULL,
  `tinggi_badan` varchar(10) NOT NULL,
  `berat_badan` varchar(10) NOT NULL,
  `lingkar_kepala` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pengukuran` date NOT NULL,
  `status_stunting` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_pengukuran`
--

INSERT INTO `tabel_pengukuran` (`id_stunting`, `no_pendataan`, `tinggi_badan`, `berat_badan`, `lingkar_kepala`, `keterangan`, `tanggal_pengukuran`, `status_stunting`, `id_user`, `waktu`) VALUES
(1, '000001', '10', '10', '10', 'data baru', '2024-09-15', '1', 1, '2024-09-14 18:19:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_perubahan_data`
--

CREATE TABLE `tabel_perubahan_data` (
  `id_perubahan_data` int(11) NOT NULL,
  `diajukan_oleh` varchar(50) NOT NULL,
  `no_pendataan` int(10) NOT NULL,
  `kader` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status_keterangan` varchar(10) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `tanggal_konfirmasi` datetime NOT NULL,
  `keterangan_konfirmasi` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_perubahan_data`
--

INSERT INTO `tabel_perubahan_data` (`id_perubahan_data`, `diajukan_oleh`, `no_pendataan`, `kader`, `keterangan`, `status_keterangan`, `penerima`, `tanggal_pengajuan`, `tanggal_konfirmasi`, `keterangan_konfirmasi`, `waktu`) VALUES
(2, 'admin', 3, 'Mekarsari 2', 'testing data perubahan', 'Pengajuan', '', '2024-08-20 02:57:34', '0000-00-00 00:00:00', '', '2024-08-19 19:57:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_rumus`
--

CREATE TABLE `tabel_rumus` (
  `id_rumus` int(11) NOT NULL,
  `tinggi_rata` varchar(10) NOT NULL,
  `berat_rata` varchar(10) NOT NULL,
  `tinggi_standar` varchar(10) NOT NULL,
  `berat_standar` varchar(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_rumus`
--

INSERT INTO `tabel_rumus` (`id_rumus`, `tinggi_rata`, `berat_rata`, `tinggi_standar`, `berat_standar`, `waktu`) VALUES
(2, '95', '', '4.5', '', '2024-08-20 01:38:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kader` varchar(20) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `username`, `password`, `nama_lengkap`, `kader`, `hak_akses`, `last_login`) VALUES
(1, 'kader', '48ac2159edaa832786111d01f63e9150', 'kader', '1', 'Kader', '2024-06-19 19:11:33'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'testing', '2', 'Admin', '2024-07-01 04:56:23'),
(3, 'bidan', 'cc274f4730ce350f1cf60e73f4172d67', 'Bidan', '1', 'Bidan', '2024-07-30 19:42:28'),
(4, 'kepaladesa', 'dabacc3bca86c8e5120e33bc112363b6', 'kepala desa', '', 'Kepdes', '2024-08-22 00:58:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_data_balita`
--
ALTER TABLE `tabel_data_balita`
  ADD PRIMARY KEY (`id_data_balita`);

--
-- Indeks untuk tabel `tabel_galeri`
--
ALTER TABLE `tabel_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `tabel_kader`
--
ALTER TABLE `tabel_kader`
  ADD PRIMARY KEY (`id_kader`);

--
-- Indeks untuk tabel `tabel_pengukuran`
--
ALTER TABLE `tabel_pengukuran`
  ADD PRIMARY KEY (`id_stunting`);

--
-- Indeks untuk tabel `tabel_perubahan_data`
--
ALTER TABLE `tabel_perubahan_data`
  ADD PRIMARY KEY (`id_perubahan_data`);

--
-- Indeks untuk tabel `tabel_rumus`
--
ALTER TABLE `tabel_rumus`
  ADD PRIMARY KEY (`id_rumus`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_data_balita`
--
ALTER TABLE `tabel_data_balita`
  MODIFY `id_data_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_galeri`
--
ALTER TABLE `tabel_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tabel_kader`
--
ALTER TABLE `tabel_kader`
  MODIFY `id_kader` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_pengukuran`
--
ALTER TABLE `tabel_pengukuran`
  MODIFY `id_stunting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_perubahan_data`
--
ALTER TABLE `tabel_perubahan_data`
  MODIFY `id_perubahan_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tabel_rumus`
--
ALTER TABLE `tabel_rumus`
  MODIFY `id_rumus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
