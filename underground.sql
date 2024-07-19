-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 06:16 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `underground`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(11) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `abonnement` varchar(50) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abonnements`
--

INSERT INTO `abonnements` (`id`, `cin`, `nom`, `prenom`, `telephone`, `abonnement`, `prix`, `created_at`) VALUES
(42, '14773651', 'mouka', 'hello', '45648', '3mois', '1800.00', '2024-07-05 23:54:20'),
(6, '12344', 'malek', 'Malek', '29083307', '3mois', '450.00', '2024-07-05 03:46:42'),
(140, '14768365', 'taleb', 'mohamed aziz', '24509033', '1mois', '150.00', '2024-07-09 04:12:37'),
(45, '12345678', 'Gharbi', 'Malek', '29083307', '6mois', '900.00', '2024-07-05 23:59:40'),
(40, '12345678', 'mouka', 'hello', '45', '6mois', '900.00', '2024-07-05 23:44:47'),
(49, '8888888', 'ffreee', 'ffffffff', 'fffff', 'autre', '55.00', '2024-07-06 00:52:24'),
(61, '12345678', 'ffreee', 'ffffffff', 'fffff', '1mois', '150.00', '2024-06-06 02:11:08'),
(62, '12345678', 'ffreee', 'ffffffff', 'fffff', 'autre', '5.00', '2024-07-06 02:12:27'),
(56, '8888888', 'ffreee', 'ffffffff', 'fffff', '6mois', '900.00', '2024-07-06 01:46:35'),
(138, '123456782165', 'yassine', 'ben amor', '2902501585', 'autre', '80000.00', '2024-07-06 12:23:07'),
(80, '12345678', 'ffreee', 'ffffffff', 'fffff', '6mois', '900.00', '2024-07-06 02:41:39'),
(112, '12345678', 'ffreee', 'ffffffff', 'fffff', '3mois', '450.00', '2024-07-06 03:12:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
