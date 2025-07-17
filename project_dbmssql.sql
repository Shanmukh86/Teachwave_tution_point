-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 01:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('project_team123', 'dbmsproject'),
('shanmukh', '123'),
('vishal', '234');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_id` int(11) NOT NULL,
  `Course_Name` varchar(30) NOT NULL,
  `Course_Cost` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_id`, `Course_Name`, `Course_Cost`) VALUES
(1001, 'C_Language', 1000),
(1002, 'DBMS', 1500),
(1003, 'DSA in C', 0),
(1004, 'Data Science', 1290);

-- --------------------------------------------------------

--
-- Table structure for table `registeredstudents`
--

CREATE TABLE `registeredstudents` (
  `student_username` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registeredstudents`
--

INSERT INTO `registeredstudents` (`student_username`, `course_id`, `course_name`) VALUES
('adityanagasai1', 1001, 'C_Language'),
('adityanagasai1', 1002, 'DBMS'),
('ajay143', 1003, 'DSA in C');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Name` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Name`, `Contact`, `Email`, `Username`, `Password`) VALUES
('Aditya Naga Sai Laxman ', '9949334312', 'adityanagasailaxman@gmail.com', 'adityanagasai1', 'laxman'),
('ajayanna', '8688101195', 'ajay@gmail.com', 'ajay143', 'ajaybhai'),
('Laxman', '8639437779', 'laxman@gmail.com', 'imaditya143', 'aditya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_id`),
  ADD UNIQUE KEY `constraint_name` (`Course_Name`);

--
-- Indexes for table `registeredstudents`
--
ALTER TABLE `registeredstudents`
  ADD PRIMARY KEY (`student_username`,`course_id`),
  ADD KEY `course_name` (`course_name`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registeredstudents`
--
ALTER TABLE `registeredstudents`
  ADD CONSTRAINT `registeredstudents_ibfk_1` FOREIGN KEY (`student_username`) REFERENCES `students` (`Username`),
  ADD CONSTRAINT `registeredstudents_ibfk_2` FOREIGN KEY (`course_name`) REFERENCES `courses` (`Course_Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registeredstudents_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`Course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
