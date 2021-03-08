-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 04:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mafearshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `dis_id` varchar(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `date_dis` date NOT NULL,
  `pd_id` varchar(255) NOT NULL,
  `amount_pro` int(11) NOT NULL,
  `status_dis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`dis_id`, `discount`, `date_dis`, `pd_id`, `amount_pro`, `status_dis`) VALUES
('DI6401001', 5, '0000-00-00', 'PD640101', 50, '1'),
('DI6401002', 15, '0000-00-00', 'PD640103', 50, '1'),
('DI6402001', 10, '0000-00-00', 'PD640701', 20, '1');

-- --------------------------------------------------------

--
-- Table structure for table `log_mafear`
--

CREATE TABLE `log_mafear` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `m_ss` varchar(255) NOT NULL,
  `date_log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_mafear`
--

INSERT INTO `log_mafear` (`id`, `emp_id`, `m_ss`, `date_log`) VALUES
(219, 'EMP64001', 'ได้ทำการยกเลิกพนักงาน', '2021-02-24 19:52:00'),
(220, 'EMP64001', 'ได้ทำการขายสินค้า', '2021-02-24 21:40:00'),
(221, 'EMP64001', 'ได้ทำการขายสินค้า', '2021-02-24 21:47:00'),
(222, 'EMP64001', 'ได้ทำการแก้ไขข้อมูลส่วนลด', '2021-02-26 09:29:00'),
(223, 'EMP64001', 'ได้ทำการแก้ไขข้อมูลส่วนลด', '2021-02-26 09:29:00'),
(224, 'EMP64001', 'ได้ทำการยกเลิกพนักงาน', '2021-02-26 09:53:00'),
(225, 'EMP64001', 'ได้ทำการยกเลิกการระงับพนักงาน', '2021-02-26 09:53:00'),
(226, 'EMP64001', 'ได้ทำการยกเลิกพนักงาน', '2021-02-26 09:54:00'),
(227, 'EMP64001', 'ได้ทำการขายสินค้า', '2021-02-26 09:57:00'),
(228, 'EMP64003', 'ได้ทำการขายสินค้า', '2021-03-08 10:46:00'),
(229, 'EMP64003', 'ได้ทำการขายสินค้า', '2021-03-08 10:54:00'),
(230, 'EMP64001', 'ได้ทำการขายสินค้า', '2021-03-08 15:16:00'),
(231, 'EMP64001', 'ได้ทำการขายสินค้า', '2021-03-08 15:17:00'),
(232, 'EMP64001', 'ได้ทำการขายสินค้า', '2021-03-08 15:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `paymant`
--

CREATE TABLE `paymant` (
  `pay_id` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `dis_id` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pay_date` datetime NOT NULL,
  `status_pay` varchar(10) NOT NULL,
  `type_pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymant`
--

INSERT INTO `paymant` (`pay_id`, `emp_id`, `dis_id`, `discount`, `total`, `pay_date`, `status_pay`, `type_pay`) VALUES
('PM6401001', 'EMP64001', '', 0, 2500, '2021-01-28 19:30:00', '1', 1),
('PM6401002', 'EMP64001', '', 0, 2500, '2021-01-28 19:31:00', '1', 1),
('PM6401003', 'EMP64001', '', 2500, 2500, '2021-01-28 19:34:00', '1', 2),
('PM6401004', 'EMP64001', '', 0, 2500, '2021-01-28 21:44:00', '1', 1),
('PM6401005', 'EMP64001', '', 6250, 0, '2021-01-28 21:55:00', '1', 1),
('PM6401006', 'EMP64001', '', 10000, 2500, '2021-01-28 21:59:00', '1', 2),
('PM6401007', 'EMP64001', '', 0, 10000, '2021-01-28 22:07:00', '1', 1),
('PM6401008', 'EMP64001', '', 10000, 40000, '2021-01-28 22:08:00', '1', 2),
('PM6402001', 'EMP64001', '', 0, 2500, '2021-02-09 13:32:00', '1', 1),
('PM6402002', 'EMP64001', '', 0, 5250, '2021-02-09 13:34:00', '1', 1),
('PM6402003', 'EMP64001', '', 0, 5000, '2021-02-09 13:36:00', '1', 1),
('PM6402004', 'EMP64001', '', 0, 1050, '2021-02-10 10:01:00', '1', 1),
('PM6402005', 'EMP64001', '', 0, 50000, '2021-02-10 10:11:00', '1', 1),
('PM6402006', 'EMP64001', '', 0, 2000, '2021-02-20 10:30:00', '1', 1),
('PM6402007', 'EMP64001', '', 1500, 1500, '2021-02-20 10:31:00', '1', 2),
('PM6402008', 'EMP64001', '', 4000, 11500, '2021-02-20 10:34:00', '1', 2),
('PM6402009', 'EMP64001', '', 0, 5000, '2021-02-20 10:36:00', '1', 1),
('PM6402010', 'EMP64001', '', 0, 70, '2021-02-24 21:40:00', '1', 0),
('PM6402011', 'EMP64001', '', 250, 17250, '2021-02-24 21:47:00', '1', 0),
('PM6402012', 'EMP64001', '', 200, 2800, '2021-02-26 09:57:00', '1', 0),
('PM6403001', 'EMP64003', '', 0, 1000, '2021-03-08 10:46:00', '1', 0),
('PM6403002', 'EMP64003', '', 500, 24500, '2021-03-08 10:54:00', '1', 0),
('PM6403003', 'EMP64001', '', 0, 250, '2021-03-08 15:16:00', '1', 0),
('PM6403004', 'EMP64001', '', 0, 250, '2021-03-08 15:17:00', '1', 0),
('PM6403005', 'EMP64001', '', 0, 2500, '2021-03-08 15:19:00', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymant_detail`
--

CREATE TABLE `paymant_detail` (
  `pay_id_det` int(11) NOT NULL,
  `pay_id` varchar(255) NOT NULL,
  `pay_pd_id` varchar(255) NOT NULL,
  `pay_total` int(11) NOT NULL,
  `amount_pay` int(11) NOT NULL,
  `total_dis_co` int(11) NOT NULL,
  `status_pay_det` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymant_detail`
--

INSERT INTO `paymant_detail` (`pay_id_det`, `pay_id`, `pay_pd_id`, `pay_total`, `amount_pay`, `total_dis_co`, `status_pay_det`) VALUES
(115, 'PM6401001', 'PD640101-001-C001', 2500, 10, 0, '1'),
(116, 'PM6401001', 'PD640101-001-C002', 2500, 10, 0, '1'),
(117, 'PM6401002', 'PD640102-001-C001', 12500, 50, 0, '1'),
(118, 'PM6401002', 'PD640102-001-C002', 2500, 10, 0, '1'),
(119, 'PM6401003', 'PD640101-001-C001', 10000, 50, 2500, '1'),
(120, 'PM6401003', 'PD640101-001-C002', 2500, 10, 0, '1'),
(121, 'PM6401004', 'PD640101-001-C001', 1250, 5, 0, '1'),
(122, 'PM6401004', 'PD640101-001-C002', 1250, 5, 0, '1'),
(123, 'PM6401004', 'PD640101-001-C003', 1250, 5, 0, '1'),
(124, 'PM6401004', 'PD640101-001-C004', 2500, 10, 0, '1'),
(125, 'PM6401005', 'PD640101-001-C001', 0, 5, 1250, '1'),
(126, 'PM6401005', 'PD640101-001-C002', 0, 5, 1250, '1'),
(127, 'PM6401005', 'PD640101-001-C003', 0, 5, 1250, '1'),
(128, 'PM6401005', 'PD640101-001-C004', 0, 10, 2500, '1'),
(129, 'PM6401006', 'PD640101-001-C001', 2500, 50, 2500, '1'),
(130, 'PM6401007', 'PD640101-001-C001', 2500, 10, 0, '1'),
(131, 'PM6401007', 'PD640101-001-C002', 2500, 10, 0, '1'),
(132, 'PM6401007', 'PD640101-001-C003', 2500, 10, 0, '1'),
(133, 'PM6401007', 'PD640101-001-C004', 2500, 10, 0, '1'),
(134, 'PM6401008', 'PD640101-001-C001', 10000, 50, 2500, '1'),
(135, 'PM6401008', 'PD640101-001-C002', 10000, 50, 2500, '1'),
(136, 'PM6401008', 'PD640101-001-C003', 10000, 50, 2500, '1'),
(137, 'PM6401008', 'PD640101-001-C004', 10000, 50, 2500, '1'),
(138, 'PM6402001', 'PD640101-001-C002', 2500, 10, 0, '1'),
(139, 'PM6402002', 'PD640101-001-C001', 5250, 21, 0, '1'),
(140, 'PM6402003', 'PD640101-001-C002', 5000, 20, 0, '1'),
(141, 'PM6402004', 'PD640301-001-C001', 350, 1, 0, '1'),
(142, 'PM6402004', 'PD640301-001-C002', 350, 1, 0, '1'),
(143, 'PM6402004', 'PD640301-001-C003', 350, 1, 0, '1'),
(144, 'PM6402005', 'PD640101-002-C001', 25000, 100, 0, '1'),
(145, 'PM6402005', 'PD640101-002-C002', 25000, 100, 0, '1'),
(146, 'PM6402006', 'PD640701-001-C001', 2000, 20, 0, '1'),
(147, 'PM6402007', 'PD640701-001-C001', 1500, 30, 1500, '1'),
(148, 'PM6402008', 'PD640701-001-C001', 1500, 30, 1500, '1'),
(149, 'PM6402008', 'PD640101-001-C001', 10000, 50, 2500, '1'),
(150, 'PM6402009', 'PD640701-001-C001', 5000, 50, 0, '1'),
(151, 'PM6402010', 'PD640101-001-C001', 20, 0, 0, '1'),
(152, 'PM6402010', 'PD640101-001-C002', 50, 250, 0, '1'),
(153, 'PM6402011', 'PD640101-001-C001', 5000, 20, 0, '1'),
(154, 'PM6402011', 'PD640101-001-C002', 12250, 50, 250, '1'),
(155, 'PM6402012', 'PD640701-001-C001', 1000, 10, 0, '1'),
(156, 'PM6402012', 'PD640701-001-C002', 1800, 20, 200, '1'),
(157, 'PM6403001', 'PD640701-001-C001', 1000, 10, 0, '1'),
(158, 'PM6403002', 'PD640101-002-C001', 24500, 100, 500, '1'),
(159, 'PM6403003', 'PD640101-001-C001', 250, 1, 0, '1'),
(160, 'PM6403004', 'PD640101-001-C001', 250, 1, 0, '1'),
(161, 'PM6403005', 'PD640101-001-C001', 2500, 10, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_color`
--

CREATE TABLE `tb_color` (
  `co_id` varchar(255) NOT NULL,
  `co_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_color`
--

INSERT INTO `tb_color` (`co_id`, `co_name`, `status`) VALUES
('CO6401', 'เทา', '1'),
('CO6402', 'ดำ', '1'),
('CO6403', 'ขาว', '1'),
('CO6404', 'เขียว', '1'),
('CO6405', 'กรมท่า', '1'),
('CO6406', 'ครีม', '1'),
('CO6407', 'แดง', '1'),
('CO6408', 'เหลือง', '1'),
('CO6409', 'น้ำเงิน', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_color_detail`
--

CREATE TABLE `tb_color_detail` (
  `id_color_det` varchar(255) NOT NULL,
  `id_color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pd_id` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_color_detail`
--

INSERT INTO `tb_color_detail` (`id_color_det`, `id_color`, `status`, `pd_id`, `amount`) VALUES
('PD640101-001-C001', 'CO6402', '1', 'PD640101-001 ', 278),
('PD640101-001-C002', 'CO6401', '1', 'PD640101-001 ', 500),
('PD640101-001-C003', 'CO6405', '1', 'PD640101-001 ', 130),
('PD640101-001-C004', 'CO6406', '1', 'PD640101-001 ', 120),
('PD640101-002-C001', 'CO6401', '1', 'PD640101-002 ', 400),
('PD640101-002-C002', 'CO6402', '1', 'PD640101-002 ', 500),
('PD640102-001-C001', 'CO6402', '1', 'PD640102-001 ', 50),
('PD640102-001-C002', 'CO6401', '1', 'PD640102-001 ', 90),
('PD640102-001-C003', 'CO6406', '1', 'PD640102-001 ', 100),
('PD640103-001-C001', 'CO6401', '1', 'PD640103-001 ', 400),
('PD640103-001-C002', 'CO6402', '1', 'PD640103-001 ', 400),
('PD640301-001-C001', 'CO6407', '1', 'PD640301-001 ', 99),
('PD640301-001-C002', 'CO6402', '1', 'PD640301-001 ', 99),
('PD640301-001-C003', 'CO6409', '1', 'PD640301-001 ', 99),
('PD640401-003-C001', 'CO6402', '1', 'PD640401-003 ', 100),
('PD640501-001-C001', 'CO6402', '1', 'PD640501-001 ', 100),
('PD640701-001-C001', 'CO6401', '1', 'PD640701-001 ', 50),
('PD640701-001-C002', 'CO6402', '1', 'PD640701-001 ', 180);

-- --------------------------------------------------------

--
-- Table structure for table `tb_employees`
--

CREATE TABLE `tb_employees` (
  `emp_id` varchar(255) NOT NULL,
  `emp_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emp_surname` varchar(255) NOT NULL,
  `emp_czid` varchar(25) NOT NULL,
  `emp_bd` date NOT NULL,
  `emp_number` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_sex` varchar(255) NOT NULL,
  `emp_numhome` varchar(255) NOT NULL,
  `emp_muu` varchar(255) NOT NULL,
  `emp_alley` varchar(255) NOT NULL,
  `emp_road` varchar(255) NOT NULL,
  `emp_county` varchar(255) NOT NULL,
  `emp_district` varchar(255) NOT NULL,
  `emp_province` varchar(255) NOT NULL,
  `emp_posnum` int(255) NOT NULL,
  `emp_pic` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_employees`
--

INSERT INTO `tb_employees` (`emp_id`, `emp_name`, `emp_surname`, `emp_czid`, `emp_bd`, `emp_number`, `emp_email`, `emp_sex`, `emp_numhome`, `emp_muu`, `emp_alley`, `emp_road`, `emp_county`, `emp_district`, `emp_province`, `emp_posnum`, `emp_pic`, `status`, `status_per`) VALUES
('EMP64001', 'มดยัก', 'ซ่าสุดสุด', '1669900321858', '2021-01-08', '0990759595', 't@hotmail.com', '1', '190/228', '1', '1', '-', 'แพงพวย', 'ดำเนินสะดวก', 'ราชบุรี', 70130, 'EMP64009.jpg', '1', 1),
('EMP64002', 'ณัชพล', 'กาละพันธ์', '1669900321552', '2021-01-26', '0990799494', 't1@mail.com', '1', '190/227', '7', '11', '-', 'องครักษ์', 'องครักษ์', 'นครนายก', 26120, 'EMP64002.jpg', '0', 1),
('EMP64003', 'Natchapon', 'kalapan', '1669900321553', '2021-01-25', '0990799496', 't2@mail.com', '1', '190/225', '8', '12', '-', 'ปากทาง', 'เมืองพิจิตร', 'พิจิตร', 66000, 'EMP64003.jpg', '1', 1),
('EMP64004', 'อนัน', 'เชด', '1669900321554', '2021-01-05', '0990799497', 't3@mail.com', '1', '190/229', '1', '13', '-', 'ในเมือง', 'เมืองกำแพงเพชร', 'กำแพงเพชร', 62000, 'EMP64004.jpg', '1', 0),
('EMP64005', 'เฉิน', 'ห้าวหนาน', '1669900321559', '2021-01-01', '0990799499', 't9@mail.com', '1', '190/222', '1', '11', '-', 'บางนา', 'บางนา', 'กรุงเทพมหานคร', 10260, 'EMP64005.jpg', '1', 0),
('EMP64006', 'โทนี่', 'เวน', '1996600321600', '2021-01-05', '0990799491', 't11@mail.com', '1', '220/190', '2', '-', '-', 'สากเหล็ก', 'สากเหล็ก', 'พิจิตร', 66160, 'EMP64006.jpg', '0', 1),
('EMP64007', 'ดำ', 'โอเวอร์', '1669900321601', '2021-01-06', '0990799480', 't4@mail.com', '1', '190/100', '1', '6', '-', 'สทิงหม้อ', 'สิงหนคร', 'สงขลา', 90280, 'EMP64007.jpg', '1', 0),
('EMP64008', 'บังเท็น', 'อ่อนนุช', '1669900321602', '2021-01-07', '0990799410', 't99@mail.com', '1', '201/190', '1', '9', '-', 'พะงาด', 'ขามสะแกแสง', 'นครราชสีมา', 30290, 'EMP64008.jpg', '0', 0),
('EMP64009', 'หลง', 'ไหล', '1669900321603', '2020-11-05', '0990799422', 't98@mail.com', '1', '203/190', '1', '9', '-', 'รวมไทยพัฒนา', 'พบพระ', 'ตาก', 63160, 'EMP64009.jpg', '1', 0),
('EMP64010', 'เจ้ายัก', 'กาละพันธ์', '1669900321858', '2021-02-03', '0990799494', 't19@hotmail.com', '1', '190/227', '1', '11', '-', 'แพรกษา', 'เมืองสมุทรปราการ', 'สมุทรปราการ', 10280, 'EMP64010.jpg', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_group`
--

CREATE TABLE `tb_group` (
  `gr_id` varchar(255) NOT NULL,
  `ty_id` varchar(255) NOT NULL,
  `gr_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_group`
--

INSERT INTO `tb_group` (`gr_id`, `ty_id`, `gr_name`, `status`) VALUES
('GR6401', 'TP6401', 'ขาสั้น', '1'),
('GR6402', 'TP6401', 'ขายาว', '1'),
('GR6403', 'TP6402', 'เสื้อฮูด', '1'),
('GR6404', 'TP6402', 'เสื้อแขนยาว', '1'),
('GR6405', 'TP6402', 'เสื้อแขนสั้น', '1'),
('GR6406', 'TP6402', 'Jackket', '1'),
('GR6407', 'TP6404', 'test1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permissions`
--

CREATE TABLE `tb_permissions` (
  `id` int(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type_per` int(11) NOT NULL COMMENT 'ระดับผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_permissions`
--

INSERT INTO `tb_permissions` (`id`, `emp_id`, `username`, `password`, `status`, `type_per`) VALUES
(16, 'EMP64001', 'EMP64001', '1669900321858', '1', 1),
(17, 'EMP64003', 'EMP64003', '1669900321553', '1', 2),
(18, 'EMP64002', 'EMP64002', '1669900321552', '0', 1),
(19, 'EMP64010', 'EMP64010', '1669900321858', '0', 2),
(20, 'EMP64006', 'EMP64006', '1996600321600', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `pd_id` varchar(255) NOT NULL,
  `pd_group` varchar(255) NOT NULL,
  `pd_name` varchar(255) NOT NULL,
  `pd_pic` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`pd_id`, `pd_group`, `pd_name`, `pd_pic`, `status`) VALUES
('PD640101', 'GR6401', 'ขาสั้นผ้าชิโน่', 'PD640101.jpg', '1'),
('PD640102', 'GR6401', 'ขาสั้นวินเทจ', 'PD640102.jpg', '1'),
('PD640103', 'GR6401', 'ขาสั้นผ้ายีน', 'PD640103.jpg', '1'),
('PD640201', 'GR6402', 'ขายาวผ้ายีน', 'PD640201.jpg', '1'),
('PD640202', 'GR6402', 'ขายาวผ้าชิโน่', 'PD640202.jpg', '1'),
('PD640203', 'GR6402', 'ขายาววินเทจ', 'PD640203.jpg', '1'),
('PD640301', 'GR6403', 'ฮูดแบบสวม', 'PD640301.jpg', '1'),
('PD640401', 'GR6404', 'แขนยาวผ้ายืด', 'PD640401.jpg', '1'),
('PD640402', 'GR6404', 'แขนยาวผ้าคอนตอน', 'PD640402.jpg', '1'),
('PD640501', 'GR6405', 'แขนสั้นลายมาเฟีย', 'PD640501.jpg', '1'),
('PD640502', 'GR6405', 'แขนสั้นลายกระโหลก', 'PD640502.jpg', '1'),
('PD640503', 'GR6405', 'แขนสั้นผ้ายืด', 'PD640503.jpg', '1'),
('PD640504', 'GR6405', 'เสื้อเชิ้ต', 'PD640504.jpg', '1'),
('PD640505', 'GR6405', 'ผ้าคอนตอน', 'PD640505.jpg', '1'),
('PD640601', 'GR6406', 'Jackketผ้าร่ม', 'PD640601.jpg', '1'),
('PD640701', 'GR6407', 'test2', 'PD640701.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produnt_detail`
--

CREATE TABLE `tb_produnt_detail` (
  `id_pd_det` varchar(255) NOT NULL,
  `pd_id` varchar(255) NOT NULL,
  `det_size` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_produnt_detail`
--

INSERT INTO `tb_produnt_detail` (`id_pd_det`, `pd_id`, `det_size`, `price`, `status`) VALUES
('PD640101-001', 'PD640101 ', 'SI6401', 250, '1'),
('PD640101-002', 'PD640101 ', 'SI6402', 250, '1'),
('PD640101-003', 'PD640101 ', 'SI6403', 250, '1'),
('PD640102-001', 'PD640102 ', 'SI6401', 250, '1'),
('PD640102-002', 'PD640102 ', 'SI6402', 250, '1'),
('PD640102-003', 'PD640102 ', 'SI6403', 250, '1'),
('PD640103-001', 'PD640103 ', 'SI6401', 350, '1'),
('PD640103-002', 'PD640103 ', 'SI6402', 350, '1'),
('PD640103-003', 'PD640103 ', 'SI6403', 350, '1'),
('PD640104-001', 'PD640104 ', 'SI6401', 250, '1'),
('PD640201-001', 'PD640201 ', 'SI6401', 350, '1'),
('PD640301-001', 'PD640301 ', 'SI6403', 350, '1'),
('PD640401-001', 'PD640401 ', 'SI6401', 250, '1'),
('PD640401-002', 'PD640401 ', 'SI6402', 250, '1'),
('PD640401-003', 'PD640401 ', 'SI6403', 250, '1'),
('PD640402-001', 'PD640402 ', 'SI6401', 350, '1'),
('PD640402-002', 'PD640402 ', 'SI6402', 350, '1'),
('PD640402-003', 'PD640402 ', 'SI6403', 350, '1'),
('PD640501-001', 'PD640501 ', 'SI6401', 250, '1'),
('PD640501-002', 'PD640501 ', 'SI6402', 250, '1'),
('PD640501-003', 'PD640501 ', 'SI6403', 250, '1'),
('PD640502-001', 'PD640502 ', 'SI6401', 250, '1'),
('PD640502-002', 'PD640502 ', 'SI6402', 250, '1'),
('PD640502-003', 'PD640502 ', 'SI6403', 250, '1'),
('PD640503-001', 'PD640503 ', 'SI6401', 180, '1'),
('PD640503-002', 'PD640503 ', 'SI6402', 180, '1'),
('PD640503-003', 'PD640503 ', 'SI6403', 180, '1'),
('PD640504-001', 'PD640504 ', 'SI6401', 290, '1'),
('PD640504-002', 'PD640504 ', 'SI6402', 290, '1'),
('PD640504-003', 'PD640504 ', 'SI6403', 290, '1'),
('PD640505-001', 'PD640505 ', 'SI6401', 250, '1'),
('PD640505-002', 'PD640505 ', 'SI6402', 250, '1'),
('PD640505-003', 'PD640505 ', 'SI6403', 250, '1'),
('PD640601-001', 'PD640601 ', 'SI6405', 350, '1'),
('PD640701-001', 'PD640701 ', 'SI6401', 100, '1'),
('PD640701-002', 'PD640701 ', 'SI6402', 150, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sale`
--

CREATE TABLE `tb_sale` (
  `id_sale` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `pay_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sale_detail`
--

CREATE TABLE `tb_sale_detail` (
  `id_sale_det` varchar(255) NOT NULL,
  `id_sale` varchar(255) NOT NULL,
  `pd_id` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_size`
--

CREATE TABLE `tb_size` (
  `si_id` varchar(255) NOT NULL,
  `si_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_size`
--

INSERT INTO `tb_size` (`si_id`, `si_name`, `status`) VALUES
('SI6401', 'S', '1'),
('SI6402', 'M', '1'),
('SI6403', 'L', '1'),
('SI6404', 'XL', '1'),
('SI6405', 'Freesize', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock`
--

CREATE TABLE `tb_stock` (
  `st_id` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `st_dete` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_stock`
--

INSERT INTO `tb_stock` (`st_id`, `emp_id`, `st_dete`, `status`) VALUES
('ST6401001', 'EMP64001', '2021-01-27 19:25:00', '1'),
('ST6401002', 'EMP64001', '0000-00-00 00:00:00', '1'),
('ST6401003', 'EMP64001', '0000-00-00 00:00:00', '1'),
('ST6401004', 'EMP64001', '2021-01-27 19:36:00', '1'),
('ST6401005', 'EMP64001', '2021-01-27 19:36:00', '1'),
('ST6402001', 'EMP64001', '2021-02-03 10:17:00', '1'),
('ST6402002', 'EMP64001', '2021-02-09 13:35:00', '1'),
('ST6402003', 'EMP64001', '2021-02-09 13:40:00', '1'),
('ST6402004', 'EMP64001', '0000-00-00 00:00:00', '1'),
('ST6402005', 'EMP64001', '2021-02-20 10:27:00', '1'),
('ST6402006', 'EMP64001', '2021-02-20 10:28:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_detail`
--

CREATE TABLE `tb_stock_detail` (
  `id_st_set` int(11) NOT NULL,
  `id_st` varchar(255) NOT NULL,
  `pd_id` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_stock_detail`
--

INSERT INTO `tb_stock_detail` (`id_st_set`, `id_st`, `pd_id`, `amount`, `status`) VALUES
(59, 'ST6401001', 'PD640101-001-C001', 100, '1'),
(60, 'ST6401001', 'PD640101-001-C002', 100, '1'),
(61, 'ST6401001', 'PD640101-001-C003', 100, '1'),
(62, 'ST6401001', 'PD640101-001-C004', 100, '1'),
(63, 'ST6401002', 'PD640102-001-C001', 100, '1'),
(64, 'ST6401002', 'PD640102-001-C002', 100, '1'),
(65, 'ST6401002', 'PD640102-001-C003', 100, '1'),
(66, 'ST6401003', 'PD640103-001-C001', 100, '1'),
(67, 'ST6401003', 'PD640103-001-C002', 100, '1'),
(68, 'ST6401004', 'PD640103-001-C001', 200, '1'),
(69, 'ST6401004', 'PD640103-001-C002', 200, '1'),
(70, 'ST6401005', 'PD640101-001-C001', 100, '1'),
(71, 'ST6401005', 'PD640101-001-C002', 100, '1'),
(72, 'ST6401005', 'PD640101-001-C003', 100, '1'),
(73, 'ST6401005', 'PD640101-001-C004', 100, '1'),
(74, 'ST6402001', 'PD640101-002-C001', 100, '1'),
(75, 'ST6402001', 'PD640101-002-C002', 100, '1'),
(76, 'ST6402001', 'PD640103-001-C001', 100, '1'),
(77, 'ST6402001', 'PD640103-001-C002', 100, '1'),
(78, 'ST6402002', 'PD640101-001-C001', 211, '1'),
(79, 'ST6402003', 'PD640401-003-C001', 100, '1'),
(80, 'ST6402003', 'PD640501-001-C001', 100, '1'),
(81, 'ST6402003', 'PD640301-001-C001', 100, '1'),
(82, 'ST6402003', 'PD640301-001-C002', 100, '1'),
(83, 'ST6402003', 'PD640301-001-C003', 100, '1'),
(84, 'ST6402004', 'PD640101-001-C001', 50, '1'),
(85, 'ST6402004', 'PD640101-002-C001', 50, '1'),
(86, 'ST6402004', 'PD640101-002-C002', 50, '1'),
(87, 'ST6402005', 'PD640701-001-C001', 100, '1'),
(88, 'ST6402005', 'PD640701-001-C002', 100, '1'),
(89, 'ST6402006', 'PD640101-001-C001', 100, '1'),
(90, 'ST6402006', 'PD640701-001-C001', 100, '1'),
(91, 'ST6402006', 'PD640701-001-C002', 100, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `ty_id` varchar(255) NOT NULL,
  `ty_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`ty_id`, `ty_name`, `status`) VALUES
('TP6401', 'กางเกง', '1'),
('TP6402', 'เสื้อ', '1'),
('TP6403', 'กระเป๋า', '1'),
('TP6404', 'test', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `log_mafear`
--
ALTER TABLE `log_mafear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymant`
--
ALTER TABLE `paymant`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `paymant_detail`
--
ALTER TABLE `paymant_detail`
  ADD PRIMARY KEY (`pay_id_det`);

--
-- Indexes for table `tb_color`
--
ALTER TABLE `tb_color`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `tb_color_detail`
--
ALTER TABLE `tb_color_detail`
  ADD PRIMARY KEY (`id_color_det`);

--
-- Indexes for table `tb_employees`
--
ALTER TABLE `tb_employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tb_group`
--
ALTER TABLE `tb_group`
  ADD PRIMARY KEY (`gr_id`);

--
-- Indexes for table `tb_permissions`
--
ALTER TABLE `tb_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `tb_produnt_detail`
--
ALTER TABLE `tb_produnt_detail`
  ADD PRIMARY KEY (`id_pd_det`);

--
-- Indexes for table `tb_sale`
--
ALTER TABLE `tb_sale`
  ADD PRIMARY KEY (`id_sale`);

--
-- Indexes for table `tb_sale_detail`
--
ALTER TABLE `tb_sale_detail`
  ADD PRIMARY KEY (`id_sale_det`);

--
-- Indexes for table `tb_size`
--
ALTER TABLE `tb_size`
  ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tb_stock_detail`
--
ALTER TABLE `tb_stock_detail`
  ADD PRIMARY KEY (`id_st_set`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`ty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_mafear`
--
ALTER TABLE `log_mafear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `paymant_detail`
--
ALTER TABLE `paymant_detail`
  MODIFY `pay_id_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tb_permissions`
--
ALTER TABLE `tb_permissions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_stock_detail`
--
ALTER TABLE `tb_stock_detail`
  MODIFY `id_st_set` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
