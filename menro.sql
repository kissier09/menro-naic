-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2022 at 11:04 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menro_db`
--
--
-- Table structure for table `act_log`
--

CREATE TABLE `act_log` (
  `act_id` int NOT NULL,
  `date` datetime NOT NULL,
  `activity` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `del_shop`
--

CREATE TABLE `del_shop` (
  `del-shop_id` int NOT NULL,
  `shop_id` int NOT NULL,
  `shop_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `google_map_location` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `del_user`
--

CREATE TABLE `del_user` (
  `del-member_id` int NOT NULL,
  `member_id` int NOT NULL,
  `last_name` int NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `contact` bigint NOT NULL,
  `email_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_picture` longblob NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `account_status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collection_record`
--


CREATE TABLE `tbl_collection_record` (
  `record_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `total_amount` float NOT NULL,
  `date` date NOT NULL,
  `processed_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garbage_type`
--

CREATE TABLE `tbl_garbage_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `reward` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_junkshop`
--

CREATE TABLE `tbl_junkshop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `google_map_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `gender` int(1) NOT NULL,
  `age` int(3) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `profile_picture` longblob NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `account_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `avatar` longblob NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` int(30) NOT NULL,
  `user_category_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE `tbl_user_group` (
  `user_group_id` int(11) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `allow_add` int(1) NOT NULL,
  `allow_edit` int(1) NOT NULL,
  `allow_delete` int(1) NOT NULL,
  `allow_print` int(1) NOT NULL,
  `allow_import` int(1) NOT NULL,
  `allow_export` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_collection_record`
--
ALTER TABLE `tbl_collection_record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `processed_by` (`processed_by`);

--
-- Indexes for table `tbl_garbage_type`
--
ALTER TABLE `tbl_garbage_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_junkshop`
--
ALTER TABLE `tbl_junkshop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_category_id` (`user_category_id`);

--
-- Indexes for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_collection_record`
--
ALTER TABLE `tbl_collection_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_garbage_type`
--
ALTER TABLE `tbl_garbage_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_junkshop`
--
ALTER TABLE `tbl_junkshop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_collection_record`
--
ALTER TABLE `tbl_collection_record`
  ADD CONSTRAINT `tbl_collection_record_ibfk_1` FOREIGN KEY (`processed_by`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_collection_record_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `tbl_member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_collection_record_ibfk_3` FOREIGN KEY (`shop_id`) REFERENCES `tbl_junkshop` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_collection_record_ibfk_4` FOREIGN KEY (`type_id`) REFERENCES `tbl_garbage_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`user_category_id`) REFERENCES `tbl_user_group` (`user_group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
