-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2021 at 09:59 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin@movement.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-01-24 16:21:18', '01-03-2021 10:49:13 PM');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `billid` int NOT NULL AUTO_INCREMENT,
  `corderid` varchar(10) NOT NULL,
  `customerid` int NOT NULL,
  `sellerid` int NOT NULL,
  `size` varchar(2) NOT NULL,
  `payseller` float NOT NULL,
  `totalcost` float NOT NULL,
  `status` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `delstatus` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deldate` date NOT NULL,
  PRIMARY KEY (`billid`),
  KEY `morderid` (`corderid`),
  KEY `sellerid` (`sellerid`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billid`, `corderid`, `customerid`, `sellerid`, `size`, `payseller`, `totalcost`, `status`, `delstatus`, `deldate`) VALUES
(120, '135', 55, 19, '32', 2097, 2097, 'done', 'Pickup Done', '2021-03-06'),
(119, '134', 55, 1, '24', 300, 300, '', 'PENDING FOR APPROVAL', '0000-00-00'),
(118, '133', 55, 1, '32', 3297, 3297, '', 'PENDING FOR APPROVAL', '0000-00-00'),
(117, '132', 4, 19, '32', 2796, 2796, '', 'PENDING FOR APPROVAL', '0000-00-00'),
(116, '131', 55, 19, '32', 1398, 1398, '', 'PENDING FOR APPROVAL', '0000-00-00'),
(115, '130', 55, 19, '32', 3495, 3495, '', 'PENDING FOR APPROVAL', '0000-00-00'),
(114, '129', 50, 16, '40', 1497, 1497, '', 'PENDING FOR APPROVAL', '0000-00-00'),
(113, '128', 55, 1, '32', 999, 999, '', 'PENDING FOR APPROVAL', '0000-00-00'),
(112, '127', 55, 1, '32', 1049, 1049, 'done', 'Pickup Done', '2021-03-06'),
(111, '126', 50, 1, '32', 1049, 1049, '', 'PENDING FOR APPROVAL', '0000-00-00'),
(110, '125', 50, 1, '32', 1049, 1049, 'done', 'Pickup Done', '2021-03-06'),
(109, '124', 55, 16, '32', 499, 499, '', 'Pickup Done', '2021-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `cardid` int NOT NULL AUTO_INCREMENT,
  `customerid` varchar(10) NOT NULL,
  `no` varchar(16) NOT NULL,
  `type` varchar(10) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `expiry` varchar(10) NOT NULL,
  PRIMARY KEY (`cardid`)
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cardid`, `customerid`, `no`, `type`, `cvv`, `name`, `expiry`) VALUES
(166, '55', '111111111111', 'Debit Card', '123', '', '11/11'),
(165, '55', '111111111111', 'Debit Card', '123', '', '11/11'),
(164, '4', '111111111111', 'Debit Card', '111', '', '11/11'),
(163, '55', '111111111111', 'Debit Card', '123', '', '11/11'),
(162, '55', '111111111111', 'Debit Card', '123', '', '11/11'),
(161, '50', '111111111111', 'Debit Card', '123', '', '11/11'),
(160, '55', '111111111111', 'Debit Card', '123', '', '11/22'),
(159, '50', '111111111111', 'Debit Card', '123', '', '11/11'),
(158, '50', '111111111111', 'Debit Card', '123', '', '11/11'),
(157, '55', '111111111111', 'Debit Card', '123', '', '11/11');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int NOT NULL AUTO_INCREMENT,
  `customerid` int NOT NULL,
  `productid` int NOT NULL,
  `qty` int NOT NULL,
  `measureid` varchar(10) NOT NULL,
  `size` varchar(2) NOT NULL,
  `uprice` varchar(6) NOT NULL,
  `sprice` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`cartid`),
  KEY `productid` (`productid`),
  KEY `customerid` (`customerid`)
) ENGINE=MyISAM AUTO_INCREMENT=230 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `customerid`, `productid`, `qty`, `measureid`, `size`, `uprice`, `sprice`) VALUES
(186, 1, 13, 2, '', '32', '150', '300'),
(187, 1, 9, 2, '', '38', '1049', '2098'),
(228, 50, 9, 1, '', '32', '1099.0', '1099'),
(214, 50, 34, 1, '', '32', '699', '699');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'T-Shirts', 'awesome collection to make you look cool', '2020-11-22 21:28:00', '24-11-2020 09:53:55 PM'),
(2, 'Casual Shirts', 'awesome collection to make you look cool', '2020-11-22 15:04:23', '24-11-2020 09:54:07 PM'),
(14, 'Formal Shirts', 'awesome collection to make you look cool', '2020-11-23 15:54:10', '25-11-2020 01:06:08 AM'),
(16, 'Jeans', 'awesome', '2020-11-24 10:12:29', '24-11-2020 09:54:47 PM');

-- --------------------------------------------------------

--
-- Table structure for table `corder`
--

DROP TABLE IF EXISTS `corder`;
CREATE TABLE IF NOT EXISTS `corder` (
  `corderid` int NOT NULL AUTO_INCREMENT,
  `morderid` varchar(10) NOT NULL,
  `sellerid` varchar(10) NOT NULL,
  `productid` varchar(10) NOT NULL,
  `size` varchar(2) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`corderid`),
  KEY `morderid` (`morderid`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corder`
--

INSERT INTO `corder` (`corderid`, `morderid`, `sellerid`, `productid`, `size`, `qty`, `price`) VALUES
(133, '150', '1', '9', '32', '3', 3297),
(132, '149', '19', '34', '32', '3', 2796),
(131, '148', '19', '34', '32', '2', 1398),
(130, '147', '19', '34', '32', '5', 3495),
(129, '146', '16', '33', '40', '2', 1497),
(128, '145', '1', '29', '32', '1', 999),
(127, '145', '1', '9', '32', '1', 1049),
(126, '144', '1', '9', '32', '1', 1049),
(125, '143', '1', '9', '32', '1', 1049),
(124, '142', '16', '32', '32', '1', 499),
(134, '150', '1', '13', '24', '2', 300),
(135, '151', '19', '35', '32', '3', 2097);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerid` int NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `pwd` varchar(16) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dist` text NOT NULL,
  `state` text NOT NULL,
  `zipcode` int NOT NULL,
  `homeadr` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city` text NOT NULL,
  PRIMARY KEY (`customerid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `email`, `pwd`, `fname`, `lname`, `dob`, `phone`, `dist`, `state`, `zipcode`, `homeadr`, `city`) VALUES
