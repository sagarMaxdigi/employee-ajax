-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 10:14 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `ID` int(20) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `emp_email` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emp_exp` varchar(20) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `j_date` varchar(200) NOT NULL,
  `l_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`ID`, `emp_name`, `emp_email`, `password`, `emp_exp`, `c_name`, `designation`, `j_date`, `l_date`) VALUES
(16, 'vishal', 'chaturevishal22@gmail.com', 'sagar@123', '2', 'maxdigi,Aquil,Netwin', 'web devloper,Android Devloper,Web devloper', '12-12-2016,20-12-2018,12-5-2018', '20-12-2017,23-12-2018,13-5-2018'),
(18, 'sagar waghchaure', 'sagarwaghchaure2012@gmail.com', 'sagar@123', '3', 'Maxdigi,Aquil,Neumons', 'Interns,PHP Devloper,Web devloper', '12-12-2018,12-12-2018,12-12-2018', '12-12-2019,12-12-2019,12-12-2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
