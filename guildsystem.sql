-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 20, 2026 at 02:36 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guildsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE IF NOT EXISTS `candidate` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `candidate_name` varchar(100) DEFAULT NULL,
  `manifesto` text,
  `slogan` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `approval_status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `invoice` varchar(100) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `amount_due` decimal(10,2) DEFAULT NULL,
  `nomination_status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending',
  `approval_comment` text,
  `nomination_date` date DEFAULT NULL,
  `declaration` text,
  PRIMARY KEY (`candidate_id`),
  KEY `student_id` (`student_id`),
  KEY `position_id` (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `student_id`, `position_id`, `candidate_name`, `manifesto`, `slogan`, `photo`, `approval_status`, `invoice`, `amount_paid`, `amount_due`, `nomination_status`, `approval_comment`, `nomination_date`, `declaration`) VALUES
(1, 2500800325, 2, 'MUYANJA ANDREW', 'me', 'I GREET YOU', 'ANDREW.jpg', 'Approved', '2345DF', '1150000.00', '0.00', 'Accepted', 'go', '2026-03-15', 'ANDREW'),
(2, 2500810384, 2, 'EMONG DANIEL', 'YOU', 'YOU', 'DANIEL.jpg', 'Approved', '23456545433576543', '1150000.00', '0.00', 'Accepted', 'go', '2026-03-15', 'DANIEL'),
(3, 2400802357, 2, 'AHURIRA CHRISTIAN', 'PLEASE', 'YOU NEVER KNOW', 'CHRISTIAN.jpg', 'Approved', '2354', '1150000.00', '0.00', 'Accepted', 'go', '2026-03-15', 'CHRISTIAN'),
(4, 2400801971, 2, 'ABIGABA HELLEN', 'ME', 'leadership that lisitens', 'HELLEN.jpg', 'Approved', '2435w', '1150000.00', '0.00', 'Accepted', 'go', '2026-03-15', 'go'),
(5, 2400814921, 1, 'SSENABULYA ADRIAN', 'people', 'PEOPLE POWER', 'ADRIAN.jpg', 'Approved', 'sf35344', '1150000.00', '0.00', 'Accepted', 'go', '2026-03-15', 'go'),
(6, 2400814775, 1, 'OKELLO JAMES', 'JUST', 'us', 'OKELLO JAMES.jpg', 'Approved', '243rwe', '1150000.00', '0.00', 'Accepted', 'go', '2026-03-15', 'go'),
(7, 2300800009, 1, 'AGABA EDWARD', 'ok', 'sanitizing the system', 'EDWARD.jpg', 'Approved', '235er', '1150000.00', '0.00', 'Accepted', 'go', '2026-03-15', 'me');

-- --------------------------------------------------------

--
-- Stand-in structure for view `candidate_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `candidate_view`;
CREATE TABLE IF NOT EXISTS `candidate_view` (
`approval_status` enum('Pending','Approved','Rejected')
,`candidate_id` int(11)
,`candidate_name` varchar(100)
,`position_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

