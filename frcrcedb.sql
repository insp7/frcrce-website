-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 09:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frcrcedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_details` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `event_type` varchar(30) NOT NULL,
  `institute_funding` int(11) NOT NULL,
  `sponsor_funding` int(11) NOT NULL,
  `event_expenditure` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` int(11) NOT NULL,
  `internal_participants_count` int(11) NOT NULL,
  `external_participants_count` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_details`, `address`, `event_type`, `institute_funding`, `sponsor_funding`, `event_expenditure`, `start_date`, `end_date`, `internal_participants_count`, `external_participants_count`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(28, 'Machine Learning ', 'Some event details', 'LOL', 'fdp', 123, 1231, 223, '2019-12-12', 2019, 123123, 12312, '2019-03-17 16:27:33', 3, '0000-00-00 00:00:00', 0, b'0'),
(29, 'lol', 'lol', 'jhkh', '', 0, 0, 0, '0000-00-00', 0, 0, 0, '2019-03-19 19:46:52', 0, '0000-00-00 00:00:00', 0, b'0'),
(30, 'lol', 'lol', 'jhkh', '', 0, 0, 0, '0000-00-00', 0, 0, 0, '2019-03-19 19:46:52', 0, '0000-00-00 00:00:00', 0, b'0'),
(31, 'lol', 'lol', 'jhkh', '', 0, 0, 0, '0000-00-00', 0, 0, 0, '2019-03-19 19:46:53', 0, '0000-00-00 00:00:00', 0, b'0'),
(32, 'lol', 'lol', 'jhkh', '', 0, 0, 0, '0000-00-00', 0, 0, 0, '2019-03-19 19:46:53', 0, '0000-00-00 00:00:00', 0, b'0'),
(33, 'lol', 'lol', 'jhkh', '', 0, 0, 0, '0000-00-00', 0, 0, 0, '2019-03-19 19:46:53', 0, '0000-00-00 00:00:00', 0, b'0'),
(34, 'lol', 'lol', 'jhkh', '', 0, 0, 0, '0000-00-00', 0, 0, 0, '2019-03-19 19:46:53', 0, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `event_coordinators`
--

CREATE TABLE `event_coordinators` (
  `ec_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_coordinators`
--

INSERT INTO `event_coordinators` (`ec_id`, `event_id`, `staff_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 28, 3, '2019-03-17 20:57:33', 3, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `event_images_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_image_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE `news_feed` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_feed`
--

INSERT INTO `news_feed` (`news_id`, `title`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(4, 'This is a sample event! *BREAKING NEWS*', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed augue eros, malesuada at magna ac, blandit sodales neque. Nunc faucibus, orci et cursus semper, orci velit finibus neque, non fermentum enim nibh ac dolor. Vivamus varius dolor rutrum massa frin', '2019-03-10 15:30:31', 3, '0000-00-00 00:00:00', 0, b'0'),
(5, 'This would work now!', 'Gotta check this now !', '2019-03-17 15:56:49', 3, '2019-03-20 04:52:25', 3, b'0'),
(6, 'asd', 'asd', '2019-03-20 13:32:28', 0, '0000-00-00 00:00:00', 0, b'0'),
(7, 'lol', 'asdas', '2019-03-20 13:32:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(8, '', '', '2019-03-20 13:32:35', 0, '0000-00-00 00:00:00', 0, b'0'),
(9, '', '', '2019-03-20 13:33:04', 0, '0000-00-00 00:00:00', 0, b'0'),
(10, 'lol', 'asdas', '2019-03-20 13:33:22', 0, '0000-00-00 00:00:00', 0, b'0'),
(11, 'asd', 'asd', '2019-03-20 13:33:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(12, 'this news! ', 'lol', '2019-03-20 13:34:10', 0, '0000-00-00 00:00:00', 0, b'0'),
(13, 'asdas', 'asdassadas', '2019-03-20 13:34:27', 0, '0000-00-00 00:00:00', 0, b'0'),
(14, 'asdf', 'asd', '2019-03-20 13:35:01', 0, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `news_images_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `news_image_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `is_permanent` bit(1) NOT NULL,
  `is_teaching` bit(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `middle_name`, `last_name`, `contact_no`, `date_of_birth`, `role`, `email`, `password`, `gender`, `is_permanent`, `is_teaching`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'Nilesh', 'mid-name', 'sir', 1234567890, '2019-02-04', 'teacher', 'ns@gmail.com', 'ns123', '', b'0', b'0', '2019-02-25 00:00:00', 3, '0000-00-00 00:00:00', 0, b'0'),
(3, 'Garima ', 'mid-name', 'ma\'am', 341343223, '2019-03-13', 'admin', 'gm@gmail.com', 'gm123', '', b'0', b'0', '2019-03-04 00:00:00', 3, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `roll_no` int(11) NOT NULL,
  `current_year` tinyint(3) NOT NULL,
  `current_semester` tinyint(3) NOT NULL,
  `year_of_admission` year(4) NOT NULL,
  `expected_year_of_passing` year(4) NOT NULL,
  `status` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `middle_name`, `last_name`, `contact_no`, `date_of_birth`, `roll_no`, `current_year`, `current_semester`, `year_of_admission`, `expected_year_of_passing`, `status`, `email`, `password`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'Aniket', 'Shantanu', 'Konkar', 9619180467, '1998-11-16', 8179, 3, 6, 2017, 2020, 'Currently pursuing', 'ak@gmail.com', '123', '2019-02-23 15:33:08', 1, '0000-00-00 00:00:00', 0, b'0'),
(15, 'Dhananjay', 'S', 'Ghumare', 9999999999, '1998-02-12', 8177, 3, 6, 2017, 2020, 'Currently-pursuing', 'dg@gmail.com', 'dg123', '2019-02-23 18:52:45', 2, '0000-00-00 00:00:00', 0, b'0'),
(16, 'Alol2', '', '', 0, '0000-00-00', 0, 0, 0, 0000, 0000, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(17, 'LOL2', '', 'lol', 0, '0000-00-00', 0, 0, 0, 0000, 0000, '', '', '', '2019-03-04 11:21:07', 0, '0000-00-00 00:00:00', 0, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_coordinators`
--
ALTER TABLE `event_coordinators`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`event_images_id`);

--
-- Indexes for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`news_images_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `event_coordinators`
--
ALTER TABLE `event_coordinators`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `event_images_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `news_images_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
