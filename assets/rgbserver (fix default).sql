-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2021 pada 07.50
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgbserver`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat_karyawan` varchar(100) NOT NULL,
  `notlp_karyawan` varchar(15) NOT NULL,
  `gender_karyawan` enum('laki-laki','perempuan') NOT NULL,
  `status_karyawan` enum('kosong','berkerja') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `notlp_karyawan`, `gender_karyawan`, `status_karyawan`) VALUES
(1, 'Sumanto', 'Ujung jalan', '008', 'laki-laki', 'berkerja'),
(2, 'Maimunah', 'Kebon jahe', '08232312442', 'perempuan', 'berkerja'),
(3, 'Dudung', 'Kebon kelapa', '082323123', 'laki-laki', 'berkerja'),
(4, 'Dara', 'Kebon mangga', '082323412', 'perempuan', 'berkerja'),
(5, 'Dadang', 'Kebon durian', '0823232341', 'laki-laki', 'berkerja'),
(6, 'Didik', 'Kebon karet', '082323455', 'laki-laki', 'kosong'),
(7, 'Nunung', 'Kebon anggur', '0822231234', 'perempuan', 'kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(10) NOT NULL,
  `id_user_order` int(11) NOT NULL,
  `id_produk_order` int(11) NOT NULL,
  `s_order` int(11) NOT NULL,
  `m_order` int(11) NOT NULL,
  `l_order` int(11) NOT NULL,
  `xl_order` int(11) NOT NULL,
  `xxl_order` int(11) NOT NULL,
  `foto_order` varchar(100) NOT NULL,
  `warna_order` varchar(20) NOT NULL,
  `telepon_order` varchar(20) NOT NULL,
  `alamat_order` text NOT NULL,
  `tanggal_order` datetime NOT NULL,
  `total_order` int(11) NOT NULL,
  `pembayaran_order` varchar(100) NOT NULL,
  `priority_order` varchar(50) NOT NULL,
  `themost_order` int(11) NOT NULL,
  `status_pembayaran_order` varchar(20) NOT NULL,
  `status_order` varchar(20) NOT NULL,
  `notif_baca_order` varchar(10) NOT NULL,
  `notif_bayar_order` varchar(10) NOT NULL,
  `jumlahwarna_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_order`, `kode_order`, `id_user_order`, `id_produk_order`, `s_order`, `m_order`, `l_order`, `xl_order`, `xxl_order`, `foto_order`, `warna_order`, `telepon_order`, `alamat_order`, `tanggal_order`, `total_order`, `pembayaran_order`, `priority_order`, `themost_order`, `status_pembayaran_order`, `status_order`, `notif_baca_order`, `notif_bayar_order`, `jumlahwarna_order`) VALUES
