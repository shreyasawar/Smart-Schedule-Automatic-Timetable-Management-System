-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2026 at 10:39 AM
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
-- Table structure for table `teacher_subjects`
--

CREATE TABLE `teacher_subjects` (
  `teacher_subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `section` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_subjects`
--

INSERT INTO `teacher_subjects` (`teacher_subject_id`, `teacher_id`, `subject_id`, `department_id`, `year`, `section`) VALUES
(1, 1, 1, 1, 1, 'A'),
(2, 2, 2, 1, 1, 'A'),
(3, 2, 2, 2, 1, 'A'),
(4, 2, 2, 2, 1, 'B'),
(5, 3, 3, 1, 1, 'A'),
(6, 3, 3, 2, 1, 'A'),
(7, 3, 3, 2, 1, 'B'),
(8, 4, 4, 1, 1, 'A'),
(9, 4, 5, 1, 3, 'A'),
(10, 4, 6, 2, 3, 'A'),
(11, 5, 1, 2, 1, 'A'),
(12, 5, 1, 2, 1, 'B'),
(13, 5, 7, 1, 3, 'A'),
(14, 6, 8, 2, 1, 'A'),
(15, 6, 8, 2, 1, 'B'),
(16, 6, 9, 1, 2, 'B'),
(17, 7, 10, 2, 1, 'B'),
(18, 7, 11, 1, 3, 'A'),
(19, 7, 11, 1, 3, 'B'),
(20, 8, 12, 1, 2, 'A'),
(21, 8, 12, 2, 2, 'A'),
(22, 9, 4, 2, 1, 'B'),
(23, 9, 19, 1, 3, 'B'),
(24, 9, 18, 1, 3, 'B'),
(25, 9, 18, 1, 3, 'A'),
(26, 9, 19, 2, 3, 'A'),
(27, 10, 13, 1, 2, 'A'),
(28, 10, 13, 1, 2, 'B'),
(29, 10, 14, 1, 2, 'A'),
(30, 11, 20, 2, 3, 'A'),
(31, 11, 20, 2, 3, 'B'),
(32, 11, 14, 1, 2, 'B'),
(33, 12, 15, 2, 2, 'A'),
(34, 12, 15, 2, 2, 'B'),
(35, 13, 16, 2, 2, 'A'),
(36, 13, 16, 2, 2, 'B'),
(37, 14, 17, 2, 2, 'A'),
(38, 14, 17, 2, 2, 'B'),
(39, 14, 30, 1, 3, 'B'),
(40, 14, 30, 1, 3, 'A'),
(41, 14, 22, 2, 3, 'A'),
(42, 15, 23, 1, 1, 'A'),
(43, 15, 23, 2, 1, 'A'),
(44, 15, 23, 2, 1, 'B'),
(45, 15, 21, 1, 2, 'B'),
(46, 15, 21, 1, 2, 'A'),
(47, 16, 9, 2, 2, 'B'),
(48, 16, 5, 2, 3, 'A'),
(49, 16, 5, 2, 3, 'B'),
(50, 17, 24, 1, 3, 'A'),
(51, 17, 25, 2, 3, 'B'),
(52, 17, 26, 1, 2, 'B'),
(53, 18, 27, 1, 1, 'A'),
(54, 19, 28, 2, 2, 'B'),
(55, 20, 29, 2, 3, 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  ADD PRIMARY KEY (`teacher_subject_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `fk_subject` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  MODIFY `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  ADD CONSTRAINT `fk_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_subjects_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`),
  ADD CONSTRAINT `teacher_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
