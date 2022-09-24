-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 06:11 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_card`
--
CREATE DATABASE IF NOT EXISTS `shopping_card` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `shopping_card`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(20) NOT NULL,
  `admin_username` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `admin_pass` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `admin_role` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `admin_firstname` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `admin_family` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `admin_extra` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `admin_desc` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_pass`, `admin_role`, `admin_firstname`, `admin_family`, `admin_extra`, `admin_desc`) VALUES
(1, 'admin', '1', 'super-admin', 'alma', 'zia', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(20) NOT NULL,
  `brand_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `brand_title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_persian_ci DEFAULT 'default_brand.png',
  `brand_desc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_title`, `logo`, `brand_desc`) VALUES
(2, 'sarzamin sabz', 'سرزمین سبز', 'default_brand.png', 'سرزمین سبز یکی از شرکت های لیللبللللللللللللللللللللللللgssd'),
(3, 'beat seed', 'بیت سید', 'beat seed.jpg', 'بیتترتعdfbdv');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(20) NOT NULL,
  `cat_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cat_title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cat_desc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cat_pic` varchar(50) COLLATE utf8_persian_ci DEFAULT 'default_category.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_title`, `cat_desc`, `cat_pic`) VALUES
(3, 'fruits', 'میوه ها', ' bgkhk', 'fruits.jpg'),
(28, 'home folwers', 'گل های خانگی', '   ', 'home folwers.JPG'),
(32, 'yard flowers', 'گلهای باغچه', '', 'yard flowers.JPG'),
(33, 'seed', 'دانه ها', '  ', 'seed.jpg'),
(34, 'accessories', 'لوازم جانبی', 'شامل وسایل نگهداری گل، آفت کش ها، انواع کود ها، گلدان ها', 'accessories.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(20) NOT NULL,
  `customer_username` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `customer_pass` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_family` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_type` tinyint(1) DEFAULT NULL,
  `customer_company_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_tel` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_mobile` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_address` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_postal_code` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_sex` tinyint(1) DEFAULT '2',
  `customer_pic` varchar(50) COLLATE utf8_persian_ci DEFAULT 'default_customer.png',
  `customer_is_guest` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_username`, `customer_pass`, `customer_name`, `customer_family`, `customer_title`, `customer_type`, `customer_company_name`, `customer_tel`, `customer_mobile`, `customer_email`, `customer_address`, `customer_postal_code`, `customer_sex`, `customer_pic`, `customer_is_guest`) VALUES
(1, 'user', '1', 'alma', 'zia', 'alma', 0, '', '', '', 'alma68@gmail.com', 'انقلاب -خیابان 11 فروردین-تقاطع', '', 2, 'alma.png', 0),
(2, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(3, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(4, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(5, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(6, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(7, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(8, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(9, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(10, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(11, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(12, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(13, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(14, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1),
(15, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, 2, 'default_customer.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_id` int(20) NOT NULL,
  `invoice_email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_id` int(20) NOT NULL,
  `customer_kind` tinyint(1) NOT NULL,
  `invoice_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `invoice_date` varchar(19) COLLATE utf8_persian_ci NOT NULL,
  `invoice_state` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `invoice_delivery_method` tinyint(1) NOT NULL,
  `invoice_payment_method` tinyint(1) NOT NULL,
  `invoice_payment_state` tinyint(1) NOT NULL DEFAULT '0',
  `invoice_address` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `invoice_tel` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_email`, `customer_id`, `customer_kind`, `invoice_name`, `invoice_date`, `invoice_state`, `invoice_delivery_method`, `invoice_payment_method`, `invoice_payment_state`, `invoice_address`, `invoice_tel`) VALUES
