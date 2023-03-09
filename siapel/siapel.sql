-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2023 pada 11.56
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siapel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2021-08-24 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `email`, `photo`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `user_role_id`) VALUES
(1, 'admin', '$2y$10$jPD2lAMN7PTpntYpUiV7beEz8tsOpmGxnSKI4MXM9m9eolqumezOa', 'Administrator', 'tipolinema4@gmail.com', '', NULL, NULL, '2021-08-26 11:02:24', NULL, 1),
(2, 'asn', '$2y$10$UOoDWX2/pSI5/exQJYA7KOg6QsjDwRfj9kwkn6ll/N4vDkYDB6beG', 'User', 'mrprobojonegoro@gmail.com', '', NULL, NULL, '2021-08-24 00:00:00', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_permissions`
--

CREATE TABLE `role_permissions` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `action_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_permissions`
--

INSERT INTO `role_permissions` (`permission_id`, `role_id`, `page_name`, `action_name`) VALUES
(1, 1, 'pengguna', 'list'),
(2, 1, 'pengguna', 'view'),
(3, 1, 'pengguna', 'add'),
(4, 1, 'pengguna', 'edit'),
(5, 1, 'pengguna', 'editfield'),
(6, 1, 'pengguna', 'delete'),
(7, 1, 'pengguna', 'import_data'),
(8, 1, 'surat_keluar', 'list'),
(9, 1, 'surat_keluar', 'view'),
(10, 1, 'surat_keluar', 'add'),
(11, 1, 'surat_keluar', 'edit'),
(12, 1, 'surat_keluar', 'editfield'),
(13, 1, 'surat_keluar', 'delete'),
(14, 1, 'surat_keluar', 'import_data'),
(15, 1, 'surat_masuk', 'list'),
(16, 1, 'surat_masuk', 'view'),
(17, 1, 'surat_masuk', 'add'),
(18, 1, 'surat_masuk', 'edit'),
(19, 1, 'surat_masuk', 'editfield'),
(20, 1, 'surat_masuk', 'delete'),
(21, 1, 'surat_masuk', 'import_data'),
(22, 1, 'pengguna', 'accountedit'),
(23, 1, 'pengguna', 'accountview'),
(24, 1, 'role_permissions', 'list'),
(25, 1, 'role_permissions', 'view'),
(26, 1, 'role_permissions', 'add'),
(27, 1, 'role_permissions', 'edit'),
(28, 1, 'role_permissions', 'editfield'),
(29, 1, 'role_permissions', 'delete'),
(30, 1, 'roles', 'list'),
(31, 1, 'roles', 'view'),
(32, 1, 'roles', 'add'),
(33, 1, 'roles', 'edit'),
(34, 1, 'roles', 'editfield'),
(35, 1, 'roles', 'delete'),
(36, 2, 'surat_keluar', 'list'),
(37, 2, 'surat_keluar', 'view'),
(38, 2, 'surat_keluar', 'add'),
(39, 2, 'surat_keluar', 'edit'),
(40, 2, 'surat_keluar', 'editfield'),
(41, 2, 'surat_masuk', 'list'),
(42, 2, 'surat_masuk', 'view'),
(43, 2, 'surat_masuk', 'add'),
(44, 2, 'surat_masuk', 'edit'),
(45, 2, 'surat_masuk', 'editfield'),
(46, 2, 'pengguna', 'accountedit'),
(47, 2, 'pengguna', 'accountview'),
(48, 0, 'Arsip KK', 'datakartukeluarga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `No_Agenda` int(15) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `Tujuan_surat` varchar(255) NOT NULL,
  `Nomor_surat` varchar(255) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `file_surat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `No_Agenda` int(15) NOT NULL,
  `Nomor_Surat` varchar(255) NOT NULL,
  `Tanggal_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `Asal_surat` varchar(255) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `file_surat` varchar(500) NOT NULL,
  `penerima` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`No_Agenda`, `Nomor_Surat`, `Tanggal_surat`, `tanggal_terima`, `Asal_surat`, `perihal`, `file_surat`, `penerima`) VALUES
(1, '010550771', '2021-12-01', '2021-12-10', 'PT Phapros', 'KUNJUNGAN KERJA', 'http://localhost/SIAPEL/arsip/uploads/files/026v_8amxkqr735.pdf', 'asn'),
(2, '010550772', '2021-12-02', '2021-12-11', 'SMK 1 BOJONEGORO', 'IZIN MAGANG', 'http://localhost/SIAPEL/arsip/uploads/files/uwijpt5alfm748y.pdf', 'asn');

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
(3, '01', 'Setting Mikrotik', '2021-12-15 01:52:01', '2021-12-16 20:30:47'),
(4, '02', 'Instalsi software', '2021-12-15 01:55:37', '2021-12-15 01:55:37'),
(5, '03', 'Upgrade PC Kantor', '2021-12-15 01:56:12', '2021-12-15 01:56:12'),
(6, '04', 'print data', '2021-12-16 18:27:08', '2021-12-16 18:27:08'),
(7, '05', 'stampel dan rekap data', '2021-12-16 18:27:27', '2021-12-16 18:27:27'),
(8, '06', 'entry data', '2021-12-16 18:27:47', '2021-12-16 18:27:47');

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
(1, 'Agus Salim Hadjrianto', 'Laki-laki', '1997-09-07', 'POLINEMA MALANG', '2018', '2021-11-16 03:24:56', '2021-11-16 03:24:56'),
(4, 'Anggit Agung Wisnu', 'Laki-laki', '1999-03-02', 'POLTEK', '2021', '2021-12-15 02:02:56', '2021-12-15 02:02:56'),
(5, 'Pandu Dwi Laksono', 'Laki-laki', '2021-12-07', 'POLTEK', '2021', '2021-12-14 18:22:25', '2021-12-14 18:22:25'),
(6, 'Ferry Julyo', 'Laki-laki', '2021-12-02', 'POLTEK', '2021', '2021-12-16 18:36:21', '2021-12-16 18:36:21'),
(7, 'Pandu Jati Laksono', 'Laki-laki', '2021-12-16', 'STIK Jakarta', '2020', '2021-12-16 20:35:26', '2021-12-16 20:35:26');

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

INSERT INTO `tb_data_tahun_ajaran` (`id_ta`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, '2021', '2021-11-16 03:25:46', '2021-11-16 03:25:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_des` int(30) NOT NULL,
  `nama_desa` varchar(30) NOT NULL,
  `jumlah_penduduk` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama`) VALUES
(1, 'kabupaten'),
(2, 'kota'),
(3, 'kelurahan'),
(4, 'desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `id_kab` char(4) NOT NULL,
  `id_prov` char(2) NOT NULL,
  `nama` tinytext NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`id_kab`, `id_prov`, `nama`, `id_jenis`) VALUES
('3522', '35', 'KAB. BOJONEGORO', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kec` char(6) NOT NULL,
  `id_kab` char(4) NOT NULL,
  `nama_kecamatan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kec`, `id_kab`, `nama_kecamatan`) VALUES
