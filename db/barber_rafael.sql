-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2023 pada 13.53
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
('adm01122023', 'adm202311229', 'rafael dwiky', 'admin-profile.png');

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
('BRB1484', 'Nofal', 2147483647, 'Nofal.jpg'),
('BRB1572', 'Basit', 2147483647, 'Basit.jpg\r\n'),
('BRB2017', 'Yudha', 2147483647, 'Yudha.jpg'),
('BRB3159', 'Totok', 34546345, 'Totok.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barber_status`
--

CREATE TABLE `barber_status` (
  `id_barber` varchar(12) NOT NULL,
  `availability` varchar(10) NOT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barber_status`
--

INSERT INTO `barber_status` (`id_barber`, `availability`, `tanggal_awal`, `tanggal_akhir`, `keterangan`, `deskripsi`) VALUES
('BRB1484', 'ready', NULL, NULL, NULL, NULL),
('BRB1572', 'ready', NULL, NULL, NULL, NULL),
('BRB2017', 'ready', NULL, NULL, NULL, NULL),
('BRB3159', 'ready', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_barber`
--

CREATE TABLE `jadwal_barber` (
  `id_barber` varchar(12) NOT NULL,
  `hari` tinyint(4) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_barber`
--

INSERT INTO `jadwal_barber` (`id_barber`, `hari`, `jam`) VALUES
('BRB1484', 1, '12:00:00'),
('BRB1484', 1, '15:00:00'),
('BRB1572', 2, '15:00:00'),
('BRB1484', 2, '18:00:00'),
('BRB1484', 2, '12:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_akses`
--

CREATE TABLE `karyawan_akses` (
  `id_pengguna` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan_akses`
--

INSERT INTO `karyawan_akses` (`id_pengguna`, `nama`) VALUES
('kry1', 'karyawan_akses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` varchar(12) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_barber` varchar(12) DEFAULT NULL,
  `totalharga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `tanggal`, `id_barber`, `totalharga`, `bayar`, `kembalian`) VALUES
('ksr/0000', '2023-10-01 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/1010', '2023-10-22 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/1111', '2023-09-15 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/1212', '2023-10-08 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/1313', '2023-10-08 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/1414', '2023-10-08 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/1515', '2023-10-08 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/1616', '2023-10-15 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/1717', '2023-10-15 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/1818', '2023-10-15 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/1919', '2023-10-15 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/2020', '2023-10-22 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/2121', '2023-10-22 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/2222', '2023-09-08 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/2323', '2023-10-22 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/2342', '2023-10-22 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/2525', '2023-11-01 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/2537', '2023-09-08 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/2543', '2023-12-16 07:14:20', 'BRB1572', 125000, 150000, 25000),
('ksr/2626', '2023-11-01 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/2727', '2023-11-01 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/2828', '2023-11-08 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/2929', '2023-11-08 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/3030', '2023-11-08 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/3131', '2023-11-08 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/3232', '2023-11-15 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/3333', '2023-09-22 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/3434', '2023-11-15 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/3535', '2023-11-15 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/3636', '2023-11-15 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/3737', '2023-11-22 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/3838', '2023-11-22 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/3939', '2023-11-22 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/4040', '2023-11-22 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/4210', '2023-09-15 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/4226', '2023-09-01 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/4242', '2023-11-22 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/4444', '2023-09-22 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/4562', '2023-09-15 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/5146', '2023-09-08 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/5165', '2023-09-01 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/5423', '2023-09-01 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/5555', '2023-09-22 07:00:00', 'BRB1572', 35000, 35000, 0),
('ksr/5652', '2023-09-15 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/6516', '2023-09-08 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/6666', '2023-09-22 07:00:00', 'BRB2017', 35000, 35000, 0),
('ksr/7777', '2023-09-22 07:00:00', 'BRB3159', 35000, 35000, 0),
('ksr/8888', '2023-10-01 07:00:00', 'BRB1484', 35000, 35000, 0),
('ksr/9999', '2023-10-01 07:00:00', 'BRB1572', 35000, 35000, 0);

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
  `id_layanan` varchar(12) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan_dipesan`
--

INSERT INTO `layanan_dipesan` (`id_pemesanan`, `id_layanan`, `nama_layanan`, `jumlah`, `harga`, `total`) VALUES
('pms/0000', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1111', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2222', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3333', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4444', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5555', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6666', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7777', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8888', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9999', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0009', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7890', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9765', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5043', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1234', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2567', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1346', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2215', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3224', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1188', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2454', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2453', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8533', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4523', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3556', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5257', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9988', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5566', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6677', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3322', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1133', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2255', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5464', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6475', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8855', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0975', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9954', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3367', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8643', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7832', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6327', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9279', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0214', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8358', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2463', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3008', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2002', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2000', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2001', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2003', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3002', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2004', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2005', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2200', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2006', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2007', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2008', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2009', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3600', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4050', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6064', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6460', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5707', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5976', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9608', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6857', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6879', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2345', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5377', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8797', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5766', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6966', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2790', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5631', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6859', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4577', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5743', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2465', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7373', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5767', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5467', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3789', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2246', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7879', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2446', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7854', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4657', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7425', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3467', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5009', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5457', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3754', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3565', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4574', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3643', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8945', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1945', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1950', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3642', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1175', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6313', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1244', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6284', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8642', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4682', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7451', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1538', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6385', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1043', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1046', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1086', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3567', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7456', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6396', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6628', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2749', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2563', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6589', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6528', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5630', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6316', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6599', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2938', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8379', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8836', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7292', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0756', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6206', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0056', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0526', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0256', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5260', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0264', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0562', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0246', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0245', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5620', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9245', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9456', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6479', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9562', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2965', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5265', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6430', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5256', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5744', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4637', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4426', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8435', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5345', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4535', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6463', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4679', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8746', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4678', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2457', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7895', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6668', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7567', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3267', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6435', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3657', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4757', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8685', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5357', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7586', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6574', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4786', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3573', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8535', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8673', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4643', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7658', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1156', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7538', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5586', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5788', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3578', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9087', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6488', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4685', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8521', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4653', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8645', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7546', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5736', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7435', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5486', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9880', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4889', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0564', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9604', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9769', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6767', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0765', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0680', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9758', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5786', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1426', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6143', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8649', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8469', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9230', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0728', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7264', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8246', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6289', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7457', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4725', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5242', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/1342', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4234', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5236', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0483', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6234', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5327', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9749', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5279', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6328', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0237', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0403', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0470', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0043', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0707', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0808', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8808', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0064', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6800', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4589', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9477', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9907', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0575', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5896', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9965', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9547', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4899', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6346', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9436', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6539', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6235', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9573', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5846', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3865', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6370', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9263', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7382', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5637', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6483', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7354', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7346', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7344', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5264', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8363', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9936', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0737', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8925', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9236', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9295', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2936', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0273', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0023', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7290', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0374', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0364', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0075', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7207', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/0757', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8373', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7377', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7394', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2647', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2649', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7489', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9274', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/8399', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/2747', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5484', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/3446', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4356', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6375', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5638', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/5628', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6386', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7356', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/4846', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/6286', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/7294', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('pms/9269', 'serv001', 'HairCut + Wash', 1, 35000, 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_pesan_kasir`
--

CREATE TABLE `layanan_pesan_kasir` (
  `id_kasir` varchar(12) NOT NULL,
  `id_layanan` varchar(12) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan_pesan_kasir`
--

INSERT INTO `layanan_pesan_kasir` (`id_kasir`, `id_layanan`, `nama_layanan`, `jumlah`, `harga`, `total`) VALUES
('ksr/4226', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/5165', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/5423', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/6516', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/5146', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2222', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2537', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/4562', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/5652', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/4210', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1111', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3333', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/4444', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/5555', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/6666', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/7777', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/8888', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/9999', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/0000', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1212', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1313', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1414', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1515', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1616', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1717', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1818', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1919', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2020', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2121', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/1010', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2323', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2342', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2525', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2626', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2727', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2828', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2929', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3030', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3131', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3232', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3434', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3535', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3636', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3737', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3838', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/3939', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/4040', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/4242', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2543', 'serv001', 'HairCut + Wash', 1, 35000, 35000),
('ksr/2543', 'serv002', 'Haircolor', 1, 90000, 90000);

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
(2, 'user'),
(3, 'karyawan');

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
('plg04435', 'usr04435', 'maverick vinalles'),
('plg11325', 'usr11325', 'heri yanto'),
('plg13246', 'usr13246', 'paris fernandes'),
('plg13498', 'usr13498', 'bayu gatra'),
('plg30449', 'usr30449', 'gandu santoso'),
('plg41359', 'usr41359', 'mas firman'),
('plg42658', 'usr42658', 'leonel messi'),
('plg44562', 'usr44562', 'iqbal ibong'),
('plg45682', 'usr45682', 'rafael acel'),
('plg48798', 'usr48798', 'ricky kurnia'),
('plg52135', 'usr52135', 'francesco bagnaia'),
('plg58077', 'usr58077', 'alzando sigit'),
('plg64194', 'usr64194', 'dani sugiarto'),
('plg6573067ad', 'usr96524', 'suyadi wijiatmoko'),
('plg6576f5101', 'usr47352', 'kocak'),
('plg6579c304e', 'usr31255', 'paisal talukdar'),
('plg71984', 'usr71984', 'alfin faiz'),
('plg75613', 'usr75613', 'ikker cassilas'),
('plg76523', 'usr76523', 'valentino rossi'),
('plg79513', 'usr79513', 'gading galih'),
('plg82347', 'usr82347', 'wisnu shantika'),
('plg84430', 'usr84430', 'marc marquez'),
('plg92588', 'usr92588', 'fahmi kurniawa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_pelanggan` varchar(12) NOT NULL,
  `id_barber` varchar(12) DEFAULT NULL,
  `totalharga` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tanggal`, `jam`, `id_pelanggan`, `id_barber`, `totalharga`, `bayar`, `kembalian`, `id_status`, `catatan`) VALUES
('pms/0000', '2023-06-01', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/0009', '2023-06-01', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0023', '2023-11-15', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/0043', '2023-10-22', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0056', '2023-08-15', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/0064', '2023-11-01', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0075', '2023-11-15', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/0214', '2023-06-15', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0237', '2023-10-22', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/0245', '2023-08-22', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/0246', '2023-08-22', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0256', '2023-08-15', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0264', '2023-08-22', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/0273', '2023-11-15', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/0364', '2023-11-15', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/0374', '2023-11-15', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0403', '2023-10-22', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/0470', '2023-10-22', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/0483', '2023-10-22', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/0526', '2023-08-15', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/0562', '2023-08-22', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/0564', '2023-10-08', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0575', '2023-11-01', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/0680', '2023-10-08', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/0707', '2023-10-22', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/0728', '2023-10-15', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/0737', '2023-11-08', '21:00:00', 'plg82347', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0756', '2023-08-15', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0757', '2023-11-15', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0765', '2023-10-08', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/0808', '2023-11-01', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/0975', '2023-06-15', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/1043', '2023-08-08', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/1046', '2023-08-08', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/1086', '2023-08-08', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/1111', '2023-06-01', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/1133', '2023-06-08', '21:00:00', 'plg82347', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/1156', '2023-09-22', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/1175', '2023-08-01', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/1188', '2023-06-08', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/1234', '2023-06-01', '21:00:00', 'plg82347', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/1244', '2023-08-01', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/1342', '2023-10-15', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/1346', '2023-06-08', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/1426', '2023-10-08', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/1538', '2023-08-01', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/1945', '2023-08-01', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/1950', '2023-08-01', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/1a23', '2023-12-11', '12:00:00', 'plg48798', 'BRB1484', NULL, NULL, NULL, 1, NULL),
('pms/2000', '2023-06-15', '21:00:00', 'plg92588', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2001', '2023-06-22', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/2002', '2023-06-15', '21:00:00', 'plg82347', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/2003', '2023-06-22', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/2004', '2023-06-22', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2005', '2023-06-22', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/2006', '2023-06-22', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/2007', '2023-06-22', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2008', '2023-06-22', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/2009', '2023-06-22', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/2200', '2023-06-22', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/2215', '2023-06-08', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/2222', '2023-06-01', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/2246', '2023-07-15', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/2255', '2023-06-08', '21:00:00', 'plg92588', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2345', '2023-07-01', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2446', '2023-07-15', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/2453', '2023-06-08', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/2454', '2023-06-08', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/2457', '2023-09-08', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2463', '2023-06-15', '21:00:00', 'plg71984', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/2465', '2023-07-08', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/2563', '2023-08-08', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/2567', '2023-06-01', '21:00:00', 'plg92588', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2647', '2023-11-15', '21:00:00', 'plg82347', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/2649', '2023-11-15', '21:00:00', 'plg92588', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2747', '2023-11-22', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2749', '2023-08-08', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/2790', '2023-07-08', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/2936', '2023-11-15', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/2938', '2023-08-15', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/2965', '2023-08-22', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/3002', '2023-06-22', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/3008', '2023-06-15', '21:00:00', 'plg79513', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/3224', '2023-06-08', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/3267', '2023-09-08', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/3322', '2023-06-08', '21:00:00', 'plg79513', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/3333', '2023-06-01', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/3367', '2023-06-15', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/3446', '2023-11-22', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/3467', '2023-07-22', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/3556', '2023-06-08', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/3565', '2023-07-22', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/3567', '2023-08-08', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/3573', '2023-09-22', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/3578', '2023-10-01', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/3600', '2023-06-22', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/3642', '2023-08-01', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/3643', '2023-07-22', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/3657', '2023-09-15', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/3754', '2023-07-22', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/3789', '2023-07-15', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/3865', '2023-11-08', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/4050', '2023-06-22', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/4234', '2023-10-15', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/4356', '2023-11-22', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/4426', '2023-09-01', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/4444', '2023-06-01', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/4523', '2023-06-08', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/4535', '2023-09-01', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/4574', '2023-07-22', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/4577', '2023-07-08', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/4589', '2023-11-01', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/4637', '2023-09-01', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/4643', '2023-09-22', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/4653', '2023-10-01', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/4657', '2023-07-15', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/4678', '2023-09-08', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/4679', '2023-09-08', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/4682', '2023-08-01', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/4685', '2023-10-01', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/4725', '2023-10-15', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/4757', '2023-09-15', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/4786', '2023-09-15', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/4846', '2023-11-22', '21:00:00', 'plg71984', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/4889', '2023-10-08', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/4899', '2023-11-01', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/5009', '2023-07-22', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5043', '2023-06-01', '21:00:00', 'plg79513', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5236', '2023-10-22', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5242', '2023-10-15', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5256', '2023-09-01', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5257', '2023-06-08', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5260', '2023-08-15', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/5264', '2023-11-08', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/5265', '2023-08-22', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/5279', '2023-10-22', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5327', '2023-10-22', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/5345', '2023-09-01', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5357', '2023-09-15', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5377', '2023-07-01', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5457', '2023-07-22', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/5464', '2023-06-15', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5467', '2023-07-15', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5484', '2023-11-22', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5486', '2023-10-01', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/5555', '2023-06-01', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5566', '2023-06-08', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/5586', '2023-09-22', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/5620', '2023-08-22', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5628', '2023-11-22', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5630', '2023-08-08', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/5631', '2023-07-08', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5637', '2023-11-08', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/5638', '2023-11-22', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5707', '2023-06-22', '21:00:00', 'plg82347', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/5736', '2023-10-01', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5743', '2023-07-08', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5744', '2023-09-01', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5766', '2023-07-01', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/5767', '2023-07-08', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/5786', '2023-10-08', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5788', '2023-10-01', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5846', '2023-11-08', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/5896', '2023-11-01', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/5976', '2023-06-22', '21:00:00', 'plg92588', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6064', '2023-06-22', '21:00:00', 'plg71984', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/6143', '2023-10-08', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6206', '2023-08-15', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6234', '2023-10-22', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6235', '2023-11-01', '21:00:00', 'plg92588', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6284', '2023-08-01', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6286', '2023-11-22', '21:00:00', 'plg79513', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/6289', '2023-10-15', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6313', '2023-08-01', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/6316', '2023-08-15', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/6327', '2023-06-15', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/6328', '2023-10-22', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6346', '2023-11-01', '21:00:00', 'plg71984', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/6370', '2023-11-08', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6375', '2023-11-22', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6385', '2023-08-01', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6386', '2023-11-22', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6396', '2023-08-08', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/6430', '2023-08-22', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6435', '2023-09-15', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/6460', '2023-06-22', '21:00:00', 'plg79513', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/6463', '2023-09-01', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6475', '2023-06-15', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/6479', '2023-08-22', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6483', '2023-11-08', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6488', '2023-10-01', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6528', '2023-08-08', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6539', '2023-11-01', '21:00:00', 'plg82347', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6574', '2023-09-15', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6589', '2023-08-08', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/6599', '2023-08-15', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/6628', '2023-08-08', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6666', '2023-06-01', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6668', '2023-09-08', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/6677', '2023-06-08', '21:00:00', 'plg71984', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/6767', '2023-10-08', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/6800', '2023-11-01', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/6857', '2023-07-01', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/6859', '2023-07-08', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6879', '2023-07-01', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/6966', '2023-07-01', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/7207', '2023-11-15', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/7264', '2023-10-15', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/7290', '2023-11-15', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/7292', '2023-08-15', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/7294', '2023-11-22', '21:00:00', 'plg82347', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/7344', '2023-11-08', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/7346', '2023-11-08', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/7354', '2023-11-08', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/7356', '2023-11-22', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/7373', '2023-07-08', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/7377', '2023-11-15', '21:00:00', 'plg71984', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/7382', '2023-11-08', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/7394', '2023-11-15', '21:00:00', 'plg79513', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/7425', '2023-07-15', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/7435', '2023-10-01', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/7451', '2023-08-01', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/7456', '2023-08-08', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/7457', '2023-10-15', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/7489', '2023-11-22', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/7538', '2023-09-22', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/7546', '2023-10-01', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/7567', '2023-09-08', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/7586', '2023-09-15', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/7658', '2023-09-22', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/7777', '2023-06-01', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/7832', '2023-06-15', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/7854', '2023-07-15', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/7879', '2023-07-15', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/7890', '2023-06-01', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/7895', '2023-09-08', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/8246', '2023-10-15', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/8358', '2023-06-15', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/8363', '2023-11-08', '21:00:00', 'plg71984', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/8373', '2023-11-15', '18:00:00', 'plg64194', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/8379', '2023-08-15', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/8399', '2023-11-22', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/8435', '2023-09-01', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/8469', '2023-10-15', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/8521', '2023-10-01', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/8533', '2023-06-08', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/8535', '2023-09-22', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/8642', '2023-08-01', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/8643', '2023-06-15', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/8645', '2023-10-01', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/8649', '2023-10-15', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/8673', '2023-09-22', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/8685', '2023-09-15', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/8746', '2023-09-08', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/8797', '2023-07-01', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/8808', '2023-11-01', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/8836', '2023-08-15', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/8855', '2023-06-15', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/8888', '2023-06-01', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/8925', '2023-11-08', '21:00:00', 'plg92588', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/8945', '2023-07-22', '15:00:00', 'plg45682', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/9087', '2023-10-01', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/9230', '2023-10-15', '12:00:00', 'plg13246', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/9236', '2023-11-15', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9245', '2023-08-22', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/9263', '2023-11-08', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9269', '2023-11-22', '21:00:00', 'plg92588', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/9274', '2023-11-22', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/9279', '2023-06-15', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/9295', '2023-11-15', '12:00:00', 'plg11325', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/9436', '2023-11-01', '21:00:00', 'plg79513', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/9456', '2023-08-22', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/9477', '2023-11-01', '15:00:00', 'plg42658', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/9547', '2023-11-01', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/9562', '2023-08-22', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9573', '2023-11-08', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9604', '2023-10-08', '12:00:00', 'plg30449', 'BRB3159', 35000, 35000, 0, 3, NULL),
('pms/9608', '2023-07-01', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9749', '2023-10-22', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9758', '2023-10-08', '18:00:00', 'plg48798', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9765', '2023-06-01', '21:00:00', 'plg71984', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9769', '2023-10-08', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9880', '2023-10-08', '12:00:00', 'plg04435', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9907', '2023-11-01', '15:00:00', 'plg44562', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/9936', '2023-11-08', '21:00:00', 'plg79513', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/9954', '2023-06-15', '15:00:00', 'plg41359', 'BRB1484', 35000, 35000, 0, 3, NULL),
('pms/9965', '2023-11-01', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('pms/9988', '2023-06-08', '18:00:00', 'plg58077', 'BRB2017', 35000, 35000, 0, 3, NULL),
('pms/9999', '2023-06-01', '18:00:00', 'plg52135', 'BRB1572', 35000, 35000, 0, 3, NULL),
('psm/1a23', '2023-12-11', '12:00:00', 'plg11325', 'BRB1484', NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `ket_pengeluaran` varchar(225) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `ket_pengeluaran`, `harga`, `jumlah`, `tanggal`) VALUES
(2, 'Listrik', 700000, 1, '2023-11-01 08:02:20'),
(3, 'Listrik', 700000, 1, '2023-12-01 08:03:20'),
(4, 'Listrik', 700000, 1, '2023-06-01 15:51:22'),
(5, 'Listrik', 700000, 1, '2023-07-01 15:51:22'),
(6, 'Listrik', 700000, 1, '2023-08-01 15:51:22'),
(7, 'Listrik', 700000, 1, '2023-09-01 15:51:22'),
(8, 'Listrik', 700000, 1, '2023-10-01 15:51:22');

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
('kry1', 'karyawan_akses', 'karyawan123', 'karyawan@gmail.com', '081332985657', '1234', 3),
('usr04435', 'maverick vinalles', 'vinalles12', 'maverickvinalles@gmail.com', '085623145698', 'vinallesyamaha12', 2),
('usr11325', 'heri yanto', 'yanto86', 'heriyanto@gmail.com', '082365412365', 'heryanto', 2),
('usr13246', 'paris fernandes', 'parispisang', 'parisfernandes@gmail.com', '086231256452', 'parispohonpisang', 2),
('usr13498', 'bayu gatra', 'bayu03', 'bayugatra@gmail.com', '086545213245', 'bayu03', 2),
('usr30449', 'gandu santoso', 'user', 'gandu@gmail.com', '0878563776235', '1234', 2),
('usr31255', 'paisal talukdar', 'paisal123', 'paisal123@gmail.com', '085808200935', 'semboyancinta123', 2),
('usr41359', 'mas firman', 'firmanmid', 'masfirman@gmail.com', '086356245623', 'masfirmanmid', 2),
('usr42658', 'leonel messi', 'messi10', 'leonelmessi@gmail.com', '084456123452', 'messi10', 2),
('usr44562', 'iqbal ibong', 'ibong88', 'iqbalibong@gmail.com', '088564256320', 'iqbalabdilah', 2),
('usr45682', 'rafael acel', 'acel123', 'rafaelacel@gmail.com', '081445685456', 'qwertyacel', 2),
('usr47352', 'kocak', 'kocak', 'kocak@gmail.com', '07767767677', '123', 2),
('usr48798', 'ricky kurnia', 'rickur78', 'rickykurnia@gmail.com', '089653244652', 'ricky09', 2),
('usr52135', 'francesco bagnaia', 'peco1', 'francescobagnaia@gmail.com', '084756423589', 'pecojurdun1', 2),
('usr58077', 'alzando sigit', 'sigit123', 'sigitzando1@gmail.com', '08569843234', 'sigit123', 2),
('usr64194', 'dani sugiarto', 'danibeler123', 'daniarto@gmail.com', '089878324242', 'dani111', 2),
('usr71984', 'alfin faiz', 'faiz123', 'faizpekok@gmail.com', '084532438794', 'faizgebang123', 2),
('usr75613', 'ikker cassilas', 'cassilas1', 'ikkercassilas@gmail.com', '087523014624', 'cassilasmadrid1', 2),
('usr76523', 'valentino rossi', 'vr46', 'valentinorossi@gmail.com', '081456265789', 'rossilegendgp46', 2),
('usr79513', 'gading galih', 'gading00', 'gadinggalih@gmail.com', '083256425695', 'gadinggajah', 2),
('usr82347', 'wisnu shantika', 'wisnuibnu123', 'ibnusanthika@gmail.com', '087874526543', 'ibnuremix321', 2),
('usr84430', 'marc marquez', 'mm93', 'marcmarquez@gmail.com', '087653214256', 'marquezhonda93', 2),
('usr92588', 'fahmi kurniawa', 'fahmi123', 'pahmilucu123@gmail.com', '087874527342', 'semapkfiraun', 2),
('usr96524', 'suyadi wijiatmoko', 'suyadi', 'suyadi@gmail.com', '087876564435', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pemesanan`
--

CREATE TABLE `status_pemesanan` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`id_status`, `nama_status`) VALUES
(1, 'menunggu'),
(2, 'diproses'),
(3, 'selesai'),
(4, 'batal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko_info`
--

CREATE TABLE `toko_info` (
  `id_info` int(11) NOT NULL,
  `buka_booking` int(11) NOT NULL,
  `tgl_closebooking` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `toko_info`
--

INSERT INTO `toko_info` (`id_info`, `buka_booking`, `tgl_closebooking`) VALUES
(1, 1, NULL);

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
-- Stand-in struktur untuk tampilan `view_kasir`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_kasir` (
`id_kasir` varchar(12)
,`id_barber` varchar(12)
,`nama_barber` varchar(50)
,`nama_layanan` varchar(50)
,`jumlah` int(11)
,`harga` int(11)
,`sub_total` int(11)
,`totalharga` int(11)
,`bayar` int(11)
,`kembalian` int(11)
,`tanggal` timestamp
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
-- Struktur untuk view `view_kasir`
--
DROP TABLE IF EXISTS `view_kasir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kasir`  AS SELECT `layanan_pesan_kasir`.`id_kasir` AS `id_kasir`, `kasir`.`id_barber` AS `id_barber`, `barber`.`nama_barber` AS `nama_barber`, `layanan_pesan_kasir`.`nama_layanan` AS `nama_layanan`, `layanan_pesan_kasir`.`jumlah` AS `jumlah`, `layanan_pesan_kasir`.`harga` AS `harga`, `layanan_pesan_kasir`.`total` AS `sub_total`, `kasir`.`totalharga` AS `totalharga`, `kasir`.`bayar` AS `bayar`, `kasir`.`kembalian` AS `kembalian`, `kasir`.`tanggal` AS `tanggal` FROM ((`layanan_pesan_kasir` join `kasir` on(`layanan_pesan_kasir`.`id_kasir` = `kasir`.`id_kasir`)) join `barber` on(`kasir`.`id_barber` = `barber`.`id_barber`)) ;

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
-- Indeks untuk tabel `barber_status`
--
ALTER TABLE `barber_status`
  ADD KEY `id_barber` (`id_barber`);

--
-- Indeks untuk tabel `jadwal_barber`
--
ALTER TABLE `jadwal_barber`
  ADD KEY `id_barber` (`id_barber`);

--
-- Indeks untuk tabel `karyawan_akses`
--
ALTER TABLE `karyawan_akses`
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`),
  ADD KEY `id_barber` (`id_barber`);

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
-- Indeks untuk tabel `layanan_pesan_kasir`
--
ALTER TABLE `layanan_pesan_kasir`
  ADD KEY `id_kasir` (`id_kasir`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indeks untuk tabel `level_detail`
--
ALTER TABLE `level_detail`
  ADD PRIMARY KEY (`id_level`);

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
  ADD KEY `id_barber` (`id_barber`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `level` (`level`);

--
-- Indeks untuk tabel `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `toko_info`
--
ALTER TABLE `toko_info`
  ADD PRIMARY KEY (`id_info`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level_detail`
--
ALTER TABLE `level_detail`
  MODIFY `id_level` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `toko_info`
--
ALTER TABLE `toko_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin_barber`
--
ALTER TABLE `admin_barber`
  ADD CONSTRAINT `admin_barber_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barber_status`
--
ALTER TABLE `barber_status`
  ADD CONSTRAINT `barber_status_ibfk_1` FOREIGN KEY (`id_barber`) REFERENCES `barber` (`id_barber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_barber`
--
ALTER TABLE `jadwal_barber`
  ADD CONSTRAINT `jadwal_barber_ibfk_1` FOREIGN KEY (`id_barber`) REFERENCES `barber` (`id_barber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `karyawan_akses`
--
ALTER TABLE `karyawan_akses`
  ADD CONSTRAINT `karyawan_akses_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD CONSTRAINT `kasir_ibfk_1` FOREIGN KEY (`id_barber`) REFERENCES `barber` (`id_barber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `layanan_dipesan`
--
ALTER TABLE `layanan_dipesan`
  ADD CONSTRAINT `layanan_dipesan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `layanan_dipesan_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `layanan_pesan_kasir`
--
ALTER TABLE `layanan_pesan_kasir`
  ADD CONSTRAINT `layanan_pesan_kasir_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `layanan_pesan_kasir_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status_pemesanan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`id_barber`) REFERENCES `barber` (`id_barber`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level_detail` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
