-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 04:43 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

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
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(20) NOT NULL,
  `brand_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `brand_alias` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `brand_desc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_alias`, `logo`, `brand_desc`) VALUES
(2, 'سونی', 'sony', 'sony.jpg', 'برند سونی متعلق به کشور ژاپن است که...'),
(3, 'ال جی', 'LG', 'LG.jpg', 'برند ال جی متعلق به کشور کره جنوبی است که ...'),
(4, 'سامسونگ', 'samsung', 'samsung.jpg', 'برند سامسونگ متعلق به کشور کره جنوبی است که...'),
(5, 'جنرال الکتریک', 'GeneralElectic', 'GeneralElectic.jpg', ' این برند متعلق به کشور آمریکاست که ...'),
(7, 'برند', 'brand', 'sample_brand.jpg', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(20) NOT NULL,
  `cat_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cat_alias` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cat_desc` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cat_pic` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_alias`, `cat_desc`, `cat_pic`) VALUES
(3, 'کالای دیجیتال', 'digital', '', 'digital.jpg'),
(28, 'کالای ورزشی', '', '', 'sample_category.png'),
(32, 'اسباب بازی', '', 'توضیحات', 'sample_category.png'),
(33, 'یخچال وفریزر', ' Refrigerator', 'شامل ساید و...', ' Refrigerator.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_family` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_alias` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_type` tinyint(1) NOT NULL,
  `customer_company_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_tel` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_mobile` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `customer_address` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_postal_code` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_sex` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `customer_pic` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_family`, `customer_alias`, `customer_type`, `customer_company_name`, `customer_tel`, `customer_mobile`, `customer_email`, `customer_address`, `customer_postal_code`, `customer_sex`, `customer_pic`) VALUES
(1, 'آرام', 'احمدی', '', 0, '', '1111111', '093555676', 'aa@gmail.com', 'تهران', '2323232', '1', 'aram.jpg'),
(2, 'آرمان', 'آرمانی', 'armani', 0, '', '8888888', '09353333', 'ddd@gmail.com', 'تهران', '111111', '0', 'sample_customer.jpg'),
(6, 'آرام', 'آرمانی', 'armani', 1, 'داده پردازی ', '67676575', '09356777', 'ss@gmail.com', 'تهران', '324343434', '1', 'sample_customer.jpg'),
(7, 'محمود ', 'رزمجو', 'razmjoo', 1, 'آسمان', '23232', '0987866', 'ss@gmail.com', 'تهران', '434343223', '0', 'sample_customer.jpg'),
(8, 'الهه', 'مردانی', 'mardani', 0, '', '2342232', '091313', 'ss@gmail.com', 'تهران', '1313131', '1', 'sample_customer.jpg'),
(9, 'داوود', 'احسانی', 'ehsan', 0, '', '56565', '0987766', 'ss@gmail.com', 'تهران', '34342342', '0', 'sample_customer.jpg'),
(10, 'زهرا ', 'محرابی', 'mehrabi', 1, 'سازه گستر', '232323232', '987635533', 'ss@gmail.com', 'تهران', '21321321321', '1', 'sample_customer.jpg'),
(11, 'محمد', 'یگانه', 'yeganeh', 1, 'تابان', '757575', '97654433', 'ss@gmail.com', 'تهران', '4524243232', '0', 'sample_customer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `invoice_date` varchar(19) COLLATE utf8_persian_ci NOT NULL,
  `invoice_state` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `invoice_delivery` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `invoice_payment` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `invoice_address` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(20) NOT NULL,
  `invoice_id` int(20) NOT NULL,
  `product_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `order_count` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `cat_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `brand_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `product_alias` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `product_size` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_weight` varchar(6) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_date` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_price` varchar(9) COLLATE utf8_persian_ci NOT NULL,
  `product_warranty` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_exist` tinyint(1) NOT NULL,
  `product_pic` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `brand_id`, `product_name`, `product_alias`, `product_size`, `product_weight`, `product_date`, `product_price`, `product_warranty`, `product_exist`, `product_pic`) VALUES
('mob_GalaxyS7 ', '3', '3', 'گوشی موبایل سامسونگ مدل Galaxy S7 Edge SM-G935FDv', 'Galaxy S7 Edge SM-G935FDv', '', '', '', '25450000', '12ماه', 1, 'Galaxy S7 Edge SM-G935FDv.jpg'),
('ref_RT52', '33', '3', 'یخچال فریزر سامسونگ مدل RT52', ' RT52', '', '', '', '26300000', '123 ماه سام سرویس', 1, ' RT52.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
