-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 07:09 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_ID` int(11) NOT NULL,
  `B_from` int(11) NOT NULL,
  `B_to` int(11) NOT NULL,
  `B_status` varchar(100) NOT NULL,
  `B_user` int(11) NOT NULL,
  `B_containerID` int(11) NOT NULL,
  `B_updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `B_createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`B_ID`, `B_from`, `B_to`, `B_status`, `B_user`, `B_containerID`, `B_updatedAt`, `B_createdAt`) VALUES
(9, 2, 3, 'D', 3, 4, '2018-12-12 06:07:28', '2018-12-10 16:05:49'),
(11, 3, 2, 'D', 2, 2, '2018-12-12 06:07:31', '2018-12-10 16:05:49'),
(12, 2, 3, 'L', 8, 2, '2018-12-12 06:08:09', '2018-12-10 16:05:49'),
(13, 2, 3, 'L', 2, 2, '2018-12-12 06:08:17', '2018-12-10 16:04:19'),
(14, 3, 2, 'R', 7, 3, '2018-12-12 06:08:20', '2018-12-10 15:38:49'),
(15, 3, 2, 'L', 6, 3, '2018-12-12 06:08:22', '2018-12-10 15:42:52'),
(16, 2, 3, 'L', 4, 2, '2018-12-12 06:08:32', '2018-12-10 15:55:57'),
(17, 3, 2, 'L', 2, 3, '2018-12-10 16:58:10', '2018-12-10 16:14:04'),
(18, 2, 3, 'L', 1, 2, '0000-00-00 00:00:00', '2018-12-10 16:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CT_ID` int(11) NOT NULL,
  `CT_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CT_ID`, `CT_Name`) VALUES
(2, 'BTM'),
(3, 'KTM');

-- --------------------------------------------------------

--
-- Table structure for table `container`
--

CREATE TABLE `container` (
  `Con_ID` int(11) NOT NULL,
  `Con_Name` varchar(100) NOT NULL,
  `Con_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`Con_ID`, `Con_Name`, `Con_status`) VALUES
(2, 'ML002', 'Avai'),
(3, 'ML003', 'Avai'),
(4, 'ML004', 'Uavai'),
(5, 'ML005', 'Uavai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_ID` int(20) NOT NULL,
  `U_fname` varchar(255) NOT NULL,
  `U_name` varchar(100) NOT NULL,
  `U_pwd` varchar(100) NOT NULL,
  `U_type` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `U_fname`, `U_name`, `U_pwd`, `U_type`) VALUES
(1, 'Amrit Rajbanshi', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Ashok Rajbanshi', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User'),
(3, 'hari karki', 'hari', '827ccb0eea8a706c4c34a16891f84e7b', 'User'),
(4, 'ragu baral', 'ragu', '827ccb0eea8a706c4c34a16891f84e7b', 'User'),
(5, 'sita', 'sita', '827ccb0eea8a706c4c34a16891f84e7b', 'User'),
(6, 'gota', 'gota', '827ccb0eea8a706c4c34a16891f84e7b', 'User'),
(7, 'reta thapa', 'reeta', '827ccb0eea8a706c4c34a16891f84e7b', 'User'),
(8, 'kiku Shah', 'Kiku', 'e10adc3949ba59abbe56e057f20f883e', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `ContainerID` (`B_containerID`),
  ADD KEY `B_from` (`B_from`),
  ADD KEY `B_to` (`B_to`),
  ADD KEY `B_user` (`B_user`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CT_ID`);

--
-- Indexes for table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`Con_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `Con_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`B_from`) REFERENCES `city` (`CT_ID`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`B_to`) REFERENCES `city` (`CT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
