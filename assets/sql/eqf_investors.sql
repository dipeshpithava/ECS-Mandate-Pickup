-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2015 at 12:24 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `equity_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `eqf_investors`
--

CREATE TABLE `eqf_investors` (
`id` int(11) NOT NULL,
  `investor_id` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `pan` varchar(10) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `kyc_status` tinyint(1) NOT NULL,
  `kyc_agency` varchar(100) NOT NULL,
  `name_on_pan` varchar(100) NOT NULL,
  `father_spouse_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `communication_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `bank_account_type` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `name_on_bank` varchar(100) NOT NULL,
  `bank_city` varchar(100) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `bank_account_number` varchar(16) NOT NULL,
  `bank_address` varchar(500) NOT NULL,
  `bank_micr` varchar(100) NOT NULL,
  `bank_ifsc` varchar(100) NOT NULL,
  `income_range` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `trading_account` varchar(100) NOT NULL,
  `politically_exposed` varchar(100) NOT NULL,
  `trading_experience` varchar(100) NOT NULL,
  `sebi_action` varchar(100) NOT NULL,
  `nominee` tinyint(1) NOT NULL,
  `nominee_id` int(11) NOT NULL,
  `multiple_stock_broker_status` tinyint(1) NOT NULL,
  `stock_broker_name` varchar(100) NOT NULL,
  `sub_broker_name` varchar(100) NOT NULL,
  `sub_broker_client_code` varchar(100) NOT NULL,
  `disputes_dues` varchar(500) NOT NULL,
  `invest_with_funds_type` varchar(100) NOT NULL,
  `sources_of_borrowed_funds` varchar(500) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eqf_investors`
--
ALTER TABLE `eqf_investors`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eqf_investors`
--
ALTER TABLE `eqf_investors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
