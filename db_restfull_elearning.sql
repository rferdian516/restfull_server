-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2020 pada 14.59
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restfull_elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jeniskel` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_nip`, `nama`, `jeniskel`, `alamat`) VALUES
('1111981', 'Indah Pratiwi', 'Perempuan', 'Jl. Bandung 2B'),
('2111753', 'Budi Sudarsono', 'Laki-Laki', 'Jl. Puntodewo Raya'),
('2111987', 'Anis Baswedan', 'Laki-Laki', 'Jl. Vlateran 91A'),
('3111456', 'Andarwati', 'Perempuan', 'Jl. Sukun Gempol 4'),
('4111786', 'Yoseph Pratama', 'Laki-Laki', 'Jl. Kresno 16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `kode_mapel` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`kode_mapel`, `nama`, `kelas`) VALUES
('BIND10', 'Bahasa Indonesia', '10'),
('BING12', 'Bahasa Inggris', '12'),
('BIO10', 'Biologi Peminatan', '10'),
('FIS11', 'Fisika Peminatan', '11'),
('MTK11', 'Matematika', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jeniskel` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `kota` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_nis`, `nama`, `jeniskel`, `tgl`, `kota`, `alamat`) VALUES
('1718001', 'Andi Firmansyah', 'Laki-Laki', '1995-07-04', 'Surabaya', 'Jl. Pakisjajar'),
('1718009', 'Icha Nurhayati', 'Perempuan', '2000-10-18', 'Pasuruan', 'Jl. Buring Raya'),
('1718141', 'Reynaldo', 'Laki-Laki', '1998-09-07', 'Malang', 'Jl Kresno 16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_nip`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
