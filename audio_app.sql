-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 08:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audio_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `user_pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `aud_author`
--

CREATE TABLE `aud_author` (
  `id` int(10) NOT NULL,
  `aut_name` varchar(225) NOT NULL,
  `aut_desc` text NOT NULL,
  `aut_img` varchar(225) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `created_on` datetime NOT NULL,
  `aut_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aud_author`
--

INSERT INTO `aud_author` (`id`, `aut_name`, `aut_desc`, `aut_img`, `dob`, `created_on`, `aut_status`) VALUES
(1, 'Felix Weingartner ', '<p>asdfasdfasfdafdadsfasdfasdfasdfasdfasasdasd</p>', '1616437798.jpg', '1834-1995', '2021-03-15 20:35:33', 1),
(2, 'Apj Abdul Kalam', '<p>He played an important role in the second Pokhran nuclear test in 1998. He was also associated with India\'s space program and missile development program. Therefore, he is also called \"Missile Man\".</p>', '1615919478.jpg', '1983-2015', '2021-03-16 19:31:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aud_booktbl`
--

CREATE TABLE `aud_booktbl` (
  `bkid` int(10) NOT NULL,
  `author_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `bk_name` varchar(225) NOT NULL,
  `bk_desc` text NOT NULL,
  `bk_img` varchar(225) NOT NULL,
  `bk_age` varchar(250) NOT NULL,
  `bk_year` varchar(100) NOT NULL,
  `bk_tags` varchar(250) NOT NULL,
  `bk_blurb` varchar(150) NOT NULL,
  `bk_rating` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `bk_status` tinyint(1) NOT NULL,
  `bk_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aud_booktbl`
--

INSERT INTO `aud_booktbl` (`bkid`, `author_id`, `sub_id`, `bk_name`, `bk_desc`, `bk_img`, `bk_age`, `bk_year`, `bk_tags`, `bk_blurb`, `bk_rating`, `created_on`, `bk_status`, `bk_type`) VALUES
(1, 2, 2, 'stephen king', '<p>On writing well, which grew out of a course that William zinsser taught at Yale, has been praised for its sound advice, its clarity, and for the warmth of its style. It is a book for anybody who wants to learn how to write or who needs to do some writing to getasasdasdasdasdasdaasdasdasdasd</p>', '1615919295.jpg', 'Adults', '1564-1616', 'asdasda,asdasdasd', 'asdasd asdasd', 0, '2021-03-16 19:28:15', 1, 1),
(3, 2, 2, 'Wings Of Fire', '<p>Every common man who by his sheer grit and hard work achieves success should share his story with the rest for they may find inspiration and strength to go on, in his story. The \'Wings of Fire\' is one such autobiography by visionary scientist Dr. APJ Abdul Kalam, who from very humble beginnings rose to be the President</p>', '1615919541.jpg', '', '', '', '', 0, '2021-03-16 19:32:21', 1, 2),
(6, 2, 0, 'books details', '<p>asdasfdasfdasdfasdfasdfasdfasdfasdfaSDASDASDASD</p>', '1616528946.jpeg', 'Old', '', '', '', 0, '2021-03-23 20:49:06', 1, 2),
(7, 1, 2, 'sdcsadfas', '<p>adfasdfasfdasdf</p>', '1616827265.jpeg', 'Old', 'sdfasfd', 'asdfasdf,dfasdfsa', 'segfsdfg', 0, '2021-03-27 07:41:05', 1, 0),
(8, 1, 2, 'Winter\'s Tale', '<p>ASdfASDadsADSadASDdfasdfsdfgs</p>', '1616827955.jpg', 'Adults', '1564-1616', 'test,1234,test,456', 'test this qweq', 0, '2021-03-27 07:52:35', 1, 0),
(9, 1, 2, 'asdasdasd', '<p>asdasdasdadsadadasd</p>', '1616828038.jpg', 'Adults', '1564-1616', 'asda,asdasd,asdasd', 'asdasd', 0, '2021-03-27 07:53:58', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `aud_chapter`
--

CREATE TABLE `aud_chapter` (
  `id` int(10) NOT NULL,
  `bid` int(11) NOT NULL,
  `nar_id` int(11) NOT NULL,
  `ch_name` varchar(225) NOT NULL,
  `ch_audio` varchar(225) NOT NULL,
  `created_on` datetime NOT NULL,
  `count` int(11) NOT NULL,
  `ch_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aud_chapter`
--

INSERT INTO `aud_chapter` (`id`, `bid`, `nar_id`, `ch_name`, `ch_audio`, `created_on`, `count`, `ch_status`) VALUES
(1, 1, 1, 'test this ', '1615924006.mp3', '2021-03-16 20:46:46', 0, 1),
(2, 1, 1, 'chapter 2', '1615965803.mp3', '2021-03-17 08:23:23', 0, 1),
(3, 3, 1, 'chapter3', '1615966036.mp3', '2021-03-17 08:27:16', 0, 1),
(4, 3, 1, 'chapter 4', '1615966120.mp3', '2021-03-17 08:28:40', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aud_narrator`
--

CREATE TABLE `aud_narrator` (
  `id` int(10) NOT NULL,
  `nar_name` varchar(225) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `nar_desc` text NOT NULL,
  `nar_img` varchar(225) NOT NULL,
  `created_on` datetime NOT NULL,
  `nar_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aud_narrator`
--

INSERT INTO `aud_narrator` (`id`, `nar_name`, `gender`, `country`, `city`, `nar_desc`, `nar_img`, `created_on`, `nar_status`) VALUES
(1, 'test for the narrator', 'female', 'india', 'hyderabad', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. asdasdadsasdasd</p>', '1616438722.png', '2021-03-16 18:03:11', 1),
(2, 'narrator name', 'female', 'india', 'hyderabad', '<p>asdasdasdasdasdadsasdasdasdasd</p>', '', '2021-03-28 14:12:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aud_review`
--

CREATE TABLE `aud_review` (
  `id` int(11) NOT NULL,
  `bid` varchar(150) NOT NULL,
  `uid` varchar(250) NOT NULL,
  `review` text NOT NULL,
  `created_on` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aud_review`
--

INSERT INTO `aud_review` (`id`, `bid`, `uid`, `review`, `created_on`, `status`) VALUES
(2, 'Wings Of Fire', 'test', 'orem Ipsum is simply dummy ', '2021-03-23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `aud_subject`
--

CREATE TABLE `aud_subject` (
  `id` int(11) NOT NULL,
  `sub_name` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aud_subject`
--

INSERT INTO `aud_subject` (`id`, `sub_name`, `status`, `created_on`) VALUES
(1, 'Short stories', 1, '2021-03-28 14:34:04'),
(2, 'Novel', 1, '2021-03-28 14:34:38'),
(3, 'History', 1, '2021-03-28 14:34:51'),
(4, 'Religious', 1, '2021-03-28 14:35:01'),
(5, 'Non-fiction', 1, '2021-03-28 14:35:12'),
(6, 'Fiction', 1, '2021-03-28 14:35:23'),
(7, 'Adventure', 1, '2021-03-28 14:35:38'),
(8, 'Biography', 1, '2021-03-28 14:35:53'),
(9, 'Humour', 1, '2021-03-28 14:36:03'),
(10, 'Society', 1, '2021-03-28 14:36:15'),
(11, 'Politics', 1, '2021-03-28 14:36:27'),
(12, 'Philosophy', 1, '2021-03-28 14:36:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aud_author`
--
ALTER TABLE `aud_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aud_booktbl`
--
ALTER TABLE `aud_booktbl`
  ADD PRIMARY KEY (`bkid`);

--
-- Indexes for table `aud_chapter`
--
ALTER TABLE `aud_chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aud_narrator`
--
ALTER TABLE `aud_narrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aud_review`
--
ALTER TABLE `aud_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aud_subject`
--
ALTER TABLE `aud_subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aud_author`
--
ALTER TABLE `aud_author`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aud_booktbl`
--
ALTER TABLE `aud_booktbl`
  MODIFY `bkid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `aud_chapter`
--
ALTER TABLE `aud_chapter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `aud_narrator`
--
ALTER TABLE `aud_narrator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aud_review`
--
ALTER TABLE `aud_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aud_subject`
--
ALTER TABLE `aud_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
