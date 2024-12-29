-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2024 at 01:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prac_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `admin_pass` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Admin Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int NOT NULL,
  `course_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `course_desc` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `course_author` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `course_img` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `course_duration` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `course_price` int NOT NULL,
  `course_original_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_original_price`) VALUES
(8, 'After SSC English', 'Enhance your post-SSC journey with our tailored \'After SSC English\' course. Perfect your language skills and communication prowess, ensuring a confident stride into higher academic pursuits or professional endeavors.', 'Swapnil Tarafdar', '../image/courseimg/How-to-Learn-English-Speaking-at-Home-960x540.jpg', '3 Hours', 550, 1550),
(9, 'Instructional Technology', 'Delves into the utilization of digital tools and techniques to optimize teaching methodologies. This course empowers educators with practical skills to leverage technology for enhanced instruction and student engagement.', 'Sumona Afroz', '../image/courseimg/16x9 Large.jpg', '3 Months', 700, 1700),
(10, 'Understanding the United Nations\' SDGs', 'Students will gain interdisciplinary insights and practical strategies to contribute meaningfully to global sustainability efforts through the United Nations\' Sustainable Development Goals (SDGs).', 'Sumona Afroz', '../image/courseimg/sustainable-development-goals.jpg', '3 Months', 450, 1500),
(11, 'Data Science and Analytics', 'Data Science and Analytics course: Master data analysis for informed decision-making in diverse industries through statistical modeling, machine learning, and data visualization, driving innovation and competitive advantage.', 'Swapnil Tarafdar', '../image/courseimg/1688538576857.jpeg', '3 Months', 450, 1500),
(12, 'Educational Technology Integration', 'This course equips educators with strategies to effectively integrate digital tools and platforms into teaching practices, fostering dynamic and interactive learning environments effectively and  effeciently', 'Swapnil Tarafdar', '../image/courseimg/63da5648420725298234f208_Blue Modern Blog Banner Business (11).png', '3 Months', 450, 1500),
(13, 'Mindfulness and Well-being', 'This course cultivates self-awareness and resilience through evidence-based practices, empowering individuals to manage stress, enhance mental health, and foster overall well-being in personal and professional contexts.', 'Sumona Afroz', '../image/courseimg/6257332154d028bb8da0a3a1_mindfulness.jpeg', '4 Month', 800, 1600),
(16, 'Python in Bangla', 'Master Python in Bangla with our specialized course. Learn programming fundamentals, syntax, and practical application in your native language, empowering you to excel in the world of coding.', 'Swapnil Tarafdar', '../image/courseimg/articleocw-5c65fbda1ea05.jpg', '4 hours', 1000, 4000),
(17, 'Project Based Learning', 'Project-Based Learning (PBL) course emphasizes hands-on, collaborative learning experiences to develop critical thinking, problem-solving, and interdisciplinary skills through real-world projects.', 'Sumona Afroz', '../image/courseimg/project-based-learning (1).png', '2 months', 350, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `stu_email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `course_id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `respmsg` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `amount` int NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `amount`, `order_date`) VALUES
(3, 'ORDS98956453', '1902038@icte.bdu.ac.bd', 8, 'TXN_SUCCESS', 'Txn Success', 800, '2019-09-12'),
(7, 'ORDS57717951', '1902029@icte.bdu.ac.bd', 14, 'TXN_SUCCESS', 'Txn Success', 400, '2019-09-13'),
(8, 'ORDS22968322', '1902030@icte.bdu.ac.bd', 10, 'TXN_SUCCESS', 'Txn Success', 800, '2019-09-13'),
(9, 'ORDS78666589', '19020024@icte.bdu.ac.bd', 8, 'TXN_SUCCESS', 'Txn Success', 800, '2019-09-19'),
(10, 'ORDS59885531', '1902040@icte.bdu.ac.bd', 10, 'TXN_SUCCESS', 'Txn Success', 800, '2020-07-04'),
(11, 'ORDS989564588', '1902001@icte.bdu.ac.bd', 8, '', '', 550, '2024-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int NOT NULL,
  `f_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `stu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(3, 'My life at GyanTech made me stronger and took me a step ahead for being an independent women. I am thankful to all the teachers who supported us and corrected us throughout our career. I am very grateful to the iSchool for providing us the best of placement opportunities and finally I got placed in DC Marvel.', 3),
(8, 'I am grateful to GyanTech - both the faculty and the Training & Placement Department. They have made efforts ensuring maximum number of placed students. Due to the efforts made by the faculty and placement cell. I was able to bag a job in the second company.', 1),
(9, 'GyanTech is a place of learning, fun, culture, lore, literature and many such life preaching activities. Studying at the GyanTech brought an added value to my life.', 4),
(10, 'Think Magical, that is one thing that GyanTech urges in and to far extent succeed in teaching to its students which invariably helps to achieve what you need.', 2),
(12, 'Knowledge is power. Information is liberating. Education is the premise of progress, in every society, in every family.', 6),
(13, 'Very good course offering', 5),
(14, 'The courses are awesome', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int NOT NULL,
  `lesson_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `lesson_desc` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `lesson_link` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `course_id` int NOT NULL,
  `course_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(100, 'Introduction of the course ', '', '', 8, 'After SSC English'),
(101, 'Introduction to English Grammar and Syntax', '', '', 8, 'After SSC English'),
(102, 'Understanding Parts of Speech', '', '', 8, 'After SSC English'),
(103, 'Sentence Structure and Punctuation', '', '', 8, 'After SSC English'),
(104, 'Mastering Tenses: Present, Past, and Future', '', '', 8, 'After SSC English'),
(105, 'Building Vocabulary: Words, Synonyms, Antonyms, and Idioms', '', '', 8, 'After SSC English'),
(106, 'Reading Comprehension Strategies', '', '', 8, 'After SSC English'),
(107, 'Writing Skills: Essays, Letters, and Summaries', '', '', 8, 'After SSC English'),
(108, 'Speaking and Listening: Effective Communication Techniques', '', '', 8, 'After SSC English'),
(109, 'Literary Analysis: Poetry, Prose, and Drama', '', '', 8, 'After SSC English'),
(201, 'Introduction to Instructional Technology', '', '', 9, 'Instructional Technology'),
(202, 'History and Evolution of Instructional Technology', '', '', 9, 'Instructional Technology'),
(203, 'Theories and Models of Instructional Design', '', '', 9, 'Instructional Technology'),
(204, 'Educational Multimedia: Design Principles and Applications', '', '', 9, 'Instructional Technology'),
(205, 'Interactive Learning Environments: Virtual Reality and Augmented Reality', '', '', 9, 'Instructional Technology'),
(206, 'Online Learning Platforms and Learning Management Systems', '', '', 9, 'Instructional Technology'),
(207, 'Digital Assessment Tools and Techniques', '', '', 9, 'Instructional Technology'),
(208, 'Gamification in Education: Engaging Learners through Games', '', '', 9, 'Instructional Technology'),
(209, 'Mobile Learning: Integrating Technology into Teaching and Learning', '', '', 9, 'Instructional Technology'),
(210, 'Accessibility and Inclusive Design in Instructional Technology', '', '', 9, 'Instructional Technology'),
(211, 'Emerging Trends in Instructional Technology', '', '', 9, 'Instructional Technology'),
(301, 'Introduction to the SDGs', 'Introduction to the SDGs', '', 10, ''),
(302, 'Goal 1: No Poverty', '', '', 10, ''),
(303, 'Goal 2: Zero Hunger', '', '', 10, ''),
(304, 'Goal 3: Good Health and Well-being', '', '', 10, ''),
(305, 'Goal 4: Quality Education', '', '', 10, ''),
(306, 'Goal 5: Gender Equality', '', '', 10, ''),
(307, 'Goal 6: Clean Water and Sanitation', '', '', 10, ''),
(308, 'Goal 7: Affordable and Clean Energy', '', '', 10, ''),
(309, 'Goal 8: Decent Work and Economic Growth', '', '', 10, ''),
(310, 'Goal 9: Industry, Innovation, and Infrastructure', '', '', 10, ''),
(311, 'Goal 10: Reduced Inequality', '', '', 10, ''),
(312, 'Goal 11: Sustainable Cities and Communities', '', '', 10, ''),
(313, 'Goal 12: Responsible Consumption and Production', '', '', 10, ''),
(314, 'Goal 13: Climate Action', '', '', 10, ''),
(315, 'Goal 14: Life Below Water', '', '', 10, ''),
(316, 'Goal 15: Life on Land', '', '', 10, ''),
(317, 'Goal 16: Peace, Justice, and Strong Institutions', '', '', 10, ''),
(318, 'Goal 17: Partnerships for the Goals', '', '', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int NOT NULL,
  `stu_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `stu_email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `stu_pass` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `stu_occ` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `stu_img` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(1, 'Sabbir Ahmed ', '1902001@icte.bdu.ac.bd', '123456@SjUk', 'Student', '../image/stu/WhatsApp Image 2023-11-04 at 7.00.33 PM (1).jpeg'),
(2, 'Fahad Mahmud ', '1902030@icte.bdu.ac.bd', '12345678', 'Student', '../image/stu/WhatsApp Image 2023-11-04 at 6.54.03 PM (1).jpeg'),
(3, 'Sagor Kundu ', 'sagorkundu66@gmail.com', '2222222', 'Doctor', '../image/stu/396430752_1566760167396751_5634222075225136503_n.jpg'),
(4, 'Mst. Nasrin Akter Laboni ', '1902040@icte.bdu.ac.bd', 'Laboni12', 'Student', '../image/stu/WhatsApp Image 2023-11-04 at 7.00.34 PM.jpeg'),
(5, 'Md. Ali Mahmud Pritom ', '1902038@icte.bdu.ac.bd', 'Pritom@@123456', 'Student ', '../image/stu/WhatsApp Image 2023-11-04 at 7.41.41 PM.jpeg'),
(6, 'Md. Saikat Ali ', 'saikat90@yahoo.com', 'saiKat22', 'Serviceman', '../image/stu/images.jpg'),
(7, 'Tahmid Ahmed Shifat', '1902029@icte.bdu.ac.bd', 'BDU2019', 'Freelancer ', '../image/stu/WhatsApp Image 2023-11-04 at 6.54.03 PM.jpeg'),
(8, 'Borhan Uddin Dipto', '19020024@icte.bdu.ac.bd', 'Borhan@@123', 'Student', '../image/stu/1697390710492.jpeg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `stu_transation_view`
-- (See below for the actual view)
--
CREATE TABLE `stu_transation_view` (
`course_id` int
,`course_name` text
,`stu_id` int unsigned
,`stu_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_transaction`
--

CREATE TABLE `user_transaction` (
  `id` int UNSIGNED NOT NULL,
  `stu_id` int UNSIGNED NOT NULL,
  `course_id` int UNSIGNED NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_transaction`
