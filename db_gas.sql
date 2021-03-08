-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2020 at 05:00 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer`
--

CREATE TABLE `tbl_dealer` (
  `deal_id` varchar(50) NOT NULL,
  `deal_name` varchar(255) NOT NULL,
  `deal_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dealer`
--

INSERT INTO `tbl_dealer` (`deal_id`, `deal_name`, `deal_status`) VALUES
('DEL63001', 'สยาม', '1'),
('DEL63002', 'test', '1'),
('DEL63003', 'test2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_product`
--

CREATE TABLE `tbl_group_product` (
  `gr_id` varchar(10) NOT NULL,
  `gr_name` varchar(255) NOT NULL,
  `gr_status` varchar(50) NOT NULL,
  `type_pro_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_group_product`
--

INSERT INTO `tbl_group_product` (`gr_id`, `gr_name`, `gr_status`, `type_pro_id`) VALUES
('GP63001', 'แก๊ส', '1', 'TYP63001'),
('GP63002', 'test', '1', 'TYP63002'),
('GP63003', 'ด', '1', 'TYP63002'),
('GP63004', 'd', '1', 'TYP63001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pay_id` varchar(50) NOT NULL,
  `pay_total` int(11) NOT NULL,
  `pay_status` varchar(10) NOT NULL,
  `pay_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `pay_total`, `pay_status`, `pay_date`) VALUES
('PAY630001', 1200, '0', '2020-05-26'),
('PAY630002', 1500, '1', '2020-05-26'),
('PAY630003', 1500, '1', '2020-05-26'),
('PAY630004', 1500, '1', '2020-05-26'),
('PAY630005', 1500, '1', '2020-05-26'),
('PAY630006', 2400, '0', '2020-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` varchar(50) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_pic` varchar(255) NOT NULL,
  `group_id` varchar(50) NOT NULL,
  `deal_id` varchar(50) NOT NULL,
  `pro_status` varchar(10) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_name`, `pro_price`, `pro_pic`, `group_id`, `deal_id`, `pro_status`, `created_date`) VALUES
('PRO63001', 'แก๊ส 16KGgf', 100, 'PRO63001.JPG', 'GP63001', 'DEL63001', '1', '2020-05-25'),
('PRO63002', 'dha', 100, 'PRO63002.jpg', 'GP63001', 'DEL63003', '1', '2019-11-13'),
('PRO63003', 'd', 0, 'PRO63003.JPG', 'GP63002', 'DEL63001', '1', '2020-05-25'),
('PRO63004', 'd', 10, 'PRO63004.JPG', 'GP63003', 'DEL63001', '1', '2020-05-25'),
('PRO63005', 'd', 10, 'PRO63005.JPG', 'GP63001', 'DEL63002', '1', '2020-05-25'),
('PRO63006', 'ฟ', 1, 'PRO63006.jpg', 'GP63001', 'DEL63001', '1', '2020-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `sal_id` varchar(10) NOT NULL,
  `sal_status` varchar(10) NOT NULL,
  `sal_date` date NOT NULL,
  `pay_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`sal_id`, `sal_status`, `sal_date`, `pay_id`) VALUES
('SAL630001', '0', '2020-05-26', 'PAY630001'),
('SAL630002', '1', '2019-10-16', 'PAY630002'),
('SAL630003', '1', '2020-05-26', 'PAY630003'),
('SAL630004', '1', '2020-05-26', 'PAY630004'),
('SAL630005', '1', '2020-05-26', 'PAY630005'),
('SAL630006', '0', '2020-05-26', 'PAY630006');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_detail`
--

CREATE TABLE `tbl_sale_detail` (
  `sd_id` varchar(10) NOT NULL,
  `sd_amount` int(11) NOT NULL,
  `sd_total` int(11) NOT NULL,
  `sd_status` varchar(50) NOT NULL,
  `pro_id` varchar(50) NOT NULL,
  `sal_id` varchar(50) NOT NULL,
  `st_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sale_detail`
--

INSERT INTO `tbl_sale_detail` (`sd_id`, `sd_amount`, `sd_total`, `sd_status`, `pro_id`, `sal_id`, `st_id`) VALUES
('1', 10, 1000, '1', 'PRO63001', 'SAL630002', 'ST63003'),
('2', 10, 1000, '1', 'PRO63001', 'SAL630003', 'ST63003'),
('3', 10, 1000, '1', 'PRO63001', 'SAL630004', 'ST63003'),
('4', 10, 1000, '1', 'PRO63001', 'SAL630005', 'ST63003'),
('5', 5, 500, '1', 'PRO63002', 'SAL630005', 'ST63002'),
('6', 20, 2000, '0', 'PRO63001', 'SAL630006', 'ST63003'),
('7', 4, 400, '0', 'PRO63002', 'SAL630006', 'ST63002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `st_id` varchar(50) NOT NULL,
  `st_price` int(11) NOT NULL,
  `st_amount` int(11) NOT NULL,
  `st_status` varchar(50) NOT NULL,
  `st_date` date NOT NULL,
  `pro_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`st_id`, `st_price`, `st_amount`, `st_status`, `st_date`, `pro_id`) VALUES
('ST63001', 100, 10, '1', '2020-05-26', 'PRO63001'),
('ST63002', 3000, 1004, '1', '2020-04-22', 'PRO63002'),
('ST63003', 3000, 1020, '1', '2019-11-12', 'PRO63004'),
('ST63004', 50, 100, '1', '2020-05-26', 'PRO63003'),
('ST63005', 1000, 100, '1', '2020-05-27', 'PRO63001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_product`
--

CREATE TABLE `tbl_type_product` (
  `type_pro_id` varchar(50) NOT NULL,
  `type_pro_name` varchar(255) NOT NULL,
  `type_pro_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type_product`
--

INSERT INTO `tbl_type_product` (`type_pro_id`, `type_pro_name`, `type_pro_status`) VALUES
('TYP63001', 'แก๊ส', '1'),
('TYP63002', 'testa', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dealer`
--
ALTER TABLE `tbl_dealer`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `tbl_group_product`
--
ALTER TABLE `tbl_group_product`
  ADD PRIMARY KEY (`gr_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indexes for table `tbl_sale_detail`
--
ALTER TABLE `tbl_sale_detail`
  ADD PRIMARY KEY (`sd_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_type_product`
--
ALTER TABLE `tbl_type_product`
  ADD PRIMARY KEY (`type_pro_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
