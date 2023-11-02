-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2023 pada 17.49
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
  `level` varchar(30) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_barber`
--

INSERT INTO `admin_barber` (`id_admin`, `level`, `username_admin`, `nama_admin`, `email_admin`, `password_admin`) VALUES
('1', 'admin', 'admin', 'pahmi', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barber`
--

CREATE TABLE `barber` (
  `id_barber` varchar(12) NOT NULL,
  `nama_barber` varchar(50) NOT NULL,
  `nohp_barber` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_layanan`
--

CREATE TABLE `kategori_layanan` (
  `id_kategori` varchar(12) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
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
  `deskripsi_layanan` varchar(225) NOT NULL,
  `harga_layanan` int(11) NOT NULL,
  `id_kategori` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` varchar(12) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `tanggal_payment` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_rekening` int(11) DEFAULT NULL,
  `bukti_pembayaran` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(12) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `nohp_pelanggan` varchar(225) DEFAULT NULL,
  `email_pelanggan` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `level`, `nama_pelanggan`, `nohp_pelanggan`, `email_pelanggan`, `username`, `password`) VALUES
('PLG202310291', 'pelanggan', 'fahmi kurniawan', '087874527342', 'fahkur@gmail.com', 'pahmi_aja', '1234'),
('PLG202310298', 'pelanggan', 'pahmi sangar', '087874527342', 'fahkur@gmail.com', 'abidin', '1234');

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
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `id_user` int(11) NOT NULL,
  `level_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`id_user`, `level_user`) VALUES
(1, 'admin'),
(2, 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_barber`
--
ALTER TABLE `admin_barber`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`id_barber`);

--
-- Indeks untuk tabel `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kategori_pengeluaran`
--
ALTER TABLE `kategori_pengeluaran`
  ADD PRIMARY KEY (`id_kategori_pengeluaran`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `layanan_dipesan`
--
ALTER TABLE `layanan_dipesan`
  ADD KEY `id_reservasi` (`id_pemesanan`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

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
-- Indeks untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_layanan` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `layanan_dipesan`
--
ALTER TABLE `layanan_dipesan`
  ADD CONSTRAINT `layanan_dipesan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `layanan_dipesan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
