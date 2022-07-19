-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 02:14 AM
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
-- Database: `salesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_table`
--

CREATE TABLE `sales_table` (
  `orderNo` int(100) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `resaddress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_table`
--

INSERT INTO `sales_table` (`orderNo`, `date`, `fname`, `lname`, `resaddress`, `city`, `contact`, `total`) VALUES
(808, '04/08/22', 'Carlo', 'Ciasico', 'Sample Address', 'Sample City', 123456789, 100.00),
(331, '04/08/22', 'Kosaki', 'Onodera', 'sample address', 'sample city', 123456789, 200.00),
(870, '04/08/22', 'shin', 'nouzen', 'sample address', 'sample city', 123, 250.00),
(924, '04/08/22', 'Chitoge', 'Kirisaki', 'Sample address', 'Sample city', 123456789, 500.00),
(951, '05/07/22', 'John', 'Doe', 'sample doe', 'doe city', 987654321, 205.00),
(415, '05/07/22', 'Yuiga', 'Nariyuki', 'bokutachi wa', 'bengkyou city', 2147483647, 170.00),
(545, '05/07/22', 'Ogata', 'Nariyuki', 'cybergreen subd mac street', 'General trias', 2147483647, 291.05),
(841, '05/18/22', 'Russel', 'Guiterrez', 'city homes', 'cavite', 2147483647, 205.90),
(286, '05/18/22', 'Angel Bryan', 'Reyes', 'nasugbu', 'batangas', 2147483647, 386.85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_table`
--
ALTER TABLE `sales_table`
  ADD PRIMARY KEY (`orderNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_table`
--
ALTER TABLE `sales_table`
  MODIFY `orderNo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