('352201', '3522', 'Ngraho'),
('352202', '3522', 'Tambakrejo'),
('352203', '3522', 'Ngambon'),
('352204', '3522', 'Ngasem'),
('352205', '3522', 'Bubulan'),
('352206', '3522', 'Dander'),
('352207', '3522', 'Sugihwaras'),
('352208', '3522', 'Kedungadem'),
('352209', '3522', 'Kepoh Baru'),
('352210', '3522', 'Baureno'),
('352211', '3522', 'Kanor'),
('352212', '3522', 'Sumberejo'),
('352213', '3522', 'Balen'),
('352214', '3522', 'Kapas'),
('352215', '3522', 'Bojonegoro'),
('352216', '3522', 'Kalitidu'),
('352217', '3522', 'Malo'),
('352218', '3522', 'Purwosari'),
('352219', '3522', 'Padangan'),
('352220', '3522', 'Kasiman'),
('352221', '3522', 'Temayang'),
('352222', '3522', 'Margomulyo'),
('352223', '3522', 'Trucuk'),
('352224', '3522', 'Sukosewu'),
('352225', '3522', 'Kedewan'),
('352226', '3522', 'Gondang'),
('352227', '3522', 'Sekar'),
('352228', '3522', 'Gayam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id_kel` char(10) NOT NULL,
  `id_kec` char(6) DEFAULT NULL,
  `nama_desa` tinytext DEFAULT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`id_kel`, `id_kec`, `nama_desa`, `id_jenis`) VALUES
