-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 03:58 PM
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
-- Database: `warnify`
--

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progress_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`progress_id`, `user_id`, `topic_id`, `completed`, `completed_at`) VALUES
(16, 44, 1, 0, NULL),
(17, 44, 2, 0, NULL),
(18, 44, 3, 0, NULL),
(19, 44, 4, 0, NULL),
(20, 44, 5, 0, NULL),
(21, 44, 6, 0, NULL),
(22, 44, 7, 0, NULL),
(23, 44, 8, 0, NULL),
(24, 44, 9, 0, NULL),
(25, 44, 10, 0, NULL),
(26, 44, 11, 0, NULL),
(27, 45, 1, 1, '2026-05-07 11:59:10'),
(28, 45, 2, 1, '2026-05-07 11:59:10'),
(29, 45, 3, 0, NULL),
(30, 45, 4, 0, NULL),
(31, 45, 5, 0, NULL),
(32, 45, 6, 0, NULL),
(33, 45, 7, 0, NULL),
(34, 45, 8, 0, NULL),
(35, 45, 9, 1, '2026-05-07 11:59:10'),
(36, 45, 10, 1, '2026-05-07 11:59:10'),
(37, 45, 11, 0, NULL),
(42, 46, 1, 1, '2026-05-07 16:01:55'),
(43, 46, 2, 1, '2026-05-07 16:01:55'),
(44, 46, 3, 0, NULL),
(45, 46, 4, 0, NULL),
(46, 46, 5, 0, NULL),
(47, 46, 6, 0, NULL),
(48, 46, 7, 0, NULL),
(49, 46, 8, 0, NULL),
(50, 46, 9, 0, NULL),
(51, 46, 10, 0, NULL),
(52, 46, 11, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_schedules`
--

CREATE TABLE `student_schedules` (
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_schedules`
--

INSERT INTO `student_schedules` (`student_id`, `subject_id`) VALUES
(25, 2),
(25, 3),
(25, 6),
(25, 7),
(25, 9),
(25, 12),
(27, 1),
(27, 4),
(27, 5),
(27, 8),
(29, 1),
(29, 4),
(29, 6),
(29, 7),
(29, 10),
(29, 11),
(30, 1),
(30, 3),
(30, 6),
(30, 7),
(30, 9),
(30, 12),
(38, 2),
(38, 3),
(38, 5),
(38, 8),
(38, 10),
(38, 11),
(39, 1),
(39, 4),
(39, 5),
(39, 8),
(39, 9),
(39, 12),
(43, 2),
(43, 3),
(43, 6),
(43, 7),
(43, 10),
(43, 11),
(44, 1),
(44, 4),
(44, 5),
(44, 8),
(44, 10),
(44, 12),
(45, 1),
(45, 4),
(45, 5),
(45, 7),
(45, 10),
(45, 11),
(46, 2),
(46, 3),
(46, 6),
(46, 7),
(46, 10),
(46, 12);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(256) NOT NULL,
  `class_day` varchar(20) NOT NULL,
  `start_time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `class_day`, `start_time`) VALUES
(1, 'Web Programming', 'Monday', '8:30'),
(2, 'Web Programming', 'Monday', '10:30'),
(3, 'DSA', 'Monday', '1:30'),
(4, 'DSA', 'Monday', '3:30'),
(5, 'Cybersecurity', 'Tuesday', '8:30'),
(6, 'Cybersecurity', 'Tuesday', '10:30'),
(7, 'Software Engineering', 'Tuesday ', '1:30'),
(8, 'Software Engineering', 'Tuesday', '3:30'),
(9, 'Advanced Programming.', 'Wednesday', '9:00'),
(10, 'Advanced Programming.', 'Wednesday', '11:00'),
(11, 'Computer Architecture ', 'Wednesday', '2:00'),
(12, 'Computer Architecture', 'Wednesday', '4:00');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `subjectProg_ID` int(11) NOT NULL,
  `topic_name` varchar(256) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `subjectProg_ID`, `topic_name`, `display_order`) VALUES
(1, 1, 'HTML Introduction to Web Programming', 1),
(2, 1, 'HTML Part 1', 2),
(3, 1, 'HTML Part 2 and CSS', 3),
(4, 1, 'CSS Part 1', 4),
(5, 1, 'CSS Part 2', 5),
(6, 1, 'PHP Part 1', 6),
(7, 1, 'PHP Part 2', 7),
(8, 1, 'PHP Part 3', 8),
(9, 1, 'PHP Part 4', 9),
(10, 1, 'JS Part 1', 10),
(11, 1, 'JS Part 2', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `fName` varchar(256) NOT NULL,
  `lName` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `major` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `fName`, `lName`, `email`, `password`, `major`) VALUES
(3, 'Marino', 'Remon', 'marinoremon@yahoo.com', 'marinnooo', 'Cybersecurity'),
(4, 'Mohamed', 'Filipino', 'm.mahmoudg23@gmail.com', 'filipin2123', 'Artificial Intelligence'),
(6, 'wdwd', 'wada', 'asdasd@as', 'asdasd', 'Computer Science'),
(10, '', '', '', '', ''),
(11, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', '', 'Software Engineering'),
(12, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', '', 'Computer Science'),
(13, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', '', 'Software Engineering'),
(17, 'seif', 'bakry', 'seafood@jackson', 'IhaveAthingforcurlyheads', 'Software Engineering'),
(18, 'tibo', 'libo', 'tibolibo@dibo', 'plsworkbruh', 'Information System'),
(19, 'WORK', 'NOW', 'work@gmail.com', 'wallahiifitdoesntwork', 'Software Engineering'),
(20, 'can', 'you', 'work@gmaisads', 'plspwork', 'Software Engineering'),
(21, 'can', 'bakry', 'seafood@jackson', 'asdasdasd', 'Cybersecurity'),
(22, 'asdasd', 'asdasd', 'asdasdasd@asd', 'asdasdasd', 'Computer Science'),
(23, 'can', 'libo', '', 'asdasd', 'Cybersecurity'),
(24, 'can', 'bakry', 'seafood@jackson', 'sfsdfsdfsdf', 'Computer Science'),
(25, 'can', 'libo', 'seafood@jackson', 'sdasdasdasd', 'Software Engineering'),
(26, 'duawygd', 'sauyfdu', '', 'edtaiesd3eydfyk', 'Computer Science'),
(27, 'duawygd', 'sauyfdu', 'wyugwuw@shd', 'edtaiesd3eydfyk', 'Computer Science'),
(28, '', '', '', '', ''),
(29, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', 'asdjaDASDawd', 'Software Engineering'),
(30, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', 'adADASD', 'Cybersecurity'),
(31, '', '', '', '', ''),
(32, '', '', '', '', ''),
(33, '', '', '', '', ''),
(34, '', '', '', '', ''),
(35, '', '', '', '', 'Choose...'),
(36, '', '', '', '', 'Choose...'),
(37, '', '', '', '', 'Choose...'),
(38, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', '$2y$10$I19.ci3BIhdb/AvLLeAOKuk3lv1bMY8kfyZ5OirIYivWVDXdO9Y9.', 'Computer Science'),
(39, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', '$2y$10$AqL9qMy2eeDaETVQe3d39.XNJYpQympstKovwHKFLPK6Y0h6Gycl6', 'Cybersecurity'),
(40, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', '$2y$10$mHR6e1TTp3zw5n/D/wm4Mu9XZl6eW0Hz8LzoYM0yw78zj5DVhwzWu', 'Software Engineering'),
(41, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', '$2y$10$uMo4nZyFIxgQrLS4IrcGrOOiqg.m6gW9hxBcL.LVROFAphjOmcM.i', 'Cybersecurity'),
(44, 'Abdulrahman', 'Ahmed', 'abdlrahman.ahmed24922@gmail.com', '$2y$10$yTpxt/QxEVtN5Zb57EockO0x98W2zixT1Bvy2m3GdgagFbuJEnHme', 'Cybersecurity'),
(45, 'Abdulrahman', 'Ahmed', 'abdlrahman.ahmed24922@gmail.com', '$2y$10$VD8/AJYqRbiklUDtuyVUY.I5JiHhcXX5fQy5WEUMQPFs18kJjQI6u', 'Cybersecurity'),
(46, 'Abdulrahman', 'Ahmed', 'abdlrahman.ahmed24922@gmail.com', '$2y$10$EQKkxDdhXN.ujbmdkFXbiOXukYYxSKor3Xw5C8uGsdDzadcEO.5NO', 'Artificial Intelligence');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`),
  ADD UNIQUE KEY `unique_student_topic` (`user_id`,`topic_id`),
  ADD KEY `fk_topic` (`topic_id`);

--
-- Indexes for table `student_schedules`
--
ALTER TABLE `student_schedules`
  ADD PRIMARY KEY (`student_id`,`subject_id`),
  ADD KEY `fk_subject_link` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `fk_subjectProg` (`subjectProg_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `fk_progress_student` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_progress_topic` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_schedules`
--
ALTER TABLE `student_schedules`
  ADD CONSTRAINT `fk_subject_link` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `fk_topics_subjectProg` FOREIGN KEY (`subjectProg_ID`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
