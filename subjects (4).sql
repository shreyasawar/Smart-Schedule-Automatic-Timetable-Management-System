-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2026 at 10:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) DEFAULT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `department_id`) VALUES
(1, 'DBMS', 0),
(2, 'Maths 2', 0),
(3, 'German', 0),
(4, 'Digital Marketing', 0),
(5, 'BCT', 0),
(6, 'Software Testing', 0),
(7, 'Machine Learning', 0),
(8, 'CPP', 0),
(9, 'Green Computing', 0),
(10, 'COA', 0),
(11, 'SCM', 0),
(12, 'CC', 0),
(13, 'Python', 0),
(14, 'Mobile App', 0),
(15, 'DS', 0),
(16, 'Java', 0),
(17, 'Cyber Security', 0),
(18, 'Cyber Law', 0),
(19, 'Mobile Computing', 0),
(20, 'DIG IMG PR', 0),
(21, 'IKS', 0),
(22, 'Ethical Hacking', 0),
(23, 'EVS', 0),
(24, 'OR', 0),
(25, 'Data Analytics', 0),
(26, 'SE', 0),
(27, 'Project', 0),
(28, 'Java (Lab)', 0),
(29, 'CPP (Lab)', 0),
(30, 'DW', 0),
(31, 'E Commerce', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
