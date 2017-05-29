# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 28. May 2017 17:34 IST
# Hostname: localhost
# Database: `woodsart`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `BranchItem`
# --------------------------------------------------------


#
# Delete any existing table `BranchItem`
#

DROP TABLE IF EXISTS `BranchItem`;


#
# Table structure of table `BranchItem`
#

CREATE TABLE `BranchItem` (
  `BranchID` int(10) NOT NULL,
  `ItemID` varchar(5) NOT NULL,
  PRIMARY KEY (`BranchID`,`ItemID`),
  KEY `ItemID` (`ItemID`),
  CONSTRAINT `BranchItem_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

#
# Data contents of table BranchItem (0 records)
#

#
# End of data contents of table BranchItem
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 28. May 2017 17:34 IST
# Hostname: localhost
# Database: `woodsart`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `BranchItem`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `Orders`
# --------------------------------------------------------


#
# Delete any existing table `Orders`
#

DROP TABLE IF EXISTS `Orders`;


#
# Table structure of table `Orders`
#

CREATE TABLE `Orders` (
  `OrderID` int(8) NOT NULL AUTO_INCREMENT,
  `CID` int(10) DEFAULT NULL,
  `ItemID` varchar(5) DEFAULT NULL,
  `BranchID` int(10) NOT NULL,
  `Quantity` int(6) DEFAULT NULL,
  `Dateissue` date DEFAULT NULL,
  `DeliverDate` date NOT NULL,
  `RecivedDate` date NOT NULL,
  `Statues` varchar(15) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `FK_item` (`ItemID`),
  KEY `FK_CID` (`CID`),
  KEY `FK_branch2` (`BranchID`),
  CONSTRAINT `FK_CID` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`),
  CONSTRAINT `FK_branch2` FOREIGN KEY (`BranchID`) REFERENCES `showrooms` (`BranchID`),
  CONSTRAINT `FK_item` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table Orders (4 records)
#
 
INSERT INTO `Orders` VALUES (1, 1, '1', 1, 50, '2017-05-26', '2017-06-24', '0000-00-00', 'Undelivered') ; 
INSERT INTO `Orders` VALUES (2, 1, '1', 0, 50, '2017-05-10', '2017-05-14', '2017-05-15', 'delivered') ; 
INSERT INTO `Orders` VALUES (3, 1, '1', 1, 50, '0000-00-00', '0000-00-00', '0000-00-00', '') ; 
INSERT INTO `Orders` VALUES (4, 3, '2568', 1, 50, '2017-05-27', '2017-06-26', '0000-00-00', '') ;
#
# End of data contents of table Orders
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 28. May 2017 17:34 IST
# Hostname: localhost
# Database: `woodsart`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `BranchItem`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `Orders`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `customer`
# --------------------------------------------------------


#
# Delete any existing table `customer`
#

DROP TABLE IF EXISTS `customer`;


#
# Table structure of table `customer`
#

