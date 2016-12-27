-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 12:20 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmaethesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `HOUR` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL,
  `RANDOMCODE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`NO`, `NAME`, `TITLE`, `DATE`, `HOUR`, `DESCRIPTION`, `IMAGEURL`, `DELETION`, `RANDOMCODE`) VALUES
(1, 'Mae Gregorio', 'Merry Christmas', 'December 25, 2016', '01:00 AM', 'Thanks for giving us\r\nthe opportunity to serve you\r\nwe look forward to \r\nmeeting you again in our shop\r\nwe greatly value your business\r\nwarm christmas holiday wishes', 'prof1.jpg', 0, 'AN6KM7cmjIqKOFC');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `NO` int(11) NOT NULL,
  `FIRSTNAME` varchar(150) NOT NULL,
  `LASTNAME` varchar(150) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `FACEBOOK` varchar(150) NOT NULL,
  `TWITTER` varchar(150) NOT NULL,
  `IMAGEURL` varchar(150) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`NO`, `FIRSTNAME`, `LASTNAME`, `DESCRIPTION`, `FACEBOOK`, `TWITTER`, `IMAGEURL`, `DELETION`) VALUES
(1, 'John Mark', 'Abril', 'Do what is right, not what is easy.', 'https://www.facebook.com/jmabril17', 'https://twitter.com/JohnmarkAbril', 'prof3.jpg', 0),
(2, 'Farrah Mae', 'Gregorio', 'Every accomplishment begins with the decision to try.', 'https://www.facebook.com/Frrhmgrgrio', 'https://twitter.com/frrhmgrgrio', 'prof1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `NO` int(11) NOT NULL,
  `TEMPLATENAME` varchar(500) NOT NULL,
  `TEMPLATECATEGORY` varchar(500) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `LIBRARYUSE` varchar(500) NOT NULL,
  `PRICE` double(8,2) NOT NULL,
  `CURRENTOWNER` varchar(1000) NOT NULL,
  `DATEUPLOADED` varchar(100) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL,
  `AVAILABILITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`NO`, `TEMPLATENAME`, `TEMPLATECATEGORY`, `DESCRIPTION`, `LIBRARYUSE`, `PRICE`, `CURRENTOWNER`, `DATEUPLOADED`, `IMAGEURL`, `DELETION`, `AVAILABILITY`) VALUES
(1, 'Blog and Selling of Recipe Template', 'Food E-Commerce', '', 'BootStrap | Inspinia | CodeIgniter Framework', 20000.00, '', 'December 11, 2016', '1.jpg', 0, 0),
(2, 'News and Affairs Template', 'Food E-Commerce', '', 'BootStrap | Inspinia | CodeIgniter Framework', 15000.00, '', 'December 14, 2016', '2.jpg', 0, 1),
(3, 'Restaurant Reservation Template', 'Food E-Commerce', '', 'BootStrap | Inspinia | CodeIgniter Framework', 10000.00, '', 'December 15, 2016', '3.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `DESCRIPTION` varchar(260) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `HOUR` varchar(100) NOT NULL,
  `JOB` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`NO`, `NAME`, `DESCRIPTION`, `DATE`, `HOUR`, `JOB`, `DELETION`, `IMAGEURL`) VALUES
(1, 'William Son', 'I has been using JMAE Site Provider for a month. Their website templates are incredibly reliable and easy to maintain. We work with all types of business to help create user-friendly websites and always recommended JMAE Site Provider to our clients.', 'December 15, 2016', '07:29 PM', 'Best Buddy Cakes, Owner', 0, 'a1.jpg'),
(2, 'Kristiana Augustin', 'I wanted to find a creative designer that could interpret my design for a playful yet professional feature, JMAE Site rovider did exactly that. Professionalism is an understatement, communication was answered promptly and perfectly.', 'December 29, 2016', '09:11 AM', 'Entrepreneur', 0, 'a6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PHONENUMBER` varchar(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `ACCOUNT_TYPE` varchar(50) NOT NULL,
  `ACTIVATED` tinyint(4) NOT NULL,
  `VERIFIED` varchar(50) NOT NULL,
  `VERIFICATIONCODE` varchar(50) NOT NULL,
  `PERMISSION` varchar(5000) NOT NULL,
  `IMAGEURL` varchar(100) NOT NULL,
  `DELETION` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FIRSTNAME`, `LASTNAME`, `USERNAME`, `PHONENUMBER`, `EMAIL`, `PASSWORD`, `ACCOUNT_TYPE`, `ACTIVATED`, `VERIFIED`, `VERIFICATIONCODE`, `PERMISSION`, `IMAGEURL`, `DELETION`) VALUES
(1, 'John Mark', 'Abril', 'jmabril17', '09208317004', 'johnmarkabril@gmail.com', '34c87211821751f911c058bbf0cfb822', 'Administrator', 1, '', '', '', '', ''),
(2, 'Farrah Mae', 'Gregorio', 'frrhmgrgrio', '0948410511', 'frrhmgrgrio@gmail.com', '9d156de36890b0681f3595426e2bbee3', 'Administrator', 1, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
