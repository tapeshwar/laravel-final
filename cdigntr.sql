-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 07:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdigntr`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_articles`
--

CREATE TABLE `blog_articles` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `tags` text NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `dated` datetime NOT NULL,
  `home` enum('Yes','No') NOT NULL DEFAULT 'No',
  `s_no` varchar(20) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `parent_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `filemanager`
--

CREATE TABLE `filemanager` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `parent` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `size` varchar(20) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `dir` varchar(20) NOT NULL,
  `dated` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filemanager`
--

INSERT INTO `filemanager` (`id`, `uid`, `project_key`, `parent`, `name`, `ext`, `size`, `dimension`, `link`, `thumbnail`, `dir`, `dated`) VALUES
(1, '9', '1161270535', '', '1.jpg', '', '', '', '', '', '', '0000-00-00'),
(2, '9', '1161270535', '', '1-1.jpg', '', '', '', '', '', '', '0000-00-00'),
(3, '9', '1183620902', '', '1.jpg', '', '', '', '', '', '', '0000-00-00'),
(4, '9', '1183620902', '', '2.jpg', '', '', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `gallery_set` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `cover_image` text NOT NULL,
  `custom_link` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `home` enum('Yes','No') NOT NULL DEFAULT 'No',
  `s_no` varchar(20) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `uid`, `project_key`, `gallery_set`, `keywords`, `description`, `title`, `heading`, `sub_heading`, `cover_image`, `custom_link`, `content`, `home`, `s_no`, `enable`) VALUES