(18, 'RGB0001', 7, 9, 5, 0, 0, 0, 0, 'navy.png', 'Navy', '08978983003', 'Jalan Harapan No 4', '2020-07-29 23:21:00', 225000, 'IMG_20200730_001911.jpg', 'prioritas', 5, 'bayarditerima', 'dalampengiriman', 'dibaca', 'nopulse', 0),
(19, 'RGB0002', 9, 8, 0, 1, 0, 0, 0, 'hitam1.png', 'HItam', '089765432121', 'Jalan singa nomer 9', '2020-07-29 23:24:00', 40000, 'IMG_20200730_0019113.jpg', 'prioritas', 1, 'bayarditerima', 'dalamproses', 'dibaca', 'nopulse', 0),
(20, 'RGB0003', 10, 9, 0, 0, 1, 0, 0, 'images.jpg', 'custom', '089911112222', 'Jalan Onta no 23', '2020-07-29 23:37:00', 85000, 'IMG_20200729_2302471.jpg', 'reguler', 1, 'bayarditerima', 'selesai', 'dibaca', 'nopulse', 0),
(21, 'RGB0004', 11, 8, 3, 0, 0, 0, 0, 'hitam1.png', 'HItam', '089877665544', 'Jalan kuda no 21', '2020-07-29 23:40:00', 0, 'IMG_20200730_0019114.jpg', 'prioritas', 3, 'bayarditerima', 'dalamproses', 'dibaca', 'nopulse', 0),
(22, 'RGB0005', 7, 9, 5, 0, 0, 0, 0, 'navy.png', 'Navy', '08978983003', 'Jalan Harapan No 4', '2020-07-29 13:02:01', 225000, 'belum', 'reguler', 5, 'belumbayar', 'dicancel', 'dibaca', 'nopulse', 0),
(23, 'RGB0006', 12, 9, 0, 2, 0, 0, 0, 'navy.png', 'Navy', '089876567432', 'Jalan mangga no 6', '2020-07-29 23:46:00', 90000, 'IMG_20200729_230247.jpg', 'reguler', 2, 'bayarditerima', 'dalamproses', 'dibaca', 'nopulse', 0),
(24, 'RGB0007', 7, 9, 7, 0, 0, 0, 0, 'navy.png', 'Navy', '08978983003', 'Jalan Rusa no 17', '2020-07-30 01:10:00', 315000, 'IMG_20200730_0019112.jpg', 'reguler', 7, 'bayarditerima', 'dalamproses', 'dibaca', 'nopulse', 0),
(25, 'RGB0008', 9, 9, 7, 0, 0, 0, 0, 'navy.png', 'Navy', '08978983003', 'Jalan Rusa no 17', '2020-07-30 01:14:00', 315000, 'IMG_20200730_0019111.jpg', 'prioritas', 7, 'bayarditerima', 'dalamproses', 'dibaca', 'nopulse', 0),
(26, 'RGB0009', 9, 9, 0, 3, 0, 0, 0, 'navy.png', 'Navy', '08978983003', 'Jalan mangga no 18', '2020-07-31 20:07:00', 135000, 'belum', 'reguler', 3, 'belumbayar', 'dicancel', 'dibaca', 'nopulse', 0),
(27, 'RGB0010', 10, 9, 0, 0, 1, 0, 0, 'navy.png', 'Navy', '089877754321', 'Jalan domba no 6', '2020-07-31 20:08:13', 45000, 'belum', 'reguler', 1, 'belumbayar', 'ditolak', 'dibaca', 'nopulse', 0),
(28, 'RGB0011', 12, 9, 5, 0, 0, 0, 0, 'navy.png', 'Navy', '089988887777', 'Jalan ancol no 22', '2020-07-31 20:09:48', 225000, 'aaa.jpg', 'prioritas', 5, 'bayarditolak', 'ditolak', 'dibaca', 'nopulse', 0),
(29, 'RGB0012', 7, 9, 15, 0, 0, 0, 0, 'navy.png', 'Navy', '08987776666', 'jalan rusa no 23', '2020-08-04 02:14:32', 675000, 'aaa3.jpg', 'reguler', 15, 'bayarditerima', 'dibayar', 'dibaca', 'nopulse', 0),
(30, 'RGB0013', 9, 9, 0, 7, 0, 0, 0, 'navy.png', 'Navy', '089755442233', 'jalan antasari no 67', '2020-08-04 02:16:17', 315000, 'aaa2.jpg', 'prioritas', 7, 'bayarditerima', 'dibayar', 'dibaca', 'nopulse', 0),
(31, 'RGB0014', 12, 9, 0, 0, 10, 0, 0, 'navy.png', 'Navy', '08978987997', 'jalan mega no 44', '2020-08-04 02:18:43', 450000, 'aaa4.jpg', 'reguler', 10, 'sudahbayar', 'dibayar', 'dibaca', 'pulse', 0),
(32, 'RGB0015', 11, 9, 0, 0, 0, 3, 0, 'line_black.png', 'custom', '089789876543', 'jalan sirsak no 78', '2020-08-04 02:21:20', 255000, 'belum', 'reguler', 3, 'belumbayar', 'ditolak', 'dibaca', 'nopulse', 0),
(33, 'RGB0016', 10, 9, 0, 0, 0, 0, 11, 'bbm_black.png', 'custom', '089766665554', 'jalan nangka no 23', '2020-08-04 02:22:30', 935000, 'aaa1.jpg', 'reguler', 11, 'bayarditerima', 'dibayar', 'dibaca', 'nopulse', 1),
(34, 'RGB0017', 10, 9, 0, 0, 0, 5, 0, 'putih.png', 'Putih', '08978983003', 'Jalan harimau no 34', '2020-08-27 22:32:20', 225000, 'belum', 'reguler', 5, 'belumbayar', 'dicancel', 'dibaca', 'nopulse', 0),
(35, 'RGB0018', 11, 9, 0, 3, 0, 0, 0, 'tosca.png', 'Tosca', '089766654321', 'Jalan singa no 3', '2020-08-27 22:34:08', 135000, 'belum', 'reguler', 3, 'belumbayar', 'ditolak', 'dibaca', 'nopulse', 0),
(36, 'RGB0019', 7, 9, 0, 0, 7, 0, 0, 'navy.png', 'Navy', '089877659987', 'Jalan tikus no 66', '2020-08-27 22:38:37', 315000, 'belum', 'reguler', 7, 'belumbayar', 'ditolak', 'dibaca', 'nopulse', 0),
(37, 'RGB0020', 11, 9, 1, 0, 0, 0, 0, 'navy.png', 'Navy', '089977776666', 'Jalan angsa no 8', '2020-08-28 05:39:37', 45000, 'belum', 'reguler', 1, 'belumbayar', 'dicancel', 'belumbaca', 'nopulse', 0),
(38, 'RGB0021', 12, 9, 0, 0, 0, 0, 10, 'navy.png', 'Navy', '08124686437', 'Jalan tikus no 66', '2020-09-14 10:50:17', 450000, 'FB_IMG_15999847262889444.jpg', 'reguler', 10, 'bayarditerima', 'dalampengiriman', 'dibaca', 'nopulse', 0),
(39, 'RGB0022', 12, 8, 0, 1, 0, 0, 0, 'tosca1.png', 'Tosca', '0898', 'lampung', '2020-09-22 15:48:44', 40000, 'belum', 'reguler', 1, 'belumbayar', 'dikonfirmasi', 'dibaca', 'nopulse', 0),
(40, 'RGB0023', 4, 8, 0, 20, 20, 20, 0, 'kuning1.png', 'Kuning', '0823232', 'mulyasari', '2020-10-10 13:35:11', 2400000, 'belum', 'reguler', 60, 'belumbayar', 'dikonfirmasi', 'dibaca', 'nopulse', 0),
(41, 'RGB0024', 4, 8, 0, 100, 100, 50, 0, 'iconadnroid.png', 'custom', '08232323', 'mulyasari', '0000-00-00 00:00:00', 20000000, 'belum', 'reguler', 250, 'belumbayar', 'dikonfirmasi', 'dibaca', 'nopulse', 1),
(42, 'RGB0025', 4, 8, 0, 150, 200, 200, 0, 'mobil.png', 'custom', '0823232', 'mulyasari', '2020-10-12 16:04:24', 44000000, 'belum', 'reguler', 550, 'belumbayar', 'dikonfirmasi', 'dibaca', 'nopulse', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `biaya_sablon_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id_produk`, `foto_produk`, `nama_produk`, `deskripsi_produk`, `biaya_sablon_produk`) VALUES
(8, 'hitam1.png', 'Kaos Polos Basic', 'Bahan 100% Cotton', 40000),
(9, 'navy.png', 'Kaos Polos Misty', 'Bahan 100% Cotton', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks_color`
--

CREATE TABLE `produks_color` (
  `id_color` int(11) NOT NULL,
  `produk_id_color` int(11) NOT NULL,
  `foto_color` varchar(100) NOT NULL,
  `warna_color` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produks_color`
--

INSERT INTO `produks_color` (`id_color`, `produk_id_color`, `foto_color`, `warna_color`) VALUES
(15, 8, 'hitam1.png', 'HItam'),
(25, 9, 'navy.png', 'Navy'),
(41, 9, 'tosca.png', 'Tosca'),
(42, 9, 'putih.png', 'Putih'),
(43, 9, 'pink.png', 'Pink'),
(44, 9, 'orange.png', 'Orange'),
(45, 9, 'maroon.png', 'Maroon'),
(46, 9, 'kuning.png', 'Kuning'),
(47, 9, 'hitam.png', 'Hitam'),
(48, 9, 'coklat.png', 'Coklat'),
(49, 9, 'abu.png', 'Abu'),
(50, 8, 'tosca1.png', 'Tosca'),
(51, 8, 'putih1.png', 'Putih'),
(52, 8, 'pink1.png', 'Pink'),
(53, 8, 'orange1.png', 'Orange'),
(54, 8, 'maroon1.png', 'Maroon'),
(55, 8, 'kuning1.png', 'Kuning'),
(56, 8, 'navy1.png', 'Navy'),
(57, 8, 'coklat1.png', 'Coklat'),
(58, 8, 'abu1.png', 'Abu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks_size`
--

CREATE TABLE `produks_size` (
  `id_size` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `tipe_size` varchar(50) NOT NULL,
  `deskripsi_size` varchar(100) NOT NULL,
  `harga_size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produks_size`
--

INSERT INTO `produks_size` (`id_size`, `produk_id`, `tipe_size`, `deskripsi_size`, `harga_size`) VALUES
(33, 8, 'S', '68cm x 46cm', '40000'),
(34, 8, 'M', '70cm x 48cm', '40000'),
(35, 8, 'L', '72cm x 50cm', '40000'),
(36, 8, 'XL', '74cm x 52cm', '40000'),
(37, 8, 'XXL', '76cm x 54cm', '40000'),
(38, 9, 'S', '68cm x 46cm', '45000'),
(39, 9, 'M', '70cm x 48cm', '45000'),
(40, 9, 'L', '72cm x 50cm', '45000'),
(41, 9, 'XL', '74cm x 52cm', '45000'),
(42, 9, 'XXL', '76cm x 54cm', '45000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses`
--

CREATE TABLE `proses` (
  `id_proses` int(11) NOT NULL,
  `id_prosesorder` int(11) NOT NULL,
  `id_proseskaryawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses`
--

INSERT INTO `proses` (`id_proses`, `id_prosesorder`, `id_proseskaryawan`) VALUES
(1, 20, 1),
(2, 38, 1),
(3, 18, 1),
(4, 25, 1),
(5, 24, 4),
(8, 21, 2),
(9, 19, 3),
(10, 23, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tanggallahir_user` date NOT NULL,
  `jeniskelamin_user` varchar(10) NOT NULL,
  `alamat_user` text NOT NULL,
  `nomertelepon_user` varchar(15) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `password_user` varchar(20) NOT NULL,
  `level_user` varchar(10) NOT NULL,
  `daftar_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_pelanggan`, `foto_user`, `nama_user`, `tanggallahir_user`, `jeniskelamin_user`, `alamat_user`, `nomertelepon_user`, `email_user`, `password_user`, `level_user`, `daftar_user`) VALUES
(1, 'USER01', 'STIKER_WARNA.jpg', 'admin rgb sablon', '1994-06-20', 'laki-laki', 'jl. kimaja, way halim, bandar lampung', '081278607596', 'rgbsablon21@gmail.com', '12345', 'admin', '1594012959'),
(2, 'USER02', 'zorro.png', 'asep', '1945-08-17', 'laki-laki', 'mulyasari negeri agung way kanan lampung', '082188884444', 'asep@gmail.com', '12345', 'user', '1594013959'),
(3, 'USER03', 'shank.png', 'udin', '1946-06-17', 'laki-laki', 'labuhan dalam tanjung senang bandar lampung', '082355557777', 'udin@gmail.com', '12345', 'user', '1594014959'),
(4, 'USER04', '0.default.png', 'ketut krisna sanjaya', '1945-08-18', 'laki-laki', 'mulyasari', '082179471533', 'ketutkrisna21@gmail.com', '12345', 'user', '1594015959'),
(5, 'USER05', '0.default.png', 'otong', '1945-08-17', 'laki-laki', '', '', 'otong@gmail.com', '12345', 'user', '1594965617'),
(6, 'USER06', '0.default.png', 'jojo', '2020-07-01', 'laki-laki', '', '', 'jojo@gmail.com', '12345', 'user', '1595009828'),
(7, 'USER07', '0.default.png', 'Aan', '2020-07-04', 'laki-laki', '', '', 'aan@gmail.com', '12345', 'user', '1595281836'),
(8, 'USER08', '0.default.png', 'Monyet', '1927-07-21', 'laki-laki', '', '', 'triska@monyet.co.id', '1234567', 'user', '1595928661'),
(9, 'USER09', '0.default.png', 'anton', '2000-04-11', 'laki-laki', 'jalan duren no 2', '08978983003', 'anton@gmail.com', '12345', 'user', '1596040343'),
(10, 'USER10', '0.default.png', 'Siti', '2012-02-13', 'perempuan', '', '', 'siti@gmail.com', '12345', 'user', '1596040517'),
(11, 'USER11', '0.default.png', 'Andri', '2014-07-15', 'laki-laki', '', '', 'andri@gmail.com', '12345', 'user', '1596040766'),
(12, 'USER12', '0.default.png', 'ari', '1990-07-10', 'laki-laki', 'jalan rusa no 12', '085233698854', 'ari@gmail.com', '12345', 'user', '1596041162'),
(13, 'USER13', '0.default.png', 'monyet', '2020-07-15', 'laki-laki', '', '', 'monyet@gmail.com', '12345', 'user', '1596183628'),
(14, 'USER14', '0.default.png', 'Wayan kastawan', '1997-12-24', 'laki-laki', '', '', 'wayan@gmail.com', '12345', 'user', '1598291689');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produks_color`
--
ALTER TABLE `produks_color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indeks untuk tabel `produks_size`
--
ALTER TABLE `produks_size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indeks untuk tabel `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `produks_color`
--
ALTER TABLE `produks_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `produks_size`
--
ALTER TABLE `produks_size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `proses`
--
ALTER TABLE `proses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
