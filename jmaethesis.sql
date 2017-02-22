-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 05:29 AM
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
(4, '2', 'John Mark Abril', '+639208317004', 'johnmarkabril@gmail.com', '655 D. Guillermo St. Gagalangin Tondo, Manila', '14495447_961603857295625_3707154493608680853_n.jpg', 'January 26, 2017', '3:42 AM', 0),
(5, '2', '', 'asdasda', 'asdasd', 'asdfadsf', 'noimage.png', 'February 22, 2017', '11:27 AM', 1),
(6, '2', '', 'asdasda', 'asdasd', 'asdfadsf', 'noimage.png', 'February 22, 2017', '11:27 AM', 1),
(7, '2', 'Vincent Barcelona', '09123456789', 'vincent@gmail.com', 'Caloocan City', 'noimage.png', 'February 22, 2017', '11:32 AM', 0);

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
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `NO` int(11) NOT NULL,
  `USERFROM` varchar(500) NOT NULL,
  `USERTO` int(11) NOT NULL,
  `SUBJECT` varchar(500) NOT NULL,
  `CONTENT` varchar(5000) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`NO`, `USERFROM`, `USERTO`, `SUBJECT`, `CONTENT`, `DATE`, `TIME`, `DELETION`) VALUES
(1, '1', 2, 'How did we do? (AEM-HGTLD-431)', 'Recently you have contacted our support service. Please help us improve and kindly rate your latest experience with hostinger.ph.', 'January 27, 2017', '02:13 PM', 0),
(2, '1', 2, 'Testing Subject', 'Testing Message', 'January 30, 2017', '4:10 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inbox_reply`
--

CREATE TABLE `inbox_reply` (
  `NO` int(11) NOT NULL,
  `NOINBOX` varchar(500) NOT NULL,
  `NOUSER` varchar(500) NOT NULL,
  `REPLY` varchar(5000) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `TIME` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox_reply`
--

INSERT INTO `inbox_reply` (`NO`, `NOINBOX`, `NOUSER`, `REPLY`, `DATE`, `TIME`, `IMAGEURL`, `DELETION`) VALUES
(1, '1', '2', 'This is reply of user MAE', '', '', 'prof3.jpg', 0),
(2, '1', '1', 'This is reply of user JM', '', '', 'prof1.jpg', 0),
(3, '1', '2', 'This is 2nd reply of Mae', 'January 30, 2017', '3:26 AM', '', 0),
(4, '1', '2', 'This is 3rd Reply of Mae', 'February 20, 2017', '3:54 PM', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `issue_tracker`
--

CREATE TABLE `issue_tracker` (
  `NO` int(11) NOT NULL,
  `NOUSER` varchar(500) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `DATEINSERT` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_tracker`
--

INSERT INTO `issue_tracker` (`NO`, `NOUSER`, `TITLE`, `DESCRIPTION`, `IMAGEURL`, `STATUS`, `DATEINSERT`, `DELETION`) VALUES
(1, '1', 'CHANGE IP ADDRESS', 'I WANT TO CHANGE MY IP ADDRESS FROM 31.220.58.2 TO 31.220.58.18', 'prof1.jpg', '2', 'January 28, 2017 1:15 AM', 0),
(2, '1', 'DISABLE MY DOMAIN NAME', 'I WANT TO DISABLE MY DOMAIN NAME ON MY VPS SERVER?', 'prof1.jpg', '1', 'January 28, 2017 1:35 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `issue_tracker_reply`
--

CREATE TABLE `issue_tracker_reply` (
  `NO` int(11) NOT NULL,
  `ISSUETRACKERNO` varchar(500) NOT NULL,
  `NOREPLYFROM` varchar(500) NOT NULL,
  `REPLY` varchar(5000) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_tracker_reply`
--

INSERT INTO `issue_tracker_reply` (`NO`, `ISSUETRACKERNO`, `NOREPLYFROM`, `REPLY`, `DATE`, `TIME`, `DELETION`) VALUES
(1, '1', '2', 'Could you please tell us what is the reason you would like to change IP Address, as the IP assigned to a server is a dedicated one?', 'January 25, 2017', '10:01 AM', 0),
(2, '1', '1', 'Because my domain name jmaeprovider.xyz has an ip address 31.220.110.18 and i can''t access the cpanel of my server ! I thought if i purchased a vps server i can automatically access my cpanel and create a subdomain using php code!', 'January 25, 2017', '10:01 AM', 0),
(3, '2', '2', 'Testing #1', 'January 26, 2017', '10:01 AM', 0),
(4, '2', '2', 'Open this issue.', 'January 26, 2017', '10:01 AM', 0),
(7, '2', '2', 'TEsting # 3', 'January 27, 2017', '10:01 AM', 0),
(8, '2', '2', 'TEsting # 4', 'January 27, 2017', '10:01 AM', 0),
(9, '2', '2', 'Yes this reply is done!', 'January 27, 2017', '10:01 AM', 0),
(10, '2', '1', 'Testing', 'January 27, 2017', '11:08 AM', 0),
(11, '1', '2', 'Testing # 6', 'January 27, 2017', '11:10 AM', 0),
(12, '1', '2', 'Testing # 7', 'January 27, 2017', '10:00 PM', 0),
(13, '1', '2', 'Testing # 8', 'January 28, 2017', '1:15 AM', 0),
(14, '2', '2', 'Nag reply na ako', 'January 28, 2017', '1:35 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification_admin`
--

CREATE TABLE `notification_admin` (
  `NO` int(11) NOT NULL,
  `NOUSER` varchar(500) NOT NULL,
  `CONTENT` varchar(100) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_admin`
--

INSERT INTO `notification_admin` (`NO`, `NOUSER`, `CONTENT`, `DATE`, `TIME`, `DELETION`) VALUES
(1, '1', 'John Mark change his/her profile picture', 'January 25, 2017', '01:01 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_configuration`
--

CREATE TABLE `paypal_configuration` (
  `NO` int(11) NOT NULL,
  `NOUSER` varchar(500) NOT NULL,
  `PAYPAL_EMAIL` varchar(500) NOT NULL,
  `STATUS` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_configuration`
--

INSERT INTO `paypal_configuration` (`NO`, `NOUSER`, `PAYPAL_EMAIL`, `STATUS`, `DELETION`) VALUES
(1, '2', 'jmaethesis@gmail.com', 'enabled', 0),
(2, '2', 'maegregorio@gmail.com', 'disabled', 0),
(3, '2', 'testing@gmail.com', 'disabled', 1),
(4, '2', 'testing2@gmail.com', 'disabled', 1),
(5, '2', 'jhasdkjf@gmail.com', 'disabled', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission_admin`
--

CREATE TABLE `permission_admin` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ACTIVE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_admin`
--

INSERT INTO `permission_admin` (`NO`, `NAME`, `ACTIVE`) VALUES
(1, 'Dashboard', 1),
(2, 'Message', 1),
(3, 'Notification', 1),
(4, 'Statistics', 1),
(5, 'Settings', 1),
(6, 'About My Site', 1),
(7, 'Events', 1),
(8, 'PayPal Configuration', 1),
(9, 'User Management', 1),
(10, 'Accounts', 1),
(11, 'Co-Administrator', 1),
(12, 'Website', 1),
(13, 'Website Online', 1),
(14, 'Website Template', 1),
(15, 'Team', 1),
(16, 'Profile', 1),
(17, 'Contact', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_admin`
--

CREATE TABLE `post_admin` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `POSTDESCRIPTION` varchar(5000) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_admin`
--

INSERT INTO `post_admin` (`NO`, `NAME`, `IMAGEURL`, `POSTDESCRIPTION`, `DATE`, `TIME`, `DELETION`) VALUES
(1, 'Farrah Mae Gregorio', 'prof1.jpg', 'No food or drinks. Please follow our instructions.', 'February 22, 2017', '03:22 PM', 0),
(2, 'Agent Agent', 'noimage.png', 'My day is complete.', 'February 21, 2017', '03:45 PM', 0),
(3, 'Farrah Mae Gregorio', 'prof1.jpg', 'DO WHAT IS RIGHT! NOT WHAT IS EASY.', 'February 21, 2017', '9:49 PM', 0),
(4, 'Farrah Mae Gregorio', 'prof1.jpg', 'Will it be easy? Nope. Worth It? Absolutely.', 'February 21, 2017', '9:50 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_admin_reply`
--

CREATE TABLE `post_admin_reply` (
  `NO` int(11) NOT NULL,
  `NOREPLY` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `REPLY` varchar(5000) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_admin_reply`
--

INSERT INTO `post_admin_reply` (`NO`, `NOREPLY`, `NAME`, `IMAGEURL`, `REPLY`, `DATE`, `TIME`, `DELETION`) VALUES
(1, 1, 'Agent Agent', 'noimage.png', 'Ayokong sumunod sa batas dito.', 'February 21, 2017', '03:42 PM', 0),
(2, 2, 'Farrah Mae Gregorio', 'prof1.jpg', 'Wow, have a nice day!', 'February 21, 2017', '04:27 PM', 0),
(3, 1, 'Farrah Mae Gregorio', 'prof1.jpg', 'That''s our rules!!!', 'February 21, 2017', '04:28 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `NO` int(11) NOT NULL,
  `FIRSTNAME` varchar(150) NOT NULL,
  `LASTNAME` varchar(150) NOT NULL,
  `CONTACT` varchar(500) NOT NULL,
  `EMAILADDRESS` varchar(500) NOT NULL,
  `FACEBOOK` varchar(150) NOT NULL,
  `TWITTER` varchar(150) NOT NULL,
  `IMAGEURL` varchar(150) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`NO`, `FIRSTNAME`, `LASTNAME`, `CONTACT`, `EMAILADDRESS`, `FACEBOOK`, `TWITTER`, `IMAGEURL`, `DELETION`) VALUES
(1, 'John Mark', 'Abril', '09208317004', 'johnmarkabril@gmail.com', 'https://www.facebook.com/jmabril17', 'https://twitter.com/JohnmarkAbril', '14495447_961603857295625_3707154493608680853_n.jpg', 0),
(2, 'Farrah Mae', 'Gregorio', '09484410511', 'frrhmgrgrio@gmail.com', 'https://www.facebook.com/Frrhmgrgrio', 'https://twitter.com/frrhmgrgrio', 'prof1.jpg', 1);

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
  `OWNERTITLEWEBSITE` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL,
  `AVAILABILITY` int(11) NOT NULL,
  `AGENTSEE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`NO`, `TEMPLATENAME`, `TEMPLATECATEGORY`, `DESCRIPTION`, `LIBRARYUSE`, `PRICE`, `CURRENTOWNER`, `DATEUPLOADED`, `IMAGEURL`, `SITEURL`, `OWNERTITLEWEBSITE`, `DELETION`, `AVAILABILITY`, `AGENTSEE`) VALUES
(1, 'Blog and Selling of Recipe Template', 'Food E-Commerce', '', 'BootStrap | Inspinia | CodeIgniter Framework', 3000.00, 'Mae Abril', 'December 11, 2016', '1.jpg', 'http://template1.jmaeprovider.xyz/', 'Sweet & Pastries Cakes', 0, 0, 1),
(2, 'News and Affairs Template', 'Food E-Commerce', '', 'BootStrap | Inspinia | CodeIgniter Framework', 3000.00, '', 'December 14, 2016', '2.jpg', '', '', 0, 1, 1),
(3, 'Restaurant Reservation Template', 'Food E-Commerce', 'Description', 'BootStrap | Inspinia | CodeIgniter Framework', 3000.00, '', 'December 15, 2016', '3.jpg', '', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `templatesales`
--

CREATE TABLE `templatesales` (
  `NO` int(11) NOT NULL,
  `TEMPLATESNO` int(11) NOT NULL,
  `FIRSTNAME` varchar(500) NOT NULL,
  `LASTNAME` varchar(500) NOT NULL,
  `EMAILADDRESS` varchar(500) NOT NULL,
  `RENTTIME` varchar(500) NOT NULL,
  `PRICE` double(8,2) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `TIME` varchar(500) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templatesales`
--

INSERT INTO `templatesales` (`NO`, `TEMPLATESNO`, `FIRSTNAME`, `LASTNAME`, `EMAILADDRESS`, `RENTTIME`, `PRICE`, `IMAGEURL`, `DATE`, `TIME`, `DELETION`) VALUES
(1, 1, 'Mae', 'Abril', 'maegregorio', '6 months', 18000.00, 'kjuasdfbi213.jpg', 'February 22, 2017', '11:41 AM', 0),
(2, 3, 'Dale', 'Diaz', 'dalediaz@gmail.com', '1 month', 3000.00, 'IMG_7794.jpg', 'January 11, 2017', '07:39 AM', 0),
(3, 2, 'Shane', 'Macion', 'shanemacion@gmail.com', '1 month', 3000.00, '15870584_1223823597713667_796951048_n.jpg', 'January 15, 2017', '04:23 PM', 0),
(4, 1, 'John', 'Abril', 'jmabril@gmail.com', '3 months', 9000.00, '14495447_961603857295625_3707154493608680853_n.jpg', 'August 15, 2016', '09:19 AM', 0),
(5, 2, 'Beldion', 'Balanan', 'beldbalanan@gmail.com', '2 months', 6000.00, 'noimage.png', 'October 11, 2016', '09:11 AM', 0);

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
(2, '2', 'Last Month Sales', '0', 'January 28, 2017', '1:27 PM', 0),
(3, '2', 'Total Templates', '0', 'January 28, 2017', '1:27 PM', 0),
(5, '2', 'Sales for the year', '0', 'January 28, 2017', '1:27 PM', 0),
(6, '2', 'Contact', '1', 'February 20, 2017', '3:52 PM', 1),
(7, '2', 'Todo List', '1', 'February 20, 2017', '3:52 PM', 1),
(10, '2', 'Issue tracker', '1', 'February 20, 2017', '3:52 PM', 1);

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
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NO`, `FIRSTNAME`, `LASTNAME`, `USERNAME`, `PHONENUMBER`, `EMAIL`, `PASSWORD`, `ACCOUNT_TYPE`, `ACTIVATED`, `VERIFIED`, `VERIFICATIONCODE`, `PERMISSION`, `IMAGEURL`, `DATE`, `TIME`, `DELETION`) VALUES
(1, 'John Mark', 'Abril', 'jmabril17', '09208317004', 'johnmarkabril@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'User', 1, 'YES', '', '', 'prof3.jpg', 'December 15, 2016', '03:18 AM', 0),
(2, 'Farrah Mae', 'Gregorio', 'frrhmgrgrio', '0948410511', 'frrhmgrgrio@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'Administrator', 1, 'YES', '', 'About My Site|Accounts|Agent|Co-Administrator|Contact|Dashboard|Events|Message|Notification|PayPal Configuration|Profile|Settings|Statistics|Team|User Management|Website|Website Online|Website Template', 'prof1.jpg', 'December 15, 2016', '05:31 AM', 0),
(3, 'Agent', 'Agent', 'agent123', '', 'agent@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'Agent', 1, 'YES', '', '', 'noimage.png', 'February 19, 2017', '11:57 AM', 0);

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
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `inbox_reply`
--
ALTER TABLE `inbox_reply`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `issue_tracker`
--
ALTER TABLE `issue_tracker`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `issue_tracker_reply`
--
ALTER TABLE `issue_tracker_reply`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `notification_admin`
--
ALTER TABLE `notification_admin`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `paypal_configuration`
--
ALTER TABLE `paypal_configuration`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `permission_admin`
--
ALTER TABLE `permission_admin`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `post_admin`
--
ALTER TABLE `post_admin`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `post_admin_reply`
--
ALTER TABLE `post_admin_reply`
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
-- Indexes for table `templatesales`
--
ALTER TABLE `templatesales`
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
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inbox_reply`
--
ALTER TABLE `inbox_reply`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `issue_tracker`
--
ALTER TABLE `issue_tracker`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `issue_tracker_reply`
--
ALTER TABLE `issue_tracker_reply`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `notification_admin`
--
ALTER TABLE `notification_admin`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paypal_configuration`
--
ALTER TABLE `paypal_configuration`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `permission_admin`
--
ALTER TABLE `permission_admin`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `post_admin`
--
ALTER TABLE `post_admin`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post_admin_reply`
--
ALTER TABLE `post_admin_reply`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `templatesales`
--
ALTER TABLE `templatesales`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
