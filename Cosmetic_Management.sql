-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 01:58 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sabzi_farosh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `admin_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `full_name`, `father_name`, `email`, `address`, `admin_img`) VALUES
(1, 'burhan', 'burhan', 'Burhan', 'abcd', 'BURHANAHMAD1633@GMAIL.COM', '	DHA phase v, Lahore, Punjab, Pakistan', 'assets/admin.jpeg'),
(2, 'shoaib8493', 'shoaib8493', '', '', '', '', ''),
(3, 'shoaib8493', 'shoaib8493', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_proceed`
--

CREATE TABLE `checkout_proceed` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `grand_total` float NOT NULL,
  `address` text NOT NULL,
  `item_quenty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_phone` varchar(25) NOT NULL,
  `city_town` varchar(25) NOT NULL,
  `post_code` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_proceed`
--

INSERT INTO `checkout_proceed` (`id`, `user_id`, `name`, `email`, `grand_total`, `address`, `item_quenty`, `status`, `created_at`, `customer_phone`, `city_town`, `post_code`) VALUES
(15, 13, 'jkljlkjLKJKLJLKJL', '', 360, 'LKJKLJKLJLKJ', 2, 1, '2019-11-16 12:43:45', '545454548787', 'LKJKLJLKJKL', '454545'),
(16, 13, 'checking', '', 3442.5, 'samanabad', 7, 1, '2019-11-19 05:41:41', '123456789', 'fsd', '38000'),
(18, 13, 'asdf', 'asf@gmail.com', 2099.8, 'asfsaf', 3, 0, '2019-11-20 19:05:41', '46464', 'asfasf', '64654'),
(19, 13, 'Sahib Jee', 'sahib@gmail.com', 6705, 'Malikpur', 12, 0, '2019-11-24 16:25:18', '03008295210', 'Faisalabad', '38000'),
(20, 13, 'testing', 'test@gmail.com', 132.5, 'abc', 2, 0, '2022-02-20 11:52:04', '23423423', 'abc', '234324');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_product`
--

CREATE TABLE `checkout_product` (
  `id` int(11) NOT NULL,
  `chockout_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount` float NOT NULL,
  `price` float NOT NULL,
  `quentity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_product`
--

INSERT INTO `checkout_product` (`id`, `chockout_id`, `product_id`, `discount`, `price`, `quentity`, `status`, `created_at`) VALUES
(33, 15, 19, 10, 200, 2, 0, '2019-11-16 12:43:46'),
(34, 16, 11, 10, 150, 3, 0, '2019-11-19 05:41:41'),
(35, 16, 12, 25, 50, 1, 0, '2019-11-19 05:41:41'),
(36, 16, 13, 0, 1000, 3, 0, '2019-11-19 05:41:41'),
(40, 18, 13, 0, 1000, 1, 0, '2019-11-20 19:05:41'),
(41, 18, 14, 10, 1200, 1, 0, '2019-11-20 19:05:41'),
(42, 18, 17, 1, 20, 1, 0, '2019-11-20 19:05:41'),
(43, 19, 12, 25, 50, 6, 0, '2019-11-24 16:25:18'),
(44, 19, 14, 10, 1200, 6, 0, '2019-11-24 16:25:18'),
(45, 20, 12, 25, 50, 1, 0, '2022-02-20 11:52:05'),
(46, 20, 18, 5, 100, 1, 0, '2022-02-20 11:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `contacted_user`
--

CREATE TABLE `contacted_user` (
  `id` int(50) NOT NULL,
  `contact_per_name` varchar(50) NOT NULL,
  `contact_per_email` varchar(50) NOT NULL,
  `contact_per_subject` varchar(50) NOT NULL,
  `contact_per_msg` varchar(50) NOT NULL,
  `contact_per_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacted_user`
--

INSERT INTO `contacted_user` (`id`, `contact_per_name`, `contact_per_email`, `contact_per_subject`, `contact_per_msg`, `contact_per_date`) VALUES
(4, 'sarmad', 'sarmad@gmail.com', 'issues', 'please update your issues', '2019-11-19'),
(5, 'sir', 'plese@gmail.com', 'issue', 'check please', '2018-11-30'),
(6, 'Check', 'check@mail.com', 'Checking', 'this is for test', '2019-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
--

CREATE TABLE `product_description` (
  `id` int(50) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_prize` varchar(50) NOT NULL,
  `product_quantity` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_description`
--

INSERT INTO `product_description` (`id`, `dates`, `product_name`, `product_prize`, `product_quantity`, `discount`, `product_type`, `product_description`, `product_img`) VALUES
(11, '2019-11-14', 'Banana', '150', '50', '10', 'fruit', 'good diet', 'assets/products/banana.jpg'),
(12, '2019-11-23', 'Apple', '50', '200', '25', 'fruit', 'Apple for health', 'assets/products/apple.jpg'),
(13, '2019-11-25', 'Walnuts', '1000', '100', '0', 'dryfruit', 'for winter', 'assets/products/walnut.jpg'),
(14, '2019-11-28', 'Almont', '1200', '200', '10', 'dryfruit', 'checking', 'assets/products/61fZ+YAYGaL._SL1500_.jpg'),
(15, '2019-11-01', 'Mango shake', '100', '100', '0', 'juices', 'juices', 'assets/products/mango_shake.jpg'),
(16, '2019-11-13', 'Dates shake', '100', '200', '0', 'juices', 'for health', 'assets/products/dateshake_feat.jpg'),
(17, '2019-11-26', 'Bringles', '20', '50', '1', 'vegetable', 'testing', 'assets/products/bringle-500x500.png'),
(18, '2019-11-27', 'Potato', '100', '10', '5', 'vegetable', 'sabzi', 'assets/products/potatoes-can-be-healthful.jpg'),
(19, '2019-11-20', 'Straberby', '200', '10', '10', 'fruit', 'testing', 'assets/products/strabery.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `regestration`
--

CREATE TABLE `regestration` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `profile_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regestration`
--

INSERT INTO `regestration` (`id`, `username`, `pass`, `full_name`, `father_name`, `gender`, `address`, `profile_img`) VALUES
(13, 'sahib', 'sahib', 'Sahib Bilal', 'M Akram Mahmood', 'male', 'Malikpur', 'images/userprofile/person_2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_proceed`
--
ALTER TABLE `checkout_proceed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_product`
--
ALTER TABLE `checkout_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacted_user`
--
ALTER TABLE `contacted_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_description`
--
ALTER TABLE `product_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regestration`
--
ALTER TABLE `regestration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checkout_proceed`
--
ALTER TABLE `checkout_proceed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `checkout_product`
--
ALTER TABLE `checkout_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `contacted_user`
--
ALTER TABLE `contacted_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_description`
--
ALTER TABLE `product_description`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `regestration`
--
ALTER TABLE `regestration`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
