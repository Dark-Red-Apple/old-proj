-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2016 at 06:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping_card`
--
CREATE DATABASE IF NOT EXISTS `shopping_card` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `shopping_card`;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(20) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `brand_desc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cat_alias` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cat_desc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cat_pic` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_alias`, `cat_desc`, `cat_pic`) VALUES
(1, 'موبایل', '', 'موبایل (تلفن همراه)', 'sample_category.png'),
(3, 'کالای دیجیتال', 'digital', '', 'digital.jpg'),
(6, '', '', '', 'sample_category.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(20) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_family` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_type` tinyint(1) NOT NULL,
  `customer_company_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_tel` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_mobile` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_address` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_postal_code` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_sex` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `customer_photo` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(20) NOT NULL,
  `invoice_date` varchar(19) COLLATE utf8_persian_ci NOT NULL,
  `invoice_state` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `invoice_delivery` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `invoice_payment` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `invoice_address` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(20) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(20) NOT NULL,
  `product_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `order_count` int(4) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `cat_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `brand_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `product_size` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_weight` varchar(6) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_date` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_price` varchar(9) COLLATE utf8_persian_ci NOT NULL,
  `product_warranty` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_exist` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
