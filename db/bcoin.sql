-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 11:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `activites`
--

CREATE TABLE `activites` (
  `id` int(11) NOT NULL,
  `server_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `server_id` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dash`
--

CREATE TABLE `dash` (
  `id` int(11) NOT NULL,
  `server_id` varchar(255) NOT NULL,
  `running` varchar(255) NOT NULL DEFAULT 'Low Capacity',
  `status` varchar(255) NOT NULL DEFAULT 'Offline',
  `hashrate` varchar(255) NOT NULL DEFAULT '0 Gh/s',
  `mining_bal` decimal(19,2) NOT NULL DEFAULT 0.00,
  `available_bal` decimal(19,2) NOT NULL DEFAULT 0.00,
  `earning` decimal(19,2) NOT NULL DEFAULT 0.00,
  `ledger_balance` decimal(19,2) NOT NULL DEFAULT 0.00,
  `mining_bal2` decimal(19,2) NOT NULL DEFAULT 0.00,
  `available_btc` int(255) NOT NULL DEFAULT 0,
  `earning_btc` int(255) NOT NULL DEFAULT 0,
  `ledger_btc` int(255) NOT NULL DEFAULT 0,
  `price` decimal(18,2) NOT NULL DEFAULT 24343.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dash`
--

INSERT INTO `dash` (`id`, `server_id`, `running`, `status`, `hashrate`, `mining_bal`, `available_bal`, `earning`, `ledger_balance`, `mining_bal2`, `available_btc`, `earning_btc`, `ledger_btc`, `price`) VALUES
(2, '1608202020', 'Low Capacity', 'Offline', '85 Gh/s', '242479550.00', '399995000.00', '399997000.00', '731441010.00', '84454000.00', 0, 0, 0, '19109.55'),
(14, '121212', 'Low Capacity', 'Offline', '', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `linkedacc`
--

CREATE TABLE `linkedacc` (
  `id` int(11) NOT NULL,
  `server_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `card_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `btcRate` double(19,2) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `server_id` varchar(255) NOT NULL,
  `login_id` varchar(255) NOT NULL DEFAULT 'xxxxxxxxx'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `email`, `username`, `password`, `server_id`, `login_id`) VALUES
(11, 'pvsdevro@gmail.com', 'Deen Os', '$2y$12$29cUzarBae7XsGpF.YiM9ul2LNYD7GXW/WQi7QqIxHTRxJ1gf3/.y', '1608202020', '161600'),
(20, 'brad@gmail.com', 'brad', '$2y$12$dCbL7lfD0ZTXEhR5XlkYledNZ4ecmyEXfSHUnuIpuaSTtdIll9c/.', '', 'xxxxxxxxx'),
(34, 'phaisalsaif@gmail.com', 'dekin', '$2y$12$Bv6R.GEWuhohflta7fG1juMCTHkR71Z6iPmwVF/U99XISSN2SbODK', '121212', '331100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `server_id` (`server_id`);

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dash`
--
ALTER TABLE `dash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `server_id` (`server_id`);

--
-- Indexes for table `linkedacc`
--
ALTER TABLE `linkedacc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `server_id` (`server_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`,`server_id`),
  ADD UNIQUE KEY `server_id` (`server_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dash`
--
ALTER TABLE `dash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `linkedacc`
--
ALTER TABLE `linkedacc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activites`
--
ALTER TABLE `activites`
  ADD CONSTRAINT `activites_ibfk_1` FOREIGN KEY (`server_id`) REFERENCES `signup` (`server_id`);

--
-- Constraints for table `dash`
--
ALTER TABLE `dash`
  ADD CONSTRAINT `dash_ibfk_1` FOREIGN KEY (`server_id`) REFERENCES `signup` (`server_id`);

--
-- Constraints for table `linkedacc`
--
ALTER TABLE `linkedacc`
  ADD CONSTRAINT `linkedacc_ibfk_1` FOREIGN KEY (`server_id`) REFERENCES `signup` (`server_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
