-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2020 at 03:00 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(10) NOT NULL,
  `department_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` tinyblob NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `user_role_id` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `department`, `user_role_id`, `date_created`, `date_updated`) VALUES
(2, 'admin', 0x30656163313530616535303164623330396661363464663239623732363933613736373730303962, 'Admin', 'Admin', 'admin@avinnovz.com', '1', '1', '2018-04-12 11:39:46', '2020-02-09 21:02:19'),
(9, 'lou', 0x30656163313530616535303164623330396661363464663239623732363933613736373730303962, 'Lou', 'Galban', 'lou@avinnovz.com', '1', '1', '2020-02-09 20:32:44', '2020-02-09 22:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(10) NOT NULL,
  `user_role_name` varchar(50) DEFAULT NULL,
  `recipient_all` int(5) DEFAULT NULL,
  `recipient_monthly` int(5) DEFAULT NULL,
  `recipient_add` int(5) DEFAULT NULL,
  `recipient_update` int(5) DEFAULT NULL,
  `recipient_request` int(5) DEFAULT NULL,
  `recipient_approverequest` int(5) DEFAULT NULL,
  `recipient_archived` int(5) DEFAULT NULL,
  `maps` int(5) DEFAULT NULL,
  `package` int(5) DEFAULT NULL,
  `package_add` int(5) DEFAULT NULL,
  `package_update` int(5) DEFAULT NULL,
  `package_delete` int(5) DEFAULT NULL,
  `orders` int(5) DEFAULT NULL,
  `orders_add` int(5) DEFAULT NULL,
  `orders_update` int(5) DEFAULT NULL,
  `deploy_update` int(5) DEFAULT NULL,
  `deploy_add` int(5) DEFAULT NULL,
  `courier` int(5) DEFAULT NULL,
  `courier_add` int(5) DEFAULT NULL,
  `courier_update` int(5) DEFAULT NULL,
  `report_recipient` int(5) DEFAULT NULL,
  `report_recipient_print` int(5) DEFAULT NULL,
  `report_barangay` int(5) DEFAULT NULL,
  `report_barangay_report` int(5) DEFAULT NULL,
  `report_courier` int(5) DEFAULT NULL,
  `report_courier_print` int(5) DEFAULT NULL,
  `users` int(5) DEFAULT NULL,
  `users_add` int(5) DEFAULT NULL,
  `users_update` int(5) DEFAULT NULL,
  `user_role` int(5) DEFAULT NULL,
  `api` int(5) DEFAULT NULL,
  `import_export` int(5) DEFAULT NULL,
  `truncate_data` int(5) DEFAULT NULL,
  `added_by` int(50) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role_name`, `recipient_all`, `recipient_monthly`, `recipient_add`, `recipient_update`, `recipient_request`, `recipient_approverequest`, `recipient_archived`, `maps`, `package`, `package_add`, `package_update`, `package_delete`, `orders`, `orders_add`, `orders_update`, `deploy_update`, `deploy_add`, `courier`, `courier_add`, `courier_update`, `report_recipient`, `report_recipient_print`, `report_barangay`, `report_barangay_report`, `report_courier`, `report_courier_print`, `users`, `users_add`, `users_update`, `user_role`, `api`, `import_export`, `truncate_data`, `added_by`) VALUES
(1, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