('3522012001', '352201', 'Luwihaji', 4),
('3522012002', '352201', 'Sugihwaras', 4),
('3522012003', '352201', 'Nganti', 4),
('3522012004', '352201', 'Jumok', 4),
('3522012005', '352201', 'Sumber Agung', 4),
('3522012006', '352201', 'Mojorejo', 4),
('3522012007', '352201', 'Ngraho', 4),
('3522012008', '352201', 'Blimbinggede', 4),
('3522012009', '352201', 'Kalirejo', 4),
('3522012010', '352201', 'Tapelan', 4),
('3522012011', '352201', 'Tanggungan', 4),
('3522012012', '352201', 'Pandan', 4),
('3522012013', '352201', 'Sumberarum', 4),
('3522012014', '352201', 'Payaman', 4),
('3522012015', '352201', 'Bancer', 4),
('3522012016', '352201', 'Klempun', 4),
('3522022001', '352202', 'Napis', 4),
('3522022002', '352202', 'Jatimulyo', 4),
('3522022003', '352202', 'Ngrancang', 4),
('3522022004', '352202', 'Turi', 4),
('3522022005', '352202', 'Malingmati', 4),
('3522022006', '352202', 'Tambakrejo', 4),
('3522022007', '352202', 'Bakalan', 4),
('3522022008', '352202', 'Jawik', 4),
('3522022009', '352202', 'Sukerejo', 4),
('3522022010', '352202', 'Gading', 4),
('3522022011', '352202', 'Pengkol', 4),
('3522022012', '352202', 'Tanjung', 4),
('3522022013', '352202', 'Gamongan', 4),
('3522022014', '352202', 'Kalisumber', 4),
('3522022015', '352202', 'Mulyorejo', 4),
('3522022016', '352202', 'Dolokgede', 4),
('3522022017', '352202', 'Sendangrejo', 4),
('3522022018', '352202', 'Kacangan', 4),
('3522032001', '352203', 'Nglamping', 4),
('3522032002', '352203', 'Karangmangu', 4),
('3522032003', '352203', 'Ngambon', 4),
('3522032004', '352203', 'Sengon', 4),
('3522032005', '352203', 'Bondol', 4),
('3522042001', '352204', 'Butoh', 4),
('3522042002', '352204', 'Trenggulungan', 4),
('3522042003', '352204', 'Setren', 4),
('3522042004', '352204', 'Mediyunan', 4),
('3522042005', '352204', 'Kolong', 4),
('3522042006', '352204', 'Sendangharjo', 4),
('3522042007', '352204', 'Ngadiluwih', 4),
('3522042008', '352204', 'Ngasem', 4),
('3522042009', '352204', 'Bandungrejo', 4),
('3522042010', '352204', 'Tengger', 4),
('3522042011', '352204', 'Ngantru', 4),
('3522042012', '352204', 'Sambong', 4),
('3522042013', '352204', 'Dukuhkidul', 4),
('3522042014', '352204', 'Wadang', 4),
('3522042015', '352204', 'Jampet', 4),
('3522042016', '352204', 'Bareng', 4),
('3522042017', '352204', 'Jelu', 4),
('3522052001', '352205', 'Bubulan', 4),
('3522052002', '352205', 'Cancung', 4),
('3522052003', '352205', 'Clebung', 4),
('3522052004', '352205', 'Sumberbendo', 4),
('3522052005', '352205', 'Ngorogunung', 4),
('3522062001', '352206', 'Ngunut', 4),
('3522062002', '352206', 'Dander', 4),
('3522062003', '352206', 'Growak', 4),
('3522062004', '352206', 'Sumberarum', 4),
('3522062005', '352206', 'Kunci', 4),
('3522062006', '352206', 'Jatiblimbing', 4),
('3522062007', '352206', 'Ngraseh', 4),
('3522062008', '352206', 'Mojoranu', 4),
('3522062009', '352206', 'Sendangrejo', 4),
('3522062010', '352206', 'Karangsono', 4),
('3522062011', '352206', 'Sumberagung', 4),
('3522062012', '352206', 'Somodikaran', 4),
('3522062013', '352206', 'Ngumpakdalem', 4),
('3522062014', '352206', 'Sumbertlaseh', 4),
('3522062015', '352206', 'Ngulanan', 4),
('3522062016', '352206', 'Ngablak', 4),
('3522072001', '352207', 'Bareng', 4),
('3522072002', '352207', 'Drenges', 4),
('3522072003', '352207', 'Wedoro', 4),
('3522072004', '352207', 'Panunggalan', 4),
('3522072005', '352207', 'Alasgung', 4),
('3522072006', '352207', 'Siwalan', 4),
('3522072007', '352207', 'Glagahan', 4),
('3522072008', '352207', 'Panemon', 4),
('3522072009', '352207', 'Jatitengah', 4),
('3522072010', '352207', 'Sugihwaras', 4),
('3522072011', '352207', 'Trate', 4),
('3522072012', '352207', 'Bulu', 4),
('3522072013', '352207', 'Nglajang', 4),
('3522072014', '352207', 'Kedungdowo', 4),
('3522072015', '352207', 'Glagahwangi', 4),
('3522072016', '352207', 'Balongrejo', 4),
('3522072017', '352207', 'Genjor', 4),
('3522082001', '352208', 'Babad', 4),
('3522082002', '352208', 'Pejok', 4),
('3522082003', '352208', 'Dayukkidul', 4),
('3522082004', '352208', 'Panjang', 4),
('3522082005', '352208', 'Tondomulo', 4),
('3522082006', '352208', 'Kesongo', 4),
('3522082007', '352208', 'Kendung', 4),
('3522082008', '352208', 'Mlideg', 4),
('3522082009', '352208', 'Trumbrasanom', 4),
('3522082010', '352208', 'Kedungdalem', 4),
('3522082011', '352208', 'Duwel', 4),
('3522082012', '352208', 'Kepohkidul', 4),
('3522082013', '352208', 'Geger', 4),
('3522082014', '352208', 'Kedungejo', 4),
('3522082015', '352208', 'Megale', 4),
('3522082016', '352208', 'Sidorejo', 4),
('3522082017', '352208', 'Drokilo', 4),
('3522082018', '352208', 'Mojorejo', 4),
('3522082019', '352208', 'Jamberejo', 4),
('3522082020', '352208', 'Sidomulyo', 4),
('3522082021', '352208', 'Tlogoagung', 4),
('3522082022', '352208', 'Ngrandu', 4),
('3522082023', '352208', 'Balongcabe', 4),
('3522092001', '352209', 'Pejok', 4),
('3522092002', '352209', 'Cengkir', 4),
('3522092003', '352209', 'Kepoh', 4),
('3522092004', '352209', 'Sidomukti', 4),
('3522092005', '352209', 'Simorejo', 4),
('3522092006', '352209', 'Krangkong', 4),
('3522092007', '352209', 'Nglumber', 4),
('3522092008', '352209', 'Brangkal', 4),
('3522092009', '352209', 'Mojosari', 4),
('3522092010', '352209', 'Balongdowo', 4),
('3522092011', '352209', 'Suberroto', 4),
('3522092012', '352209', 'Pohwates', 4),
('3522092013', '352209', 'Turigede', 4),
('3522092014', '352209', 'Bayemgede', 4),
('3522092015', '352209', 'Tlogorejo', 4),
('3522092016', '352209', 'Sumberagung', 4),
('3522092017', '352209', 'Woro', 4),
('3522092018', '352209', 'Bumirejo', 4),
('3522092019', '352209', 'Betet', 4),
('3522092020', '352209', 'Jipo', 4),
('3522092021', '352209', 'Ngranggonanya', 4),
('3522092022', '352209', 'Mudung', 4),
('3522092023', '352209', 'Karanggang', 4),
('3522092024', '352209', 'Sugih Waras', 4),
('3522092025', '352209', 'Sumbergede', 4),
('3522102001', '352210', 'Drajat', 4),
('3522102002', '352210', 'Banjaranyar', 4),
('3522102003', '352210', 'Ngemplak', 4),
('3522102004', '352210', 'Sraturejo', 4),
('3522102005', '352210', 'Blongsong', 4),
('3522102006', '352210', 'Baureno', 4),
('3522102007', '352210', 'Trojalu', 4),
('3522102008', '352210', 'Tulungagung', 4),
('3522102009', '352210', 'Selorejo', 4),
('3522102010', '352210', 'Tlogoagung', 4),
('3522102011', '352210', 'Sumuragung', 4),
('3522102012', '352210', 'Gajah', 4),
('3522102013', '352210', 'Kalisari', 4),
('3522102014', '352210', 'Tanggungan', 4),
('3522102015', '352210', 'Gunungsari', 4),
('3522102016', '352210', 'Bumiayu', 4),
('3522102017', '352210', 'Kauman', 4),
('3522102018', '352210', 'Karangdayu', 4),
('3522102019', '352210', 'Pasinan', 4),
('3522102020', '352210', 'Banjaran', 4),
('3522102021', '352210', 'Sembunglor', 4),
('3522102022', '352210', 'Pamohan', 4),
('3522102023', '352210', 'Pucungarum', 4),
('3522102024', '352210', 'Kedungrejo', 4),
('3522102025', '352210', 'Lebaksari', 4),
('3522112001', '352211', 'Semambung', 4),
('3522112002', '352211', 'Kanor', 4),
('3522112003', '352211', 'Tambahrejo', 4),
('3522112004', '352211', 'Piyak', 4),
('3522112005', '352211', 'Kabalan', 4),
('3522112006', '352211', 'Cangakan', 4),
('3522112007', '352211', 'Sarangan', 4),
('3522112008', '352211', 'Tejo', 4),
('3522112009', '352211', 'Simbatan', 4),
('3522112010', '352211', 'Pesen', 4),
('3522112011', '352211', 'Samberan', 4),
('3522112012', '352211', 'Palembon', 4),
('3522112013', '352211', 'Sedeng', 4),
('3522112014', '352211', 'Caruban', 4),
('3522112015', '352211', 'Sumberwangi', 4),
('3522112016', '352211', 'Prigi', 4),
('3522112017', '352211', 'Pilang', 4),
('3522112018', '352211', 'Gedongarum', 4),
('3522112019', '352211', 'Kedungprimpen', 4),
('3522112020', '352211', 'Temu', 4),
('3522112021', '352211', 'Simorejo', 4),
('3522112022', '352211', 'Bungur', 4),
('3522112023', '352211', 'Bakung', 4),
('3522112024', '352211', 'Nglaranga', 4),
('3522112025', '352211', 'Sroyo', 4),
('3522122001', '352212', 'Tlogohaji', 4),
('3522122002', '352212', 'Ngampal', 4),
('3522122003', '352212', 'Kedungrejo', 4),
('3522122004', '352212', 'Mlinjeng', 4),
('3522122005', '352212', 'Banjarrejo', 4),
('3522122006', '352212', 'Sumberrejo', 4),
('3522122007', '352212', 'Kayulemah', 4),
('3522122008', '352212', 'Teleng', 4),
('3522122009', '352212', 'Waton', 4),
('3522122010', '352212', 'Sambongrejo', 4),
('3522122011', '352212', 'Sendangagung', 4),
('3522122012', '352212', 'Deru', 4),
('3522122013', '352212', 'Pekuwon', 4),
('3522122014', '352212', 'Karangdowo', 4),
('3522122015', '352212', 'Pejambon', 4),
('3522122016', '352212', 'Tulungrejo', 4),
('3522122017', '352212', 'Karangdinoyo', 4),
('3522122018', '352212', 'Butoh', 4),
('3522122019', '352212', 'Mejuwet', 4),
('3522122020', '352212', 'Prayungan', 4),
('3522122021', '352212', 'Sumuragung', 4),
('3522122022', '352212', 'Jatigede', 4),
('3522122023', '352212', 'Talun', 4),
('3522122024', '352212', 'Bogangin', 4),
('3522122025', '352212', 'Sumberharjo', 4),
('3522122026', '352212', 'Margoagung', 4),
('3522132001', '352213', 'Sidobandung', 4),
('3522132002', '352213', 'Mayangkawis', 4),
('3522132003', '352213', 'Kenep', 4),
('3522132004', '352213', 'Pohbogo', 4),
('3522132005', '352213', 'Penganten', 4),
('3522132006', '352213', 'Bulaklo', 4),
('3522132007', '352213', 'Bulu', 4),
('3522132008', '352213', 'Kemamang', 4),
('3522132009', '352213', 'Ngadiluhur', 4),
('3522132010', '352213', 'Kabunan', 4),
('3522132011', '352213', 'Subontoro', 4),
('3522132012', '352213', 'Suwaloh', 4),
('3522132013', '352213', 'Balenrejo', 4),
('3522132014', '352213', 'Margomulyo', 4),
('3522132015', '352213', 'Lengkong', 4),
('3522132016', '352213', 'Mulyoagung', 4),
('3522132017', '352213', 'Sekaran', 4),
('3522132018', '352213', 'Prambatan', 4),
('3522132019', '352213', 'Kedungdowo', 4),
('3522132020', '352213', 'Kedungbendo', 4),
('3522132021', '352213', 'Pilanggede', 4),
('3522132022', '352213', 'Sarirejo', 4),
('3522132023', '352213', 'Mulyorejo', 4),
('3522142001', '352214', 'Kumpulrejo', 4),
('3522142002', '352214', 'Bendo', 4),
('3522142003', '352214', 'Padang mentoyo', 4),
('3522142004', '352214', 'Tapelan', 4),
('3522142005', '352214', 'Bangilan', 4),
('3522142006', '352214', 'Sembung', 4),
('3522142007', '352214', 'Tanjung Harjo', 4),
('3522142008', '352214', 'Wedi', 4),
('3522142009', '352214', 'Plesungan', 4),
('3522142010', '352214', 'Kedaton', 4),
('3522142011', '352214', 'Kapas', 4),
('3522142012', '352214', 'Semenpinggir', 4),
('3522142013', '352214', 'Bogo', 4),
('3522142014', '352214', 'Bakalan', 4),
('3522142015', '352214', 'Mojodeso', 4),
('3522142016', '352214', 'Sukowati', 4),
('3522142017', '352214', 'Kalianyar', 4),
('3522142018', '352214', 'Tikusan', 4),
('3522142019', '352214', 'Ngampel', 4),
('3522142020', '352214', 'Sambiroto', 4),
('3522142021', '352214', 'Klampok', 4),
('3522151001', '352215', 'Jetak', 3),
('3522151004', '352215', 'Mojokampung', 3),
('3522151005', '352215', 'Kepatihan', 3),
('3522151006', '352215', 'Sumbang', 3),
('3522151007', '352215', 'Klangon', 3),
('3522151009', '352215', 'Ledok Kulon', 3),
('3522151010', '352215', 'Ledok Wetan', 3),
('3522151012', '352215', 'Ngrowo', 3),
('3522151013', '352215', 'Karang pacar', 3),
('3522151014', '352215', 'Banjarrejo', 3),
('3522152002', '352215', 'Pacul', 4),
('3522152003', '352215', 'Sukorejo', 4),
('3522152008', '352215', 'Kauman', 4),
('3522152015', '352215', 'Campurejo', 4),
('3522152016', '352215', 'Mulyoagung', 4),
('3522152017', '352215', 'Kalirejo', 4),
('3522152018', '352215', 'Semanding', 4),
('3522162006', '352216', 'Kalitidu', 4),
('3522162007', '352216', 'Sumengko', 4),
('3522162008', '352216', 'Mlaten', 4),
('3522162009', '352216', 'Talok', 4),
('3522162010', '352216', 'Brenggolo', 4),
('3522162011', '352216', 'Grebegan', 4),
('3522162012', '352216', 'Wotanngare', 4),
('3522162013', '352216', 'Panjunan', 4),
('3522162014', '352216', 'Mayanggeneng', 4),
('3522162015', '352216', 'Mayangrejo', 4),
('3522162016', '352216', 'Pilangsari', 4),
('3522162017', '352216', 'Mojosari', 4),
('3522162018', '352216', 'Pungpungan', 4),
('3522162019', '352216', 'Ngujo', 4),
('3522162020', '352216', 'Leran', 4),
('3522162021', '352216', 'Sukoharjo', 4),
('3522162022', '352216', 'Ngiringinrejo', 4),
('3522162023', '352216', 'Mojo', 4),
('3522172001', '352217', 'Dukuhlor', 4),
('3522172002', '352217', 'Kacangan', 4),
('3522172003', '352217', 'Kemiri', 4),
('3522172004', '352217', 'Petak', 4),
('3522172005', '352217', 'Sudah', 4),
('3522172006', '352217', 'Rendeng', 4),
('3522172007', '352217', 'Banaran', 4),
('3522172008', '352217', 'Ngujung', 4),
('3522172009', '352217', 'Sumberejo', 4),
('3522172010', '352217', 'Tambakromo', 4),
('3522172011', '352217', 'Tinawun', 4),
('3522172012', '352217', 'Kedungrejo', 4),
('3522172013', '352217', 'Ketileng', 4),
('3522172014', '352217', 'Malo', 4),
('3522172015', '352217', 'Sukorejo', 4),
('3522172016', '352217', 'Kliteh', 4),
('3522172017', '352217', 'Trembes', 4),
('3522172018', '352217', 'Semiaran', 4),
('3522172019', '352217', 'Tanggir', 4),
('3522172020', '352217', 'Tulungagung', 4),
('3522182001', '352218', 'Pelem', 4),
('3522182002', '352218', 'Ngrejeng', 4),
('3522182003', '352218', 'Tlatah', 4),
('3522182004', '352218', 'Kaliombo', 4),
('3522182005', '352218', 'Tinumpuk', 4),
('3522182006', '352218', 'Punggur', 4),
('3522182007', '352218', 'Sedah Kidul', 4),
('3522182008', '352218', 'Pojok', 4),
('3522182009', '352218', 'Purwosari', 4),
('3522182010', '352218', 'Gapluk', 4),
('3522182011', '352218', 'Kuniran', 4),
('3522182012', '352218', 'Donan', 4),
('3522192001', '352219', 'Tebon', 4),
('3522192002', '352219', 'Prangi', 4),
('3522192003', '352219', 'Purworejo', 4),
('3522192004', '352219', 'Ngeper', 4),
('3522192005', '352219', 'Ngasinan', 4),
('3522192006', '352219', 'Cendono', 4),
('3522192007', '352219', 'Sidorejo', 4),
('3522192008', '352219', 'Nguken', 4),
('3522192009', '352219', 'Dengok', 4),
('3522192010', '352219', 'Padangan', 4),
('3522192011', '352219', 'Kuncen', 4),
('3522192012', '352219', 'Sonorejo', 4),
('3522192013', '352219', 'Ngradin', 4),
('3522192014', '352219', 'Banjarejo', 4),
('3522192015', '352219', 'Kebonagung', 4),
('3522192016', '352219', 'Kendung', 4),
('3522202001', '352220', 'Batokan', 4),
('3522202002', '352220', 'Betet', 4),
('3522202003', '352220', 'Tembeling', 4),
('3522202004', '352220', 'Sidomukti', 4),
('3522202005', '352220', 'Basah', 4),
('3522202006', '352220', 'Sambeng', 4),
('3522202007', '352220', 'Ngaglik', 4),
('3522202008', '352220', 'Kasiman', 4),
('3522202009', '352220', 'Sekaran', 4),
('3522202010', '352220', 'Tambakmerak', 4),
('3522212001', '352221', 'Kedungsumber', 4),
('3522212002', '352221', 'Kedungsari', 4),
('3522212003', '352221', 'Papringan', 4),
('3522212004', '352221', 'Soko', 4),
('3522212005', '352221', 'Pandantoyo', 4),
('3522212006', '352221', 'Belun', 4),
('3522212007', '352221', 'Temayang', 4),
('3522212008', '352221', 'Bakulan', 4),
('3522212009', '352221', 'Jono', 4),
('3522212010', '352221', 'Ngujung', 4),
('3522212011', '352221', 'Buntalan', 4),
('3522212012', '352221', 'Pancur', 4),
('3522222001', '352222', 'Kalangan', 4),
('3522222002', '352222', 'Ngelo', 4),
('3522222003', '352222', 'Margomulyo', 4),
('3522222004', '352222', 'Sumberrejo', 4),
('3522222005', '352222', 'Meduri', 4),
('3522222006', '352222', 'Geneng', 4),
('3522232001', '352223', 'Banjarsari', 4),
('3522232002', '352223', 'Tulungrejo', 4),
('3522232003', '352223', 'Trucuk', 4),
('3522232004', '352223', 'Mori', 4),
('3522232005', '352223', 'Padang', 4),
('3522232006', '352223', 'Sumberrejo', 4),
('3522232007', '352223', 'Guyangan', 4),
('3522232008', '352223', 'Sranak', 4),
('3522232009', '352223', 'Sumbangtimun', 4),
('3522232010', '352223', 'Kanten', 4),
('3522232011', '352223', 'Kandangan', 4),
('3522232012', '352223', 'Pagerwesi', 4),
('3522242001', '352224', 'Semawot', 4),
('3522242002', '352224', 'Kalicilik', 4),
('3522242003', '352224', 'Sukosewu', 4),
('3522242004', '352224', 'Klepek', 4),
('3522242005', '352224', 'Tegalkodo', 4),
('3522242006', '352224', 'Sitiaji', 4),
('3522242007', '352224', 'Purwoasri', 4),
('3522242008', '352224', 'Pacing', 4),
('3522242009', '352224', 'Jumput', 4),
('3522242010', '352224', 'Duyungan', 4),
('3522242011', '352224', 'Semenkidul', 4),
('3522242012', '352224', 'Sidodadi', 4),
('3522242013', '352224', 'Sidorejo', 4),
('3522242014', '352224', 'Sumberejo Kidul', 4),
('3522252001', '352225', 'Kawengan', 4),
('3522252002', '352225', 'Wonocolo', 4),
('3522252003', '352225', 'Hargomulyo', 4),
('3522252004', '352225', 'Kedewan', 4),
('3522252005', '352225', 'Beji', 4),
('3522262001', '352226', 'Krondonan', 4),
('3522262002', '352226', 'Jari', 4),
('3522262003', '352226', 'Sambongrejo', 4),
('3522262004', '352226', 'Pajeng', 4),
('3522262005', '352226', 'Gondang', 4),
('3522262006', '352226', 'Senganten', 4),
('3522262007', '352226', 'Paragelan', 4),
('3522272001', '352227', 'Bobol', 4),
('3522272002', '352227', 'Miyono', 4),
('3522272003', '352227', 'Sekar', 4),
('3522272004', '352227', 'Klino', 4),
('3522272005', '352227', 'Deling', 4),
('3522272006', '352227', 'Bareng', 4),
('3522282001', '352228', 'Gayam', 4),
('3522282002', '352228', 'Begadon', 4),
('3522282003', '352228', 'Ringintunggal', 4),
('3522282004', '352228', 'Mojodelik', 4),
('3522282005', '352228', 'Brabowan', 4),
('3522282006', '352228', 'Bonorejo', 4),
('3522282007', '352228', 'Beged', 4),
('3522282008', '352228', 'Katur', 4),
('3522282009', '352228', 'Ngraho', 4),
('3522282010', '352228', 'Sudu', 4),
('3522282011', '352228', 'Cengungklung', 4),
('3522282012', '352228', 'Manukan', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_magang`
--

CREATE TABLE `tb_magang` (
  `id_magang` bigint(20) NOT NULL,
  `asn_id` bigint(20) NOT NULL,
  `ta_id` bigint(20) NOT NULL,
  `kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_magang`
--

INSERT INTO `tb_magang` (`id_magang`, `asn_id`, `ta_id`, `kelas`) VALUES
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
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8);

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
(1, 4),
(1, 5),
(1, 6);

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
(1, 1, 3, 70),
(1, 1, 4, 80),
(1, 1, 5, 98),
(1, 1, 6, 90),
(1, 1, 7, 80),
(1, 1, 8, 80),
(1, 4, 3, 90),
(1, 4, 4, 80),
(1, 4, 5, 95),
(1, 5, 3, 0),
(1, 5, 4, 0),
(1, 5, 5, 0),
(1, 6, 3, 0),
(1, 6, 4, 0),
(1, 6, 5, 0),
(1, 6, 6, 0),
(1, 6, 7, 0),
(1, 6, 8, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_prov` char(2) NOT NULL,
  `nama` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_prov`, `nama`) VALUES
('35', 'Jawa Timur');

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
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'Rian', 'Laki-laki', '2021-12-16', '0886154758671', 'S1', 'ISLAM', '08786458679', 'bojonegoro', '2021-12-16 05:08:52', '2021-12-15 05:40:00'),
(2, 'asn', '827ccb0eea8a706c4c34a16891f84e7b', 'guru', 'WISNU', 'Laki-laki', '2012-04-07', '123456789012345669', 'S1', 'ISLAM', '082299921720', 'Bojonegoro', '2021-11-16 03:24:07', '2021-11-16 03:24:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indeks untuk tabel `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`No_Agenda`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`No_Agenda`);

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
-- Indeks untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id_des`);

--
-- Indeks untuk tabel `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`id_kab`);

