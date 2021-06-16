-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 10:44 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(2550) NOT NULL,
  `upload_image` varchar(2550) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(1, 9, 'There will be a workshop on cloud computing , in kolkata from 29th June 2019 to 1st July 2019 at Jadavpur University for final year students . Interested  students can contact me.', '', '2019-05-21 07:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `c_date`) VALUES
(1, 5, 8, '		', 'student_body', '2019-04-24 07:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments_alumni`
--

CREATE TABLE `comments_alumni` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(2550) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_job`
--

CREATE TABLE `comments_job` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(2550) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_student`
--

CREATE TABLE `comments_student` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(2550) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_student`
--

INSERT INTO `comments_student` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `c_date`) VALUES
(1, 1, 8, '		abcfd', 'abhilasha_kumari_744423', '2019-05-21 06:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `em` varchar(255) NOT NULL,
  `curr_job` varchar(225) NOT NULL,
  `prev_job` varchar(225) NOT NULL,
  `prev_job1` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `em`, `curr_job`, `prev_job`, `prev_job1`, `date`) VALUES
(7, 'k10abhi@gmail.com', 'GM , Bhel ,kolkata', '...', '...', '2019-04-13 13:12:53'),
(8, 'k10abhilasha@gmail.com', 'AAO ,LIC of India , Muzaffarpur ', '...', '...', '2019-04-13 13:14:04'),
(9, 'drakhshan933@gmail.com', 'Assistant Professor , MIT Muzaffarpur ', '...', '...', '2019-04-15 07:38:45'),
(12, 'rishi07raj@live.com', 'Junior Engineer , Prism', '...', '...', '2019-04-25 13:22:15'),
(13, 'uyfgebw@iugfel.com', '...', '...', '...', '2019-04-26 07:40:10'),
(14, 'iydg@jjefb.com', '...', '...', '...', '2019-05-02 06:30:26'),
(15, 'siddharthbuddy99@gmail.com', 'software developer , uber india', '...', '...', '2019-05-20 06:14:26'),
(16, 'jayantkumar314@gmail.com', 'market analyst , byjus', '...', '...', '2019-05-20 06:28:42'),
(17, 'rpratap225@gmail.com', 'Professor, MIT', '...', '...', '2019-05-20 07:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job` varchar(2550) NOT NULL,
  `type_of_job` varchar(30) NOT NULL,
  `j_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `user_id`, `job`, `type_of_job`, `j_date`) VALUES
(1, 11, 'LIC aka Life Insurance corporation of India invite application for ot of 8581 Apprentice Development Officers(ADO).Apply Online on www.licindia.com', 'gov_non_tech', '2019-04-18 16:49:44'),
(2, 11, 'BPSC announces job for civil engineers. Age limit 21 to 37 year as on 01-08-2019', 'gov_tech', '2019-04-24 06:53:39'),
(3, 11, 'chegg India announces tbs opening for text book solution authoring for civil, mechanical, electrical and computer science.  Interested students can apply through their official website', 'pri_non_tech', '2019-04-24 06:54:56'),
(4, 11, 'BHEL announces 145 Engineer Trainee Recruitment for civil , mechanical and electrical . Interested students can visit the official site.', 'gov_tech', '2019-04-24 06:58:01'),
(5, 11, 'DRDO announces 2 vacancies for Junior Research Fellow. Education qualification is B.Tech/B.E. in ECE in first division with valid GATE score . Interested students can apply through the official website.  ', 'gov_tech', '2019-04-24 07:01:20'),
(6, 13, 'Indian Ordnance Factories announces 1074 vacancies for chargeman. Mechanical , Information , Electrical , civil, Leeather Technology and electronics students can apply. Interested students can apply through OFB website.  ', 'gov_tech', '2019-04-25 13:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `job_profile`
--

CREATE TABLE `job_profile` (
  `j_p_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gov_tech` varchar(225) NOT NULL,
  `gov_non_tech` varchar(225) NOT NULL,
  `pri_tech` varchar(225) NOT NULL,
  `pri_non_tech` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_profile`
--

INSERT INTO `job_profile` (`j_p_id`, `email`, `gov_tech`, `gov_non_tech`, `pri_tech`, `pri_non_tech`) VALUES
(7, 'k10abhi@gmail.com', 'yes', 'yes', 'yes', 'yes'),
(8, 'k10abhilasha@gmail.com', 'yes', 'yes', 'yes', 'yes'),
(9, 'drakhshan933@gmail.com', 'no', 'no', 'no', 'no'),
(11, 'framily.studentbody@gmail.com', 'yes', 'yes', 'yes', 'yes'),
(14, 'rishi07raj@live.com', 'yes', 'yes', 'yes', 'yes'),
(15, 'uyfgebw@iugfel.com', 'no', 'no', 'no', 'no'),
(16, 'iydg@jjefb.com', 'no', 'no', 'no', 'no'),
(17, 'siddharthbuddy99@gmail.com', 'no', 'no', 'no', 'no'),
(18, 'jayantkumar314@gmail.com', 'no', 'no', 'no', 'no'),
(19, 'rpratap225@gmail.com', 'no', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(2550) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(4, 8, 'An alumni and student get together is going to be organised on 5th June 2019 ,at 10 am in AVH.', '', '2019-04-15 07:35:18'),
(5, 8, 'Alumni meet is organised in AVH at 12\'o clock in 15th July 2015.', '', '2019-04-19 04:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `student_post`
--

CREATE TABLE `student_post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(2550) NOT NULL,
  `upload_image` varchar(2550) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_post`
--

INSERT INTO `student_post` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(1, 8, 'A workshop on robotic is organised on 8th June 2019. Interested students are directed to contact Rahul RAJ(2k15, Moxie co-coordinator) before 6th June 2019 12:00 a.m.   ', '', '2019-04-17 04:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `describe_user` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_roll` varchar(15) DEFAULT NULL,
  `batch` int(4) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `user_mobile` int(12) NOT NULL,
  `user_image` varchar(2550) NOT NULL,
  `user_cover` varchar(2550) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` text NOT NULL,
  `post` text NOT NULL,
  `token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `user_pass`, `user_email`, `user_roll`, `batch`, `branch`, `user_mobile`, `user_image`, `user_cover`, `user_reg_date`, `status`, `post`, `token`) VALUES
(8, 'kumari', 'abhilasha', 'kumari_abhilasha_464633', 'welcome to framily', '123456', 'k10abhi@gmail.com', '151060107237', 2016, 'mechanical', 2147483647, 'ojobito_xd_by_goldenhans-d5i2tbz.jpg.11', 'naruto_567_by_eternajehuty-d4j34dz.jpg.64', '2019-04-13 13:12:53', 'verified', 'yes', ''),
(9, 'abhilasha', 'kumari', 'abhilasha_kumari_744423', 'welcome to framily', '123456', 'k10abhilasha@gmail.com', '15106107237', 2014, 'electrical', 2147483647, '4.jpeg', 'malcov.jpg', '2019-04-13 13:14:04', 'verified', 'yes', ''),
(10, 'Drakhshan', 'Jawaid', 'drakhhan_jawaid_346814', 'welcome to framily', '1234567', 'drakhshan933@gmail.com', '15106107229', 2015, 'LT', 2147483647, '3.jpeg', 'malcov.jpg', '2019-04-15 07:38:44', 'verified', 'no', ''),
(11, 'student', 'body', 'student_body', 'welcome to framily', '123456', 'framily.studentbody@gmail.com', '....', 2015, 'ADMIN', 987654321, 'default-profile.png.36', 'bkg2.jpg.45', '2019-04-15 16:28:17', 'verified', 'yes', ''),
(13, 'rishi', 'raj', 'rishi_raj_201597', 'welcome to framily', '123456', 'rishi07raj@live.com', '', 2015, 'civil', 2147483647, '1.jpeg.5', 'malcov.jpg', '2019-04-25 13:22:15', 'verified', 'yes', ''),
(14, 'ihgwobj', 'ihgen', 'ihgwobj_ihgen_11113', 'welcome to framily', '123456', 'uyfgebw@iugfel.com', '', 54287, 'B.pharma', 8469134, 'iconfinder_user-alt_285645.png.22', 'malcov.jpg', '2019-04-26 07:40:10', 'not verified', 'no', ''),
(15, 'duhv', 'iuwuvb', 'duhv_iuwuvb_364749', 'welcome to framily', '123456', 'iydg@jjefb.com', '', 9012, 'ECE', 29348643, 'naruto_590_by_vitaliklol-d54g0yb.jpg.49', 'malcov.jpg', '2019-05-02 06:30:25', 'not verified', 'no', ''),
(16, 'Siddhart', 'kumar', 'siddhart_kumar_595595', 'welcome to framily', 'iamadmin', 'siddharthbuddy99@gmail.com', '', 2015, 'IT', 2147483647, 'naruto_621_madara_vs_hashirama_by_iitheyahikodarkii-d5vpyp1.png.32', 'malcov.jpg', '2019-05-20 06:14:26', 'not verified', 'no', 'uKbDuzQIDvL0imAiHUaUMtTgeCGwDM'),
(17, 'jayant', 'kumar', 'jayant_kumar_857891', 'welcome to framily', 'iamadmin', 'jayantkumar314@gmail.com', '1502525', 2055, 'IT', 2020202020, 'naruto_590_by_vitaliklol-d54g0yb.jpg.49', 'malcov.jpg', '2019-05-20 06:28:41', 'verified', 'no', 'UzkHY9ihNJFb1vpzSDp8qb5W6SAFX3'),
(18, 'ravi', 'pratap', 'ravi_pratap_610038', 'welcome to framily', '123456', 'rpratap225@gmail.com', '', 2015, 'civil', 89451210, 'naruto_590_by_vitaliklol-d54g0yb.jpg.27', 'malcov.jpg', '2019-05-20 07:16:02', 'not verified', 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `wall_images`
--

CREATE TABLE `wall_images` (
  `img_id` int(11) NOT NULL,
  `images` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wall_images`
--

INSERT INTO `wall_images` (`img_id`, `images`) VALUES
(29, 'img1.PNG.26'),
(30, 'bkg2.jpg.64'),
(31, 'Trees.jpeg.27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `comments_alumni`
--
ALTER TABLE `comments_alumni`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `comments_job`
--
ALTER TABLE `comments_job`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `comments_student`
--
ALTER TABLE `comments_student`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_profile`
--
ALTER TABLE `job_profile`
  ADD PRIMARY KEY (`j_p_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `student_post`
--
ALTER TABLE `student_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wall_images`
--
ALTER TABLE `wall_images`
  ADD PRIMARY KEY (`img_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments_alumni`
--
ALTER TABLE `comments_alumni`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_job`
--
ALTER TABLE `comments_job`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_student`
--
ALTER TABLE `comments_student`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_profile`
--
ALTER TABLE `job_profile`
  MODIFY `j_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_post`
--
ALTER TABLE `student_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wall_images`
--
ALTER TABLE `wall_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
