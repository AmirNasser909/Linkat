-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 10:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE `ask` (
  `ask_ID` int(11) NOT NULL,
  `ask` text NOT NULL,
  `ask_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `user_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ask`
--

INSERT INTO `ask` (`ask_ID`, `ask`, `ask_time`, `user_ID`) VALUES
(3, 'm', '0000-00-00 00:00:00.000000', 315);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_ID` int(100) NOT NULL,
  `instructor` int(11) NOT NULL DEFAULT '1',
  `question` text NOT NULL,
  `allowed_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pl` int(11) NOT NULL,
  `assignment_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_ID`, `instructor`, `question`, `allowed_time`, `pl`, `assignment_type`) VALUES
(45, 1, 'a', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_answers`
--

CREATE TABLE `assignment_answers` (
  `assignment_answers_ID` int(11) NOT NULL,
  `assignment_answers` text NOT NULL,
  `right_answer` tinyint(1) NOT NULL,
  `assignment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_type`
--

CREATE TABLE `assignment_type` (
  `assignment_type_ID` int(11) NOT NULL,
  `assignment_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_type`
--

INSERT INTO `assignment_type` (`assignment_type_ID`, `assignment_type`) VALUES
(1, 'Quiz'),
(2, 'Competition'),
(3, 'Assignment');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_type_rank`
--

CREATE TABLE `assignment_type_rank` (
  `assignment_type_rank_ID` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `assignment` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_upload_answers`
--

CREATE TABLE `assignment_upload_answers` (
  `assignment_upload_answers_ID` int(100) NOT NULL,
  `student` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `answer` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Table structure for table `delete_request`
--

CREATE TABLE `delete_request` (
  `delete_request_ID` int(11) NOT NULL,
  `request` text NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delete_request`
--

INSERT INTO `delete_request` (`delete_request_ID`, `request`, `user_ID`) VALUES
(1, 'any thing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_ID` int(100) NOT NULL,
  `feedbacktime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `feedback` text NOT NULL,
  `user_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `Instructor_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `PL` int(11) NOT NULL,
  `CV` varchar(100) NOT NULL,
  `acceptance_reason` text NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`Instructor_ID`, `user_ID`, `PL`, `CV`, `acceptance_reason`, `accepted`) VALUES
(228, 295, 1, '../uploads/1405068977654.jpg', '3shan sa7eb el fekra maslan :\"D ?', 1),
(229, 296, 4, '../uploads/1405022106966.jpg', '...', 0),
(230, 297, 3, '../uploads/C4t5JagXUAAmf0K (1).png', 'msh mtabe3 wallahy', 0),
(233, 300, 5, '../uploads/1405068977654.jpg', '5lasna??', 0),
(237, 304, 5, '../uploads/095b149d954a49a5fad7df30bb6872db.jpg', 'e2balone', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ip_addresses`
--

CREATE TABLE `ip_addresses` (
  `ip_ID` int(11) NOT NULL,
  `ip` int(11) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `keyword_ID` int(11) NOT NULL,
  `keyword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `link_ID` int(11) NOT NULL,
  `pl` int(11) NOT NULL,
  `link_type` int(11) NOT NULL,
  `link_URL` varchar(100) NOT NULL,
  `link_description` text NOT NULL,
  `link_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`link_ID`, `pl`, `link_type`, `link_URL`, `link_description`, `link_language`) VALUES
(2, 1, 1, 'https://www.youtube.com/watch?v=-u9_T_CLZHY&list=PLDoPjvoNmBAzH72MTPuAAaYfReraNlQgM', 'Elzero web school by eng/Osama', 2),
(3, 1, 3, 'https://goo.gl/8uxnMr\r\n', 'Sublime', 1),
(7, 5, 1, 'https://goo.gl/DtPPs2', 'Bucky', 1),
(8, 5, 1, 'https://goo.gl/k4HQbo\r\n', 'Root school', 2),
(9, 5, 1, 'https://goo.gl/0wRQ7e\r\n', 'El-Desouky', 2);

-- --------------------------------------------------------

--
-- Table structure for table `link_language`
--

CREATE TABLE `link_language` (
  `link_language_ID` int(11) NOT NULL,
  `link_language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_language`
--

INSERT INTO `link_language` (`link_language_ID`, `link_language`) VALUES
(1, 'English'),
(2, 'Arabic');

-- --------------------------------------------------------

--
-- Table structure for table `link_type`
--

CREATE TABLE `link_type` (
  `link_type_ID` int(11) NOT NULL,
  `link_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_type`
--

INSERT INTO `link_type` (`link_type_ID`, `link_type`) VALUES
(3, 'Material'),
(2, 'Reference'),
(4, 'Slides'),
(1, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_ID` int(11) NOT NULL,
  `notification_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `notification` text NOT NULL,
  `notification_URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_ID`, `notification_time`, `notification`, `notification_URL`) VALUES
(58, '2017-05-04 08:36:12.000000', 'test', '#'),
(106, '2017-05-04 19:14:16.000000', 'Esraa Medhat added new assignment', 'http://localhost/Linkat/View/Student_assignments.php?subject=5?pl_name?=C++');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_ID` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_URL` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_ID`, `page_name`, `page_URL`, `keywords`) VALUES
(1, 'Home', 'http://localhost/Linkat/View/index.php', ''),
(2, 'About us', 'http://localhost/Linkat/View/aboutus.php', ''),
(3, 'Contact us', 'http://localhost/Linkat/View/contactus.php', ''),
(4, 'Login', 'http://localhost/Linkat/View/login.php', ''),
(5, 'Be instructor', 'http://localhost/Linkat/View/beinstructor.php', ''),
(6, 'Register', 'http://localhost/Linkat/View/Register.php', ''),
(9, 'Edit profile', 'http://localhost/Linkat/View/edit_profile.php', ''),
(10, 'Delete account', 'http://localhost/Linkat/View/delete_request', ''),
(11, 'Profile', 'http://localhost/Linkat/View/ins_profile.php#', ''),
(14, 'Profile', 'http://localhost/Linkat/View/Admin_profile.php#', ''),
(15, 'Logout', 'http://localhost/Linkat/View/logout.php', ''),
(16, 'Profile', 'http://localhost/Linkat/View/student_profile.php#', ''),
(17, 'Courses', 'http://localhost/Linkat/View/course.php', 'course study ');

-- --------------------------------------------------------

--
-- Table structure for table `page_keyword`
--

CREATE TABLE `page_keyword` (
  `page_keyword_ID` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `keyword` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(11) NOT NULL,
  `account_num` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `st_certificate` int(11) NOT NULL,
  `method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_ID` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programming_language`
--

CREATE TABLE `programming_language` (
  `pl_ID` int(11) NOT NULL,
  `pl_name` varchar(11) NOT NULL,
  `pl_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programming_language`
--

INSERT INTO `programming_language` (`pl_ID`, `pl_name`, `pl_description`) VALUES
(1, 'PHP', 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.\r\nNice, but what does that mean? An example:\r\nExample #1 An introductory example\r\n<!DOCTYPE HTML>\r\n<html>\r\n    <head>\r\n        <title>Example</title>\r\n    </head>\r\n    <body>\r\n\r\n        <?php\r\n            echo \"Hi, I\'m a PHP script!\";\r\n        ?>\r\n\r\n    </body>\r\n</html>\r\nInstead of lots of commands to output HTML (as seen in C or Perl), PHP pages contain HTML with embedded code that does \"something\" (in this case, output \"Hi, I\'m a PHP script!\"). The PHP code is enclosed in special start and end processing instructions <?php and ?> that allow you to jump into and out of \"PHP mode.\"\r\nWhat distinguishes PHP from something like client-side JavaScript is that the code is executed on the server, generating HTML which is then sent to the client. The client would receive the results of running that script, but would not know what the underlying code was. You can even configure your web server to process all your HTML files with PHP, and then there\'s really no way that users can tell what you have up your sleeve.\r\nThe best things in using PHP are that it is extremely simple for a newcomer, but offers many advanced features for a professional programmer. Don\'t be afraid reading the long list of PHP\'s features. You can jump in, in a short time, and start writing simple scripts in a few hours.\r\n\r\n'),
(2, 'HTML', 'XXXX'),
(3, 'CSS', 'XXX'),
(4, 'JAVA', 'XXX'),
(5, 'C++', 'a general-purpose programming language. It has imperative, object-oriented and generic programming features, while also providing facilities for low-level memory manipulation.');

-- --------------------------------------------------------

--
-- Table structure for table `rank_instructor`
--

CREATE TABLE `rank_instructor` (
  `rank_instructor_ID` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `instructor` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_ID` int(100) NOT NULL,
  `reply_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `reply` text NOT NULL,
  `ask_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE `student_answers` (
  `student_answers_ID` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `answers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_certificate`
--

CREATE TABLE `student_certificate` (
  `student_certificate_ID` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `certificate` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `pl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st_pl`
--

CREATE TABLE `st_pl` (
  `st_pl_ID` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `pl` int(11) NOT NULL,
  `certificate` tinyint(1) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `no_competitions` int(11) DEFAULT '0',
  `no_quiz` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_pl`
--

INSERT INTO `st_pl` (`st_pl_ID`, `student`, `pl`, `certificate`, `points`, `no_competitions`, `no_quiz`) VALUES
(22, 12, 1, 0, 0, 0, 0),
(23, 12, 5, 0, 0, 0, 0),
(24, 12, 4, 0, 0, 0, 0),
(25, 12, 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_rank_questions`
--

CREATE TABLE `type_rank_questions` (
  `type_rank_questions_ID` int(11) NOT NULL,
  `type_rank` int(11) NOT NULL,
  `questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(100) NOT NULL,
  `type` int(100) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `type`, `fname`, `lname`, `username`, `email`, `password`, `status`) VALUES
(1, 3, 'inst', 'test1', 'xyz', 'xyz@abc.com', '123456789', 0),
(2, 1, 'Admin', '1', 'Linkat', 'Linkat@gmail.com', 'Linkat123456', 0),
(12, 2, 'Maryam', 'Raafat', 'maryamraafat077', 'maryamraafat077@gmail.com', 'maryam123456789', 1),
(13, 2, 'esra', 'medhat', 'esra', 'esra@abc.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 0),
(295, 3, 'Moaz', 'Mostafa', 'moaz', 'moaz@gmail.com', 'moaz39', 0),
(296, 3, 'Maryam', 'Raafat', 'maryam', 'maryam@gmail.com', 'maryam62', 0),
(297, 3, 'Mostafa', 'Nabil', 'Mostafa', 'Mostafa@gmail.com', 'Mostafa89', 0),
(300, 3, 'Esraa', 'Medhat', 'Esraa', 'Esraa@gmail.com', 'Esraa28', 1),
(304, 3, 'Ibrahim', 'Allam', 'ibrahim', 'ibrahim@gmail.com', 'ibrahim45', 0),
(315, 2, 'Maryam', 'Raafat', 'maryam123', 'maryam123@gmail.com', '5e70cb6ceab92541670b7a486e420667ba00911a', 0),
(316, 2, 'Mostafa', 'Nabil', 'mnabil', 'mnabil@gmail.com', 'mnabil123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype_pages`
--

CREATE TABLE `usertype_pages` (
  `usertype_pages_ID` int(11) NOT NULL,
  `usertype` int(11) NOT NULL,
  `pages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype_pages`
--

INSERT INTO `usertype_pages` (`usertype_pages_ID`, `usertype`, `pages`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 3),
(4, 3, 9),
(6, 3, 11),
(9, 3, 15),
(10, 2, 2),
(11, 2, 3),
(12, 2, 9),
(13, 2, 16),
(14, 1, 14),
(15, 2, 17),
(17, 1, 15),
(18, 2, 15),
(19, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_ip`
--

CREATE TABLE `user_ip` (
  `user_ip_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `ip_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `user_ID` int(11) NOT NULL,
  `notifications_ID` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`user_ID`, `notifications_ID`, `seen`) VALUES
(1, 58, 0),
(12, 58, 0),
(12, 106, 0),
(13, 58, 0),
(300, 58, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_pic`
--

CREATE TABLE `user_profile_pic` (
  `user_profile_pic_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `profile_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `type_ID` int(100) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_ID`, `type`) VALUES
(1, 'Admin'),
(4, 'Guest'),
(3, 'Instructor'),
(2, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_competition`
--

CREATE TABLE `weekly_competition` (
  `weekly_competition_ID` int(11) NOT NULL,
  `start_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `assignment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ask`
--
ALTER TABLE `ask`
  ADD PRIMARY KEY (`ask_ID`),
  ADD UNIQUE KEY `ask` (`ask`(200)),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_ID`),
  ADD UNIQUE KEY `question` (`question`(200)),
  ADD KEY `pl` (`pl`),
  ADD KEY `assignment_type` (`assignment_type`),
  ADD KEY `instructor` (`instructor`);

--
-- Indexes for table `assignment_answers`
--
ALTER TABLE `assignment_answers`
  ADD PRIMARY KEY (`assignment_answers_ID`),
  ADD KEY `assignment` (`assignment`);

--
-- Indexes for table `assignment_type`
--
ALTER TABLE `assignment_type`
  ADD PRIMARY KEY (`assignment_type_ID`);

--
-- Indexes for table `assignment_type_rank`
--
ALTER TABLE `assignment_type_rank`
  ADD PRIMARY KEY (`assignment_type_rank_ID`),
  ADD KEY `student` (`student`),
  ADD KEY `assignment` (`assignment`);

--
-- Indexes for table `assignment_upload_answers`
--
ALTER TABLE `assignment_upload_answers`
  ADD PRIMARY KEY (`assignment_upload_answers_ID`),
  ADD KEY `student` (`student`),
  ADD KEY `question` (`question`);

--
-- Indexes for table `delete_request`
--
ALTER TABLE `delete_request`
  ADD PRIMARY KEY (`delete_request_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`Instructor_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `PL` (`PL`);

--
-- Indexes for table `ip_addresses`
--
ALTER TABLE `ip_addresses`
  ADD PRIMARY KEY (`ip_ID`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`keyword_ID`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`link_ID`),
  ADD UNIQUE KEY `link_URL` (`link_URL`),
  ADD UNIQUE KEY `link_ID` (`link_ID`),
  ADD KEY `pl` (`pl`),
  ADD KEY `link_type` (`link_type`),
  ADD KEY `link_language` (`link_language`);

--
-- Indexes for table `link_language`
--
ALTER TABLE `link_language`
  ADD PRIMARY KEY (`link_language_ID`);

--
-- Indexes for table `link_type`
--
ALTER TABLE `link_type`
  ADD PRIMARY KEY (`link_type_ID`),
  ADD UNIQUE KEY `link_type` (`link_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_ID`),
  ADD UNIQUE KEY `notification` (`notification`(100));

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_ID`);

--
-- Indexes for table `page_keyword`
--
ALTER TABLE `page_keyword`
  ADD PRIMARY KEY (`page_keyword_ID`),
  ADD KEY `page` (`page`),
  ADD KEY `keyword` (`keyword`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`),
  ADD KEY `method` (`method`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_ID`);

--
-- Indexes for table `programming_language`
--
ALTER TABLE `programming_language`
  ADD PRIMARY KEY (`pl_ID`);

--
-- Indexes for table `rank_instructor`
--
ALTER TABLE `rank_instructor`
  ADD PRIMARY KEY (`rank_instructor_ID`),
  ADD KEY `student` (`student`),
  ADD KEY `instructor` (`instructor`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_ID`),
  ADD KEY `ask_ID` (`ask_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`student_answers_ID`),
  ADD KEY `student` (`student`),
  ADD KEY `question` (`question`),
  ADD KEY `answers` (`answers`);

--
-- Indexes for table `student_certificate`
--
ALTER TABLE `student_certificate`
  ADD PRIMARY KEY (`student_certificate_ID`),
  ADD KEY `student` (`student`),
  ADD KEY `certificate` (`certificate`),
  ADD KEY `student_certificate_ibfk_3` (`pl`);

--
-- Indexes for table `st_pl`
--
ALTER TABLE `st_pl`
  ADD PRIMARY KEY (`st_pl_ID`),
  ADD KEY `student` (`student`),
  ADD KEY `pl` (`pl`);

--
-- Indexes for table `type_rank_questions`
--
ALTER TABLE `type_rank_questions`
  ADD PRIMARY KEY (`type_rank_questions_ID`),
  ADD KEY `type_rank` (`type_rank`),
  ADD KEY `questions` (`questions`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD PRIMARY KEY (`usertype_pages_ID`),
  ADD KEY `usertype` (`usertype`),
  ADD KEY `pages` (`pages`);

--
-- Indexes for table `user_ip`
--
ALTER TABLE `user_ip`
  ADD PRIMARY KEY (`user_ip_ID`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`user_ID`,`notifications_ID`),
  ADD KEY `notifications_ID` (`notifications_ID`);

--
-- Indexes for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  ADD PRIMARY KEY (`user_profile_pic_ID`),
  ADD KEY `user_profile_pic_ibfk_1` (`user_ID`),
  ADD KEY `user_profile_pic_ibfk_2` (`profile_pic`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`type_ID`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `weekly_competition`
--
ALTER TABLE `weekly_competition`
  ADD PRIMARY KEY (`weekly_competition_ID`),
  ADD KEY `assignment` (`assignment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ask`
--
ALTER TABLE `ask`
  MODIFY `ask_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `assignment_answers`
--
ALTER TABLE `assignment_answers`
  MODIFY `assignment_answers_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignment_type`
--
ALTER TABLE `assignment_type`
  MODIFY `assignment_type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `assignment_type_rank`
--
ALTER TABLE `assignment_type_rank`
  MODIFY `assignment_type_rank_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignment_upload_answers`
--
ALTER TABLE `assignment_upload_answers`
  MODIFY `assignment_upload_answers_ID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delete_request`
--
ALTER TABLE `delete_request`
  MODIFY `delete_request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_ID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `Instructor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- AUTO_INCREMENT for table `ip_addresses`
--
ALTER TABLE `ip_addresses`
  MODIFY `ip_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keyword_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `link_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `link_language`
--
ALTER TABLE `link_language`
  MODIFY `link_language_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `link_type`
--
ALTER TABLE `link_type`
  MODIFY `link_type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `page_keyword`
--
ALTER TABLE `page_keyword`
  MODIFY `page_keyword_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programming_language`
--
ALTER TABLE `programming_language`
  MODIFY `pl_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rank_instructor`
--
ALTER TABLE `rank_instructor`
  MODIFY `rank_instructor_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_ID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `student_answers_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_certificate`
--
ALTER TABLE `student_certificate`
  MODIFY `student_certificate_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `st_pl`
--
ALTER TABLE `st_pl`
  MODIFY `st_pl_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `type_rank_questions`
--
ALTER TABLE `type_rank_questions`
  MODIFY `type_rank_questions_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;
--
-- AUTO_INCREMENT for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  MODIFY `usertype_pages_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_ip`
--
ALTER TABLE `user_ip`
  MODIFY `user_ip_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  MODIFY `user_profile_pic_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `type_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `weekly_competition`
--
ALTER TABLE `weekly_competition`
  MODIFY `weekly_competition_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ask`
--
ALTER TABLE `ask`
  ADD CONSTRAINT `ask_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`assignment_type`) REFERENCES `assignment_type` (`assignment_type_ID`),
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`instructor`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `assiment_ibf_1` FOREIGN KEY (`pl`) REFERENCES `programming_language` (`pl_ID`);

--
-- Constraints for table `assignment_answers`
--
ALTER TABLE `assignment_answers`
  ADD CONSTRAINT `assignment_answers_ibfk_1` FOREIGN KEY (`assignment`) REFERENCES `assignment` (`assignment_ID`);

--
-- Constraints for table `assignment_type_rank`
--
ALTER TABLE `assignment_type_rank`
  ADD CONSTRAINT `assignment_type_rank_ibfk_1` FOREIGN KEY (`student`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `assignment_type_rank_ibfk_2` FOREIGN KEY (`assignment`) REFERENCES `assignment_type` (`assignment_type_ID`);

--
-- Constraints for table `assignment_upload_answers`
--
ALTER TABLE `assignment_upload_answers`
  ADD CONSTRAINT `assignment_upload_answers_ibfk_1` FOREIGN KEY (`student`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `assignment_upload_answers_ibfk_2` FOREIGN KEY (`question`) REFERENCES `assignment` (`assignment_ID`);

--
-- Constraints for table `delete_request`
--
ALTER TABLE `delete_request`
  ADD CONSTRAINT `delete_request_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `instructor_ibfk_3` FOREIGN KEY (`PL`) REFERENCES `programming_language` (`pl_ID`);

--
-- Constraints for table `ip_addresses`
--
ALTER TABLE `ip_addresses`
  ADD CONSTRAINT `ip_addresses_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`type_ID`);

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibf_1` FOREIGN KEY (`pl`) REFERENCES `programming_language` (`pl_ID`),
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`link_type`) REFERENCES `link_type` (`link_type_ID`),
  ADD CONSTRAINT `links_ibfk_2` FOREIGN KEY (`link_language`) REFERENCES `link_language` (`link_language_ID`);

--
-- Constraints for table `page_keyword`
--
ALTER TABLE `page_keyword`
  ADD CONSTRAINT `page_keyword_ibfk_1` FOREIGN KEY (`page`) REFERENCES `pages` (`page_ID`),
  ADD CONSTRAINT `page_keyword_ibfk_2` FOREIGN KEY (`keyword`) REFERENCES `keywords` (`keyword_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`method`) REFERENCES `payment_method` (`payment_method_ID`);

--
-- Constraints for table `rank_instructor`
--
ALTER TABLE `rank_instructor`
  ADD CONSTRAINT `rank_instructor_ibfk_1` FOREIGN KEY (`student`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `rank_instructor_ibfk_2` FOREIGN KEY (`instructor`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`ask_ID`) REFERENCES `ask` (`ask_ID`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD CONSTRAINT `student_answers_ibfk_1` FOREIGN KEY (`student`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `student_answers_ibfk_2` FOREIGN KEY (`question`) REFERENCES `assignment` (`assignment_ID`),
  ADD CONSTRAINT `student_answers_ibfk_3` FOREIGN KEY (`answers`) REFERENCES `assignment_answers` (`assignment_answers_ID`);

--
-- Constraints for table `st_pl`
--
ALTER TABLE `st_pl`
  ADD CONSTRAINT `st_pl_ibfk_1` FOREIGN KEY (`student`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `st_pl_infk_2` FOREIGN KEY (`pl`) REFERENCES `programming_language` (`pl_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type`) REFERENCES `user_type` (`type_ID`);

--
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `user_notifications_ibfk_2` FOREIGN KEY (`notifications_ID`) REFERENCES `notifications` (`notification_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
