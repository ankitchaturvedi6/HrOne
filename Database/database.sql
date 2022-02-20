-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2021 at 01:26 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrone`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

CREATE TABLE `Attendance` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `checkin` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `checkout` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` date NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(30) NOT NULL,
  `outstatus` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `instatus` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Attendance`
--

INSERT INTO `Attendance` (`id`, `uid`, `checkin`, `checkout`, `date`, `month`, `year`, `outstatus`, `instatus`) VALUES
(4, 3, '11:53:46am', '17:53:46am', '2021-05-15', '05', '2021', '0', '-1'),
(5, 5, '11:53:46am', '17:53:46am', '2021-05-15', '05', '2021', '0', '0'),
(6, 6, '11:53:46am', '17:53:46am', '2021-05-15', '05', '2021', '0', '0'),
(7, 3, '05:10:44pm', '01:18:25pm', '2021-05-16', 'May', '2021', '-1', '-1'),
(8, 5, '10:40:18am', '01:18:25pm', '2021-05-17', 'May', '2021', '-1', '-1'),
(9, 1, '10:40:18am', '04:44:43pm', '2021-05-16', '05', '2021', '-1', '-1'),
(13, 9, '03:14:48pm', '03:14:59pm', '2021-05-17', 'May', '2021', '-1', '-1'),
(14, 1, '01:43:06pm', '04:44:43pm', '2021-05-18', 'May', '2021', '-1', '-1'),
(15, 12, '01:32:01pm', '01:06:04pm', '2021-05-19', 'May', '2021', '-1', '-1'),
(16, 1, '04:44:41pm', '04:44:43pm', '2021-05-19', 'May', '2021', '-1', '-1'),
(17, 1, '11:38:03am', NULL, '2021-05-20', 'May', '2021', '-1', '-1'),
(18, 12, '01:05:53pm', '01:06:04pm', '2021-05-20', 'May', '2021', '-1', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `Attendance_Correction`
--

CREATE TABLE `Attendance_Correction` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `reason` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `check-in` time NOT NULL,
  `check-out` time NOT NULL,
  `status` int NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Attendance_Correction`
--

INSERT INTO `Attendance_Correction` (`id`, `uid`, `reason`, `date`, `check-in`, `check-out`, `status`, `remarks`) VALUES
(8, 1, '1', '2021-05-16', '11:53:46', '17:53:46', -1, 'dadadadasdadaaaaaaaaaaaaaaaaaaaa'),
(9, 5, '1', '2021-05-16', '11:53:46', '17:53:46', -1, 'dadadadasdadaaaaaaaaaaaaaaaaaaaa'),
(10, 6, '1', '2021-05-16', '11:53:46', '17:53:46', -1, 'dadadadasdadaaaaaaaaaaaaaaaaaaaa'),
(11, 3, 'sfsfds', '2021-04-01', '11:53:46', '17:53:46', -1, 'asfasfafaffdsafafafdsfas'),
(12, 6, 'sfsfds', '2021-05-15', '11:53:46', '17:53:46', -1, 'sgfsgfdgsfgsdgsdgfdsg'),
(13, 5, 'sfsfds', '2021-05-15', '11:53:46', '17:53:46', -1, 'sgfsgfdgsfgsdgsdgfdsg'),
(14, 6, 'sfsfds', '2021-05-16', '11:53:46', '17:53:46', -1, 'sgfsgfdgsfgsdgsdgfdsg'),
(17, 6, 'sfsfds', '2021-05-15', '11:53:46', '17:53:46', -1, 'sadfdsfasdfsdafsdafadsf'),
(18, 5, 'sfsfds', '2021-05-15', '11:53:46', '17:53:46', -1, 'sadfdsfasdfsdafsdafadsf'),
(21, 3, 'sfsfds', '2021-05-16', '13:45:34', '17:53:46', -1, 'vvffvfvffvvfvvfvfvfvvf'),
(22, 9, '0', '2021-05-12', '17:20:00', '16:20:00', -1, 'pppppppppp'),
(23, 1, '0', '2021-05-15', '14:46:00', '14:46:00', -1, 'bllllllllll');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `id` int NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobileno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateofjoining` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fathername` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dob` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `reportingmanager` int NOT NULL,
  `positionid` int NOT NULL,
  `roleid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`id`, `name`, `email`, `password`, `mobileno`, `dateofjoining`, `fathername`, `dob`, `gender`, `reportingmanager`, `positionid`, `roleid`) VALUES,
