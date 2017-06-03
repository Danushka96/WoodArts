-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2017 at 04:23 PM
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
(3, 'Nuwan', 'Kalpana', 'nuwankalpana92@gmail.com', 'No 251/D', 'New Road', 'Trinco', 3, 786598254),
(6, 'Ruwan', 'Liyanage', 'ruwanliyanage@gmail.com', 'galle', '', '', 1, 772308519),
(7, 'Nimal', 'Ranathunga', 'Nimalranathunga@gmail.com', 'No 08', 'Kadana Road', 'Ragama', 1, 786598254),
(8, 'Udaya', 'Ranathunga', 'udayaranthunga@gmail.com', 'No 08', 'Kurunegala Road', 'Pothuhera', 1, 759865985),
(9, 'Krishantha', 'Yapa', 'krishanthayapa@gmail.com', 'No C', 'New Town', 'Anuradhapura', 1, 772308519),
(10, 'Nishan', 'Pathirana', 'nishanpathirana@gmail.com', 'School Junction', 'Pothuwela Road', 'Kadana', 1, 772308519),
(11, 'Nishan', 'Pathirana', 'nishanpathirana@gmail.com', 'School Junction', 'Pothuwela Road', 'Kadana', 1, 772308519),
(12, 'aaaa', 'aaa', 'aa@gmail.com', 'aa', 'aaa', 'aaa', 1, 715687948),
(13, 'bb', 'bb', 'bb@gmail.com', 'bbb', 'bb', 'bb', 1, 786598254);

-- --------------------------------------------------------

