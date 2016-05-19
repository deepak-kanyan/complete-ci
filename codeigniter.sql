-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2016 at 12:21 PM
-- Server version: 5.5.46-0ubuntu0.12.04.2
-- PHP Version: 5.6.16-1+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

CREATE TABLE `admin_credentials` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `profile_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `profile_pic`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `item_id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `isoCode` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`item_id`, `country`, `isoCode`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Albania', 'AL'),
(3, 'Algeria', 'DZ'),
(4, 'American Samoa', 'AS'),
(5, 'Andorra', 'AD'),
(6, 'Angola', 'AO'),
(7, 'Anguilla', 'AI'),
(8, 'Antarctica', 'AQ'),
(9, 'Antigua and Barbuda', 'AG'),
(10, 'Argentina', 'AR'),
(11, 'Armenia', 'AM'),
(12, 'Aruba', 'AW'),
(13, 'Australia', 'AU'),
(14, 'Austria', 'AT'),
(15, 'Azerbaijan', 'AZ'),
(16, 'Bahamas', 'BS'),
(17, 'Bahrain', 'BH'),
(18, 'Bangladesh', 'BD'),
(19, 'Barbados', 'BB'),
(20, 'Belarus', 'BY'),
(21, 'Belgium', 'BE'),
(22, 'Belize', 'BZ'),
(23, 'Benin', 'BJ'),
(24, 'Bermuda', 'BM'),
(25, 'Bhutan', 'BT'),
(26, 'Bolivia', 'BO'),
(27, 'Bosnia and Herzegovina', 'BA'),
(28, 'Botswana', 'BW'),
(29, 'Brazil', 'BR'),
(30, 'Brunei Darussalam', 'BN'),
(31, 'Bulgaria', 'BG'),
(32, 'Burkina Faso', 'BF'),
(33, 'Burundi', 'BI'),
(34, 'Cambodia', 'KH'),
(35, 'Cameroon', 'CM'),
(36, 'Canada', 'CA'),
(37, 'Cape Verde', 'CV'),
(38, 'Cayman Islands', 'KY'),
(39, 'Central African Republic', 'CF'),
(40, 'Chad', 'TD'),
(41, 'Chile', 'CL'),
(42, 'China', 'CN'),
(43, 'Colombia', 'CO'),
(44, 'Comoros', 'KM'),
(45, 'Democratic Republic of the Congo (Kinshasa)', 'CD'),
(46, 'Congo, Republic of (Brazzaville)', 'CG'),
(47, 'Cook Islands', 'CK'),
(48, 'Costa Rica', 'CR'),
(49, 'Cote d''Ivoire', 'CI'),
(50, 'Croatia', 'HR'),
(51, 'Cuba', 'CU'),
(52, 'Cyprus', 'CY'),
(53, 'Czech Republic', 'CZ'),
(54, 'Denmark', 'DK'),
(55, 'Djibouti', 'DJ'),
(56, 'Dominica', 'DM'),
(57, 'Dominican Republic', 'DO'),
(58, 'Ecuador', 'EC'),
(59, 'Egypt', 'EG'),
(60, 'El Salvador', 'SV'),
(61, 'Equatorial Guinea', 'GQ'),
(62, 'Eritrea', 'ER'),
(63, 'Estonia', 'EE'),
(64, 'Ethiopia', 'ET'),
(65, 'Falkland Islands', 'FK'),
(66, 'Faroe Islands', 'FO'),
(67, 'Fiji', 'FJ'),
(68, 'Finland', 'FI'),
(69, 'France', 'FR'),
(70, 'French Guiana', 'GF'),
(71, 'French Polynesia', 'PF'),
(72, 'Gabon', 'GA'),
(73, 'Gambia', 'GM'),
(74, 'Georgia', 'GE'),
(75, 'Germany', 'DE'),
(76, 'Ghana', 'GH'),
(77, 'Gibraltar', 'GI'),
(78, 'Greece', 'GR'),
(79, 'Greenland', 'GL'),
(80, 'Grenada', 'GD'),
(81, 'Guadeloupe', 'GP'),
(82, 'Guam', 'GU'),
(83, 'Guatemala', 'GT'),
(84, 'Guinea', 'GN'),
(85, 'Guinea-Bissau', 'GW'),
(86, 'Guyana', 'GY'),
(87, 'Haiti', 'HT'),
(88, 'Honduras', 'HN'),
(89, 'Hong Kong', 'HK'),
(90, 'Hungary', 'HU'),
(91, 'Iceland', 'IS'),
(92, 'India', 'IN'),
(93, 'Indonesia', 'ID'),
(94, 'Iran', 'IR'),
(95, 'Iraq', 'IQ'),
(96, 'Ireland', 'IE'),
(97, 'Israel', 'IL'),
(98, 'Italy', 'IT'),
(99, 'Jamaica', 'JM'),
(100, 'Japan', 'JP'),
(101, 'Jordan', 'JO'),
(102, 'Kazakhstan', 'KZ'),
(103, 'Kenya', 'KE'),
(104, 'Kiribati', 'KI'),
(105, 'Korea, (North Korea)', 'KP'),
(106, 'Korea, (South Korea)', 'KR'),
(107, 'Kuwait', 'KW'),
(108, 'Kyrgyzstan', 'KG'),
(109, 'Lao, PDR', 'LA'),
(110, 'Latvia', 'LV'),
(111, 'Lebanon', 'LB'),
(112, 'Lesotho', 'LS'),
(113, 'Liberia', 'LR'),
(114, 'Libya', 'LY'),
(115, 'Liechtenstein', 'LI'),
(116, 'Lithuania', 'LT'),
(117, 'Luxembourg', 'LU'),
(118, 'Macao', 'MO'),
(119, 'Macedonia, Rep. of', 'MK'),
(120, 'Madagascar', 'MG'),
(121, 'Malawi', 'MW'),
(122, 'Malaysia', 'MY'),
(123, 'Maldives', 'MV'),
(124, 'Mali', 'ML'),
(125, 'Malta', 'MT'),
(126, 'Marshall Islands', 'MH'),
(127, 'Martinique', 'MQ'),
(128, 'Mauritania', 'MR'),
(129, 'Mauritius', 'MU'),
(130, 'Mexico', 'MX'),
(131, 'Micronesia', 'FM'),
(132, 'Moldova', 'MD'),
(133, 'Monaco', 'MC'),
(134, 'Mongolia', 'MN'),
(135, 'Montenegro', 'ME'),
(136, 'Montserrat', 'MS'),
(137, 'Morocco', 'MA'),
(138, 'Mozambique', 'MZ'),
(139, 'Myanmar, Burma', 'MM'),
(140, 'Namibia', 'NA'),
(141, 'Nauru', 'NR'),
(142, 'Nepal', 'NP'),
(143, 'Netherlands', 'NL'),
(144, 'Netherlands Antilles', 'AN'),
(145, 'New Caledonia', 'NC'),
(146, 'New Zealand', 'NZ'),
(147, 'Nicaragua', 'NI'),
(148, 'Niger', 'NE'),
(149, 'Nigeria', 'NG'),
(150, 'Niue', 'NU'),
(151, 'Northern Mariana Islands', 'MP'),
(152, 'Norway', 'NO'),
(153, 'Oman', 'OM'),
(154, 'Pakistan', 'PK'),
(155, 'Palau', 'PW'),
(156, 'Palestine', 'PS'),
(157, 'Panama', 'PA'),
(158, 'Papua New Guinea', 'PG'),
(159, 'Paraguay', 'PY'),
(160, 'Peru', 'PE'),
(161, 'Philippines', 'PH'),
(162, 'Poland', 'PL'),
(163, 'Portugal', 'PT'),
(164, 'Puerto Rico', 'PR'),
(165, 'Qatar', 'QA'),
(166, 'Reunion Island', 'RE'),
(167, 'Romania', 'RO'),
(168, 'Russia', 'RU'),
(169, 'Rwanda', 'RW'),
(170, 'Saint Kitts and Nevis', 'KN'),
(171, 'Saint Lucia', 'LC'),
(172, 'Saint Vincent and the Grenadines', 'VC'),
(173, 'Samoa', 'WS'),
(174, 'San Marino', 'SM'),
(175, 'Sao Tome and Príncipe', 'ST'),
(176, 'Saudi Arabia', 'SA'),
(177, 'Senegal', 'SN'),
(178, 'Serbia', 'RS'),
(179, 'Seychelles', 'SC'),
(180, 'Sierra Leone', 'SL'),
(181, 'Singapore', 'SG'),
(182, 'Slovakia', 'SK'),
(183, 'Slovenia', 'SI'),
(184, 'Solomon Islands', 'SB'),
(185, 'Somalia', 'SO'),
(186, 'South Africa', 'ZA'),
(187, 'Spain', 'ES'),
(188, 'Sri Lanka', 'LK'),
(189, 'Sudan', 'SD'),
(190, 'Suriname', 'SR'),
(191, 'Swaziland', 'SZ'),
(192, 'Sweden', 'SE'),
(193, 'Switzerland', 'CH'),
(194, 'Syria', 'SY'),
(195, 'Taiwan', 'TW'),
(196, 'Tajikistan', 'TJ'),
(197, 'Tanzania', 'TZ'),
(198, 'Thailand', 'TH'),
(199, 'Tibet', '--'),
(200, 'Timor-Leste (East Timor)', 'TL'),
(201, 'Togo', 'TG'),
(202, 'Tokelau', 'TK'),
(203, 'Tonga', 'TO'),
(204, 'Trinidad and Tobago', 'TT'),
(205, 'Tunisia', 'TN'),
(206, 'Turkey', 'TR'),
(207, 'Turkmenistan', 'TM'),
(208, 'Tuvalu', 'TV'),
(209, 'Uganda', 'UG'),
(210, 'Ukraine', 'UA'),
(211, 'United Arab Emirates', 'AE'),
(212, 'United Kingdom', 'GB'),
(213, 'United States', 'US'),
(214, 'Uruguay', 'UY'),
(215, 'Uzbekistan', 'UZ'),
(216, 'Vanuatu', 'VU'),
(217, 'Vatican City State', 'VA'),
(218, 'Venezuela', 'VE'),
(219, 'Vietnam', 'VN'),
(220, 'Virgin Islands (British)', 'VG'),
(221, 'Virgin Islands (U.S.)', 'VI'),
(222, 'Wallis and Futuna Islands', 'WF'),
(223, 'Western Sahara', 'EH'),
(224, 'Yemen', 'YE'),
(225, 'Zambia', 'ZM'),
(226, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL COMMENT '1=sell,2=buy',
  `question` varchar(225) NOT NULL,
  `answer` varchar(225) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `category_id`, `question`, `answer`, `status`) VALUES