(4, 'jithin@movement.com', '123456', 'Jithin', 'George', '2000-04-24', '8921063143', 'ernakulam', 'kerala', 682024, 'koonamthai', 'edapally'),
(50, 'vishnu@gmail.com', '123456', 'Vishnu', 'Suvarnan', '2020-11-04', '8921063142', 'EKM', 'kerala', 682024, 'koonamthai', 'edapally'),
(56, 'al@movement.com', '123456', 'joe', 'alvin', '0000-00-00', '', '', '', 0, '', ''),
(55, 'j@gmail.com', '123456', 'John', 'Snow', '2000-04-24', '8921063141', 'ekm', 'kerala', 682024, 'koonamthai', 'Edapally');

-- --------------------------------------------------------

--
-- Table structure for table `morder`
--

DROP TABLE IF EXISTS `morder`;
CREATE TABLE IF NOT EXISTS `morder` (
  `morderid` int NOT NULL AUTO_INCREMENT,
  `customerid` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `morderprice` varchar(6) NOT NULL,
  `expected` date NOT NULL,
  PRIMARY KEY (`morderid`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `morder`
--

INSERT INTO `morder` (`morderid`, `customerid`, `date`, `morderprice`, `expected`) VALUES
(151, '55', '2021-03-06', '2097', '2021-03-06'),
(150, '55', '2021-03-06', '3597', '2021-03-06'),
(149, '4', '2021-03-06', '2796', '2021-03-06'),
(148, '55', '2021-03-06', '1398', '2021-03-06'),
(147, '55', '2021-03-06', '3495', '2021-03-06'),
(146, '50', '2021-03-06', '1497', '2021-03-06'),
(145, '55', '2021-03-06', '2048', '2021-03-06'),
(144, '50', '2021-03-06', '1049', '2021-03-06'),
(143, '50', '2021-03-06', '1049', '2021-03-06'),
(142, '55', '2021-03-05', '499', '2021-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productid` int NOT NULL AUTO_INCREMENT,
  `categoryid` int NOT NULL,
  `subcategoryid` int NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `sellerid` int DEFAULT NULL,
  `unitprice` int DEFAULT NULL,
  `sellingprice` int DEFAULT NULL,
  `decs` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `qty` int NOT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `maxsize` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `minsize` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pavailability` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `categoryid`, `subcategoryid`, `productName`, `sellerid`, `unitprice`, `sellingprice`, `decs`, `qty`, `productImage1`, `productImage2`, `productImage3`, `maxsize`, `minsize`, `pavailability`, `postingDate`, `updationDate`) VALUES
(9, 2, 52, 'ROADSTER', 1, 800, 1099, 'Men Blue Regular Fit Faded Casual Denim Shirt', 1, '1.jpg', '2.jpg', '3.jpg', '46', '32', 'In Stock', '2020-11-23 16:04:57', NULL),
(10, 14, 53, 'Peter England Blue Full Sleeves', 1, 750, 1000, 'A well fitted formal shirt always makes you look sharp. ', 75, '1.jpg', '2.jpg', '3.jpg', '44', '34', 'In Stock', '2020-11-23 16:05:41', NULL),
(13, 1, 1, 'DMNX', 1, 20, 150, 'Tropical Print Pocket Crew-Neck T-shirt', 73, '1.jpg', '2.jpg', '3.jpg', '32', '24', 'In Stock', '2020-11-24 09:40:11', NULL),
(29, 16, 54, 'Wrangler', 1, 750, 999, '', 47, '1.jpg', '2.jpg', '3.jpg', '46', '32', 'In Stock', '2020-11-25 03:27:46', NULL),
(30, 17, 60, 'NorthMist', 1, 999, 1099, 'Dapper', 41, '1.jpg', '2.jpg', '3.jpg', '46', '32', 'In Stock', '2020-11-26 03:35:20', NULL),
(32, 1, 1, 'Melange ', 16, 300, 499, 'AWESOME TEE', 46, '1.png', '2.png', '3.png', '46', '32', 'In Stock', '2020-12-05 10:24:49', NULL),
(33, 14, 1, 'NETWORK', 16, 250, 499, 'Striped Shirt with Patch pocket', 98, '1.jpg', '2.jpg', '3.jpg', '46', '32', 'In Stock', '2021-03-05 17:34:44', NULL),
(35, 14, 1, 'happy', 19, 500, 699, 'HAPPY', 72, '1.jpg', '2.jpg', '3.jpg', '55', '32', 'In Stock', '2021-03-06 09:34:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `sellerid` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(35) NOT NULL,
  `pwd` varchar(16) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dist` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `state` text NOT NULL,
  `zipcode` int NOT NULL,
  `shopadr` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` text NOT NULL,
  `bankacc` int NOT NULL,
  `bankifsc` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`sellerid`),
  UNIQUE KEY `id` (`sellerid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerid`, `email`, `pwd`, `fname`, `lname`, `dob`, `phone`, `dist`, `state`, `zipcode`, `shopadr`, `status`, `bankacc`, `bankifsc`, `remark`) VALUES
(1, 'vishnu@movement.com', '123456', 'Vishnu', 'Suvarnan', '2000-04-24', '8921063142', 'EKM', 'Kerala', 682024, 'AS Apartment, Koonamthai', 'Accept', 2147483647, 'IFSC0111234', 'good\r\n'),
(17, 'e@move.com', '123456', 'Ethan', 'Hemanth', '2000-04-24', '8921063142', 'Ekm', 'Kerala', 682024, 'AS Apartment, ', 'Accept', 0, '', 'good'),
(14, 'vishnu123@gmail.com', '123456', 'Mirabel', 'Designers', '2020-11-03', '8921063142', 'ernakulam', 'kerala', 682024, 'koonamthai', 'Accept', 2147483647, 'ifsc1234', 'good'),
(18, 'e@move.com', '123456', 'Ethan', 'Hemanth', '0000-00-00', '', 'Ekm', 'Kerala', 0, 'AS Apartment, Koonamthai, Edapally', 'Accept', 2147483647, '', 'good\r\n'),
(16, 'vishnu@gmail.com', '123456', 'Ezina ', 'Designers', '2000-04-09', '8921063142', 'ernakulam', 'kerala', 682024, 'koonamthai', 'Accept', 2147483647, 'IFSC0123456', 'All the best'),
(19, 'zyra@movement.com', '123456', 'zyra', 'fathima', '0000-00-00', '', 'Ekm', 'Kerala', 0, 'As Apartment,koonathai', 'Accept', 2147483647, '', 'Go for it');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcategoryid` int NOT NULL AUTO_INCREMENT,
  `subcategory` varchar(255) DEFAULT NULL,
  `decs` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`subcategoryid`),
  KEY `subcategoryid` (`subcategoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategoryid`, `subcategory`, `decs`, `creationDate`, `updationDate`) VALUES
(1, 'Cotton', '100%', '2020-11-23 10:55:53', '24-11-2020 10:00:13 PM'),
(52, 'Denim', 'awesome', '2020-11-23 10:58:21', '24-11-2020 10:00:23 PM'),
(53, 'Broadcloth', 'Pure Awesomeness', '2020-11-23 15:55:40', '24-11-2020 12:20:12 PM'),
(54, 'FR Denim', '100%', '2020-11-23 15:56:58', '05-12-2020 04:12:54 PM'),
(60, 'Woolen', 'Dapper', '2020-11-26 03:27:21', '05-12-2020 04:07:55 PM');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 11:18:50', '', 1),
(2, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 11:29:33', '', 1),
(3, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 11:30:11', '', 1),
(4, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 15:00:23', '26-02-2017 11:12:06 PM', 1),
(5, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:08:58', '', 0),
(6, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:09:41', '', 0),
(7, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:10:04', '', 0),
(8, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:10:31', '', 0),
(9, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:13:43', '', 1),
(10, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-27 18:52:58', '', 0),
(11, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-27 18:53:07', '', 1),
(12, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-03 18:00:09', '', 0),
(13, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-03 18:00:15', '', 1),
(14, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-06 18:10:26', '', 1),
(15, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 12:28:16', '', 1),
(16, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 18:43:27', '', 1),
(17, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 18:55:33', '', 1),
(18, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 19:44:29', '', 1),
(19, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-08 19:21:15', '', 1),
(20, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-15 17:19:38', '', 1),
(21, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-15 17:20:36', '15-03-2017 10:50:39 PM', 1),
(22, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-16 01:13:57', '', 1),
(23, 'hgfhgf@gmass.com', 0x3a3a3100000000000000000000000000, '2018-04-29 09:30:40', '', 1),
(24, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-21 11:40:34', '23-11-2020 03:30:41 AM', 1),
(25, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-22 20:31:08', NULL, 0),
(26, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-22 20:31:30', NULL, 0),
(27, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-22 20:34:00', NULL, 0),
(28, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-22 20:34:51', NULL, 0),
(29, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-22 20:35:28', NULL, 0),
(30, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-22 20:35:42', NULL, 0),
(31, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-22 20:36:52', '23-11-2020 02:36:42 AM', 1),
(32, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-22 21:06:53', NULL, 1),
(33, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-22 22:00:51', NULL, 1),
(34, 'eenu@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-23 16:56:47', '24-11-2020 01:12:49 AM', 1),
(35, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 19:43:16', '24-11-2020 01:13:26 AM', 1),
(36, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 19:44:11', NULL, 1),
(37, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 21:11:16', NULL, 0),
(38, 'vishnu@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-23 21:11:45', NULL, 0),
(39, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 21:12:02', NULL, 1),
(40, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 03:24:33', NULL, 1),
(41, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 10:43:43', NULL, 1),
(42, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 11:19:42', '24-11-2020 05:02:05 PM', 1),
(43, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 19:30:04', '25-11-2020 01:06:28 AM', 1),
(44, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 02:44:45', NULL, 1),
(45, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 03:49:51', NULL, 1),
(46, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 16:12:53', '26-11-2020 11:49:15 PM', 1),
(47, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 18:19:30', NULL, 0),
(48, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 18:19:39', NULL, 0),
(49, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 18:19:50', '27-11-2020 12:25:09 AM', 1),
(50, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 18:55:19', NULL, 0),
(51, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 18:55:25', NULL, 0),
(52, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 18:55:37', NULL, 0),
(53, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 18:56:00', '27-11-2020 01:58:36 AM', 1),
(54, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-26 20:29:39', '27-11-2020 11:12:21 AM', 1),
(55, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-27 05:42:32', '27-11-2020 12:24:14 PM', 1),
(56, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-27 06:54:28', '27-11-2020 12:53:52 PM', 1),
(57, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-27 07:24:01', NULL, 0),
(58, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-27 07:24:07', NULL, 0),
(59, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-27 07:24:13', '27-11-2020 01:22:07 PM', 1),
(60, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-27 07:52:15', NULL, 1),
(61, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-27 13:05:33', '27-11-2020 07:41:42 PM', 1),
(62, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-27 14:11:48', '27-11-2020 10:03:00 PM', 1),
(63, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 18:52:39', '28-11-2020 12:23:22 AM', 1),
(64, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 18:53:31', '28-11-2020 12:25:14 AM', 1),
(65, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 18:59:09', '28-11-2020 01:24:56 AM', 1),
(66, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 19:55:16', '28-11-2020 03:22:34 AM', 1),
(67, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-11-27 21:52:42', '28-11-2020 05:40:35 AM', 1),
(68, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-28 00:10:44', NULL, 1),
(69, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-28 02:20:59', NULL, 1),
(70, 'riswin2012@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-28 09:51:35', NULL, 1),
(71, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-28 13:17:43', '29-11-2020 02:44:26 AM', 1),
(72, 't@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-28 21:20:35', '29-11-2020 03:08:15 AM', 1),
(73, 't@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-28 21:38:27', '29-11-2020 03:21:34 AM', 1),
(74, 't@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-28 21:51:47', '29-11-2020 03:27:54 AM', 1),
(75, 't@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-28 21:58:05', NULL, 1),
(76, 't@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-29 05:33:22', '29-11-2020 11:04:28 AM', 1),
(77, 't@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-29 05:37:16', '29-11-2020 12:19:45 PM', 1),
(78, 't@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-29 07:30:30', '29-11-2020 01:30:04 PM', 1),
(79, 't@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-29 08:00:14', NULL, 1),
(80, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-29 10:56:42', '29-11-2020 05:07:31 PM', 1),
(81, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-29 11:37:41', '29-11-2020 11:00:44 PM', 1),
(82, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-29 17:43:03', '30-11-2020 01:22:12 AM', 1),
(83, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-29 20:20:13', NULL, 0),
(84, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-29 20:20:19', '30-11-2020 01:54:23 AM', 1),
(85, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-29 20:24:47', NULL, 1),
(86, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 04:55:00', '30-11-2020 10:43:30 AM', 1),
(87, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 05:23:46', NULL, 1),
(88, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 05:37:33', '30-11-2020 11:18:36 AM', 1),
(89, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 05:48:43', '30-11-2020 01:44:17 PM', 1),
(90, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 08:14:25', '30-11-2020 01:46:50 PM', 1),
(91, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 08:16:56', NULL, 1),
(92, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 10:12:32', '30-11-2020 04:01:23 PM', 1),
(93, 'vis@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-30 10:35:07', '30-11-2020 04:35:08 PM', 1),
(94, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 11:48:10', '30-11-2020 05:18:16 PM', 1),
(95, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 11:50:29', '30-11-2020 05:42:42 PM', 1),
(96, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 12:12:55', '30-11-2020 06:05:04 PM', 1),
(97, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 12:35:55', '30-11-2020 10:46:09 PM', 1),
(98, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 17:38:35', '30-11-2020 11:15:53 PM', 1),
(99, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 17:46:01', '30-11-2020 11:19:48 PM', 1),
(100, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-11-30 17:49:54', NULL, 1),
(101, 'vis@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-01 04:28:36', '01-12-2020 02:10:02 PM', 1),
(102, 'vis@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-01 08:40:14', '02-12-2020 07:31:51 PM', 1),
(103, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-02 14:40:51', NULL, 0),
(104, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-02 14:40:58', NULL, 0),
(105, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-02 14:41:25', '02-12-2020 08:37:13 PM', 1),
(106, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-02 15:07:21', '02-12-2020 09:22:14 PM', 1),
(107, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-02 15:52:22', '02-12-2020 09:37:43 PM', 1),
(108, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-02 16:07:49', '03-12-2020 02:04:37 AM', 1),
(109, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-02 20:34:44', '03-12-2020 11:40:39 PM', 1),
(110, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-03 18:10:46', '03-12-2020 11:51:48 PM', 1),
(111, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-03 18:22:01', NULL, 0),
(112, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-03 18:22:06', '04-12-2020 12:04:33 AM', 1),
(113, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-03 18:34:40', '04-12-2020 01:27:29 AM', 1),
(114, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-03 19:57:44', '04-12-2020 01:29:00 AM', 1),
(115, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-03 19:59:05', '04-12-2020 01:29:11 AM', 1),
(116, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-03 19:59:18', '04-12-2020 01:30:04 AM', 1),
(117, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-04 03:34:00', '04-12-2020 09:28:48 AM', 1),
(118, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-04 03:59:00', '04-12-2020 10:37:09 AM', 1),
(119, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-04 05:07:15', '04-12-2020 10:49:46 AM', 1),
(120, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-04 06:52:56', NULL, 1),
(121, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-04 07:10:53', NULL, 1),
(122, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-05 06:40:17', NULL, 1),
(123, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-12-05 06:51:21', NULL, 0),
(124, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-05 06:51:28', '05-12-2020 12:21:58 PM', 1),
(125, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-05 10:04:56', '05-12-2020 03:35:18 PM', 1),
(126, 'j@move.com', 0x3a3a3100000000000000000000000000, '2020-12-06 11:04:43', '06-12-2020 04:46:07 PM', 1),
(127, 'vishnu123@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-06 11:16:13', '06-12-2020 04:46:17 PM', 1),
(128, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-06 11:16:26', NULL, 1),
(129, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-12-07 18:23:20', NULL, 1),
(130, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2020-12-08 05:29:00', '08-12-2020 11:15:49 AM', 1),
(131, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2021-01-14 18:59:06', NULL, 1),
(132, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-27 18:42:57', NULL, 1),
(133, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-02-28 19:10:46', '01-03-2021 12:53:11 AM', 1),
(134, 'al@movement.com', 0x3a3a3100000000000000000000000000, '2021-02-28 19:27:08', '01-03-2021 12:57:50 AM', 1),
(135, '', 0x3a3a3100000000000000000000000000, '2021-02-28 19:38:07', '06-03-2021 02:11:03 PM', 0),
(136, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-01 17:17:37', '01-03-2021 10:54:13 PM', 1),
(137, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-01 17:24:18', '01-03-2021 11:02:54 PM', 1),
(138, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-01 17:33:07', '01-03-2021 11:04:42 PM', 1),
(139, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-01 17:34:48', NULL, 0),
(140, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-01 17:34:53', NULL, 1),
(141, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 13:46:37', NULL, 1),
(142, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 14:13:23', NULL, 1),
(143, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 17:11:00', NULL, 1),
(144, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 17:14:09', NULL, 1),
(145, 'e@move.com', 0x3a3a3100000000000000000000000000, '2021-03-05 18:18:18', NULL, 0),
(146, 'e@move.com', 0x3a3a3100000000000000000000000000, '2021-03-05 18:18:25', NULL, 0),
(147, 'j@move.com', 0x3a3a3100000000000000000000000000, '2021-03-05 18:18:47', NULL, 0),
(148, 'j@move.com', 0x3a3a3100000000000000000000000000, '2021-03-05 18:19:05', NULL, 0),
(149, 'j@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 18:19:18', NULL, 0),
(150, 'j@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 18:20:10', '05-03-2021 11:50:58 PM', 1),
(151, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 18:49:40', '06-03-2021 12:20:06 AM', 1),
(152, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 18:53:07', '06-03-2021 12:23:27 AM', 1),
(153, 'j@movement.com', 0x3a3a3100000000000000000000000000, '2021-03-05 19:01:39', NULL, 0),
(154, 'j@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-05 19:01:47', '06-03-2021 12:32:18 AM', 1),
(155, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:32:27', '06-03-2021 02:06:21 PM', 1),
(156, 'j@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:36:55', NULL, 1),
(157, 'j@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:40:02', '06-03-2021 02:11:02 PM', 1),
(158, 'j@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:41:43', NULL, 1),
(159, 'j@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:43:35', '06-03-2021 02:15:51 PM', 1),
(160, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:46:06', '06-03-2021 02:16:41 PM', 1),
(161, 'jithin@movement.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:46:48', '06-03-2021 02:21:23 PM', 1),
(162, 'j@move.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:51:32', NULL, 0),
(163, 'j@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 08:51:40', NULL, 1),
(164, 'j@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 09:35:39', NULL, 1),
(165, 'vishnu@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-06 10:33:45', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
