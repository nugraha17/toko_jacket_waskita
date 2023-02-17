-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 09:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_jacket`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(12) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  `total_stok` int(12) DEFAULT NULL,
  `stok_s` int(20) NOT NULL,
  `stok_l` int(20) NOT NULL,
  `stok_m` int(20) NOT NULL,
  `stok_xl` int(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `berat` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `harga`, `total_stok`, `stok_s`, `stok_l`, `stok_m`, `stok_xl`, `deskripsi`, `gambar`, `berat`) VALUES
(29, 'Heatmap V2 Experimental Hoodie', 1000000, 20, 5, 5, 5, 5, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.', 'IMG-20221223-WA0005.jpg', 250),
(30, 'Last Pieces Of The Year', 1000000, 20, 5, 5, 5, 5, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.', '311192135_3243136789274114_1946370209982216143_n.jpg', 250),
(31, 'Outwear Sweater Hoodie', 1000000, 17, 2, 5, 5, 5, 'Outwear Sweater Hoodie ', 'konkritemarket-20230208-0001.jpg', 250),
(32, 'Yelow Earth', 1000000, 18, 3, 5, 5, 5, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.\r\n\r\n', 'konkritemarket-20230208-0003.jpg', 250),
(33, 'Green House', 1000000, 15, 0, 5, 5, 5, 'Green House ', 'IMG-20221223-WA0002.jpg', 259),
(34, 'Sweat Greey', 1000000, 20, 5, 5, 5, 5, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.\r\n\r\n', 'IMG-20221223-WA0000.jpg', 250),
(35, 'Piech for World', 1000000, 20, 5, 5, 5, 5, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.', '307409555_500983338523058_6752946387229247710_n.jpg', 500),
(36, 'Skull Greey', 1000000, 19, 5, 5, 5, 5, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.\r\n\r\n', '288643249_749090126443141_7679311060371188823_n.jpg', 200),
(37, 'Yellow Blue Flower', 1000000, 17, 4, 5, 5, 5, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.\r\n\r\n', '307291593_190140610096159_6244705316767542927_n.jpg', 300),
(38, 'Spider Red', 1000000, 8, 2, 2, 2, 2, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.', '311726421_131803596303449_563057001624044671_n.jpg', 200),
(39, 'Earth Loving', 1000000, 80, 20, 20, 20, 20, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.', '289945489_1164149097488502_6122857073164074300_n.jpg', 300),
(40, 'Beautyfull Earth', 1000000, 11, 1, 5, 5, 5, 'Sweater yang cocok untuk sista and agan yang selalu mengikuti trend kekinian dan juga fashionable karna bahan lembut juga tidak mudah kusut tentunya menambah kesan rapih hissss jangan ragu ya sista karna Kemiripan barang 98% karna kita buat semirip mungkin dengan gambar .jadi apa yang kaka liat itu yang akan kaka dapatkan.', '300080239_586891373075438_6153394471291232882_n.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(12) NOT NULL,
  `id_barang` int(22) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `id_barang`, `ket`, `gambar`) VALUES
(34, 14, 'ini adalah keterangan', 'spesifikasi-printer-canon-pixma-mp237.jpg'),
(35, 13, 'dari saping kanan', 'DSC_8884.JPG'),
(36, 21, 'keterangan barang', 'kindpng_1340776.png'),
(37, 28, 'qewrqewrqerqwer', 'Untitled_Diagram-Page-2.png'),
(38, 29, 'ini adalah keterangan', 'IMG-20221223-WA0003.jpg'),
(40, 30, 'ini adalah keterangan', '311777081_435024952091511_5212370189460152350_n.jpg'),
(41, 31, 'ini adalah keterangan', 'konkritemarket-20230208-0002.jpg'),
(42, 32, 'ini adalah keterangan', 'konkritemarket-20230208-0004.jpg'),
(43, 33, 'ini adalah keterangan', 'IMG-20221223-WA0001.jpg'),
(44, 34, 'ini adalah keterangan', 'IMG-20221223-WA0004.jpg'),
(46, 36, 'ini adalah keterangan', '288857744_560169129105351_2408752745503585623_n.jpg'),
(47, 37, 'ini adalah keterangan', '307439684_1271489550280688_4237478775431005822_n.jpg'),
(48, 38, 'ini adalah keterangan', '311927765_657928465846691_1507665511995227869_n.jpg'),
(49, 39, 'ini adalah keterangan', '289625617_821772635461916_3925866541825138848_n.jpg'),
(50, 40, 'ini adalah keterangan', '299505411_607121137621023_4233682919523464466_n.jpg'),
(52, 35, 'Tampak dekat', '307159959_3360003190942488_8146708322746326011_n.jpg'),
(53, 35, 'Tampak Belakang', '307631782_1251620639008386_3197118579848725161_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`) VALUES
(10, 'waskita', 'waskita1234@gmail.com', 'waskita'),
(12, 'waskita12', 'waskita12@gmail.com', 'waskita'),
(13, 'nugraha12', 'nugraha12@gmail.com', 'waskita'),
(19, 'sileh ', 'sileh@gmail.com', 'sileh1'),
(20, 'waskita9', 'waskita9@gmail.com', 'waskita'),
(21, 'waskita', 'waskita@waskita.com', 'waskita'),
(22, 'waskita5', 'waskita5@gmail.com', 'waskita'),
(23, 'waskita6', 'waskita6@gmail.com', 'waskita');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(20) NOT NULL,
  `nama_bank` varchar(200) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `atas_nama` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, '   MANDIRI', '   9090-0000-9999-9090', 'NUGRAHA WARIH WASKITA'),
