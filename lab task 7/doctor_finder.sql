-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 06:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_register`
--

CREATE TABLE `doctor_register` (
  `dname` varchar(25) NOT NULL,
  `demail` varchar(50) NOT NULL,
  `dmobile` int(15) NOT NULL,
  `speacilist` varchar(50) NOT NULL,
  `dtype` varchar(25) NOT NULL,
  `password` int(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `image`) VALUES
(6, 'Al Bakin Tushar', 'tushar@gmail.com', '01956038514', '1253', 'assets/img/user/tushar.jpg'),
(7, 'Dua', 'dua@gmail.com', '01956038514', '123', 'assets/img/user/dua.jpg'),
(8, 'Tomal', 'tomal@gmail.com', '01956038514', '123', 'assets/img/user/93702244_26996'),
(9, 'ss', 'adity7898@gmail.com', '222222222222222', '222', 'assets/img/user/aiub_logo_92x9'),
(10, 'ss', 'adity7898@gmail.com', '222222222222222', '222', 'assets/img/user/aiub_logo_92x9'),
(11, 'new', 'new@gmail.com', '015554865658', '123', 'assets/img/user/aiub_logo_92x9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_register`
--
ALTER TABLE `doctor_register`
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
-- AUTO_INCREMENT for table `doctor_register`
--
ALTER TABLE `doctor_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
