<?php
include "DB_functions.php";

// Database connection details
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "courses";

// Create connection
$dbc = connectServer($host, $username, $password, 'server connected!');

// Check connection
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}

// Create the 'courses' database
createDB($dbc, $database);

// Select the database
$dbc->select_db($database);

// SQL dump content
$sqlDump = " -- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 06:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `courses`

-- --------------------------------------------------------

-- Table structure for table `admins`

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `admins`

INSERT INTO `admins` (`id`, `admin_name`, `pass`) VALUES
(1, 'yassine', 500),
(2, 'admin2', 123),
(3, 'admin3', 456),
(4, 'admin4', 789),
(5, 'admin5', 987),
(6, 'admin6', 654),
(7, 'admin7', 321),
(8, 'admin8', 111),
(9, 'admin9', 222),
(10, 'admin10', 333),
(11, 'admin11', 444);

-- --------------------------------------------------------

-- Table structure for table `courses`

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` text NOT NULL,
  `course_name` text NOT NULL,
  `course_credit` int(11) NOT NULL,
  `optional` tinyint(1) NOT NULL,
  `semester` int(11) NOT NULL,
  `departement` text NOT NULL,
  `maxStudent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `courses`

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `course_credit`, `optional`, `semester`, `departement`, `maxStudent`) VALUES
(1, 'I1100', 'info', 4, 0, 1, 'CS', 0),
(2, 'M1101', 'analyse 1', 4, 0, 0, '', 0),
(3, 'M1103', 'math', 3, 1, 0, '', 0),
(4, 'C2000', 'computer science', 3, 0, 2, 'CS', 50),
(5, 'M1105', 'math', 3, 1, 0, '', 0),
(6, 'm500', 'djdd', 1, 0, 1, 'CS', 2),
(7, 'm501', 'djdd', 1, 0, 1, 'CS', 2),
(8, 'm505', 'chimie', 1, 0, 1, 'CS', 6),
(9, 'm507', 'chimie', 1, 0, 1, 'CS', 6),
(10, 'm509', 'chimie', 1, 0, 1, 'CS', 6),
(11, 'm510', 'chimie', 1, 0, 1, 'CS', 6),
(12, 'm511', 'chimie', 1, 0, 1, 'CS', 6),
(13, 'm512', 'chimie', 1, 0, 1, 'CS', 6),
(14, 'm515', 'ueife', 0, 0, 1, 'CS', 0),
(15, 'E1001', 'english', 3, 0, 1, 'English', 30),
(16, 'H1101', 'history', 3, 0, 1, 'History', 40),
(17, 'P3000', 'physics', 4, 0, 3, 'Physics', 60),
(18, 'C3001', 'data structures', 3, 0, 2, 'CS', 40),
(19, 'M2001', 'linear algebra', 3, 0, 2, 'Math', 35),
(20, 'E2002', 'composition', 3, 0, 2, 'English', 25),
(21, 'C1001', 'intro to programming', 3, 0, 1, 'CS', 55),
(22, 'M3002', 'probability', 4, 0, 3, 'Math', 30),
(23, 'E3003', 'literature', 3, 0, 3, 'English', 20);

-- --------------------------------------------------------

-- Table structure for table `opt_courses`

