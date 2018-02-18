-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 18, 2018 at 01:58 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otinsurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(2, 'Nebojsa Martinovic', 'martinov@gmail.com', '$2y$10$yBDPpEpxNZRZp/LPdaSl7uXBjgFWvK45W98dnDJmAlxPtA4DR/EXy', '2018-02-15 12:12:52'),
(3, 'Milosav', 'milosav@gmail.com', '$2y$10$/WX.ez5zrp45BFbPPlEpnube87DJOP/3.D6FB6kNcI2t15ngS2u/y', '2018-02-16 15:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `policy` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `fullname`, `customer_id`, `policy`, `firstname`, `lastname`, `dateofbirth`, `phone`, `from_date`, `to_date`) VALUES
(48, 'Jovana Kostic', 2, 'Individual', '', '', '', '099/1234-345', '2018-02-19', '2018-03-01'),
(49, 'Ivana Rankovic', 2, 'Group', 'Jovan', 'Stepanovic', '09/10/1975', '099/2345-653', '2018-02-21', '2018-03-03'),
(50, 'Dusan Jankovic', 2, 'Group', 'Marko / Jovan', 'Milicevic / Somborski', '07/12/1976 / 08/08/1980', '099/6342-256', '2018-02-24', '2018-03-06'),
(51, 'Darko Bajzek', 2, 'Group', 'Marija / Dragana / Milijana', 'Micic / Cvetkic / Milijankovic', '11/25/1986 / 01/15/1977 / 07/04/1982', '099/6253-542', '2018-02-28', '2018-03-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
