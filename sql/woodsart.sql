-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2017 at 09:07 PM
-- Server version: 10.1.22-MariaDB-
-- PHP Version: 5.6.17-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `woodsart`
--

-- --------------------------------------------------------

--
-- Table structure for table `BranchItem`
--

CREATE TABLE `BranchItem` (
  `BranchID` int(10) NOT NULL,
  `ItemID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` int(8) NOT NULL,
  `CFName` varchar(15) DEFAULT NULL,
  `CLName` varchar(15) DEFAULT NULL,
  `CEmail` varchar(25) DEFAULT NULL,
  `CAddress1` varchar(25) DEFAULT NULL,
  `CAddress2` varchar(25) DEFAULT NULL,
  `CAddress3` varchar(25) DEFAULT NULL,
  `BranchID` int(1) NOT NULL,
  `CTPno` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `CFName`, `CLName`, `CEmail`, `CAddress1`, `CAddress2`, `CAddress3`, `BranchID`, `CTPno`) VALUES
(1, 'Danushka', 'Herath', 'Danushkaherath96@gmail.co', 'No 06', 'Colombo Road', 'Kurunegala', 1, 717705526),
(2, 'Kamal', 'Perera', 'kamalperera87@gmail.com', 'No 13/A', 'New Town', 'Anuradhapura', 2, 715895658),
(3, 'Nuwan', 'Kalpana', 'nuwankalpana92@gmail.com', 'No 25/D', 'New Road', 'Trinco', 3, 786598254),
(5, 'Ruwan', 'li', '', '', '', '', 1, 0),
(6, 'Ruwan', 'Liyanage', 'ruwanliyanage@gmail.com', 'galle', '', '', 1, 772308519);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` varchar(5) NOT NULL,
  `ItemName` varchar(50) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `Quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `ItemName`, `price`, `type`, `Quantity`) VALUES
('1', 'Damro Chair', 750.00, 'chair', 150),
('2568', 'Computer Table', 1800.00, 'Table', 0),
('9876', 'Office Cupboard', 9500.00, 'Cupboard', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(8) NOT NULL,
  `CID` int(10) DEFAULT NULL,
  `ItemID` varchar(5) DEFAULT NULL,
  `BranchID` int(10) NOT NULL,
  `Quantity` int(6) DEFAULT NULL,
  `Dateissue` date DEFAULT NULL,
  `DeliverDate` date NOT NULL,
  `RecivedDate` date NOT NULL,
  `Statues` varchar(15) NOT NULL DEFAULT 'undelivered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`OrderID`, `CID`, `ItemID`, `BranchID`, `Quantity`, `Dateissue`, `DeliverDate`, `RecivedDate`, `Statues`) VALUES
(1, 1, '1', 1, 50, '2017-05-26', '2017-06-24', '0000-00-00', 'Undelivered'),
(2, 1, '1', 0, 50, '2017-05-10', '2017-05-14', '2017-05-15', 'delivered'),
(4, 3, '2568', 1, 50, '2017-05-27', '2017-06-26', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `showrooms`
--

CREATE TABLE `showrooms` (
  `BranchID` int(10) NOT NULL,
  `District` varchar(20) DEFAULT NULL,
  `Address1` varchar(20) DEFAULT NULL,
  `Address2` varchar(20) DEFAULT NULL,
  `Address3` varchar(20) DEFAULT NULL,
  `PhoneNo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showrooms`
--

INSERT INTO `showrooms` (`BranchID`, `District`, `Address1`, `Address2`, `Address3`, `PhoneNo`) VALUES
(0, 'Null', 'Null', 'Null', 'Null', 0),
(1, 'Colombo', 'No 07', 'Main Road', 'Moratuwa', 115898757),
(2, 'Colombo', 'No 17/A', 'Kaduwela Road', 'Battramulla', 118759865),
(3, 'Kurunegla', 'No 07', 'Colombo Road', 'Wehera', 378549685),
(4, 'Mathara', 'No 06', 'Main Road', 'Mathara', 418795265),
(5, 'Anuradhapura', 'No 4', 'New Town', 'Anurashapura', 815795864);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ulevel` int(2) NOT NULL,
  `showroom` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `ulevel`, `showroom`) VALUES
('Admin', 'admin', 1, 1),
('operator1', 'operator', 2, 1),
('operator2', 'operator', 2, 2),
('stock', 'stock', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BranchItem`
--
ALTER TABLE `BranchItem`
  ADD PRIMARY KEY (`BranchID`,`ItemID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `FK_showroom` (`BranchID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FK_item` (`ItemID`),
  ADD KEY `FK_CID` (`CID`),
  ADD KEY `FK_branch2` (`BranchID`);

--
-- Indexes for table `showrooms`
--
ALTER TABLE `showrooms`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FK_branch` (`showroom`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OrderID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `showrooms`
--
ALTER TABLE `showrooms`
  MODIFY `BranchID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `BranchItem`
--
ALTER TABLE `BranchItem`
  ADD CONSTRAINT `BranchItem_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_showroom` FOREIGN KEY (`BranchID`) REFERENCES `showrooms` (`BranchID`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `FK_CID` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`),
  ADD CONSTRAINT `FK_branch2` FOREIGN KEY (`BranchID`) REFERENCES `showrooms` (`BranchID`),
  ADD CONSTRAINT `FK_item` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_branch` FOREIGN KEY (`showroom`) REFERENCES `showrooms` (`BranchID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
