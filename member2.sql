-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2026 at 12:42 AM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acmjustin`
--

-- --------------------------------------------------------

--
-- Table structure for table `member2`
--

CREATE TABLE `member2` (
  `MemberNo` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Deposit` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member2`
--

INSERT INTO `member2` (`MemberNo`, `FirstName`, `LastName`, `Deposit`) VALUES
(10000, 'Ray', 'Massey', 1000),
(10001, 'Richard', 'Gay', 5000),
(10003, 'Selva', 'Mohan', 500),
(10004, 'Nate', 'Williams', 200),
(10005, 'John', 'Smith', 1200),
(10006, 'Samantha', 'Jones', 3000),
(10008, 'Justin', 'Martin', 1),
(10010, 'Das', 'Mary', 5000),
(10014, 'test', 'tester', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member2`
--
ALTER TABLE `member2`
  ADD PRIMARY KEY (`MemberNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member2`
--
ALTER TABLE `member2`
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`MemberNo`) REFERENCES `memberpw2` (`MemberNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