CREATE TABLE `opt_courses` (
  `course_id` int(11) NOT NULL,
  `grp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `opt_courses`

INSERT INTO `opt_courses` (`course_id`, `grp`) VALUES
(3, 1),
(4, 1),
(5, 1),
(15, 2),
(17, 1),
(18, 2),
(19, 1),
(20, 2),
(21, 1),
(22, 2),
(23, 1),
(24, 2);

-- --------------------------------------------------------

-- Table structure for table `professors`

CREATE TABLE `professors` (
  `prof_id` int(11) NOT NULL,
  `prof_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `professors`

INSERT INTO `professors` (`prof_id`, `prof_name`) VALUES
(0, 'rgrgr'),
(1, 'feefe'),
(2, 'john doe'),
(3, 'mary smith'),
(4, 'jane roe'),
(5, 'peter parker'),
(6, 'susan johnson'),
(7, 'michael brown'),
(8, 'lisa smith'),
(9, 'david miller'),
(10, 'emily white'),
(11, 'steven anderson');

-- --------------------------------------------------------

-- Table structure for table `professor_courses`

CREATE TABLE `professor_courses` (
  `prof_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `professor_courses`

INSERT INTO `professor_courses` (`prof_id`, `course_id`) VALUES
(0, 0),
(2, 4),
(9, 12),
(9, 13),
(10, 14),
(3, 15),
(4, 17),
(5, 18),
(6, 19),
(7, 20),
(8, 21),
(9, 22),
(10, 23),
(11, 24);

-- --------------------------------------------------------

-- Table structure for table `students`

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `pass` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `major` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `students`

INSERT INTO `students` (`student_id`, `student_name`, `pass`, `year`, `major`) VALUES
(1, 'YASSINE ALSMAYLI', 500, 0, 0),
(3, 'Bob Smith', 456, 2, 2),
(4, 'Alice Johnson', 789, 1, 1),
(5, 'Charlie Brown', 111, 3, 3),
(6, 'Eva White', 222, 2, 2),
(7, 'David Miller', 333, 1, 1),
(8, 'Grace Anderson', 444, 3, 3),
(9, 'Frank Robinson', 555, 2, 2),
(10, 'Olivia Davis', 666, 1, 1),
(11, 'Henry Smith', 777, 3, 3);

-- --------------------------------------------------------

-- Table structure for table `student_courses`

CREATE TABLE `student_courses` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `student_courses`

INSERT INTO `student_courses` (`student_id`, `course_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5);

-- --------------------------------------------------------

-- Table structure for table `student_info`

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `father_name` text NOT NULL,
  `mother_name` text NOT NULL,
  `last_name` text NOT NULL,
  `birthday_date` date NOT NULL,
  `place_of_birth` text NOT NULL,
  `nationality` text NOT NULL,
  `gender` text NOT NULL,
  `phone_number` int(11) NOT NULL,
  `second_phone_number` int(11) NOT NULL,
  `place_of_occupation` text NOT NULL,
  `place_of_registration` text NOT NULL,
  `governorate` text NOT NULL,
  `judiciary` text NOT NULL,
  `id_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `student_info`

INSERT INTO `student_info` (`id`, `first_name`, `father_name`, `mother_name`, `last_name`, `birthday_date`, `place_of_birth`, `nationality`, `gender`, `phone_number`, `second_phone_number`, `place_of_occupation`, `place_of_registration`, `governorate`, `judiciary`, `id_number`) VALUES
(1, 'YASSINE', 'FATHER_NAME', 'MOTHER_NAME', 'ALSMAYLI', '0000-00-00', 'PLACE_OF_BIRTH', 'NATIONALITY', 'GENDER', 0, 0, 'PLACE_OF_OCCUPATION', 'PLACE_OF_REGISTRATION', 'GOVERNORATE', 'JUDICIARY', 'ID_NUMBER'),
(2, 'Jane', 'John', 'Mary', 'Doe', '2000-05-15', 'Cityville', 'US', 'Female', 123456789, 987654321, 'Student', 'Cityville', 'Stateville', 'District 1', 'AB123456'),
(3, 'Bob', 'Robert', 'Susan', 'Smith', '1999-10-20', 'Townsville', 'US', 'Male', 987654321, 123456789, 'Student', 'Townsville', 'Stateville', 'District 2', 'CD789012'),
(5, 'Charlie', 'David', 'Grace', 'Brown', '1998-08-12', 'Hometown', 'US', 'Male', 666666666, 777777777, 'Student', 'Hometown', 'Stateville', 'District 4', 'GH456321');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `name` (`course_code`) USING HASH,
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `opt_courses`
--
ALTER TABLE `opt_courses`
  ADD UNIQUE KEY `id` (`course_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`prof_id`);

--
-- Indexes for table `professor_courses`
--
ALTER TABLE `professor_courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD CONSTRAINT `student_courses_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `student_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";

// Use a regular expression to split SQL dump into queries
$queries = preg_split("/;\s*(\n|$)/", $sqlDump);

// Execute each query
foreach ($queries as $query) {
    if (trim($query) != "") {
        mysqli_query($dbc, $query) or die('<p style="color: red;">' .
            "Error executing query:<br>" . mysqli_error($dbc) .
            ".<br>Query: " . $query . "</p>");
    }
}

echo "<p>Tables created successfully!</p>";

// Close connection
$dbc->close();
?>