(3, 'sdfa', 'ankdfhaturvedi@bigsteptech.com', 'd00f5d5217896fb7fd601412cb890830', '1264567890', '2021-05-10', 'sdfsfds', '20-01-2000', 'Male', 1, 2, '2'),
(5, 'hitesh', 'aadadturvedi@bigsteptech.com', 'd00f5d5217896fb7fd601412cb890830', '1234567800', '2021-05-10', 'sdfsfds', '20-01-2000', 'Male', 1, 2, '3'),
(6, 'amit', 'ankiturvedi@bigsteptech.com', 'd00f5d5217896fb7fd601412cb890830', '1234567890', '2021-05-10', 'sfa', '20-01-2000', 'Male', 1, 2, '3'),
(8, 'hello world', 'ankit.chaturvedi@bigs', 'dsfafa', '12345036987', '2021-5-16', 'fsfsfsfs', '2021-05-22', 'Male', 1, 3, '3'),
(9, 'hello php', 'php@gmail.com', '218140990315bb39d948a523d61549b4', '0000000000', '2021-5-17', 'backend', '1994-01-17', 'Female', 1, 3, '1'),
(11, 'hello java', 'java@gmail.com', '365d856b0fc03b4a4d0ed0e49c851102', '1234560123', '2021-5-17', 'java', '2021-05-16', 'Male', 1, 3, '1'),
(12, 'ajax', 'ajax@gmail.com', '2705a83a5a0659cce34583972637eda5', '0011223344', '2021-5-19', 'javascript', '2016-01-19', 'Male', 5, 3, '1'),
(13, 'gfgdgdgd', 'aaturvedi@bigsteptech.com', 'fa9bbe2cc378b68d51e65d40269bb91e', '0000000000', '2021-5-19', 'sdf', '2021-05-13', 'Male', 5, 3, '2'),
(14, 'sdkfjksfjkaljflk', '', '83774edd34e9b1a02f2b3b602cacb1a3', '0000000000', '2021-5-19', 'sdkfjkasjkldfj', '2021-05-13', 'Male', 1, 3, '4'),
(15, 'cpp', 'cpp@coding.com', '2a5540b421ce0577456c823d81fcd010', '0000000012', '2021-5-20', 'c', '2021-05-15', 'Male', 6, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `Leaves`
--

CREATE TABLE `Leaves` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `leaveid` int NOT NULL,
  `status` int NOT NULL,
  `requestdate` date DEFAULT NULL,
  `reason` text,
  `name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Leaves`
--

INSERT INTO `Leaves` (`id`, `uid`, `startdate`, `enddate`, `leaveid`, `status`, `requestdate`, `reason`, `name`) VALUES
(1, 3, '2021-05-17', '2021-05-17', 2, 1, '2021-05-16', 'kjsdkfjsklfjlskfjklsljflksjfkslf', NULL),
(2, 5, '2021-05-18', '2021-05-18', 2, 1, '2021-05-17', 'jkjkjkjkjkjkjkjjj', NULL),
(3, 1, '2021-05-16', '2021-05-16', 2, 1, '2021-05-17', 'nothing', 'ankit'),
(4, 1, '2021-05-16', '2021-05-16', 1, -1, '2021-05-17', 'fsfsfsfsffsfsfsf', 'ankit'),
(5, 1, '2021-05-20', '2021-05-15', 2, -1, '2021-05-17', 'pppppppppp', 'ankit'),
(7, 1, '2021-05-15', '2021-05-11', 1, -1, '2021-05-20', 'blah blah', 'ankit'),
(8, 1, '2021-05-16', '2021-05-10', 2, -1, '2021-05-20', 'blah blah blah', 'ankit');

-- --------------------------------------------------------

--
-- Table structure for table `Leave_Types`
--

CREATE TABLE `Leave_Types` (
  `id` int NOT NULL,
  `type` varchar(40) NOT NULL,
  `qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Leave_Types`
--

INSERT INTO `Leave_Types` (`id`, `type`, `qty`) VALUES
(1, 'B.L', 0.5),
(2, 'Noraml Leave', 3),
(3, 'Leave Without Pay', 0);

-- --------------------------------------------------------

--
-- Table structure for table `NewAttendance`
--

CREATE TABLE `NewAttendance` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `NewAttendance`
--

INSERT INTO `NewAttendance` (`id`, `uid`, `date`, `time`, `status`) VALUES
(1, 3, '2021-05-16', '16:11:00', '-1'),
(2, 3, '2021-05-16', '20:11:00', '-1'),
(3, 5, '2021-05-16', '16:11:00', '-1'),
(4, 5, '2021-05-16', '20:11:00', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `Position`
--

CREATE TABLE `Position` (
  `id` int NOT NULL,
  `pos` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Position`
--

INSERT INTO `Position` (`id`, `pos`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `id` int NOT NULL,
  `role` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `role`) VALUES
(1, 'Programmer'),
(2, 'Writer'),
(3, 'Marketing '),
(4, 'Graphic Designer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Attendance_Correction`
--
ALTER TABLE `Attendance_Correction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Leaves`
--
ALTER TABLE `Leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Leave_Types`
--
ALTER TABLE `Leave_Types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `NewAttendance`
--
ALTER TABLE `NewAttendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attendance`
--
ALTER TABLE `Attendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Attendance_Correction`
--
ALTER TABLE `Attendance_Correction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Leaves`
--
ALTER TABLE `Leaves`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Leave_Types`
--
ALTER TABLE `Leave_Types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `NewAttendance`
--
ALTER TABLE `NewAttendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