(2, 2, 'What happens after my car passes the Car2udirect inspection?', 'Congratulations! We are honored to have your shimmering, shining, rocket as part of the Car2udirect car family. \r\n\r\nAfter getting your car Car2udirect-Certified we''ll ask for you to confirm by email or phone that you''d like t', 1),
(4, 1, 'Lorem Ipsum is simply dummy text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', 1),
(5, 1, 'Lorem Ipsum is simply dummy text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', 1),
(6, 2, 'Lorem Ipsum is simply dummy text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `title`, `image`) VALUES
(1, 'About Us', '1461918632_sell-s1.png'),
(2, 'Terms', '1462191941_sell-s2.png'),
(3, 'Privacy', '1461918901_sell-s1.png'),
(4, 'How it Works', ''),
(5, 'Inspection Checklist', '');

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE `page_content` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `page_title` varchar(250) NOT NULL,
  `page_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`id`, `page_id`, `page_title`, `page_content`) VALUES
(1, 1, 'About Us', '<p><strong>Car2udirect</strong> <strong>Drives</strong> America. Over 50 Million Happy Customers have trusted us when buying or servicing their cars and trucks. That&#39;s more than any other automotive retailer. As America&#39;s Largest Automotive Retailer, we are rapidly expanding efforts to drive Customers to a seamless online to in-store experience. Thanks to AutoNation Express, Customers can shop nearly 100,000 vehicles and reserve a car or truck in 5 easy steps&hellip; saving time, hassle and money. Every vehicle comes with a low AutoNation price and every used car is backed with a 3 day/150 mile MoneyBack Guarantee.</p>'),
(2, 2, 'Terms and Conditions', '<p>Used Vehicles Under $10,000 Advertised Specials Used Vehicle Clearance Manufacturer Incentives Discounted New Vehicles Service ? Parts Specials</p>'),
(3, 3, 'Privacy Policy', '<p>Car2udirect is a service that primarily facilitates sales between private sellers and buyers. As a buyer, Beepi offers you many services and protections, which are described further throughout this Agreement. For example, all vehicles offered for sale to buyers have undergone Beepi&#39;s multipart pre-purchase vehicle inspection and meet the safety, registration, and smog requirements imposed by California upon delivery. Subject to certain restrictions, all Beepi vehicles come with a 10-day money back guaranty so that you can return a vehicle for any reason and receive a full refund.</p>'),
(4, 4, 'How it Works', 'In accordance with the terms set forth in Section 10 below, you agree that disputes between you and us will be resolved by binding, individual arbitration and you waive your right to participate in a class action lawsuit or class-wide arbitration.'),
(5, 5, 'Inspection Checklist', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `question` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `vehicle_id`, `team_id`, `name`, `email`, `contact`, `question`, `status`, `create_date`) VALUES
(1, 67, 4, 'New User ', 'newuser@yopmail.com', '90919293', 'hello admin.', '1', '2016-04-08 13:41:36'),
(2, 67, 4, 'New User ', 'newuser@yopmail.com', '90919293', 'hi admin.', '1', '2016-04-08 13:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `story_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`story_id`, `name`, `message`, `image`, `status`, `create_date`) VALUES
(11, 'Zach Crain, Freaker USA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '1463639454_d.jpeg', '1', '2016-04-29 15:34:51'),
(12, 'Test User 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '1463639447_asa.jpeg', '1', '2016-04-29 15:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sub_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`sub_id`, `email`, `status`, `create_date`) VALUES
(1, 'test@test.com', '1', '2016-04-29 12:21:18'),
(4, 'test1@test.com', '1', '2016-04-29 13:24:16'),
(5, 'test2@test.com', '1', '2016-04-29 13:25:51'),
(6, 'test12121@test.com', '1', '2016-04-29 18:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `biography` text,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `activation_key` varchar(100) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `profile_image`, `gender`, `dob`, `address`, `biography`, `city`, `state`, `phone`, `country`, `zipcode`, `activation_key`, `token`, `status`, `create_date`, `modified_date`) VALUES
(5, 'New', 'User ', 'newuser@yopmail.com', '0354d89c28ec399c00d3cb2d094cf093', '1463639574_asa.jpeg', NULL, '1994-03-14', 'Mohali', 'Just Test ', 'Khrar', 'Punjab', '90919293', 92, NULL, 'jQzE$duKvG', 'owPG3OBCz4hgSeLva/SrITxfVvgjhcuLdpnodk3FB87RmRVtzdL66s1tnvd98hIpHjuBzjys6oXDr7xStAFD4w==', '1', '2016-03-04 15:38:19', '2016-05-19 06:32:54'),
(6, 'user', 'name', 'user@mail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '', NULL, '0000-00-00', 'chandiarh', '', '', '', '', 0, NULL, 'PSX4Gg2lyf', NULL, '1', '2016-03-08 18:25:05', '2016-03-16 08:07:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_credentials`
--
ALTER TABLE `admin_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
