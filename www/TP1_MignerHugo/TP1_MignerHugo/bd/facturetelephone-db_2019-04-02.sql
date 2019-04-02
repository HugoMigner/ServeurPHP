-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2019 at 05:21 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facturetelephone`
--

DROP TABLE IF EXISTS coderabais;
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS compte;
DROP TABLE IF EXISTS users;

-- --------------------------------------------------------

--
-- Table structure for table `coderabais`
--

CREATE TABLE `coderabais` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pourcentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coderabais`
--

INSERT INTO `coderabais` (`id`, `transaction_id`, `nom`, `pourcentage`) VALUES
(1, 1, 'Rabais pour les nouveaux clients', 10),
(2, 2, 'Rabais avec un coupon dans un magazine', 15),
(3, 3, 'Rabais de la circulaire de la semaine', 20);

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nom_compte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`id`, `users_id`, `nom_compte`, `balance`) VALUES
(1, 1, 'GeraldCompte', 1500),
(2, 2, 'PaulineCompte', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `compte_id` int(11) NOT NULL,
  `montant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `retard` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `compte_id`, `montant`, `commentaire`, `retard`) VALUES
(1, 1, '200', 'Facture mensuelle de Gerald', 'Non'),
(2, 2, '300', 'Facture mensuelle de Pauline', 'Non'),
(3, 2, '400', 'Achat d\'un téléphone', 'Oui');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modele` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `adresse`, `num_tel`, `email`, `modele`) VALUES
(1, 'Gerald', '1799 Boul. Bellerose', '450-999-9999', 'gerald@gmail.com', 'Panasonic'),
(2, 'Pauline', '288 Rue Stalagmite', '514-778-7488', 'pauline@gmail.com', 'V-Tech');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coderabais`
--
ALTER TABLE `coderabais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compte_id` (`compte_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coderabais`
--
ALTER TABLE `coderabais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `coderabais`
--
ALTER TABLE `coderabais`
  ADD CONSTRAINT `coderabais_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`compte_id`) REFERENCES `compte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
