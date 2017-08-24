CREATE DATABASE IF NOT EXISTS `patamarks` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `patamarks`;

-- --------------------------------------------------------

--
-- Table structure for table `acl`
--

CREATE TABLE `acl` (
  `ai` int(10) UNSIGNED NOT NULL,
  `action_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acl_actions`
--

CREATE TABLE `acl_actions` (
  `action_id` int(10) UNSIGNED NOT NULL,
  `action_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `action_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acl_categories`
--

CREATE TABLE `acl_categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `category_desc` varchar(100) NOT NULL COMMENT 'Human readable description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `due` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `tutor_id`, `unit_id`, `group_id`, `due`) VALUES
(1, 1, 1, 9, '0000-00-00'),
(2, 1, 1, 7, '0000-00-00'),
(3, 1, 1, 5, '0000-00-00'),
(4, 1, 1, 8, '0000-00-00'),
(5, 1, 1, 8, '0000-00-00'),
(6, 9, 2, 7, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `auth_sessions`
--

CREATE TABLE `auth_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `col_id` int(3) NOT NULL,
  `col_name` varchar(45) DEFAULT NULL,
  `dean` int(5) DEFAULT NULL,
  `abbr` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`col_id`, `col_name`, `dean`, `abbr`) VALUES
(1, 'College Of Human Resource Department', 1, 'CHRD');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `idcourse` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `abbreviation` varchar(45) DEFAULT NULL,
  `semesters` varchar(45) DEFAULT NULL,
  `total_units` varchar(45) DEFAULT NULL,
  `college_offered_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`idcourse`, `name`, `abbreviation`, `semesters`, `total_units`, `college_offered_id`) VALUES
(1, 'Bachelors in Business Information Technology', 'BBT', '3', '20', 1),
(2, 'Bachelors in Purchasing and Supplies', 'BPS', '3', '20', 1),
(3, 'Bachelors in Commerce', 'BCM', '3', '20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `denied_access`
--

CREATE TABLE `denied_access` (
  `ai` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `exam_type_id` int(3) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `max_marks` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(6) NOT NULL,
  `exam_type` int(3) DEFAULT NULL,
  `ass_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_type`, `ass_id`, `date`) VALUES
(1, 101, 1, '2017-04-04'),
(2, 102, 1, '2017-04-05'),
(3, 103, 1, '2017-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `gradings`
--

CREATE TABLE `gradings` (
  `grade` char(1) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `min_score` int(2) DEFAULT NULL,
  `max_score` int(2) DEFAULT NULL,
  `points` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `family_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `primary_fname` varchar(45) DEFAULT NULL,
  `primary_sname` varchar(45) DEFAULT NULL,
  `primary_email` varchar(45) DEFAULT NULL,
  `primary_phone` varchar(45) DEFAULT NULL,
  `primary_relation` varchar(45) DEFAULT NULL,
  `secondary_fname` varchar(45) DEFAULT NULL,
  `secondary_sname` varchar(45) DEFAULT NULL,
  `secondary_email` varchar(45) DEFAULT NULL,
  `secondary_phone` varchar(45) DEFAULT NULL,
  `secondary_relation` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ips_on_hold`
--

CREATE TABLE `ips_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `key`
--

CREATE TABLE `key` (
  `id` int(11) NOT NULL,
  `key` varchar(40) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `ignore_limits` tinyint(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_errors`
--

CREATE TABLE `login_errors` (
  `ai` int(10) UNSIGNED NOT NULL,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(8) NOT NULL,
  `exam_id` int(3) DEFAULT NULL,
  `stud_id` int(5) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `tcreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `exam_id`, `stud_id`, `marks`, `tcreated`) VALUES
(1, 1, 0, 70, NULL),
(2, 1, 0, 70, NULL),
(3, 1, 0, 80, NULL),
(4, 1, 0, 80, NULL),
(5, 1, 0, 80, NULL),
(6, 1, 1, 80, NULL),
(7, 1, 1, 80, NULL),
(8, 1, 1, 80, NULL),
(9, 1, 1, 80, NULL),
(10, 1, 1, 80, NULL),
(11, 1, 1, 80, NULL),
(12, 1, 1, 81, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` int(5) NOT NULL,
  `admission_no` varchar(10) DEFAULT NULL,
  `identification` varchar(12) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `sname` varchar(45) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `group_id` int(5) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `nationality` varchar(10) NOT NULL,
  `class_rep` tinyint(1) DEFAULT '0',
  `salutation` varchar(6) NOT NULL,
  `marital` varchar(10) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `status_deets` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `admission_no`, `identification`, `fname`, `sname`, `userid`, `group_id`, `email`, `dob`, `gender`, `nationality`, `class_rep`, `salutation`, `marital`, `status`, `status_deets`, `updated_at`) VALUES
(1, 'JKUSHD1700', '30000001', 'Rita', 'Ora', 879329678, 9, 'rita.ora@students.jkuat.ac.ke', '0000-00-00', 'Female', 'Kenya', NULL, 'Mr', 'Single', 'Inactive', '', '2017-04-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_groups`
--

CREATE TABLE `tuition_groups` (
  `group_id` int(5) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `course_id` int(7) DEFAULT NULL,
  `intake` varchar(7) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuition_groups`
--

INSERT INTO `tuition_groups` (`group_id`, `name`, `course_id`, `intake`, `status`) VALUES
(4, 'Group A', 1, '2017-03', NULL),
(5, 'Group B', 1, '2017-09', NULL),
(6, 'Group A', 2, '2017-03', NULL),
(7, 'Group B', 2, '2017-09', NULL),
(8, 'Group A', 3, '2017-03', NULL),
(9, 'Group B', 3, '2017-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutor_id` int(5) NOT NULL,
  `staff_id` varchar(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `sname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `marital` varchar(45) DEFAULT NULL,
  `salutation` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `status_deets` varchar(45) DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `identification` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutor_id`, `staff_id`, `user_id`, `fname`, `sname`, `email`, `dob`, `gender`, `marital`, `salutation`, `status`, `status_deets`, `nationality`, `identification`) VALUES
(1, 'JKUL1701', 201718081, 'Mwangi', 'Kiunjuri', 'mwangi.kiunjuri@jkuat.ac.ke', '1988-01-01', 'Male', 'Married', 'Dr', 'Active', '', 'Kenya', '10000000'),
(2, 'JKUL1702', 427499026, 'Stephen', 'Baraza', 'stephen.baraza@jkuat.ac.ke', '1988-01-01', '0', 'Married', 'Dr', 'Active', '', 'Kenya', '10000001'),
(3, 'JKUL1703', 596927769, 'Anne', 'Mwalu', 'anne.mwalu@jkuat.ac.ke', '1988-01-01', '0', 'Single', 'Mrs', 'Active', '', 'Kenya', '10000002'),
(4, 'JKUL1704', 236829167, 'Justin ', 'Timberlake', 'justin.timberlake@jkuat.ac.ke', '1988-01-01', '0', 'Single', 'Mr', 'Active', '', 'America', 'AD08H3454l'),
(5, 'JKUL1705', 877450556, 'Andrea', 'Kolarov', 'andrea.kolarov@jkuat.ac.ke', '1988-01-01', '0', 'Married', 'Mrs', 'Active', '', 'Russia', 'AD17H5589B'),
(6, 'JKUL1706', 1988216380, 'Catherine', 'Kekovole', 'catherine.kekovole@jkuat.ac.ke', '1988-01-01', '0', 'Single', 'Miss', 'Active', '', 'Kenya', '10000003'),
(7, 'JKUL1707', 2147483647, 'David', 'Mwenda', 'david.mwenda@jkuat.ac.ke', '1988-01-01', '0', 'Single', 'Dr', 'Active', '', 'Kenya', '10000004'),
(8, 'JKUL1708', 1493045670, 'Anne', 'Wangu', 'anne.wangu@jkuat.ac.ke', '1988-01-01', '0', 'Single', 'Dr', 'Active', '', 'Kenya', '10000005'),
(9, 'JKUL1709', 1461131983, 'Kepha', 'Bidii', 'kepha.bidii@jkuat.ac.ke', '1988-01-01', '0', 'Single', 'Mr', 'Active', '', 'Kenya', '10000006'),
(10, 'JKUL1710', 1662589801, 'Donald', 'Musiga', 'donald.musiga@jkuat.ac.ke', '1988-01-01', '0', 'Married', 'Dr', 'Active', '', 'Kenya', '10000007');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_code` varchar(45) DEFAULT NULL,
  `unit_name` varchar(45) DEFAULT NULL,
  `abbr` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_code`, `unit_name`, `abbr`) VALUES
(1, 'HCB 4503', 'Introduction to macroeconomics', 'Macro'),
(2, 'ICS 2203', 'eSVD', 'NMG'),
(3, 'ICS 3434', 'Introduction to Micro Economics I', 'MicroEcon1'),
(4, 'ICS 3435', 'Introductio to MicroEconomics II', 'MicroEcon2'),
(5, 'ICS 401', 'Distributed Systems', 'D.S'),
(6, 'HBT 2202', 'ICT & Society', 'ICTS'),
(7, 'ICS 2302', 'Software Engineering', 'S.E'),
(8, 'ICS 2104', 'Object Oriented Programming I', 'OOP1'),
(9, 'ICS 2201', 'Object Oriented Programming II', 'OOP2'),
(10, 'HBT 2306', 'E-Commerce', 'E-com'),
(11, 'HBC 2203', 'Cost Accounting', 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `username_or_email_on_hold`
--

CREATE TABLE `username_or_email_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) UNSIGNED NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `created_at`, `modified_at`) VALUES
(201718081, 'mwangi.kiunjuri@jkuat.ac.ke', 'mwangi.kiunjuri@jkuat.ac.ke', 9, '0', '$2y$11$H74GeeHyJpaqLifH0XbRmO51GmdGJdcq/NFBHMy5gAFR4D610YHX.', NULL, NULL, NULL, NULL, '2017-04-13 09:28:37', '2017-04-13 06:58:49'),
(236829167, 'justin.timberlake@jkuat.ac.ke', 'justin.timberlake@jkuat.ac.ke', 9, '0', '$2y$11$Q0Z49/03EP5mtGnO.Z.YFekaDDzuQqbW4yTTUUikLOvurZD4WwtD6', NULL, NULL, NULL, NULL, '2017-04-13 09:37:07', '2017-04-13 06:37:07'),
(427499026, 'stephen.baraza@jkuat.ac.ke', 'stephen.baraza@jkuat.ac.ke', 9, '0', '$2y$11$Fq5gJOhWjfiPl9ukO92nOujTld6EVHSQDWwZ7Uc.Z0sPCNNhM8/2W', NULL, NULL, NULL, NULL, '2017-04-13 09:32:51', '2017-04-13 06:32:51'),
(596927769, 'anne.mwalu@jkuat.ac.ke', 'anne.mwalu@jkuat.ac.ke', 9, '0', '$2y$11$SwreTTzODH3TrH7uCLFqTe2fwlK/9oOWw0llETPZ3VzrDIPYzSVzu', NULL, NULL, NULL, NULL, '2017-04-13 09:35:16', '2017-04-13 06:35:16'),
(877450556, 'andrea.kolarov@jkuat.ac.ke', 'andrea.kolarov@jkuat.ac.ke', 9, '0', '$2y$11$mVAbDzirAnHTEf07KZowjuXkgzBaxS.MhNPFDImOQuCU5Nl14/Tee', NULL, NULL, NULL, NULL, '2017-04-13 09:39:27', '2017-04-13 06:39:27'),
(879329678, '', 'rita.ora@students.jkuat.ac.ke', 0, '0', '$2y$11$QKkQT1g5M3lCNw0gB9j68.P48HwNQoj/igu.d23S4wZ498vCyBO4K', NULL, NULL, NULL, NULL, '2017-04-13 16:56:24', '2017-04-13 13:56:24'),
(1461131983, 'kepha.bidii@jkuat.ac.ke', 'kepha.bidii@jkuat.ac.ke', 9, '0', '$2y$11$jnKaxobZKJWBhPqqjQBNquNdVcPWLHi4kEzPAm6BoAuOVbWX./Zvm', NULL, NULL, NULL, NULL, '2017-04-13 09:53:01', '2017-04-13 06:53:01'),
(1493045670, 'anne.wangu@jkuat.ac.ke', 'anne.wangu@jkuat.ac.ke', 9, '0', '$2y$11$BT6gK.FFY.qBZ8G6B4BXTeJH/G0BOJumJ9KbjqyPsqnIKczzVsp2G', NULL, NULL, NULL, NULL, '2017-04-13 09:50:28', '2017-04-13 06:50:28'),
(1662589801, 'donald.musiga@jkuat.ac.ke', 'donald.musiga@jkuat.ac.ke', 9, '0', '$2y$11$4O4Zqrdicmi9Yrr1M7Djr.RHVYUhmEG5ocyyDw6UV/mdFyd5WedS6', NULL, NULL, NULL, NULL, '2017-04-13 09:56:22', '2017-04-13 06:56:22'),
(1988216380, 'catherine.kekovole@jkuat.ac.ke', 'catherine.kekovole@jkuat.ac.ke', 9, '0', '$2y$11$aQOu3NJ8Hl8/ttFUhB7h9OnK6n.IcSyuirjt.8MLP/Y0mSyWQj8iO', NULL, NULL, NULL, NULL, '2017-04-13 09:45:43', '2017-04-13 06:45:43'),
(3360142971, 'david.mwenda@jkuat.ac.ke', 'david.mwenda@jkuat.ac.ke', 9, '0', '$2y$11$wO3VQ5xMnH1O.HDtGFaFweuEm9OxNw9Eg1N2u0tThp4abtJ/nyaGC', NULL, NULL, NULL, NULL, '2017-04-13 09:48:47', '2017-04-13 06:48:47');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `ca_passwd_trigger` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    IF ((NEW.passwd <=> OLD.passwd) = 0) THEN
        SET NEW.passwd_modified_at = NOW();
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`ai`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `acl_categories`
--
ALTER TABLE `acl_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_code` (`category_code`),
  ADD UNIQUE KEY `category_desc` (`category_desc`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_sessions`
--
ALTER TABLE `auth_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`col_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`idcourse`);

--
-- Indexes for table `denied_access`
--
ALTER TABLE `denied_access`
  ADD PRIMARY KEY (`ai`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`exam_type_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `gradings`
--
ALTER TABLE `gradings`
  ADD PRIMARY KEY (`grade`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`family_id`);

--
-- Indexes for table `ips_on_hold`
--
ALTER TABLE `ips_on_hold`
  ADD PRIMARY KEY (`ai`);

--
-- Indexes for table `key`
--
ALTER TABLE `key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_errors`
--
ALTER TABLE `login_errors`
  ADD PRIMARY KEY (`ai`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tuition_groups`
--
ALTER TABLE `tuition_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `username_or_email_on_hold`
--
ALTER TABLE `username_or_email_on_hold`
  ADD PRIMARY KEY (`ai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl`
--
ALTER TABLE `acl`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acl_actions`
--
ALTER TABLE `acl_actions`
  MODIFY `action_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acl_categories`
--
ALTER TABLE `acl_categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `col_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `idcourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `denied_access`
--
ALTER TABLE `denied_access`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `family_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ips_on_hold`
--
ALTER TABLE `ips_on_hold`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `key`
--
ALTER TABLE `key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_errors`
--
ALTER TABLE `login_errors`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tuition_groups`
--
ALTER TABLE `tuition_groups`
  MODIFY `group_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutor_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `username_or_email_on_hold`
--
ALTER TABLE `username_or_email_on_hold`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acl`
--
ALTER TABLE `acl`
  ADD CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `acl_actions` (`action_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD CONSTRAINT `acl_actions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `acl_categories` (`category_id`) ON DELETE CASCADE;
