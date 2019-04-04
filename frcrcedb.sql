-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 05:35 AM
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
  `end_date` date NOT NULL,
  `internal_participants_count` int(11) NOT NULL,
  `external_participants_count` int(11) NOT NULL,
  `publish_as_news` bit(1) NOT NULL DEFAULT b'0',
  `selected_attributes` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_details`, `address`, `event_type`, `institute_funding`, `sponsor_funding`, `event_expenditure`, `start_date`, `end_date`, `internal_participants_count`, `external_participants_count`, `publish_as_news`, `selected_attributes`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(60, 'Stattrak M4A4 | Howl', 'Factory New', 'Steam', 'cs go item', 120000, 120000, 200000, '2019-03-19', '2019-03-20', 100000, 200000, b'1', 'event_id,event_name,event_details,address,event_type,start_date,end_date,created_at', '2019-03-30 14:07:50', 3, '0000-00-00 00:00:00', 0, b'0'),
(61, 'Souvenir Stattrak Awp | Dragon Lore', 'Factory New', 'gaben', 'Scam ', 100000000, 100000000, 12222222, '2019-03-28', '2019-03-31', 3333333, 312222222, b'1', 'event_name,event_details,start_date,end_date,created_at', '2019-03-30 14:16:11', 3, '2019-03-30 00:00:00', 3, b'0'),
(62, 'Souvenir Stattrak USP-S | Orion ', 'Factory New', 'Steam market', 'x-pensive', 100000, 999999, 222222, '2019-03-19', '2019-03-19', 122, 2341, b'1', 'event_name,event_details,address,event_type,institute_funding,sponsor_funding,event_expenditure,start_date,end_date,internal_participants_count,external_participants_count,created_at', '2019-03-30 15:16:05', 3, '0000-00-00 00:00:00', 0, b'0'),
(63, 'Souvenir Statrak fire-serpent', 'Factory new ', 'Steam market', 'fdp', 1000000, 1000000, 100000, '2019-03-20', '2019-03-31', 12312, 21312, b'1', 'event_name,event_details,address,event_type,start_date,end_date,created_at', '2019-03-30 17:10:18', 3, '0000-00-00 00:00:00', 0, b'0'),
(64, 'some event', 'detials ', 'lol', 'asd', 221312, 12311, 12, '2019-04-24', '2019-04-09', 213, 123, b'0', '', '2019-04-04 07:46:38', 3, '0000-00-00 00:00:00', 0, b'0');

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
(1, 28, 3, '2019-03-17 20:57:33', 3, '0000-00-00 00:00:00', 0, b'0'),
(2, 0, 3, '2019-03-22 10:00:38', 3, '0000-00-00 00:00:00', 0, b'0'),
(3, 0, 5, '2019-03-22 10:00:38', 3, '0000-00-00 00:00:00', 0, b'0'),
(4, 35, 3, '2019-03-22 10:03:37', 3, '0000-00-00 00:00:00', 0, b'0'),
(5, 35, 5, '2019-03-22 10:03:38', 3, '0000-00-00 00:00:00', 0, b'0'),
(6, 36, 3, '2019-03-22 10:03:38', 3, '0000-00-00 00:00:00', 0, b'0'),
(7, 36, 5, '2019-03-22 10:03:38', 3, '0000-00-00 00:00:00', 0, b'0'),
(8, 37, 3, '2019-03-22 10:03:38', 3, '0000-00-00 00:00:00', 0, b'0'),
(9, 37, 5, '2019-03-22 10:03:38', 3, '0000-00-00 00:00:00', 0, b'0'),
(10, 38, 1, '2019-03-22 10:04:29', 3, '0000-00-00 00:00:00', 0, b'0'),
(11, 38, 3, '2019-03-22 10:04:29', 3, '0000-00-00 00:00:00', 0, b'0'),
(12, 38, 4, '2019-03-22 10:04:29', 3, '0000-00-00 00:00:00', 0, b'0'),
(13, 38, 5, '2019-03-22 10:04:29', 3, '0000-00-00 00:00:00', 0, b'0'),
(14, 40, 3, '2019-03-22 10:13:42', 3, '0000-00-00 00:00:00', 0, b'0'),
(15, 41, 3, '2019-03-22 10:14:21', 3, '0000-00-00 00:00:00', 0, b'0'),
(16, 42, 5, '2019-03-22 10:15:10', 3, '0000-00-00 00:00:00', 0, b'0'),
(17, 43, 1, '2019-03-22 10:15:55', 3, '0000-00-00 00:00:00', 0, b'0'),
(18, 44, 3, '2019-03-22 10:16:17', 3, '0000-00-00 00:00:00', 0, b'0'),
(19, 45, 3, '2019-03-22 10:23:48', 3, '0000-00-00 00:00:00', 0, b'1'),
(20, 45, 4, '2019-03-22 10:23:49', 3, '0000-00-00 00:00:00', 0, b'1'),
(21, 46, 5, '2019-03-22 10:25:43', 3, '0000-00-00 00:00:00', 0, b'0'),
(22, 47, 3, '2019-03-22 10:26:11', 3, '0000-00-00 00:00:00', 0, b'0'),
(23, 48, 4, '2019-03-22 10:26:43', 3, '0000-00-00 00:00:00', 0, b'0'),
(24, 49, 3, '2019-03-22 10:35:35', 3, '0000-00-00 00:00:00', 0, b'0'),
(25, 50, 3, '2019-03-22 10:35:36', 3, '0000-00-00 00:00:00', 0, b'0'),
(26, 51, 3, '2019-03-22 10:36:16', 3, '0000-00-00 00:00:00', 0, b'0'),
(27, 52, 3, '2019-03-22 10:36:46', 3, '0000-00-00 00:00:00', 0, b'0'),
(28, 53, 3, '2019-03-22 10:36:52', 3, '0000-00-00 00:00:00', 0, b'0'),
(29, 54, 4, '2019-03-22 10:37:31', 3, '0000-00-00 00:00:00', 0, b'0'),
(30, 55, 3, '2019-03-22 10:37:53', 3, '0000-00-00 00:00:00', 0, b'0'),
(31, 56, 3, '2019-03-27 23:36:14', 3, '0000-00-00 00:00:00', 0, b'0'),
(32, 57, 3, '2019-03-27 23:37:20', 3, '0000-00-00 00:00:00', 0, b'0'),
(33, 58, 3, '2019-03-27 23:38:08', 3, '0000-00-00 00:00:00', 0, b'0'),
(34, 59, 4, '2019-03-28 00:15:30', 3, '0000-00-00 00:00:00', 0, b'0'),
(35, 60, 3, '2019-03-28 00:16:18', 3, '0000-00-00 00:00:00', 0, b'0'),
(36, 62, 1, '2019-03-30 15:16:05', 3, '0000-00-00 00:00:00', 0, b'0'),
(37, 62, 3, '2019-03-30 15:16:05', 3, '0000-00-00 00:00:00', 0, b'0'),
(38, 63, 3, '2019-03-30 17:10:18', 3, '0000-00-00 00:00:00', 0, b'0'),
(39, 64, 3, '2019-04-04 07:46:38', 3, '0000-00-00 00:00:00', 0, b'0'),
(40, 64, 4, '2019-04-04 07:46:38', 3, '0000-00-00 00:00:00', 0, b'0'),
(41, 64, 5, '2019-04-04 07:46:38', 3, '0000-00-00 00:00:00', 0, b'0');

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

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`event_images_id`, `event_id`, `event_image_path`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(5, 60, 'm4a4howl.png', '2019-03-28 00:30:12', 0, '0000-00-00 00:00:00', 0, b'0'),
(6, 60, 'm4a4howl2.png', '2019-03-28 00:30:12', 0, '0000-00-00 00:00:00', 0, b'0'),
(7, 60, 'm4a4howl3.png', '2019-03-28 00:30:12', 0, '0000-00-00 00:00:00', 0, b'0'),
(8, 61, 'dlore.png', '2019-03-30 14:51:18', 3, '0000-00-00 00:00:00', 0, b'0'),
(9, 61, 'dlore2.png', '2019-03-30 14:51:18', 3, '0000-00-00 00:00:00', 0, b'0'),
(10, 60, 'SHFc7Pi.jpg', '2019-03-30 16:40:38', 0, '0000-00-00 00:00:00', 0, b'0'),
(11, 62, '418992.jpg', '2019-03-30 16:57:44', 0, '0000-00-00 00:00:00', 0, b'0'),
(12, 62, '1010280_571740956216050_188810102_n.jpg', '2019-03-30 16:57:44', 0, '0000-00-00 00:00:00', 0, b'0'),
(13, 62, '1229831_548344048546055_223531300_n.jpg', '2019-03-30 16:57:44', 0, '0000-00-00 00:00:00', 0, b'0'),
(14, 62, '1458588_538286709590038_1073768475_n.jpg', '2019-03-30 16:57:44', 0, '0000-00-00 00:00:00', 0, b'0'),
(15, 62, '1330627402assassins-creed-3-wallpapers-hd-600x300.jpg', '2019-03-30 16:57:44', 0, '0000-00-00 00:00:00', 0, b'0'),
(16, 62, 'AC.jpg', '2019-03-30 16:57:44', 0, '0000-00-00 00:00:00', 0, b'0'),
(17, 63, 'lol5.png', '2019-03-30 17:19:27', 0, '0000-00-00 00:00:00', 0, b'0'),
(18, 61, 'lol2.png', '2019-03-30 17:21:36', 0, '0000-00-00 00:00:00', 0, b'0'),
(19, 64, 'Untitled5.png', '2019-04-04 07:48:04', 0, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `ipr`
--

CREATE TABLE `ipr` (
  `ipr_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `year` date NOT NULL,
  `patents_published_count` int(11) NOT NULL,
  `patents_granted_count` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipr`
--

INSERT INTO `ipr` (`ipr_id`, `staff_id`, `year`, `patents_published_count`, `patents_granted_count`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, '2019-04-22', 600, 200, '2019-04-04 05:42:29', 1, '2019-04-04 02:28:10', 1, b'0'),
(2, 1, '2017-04-04', 324, 110, '2019-04-04 05:42:31', 1, '0000-00-00 00:00:00', 0, b'0'),
(3, 1, '2019-03-31', 10000, 12, '2019-04-04 06:07:05', 1, '0000-00-00 00:00:00', 0, b'0'),
(4, 1, '2019-04-03', 2, 2, '2019-04-04 06:08:37', 1, '0000-00-00 00:00:00', 0, b'0'),
(5, 1, '2019-04-23', 70, 70, '2019-04-04 06:09:54', 1, '2019-04-04 02:40:06', 1, b'0'),
(6, 1, '2019-05-23', 1, 1, '2019-04-04 06:13:28', 1, '0000-00-00 00:00:00', 0, b'0');

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
(1, 'AWP | Asiimov', 'Field Tested', '2019-03-30 16:03:14', 0, '0000-00-00 00:00:00', 0, b'0'),
(2, 'Final testing', 'should work! ', '2019-03-30 16:19:09', 0, '0000-00-00 00:00:00', 0, b'0'),
(3, 'Should work now !', 'Condition factory new! ', '2019-03-30 16:21:28', 0, '0000-00-00 00:00:00', 0, b'0'),
(4, 'This is a sample News', 'LOL', '2019-04-04 07:47:29', 0, '0000-00-00 00:00:00', 0, b'0');

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

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`news_images_id`, `news_id`, `news_image_path`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, 'awp-asiimov.PNG', '2019-03-30 16:03:14', 0, '0000-00-00 00:00:00', 0, b'0'),
(2, 1, 'Untitled5.png', '2019-03-30 16:14:25', 0, '0000-00-00 00:00:00', 0, b'0'),
(3, 3, 'usps-orion.png', '2019-03-30 16:21:28', 0, '0000-00-00 00:00:00', 0, b'0'),
(4, 3, 'usps-orion2.png', '2019-03-30 16:21:28', 0, '0000-00-00 00:00:00', 0, b'0'),
(5, 3, 'awp-asiimov.PNG', '2019-03-30 16:23:32', 0, '0000-00-00 00:00:00', 0, b'0'),
(7, 3, 'battlefield_3___dirt_bike_jump_at_kiasar_by_t0xico-d61i5fj.jpg', '2019-03-30 16:34:14', 0, '0000-00-00 00:00:00', 0, b'0'),
(8, 2, 'lol3.png', '2019-03-30 16:59:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(9, 2, 'lol7.png', '2019-03-30 16:59:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(10, 2, 'lol8.png', '2019-03-30 16:59:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(11, 2, 'lol9.png', '2019-03-30 16:59:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(12, 2, 'lol12.png', '2019-03-30 16:59:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(13, 2, 'lol.png', '2019-03-30 17:00:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(14, 2, 'lol2.png', '2019-03-30 17:00:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(15, 2, 'nice.png', '2019-03-30 17:00:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(16, 2, 'usps-orion.png', '2019-03-30 17:24:36', 0, '0000-00-00 00:00:00', 0, b'0'),
(17, 2, 'usps-orion2.png', '2019-03-30 17:24:36', 0, '0000-00-00 00:00:00', 0, b'0'),
(18, 4, 'awp-asiimov.PNG', '2019-04-04 07:47:29', 0, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `publication_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `year` date NOT NULL,
  `journal` varchar(100) NOT NULL,
  `is_ugc_approved` bit(1) NOT NULL DEFAULT b'0',
  `citation` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`publication_id`, `staff_id`, `title`, `year`, `journal`, `is_ugc_approved`, `citation`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, 'Some publication2', '2019-04-09', 'Some journal', b'1', 'This si some citation', '2019-04-02 18:41:53', 1, '2019-04-04 03:06:28', 1, b'0'),
