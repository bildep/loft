-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2019 at 05:20 PM
-- Server version: 5.6.38-log
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burger`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `address` text NOT NULL,
  `otherinfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `otherinfo`) VALUES
(2, 1, 'ул.ул. Воровского, д. 130 кв.6 д. 21 корп. 21 кв.21 эт.21', 'укцу'),
(3, 1, 'ул.ул. Воровского, д. 130 кв.6 д. 21 корп. 21 кв.21 эт.21', 'erqw'),
(4, 1, 'ул.ул. Воровского, д. 130 кв.6 д. 21 корп. 21 кв.21 эт.21', 'fas'),
(5, 1, 'ул.ул. Воровского, д. 130 кв.6 д. 21 корп. 21 кв.21 эт.21', 'qew'),
(6, 1, 'ул.ул. Воровского, д. 130 кв.6 д. 21 корп. 21 кв.21 эт.21', ''),
(7, 1, 'ул.ул. Воровского, д. 130 кв.6 д. 21 корп. 21 кв.6 эт.21', ''),
(8, 1, 'ул.ул. Воровского, д. 130 кв.6 д. 21 корп. 2 кв.6 эт.21', 'dfasfdas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Александр Подгорных', 'bildep@gmail.com', '+7 (895) 368 13 31'),
(2, 'Александр Подгорных', 'bildep2@gmail.com', '+7 (895) 368 13 31'),
(3, 'Александр Подгорных', 'bildep3@gmail.com', '+7 (895) 368 13 31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