CREATE TABLE `customer` (
  `CID` int(8) NOT NULL AUTO_INCREMENT,
  `CFName` varchar(15) DEFAULT NULL,
  `CLName` varchar(15) DEFAULT NULL,
  `CEmail` varchar(25) DEFAULT NULL,
  `CAddress1` varchar(25) DEFAULT NULL,
  `CAddress2` varchar(25) DEFAULT NULL,
  `CAddress3` varchar(25) DEFAULT NULL,
  `BranchID` int(1) NOT NULL,
  `CTPno` int(10) DEFAULT NULL,
  PRIMARY KEY (`CID`),
  KEY `FK_showroom` (`BranchID`),
  CONSTRAINT `FK_showroom` FOREIGN KEY (`BranchID`) REFERENCES `showrooms` (`BranchID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table customer (4 records)
#
 
INSERT INTO `customer` VALUES (1, 'Danushka', 'Herath', 'Danushkaherath96@gmail.co', 'No 06', 'Colombo Road', 'Kurunegala', 1, 717705526) ; 
INSERT INTO `customer` VALUES (2, 'Kamal', 'Perera', 'kamalperera87@gmail.com', 'No 13/A', 'New Town', 'Anuradhapura', 2, 715895658) ; 
INSERT INTO `customer` VALUES (3, 'Nuwan', 'Kalpana', 'nuwankalpana92@gmail.com', 'No 25/D', 'New Road', 'Trinco', 3, 786598254) ; 
INSERT INTO `customer` VALUES (4, 'Sunil', 'Prasad', 'sunilprasad90@gmail.com', 'No 87/C', 'Malambe Road', 'Thanalangama', 4, 759865985) ;
#
# End of data contents of table customer
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 28. May 2017 17:34 IST
# Hostname: localhost
# Database: `woodsart`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `BranchItem`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `Orders`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `customer`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------


#
# Delete any existing table `items`
#

DROP TABLE IF EXISTS `items`;


#
# Table structure of table `items`
#

CREATE TABLE `items` (
  `ItemID` varchar(5) NOT NULL,
  `ItemName` varchar(50) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `Quantity` int(4) NOT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

#
# Data contents of table items (4 records)
#
 
INSERT INTO `items` VALUES ('1', 'Damro Chair', '650.00', 'chair', 150) ; 
INSERT INTO `items` VALUES ('2568', 'Computer Table', '1800.00', 'Table', 0) ; 
INSERT INTO `items` VALUES ('45', 'Office Chair', '85.00', 'chair', 20) ; 
INSERT INTO `items` VALUES ('9876', 'Office Cupboard', '9500.00', 'Cupboard', 0) ;
#
# End of data contents of table items
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 28. May 2017 17:34 IST
# Hostname: localhost
# Database: `woodsart`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `BranchItem`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `Orders`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `customer`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `showrooms`
# --------------------------------------------------------


#
# Delete any existing table `showrooms`
#

DROP TABLE IF EXISTS `showrooms`;


#
# Table structure of table `showrooms`
#

CREATE TABLE `showrooms` (
  `BranchID` int(10) NOT NULL AUTO_INCREMENT,
  `District` varchar(20) DEFAULT NULL,
  `Address1` varchar(20) DEFAULT NULL,
  `Address2` varchar(20) DEFAULT NULL,
  `Address3` varchar(20) DEFAULT NULL,
  `PhoneNo` int(10) DEFAULT NULL,
  PRIMARY KEY (`BranchID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table showrooms (6 records)
#
 
INSERT INTO `showrooms` VALUES (0, 'Null', 'Null', 'Null', 'Null', 0) ; 
INSERT INTO `showrooms` VALUES (1, 'Colombo', 'No 07', 'Main Road', 'Moratuwa', 115898757) ; 
INSERT INTO `showrooms` VALUES (2, 'Colombo', 'No 17/A', 'Kaduwela Road', 'Battramulla', 118759865) ; 
INSERT INTO `showrooms` VALUES (3, 'Kurunegla', 'No 07', 'Colombo Road', 'Wehera', 378549685) ; 
INSERT INTO `showrooms` VALUES (4, 'Mathara', 'No 06', 'Main Road', 'Mathara', 418795265) ; 
INSERT INTO `showrooms` VALUES (5, 'Anuradhapura', 'No 4', 'New Town', 'Anurashapura', 815795864) ;
#
# End of data contents of table showrooms
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Sunday 28. May 2017 17:34 IST
# Hostname: localhost
# Database: `woodsart`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `BranchItem`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `Orders`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `customer`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `showrooms`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `users`
# --------------------------------------------------------


#
# Delete any existing table `users`
#

DROP TABLE IF EXISTS `users`;


#
# Table structure of table `users`
#

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ulevel` int(2) NOT NULL,
  `showroom` int(1) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `FK_branch` (`showroom`),
  CONSTRAINT `FK_branch` FOREIGN KEY (`showroom`) REFERENCES `showrooms` (`BranchID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

#
# Data contents of table users (4 records)
#
 
INSERT INTO `users` VALUES ('Admin', 'admin', 1, 1) ; 
INSERT INTO `users` VALUES ('operator1', 'operator', 2, 1) ; 
INSERT INTO `users` VALUES ('operator2', 'operator', 2, 2) ; 
INSERT INTO `users` VALUES ('stock', 'stock', 3, 0) ;
#
# End of data contents of table users
# --------------------------------------------------------

