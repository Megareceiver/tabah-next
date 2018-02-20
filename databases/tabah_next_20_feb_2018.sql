-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Feb 2018 pada 16.53
-- Versi server: 5.5.42
-- Versi PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabah_next`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `kode_data` int(11) NOT NULL,
  `nomor_lembaga` char(11) NOT NULL,
  `teks` text NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_awal_catatan`
--

CREATE TABLE `permohonan_awal_catatan` (
  `kode_data` int(11) NOT NULL,
  `nomor_dokumen` char(17) NOT NULL,
  `catatan` text NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_awal_persyaratan`
--

CREATE TABLE `permohonan_awal_persyaratan` (
  `kode_data` int(11) NOT NULL,
  `nomor_dokumen` char(17) NOT NULL,
  `kode_persyaratan` int(11) NOT NULL,
  `berkas` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `changed_by` varchar(20) DEFAULT NULL,
  `changed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permohonan_awal_persyaratan`
--

INSERT INTO `permohonan_awal_persyaratan` (`kode_data`, `nomor_dokumen`, `kode_persyaratan`, `berkas`, `status`, `created_by`, `created_date`, `changed_by`, `changed_date`) VALUES
(8, 'PA_5a8c0165514a2', 2, 'PA_5a8c0165514a2_2.pdf', 'Sudah', 'Megan', '2018-02-20 22:50:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_awal_proposal`
--

CREATE TABLE `permohonan_awal_proposal` (
  `nomor_dokumen` char(17) NOT NULL,
  `nomor_lembaga` char(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `latar_belakang` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `catatan` text,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `changed_by` varchar(20) DEFAULT NULL,
  `changed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permohonan_awal_proposal`
--

INSERT INTO `permohonan_awal_proposal` (`nomor_dokumen`, `nomor_lembaga`, `judul`, `nominal`, `latar_belakang`, `status`, `catatan`, `created_by`, `created_date`, `changed_by`, `changed_date`) VALUES
('PA_5a8bd8f7982e4', '11111111111', 'test', 0, 'askjdkjabsd', '', NULL, 'Megan', '2018-02-20 15:14:47', NULL, NULL),
('PA_5a8c00f694aac', '00000000000', 'Proposal hibah 1', 30000000, 'Kadang kadang pengen minta uang \r\n', 'Draft', NULL, 'Megan', '2018-02-20 18:05:26', NULL, NULL),
('PA_5a8c0165514a2', '00000000000', 'Proposal pernikahan', 40000000, 'saya terima nikahnya', 'Menunggu', NULL, 'Megan', '2018-02-20 18:07:17', 'Megan', '2018-02-20 22:52:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_awal_rab`
--

CREATE TABLE `permohonan_awal_rab` (
  `kode_data` int(11) NOT NULL,
  `nomor_dokumen` char(17) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `changed_by` varchar(20) DEFAULT NULL,
  `changed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permohonan_awal_rab`
--

INSERT INTO `permohonan_awal_rab` (`kode_data`, `nomor_dokumen`, `uraian`, `volume`, `satuan`, `harga`, `created_by`, `created_date`, `changed_by`, `changed_date`) VALUES
(7, 'PA_5a8c0165514a2', 'mehajbsd', 4, 'sdfsdf', 700000, 'Megan', '2018-02-20 21:01:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan`
--

CREATE TABLE `persyaratan` (
  `kode_data` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` varchar(15) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `changed_by` varchar(20) DEFAULT NULL,
  `changed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persyaratan`
--

INSERT INTO `persyaratan` (`kode_data`, `nama`, `tipe`, `created_by`, `created_date`, `changed_by`, `changed_date`) VALUES
(1, 'Proposal (.pdf)', 'permohonan', 'Megan', '2018-02-20 00:00:00', NULL, NULL),
(2, 'Surat Permohonan (.pdf)', 'permohonan', 'Megan', '2018-02-20 00:00:00', NULL, NULL),
(3, 'Lampiran (.pdf)', 'permohonan', 'Megan', '2018-02-20 00:00:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`kode_data`);

--
-- Indeks untuk tabel `permohonan_awal_catatan`
--
ALTER TABLE `permohonan_awal_catatan`
  ADD PRIMARY KEY (`kode_data`);

--
-- Indeks untuk tabel `permohonan_awal_persyaratan`
--
ALTER TABLE `permohonan_awal_persyaratan`
  ADD PRIMARY KEY (`kode_data`);

--
-- Indeks untuk tabel `permohonan_awal_proposal`
--
ALTER TABLE `permohonan_awal_proposal`
  ADD PRIMARY KEY (`nomor_dokumen`);

--
-- Indeks untuk tabel `permohonan_awal_rab`
--
ALTER TABLE `permohonan_awal_rab`
  ADD PRIMARY KEY (`kode_data`);

--
-- Indeks untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`kode_data`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `kode_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permohonan_awal_catatan`
--
ALTER TABLE `permohonan_awal_catatan`
  MODIFY `kode_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permohonan_awal_persyaratan`
--
ALTER TABLE `permohonan_awal_persyaratan`
  MODIFY `kode_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `permohonan_awal_rab`
--
ALTER TABLE `permohonan_awal_rab`
  MODIFY `kode_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `kode_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
