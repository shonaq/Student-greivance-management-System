-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3303
-- Generation Time: Feb 04, 2022 at 03:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE 'admin' (
  'sno' int(5) NOT NULL,
  'usn' varchar(45) DEFAULT NULL,
  'counsellor_id' varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(255) NOT NULL,
  `usn` varchar(45) NOT NULL,
  `abuser_id` varchar(45) NOT NULL,
  `abuse_type` varchar(60) NOT NULL,
  `complaint_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `usn`, `abuser_id`, `abuse_type`, `complaint_date`) VALUES
(1, '1js19me071', '1js19is001', 'discrimination', '2022-01-12'),
(2, '1js19is071', 'saasa', 'drug', '2022-01-20'),
(3, '1js19is118', '1js19me071', 'mental abuse', '2022-01-12'),
(4, '1js19is071', '1js19me071', 'murder', '2022-01-12'),
(5, '1js19me071', '1jscs070', 'ragging', '2022-01-03'),
(7, '1js19cs70', '1js19me071', 'ragging', '2022-01-30'),
(12, '1js19cs70', '1js19me071', 'emotional abuse', '2022-01-30'),
(13, '1js19cs70', 'banusing', 'mental abuse', '2022-01-30'),
(15, '1js19cs70', 'raju', 'harassment', '2022-01-30'),
(18, '1js19cs70', 'Sandeep', 'financil abuse', '2022-02-03');

--
-- Triggers `complaint`
--
DELIMITER $$
CREATE TRIGGER 'self_complaint' BEFORE INSERT ON 'complaint' FOR EACH ROW if new.usn = new.abuser_id then
signal sqlstate '45000';
end if
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER 'self_complaint_update' BEFORE INSERT ON 'complaint' FOR EACH ROW if new.usn = new.abuser_id then
signal sqlstate '45000';
end if
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `counsellor`
--

CREATE TABLE counsellor (
  'counsellor_id' varchar(45) NOT NULL,
  'name' varchar(45) NOT NULL,
  'gender' varchar(45) NOT NULL,
  'age' int(3) NOT NULL,
  'email' varchar(45) NOT NULL,
  'phno' varchar(45) NOT NULL,
  'password' varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellor`
--

INSERT INTO `counsellor` (`counsellor_id`, `name`, `gender`, `age`, `email`, `phno`, `password`) VALUES
('bajsc01', 'banu sing', 'male', 50, 'banusing@gmail.com', '1576324890', 'coun1'),
('JSC01', 'ram', 'm', 28, 'ram@jssateb.ac.in', '9449449440', 'coun1'),
('JSC02', 'mytra', 'f', 32, 'mytra@jssateb.ac.in', '2554553669', 'coun1');

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `investigation_id` int(255) NOT NULL,
  `complaint_id` int(255) NOT NULL,
  `counsellor_id` varchar(45) NOT NULL,
  `status` varchar(60) DEFAULT 'pending',
  `priority` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`investigation_id`, `complaint_id`, `counsellor_id`, `status`, `priority`) VALUES
(1, 3, 'JSC02', 'pending', 'MID'),
(2, 15, 'JSC02', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `punishment`
--

CREATE TABLE `punishment` (
  `punishment_id` int(255) NOT NULL,
  `investigation_id` varchar(45) NOT NULL,
  `punishment_given` varchar(60) NOT NULL,
  `date_solved` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punishment`
--

INSERT INTO `punishment` (`punishment_id`, `investigation_id`, `punishment_given`, `date_solved`) VALUES
(1, '1', 'suspend', '2022-02-03'),
(2, '2', 'restricated', '2022-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `age` int(3) NOT NULL,
  `year` int(3) NOT NULL,
  `department` varchar(45) NOT NULL,
  `phno` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `name`, `gender`, `age`, `year`, `department`, `phno`, `password`) VALUES
('1js17ec004', 'ajay', 'male', 23, 4, 'ece', '1248963570', 'std1'),
('1js19cs70', 'sanjay', 'm', 21, 3, 'cs', '2445226540', 'std1'),
('1js19ec094', 'pavan n k', 'male', 21, 0, 'ece', '1247851463', 'std1'),
('1js19me070', 'suprasad', 'male', 20, 3, 'mech', '159753640', 'std1'),
('1js19me071', 'sagar', 'm', 21, 3, 'me', '3692587410', 'std1');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `as_delete_logs` AFTER DELETE ON `student` FOR EACH ROW INSERT INTO student_logs VALUES(null, old.usn, 'DELETED', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `as_insert_logs` AFTER INSERT ON `student` FOR EACH ROW INSERT INTO student_logs VALUES(null, new.usn, 'INSERTED', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `as_update_logs` AFTER UPDATE ON `student` FOR EACH ROW INSERT INTO student_logs VALUES(null, old.usn, 'UPDATED', NOW() )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `student_before_insert` BEFORE INSERT ON `student` FOR EACH ROW if new.year > 4 then
signal sqlstate '45000';
end if
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `student_before_update` BEFORE UPDATE ON `student` FOR EACH ROW if new.year > 4 then
signal sqlstate '45000';
end if
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_logs`
--

CREATE TABLE `student_logs` (
  `id` int(11) NOT NULL,
  `usn` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_logs`
--

INSERT INTO `student_logs` (`id`, `usn`, `action`, `cdate`) VALUES
(1, '1js19is118', 'INSERTED', '2022-01-12 21:52:34'),
(2, '', 'UPDATED', '2022-01-12 21:53:58'),
(3, '1js19is118', 'UPDATED', '2022-01-12 21:55:24'),
(4, '1js19is118', 'DELETED', '2022-01-12 21:55:47'),
(5, '1js19is118', 'INSERTED', '2022-01-12 22:16:45'),
(6, '1js19is118', 'DELETED', '2022-01-12 22:16:58'),
(7, '1js19is118', 'INSERTED', '2022-01-12 22:17:20'),
(8, '1js19is118', 'DELETED', '2022-01-12 22:49:06'),
(9, '', 'INSERTED', '2022-01-13 17:48:52'),
(10, '', 'DELETED', '2022-01-13 17:49:27'),
(11, '1js18ei005', 'INSERTED', '2022-01-20 19:44:55'),
(12, '1js18ei005', 'DELETED', '2022-01-21 12:27:59'),
(13, '1js19is071', 'DELETED', '2022-01-21 13:02:11'),
(14, '1js19is001', 'DELETED', '2022-01-21 13:18:44'),
(15, '1js19me070', 'INSERTED', '2022-01-23 14:13:47'),
(16, '1js19ec094', 'INSERTED', '2022-01-23 15:04:11'),
(17, '1js17ec004', 'INSERTED', '2022-01-23 15:06:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `counsellor`
--
ALTER TABLE `counsellor`
  ADD PRIMARY KEY (`counsellor_id`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`investigation_id`,`complaint_id`,`counsellor_id`);

--
-- Indexes for table `punishment`
--
ALTER TABLE `punishment`
  ADD PRIMARY KEY (`punishment_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `student_logs`
--
ALTER TABLE `student_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `investigation_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `punishment`
--
ALTER TABLE `punishment`
  MODIFY `punishment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_logs`
--
ALTER TABLE `student_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
