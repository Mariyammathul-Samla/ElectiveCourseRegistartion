-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 06:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electivecourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(30) DEFAULT NULL,
  `seat` int(100) DEFAULT NULL,
  `sem` int(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `code`, `seat`, `sem`, `description`, `department`) VALUES
(3, 'Remote Sensing and GIS', '18CV656', 68, 6, 'Delve into geospatial data analysis and mapping techniques in the Remote Sensing and GIS course (18CV651).', 'CV'),
(5, 'Basic VLSI Design', '18EC655', 1, 6, 'Discover the essentials of VLSI chip design in the course Basic VLSI Design (18EC655)', 'EC'),
(6, 'Renewable Energy Sources', '18EE653', 50, 6, 'Dive into the world of sustainable energy technologies in the course Renewable Energy Sources (18EE653)', 'EE'),
(7, 'PLC and SCADAss', '18EE652', 50, 6, 'Explore industrial automation through PLC and SCADA systems in the course 18EE652.\"', 'EE'),
(8, 'Introduction to Operating Systems ', '18CS656', 50, 6, 'Get acquainted with fundamental concepts of operating systems in the course Introduction to Operating Systems (18CS656).', 'CS'),
(9, 'Remote Sensing and GIS', '18CV651', 50, 6, 'Delve into geospatial data analysis and mapping techniques in the Remote Sensing and GIS course (18CV651).', 'CV'),
(10, 'Non-Conventional Energy Sources', '18ME651', 1, 6, 'comprehensive study of alternative and renewable energy technologieswith a focus on their practical applications and environmental impact.', 'ME'),
(13, 'Science', '18CS656', 78, 8, 'bgk', ' EE');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `name` varchar(20) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `course` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`name`, `usn`, `department`, `semester`, `email`, `phone`, `course`) VALUES
('Shamla', '4su20cs034', 'ME', 6, 'hiba@gmail.com', '7411271579', '18EE652'),
('s', '4su20cs056', 'EE', 8, 'k@gmail.com', '7687657854', '18CV656'),
('Rohan', '4su20cs078', 'CS', 7, 'Rohan@gmail.com', '8787878787', '18ME651'),
('shamla', '4SU20cs098', 'CS', 8, 'hiba@gmail.com', '9898765432', '18CV656');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `name` varchar(38) DEFAULT NULL,
  `description` varchar(38) DEFAULT NULL,
  `course` varchar(100) NOT NULL,
  `image` varchar(38) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `description`, `course`, `image`) VALUES
(12, 'Riya R', 'Enthusiastic lecturer and mentor', 'PLC and SCADA (18EE652)', 'profile/teacher3.jpeg'),
(13, 'Shamla', 'Good teacher', 'Renewable Energy Sources (18EE653)', 'profile/teacher1.jpg'),
(14, 'Rohan Khanna', 'Good teacher and good coder', 'PLC and SCADA (18EE652)', 'profile/teacher2.jpg'),
(15, 'Shaila', 'Good teacher', 'Renewable Energy Sources (18EE653)', 'profile/teacher2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`) VALUES
(1, 'admin', '902989546', 'admin@gmail.com', 'admin', '1234'),
(2, '4SU20CS047', '902999599', 'student1@gmail.com', 'student', '15041741e6b2834ae6700a4610a4f7fe'),
(9, '4SU20CS083', '6789897654', 'hiba@gmail.com', 'student', 'c1db1c83222f50bb1bc6c147b72dce49'),
(12, '4SU20CS079', '6089897654', 'Rohan@gmail.com', 'student', '1f32aa4c9a1d2ea010adcf2348166a04'),
(16, '4SU20CS089', '7411271579', 'Rohan@gmail.com', 'student', '81dc9bdb52d04dc20036dbd8313ed055'),
(17, '4SU20CS021', '8787878787', 'Rohan@gmail.com', 'student', '7aa4d9bdac8dde3cae4395a9da62a82e'),
(18, '4SU20CS008', '7411271579', 'er@sdmit.in', 'student', '7aa4d9bdac8dde3cae4395a9da62a82e'),
(19, '4SU20CS003', '7411271579', 'mariyammathul.samla@gmail.com', 'student', '2f2ba00c5f81822f5ed9a917b072b79b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
