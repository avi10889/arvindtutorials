-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 07:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ait_arvind`
--

-- --------------------------------------------------------

--
-- Table structure for table `ait_admin`
--

CREATE TABLE `ait_admin` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'SADMIN,ADMIN',
  `last_login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('A','D') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'A(Active),D(Disabled)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ait_admin`
--

INSERT INTO `ait_admin` (`uid`, `uname`, `pass`, `email`, `mobile_no`, `level`, `last_login`, `created_on`, `status`) VALUES
(1, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'faisal.sayed301@gmail.com', '', 'SADMIN', '1534699237', '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ait_admin_access_logs`
--

CREATE TABLE `ait_admin_access_logs` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ait_admin_access_logs`
--

INSERT INTO `ait_admin_access_logs` (`id`, `uid`, `ip`, `user_agent`, `time`) VALUES
(16, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1523388494'),
(17, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1523475121'),
(18, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1523562301'),
(19, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1523819014'),
(20, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1523903528'),
(21, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1524163532'),
(22, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1524300884'),
(23, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1524336833'),
(24, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1525113601'),
(25, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1525199875'),
(26, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', '1525460303'),
(27, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', '1525545226'),
(28, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', '1525597590'),
(29, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '1527100696'),
(30, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '1527274508'),
(31, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '1527318897'),
(32, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '1527358746'),
(33, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '1534666709'),
(34, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '1534675202'),
(35, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '1534699238');

-- --------------------------------------------------------

--
-- Table structure for table `ait_board`
--

CREATE TABLE `ait_board` (
  `board_id` int(11) NOT NULL,
  `board_name` varchar(100) NOT NULL,
  `board_state` varchar(50) NOT NULL,
  `board_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y(YES),N(NO)',
  `board_created_on` varchar(20) NOT NULL,
  `board_modified_on` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ait_board`
--

INSERT INTO `ait_board` (`board_id`, `board_name`, `board_state`, `board_active`, `board_created_on`, `board_modified_on`) VALUES
(1, 'Maharashtra (HSC)', 'Maharashtra', 'Y', '', ''),
(2, 'CBSE', '', 'Y', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ait_branch`
--

CREATE TABLE `ait_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `classes_name` varchar(100) NOT NULL,
  `branch_state` varchar(50) NOT NULL,
  `branch_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `branch_created_on` varchar(20) NOT NULL,
  `branch_modified_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ait_branch`
--

INSERT INTO `ait_branch` (`branch_id`, `branch_name`, `classes_name`, `branch_state`, `branch_active`, `branch_created_on`, `branch_modified_on`) VALUES
(1, 'Sakinaka', 'Arvind Classes', 'Maharashtra', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Marol', 'Arvind Classes', 'Maharashtra', 'Y', '2018-04-21 16:01:02', '1524336903'),
(4, 'Vakola', 'Arvind Classes', 'Maharashtra', 'N', '1524337653', '');

-- --------------------------------------------------------

--
-- Table structure for table `ait_chapters`
--

CREATE TABLE `ait_chapters` (
  `chap_id` int(11) NOT NULL,
  `chap_title` varchar(50) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `std_id` int(1) NOT NULL,
  `chap_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` varchar(20) NOT NULL,
  `modified_on` varchar(20) NOT NULL,
  `syllabus_print_year` varchar(10) NOT NULL,
  `modified_by_admin_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ait_chapters`
--

INSERT INTO `ait_chapters` (`chap_id`, `chap_title`, `sub_id`, `std_id`, `chap_active`, `created_on`, `modified_on`, `syllabus_print_year`, `modified_by_admin_uid`) VALUES
(1, 'Sexual Reproduction In Angiosperm', 13, 2, 'Y', '0000-00-00 00:00:00', '2017-11-30 13:01:37', '', 3),
(5, 'Metrics', 11, 2, 'Y', '0000-00-00 00:00:00', '2017-12-01 17:33:58', '', 3),
(6, 'Radiation', 7, 2, 'Y', '0000-00-00 00:00:00', '2018-01-10 12:08:02', '', 3),
(7, 'Reactions', 9, 2, 'Y', '0000-00-00 00:00:00', '2018-01-10 12:08:19', '', 3),
(8, 'HTML', 14, 3, 'Y', '0000-00-00 00:00:00', '2018-01-10 12:08:41', '', 3),
(9, 'Law Of Motion', 8, 3, 'Y', '0000-00-00 00:00:00', '2018-01-10 12:08:58', '', 3),
(10, 'Chain Equlibrium', 10, 3, 'Y', '0000-00-00 00:00:00', '2018-01-10 12:09:20', '', 3),
(11, 'Limits', 12, 0, 'Y', '0000-00-00 00:00:00', '2018-01-10 12:09:35', '', 3),
(12, 'Black Box Theory', 7, 5, 'Y', '1524164311', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ait_lecture_schedule`
--

CREATE TABLE `ait_lecture_schedule` (
  `lecture_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `lecture_datetime` varchar(20) NOT NULL,
  `lecture_enddatetime` varchar(40) NOT NULL,
  `lecture_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` varchar(20) NOT NULL,
  `modified_on` varchar(20) NOT NULL,
  `modified_by_admin_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ait_lecture_schedule`
--

INSERT INTO `ait_lecture_schedule` (`lecture_id`, `branch_id`, `std_id`, `sub_id`, `teacher_id`, `lecture_datetime`, `lecture_enddatetime`, `lecture_active`, `created_on`, `modified_on`, `modified_by_admin_uid`) VALUES
(1, 1, 2, 13, 1, '1525935600', '1525564800', 'Y', '1525546627', '', 0),
(2, 1, 2, 7, 4, '1526029200', '1525564800', 'Y', '1525546831', '', 1),
(3, 1, 2, 11, 2, '1526130000', '1525564800', 'Y', '1525546853', '', 1),
(4, 1, 2, 10, 1, '1525946400', '1525564800', 'Y', '1525598465', '', 1),
(5, 1, 2, 11, 4, '1527145200', '1527069600', 'Y', '1527100758', '', 1),
(6, 1, 2, 13, 2, '1527159600', '1527080400', 'Y', '1527100828', '', 1),
(7, 1, 2, 7, 1, '1526040000', '1527084000', 'Y', '1527100909', '', 1),
(8, 1, 5, 10, 2, '1526131500', '1527088680', 'Y', '1527100955', '', 1),
(9, 1, 2, 13, 2, '1526120700', '1527092280', 'Y', '1527101001', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ait_sessions_log`
--

CREATE TABLE `ait_sessions_log` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ait_standards`
--

CREATE TABLE `ait_standards` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `std_number` int(1) NOT NULL,
  `std_desc` varchar(150) NOT NULL,
  `std_type` varchar(25) NOT NULL,
  `std_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ait_standards`
--

INSERT INTO `ait_standards` (`std_id`, `std_name`, `std_number`, `std_desc`, `std_type`, `std_active`, `created_on`) VALUES
(2, 'F.Y.J.C', 11, 'First Year Of Junior College', 'Junior College', 'Y', '2017-10-15 10:20:43'),
(5, 'S.Y.J.C', 12, 'Second Year Of Junior College', 'Junior College', 'Y', '2017-11-28 12:34:47'),
(6, 'S.S.C', 0, 'Secondary School Certificate', 'Junior College', 'Y', '1524164182');

-- --------------------------------------------------------

--
-- Table structure for table `ait_standard_fields`
--

CREATE TABLE `ait_standard_fields` (
  `fld_id` int(11) NOT NULL,
  `fld_name` varchar(50) NOT NULL,
  `fld_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ait_standard_fields`
--

INSERT INTO `ait_standard_fields` (`fld_id`, `fld_name`, `fld_active`, `created_on`) VALUES
(1, 'Arts', 'Y', ''),
(2, 'Commerce', 'Y', ''),
(3, 'Science', 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `ait_students`
--

CREATE TABLE `ait_students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(300) NOT NULL,
  `student_photo` varchar(500) NOT NULL,
  `at_student` enum('Y','N') NOT NULL DEFAULT 'Y',
  `student_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` varchar(20) NOT NULL,
  `modified_on` varchar(20) NOT NULL,
  `modified_by_admin_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ait_students`
--

INSERT INTO `ait_students` (`student_id`, `student_name`, `student_photo`, `at_student`, `student_active`, `created_on`, `modified_on`, `modified_by_admin_uid`) VALUES
(1, 'Avinash Rai', '', 'Y', 'Y', '1527331214', '', 0),
(2, 'Avinash Rai', '', 'Y', 'Y', '1527331261', '', 0),
(3, 'Avinash Rai', '05_1600x600.jpg', 'Y', 'Y', '1527332257', '', 1),
(4, 'Avinash Rai', '06_1600x600.jpg', 'Y', 'Y', '1527332393', '', 1),
(5, 'Avinash Rai', '07_1600x600.jpg', 'Y', 'Y', '1527332498', '', 1),
(6, 'Avinash Rai', '07_1600x600.jpg', 'Y', 'Y', '1527332919', '', 1),
(7, 'Avinash Rai', '07_1600x600.jpg', 'Y', 'Y', '1527333168', '', 1),
(8, 'Avinash Rai', '06_1600x600.jpg', 'Y', 'Y', '1527333215', '', 1),
(9, 'Avinash Rai', '06_1600x600.jpg', 'Y', 'Y', '1527333339', '', 1),
(10, 'Avinash Rai', '06_1600x600.jpg', 'Y', 'Y', '1527358809', '', 1),
(11, 'Avinash Rai', '07_1600x600.jpg', 'Y', 'Y', '1527358871', '', 1),
(12, 'Avinash Rai', '06_1600x600.jpg', 'Y', 'Y', '1527359027', '', 1),
(13, 'Avinash Rai', '06_1600x600.jpg', 'Y', 'Y', '1527359121', '', 1),
(14, 'Avinash Rai', '05_1600x600.jpg', 'Y', 'Y', '1527359229', '', 1),
(15, 'Avinash Rai', '07_1600x600.jpg', 'Y', 'Y', '1527359399', '', 1),
(16, 'Avinash Rai', '05_1600x600.jpg', 'Y', 'Y', '1527359988', '', 1),
(17, 'Faizan Khan', '06_1600x600.jpg', 'Y', 'Y', '1527360152', '', 1),
(18, 'Avinash Rai', '07_1600x600.jpg', 'Y', 'Y', '1527360365', '', 1),
(19, 'Avinash Rai', '06_1600x600.jpg', 'Y', 'Y', '1527360424', '', 1),
(20, 'Avinash Rai', '1102af61937ecad0b98964fa4a903366.jpg', 'Y', 'Y', '1527360951', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ait_students_result`
--

CREATE TABLE `ait_students_result` (
  `student_result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_exam_type` varchar(100) NOT NULL,
  `student_marks` text NOT NULL,
  `student_academic_year` varchar(30) NOT NULL,
  `student_result_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` varchar(40) NOT NULL,
  `modified_on` varchar(40) NOT NULL,
  `modified_by_admin_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ait_students_result`
--

INSERT INTO `ait_students_result` (`student_result_id`, `student_id`, `student_exam_type`, `student_marks`, `student_academic_year`, `student_result_active`, `created_on`, `modified_on`, `modified_by_admin_uid`) VALUES
(1, 0, 'dcacsd', '["23","32","32","323"]', '', 'Y', '1527359988', '', 1),
(2, 17, 'JEEE', '{"P":"23","C":"32","M":"32","B":"323"}', '', 'Y', '1527360152', '', 1),
(3, 18, 'dcacsd', '{"P":"23","C":"32","M":"32","B":"323"}', '', 'Y', '1527360365', '', 1),
(4, 20, 'dcacsd', '{"P":"23","C":"32","M":"32","B":"323"}', '', 'Y', '1527360951', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ait_subjects`
--

CREATE TABLE `ait_subjects` (
  `sub_id` int(11) NOT NULL,
  `std_field_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `sub_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` varchar(20) NOT NULL,
  `modified_on` varchar(20) NOT NULL,
  `modified_by_admin_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ait_subjects`
--

INSERT INTO `ait_subjects` (`sub_id`, `std_field_id`, `subject_name`, `sub_active`, `created_on`, `modified_on`, `modified_by_admin_uid`) VALUES
(7, 3, 'Physics', 'Y', '0000-00-00 00:00:00', '2017-11-28 12:35:09', 3),
(10, 3, 'Chemistry', 'Y', '0000-00-00 00:00:00', '2017-11-28 12:35:42', 3),
(11, 3, 'Maths', 'Y', '0000-00-00 00:00:00', '2017-11-28 12:35:58', 3),
(13, 3, 'Biology', 'Y', '0000-00-00 00:00:00', '1523475572', 1),
(17, 2, 'Accounts', 'Y', '0000-00-00 00:00:00', '2018-01-10 12:05:48', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ait_teachers`
--

CREATE TABLE `ait_teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_desc` varchar(250) NOT NULL,
  `teacher_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` varchar(20) NOT NULL,
  `modified_on` varchar(20) NOT NULL,
  `modified_by_admin_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ait_teachers`
--

INSERT INTO `ait_teachers` (`teacher_id`, `teacher_name`, `teacher_desc`, `teacher_active`, `created_on`, `modified_on`, `modified_by_admin_uid`) VALUES
(1, 'Arvind Sir', 'Biology', 'Y', '1525545238', '1525550122', 1),
(2, 'Gaurav Sir', 'IT', 'Y', '1525545257', '', 1),
(4, 'Faisal Sir', 'Physics', 'Y', '1525550469', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ait_test_schedule`
--

CREATE TABLE `ait_test_schedule` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `chap_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `test_datetime` varchar(20) NOT NULL,
  `test_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` varchar(20) NOT NULL,
  `modified_on` varchar(20) NOT NULL,
  `modified_by_admin_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ait_test_schedule`
--

INSERT INTO `ait_test_schedule` (`id`, `branch_id`, `std_id`, `sub_id`, `chap_id`, `marks`, `test_datetime`, `test_active`, `created_on`, `modified_on`, `modified_by_admin_uid`) VALUES
(1, 1, 2, 7, 6, 5, '1523906468', 'Y', '1523906468', '', 0),
(2, 1, 2, 13, 1, 5, '1524164017', 'Y', '1524164017', '', 0),
(3, 2, 2, 7, 12, 5, '1524733200', 'Y', '1524164338', '', 0),
(4, 1, 2, 13, 1, 5, '1524839400', 'Y', '1524167363', '', 0),
(5, 2, 2, 7, 12, 5, '1524753000', 'Y', '1524167865', '', 0),
(6, 1, 2, 7, 6, 3, '1525330800', 'Y', '1524338443', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ait_visitors`
--

CREATE TABLE `ait_visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `platform` varchar(100) NOT NULL,
  `visit_count` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ait_visitors`
--

INSERT INTO `ait_visitors` (`id`, `ip_address`, `browser`, `platform`, `visit_count`, `created_at`, `updated_at`) VALUES
(25, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1530683085, 0),
(24, '149.62.168.7', 'Chrome 46.0.2754.75', 'Windows Vista', 1, 1530640296, 0),
(23, '149.62.168.7', 'Chrome 46.0.2754.75', 'Windows Vista', 1, 1530640241, 0),
(22, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1530545162, 0),
(21, '66.249.79.11', 'Googlebot', 'Unknown Platform', 1, 1530448290, 0),
(20, '66.249.79.11', 'Googlebot', 'Unknown Platform', 1, 1530448282, 0),
(19, '66.249.79.11', 'Googlebot', 'Unknown Platform', 1, 1530448273, 0),
(18, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1530434029, 0),
(17, '64.246.161.30', 'Firefox 59.0', 'Mac OS X', 1, 1530382606, 0),
(16, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1530372481, 0),
(15, '45.64.192.38', 'Chrome 67.0.3396.99', 'Windows 10', 1, 0, 1530268441),
(26, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1530719170, 0),
(27, '66.249.79.11', 'Googlebot', 'Android', 1, 1530736690, 0),
(28, '66.249.79.15', 'Googlebot', 'Android', 1, 1530739793, 0),
(29, '46.242.145.96', 'Chrome 5.0.375.99', 'Windows XP', 1, 1530814855, 0),
(30, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1530895897, 0),
(31, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1530931287, 0),
(32, '66.249.79.11', 'Googlebot', 'Unknown Platform', 1, 1530952701, 0),
(33, '167.114.29.88', 'Chrome 46.0.2754.75', 'Windows Vista', 1, 1531133625, 0),
(34, '167.114.29.88', 'Chrome 46.0.2754.75', 'Windows Vista', 1, 1531133625, 0),
(35, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1531179145, 0),
(36, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1531199686, 0),
(37, '66.249.79.13', 'Googlebot', 'Android', 1, 1531225343, 0),
(38, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1531395050, 0),
(39, '182.58.102.200', 'Chrome 67.0.3396.99', 'Windows 10', 1, 1531410462, 0),
(40, '182.58.102.200', 'Chrome 67.0.3396.99', 'Windows 10', 1, 0, 1531410498),
(41, '182.58.102.200', 'Chrome 67.0.3396.99', 'Windows 10', 2, 0, 1531410510),
(42, '182.58.102.200', 'Chrome 67.0.3396.99', 'Windows 10', 3, 0, 1531410522),
(43, '139.59.42.246', 'Firefox 33.0', 'Windows 7', 1, 1531411417, 0),
(44, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1531426938, 0),
(45, '66.249.79.133', 'Googlebot', 'Unknown Platform', 1, 1531449835, 0),
(46, '66.249.79.133', 'Googlebot', 'Unknown Platform', 1, 1531449839, 0),
(47, '66.249.79.131', 'Googlebot', 'Unknown Platform', 1, 1531449844, 0),
(48, '66.249.79.121', 'Googlebot', 'Android', 1, 1531482753, 0),
(49, '104.192.74.38', 'Chrome 58.0.3029.110', 'Mac OS X', 1, 1531537563, 0),
(50, '104.192.74.38', 'Unidentified User Agent', 'Unknown Platform', 1, 1531537564, 0),
(51, '104.192.74.38', 'Chrome 58.0.3029.110', 'Mac OS X', 1, 1531537565, 0),
(52, '104.192.74.38', 'Unidentified User Agent', 'Unknown Platform', 1, 1531537566, 0),
(53, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1531579001, 0),
(54, '66.249.79.131', 'Googlebot', 'Android', 1, 1531713774, 0),
(55, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1531726221, 0),
(56, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1531755295, 0),
(57, '69.167.184.156', 'Chrome 40.0.2214.85', 'Windows 7', 1, 1531781099, 0),
(58, '201.130.59.171', 'Internet Explorer 6.0', 'Windows XP', 1, 1531791728, 0),
(59, '111.125.221.7', 'Chrome 67.0.3396.99', 'Windows 7', 1, 1531811288, 0),
(60, '111.125.221.7', 'Chrome 67.0.3396.99', 'Windows 7', 1, 0, 1531811348),
(61, '111.125.221.7', 'Chrome 67.0.3396.99', 'Windows 7', 1, 1531811512, 0),
(62, '111.125.221.7', 'Chrome 67.0.3396.99', 'Windows 7', 1, 0, 1531811590),
(63, '103.199.129.240', 'Chrome 67.0.3396.99', 'Windows 7', 1, 1531921175, 0),
(64, '103.199.129.240', 'Chrome 67.0.3396.99', 'Windows 7', 1, 0, 1531921428),
(65, '103.199.129.240', 'Chrome 67.0.3396.99', 'Windows 7', 2, 0, 1531921542),
(66, '66.249.79.131', 'Googlebot', 'Unknown Platform', 1, 1531933674, 0),
(67, '66.249.79.135', 'Googlebot', 'Unknown Platform', 1, 1531933682, 0),
(68, '66.249.79.131', 'Googlebot', 'Unknown Platform', 1, 1531933687, 0),
(69, '64.246.165.210', 'Firefox 59.0', 'Mac OS X', 1, 1531936547, 0),
(70, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1531936551, 0),
(71, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1531982630, 0),
(72, '34.235.159.133', 'Chrome 67.0.3396.99', 'Mac OS X', 1, 1532092882, 0),
(73, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1532127735, 0),
(74, '66.249.79.135', 'Googlebot', 'Android', 1, 1532203642, 0),
(75, '66.249.79.125', 'Googlebot', 'Unknown Platform', 1, 1532211636, 0),
(76, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1532241747, 0),
(77, '64.85.24.24', 'Firefox 40.1', 'Windows 7', 1, 1532318411, 0),
(78, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1532324227, 0),
(79, '66.249.79.133', 'Googlebot', 'Unknown Platform', 1, 1532420597, 0),
(80, '50.63.160.72', 'Safari 537.13', 'Windows 7', 1, 1532430230, 0),
(81, '195.245.113.192', 'Firefox 42.0', 'Linux', 1, 1532439110, 0),
(82, '66.249.79.133', 'Googlebot', 'Unknown Platform', 1, 1532471068, 0),
(83, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1532500848, 0),
(84, '134.249.50.185', 'Chrome 63.0.3239.132', 'Windows 10', 1, 1532523749, 0),
(85, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1532529143, 0),
(86, '66.249.79.133', 'Googlebot', 'Android', 1, 1532688049, 0),
(87, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1532726975, 0),
(88, '66.249.79.123', 'Googlebot', 'Android', 1, 1532737918, 0),
(89, '66.249.79.131', 'Googlebot', 'Android', 1, 1532743268, 0),
(90, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1532760339, 0),
(91, '219.90.99.201', 'Chrome 64.0.3282.137', 'Android', 1, 1532840977, 0),
(92, '219.90.99.201', 'Firefox 62.0', 'Windows 7', 1, 1532843089, 0),
(93, '219.90.99.201', 'Firefox 62.0', 'Windows 7', 1, 1532843186, 0),
(94, '219.90.99.201', 'Firefox 62.0', 'Windows 7', 1, 0, 1532843807),
(95, '219.90.99.201', 'Firefox 62.0', 'Windows 7', 2, 0, 1532843867),
(96, '219.90.99.201', 'Firefox 62.0', 'Windows 7', 3, 0, 1532843870),
(97, '219.90.99.201', 'Firefox 62.0', 'Windows 7', 4, 0, 1532843981),
(98, '219.90.99.201', 'Firefox 62.0', 'Windows 7', 5, 0, 1532843984),
(99, '219.90.99.201', 'Firefox 62.0', 'Windows 7', 6, 0, 1532843987),
(100, '219.90.99.201', 'Chrome 64.0.3282.137', 'Android', 1, 0, 1532845274),
(101, '223.189.17.199', 'Chrome 64.0.3282.137', 'Android', 2, 0, 1532863799),
(102, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1532912110, 0),
(103, '219.90.99.201', 'Chrome 64.0.3282.137', 'Android', 3, 0, 1532917535),
(104, '36.77.17.227', 'Internet Explorer 6.0', 'Windows XP', 1, 1532917601, 0),
(105, '219.90.99.201', 'Chrome 64.0.3282.137', 'Linux', 4, 0, 1532917662),
(106, '219.90.99.201', 'Chrome 64.0.3282.137', 'Android', 5, 0, 1532917747),
(107, '219.90.99.201', 'Chrome 64.0.3282.137', 'Android', 6, 0, 1532917792),
(108, '66.249.79.133', 'Googlebot', 'Unknown Platform', 1, 1532946943, 0),
(109, '27.60.250.97', 'Chrome 64.0.3282.137', 'Android', 7, 0, 1532979687),
(110, '219.90.99.201', 'Chrome 64.0.3282.137', 'Android', 8, 0, 1533004297),
(111, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1533020020, 0),
(112, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1533101237, 0),
(113, '2401:4900:1720:62d:d13c:b50:842d:65f9', 'Chrome 67.0.3396.87', 'Android', 2, 0, 1533114277),
(114, '212.129.15.92', 'Safari 531.86', 'Windows Vista', 1, 1533115123, 0),
(115, '182.58.84.94', 'Chrome 67.0.3396.99', 'Windows 10', 4, 0, 1533135407),
(116, '182.58.84.94', 'Chrome 67.0.3396.99', 'Windows 10', 5, 0, 1533135448),
(117, '182.58.84.94', 'Chrome 67.0.3396.99', 'Windows 10', 6, 0, 1533135461),
(118, '182.58.84.94', 'Chrome 67.0.3396.99', 'Windows 10', 7, 0, 1533135539),
(119, '182.58.84.94', 'Chrome 67.0.3396.99', 'Windows 10', 8, 0, 1533135690),
(120, '182.58.84.94', 'Chrome 67.0.3396.99', 'Windows 10', 9, 0, 1533135767),
(121, '182.58.84.94', 'Chrome 67.0.3396.99', 'Windows 10', 10, 0, 1533135777),
(122, '182.58.84.94', 'Chrome 67.0.3396.99', 'Windows 10', 11, 0, 1533135974),
(123, '106.209.208.221', 'Chrome 67.0.3396.99', 'Windows 7', 1, 1533146207, 0),
(124, '128.199.124.86', 'Firefox 33.0', 'Windows 7', 1, 1533146215, 0),
(125, '106.209.208.221', 'Chrome 67.0.3396.99', 'Windows 7', 1, 1533146347, 0),
(126, '106.209.208.221', 'Chrome 67.0.3396.99', 'Windows 7', 1, 0, 1533146419),
(127, '106.209.208.221', 'Chrome 67.0.3396.99', 'Windows 7', 2, 0, 1533147945),
(128, '66.249.79.133', 'Googlebot', 'Android', 1, 1533171805, 0),
(129, '202.179.31.242', 'Internet Explorer 6.0', 'Windows XP', 1, 1533175256, 0),
(130, '185.106.213.196', 'Unidentified User Agent', 'Unknown Platform', 1, 1533211746, 0),
(131, '106.209.208.221', 'Chrome 64.0.3282.137', 'Android', 9, 0, 1533219670),
(132, '106.209.208.221', 'Chrome 64.0.3282.137', 'Android', 1, 1533219767, 0),
(133, '106.209.208.221', 'Chrome 64.0.3282.137', 'Android', 1, 0, 1533219823),
(134, '120.60.31.45', 'Chrome 67.0.3396.99', 'Windows 7', 1, 1533220981, 0),
(135, '185.106.213.196', 'Unidentified User Agent', 'Unknown Platform', 1, 1533225021, 0),
(136, '66.249.79.121', 'Googlebot', 'Android', 1, 1533277687, 0),
(137, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1533279066, 0),
(138, '43.252.195.222', 'Chrome 68.0.3440.84', 'Windows 10', 1, 1533283905, 0),
(139, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1533286998, 0),
(140, '66.249.79.131', 'Googlebot', 'Android', 1, 1533302501, 0),
(141, '120.60.24.5', 'Firefox 61.0', 'Windows 7', 1, 1533308252, 0),
(142, '120.60.24.5', 'Firefox 61.0', 'Windows 7', 1, 1533308499, 0),
(143, '185.106.213.196', 'Unidentified User Agent', 'Unknown Platform', 1, 1533310268, 0),
(144, '103.199.136.19', 'Chrome 66.0.3359.158', 'Android', 1, 1533310554, 0),
(145, '103.199.136.19', 'Chrome 66.0.3359.158', 'Android', 1, 1533310572, 0),
(146, '103.199.136.19', 'Chrome 66.0.3359.158', 'Android', 1, 0, 1533310581),
(147, '103.199.136.19', 'Chrome 66.0.3359.158', 'Android', 1, 0, 1533310582),
(148, '185.106.213.196', 'Unidentified User Agent', 'Unknown Platform', 1, 1533310958, 0),
(149, '66.249.79.123', 'Googlebot', 'Android', 1, 1533324979, 0),
(150, '66.249.79.133', 'Googlebot', 'Android', 1, 1533325593, 0),
(151, '66.249.79.135', 'Googlebot', 'Android', 1, 1533331236, 0),
(152, '66.249.79.123', 'Googlebot', 'Android', 1, 1533331726, 0),
(153, '83.110.213.68', 'Internet Explorer 6.0', 'Windows XP', 1, 1533391263, 0),
(154, '103.199.136.19', 'Chrome 66.0.3359.158', 'Android', 2, 0, 1533413473),
(155, '27.60.187.204', 'Chrome 38.0.1025.166', 'Android', 1, 1533445996, 0),
(156, '27.60.187.204', 'Chrome 38.0.1025.166', 'Android', 1, 1533445998, 0),
(157, '66.249.79.133', 'Googlebot', 'Unknown Platform', 1, 1533449821, 0),
(158, '66.249.79.131', 'Googlebot', 'Unknown Platform', 1, 1533449844, 0),
(159, '66.249.79.131', 'Googlebot', 'Unknown Platform', 1, 1533449993, 0),
(160, '192.99.190.96', 'Chrome 52.0.2743.116', 'Windows 10', 1, 1533459608, 0),
(161, '192.99.190.96', 'Chrome 52.0.2743.116', 'Windows 10', 1, 1533459611, 0),
(162, '111.125.221.7', 'Chrome 49.0.2623.75', 'Linux', 1, 1533467037, 0),
(163, '111.125.221.7', 'Chrome 41.0.2272.118', 'Linux', 1, 1533467038, 0),
(164, '64.246.165.160', 'Firefox 59.0', 'Mac OS X', 1, 1533491163, 0),
(165, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1533508223, 0),
(166, '41.99.23.205', 'Internet Explorer 6.0', 'Windows XP', 1, 1533510628, 0),
(167, '43.255.154.33', 'Unidentified User Agent', 'Unknown Platform', 1, 1533583710, 0),
(168, '69.162.68.206', 'Safari 536.30.1', 'Unknown Platform', 1, 1533583713, 0),
(169, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1533588031, 0),
(170, '103.70.97.27', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640330, 0),
(171, '72.221.196.153', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640389, 0),
(172, '103.10.60.214', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640395, 0),
(173, '178.121.3.249', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640396, 0),
(174, '117.2.238.196', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640457, 0),
(175, '103.211.152.190', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640519, 0),
(176, '103.220.205.70', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640577, 0),
(177, '186.193.23.67', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640637, 0),
(178, '43.225.165.132', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640698, 0),
(179, '103.210.28.154', 'Internet Explorer 6.0', 'Windows XP', 1, 1533640757, 0),
(180, '66.249.79.123', 'Googlebot', 'Android', 1, 1533656778, 0),
(181, '66.249.79.133', 'Googlebot', 'Android', 1, 1533668359, 0),
(182, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1533698275, 0),
(183, '14.174.106.94', 'Internet Explorer 6.0', 'Windows XP', 1, 1533700486, 0),
(184, '27.72.56.142', 'Internet Explorer 6.0', 'Windows XP', 1, 1533700545, 0),
(185, '180.249.155.187', 'Internet Explorer 6.0', 'Windows XP', 1, 1533700605, 0),
(186, '110.138.165.162', 'Internet Explorer 6.0', 'Windows XP', 1, 1533700665, 0),
(187, '66.249.79.13', 'Googlebot', 'Android', 1, 1533820474, 0),
(188, '66.249.79.11', 'Googlebot', 'Android', 1, 1533824387, 0),
(189, '45.64.192.38', 'Chrome 67.0.3396.99', 'Windows 10', 2, 0, 1533828228),
(190, '2401:4900:1987:3796:6680:7844:97e9:94fd', 'Chrome 67.0.3396.87', 'Android', 3, 0, 1533828601),
(191, '2401:4900:1987:3796:6680:7844:97e9:94fd', 'Chrome 67.0.3396.87', 'Android', 4, 0, 1533829028),
(192, '2401:4900:1987:3796:6680:7844:97e9:94fd', 'Chrome 67.0.3396.87', 'Android', 5, 0, 1533829051),
(193, '2401:4900:1987:3796:6680:7844:97e9:94fd', 'Chrome 67.0.3396.87', 'Android', 6, 0, 1533829056),
(194, '66.249.79.11', 'Googlebot', 'Android', 1, 1533830307, 0),
(195, '203.192.215.110', 'Chrome 68.0.3440.91', 'Android', 1, 1533832393, 0),
(196, '203.192.215.110', 'Chrome 68.0.3440.91', 'Android', 1, 1533832426, 0),
(197, '106.209.163.217', 'Chrome 68.0.3440.106', 'Windows 7', 1, 0, 1533832737),
(198, '106.209.163.217', 'Chrome 68.0.3440.106', 'Windows 7', 2, 0, 1533832836),
(199, '106.209.163.217', 'Chrome 68.0.3440.106', 'Windows 7', 3, 0, 1533832898),
(200, '106.209.163.217', 'Chrome 68.0.3440.106', 'Windows 7', 4, 0, 1533833779),
(201, '66.249.79.121', 'Googlebot', 'Unknown Platform', 1, 1533848051, 0),
(202, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1533851151, 0),
(203, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1533875697, 0),
(204, '45.64.193.34', 'Chrome 68.0.3440.106', 'Windows 10', 1, 0, 1533891987),
(205, '45.64.193.34', 'Chrome 68.0.3440.106', 'Windows 10', 1, 1533893601, 0),
(206, '171.51.217.1', 'Chrome 64.0.3282.137', 'Android', 10, 0, 1533908659),
(207, '66.249.79.13', 'Googlebot', 'Unknown Platform', 1, 1533934456, 0),
(208, '66.249.79.11', 'Googlebot', 'Unknown Platform', 1, 1533934483, 0),
(209, '66.249.79.13', 'Googlebot', 'Unknown Platform', 1, 1533934522, 0),
(210, '66.249.79.121', 'Googlebot', 'Android', 1, 1533952470, 0),
(211, '66.249.79.13', 'Googlebot', 'Android', 1, 1533977050, 0),
(212, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1534055269, 0),
(213, '103.207.57.4', 'Firefox 37.0', 'Windows XP', 1, 1534061825, 0),
(214, '128.199.124.86', 'Firefox 33.0', 'Windows 7', 1, 1534061835, 0),
(215, '91.237.182.229', 'Internet Explorer 6.0', 'Windows XP', 1, 1534067219, 0),
(216, '103.207.57.4', 'Firefox 37.0', 'Windows XP', 1, 1534069304, 0),
(217, '103.207.57.4', 'Firefox 37.0', 'Windows XP', 1, 0, 1534069421),
(218, '103.207.57.4', 'Firefox 37.0', 'Windows XP', 2, 0, 1534070079),
(219, '2401:4900:1727:c79d:4211:7dfd:633:70bf', 'Chrome 68.0.3440.91', 'Android', 7, 0, 1534089020),
(220, '2401:4900:1727:c79d:4211:7dfd:633:70bf', 'Chrome 68.0.3440.91', 'Android', 8, 0, 1534089104),
(221, '2401:4900:1727:c79d:4211:7dfd:633:70bf', 'Chrome 68.0.3440.91', 'Android', 9, 0, 1534089110),
(222, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1534114054, 0),
(223, '66.249.79.15', 'Googlebot', 'Android', 1, 1534152312, 0),
(224, '45.64.193.34', 'Chrome 68.0.3440.106', 'Windows 10', 2, 0, 1534161205),
(225, '35.162.70.167', 'Chrome 66.0.3359.181', 'Windows 10', 1, 1534230018, 0),
(226, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1534241841, 0),
(227, '52.34.24.33', 'Chrome 66.0.3359.181', 'Windows 10', 1, 1534309339, 0),
(228, '66.249.79.11', 'Googlebot', 'Android', 1, 1534327142, 0),
(229, '66.249.79.125', 'Googlebot', 'Unknown Platform', 1, 1534330658, 0),
(230, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1534376170, 0),
(231, '35.162.70.167', 'Chrome 66.0.3359.181', 'Windows 10', 1, 1534397978, 0),
(232, '52.11.99.15', 'Unidentified User Agent', 'Unknown Platform', 1, 1534398024, 0),
(233, '52.11.99.15', 'Unidentified User Agent', 'Unknown Platform', 1, 1534398259, 0),
(234, '66.249.79.13', 'Googlebot', 'Unknown Platform', 1, 1534421769, 0),
(235, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1534432184, 0),
(236, '66.249.79.121', 'Googlebot', 'Android', 1, 1534450575, 0),
(237, '66.249.79.15', 'Googlebot', 'Android', 1, 1534475646, 0),
(238, '195.154.185.43', 'Firefox 57.0', 'Windows 8.1', 1, 1534481821, 0),
(239, '195.154.185.43', 'Firefox 57.0', 'Windows 8.1', 1, 0, 1534481841),
(240, '195.154.185.43', 'Firefox 57.0', 'Windows 8.1', 2, 0, 1534481849),
(241, '52.34.24.33', 'Chrome 66.0.3359.181', 'Windows 10', 1, 1534482757, 0),
(242, '66.249.79.139', 'Googlebot', 'Android', 1, 1534503284, 0),
(243, '66.249.79.111', 'Googlebot', 'Android', 1, 1534525974, 0),
(244, '52.34.24.33', 'Chrome 66.0.3359.181', 'Windows 10', 1, 1534566486, 0),
(245, '66.249.79.109', 'Googlebot', 'Android', 1, 1534635322, 0),
(246, '52.53.201.78', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1534637351, 0),
(247, '13.57.233.99', 'Chrome 61.0.3163.100', 'Mac OS X', 1, 1534649001, 0),
(248, '42.106.218.0', 'Chrome 68.0.3440.106', 'Windows 10', 1, 1534664599, 0),
(249, '42.106.223.80', 'Chrome 67.0.3396.99', 'Windows 10', 1, 1534666059, 0),
(250, '42.106.220.37', 'Chrome 67.0.3396.99', 'Windows 10', 1, 1534666796, 0),
(251, '42.106.251.216', 'Chrome 49.0.2623.75', 'Linux', 1, 1534666998, 0),
(252, '182.58.112.136', 'Chrome 68.0.3440.106', 'Windows 10', 1, 1534667868, 0),
(253, '182.58.112.136', 'Chrome 68.0.3440.106', 'Windows 10', 1, 0, 1534668019),
(254, '182.58.112.136', 'Chrome 68.0.3440.106', 'Windows 10', 2, 0, 1534668068),
(255, '127.0.0.1', 'Chrome 68.0.3440.106', 'Windows 10', 1, 0, 1534675122),
(256, '127.0.0.1', 'Chrome 68.0.3440.106', 'Windows 10', 2, 0, 1534675128),
(257, '127.0.0.1', 'Chrome 68.0.3440.106', 'Windows 10', 3, 0, 1534675176),
(258, '::1', 'Chrome 68.0.3440.106', 'Windows 10', 1, 1534699207, 0),
(259, '127.0.0.1', 'Chrome 68.0.3440.106', 'Windows 10', 4, 0, 1534699209);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ait_admin`
--
ALTER TABLE `ait_admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `ait_admin_access_logs`
--
ALTER TABLE `ait_admin_access_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ait_board`
--
ALTER TABLE `ait_board`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `ait_branch`
--
ALTER TABLE `ait_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `ait_chapters`
--
ALTER TABLE `ait_chapters`
  ADD PRIMARY KEY (`chap_id`),
  ADD KEY `sid` (`sub_id`),
  ADD KEY `admin_id` (`modified_by_admin_uid`);

--
-- Indexes for table `ait_lecture_schedule`
--
ALTER TABLE `ait_lecture_schedule`
  ADD PRIMARY KEY (`lecture_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `ait_sessions_log`
--
ALTER TABLE `ait_sessions_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `ait_standards`
--
ALTER TABLE `ait_standards`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `ait_standard_fields`
--
ALTER TABLE `ait_standard_fields`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `ait_students`
--
ALTER TABLE `ait_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `ait_students_result`
--
ALTER TABLE `ait_students_result`
  ADD PRIMARY KEY (`student_result_id`);

--
-- Indexes for table `ait_subjects`
--
ALTER TABLE `ait_subjects`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `std_id` (`std_field_id`),
  ADD KEY `admin_id` (`modified_by_admin_uid`);

--
-- Indexes for table `ait_teachers`
--
ALTER TABLE `ait_teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `ait_test_schedule`
--
ALTER TABLE `ait_test_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_by_admin_uid` (`modified_by_admin_uid`);

--
-- Indexes for table `ait_visitors`
--
ALTER TABLE `ait_visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ait_admin`
--
ALTER TABLE `ait_admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ait_admin_access_logs`
--
ALTER TABLE `ait_admin_access_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `ait_board`
--
ALTER TABLE `ait_board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ait_branch`
--
ALTER TABLE `ait_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ait_chapters`
--
ALTER TABLE `ait_chapters`
  MODIFY `chap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ait_lecture_schedule`
--
ALTER TABLE `ait_lecture_schedule`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ait_standards`
--
ALTER TABLE `ait_standards`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ait_standard_fields`
--
ALTER TABLE `ait_standard_fields`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ait_students`
--
ALTER TABLE `ait_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ait_students_result`
--
ALTER TABLE `ait_students_result`
  MODIFY `student_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ait_subjects`
--
ALTER TABLE `ait_subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ait_teachers`
--
ALTER TABLE `ait_teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ait_test_schedule`
--
ALTER TABLE `ait_test_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ait_visitors`
--
ALTER TABLE `ait_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ait_lecture_schedule`
--
ALTER TABLE `ait_lecture_schedule`
  ADD CONSTRAINT `ait_lecture_schedule_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `ait_teachers` (`teacher_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