--
-- Indeks untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indeks untuk tabel `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indeks untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  ADD PRIMARY KEY (`id_magang`),
  ADD KEY `guru_id` (`asn_id`),
  ADD KEY `ta_id` (`ta_id`);

--
-- Indeks untuk tabel `tb_magang_job`
--
ALTER TABLE `tb_magang_job`
  ADD PRIMARY KEY (`magang_id`,`job_id`),
  ADD KEY `tb_pengajaran_mapel_ibfk_1` (`job_id`);

--
-- Indeks untuk tabel `tb_magang_pelajar`
--
ALTER TABLE `tb_magang_pelajar`
  ADD PRIMARY KEY (`magang_id`,`pelajar_id`),
  ADD KEY `tb_pengajaran_siswa_ibfk_2` (`pelajar_id`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`magang_id`,`pelajar_id`,`job_id`),
  ADD KEY `tb_nilai_ibfk_3` (`pelajar_id`),
  ADD KEY `tb_nilai_ibfk_4` (`job_id`);

--
-- Indeks untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `No_Agenda` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `No_Agenda` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_data_bidang`
--
ALTER TABLE `tb_data_bidang`
  MODIFY `id_job` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_data_pelajar`
--
ALTER TABLE `tb_data_pelajar`
  MODIFY `id_pelajar` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_data_tahun_ajaran`
--
ALTER TABLE `tb_data_tahun_ajaran`
  MODIFY `id_ta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id_des` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  MODIFY `id_magang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  ADD CONSTRAINT `tb_magang_ibfk_1` FOREIGN KEY (`asn_id`) REFERENCES `tb_user` (`id`) ON UPDATE CASCADE,
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

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`magang_id`) REFERENCES `tb_magang` (`id_magang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_3` FOREIGN KEY (`pelajar_id`) REFERENCES `tb_magang_pelajar` (`pelajar_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_4` FOREIGN KEY (`job_id`) REFERENCES `tb_magang_job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