(13, '', 3, 0, '', '2016/11/28 13:35:20', 'unconfirmed', 0, 0, 0, NULL, '0'),
(23, '', 0, 0, '', '2016/12/01 17:00:27', 'unconfirmed', 0, 0, 0, NULL, '0'),
(27, '', 2, 0, '', '2016/12/05 16:19:54', 'unconfirmed', 0, 0, 0, NULL, '0'),
(29, '', 78, 0, '', '2016/12/05 21:08:14', 'unconfirmed', 0, 0, 0, NULL, '0'),
(30, '', 80, 0, '', '2016/12/05 21:17:27', 'unconfirmed', 0, 0, 0, NULL, '0'),
(31, '', 81, 0, '', '2016/12/05 21:17:55', 'unconfirmed', 0, 0, 0, NULL, '0'),
(32, '', 84, 0, '', '2016/12/06 16:20:41', 'unconfirmed', 0, 0, 0, NULL, '0'),
(33, '', 86, 0, '', '2016/12/06 16:30:04', 'unconfirmed', 0, 0, 0, NULL, '0'),
(34, '', 87, 0, '', '2016/12/06 16:31:34', 'unconfirmed', 0, 0, 0, NULL, '0'),
(35, '', 91, 0, '', '2016/12/06 16:45:40', 'unconfirmed', 0, 0, 0, NULL, '0'),
(36, '', 93, 0, '', '2016/12/07 16:38:14', 'unconfirmed', 0, 0, 0, NULL, '0'),
(38, '', 101, 0, '', '2016/12/07 18:23:42', 'unconfirmed', 0, 0, 0, NULL, '0'),
(39, '', 103, 0, '', '2016/12/07 18:42:17', 'unconfirmed', 0, 0, 0, NULL, '0'),
(40, '', 104, 0, '', '2016/12/11 14:23:08', 'unconfirmed', 0, 0, 0, NULL, '0'),
(41, '', 105, 0, '', '2016/12/11 14:24:24', 'unconfirmed', 0, 0, 0, NULL, '0'),
(42, '', 108, 0, '', '2016/12/13 00:16:13', 'confirmed', 0, 0, 0, NULL, '0'),
(43, '', 108, 0, '', '2016/12/14 18:27:15', 'unconfirmed', 0, 0, 0, NULL, '0'),
(45, '', 109, 0, '', '2016/12/17 14:29:33', 'unconfirmed', 0, 0, 0, NULL, '0'),
(46, '', 110, 0, '', '2016/12/29 16:02:53', 'unconfirmed', 0, 0, 0, NULL, '0'),
(48, '', 111, 0, '', '2017/01/31 15:51:59', 'confirmed', 0, 0, 0, NULL, '0'),
(50, '', 112, 0, '', '2017/02/07 12:24:38', 'confirmed', 0, 0, 0, NULL, '0'),
(51, '', 113, 0, '', '2017/02/12 12:30:52', 'unconfirmed', 0, 0, 0, NULL, '0'),
(52, '', 116, 0, '', '2017/02/13 13:52:20', 'confirmed', 0, 0, 0, NULL, '0'),
(53, '', 116, 0, '', '2017/02/13 13:57:18', 'confirmed', 0, 0, 0, NULL, '0'),
(54, '', 116, 0, '', '2017/02/14 20:05:15', 'confirmed', 0, 0, 0, NULL, '0'),
(55, '', 116, 0, '', '2017/02/14 20:15:40', 'unconfirmed', 0, 0, 0, NULL, '0'),
(56, '', 112, 0, '', '2017/02/14 21:00:24', 'unconfirmed', 0, 0, 0, NULL, '0'),
(57, '', 118, 0, '', '2017/03/03 16:39:13', 'confirmed', 0, 0, 0, NULL, '0'),
(58, '', 118, 0, '', '2017/03/03 17:35:34', 'unconfirmed', 0, 0, 0, NULL, '0'),
(59, '', 121, 0, '', '2017/03/03 18:45:09', 'unconfirmed', 0, 0, 0, NULL, '0'),
(60, '', 128, 0, '', '2017/03/05 17:39:08', 'confirmed', 0, 0, 0, NULL, '0'),
(61, '', 128, 0, '', '2017/03/05 17:39:30', 'confirmed', 0, 0, 0, NULL, '0'),
(62, '', 128, 0, '', '2017/03/05 17:39:48', 'confirmed', 0, 0, 0, NULL, '0'),
(63, '', 128, 0, '', '2017/03/05 17:40:03', 'confirmed', 0, 0, 0, NULL, '0'),
(64, '', 128, 0, '', '2017/03/05 17:40:24', 'confirmed', 0, 0, 0, NULL, '0'),
(65, '', 128, 0, '', '2017/03/05 17:40:36', 'confirmed', 0, 0, 0, NULL, '0'),
(66, '', 128, 0, '', '2017/03/05 17:40:54', 'confirmed', 0, 0, 0, NULL, '0'),
(68, '', 130, 0, '', '2017/03/09 16:16:35', 'unconfirmed', 0, 0, 0, NULL, '0'),
(71, '', 133, 0, '', '2017/03/09 16:29:00', 'unconfirmed', 0, 0, 0, NULL, '0'),
(72, '', 134, 0, '', '2017/03/09 16:37:01', 'unconfirmed', 0, 0, 0, NULL, '0'),
(73, '', 135, 0, '', '2017/03/09 16:46:47', 'unconfirmed', 0, 0, 0, NULL, '0'),
(74, '', 136, 0, '', '2017/03/09 16:52:40', 'unconfirmed', 0, 0, 0, NULL, '0'),
(75, '', 139, 0, '', '2017/03/09 17:12:15', 'unconfirmed', 0, 0, 0, NULL, '0'),
(76, '', 141, 0, '', '2017/03/15 13:21:55', 'unconfirmed', 0, 0, 0, NULL, '0'),
(77, '', 142, 0, '', '2017/03/19 17:54:49', 'unconfirmed', 0, 0, 0, NULL, '0'),
(78, '', 144, 0, '', '2017/03/23 19:42:28', 'unconfirmed', 0, 0, 0, NULL, '0'),
(79, '', 145, 0, '', '2017/03/23 19:54:43', 'unconfirmed', 0, 0, 0, NULL, '0'),
(80, '', 146, 0, '', '2017/03/23 19:55:12', 'unconfirmed', 0, 0, 0, NULL, '0'),
(81, '', 147, 0, '', '2017/03/23 19:59:39', 'unconfirmed', 0, 0, 0, NULL, '0'),
(82, '', 148, 0, '', '2017/03/23 20:08:19', 'unconfirmed', 0, 0, 0, NULL, '0'),
(83, '', 149, 0, '', '2017/03/23 20:09:05', 'unconfirmed', 0, 0, 0, NULL, '0'),
(84, '', 150, 0, '', '2017/03/23 20:22:43', 'unconfirmed', 0, 0, 0, NULL, '0'),
(85, '', 151, 0, '', '2017/03/23 20:23:24', 'unconfirmed', 0, 0, 0, NULL, '0'),
(86, '', 152, 0, '', '2017/03/23 20:28:40', 'unconfirmed', 0, 0, 0, NULL, '0'),
(87, '', 153, 0, '', '2017/03/23 20:43:38', 'unconfirmed', 0, 0, 0, NULL, '0'),
(88, '', 154, 0, '', '2017/03/23 20:44:01', 'unconfirmed', 0, 0, 0, NULL, '0'),
(89, '', 155, 0, '', '2017/03/23 20:47:55', 'unconfirmed', 0, 0, 0, NULL, '0'),
(90, '', 156, 0, '', '2017/03/23 20:48:25', 'unconfirmed', 0, 0, 0, NULL, '0'),
(91, '', 157, 0, '', '2017/03/23 20:49:17', 'unconfirmed', 0, 0, 0, NULL, '0'),
(92, '', 158, 0, '', '2017/03/23 20:50:18', 'unconfirmed', 0, 0, 0, NULL, '0'),
(93, '', 159, 0, '', '2017/03/23 20:51:37', 'unconfirmed', 0, 0, 0, NULL, '0'),
(94, '', 160, 0, '', '2017/03/23 20:54:51', 'unconfirmed', 0, 0, 0, NULL, '0'),
(95, '', 161, 0, '', '2017/03/23 20:55:43', 'unconfirmed', 0, 0, 0, NULL, '0'),
(96, '', 162, 0, '', '2017/03/23 20:57:47', 'unconfirmed', 0, 0, 0, NULL, '0'),
(97, '', 163, 0, '', '2017/03/23 21:03:21', 'unconfirmed', 0, 0, 0, NULL, '0'),
(98, '', 164, 0, '', '2017/03/23 21:06:22', 'unconfirmed', 0, 0, 0, NULL, '0'),
(99, '', 165, 0, '', '2017/03/23 21:10:49', 'unconfirmed', 0, 0, 0, NULL, '0'),
(100, '', 166, 0, '', '2017/03/23 21:11:16', 'unconfirmed', 0, 0, 0, NULL, '0'),
(101, '', 167, 0, '', '2017/03/23 21:13:25', 'unconfirmed', 0, 0, 0, NULL, '0'),
(102, '', 168, 0, '', '2017/03/23 21:15:43', 'unconfirmed', 0, 0, 0, NULL, '0'),
(103, '', 169, 0, '', '2017/03/23 21:18:50', 'unconfirmed', 0, 0, 0, NULL, '0'),
(104, '', 170, 0, '', '2017/03/23 21:23:22', 'unconfirmed', 0, 0, 0, NULL, '0'),
(105, '', 171, 0, '', '2017/03/23 21:24:38', 'unconfirmed', 0, 0, 0, NULL, '0'),
(106, '', 172, 0, '', '2017/03/23 21:25:01', 'unconfirmed', 0, 0, 0, NULL, '0'),
(107, '', 173, 0, '', '2017/03/23 21:28:06', 'unconfirmed', 0, 0, 0, NULL, '0'),
(108, '', 174, 0, '', '2017/03/23 21:31:16', 'unconfirmed', 0, 0, 0, NULL, '0'),
(109, '', 175, 0, '', '2017/03/23 21:34:30', 'unconfirmed', 0, 0, 0, NULL, '0'),
(110, '', 176, 0, '', '2017/03/23 21:34:56', 'unconfirmed', 0, 0, 0, NULL, '0'),
(111, '', 177, 0, '', '2017/03/24 22:55:14', 'unconfirmed', 0, 0, 0, NULL, '0'),
(112, '', 182, 0, '', '2017/03/25 14:39:27', 'unconfirmed', 0, 0, 0, NULL, '0'),
(113, '', 184, 0, '', '2017/03/25 19:35:33', 'unconfirmed', 0, 0, 0, NULL, '0'),
(114, '', 185, 0, '', '2017/03/25 20:05:40', 'unconfirmed', 0, 0, 0, NULL, '0'),
(115, '', 178, 0, '', '2017/03/25 20:20:33', 'unconfirmed', 0, 0, 0, NULL, '0'),
(117, '', 188, 0, '', '2017/04/02 15:14:09', 'unconfirmed', 0, 0, 0, NULL, '0'),
(118, '', 190, 0, '', '2017/04/02 16:11:02', 'unconfirmed', 0, 0, 0, NULL, '0'),
(119, '', 191, 0, '', '2017/04/02 17:53:07', 'unconfirmed', 0, 0, 0, NULL, '0'),
(120, '', 192, 0, '', '2017/04/02 18:01:52', 'unconfirmed', 0, 0, 0, NULL, '0'),
(121, '', 193, 0, '', '2017/04/02 18:07:53', 'unconfirmed', 0, 0, 0, NULL, '0'),
(122, '', 194, 0, '', '2017/04/02 18:24:33', 'unconfirmed', 0, 0, 0, NULL, '0'),
(123, '', 197, 0, '', '2017/04/02 19:42:24', 'unconfirmed', 0, 0, 0, NULL, '0'),
(124, '', 201, 0, '', '2017/04/02 20:23:52', 'unconfirmed', 0, 0, 0, NULL, '0'),
(125, '', 202, 0, '', '2017/04/02 20:33:36', 'unconfirmed', 0, 0, 0, NULL, '0'),
(126, '', 204, 0, '', '2017/04/03 14:40:57', 'unconfirmed', 0, 0, 0, NULL, '0'),
(127, '', 208, 0, '', '2017/04/04 16:11:11', 'unconfirmed', 0, 0, 0, NULL, '0'),
(128, '', 210, 0, '', '2017/04/05 20:24:25', 'unconfirmed', 0, 0, 0, NULL, '0'),
(129, '', 213, 0, '', '2017/04/05 20:37:26', 'unconfirmed', 0, 0, 0, NULL, '0'),
(130, '', 214, 0, '', '2017/04/08 19:01:08', 'unconfirmed', 0, 0, 0, NULL, '0'),
(131, '', 215, 0, '', '2017/04/09 10:03:29', 'unconfirmed', 0, 0, 0, NULL, '0'),
(132, '', 216, 0, '', '2017/04/09 11:29:07', 'unconfirmed', 0, 0, 0, NULL, '0'),
(133, '', 220, 0, '', '2017/04/11 11:42:43', 'unconfirmed', 0, 0, 0, NULL, '0'),
(134, '', 221, 0, '', '2017/04/13 13:51:32', 'unconfirmed', 0, 0, 0, NULL, '0'),
(135, '', 207, 0, '', '2017/04/13 16:32:54', 'unconfirmed', 0, 0, 0, NULL, '0'),
(136, '', 222, 0, '', '2017/04/13 22:04:20', 'unconfirmed', 0, 0, 0, NULL, '0'),
(137, '', 223, 0, '', '2017/04/14 00:36:28', 'unconfirmed', 0, 0, 0, NULL, '0'),
(138, '', 225, 0, '', '2017/04/14 11:47:45', 'unconfirmed', 0, 0, 0, NULL, '0'),
(139, '', 226, 0, '', '2017/04/14 20:47:04', 'unconfirmed', 0, 0, 0, NULL, '0'),
(143, '', 227, 0, '', '2017/04/14 21:48:02', 'unconfirmed', 0, 0, 0, NULL, '0'),
(144, '', 228, 0, '', '2017/04/15 00:11:02', 'unconfirmed', 0, 0, 0, NULL, '0'),
(145, '', 229, 0, '', '2017/04/15 10:46:15', 'unconfirmed', 0, 0, 0, NULL, '0'),
(146, '', 231, 0, '', '2017/04/15 18:07:54', 'unconfirmed', 0, 0, 0, NULL, '0'),
(147, '', 233, 0, '', '2017/04/15 18:41:40', 'unconfirmed', 0, 0, 0, NULL, '0'),
(159, 'dgd', 234, 0, 'رضا سعیدی', '2017/04/15 23:10:17', 'confirmed', 1, 1, 0, 'یلبل-یبی', 'یبیبی'),
(160, 'nm j', 234, 1, 'nmk jb', '2017/04/15 23:33:37', 'confirmed', 1, 1, 0, 'jk-bi', 'jb'),
(162, '', 234, 0, '', '2017/04/16 00:38:26', 'unconfirmed', 0, 0, 0, NULL, NULL),
(164, 'reza@', 4, 1, 'reza fahimi', '2017/04/16 17:15:36', 'confirmed', 1, 1, 0, 'jgjug-575575', '78686'),
(165, '', 4, 0, '', '2017/04/16 17:31:59', 'unconfirmed', 0, 0, 0, NULL, NULL),
(166, '', 1, 0, 'alma dfgfg', '2017/04/18 19:28:00', 'confirmed', 1, 1, 0, 'df-fsfs', 'df'),
(167, '', 5, 0, '', '2017/04/17 16:09:43', 'unconfirmed', 0, 0, 0, NULL, NULL),
(168, '', 6, 0, '', '2017/04/17 16:24:21', 'unconfirmed', 0, 0, 0, NULL, NULL),
(169, '', 9, 0, '', '2017/04/18 12:50:45', 'unconfirmed', 0, 0, 0, NULL, NULL),
(170, '', 11, 0, '', '2017/04/18 13:10:40', 'unconfirmed', 0, 0, 0, NULL, NULL),
(171, '', 12, 0, '', '2017/04/18 17:50:00', 'unconfirmed', 0, 0, 0, NULL, NULL),
(172, 'alma68@gmail.com', 1, 0, 'alma zia', '2017/04/18 20:18:58', 'confirmed', 1, 1, 0, 'انقلاب -خیابان 11 فروردین-تقاطع-', ''),
(173, '', 13, 0, '', '2017/04/18 19:26:52', 'unconfirmed', 0, 0, 0, NULL, NULL),
(174, '', 1, 0, 'alma zia', '2017/04/18 19:28:27', 'confirmed', 1, 1, 0, 'انقلاب -خیابان 11 فروردین-تقاطع-', ''),
(175, '', 1, 0, 'alma zia', '2017/04/18 20:17:48', 'confirmed', 1, 1, 0, 'fsf-dfdsf', 'dsfd'),
(176, 'alma68@gmail.com', 1, 0, 'alma zia', '2017/04/18 20:19:23', 'confirmed', 1, 1, 0, 'انقلاب -خیابان 11 فروردین-تقاطع-', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(20) NOT NULL,
  `invoice_id` int(20) NOT NULL,
  `product_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `order_count` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=495 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `invoice_id`, `product_id`, `order_count`) VALUES
(17, 6, 'flower-20', 1),
(18, 6, 'flower-30', 2),
(19, 6, 'flower-50', 1),
(21, 7, 'flower-20', 1),
(22, 7, 'flower-30', 1),
(23, 8, 'seed-20', 2),
(24, 8, 'ref_RT52', 1),
(25, 9, 'flower-50', 1),
(26, 9, 'mob_GalaxyS7 ', 1),
(27, 10, 'flower-20', 1),
(28, 10, 'flower-30', 1),
(29, 10, 'flower-50', 1),
(30, 11, 'flower-50', 1),
(31, 11, 'mob_GalaxyS7 ', 1),
(32, 12, 'flower-30', 2),
(33, 12, 'flower-20', 1),
(34, 12, 'flower-50', 1),
(36, 14, 'flower-21', 11),
(37, 15, 'flower-50', 29),
(38, 16, 'flower-50', 29),
(39, 17, 'flower-24', 29),
(40, 18, 'flower-24', 29),
(41, 19, 'flower-24', 29),
(42, 20, 'flower-20', 1),
(43, 21, 'flower-20', 1),
(44, 21, 'flower-21', 1),
(49, 21, 'flower-27', 1),
(50, 21, '0', 1),
(51, 21, '', 1),
(52, 22, 'seed-20', 2),
(53, 22, 'flower-50', 1),
(54, 22, 'flower-22', 21),
(55, 23, 'flower-20', 3),
(56, 23, 'flower-23', 1),
(57, 22, 'flower-23', 1),
(58, 22, 'flower-27', 1),
(59, 22, 'flower-21', 1),
(61, 24, 'flower-27', 1),
(62, 24, 'seed-20', 1),
(63, 24, 'flower-24', 1),
(64, 24, 'fruit10', 1),
(65, 23, 'fruit11', 20),
(66, 23, 'fruit1', 2),
(67, 23, 'fruit10', 1),
(68, 23, 'flower-21', 1),
(69, 25, 'flower-21', 1),
(70, 25, 'flower-22', 1),
(71, 25, 'flower-24', 1),
(72, 25, 'fruit11', 1),
(73, 26, 'fruit11', 1),
(75, 161, 'fruit11', 1),
(76, 161, 'fruit10', 1),
(77, 28, 'fruit10', 1),
(78, 28, 'fruit1', 3),
(79, 28, 'fruit11', 1),
(80, 28, 'fruit12', 1),
(81, 28, 'fruit3', 3),
(82, 28, 'fruit4', 2),
(83, 28, 'flower-21', 2),
(84, 28, 'flower-30', 1),
(85, 29, 'fruit1', 2),
(86, 30, 'fruit10', 1),
(87, 31, 'fruit12', 1),
(88, 32, 'fruit1', 1),
(89, 32, 'flower-28', 1),
(90, 33, 'flower-20', 1),
(91, 34, 'fruit11', 1),
(92, 35, 'flower-22', 1),
(93, 36, 'fruit1', 1),
(94, 36, 'fruit10', 1),
(95, 36, 'flower-20', 1),
(97, 38, 'flower-21', 1),
(98, 38, 'flower-50', 1),
(99, 39, 'flower-20', 1),
(100, 39, 'flower-50', 3),
(102, 40, 'fruit11', 17),
(104, 40, 'fruit12', 15),
(117, 41, 'fruit1', 23),
(118, 41, 'fruit11', 1),
(120, 41, 'flower-22', 17),
(126, 41, 'fruit4', 1),
(127, 41, 'flower-25', 1),
(129, 37, 'fruit11', 16),
(131, 40, 'flower-50', 1),
(132, 37, 'fruit10', 1),
(133, 42, 'flower29', 1),
(134, 42, 'fruit1', 1),
(135, 43, 'flower-21', 9),
(136, 43, 'fruit1', 1),
(137, 43, 'fruit11', 1),
(138, 37, 'flower-20', 1),
(141, 44, 'fruit1', 1),
(142, 44, 'fruit3', 1),
(143, 44, 'flower31', 14),
(144, 45, 'flower-30', 1),
(145, 46, 'fruit10', 15),
(146, 46, 'flower-21', 1),
(147, 46, 'fruit11', 1),
(148, 46, 'fruit12', 1),
(149, 47, 'flower-20', 17),
(150, 48, 'fruit1', 20),
(151, 48, 'flower-30', 1),
(152, 49, 'fruit11', 1),
(153, 49, 'flower-24', 1),
(154, 49, 'fruit10', 18),
(155, 50, 'flower-21', 1),
(156, 51, 'flower31', 1),
(157, 51, 'flower-22', 1),
(158, 52, 'fruit1', 1),
(159, 53, 'flower-21', 7),
(160, 53, 'flower-22', 1),
(162, 54, 'fruit2', 12),
(163, 54, 'fruit10', 7),
(164, 54, 'flower-28', 1),
(165, 55, 'flower-26', 1),
(166, 55, 'flower-21', 1),
(167, 56, 'flower-22', 5),
(168, 56, 'fruit7', 1),
(175, 56, 'fruit3', 1),
(176, 56, 'fruit4', 1),
(178, 57, 'fruit11', 1),
(179, 57, 'flower-50', 1),
(180, 58, 'flower-22', 1),
(187, 60, 'tools-2', 29),
(188, 61, 'tools-2', 29),
(189, 62, 'tools-2', 29),
(190, 63, 'tools-2', 29),
(191, 64, 'flower31', 29),
(192, 65, 'flower31', 29),
(193, 66, 'flower31', 29),
(194, 59, 'flower-20', 1),
(195, 67, 'seed-20', 1),
(196, 68, 'tools-2', 1),
(197, 69, 'tools-3', 1),
(198, 67, 'fruit1', 1),
(216, 79, 'fruit11', 1),
(218, 80, 'fruit6', 1),
(219, 81, 'seed-20', 1),
(220, 82, 'fruit3', 1),
(222, 84, 'tools-3', 1),
(223, 85, 'fruit2', 1),
(224, 86, 'fruit2', 1),
(233, 95, 'fruit2', 1),
(234, 96, 'fruit2', 1),
(235, 97, 'fruit2', 1),
(237, 99, 'fruit2', 1),
(239, 100, 'fruit2', 1),
(241, 101, 'fruit2', 1),
(243, 102, 'fruit2', 1),
(244, 102, 'fruit12', 1),
(246, 103, 'fruit2', 1),
(247, 104, 'fruit2', 1),
(248, 104, 'fruit1', 1),
(249, 105, 'fruit2', 1),
(253, 106, 'fruit2', 1),
(255, 107, 'fruit2', 1),
(258, 108, 'fruit2', 1),
(261, 109, 'fruit2', 1),
(262, 110, 'tools-4', 1),
(264, 111, 'fruit2', 1),
(265, 112, 'fruit5', 1),
(269, 113, 'fruit2', 1),
(270, 114, 'fruit1', 1),
(271, 115, 'fruit10', 1),
(272, 116, 'fruit2', 1),
(273, 116, 'fruit13', 1),
(274, 117, 'fruit1', 5),
(275, 117, 'tools-4', 7),
(278, 119, 'fruit1', 1),
(282, 122, 'tools-1', 1),
(287, 127, 'fruit1', 1),
(290, 130, 'flower-20', 1),
(293, 132, 'flower-21', 1),
(298, 70, 'fruit10', 1),
(300, 70, 'seed-20', 1),
(301, 70, 'fruit1', 1),
(305, 139, 'flower-21', 1),
(306, 141, 'flower-22', 1),
(307, 141, 'flower-24', 1),
(308, 140, 'tools-2', 1),
(309, 141, 'flower-21', 1),
(311, 143, 'tools-3', 1),
(312, 142, 'seed-20', 1),
(313, 142, 'seed-2', 1),
(314, 142, 'seed-3', 1),
(315, 143, 'flower-21', 1),
(316, 142, 'flower-22', 1),
(317, 142, 'flower-24', 1),
(318, 143, 'flower-26', 1),
(319, 142, 'flower-25', 1),
(320, 142, 'flower-20', 18),
(321, 142, 'flower-21', 1),
(322, 142, 'flower-26', 1),
(323, 142, 'tools-1', 1),
(324, 142, 'fruit12', 1),
(325, 146, 'seed-2', 1),
(326, 142, 'tools-2', 1),
(327, 148, 'fruit1', 1),
(328, 149, 'flower-20', 1),
(329, 150, 'flower-21', 1),
(330, 150, 'flower-22', 1),
(331, 150, 'flower-24', 1),
(332, 150, 'flower-25', 1),
(333, 151, 'flower-20', 1),
(334, 151, 'flower-50', 1),
(335, 152, 'flower-50', 1),
(336, 153, 'fruit10', 1),
(337, 154, 'flower-20', 1),
(338, 155, 'flower-20', 1),
(339, 156, 'seed-2', 1),
(340, 157, 'tools-1', 1),
(341, 158, 'seed-20', 1),
(342, 159, 'fruit10', 1),
(343, 160, 'flower-22', 1),
(344, 161, 'tools-1', 14),
(345, 162, 'fruit1', 1),
(346, 162, 'fruit11', 1),
(347, 161, 'fruit12', 1),
(348, 163, 'seed-20', 4),
(349, 163, 'tools-1', 1),
(350, 164, 'flower-50', 1),
(351, 163, 'flower-25', 1),
(352, 163, 'flower-27', 1),
(355, 168, 'seed-2', 1),
(484, 172, 'flower-22', 1),
(485, 172, 'flower-24', 1),
(486, 172, 'flower-26', 1),
(487, 172, 'flower-27', 1),
(488, 166, 'flower-20', 1),
(489, 166, 'flower-50', 1),
(490, 174, 'fruit6', 1),
(492, 175, 'fruit10', 1),
(493, 175, 'fruit11', 1),
(494, 176, 'flower-20', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ordersperproduct`
--
CREATE TABLE IF NOT EXISTS `ordersperproduct` (
`Product_id` varchar(20)
,`TotalQuantity` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `pcomments`
--

CREATE TABLE IF NOT EXISTS `pcomments` (
  `comment_id` int(11) NOT NULL,
  `comment_product_id` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `comment_customer_id` int(11) NOT NULL,
  `comment_customer_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `comment_desc` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `comment_rating1` decimal(2,1) DEFAULT NULL,
  `comment_rating2` decimal(2,1) DEFAULT NULL,
  `comment_rating3` decimal(2,1) DEFAULT NULL,
  `comment_state` varchar(4) COLLATE utf8_persian_ci NOT NULL DEFAULT 'hide'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `pcomments`
--

INSERT INTO `pcomments` (`comment_id`, `comment_product_id`, `comment_customer_id`, `comment_customer_name`, `comment_desc`, `comment_rating1`, `comment_rating2`, `comment_rating3`, `comment_state`) VALUES
(9, 'fruit1', 220, 'سعیده', 'سلام خیلی خوب بود', '2.5', '4.0', '3.5', 'show'),
(10, 'flower-26', 220, 'رضا', ' عطر رز آرامش بخش سامانه عصبی است و در راحت به خواب رفتن انسان کارایی دارد و به همین سبب در عطردرمانی بکار برده می‌شود. اسانس رز گرانترین اسانس دنیا است و هر گرم آن معادل یک گرم طلا در بازار جهانی قیمت دارد. گل رز از نظر کثرت قرار گرفتن در جایگاه گل ملی مقام نخست را در میان همه گل‌ها دارد و در ۱۰ کشورِ ایران، آمریکا، انگلستان، ایتالیا، رومانی، عراق، عربستان سعودی، مراکش، لوکزامبورگ و بلغارستان به عنوان گل ملی انتخاب شده‌است.', '2.5', '3.5', '4.0', 'show'),
(11, 'flower-25', 220, 'سمانه', ' عطر رز آرامش بخش سامانه عصبی است و در راحت به خواب رفتن انسان کارایی دارد و به همین سبب در عطردرمانی بکار برده می‌شود. اسانس رز گرانترین اسانس دنیا است و هر گرم آن معادل یک گرم طلا در بازار جهانی قیمت دارد. گل رز از نظر کثرت قرار گرفتن در جایگاه گل ملی مقام نخست را در میان همه گل‌ها دارد و در ۱۰ کشورِ ایران، آمریکا، انگلستان، ایتالیا، رومانی، عراق، عربستان سعودی، مراکش، لوکزامبورگ و بلغارستان به عنوان گل ملی انتخاب شده‌است.', '3.0', '3.0', '3.5', 'show'),
(13, 'flower-28', 220, 'شمس', ' عطر رز آرامش بخش سامانه عصبی است و در راحت به خواب رفتن انسان کارایی دارد و به همین سبب در عطردرمانی بکار برده می‌شود. اسانس رز گرانترین اسانس دنیا است و هر گرم آن معادل یک گرم طلا در بازار جهانی قیمت دارد. گل رز از نظر کثرت قرار گرفتن در جایگاه گل ملی مقام نخست را در میان همه گل‌ها دارد و در ۱۰ کشورِ ایران، آمریکا، انگلستان، ایتالیا، رومانی، عراق، عربستان سعودی، مراکش، لوکزامبورگ و بلغارستان به عنوان گل ملی انتخاب شده‌است.', '0.0', '0.0', '0.0', 'hide'),
(14, 'flower-28', 220, 'رزا', 'همانطور که می دانید گیاهان علاوه بر آب احتیاج به غذ دارند . برای این منظور هر شش بار که به گلدان آب داده اید ، یکبار باید به گلدان غذا بدهید . که در تابستان این مدت کمتر و در زمستان این مدت طولانی تر می شود .', '3.5', '4.0', '1.5', 'show'),
(27, 'tools-4', 220, 'دانیال رحیمی', 'خیلی زیبا هستند اما کیفیتشون به اون اندازه خوب نیست.', '0.0', '0.0', '0.0', 'hide'),
(31, 'fruit13', 220, 'سولی', 'مثل عکسش بود و خوشمزه.', '1.5', '0.0', '0.0', 'show'),
(35, 'flower-30', 1, 'علی', 'من خریدم خیلی قشنگه و مقاومت خوبی داره اما خیلی تمیز نبود', '2.0', '5.0', '4.0', 'show'),
(36, 'fruit2', 1, 'آلما', 'خوشمزه و تازه بود', '3.5', '1.0', '3.0', 'show'),
(37, 'fruit2', 1, 'آریا', 'گلابیتون خیلی خوب و آبدار بود، از کدوم شهر هستند؟', '3.5', '3.0', '3.5', 'show'),
(38, 'fruit2', 231, 'saman', 'hamash na moojoodeh!', '2.0', '4.0', '4.0', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `cat_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `brand_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `product_title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `product_width` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_height` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_depth` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_weight` varchar(6) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_color` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_capacity` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_size` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_qty` int(10) DEFAULT NULL,
  `product_price` varchar(9) COLLATE utf8_persian_ci NOT NULL,
  `product_warranty` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_exist` tinyint(1) NOT NULL,
  `product_date` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_desc` varchar(20000) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_extra` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_pic` varchar(50) COLLATE utf8_persian_ci NOT NULL DEFAULT 'default_product.png',
  `product_rate` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `product_name`, `product_title`, `product_width`, `product_height`, `product_depth`, `product_weight`, `product_color`, `product_capacity`, `product_size`, `product_qty`, `product_price`, `product_warranty`, `product_exist`, `product_date`, `product_desc`, `product_extra`, `product_pic`, `product_rate`) VALUES
('flower-20', '32', '3', 'raziane', 'گیاه رازیانه', NULL, NULL, NULL, '', 'red', NULL, '', NULL, '3000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'raziane.JPG', '2.5'),
('flower-21', '28', '3', 'davoodi', 'داوودی', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '40000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.\r\nگل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.\r\nگل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.\r\nگل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'davoodi.jpg', '3.5'),
('flower-22', '28', '3', 'lale', 'لاله', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '50000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'lale.JPG', '4.5'),
('flower-24', '28', '3', 'rose', 'رز', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '7000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'rose.JPG', '2.0'),
('flower-25', '28', '2', 'narges', 'نرگس', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '6000', '', 0, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'narges.jpg', '2.4'),
('flower-26', '28', '3', 'shaghaegh', 'شقایق', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '50000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'shaghaegh.jpg', '3.9'),
('flower-27', '28', '3', 'banafshe', 'بنفشه', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '6000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'banafshe.jpg', '2.5'),
('flower-28', '28', '2', 'alale', 'گل آلاله', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '2000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'alale.JPG', '2.3'),
('flower-30', '28', '2', 'shemshad', 'شمشاد', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '776666', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'shemshad.jpg', '5.0'),
('flower-50', '32', '2', 'sarakhs', 'سرخس', NULL, NULL, NULL, '', 'blue', NULL, '', NULL, '40000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'sarakhs.jpg', '1.8'),
('flower29', '28', '3', 'aloevera', 'گیاه آلوئه ورا', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '555300', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'aloevera.JPG', '1.0'),
('flower31', '28', '2', 'cactus 2', 'کاکتوس', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '40000', '', 0, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'cactus 2.jpg', '3.0'),
('fruit1', '3', '2', 'orange', 'پرتقال', NULL, NULL, NULL, '250 ک', NULL, NULL, '20*20*20', NULL, '4556000', 'hh', 1, '666', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است.\r\nتمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است.\r\nتمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است.\r\nتمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است.', NULL, 'orange.jpg', '3.4'),
('fruit10', '3', '2', 'Quince', 'به', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '555300', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است\r\nتمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است\r\nتمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است.', NULL, 'Quince.jpg', '3.2'),
('fruit11', '3', '2', 'blackberry', 'تمشک', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '8000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'blackberry.jpg', '2.2'),
('fruit12', '3', '2', 'kiwi', 'کیوی', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '776666', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'kiwi.jpg', '3.6'),
('fruit13', '3', '2', 'Cherry', 'گیلاس', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '6000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'Cherry.jpg', '1.5'),
('fruit2', '3', '2', 'golabi', 'گلابی', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '50000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'golabi.jpg', '2.5'),
('fruit3', '3', '2', 'apple', 'سیب', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '50000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'apple.jpg', NULL),
('fruit4', '3', '2', 'pineapple', 'آناناس', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '50000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'pineapple.jpg', NULL),
('fruit5', '3', '2', 'banana', 'موز', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '6000', '', 0, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'banana.png', '1.3'),
('fruit6', '3', '2', 'pomegranate ', 'انار', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '776666', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'pomegranate .jpg', '2.7'),
('fruit7', '3', '2', 'peach ', 'هلو', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '80000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'peach .jpg', NULL),
('fruit9', '3', '2', 'Mango', 'انبه', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '90000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'Mango.jpg', '2.8'),
('seed-2', '33', '2', 'banafshe-seed', 'دانه بنفشه', NULL, NULL, NULL, '1000', NULL, NULL, '3*2*1', NULL, '12000', '', 1, '', 'دانه ی بنفشه در رنگ های مختلف', NULL, 'banafshe-seed.png', '3.4'),
('seed-20', '33', '2', 'shabboo seed', 'دانه ی گل شب بو', NULL, NULL, NULL, '', 'yellow', NULL, '', NULL, '20000', 'ایران ', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'shabboo seed.jpg', '0.0'),
('seed-3', '33', '3', 'rose-seed', 'دانه گل رز', NULL, NULL, NULL, '1000', NULL, NULL, '20', NULL, '12000', '', 1, '', 'دانه گل رز در رنگ های مختلف', NULL, 'rose-seed.png', '3.0'),
('tools-1', '34', '2', 'tools', 'قیچی باغچه', NULL, NULL, NULL, '20', NULL, NULL, '12*14*15', NULL, '30000', '', 1, '', 'این قیچی از برند معروف سرزمین سبز است و برای کوتاه کردن درختان و بوته ها به کار می رود', NULL, 'tools.jpg', '2.3'),
('tools-2', '34', '3', 'garden sissors', 'مجموعه ابزار باغچه', NULL, NULL, NULL, '34', NULL, NULL, '12*14*15', NULL, '56777000', '', 1, '', 'این محصولات برای کارهای عادی باغچه به کمک شما می آیند.', NULL, 'garden sissors.jpg', '2.1'),
('tools-3', '34', '3', 'garden-tools-collection', 'مجموعه ابزار گل کاری', NULL, NULL, NULL, '34', NULL, NULL, '60*60*60', NULL, '12000', '', 1, '', 'این محصولات برای کارهای عادی باغچه به کمک شما می آیند.', NULL, 'garden-tools-collection.jpg', '3.5'),
('tools-4', '34', '3', 'garden-tools-ex', 'بیل های باغکاری', NULL, NULL, NULL, '14', NULL, NULL, '12*14*15', NULL, '1590000', '', 1, '', 'این بیل ها از برند معروف سرزمین سبز است و برای کوتاه کردن درختان و بوته ها به کار می رود', NULL, 'garden-tools-ex.jpg', '2.7');

-- --------------------------------------------------------

--
-- Stand-in structure for view `productsales`
--
CREATE TABLE IF NOT EXISTS `productsales` (
`product_id` varchar(20)
,`product_title` varchar(50)
,`product_name` varchar(50)
,`product_pic` varchar(50)
,`product_price` varchar(9)
,`TotalQuantity` decimal(32,0)
,`totalsale` double
);

-- --------------------------------------------------------

--
-- Structure for view `ordersperproduct`
--
DROP TABLE IF EXISTS `ordersperproduct`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ordersperproduct` AS select `orders`.`product_id` AS `Product_id`,sum(`orders`.`order_count`) AS `TotalQuantity` from `orders` where `orders`.`invoice_id` in (select `invoices`.`invoice_id` from `invoices` where (`invoices`.`invoice_state` = 'confirmed')) group by `orders`.`product_id` order by `TotalQuantity` desc;

-- --------------------------------------------------------

--
-- Structure for view `productsales`
--
DROP TABLE IF EXISTS `productsales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productsales` AS select `products`.`product_id` AS `product_id`,`products`.`product_title` AS `product_title`,`products`.`product_name` AS `product_name`,`products`.`product_pic` AS `product_pic`,`products`.`product_price` AS `product_price`,`ordersperproduct`.`TotalQuantity` AS `TotalQuantity`,(`products`.`product_price` * `ordersperproduct`.`TotalQuantity`) AS `totalsale` from (`ordersperproduct` join `products` on((`products`.`product_id` = `ordersperproduct`.`Product_id`))) order by (`products`.`product_price` * `ordersperproduct`.`TotalQuantity`) desc;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pcomments`
--
ALTER TABLE `pcomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=495;
--
-- AUTO_INCREMENT for table `pcomments`
--
ALTER TABLE `pcomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
