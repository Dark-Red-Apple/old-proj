-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2016 at 01:11 PM
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
  `logo` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `brand_desc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_title`, `logo`, `brand_desc`) VALUES
(2, '   sarzamin sabz', 'سرزمین سبز', '   sarzamin sabz.jpg', '   sarzamin sabz'),
(3, 'beat seed', '', 'beat seed.jpg', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(20) NOT NULL,
  `cat_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cat_title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cat_desc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cat_pic` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_title`, `cat_desc`, `cat_pic`) VALUES
(3, 'fruits', 'میوه ها', '   ', 'fruits.jpg'),
(28, 'home folwers', 'گل های خانگی', '   ', 'home folwers.JPG'),
(32, 'yard flowers', 'گلهای باغچه', '   توضیحات', 'yard flowers.JPG'),
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
  `customer_sex` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_pic` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_is_guest` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_username`, `customer_pass`, `customer_name`, `customer_family`, `customer_title`, `customer_type`, `customer_company_name`, `customer_tel`, `customer_mobile`, `customer_email`, `customer_address`, `customer_postal_code`, `customer_sex`, `customer_pic`, `customer_is_guest`) VALUES
(1, 'user', '1', 'alma', '', 'alma', 0, '', '', '', '', '', '', '0', 'alma.jpg', 0),
(82, 'derry', '1', 'derry', 'zia', 'alma', 1, 'z', '44', '545', 'alma', 'gr', '66', 'female', 'sample_customer.png', 0),
(91, 'sara', '1', '', '', 'sara', 0, '', '', '', 'sara', '', '', '', 'sample_customer.png', 0),
(101, 'user1', '1', '', 'sd', 'fa', 0, '', '', '', 'aaa', '', '', '', 'sample_customer.png', 0),
(102, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1),
(103, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1),
(104, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1),
(105, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1),
(106, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1),
(107, '', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `invoice_date` varchar(19) COLLATE utf8_persian_ci NOT NULL,
  `invoice_state` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `invoice_delivery` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `invoice_payment` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `invoice_address` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `customer_id`, `invoice_date`, `invoice_state`, `invoice_delivery`, `invoice_payment`, `invoice_address`) VALUES
