-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2026 at 09:53 AM
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
(38, 11);

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
(1, 'Abdulrahman', 'Kamel', 'abdlrahman.ahmed24922@gmail.com', 'lalagado', 'Artificial Intelligence'),
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
(38, 'Abdulrahman', 'Mahmoud', 'A.Kamel64780@student.aast.edu', '$2y$10$I19.ci3BIhdb/AvLLeAOKuk3lv1bMY8kfyZ5OirIYivWVDXdO9Y9.', 'Computer Science');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_schedules`
--
ALTER TABLE `student_schedules`
  ADD CONSTRAINT `fk_subject_link` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
