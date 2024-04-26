-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2024 pada 02.37
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
-- Database: `sicatur_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keperluan_user`
--

CREATE TABLE `keperluan_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `keperluan` tinytext NOT NULL,
  `waktu_mulai` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_selesai` timestamp NULL DEFAULT current_timestamp(),
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `keperluan_user`
--

INSERT INTO `keperluan_user` (`id`, `user_id`, `keperluan`, `waktu_mulai`, `waktu_selesai`, `durasi`) VALUES
(1, 3, 'cek pw baru', '2023-12-11 13:03:52', '2023-12-11 13:04:01', 9),
(2, 3, 'cek4', '2023-12-11 13:14:45', '2023-12-11 13:46:15', 1890),
(3, 3, 'cek1', '2023-12-11 13:47:37', '2023-12-11 13:54:04', 387),
(4, 3, 'cek 2', '2023-12-11 13:54:40', '2023-12-11 14:21:51', 1631),
(5, 3, 'cek5', '2023-12-12 09:12:37', '2023-12-12 09:13:57', 80),
(6, 3, 'masuk12', '2023-12-12 09:14:10', '2023-12-12 09:14:56', 46),
(7, 3, 'masuk db cek 12', '2023-12-12 10:42:10', '2023-12-12 10:42:26', 16),
(8, 3, 'coba masuk db yang ke 1', '2023-12-13 03:41:06', '2023-12-13 03:41:48', 42),
(9, 3, 'cek9', '2023-12-13 03:54:58', '2023-12-13 03:55:15', 17),
(10, 3, 'cek masuk hari ini', '2023-12-13 08:09:01', '2023-12-13 08:09:29', 28),
(11, 3, 'masuk sekarang\r\n', '2023-12-14 15:41:17', '2023-12-14 15:43:20', 123),
(12, 3, 'nyoba session', '2023-12-14 15:47:42', '2023-12-14 23:57:33', 29391),
(13, 3, 'nyoba session lagi yg ke dua\r\n', '2023-12-15 01:20:08', '2023-12-15 01:39:18', 1150),
(14, 3, 'test error', '2023-12-17 09:44:03', '2023-12-17 09:44:24', 21),
(15, 3, 'cek ganti password', '2023-12-17 09:44:54', '2023-12-17 09:46:05', 71),
(16, 3, 'masuk dengan pw baru', '2023-12-17 09:46:39', '2023-12-17 09:47:00', 21),
(17, 3, 'pw baru\r\n', '2023-12-17 09:47:59', '2023-12-17 09:48:27', 28),
(18, 3, 'masuk dengn pw lama\r\n', '2023-12-17 09:48:53', '2023-12-17 09:49:07', 14),
(19, 3, 'nyoba session bisa berpa jam', '2023-12-17 15:48:29', '2023-12-17 23:21:07', 27158),
(20, 3, 'tes masuk', '2023-12-18 04:13:25', '2023-12-18 05:01:22', 2877),
(21, 5, 'cek user baru', '2023-12-22 04:27:50', '2023-12-22 04:28:00', 10),
(22, 6, 'login dengan user baru lagi', '2023-12-22 04:30:42', '2023-12-22 04:30:50', 8),
(23, 6, 'masuk dengan user muhyi', '2023-12-22 04:33:31', '2023-12-22 04:33:50', 19),
(24, 6, 'masuk dengan user muhyi', '2023-12-22 04:34:28', '2023-12-22 04:34:35', 7),
(25, 8, 'login dengan muhyi', '2023-12-22 04:37:40', '2023-12-22 04:37:47', 7),
(26, 11, 'login dengan user sadad', '2023-12-22 04:42:00', '2023-12-22 04:42:06', 6),
(27, 22, 'akun user 100', '2023-12-22 09:30:57', '2023-12-22 09:31:01', 4),
(28, 10, 'ilmi ganti password', '2023-12-23 11:31:16', '2023-12-23 11:32:09', 53),
(29, 10, 'ilmi masuk dgn pw baru', '2023-12-23 11:32:42', '2023-12-23 11:34:10', 88),
(30, 37, 'login akmal\r\n', '2023-12-24 10:57:42', '2023-12-24 10:58:18', 36),
(31, 11, 'uday login', '2023-12-24 18:01:23', '2023-12-24 18:01:27', 4),
(44, 3, 'nyoba login ', '2023-12-27 05:31:19', '2023-12-27 05:31:49', 30),
(45, 3, 'cek masuk', '2024-01-02 08:37:20', '2024-01-02 08:46:35', 555),
(47, 10, 'tes', '2024-01-02 10:55:08', '2024-01-02 10:56:43', 95),
(48, 6, 'cek', '2024-01-02 11:02:36', '2024-01-02 11:04:59', 143),
(49, 37, 'akmal', '2024-01-02 11:24:37', '2024-01-02 11:26:37', 120),
(50, 11, 'cek', '2024-01-02 14:35:01', '2024-01-02 15:16:55', 2514),
(51, 11, 'tes', '2024-01-02 15:17:12', '2024-01-02 15:18:02', 50),
(52, 11, 'rek', '2024-01-02 15:18:30', '2024-01-02 15:18:56', 26),
(53, 9, '1', '2024-01-03 00:21:48', '2024-01-03 00:22:07', 19),
(54, 24, 'cek', '2024-01-03 09:54:12', '2024-01-03 09:54:29', 17),
(55, 6, 'tes', '2024-01-04 01:45:27', '2024-01-04 01:49:45', 258),
(56, 5, 'tes', '2024-01-04 03:05:16', '2024-01-04 03:07:06', 110),
(57, 5, 'qwe', '2024-01-04 03:09:15', '2024-01-04 03:12:48', 213),
(60, 6, 'cek\r\n', '2024-01-04 08:12:19', '2024-01-04 08:13:13', 54),
(61, 5, 'cek', '2024-01-04 08:49:19', '2024-01-04 09:22:36', 1997),
(62, 10, 'cek', '2024-01-04 17:55:23', '2024-01-04 17:56:25', 62),
(65, 5, 'ew', '2024-01-04 18:11:24', '2024-01-04 18:13:45', 141),
(66, 5, 'res', '2024-01-04 18:15:35', '2024-01-04 18:15:42', 7),
(67, 9, 'res', '2024-01-04 18:17:43', '2024-01-04 18:18:31', 48),
(68, 9, 'e', '2024-01-04 18:18:42', '2024-01-04 18:18:56', 14),
(69, 9, 'gfrds', '2024-01-04 18:19:03', '2024-01-04 18:19:06', 3),
(70, 74, 'qw', '2024-01-04 18:22:28', '2024-01-04 18:22:47', 19),
(71, 74, 'qwer', '2024-01-04 18:23:47', '2024-01-04 18:24:02', 15),
(72, 3, 'gbfvd', '2024-01-04 18:30:08', '2024-01-04 18:30:15', 7),
(73, 54, 'bfd', '2024-01-04 18:31:42', '2024-01-04 18:31:44', 2),
(74, 54, 'gbfds', '2024-01-04 18:32:32', '2024-01-04 18:32:37', 5),
(75, 5, 'qwert', '2024-01-04 18:50:51', '2024-01-04 18:51:22', 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(10) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `nama_lengkap`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(3, 'zein', 'akli', '$2y$10$f6FIS9xIVBeGKCU7gxS7t.MA/jgmif0WFurm7uRedpR8U8YZTBGVK', 0, '2023-12-11 06:03:16', '2024-01-04 18:28:35'),
(4, 'mala', 'Admin Mala', '$2y$10$.tbXZvrPpEjNocWop1vEoOZ.PHmPgMl6RWZxRdDRaMzDEsur685vO', 1, '2023-12-11 06:03:16', '2023-12-11 06:03:16'),
(5, 'syahrullah', 'syahrul', '$2y$10$zC6OPCFIwVLdtLKBJ5rzo.qehTMLEVphPdIDYODWrAVATK0h56wbC', 0, '2023-12-22 04:26:35', '2024-01-04 18:14:12'),
(6, 'kevin', 'anggara', '$2y$10$E8Sjw5TSPH/Mp5viUHL7UeTDnYDHJfezxBAYTXiHrATllKleaRE1S', 0, '2023-12-22 04:27:16', '2024-01-04 01:48:32'),
(8, 'ruslan ', 'efendi', '$2y$10$L5h6K85Hu.NzjTnTY3OjZ.nK2KKn8gDBPzqDOEcg8R8UJht0yOKQW', 0, '2023-12-22 04:36:29', '2023-12-24 18:00:41'),
(9, 'badru', 'Badru Tamami', '$2y$10$TMDNDBZQrj9aTuQ/ts9lYOXjfbdtKUFAAJWR9uDYGzQ4vE4LW.98y', 0, '2023-12-22 04:39:40', '2024-01-04 18:18:53'),
(10, 'ilmi', 'ilmi', '$2y$10$xezlSqEIavR/O9qmQkTUEe6sueeRbftKudhELeM.GscSfSNoPAvkm', 0, '2023-12-22 04:40:11', '2024-01-04 17:56:17'),
(11, 'uday', 'udai', '$2y$10$nMJn3iCmrSMzO4.37D4XKeTYRj98U24iSNo0FHxidrA9whSnVv3qW', 0, '2023-12-22 04:40:29', '2024-01-04 12:35:57'),
(16, 'userzubai', 'userzubai', '$2y$10$jfPV/5iH8Fa5RQddUnKqVOSwF9KAMajD2v7KRViFnEwB6XxN61fDa', 0, '2023-12-22 09:14:30', '2024-01-03 04:13:49'),
(17, 'user2', 'user2', '$2y$10$vFVs0u/HXiygwQwvyzqB4eoEXsFS8tnn4fS1KfO2auNWJpIhlEvRe', 0, '2023-12-22 09:14:59', '2023-12-22 09:14:59'),
(22, 'akunuser10', 'akunuser100', '$2y$10$VTm9g6DdRzaHGWnield7VeYpHKCafIhzail5hdnKmJ3GOjy0MmnCa', 0, '2023-12-22 09:29:18', '2023-12-22 09:29:18'),
(23, 'user9', 'user9', '$2y$10$xyJ6V/7YJhsex33f6ky5uO0.khM5Ao5Fh2Y/FjvX7/C41kN1/Mrz.', 0, '2023-12-22 09:39:18', '2023-12-22 09:39:18'),
(24, 'user8', 'user8', '$2y$10$iyCqGFW2w3VmrFukK1r63ew5ZIVvCV35JOvu02e2uA/fdWvp6LoLm', 0, '2023-12-22 09:40:10', '2023-12-22 09:40:10'),
(26, 'adminuser', 'adminuser', '$2y$10$yaQzCslRw4E.Tzeb4xLVPuAh8g5qdKW9L0h1.2X7O4Mo/IC98JPOu', 0, '2023-12-22 09:41:42', '2023-12-22 09:41:42'),
(27, 'iniadmin', 'iniadmin', '$2y$10$T3mLtUKY2ls.PuPOpL.HYeOulYWRmtG.xTdDF/s4UBnKeEI8DRu5e', 0, '2023-12-22 09:42:17', '2023-12-22 09:42:17'),
(29, 'adminbiasa', 'adminbiasa', '$2y$10$M2mK71nqa9ZwhJcb8kQNGeszKxsl6B9WyXOnt9qd/1zxPOhzmWgZu', 1, '2023-12-22 09:44:24', '2023-12-24 18:32:24'),
(30, 'iniuser', 'iniuser', '$2y$10$oqyiebR7fcqsjucmcpwcW.xe9iPaM6uFqNjnj6NQyQjwbuWbRa4ti', 0, '2023-12-22 09:45:21', '2023-12-22 09:45:21'),
(31, 'iniuser2', 'iniuser2', '$2y$10$bS1lqOQ9vRKeFM1dkOiw5uP3TneKBU4G0fbSZFuHB6Osn5YeA.W16', 0, '2023-12-22 09:45:44', '2023-12-22 09:45:44'),
(32, 'iniuser3', 'iniuser3', '$2y$10$2Zw5G4pjOmUNyKRzwYG7yeMcevb2i8eG79iQc0E5SC2GEhaWzebmS', 0, '2023-12-22 09:46:10', '2023-12-22 09:46:10'),
(33, 'syahrul', 'syahrullah', '$2y$10$wzLERwOxhh2iVp45Gr9OBeFpL/nPuTaow.DzpWan7YenY2SIx8932', 1, '2023-12-22 09:48:32', '2023-12-22 09:48:32'),
(34, 'muhsyahh', 'muhsyahrullah', '$2y$10$f51HGty0DZ7isaWhttazJe16580SX1lFeK3jvRfUfWeoc6aOSQdue', 1, '2023-12-22 09:49:15', '2024-01-04 12:35:34'),
(35, 'arul', 'arul', '$2y$10$iLVDAXhgshKwaU0QfZc86euSg.vsGuI2mTlAO/ImDSBQrjDdtOgbO', 1, '2023-12-22 09:51:46', '2023-12-24 18:21:40'),
(37, 'akmal', 'F.akmal', '$2y$10$j4vPA8nKufjfHRETBjzPx.apGx8lxvbUTc4lmVFg.XVKUcRf749Yi', 0, '2023-12-24 10:57:29', '2024-01-02 11:26:25'),
(39, 'hendra', 'hendra', '$2y$10$k/O9rzOaYlfE4OpYK/hkp.YIj/YmoSoo9bZ3IfPnWC6A6TYfVDBCS', 1, '2023-12-24 18:48:34', '2023-12-25 00:35:37'),
(50, 'baru', 'baru', '$2y$10$xmI/ZzG7YZ8hLd1HLA.TC.tnSsPl/yWDQGKju6u3SU95v41DWyd8a', 0, '2024-01-02 10:02:22', '2024-01-02 10:02:22'),
(53, 'qia', 'qia', '$2y$10$dy2fV5fg14Ck/j9lfD.0Gum77ysCs2b4H0AkNKVCAUZLRvHPDebSy', 0, '2024-01-03 00:48:56', '2024-01-03 00:48:56'),
(54, 'margo', 'margo', '$2y$10$kMGjBqV6Texeh.MyQTgdieCr7u4zcVvp/ah/1o2kVjb.YXUGVthja', 0, '2024-01-03 01:25:01', '2024-01-04 18:32:17'),
(55, 'selamet', 'selamet', '$2y$10$8aChk/kaeZPPs5Cy5zJM/.t4ko6c7TkyrGn.sMwrLvxX3zEPeodDS', 0, '2024-01-03 01:25:57', '2024-01-03 01:25:57'),
(58, 'revo', 'revo ', '$2y$10$QnWbn0XOzb99ksZEFs8Ac.b2vCx1px33VwtQB4fLxyls4VeAVsH.W', 0, '2024-01-03 01:36:46', '2024-01-04 02:05:52'),
(59, 'alfa', 'alfarizi ', '$2y$10$SqcXAgKwqaSMAGDz0S2Q0edEC4mMfL2RNQAaaYk4sffNkUO0CWuOy', 1, '2024-01-04 01:56:11', '2024-01-04 18:04:23'),
(73, 'dila', 'dila', '$2y$10$rEkzBzGdDlrj8FeUVqcep.Mw00Fg.zwNheYpD0Awn1DQW4Plih4Xi', 1, '2024-01-04 18:20:02', '2024-01-04 18:20:55'),
(74, 'zulfa.d', 'zulfa.d', '$2y$10$g2Ko3/dussIgb4YPh9U.muv4G35rPubtzEyvw9olARnPQ6Dro5H5G', 0, '2024-01-04 18:21:15', '2024-01-04 18:23:37'),
(80, 'qa', 'qa', '$2y$10$XanMyy5cjvJKNH2RUO9sHe/UadsNx0yW5F.k2oTDTiqOxZ2CRl8ce', 0, '2024-01-04 18:26:28', '2024-01-04 18:26:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(12, '2023-11-17-063806', 'App\\Database\\Migrations\\CreateTableLogin', 'default', 'App', 1701963394, 1),
(13, '2023-11-17-063917', 'App\\Database\\Migrations\\CreateTableKeperluanUser', 'default', 'App', 1701963394, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keperluan_user`
--
ALTER TABLE `keperluan_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keperluan_user_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keperluan_user`
--
ALTER TABLE `keperluan_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keperluan_user`
--
ALTER TABLE `keperluan_user`
  ADD CONSTRAINT `keperluan_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
