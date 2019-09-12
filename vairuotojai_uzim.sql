-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 11, 2019 at 09:48 PM
-- Server version: 5.6.42
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `falck_pagalba`
--

-- --------------------------------------------------------

--
-- Table structure for table `vairuotojai_uzim`
--

CREATE TABLE `vairuotojai_uzim` (
  `id` int(11) NOT NULL,
  `darbas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aktyvus` varchar(10) CHARACTER SET utf8 NOT NULL,
  `vairuotojas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uzsakymas1` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uzsakymas2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adresas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `laikas` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `countas` varchar(2) CHARACTER SET utf8 NOT NULL,
  `countas2` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `laikas2` varchar(20) CHARACTER SET utf8 NOT NULL,
  `uzsakymu_sk_d` int(4) NOT NULL,
  `laikas_start` int(20) NOT NULL,
  `uzsk_statusas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `laikas_start2` int(20) NOT NULL,
  `uzsk_statusas2` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vairuotojai_uzim`
--

INSERT INTO `vairuotojai_uzim` (`id`, `darbas`, `aktyvus`, `vairuotojas`, `uzsakymas1`, `uzsakymas2`, `adresas`, `laikas`, `countas`, `countas2`, `laikas2`, `uzsakymu_sk_d`, `laikas_start`, `uzsk_statusas`, `laikas_start2`, `uzsk_statusas2`) VALUES
(1, 'nedirba', 'vair', 'Vladimir', 'free', 'busy', 'kudirkos g.', '', '3', '1', '1561544139', 2, 3600, 'Uzsakymas vykdomas', 7200, 'Uzsakymas vykdomas'),
(2, 'nedirba', 'vair', 'Gintautas', 'free', 'free', '', '', '2', '2', '', 0, 3600, 'Pradeti vykdyti', 3600, 'Pradeti vykdyti'),
(3, 'nedirba', 'vair', 'Darius', 'free', 'free', '', '', '2', '2', '', 0, 3600, 'Pradeti vykdyti', 3600, 'Pradeti vykdyti'),
(5, 'nedirba', 'vair', 'Valdemar', 'free', 'free', '', '', '2', '2', '', 0, 3600, 'Pradeti vykdyti', 3600, 'Pradeti vykdyti'),
(6, 'nedirba', 'mech', 'Juozas', 'free', 'free', '', '', '2', '2', '', 0, 3600, 'Pradeti vykdyti', 3600, 'Pradeti vykdyti'),
(7, 'nedirba', 'mech', 'Ramūnas', 'free', 'free', '', '', '2', '2', '', 0, 3600, 'Pradeti vykdyti', 3600, 'Pradeti vykdyti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vairuotojai_uzim`
--
ALTER TABLE `vairuotojai_uzim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vairuotojai_uzim`
--
ALTER TABLE `vairuotojai_uzim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