DROP TABLE IF EXISTS `election`;
CREATE TABLE IF NOT EXISTS `election` (
  `election_id` int(11) NOT NULL AUTO_INCREMENT,
  `election_name` varchar(100) DEFAULT NULL,
  `election_year` year(4) DEFAULT NULL,
  `voting_start` datetime DEFAULT NULL,
  `voting_end` datetime DEFAULT NULL,
  `election_status` enum('Active','Closed') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`election_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`election_id`, `election_name`, `election_year`, `voting_start`, `voting_end`, `election_status`) VALUES
(1, 'Guild Election 2026', 2026, '2026-04-15 08:00:00', '2026-04-15 17:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `election_id` int(11) DEFAULT NULL,
  `position_name` varchar(100) DEFAULT NULL,
  `description` text,
  `maximum_candidates` int(11) DEFAULT NULL,
  `faculty` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `position_type` enum('Universal','Faculty') DEFAULT NULL,
  `position_status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`position_id`),
  KEY `election_id` (`election_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `election_id`, `position_name`, `description`, `maximum_candidates`, `faculty`, `position_type`, `position_status`) VALUES
(1, 1, 'GUILD PRESIDENT', 'This is the leader of all student heads at student level', 5, NULL, 'Universal', 'Active'),
(2, 1, 'GRC SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'This is the representative at student body at faculty level', 4, 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'Faculty', 'Active'),
(3, 1, 'GRC SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'the', 5, 'EDUCATION', 'Faculty', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` bigint(20) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `s_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `other_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `year_of_study` varchar(20) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `criminal_record` enum('Pending','Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pending',
  `has_voted` enum('Yes','No') DEFAULT 'No',
  `role` enum('student','candidate','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'student',
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `f_name`, `s_name`, `other_name`, `email`, `password`, `year_of_study`, `faculty`, `criminal_record`, `has_voted`, `role`) VALUES
(2400804241, 'BALUKU', 'WYCLIF ', 'KAMANYOLA', '2400804241@std.kyu.ac.ug', '$2y$10$lpSjmdn70q15zqtlZtDh8.Y0s9GHt54S7pIybk8hdSkCFrUD6GQlu', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'No', 'admin'),
(2400818366, 'NASIPONDI ', 'JOY', ' MARY', '2400818366@std.kyu.ac.ug', '$2y$10$E5ACflgF9J0zE4CnX0fkWeFpXZSyv8UTPNFVSWiInH5iOCwrSUMCi', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'student'),
(2400804062, 'AYEBAZIBWE', 'PETER', '', '2400804062@std.kyu.ac.ug', '$2y$10$4m09wFh901dnsQ0hO1OLn.nmy3rCaDTcQ4siSKKyKL.ZPKGZ45z2C', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'student'),
(2400810220, 'NGONDE', 'EMMANUEL', '', '2400810220@std.kyu.ac.ug', '$2y$10$eZghYsKtUr7WuplsmaHftewf04NzBI81eIH/Gd87OjkZEPon0P9mq', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'student'),
(2400810950, 'OKELLO', 'JOSHUA ', 'BLAISE', '2400810950@std.kyu.ac.ug', '$2y$10$6QbKdM4incebeIUHCGLttePAlLOPKDgHfi1Eaadk4Vjnv/6jqjwCG', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'student'),
(2400805911, 'KAYONGO', 'ENOCK ', 'NSEREKO', '2400805911@std.kyu.ac.ug', '$2y$10$Dq51CnrWGbw1gGZg5NCmt.3YyqzlxTrI5HQ8/ah.RaOH1TwzdVWOy', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'student'),
(2400803250, 'ANGUAKU', 'ARNOLD', '', '2400803250@std.kyu.ac.ug', '$2y$10$EcavskwgO8tdxowmAkrHt.IhwR0BZxX/M1gETecGUEKbohXHckh9y', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'No', 'student'),
(2400805263, 'KABOGOZZA', 'BENJAMIN', '', '2400805263@std.kyu.ac.ug', '$2y$10$pCEBapqwzrz.AnArKFqIpuLprRxA35OoH7/L.ZbGTPCkHsv15xp0O', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'student'),
(2300800009, 'AGABA', 'EDWARD', '', '2300800009@std.kyu.ac.ug', '$2y$10$IGE1EhO52fwOhvimhEoKE.gHV2x3vHM0i5A4/S7xMlc76niW2lpPe', 'Year 3', 'ENGINEERING', 'No', 'Yes', 'candidate'),
(2400801971, 'ABIGABA', 'HELLEN', '', '2400801971@std.kyu.ac.ug', '$2y$10$bT0yqSZumpFYmkAa2mQWY.M3gJmSp7GM7Eo/frmyP0gT9TunMzUhq', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'candidate'),
(2400802357, 'AHURIRA', 'CHRISTIAN', '', '2400802357@std.kyu.ac.ug', '$2y$10$QAsnpQyjtxhJkGe5XlIHD.KYsXidvNiNn.u0n69PtiA8ewmPZ41qe', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'candidate'),
(2500810384, 'EMONG', 'DANIEL', '', '2500810384@std.kyu.ac.ug', '$2y$10$QbBTifM.h73wB.CmIdA/cOmcmiWtJ4Zgj9qeWIDjFToaGYRlNo96W', 'Year 1', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'candidate'),
(2500800325, 'MUYANJA ', 'ANDREW', '', '2500800325@std.kyu.ac.ug', '$2y$10$cOkULFRRI9oYGCKscYxNluuF3CM64QAGbxdkKzRBl4LNl3opj6imu', 'Year 1', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'No', 'Yes', 'candidate'),
(2400814775, 'OKELLO', 'JAMES', '', '2400814775@std.kyu.ac.ug', '$2y$10$NA5xMTUdY9Edcg8GCu6FBu8.7WvoEmh76pl8Jr.l8A0exZ6N/xra2', 'Year 2', 'EDUCATION', 'No', 'Yes', 'candidate'),
(2400814921, 'SSENABULYA', 'ADRIAN', '', '2400814921@std.kyu.ac.ug', '$2y$10$i6Puk9Ylw2MIqzMHGYxgPeENXl79hNi20MCrw1W.iAi30LSjHOy/e', 'Year 2', 'BUSSINESS', 'No', 'Yes', 'candidate'),
(2400802197, 'AGABA', 'JOEL', 'JOHN', '2400802197@std.kyu.ac.ug', '$2y$10$H0FofC5E4BCJj8mGJNnG0.ncAe/8xI8csqMrK2mvEIaxopRCW46oO', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'Pending', 'No', 'student'),
(2400810383, 'NOWAMANI', 'TIMOTHY', '', '2400810383@std.kyu.ac.ug', '$2y$10$ts69a0X85l0I5KDQPDokmeQx6l87E2tIlLMq9LnZg51XjuxnkHwgm', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'Pending', 'No', 'student'),
(2400807239, 'mpanja', 'thomas', '', '2400807239@std.kyu.ac.ug', '$2y$10$4e7hDIuRgKxrN7R4.2DZPuowPOBXHjCH55cC7UZAy3x0f2Gdk8Exq', 'Year 2', 'SCHOOL OF COMPUTING AND INFORMATION SCIENCE', 'Pending', 'Yes', 'student'),
(12, 'james', 'Agaba', '', '300@std.kyu.ac.ug', '$2y$10$7IxLxi5YsFMjhKkzi2oPsudduWQwbfiO6my7x22ATSsukBvrNhct6', 'Year 3', 'COMPUTING', 'Pending', 'No', 'student'),
(200, 'Timothy', 'naki', '', '2000@std.kyu.ac.ug', '$2y$10$3mvU09jXTo41C/SHtpPmOOAj9xMKpxdEzWRZmh1w/5vdNpTgMUCQy', 'Year 3', 'COMPUTING', 'Pending', 'No', 'student'),
(12000, 'zz', 'ww', 'grace', '2222@std.kyu.ac.g', '$2y$10$FB7yT9TgIqLfzhFvmGiAhO3KAqESmgtywqQxUxRMMdwTZ231j6svi', 'Year 3', 'EDUCATION', 'Pending', 'No', 'student'),
(100, 'emm', 'ngodne', '', '100@std.kyu.ac.ug', '$2y$10$KfcJWtW0uXIyBTJ4c2fwYe6nzzMjBjw2IQ9sXDA9bW80MXciYgnQO', 'Year 3', 'COMPUTING', 'Pending', 'Yes', 'student');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `student_view`;
CREATE TABLE IF NOT EXISTS `student_view` (
`criminal_record` enum('Pending','Yes','No')
,`email` varchar(100)
,`f_name` varchar(100)
,`faculty` varchar(100)
,`has_voted` enum('Yes','No')
,`other_name` varchar(100)
,`password` varchar(255)
,`role` enum('student','candidate','admin')
,`s_name` varchar(100)
,`student_id` bigint(20)
,`year_of_study` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `vote_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vote_id`),
  KEY `student_id` (`student_id`),
  KEY `position_id` (`position_id`),
  KEY `candidate_id` (`candidate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `student_id`, `position_id`, `candidate_id`, `vote_time`) VALUES
(1, 2400818366, 1, 7, '2026-05-12 12:24:51'),
(2, 2400818366, 2, 4, '2026-05-12 12:24:51'),
(3, 2400804062, 1, 6, '2026-05-12 12:25:54'),
(4, 2400804062, 2, 3, '2026-05-12 12:25:54'),
(5, 2400810220, 1, 6, '2026-05-12 12:26:37'),
(6, 2400810220, 2, 2, '2026-05-12 12:26:37'),
(7, 2400810950, 1, 7, '2026-05-12 12:27:37'),
(8, 2400810950, 2, 4, '2026-05-12 12:27:37'),
(9, 2400805911, 1, 7, '2026-05-12 12:29:17'),
(10, 2400805911, 2, 3, '2026-05-12 12:29:17'),
(11, 2400805263, 1, 7, '2026-05-12 12:31:56'),
(12, 2400805263, 2, 1, '2026-05-12 12:31:56'),
(13, 2500800325, 1, 7, '2026-05-12 12:33:56'),
(14, 2500800325, 2, 1, '2026-05-12 12:33:56'),
(15, 2500810384, 1, 7, '2026-05-12 12:34:48'),
(16, 2500810384, 2, 2, '2026-05-12 12:34:48'),
(17, 2400802357, 1, 7, '2026-05-12 12:35:37'),
(18, 2400802357, 2, 3, '2026-05-12 12:35:37'),
(19, 2400801971, 1, 7, '2026-05-12 12:37:06'),
(20, 2400801971, 2, 4, '2026-05-12 12:37:06'),
(21, 2400814921, 1, 5, '2026-05-12 12:38:54'),
(22, 2400814775, 1, 6, '2026-05-12 12:39:32'),
(23, 2300800009, 1, 7, '2026-05-12 12:40:52'),
(24, 2400807239, 1, 7, '2026-05-19 13:25:58'),
(25, 2400807239, 2, 4, '2026-05-19 13:25:58'),
(26, 24, 1, 5, '2026-05-19 13:59:40'),
(27, 100, 1, 5, '2026-05-19 15:45:33');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vote_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vote_view`;
CREATE TABLE IF NOT EXISTS `vote_view` (
`candidate_name` varchar(100)
,`f_name` varchar(100)
,`position_name` varchar(100)
,`s_name` varchar(100)
,`vote_id` int(11)
,`vote_time` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `candidate_view`
--
DROP TABLE IF EXISTS `candidate_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `candidate_view`  AS  select `candidate`.`candidate_id` AS `candidate_id`,`candidate`.`candidate_name` AS `candidate_name`,`positions`.`position_name` AS `position_name`,`candidate`.`approval_status` AS `approval_status` from (`candidate` join `positions` on((`candidate`.`position_id` = `positions`.`position_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `student_view`
--
DROP TABLE IF EXISTS `student_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_view`  AS  select `student`.`student_id` AS `student_id`,`student`.`f_name` AS `f_name`,`student`.`s_name` AS `s_name`,`student`.`other_name` AS `other_name`,`student`.`email` AS `email`,`student`.`password` AS `password`,`student`.`year_of_study` AS `year_of_study`,`student`.`faculty` AS `faculty`,`student`.`criminal_record` AS `criminal_record`,`student`.`has_voted` AS `has_voted`,`student`.`role` AS `role` from `student` ;

-- --------------------------------------------------------

--
-- Structure for view `vote_view`
--
DROP TABLE IF EXISTS `vote_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vote_view`  AS  select `vote`.`vote_id` AS `vote_id`,`student`.`f_name` AS `f_name`,`student`.`s_name` AS `s_name`,`positions`.`position_name` AS `position_name`,`candidate`.`candidate_name` AS `candidate_name`,`vote`.`vote_time` AS `vote_time` from (((`vote` join `student` on((`vote`.`student_id` = `student`.`student_id`))) join `candidate` on((`vote`.`candidate_id` = `candidate`.`candidate_id`))) join `positions` on((`vote`.`position_id` = `positions`.`position_id`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