(6, 2, '2016/11/27 12:09:03', 'confirmed', '', '', NULL),
(7, 2, '2016/11/27 17:17:24', 'confirmed', '', '', NULL),
(8, 2, '2016/11/27 18:20:55', 'confirmed', '', '', NULL),
(9, 2, '2016/11/27 18:21:36', 'confirmed', '', '', NULL),
(10, 2, '2016/11/27 18:22:32', 'confirmed', '', '', NULL),
(11, 2, '2016/11/27 18:23:16', 'confirmed', '', '', NULL),
(12, 2, '2016/11/27 18:46:49', 'confirmed', '', '', NULL),
(13, 3, '2016/11/28 13:35:20', 'unconfirmed', '', '', NULL),
(14, 2, '2016/11/29 11:34:00', 'confirmed', '', '', NULL),
(15, 2, '2016/11/29 11:36:00', 'confirmed', '', '', NULL),
(16, 2, '2016/11/29 11:37:52', 'confirmed', '', '', NULL),
(17, 2, '2016/11/29 12:21:10', 'confirmed', '', '', NULL),
(18, 2, '2016/11/29 12:21:26', 'confirmed', '', '', NULL),
(19, 2, '2016/11/29 12:21:46', 'confirmed', '', '', NULL),
(20, 2, '2016/11/30 01:23:33', 'confirmed', '', '', NULL),
(21, 2, '2016/11/30 19:30:29', 'confirmed', '', '', NULL),
(22, 2, '2016/11/30 19:52:56', 'confirmed', '', '', NULL),
(23, 0, '2016/12/01 17:00:27', 'unconfirmed', '', '', NULL),
(24, 2, '2016/12/01 17:10:54', 'confirmed', '', '', NULL),
(25, 2, '2016/12/05 13:50:14', 'confirmed', '', '', NULL),
(26, 2, '2016/12/05 13:58:59', 'confirmed', '', '', NULL),
(27, 2, '2016/12/05 16:19:54', 'unconfirmed', '', '', NULL),
(28, 1, '2016/12/06 20:54:04', 'confirmed', '', '', NULL),
(29, 78, '2016/12/05 21:08:14', 'unconfirmed', '', '', NULL),
(30, 80, '2016/12/05 21:17:27', 'unconfirmed', '', '', NULL),
(31, 81, '2016/12/05 21:17:55', 'unconfirmed', '', '', NULL),
(32, 84, '2016/12/06 16:20:41', 'unconfirmed', '', '', NULL),
(33, 86, '2016/12/06 16:30:04', 'unconfirmed', '', '', NULL),
(34, 87, '2016/12/06 16:31:34', 'unconfirmed', '', '', NULL),
(35, 91, '2016/12/06 16:45:40', 'unconfirmed', '', '', NULL),
(36, 93, '2016/12/07 16:38:14', 'unconfirmed', '', '', NULL),
(37, 1, '2016/12/07 18:21:17', 'unconfirmed', '', '', NULL),
(38, 101, '2016/12/07 18:23:42', 'unconfirmed', '', '', NULL),
(39, 103, '2016/12/07 18:42:17', 'unconfirmed', '', '', NULL),
(40, 104, '2016/12/11 14:23:08', 'unconfirmed', '', '', NULL),
(41, 105, '2016/12/11 14:24:24', 'unconfirmed', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(20) NOT NULL,
  `invoice_id` int(20) NOT NULL,
  `product_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `order_count` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

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
(75, 27, 'fruit11', 1),
(76, 27, 'fruit10', 1),
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
(132, 37, 'fruit10', 1);

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
  `product_desc` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_extra` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_pic` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `product_name`, `product_title`, `product_width`, `product_height`, `product_depth`, `product_weight`, `product_color`, `product_capacity`, `product_size`, `product_qty`, `product_price`, `product_warranty`, `product_exist`, `product_date`, `product_desc`, `product_extra`, `product_pic`) VALUES
('flower-20', '32', '3', 'raziane', 'گیاه رازیانه', NULL, NULL, NULL, '', 'red', NULL, '', NULL, '3000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'raziane.JPG'),
('flower-21', '28', '3', 'davoodi', 'داوودی', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '40000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'davoodi.jpg'),
('flower-22', '28', '3', 'lale', 'لاله', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '50000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'lale.JPG'),
('flower-24', '28', '3', 'rose', 'رز', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '7000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'rose.JPG'),
('flower-25', '28', '2', 'narges', 'نرگس', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '6000', '', 0, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'narges.jpg'),
('flower-26', '28', '3', 'shaghaegh', 'شقایق', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '50000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'shaghaegh.jpg'),
('flower-27', '28', '3', 'banafshe', 'بنفشه', NULL, NULL, NULL, '', 'green', NULL, '', NULL, '6000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'banafshe.jpg'),
('flower-28', '28', '2', 'alale', 'گل آلاله', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '2000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'alale.JPG'),
('flower-30', '28', '2', 'shemshad', 'شمشاد', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '776666', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'shemshad.jpg'),
('flower-50', '32', '2', 'sarakhs', 'سرخس', NULL, NULL, NULL, '', 'blue', NULL, '', NULL, '40000', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'sarakhs.jpg'),
('flower29', '28', '3', 'aloevera', 'گیاه آلوئه ورا', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '555300', '', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'aloevera.JPG'),
('flower31', '28', '2', 'cactus 2', 'کاکتوس', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '40000', '', 0, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'cactus 2.jpg'),
('fruit1', '3', '2', 'orange', 'پرتقال', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '4556000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'orange.jpg'),
('fruit10', '3', '2', 'Quince', 'به', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '555300', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'Quince.jpg'),
('fruit11', '3', '2', 'blackberry', 'تمشک', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '8000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'blackberry.jpg'),
('fruit12', '3', '2', 'kiwi', 'کیوی', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '776666', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'kiwi.jpg'),
('fruit13', '3', '2', 'Cherry', 'گیلاس', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '6000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'Cherry.jpg'),
('fruit2', '3', '2', 'golabi', 'گلابی', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '50000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'golabi.jpg'),
('fruit3', '3', '2', 'apple', 'سیب', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '50000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'apple.jpg'),
('fruit4', '3', '2', 'pineapple', 'آناناس', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '50000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'pineapple.jpg'),
('fruit5', '3', '2', 'banana', 'موز', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '6000', '', 0, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'banana.png'),
('fruit6', '3', '2', 'pomegranate ', 'انار', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '776666', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'pomegranate .jpg'),
('fruit7', '3', '2', 'peach ', 'هلو', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '80000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'peach .jpg'),
('fruit9', '3', '2', 'Mango', 'انبه', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '90000', '', 1, '', 'تمشک (با نام علمی: Rubus fruticus) درختچه‌ای از تیره گلسرخیان است که به حالت وحشی در نقاطی مانند گیلان ،گلستان ،مازندران و آذربایجان فراوان است. در گیلان، گلستان، مازندران به این گیاه تمش، ولش، بولوش و بوروش، لبلبو و در آذربایجان بؤیورتکن می‌گویند. تمشک گیاهی است با ساقه‌های تیغ‌دار که در کنار جاده‌ها و مزارع و جنگل‌ها به صورت انبوه می‌روید برگهایش متناوب و گوشوارک‌دار و شامل ۳ تا ۵ برگچه است', NULL, 'Mango.jpg'),
('seed-20', '33', '2', 'shabboo seed', 'دانه ی گل شب بو', NULL, NULL, NULL, '', 'yellow', NULL, '', NULL, '20000', 'ایران ', 1, '', 'گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.گل رز یا گل سرخ گیاهی چندساله چوبی از جنس رزا (Rosa) و خانواده Rosaceae که دارای بیش از 100 گونه از گیاهان گل دار است می باشد.همه آنها دارای گل های زیبایی در رنگ های بسیار متنوع اعم از سفید تا زرد و قرمز هستند. اکثر گونه های آن بومی آسیا ، و بعضی گونه ها بومی اروپا ، شمال آمریکا و شمال غرب آفریقا میباشند.', NULL, 'shabboo seed.jpg');

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
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=133;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
