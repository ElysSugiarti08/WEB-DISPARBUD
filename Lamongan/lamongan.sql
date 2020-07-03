-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2020 pada 04.17
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamongan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id`, `nama`, `ukuran`, `tipe`) VALUES
(1, '1.jpg', 371577, 'image/jpeg'),
(2, 'galer 2.jpg', 144869, 'image/jpeg'),
(3, 'galer 3.jpg', 236284, 'image/jpeg'),
(4, 'galer 11.jpg', 236957, 'image/jpeg'),
(5, 'galer 11.jpg', 236957, 'image/jpeg'),
(6, 'galer 5.jpg', 36768, 'image/jpeg'),
(7, 'galer 5.jpg', 36768, 'image/jpeg'),
(8, 'galer 56.jpg', 87119, 'image/jpeg'),
(9, 'galer 57.jpg', 155657, 'image/jpeg'),
(10, 'galer 56.jpg', 87119, 'image/jpeg'),
(11, 'galer 66.jpg', 78511, 'image/jpeg'),
(12, 'galer 67.jpg', 92755, 'image/jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jeniskelamin`
--

CREATE TABLE `jeniskelamin` (
  `id_jk` int(1) NOT NULL,
  `ket_jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jeniskelamin`
--

INSERT INTO `jeniskelamin` (`id_jk`, `ket_jk`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int(50) NOT NULL,
  `isi_komen` varchar(200) NOT NULL,
  `email_komen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komen`, `isi_komen`, `email_komen`) VALUES
(6, 'halo, webnya bagus, semoga semakin uwu yaaa ^ ^', 'ernasetia168@gmail.com'),
(7, 'haloooooo', 'ernaset@gmail.com'),
(8, 'semoga nilai kita bagus ya guys, Aamiin', 'ernaset@gmail.com'),
(9, 'Bissmillah semoga dapat nilai bagus, Aamiin.\r\nSemangat rek!!', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenisKelamin` int(11) NOT NULL,
  `noTelp` varchar(13) NOT NULL,
  `usertype` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `jenisKelamin`, `noTelp`, `usertype`) VALUES
(25, 'ernana', 'ernaset@gmail.com', '$2y$10$esr.LDjyXrYUvjgYyN5LOO.8NH5DJFU5/0O3yNK4Xi6qSJpuo2hE6', 2, '085807116666', 2),
(26, 'admin', 'admin@gmail.com', '$2y$10$CO7yBnI1A2MkGrlWL1ZTA.XSakMPE6413cm3DLZSW7buzXXC8LDHi', 2, '08123487656', 1),
(27, 'elys sugiarti', 'zahraelys08@gmail.com', '$2y$10$SjfjnhfHxjZWcCCd.Ca.QOS96roVuCjD4y7s8BEvOJtAhItCNMzPi', 2, '085648363948', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usertype`
--

CREATE TABLE `usertype` (
  `id_usertype` int(1) NOT NULL,
  `ket_usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usertype`
--

INSERT INTO `usertype` (`id_usertype`, `ket_usertype`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jeniskelamin`
--
ALTER TABLE `jeniskelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_jenisKelamin` (`jenisKelamin`),
  ADD KEY `fk_usertpe` (`usertype`);

--
-- Indeks untuk tabel `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id_usertype`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_jenisKelamin` FOREIGN KEY (`jenisKelamin`) REFERENCES `jeniskelamin` (`id_jk`),
  ADD CONSTRAINT `fk_usertpe` FOREIGN KEY (`usertype`) REFERENCES `usertype` (`id_usertype`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
