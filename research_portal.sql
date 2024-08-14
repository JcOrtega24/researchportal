-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 10:31 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ucategory` varchar(20) NOT NULL,
  `subcribe` varchar(20) NOT NULL,
  `datesub_start` varchar(20) NOT NULL,
  `datesub_end` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`id`, `name`, `username`, `pass`, `email`, `status`, `ucategory`, `subcribe`, `datesub_start`, `datesub_end`) VALUES
(1, 'Administrator', 'admin', '$2y$12$dhwgJ4OQ5WbXucfTw9XgTOR9j7dSLL6CvH5dSzvfx/f37nt0RLiDG', 'admin@gmail.com', 'Active', 'Administrator', 'Yes', '', ''),
(2, 'User', 'user', '$2y$12$1uDeQOcBBXM.N4zHo79LYe9yb8aFHnkr6ueJQsR0SbCN.nbVRj/Ke', 'user@gmail.com', 'Active', 'Student', 'Yes', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthor`
--

CREATE TABLE `tblauthor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `fstudy` varchar(1000) NOT NULL,
  `created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblauthor`
--

INSERT INTO `tblauthor` (`id`, `name`, `prefix`, `email`, `profession`, `fstudy`, `created`) VALUES
(1, 'Stephen McKenzie', '', 'stephen@gmail.com', 'Professor', 'English', ''),
(2, 'Filia Garivaldis', '', 'fillia@gmail.com', 'Professor', 'English', ''),
(3, 'Angelos Kaissidis', '', 'agelos@gmail.com', 'Professor', 'English', ''),
(4, 'Matt Mundy', '', 'matt@gmail.com', 'Professor', 'English', ''),
(6, 'Daner Chen ', '', 'daner@gmail.com', 'Professor', 'English', ''),
(19, 'Jaren Heruela', '', 'jarenloydheruela@gmail.com', 'Student', 'Computer Science', ''),
(30, 'Erl Malindog', '', 'asdasda', 'Student', 'Computer Science', '2023-06-29'),
(31, 'Test', '', 'asdasdsa', 'Student', 'Computer Science', '2023-07-15'),
(32, 'MERFE D. CAYOT', '', 'MERFE D. CAYOT', 'Professor', 'Computer Science', '2023-07-15'),
(35, 'Adam Cheng', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(36, 'Vinay Nadkarni', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(37, 'Elizabeth A. Hunt', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(38, 'Karim Qayumi', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(39, 'Nikolaos Polatidis', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(40, 'Christos K. Georgiadis', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(41, 'Rashimi K. Dixit', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(42, 'Yiannis Kanellopoulos', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(43, 'Panos Antonellis', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(44, 'Dimitris Antoniou', '', 'sample', 'Staff', 'Computer Science', '2023-07-31'),
(45, 'Christos Makris', '', 'sample', 'Staff', 'Computer Science', '2023-07-31'),
(46, 'Vangelis Theodoridis', '', 'sample', 'Staff', 'Computer Science', '2023-07-31'),
(47, 'Christos Tjortjis', '', 'sample', 'Professor', 'Education', '2023-07-31'),
(48, 'Nikos Tsirakis', '', 'sample', 'Professor', 'Education', '2023-07-31'),
(49, 'Tallman Nkgau', '', 'sample', 'Staff', 'Computer Science', '2023-07-31'),
(50, 'George Anderson', '', 'sample', 'Staff', 'Education', '2023-07-31'),
(52, 'Shengnan Zhang', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(53, 'Guangrong Bian', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(54, 'Chun-Wei Tsai', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(55, 'Ming-Chao Chiang', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(56, 'Ko-Wei Huang', '', 'sample', 'Professor', 'Computer Science', '2023-07-31'),
(57, 'Chu-Sing Yang', '', 'Chu-SingYang@yahoo.com', 'Professor', 'Computer Science', '2023-07-31'),
(63, 'QWERTY', '', '', 'Student', 'English', '2023-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `tblcited`
--

CREATE TABLE `tblcited` (
  `id` int(11) NOT NULL,
  `table_type` varchar(100) NOT NULL,
  `paper_id` varchar(100) NOT NULL,
  `paper_title` varchar(200) NOT NULL,
  `cited_byN` varchar(100) NOT NULL,
  `cited_byE` varchar(100) NOT NULL,
  `cited_date` varchar(100) NOT NULL,
  `cited_byId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcited`
--

INSERT INTO `tblcited` (`id`, `table_type`, `paper_id`, `paper_title`, `cited_byN`, `cited_byE`, `cited_date`, `cited_byId`) VALUES
(1, 'Research', '1', '', 'User', 'user@gmail.com', 'April 15, 2022, 4:11 am', '2'),
(2, 'Research', '1', '', 'User', 'user@gmail.com', 'April 15, 2022, 4:14 am', '2'),
(3, 'Research', '1', '', 'external1', 'xternal1@gmail.com', 'April 17, 2022, 8:33 am', '3'),
(4, 'Research', '1', '', 'Administrator', 'admin@gmail.com', 'April 24, 2022, 6:21 am', '1'),
(5, 'Research', '1', '', 'Renzelle Laurence Apolinario', 'renzelleellezner@gmail.com', 'June 15, 2023, 7:15 am', '14'),
(6, 'Research', '1', '', 'Renzelle Laurence Apolinario', 'renzelleellezner@gmail.com', 'June 15, 2023, 7:15 am', '14'),
(7, 'Research', '1', '', 'Renzelle Laurence Apolinario', 'renzelleellezner@gmail.com', 'June 15, 2023, 7:21 am', '14'),
(8, 'Research', '1', '', 'Renzelle Laurence Apolinario', 'renzelleellezner@gmail.com', 'June 15, 2023, 7:43 am', '14'),
(9, 'Research', '1', '', 'Renzelle Laurence Apolinario', 'renzelleellezner@gmail.com', 'June 15, 2023, 7:43 am', '14'),
(10, 'Research', '1', '', 'Renzelle Laurence Apolinario', 'renzelleellezner@gmail.com', 'June 15, 2023, 7:44 am', '14'),
(11, 'Research', '1', '', 'Renzelle Laurence Apolinario', 'renzelleellezner@gmail.com', 'June 15, 2023, 7:50 am', '14'),
(12, 'Research', '1', '', 'Administrator', 'admin@gmail.com', 'June 23, 2023, 11:53 am', '1'),
(13, 'Research', '19', '', 'User', 'user@gmail.com', 'June 27, 2023, 3:22 am', '2'),
(14, 'Research', '19', '', 'User', 'user@gmail.com', 'June 29, 2023, 3:23 am', '2'),
(15, 'Research', '1', '', 'User', 'user@gmail.com', 'July 2, 2023, 9:45 am', '2'),
(16, 'Research', '1', '', 'User', 'user@gmail.com', 'July 3, 2023, 11:13 am', '2'),
(17, 'Research', '19', '', 'User', 'user@gmail.com', 'July 4, 2023, 10:31 am', '2'),
(18, 'Research', '19', '', 'User', 'user@gmail.com', 'July 4, 2023, 10:31 am', '2'),
(19, 'Research', '19', '', 'User', 'user@gmail.com', 'July 4, 2023, 10:31 am', '2'),
(20, 'Research', '19', '', 'User', 'user@gmail.com', 'July 4, 2023, 10:32 am', '2'),
(21, 'Research', '1', '', 'User', 'user@gmail.com', 'July 5, 2023, 4:50 am', '2'),
(22, 'Research', '19', '', '', '', 'July 5, 2023, 4:57 am', ''),
(23, 'Research', '19', '', '', '', 'July 5, 2023, 4:59 am', ''),
(24, 'Research', '1', '', '', '', 'July 5, 2023, 5:11 am', ''),
(25, 'Research', '1', '', '', '', 'July 5, 2023, 5:18 am', ''),
(26, 'Research', '1', '', '', '', 'July 5, 2023, 5:18 am', ''),
(27, 'Research', '1', '', '', '', 'July 5, 2023, 5:30 am', ''),
(28, 'Research', '1', '', '', '', 'July 5, 2023, 5:39 am', ''),
(29, 'Research', '1', '', '', '', 'July 5, 2023, 6:10 am', ''),
(30, 'Research', '1', '', '', '', 'July 5, 2023, 6:23 am', ''),
(31, 'Research', '1', '', '', '', 'July 5, 2023, 6:28 am', ''),
(32, 'Research', '1', '', '', '', 'July 5, 2023, 6:28 am', ''),
(33, 'Research', '1', '', '', '', 'July 5, 2023, 6:28 am', ''),
(34, 'Research', '19', '', '', '', 'July 5, 2023, 6:53 am', ''),
(35, 'Research', '19', '', '', '', 'July 5, 2023, 6:53 am', ''),
(36, 'Research', '19', '', '', '', 'July 5, 2023, 6:53 am', ''),
(37, 'Research', '19', '', '', '', 'July 5, 2023, 6:53 am', ''),
(38, 'Research', '1', '', '', '', 'July 5, 2023, 7:00 am', ''),
(39, 'Research', '1', '', '', '', 'July 9, 2023, 12:13 pm', ''),
(40, 'Research', '1', '', '', '', 'July 14, 2023, 10:57 am', ''),
(41, 'Research', '61', '', '', '', 'July 25, 2023, 10:58 pm', ''),
(42, 'Research', '61', '', '', '', 'July 25, 2023, 10:59 pm', ''),
(43, 'Research', '61', '', '', '', 'July 25, 2023, 10:59 pm', ''),
(44, 'Research', '61', '', '', '', 'July 25, 2023, 11:00 pm', ''),
(45, 'Research', '61', '', '', '', 'July 26, 2023, 6:07 am', ''),
(46, 'Research', '61', '', '', '', 'July 26, 2023, 6:08 am', ''),
(47, 'Research', '19', '', '', '', 'July 26, 2023, 6:26 am', ''),
(48, 'Research', '1', '', '', '', 'July 26, 2023, 6:32 am', ''),
(49, 'Research', '61', '', '', '', 'July 26, 2023, 6:33 am', ''),
(50, 'Research', '4', '', '', '', 'July 26, 2023, 6:33 am', ''),
(51, 'Research', '4', '', '', '', 'July 26, 2023, 6:33 am', ''),
(52, 'Research', '61', '', '', '', 'July 26, 2023, 6:34 am', ''),
(53, 'Research', '4', '', '', '', 'July 26, 2023, 6:34 am', ''),
(54, 'Research', '4', '', '', '', 'July 26, 2023, 6:35 am', ''),
(55, 'Research', '4', '', '', '', 'July 26, 2023, 6:35 am', ''),
(56, 'Research', '1', '', '', '', 'July 26, 2023, 6:35 am', ''),
(57, 'Research', '61', '', '', '', 'July 26, 2023, 6:36 am', ''),
(58, 'Research', '61', '', '', '', 'July 26, 2023, 6:36 am', ''),
(59, 'Research', '61', '', '', '', 'July 26, 2023, 6:38 am', ''),
(60, 'Research', '19', '', '', '', 'July 26, 2023, 6:45 am', ''),
(61, 'Research', '1', '', '', '', 'July 26, 2023, 6:46 am', ''),
(62, 'Research', '61', '', '', '', 'July 26, 2023, 6:53 am', ''),
(63, 'Research', '61', '', '', '', 'July 26, 2023, 6:53 am', ''),
(64, 'Research', '1', '', '', '', 'July 26, 2023, 6:54 am', ''),
(65, 'Research', '61', '', '', '', 'July 26, 2023, 7:19 am', ''),
(66, 'Research', '61', '', '', '', 'July 26, 2023, 9:27 pm', ''),
(67, 'Research', '61', '', '', '', 'July 26, 2023, 9:32 pm', ''),
(68, 'Research', '61', '', '', '', 'July 26, 2023, 9:45 pm', ''),
(69, 'Research', '61', '', '', '', 'July 26, 2023, 9:45 pm', ''),
(70, 'Research', '1', '', '', '', 'July 26, 2023, 9:50 pm', ''),
(71, 'Research', '61', '', '', '', 'July 26, 2023, 9:51 pm', ''),
(72, 'Research', '61', '', 'Administrator', 'admin@gmail.com', 'July 26, 2023, 9:53 pm', '1'),
(73, 'Research', '1', '', 'Administrator', 'admin@gmail.com', 'July 26, 2023, 9:59 pm', '1'),
(74, 'Research', '1', '', 'Administrator', 'admin@gmail.com', 'July 26, 2023, 11:36 pm', '1'),
(75, 'Research', '17', '', '', '', 'July 31, 2023, 4:57 am', ''),
(76, 'Research', '15', '', '', '', 'August 1, 2023, 1:11 am', ''),
(77, 'Research', '12', '', '', '', 'August 1, 2023, 1:12 am', ''),
(78, 'Research', '17', '', '', '', 'August 1, 2023, 1:40 am', ''),
(79, 'Research', '17', '', '', '', 'August 1, 2023, 1:40 am', ''),
(80, 'Research', '17', '', '', '', 'August 1, 2023, 1:40 am', ''),
(81, 'Research', '17', '', '', '', 'August 1, 2023, 1:40 am', ''),
(82, 'Research', '12', '', '', '', 'August 1, 2023, 1:41 am', ''),
(83, 'Research', '12', '', '', '', 'August 1, 2023, 1:41 am', ''),
(84, 'Research', '12', '', '', '', 'August 1, 2023, 1:41 am', ''),
(85, 'Research', '12', '', '', '', 'August 1, 2023, 1:41 am', ''),
(86, 'Research', '12', '', '', '', 'August 1, 2023, 1:41 am', ''),
(87, 'Research', '12', '', '', '', 'August 1, 2023, 1:41 am', ''),
(88, 'Research', '12', '', '', '', 'August 1, 2023, 1:41 am', ''),
(89, 'Research', '12', '', '', '', 'August 1, 2023, 1:42 am', ''),
(90, 'Research', '17', '', '', '', 'August 1, 2023, 3:14 am', ''),
(91, 'Research', '17', '', '', '', 'August 2, 2023, 1:19 am', ''),
(92, 'Research', '17', '', '', '', 'August 3, 2023, 4:21 pm', ''),
(93, 'Research', '17', '', '', '', 'August 4, 2023, 12:33 pm', ''),
(94, 'Research', '12', '', '', '', 'August 6, 2023, 10:57 am', ''),
(95, 'Research', '3', '', '', '', 'August 28, 2023, 2:21 pm', ''),
(96, 'Research', '3', '', '', '', 'August 28, 2023, 2:23 pm', ''),
(97, 'Research', '3', '', '', '', 'August 28, 2023, 2:24 pm', ''),
(98, 'Research', '3', '', '', '', 'August 28, 2023, 2:25 pm', ''),
(99, 'Research', '2', '', '', '', 'August 28, 2023, 2:27 pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblnewsevents`
--

