-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 06:58 PM
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
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(1) NOT NULL,
  `about_me` varchar(999) NOT NULL,
  `college` varchar(999) NOT NULL,
  `senior_high` varchar(999) NOT NULL,
  `highschool` varchar(999) NOT NULL,
  `gradeschool` varchar(999) NOT NULL,
  `collegeYr` varchar(20) NOT NULL,
  `shsYr` varchar(20) NOT NULL,
  `hsYr` varchar(20) NOT NULL,
  `gradeYr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_me`, `college`, `senior_high`, `highschool`, `gradeschool`, `collegeYr`, `shsYr`, `hsYr`, `gradeYr`) VALUES
(1, ' Hello, I\'m Criston Jade B. Enolpe. A Full-stack developer, and graphic designer.                         I specialize in crafting engaging user experiences, developing reliable web application,                         and producing eye-catching designs.', 'Western Mindanao State University', 'STI Colleges Zamboanga', 'Manicahan National Highschool', 'Canelar Elementary School <br> Manicahan Poblacion Elementary School', '2020-2022', '2018-2020', '2011-2017', '2005-2009');

-- --------------------------------------------------------

--
-- Table structure for table `adminprtfl`
--

CREATE TABLE `adminprtfl` (
  `id` int(10) NOT NULL,
  `adminName` varchar(30) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `passWord` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminprtfl`
--

INSERT INTO `adminprtfl` (`id`, `adminName`, `userName`, `passWord`) VALUES
(1, 'Criston Jade', 'adminCJ', 'adminCJ');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(1) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `email` varchar(999) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(999) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `git` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fn`, `email`, `phone`, `address`, `fb`, `git`, `insta`) VALUES
(1, 'Criston Jade B. Enolpe', 'cristonjade@gmail.com', '03961877020', 'Cabaluay, Zamboanga City', 'https://www.facebook.com/Ceejayski/', 'https://github.com/Ceejayglitch', 'https://www.instagram.com/c_jade.mp4/');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(1) NOT NULL,
  `intro` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `cv_name` varchar(100) NOT NULL,
  `cv_loc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `intro`, `name`, `image`, `cv_name`, `cv_loc`) VALUES
(1, 'Hi, Im', 'Criston Jade', 'cjpng.png', 'Curriculum-Vitae Enolpe.docx', 'upload/Curriculum-Vitae Enolpe.docx');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) NOT NULL,
  `jobTitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `jobTitle`) VALUES
(1, 'Front End Developer'),
(3, 'Graphic Designer'),
(5, 'Quality Checker');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(10) NOT NULL,
  `skillName` varchar(50) NOT NULL,
  `skillRange` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skillName`, `skillRange`) VALUES
(1, 'Web Design', 60),
(2, 'PHP', 80),
(3, 'Graphic Design', 50),
(4, 'html5 & CSS', 60),
(6, 'Ang Panghi ni Reki', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `adminprtfl`
--
ALTER TABLE `adminprtfl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminprtfl`
--
ALTER TABLE `adminprtfl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
