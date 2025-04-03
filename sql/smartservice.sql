-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 11:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `password`) VALUES
(1001, 'adminpass');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `Comments` text NOT NULL,
  `Rating` int(1) NOT NULL,
  `Request_ID` int(10) NOT NULL,
  `User_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE `service_request` (
  `Request_ID` int(10) NOT NULL,
  `Description` text NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Status` enum('Pending','In progress','Completed','') NOT NULL DEFAULT 'Pending',
  `User_ID` int(10) NOT NULL,
  `Techinician_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`Request_ID`, `Description`, `Location`, `Status`, `User_ID`, `Techinician_ID`) VALUES
(9, 'wqqw', '12121', 'Pending', 1, NULL),
(10, 'ytyu', 'alappuzha', 'Pending', 1, NULL),
(11, 'yuwdbh', 'fjiwne', 'Pending', 1, NULL),
(12, 'werr', 'alappuzha', 'Pending', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `Techinician_ID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Skills` text NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Phone_No` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Availability_Status` tinyint(1) NOT NULL DEFAULT 0,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`Techinician_ID`, `Name`, `Skills`, `Location`, `Phone_No`, `Email`, `Availability_Status`, `Password`) VALUES
(2, 'deva', 'electronics repair', 'ss hostel, college road, allapuzha - 676501', '1234567890', 'deva@gmail.com', 0, '12345'),
(8, 'deva', 'electronics repair', 'ss hostel, college road, allapuzha - 676501', '1234567891', 'devaa@gmail.com', 0, '7894');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone_NO` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `Name`, `Phone_NO`, `Email`, `Address`, `Password`) VALUES
(1, 'Eesa M A', '9072341909', 'eesama30april04@gmail.com', '679552', '7894'),
(2, 'donish', '1234567890', 'donish@gmail.com', 'nandhanam hostel, college road, allapuzha - 676501', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`),
  ADD KEY `fk_feedback_request` (`Request_ID`),
  ADD KEY `fk_feedback_user` (`User_ID`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`Request_ID`),
  ADD KEY `fk_user` (`User_ID`),
  ADD KEY `fk_technician` (`Techinician_ID`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`Techinician_ID`),
  ADD UNIQUE KEY `Phone_No` (`Phone_No`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `Phone_NO` (`Phone_NO`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `Request_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `Techinician_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_request` FOREIGN KEY (`Request_ID`) REFERENCES `service_request` (`Request_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_feedback_user` FOREIGN KEY (`User_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE;

--
-- Constraints for table `service_request`
--
ALTER TABLE `service_request`
  ADD CONSTRAINT `fk_technician` FOREIGN KEY (`Techinician_ID`) REFERENCES `technician` (`Techinician_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`User_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
