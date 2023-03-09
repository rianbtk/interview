-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Nov 2021 pada 17.44
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_penilaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('admin','guru') NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `pendidikan_terakhir` varchar(25) DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `no_hp` varchar(25) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `role`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `nip`, `pendidikan_terakhir`, `agama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'fe60cd55fdfc68c9ee1814ce57c2e61c', 'admin', 'Widdy', 'Laki-laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'guru', 'fe60cd55fdfc68c9ee1814ce57c2e61c', 'guru', 'Nesciunt consequatu', 'Laki-laki', '2012-04-07', '123456789012345669', 'Voluptate quia irure', 'Et recusandae Nesci', '082299921720', 'Beatae inventore off', '2021-11-16 03:24:07', '2021-11-16 03:24:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_bidang`
--

CREATE TABLE `tb_data_bidang` (
  `id_job` bigint(20) NOT NULL,
  `kode_tugas` varchar(10) NOT NULL,
  `bidang_diminati` varchar(26) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_bidang`
--

INSERT INTO `tb_data_bidang` (`id_job`, `kode_tugas`, `bidang_diminati`, `created_at`, `updated_at`) VALUES
(1, 'BTQ', 'Non excepturi et sed', '2021-11-16 03:25:29', '2021-11-16 03:25:29'),
(2, 'IQRA', 'Atque eum voluptas e', '2021-11-16 03:25:39', '2021-11-16 03:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_pelajar`
--

CREATE TABLE `tb_data_pelajar` (
  `id_pelajar` bigint(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sekolah/kampus` varchar(25) NOT NULL,
  `tahun_masuk` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_pelajar`
--

INSERT INTO `tb_data_pelajar` (`id_pelajar`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `sekolah/kampus`, `tahun_masuk`, `created_at`, `updated_at`) VALUES
(1, 'Sunt maxime dolor vo', 'Laki-laki', '2021-11-16', 'Sunt maxime', '2020', '2021-11-16 03:24:56', '2021-11-16 03:24:56'),
(2, 'Amet ut ut nemo dol', 'Perempuan', '2021-11-16', 'Amet ut ut', '2020', '2021-11-16 03:25:18', '2021-11-16 03:25:18'),
(3, 'Pariatur Ipsum dolo', 'Perempuan', '2001-06-20', 'Quidem rep', '2020', '2021-11-16 04:51:17', '2021-11-16 04:51:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_tahun_ajaran`
--

CREATE TABLE `tb_data_tahun_ajaran` (
  `id_ta` bigint(20) NOT NULL,
  `tahun_ajaran` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_tahun_ajaran`
--

INSERT INTO `tb_data_tahun_ajaran` (`id_ta`, `tahun_ajaran`, ``, `created_at`, `updated_at`) VALUES
(1, '2020/2021', '2', '2021-11-16 03:25:46', '2021-11-16 03:25:46'),
(2, '2021/2022', '1', '2021-11-16 04:08:15', '2021-11-16 04:08:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `magang_id` bigint(20) NOT NULL,
  `pelajar_id` bigint(20) NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`magang_id`, `pelajar_id`, `job_id`, `nilai`) VALUES
(1, 1, 1, 70),
(1, 1, 2, 80),
(1, 2, 1, 0),
(1, 2, 2, 0),
(1, 3, 1, 39),
(1, 3, 2, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_magang`
--

CREATE TABLE `tb_magang` (
  `id_magang` bigint(20) NOT NULL,
  `guru_id` bigint(20) NOT NULL,
  `ta_id` bigint(20) NOT NULL,
  `kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_magang`
--

INSERT INTO `tb_magang` (`id_magang`, `guru_id`, `ta_id`, `kelas`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_magang_job`
--

CREATE TABLE `tb_magang_job` (
  `magang_id` bigint(20) NOT NULL,
  `job_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_magang_job`
--

INSERT INTO `tb_magang_job` (`magang_id`, `job_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_magang_pelajar`
--

CREATE TABLE `tb_magang_pelajar` (
  `magang_id` bigint(20) NOT NULL,
  `pelajar_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_magang_pelajar`
--

INSERT INTO `tb_magang_pelajar` (`magang_id`, `pelajar_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_data_bidang`
--
ALTER TABLE `tb_data_bidang`
  ADD PRIMARY KEY (`id_job`);

--
-- Indeks untuk tabel `tb_data_pelajar`
--
ALTER TABLE `tb_data_pelajar`
  ADD PRIMARY KEY (`id_pelajar`);

--
-- Indeks untuk tabel `tb_data_tahun_ajaran`
--
ALTER TABLE `tb_data_tahun_ajaran`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`magang_id`,`pelajar_id`,`job_id`),
  ADD KEY `tb_nilai_ibfk_3` (`pelajar_id`),
  ADD KEY `tb_nilai_ibfk_4` (`job_id`);

--
-- Indeks untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  ADD PRIMARY KEY (`id_magang`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `ta_id` (`ta_id`);

--
-- Indeks untuk tabel `tb_magang_job`
--
ALTER TABLE `tb_magang_job`
  ADD PRIMARY KEY (`magang_id`,`job_id`),
  ADD KEY `tb_magang_job_ibfk_1` (`job_id`);

--
-- Indeks untuk tabel `tb_magang_pelajar`
--
ALTER TABLE `tb_magang_pelajar`
  ADD PRIMARY KEY (`magang_id`,`pelajar_id`),
  ADD KEY `tb_magang_pelajar_ibfk_2` (`pelajar_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_data_bidang`
--
ALTER TABLE `tb_data_bidang`
  MODIFY `id_job` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_data_pelajar`
--
ALTER TABLE `tb_data_pelajar`
  MODIFY `id_pelajar` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_data_tahun_ajaran`
--
ALTER TABLE `tb_data_tahun_ajaran`
  MODIFY `id_ta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  MODIFY `id_magang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`magang_id`) REFERENCES `tb_magang` (`id_magang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_3` FOREIGN KEY (`pelajar_id`) REFERENCES `tb_magang_pelajar` (`pelajar_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_4` FOREIGN KEY (`job_id`) REFERENCES `tb_magang_job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  ADD CONSTRAINT `tb_magang_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `tb_user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_magang_ibfk_2` FOREIGN KEY (`ta_id`) REFERENCES `tb_data_tahun_ajaran` (`id_ta`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_magang_job`
--
ALTER TABLE `tb_magang_job`
  ADD CONSTRAINT `tb_magang_job_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `tb_data_bidang` (`id_job`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_magang_job_ibfk_2` FOREIGN KEY (`magang_id`) REFERENCES `tb_magang` (`id_magang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_magang_pelajar`
--
ALTER TABLE `tb_magang_pelajar`
  ADD CONSTRAINT `tb_magang_pelajar_ibfk_1` FOREIGN KEY (`magang_id`) REFERENCES `tb_magang` (`id_magang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_magang_pelajar_ibfk_2` FOREIGN KEY (`pelajar_id`) REFERENCES `tb_data_pelajar` (`id_pelajar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