(2, 1, 'Some publication', '2019-04-09', 'Some journal', b'1', 'This si some citation', '2019-04-02 18:41:56', 1, '0000-00-00 00:00:00', 0, b'0'),
(3, 1, 'lol', '2019-04-16', 'dfg', b'0', 'asdf', '2019-04-02 20:02:30', 1, '0000-00-00 00:00:00', 0, b'0'),
(4, 1, 'lol', '2019-04-16', 'dfg', b'0', 'asdf', '2019-04-02 20:02:31', 1, '0000-00-00 00:00:00', 0, b'0'),
(5, 1, 'lol', '2019-04-16', 'dfg', b'0', 'asdf', '2019-04-02 20:02:45', 1, '0000-00-00 00:00:00', 0, b'0'),
(6, 1, 'lol', '2019-04-16', 'dfg', b'0', 'asdf', '2019-04-02 20:02:45', 1, '0000-00-00 00:00:00', 0, b'0'),
(7, 1, 'lol', '2019-04-16', 'dfg', b'0', 'asdf', '2019-04-02 20:02:45', 1, '0000-00-00 00:00:00', 0, b'1'),
(8, 1, 'lol', '2019-04-16', 'dfg', b'0', 'asdf', '2019-04-02 20:02:45', 1, '0000-00-00 00:00:00', 0, b'1'),
(9, 1, 'asd', '0000-00-00', '', b'1', '', '2019-04-02 21:19:03', 1, '0000-00-00 00:00:00', 0, b'1'),
(10, 1, 'ROFL2', '2019-12-24', 'Lets see1', b'1', 'Added toastr!', '2019-04-02 21:21:23', 1, '2019-04-03 05:04:09', 1, b'0'),
(11, 1, 'asd', '2019-04-24', 'asd', b'1', 'asd', '2019-04-02 21:24:41', 1, '0000-00-00 00:00:00', 0, b'1'),
(12, 1, 'lol', '2019-04-25', 'did i do this ?', b'1', '', '2019-04-03 21:17:14', 1, '0000-00-00 00:00:00', 0, b'0'),
(13, 1, 'asd', '2019-04-05', 'asdadid i do this ', b'1', 'asd', '2019-04-03 21:17:27', 1, '0000-00-00 00:00:00', 0, b'0'),
(14, 1, 'new test', '2019-05-03', 'asd', b'1', 'lolol', '2019-04-04 06:43:49', 1, '0000-00-00 00:00:00', 0, b'0'),
(15, 1, 'yet anohter publication', '2019-04-01', 'asd', b'1', 'lol', '2019-04-04 06:52:09', 1, '0000-00-00 00:00:00', 0, b'1'),
(16, 1, 'lolol testing toastr', '2019-04-10', 'asdas', b'1', 'ahaha', '2019-04-04 06:58:28', 1, '0000-00-00 00:00:00', 0, b'0'),
(17, 1, 'lol', '2019-05-02', 'gfhfghfg', b'1', 'gfhg', '2019-04-04 06:59:14', 1, '0000-00-00 00:00:00', 0, b'0'),
(18, 1, 'lol', '2019-05-02', 'gfhfghfg', b'1', 'gfhg', '2019-04-04 06:59:14', 1, '0000-00-00 00:00:00', 0, b'0'),
(19, 1, 'shadow hunter', '0000-00-00', '', b'1', '', '2019-04-04 06:59:49', 1, '0000-00-00 00:00:00', 0, b'0'),
(20, 1, 'rofl', '0000-00-00', '', b'1', '', '2019-04-04 07:00:16', 1, '0000-00-00 00:00:00', 0, b'0'),
(21, 1, 'ugc test', '0000-00-00', '', b'1', '', '2019-04-04 07:01:12', 1, '0000-00-00 00:00:00', 0, b'0'),
(22, 1, 'asd', '0000-00-00', '', b'0', '', '2019-04-04 07:01:26', 1, '0000-00-00 00:00:00', 0, b'0'),
(23, 1, 'lolol', '0000-00-00', '', b'1', '', '2019-04-04 07:04:55', 1, '0000-00-00 00:00:00', 0, b'0'),
(24, 1, 'lol', '0000-00-00', '', b'1', '', '2019-04-04 07:07:07', 1, '0000-00-00 00:00:00', 0, b'0'),
(25, 1, 'seenow', '0000-00-00', '', b'1', '', '2019-04-04 07:08:28', 1, '0000-00-00 00:00:00', 0, b'0'),
(26, 1, 'now this hold wokr', '2019-05-01', 'asdfsadfsad32sda', b'0', 'asdfasd325423', '2019-04-04 07:14:40', 1, '0000-00-00 00:00:00', 0, b'0'),
(27, 1, 'LOLO', '2019-04-25', 'some jrnal', b'1', 'approveD!', '2019-04-04 07:17:04', 1, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `published_books`
--

CREATE TABLE `published_books` (
  `published_books_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `published_books`
--

INSERT INTO `published_books` (`published_books_id`, `staff_id`, `details`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, 'this shold be now updated2', '2019-04-04 06:15:05', 1, '2019-04-04 03:06:37', 1, b'0'),
(2, 1, 'some book 2', '2019-04-04 06:15:07', 1, '0000-00-00 00:00:00', 0, b'0'),
(3, 1, 'asdas', '2019-04-04 06:51:36', 1, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `research_projects`
--

CREATE TABLE `research_projects` (
  `research_projects_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `principal_investigator` int(11) NOT NULL,
  `grant_details` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `year` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='principal_investigator shall contain staff_id values';

--
-- Dumping data for table `research_projects`
--

INSERT INTO `research_projects` (`research_projects_id`, `staff_id`, `principal_investigator`, `grant_details`, `title`, `amount`, `year`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, 9, 'grant updated', 'Title2', 21312, '2019-04-17', '2019-04-03 18:35:46', 1, '2019-04-04 03:05:36', 1, b'0'),
(2, 1, 1, 'Some grant', 'Investigating it myself LOLOL', 12312, '2019-04-17', '2019-04-03 18:35:48', 1, '2019-04-03 17:32:28', 1, b'0'),
(3, 1, 1, 'should work', 'lol', 0, '2019-04-22', '2019-04-04 05:17:16', 1, '0000-00-00 00:00:00', 0, b'0'),
(4, 1, 1, 'should work', 'lol', 0, '2019-04-22', '2019-04-04 05:17:23', 1, '0000-00-00 00:00:00', 0, b'0'),
(5, 1, 1, 'should work', 'lol', 0, '2019-04-22', '2019-04-04 05:17:23', 1, '0000-00-00 00:00:00', 0, b'0'),
(6, 1, 5, 'asd', 'asd', 0, '2019-04-09', '2019-04-04 05:19:38', 1, '0000-00-00 00:00:00', 0, b'0'),
(7, 1, 5, 'asd', 'asd', 0, '2019-04-09', '2019-04-04 05:19:59', 1, '0000-00-00 00:00:00', 0, b'0'),
(8, 1, 5, 'asd', 'asd', 0, '2019-04-09', '2019-04-04 05:19:59', 1, '0000-00-00 00:00:00', 0, b'0'),
(9, 1, 6, 'asd', 'asd', 123, '2019-04-16', '2019-04-04 05:20:45', 1, '0000-00-00 00:00:00', 0, b'0'),
(10, 1, 8, 'granted lol', 'REsearch proj', 7000, '2018-06-19', '2019-04-04 05:26:43', 1, '0000-00-00 00:00:00', 0, b'0'),
(11, 1, 1, 'asd', 'ref', 0, '0000-00-00', '2019-04-04 05:29:11', 1, '2019-04-04 03:06:45', 1, b'0'),
(12, 1, 1, 'asd', 'now', 123, '0000-00-00', '2019-04-04 05:29:57', 1, '2019-04-04 03:07:04', 1, b'0'),
(13, 1, 8, 'asdas', 'now', 124, '2019-04-23', '2019-04-04 05:32:32', 1, '0000-00-00 00:00:00', 0, b'0'),
(14, 1, 3, 'ok', 'lol', 23432, '2019-04-25', '2019-04-04 05:39:56', 1, '0000-00-00 00:00:00', 0, b'0'),
(15, 1, 0, '', 'asd', 0, '0000-00-00', '2019-04-04 05:40:47', 1, '0000-00-00 00:00:00', 0, b'0');

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
  `pan` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `is_permanent` bit(1) NOT NULL,
  `is_teaching` bit(1) NOT NULL,
  `is_bos_chairman` bit(1) DEFAULT b'0',
  `is_bos_member` bit(1) NOT NULL DEFAULT b'0',
  `is_staff_selection_committee_member` bit(1) NOT NULL DEFAULT b'0',
  `is_fully_registered` bit(1) NOT NULL DEFAULT b'0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `middle_name`, `last_name`, `contact_no`, `pan`, `date_of_birth`, `role`, `email`, `password`, `gender`, `is_permanent`, `is_teaching`, `is_bos_chairman`, `is_bos_member`, `is_staff_selection_committee_member`, `is_fully_registered`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'Nilesh', 'mid-name', 'Sir', 2147483647, 0, '0000-00-00', 'teacher', 'ns@gmail.com', 'ns123', 'f', b'1', b'1', b'0', b'0', b'0', b'1', '2019-02-25 00:00:00', 3, '0000-00-00 00:00:00', 0, b'0'),
(3, 'Garima ', 'mid-name', 'ma\'am', 341343223, 0, '2019-03-13', 'admin', 'gm@gmail.com', 'gm123', 'f', b'1', b'1', b'0', b'0', b'0', b'0', '2019-03-04 00:00:00', 3, '0000-00-00 00:00:00', 0, b'0'),
(4, 'fdgdf', '', '', 0, 0, '0000-00-00', 'teacher', '', '', 'm', b'1', b'0', b'0', b'0', b'0', b'0', '2019-03-21 12:45:33', 0, '0000-00-00 00:00:00', 0, b'0'),
(5, 'fdgdf', '', '', 0, 0, '0000-00-00', 'teacher', '', '', 'f', b'0', b'1', b'0', b'0', b'0', b'0', '2019-03-21 12:45:36', 0, '0000-00-00 00:00:00', 0, b'0'),
(6, 'sadas', '', '', 0, 0, '0000-00-00', 'teacher', '', '', '', b'0', b'0', b'0', b'0', b'0', b'0', '2019-03-30 17:47:05', 0, '0000-00-00 00:00:00', 0, b'0'),
(7, 'sdfds', '', '', 0, 0, '0000-00-00', 'teacher', '', '', '', b'0', b'0', b'0', b'0', b'0', b'0', '2019-03-30 17:47:05', 0, '0000-00-00 00:00:00', 0, b'0'),
(8, 'lol', 'asdf', 'asdas', 0, 0, '0000-00-00', 'teacher', '', '', '', b'0', b'0', b'0', b'0', b'0', b'0', '2019-03-30 17:50:26', 0, '0000-00-00 00:00:00', 0, b'0'),
(9, 'sdf', 'ewr', 'werw', 0, 0, '0000-00-00', 'teacher', '', '', '', b'0', b'0', b'0', b'0', b'0', b'0', '2019-03-30 17:50:26', 0, '0000-00-00 00:00:00', 0, b'0'),
(10, 'lol', 'asdf', 'asdas', 0, 0, '0000-00-00', 'teacher', '', '', '', b'0', b'0', b'0', b'0', b'0', b'0', '2019-03-30 17:50:30', 0, '0000-00-00 00:00:00', 0, b'0'),
(11, 'sdf', 'ewr', 'werw', 0, 0, '0000-00-00', 'teacher', '', '', '', b'0', b'0', b'0', b'0', b'0', b'0', '2019-03-30 17:50:30', 0, '0000-00-00 00:00:00', 0, b'0'),
(12, '', '', '', 0, 0, '0000-00-00', '', 'konkaraniket@gmail.com', 'LOL', '', b'0', b'0', b'0', b'0', b'0', b'0', '2019-04-04 08:11:32', 0, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
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

INSERT INTO `students` (`student_id`, `first_name`, `middle_name`, `last_name`, `gender`, `contact_no`, `date_of_birth`, `roll_no`, `current_year`, `current_semester`, `year_of_admission`, `expected_year_of_passing`, `status`, `email`, `password`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'Aniket', 'Shantanu', 'Konkar', 'm', 9619180467, '1998-11-16', 8179, 3, 6, 2017, 2020, 'Currently pursuing', 'ak@gmail.com', '123', '2019-02-23 15:33:08', 1, '0000-00-00 00:00:00', 0, b'0'),
(15, 'Dhananjay', 'S', 'Ghumare', 'm', 9999999999, '1998-02-12', 8177, 3, 6, 2017, 2020, 'Currently-pursuing', 'dg@gmail.com', 'dg123', '2019-02-23 18:52:45', 2, '0000-00-00 00:00:00', 0, b'0'),
(16, 'Alol2', '', '', 'f', 0, '0000-00-00', 0, 0, 0, 0000, 0000, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(17, 'LOL2', '', 'lol', 'f', 0, '0000-00-00', 0, 0, 0, 0000, 0000, '', '', '', '2019-03-04 11:21:07', 0, '0000-00-00 00:00:00', 0, b'1');

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
-- Indexes for table `ipr`
--
ALTER TABLE `ipr`
  ADD PRIMARY KEY (`ipr_id`);

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
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`publication_id`);

--
-- Indexes for table `published_books`
--
ALTER TABLE `published_books`
  ADD PRIMARY KEY (`published_books_id`);

--
-- Indexes for table `research_projects`
--
ALTER TABLE `research_projects`
  ADD PRIMARY KEY (`research_projects_id`);

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `event_coordinators`
--
ALTER TABLE `event_coordinators`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `event_images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ipr`
--
ALTER TABLE `ipr`
  MODIFY `ipr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `news_images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `published_books`
--
ALTER TABLE `published_books`
  MODIFY `published_books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `research_projects`
--
ALTER TABLE `research_projects`
  MODIFY `research_projects_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
