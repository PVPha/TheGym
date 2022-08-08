-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 04:30 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fptgym`
--

-- --------------------------------------------------------

--
-- Table structure for table `body_index`
--

CREATE TABLE `body_index` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `chest` int(11) NOT NULL,
  `waist` int(11) NOT NULL,
  `butt` int(11) NOT NULL,
  `left_hand` int(11) NOT NULL,
  `right_hand` int(11) NOT NULL,
  `left_leg` int(11) NOT NULL,
  `right_leg` int(11) NOT NULL,
  `date_measure` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `body_index`
--

INSERT INTO `body_index` (`id`, `member_id`, `trainer_id`, `height`, `weight`, `chest`, `waist`, `butt`, `left_hand`, `right_hand`, `left_leg`, `right_leg`, `date_measure`) VALUES
(1, 11, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, '2022-06-17'),
(4, 11, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(4) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `room` varchar(10) NOT NULL,
  `date_of_week` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `trainer_id` varchar(4) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `room`, `date_of_week`, `start_time`, `end_time`, `start_date`, `end_date`, `trainer_id`, `type`, `price`) VALUES
(4, 'final 1', 'room1', 'T2,T3', '00:00:00', '00:00:00', '2022-06-01', '2022-06-02', '5', 'Gym', 1500000),
(5, 'final2', 'b102', 'T2,T3,T4,CN', '14:14:00', '01:17:00', '2022-06-01', '2022-06-02', '5', 'Gym', 2000000),
(8, 'final4', 'b10', 'T3,T5,T7', '16:50:00', '16:51:00', '2022-06-24', '2022-06-25', '2', 'Yoga', 12312312);

-- --------------------------------------------------------

--
-- Table structure for table `class_registration`
--

CREATE TABLE `class_registration` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `time_stamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_registration`
--

INSERT INTO `class_registration` (`id`, `class_id`, `member_id`, `time_stamp`) VALUES
(1, 5, 7, '2022-06-18'),
(2, 5, 9, '2022-06-18'),
(3, 4, 7, '2022-06-18'),
(5, 8, 7, '2022-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `introduction` varchar(1000) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `introduction`, `content`, `image`) VALUES
(2, 'test 2', 'gioi thieu', '<p>Lịch tập gym cho người mới bắt đầu l&agrave; cơ sở cho cả qu&aacute; tr&igrave;nh luyện tập c&oacute; hiệu quả của những người chọn tập loại h&igrave;nh thể thao n&agrave;y. Trong khi hiện nay, gym l&agrave; phương ph&aacute;p tối ưu nhất trong việc chăm s&oacute;c sức khỏe cụ thể l&agrave; nhiều mục đ&iacute;ch từ giữ d&aacute;ng đến giảm c&acirc;n v&agrave; duy tr&igrave; sức khỏe.</p>\r\n<h2><strong>Tầm quan trọng của việc thiết kế lịch tập gym cho người mới bắt đầu</strong></h2>\r\n<h2>Thiết kế&nbsp;<a href=\"https://citigym.com.vn/huong-dan-tap-gym-dung-cach-danh-cho-nhung-nguoi-moi-bat-dau.html\"><strong>lịch tập gym cho người mới bắt đầu</strong></a>&nbsp;được xem l&agrave; đồng nghĩa với việc đặt nền tảng v&agrave; tạo cơ sở cho c&aacute;c động lực tập gym tiếp theo. Những người mới bắt đầu kh&ocirc;ng thể tập gym một c&aacute;ch kh&ocirc;ng c&oacute; phương hướng, điều đ&oacute; kh&ocirc;ng chỉ c&oacute; thể g&acirc;y n&ecirc;n ảnh hưởng ti&ecirc;u cực kh&ocirc;ng nhỏ l&ecirc;n cơ thể của&nbsp;m&agrave; c&ograve;n khiến người tập tốn thời gian m&agrave; lại kh&ocirc;ng c&oacute; hiệu quả g&igrave;.</h2>\r\n<h2><strong>Nguy&ecirc;n tắc v&agrave;ng để l&ecirc;n lịch tập gym cho người mới bắt đầu</strong></h2>\r\n<p>Để l&ecirc;n&nbsp;<strong>lịch&nbsp;</strong><strong>tập gym cho người mới bắt đầu</strong>&nbsp;chuẩn v&agrave; ph&ugrave; hợp th&igrave; cần phải tu&acirc;n thủ theo những nguy&ecirc;n tắc chung nhất định.&nbsp;Sau đ&acirc;y l&agrave; những nguy&ecirc;n tắc v&agrave;ng để l&ecirc;n x&acirc;y dựng lịch tr&igrave;nh tập luyện</p>', 'public/Image/202206141355009_Galaxy_A73_5G_mint_front.jpg'),
(4, 'test 2', 'Lịch tập gym cho người mới bắt đầu là cơ sở cho cả quá trình luyện tập có hiệu quả của những người chọn tập loại hình thể thao này. Trong khi hiện nay, gym là phương pháp tối ưu nhất trong việc chăm sóc sức khỏe cụ thể là nhiều mục đích từ giữ dáng đến giảm cân và duy trì sức khỏe.', '<p>Lịch tập gym cho người mới bắt đầu l&agrave; cơ sở cho cả qu&aacute; tr&igrave;nh luyện tập c&oacute; hiệu quả của những người chọn tập loại h&igrave;nh thể thao n&agrave;y. Trong khi hiện nay, gym l&agrave; phương ph&aacute;p tối ưu nhất trong việc chăm s&oacute;c sức khỏe cụ thể l&agrave; nhiều mục đ&iacute;ch từ giữ d&aacute;ng đến giảm c&acirc;n v&agrave; duy tr&igrave; sức khỏe.</p>\r\n<h2><strong>Tầm quan trọng của việc thiết kế lịch tập gym cho người mới bắt đầu</strong></h2>\r\n<h2>Thiết kế&nbsp;<a href=\"https://citigym.com.vn/huong-dan-tap-gym-dung-cach-danh-cho-nhung-nguoi-moi-bat-dau.html\"><strong>lịch tập gym cho người mới bắt đầu</strong></a>&nbsp;được xem l&agrave; đồng nghĩa với việc đặt nền tảng v&agrave; tạo cơ sở cho c&aacute;c động lực tập gym tiếp theo. Những người mới bắt đầu kh&ocirc;ng thể tập gym một c&aacute;ch kh&ocirc;ng c&oacute; phương hướng, điều đ&oacute; kh&ocirc;ng chỉ c&oacute; thể g&acirc;y n&ecirc;n ảnh hưởng ti&ecirc;u cực kh&ocirc;ng nhỏ l&ecirc;n cơ thể của&nbsp;m&agrave; c&ograve;n khiến người tập tốn thời gian m&agrave; lại kh&ocirc;ng c&oacute; hiệu quả g&igrave;.</h2>\r\n<h2><strong>Nguy&ecirc;n tắc v&agrave;ng để l&ecirc;n lịch tập gym cho người mới bắt đầu</strong></h2>\r\n<p>Để l&ecirc;n&nbsp;<strong>lịch&nbsp;</strong><strong>tập gym cho người mới bắt đầu</strong>&nbsp;chuẩn v&agrave; ph&ugrave; hợp th&igrave; cần phải tu&acirc;n thủ theo những nguy&ecirc;n tắc chung nhất định.&nbsp;Sau đ&acirc;y l&agrave; những nguy&ecirc;n tắc v&agrave;ng để l&ecirc;n x&acirc;y dựng lịch tr&igrave;nh tập luyện</p>', 'public/Image/202206141355009_Galaxy_A73_5G_mint_front.jpg'),
(5, 'test 2', 'gioi thieu', '<p>Lịch tập gym cho người mới bắt đầu l&agrave; cơ sở cho cả qu&aacute; tr&igrave;nh luyện tập c&oacute; hiệu quả của những người chọn tập loại h&igrave;nh thể thao n&agrave;y. Trong khi hiện nay, gym l&agrave; phương ph&aacute;p tối ưu nhất trong việc chăm s&oacute;c sức khỏe cụ thể l&agrave; nhiều mục đ&iacute;ch từ giữ d&aacute;ng đến giảm c&acirc;n v&agrave; duy tr&igrave; sức khỏe.</p>\r\n<h2><strong>Tầm quan trọng của việc thiết kế lịch tập gym cho người mới bắt đầu</strong></h2>\r\n<h2>Thiết kế&nbsp;<a href=\"https://citigym.com.vn/huong-dan-tap-gym-dung-cach-danh-cho-nhung-nguoi-moi-bat-dau.html\"><strong>lịch tập gym cho người mới bắt đầu</strong></a>&nbsp;được xem l&agrave; đồng nghĩa với việc đặt nền tảng v&agrave; tạo cơ sở cho c&aacute;c động lực tập gym tiếp theo. Những người mới bắt đầu kh&ocirc;ng thể tập gym một c&aacute;ch kh&ocirc;ng c&oacute; phương hướng, điều đ&oacute; kh&ocirc;ng chỉ c&oacute; thể g&acirc;y n&ecirc;n ảnh hưởng ti&ecirc;u cực kh&ocirc;ng nhỏ l&ecirc;n cơ thể của&nbsp;m&agrave; c&ograve;n khiến người tập tốn thời gian m&agrave; lại kh&ocirc;ng c&oacute; hiệu quả g&igrave;.</h2>\r\n<h2><strong>Nguy&ecirc;n tắc v&agrave;ng để l&ecirc;n lịch tập gym cho người mới bắt đầu</strong></h2>\r\n<p>Để l&ecirc;n&nbsp;<strong>lịch&nbsp;</strong><strong>tập gym cho người mới bắt đầu</strong>&nbsp;chuẩn v&agrave; ph&ugrave; hợp th&igrave; cần phải tu&acirc;n thủ theo những nguy&ecirc;n tắc chung nhất định.&nbsp;Sau đ&acirc;y l&agrave; những nguy&ecirc;n tắc v&agrave;ng để l&ecirc;n x&acirc;y dựng lịch tr&igrave;nh tập luyện</p>', 'public/Image/202206141355009_Galaxy_A73_5G_mint_front.jpg'),
(6, 'test 2', 'gioi thieu', '<p>Lịch tập gym cho người mới bắt đầu l&agrave; cơ sở cho cả qu&aacute; tr&igrave;nh luyện tập c&oacute; hiệu quả của những người chọn tập loại h&igrave;nh thể thao n&agrave;y. Trong khi hiện nay, gym l&agrave; phương ph&aacute;p tối ưu nhất trong việc chăm s&oacute;c sức khỏe cụ thể l&agrave; nhiều mục đ&iacute;ch từ giữ d&aacute;ng đến giảm c&acirc;n v&agrave; duy tr&igrave; sức khỏe.</p>\r\n<h2><strong>Tầm quan trọng của việc thiết kế lịch tập gym cho người mới bắt đầu</strong></h2>\r\n<h2>Thiết kế&nbsp;<a href=\"https://citigym.com.vn/huong-dan-tap-gym-dung-cach-danh-cho-nhung-nguoi-moi-bat-dau.html\"><strong>lịch tập gym cho người mới bắt đầu</strong></a>&nbsp;được xem l&agrave; đồng nghĩa với việc đặt nền tảng v&agrave; tạo cơ sở cho c&aacute;c động lực tập gym tiếp theo. Những người mới bắt đầu kh&ocirc;ng thể tập gym một c&aacute;ch kh&ocirc;ng c&oacute; phương hướng, điều đ&oacute; kh&ocirc;ng chỉ c&oacute; thể g&acirc;y n&ecirc;n ảnh hưởng ti&ecirc;u cực kh&ocirc;ng nhỏ l&ecirc;n cơ thể của&nbsp;m&agrave; c&ograve;n khiến người tập tốn thời gian m&agrave; lại kh&ocirc;ng c&oacute; hiệu quả g&igrave;.</h2>\r\n<h2><strong>Nguy&ecirc;n tắc v&agrave;ng để l&ecirc;n lịch tập gym cho người mới bắt đầu</strong></h2>\r\n<p>Để l&ecirc;n&nbsp;<strong>lịch&nbsp;</strong><strong>tập gym cho người mới bắt đầu</strong>&nbsp;chuẩn v&agrave; ph&ugrave; hợp th&igrave; cần phải tu&acirc;n thủ theo những nguy&ecirc;n tắc chung nhất định.&nbsp;Sau đ&acirc;y l&agrave; những nguy&ecirc;n tắc v&agrave;ng để l&ecirc;n x&acirc;y dựng lịch tr&igrave;nh tập luyện</p>', 'public/Image/202206141355009_Galaxy_A73_5G_mint_front.jpg'),
(7, 'ádfadfas222', 'ádfasdfaerwasdfasd', '<p>sdafasdfasdfadsfadfa</p>', 'public/Image/202206240949but-s-pen-pro-cho-galaxy-z-fold-3-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`)),
  `total` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `time_stamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `member_id`, `products`, `total`, `address`, `phone`, `status`, `time_stamp`) VALUES
(5, 9, '[{\"id\":\"DCTL-10\",\"quantity\":\"1\",\"name\":\"test 1\"},{\"id\":\"DCTL-3\",\"quantity\":\"1\",\"name\":\"test 1\"}]', '2030000VNĐ', 'nguyen chi thanh phuong 9 quan 5', '0354327028', 'Đã giao', '2022-06-18'),
(12, 9, '[{\"id\":\"DCTL-10\",\"quantity\":\"1\",\"name\":\"test 1\"},{\"id\":\"DCTL-3\",\"quantity\":\"1\",\"name\":\"test 1\"}]', '2030000VNĐ', 'nguyen chi thanh phuong 9 quan 5', '0354327028', 'Giao không thành công', '2022-06-18'),
(13, 9, '[{\"id\":\"DCTL-10\",\"quantity\":\"1\",\"name\":\"test 1\"},{\"id\":\"DCTL-3\",\"quantity\":\"1\",\"name\":\"test 1\"}]', '2030000VNĐ', 'nguyen chi thanh phuong 9 quan 5', '0354327028', 'Giao không thành công', '2022-06-18'),
(14, 9, '[{\"id\":\"DCTL-10\",\"quantity\":\"1\",\"name\":\"test 1\"},{\"id\":\"DCTL-3\",\"quantity\":\"1\",\"name\":\"test 1\"}]', '2030000VNĐ', 'nguyen chi thanh phuong 9 quan 5', '0354327028', 'Giao không thành công', '2022-06-18'),
(15, 9, '[{\"id\":\"DCTL-10\",\"quantity\":\"1\",\"name\":\"test 1\"},{\"id\":\"DCTL-3\",\"quantity\":\"1\",\"name\":\"test 1\"}]', '2030000VNĐ', 'nguyen chi thanh phuong 9 quan 5', '0354327028', 'Giao không thành công', '2022-06-18'),
(16, 1, '[{\"id\":\"DCTL-7\",\"quantity\":\"1\",\"name\":\"test 1\"}]', '1030000VNĐ', 'nguyen chi thanh phuong 9 quan 5', '1234567890', 'Đã giao', '2022-06-18'),
(18, 1, '[{\"id\":\"TPCN-sdfdsfsdf\",\"quantity\":\"1\",\"name\":\"pham pha\"}]', '30234VNĐ', 'nguyen chi thanh phuong 9 quan 5', '1234567890', 'Chờ duyệt', '2022-06-24'),
(19, 11, '[{\"id\":\"DCTL-qua\",\"quantity\":\"1\",\"name\":\"test quantity\"}]', '10030000VNĐ', 'nguyen chi thanh phuong 9 quan 5', '12312312312', 'Giao không thành công', '2022-06-28'),
(20, 11, '[{\"id\":\"DCTL-qua\",\"quantity\":\"2\",\"name\":\"test quantity\"},{\"id\":\"DCTL-qu1\",\"quantity\":\"2\",\"name\":\"tesst quantity 1\"}]', '20030468VNĐ', 'deo co', '0354327028', 'Giao không thành công', '2022-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `pack`
--

CREATE TABLE `pack` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pack`
--

