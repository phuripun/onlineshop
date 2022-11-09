-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 05:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'ลำดับที่',
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `orderPrice` float NOT NULL COMMENT 'ราคาสินค้า',
  `orderQty` int(11) NOT NULL COMMENT 'จำนวนที่สั่งซื้อ',
  `Total` float NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderID`, `pro_id`, `orderPrice`, `orderQty`, `Total`) VALUES
(1, 0000000001, 000002, 1500, 2, 3000),
(2, 0000000001, 000001, 300, 1, 300),
(3, 0000000002, 000002, 1500, 1, 1500),
(4, 0000000003, 000001, 300, 1, 300),
(5, 0000000005, 000001, 300, 1, 300),
(6, 0000000006, 000001, 300, 1, 300),
(7, 0000000008, 000002, 1500, 1, 1500),
(8, 0000000011, 000002, 1500, 1, 1500),
(9, 0000000014, 000002, 1500, 2, 3000),
(10, 0000000017, 000002, 1500, 1, 1500),
(11, 0000000018, 000002, 1500, 1, 1500),
(12, 0000000019, 000001, 300, 1, 300),
(13, 0000000020, 000001, 300, 3, 900),
(14, 0000000021, 000001, 300, 3, 900),
(15, 0000000022, 000001, 250, 4, 1000),
(16, 0000000022, 000002, 1500, 3, 4500),
(17, 0000000023, 000001, 250, 1, 250),
(18, 0000000024, 000002, 1500, 1, 1500),
(19, 0000000025, 000002, 1500, 2, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `pay_con`
--

CREATE TABLE `pay_con` (
  `payid` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสการโอน',
  `u_name` varchar(100) NOT NULL COMMENT 'ชื่อผู้สั่ง',
  `u_phone` int(10) NOT NULL COMMENT 'เบอร์ผู้สั่ง',
  `image` varchar(50) NOT NULL COMMENT 'สลิปการโอน',
  `date_pay` date NOT NULL COMMENT 'วันที่โอนในสลิป',
  `time_pay` time NOT NULL COMMENT 'เวลาที่โอนในสลิป'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_con`
--

INSERT INTO `pay_con` (`payid`, `u_name`, `u_phone`, `image`, `date_pay`, `time_pay`) VALUES
(000001, 'อารียา', 12345, 'u_6368bccf2b7ec.jpg', '2022-11-07', '00:00:00'),
(000006, 'fdgsdfg', 1234435, 'u_63692e85059eb.jpg', '2022-11-04', '13:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `pro_name` varchar(255) NOT NULL COMMENT 'ชื่อสินค้า',
  `detail` text NOT NULL COMMENT 'รายละอียดสินค้า',
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `price` float(8,2) DEFAULT NULL COMMENT 'ราคาขาย',
  `amount` int(11) DEFAULT NULL COMMENT 'จำนวน',
  `image` varchar(50) DEFAULT NULL COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `detail`, `type_id`, `price`, `amount`, `image`) VALUES