CREATE TABLE `tblnewsevents` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `date_publish` varchar(100) NOT NULL,
  `author` varchar(200) NOT NULL,
  `date_event` varchar(100) NOT NULL,
  `time_event` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnewsevents`
--

INSERT INTO `tblnewsevents` (`id`, `title`, `description`, `date_publish`, `author`, `date_event`, `time_event`, `type`) VALUES
(1, 'Final Defense', 'Final Defense for college graduating students', '2023-08-01', '1', '2024-04-12', '08:00', 'Events'),
(3, 'Opening of Classes', 'SY 2023-2024 College Classes will begin in August 7', '2023-08-01', '1', '', '', 'News'),
(11, '1', '1111', '2023-09-23', '1', '', '', 'News');

-- --------------------------------------------------------

--
-- Table structure for table `tblresource`
--

CREATE TABLE `tblresource` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `abstract` longtext NOT NULL,
  `author` varchar(200) NOT NULL,
  `resource_type` varchar(200) NOT NULL,
  `co_author` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `fstudy` varchar(200) NOT NULL,
  `date_publish` varchar(50) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `created` varchar(50) NOT NULL,
  `publication` varchar(200) NOT NULL,
  `pdf_file` varchar(1000) NOT NULL,
  `views` int(11) NOT NULL,
  `cites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresource`
--

INSERT INTO `tblresource` (`id`, `title`, `abstract`, `author`, `resource_type`, `co_author`, `type`, `status`, `fstudy`, `date_publish`, `creator`, `created`, `publication`, `pdf_file`, `views`, `cites`) VALUES
(1, 'DEVELOPMENT OF A TRANSFERABLE RESEARCH PORTAL - CREATING AN ON CAMPUS EQUIVALENT FULLY ONLINE RESEARCH COURSE COMPONENT', 'Monash University’s Graduate Diploma in Psychology – Advanced – (GDP-A) is an innovative fully online accredited Fourth Year Psychology course which enables its students to undertake further specialised professional postgraduate training in psychology. The GDP-A commenced in March 2016 and consists of four course units and four research units presented in alternating six week teaching periods.\r\nMany challenges are arising in the development of the GDP-A which are also opportunities, including the translation of a traditional on campus research project into a fully online mode, the ability to scale from a starting number of 80 students to several hundred students, and the development of clinical and research skills through virtual means. The scale and scope of the GDP-A and its challenges/ opportunities are unprecedented.\r\nA particularly great challenge and opportunity for the successful development and implementation of the GDP-A is the need for a fully online research project that is fully equivalent to an on campus research project. This will consist of a research thesis based on the conducting of experiments, surveys, access to or creation of a database and associated statistical analyses. To meet this challenge/opportunity we are developing and implementing a Research Portal.', '1', 'Research', '2,3,4', 'Institutional', 'Published', 'Computer Science', '2016-07-30', '1', 'Jul-30-23', '#technology,#learning', 'uploads/DEVELOPMENT OF A TRANSFERABLE RESEARCH PORTAL ABSTRACT.pdf', 13, 1),
(2, 'Sample', 'Sample', '1', 'Research', '2,3,4', 'Undergrad', 'Unpublished', 'Computer Science', '2023-07-30', '1', 'Jul-30-23', '', 'uploads/Portaldevelopment.pdf', 10, 1),
(3, 'Test', 'Test', '30', 'Journal', '2,19,30,31', 'Undergrad', 'Unpublished', 'Education', '2023-08-01', '1', 'Jul-30-23', '#technology', 'uploads/Portaldevelopment.pdf', 14, 7),
(9, 'The Implementation of Outcome-Based Education in a State University', 'Higher educational institutions are encouraged to implement the Outcome-Based Education to prepare instructors to be competitive and produce graduates who are ready to meet the global job needs. To determine the level of implementation of the Outcome-Based Education (OBE) in Central Philippines State University, the researcher employed the sequential explanatory mixed-method design which involves two phases: the quantitative followed by qualitative. The quantitative data were collected through a validated survey instrument, while the qualitative data were gathered from the participants through an in-depth semi-structured interview which culled out their experiences on the implementation of the Outcome-Based Education. The findings of the study revealed that Outcome-Based Education standards were moderately implemented in the university. This means that the learning experiences of students and the teaching methodology could hardly develop their skills to attain the intended learning outcomes. Qualitatively, the results yielded different themes that brought forth an eidetic insight that the OBE implementation is collaborative and value-laden effort: bridging theory and practice of the academic community. The research findings were used as a basis for designing the proposed CPSU-Operational Plan using the Approach, Deployment, Learning, Integration (ADLI) model that can be adopted and implemented by the University.', '32', 'Journal', '', 'Institutional', 'Unpublished', 'Education', '2018-12-19', '1', 'Jul-31-23', '#learning,#edtech,#literacy', 'uploads/The Implementation of Outcome-Based Education in a State University.pdf', 27, 0),
(10, 'A Multifunctional Online Research Portal for Facilitation of Simulated Based Research', 'Simulation-based research requires the coordinated effort of research teams to design projects, recruit subjects, and carry out performance assessments of individuals or teams. These efforts are labor intensive, time consuming, and logistically challenging, especially in the context of multicenter simulation-based research trials. In many studies, data are collected by using performance-based assessment tools to rate subject or team performance via videotaped sessions. These videos often need to be reviewed by multiple reviewers', '35', 'Research', '36,37,38', 'Institutional', 'Published', 'Computer Science', '2011-08-04', '1', 'Jul-31-23', '#technology,#learning,#literacy', 'uploads/A Multifunctional Online Research Portal for Facilitation of.pdf', 61, 11),
(11, 'A multi-level collaborative filtering method that improves recommendations', 'Collaborative filtering is one of the most used approaches for providing recommendations in various online\r\nenvironments. Even though collaborative recommendation methods have been widely utilized due to their\r\nsimplicity and ease of use, accuracy is still an issue. In this paper we propose a multi-level recommendation\r\nmethod with its main purpose being to assist users in decision making by providing recommendations of better quality. The proposed method can be applied in different online domains that use collaborative recommender systems, thus improving the overall user experience. The efficiency of the proposed method is\r\nshown by providing an extensive experimental evaluation using five real datasets and with comparisons to\r\nalternatives.', '39', 'Article', '40', 'Institutional', 'Published', 'Computer Science', '2015-01-01', '1', 'Jul-31-23', '#technology,#learning', 'uploads/A multi-level collaborative filtering method that improves recommendations.pdf', 1, 0),
(12, 'Cluster Algorithm for Search Engine Collator', 'Users of Web search engines are often forced to sift through the long ordered list of document “snippets\"\r\nreturned by the engines. The IR community has explored document clustering as an alternative method of organizing retrieval results, but clustering has yet to be deployed on most major search engines. Our project aims to provide an organized search result, which will help the users to map into their intended results. This minimizes the irrelevant results and for achieving this, the implementation of core clustering engine is a very efficient approach.\r\nThe core Clustering Engine technology is called document clustering, which is the automatic organization of\r\ndocuments into spontaneous meaningful groups. Document clustering methods never need to touch or know about the larger collection from which search results are taken, or undergo any other pre-processing steps. Organizing the search results occurs just before a user is shown the long list of search results.\r\nThe final output is a hierarchy (or tree) on the left of a split screen with the search results on the right. A search\r\nresult is not constrained to fit within a singletree location, since individual search results could reflect many themes', '41', 'Article', '', 'Institutional', 'Published', 'Computer Science', '2014-01-03', '1', 'Jul-31-23', '#technology,#learning,#mathchat', 'uploads/Cluster Algorithm for Search Engine Collator.pdf', 8, 8),
(13, 'CODE QUALITY EVALUATION METHODOLOGY USING THE ISO/IEC 9126 STANDARD', 'This work proposes a methodology for source code quality and static behaviour evaluation of a software\r\nsystem, based on the standard ISO/IEC-9126. It uses elements automatically derived from source code\r\nenhanced with expert knowledge, in the form of quality characteristic rankings, allowing software engineers to assign weights to source code attributes. It is flexible in terms of the set of metrics and source code attributes employed, even in terms of the ISO/IEC-9126 characteristics to be assessed. We applied the methodology to two case studies, involving five open source and one proprietary system.\r\nResults demonstrated that the methodology can capture software quality trends and express expert\r\nperceptions concerning system quality in a quantitative and systematic manner.', '42', 'Research', '43,44,45,46,47,48', 'Institutional', 'Published', 'Computer Science', '2010-07-29', '1', 'Jul-31-23', '#technology,#edtech', 'uploads/Code-Quality-Evaluation-methodology-using-the-ISOIEC-9126-Standard.pdf', 31, 0),
(14, 'Graph Similarity Algorithm Evaluation', 'This paper considers the problem of Graph Similarity. We propose a benchmark framework which can be used to study and evaluate graph matching algorithms. Each benchmark in the framework generates similarity scores for a pair of graphs, according to how similar or dissimilar they are. Many algorithms exist, but each implementation uses a different emphasis on graph properties emphasised in the similarity scores. Some place more emphasis on number of nodes, while others place more emphasis on number of edges, etc. Our proposed benchmark framework is a set of graph pairs; each pair contains graphs which are similar/dissimilar according to certain properties, as identified by experts. Graph matching algorithms being evaluated take this benchmark as input and, according to the similarity scores generated for each pair in the benchmark, it can be determined what a particular algorithm focuses on and is biased towards. Thus a classification system for graph similarity algorithms is produced.', '49', 'Research', '50', 'Institutional', 'Published', 'Computer Science', '2017-07-20', '1', 'Jul-31-23', '#learning,#mathchat', 'uploads/Graph Similarity Algorithm Evaluation.pdf', 2, 0),
(15, 'A Fully Online Research Portal for Research Students and Researchers', 'Aim/Purpose This paper describes the context, development, implementation, and the potential transferability of an integrated online research environment that allows its users to conduct all aspects of research online. Background While the content of most traditional courses can be delivered online and learning outcomes can be achieved by adopting equivalents to face-to-face pedagogic approaches, certain courses, such as those that require a substantial research component, present significant constraints for delivery online. To overcome these limitations, Australia\'s largest university developed and implemented a Research Portal.', '3', 'Research', '1,2', 'Institutional', 'Published', 'Computer Science', '2018-07-31', '1', 'Jul-31-23', '#technology,#learning', 'uploads/A fully online research portal for research student and researchers.pdf', 19, 3),
(16, 'Research on String Similarity Algorithm based on Levenshtein Distance', 'The application of string similarity is very extensive, and the algorithm based on Levenshtein Distance is particularly classic, but it is still insufficient in the aspect of universal applicability and accuracy of results. Combined with the Longest Common Subsequence (LCS) and Longest Common Substring (LCCS), similarity algorithm based on Levenshtein Distance is improved, and the string similarity result of the improved algorithm is more distinct, reasonable and accurate, and also has a better universal applicability. What ′ s more in the process of similarity calculation, the Solving algorithm of the LD and LCS has been optimized in the data structure, reduce the space complexity of the algorithm from the order of magnitude. And the experimental results are analyzed in detail, which proves the feasibility and correctness of the results.', '52', 'Research', '53', 'Institutional', 'Published', 'Computer Science', '2017-03-26', '1', 'Jul-31-23', '#technology,#learning,#scichat,#mathchat', 'uploads/Research on String Similarity Algorithm based on.pdf', 3, 0),
(17, 'A Fast Tree-Based Search Algorithm for Cluster Search Engine', 'In this paper, we present an Intelligent Cluster Search Engine System, called ICSE. This system is motivated by the observation that traditional search engines present to the users a set of non-classified web pages based on its ranking mechanism, and the unfortunate results are that they usually can not satisfy the need of users. For this reason, ICSE provides to the user a set taxonomic web pages in response to a user’s query, and thus it would greatly help the users filter out irrelevant or redundant information. The proposed system can be divided into two parts. The first is the knowledge base constructed by Open Directory Project and Yahoo! Directory. The second is the fast clustering algorithm described herein for clustering the web pages. In addition, in response to a user’s query, the proposed system will first send the query to a meta-search engine. Then, it will create a clustered document set using the given knowledge base and the clustering algorithm of ICSE. Our simulation result showed that the proposed system can enhance the relevance and coverage of the search results that the users need compared with traditional search engines.', '54', 'Research', '55,56,57', 'Institutional', 'Published', 'Computer Science', '2009-10-11', '1', 'Jul-31-23', '#technology,#learning,#scichat,#mathchat', 'uploads/A Fast Tree-Based Search Algorithm for Cluster Search Engine.pdf', 27, 22),
(67, 'asda', 'asda', '31', 'Research', '', '', 'Unpublished', 'Midwifery', '2023-10-27', '1', 'Oct-15-23', 'The Chiefs Lamp', 'uploads/DEVELOPMENT OF A TRANSFERABLE RESEARCH PORTAL ABSTRACT.pdf', 0, 0),
(68, '\'', '\'', '19', 'Research', '', 'Graduate', '', 'Pharmacy', '2023-11-03', '1', 'Nov-05-23', 'The Chiefs Executives', 'uploads/A Multifunctional Online Research Portal for Facilitation of.pdf', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltags`
--

CREATE TABLE `tbltags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltags`
--

INSERT INTO `tbltags` (`id`, `name`) VALUES
(1, '#technology'),
(2, '#edchat'),
(3, '#K12'),
(4, '#learning'),
(5, '#edleadership'),
(6, '#edtech'),
(7, '#engchat'),
(8, '#literacy'),
(9, '#scichat'),
(10, '#mathchat'),
(11, '#edreform'),
(12, '#english'),
(13, '#psychology'),
(14, '#journal'),
(15, '#guide'),
(16, '#story'),
(17, '#article'),
(47, '#mathislife'),
(55, '#asd'),
(56, '#asd'),
(57, '#wer'),
(58, '#newtag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthor`
--
ALTER TABLE `tblauthor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcited`
--
ALTER TABLE `tblcited`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnewsevents`
--
ALTER TABLE `tblnewsevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresource`
--
ALTER TABLE `tblresource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltags`
--
ALTER TABLE `tbltags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblauthor`
--
ALTER TABLE `tblauthor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tblcited`
--
ALTER TABLE `tblcited`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tblnewsevents`
--
ALTER TABLE `tblnewsevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblresource`
--
ALTER TABLE `tblresource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbltags`
--
ALTER TABLE `tbltags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