INSERT INTO `pack` (`id`, `name`, `price`, `time`) VALUES
(1, 'Gói 1 tháng', 2000000, '1'),
(3, 'Gói 3 tháng', 2000000, '3');

-- --------------------------------------------------------

--
-- Table structure for table `pack_registration`
--

CREATE TABLE `pack_registration` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `total_money` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time_stamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pack_registration`
--

INSERT INTO `pack_registration` (`id`, `member_id`, `pack_id`, `start_date`, `expiry_date`, `total_money`, `status`, `time_stamp`) VALUES
(9, 10, 1, '2022-06-15', '2022-10-14', 0, 1, '2022-06-18'),
(10, 11, 1, '2022-06-18', '2022-07-09', 6000000, 1, '2022-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `start`, `end`, `discount`) VALUES
(1, 500000, 1000000, 5),
(3, 1000000, 2500000, 10),
(4, 2500000, 5000000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `question` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `image` varchar(500) NOT NULL,
  `map` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `address`, `phone`, `image`, `map`) VALUES
(2, 'test', '590 Cách Mạng                         Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh', '0903697053', 'public/Image/202206141748huyhoangit.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.320802264145!2d106.66415491474419!3d10.786723361953277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655228594941!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(3, 'test', '590 Cách Mạng                         Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh', '0903697053', 'public/Image/202206141748huyhoangit.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.320802264145!2d106.66415491474419!3d10.786723361953277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655228594941!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(4, 'test', '590 Cách Mạng                         Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh', '0903697053', 'public/Image/202206141748huyhoangit.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.320802264145!2d106.66415491474419!3d10.786723361953277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655228594941!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(5, 'test', '590 Cách Mạng                         Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh', '0903697053', 'public/Image/202206141748huyhoangit.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.320802264145!2d106.66415491474419!3d10.786723361953277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655228594941!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(6, 'test', '590 Cách Mạng                         Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh', '0903697053', 'public/Image/202206141748huyhoangit.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.320802264145!2d106.66415491474419!3d10.786723361953277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655228594941!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(7, 'test', '590 Cách Mạng                         Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh', '0903697053', 'public/Image/202206141748huyhoangit.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.320802264145!2d106.66415491474419!3d10.786723361953277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655228594941!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(8, 'test', '590 Cách Mạng                         Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh', '0903697053', 'public/Image/202206141748huyhoangit.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.320802264145!2d106.66415491474419!3d10.786723361953277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655228594941!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(9, 'test', '590 Cách Mạng                         Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh', '0903697053', 'public/Image/202206141748huyhoangit.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.320802264145!2d106.66415491474419!3d10.786723361953277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655228594941!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date_of_week` varchar(50) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dow` int(11) NOT NULL DEFAULT 0,
  `time_stamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `trainer_id`, `member_id`, `date_of_week`, `start_time`, `end_time`, `status`, `dow`, `time_stamp`) VALUES
