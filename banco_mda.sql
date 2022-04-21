-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 02:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuenta`
--

CREATE TABLE `cuenta` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Usuarios` text COLLATE utf8_spanish_ci NOT NULL,
  `IBAN` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transferencia`
--

CREATE TABLE `transferencia` (
  `id` int(10) UNSIGNED NOT NULL,
  `cantidad` double NOT NULL,
  `emisor` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_emisor` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `receptor` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `concepto` varchar(64) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Nombre` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `DNI` varchar(24) NOT NULL,
  `EMAIL` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Teléfono` int(11) NOT NULL,
  `Domicilio` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `ZIP` int(11) NOT NULL,
  `Contraseña` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transferencia`
--
ALTER TABLE `transferencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
