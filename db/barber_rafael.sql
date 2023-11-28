-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2023 pada 17.11
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barber_rafael`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_barber`
--

CREATE TABLE `admin_barber` (
  `id_admin` varchar(12) NOT NULL,
  `id_pengguna` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `foto_admin` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_barber`
--

INSERT INTO `admin_barber` (`id_admin`, `id_pengguna`, `nama`, `foto_admin`) VALUES
('admin1243213', 'adm202311229', 'rafael dwiky', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barber`
--

CREATE TABLE `barber` (
  `id_barber` varchar(12) NOT NULL,
  `nama_barber` varchar(50) NOT NULL,
  `nohp_barber` int(15) NOT NULL,
  `foto_barber` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barber`
--

INSERT INTO `barber` (`id_barber`, `nama_barber`, `nohp_barber`, `foto_barber`) VALUES
('BRB2017', 'dera', 2147483647, 'Yudha.jpg'),
('BRB3159', 'baidowi', 34546345, 'Totok.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barber_break`
--

CREATE TABLE `barber_break` (
  `id_barber` varchar(12) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pengeluaran`
--

CREATE TABLE `kategori_pengeluaran` (
  `id_kategori_pengeluaran` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` varchar(12) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `deskripsi_layanan` varchar(225) DEFAULT NULL,
  `harga_layanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `deskripsi_layanan`, `harga_layanan`) VALUES
('serv001', 'HairCut + Wash', 'deskripsi', 35000),
('serv002', 'Haircolor', 'deskripsi', 90000),
('serv003', 'Pomade', 'deskripsi', 50000),
('serv004', 'Clay', 'deskripsi', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_dipesan`
--

CREATE TABLE `layanan_dipesan` (
  `id_pemesanan` varchar(12) NOT NULL,
  `id_layanan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_detail`
--

CREATE TABLE `level_detail` (
  `id_level` tinyint(4) NOT NULL,
  `level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level_detail`
--

INSERT INTO `level_detail` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` varchar(12) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `tanggal_payment` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_rekening` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(12) NOT NULL,
  `id_pengguna` varchar(225) DEFAULT NULL,
  `nama` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_pengguna`, `nama`) VALUES
('plg65660f0b8', 'usr30449', 'gandu santoso');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(12) NOT NULL,
  `jenis_pemesanan` varchar(20) NOT NULL,
  `id_reservasi` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_payment` varchar(12) NOT NULL,
  `id_pelanggan` varchar(12) NOT NULL,
  `nomor_antrian` int(11) DEFAULT NULL,
  `id_barber` varchar(12) DEFAULT NULL,
  `batal` int(11) NOT NULL,
  `alasan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_kategori_pengeluaran` int(11) NOT NULL,
  `ket_pengeluaran` varchar(225) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `username`, `email`, `nohp`, `password`, `level`) VALUES
('adm202311229', 'rafael dwiky', 'admin1', 'rafael@gmail.com', '+6285157444235', '1234', 1),
('usr30449', 'gandu santoso', 'user', 'gandu@gmail.com', '0878563776235', '1234', 2);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_admindetail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_admindetail` (
`id_admin` varchar(12)
,`id_pengguna` varchar(225)
,`nama` varchar(225)
,`username` varchar(225)
,`email` varchar(225)
,`nohp` varchar(20)
,`password` varchar(225)
,`foto_admin` varchar(225)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pelanggan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pelanggan` (
`id_pelanggan` varchar(12)
,`id_pengguna` varchar(225)
,`nama` varchar(225)
,`username` varchar(225)
,`email` varchar(225)
,`nohp` varchar(20)
,`password` varchar(225)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_admindetail`
--
DROP TABLE IF EXISTS `view_admindetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_admindetail`  AS SELECT `admin_barber`.`id_admin` AS `id_admin`, `pengguna`.`id_pengguna` AS `id_pengguna`, `pengguna`.`nama` AS `nama`, `pengguna`.`username` AS `username`, `pengguna`.`email` AS `email`, `pengguna`.`nohp` AS `nohp`, `pengguna`.`password` AS `password`, `admin_barber`.`foto_admin` AS `foto_admin` FROM (`pengguna` join `admin_barber` on(`pengguna`.`id_pengguna` = `admin_barber`.`id_pengguna`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pelanggan`
--
DROP TABLE IF EXISTS `view_pelanggan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelanggan`  AS SELECT `pelanggan`.`id_pelanggan` AS `id_pelanggan`, `pengguna`.`id_pengguna` AS `id_pengguna`, `pengguna`.`nama` AS `nama`, `pengguna`.`username` AS `username`, `pengguna`.`email` AS `email`, `pengguna`.`nohp` AS `nohp`, `pengguna`.`password` AS `password` FROM (`pelanggan` join `pengguna` on(`pelanggan`.`id_pengguna` = `pengguna`.`id_pengguna`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_barber`
--
ALTER TABLE `admin_barber`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`id_barber`);

--
-- Indeks untuk tabel `barber_break`
--
ALTER TABLE `barber_break`
  ADD KEY `id_barber` (`id_barber`);

--
-- Indeks untuk tabel `kategori_pengeluaran`
--
ALTER TABLE `kategori_pengeluaran`
  ADD PRIMARY KEY (`id_kategori_pengeluaran`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `layanan_dipesan`
--
ALTER TABLE `layanan_dipesan`
  ADD KEY `id_reservasi` (`id_pemesanan`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indeks untuk tabel `level_detail`
--
ALTER TABLE `level_detail`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_payment` (`id_payment`),
  ADD KEY `id_barber` (`id_barber`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_kategori_pengeluaran` (`id_kategori_pengeluaran`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level_detail`
--
ALTER TABLE `level_detail`
  MODIFY `id_level` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin_barber`
--
ALTER TABLE `admin_barber`
  ADD CONSTRAINT `admin_barber_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barber_break`
--
ALTER TABLE `barber_break`
  ADD CONSTRAINT `barber_break_ibfk_1` FOREIGN KEY (`id_barber`) REFERENCES `barber` (`id_barber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `layanan_dipesan`
--
ALTER TABLE `layanan_dipesan`
  ADD CONSTRAINT `layanan_dipesan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `layanan_dipesan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_barber`) REFERENCES `barber` (`id_barber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_kategori_pengeluaran`) REFERENCES `kategori_pengeluaran` (`id_kategori_pengeluaran`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level_detail` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