(15, 16, 11, 'T2/T4/T6', '21:14', '21:14', 1, 0, '2022-06-29'),
(17, 16, 11, 'T3/T5/T7', '21:16', '21:16', 0, 0, '2022-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `discount` float NOT NULL,
  `start_sale` date NOT NULL,
  `end_sale` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `name`, `slug`, `price`, `type`, `image`, `description`, `discount`, `start_sale`, `end_sale`, `total_price`, `quantity`) VALUES
('1', 'test 1', 'DCTL-1', 1000000, 'TPCN', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 10),
('10', 'test 1', 'DCTL-10', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 0),
('11', 'test 1', 'DCTL-11', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('12', 'test 1', 'DCTL-12', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('13', 'test 1', 'DCTL-13', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('14', 'test 1', 'DCTL-14', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('15', 'test 1', 'DCTL-15', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('16', 'test 1', 'DCTL-16', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('2', 'test 1', 'DCTL-2', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('3', 'test 1', 'DCTL-3', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 0),
('4', 'test 1', 'DCTL-4', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('5', 'test 1', 'DCTL-5', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('6', 'test 1', 'DCTL-6', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('7', 'test 1', 'DCTL-7', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 0),
('8', 'test 1', 'DCTL-8', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('9', 'test 1', 'DCTL-9', 1000000, 'DCTL', 'public/Image/202206040932huyhoangit.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.', 1, '2022-06-05', '2022-06-06', 1000000, 1),
('dsfs', 'time_stamp', '', 1231312, 'TPCN', 'public/Image/202206240936but-s-pen-pro-cho-galaxy-z-fold-3-3.jpg', '', 0, '0000-00-00', '0000-00-00', 0, 12),
('pt1', 'pham pha', '', 10000000, 'TPCN', 'public/Image/202206240936010_Galaxy_A73_5G_mint_back1314.jpg', '', 0, '0000-00-00', '0000-00-00', 0, 12),
('qu1', 'tesst quantity 1', 'DCTL-qu1', 234, 'DCTL', 'public/Image/202206281303but-s-pen-pro-cho-galaxy-z-fold-3-3.jpg', '', 0, '0000-00-00', '0000-00-00', 0, 3),
('qua', 'test quantity', 'DCTL-qua', 10000000, 'DCTL', 'public/Image/202206281206010_Galaxy_A73_5G_mint_back.jpg', '', 0, '0000-00-00', '0000-00-00', 0, 3),
('sdfdsfsdf', 'pham pha', 'TPCN-sdfdsfsdf', 234, 'TPCN', 'public/Image/202206240942Apple_iPhone-13-Pro_151060.jpg', '', 0, '0000-00-00', '0000-00-00', 0, 567567);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` varchar(4) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `type`, `description`, `price`) VALUES
('16', 'Gym', 'asdf', 0),
('18', 'Gym', 'dgdfgdfg', 12000000),
('2', 'Yoga', 'sdsfsdfsf2', 100000),
('5', 'Gym', 'mo ta', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `register_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `phone`, `date_of_birth`, `username`, `password`, `role`, `register_date`, `expiry_date`, `image`, `token`) VALUES
(1, 'pham pha', NULL, 'admin@gmail.com', NULL, NULL, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, NULL, NULL, ''),
(2, 'huong', 'Nữ', 'trainer2@gmail.com', '1234567890', '2022-06-09', '', '', 'trainer', NULL, NULL, 'public/Image/202206040932huyhoangit.jpg', ''),
(5, 'pham pha dz', 'Nam', 'phampha8a3@gmail.com', '12345678', '2022-06-10', 'phampha8a3@gmail.com', '2c065aae9fcb37b49043a5a2012b3dbf', 'trainer', '2022-06-02', NULL, 'public/Image/202206020917huyhoangit.jpg', ''),
(7, 'pha pham', 'Nam', 'member1@gmail.com', '1234567890', '2022-06-10', 'member1@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'member', '2022-06-04', NULL, 'public/Image/202206060926huyhoangit.jpg', ''),
(9, 'pham pha 2', 'Nam', 'pvpdaoclone2@gmail.com', '1234567980', '2022-06-15', 'user2@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'member', '2022-06-06', NULL, NULL, ''),
(10, 'final test', 'Nam', 'pvpdaoclone31@gmail.com', '0354327028', '2022-06-14', 'pvpdaoclone32@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'member', '2022-06-14', NULL, 'public/Image/', '$2y$10$kXUWqUdFrFWlBAYJTwkI8uOcVLT2uS13SXLzeWExVi82tZ.V/XPJi'),
(11, 'final test 2', 'Nữ', 'pvpdaoclone3@gmail.com', '0354327028', '2022-06-14', 'pvpdaoclone3@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'member', '2022-06-14', NULL, 'public/Image/202206190822huyhoangit.jpg', '$2y$10$mtwc4g.gpu8cOPzgcMMPouQoSSR6pyQEh78yum6Pb7FJKcnRnI69a'),
(12, 'minh huong', 'Nam', 'pvpdaoclone1@gmail.com', '0903697053', '2022-06-24', 'pvpdaoclone1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'member', '2022-06-15', NULL, '', '$2y$10$vwc.j/6yS9Rh6Cb1fu2Dj.5NaMGuzcgF28wodn38LHkKat4DURP6S'),
(15, 'validation', 'Nam', 'validation@gmail.com', '1233211231', '1996-02-18', 'validation@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'member', '2022-06-17', NULL, '', '$2y$10$RjqC2tZwEIrUnR1zEX0s.O4mRMtWbUrjI2Q5TDovopujgRh4rIG9y'),
(16, 'thanh hau', 'Nam', 'thanhhau@gmail.com', '1231231234', '2022-06-09', 'thanhhau@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'trainer', '2022-06-18', NULL, 'public/Image/202206181136huyhoangit.jpg', '$2y$10$kWVKEc2G2i6aBFuzU356muoodLMJVG0o6Y0/QOnXdPAc030Y8B1IS'),
(17, 'testadd2', 'Nam', 'testadd@gmail.com', '1234567899', '2022-06-30', 'testadd@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'member', '2022-06-18', NULL, '', '$2y$10$AtjfHuVa9ctZgObPr8.P/ujKYOO.OK4oIujZbjWVE.aHqMiI/PoFK'),
(18, 'test', 'Nam', 'pvpdaoclone456@gmail.com', '123123123123', '2022-06-23', 'pvpdaoclone456@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'trainer', '2022-06-24', NULL, 'public/Image/202206240928huyhoangit.jpg', '$2y$10$e2R1Cw87GCbYxosrRD1qluqf53JmXWaeVQstsMPfyk23oo1JabFj2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `body_index`
--
ALTER TABLE `body_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `class_registration`
--
ALTER TABLE `class_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_class_cr` (`class_id`),
  ADD KEY `fk_member_cr` (`member_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_us` (`member_id`);

--
-- Indexes for table `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pack_registration`
--
ALTER TABLE `pack_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pack_us` (`member_id`),
  ADD KEY `fk_pack_ps` (`pack_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_schedule_mb` (`member_id`),
  ADD KEY `fk_schedule_pt` (`trainer_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `body_index`
--
ALTER TABLE `body_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class_registration`
--
ALTER TABLE `class_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pack`
--
ALTER TABLE `pack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pack_registration`
--
ALTER TABLE `pack_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`id`);

--
-- Constraints for table `class_registration`
--
ALTER TABLE `class_registration`
  ADD CONSTRAINT `fk_class_cr` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `fk_member_cr` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_us` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pack_registration`
--
ALTER TABLE `pack_registration`
  ADD CONSTRAINT `fk_pack_ps` FOREIGN KEY (`pack_id`) REFERENCES `pack` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pack_us` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_schedule_mb` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_schedule_pt` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
