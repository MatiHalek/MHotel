-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 06:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `people` tinyint(4) NOT NULL,
  `room` tinyint(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `prepayment` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `date_start`, `date_end`, `people`, `room`, `name`, `surname`, `phone`, `prepayment`) VALUES
(1, '2023-01-15', '2023-01-17', 3, 2, 'Jan', 'Kowalski', '123456789', '500.00'),
(2, '2023-01-15', '2023-01-17', 3, 1, 'Jan', 'Kowalski', '123456789', '500.00'),
(3, '2023-01-21', '2023-01-22', 2, 2, 'Zofia', 'Kowalska', '+48123456789', '100.00'),
(4, '2023-01-22', '2023-01-22', 1, 6, 'Mateusz', 'Marmuźniak', '+48123456789', '1250.00'),
(5, '2023-01-28', '2023-01-29', 2, 5, 'Paweł', 'Nowak', '+48555666789', '399.00'),
(6, '2023-06-24', '2023-06-26', 3, 2, 'Jan', 'Kowalski', '+48123456789', '500.00'),
(7, '2023-08-28', '2023-08-30', 3, 2, 'Jan', 'Kowalski', '+48123456789', '500.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
