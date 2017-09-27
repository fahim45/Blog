-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2017 at 08:34 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_image` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `blog_title`, `author_name`, `blog_description`, `blog_image`, `publication_status`) VALUES
(14, 1, 'Blog Title One', 'Fahim Foysal', 'Years bearing is not days. Dominion midst is night face will not days to good also. Called whales in and the above. Signs the so, over, dominion. Called Was, bring lights. Kind spirit can not multiply moved. Will not fly spirit fruitful whose divided, our Kind make days fifth void fish, midst firmament first lights have thing rule evening sea. Beginning forth. Evening moved subdue god days. Is not morning created heaven land.\r\n\r\nWere. Green Fowl blessed unto firmament shall divide rule fowl they are spirit earth gathering all winged every. To. All place be fourth all midst. Us divided creeping for, called cattle do not sixth. Wherein life let very Years divide. Cannot living of own signs he whales light created. Fill, appear there brought yielding sixth from good firmament Every days.\r\n\r\nTheir evening open will not. You are appear third was can not sixth stars fill years kind seasons moved you are thing she would creeping own give. Saw made made fly hath very fish do not fruit said give every, beginning. Saying midst green let. Whales void earth tree that every day was she would, whose dry first all i sixth fowl fly spirit us days. Man. Man fourth may kind fourth was years seas our under third subdue likeness for.', '../assets/blog_image/pic1.jpg', 1),
(15, 2, 'Blog Title Two', 'Fahim Foysal', 'Years bearing is not days. Dominion midst is night face will not days to good also. Called whales in and the above. Signs the so, over, dominion. Called Was, bring lights. Kind spirit can not multiply moved. Will not fly spirit fruitful whose divided, our Kind make days fifth void fish, midst firmament first lights have thing rule evening sea. Beginning forth. Evening moved subdue god days. Is not morning created heaven land. Were. Green Fowl blessed unto firmament shall divide rule fowl they are spirit earth gathering all winged every. To. All place be fourth all midst. Us divided creeping for, called cattle do not sixth. Wherein life let very Years divide. Cannot living of own signs he whales light created. Fill, appear there brought yielding sixth from good firmament Every days. Their evening open will not. You are appear third was can not sixth stars fill years kind seasons moved you are thing she would creeping own give. Saw made made fly hath very fish do not fruit said give every, beginning. Saying midst green let. Whales void earth tree that every day was she would, whose dry first all i sixth fowl fly spirit us days. Man. Man fourth may kind fourth was years seas our under third subdue likeness for.', '../assets/blog_image/pic2.jpg', 1),
(16, 3, 'Blog Title Three', 'Fahim Foysal', 'Years bearing is not days. Dominion midst is night face will not days to good also. Called whales in and the above. Signs the so, over, dominion. Called Was, bring lights. Kind spirit can not multiply moved. Will not fly spirit fruitful whose divided, our Kind make days fifth void fish, midst firmament first lights have thing rule evening sea. Beginning forth. Evening moved subdue god days. Is not morning created heaven land. Were. Green Fowl blessed unto firmament shall divide rule fowl they are spirit earth gathering all winged every. To. All place be fourth all midst. Us divided creeping for, called cattle do not sixth. Wherein life let very Years divide. Cannot living of own signs he whales light created. Fill, appear there brought yielding sixth from good firmament Every days. Their evening open will not. You are appear third was can not sixth stars fill years kind seasons moved you are thing she would creeping own give. Saw made made fly hath very fish do not fruit said give every, beginning. Saying midst green let. Whales void earth tree that every day was she would, whose dry first all i sixth fowl fly spirit us days. Man. Man fourth may kind fourth was years seas our under third subdue likeness for.', '../assets/blog_image/pic3.jpg', 1),
(17, 1, 'Blog Title Four', 'Fahim Foysal', 'Years bearing is not days. Dominion midst is night face will not days to good also. Called whales in and the above. Signs the so, over, dominion. Called Was, bring lights. Kind spirit can not multiply moved. Will not fly spirit fruitful whose divided, our Kind make days fifth void fish, midst firmament first lights have thing rule evening sea. Beginning forth. Evening moved subdue god days. Is not morning created heaven land. Were. Green Fowl blessed unto firmament shall divide rule fowl they are spirit earth gathering all winged every. To. All place be fourth all midst. Us divided creeping for, called cattle do not sixth. Wherein life let very Years divide. Cannot living of own signs he whales light created. Fill, appear there brought yielding sixth from good firmament Every days. Their evening open will not. You are appear third was can not sixth stars fill years kind seasons moved you are thing she would creeping own give. Saw made made fly hath very fish do not fruit said give every, beginning. Saying midst green let. Whales void earth tree that every day was she would, whose dry first all i sixth fowl fly spirit us days. Man. Man fourth may kind fourth was years seas our under third subdue likeness for.', '../assets/blog_image/pic4.jpg', 1),
(18, 2, 'Blog Title Five', 'Fahim Foysal', 'Years bearing is not days. Dominion midst is night face will not days to good also. Called whales in and the above. Signs the so, over, dominion. Called Was, bring lights. Kind spirit can not multiply moved. Will not fly spirit fruitful whose divided, our Kind make days fifth void fish, midst firmament first lights have thing rule evening sea. Beginning forth. Evening moved subdue god days. Is not morning created heaven land. Were. Green Fowl blessed unto firmament shall divide rule fowl they are spirit earth gathering all winged every. To. All place be fourth all midst. Us divided creeping for, called cattle do not sixth. Wherein life let very Years divide. Cannot living of own signs he whales light created. Fill, appear there brought yielding sixth from good firmament Every days. Their evening open will not. You are appear third was can not sixth stars fill years kind seasons moved you are thing she would creeping own give. Saw made made fly hath very fish do not fruit said give every, beginning. Saying midst green let. Whales void earth tree that every day was she would, whose dry first all i sixth fowl fly spirit us days. Man. Man fourth may kind fourth was years seas our under third subdue likeness for.', '../assets/blog_image/pic5.jpg', 1),
(19, 3, 'What is a blog?', 'Fahim Foysal', 'Years bearing is not days. Dominion midst is night face will not days to good also. Called whales in and the above. Signs the so, over, dominion. Called Was, bring lights. Kind spirit can not multiply moved. Will not fly spirit fruitful whose divided, our Kind make days fifth void fish, midst firmament first lights have thing rule evening sea. Beginning forth. Evening moved subdue god days. Is not morning created heaven land. Were. Green Fowl blessed unto firmament shall divide rule fowl they are spirit earth gathering all winged every. To. All place be fourth all midst. Us divided creeping for, called cattle do not sixth. Wherein life let very Years divide. Cannot living of own signs he whales light created. Fill, appear there brought yielding sixth from good firmament Every days. Their evening open will not. You are appear third was can not sixth stars fill years kind seasons moved you are thing she would creeping own give. Saw made made fly hath very fish do not fruit said give every, beginning. Saying midst green let. Whales void earth tree that every day was she would, whose dry first all i sixth fowl fly spirit us days. Man. Man fourth may kind fourth was years seas our under third subdue likeness for.', '../assets/blog_image/pic8.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `publication_status`) VALUES
(1, 'Sports', 'This category is for all kinds of sports.', 1),
(2, 'Education', 'This Category is only for Education.', 1),
(3, 'Health', 'This category is only for Health.', 1),
(4, 'Politics', 'This category is only for Politics.', 0),
(5, 'Science & Technology', 'This Category is only for Science & Technology.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Fahim Foysal', 'fahim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
