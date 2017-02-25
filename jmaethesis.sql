-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2017 at 08:24 PM
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
-- Table structure for table `blog_reply`
--

CREATE TABLE `blog_reply` (
  `NO` int(11) NOT NULL,
  `BLOGNO` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `TIME` varchar(500) NOT NULL,
  `REPLY` varchar(5000) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_reply`
--

INSERT INTO `blog_reply` (`NO`, `BLOGNO`, `NAME`, `IMAGEURL`, `DATE`, `TIME`, `REPLY`, `DELETION`) VALUES
(1, 1, 'John Mark Abril', 'prof3.jpg', 'February 22, 2017', '10:59 PM', 'Thank you for the wonderful work!', 0),
(2, 1, 'John Mark Abril', 'prof3.jpg', 'February 23, 2017', '2:14 AM', 'Belated Merry Christmas.', 0),
(3, 1, 'John Mark Abril', 'prof3.jpg', 'February 23, 2017', '2:39 AM', 'Belated Happy New Year.', 0),
(4, 1, 'John Mark Abril', 'prof3.jpg', 'February 23, 2017', '2:55 AM', 'Belated Happy Valentines.', 0);

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
(7, '3', 'Vincent Barcelona', '09123456789', 'vincent@gmail.com', 'Caloocan City', 'noimage.png', 'February 22, 2017', '11:32 AM', 0),
(8, '3', 'asdfa', 'sdfasdf', 'asdfasdfasdf@gmail.com', 'asdf', 'noimage.png', 'February 24, 2017', '3:57 AM', 1),
(9, '3', 'qwer', 'wqer', 'asd@gmail.com', 'asdf', 'noimage.png', 'February 24, 2017', '3:58 AM', 1);

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
(1, '2', 'Testing Title', 'Testing Description', 'January 25, 2017', '', 1),
(2, '2', 'Testing', 'Testing', 'January 25, 2017', 'noimage.png', 1),
(3, '2', 'Pumpkin Patch Party', 'Bundle up your kids in cutesy pumpkin costumes for a pre-Halloween fun they will love!  Save the Date! The annual Pumpkin Patch Party will be held on October 27, 3pm at Gymboree Play & Music Manila Polo Club, Makati City. It will be an afternoon party of fun costumes, kid-friendly games, arts and crafts and trick or treating. With special guest, Puppeteer and Author of the children’s book, “Ang Batang Gustong Maging Papet”(The Kid Who Wants to be a Puppet).', 'October 11, 2016', 'noimage.png', 0),
(4, '2', '‘Magical Fields of Light’ in Nuvali', 'People of the South are sure to have a brighter and merrier holidays as Nuvali presents their first-ever ‘Magical Fields of Light’ which started last November 25, and will last until January 8, 2017.The Magical Field of Lights show runs every 30 minutes starting at 6 p.m. and ending at 10 p.m. every day. Each show is separated into two 5-minute-long display of flashing lights and lasers accompanied by a medley of popular Christmas songs—a mix of foreign and Filipino songs.', 'December 13, 2016', 'noimage.png', 0),
(5, '2', 'New Year’s Eve Events: Countdown to 2017', 'New Year’s Eve in the Philippines is usually celebrated by a multitude of traditions and superstitions. There would be people in the streets, lighting up firecrackers to drive away the bad luck. Some would be in their best polka dotted clothes, and there will be some – kids and adults alike – who’d be jumping as high as they could as soon as the clock strikes 12, marking the start of the new year.', 'December 31, 2016', 'noimage.png', 0),
(6, '2', 'Celebrate the Year of the Fire Rooster', 'Celebrate the Year of the Fire Rooster as Century City Mall brings you activities to guide you in your journey to fulfillment, wealth, prosperity and good health this 2017.', 'January 15, 2017', 'noimage.png', 0),
(7, '2', 'International Seminar in Inclusive Educatio', 'Join this conference and help build an inclusive education community in the Philippines!\r\nFor the first time ever, various educators, legislators, disabled people organizations, students from Philippines and abroad, and international organizations will unite for the International Seminar in Inclusive Education happening from February 22 to 24, 2017 at the SMX Convention Center Manila.', 'January 13, 2017', 'noimage.png', 0),
(8, '3', 'qwe', 'qwe', 'February 24, 2017', '', 1),
(9, '3', 'qwer', 'qwe', 'February 24, 2017', 'noimage.png', 1),
(10, '3', 'asdf', 'asdfasdf', 'February 24, 2017', '', 1),
(11, '3', 'asdf', 'asdf', 'February 24, 2017', '', 1),
(12, '3', 'asdf', 'asdf', 'February 24, 2017', '', 1),
(13, '3', 'asdf', 'asdf', 'February 24, 2017', '', 1),
(14, '3', 'asdf', 'asdf', 'February 24, 2017', '', 1),
(15, '3', 'asdfasdfasdf', 'asdfasdf', 'February 24, 2017', '', 1),
(16, '3', 'asdf', 'asdf', 'February 24, 2017', '', 1),
(17, '3', 'asdf', 'asdf', 'February 24, 2017', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_reply`
--

CREATE TABLE `event_reply` (
  `NO` int(11) NOT NULL,
  `EVENTNO` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `TIME` varchar(500) NOT NULL,
  `REPLY` varchar(5000) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_reply`
--

INSERT INTO `event_reply` (`NO`, `EVENTNO`, `NAME`, `IMAGEURL`, `DATE`, `TIME`, `REPLY`, `DELETION`) VALUES
(2, 6, 'John Mark Abril', 'prof3.jpg', 'February 23, 2017', '2:53 AM', 'This is real? If its real then we celebrate.', 0),
(3, 5, 'John Mark Abril', 'prof3.jpg', 'February 23, 2017', '3:07 PM', 'kjhasdf kjhsadf', 0),
(4, 7, 'John Mark Abril', 'prof3.jpg', 'February 24, 2017', '4:24 AM', 'Reply', 0);

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
(2, '1', 2, 'Testing Subject', 'Testing Message', 'January 30, 2017', '4:10 AM', 0),
(3, '2', 3, 'Thesis 2017', 'Matatapos na to baby ko!', 'February 24, 2017', '3:14 AM', 0);

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
(4, '1', '2', 'This is 3rd Reply of Mae', 'February 20, 2017', '3:54 PM', '', 0),
(5, '3', '3', 'Yes, finally!', 'February 24, 2017', '3:27 AM', '', 0);

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
(1, '1', 'CHANGE IP ADDRESS', 'I WANT TO CHANGE MY IP ADDRESS FROM 31.220.58.2 TO 31.220.58.18', 'prof1.jpg', '1', 'February 25, 2017 3:48 PM', 0),
(2, '1', 'DISABLE MY DOMAIN NAME', 'I WANT TO DISABLE MY DOMAIN NAME ON MY VPS SERVER?', 'prof1.jpg', '2', 'February 25, 2017 3:44 PM', 0),
(3, '1', 'Domain Name', 'I want to change my domain name to johnmarkabril.jmaeprovider.xyz', 'prof3.jpg', '2', 'February 25, 2017 4:19 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `issue_tracker_reply`
--

CREATE TABLE `issue_tracker_reply` (
  `NO` int(11) NOT NULL,
  `ISSUETRACKERNO` varchar(500) NOT NULL,
  `NOREPLYFROM` varchar(500) NOT NULL,
  `REPLY` varchar(5000) NOT NULL,
  `DATEREPLY` varchar(100) NOT NULL,
  `TIMEREPLY` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_tracker_reply`
--

INSERT INTO `issue_tracker_reply` (`NO`, `ISSUETRACKERNO`, `NOREPLYFROM`, `REPLY`, `DATEREPLY`, `TIMEREPLY`, `DELETION`) VALUES
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
(14, '2', '2', 'Nag reply na ako', 'January 28, 2017', '1:35 PM', 0),
(15, '1', '3', 'Testing for agent reply', 'February 24, 2017', '3:02 AM', 0),
(16, '1', '1', 'This issue hasn''t solved yet!', 'February 25, 2017', '3:43 PM', 0),
(17, '2', '1', 'Bakit ang tagal namang maayos nung issue na to!', 'February 25, 2017', '3:44 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `NO` int(11) NOT NULL,
  `NOUSER` int(11) NOT NULL,
  `LATITUDE` double(16,7) NOT NULL,
  `LONGHITUDE` double(16,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`NO`, `NOUSER`, `LATITUDE`, `LONGHITUDE`) VALUES
(1, 1, 14.6333994, 120.9735953),
(2, 2, 14.6518846, 120.9668155),
(3, 9, 14.6522760, 120.9958610),
(4, 3, 0.0000000, 0.0000000);

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
(1, '1', 'John Mark Abril change his/her profile picture', 'January 25, 2017', '01:01 AM', 0),
(2, '1', 'John Mark Abril has been logged in.', 'February 24, 2017', '4:21 AM', 0),
(3, '1', 'John Mark Abril reply to a event.', 'February 24, 2017', '4:24 AM', 0),
(4, '1', 'John Mark Abril has been logged out.', 'February 24, 2017', '4:26 AM', 0),
(5, '3', 'Agent Agent has been logged out.', 'February 24, 2017', '4:42 AM', 0),
(6, '1', 'John Mark Abril has been logged in.', 'February 24, 2017', '11:02 AM', 0),
(7, '1', 'John Mark Abril has been logged out.', 'February 24, 2017', '2:00 PM', 0),
(8, '1', 'John Mark Abril has been logged in.', 'February 24, 2017', '2:00 PM', 0),
(9, '1', 'John Mark Abril has been logged out.', 'February 24, 2017', '2:00 PM', 0),
(10, '2', 'Farrah Mae Gregorio has been logged out.', 'February 24, 2017', '2:04 PM', 0),
(11, '1', 'John Mark Abril has been logged in.', 'February 24, 2017', '2:05 PM', 0),
(12, '1', 'John Mark Abril has been logged out.', 'February 24, 2017', '3:00 PM', 0),
(13, '9', 'Vincent Barcelona has been logged in.', 'February 24, 2017', '3:00 PM', 0),
(14, '9', 'Vincent Barcelona has been logged out.', 'February 24, 2017', '3:00 PM', 0),
(15, '1', 'John Mark Abril has been logged in.', 'February 24, 2017', '3:00 PM', 0),
(16, '1', 'John Mark Abril has been logged out.', 'February 24, 2017', '3:32 PM', 0),
(17, '3', 'Agent Agent has been logged out.', 'February 25, 2017', '3:21 PM', 0),
(18, '1', 'John Mark Abril has been logged in.', 'February 25, 2017', '3:21 PM', 0),
(19, '1', 'John Mark Abril change his/her profile picture.', 'February 25, 2017', '8:55 PM', 0),
(20, '1', 'John Mark Abril change his/her personal information.', 'February 25, 2017', '9:18 PM', 0),
(21, '1', 'John Mark Abri change his/her personal information.', 'February 25, 2017', '9:18 PM', 0),
(22, '1', 'John Mark Abril change his/her personal information.', 'February 25, 2017', '9:19 PM', 0),
(23, '1', 'John Mark Abri change his/her personal information.', 'February 25, 2017', '9:19 PM', 0),
(24, '1', 'John Mark Abril change his/her personal information.', 'February 25, 2017', '9:24 PM', 0),
(25, '1', 'John Mark Abri change his/her personal information.', 'February 25, 2017', '9:25 PM', 0),
(26, '1', 'John Mark Abril change his/her personal information.', 'February 25, 2017', '9:25 PM', 0),
(27, '1', 'John Mark Abril change his/her personal information.', 'February 25, 2017', '9:25 PM', 0),
(28, '1', 'John Mar Abril change his/her personal information.', 'February 25, 2017', '9:25 PM', 0),
(29, '1', 'John Mark Abril change his/her personal information.', 'February 25, 2017', '9:26 PM', 0),
(30, '1', 'John Ma Abril change his/her personal information.', 'February 25, 2017', '9:26 PM', 0),
(31, '1', 'John Mark Abril change his/her personal information.', 'February 25, 2017', '9:26 PM', 0),
(32, '1', 'John Mark Ab change his/her personal information.', 'February 25, 2017', '9:27 PM', 0),
(33, '1', 'John Mark Abril change his/her personal information.', 'February 25, 2017', '9:56 PM', 0),
(34, '1', 'John Mark Abril has been logged out.', 'February 25, 2017', '9:59 PM', 0),
(35, '2', 'Farrah Mae Gregorio has been logged out.', 'February 25, 2017', '10:10 PM', 0),
(36, '1', 'John Mark Abril has been logged in.', 'February 25, 2017', '10:10 PM', 0),
(37, '1', 'John Mark Abril has been logged out.', 'February 25, 2017', '10:30 PM', 0),
(38, '2', 'Farrah Mae Gregorio change his/her profile picture.', 'February 25, 2017', '10:31 PM', 0),
(39, '2', 'Farrah Mae Gregorio change his/her personal information.', 'February 25, 2017', '10:41 PM', 0),
(40, '2', 'Farrah Mae Gregor change his/her personal information.', 'February 25, 2017', '10:42 PM', 0),
(41, '2', 'Farrah Mae Gregorio change his/her profile picture.', 'February 25, 2017', '10:42 PM', 0),
(42, '2', 'Farrah Mae Gregorio change his/her profile picture.', 'February 25, 2017', '10:43 PM', 0),
(43, '2', 'Farrah Mae Gregorio change his/her profile picture.', 'February 25, 2017', '10:43 PM', 0),
(44, '2', 'Farrah Mae Gregorio change his/her personal information.', 'February 25, 2017', '10:49 PM', 0),
(45, '2', 'Farrah Mae Gregorio change his/her personal information.', 'February 25, 2017', '10:49 PM', 0),
(46, '2', 'Farrah Mae Gregorio has been logged out.', 'February 25, 2017', '10:50 PM', 0),
(47, '3', 'Agent Agent has been logged out.', 'February 25, 2017', '10:50 PM', 0),
(48, '3', 'Agent Agent change his/her profile picture.', 'February 25, 2017', '10:54 PM', 0),
(49, '3', 'Agent Agent change his/her profile picture.', 'February 25, 2017', '10:55 PM', 0),
(50, '3', 'Agent Agent change his/her personal information.', 'February 25, 2017', '11:30 PM', 0),
(51, '3', 'Agent Agen change his/her personal information.', 'February 25, 2017', '11:30 PM', 0),
(52, '3', 'Agent Agent change his/her personal information.', 'February 25, 2017', '11:30 PM', 0),
(53, '3', 'Agent Agent change his/her personal information.', 'February 25, 2017', '11:30 PM', 0),
(54, '2', 'Farrah Mae Gregorio has been logged out.', 'February 26, 2017', '12:07 AM', 0),
(55, '3', 'Agent Agent has been logged out.', 'February 26, 2017', '12:30 AM', 0),
(56, '2', 'Farrah Mae Gregorio has been logged out.', 'February 26, 2017', '2:22 AM', 0),
(57, '3', 'Agent Agent has been logged out.', 'February 26, 2017', '2:26 AM', 0),
(58, '2', 'Farrah Mae Gregorio has been logged out.', 'February 26, 2017', '2:28 AM', 0),
(59, '1', 'John Mark Abril has been logged in.', 'February 26, 2017', '2:28 AM', 0),
(60, '1', 'John Mark Abril has been logged out.', 'February 26, 2017', '2:31 AM', 0),
(61, '2', 'Farrah Mae Gregorio has been logged out.', 'February 26, 2017', '2:32 AM', 0),
(62, '3', 'Agent Agent change his/her profile picture.', 'February 26, 2017', '2:50 AM', 0);

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
(5, '2', 'jhasdkjf@gmail.com', 'disabled', 1);

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
(1, 'Farrah Mae Gregorio', 'DSCF5980.JPG', 'No food or drinks. Please follow our instructions.', 'February 22, 2017', '03:22 PM', 0),
(2, 'Agent Agent', 'awda wdaw.jpg', 'My day is complete.', 'February 21, 2017', '03:45 PM', 0),
(3, 'Farrah Mae Gregorio', 'DSCF5980.JPG', 'DO WHAT IS RIGHT! NOT WHAT IS EASY.', 'February 21, 2017', '9:49 PM', 0),
(4, 'Farrah Mae Gregorio', 'DSCF5980.JPG', 'Will it be easy? Nope. Worth It? Absolutely.', 'February 21, 2017', '9:50 PM', 0),
(5, 'Agent Agent', 'awda wdaw.jpg', 'This is my first post!', 'February 24, 2017', '4:07 AM', 0);

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
(1, 1, 'Agent Agent', 'awda wdaw.jpg', 'Ayokong sumunod sa batas dito.', 'February 21, 2017', '03:42 PM', 0),
(2, 2, 'Farrah Mae Gregorio', 'DSCF5980.JPG', 'Wow, have a nice day!', 'February 21, 2017', '04:27 PM', 0),
(3, 1, 'Farrah Mae Gregorio', 'DSCF5980.JPG', 'That''s our rules!!!', 'February 21, 2017', '04:28 PM', 0),
(4, 4, 'Agent Agent', 'awda wdaw.jpg', 'This is a wonderful quote!', 'February 24, 2017', '4:12 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_user`
--

CREATE TABLE `post_user` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `IMAGEURL` varchar(500) NOT NULL,
  `POSTDESCRIPTION` varchar(5000) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_user`
--

INSERT INTO `post_user` (`NO`, `NAME`, `IMAGEURL`, `POSTDESCRIPTION`, `DATE`, `TIME`, `DELETION`) VALUES
(1, 'John Mark Abril', 'prof3.jpg', 'Do what is right, not what is easy.', 'February 24, 2017', '02:37 PM', 0),
(2, 'John Mark Abril', 'prof3.jpg', 'Positive thinking = Positive outcome.', 'February 25, 2017', '3:26 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_user_reply`
--

CREATE TABLE `post_user_reply` (
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
-- Dumping data for table `post_user_reply`
--

INSERT INTO `post_user_reply` (`NO`, `NOREPLY`, `NAME`, `IMAGEURL`, `REPLY`, `DATE`, `TIME`, `DELETION`) VALUES
(1, 1, 'John Mark Abril', 'prof3.jpg', 'asdfasdf', 'February 24, 2017', '2:44 PM', 0);

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
(1, 'Blog and Selling of Recipe Template', 'Food E-Commerce', 'asdfasdf', 'BootStrap | Inspinia | CodeIgniter Framework', 3000.00, 'Mae Abril', 'December 11, 2016', '1.jpg', 'http://template1.jmaeprovider.xyz/', 'Sweet & Pastries Cakes', 0, 0, 1),
(2, 'News and Affairs Template', 'Food E-Commerce', '', 'BootStrap | Inspinia | CodeIgniter Framework', 1.00, '', 'December 14, 2016', '2.jpg', 'http://template2.jmaeprovider.xyz/', '', 0, 1, 1),
(3, 'Restaurant Reservation Template', 'Food E-Commerce', 'Description', 'BootStrap | Inspinia | CodeIgniter Framework', 1.00, 'John Mark Abril', 'December 15, 2016', '3.jpg', 'dalethesis.jmaeprovider.xyz', 'Restaurant Reservation Template', 0, 0, 0),
(4, 'Fruit Stores Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Free CSS Templates', 3000.00, '', 'February 22, 2017', 'fruit-stores.png', 'http://template4.jmaeprovider.xyz/', '', 0, 1, 0),
(5, 'DapurKue Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Tokokoo & instantShift', 3000.00, '', 'February 22, 2017', 'dapurkue.png', 'http://template5.jmaeprovider.xyz/', '', 0, 1, 0),
(6, 'Brewery Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'brewery.png', 'http://template6.jmaeprovider.xyz/', '', 0, 1, 0),
(7, 'Cafeteria Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Choco Templates', 3000.00, '', 'February 22, 2017', 'cafeteria.png', 'http://template7.jmaeprovider.xyz/', '', 1, 1, 0),
(8, 'Valencia Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'valencia.png', 'http://template8.jmaeprovider.xyz/', '', 1, 1, 0),
(9, 'Decanter Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'decanter.png', 'http://template9.jmaeprovider.xyz/', '', 1, 1, 0),
(10, 'Cake Delights Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'cake-delights.png', 'http://template10.jmaeprovider.xyz/', '', 1, 1, 0),
(11, 'Garden Truck Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'garden-truck.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(12, 'Organic Food Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'organic-food.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(13, 'Gourmet Traditional Restaurant Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'Gourmet-Traditional-Restaurant.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(14, 'Caprice Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Elemis', 3000.00, '', 'February 22, 2017', 'caprice.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(15, 'Bliss Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'bliss.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(16, 'Restaurant Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap', 3000.00, '', 'February 22, 2017', 'restaurant.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(17, 'King of Pasta Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Mohamed Sobby', 3000.00, '', 'February 22, 2017', 'king-of-pasta.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(18, 'Zentro Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Tooplate', 3000.00, '', 'February 22, 2017', 'zentro.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(19, 'Eventrum Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template  Monster', 3000.00, '', 'February 22, 2017', 'eventrum.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(20, 'Steak House Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Templatemo', 3000.00, '', 'February 22, 2017', 'steak-house.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(21, 'Luxury Restaurant Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Website Template', 3000.00, '', 'February 22, 2017', 'luxury-restaurant.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(22, 'Cafe Template', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'cafe.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(23, 'Classic European Cuisine', 'Food E-Commerce', 'At this category, you can find templates related to food and drink to make a website for a company dealing with cakes, wine, chocolate, etc. ', 'HTML | Bootstrap | Template Monster', 3000.00, '', 'February 22, 2017', 'Classic-European-Cuisine.png', 'http://template.jmaeprovider.xyz/', '', 1, 1, 0),
(24, 'asdfasdf', 'asdfasdfasdf', 'asdfasfasdf', 'asdfasdfasdf', 3213.00, '', 'February 26, 2017', 'noimage.png', '', '', 1, 1, 0),
(25, 'asdfasdf', 'asdfasdfasdf', 'asdfasfasdf', 'asdfasdfasdf', 3213.00, '', 'February 26, 2017', 'noimage.png', '', '', 1, 1, 0);

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
  `DELETION` int(11) NOT NULL,
  `AGENTSEE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templatesales`
--

INSERT INTO `templatesales` (`NO`, `TEMPLATESNO`, `FIRSTNAME`, `LASTNAME`, `EMAILADDRESS`, `RENTTIME`, `PRICE`, `IMAGEURL`, `DATE`, `TIME`, `DELETION`, `AGENTSEE`) VALUES
(1, 1, 'Mae', 'Abril', 'maegregorio', '6 months', 18000.00, 'kjuasdfbi213.jpg', 'February 22, 2017', '11:41 AM', 0, 0),
(2, 3, 'Dale', 'Diaz', 'dalediaz@gmail.com', '1 month', 3000.00, 'IMG_7794.jpg', 'January 11, 2017', '07:39 AM', 0, 0),
(3, 2, 'Shane', 'Macion', 'shanemacion@gmail.com', '1 month', 3000.00, '15870584_1223823597713667_796951048_n.jpg', 'January 15, 2017', '04:23 PM', 0, 0),
(4, 1, 'John', 'Abril', 'jmabril@gmail.com', '3 months', 9000.00, '14495447_961603857295625_3707154493608680853_n.jpg', 'August 15, 2016', '09:19 AM', 0, 0),
(5, 2, 'Beldion', 'Balanan', 'beldbalanan@gmail.com', '2 months', 6000.00, 'noimage.png', 'October 11, 2016', '09:11 AM', 0, 0),
(9, 3, 'John Mark', 'Abril', 'johnmarkabril@gmail.com', '24 months', 25.20, 'prof3.jpg', 'February 24, 2017', '1:51 PM', 0, 1),
(10, 3, 'John Mark', 'Abril', 'johnmarkabril@gmail.com', '24 months', 25.20, 'prof3.jpg', 'February 24, 2017', '1:53 PM', 0, 1),
(11, 3, 'John Mark', 'Abril', 'johnmarkabril@gmail.com', '24 months', 25.20, 'prof3.jpg', 'February 24, 2017', '1:54 PM', 0, 1),
(12, 3, 'John Mark', 'Abril', 'johnmarkabril@gmail.com', '24 months', 25.20, 'prof3.jpg', 'February 24, 2017', '1:57 PM', 0, 1),
(13, 3, 'John Mark', 'Abril', 'johnmarkabril@gmail.com', '24 months', 25.20, 'prof3.jpg', 'February 24, 2017', '1:58 PM', 0, 1),
(14, 3, 'John Mark', 'Abril', 'johnmarkabril@gmail.com', '24 months', 25.20, 'prof3.jpg', 'February 24, 2017', '1:58 PM', 0, 1);

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
  `DELETION` int(11) NOT NULL,
  `LATITUDE` double(16,7) NOT NULL,
  `LONGHITUDE` double(16,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NO`, `FIRSTNAME`, `LASTNAME`, `USERNAME`, `PHONENUMBER`, `EMAIL`, `PASSWORD`, `ACCOUNT_TYPE`, `ACTIVATED`, `VERIFIED`, `VERIFICATIONCODE`, `PERMISSION`, `IMAGEURL`, `DATE`, `TIME`, `DELETION`, `LATITUDE`, `LONGHITUDE`) VALUES
(1, 'John Mark', 'Abril', 'jmabril17', '09208317004', 'johnmarkabril@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'User', 1, 'YES', '', '', '20161220_101645.jpg', 'December 15, 2016', '03:18 AM', 0, 14.5486933, 121.0385227),
(2, 'Farrah Mae', 'Gregorio', 'frrhmgrgrio', '09484105111', 'frrhmgrgrio@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'Administrator', 1, 'YES', '', 'About My Site|Accounts|Agent|Co-Administrator|Contact|Dashboard|Events|Message|Notification|PayPal Configuration|Profile|Settings|Statistics|Team|User Management|Website|Website Online|Website Template', 'DSCF5980.JPG', 'December 15, 2016', '05:31 AM', 0, 14.5849125, 121.0417843),
(3, 'Agent', 'Agent', 'agent123', '09821647593', 'agent@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'Agent', 1, 'YES', '', 'Issue Tracker|Profile|Contact|Message|Events|Notification|Template|Purchased Template|Templates|User Management|Agent', 'awda wdaw.jpg', 'February 19, 2017', '11:57 AM', 0, 14.5916890, 121.0498709),
(9, 'Vincent', 'Barcelona', 'vincent123', '09132138216', 'vincentbarcelona@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'User', 0, 'YES', '', '', 'noimage.png', 'February 24, 2017', '1:50 AM', 0, 14.6522760, 120.9958610);

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
-- Indexes for table `blog_reply`
--
ALTER TABLE `blog_reply`
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
-- Indexes for table `event_reply`
--
ALTER TABLE `event_reply`
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
-- Indexes for table `location`
--
ALTER TABLE `location`
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
-- Indexes for table `post_user`
--
ALTER TABLE `post_user`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `post_user_reply`
--
ALTER TABLE `post_user_reply`
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
-- AUTO_INCREMENT for table `blog_reply`
--
ALTER TABLE `blog_reply`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contact_admin`
--
ALTER TABLE `contact_admin`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `event_reply`
--
ALTER TABLE `event_reply`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `inbox_reply`
--
ALTER TABLE `inbox_reply`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `issue_tracker`
--
ALTER TABLE `issue_tracker`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `issue_tracker_reply`
--
ALTER TABLE `issue_tracker_reply`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notification_admin`
--
ALTER TABLE `notification_admin`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
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
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post_admin_reply`
--
ALTER TABLE `post_admin_reply`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post_user`
--
ALTER TABLE `post_user`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post_user_reply`
--
ALTER TABLE `post_user_reply`
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
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `templatesales`
--
ALTER TABLE `templatesales`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