--

INSERT INTO `user_transaction` (`id`, `stu_id`, `course_id`, `transaction_id`, `create_at`) VALUES
(13, 1, 8, 'wsd', '2024-03-29 19:28:37'),
(18, 1, 8, 'nioon', '2024-03-29 19:34:17'),
(19, 1, 9, 'vvuv', '2024-03-29 19:35:25'),
(20, 1, 9, '77777', '2024-03-29 19:43:49'),
(21, 1, 9, 'vfu', '2024-03-29 19:44:37'),
(22, 1, 9, '123wwDD', '2024-03-31 16:38:50'),
(23, 1, 9, 'AASS33', '2024-03-31 20:51:05'),
(24, 1, 9, 'AASS66', '2024-04-01 05:26:49'),
(25, 1, 9, 'minmin', '2024-04-01 07:16:28'),
(26, 1, 10, 'dwdw', '2024-04-13 16:51:44'),
(27, 1, 9, '11000000000000', '2024-04-13 17:34:18'),
(28, 1, 8, 'dd', '2024-04-14 20:59:57'),
(29, 1, 9, '3rqr', '2024-04-23 18:29:45'),
(30, 1, 9, 'ygdyw', '2024-04-23 18:30:00'),
(31, 1, 9, 'XXXX', '2024-04-23 18:31:17'),
(32, 1, 9, 'YY', '2024-04-23 18:35:45'),
(33, 1, 9, 'KK', '2024-04-23 18:37:09'),
(34, 1, 9, 'J', '2024-04-23 18:38:55'),
(35, 1, 9, 'UIH', '2024-04-23 18:39:22'),
(36, 1, 9, 'JIUIU', '2024-04-23 18:40:12'),
(37, 1, 9, 'PP', '2024-04-23 18:42:35'),
(38, 1, 9, 'ctct', '2024-04-24 16:07:57'),
(39, 1, 9, 'SWA', '2024-04-24 16:29:22'),
(40, 8, 10, 'k', '2024-04-29 16:49:31');

-- --------------------------------------------------------

--
-- Structure for view `stu_transation_view`
--
DROP TABLE IF EXISTS `stu_transation_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stu_transation_view`  AS SELECT `ut`.`stu_id` AS `stu_id`, `s`.`stu_name` AS `stu_name`, `c`.`course_id` AS `course_id`, `c`.`course_name` AS `course_name` FROM ((`user_transaction` `ut` left join `student` `s` on((`s`.`stu_id` = `ut`.`stu_id`))) left join `course` `c` on((`c`.`course_id` = `ut`.`course_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `user_transaction`
--
ALTER TABLE `user_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `user_transaction`
--
ALTER TABLE `user_transaction`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
