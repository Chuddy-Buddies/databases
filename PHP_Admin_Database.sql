-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 19, 2020 at 07:28 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chuddybuddies`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `Admin_Username` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`Admin_Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `Artist_ID` char(8) NOT NULL,
  `Full_Name` varchar(20) DEFAULT NULL,
  `Painting_Style` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Artist_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

DROP TABLE IF EXISTS `artwork`;
CREATE TABLE IF NOT EXISTS `artwork` (
  `Artwork_ID` varchar(8) NOT NULL,
  `Seller_Username` varchar(2) DEFAULT NULL,
  `Artist_ID` varchar(8) DEFAULT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Year` char(4) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `Painting_Style` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Artwork_ID`),
  KEY `Seller_Username` (`Seller_Username`),
  KEY `Artist_ID` (`Artist_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `Auction_ID` char(8) NOT NULL,
  `Artwork_ID` char(8) DEFAULT NULL,
  `Seller_Username` varchar(20) DEFAULT NULL,
  `Highest_Bid_ID` char(8) DEFAULT NULL,
  `Creation` date DEFAULT NULL,
  `Deadline` timestamp NULL DEFAULT NULL,
  `Starting_Price` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`Auction_ID`),
  KEY `Artwork_ID` (`Artwork_ID`),
  KEY `Seller_Username` (`Seller_Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

DROP TABLE IF EXISTS `bid`;
CREATE TABLE IF NOT EXISTS `bid` (
  `Bid_ID` char(8) NOT NULL,
  `Buyer_Username` varchar(20) DEFAULT NULL,
  `Timestamp` timestamp NULL DEFAULT NULL,
  `Amount` decimal(8,2) DEFAULT NULL,
  `Auction_ID` char(8) DEFAULT NULL,
  PRIMARY KEY (`Bid_ID`),
  KEY `Auction_ID` (`Auction_ID`),
  KEY `Buyer_Username` (`Buyer_Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `Buyer_Username` varchar(20) NOT NULL,
  `F_name` varchar(20) DEFAULT NULL,
  `L_name` varchar(20) DEFAULT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `Buyer_Class` varchar(20) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Buyer_Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `Feedback_ID` char(8) NOT NULL,
  `Seller_Username` varchar(20) DEFAULT NULL,
  `Artwork_ID` char(8) DEFAULT NULL,
  `Buyer_Username` varchar(20) DEFAULT NULL,
  `Rating` decimal(1,0) DEFAULT NULL,
  `Feedback` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Feedback_ID`),
  KEY `Seller_Username` (`Seller_Username`),
  KEY `Buyer_Username` (`Buyer_Username`),
  KEY `Artwork_ID` (`Artwork_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_ID` char(8) NOT NULL,
  `Buyer_Username` varchar(20) DEFAULT NULL,
  `Artwork_ID` char(8) DEFAULT NULL,
  `Seller_Username` varchar(20) DEFAULT NULL,
  `Date_and_time` timestamp NULL DEFAULT NULL,
  `Payment_Method` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `Artwork_ID` (`Artwork_ID`),
  KEY `Seller_Username` (`Seller_Username`),
  KEY `Buyer_Username` (`Buyer_Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `Seller_Username` varchar(20) NOT NULL,
  `F_name` varchar(20) DEFAULT NULL,
  `L_name` varchar(20) DEFAULT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `Rating` decimal(1,0) DEFAULT NULL,
  PRIMARY KEY (`Seller_Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `artwork_ibfk_2` FOREIGN KEY (`Artist_ID`) REFERENCES `artist` (`Artist_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`Artwork_ID`) REFERENCES `artwork` (`Artwork_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_ibfk_2` FOREIGN KEY (`Seller_Username`) REFERENCES `seller` (`Seller_Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`Auction_ID`) REFERENCES `auction` (`Auction_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`Buyer_Username`) REFERENCES `buyer` (`Buyer_Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Seller_Username`) REFERENCES `seller` (`Seller_Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`Buyer_Username`) REFERENCES `buyer` (`Buyer_Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`Artwork_ID`) REFERENCES `artwork` (`Artwork_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Artwork_ID`) REFERENCES `artwork` (`Artwork_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Seller_Username`) REFERENCES `seller` (`Seller_Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Buyer_Username`) REFERENCES `buyer` (`Buyer_Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
