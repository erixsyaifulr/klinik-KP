-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2020 pada 04.46
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_sakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_berobat`
--

CREATE TABLE `jenis_berobat` (
  `id` int(11) NOT NULL,
  `jenis_pasien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_berobat`
--

INSERT INTO `jenis_berobat` (`id`, `jenis_pasien`) VALUES
(1, 'pasien_baru'),
(2, 'pasien_rujukan'),
(4, 'pasien_lama '),
(5, 'pasien_berobat_jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jenis_dokter` varchar(200) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nama_dokter`, `alamat`, `jenis_dokter`, `no_hp`, `foto`, `status`) VALUES
(1, 'Dr.H.A.DWI BUDI SATRIO M.kes', 'Kebumen', 'spesialis', '089638889862', '551634-calon-dokter-muda-ini-cantiknya-bikin-cowok-rela-pura-pura-sakit1.png', 'Aktif'),
(2, 'Tari s', 'Kutowinangun', 'spesialis', '089638889862', '551620-calon-dokter-muda-ini-cantiknya-bikin-cowok-rela-pura-pura-sakit.jpg', 'Tidak aktif'),
(4, 'yuliana', 'Jogja', 'spesialis', '089638889862', '135215_sssc.jpg', 'Tidak aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `id_jenis_pasien` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_pasien` varchar(200) NOT NULL,
  `nama_pasien` varchar(40) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `id_jenis_pasien`, `id_user`, `no_pasien`, `nama_pasien`, `alamat`, `no_ktp`, `tanggal`, `keterangan`, `status`) VALUES
(3, 1, 5, 'AR001', 'contoh saya', 'sleman', '32939383992', '2020-10-13 03:25:53', 'pasien baru', 'selesai'),
(6, 1, 5, 'AR002', 'saya', 'jogja', '121212131313131', '2020-10-13 03:25:56', 'sakit', 'selesai'),
(7, 5, 5, 'AR003', 'dia', 'kota jogja', '32939383992', '2020-10-13 03:25:59', 'sakir', 'selesai'),
(10, 1, 3, 'AR005', 'mereka', 'ds', '32939383992', '2020-10-13 03:26:05', 'sds', 'antri'),
(13, 1, 3, 'AR006', 'saya', 'sa', '32939383992', '2020-10-13 03:26:08', 'sa', 'antri'),
(14, 1, 5, 'AR007', 'a', 'asd', '32939383992', '2020-10-13 03:37:12', 'ad', 'antri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `no_hp`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'pusat kota', 'Laki - laki', '232323', 'admin'),
(2, 'pasien', 'pasien', 'siti', 'sleman', 'Perempuan', '0933', 'pasien'),
(3, 'erix', 'erix', 'Erix Syaiful Rohman', 'Kebumen', 'Laki - laki', '08', 'pasien'),
(4, 'iqbal', 'iqbal', 'Iqbal im', 'wonosowo', 'Perempuan', '08122', 'pasien'),
(5, 'dia', 'dia', 'dia', 'kota', 'Perempuan', '1111', 'pasien');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_berobat`
--
ALTER TABLE `jenis_berobat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_jenis_pasien` (`id_jenis_pasien`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_berobat`
--
ALTER TABLE `jenis_berobat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD CONSTRAINT `tbl_pasien_ibfk_1` FOREIGN KEY (`id_jenis_pasien`) REFERENCES `jenis_berobat` (`id`),
  ADD CONSTRAINT `tbl_pasien_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