(16, '9', '1183620902', '1', '', '', 'xcvxz', 'gag', 'sfas', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/26818_1.jpg\" />', 'sdfa', '', 'No', '2', 'Yes'),
(17, '9', '1183620902', '8', '', '', 'second gallery', 'secon gallery', 'sdfas', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/21701_6.jpg\" />', 'sfa', '', 'No', '1', 'Yes'),
(18, '9', '1312767478', '2', '', '', 'sfas', 'first gallery', 'sfsdf', 'sdfsad', 'http://project.com/gs-firstset-2.html', '<p>dfadfsdf</p>\r\n', 'No', '', 'Yes'),
(27, '9', '1183620902', '1', '', '', '', 'test', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/21701_6.jpg\" />', 'http://vidhsys.com/ss-secondset-25.html', '', 'No', '1', 'Yes'),
(22, '9', '1183620902', '8', '', '', 'sfa', 'sdfa', 'sdfa', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/31096_4.jpg\" />', 'http://vidhsys.com/gs-firstgalleryset-1.html', '', 'No', '2', 'Yes'),
(23, '16', '1161270535', '5', '', '', 'Image One', 'Image One', '', '', '', '', 'No', '2', 'Yes'),
(24, '16', '1161270535', '5', '', '', 'Image Two', 'Image Two', '', '', '', '', 'No', '1', 'Yes'),
(25, '16', '1161270535', '6', '', '', 'Image 1', 'Image 1', '', '', '', '', 'No', '', 'Yes'),
(28, '9', '1276864229', '7', '', '', '', 'test', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/8049_3.jpg\" />', 'http://weekendfilm.com/p-about-us-36.html', '', 'No', '', 'Yes'),
(29, '9', '1183620902', '9', '', '', '', 'Enquiry', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/26818_1.jpg\" />', 'http://basildentalclinic.com/', '', 'No', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `gallery_id` varchar(20) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `custom_link` varchar(255) NOT NULL,
  `s_no` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `uid`, `project_key`, `gallery_id`, `heading`, `cover_image`, `content`, `custom_link`, `s_no`) VALUES
(1, '1', '1312767478', '8', 'COCKROACH CONTROL1', 'http://cms.bisuga.com//filemanager/images/10669_pest-1.jpg', 'content 1', '', '0'),
(2, '1', '1312767478', '8', 'COCKROACH CONTROL2', 'http://cms.bisuga.com//filemanager/images/24753_pest-2.jpg', '', '', '0'),
(3, '1', '1312767478', '8', 'COCKROACH CONTROL3', 'http://cms.bisuga.com//filemanager/images/10669_pest-1.jpg', '', '', '0'),
(4, '1', '1312767478', '8', 'COCKROACH CONTROL4', 'http://cms.bisuga.com//filemanager/images/24753_pest-2.jpg', '', '', '0'),
(5, '1', '1312767478', '9', 'FLY CONTROL1', 'http://localhost/working/dreamsuite//filemanager/images/25095_2.jpg', 'FLY CONTROL1 CONTENT', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_set`
--

CREATE TABLE `gallery_set` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `set_name` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `custom_link` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `home` enum('Yes','No') NOT NULL DEFAULT 'No',
  `s_no` varchar(20) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_set`
--

INSERT INTO `gallery_set` (`id`, `uid`, `project_key`, `set_name`, `title`, `heading`, `sub_heading`, `keywords`, `description`, `cover_image`, `custom_link`, `content`, `home`, `s_no`, `enable`) VALUES
(1, '9', '1183620902', 'FIRSTGALLERYSET', 'title', 'heading', 'subheading', '', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/31096_4.jpg\" />', 'sfasf', '<p>sfa</p>\r\n', 'No', '', 'Yes'),
(2, '9', '1312767478', 'FIRSTSET', 'sdfasf', 'galleryset', 'sfasfsdfa', '', '', 'sfas', 'sdfadf', '<p>sdfasdf</p>\r\n', 'No', '', 'Yes'),
(8, '9', '1183620902', 'TOPSLIDER', '', 'test', 'test', '', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/4471_2.jpg\" />', 'http://vidhsys.com/p-contact-us-31.html', '<p>test</p>\r\n', 'No', '', 'Yes'),
(5, '9', '1161270535', 'MYTOPSTUDENT', 'My Top Student', 'My Top Student', '', '', '', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n', 'No', '', 'Yes'),
(6, '16', '1161270535', 'IELTSSTUDENTS', '', 'IELTS Students', '', '', '', '', '', '', 'No', '', 'Yes'),
(7, '9', '1276864229', 'FIRST', '', 'first', 'first', '', '', '', '', '', 'No', '', 'Yes'),
(9, '9', '1183620902', 'TESTSET', 'Dr Shilpis profile', 'Book Party Hall', 'sdfsd', '', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/21701_6.jpg\" />', 'http://basildentalclinic.com/', '<p>test</p>\r\n', 'Yes', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `project_key` varchar(50) NOT NULL,
  `menu_set` varchar(20) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `custom_link` varchar(255) NOT NULL,
  `open_in` enum('SELF','NEW','POPUP') NOT NULL DEFAULT 'SELF',
  `s_no` int(11) NOT NULL,
  `enable` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `uid`, `project_key`, `menu_set`, `parent`, `title`, `heading`, `custom_link`, `open_in`, `s_no`, `enable`) VALUES
(1, '9', '1161270535', '1', '', 'One', 'One', '', 'SELF', 1, 'Y'),
(2, '9', '1161270535', '1', '1', 'Two', 'Two', '', 'SELF', 2, 'Y'),
(3, '9', '1161270535', '2', '', 'OFFERSw', 'Offersw', 'ww', 'SELF', 1, 'Y'),
(6, '9', '1161270535', '1', '1', 'Three', 'Three', '', 'SELF', 3, 'Y'),
(22, '0', '1276864229', '15', '', 'Home1', 'Home1', 'test1', 'SELF', 1, 'Y'),
(26, '0', '1276864229', '15', '27', 'Contact us', 'Contact us', '', 'SELF', 3, 'Y'),
(28, '0', '1276864229', '16', '', 'sdfas', 'sfsa', '', 'SELF', 0, 'Y'),
(15, '9', '1161270535', '2', '', 'OFFERSee', 'Offersee22', 'ee', 'SELF', 2, 'Y'),
(29, '0', '1276864229', '17', '', 'About Us', 'About Us', '', 'SELF', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `menu_set`
--

CREATE TABLE `menu_set` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_set`
--

INSERT INTO `menu_set` (`id`, `uid`, `project_key`, `name`, `enable`) VALUES
(1, '9', '1161270535', 'HEADERMENU', 'Yes'),
(2, '9', '1161270535', 'FOOTERMENU', 'Yes'),
(17, '0', '1276864229', 'BootamMenu', 'Yes'),
(15, '0', '1276864229', 'Topmenu', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_22_095159_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `controller_name` varchar(100) NOT NULL,
  `method_name` varchar(100) NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `section_name`, `controller_name`, `method_name`, `update_at`) VALUES
(1, 'Create New Page', 'App\\Http\\Controllers\\Website\\WebsiteController@create_page', 'Website', 'create_page', '2021-10-30 10:12:00'),
(2, 'Show Page List', 'App\\Http\\Controllers\\Website\\WebsiteController@pages', 'Website', 'pages', '2021-10-30 11:55:59'),
(3, 'Update Page', 'App\\Http\\Controllers\\Website\\WebsiteController@update_page', 'Website', 'update_page', '2021-10-30 10:11:18'),
(10, 'User login', 'App\\Http\\Controllers\\UserController@user_login', 'User', 'user_login', '2021-11-01 05:57:34'),
(11, 'Create Menu Set', 'App\\Http\\Controllers\\Website\\WebsiteController@create_menu_set', 'Website', 'create_menu_set', '2021-11-01 05:59:40'),
(12, 'Upate Menu Set', 'App\\Http\\Controllers\\Website\\WebsiteController@update_menu_order', 'Website', 'update_menu_set', '2021-11-01 06:00:05'),
(13, 'Delete Menu Set', 'App\\Http\\Controllers\\Website\\WebsiteController@delete_menu_set', 'Website', 'delete_menu_set', '2021-11-01 06:00:51'),
(14, 'Show Project List', 'App\\Http\\Controllers\\Projects\\ProjectsController@index', 'Projects', 'index', '2021-11-01 06:01:54'),
(15, 'Enter To Project', 'App\\Http\\Controllers\\Projects\\ProjectsController@enter', 'Projects', 'enter', '2021-11-01 06:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `home` enum('Yes','No') NOT NULL DEFAULT 'No',
  `s_no` varchar(20) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `uid`, `project_key`, `title`, `keywords`, `description`, `heading`, `sub_heading`, `content`, `home`, `s_no`, `enable`) VALUES
(32, '16', '1161270535', 'My First Page Title2', '', '', 'My First Page Heading2', '', '<p>My First Page Content2</p>\r\n', 'No', '', 'Yes'),
(33, '0', '1183620902', 'title', '', '', 'tushar', '', '<p><img alt=\"\" src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/31096_4.jpg\" style=\"height:71px; width:100px\" /></p>\r\n\r\n<p>tuighjgjh</p>\r\n\r\n<p>&nbsp;</p>', 'No', '', 'Yes'),
(30, '9', '1183620902', 'About Us2', '', '', 'About Us2', '', '&lt;p&gt;And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish the&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;tishar&lt;/p&gt;', 'No', '', 'Yes'),
(31, '9', '1183620902', 'Contact Us', '', '', 'Contact Us', '', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://localhost:8080/working/vidhsys_admin//filemanager/images/31096_4.jpg&quot; style=&quot;height:214px; width:300px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Rainy Day&lt;/p&gt;', 'No', '', 'Yes'),
(35, '16', '1161270535', 'test', '', '', 'test', '', '&lt;p&gt;test&lt;/p&gt;', 'No', '', 'Yes'),
(36, '9', '1276864229', 'About Us', '', '', 'About Us', 'subheading', '&lt;p&gt;test&lt;/p&gt;', 'No', '', 'Yes'),
(37, '', '1276864229', 'Book Party Hall', '', '', 'heading', '', '<p>content</p>\r\n', 'No', '', 'Yes'),
(38, '', '', 'Customer Feedback', '', '', 'heading', '', '<p>content</p>\r\n', 'No', '', 'No'),
(39, '', '', '', '', '', '', '', '', 'No', '', 'No'),
(40, '', '', 'Customer Feedback', '', '', 'Customer Feedback', '', '<p>customer feedback</p>\r\n', 'No', '', 'Yes'),
(41, '', '', 'Contact Us', '', '', 'Contact Us', '', '<p>Contact Us</p>\r\n', 'No', '', 'No'),
(42, '', '', 'Contact Us', '', '', 'Contact Us', '', '<p>Contact Us</p>\r\n', 'No', '', 'No'),
(43, '', '', 'Contact Us', '', '', 'Contact Us', '', '<p>Contact Us</p>\r\n', 'No', '', 'No'),
(44, '9', '1276864229', 'how i disable public holiday list array from 30 day of a month in php?', '', '', 'Book Party Hall', '', '&lt;p&gt;tresdf&lt;/p&gt;', 'No', '', 'Yes'),
(45, '9', '1276864229', 'Dr Shilpis profile', '', '', 'Enquiry', '', '<p>lkjol</p>', 'No', '', 'Yes'),
(46, '9', '1276864229', 'Dr Shilpis profilecvxc', '', '', 'Enquirycxvxccvxc', 'xcvxcvxcvxcv', '<p>lkjolxcvxcvxc</p>', 'No', '', 'No'),
(47, '3', '1161270535', 'sdfad', '', '', 'sdfsd', '', '<p>sfsdf</p>\r\n', 'No', '', 'Yes'),
(48, '3', '1161270535', 'dfsg', '', '', 'dfgsdg', '', '<p>dfsg fgfdg dfgfd</p>\r\n', 'No', '', 'Yes'),
(49, '0', '1276864229', 'sfsa', '', '', 'sfsa', '', '<p>ssafd</p>', 'No', '', 'Yes'),
(50, '0', '1276864229', 'sfsaf tushar', '', '', 'sfdsfdas fsaf saf tushar', '', '<p>s dsaf sf saf dsa&nbsp; tushar</p>', 'No', '', 'Yes'),
(51, '0', '1276864229', 'sdfas saf asfs', '', '', 'dsfsa fsa fsdafsa', '', '<p>&nbsp;dsf afaafs&nbsp;</p>', 'No', '', 'Yes'),
(52, '0', '1276864229', 'sfds fas f', '', '', 'fdsa fsafsa', '', '<p>&nbsp;dsa fsafd</p>', 'No', '', 'Yes'),
(53, '0', '1276864229', 'sdfsa', '', '', 'ds fafds', '', '<p>ds asfsfda</p>', 'No', '', 'Yes'),
(54, '0', '1276864229', 'xvxvz', '', '', 'sdsfds fsd', '', '<p>ds sdf dsf sfsfda ds</p>', 'No', '', 'Yes'),
(55, '0', '1276864229', 'dsds fsd fas11crtre', '', '', 's as fsa f sad11', '', '<p>s afds dsa fdsa11</p>', 'No', '', 'Yes'),
(56, '0', '1276864229', 'test tushar', '', '', 'test tushar', '', '<p>test tushar</p>', 'No', '', 'Yes'),
(57, '0', '1276864229', 'dfdsgs', '', '', 'ds sd', '', '<p>&nbsp;dds df&nbsp;</p>', 'No', '', 'Yes'),
(58, '0', '1276864229', 'cvbxcb', '', '', 'cbvxcb', '', '<p>cvbcxcv</p>', 'No', '', 'No'),
(59, '0', '1276864229', 'rtwet', '', '', 'ertrew', '', '<p>ertwete</p>', 'No', '', 'Yes'),
(60, '0', '1276864229', 'dfs', '', '', 'dfgdsg', '', '<p>dfgsdg</p>', 'No', '', 'Yes'),
(61, '0', '1276864229', 'fdgdsg', '', '', 'dfgds', '', '<p>dfgdsfgsd</p>', 'No', '', 'Yes'),
(62, '0', '1276864229', 'dfgdsg', '', '', 'dfgsg', '', '<p>dfsgsd</p>', 'No', '', 'Yes'),
(63, '0', '1276864229', 'gfaf', '', '', 'dsfas', '', '<p>sdfdsa</p>', 'No', '', 'Yes'),
(64, '0', '1276864229', 'dgfdg', '', '', 'dfgsf', '', '<p>dfgsdg</p>', 'No', '', 'Yes'),
(65, '0', '1276864229', 'dgfdg', '', '', 'dfgsf', '', '<p>dfgsdg</p>', 'No', '', 'Yes'),
(66, '0', '1276864229', 'rtwt', '', '', 'ertw', '', '<p>ertwet</p>', 'No', '', 'Yes'),
(67, '0', '1276864229', 'try', '', '', 'ty', '', '<p>rtye</p>', 'No', '', 'Yes'),
(68, '0', '1276864229', 'try', '', '', 'ty', '', '<p>rtye</p>', 'No', '', 'Yes'),
(69, '0', '1276864229', 'fgdhg', '', '', 'fghd', '', '<p>gfhdf</p>', 'No', '', 'No'),
(70, '0', '1276864229', 'dfgdsfg  fdgs', '', '', 'gsd sdg', '', '<p>&nbsp;fds sdgsd df gds</p>', 'No', '', 'Yes'),
(71, '0', '1276864229', 'sfsa fasf abet', '', '', 's af s', '', '<p>s af a fas</p>', 'No', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `layout` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `locale` varchar(50) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `discount` int(5) DEFAULT NULL,
  `stock` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online_date` date NOT NULL,
  `enable` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `name`, `description`, `category`, `quantity`, `discount`, `stock`, `online_date`, `enable`, `author`, `approved_by`, `comments`) VALUES
(1, '3sdfs', 'sf', 'fsf', 1, 0, 0, 'sf', '0000-00-00', '', 'sfa', 'saf', 'sdfa'),
(2, '3sdfs', 'sf', 'fsf', 1, 0, 0, 'sf', '0000-00-00', '', 'sfa', 'saf', 'sdfa'),
(3, '23333sdfa', 'sda', 'sdaf', 1, 0, 0, 'sd', '0000-00-00', '1', 'sda', 'sa', 'as'),
(4, 'wqrwq', 'sadf', 'saf', 1, 0, 0, 'sa', '0000-00-00', '', '', '', ''),
(5, 'wqrwq', 'sadf', 'saf', 1, 0, 0, 'sa', '0000-00-00', '', '', '', ''),
(6, '32', 'sdfa', 'sdf', 0, 0, 0, 'sda', '0000-00-00', '', '', '', ''),
(7, 'sdfa3223', 'sda', 'sdfas', 1, 0, 0, 'sda', '0000-00-00', '', '', '', ''),
(8, '34', 'sdfs', 'sdf', 1, 0, 0, 'sfa', '0000-00-00', '', '', '', ''),
(9, 'sdfa', 'sdfa', 'sda', 1, 0, 0, 'sdfa', '0000-00-00', '', '', '', ''),
(10, '3232', 'fsdf', 'sdf', 1, 0, 0, 'sda', '0000-00-00', '', '', '', ''),
(11, 'sd3223', 'sdsa', 'sda', 1, 0, 0, 'sfa', '0000-00-00', '', '', '', ''),
(12, '234', 'sfsa', 'sa', 1, 0, 0, 'saf', '0000-00-00', '', '', '', ''),
(13, '234', 'sfsa', 'sa', 1, 0, 0, 'saf', '0000-00-00', '', '', '', ''),
(14, 'sfa', 'sadf', 'saf', 1, 0, 0, 'saf', '0000-00-00', '', '', '', ''),
(15, '2342', 'ewrwer', 'werwe', 1, 0, 0, 'sdf', '0000-00-00', '', '', '', ''),
(16, '24234', 'fsdf', 'afdf', 1, 0, 0, 'sdfa', '0000-00-00', '', '', '', ''),
(17, '234rw', 'fsaf', 'saf', 1, 0, 0, 'sfa', '0000-00-00', '', '', '', ''),
(18, 'sda', 'sda', 'dsa', 1, 0, 0, 'sda', '0000-00-00', '', '', '', ''),
(19, 'sdfaf', 'safs', 'fas', 1, 0, 0, 'saf', '0000-00-00', '', '', '', ''),
(20, '', '', NULL, 0, 0, NULL, '', '0000-00-00', '1', NULL, NULL, NULL),
(21, '', '', '', 0, 0, 0, '', '0000-00-00', '', '', '', ''),
(22, '', '', '', 0, 0, 0, '', '0000-00-00', '', '', '', ''),
(23, '', '', '', 0, 0, 0, '', '0000-00-00', '', '', '', ''),
(24, '', '', '', 0, 0, 0, '', '0000-00-00', '', '', '', ''),
(25, 'daffa', 'sfas', 'sdf', 0, 0, 0, 'sdfs', '0000-00-00', '', 'sdfsd', 'sdfsd', 'sdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `parent_id`, `category_name`, `category_img`) VALUES
(7, 0, 'sdfsadf sfsa', 'custom_name1612258437.jpg'),
(8, 0, 'sdfdf', ''),
(9, 0, 'sfsafsdf', ''),
(10, 0, 'sdfsafsd', 'custom_name1612266344.jpg'),
(11, 0, 'sfsafd', ''),
(12, 0, 'sdfsaf', ''),
(13, 0, 'sdfsf sdfsd', ''),
(14, 0, 'sfsd sdfsf sdf stest', ''),
(15, 0, 'sdfsdfa', ''),
(16, 0, 'sdfsaf sdfsadf', ''),
(17, 0, 'fsfdsarer', 'custom_name1612853903.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`id`, `product_id`, `name`) VALUES
(1, 19, 'my_custom_file_name1611576412.png'),
(2, 24, 'custom_name1611923380'),
(3, 25, 'custom_name1612181353');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_key` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `database_server` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `database_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `database_pwd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `database_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_root` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `enable` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `uid`, `package_id`, `project_key`, `name`, `domain`, `database_server`, `database_user`, `database_pwd`, `database_name`, `document_root`, `assigned_user`, `start_date`, `enable`) VALUES
(10, '9', '', '1276864229', 'Weekend Film', 'http://weekendfilm.com', '', '', '', '', '', '15,9,3', '0000-00-00', 'Yes'),
(11, '9', 'First option', '1183620902', 'vidhsystech', 'http://vidhsys.com', '', '', '', '', '', '9,3', '1970-01-01', 'Yes'),
(13, '9', 'First option', '1161270535', 'EnglishGuroo', 'englishguroo.com', '', '', '', '', '', '16,9,3', '1970-01-01', 'Yes'),
(14, '9', 'First option', '1026993136', 'test test', 'test.com', 'kshdnsa544', 'root', 'root', 'sample', '/public_html/vidhsys', '', '2018-06-24', 'Yes'),
(15, '9', '', '1008259374', 'project name', 'http://eye360now.com', '', '', '', '', '', '', '2018-08-22', 'No'),
(16, '9', '', '1388065438', 'vxvxcv', 'http://eye360now.com', 'xcvzxx', 'xcvx', 'xcvxcv', 'xcvxv', 'vxvczv', '', '2018-06-24', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `project_setting`
--

CREATE TABLE `project_setting` (
  `id` int(11) NOT NULL,
  `proid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_setting`
--

INSERT INTO `project_setting` (`id`, `proid`, `uid`) VALUES
(7, '2', '1'),
(8, '3', '2'),
(9, '2', '2'),
(10, '2', '3'),
(11, '4', '3'),
(12, '4', '2'),
(13, '2', '5'),
(14, '2', '6'),
(15, '6', '2'),
(16, '8', '1'),
(17, '8', '7');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privileges` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `name`, `privileges`) VALUES
(1, 'Administrator', '1,2,11,12,10,14,15'),
(2, 'Project Manager', '1,11,12,10'),
(3, 'accounts', ''),
(4, 'Account', ''),
(5, 'Account', ''),
(6, 'Account', ''),
(7, 'Account', ''),
(8, 'accounts', ''),
(9, 'accounts', '1,2,11,12,14'),
(10, 'test', '1,2,11,12,10,14,15'),
(11, 'dsfdsfa', '1,11,10,14'),
(12, 'IT Head', '1,2,11,12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(50) NOT NULL,
  `value` mediumtext NOT NULL,
  `is_array` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `showcase`
--

CREATE TABLE `showcase` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `showcase_set` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `custom_link` varchar(255) NOT NULL,
  `s_no` varchar(20) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showcase`
--

INSERT INTO `showcase` (`id`, `uid`, `project_key`, `showcase_set`, `keywords`, `description`, `title`, `heading`, `sub_heading`, `cover_image`, `content`, `custom_link`, `s_no`, `enable`) VALUES
(35, '16', '1161270535', '26', '', '', 'Basic English', 'Basic English', '', '', '', '', '2', 'Yes'),
(36, '16', '1161270535', '26', '', '', 'Advance English', 'Advance English', '', '', '', '', '1', 'Yes'),
(44, '9', '1183620902', '30', '', '', '', 'Book Party Hall', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/6666_5.jpg\" />', '<p>test</p>\r\n', 'http://vidhsys.com/p-about-us2-30.html', '2', 'Yes'),
(45, '9', '1183620902', '30', '', '', '', 'Book Party Hall', '', '<img src=\"http://localhost:8080/working/vidhsys_admin3/filemanager/vidhsystech/2.jpg\" />', '', '', '1', 'Yes'),
(42, '9', '1183620902', '28', '', '', '', 'test', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/31096_4.jpg\" />', '<p>test</p>\r\n', '', '1', 'Yes'),
(43, '9', '1276864229', '29', '', '', '', 'test', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/8049_3.jpg\" />', '<p>test</p>\r\n', 'http://weekendfilm.com/p-about-us-36.html', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `showcase_set`
--

CREATE TABLE `showcase_set` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `set_name` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `custom_link` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `home` enum('Yes','No') NOT NULL DEFAULT 'No',
  `s_no` varchar(20) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showcase_set`
--

INSERT INTO `showcase_set` (`id`, `uid`, `project_key`, `set_name`, `title`, `heading`, `sub_heading`, `keywords`, `description`, `cover_image`, `custom_link`, `content`, `home`, `s_no`, `enable`) VALUES
(26, '16', '1161270535', 'COURSES', 'My Courses', 'My Courses', '', '', '', '', '', '', 'No', '', 'Yes'),
(28, '9', '1183620902', 'SET4', 'sfsf', 'set4dfds', 'sub4dfds', '', '', '<img src=\"http://localhost:8080/working/vidhsys_admin3/filemanager/vidhsystech/1.jpg\" />', 'http://vidhsys.com/ss-secondset-25.html', '<p>tushar ddfdsfdsfsfsfdsfs</p>\r\n', 'Yes', '', 'Yes'),
(29, '9', '1276864229', 'TOPSLIDER', '', 'slider', 'slider', '', '', '', '', '<p>slider</p>\r\n', 'Yes', '', 'Yes'),
(30, '9', '1183620902', 'TUSHAR', 'About Basil', 'Book Party Hall', 'sdfsd', '', '', '<img src=\"http://localhost:8080/working/vidhsys_admin3/filemanager/vidhsystech/2.jpg\" />', 'http://basildentalclinic.com/', '<p>test</p>\r\n', 'Yes', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(50) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `site_title` text NOT NULL,
  `site_keywords` text NOT NULL,
  `site_description` text NOT NULL,
  `default_email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `uid`, `project_key`, `site_url`, `site_title`, `site_keywords`, `site_description`, `default_email`) VALUES
(11, '9', '1153311502', 'http://mytechserve.com', 'vidhsys', '', '', ''),
(10, '9', '1276864229', 'http://weekendfilm.com', '', '', '', ''),
(9, '16', '1161270535', 'http://englishguroo.com', '', '', '', ''),
(8, '9', '1183620902', 'http://vidhsys.com', 'vidhsys', 'dsdfadfsdafsda76', 'sdfasdfasdfsd76', 'infdfsds67o@dfas.com');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `slider_set` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `custom_link` varchar(255) NOT NULL,
  `s_no` varchar(20) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `uid`, `project_key`, `slider_set`, `title`, `heading`, `sub_heading`, `cover_image`, `custom_link`, `s_no`, `enable`) VALUES
(10, '9', '1276864229', '10', '', 'test', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/8049_3.jpg\" />', 'http://weekendfilm.com/ss-topslider-29.html', '', 'Yes'),
(8, '9', '1183620902', '8', 'fsfd', 'First', 'sdfs', 'http://localhost:8080/working/vidhsys_admin//filemanager/images/21701_6.jpg', 'http://vidhsys.com/gs-firstgalleryset-1.html', '', 'Yes'),
(9, '9', '1183620902', '8', '', 'Second', '', 'http://localhost:8080/working/vidhsys_admin//filemanager/images/14563_3.jpg', 'http://vidhsys.com/ss-firstset-24.html', '', 'Yes'),
(11, '9', '1183620902', '11', '', 'Book Party Hall', '', 'http://localhost:8080/working/vidhsys_admin//filemanager/images/31096_4.jpg', 'http://prembhog.com/A-Book-Party-Hall-308.html', '', 'Yes'),
(12, '9', '1183620902', '12', 'Dr Shilpis profile', 'Book Party Hall', 'xcvxcvxcvxcv', 'http://localhost:8080/working/vidhsys_admin//filemanager/images/21701_6.jpg', 'http://basildentalclinic.com/', '', 'Yes'),
(14, '9', '1183620902', '8', '', 'Enquiry', '', 'http://localhost:8080/working/vidhsys_admin//filemanager/images/14563_3.jpg', 'http://basildentalclinic.com/', '', 'Yes'),
(13, '9', '1183620902', '8', '', 'Enquiry', '', 'http://localhost:8080/working/vidhsys_admin//filemanager/images/21701_6.jpg', '', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `slider_set`
--

CREATE TABLE `slider_set` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `set_name` varchar(50) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_set`
--

INSERT INTO `slider_set` (`id`, `uid`, `project_key`, `set_name`, `enable`) VALUES
(1, '', '', 'HOMESLIDER', ''),
(2, '', '', 'TOPSLIDER', ''),
(5, '2', '4036', 'NEWSET', ''),
(4, '', '', 'NEWS', ''),
(6, '1', '1312767478', 'SLIDERSET1', ''),
(7, '1', '1312767478', 'SLIDERSET2', ''),
(8, '9', '1183620902', 'TOPSLIDER', 'Yes'),
(10, '9', '1276864229', 'TOPSLIDER', 'Yes'),
(11, '9', '1183620902', 'TESTSET', 'Yes'),
(12, '9', '1183620902', 'TUSHAR', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `user_key` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `parent`, `user_key`, `role_id`, `name`, `username`, `password`, `email`, `mobile`, `user_photo`, `address`, `s_no`, `active`, `remember_token`) VALUES
(9, 0, '1164061204', '1', 'Tushar', 'admin', '$2y$10$G9DWa3fC9qhSj3efBNzlGOeebY6n6TzQQdT1IBEit6tPtsfeB2rI6', 'tapeshwartoday@gmail.com', '9717102772', '6.jpg', 'Rajeev nagar', '1', '1', ''),
(15, 0, '1342814080', '2', 'Manish', 'user2', 'user2', 'u@u.com', '8527666861', '', '', '2', '1', ''),
(16, 0, '1187012252', '2', 'Tushar', 'tushar', 'tushar11', 'u@u.com', '9874563214', '', '', '3', '1', ''),
(17, 0, '1130247827', '2', 'Tusharsfs@wer.fwqr', 'tushar', 'tushar11', '', '9874563214', '', '', '', '1', ''),
(18, 0, '1254075866', '2', 'test', 'tushar', 'tushar11', 'tapeshwartoday@gmail.com', '9874563214', '', '', '', '1', ''),
(19, 0, '1041772411', '3', 'sdfsdf', 'sdfds', 'sdfs', 'sfsd@dsfs.sd', '3243243243', '', '', '', '1', ''),
(20, 0, '', '1', 'dsfdsf', 'sdfsf', '', 'sdfsad@dfsads.dsf', '3432432324', '', '', '', '1', ''),
(21, 0, '', '2', 'sdfsdfa', 'sdfsad', '', 'sdfsad@dsfdsa.sdfa', '32432432432', '', '', '', '1', ''),
(22, 0, '', '3', 'sdfafd', 'sdfsad', '', 'sdfas@dsfdsaf.sdf', '324324324324', '', '', '', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `public_id` varchar(50) NOT NULL,
  `original_file` varchar(512) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `server_file` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `parent` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_key` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `parent`, `user_key`, `user_role_id`, `name`, `username`, `password`, `email`, `mobile`, `user_photo`, `address`, `s_no`, `enable`) VALUES
(9, '', '1164061204', '1', 'Tushar', 'admin', 'admin11', 'tapeshwartoday@gmail.com', '9717102772', '6.jpg', 'Rajeev nagar', '1', 'Yes'),
(15, '9', '1342814080', '2', 'Manish', 'user2', 'user2', 'u@u.com', '8527666861', '', '', '2', 'Yes'),
(16, '9', '1187012252', '2', 'Tushar', 'tushar', 'tushar11', 'u@u.com', '9874563214', '', '', '3', 'Yes'),
(17, '', '1130247827', '2', 'Tusharsfs@wer.fwqr', 'tushar', 'tushar11', '', '9874563214', '', '', '', 'Yes'),
(18, '', '1254075866', '2', 'test', 'tushar', 'tushar11', 'tapeshwartoday@gmail.com', '9874563214', '', '', '', 'Yes'),
(19, '', '1041772411', '', '', '', '', '', '', '', '', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempt` int(11) NOT NULL DEFAULT 0,
  `active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `mobile`, `attempt`, `active`, `remember_token`) VALUES
(1, 'adminds', 'adminsdsf', 'testing@yopmail.com', '7812012451', 0, '1', ''),
(2, 'adminui', '$2y$10$srYs28lCv4HsXORue4GeHed6PgPLu99ZdZ7DC26slAWovYaArSx2C', 'sdfsa@safs.sdfa', '', 0, '1', ''),
(3, 'admin', '$2y$10$63PppO3GttsyDLonI0EIvu0YQ6krqmIAAZlTPZ4TYL.V8oV/utrEi', 'sdfsa@safs.sdfa', '', 0, '1', 'Cd2pjp3Cjh988TJRbzdi3GmUjtFWVC4qs0bkwGk9J4cMB0MKPXD4egHOzoRj'),
(4, 'test', '$2y$10$xu/kJDUq3mDg4EyXSCeeHewQCN1tawkO83/noOsUFIDL23ewmDn4a', 'test@yopmail.com', '', 0, '1', ''),
(5, 'adas', '$2y$10$xnh7FqgrB/D.Q21UJvz4YeaazhcYC73oNyH.Wgnq1rmMpBlqSShOu', 'sdfsad@sfsfa.sdfa', '', 0, '1', ''),
(6, 'test', '$2y$10$0PU8Byrz8V6PTH6MQd/KhOAdNEnggt3ODwokcvcjYXnZw9y9eQGvK', 'test@test.com', '', 0, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `project_key` varchar(20) NOT NULL,
  `set_name` varchar(50) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `custom_link` varchar(255) NOT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`id`, `uid`, `project_key`, `set_name`, `heading`, `sub_heading`, `cover_image`, `content`, `custom_link`, `enable`) VALUES
(16, '9', '1183620902', 'TEST', 'Enquiry', '', '<img src=\"http://localhost:8080/working/vidhsys_admin//filemanager/images/21701_6.jpg\" />', '<p>test</p>', 'http://vidhsys.com/ss-set4-28.html', 'Yes'),
(15, '9', '1276864229', 'LOGO', 'Website Logo', 'Website Sub Heading', '&lt;img src=&quot;http://localhost:8080/working/vidhsys_admin//filemanager/images/8049_3.jpg&quot; /&gt;', '&lt;p&gt;Website Logo&lt;/p&gt;', 'http://weekendfilm.com/p-about-us-36.html', 'Yes'),
(17, '9', '1183620902', 'TUSHAR', 'About Basil', '', '<img src=\"http://localhost:8080/working/vidhsys_admin3/filemanager/images/8889_3.jpg\" />', '<p>test</p>', 'http://vidhsys.com/s-test-42.html', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filemanager`
--
ALTER TABLE `filemanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_set`
--
ALTER TABLE `gallery_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_set`
--
ALTER TABLE `menu_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_id` (`page_id`,`locale`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_setting`
--
ALTER TABLE `project_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Indexes for table `showcase`
--
ALTER TABLE `showcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showcase_set`
--
ALTER TABLE `showcase_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_set`
--
ALTER TABLE `slider_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `public_id` (`public_id`),
  ADD UNIQUE KEY `server_file` (`server_file`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filemanager`
--
ALTER TABLE `filemanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery_set`
--
ALTER TABLE `gallery_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `menu_set`
--
ALTER TABLE `menu_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project_setting`
--
ALTER TABLE `project_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showcase`
--
ALTER TABLE `showcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `showcase_set`
--
ALTER TABLE `showcase_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slider_set`
--
ALTER TABLE `slider_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