(0000000001, 'เก้าอี้', 'เก้าอี้ทำงานออฟฟิต', 001, 250.00, 5, 'เก้าอี้.jpg'),
(0000000002, '[โซฟา]', '[โซฟาครอบครัวขนาดใหญ่]', 001, 1500.00, -2, 'โซฟา.jpg'),
(0000000003, 'ตู้เสื้อผ้า', 'ตู้เสื้อผ้า สไตร์ มินิมอล', 001, 2000.00, 20, 'pr_6368a2e186550.jpg'),
(0000000004, 'ชุดโต๊ะทานอาหารและเก้าอี้', 'โต๊ะทานอาหารขนาดกลางพร้อมเก้าอี้ 4 ตัว', 001, 1600.00, 15, 'pr_6368a3a296c29.jpg'),
(0000000005, 'เตียง', 'เตียงนอน 5 ฟุต', 001, 2800.00, 20, 'pr_6368a4df64ae5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสมาชิก',
  `fullname` varchar(255) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `email` varchar(50) NOT NULL COMMENT 'อีเมล',
  `telephone` int(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `username` varchar(10) NOT NULL COMMENT 'Username',
  `password` varchar(128) NOT NULL COMMENT 'Password',
  `status` varchar(1) NOT NULL COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`id`, `fullname`, `email`, `telephone`, `username`, `password`, `status`) VALUES
(000001, 'Bhuripun Chaichatchawal', 'punrc240066@gmail.com', 863257830, 'skadoosh', '123', '1'),
(000002, 'areya', 'user@mail.com', 12345567, 'user1', '567', '0'),
(000003, 'natee', 'natee12@mail.com', 123456789, 'natee55', '1234', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `cus_name` varchar(60) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `address` text NOT NULL COMMENT 'ที่อยู่การจัดส่งสินค้า',
  `telephone` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `total_price` float NOT NULL COMMENT 'ราคารวมสุทธิ',
  `order_status` varchar(1) NOT NULL COMMENT '0=ยกเลิก,1=ยังไม่ชำระเงิน,2=ชำระเงิน',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`orderID`, `cus_name`, `address`, `telephone`, `total_price`, `order_status`, `reg_date`) VALUES
(0000000001, 'ภูริปัญญ์', ' ฟหกฟหก', '12345', 3300, '1', '2022-11-05 12:17:21'),
(0000000002, 'sdf', ' asdasd', '1234', 1500, '1', '2022-11-05 12:28:47'),
(0000000003, 'อารียา', ' ฟหกฟหก', '123456', 300, '1', '2022-11-05 13:10:54'),
(0000000004, 'อารียา', ' ฟหกฟหก', '123456', 0, '1', '2022-11-05 13:11:55'),
(0000000005, 'asd', ' asd', '123134', 300, '1', '2022-11-05 13:12:15'),
(0000000006, 'อารียา', ' afdfadf', '123124', 300, '1', '2022-11-05 13:16:00'),
(0000000007, 'อารียา', ' sdfsdf', '123143', 0, '1', '2022-11-05 13:18:41'),
(0000000008, 'อารียา', ' asdfsdf', '1234', 1500, '1', '2022-11-05 13:29:55'),
(0000000009, 'อารียา', ' asdfsdf', '1234', 0, '1', '2022-11-05 13:30:26'),
(0000000010, 'อารียา', ' asdfsdf', '1234', 0, '1', '2022-11-05 13:30:29'),
(0000000011, 'อารียา', ' 123123', '34324324', 1500, '2', '2022-11-05 13:30:39'),
(0000000012, 'อารียา', ' 123123', '34324324', 0, '1', '2022-11-05 13:59:13'),
(0000000013, 'อารียา', '132/2 หมู่8 อ.เมือง ตำบล บางขันหมาก จังหวัด ลพบุรี 15000', '34324324', 0, '1', '2022-11-05 14:00:07'),
(0000000014, 'อารียา', ' 1231243', '123412', 3000, '2', '2022-11-05 14:00:29'),
(0000000015, 'อารียา', ' 1231243', '123412', 0, '0', '2022-11-05 14:00:48'),
(0000000016, 'อารียา', ' 1231243', '123412', 0, '2', '2022-11-05 14:00:56'),
(0000000017, 'อารียา', ' 14134', '3124134', 1500, '0', '2022-11-05 14:01:05'),
(0000000018, 'อารียา', ' 123124', '1414134', 1500, '0', '2022-11-05 14:02:35'),
(0000000019, 'sdf', ' asdfa', '12314', 300, '2', '2022-11-05 14:05:01'),
(0000000020, 'ภูริปัญญ์', ' 1234', '123445', 900, '1', '2022-11-06 09:22:37'),
(0000000021, 'ภูริปัญญ์', ' 12313', '13241414', 900, '1', '2022-11-06 14:48:16'),
(0000000022, 'ภูริปัญญ์', ' 123124', '1212415', 5500, '1', '2022-11-07 07:23:56'),
(0000000023, 'อารียา', ' dgfh', '12342345', 250, '1', '2022-11-07 07:24:31'),
(0000000024, 'ภูริปัญญ์', ' 141341', '135151', 1500, '1', '2022-11-07 07:44:51'),
(0000000025, 'อารียา', ' 1423145', '4626234573', 3000, '1', '2022-11-07 07:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `type_name` varchar(60) NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(001, 'เฟอร์นิเจอ'),
(002, 'ของตกแต่งภายในบ้าน'),
(003, 'ของตกแต่งสวน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_con`
--
ALTER TABLE `pay_con`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับที่', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pay_con`
--
ALTER TABLE `pay_con`
  MODIFY `payid` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสการโอน', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสินค้า', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