--
-- Stand-in structure for view `factory_view_orders`
-- (See below for the actual view)
--
CREATE TABLE `factory_view_orders` (
`OrderID` int(8)
,`ItemID` varchar(5)
,`ItemName` varchar(50)
,`CAddress1` varchar(25)
,`CAddress2` varchar(25)
,`CAddress3` varchar(25)
,`DeliverDate` date
);

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
('1', 'Damro Chair', 755.00, 'chair', 175),
('2568', 'Computer Table', 1800.00, 'Table', 140),
('9876', 'Office Cupboard', 9500.00, 'Cupboard', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `oper_view_cus`
-- (See below for the actual view)
--
CREATE TABLE `oper_view_cus` (
`CFName` varchar(15)
,`CLName` varchar(15)
,`CEmail` varchar(25)
,`CAddress1` varchar(25)
,`CAddress2` varchar(25)
,`CAddress3` varchar(25)
,`CTPno` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `oper_view_items`
-- (See below for the actual view)
--
CREATE TABLE `oper_view_items` (
`ItemID` varchar(5)
,`ItemName` varchar(50)
,`type` varchar(15)
,`price` decimal(6,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `oper_view_order`
-- (See below for the actual view)
--
CREATE TABLE `oper_view_order` (
`CFName` varchar(15)
,`CLName` varchar(15)
,`ItemName` varchar(50)
,`Quantity` int(6)
,`Dateissue` date
,`DeliverDate` date
);

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
  `type` varchar(10) NOT NULL,
  `Statues` varchar(15) NOT NULL DEFAULT 'undelivered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`OrderID`, `CID`, `ItemID`, `BranchID`, `Quantity`, `Dateissue`, `DeliverDate`, `RecivedDate`, `type`, `Statues`) VALUES
(1, 1, '1', 1, 50, '2017-05-26', '2017-06-24', '2017-05-28', 'Factory', 'Delivered'),
(2, 1, '1', 0, 50, '2017-05-10', '2017-05-14', '2017-05-15', 'Stock', 'delivered'),
(4, 3, '2568', 1, 50, '2017-05-27', '2017-06-26', '2017-05-28', 'Factory', 'Delivered'),
(5, 9, '9876', 1, 50, '2017-06-03', '2017-07-03', '0000-00-00', 'Factory', 'undelivered'),
(7, 6, '1', 1, 25, '2017-06-03', '2017-06-06', '0000-00-00', 'Stock', 'undelivered');

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
-- Stand-in structure for view `stock_view_items`
-- (See below for the actual view)
--
CREATE TABLE `stock_view_items` (
`ItemID` varchar(5)
,`ItemName` varchar(50)
,`Quantity` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stock_view_order`
-- (See below for the actual view)
--
CREATE TABLE `stock_view_order` (
`OrderID` int(8)
,`ItemID` varchar(5)
,`ItemName` varchar(50)
,`CAddress1` varchar(25)
,`CAddress2` varchar(25)
,`CAddress3` varchar(25)
,`DeliverDate` date
);

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
('stock', 'stock', 3, 0),
('stock1', 'd41d8cd98f00b204e9800998ecf8427e', 3, 0);

-- --------------------------------------------------------

--
-- Structure for view `factory_view_orders`
--
DROP TABLE IF EXISTS `factory_view_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `factory_view_orders`  AS  select `Orders`.`OrderID` AS `OrderID`,`items`.`ItemID` AS `ItemID`,`items`.`ItemName` AS `ItemName`,`customer`.`CAddress1` AS `CAddress1`,`customer`.`CAddress2` AS `CAddress2`,`customer`.`CAddress3` AS `CAddress3`,`Orders`.`DeliverDate` AS `DeliverDate` from ((`customer` join `items`) join `Orders`) where ((`customer`.`CID` = `Orders`.`CID`) and (`items`.`ItemID` = `Orders`.`ItemID`) and (`Orders`.`Statues` like '%undelivered%') and (`Orders`.`type` like '%factory%')) ;

-- --------------------------------------------------------

--
-- Structure for view `oper_view_cus`
--
DROP TABLE IF EXISTS `oper_view_cus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `oper_view_cus`  AS  select `customer`.`CFName` AS `CFName`,`customer`.`CLName` AS `CLName`,`customer`.`CEmail` AS `CEmail`,`customer`.`CAddress1` AS `CAddress1`,`customer`.`CAddress2` AS `CAddress2`,`customer`.`CAddress3` AS `CAddress3`,`customer`.`CTPno` AS `CTPno` from `customer` ;

-- --------------------------------------------------------

--
-- Structure for view `oper_view_items`
--
DROP TABLE IF EXISTS `oper_view_items`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `oper_view_items`  AS  select `items`.`ItemID` AS `ItemID`,`items`.`ItemName` AS `ItemName`,`items`.`type` AS `type`,`items`.`price` AS `price` from `items` ;

-- --------------------------------------------------------

--
-- Structure for view `oper_view_order`
--
DROP TABLE IF EXISTS `oper_view_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `oper_view_order`  AS  select `customer`.`CFName` AS `CFName`,`customer`.`CLName` AS `CLName`,`items`.`ItemName` AS `ItemName`,`Orders`.`Quantity` AS `Quantity`,`Orders`.`Dateissue` AS `Dateissue`,`Orders`.`DeliverDate` AS `DeliverDate` from ((`customer` join `items`) join `Orders`) where ((`customer`.`CID` = `Orders`.`CID`) and (`items`.`ItemID` = `Orders`.`OrderID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `stock_view_items`
--
DROP TABLE IF EXISTS `stock_view_items`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock_view_items`  AS  select `items`.`ItemID` AS `ItemID`,`items`.`ItemName` AS `ItemName`,`items`.`Quantity` AS `Quantity` from `items` ;

-- --------------------------------------------------------

--
-- Structure for view `stock_view_order`
--
DROP TABLE IF EXISTS `stock_view_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock_view_order`  AS  select `Orders`.`OrderID` AS `OrderID`,`items`.`ItemID` AS `ItemID`,`items`.`ItemName` AS `ItemName`,`customer`.`CAddress1` AS `CAddress1`,`customer`.`CAddress2` AS `CAddress2`,`customer`.`CAddress3` AS `CAddress3`,`Orders`.`DeliverDate` AS `DeliverDate` from ((`customer` join `items`) join `Orders`) where ((`customer`.`CID` = `Orders`.`CID`) and (`items`.`ItemID` = `Orders`.`ItemID`) and (`Orders`.`Statues` like '%delivered%') and (`Orders`.`type` like '%stock%')) ;

--
-- Indexes for dumped tables
--

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
  MODIFY `CID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OrderID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `showrooms`
--
ALTER TABLE `showrooms`
  MODIFY `BranchID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

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
