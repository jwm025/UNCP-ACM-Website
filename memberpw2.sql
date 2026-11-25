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
-- Table structure for table `memberpw2`
--

CREATE TABLE `memberpw2` (
  `UserName` varchar(50) NOT NULL,
  `PassWord` char(64) NOT NULL,
  `eMail` varchar(50) DEFAULT NULL,
  `MemberNo` int(11) NOT NULL,
  `Salt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberpw2`
--

INSERT INTO `memberpw2` (`UserName`, `PassWord`, `eMail`, `MemberNo`, `Salt`) VALUES
('Ray', '248510136410798c784ba702df249756ad286be4', 'ray@massey.edu', 10000, 'd0d4426fadeebdf235c351e6af96c7f9'),
('Richard', '71a3e4b18e6b3c1fc6dbf9f7af6040bc2d8266d7', NULL, 10001, '7c1ddb7ee4849217c00bf9525940a60b'),
('Selva', '2d7127761d364b67f0268872291d53c0d957b258', NULL, 10003, 'c5ba17f8b84c80b73096fb57b7849885'),
('Nate', '922371ecbb3c293f6cd5473d955dcdafb122f0e2', 'nate@williams.com', 10004, '02685ce6b503a69df9d35d9d19f24da7'),
('John', 'e3a579ba2c5e9fc1b5861b649d8a88b626a55d7a', 'john@smith.com', 10005, '266f982248e4d9b375c6d3ef6dd5691b'),
('Samantha', 'a64431388c02ce7fa2ae6a622befa56cf7f21c95', NULL, 10006, '318b271e68e8b398ccfde728424a24af'),
('Justin', 'dddd5d7b474d2c78ebbb833789c4bfd721edf4bf', 'mjw@bravemail.uncp.edu', 10008, '248e6b30deb84353bb6995216ac8a6e1'),
('das', 'b54076ac0f4230f9d2b9f1c8d328bfa82e1c89e9', 'mary@bravemail.uncp.edu', 10010, '0eb75a79d885b756bf7fb762710aba5d'),
('test', 'ac1cb5e65cc742361b35de61372d0e7d6a2de1eb', 'test@bravemail.uncp.edu', 10014, '7111794a153834c862ad95bc7538a21c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memberpw2`
--
ALTER TABLE `memberpw2`
  ADD PRIMARY KEY (`MemberNo`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `memberpw2`
--
ALTER TABLE `memberpw2`
  MODIFY `MemberNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10015;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
