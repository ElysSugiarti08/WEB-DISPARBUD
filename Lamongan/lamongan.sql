-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2020 pada 05.13
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenisKelamin` int(11) NOT NULL,
  `noTelp` varchar(13) NOT NULL,
  `usertype` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `jenisKelamin`, `noTelp`, `usertype`) VALUES
(18, 'admin1', 'admin1@gmail.com', '$2y$10$bayiERR0i6QHrICnzIb5i.DUnX8JiRqUCN.O9N4etbRLsPVPoxcgO', 1, '08934383292', 1);

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
-- Indeks untuk tabel `jeniskelamin`
--
ALTER TABLE `jeniskelamin`
  ADD PRIMARY KEY (`id_jk`);

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
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
