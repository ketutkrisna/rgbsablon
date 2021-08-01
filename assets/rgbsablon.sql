-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 04:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgbsablon`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(50) NOT NULL,
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
  `tanggal_order` varchar(100) NOT NULL,
  `total_order` int(11) NOT NULL,
  `pembayaran_order` varchar(100) NOT NULL,
  `priority_order` varchar(50) NOT NULL,
  `themost_order` int(11) NOT NULL,
  `status_pembayaran_order` varchar(20) NOT NULL,
  `status_order` varchar(20) NOT NULL,
  `notif_baca_order` varchar(10) NOT NULL,
  `notif_bayar_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `kode_order`, `id_user_order`, `id_produk_order`, `s_order`, `m_order`, `l_order`, `xl_order`, `xxl_order`, `foto_order`, `warna_order`, `telepon_order`, `alamat_order`, `tanggal_order`, `total_order`, `pembayaran_order`, `priority_order`, `themost_order`, `status_pembayaran_order`, `status_order`, `notif_baca_order`, `notif_bayar_order`) VALUES
(1, 'RGB0001', 3, 1, 0, 5, 3, 3, 0, 'kaospolos.png', 'Hitam', '082144445555', 'jln setapak tanjakan dua kali dua sama dengan 4', '1593625418', 430000, '256747-d5a5ba2743ec10c294ceb79c652f4bc2fce746cd11.jpg', 'prioritas', 11, 'sudahbayar', 'dibayar', 'dibaca', 'pulse'),
(2, 'RGB0002', 2, 2, 1, 5, 5, 5, 1, 'kaospolospanjang1.png', 'Putih', '082133336666', 'jln yang pernah ada', '1593660317', 850000, 'belum', 'reguler', 17, 'belumbayar', 'dikonfirmasi', 'dibaca', 'nopulse'),
(3, 'RGB0003', 3, 4, 0, 0, 10, 0, 0, 'raglan1.png', 'Putih aja', '083233332222', 'jln apalah saya gk tau', '1593773106', 450000, 'belum', 'reguler', 10, 'belumbayar', 'dikonfirmasi', 'dibaca', 'nopulse'),
(4, 'RGB0004', 3, 2, 0, 0, 0, 2, 0, 'phpmyadmin1.PNG', 'custom', '082144556677', 'jalan yang pernah kita lalui', '1593843867', 130000, 'belum', 'reguler', 2, 'belumbayar', 'dikonfirmasi', 'dibaca', 'nopulse');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `biaya_sablon_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id_produk`, `foto_produk`, `nama_produk`, `deskripsi_produk`, `biaya_sablon_produk`) VALUES
(1, 'kaospolos.png', 'Kaos Polos', 'Bahan katun asli dari gunung huakuo', 6000),
(2, 'kaospolospanjang1.png', 'Kaos Panjanga', 'Bahan asli sutra dari fiesta asikan keren', 5000),
(4, 'raglan1.png', 'Raglan Polos', 'raglan keren bahan bagus asli katun ok sip', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `produks_color`
--

CREATE TABLE `produks_color` (
  `id_color` int(11) NOT NULL,
  `produk_id_color` int(11) NOT NULL,
  `foto_color` varchar(100) NOT NULL,
  `warna_color` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produks_color`
--

INSERT INTO `produks_color` (`id_color`, `produk_id_color`, `foto_color`, `warna_color`) VALUES
(1, 1, 'kaospolos.png', 'Hitam'),
(2, 2, 'kaospolospanjang1.png', 'Putih'),
(3, 1, 'jacket.jpg', 'putih'),
(5, 4, 'raglan1.png', 'Putih');

-- --------------------------------------------------------

--
-- Table structure for table `produks_size`
--

CREATE TABLE `produks_size` (
  `id_size` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `tipe_size` varchar(50) NOT NULL,
  `deskripsi_size` varchar(100) NOT NULL,
  `harga_size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produks_size`
--

INSERT INTO `produks_size` (`id_size`, `produk_id`, `tipe_size`, `deskripsi_size`, `harga_size`) VALUES
(1, 1, 'XL', '60cm x 110cm', '45000'),
(2, 1, 'L', '50cm x 100cm', '40000'),
(3, 1, 'M', '40cm x 90cm', '35000'),
(4, 1, 'S', '30cm x 80cm', '30000'),
(5, 2, 'XL', '50cm X 100cm', '65000'),
(6, 1, 'XXL', '66cm X 120cm', '50000'),
(7, 2, 'S', '30cm X 70cm', '30000'),
(8, 2, 'L', '40cm X 80cm', '55000'),
(9, 2, 'M', '30cm X 60cm', '30000'),
(10, 2, 'XXL', '65cm x 115cm', '70000'),
(13, 4, 'S', '30cm x 60cm', '0'),
(14, 4, 'M', '35cm x 65cm', '40000'),
(15, 4, 'L', '40cm x 70cm', '45000'),
(16, 4, 'XL', '45cm x 75cm', '50000'),
(17, 4, 'XXL', '50cm x 100cm', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
  `password_user` varchar(50) NOT NULL,
  `level_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_pelanggan`, `foto_user`, `nama_user`, `tanggallahir_user`, `jeniskelamin_user`, `alamat_user`, `nomertelepon_user`, `email_user`, `password_user`, `level_user`) VALUES
(1, 'USER0001', '256747-d5a5ba2743ec10c294ceb79c652f4bc2fce746cd1.jpg', 'admin rgb sablons', '1996-12-24', 'laki-laki', 'jln kura-kura no 45 bandar lampungs', '082273243330', 'rgbsablon21@gmail.com', '12345', 'admin'),
(2, 'USER0002', 'zorro.png', 'rida sadega', '1945-08-17', 'laki-laki', 'mulyasari negeri agung way kanan lampung', '082188884444', 'ridasadega21@gmail.com', '12345', 'user'),
(3, 'USER0003', 'shank.png', 'gobeh sadega', '1946-06-17', 'laki-laki', 'labuhan dalam tanjung senang bandar lampung', '082355557777', 'gobehsadega21@gmail.com', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produks_color`
--
ALTER TABLE `produks_color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `produks_size`
--
ALTER TABLE `produks_size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produks_color`
--
ALTER TABLE `produks_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produks_size`
--
ALTER TABLE `produks_size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
