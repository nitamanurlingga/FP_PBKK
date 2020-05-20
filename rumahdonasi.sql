-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 10:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahdonasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `program_id`, `name`, `description`, `image`, `date_created`) VALUES
(1, 5, 'Donasi Anak Jalanan', 'Donasi ke anak jalanan', '26361a3e894af309660a8bed610500183.jpg', 1589990214);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `penyelenggara_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `place` varchar(128) NOT NULL,
  `description` varchar(256) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `penyelenggara_id`, `name`, `place`, `description`, `jumlah`, `target`, `status`, `image`, `date_created`) VALUES
(3, 1, 'Sebar Sembako11', 'Jalan Sesama', '11111111', 0, 500000, 2, 'EXHYmx6XYAAiCjp.jpg', 1589895944),
(4, 1, 'BLT', '', 'Donasi berupa uang tunai', 0, 0, 2, 'nana.jpg', 1589896467),
(5, 1, 'Peduli Orang Jalanan', '', 'Ini bantuan untuk orang yang hidup dijalanan', 0, 0, 2, '646a90c50562b82fe2f97e5fde5d8cc9.jpg', 1589900066),
(6, 1, 'Bantu Mereka', 'Kelurahan Banyuasin', 'Bantu pekerja harian yang terdampak cororo', 0, 0, 1, '34b8db8c6aae2ef37b4cd4a127627ea9.jpg', 1589900166),
(7, 1, 'Bantu Orang Berhenti Bekerja', 'Kota Surabaya', 'Bantu orang-orang di sekitar yang tidak dapat bekerja karena cororo', 0, 1000000, 1, 'Snowball1.png', 1589993990),
(8, 2, 'aa', 'aa', 'aaa', 0, 1000, 2, '38-387565_ryan-bear-kakaofriends-kakao-cute-kawaii-bts-ryan.png', 1590005365);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `no_hp`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Nitama Nurlingga', '087263546718', 'nitama@gmail.com', '$2y$10$Vhptz87Imhg9vdObclp46OAKHwCUrUwgwsjJbbeBxVrGdrHc6F9Pm', 2, 1, 1589823541),
(2, 'Yotifa', '087263546718', 'yotifa@gmail.com', '$2y$10$PkRgwLpAo2.SiLYNceMGXunnctjEprG1paN9YC/Vfo9S8DS99l5By', 2, 1, 1589824178),
(3, 'Admin', '0123456789', 'admin@gmail.com', '$2y$10$LYpSq2JQSW/6vg/sxn1KsuPft3yygn.Owm4j0tghTe1cyTqkvj3.2', 1, 1, 1590000641),
(4, 'Ingga', '0123456789', 'ingga@gmail.com', '$2y$10$4jFu3hi9bKlQESUFSkRyROBuo2y7Citv4u1bShX.TSc6k6/CFzXLi', 2, 1, 1590003911);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Penyelenggara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
