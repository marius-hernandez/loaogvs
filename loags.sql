-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 08:04 AM
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
-- Table structure for table `disable_semester`
--

CREATE TABLE `disable_semester` (
  `id` int(11) NOT NULL,
  `all_all` varchar(255) NOT NULL,
  `first` varchar(255) NOT NULL,
  `second` varchar(255) NOT NULL,
  `first_first` varchar(255) NOT NULL,
  `first_second` varchar(255) NOT NULL,
  `second_first` varchar(255) NOT NULL,
  `second_second` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disable_semester`
--

INSERT INTO `disable_semester` (`id`, `all_all`, `first`, `second`, `first_first`, `first_second`, `second_first`, `second_second`) VALUES
(1, '', '', 'yes', '', '', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `ithiel_ave`
--

CREATE TABLE `ithiel_ave` (
  `id` int(11) NOT NULL,
  `student_first` varchar(255) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `ave_c_1` varchar(255) NOT NULL,
  `ave_c_2` varchar(255) NOT NULL,
  `ave_c_3` varchar(255) NOT NULL,
  `ave_c_4` varchar(255) NOT NULL,
  `ave_c_5` varchar(255) NOT NULL,
  `ave_c_6` varchar(255) NOT NULL,
  `ave_a_1` varchar(255) NOT NULL,
  `ave_a_2` varchar(255) NOT NULL,
  `ave_a_3` varchar(255) NOT NULL,
  `ave_a_4` varchar(255) NOT NULL,
  `ave_a_5` varchar(255) NOT NULL,
  `ave` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ithiel_ave`
--

INSERT INTO `ithiel_ave` (`id`, `student_first`, `student_last`, `ave_c_1`, `ave_c_2`, `ave_c_3`, `ave_c_4`, `ave_c_5`, `ave_c_6`, `ave_a_1`, `ave_a_2`, `ave_a_3`, `ave_a_4`, `ave_a_5`, `ave`, `sent`) VALUES
(1, 'ARVIN R.', 'AREVALO,', '72', '74', '76', '', '', '', '78', '80', '83', '85', '87', '79', ''),
(2, 'ENGELBERT B.', 'DOMINGO,', '78', '78', '78', '', '', '', '78', '78', '78', '78', '78', '78', ''),
(4, 'JERVAN AVRAM', 'GUBALANE,', '85', '85', '85', '', '', '', '85', '85', '85', '85', '85', '85', ''),
(5, 'DYNO C.', 'HILAPO,', '79', '79', '90', '', '', '', '90', '90', '90', '90', '90', '86', ''),
(6, 'JOHN CEDRICK', 'INOLPE,', '80', '85', '80', '', '', '', '85', '90', '80', '85', '90', '85', ''),
(7, 'JUDE C.', 'JAMENA,', '90', '90', '90', '', '', '', '90', '90', '90', '90', '90', '90', ''),
(8, 'NEO R.', 'LUMBREZA,', '70', '70', '80', '', '', '', '80', '80', '80', '80', '80', '76', ''),
(9, 'RUSSEL P.', 'MUNOZ,', '80', '70', '70', '', '', '', '70', '70', '70', '70', '70', '73', ''),
(10, 'JOHN KENZO', 'OPINION,', '70', '70', '70', '', '', '', '70', '70', '70', '70', '70', '70', ''),
(11, 'CRISTAN G.', 'PEDERIO,', '88', '89', '89', '', '', '', '89', '89', '89', '89', '89', '89', ''),
(12, 'NEIANE EMIL', 'TALAMPAS,', '70', '70', '70', '', '', '', '70', '70', '70', '70', '70', '70', ''),
(13, 'MHARIANNE P.', 'MAGPANTAY,', '85', '88', '89', '', '', '', '89', '90', '88', '89', '89', '89', ''),
(14, 'ANTHONY JAMES', 'RAMIREZ,', '80', '80', '80', '', '', '', '80', '80', '80', '80', '80', '80', ''),
(15, 'PHILIP ANDREI', 'RAMOS,', '80', 'NaN', 'NaN', '', '', '', 'NaN', 'NaN', 'NaN', 'NaN', 'NaN', '80', ''),
(16, 'JOHN HAROLD', 'ROSAS,', '70', 'NaN', 'NaN', '', '', '', 'NaN', 'NaN', 'NaN', 'NaN', 'NaN', '70', ''),
(17, 'ALDRIN O.', 'SILUD,', '89', 'NaN', 'NaN', '', '', '', 'NaN', 'NaN', 'NaN', 'NaN', 'NaN', '89', ''),
(18, 'JASON T.', 'TANAN,', '70', 'NaN', 'NaN', '', '', '', 'NaN', 'NaN', 'NaN', 'NaN', 'NaN', '70', ''),
(19, 'ART VINCENT', 'TIBIO,', '90', 'NaN', 'NaN', '', '', '', 'NaN', 'NaN', 'NaN', 'NaN', 'NaN', '90', ''),
(20, 'CHARLES JOAQUIN', 'UTRETRA,', '60', 'NaN', 'NaN', '', '', '', 'NaN', 'NaN', 'NaN', 'NaN', 'NaN', '60', ''),
(21, 'IVHERSON C.', 'VALERIO,', '60', 'NaN', 'NaN', '', '', '', 'NaN', 'NaN', 'NaN', 'NaN', 'NaN', '60', ''),
(22, 'VINCE JEFFERSON', 'VALLIENTE,', '75', '70', '77', '', '', '', '83', '76', '83', '81', '74', '78', ''),
(23, 'SAM R.', 'VELASCO,', '90', '86', '88', '', '', '', '85', '70', '76', '83', '76', '82', ''),
(24, 'MA. IRISH', 'CLAVERIA,', '89', '87', '85', '', '', '', '83', '81', '79', '77', '75', '82', ''),
(25, 'SANTOS, ANGELA', 'DELOS', '79', '76', '75', '', '', '', '73', '71', '82', '84', '86', '78', ''),
(26, 'RACHELLE ANNE', 'LUCBAN,', '90', '98', '96', '', '', '', '94', '92', '90', '88', '86', '92', '');

-- --------------------------------------------------------

--
-- Table structure for table `ithiel_ave_sec`
--

CREATE TABLE `ithiel_ave_sec` (
  `id` int(11) NOT NULL,
  `student_first` varchar(255) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `ave_c_1` varchar(255) NOT NULL,
  `ave_c_2` varchar(255) NOT NULL,
  `ave_c_3` varchar(255) NOT NULL,
  `ave_c_4` varchar(255) NOT NULL,
  `ave_c_5` varchar(255) NOT NULL,
  `ave_c_6` varchar(255) NOT NULL,
  `ave_a_1` varchar(255) NOT NULL,
  `ave_a_2` varchar(255) NOT NULL,
  `ave_a_3` varchar(255) NOT NULL,
  `ave_a_4` varchar(255) NOT NULL,
  `ave_a_5` varchar(255) NOT NULL,
  `ave_sec` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ithiel_ave_sec`
--

INSERT INTO `ithiel_ave_sec` (`id`, `student_first`, `student_last`, `ave_c_1`, `ave_c_2`, `ave_c_3`, `ave_c_4`, `ave_c_5`, `ave_c_6`, `ave_a_1`, `ave_a_2`, `ave_a_3`, `ave_a_4`, `ave_a_5`, `ave_sec`, `sent`) VALUES
(1, 'ARVIN R.', 'AREVALO,', '76', '81', '77', '77', '', '', '78', '78', '79', '79', '', '78', ''),
(2, 'ANTHONY JAMES', 'RAMIREZ,', '70', '70', '70', '70', '', '', '70', '70', '70', '70', '', '70', ''),
(3, 'PHILIP ANDREI', 'RAMOS,', '89', '89', '89', '89', '', '', '89', '89', '89', '89', '', '89', ''),
(4, 'JOHN HAROLD', 'ROSAS,', '80', '80', '80', '80', '', '', '80', '80', '80', '80', '', '80', ''),
(5, 'ALDRIN O.', 'SILUD,', '80', '80', '80', '80', '', '', '80', '80', '80', '80', '', '80', ''),
(6, 'JUDE C.', 'JAMENA,', '90', '90', '90', '90', '', '', 'NaN', 'NaN', 'NaN', 'NaN', '', '90', ''),
(7, 'ENGELBERT B.', 'DOMINGO,', '85', '85', '85', '85', '', '', '85', '85', '85', '85', '', '85', ''),
(8, 'MA. IRISH', 'CLAVERIA,', '82', '84', '86', '88', '', '', '90', '92', '94', '96', '', '89', ''),
(9, 'SANTOS, ANGELA', 'DELOS', '99', '97', '95', '93', '', '', '91', '89', '87', '85', '', '92', ''),
(10, 'RACHELLE ANNE', 'LUCBAN,', '71', '73', '75', '77', '', '', '79', '81', '83', '85', '', '78', ''),
(11, 'MHARIANNE P.', 'MAGPANTAY,', '82', '84', '86', '88', '', '', '90', '92', '94', '96', '', '89', '');

-- --------------------------------------------------------

--
-- Table structure for table `ithiel_grade_first_first`
--

CREATE TABLE `ithiel_grade_first_first` (
  `id` int(11) NOT NULL,
  `student_first` varchar(255) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `first_c_1` varchar(255) NOT NULL,
  `first_c_2` varchar(255) NOT NULL,
  `first_c_3` varchar(255) NOT NULL,
  `first_c_4` varchar(255) NOT NULL,
  `first_c_5` varchar(255) NOT NULL,
  `first_c_6` varchar(255) NOT NULL,
  `first_a_1` varchar(255) NOT NULL,
  `first_a_2` varchar(255) NOT NULL,
  `first_a_3` varchar(255) NOT NULL,
  `first_a_4` varchar(255) NOT NULL,
  `first_a_5` varchar(255) NOT NULL,
  `first_first_ave` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ithiel_grade_first_first`
--

INSERT INTO `ithiel_grade_first_first` (`id`, `student_first`, `student_last`, `first_c_1`, `first_c_2`, `first_c_3`, `first_c_4`, `first_c_5`, `first_c_6`, `first_a_1`, `first_a_2`, `first_a_3`, `first_a_4`, `first_a_5`, `first_first_ave`, `sent`) VALUES
(1, 'ARVIN R.', 'AREVALO,', '71', '73', '75', '', '', '', '77', '79', '82', '84', '86', '79', '1'),
(2, 'ENGELBERT B.', 'DOMINGO,', '80', '80', '80', '', '', '', '80', '80', '80', '80', '80', '80', '1'),
(7, 'JERVAN AVRAM', 'GUBALANE,', '89', '90', '90', '', '', '', '90', '90', '90', '90', '90', '90', ''),
(8, 'DYNO C.', 'HILAPO,', '79', '79', '', '', '', '', '', '', '', '', '', '79', '1'),
(9, 'JOHN CEDRICK', 'INOLPE,', '80', '90', '70', '', '', '', '80', '90', '70', '80', '90', '82', '1'),
(10, 'JUDE C.', 'JAMENA,', '90', '90', '90', '', '', '', '90', '90', '90', '90', '90', '90', '1'),
(11, 'NEO R.', 'LUMBREZA,', '70', '70', '', '', '', '', '', '', '', '', '', '70', '1'),
(12, 'RUSSEL P.', 'MUNOZ,', '90', '', '', '', '', '', '', '', '', '', '', '90', ''),
(13, 'JOHN KENZO', 'OPINION,', '70', '', '', '', '', '', '', '', '', '', '', '70', ''),
(14, 'CRISTAN G.', 'PEDERIO,', '87', '', '', '', '', '', '', '', '', '', '', '87', ''),
(15, 'NEIANE EMIL', 'TALAMPAS,', '70', '70', '70', '', '', '', '70', '70', '70', '70', '70', '70', ''),
(16, 'MHARIANNE P.', 'MAGPANTAY,', '80', '80', '80', '', '', '', '80', '80', '80', '80', '80', '80', ''),
(17, 'ANTHONY JAMES', 'RAMIREZ,', '79', '80', '80', '', '', '', '80', '80', '80', '80', '80', '80', ''),
(18, 'PHILIP ANDREI', 'RAMOS,', '80', '', '', '', '', '', '', '', '', '', '', '80', ''),
(19, 'JOHN HAROLD', 'ROSAS,', '70', '', '', '', '', '', '', '', '', '', '', '70', ''),
(20, 'ALDRIN O.', 'SILUD,', '89', '', '', '', '', '', '', '', '', '', '', '89', ''),
(21, 'JASON T.', 'TANAN,', '70', '', '', '', '', '', '', '', '', '', '', '70', ''),
(22, 'ART VINCENT', 'TIBIO,', '90', '', '', '', '', '', '', '', '', '', '', '90', ''),
(23, 'CHARLES JOAQUIN', 'UTRETRA,', '60', '', '', '', '', '', '', '', '', '', '', '60', ''),
(24, 'IVHERSON C.', 'VALERIO,', '60', '', '', '', '', '', '', '', '', '', '', '60', ''),
(25, 'VINCE JEFFERSON', 'VALLIENTE,', '80', '70', '70', '', '', '', '78', '76', '80', '80', '73', '76', ''),
(26, 'SAM R.', 'VELASCO,', '89', '90', '90', '', '', '', '90', '70', '75', '82', '75', '83', ''),
(27, 'MA. IRISH', 'CLAVERIA,', '89', '87', '85', '', '', '', '83', '81', '79', '77', '75', '82', ''),
(28, 'SANTOS, ANGELA', 'DELOS', '79', '77', '76', '', '', '', '73', '71', '81', '83', '85', '79', ''),
(29, 'RACHELLE ANNE', 'LUCBAN,', '80', '98', '96', '', '', '', '94', '92', '90', '88', '86', '91', '');

-- --------------------------------------------------------

--
-- Table structure for table `ithiel_grade_first_sec`
--

CREATE TABLE `ithiel_grade_first_sec` (
  `id` int(11) NOT NULL,
  `student_first` varchar(255) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `first_c_1` varchar(255) NOT NULL,
  `first_c_2` varchar(255) NOT NULL,
  `first_c_3` varchar(255) NOT NULL,
  `first_c_4` varchar(255) NOT NULL,
  `first_c_5` varchar(255) NOT NULL,
  `first_c_6` varchar(255) NOT NULL,
  `first_a_1` varchar(255) NOT NULL,
  `first_a_2` varchar(255) NOT NULL,
  `first_a_3` varchar(255) NOT NULL,
  `first_a_4` varchar(255) NOT NULL,
  `first_a_5` varchar(255) NOT NULL,
  `first_sec_ave` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ithiel_grade_first_sec`
--

INSERT INTO `ithiel_grade_first_sec` (`id`, `student_first`, `student_last`, `first_c_1`, `first_c_2`, `first_c_3`, `first_c_4`, `first_c_5`, `first_c_6`, `first_a_1`, `first_a_2`, `first_a_3`, `first_a_4`, `first_a_5`, `first_sec_ave`, `sent`) VALUES
(1, 'ARVIN R.', 'AREVALO,', '72', '74', '76', '', '', '', '78', '81', '83', '85', '87', '80', ''),
(2, 'ENGELBERT B.', 'DOMINGO,', '75', '75', '75', '', '', '', '75', '75', '75', '75', '75', '75', ''),
(4, 'JERVAN AVRAM', 'GUBALANE,', '80', '80', '80', '', '', '', '80', '80', '80', '80', '80', '80', ''),
(5, 'DYNO C.', 'HILAPO,', '79', '79', '90', '', '', '', '90', '90', '90', '90', '90', '88', ''),
(6, 'JOHN CEDRICK', 'INOLPE,', '80', '80', '90', '', '', '', '90', '90', '90', '90', '90', '88', ''),
(7, 'JUDE C.', 'JAMENA,', '90', '90', '90', '', '', '', '90', '90', '90', '90', '90', '90', ''),
(8, 'NEO R.', 'LUMBREZA,', '70', '70', '80', '', '', '', '80', '80', '80', '80', '80', '78', ''),
(9, 'RUSSEL P.', 'MUNOZ,', '70', '70', '70', '', '', '', '70', '70', '70', '70', '70', '70', ''),
(10, 'JOHN KENZO', 'OPINION,', '70', '70', '70', '', '', '', '70', '70', '70', '70', '70', '70', ''),
(11, 'CRISTAN G.', 'PEDERIO,', '89', '89', '89', '', '', '', '89', '89', '89', '89', '89', '89', ''),
(12, 'NEIANE EMIL', 'TALAMPAS,', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'MHARIANNE P.', 'MAGPANTAY,', '90', '96', '97', '', '', '', '98', '99', '96', '97', '98', '97', ''),
(14, 'ANTHONY JAMES', 'RAMIREZ,', '80', '80', '80', '', '', '', '80', '80', '80', '80', '80', '80', ''),
(15, 'PHILIP ANDREI', 'RAMOS,', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'JOHN HAROLD', 'ROSAS,', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'ALDRIN O.', 'SILUD,', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'JASON T.', 'TANAN,', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'ART VINCENT', 'TIBIO,', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'CHARLES JOAQUIN', 'UTRETRA,', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'IVHERSON C.', 'VALERIO,', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'VINCE JEFFERSON', 'VALLIENTE,', '70', '70', '84', '', '', '', '87', '75', '86', '81', '74', '79', ''),
(23, 'SAM R.', 'VELASCO,', '90', '81', '85', '', '', '', '80', '70', '76', '83', '76', '81', ''),
(24, 'MA. IRISH', 'CLAVERIA,', '88', '86', '84', '', '', '', '82', '80', '78', '76', '74', '81', ''),
(25, 'SANTOS, ANGELA', 'DELOS', '78', '75', '74', '', '', '', '72', '70', '82', '84', '86', '78', ''),
(26, 'RACHELLE ANNE', 'LUCBAN,', '99', '97', '95', '', '', '', '93', '91', '89', '87', '85', '92', '');

-- --------------------------------------------------------

--
-- Table structure for table `ithiel_grade_sec_first`
--

CREATE TABLE `ithiel_grade_sec_first` (
  `id` int(11) NOT NULL,
  `student_first` varchar(255) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `first_c_1` varchar(255) NOT NULL,
  `first_c_2` varchar(255) NOT NULL,
  `first_c_3` varchar(255) NOT NULL,
  `first_c_4` varchar(255) NOT NULL,
  `first_c_5` varchar(255) NOT NULL,
  `first_c_6` varchar(255) NOT NULL,
  `first_a_1` varchar(255) NOT NULL,
  `first_a_2` varchar(255) NOT NULL,
  `first_a_3` varchar(255) NOT NULL,
  `first_a_4` varchar(255) NOT NULL,
  `first_a_5` varchar(255) NOT NULL,
  `sec_first_ave` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ithiel_grade_sec_first`
--

INSERT INTO `ithiel_grade_sec_first` (`id`, `student_first`, `student_last`, `first_c_1`, `first_c_2`, `first_c_3`, `first_c_4`, `first_c_5`, `first_c_6`, `first_a_1`, `first_a_2`, `first_a_3`, `first_a_4`, `first_a_5`, `sec_first_ave`, `sent`) VALUES
(1, 'ARVIN R.', 'AREVALO,', '70', '80', '70', '70', '', '', '70', '70', '70', '70', '', '72', '0'),
(2, 'ANTHONY JAMES', 'RAMIREZ,', '70', '70', '70', '70', '', '', '70', '70', '70', '70', '', '70', ''),
(3, 'PHILIP ANDREI', 'RAMOS,', '89', '89', '89', '89', '', '', '89', '89', '89', '89', '', '89', ''),
(4, 'JOHN HAROLD', 'ROSAS,', '80', '80', '80', '80', '', '', '80', '80', '80', '80', '', '80', '0'),
(5, 'ALDRIN O.', 'SILUD,', '80', '80', '80', '80', '', '', '80', '80', '80', '80', '', '80', ''),
(6, 'JUDE C.', 'JAMENA,', '90', '90', '90', '90', '', '', '', '', '', '', '', '90', '1'),
(7, 'ENGELBERT B.', 'DOMINGO,', '80', '90', '90', '80', '', '', '90', '80', '90', '90', '', '87', '0'),
(8, 'MA. IRISH', 'CLAVERIA,', '81', '83', '85', '87', '', '', '89', '91', '93', '95', '', '88', ''),
(9, 'SANTOS, ANGELA', 'DELOS', '99', '97', '95', '93', '', '', '91', '89', '87', '85', '', '92', ''),
(10, 'RACHELLE ANNE', 'LUCBAN,', '70', '72', '74', '76', '', '', '78', '80', '82', '84', '', '77', ''),
(11, 'MHARIANNE P.', 'MAGPANTAY,', '81', '83', '85', '87', '', '', '89', '91', '93', '95', '', '88', '');

-- --------------------------------------------------------

--
-- Table structure for table `ithiel_grade_sec_sec`
--

CREATE TABLE `ithiel_grade_sec_sec` (
  `id` int(11) NOT NULL,
  `student_first` varchar(255) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `first_c_1` varchar(255) NOT NULL,
  `first_c_2` varchar(255) NOT NULL,
  `first_c_3` varchar(255) NOT NULL,
  `first_c_4` varchar(255) NOT NULL,
  `first_c_5` varchar(255) NOT NULL,
  `first_c_6` varchar(255) NOT NULL,
  `first_a_1` varchar(255) NOT NULL,
  `first_a_2` varchar(255) NOT NULL,
  `first_a_3` varchar(255) NOT NULL,
  `first_a_4` varchar(255) NOT NULL,
  `first_a_5` varchar(255) NOT NULL,
  `sec_sec_ave` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ithiel_grade_sec_sec`
--

INSERT INTO `ithiel_grade_sec_sec` (`id`, `student_first`, `student_last`, `first_c_1`, `first_c_2`, `first_c_3`, `first_c_4`, `first_c_5`, `first_c_6`, `first_a_1`, `first_a_2`, `first_a_3`, `first_a_4`, `first_a_5`, `sec_sec_ave`, `sent`) VALUES
(1, 'ARVIN R.', 'AREVALO,', '81', '82', '83', '84', '', '', '85', '86', '87', '88', '', '85', ''),
(2, 'ANTHONY JAMES', 'RAMIREZ,', '71', '72', '73', '74', '', '', '70', '70', '70', '70', '', '70', ''),
(3, 'PHILIP ANDREI', 'RAMOS,', '89', '89', '89', '89', '', '', '89', '89', '89', '89', '', '89', ''),
(4, 'JOHN HAROLD', 'ROSAS,', '80', '80', '80', '80', '', '', '80', '80', '80', '80', '', '80', ''),
(5, 'ALDRIN O.', 'SILUD,', '80', '80', '80', '80', '', '', '80', '80', '80', '80', '', '80', ''),
(6, 'JUDE C.', 'JAMENA,', '90', '90', '90', '90', '', '', '', '', '', '', '', '90', ''),
(7, 'ENGELBERT B.', 'DOMINGO,', '90', '80', '80', '90', '', '', '80', '90', '80', '80', '', '84', ''),
(8, 'MA. IRISH', 'CLAVERIA,', '82', '84', '86', '88', '', '', '90', '92', '94', '96', '', '89', ''),
(9, 'SANTOS, ANGELA', 'DELOS', '98', '96', '94', '92', '', '', '90', '88', '86', '84', '', '91', ''),
(10, 'RACHELLE ANNE', 'LUCBAN,', '71', '73', '75', '77', '', '', '79', '81', '83', '85', '', '78', ''),
(11, 'MHARIANNE P.', 'MAGPANTAY,', '82', '84', '86', '88', '', '', '90', '92', '94', '96', '', '89', '');

-- --------------------------------------------------------

--
-- Table structure for table `ithiel_student`
--

CREATE TABLE `ithiel_student` (
  `id` int(11) NOT NULL,
  `student_gender` varchar(255) NOT NULL,
  `student_first` varchar(255) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `student_middle` varchar(255) NOT NULL,
  `student_suffix` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_email1` varchar(255) NOT NULL,
  `parent_email2` varchar(255) NOT NULL,
  `parent_email3` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL,
  `ifsent` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ithiel_student`
--

INSERT INTO `ithiel_student` (`id`, `student_gender`, `student_first`, `student_last`, `student_middle`, `student_suffix`, `parent_email`, `parent_email1`, `parent_email2`, `parent_email3`, `sent`, `ifsent`, `status`) VALUES
(1, 'Male', 'ARVIN R.', 'AREVALO,', '', '', 'noway@gmail.com', '', '', 'mariusjacobhernandez124@gmail.com', 'This is the performance of your son/daughter', 'Sent', 0),
(3, 'Male', 'ENGELBERT B.', 'DOMINGO,', '', '', 'parent@gmail.com', '', 'mariusjacobhernandez124@gmail.com', '', 'This is a text', 'Sent', 0),
(5, 'Male', 'JERVAN AVRAM', 'GUBALANE,', '', '', 'gubalaneparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(7, 'Male', 'DYNO C.', 'HILAPO,', '', '', 'hilapo@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(8, 'Male', 'JOHN CEDRICK', 'INOLPE,', '', '', 'inolpeparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(9, 'Male', 'JUDE C.', 'JAMENA,', '', '', 'jamenaparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', '', 0),
(10, 'Male', 'NEO R.', 'LUMBREZA,', '', '', 'lumbrezaparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(11, 'Male', 'RUSSEL P.', 'MUNOZ,', '', '', 'munozparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', '', 0),
(12, 'Male', 'JOHN KENZO', 'OPINION,', '', '', 'opinionparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(13, 'Male', 'CRISTAN G.', 'PEDERIO,', '', '', 'pederioparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', '', 0),
(14, 'Male', 'ANTHONY JAMES', 'RAMIREZ,', '', '', 'ramirezparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(15, 'Male', 'PHILIP ANDREI', 'RAMOS,', '', '', 'ramosparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(16, 'Male', 'JOHN HAROLD', 'ROSAS,', '', '', 'rosasparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(17, 'Male', 'ALDRIN O.', 'SILUD,', '', '', 'siludparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(18, 'Male', 'NEIANE EMIL', 'TALAMPAS,', '', '', 'talampasparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', '', 0),
(19, 'Male', 'JASON T.', 'TANAN,', '', '', '', '', '', '', '', 'Sent', 0),
(20, 'Male', 'ART VINCENT', 'TIBIO,', '', '', '', '', '', '', '', 'Sent', 0),
(21, 'Male', 'CHARLES JOAQUIN', 'UTRETRA,', '', '', '', '', '', '', '', 'Sent', 0),
(22, 'Male', 'IVHERSON C.', 'VALERIO,', '', '', '', '', '', '', '', 'Sent', 0),
(23, 'Male', 'VINCE JEFFERSON', 'VALLIENTE,', '', '', '', '', '', '', '', 'Sent', 0),
(24, 'Male', 'SAM R.', 'VELASCO,', '', '', 'velascoparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', '', 0),
(25, 'Female', 'MA. IRISH', 'CLAVERIA,', '', '', 'claveriaparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(26, 'Female', 'SANTOS, ANGELA', 'DELOS', '', '', 'delossantosparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', '', 0),
(27, 'Female', 'RACHELLE ANNE', 'LUCBAN,', '', '', 'lucbanparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 0),
(28, 'Female', 'MHARIANNE P.', 'MAGPANTAY,', '', '', 'mharianneparent@gmail.com', '', '', '', 'This is the performance of your son/daughter', 'Sent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ithiel_student_irregular`
--

CREATE TABLE `ithiel_student_irregular` (
  `id` int(11) NOT NULL,
  `student_gender` varchar(255) NOT NULL,
  `student_first` varchar(255) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `student_middle` varchar(255) NOT NULL,
  `student_suffix` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_email1` varchar(255) NOT NULL,
  `parent_email2` varchar(255) NOT NULL,
  `parent_email3` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL,
  `ifsent` varchar(255) NOT NULL,
  `first_c1` varchar(255) NOT NULL,
  `first_c2` varchar(255) NOT NULL,
  `first_c3` varchar(255) NOT NULL,
  `first_c4` varchar(255) NOT NULL,
  `first_c5` varchar(255) NOT NULL,
  `first_a1` varchar(255) NOT NULL,
  `first_a2` varchar(255) NOT NULL,
  `first_a3` varchar(255) NOT NULL,
  `first_a4` varchar(255) NOT NULL,
  `first_a5` varchar(255) NOT NULL,
  `sec_c1` varchar(255) NOT NULL,
  `sec_c2` varchar(255) NOT NULL,
  `sec_c3` varchar(255) NOT NULL,
  `sec_c4` varchar(255) NOT NULL,
  `sec_c5` varchar(255) NOT NULL,
  `sec_a1` varchar(255) NOT NULL,
  `sec_a2` varchar(255) NOT NULL,
  `sec_a3` varchar(255) NOT NULL,
  `sec_a4` varchar(255) NOT NULL,
  `sec_a5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ithiel_student_irregular`
--

INSERT INTO `ithiel_student_irregular` (`id`, `student_gender`, `student_first`, `student_last`, `student_middle`, `student_suffix`, `parent_email`, `parent_email1`, `parent_email2`, `parent_email3`, `sent`, `ifsent`, `first_c1`, `first_c2`, `first_c3`, `first_c4`, `first_c5`, `first_a1`, `first_a2`, `first_a3`, `first_a4`, `first_a5`, `sec_c1`, `sec_c2`, `sec_c3`, `sec_c4`, `sec_c5`, `sec_a1`, `sec_a2`, `sec_a3`, `sec_a4`, `sec_a5`) VALUES
(4, 'Male', 'MIKE F.', 'BUCIO,', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(5, 'Male', 'LOUIE JED', 'GECARANE,', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(9, 'Male', 'MARIUS JACOB', 'HERNANDEZ,', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

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
  `user_middle` varchar(255) DEFAULT NULL,
  `user_suffix` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_message` varchar(255) NOT NULL,
  `user_date` datetime(6) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_year`, `user_id`, `user_gender`, `user_first`, `user_last`, `user_middle`, `user_suffix`, `user_email`, `user_pwd`, `user_message`, `user_date`, `type`) VALUES
(169, 2004, 8838, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$VIyXfHZ2.Z1XiV0D3y81tusoi.fB2Bx9HOQxuPWK8YzjCHMqmx/om', 'This user would like to request an account.', '2021-05-16 16:56:10.000000', 'teacher'),
(170, 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay', 'This user would like to request an account.', '2021-05-13 14:29:20.000000', 'teacher'),
(171, 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO', 'This user would like to request an account.', '2021-05-13 13:24:56.000000', 'teacher'),
(173, 2002, 8475, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$NlRXG3NhPdlBkJldF4Xp..wXJmVnDX.tT6WwdTchxLI6oXN2RSyUW', 'This user would like to request an account.', '2021-05-16 16:56:36.000000', 'teacher'),
(174, 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe', 'This user would like to request an account.', '2021-05-16 11:57:04.000000', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `requests_bin`
--

CREATE TABLE `requests_bin` (
  `id` int(11) NOT NULL,
  `user_year` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_middle` varchar(255) DEFAULT NULL,
  `user_suffix` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_message` varchar(255) NOT NULL,
  `user_date` datetime(5) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requests_log`
--

CREATE TABLE `requests_log` (
  `id` int(11) NOT NULL,
  `user_date` datetime(5) NOT NULL,
  `user_message` varchar(255) NOT NULL,
  `user_year` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_middle` varchar(255) DEFAULT NULL,
  `user_suffix` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests_log`
--

INSERT INTO `requests_log` (`id`, `user_date`, `user_message`, `user_year`, `user_id`, `user_gender`, `user_first`, `user_last`, `user_middle`, `user_suffix`, `user_email`, `user_pwd`) VALUES
(1, '2021-05-13 12:37:36.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2018, 1088, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$2D/UgxBo6nRzVHhgFntg1u4bBCd4KT.qYTGDjWxMtFtKgM8WAPHKW'),
(2, '2021-05-13 12:50:38.00000', 'Andro Philip Banag account has been retrieved from the ignore bin', 2004, 1009, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$oSkgTqSfi1kdqXONZKuQ7Oa1qM8TWVOYpvPAj114H.4oyEDMuUh9m'),
(3, '2021-05-13 12:50:39.00000', 'Ian Gabriel Igana account has been retrieved from the ignore bin', 2002, 1029, 'Mr./Sir', 'Ian Gabriel', 'Igana', '', '', 'iangabriel@gmail.com', '$2y$10$tn4sa/ABH64spufFFL3Tteq8L3A2bfIhEkEbryH5wmNnDV3XfHQvS'),
(8, '2021-05-13 13:03:12.00000', 'Ian Gabriel Igana account has been deleted from the ignore bin', 2019, 2291, 'Mr./Sir', 'Ian Gabriel', 'Igana', '', '', 'iangabriel@gmail.com', '$2y$10$Q.1QCC0v.4dttzBbBWxji.Vqgl2HXwW6pV6NsQKs8QDDdaaRou95y'),
(9, '2021-05-13 13:03:57.00000', 'Rosalyn Escudero account has been retrieved from the ignore bin', 2003, 1873, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$XOk4fO9j54YKZpl.vTUn4OLTkoBRF/YU3QosmZuWxq6VD2je5F6/2'),
(10, '2021-05-13 13:03:57.00000', 'Mark Dennis Vinas account has been retrieved from the ignore bin', 2003, 1002, 'Mr./Sir', 'Mark Dennis', 'Vinas', 'Lamud', '', 'markdennis@gmail.com', '$2y$10$WFvl3GmDeNBxMaVMvb5IZew26wQKoZCfxlIXT4QE2wKHyUnYj3dcu'),
(11, '2021-05-13 13:03:58.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2018, 1088, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$2D/UgxBo6nRzVHhgFntg1u4bBCd4KT.qYTGDjWxMtFtKgM8WAPHKW'),
(12, '2021-05-13 13:03:59.00000', 'Andro Philip Banag account has been retrieved from the ignore bin', 2019, 2222, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$RvdadDNsPtmhRBy8MKTKVu.EKwc886dkLTqNG69Yo1DqXhm6UUg6.'),
(13, '2021-05-13 13:09:15.00000', 'Rosalyn Escudero account has been moved to ignore bin', 2003, 1873, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$XOk4fO9j54YKZpl.vTUn4OLTkoBRF/YU3QosmZuWxq6VD2je5F6/2'),
(14, '2021-05-13 13:18:29.00000', 'Andro Philip Banag account has been rejected', 2019, 2222, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$RvdadDNsPtmhRBy8MKTKVu.EKwc886dkLTqNG69Yo1DqXhm6UUg6.'),
(15, '2021-05-13 13:20:48.00000', 'Mark Ilagan account has been accepted', 2018, 1088, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$2D/UgxBo6nRzVHhgFntg1u4bBCd4KT.qYTGDjWxMtFtKgM8WAPHKW'),
(16, '2021-05-13 13:20:58.00000', 'Mark Dennis Vinas account has been moved to ignore bin', 2003, 1002, 'Mr./Sir', 'Mark Dennis', 'Vinas', 'Lamud', '', 'markdennis@gmail.com', '$2y$10$WFvl3GmDeNBxMaVMvb5IZew26wQKoZCfxlIXT4QE2wKHyUnYj3dcu'),
(17, '2021-05-13 13:21:03.00000', 'Rosalyn Escudero account has been retrieved from the ignore bin', 2003, 1873, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$XOk4fO9j54YKZpl.vTUn4OLTkoBRF/YU3QosmZuWxq6VD2je5F6/2'),
(18, '2021-05-13 13:21:03.00000', 'Mark Dennis Vinas account has been retrieved from the ignore bin', 2003, 1002, 'Mr./Sir', 'Mark Dennis', 'Vinas', 'Lamud', '', 'markdennis@gmail.com', '$2y$10$WFvl3GmDeNBxMaVMvb5IZew26wQKoZCfxlIXT4QE2wKHyUnYj3dcu'),
(19, '2021-05-13 13:25:52.00000', 'Rosalyn Escudero account has been moved to ignore bin', 2003, 1873, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$XOk4fO9j54YKZpl.vTUn4OLTkoBRF/YU3QosmZuWxq6VD2je5F6/2'),
(20, '2021-05-13 13:25:54.00000', 'Mark Dennis Vinas account has been moved to ignore bin', 2003, 1002, 'Mr./Sir', 'Mark Dennis', 'Vinas', 'Lamud', '', 'markdennis@gmail.com', '$2y$10$WFvl3GmDeNBxMaVMvb5IZew26wQKoZCfxlIXT4QE2wKHyUnYj3dcu'),
(21, '2021-05-13 13:25:55.00000', 'Lovely Gaye Revano account has been moved to ignore bin', 2007, 1074, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', '', '', 'lovelygaye@gmail.com', '$2y$10$uBlH1JEIeQrSW63Oo6/mj.X1XCoBiIGLmAXiAAw2gRVhc.h1WpoTW'),
(22, '2021-05-13 13:25:56.00000', 'Rynl Jude Jusi account has been moved to ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(23, '2021-05-13 13:25:57.00000', 'Ruben Aleluya account has been moved to ignore bin', 2071, 3753, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$MNWPd.sLFQ3//66irvRN8.je8B.BuPfgUJ5OYzisNZhD11AOdrCZC'),
(24, '2021-05-13 13:25:58.00000', 'Mark Ilagan account has been moved to ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(25, '2021-05-13 13:25:59.00000', 'Ian Igana account has been moved to ignore bin', 2017, 1975, 'Mr./Sir', 'Ian', 'Igana', 'Gabriel', '', 'iangabriel@gmail.com', '$2y$10$5Qra3DGheP4JA8Rk/HWB6.ELeXt0Xjx5uKL0OW6/zeq6c3QDSaIvO'),
(26, '2021-05-13 13:26:05.00000', 'Rosalyn Escudero account has been retrieved from the ignore bin', 2003, 1873, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$XOk4fO9j54YKZpl.vTUn4OLTkoBRF/YU3QosmZuWxq6VD2je5F6/2'),
(27, '2021-05-13 13:26:06.00000', 'Mark Dennis Vinas account has been retrieved from the ignore bin', 2003, 1002, 'Mr./Sir', 'Mark Dennis', 'Vinas', 'Lamud', '', 'markdennis@gmail.com', '$2y$10$WFvl3GmDeNBxMaVMvb5IZew26wQKoZCfxlIXT4QE2wKHyUnYj3dcu'),
(28, '2021-05-13 13:26:07.00000', 'Lovely Gaye Revano account has been retrieved from the ignore bin', 2007, 1074, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', '', '', 'lovelygaye@gmail.com', '$2y$10$uBlH1JEIeQrSW63Oo6/mj.X1XCoBiIGLmAXiAAw2gRVhc.h1WpoTW'),
(29, '2021-05-13 13:26:07.00000', 'Rynl Jude Jusi account has been retrieved from the ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(30, '2021-05-13 13:26:08.00000', 'Ruben Aleluya account has been retrieved from the ignore bin', 2071, 3753, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$MNWPd.sLFQ3//66irvRN8.je8B.BuPfgUJ5OYzisNZhD11AOdrCZC'),
(31, '2021-05-13 13:26:09.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(32, '2021-05-13 13:26:09.00000', 'Ian Igana account has been retrieved from the ignore bin', 2017, 1975, 'Mr./Sir', 'Ian', 'Igana', 'Gabriel', '', 'iangabriel@gmail.com', '$2y$10$5Qra3DGheP4JA8Rk/HWB6.ELeXt0Xjx5uKL0OW6/zeq6c3QDSaIvO'),
(33, '2021-05-13 13:40:11.00000', 'Lovely Gaye Revano account has been moved to ignore bin', 2007, 1074, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', '', '', 'lovelygaye@gmail.com', '$2y$10$uBlH1JEIeQrSW63Oo6/mj.X1XCoBiIGLmAXiAAw2gRVhc.h1WpoTW'),
(34, '2021-05-13 13:40:12.00000', 'Rosalyn Escudero account has been moved to ignore bin', 2003, 1873, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$XOk4fO9j54YKZpl.vTUn4OLTkoBRF/YU3QosmZuWxq6VD2je5F6/2'),
(35, '2021-05-13 13:40:18.00000', 'Rosalyn Escudero account has been retrieved from the ignore bin', 2003, 1873, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$XOk4fO9j54YKZpl.vTUn4OLTkoBRF/YU3QosmZuWxq6VD2je5F6/2'),
(36, '2021-05-13 13:40:20.00000', 'Lovely Gaye Revano account has been retrieved from the ignore bin', 2007, 1074, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', '', '', 'lovelygaye@gmail.com', '$2y$10$uBlH1JEIeQrSW63Oo6/mj.X1XCoBiIGLmAXiAAw2gRVhc.h1WpoTW'),
(37, '2021-05-13 14:09:14.00000', 'Mark Dennis Vinas account has been accepted', 2003, 1002, 'Mr./Sir', 'Mark Dennis', 'Vinas', 'Lamud', '', 'markdennis@gmail.com', '$2y$10$WFvl3GmDeNBxMaVMvb5IZew26wQKoZCfxlIXT4QE2wKHyUnYj3dcu'),
(38, '2021-05-13 14:10:06.00000', 'Rynl Jude Jusi account has been moved to ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(39, '2021-05-13 14:10:17.00000', 'Ruben Aleluya account has been accepted', 2071, 3753, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$MNWPd.sLFQ3//66irvRN8.je8B.BuPfgUJ5OYzisNZhD11AOdrCZC'),
(40, '2021-05-13 14:22:52.00000', 'Ian Igana account has been approved', 2017, 1975, 'Mr./Sir', 'Ian', 'Igana', 'Gabriel', '', 'iangabriel@gmail.com', '$2y$10$5Qra3DGheP4JA8Rk/HWB6.ELeXt0Xjx5uKL0OW6/zeq6c3QDSaIvO'),
(41, '2021-05-13 14:24:02.00000', 'Rosalyn Escudero account has been approved', 2003, 1873, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$XOk4fO9j54YKZpl.vTUn4OLTkoBRF/YU3QosmZuWxq6VD2je5F6/2'),
(42, '2021-05-13 14:26:28.00000', 'Rynl Jude Jusi account has been retrieved from the ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(43, '2021-05-13 14:28:43.00000', 'Mark Ilagan account has been moved to ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(44, '2021-05-13 14:28:44.00000', 'Lovely Gaye Revano account has been moved to ignore bin', 2007, 1074, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', '', '', 'lovelygaye@gmail.com', '$2y$10$uBlH1JEIeQrSW63Oo6/mj.X1XCoBiIGLmAXiAAw2gRVhc.h1WpoTW'),
(45, '2021-05-13 14:28:45.00000', 'Rynl Jude Jusi account has been moved to ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(46, '2021-05-13 14:28:46.00000', 'Rosalyn Escudero account has been moved to ignore bin', 2000, 2864, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$HX0tClIDWXKRiKZZNLGfj.uepVIYhCLQ/WvWT407Ag7XWRZ4L4uC2'),
(47, '2021-05-13 14:28:47.00000', 'Ruben Aleluya account has been moved to ignore bin', 2009, 5367, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$ZnWaQlA89wsi9vEs8M1k2.TRb1484J7dsxbjkiLlKKcOsZ//JrVwW'),
(48, '2021-05-13 14:29:46.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(49, '2021-05-13 14:29:47.00000', 'Lovely Gaye Revano account has been retrieved from the ignore bin', 2007, 1074, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', '', '', 'lovelygaye@gmail.com', '$2y$10$uBlH1JEIeQrSW63Oo6/mj.X1XCoBiIGLmAXiAAw2gRVhc.h1WpoTW'),
(50, '2021-05-13 14:29:48.00000', 'Rynl Jude Jusi account has been retrieved from the ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(51, '2021-05-13 14:29:49.00000', 'Rosalyn Escudero account has been retrieved from the ignore bin', 2000, 2864, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$HX0tClIDWXKRiKZZNLGfj.uepVIYhCLQ/WvWT407Ag7XWRZ4L4uC2'),
(52, '2021-05-13 14:29:51.00000', 'Ruben Aleluya account has been retrieved from the ignore bin', 2009, 5367, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$ZnWaQlA89wsi9vEs8M1k2.TRb1484J7dsxbjkiLlKKcOsZ//JrVwW'),
(53, '2021-05-13 15:25:16.00000', 'Andro Philip Banag account has been moved to ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(54, '2021-05-13 15:26:43.00000', 'Mark Ilagan account has been moved to ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(55, '2021-05-13 15:26:48.00000', 'Andro Philip Banag account has been retrieved from the ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(56, '2021-05-13 15:26:49.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(57, '2021-05-13 23:50:12.00000', 'Lovely Gaye Revano account has been approved', 2007, 1074, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', '', '', 'lovelygaye@gmail.com', '$2y$10$uBlH1JEIeQrSW63Oo6/mj.X1XCoBiIGLmAXiAAw2gRVhc.h1WpoTW'),
(58, '2021-05-14 11:53:46.00000', 'Rynl Jude Jusi account has been moved to ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(59, '2021-05-14 11:53:47.00000', 'Rosalyn Escudero account has been moved to ignore bin', 2000, 2864, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$HX0tClIDWXKRiKZZNLGfj.uepVIYhCLQ/WvWT407Ag7XWRZ4L4uC2'),
(60, '2021-05-14 11:53:48.00000', 'Ruben Aleluya account has been moved to ignore bin', 2009, 5367, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$ZnWaQlA89wsi9vEs8M1k2.TRb1484J7dsxbjkiLlKKcOsZ//JrVwW'),
(61, '2021-05-14 11:53:48.00000', 'Andro Philip Banag account has been moved to ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(62, '2021-05-14 11:53:49.00000', 'Mark Ilagan account has been moved to ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(63, '2021-05-14 11:54:46.00000', 'Rynl Jude Jusi account has been retrieved from the ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(64, '2021-05-14 11:54:47.00000', 'Rosalyn Escudero account has been retrieved from the ignore bin', 2000, 2864, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$HX0tClIDWXKRiKZZNLGfj.uepVIYhCLQ/WvWT407Ag7XWRZ4L4uC2'),
(65, '2021-05-14 11:54:48.00000', 'Ruben Aleluya account has been retrieved from the ignore bin', 2009, 5367, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$ZnWaQlA89wsi9vEs8M1k2.TRb1484J7dsxbjkiLlKKcOsZ//JrVwW'),
(66, '2021-05-14 11:54:48.00000', 'Andro Philip Banag account has been retrieved from the ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(67, '2021-05-14 11:54:50.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(68, '2021-05-14 11:55:39.00000', 'Rosalyn Escudero account has been rejected', 2000, 2864, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$HX0tClIDWXKRiKZZNLGfj.uepVIYhCLQ/WvWT407Ag7XWRZ4L4uC2'),
(69, '2021-05-14 12:07:51.00000', 'Rynl Jude Jusi account has been moved to ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(70, '2021-05-14 12:07:52.00000', 'Ruben Aleluya account has been moved to ignore bin', 2009, 5367, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$ZnWaQlA89wsi9vEs8M1k2.TRb1484J7dsxbjkiLlKKcOsZ//JrVwW'),
(71, '2021-05-14 12:07:52.00000', 'Andro Philip Banag account has been moved to ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(72, '2021-05-14 12:07:53.00000', 'Mark Ilagan account has been moved to ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(73, '2021-05-14 12:27:16.00000', 'Rynl Jude Jusi account has been retrieved from the ignore bin', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(74, '2021-05-14 12:27:17.00000', 'Ruben Aleluya account has been retrieved from the ignore bin', 2009, 5367, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$ZnWaQlA89wsi9vEs8M1k2.TRb1484J7dsxbjkiLlKKcOsZ//JrVwW'),
(75, '2021-05-14 12:27:17.00000', 'Andro Philip Banag account has been retrieved from the ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(76, '2021-05-14 12:27:18.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(77, '2021-05-16 10:32:48.00000', 'Rynl Jude Jusi account has been approved', 2017, 2853, 'Mr./Sir', 'Rynl Jude', 'Jusi', '', '', 'rynljude@gmail.com', '$2y$10$YZ7d7mzqaojNCJBo4TGIDe9TLBGEtEk8v0hXMVQLQMF3ddP2I1zjC'),
(78, '2021-05-16 11:45:53.00000', 'Ruben Aleluya account has been approved', 2009, 5367, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$ZnWaQlA89wsi9vEs8M1k2.TRb1484J7dsxbjkiLlKKcOsZ//JrVwW'),
(79, '2021-05-16 12:00:21.00000', 'Andro Philip Banag account has been moved to ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(80, '2021-05-16 12:00:21.00000', 'Andro Philip Banag account has been moved to ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(81, '2021-05-16 12:00:22.00000', 'Mark Ilagan account has been moved to ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(82, '2021-05-16 12:00:23.00000', 'Rynl Jusi account has been moved to ignore bin', 2005, 1846, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$9kEYuMvAgkZ4vvCMvJa2zusExOBlffXkOP6tS2nYVL5EAOtowvIgi'),
(83, '2021-05-16 12:00:24.00000', 'Rynl Jusi account has been moved to ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe'),
(84, '2021-05-16 12:00:33.00000', 'Andro Philip Banag account has been deleted from the ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(85, '2021-05-16 12:00:43.00000', 'Rynl Jusi account has been deleted from the ignore bin', 2005, 1846, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$9kEYuMvAgkZ4vvCMvJa2zusExOBlffXkOP6tS2nYVL5EAOtowvIgi'),
(86, '2021-05-16 16:38:13.00000', 'Andro Philip Banag account has been retrieved from the ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(87, '2021-05-16 16:38:14.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(88, '2021-05-16 16:38:14.00000', 'Rynl Jusi account has been retrieved from the ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe'),
(89, '2021-05-16 16:55:11.00000', 'Lovely Gaye Revano account has been moved to ignore bin', 2000, 1974, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', 'Gaye', '', 'lovelygaye@gmail.com', '$2y$10$VxJCrROW7ahZPM/uhIBZHObkcUN6a71cj8DoLb4sM7NDo4XYts3VG'),
(90, '2021-05-16 16:55:12.00000', 'Andro Philip Banag account has been moved to ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(91, '2021-05-16 16:55:13.00000', 'Mark Ilagan account has been moved to ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(92, '2021-05-16 16:55:14.00000', 'Rynl Jusi account has been moved to ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe'),
(93, '2021-05-16 16:59:10.00000', 'Rosalyn Escudero account has been moved to ignore bin', 2002, 8475, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$NlRXG3NhPdlBkJldF4Xp..wXJmVnDX.tT6WwdTchxLI6oXN2RSyUW'),
(94, '2021-05-16 16:59:11.00000', 'Ruben Aleluya account has been moved to ignore bin', 2004, 8838, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$VIyXfHZ2.Z1XiV0D3y81tusoi.fB2Bx9HOQxuPWK8YzjCHMqmx/om'),
(95, '2021-05-16 16:59:12.00000', 'Carmela Balingit account has been moved to ignore bin', 2015, 3865, 'Ms./Mrs.', 'Carmela', 'Balingit', 'Dela Cruz', '', 'carmelabalingit@gmail.com', '$2y$10$4tmoksbEL5OBdDFCMdcwTuU1cDfhJMhSCVKhRSb61CQMYd9hgnYue'),
(96, '2021-05-16 17:20:33.00000', 'Lovely Gaye Revano account has been retrieved from the ignore bin', 2000, 1974, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', 'Gaye', '', 'lovelygaye@gmail.com', '$2y$10$VxJCrROW7ahZPM/uhIBZHObkcUN6a71cj8DoLb4sM7NDo4XYts3VG'),
(97, '2021-05-16 17:20:33.00000', 'Andro Philip Banag account has been retrieved from the ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(98, '2021-05-16 17:20:34.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(99, '2021-05-16 17:20:35.00000', 'Rynl Jusi account has been retrieved from the ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe'),
(100, '2021-05-16 17:20:36.00000', 'Rosalyn Escudero account has been retrieved from the ignore bin', 2002, 8475, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$NlRXG3NhPdlBkJldF4Xp..wXJmVnDX.tT6WwdTchxLI6oXN2RSyUW'),
(101, '2021-05-16 17:20:36.00000', 'Ruben Aleluya account has been retrieved from the ignore bin', 2004, 8838, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$VIyXfHZ2.Z1XiV0D3y81tusoi.fB2Bx9HOQxuPWK8YzjCHMqmx/om'),
(102, '2021-05-16 17:20:37.00000', 'Carmela Balingit account has been retrieved from the ignore bin', 2015, 3865, 'Ms./Mrs.', 'Carmela', 'Balingit', 'Dela Cruz', '', 'carmelabalingit@gmail.com', '$2y$10$4tmoksbEL5OBdDFCMdcwTuU1cDfhJMhSCVKhRSb61CQMYd9hgnYue'),
(103, '2021-05-16 17:20:40.00000', 'Lovely Gaye Revano account has been moved to ignore bin', 2000, 1974, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', 'Gaye', '', 'lovelygaye@gmail.com', '$2y$10$VxJCrROW7ahZPM/uhIBZHObkcUN6a71cj8DoLb4sM7NDo4XYts3VG'),
(104, '2021-05-16 17:20:42.00000', 'Andro Philip Banag account has been moved to ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(105, '2021-05-16 17:20:42.00000', 'Mark Ilagan account has been moved to ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(106, '2021-05-16 17:20:43.00000', 'Rynl Jusi account has been moved to ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe'),
(107, '2021-05-16 17:20:43.00000', 'Rosalyn Escudero account has been moved to ignore bin', 2002, 8475, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$NlRXG3NhPdlBkJldF4Xp..wXJmVnDX.tT6WwdTchxLI6oXN2RSyUW'),
(108, '2021-05-16 17:20:44.00000', 'Ruben Aleluya account has been moved to ignore bin', 2004, 8838, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$VIyXfHZ2.Z1XiV0D3y81tusoi.fB2Bx9HOQxuPWK8YzjCHMqmx/om'),
(109, '2021-05-16 17:20:44.00000', 'Carmela Balingit account has been moved to ignore bin', 2015, 3865, 'Ms./Mrs.', 'Carmela', 'Balingit', 'Dela Cruz', '', 'carmelabalingit@gmail.com', '$2y$10$4tmoksbEL5OBdDFCMdcwTuU1cDfhJMhSCVKhRSb61CQMYd9hgnYue'),
(110, '2021-05-16 18:09:19.00000', 'Lovely Gaye Revano account has been retrieved from the ignore bin', 2000, 1974, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', 'Gaye', '', 'lovelygaye@gmail.com', '$2y$10$VxJCrROW7ahZPM/uhIBZHObkcUN6a71cj8DoLb4sM7NDo4XYts3VG'),
(111, '2021-05-16 18:09:20.00000', 'Andro Philip Banag account has been retrieved from the ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(112, '2021-05-16 18:09:21.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(113, '2021-05-16 18:09:22.00000', 'Rynl Jusi account has been retrieved from the ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe'),
(114, '2021-05-16 18:09:23.00000', 'Rosalyn Escudero account has been retrieved from the ignore bin', 2002, 8475, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$NlRXG3NhPdlBkJldF4Xp..wXJmVnDX.tT6WwdTchxLI6oXN2RSyUW'),
(115, '2021-05-16 18:09:24.00000', 'Ruben Aleluya account has been retrieved from the ignore bin', 2004, 8838, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$VIyXfHZ2.Z1XiV0D3y81tusoi.fB2Bx9HOQxuPWK8YzjCHMqmx/om'),
(116, '2021-05-16 18:09:25.00000', 'Carmela Balingit account has been retrieved from the ignore bin', 2015, 3865, 'Ms./Mrs.', 'Carmela', 'Balingit', 'Dela Cruz', '', 'carmelabalingit@gmail.com', '$2y$10$4tmoksbEL5OBdDFCMdcwTuU1cDfhJMhSCVKhRSb61CQMYd9hgnYue'),
(117, '2021-05-16 19:05:51.00000', 'Lovely Gaye Revano account has been approved', 2000, 1974, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', 'Gaye', '', 'lovelygaye@gmail.com', '$2y$10$VxJCrROW7ahZPM/uhIBZHObkcUN6a71cj8DoLb4sM7NDo4XYts3VG'),
(118, '2021-05-20 23:26:33.00000', 'Ruben Aleluya account has been moved to ignore bin', 2004, 8838, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$VIyXfHZ2.Z1XiV0D3y81tusoi.fB2Bx9HOQxuPWK8YzjCHMqmx/om'),
(119, '2021-05-20 23:26:34.00000', 'Andro Philip Banag account has been moved to ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(120, '2021-05-20 23:26:35.00000', 'Mark Ilagan account has been moved to ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(121, '2021-05-20 23:26:35.00000', 'Rynl Jusi account has been moved to ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe'),
(122, '2021-05-20 23:26:50.00000', 'Ruben Aleluya account has been retrieved from the ignore bin', 2004, 8838, 'Mr./Sir', 'Ruben', 'Aleluya', '', '', 'rubenaleluya@gmail.com', '$2y$10$VIyXfHZ2.Z1XiV0D3y81tusoi.fB2Bx9HOQxuPWK8YzjCHMqmx/om'),
(123, '2021-05-20 23:26:51.00000', 'Andro Philip Banag account has been retrieved from the ignore bin', 2005, 5752, 'Mr./Sir', 'Andro Philip', 'Banag', 'G', '', 'androphilip@gmail.com', '$2y$10$uQMcvWB4euz4frarOhzYvO/CULPDDPNm8TIpesko8FKiKTAyMWjay'),
(124, '2021-05-20 23:26:52.00000', 'Mark Ilagan account has been retrieved from the ignore bin', 2006, 1756, 'Mr./Sir', 'Mark', 'Ilagan', '', '', 'markilagan@gmail.com', '$2y$10$21ZzSMbBbZ1Jacj5xAG9WOlWPlDj5WyNYXlFoVUrvPrWTSAPEGfmO'),
(125, '2021-05-20 23:26:53.00000', 'Rynl Jusi account has been retrieved from the ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe'),
(126, '2021-05-28 00:56:49.00000', 'Rosalyn Escudero account has been moved to ignore bin', 2002, 8475, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$NlRXG3NhPdlBkJldF4Xp..wXJmVnDX.tT6WwdTchxLI6oXN2RSyUW'),
(127, '2021-05-28 00:56:58.00000', 'Rosalyn Escudero account has been retrieved from the ignore bin', 2002, 8475, 'Ms./Mrs.', 'Rosalyn', 'Escudero', '', '', 'rosalynescudero@gmail.com', '$2y$10$NlRXG3NhPdlBkJldF4Xp..wXJmVnDX.tT6WwdTchxLI6oXN2RSyUW'),
(128, '2021-05-28 01:20:39.00000', 'Carmela Balingit account has been approved', 2015, 3865, 'Ms./Mrs.', 'Carmela', 'Balingit', 'Dela Cruz', '', 'carmelabalingit@gmail.com', '$2y$10$4tmoksbEL5OBdDFCMdcwTuU1cDfhJMhSCVKhRSb61CQMYd9hgnYue'),
(129, '2021-06-01 12:33:35.00000', 'Rynl Jusi account has been moved to ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe'),
(130, '2021-06-01 12:33:43.00000', 'Rynl Jusi account has been retrieved from the ignore bin', 2000, 1047, 'Mr./Sir', 'Rynl', 'Jusi', 'Jude', '', 'rynljude@gmail.com', '$2y$10$kHpSHQwm.22DkH4Rycvqp.ICYfdQzW83uJgxIUyk7eSAFbEheh5Qe');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `teacher_last` varchar(255) DEFAULT NULL,
  `teacher_first` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_grade` varchar(255) NOT NULL,
  `class_track` varchar(255) NOT NULL,
  `class_strand` varchar(255) NOT NULL,
  `class_spec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `teacher_last`, `teacher_first`, `class_name`, `class_grade`, `class_track`, `class_strand`, `class_spec`) VALUES
(26, 'Revano', 'Lovely Gaye', 'Ithiel', '11 ', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `user_lrn` varchar(255) NOT NULL,
  `user_grade` varchar(255) NOT NULL,
  `user_track` varchar(255) NOT NULL,
  `user_strand` varchar(255) NOT NULL,
  `user_spec` varchar(255) NOT NULL,
  `user_section` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_middle` varchar(255) NOT NULL,
  `user_suffix` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `p_section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `user_lrn`, `user_grade`, `user_track`, `user_strand`, `user_spec`, `user_section`, `user_gender`, `user_first`, `user_last`, `user_middle`, `user_suffix`, `user_email`, `user_pwd`, `type`, `p_section`) VALUES
(17, '108434080094', '11', 'ACAD Track', 'STEM', 'None', 'Zaanan', 'Male', 'Engelbert', 'Domingo', '', '', 'engelbertdomingo0910­@gmail.com', '$2y$10$qyFlRJHK7tDoQ.Y1rsOXSOA68WQMldoI7Ii0cqNkulFDOOY4CC5Mm', 'student', '2'),
(18, '136899120929', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Female', 'Ma. Irish ', 'Claveria', '', '', 'irishclaveria12@gmai­l.com', '$2y$10$/sVRXQZFnknjc55N1mZH3uFB4vOID4mLkcuPhc7EYlVBYIUOCVa6S', 'student', '1'),
(19, '108429080252', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Art Vincent', 'Tibio', '', '', 'vincenttibio.22@gmai­l.com', '$2y$10$A46U8kJGcq4gK7pE/P92I.cJooXU3JMzOBzo3/PCjeLYx4OhA8zGu', 'student', ''),
(20, '136912080495', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Velasco', 'Sam', 'R', '', 'reyesvelasco2002@gma­il.com', '$2y$10$MjgiPsP/GUAPXDEfiiOk9uG0G5wGXwj1yjA5xFRyUjCE7ac5U1RU6', 'student', ''),
(22, '109593080122', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Cana', 'Male', 'Marius Jacob', 'Hernandez', 'Sarte', '', 'mariusjacobhernandez03@yahoo.com', '$2y$10$qf24OPx81J9P8jQJwpoomuDo6pSXc4QwvSI3StN5bOP7FteszIefu', 'student', ''),
(23, '164528080215', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Irijah', 'Male', 'Zack', 'Buensalida', 'Sareno', '', 'buensalidazack@gmail.com', '$2y$10$.x8yMb.0C8D4xJqsm63V7OsYj9VDVwvq95ibZdkmhbcQvqgE8btgq', 'student', ''),
(24, '136886080356', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Female', 'Rachelle Anne', 'Lucban', 'C', '', 'rachelleannelucban@gmail.com', '$2y$10$LZwIhLZdyu5UcZVZ8urUS.wqNz5Q0x6Q05/3UGeBm0eyOTQpwZDGi', 'student', ''),
(25, '108423080273', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Cristan', 'Pederio', 'G', '', 'cristan.pederio19@gmail.com', '$2y$10$txPCvVbLyS/vpwROJmkLIOqMNDKuyf5xP87TIpe2yVl8wTxWi.YYq', 'student', ''),
(26, '136914120652', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'John Harold', 'Rosas', 'Q', '', 'haroldrosas21@gmail.com', '$2y$10$lpgREE2fkIEljH67pTgZAe3VEgbFqw2EMQhgucs5NARmSxdpeqDCW', 'student', ''),
(27, '136725080124', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'John Kenzo', 'Opinion', 'D', '', 'johnnkenzoo@gmail.com', '$2y$10$GIITKBnafbtyoAGKNsxl.eMZssiqxsCgAQ8COL86XfV0Ri5Jm8MoW', 'student', ''),
(28, '136912070021', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Arvin', 'Arevalo', 'Rivera', '', 'arvinarevalo32@gmail.com', '$2y$10$ZHCwCNgSV2Ozvf23t2nV5.PShkwf6DSL/Vt8xhaGqshEgGN2ro8sK', 'student', ''),
(29, '136908080872', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Philip Andrei', 'Ramos', 'Anora', '', 'ramosphilip44@gmail.com', '$2y$10$LxmAiOMgxF.R8IiZ13s.L.kR3/EqnB2EFLk/zcLMS.UlNvCClY5bW', 'student', ''),
(30, '228501080435', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'John Cedrick', 'Inolpe', 'Pajonilla', '', 'johncedrickpajonilla@gmail.com', '$2y$10$WZ6ccF/2HVHrkjzWyJzJm.5/9hW/PuMYOMcy6i97hcZY0s98gg6cO', 'student', ''),
(31, '136882080135', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Neo', 'Lumbreza', 'Ramirez', '', 'neolmbrz@gmail.com', '$2y$10$EI2JeWNAIZaOUEGL9PdsAeSttMWO7jJHbuHiAthKYzkLfq.5O6h8G', 'student', ''),
(32, '136907080182', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Female', 'Mharianne', 'Magpantay', 'P', '', 'mharianne.magpantay@gmail.com', '$2y$10$/xNI4wpw96vr1ZN32RfT6.PsheV0bF4ArUPK4FUMD30PMaT6AjRx6', 'student', ''),
(33, '115443070014', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Louie Jed', 'Gecarane', 'Alonsabe', '', 'louiejed613@gmail.com', '$2y$10$62VQ82p6559MluvNWJEXyuFibwHuds32xXTZvZK2dYsv1xuZwmfra', 'student', ''),
(34, '136908080486', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Dyno', 'Hilapo', '', '', 'hilapodyno@gmail.com', '$2y$10$lXNP3smSkoAtSGFEqzuiLuHaTORYV2ERI7.reHkTYnJSogzIpkaXi', 'student', ''),
(35, '108216080214', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Vince Jefferson', 'Valliente', '', '', 'vincevalliente2@gmail.com', '$2y$10$AAQB2Rzj/h8tluQjTZUdo.SFT.tESGWo3M.kcwX7kf7yOQcZ32drq', 'student', ''),
(36, '136915060024', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Mike', 'Bucio', 'Fernandez', '', 'mikebucio0@gmail.com', '$2y$10$ARJcRWDsbSzwHzYiT03hSelP68wd8dVcvhTSA023LnxdhRv/lUIgy', 'student', ''),
(37, '136899080299', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Jude', 'Jamena', 'Casero', '', 'judejamena@gmail.com', '$2y$10$/lMFU6TvBe/s8N2XZnqa.uGsrhcxnIi37Llo0Sx2ox7wF7ou9brwq', 'student', ''),
(38, '136899080509', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Neiane', 'Talampas', 'A', '', 'talampasn@gmail.com', '$2y$10$AJ/IkyBwM3l8ny/jvPQacuOzfSFRK7VKqv4J6aTubFD07a6W/.z62', 'student', ''),
(39, '136905080128', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Jervan Avram', 'Gubalane', 'Malolos', '', 'ja.gubalane@gmail.com', '$2y$10$a29r3fSF6oStcW3QmJ.t7.hGHsmjvXSuYwaKiNvJRGDjo1oayvBoS', 'student', ''),
(40, '108247120205', '12', 'Technical Vocational Livelihood Track', 'ICT', 'ICT Programming', 'Ithiel', 'Male', 'Anthony James', 'Ramirez', 'Calda', '', 'ajcaldr@gmail.com', '$2y$10$gpO2Ri5GeZZT7avV/iGVf.3Sh3qPtW5ixhgUzb2M9ePpli8PMWH0u', 'student', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_bin`
--

CREATE TABLE `student_bin` (
  `id` int(11) NOT NULL,
  `student_gender` varchar(255) NOT NULL,
  `student_first` varchar(255) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `student_middle` varchar(255) NOT NULL,
  `student_suffix` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_email1` varchar(255) NOT NULL,
  `parent_email2` varchar(255) NOT NULL,
  `parent_email3` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_bin`
--

INSERT INTO `student_bin` (`id`, `student_gender`, `student_first`, `student_last`, `student_middle`, `student_suffix`, `parent_email`, `parent_email1`, `parent_email2`, `parent_email3`, `section`) VALUES
(1, 'Male', 'DYNO C.', 'HILAPO,', '', '', 'hilapo@gmail.com', '', '', '', 'Ithiel'),
(2, 'Female', 'MHARIANNE P.', 'MAGPANTAY,', '', '', 'mharianneparent@gmail.com', '', '', '', 'Ithiel');

-- --------------------------------------------------------

--
-- Table structure for table `subject_first`
--

CREATE TABLE `subject_first` (
  `id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `track` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `c1` varchar(255) NOT NULL,
  `c2` varchar(255) NOT NULL,
  `c3` varchar(255) NOT NULL,
  `c4` varchar(255) NOT NULL,
  `c5` varchar(255) NOT NULL,
  `c6` varchar(255) NOT NULL,
  `a1` varchar(255) NOT NULL,
  `a2` varchar(255) NOT NULL,
  `a3` varchar(255) NOT NULL,
  `a4` varchar(255) NOT NULL,
  `a5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_sec`
--

CREATE TABLE `subject_sec` (
  `id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `track` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `c1` varchar(255) NOT NULL,
  `c2` varchar(255) NOT NULL,
  `c3` varchar(255) NOT NULL,
  `c4` varchar(255) NOT NULL,
  `c5` varchar(255) NOT NULL,
  `c6` varchar(255) NOT NULL,
  `a1` varchar(255) NOT NULL,
  `a2` varchar(255) NOT NULL,
  `a3` varchar(255) NOT NULL,
  `a4` varchar(255) NOT NULL,
  `a5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `type` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `user_year`, `user_id`, `user_gender`, `user_first`, `user_last`, `user_middle`, `user_suffix`, `user_email`, `user_pwd`, `user_photo`, `type`, `status`) VALUES
(90, 10, 0, 'Mr./Sir', 'Admin', '', '', '', 'adminloaogv@gmail.com', '$2y$10$hE6RwROZW9EFZMMiF0wPv.F3hSSNkIqFS6oZDjvqhsql57VNf2DOq', NULL, 'admin', 0),
(91, 10, 10, 'Mr./Sir', 'Registrar', 'Head', '', '', 'registar1@loa.com', '$2y$10$54FSXUxP2Cb2TVPBIok6M.ZZpv.eUwompl9GqMN/kZdAf2w7lx8Y.', NULL, 'registrar', 0),
(115, 2000, 1974, 'Ms./Mrs.', 'Lovely Gaye', 'Revano', 'Gaye', '', 'lovelygaye@gmail.com', '$2y$10$VxJCrROW7ahZPM/uhIBZHObkcUN6a71cj8DoLb4sM7NDo4XYts3VG', NULL, 'teacher', 1),
(116, 2015, 3865, 'Ms./Mrs.', 'Carmela', 'Balingit', 'Dela Cruz', '', 'carmelabalingit@gmail.com', '$2y$10$4tmoksbEL5OBdDFCMdcwTuU1cDfhJMhSCVKhRSb61CQMYd9hgnYue', NULL, 'teacher', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_bin`
--

CREATE TABLE `teacher_bin` (
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
  `user_photo` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disable_semester`
--
ALTER TABLE `disable_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ithiel_ave`
--
ALTER TABLE `ithiel_ave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ithiel_ave_sec`
--
ALTER TABLE `ithiel_ave_sec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ithiel_grade_first_first`
--
ALTER TABLE `ithiel_grade_first_first`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ithiel_grade_first_sec`
--
ALTER TABLE `ithiel_grade_first_sec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ithiel_grade_sec_first`
--
ALTER TABLE `ithiel_grade_sec_first`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ithiel_grade_sec_sec`
--
ALTER TABLE `ithiel_grade_sec_sec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ithiel_student`
--
ALTER TABLE `ithiel_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ithiel_student_irregular`
--
ALTER TABLE `ithiel_student_irregular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests_bin`
--
ALTER TABLE `requests_bin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests_log`
--
ALTER TABLE `requests_log`
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
-- Indexes for table `student_bin`
--
ALTER TABLE `student_bin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_first`
--
ALTER TABLE `subject_first`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_sec`
--
ALTER TABLE `subject_sec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_bin`
--
ALTER TABLE `teacher_bin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disable_semester`
--
ALTER TABLE `disable_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ithiel_ave`
--
ALTER TABLE `ithiel_ave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ithiel_ave_sec`
--
ALTER TABLE `ithiel_ave_sec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ithiel_grade_first_first`
--
ALTER TABLE `ithiel_grade_first_first`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ithiel_grade_first_sec`
--
ALTER TABLE `ithiel_grade_first_sec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ithiel_grade_sec_first`
--
ALTER TABLE `ithiel_grade_sec_first`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ithiel_grade_sec_sec`
--
ALTER TABLE `ithiel_grade_sec_sec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ithiel_student`
--
ALTER TABLE `ithiel_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ithiel_student_irregular`
--
ALTER TABLE `ithiel_student_irregular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `requests_bin`
--
ALTER TABLE `requests_bin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `requests_log`
--
ALTER TABLE `requests_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=621;

--
-- AUTO_INCREMENT for table `student_bin`
--
ALTER TABLE `student_bin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject_first`
--
ALTER TABLE `subject_first`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_sec`
--
ALTER TABLE `subject_sec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `teacher_bin`
--
ALTER TABLE `teacher_bin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
