-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2017 at 09:40 PM
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
-- Table structure for table `about_my_site`
--

CREATE TABLE `about_my_site` (
  `NO` int(11) NOT NULL,
  `NOUSER` varchar(500) NOT NULL,
  `TITLE` varchar(500) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `ACTIVE` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_my_site`
--

INSERT INTO `about_my_site` (`NO`, `NOUSER`, `TITLE`, `DESCRIPTION`, `DATE`, `IMAGEURL`, `ACTIVE`, `DELETION`) VALUES
(1, '2', 'JF Site Provider', 'is owned and operated by JMAE Company as a site provider for you to help your business become better.', 'January 24, 2017', '', '1', 0),
(2, '2', 'JMAE Site Provider', 'is a template and web service provider for a small time to medium scale businesses. We''re here to innovate your business in the technology. We help you and you help us our company.', 'January 25, 2017', '', '0', 0),
(3, '2', 'sadfasd', 'fasdfasdfas', 'January 25, 2017', '', '0', 1);

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
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `USERNAME` varchar(500) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `HOUR` varchar(100) NOT NULL,
  `BLOGHASH` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`NO`, `NAME`, `USERNAME`, `DESCRIPTION`, `DATE`, `HOUR`, `BLOGHASH`, `IMAGEURL`, `DELETION`) VALUES
(1, 'Farrahmae Gregorio', 'gregs17', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still default model text.', 'January 1, 2017', '10:41 AM', 'AN6KM7cmjIqKOFC', 'prof1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_admin`
--

CREATE TABLE `contact_admin` (
  `NO` int(11) NOT NULL,
  `NOUSER` varchar(500) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `CONTACTNO` varchar(500) NOT NULL,
  `EMAILADDRESS` varchar(500) NOT NULL,
  `ADDRESS` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(50) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_admin`
--

INSERT INTO `contact_admin` (`NO`, `NOUSER`, `NAME`, `CONTACTNO`, `EMAILADDRESS`, `ADDRESS`, `IMAGEURL`, `DATE`, `TIME`, `DELETION`) VALUES
(4, '2', 'John Mark Abril', '+639208317004', 'johnmarkabril@gmail.com', '655 D. Guillermo St. Gagalangin Tondo, Manila', '14495447_961603857295625_3707154493608680853_n.jpg', 'January 26, 2017', '3:42 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `NO` int(11) NOT NULL,
  `NOUSER` varchar(500) NOT NULL,
  `TITLE` varchar(500) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`NO`, `NOUSER`, `TITLE`, `DESCRIPTION`, `DATE`, `IMAGEURL`, `DELETION`) VALUES
(1, '2', 'Testing Title', 'Testing Description', 'January 25, 2017', '', 0),
(2, '2', 'Testing', 'Testing', 'January 25, 2017', '', 1);

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
  `SITEURL` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL,
  `AVAILABILITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`NO`, `TEMPLATENAME`, `TEMPLATECATEGORY`, `DESCRIPTION`, `LIBRARYUSE`, `PRICE`, `CURRENTOWNER`, `DATEUPLOADED`, `IMAGEURL`, `SITEURL`, `DELETION`, `AVAILABILITY`) VALUES
(1, 'Blog and Selling of Recipe Template', 'Food E-Commerce', '', 'BootStrap | Inspinia | CodeIgniter Framework', 5753.45, '', 'December 11, 2016', '1.jpg', 'http://preview-template1.jmaeprovider.xyz/', 0, 0),
(2, 'News and Affairs Template', 'Food E-Commerce', '', 'BootStrap | Inspinia | CodeIgniter Framework', 2615.38, '', 'December 14, 2016', '2.jpg', '', 0, 1),
(3, 'Restaurant Reservation Template', 'Food E-Commerce', '', 'BootStrap | Inspinia | CodeIgniter Framework', 1569.35, '', 'December 15, 2016', '3.jpg', '', 0, 1);

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
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `NO` int(11) NOT NULL,
  `NOUSER` varchar(500) NOT NULL,
  `LISTNAME` varchar(100) NOT NULL,
  `LISTSTATUS` varchar(100) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`NO`, `NOUSER`, `LISTNAME`, `LISTSTATUS`, `DATE`, `TIME`, `DELETION`) VALUES
(1, '2', 'Total Sales', '0', 'January 26, 2017', '4:23 AM', 0),
(2, '2', 'Last Month Sales', '0', 'January 26, 2017', '4:23 AM', 0),
(3, '2', 'Total Templates', '0', 'January 26, 2017', '4:22 AM', 0),
(4, '2', 'Site Visit', '0', 'January 26, 2017', '4:30 AM', 0),
(5, '2', 'Sales for the year', '0', 'January 26, 2017', '4:30 AM', 0),
(6, '2', 'Contact', '1', 'January 26, 2017', '4:39 AM', 1),
(7, '2', 'Todo List', '0', 'January 26, 2017', '4:32 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NO` int(11) NOT NULL,
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
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NO`, `FIRSTNAME`, `LASTNAME`, `USERNAME`, `PHONENUMBER`, `EMAIL`, `PASSWORD`, `ACCOUNT_TYPE`, `ACTIVATED`, `VERIFIED`, `VERIFICATIONCODE`, `PERMISSION`, `IMAGEURL`, `DELETION`) VALUES
(1, 'John Mark', 'Abril', 'jmabril17', '09208317004', 'johnmarkabril@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'User', 1, 'YES', '', '', 'prof3.jpg', 0),
(2, 'Farrah Mae', 'Gregorio', 'frrhmgrgrio', '0948410511', 'frrhmgrgrio@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'Administrator', 1, 'YES', '', 'Dashboard|Messages|Compose Message|Inbox|Notification|Statistics|Settings|About My Site|Events|PayPal Configuration|User Management|Accounts|Agent|Co-Administrator|Website|Website Online|Website Template|Team', 'prof1.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_my_site`
--
ALTER TABLE `about_my_site`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `contact_admin`
--
ALTER TABLE `contact_admin`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_my_site`
--
ALTER TABLE `about_my_site`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_admin`
--
ALTER TABLE `contact_admin`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