(4, 'BRI', ' 034534099345093490', ' WASKTIA WARIH NUGRAHA'),
(5, 'BNI', '9045-0770-9999-35435', '  WASKITA WARIH NUGRAHA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci` int(12) NOT NULL,
  `no_order` varchar(20) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id_rinci`, `no_order`, `id_barang`, `qty`, `ukuran`) VALUES
(94, '20230209DNMJZCYX', 33, 5, 'S'),
(95, '20230212FQXZS4KF', 37, 1, 'S'),
(96, '20230213LJUWW3VQ', 32, 2, 'S'),
(97, '202302138HR9AEPV', 31, 3, 'S'),
(98, '202302135CWROJM3', 36, 1, 'S'),
(99, '202302135CWROJM3', 37, 2, 'S'),
(100, '202302140DKCFJSM', 40, 5, 'S'),
(101, '20230214HACDWO82', 40, 4, 'S');

--
-- Triggers `tbl_rinci_transaksi`
--
DELIMITER $$
CREATE TRIGGER `penjualan_pesanan` AFTER INSERT ON `tbl_rinci_transaksi` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET total_stok = total_stok-NEW.qty
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(12) NOT NULL,
  `nama_toko` varchar(200) DEFAULT NULL,
  `lokasi` int(15) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telpon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telpon`) VALUES
(1, 'Black Market', 33212, 'jalan palagan km 90', '081226931079');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(12) NOT NULL,
  `no_order` varchar(20) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(225) DEFAULT NULL,
  `hp_penerima` varchar(12) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(15) DEFAULT NULL,
  `expedisi` varchar(100) DEFAULT NULL,
  `paket` varchar(100) DEFAULT NULL,
  `estimasi` varchar(100) DEFAULT NULL,
  `ongkir` int(12) DEFAULT NULL,
  `berat` int(12) DEFAULT NULL,
  `grand_total` int(12) DEFAULT NULL,
  `total_bayar` int(12) DEFAULT NULL,
  `status_bayar` int(12) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(30) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_penerima`, `hp_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(65, 19, '20230209DNMJZCYX', '2023-02-09', 'was', '123456789123', '5', '55812', 'sleman ', '55582', 'jne', 'REG', '3-6 Hari', 37000, 1295, 5000000, 5037000, 1, '299306468_3282876945265031_2708662557793888973_n.jpg', 'wasd', 'BRI', '034534099345093490', 3, '341234123412341234'),
(66, 20, '20230212FQXZS4KF', '2023-02-12', 'was', '123412341234', '13', '70712', 'rtwtergefgf', '55582', 'jne', 'OKE', '3-5 Hari', 49000, 300, 1000000, 1049000, 1, '203497988_1460123060999983_1490575931496841323_n.jpg', 'waskita9', 'MANDIRI', '	034534099345093490', 3, '341234123412341234'),
(67, 20, '20230213LJUWW3VQ', '2023-02-13', 'waskita12', '034593', '2', '33212', 'sleman ', '55582', 'tiki', 'ECO', '4 Hari', 34000, 500, 2000000, 2034000, 1, '307291593_190140610096159_6244705316767542927_n.jpg', 'cika', 'BRI', '034534099345093490', 2, '341234123412341234'),
(68, 20, '202302138HR9AEPV', '2023-02-13', 'nugraha12', '123456789123', '6', '11220', 'sleman ', '55582', 'jne', 'OKE', '2-3 Hari', 17000, 750, 3000000, 3017000, 1, '311192135_3243136789274114_1946370209982216143_n.jpg', 'cika', 'PLECIT', '034534099345093490', 3, '67576585786'),
(69, 20, '202302135CWROJM3', '2023-02-13', 'nugraha12', '081226931073', '16', '77211', 'rtwtergefgf', '55582', 'tiki', 'ECO', '5 Hari', 84000, 800, 3000000, 3084000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(70, 22, '202302140DKCFJSM', '2023-02-14', 'waskita', '081226931073', '1', '80351', 'jogjakarta', '55582', 'jne', 'REG', '3-4 Hari', 52000, 25, 5000000, 5052000, 1, 'IMG-20221223-WA0001.jpg', 'waskita', 'MANDIRI', '9090-0000-9999-9090', 1, NULL),
(71, 23, '20230214HACDWO82', '2023-02-14', 'waskita6', '081226931073', '1', '80351', 'jogjakarta', '55582', 'pos', 'Pos Reguler', '8 HARI Hari', 43500, 20, 4000000, 4043500, 1, 'WhatsApp_Image_2023-02-10_at_16_25_22.jpg', 'waskita6', 'MANDIRI', '9090-0000-9999-9090', 3, 'NOMOR RESI 333333');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(12) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(6, 'waskita', 'waskita', 'waskita', 1),
(1236, 'warih', 'warih', 'warih', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_2` (`id_barang`);

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1238;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD CONSTRAINT `tbl_rinci_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
