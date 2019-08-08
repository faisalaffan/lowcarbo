-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2019 pada 19.43
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `api`
--

CREATE TABLE `api` (
  `id_user` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE `city` (
  `id` int(255) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `city_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`id`, `province_id`, `city_name`) VALUES
(1, 1, 'Malang'),
(3, 3, 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `district`
--

CREATE TABLE `district` (
  `id` int(255) NOT NULL,
  `id_city` int(11) DEFAULT NULL,
  `district_name` varchar(200) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `district`
--

INSERT INTO `district` (`id`, `id_city`, `district_name`, `postal_code`) VALUES
(1, 1, 'SAWOJAJAR', '65154'),
(2, 1, 'BELIMBING', '65125'),
(3, 1, 'TEGALSARI', '62502'),
(4, NULL, 'Sampang', '69216'),
(5, 3, 'KEBONAGUNG', '60232'),
(7, NULL, 'Sampang', '69216');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sampah`
--

CREATE TABLE `jenis_sampah` (
  `id_jenis_sampah` int(11) NOT NULL,
  `nama_jenis_sampah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_sampah`
--

INSERT INTO `jenis_sampah` (`id_jenis_sampah`, `nama_jenis_sampah`) VALUES
(1, 'PLASTIK'),
(2, 'KERTAS'),
(3, 'TIMBAL'),
(4, 'Updated');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemerintah`
--

CREATE TABLE `pemerintah` (
  `id_pemerintah` int(11) NOT NULL,
  `nama_pegawai_pemerintah` int(11) NOT NULL,
  `username_pemerintah` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjemputan`
--

CREATE TABLE `penjemputan` (
  `id_penjemputan` varchar(255) NOT NULL,
  `id_tpa` varchar(100) NOT NULL,
  `id_sampah` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `verifikasi` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `province`
--

CREATE TABLE `province` (
  `id` int(255) NOT NULL,
  `province_name` varchar(100) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lng` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `province`
--

INSERT INTO `province` (`id`, `province_name`, `lat`, `lng`) VALUES
(1, 'Jawa Timur', '321', '321'),
(2, 'updatedes', '321', '321'),
(3, 'Jawa Tengah', '113322', '123122'),
(6, 'ASD', '123', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah`
--

CREATE TABLE `sampah` (
  `id_sampah` varchar(255) NOT NULL,
  `id_jenis_sampah` int(11) NOT NULL,
  `id_tps` varchar(255) DEFAULT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` int(11) NOT NULL,
  `tertampung` int(1) NOT NULL COMMENT '0 = invoice; 1 = di TPS; 2 = di TPA',
  `waktu_ditambahkan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sampah`
--

INSERT INTO `sampah` (`id_sampah`, `id_jenis_sampah`, `id_tps`, `lat`, `lng`, `title`, `gambar`, `berat`, `tertampung`, `waktu_ditambahkan`) VALUES
('', 1, 'TPS201908021052501684', '123', '123', 'sdfsdf', 'ssdasd', 390, 2, '0000-00-00 00:00:00'),
('12123', 2, 'TPS201908021052501123', '123', '23213', 'asd', 'sadasd', 100, 2, '2019-08-07 19:41:34'),
('asdasd', 2, 'TPS201908030844342154', '1321', '213213', 'sadsa', 'daasdasd', 210, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `station`
--

CREATE TABLE `station` (
  `id_station` varchar(255) NOT NULL,
  `id_tpa` varchar(100) DEFAULT NULL,
  `nama_station` varchar(255) DEFAULT NULL,
  `lat_station` varchar(255) DEFAULT NULL,
  `lng_station` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `station`
--

INSERT INTO `station` (`id_station`, `id_tpa`, `nama_station`, `lat_station`, `lng_station`) VALUES
('ST201908030727391310', 'TPA201908010923254967', 'st12', '132', '123'),
('ST201908031513433462', 'TPA201908010923254967', 'STATION1', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_co`
--

CREATE TABLE `tbl_co` (
  `id_co` varchar(255) NOT NULL,
  `id_station` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `ket` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_co`
--

INSERT INTO `tbl_co` (`id_co`, `id_station`, `nilai`, `waktu`, `ket`) VALUES
('1', 'ST201908030727391310', 30, '2019-08-07 14:37:45', 'GAOL'),
('2', 'ST201908031513433462', 21, '2019-08-07 14:37:49', 'GOLS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_co2`
--

CREATE TABLE `tbl_co2` (
  `id_co2` varchar(255) NOT NULL,
  `id_station` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `ket` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Id table winddirection adalah id_arah_angin';

--
-- Dumping data untuk tabel `tbl_co2`
--

INSERT INTO `tbl_co2` (`id_co2`, `id_station`, `nilai`, `waktu`, `ket`) VALUES
('1', 'ST201908030727391310', 30, '2019-08-07 14:39:08', '123'),
('2', 'ST201908031513433462', 20, '2019-08-07 14:39:12', 'GOLA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` varchar(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `file` varchar(40) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_humidity`
--

CREATE TABLE `tbl_humidity` (
  `id_humidity` varchar(255) NOT NULL,
  `id_station` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `ket` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_humidity`
--

INSERT INTO `tbl_humidity` (`id_humidity`, `id_station`, `nilai`, `waktu`, `ket`) VALUES
('', 'ST201908030727391310', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_methane`
--

CREATE TABLE `tbl_methane` (
  `id_methane` varchar(255) NOT NULL,
  `id_station` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `ket` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_scale`
--

CREATE TABLE `tbl_scale` (
  `kode` int(11) DEFAULT NULL,
  `code_description` varchar(255) DEFAULT NULL,
  `bottom_max_level` double DEFAULT NULL,
  `bottom_level` double DEFAULT NULL,
  `medium_level` double DEFAULT NULL,
  `top_level` double DEFAULT NULL,
  `top_max_level` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_temperature`
--

CREATE TABLE `tbl_temperature` (
  `id_temperature` varchar(255) NOT NULL,
  `id_station` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `ket` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Id table winddirection adalah id_arah_angin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_voltage`
--

CREATE TABLE `tbl_voltage` (
  `id_voltage` varchar(255) NOT NULL,
  `id_station` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `ket` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wind`
--

CREATE TABLE `tbl_wind` (
  `id_wind` varchar(255) NOT NULL,
  `id_station` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `ket` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_winddirection`
--

CREATE TABLE `tbl_winddirection` (
  `id_winddirection` varchar(255) NOT NULL,
  `id_station` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `ket` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Id table winddirection adalah id_arah_angin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpa`
--

CREATE TABLE `tpa` (
  `id_tpa` varchar(255) NOT NULL,
  `nama_tpa` varchar(255) NOT NULL,
  `alamat_tpa` varchar(255) NOT NULL,
  `no_alamat` varchar(20) DEFAULT NULL,
  `rt` varchar(20) DEFAULT NULL,
  `rw` varchar(25) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `lat_tpa` varchar(255) NOT NULL,
  `lng_tpa` varchar(255) NOT NULL,
  `gambar_tpa` varchar(255) DEFAULT NULL,
  `username_tpa` varchar(50) NOT NULL,
  `password_tpa` varchar(50) NOT NULL,
  `kml_file` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tpa`
--

INSERT INTO `tpa` (`id_tpa`, `nama_tpa`, `alamat_tpa`, `no_alamat`, `rt`, `rw`, `district_id`, `lat_tpa`, `lng_tpa`, `gambar_tpa`, `username_tpa`, `password_tpa`, `kml_file`) VALUES
('TPA201908010923254967', 'TPA SAWOJAJAR', 'JL. DANURWENDA II', '20', '01', '06', 1, '1234', '1234', 'tpa/02082019061715.jpg', 'FAISAL', 'FAISAL', 'kml/07082019185354.kml'),
('TPA201908021453371241', 'TPA BELIMBING', 'BELIMBING', '01', '23', '08', 1, '133098', '123190', 'tpa/02082019145337.jpg', 'BELIMBING', 'BELIMBING', 'kml/07082019184729.kml'),
('TPA201908030931564341', 'asd', 'asda', 'asdasd', '1', '20', 5, '1231', '23123', 'tpa/03082019093156.jpg', 'asdasd', 'tpasdds', NULL),
('TPA201908071432382933', 'TPA NARUTO', 'NGAGEL', '02', '12', '01', 1, '123123', '12321', 'tpa/07082019143238.jpg', 'naruto', 'naruto', 'kml/07082019180434.kml');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tps`
--

CREATE TABLE `tps` (
  `id_tps` varchar(255) NOT NULL,
  `id_tpa` varchar(100) DEFAULT NULL,
  `nama_tps` varchar(255) DEFAULT NULL,
  `alamat_tps` varchar(255) NOT NULL,
  `lat_tps` varchar(255) DEFAULT NULL,
  `lng_tps` varchar(255) DEFAULT NULL,
  `gambar_tps` varchar(255) DEFAULT NULL,
  `username_tps` varchar(50) NOT NULL,
  `password_tps` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tps`
--

INSERT INTO `tps` (`id_tps`, `id_tpa`, `nama_tps`, `alamat_tps`, `lat_tps`, `lng_tps`, `gambar_tps`, `username_tps`, `password_tps`) VALUES
('TPS201908021052501123', 'TPA201908071432382933', 'TPS ANGEL', 'asd', '123', '321', 'tps/02082019105345.jpg', 'Muhammad Faisal Affan', 'asdfghjkl'),
('TPS201908021052501684', 'TPA201908010923254967', 'TPS SUKOMARDJOHARJO', 'ErinaYusaf', 'ASDF', 'ASDF', 'tps/02082019105345.jpg', 'Muhammad Faisal Affan', 'asdfghjkl'),
('TPS201908030844342154', 'TPA201908021453371241', 'ASD', 'ASD', 'ASD', 'ASD', 'tps/03082019093057.jpg', 'ASD', 'ASD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `user_fullname` varchar(200) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `pwd_hash` varchar(255) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `address_number` varchar(20) DEFAULT NULL,
  `rt` varchar(20) DEFAULT NULL,
  `rw` varchar(20) DEFAULT NULL,
  `fb_account` varchar(500) DEFAULT NULL,
  `ig_account` varchar(500) DEFAULT NULL,
  `province` varchar(500) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `identity_file` varchar(750) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user_fullname`, `username`, `pwd_hash`, `gender`, `hp`, `address`, `address_number`, `rt`, `rw`, `fb_account`, `ig_account`, `province`, `photo`, `identity_file`, `level`, `lat`, `lng`) VALUES
('1', 'faisal affan', 'faisal', '1234', 'L', '081230041973', 'jl. danurwenda II ge/6', '06', '04', '16', 'Faisal Affan', 'faisal.afn', 'JAWA TIMUR', 'faisal.jpg', 'faisal.id', '2', '', ''),
('2', 'ADMIN TPA', 'tpadmin', '4321', 'P', '081230041130', 'jl. Sawojajar', '01', '23', '12', 'Tpa ', 'tpa.sawojajar', 'JAWA TIMUR', 'tpa.jpg', 'tpa.id', '2', NULL, NULL),
('3', 'MEMBER TPA', 'tpadmin', '4321', 'P', '081230041130', 'jl. Sawojajar', '01', '23', '12', 'Tpa ', 'tpa.sawojajar', 'JAWA TIMUR', 'tpa.jpg', 'tpa.id', '0', NULL, NULL),
('AD201907250959382229', 'fahmi afgan', 'fahmi', '3acd0be86de7dcccdbf91b20f94a68cea535922d', 'L', '0341', 'jl kemangi', '01', '04', '17', 'fahmi affan', 'fahmiaffan07', 'jawa timur', 'photo/25072019095938.jpg', 'identity_file/25072019095938.jpg', '2', '113322', '889900'),
('PE201907251115042524', 'fahmi afgan', 'fahmi', '3acd0be86de7dcccdbf91b20f94a68cea535922d', 'L', '0341', 'jl kemangi', '01', '04', '17', 'fahmi affan', 'fahmiaffan07', 'jawa timur', 'photo/25072019111504.jpg', 'identity_file/25072019111504.jpg', '1', '113322', '889900');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indeks untuk tabel `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`);

--
-- Indeks untuk tabel `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  ADD PRIMARY KEY (`id_jenis_sampah`);

--
-- Indeks untuk tabel `pemerintah`
--
ALTER TABLE `pemerintah`
  ADD PRIMARY KEY (`id_pemerintah`);

--
-- Indeks untuk tabel `penjemputan`
--
ALTER TABLE `penjemputan`
  ADD PRIMARY KEY (`id_penjemputan`),
  ADD KEY `id_sampah` (`id_sampah`),
  ADD KEY `id_tpa` (`id_tpa`) USING BTREE;

--
-- Indeks untuk tabel `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id_sampah`),
  ADD KEY `id_jenis_sampah` (`id_jenis_sampah`) USING BTREE,
  ADD KEY `id_tps` (`id_tps`);

--
-- Indeks untuk tabel `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id_station`),
  ADD KEY `id_tpa` (`id_tpa`);

--
-- Indeks untuk tabel `tbl_co`
--
ALTER TABLE `tbl_co`
  ADD PRIMARY KEY (`id_co`),
  ADD KEY `id_station` (`id_station`);

--
-- Indeks untuk tabel `tbl_co2`
--
ALTER TABLE `tbl_co2`
  ADD PRIMARY KEY (`id_co2`),
  ADD KEY `id_station` (`id_station`);

--
-- Indeks untuk tabel `tbl_humidity`
--
ALTER TABLE `tbl_humidity`
  ADD PRIMARY KEY (`id_humidity`),
  ADD KEY `id_station` (`id_station`);

--
-- Indeks untuk tabel `tbl_methane`
--
ALTER TABLE `tbl_methane`
  ADD PRIMARY KEY (`id_methane`),
  ADD KEY `id_station` (`id_station`);

--
-- Indeks untuk tabel `tbl_temperature`
--
ALTER TABLE `tbl_temperature`
  ADD PRIMARY KEY (`id_temperature`),
  ADD KEY `id_station` (`id_station`);

--
-- Indeks untuk tabel `tbl_voltage`
--
ALTER TABLE `tbl_voltage`
  ADD PRIMARY KEY (`id_voltage`),
  ADD KEY `id_station` (`id_station`);

--
-- Indeks untuk tabel `tbl_wind`
--
ALTER TABLE `tbl_wind`
  ADD PRIMARY KEY (`id_wind`),
  ADD KEY `id_station` (`id_station`);

--
-- Indeks untuk tabel `tbl_winddirection`
--
ALTER TABLE `tbl_winddirection`
  ADD PRIMARY KEY (`id_winddirection`),
  ADD KEY `id_station` (`id_station`);

--
-- Indeks untuk tabel `tpa`
--
ALTER TABLE `tpa`
  ADD PRIMARY KEY (`id_tpa`),
  ADD KEY `district_id` (`district_id`);

--
-- Indeks untuk tabel `tps`
--
ALTER TABLE `tps`
  ADD PRIMARY KEY (`id_tps`),
  ADD KEY `id_tpa` (`id_tpa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `city`
--
ALTER TABLE `city`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `district`
--
ALTER TABLE `district`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  MODIFY `id_jenis_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemerintah`
--
ALTER TABLE `pemerintah`
  MODIFY `id_pemerintah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `province`
--
ALTER TABLE `province`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Ketidakleluasaan untuk tabel `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `penjemputan`
--
ALTER TABLE `penjemputan`
  ADD CONSTRAINT `penjemputan_ibfk_2` FOREIGN KEY (`id_tpa`) REFERENCES `tpa` (`id_tpa`);

--
-- Ketidakleluasaan untuk tabel `sampah`
--
ALTER TABLE `sampah`
  ADD CONSTRAINT `sampah_ibfk_1` FOREIGN KEY (`id_jenis_sampah`) REFERENCES `jenis_sampah` (`id_jenis_sampah`),
  ADD CONSTRAINT `sampah_ibfk_2` FOREIGN KEY (`id_tps`) REFERENCES `tps` (`id_tps`);

--
-- Ketidakleluasaan untuk tabel `station`
--
ALTER TABLE `station`
  ADD CONSTRAINT `station_ibfk_1` FOREIGN KEY (`id_tpa`) REFERENCES `tpa` (`id_tpa`);

--
-- Ketidakleluasaan untuk tabel `tbl_co`
--
ALTER TABLE `tbl_co`
  ADD CONSTRAINT `tbl_co_ibfk_1` FOREIGN KEY (`id_station`) REFERENCES `station` (`id_station`);

--
-- Ketidakleluasaan untuk tabel `tbl_co2`
--
ALTER TABLE `tbl_co2`
  ADD CONSTRAINT `tbl_co2_ibfk_1` FOREIGN KEY (`id_station`) REFERENCES `station` (`id_station`);

--
-- Ketidakleluasaan untuk tabel `tbl_humidity`
--
ALTER TABLE `tbl_humidity`
  ADD CONSTRAINT `tbl_humidity_ibfk_1` FOREIGN KEY (`id_station`) REFERENCES `station` (`id_station`);

--
-- Ketidakleluasaan untuk tabel `tbl_methane`
--
ALTER TABLE `tbl_methane`
  ADD CONSTRAINT `tbl_methane_ibfk_1` FOREIGN KEY (`id_station`) REFERENCES `station` (`id_station`);

--
-- Ketidakleluasaan untuk tabel `tbl_temperature`
--
ALTER TABLE `tbl_temperature`
  ADD CONSTRAINT `tbl_temperature_ibfk_1` FOREIGN KEY (`id_station`) REFERENCES `station` (`id_station`);

--
-- Ketidakleluasaan untuk tabel `tbl_voltage`
--
ALTER TABLE `tbl_voltage`
  ADD CONSTRAINT `tbl_voltage_ibfk_1` FOREIGN KEY (`id_station`) REFERENCES `station` (`id_station`);

--
-- Ketidakleluasaan untuk tabel `tbl_wind`
--
ALTER TABLE `tbl_wind`
  ADD CONSTRAINT `tbl_wind_ibfk_1` FOREIGN KEY (`id_station`) REFERENCES `station` (`id_station`);

--
-- Ketidakleluasaan untuk tabel `tbl_winddirection`
--
ALTER TABLE `tbl_winddirection`
  ADD CONSTRAINT `tbl_winddirection_ibfk_1` FOREIGN KEY (`id_station`) REFERENCES `station` (`id_station`);

--
-- Ketidakleluasaan untuk tabel `tpa`
--
ALTER TABLE `tpa`
  ADD CONSTRAINT `tpa_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);

--
-- Ketidakleluasaan untuk tabel `tps`
--
ALTER TABLE `tps`
  ADD CONSTRAINT `tps_ibfk_2` FOREIGN KEY (`id_tpa`) REFERENCES `tpa` (`id_tpa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
