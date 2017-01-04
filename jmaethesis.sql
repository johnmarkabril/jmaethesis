-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2017 at 07:52 AM
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `TITLE` varchar(500) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `HOUR` varchar(100) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL,
  `RANDOMCODE` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`NO`, `NAME`, `TITLE`, `DESCRIPTION`, `DATE`, `HOUR`, `IMAGEURL`, `DELETION`, `RANDOMCODE`) VALUES
(1, 'Farrahmae Gregorio', 'Testing Event', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent cursus imperdiet nisl et mollis. Ut dictum aliquam augue, nec sollicitudin nulla semper sit amet. Proin luctus lorem congue, molestie elit non, dapibus nisi. Etiam facilisis et velit vitae efficitur. Mauris tincidunt nisl quis ex facilisis, non pulvinar purus tincidunt. Maecenas fermentum mattis ultrices. Pellentesque venenatis odio consectetur nisi viverra iaculis. Suspendisse quis diam lectus. Curabitur ut tortor risus. Praesent iaculis vel tortor nec volutpat. Integer augue lorem, tempor quis enim a, commodo semper arcu.\r\n\\n\r\nVestibulum et dui vitae ipsum euismod venenatis at ac mi. Sed iaculis risus at tellus vehicula tempus. Nullam viverra laoreet eros, vel tincidunt lacus vestibulum a. Vestibulum interdum aliquet lorem sit amet porttitor. Mauris eros enim, consectetur quis hendrerit ut, ullamcorper sit amet erat. Duis tincidunt dolor sed lorem laoreet, in efficitur risus lobortis. Ut vel maximus lectus. Suspendisse porta sem quis lorem tristique faucibus. Suspendisse tincidunt ante quis lectus viverra, sed pharetra ex sollicitudin. Mauris quis ante id ex posuere ullamcorper quis sit amet lacus. Nunc et lacinia velit, eget porttitor erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse sodales aliquet lacus, a facilisis nulla blandit in. Vestibulum ut dapibus velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'January 04, 2017', '02:35 PM', '', 0, '253e2278727f2b7ea20e35ca26b3e749'),
(2, 'Farrahmae Gregorio', 'Testing Event 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec augue ante. Nulla augue diam, accumsan in magna non, cursus aliquet purus. Phasellus in nibh et urna dapibus pharetra nec vestibulum felis. Nullam nec finibus nulla, et semper lectus. Morbi cursus leo ut nibh pellentesque, et eleifend nulla facilisis. In enim dui, cursus dapibus massa et, sagittis tincidunt dui. Maecenas tempus augue et maximus auctor. Suspendisse lacinia elementum auctor. Nam vestibulum blandit nulla, vitae iaculis massa placerat vitae. Quisque auctor egestas rutrum. Vivamus vel commodo orci. Quisque ut pellentesque erat. Sed tempus augue erat, sed rhoncus ligula tincidunt sit amet. Vivamus in orci enim. Nam ut pulvinar nunc, vestibulum gravida leo.\r\n\\n\r\nAenean tellus lectus, placerat eu nisl a, auctor sagittis nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam id scelerisque tellus. Aliquam feugiat erat fringilla aliquam egestas. Suspendisse sit amet nunc justo. Etiam vel vulputate ipsum, vel laoreet dolor. Aenean libero sem, interdum vitae eleifend ut, pretium et nisi. Nulla vitae pellentesque diam. Nam vel viverra neque.\r\n\\n\r\nMaecenas nec tincidunt dui. Aenean imperdiet mattis interdum. Donec convallis scelerisque condimentum. Quisque eros dolor, sagittis vitae lectus eget, aliquet aliquam nunc. Curabitur sed eros volutpat, iaculis dolor lobortis, sagittis urna. Duis mattis urna non augue dignissim pharetra. Cras imperdiet a turpis eget sodales. Ut nec cursus elit. Sed commodo placerat nunc ut scelerisque. Proin a lectus diam.', 'January 04, 2017', '02:37 PM', '', 0, '54357a3f983e8edb62b5431076b2d407');

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
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FIRSTNAME`, `LASTNAME`, `USERNAME`, `PHONENUMBER`, `EMAIL`, `PASSWORD`, `ACCOUNT_TYPE`, `ACTIVATED`, `VERIFIED`, `VERIFICATIONCODE`, `PERMISSION`, `IMAGEURL`, `DELETION`) VALUES
(1, 'John Mark', 'Abril', 'jmabril17', '09208317004', 'johnmarkabril@gmail.com', '34c87211821751f911c058bbf0cfb822', 'User', 1, 'YES', '', '', '', 0),
(2, 'Farrah Mae', 'Gregorio', 'frrhmgrgrio', '0948410511', 'frrhmgrgrio@gmail.com', '19a2be974580740e9ec96ab7fc016d1b', 'Administrator', 1, 'YES', '', '', '', 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
