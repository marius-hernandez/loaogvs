-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 07:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loags`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_year` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_middle` varchar(255) NOT NULL,
  `user_suffix` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_message` varchar(255) NOT NULL,
  `user_date` datetime(6) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `teacher_last` varchar(255) NOT NULL,
  `teacher_first` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_grade` varchar(255) NOT NULL,
  `class_track` varchar(255) NOT NULL,
  `class_strand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `teacher_last`, `teacher_first`, `class_name`, `class_grade`, `class_track`, `class_strand`) VALUES
(21, 'Hernandez', 'Marius Jacob', 'Amos', '11', 'Technical Vocational Livelihood Track', 'ICT'),
(22, 'Hernandez', 'Marius Jacob', 'Luke', '11', 'Technical Vocational Livelihood Track', 'ICT'),
(25, 'Hernandez', 'Marius Jacob', 'Proverbs', '11', 'Technical Vocational Livelihood Track', 'ICT'),
(29, 'Hernandez', 'Marius Jacob', 'Ithiel', '12', 'Technical Vocational Livelihood Track', 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `user_lrn` varchar(255) NOT NULL,
  `user_grade` varchar(255) NOT NULL,
  `user_section` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_middle` varchar(255) NOT NULL,
  `user_suffix` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `user_lrn`, `user_grade`, `user_section`, `user_gender`, `user_first`, `user_last`, `user_middle`, `user_suffix`, `user_email`, `user_pwd`) VALUES
(1, '109593080122', '12', 'Ithiel', 'Mr./Sir', 'Marius Jacob', 'Hernandez', 'Sarte', '', 'mariusjacobhernandez124@gmail.com', '$2y$10$12CpIBKDXkGciNa9dhR3ju45dyRfGKDf43mZikGnPJ3Y5A9Hjn.12'),
(2, '444444444444', '12', 'Cana', 'Mr./Sir', 'Jacob', 'Hernandez', 'Sarte', '', 'jacob124@gmail.com', '$2y$10$I1gGmTlfjInl7OGowIlVHOYarhv/5tq4A/lRC6RH0jjcVCNcO9Fdq');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`, `code`, `type`, `semester`) VALUES
(20, 'Oral', '', '', 0),
(21, 'Gen math', '', '', 0),
(22, 'Oral Communication', 'CS1', 'Core Subject', 0),
(23, 'General Mathematics', 'CS8', 'Core Subject', 0),
(24, 'Gen Math', 'CS8', 'Core Subject', 0),
(25, 'Emptech', 'AS5', 'Applied Subject', 0),
(26, 'Oral Communication', 'CS1', 'Applied Subject', 0),
(27, 'Gen Math', 'CS8', 'Applied Subject', 0),
(28, 'Oral com', 'CS1', 'Core Subject', 0),
(29, 'Gen Math', 'CS8', 'Core Subject', 0),
(30, '', '', '', 2),
(31, 'PR2', '', '', 2),
(32, 'Oral Communication', 'CS1', 'Core Subject', 1),
(33, 'General Mathematics', 'CS8', 'Core Subject', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `user_year` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_middle` varchar(255) NOT NULL,
  `user_suffix` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_photo` int(200) DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `user_year`, `user_id`, `user_gender`, `user_first`, `user_last`, `user_middle`, `user_suffix`, `user_email`, `user_pwd`, `user_photo`, `type`) VALUES
(33, 2020, 1203, 'Ms./Mrs.', 'Registar', 'Head', '', '', 'loa@gmail.com', '$2y$10$aW7Xu/eN38Bck0kRSOyuDeuwUr/tJ2pUZDGiNn.jHxXFaWqQTmAA2', NULL, 'admin'),
(45, 2020, 2020, '', 'joe', 'labajo', '', '', 'joe@joe.com', '$2y$10$Jw.UqfVyDeT2Ee.u6sB4C.L.hNKwjL/cPGv040.Tgsm/.XmWjEea6', NULL, 'teacher'),
(50, 2019, 1203, 'Mr./Sir', 'Marius Jacob', 'Hernandez', 'Sarte', 'Jr', 'mariusjacobhernandez124@gmail.com', '$2y$10$cOQyx2r/5Wc5RVPJ25YUg.ZRnUBwNm6ProJcrWExiaSDW7o60ZysO', NULL, 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
