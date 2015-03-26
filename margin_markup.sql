-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 03:44 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `margin_markup`
--
CREATE DATABASE IF NOT EXISTS `margin_markup` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `margin_markup`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE IF NOT EXISTS `admin_profile` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `email_recipie` varchar(100) NOT NULL,
  `email_price` varchar(100) NOT NULL,
  `email_potential` varchar(100) NOT NULL,
  `support_name` varchar(100) NOT NULL,
  `support_email` varchar(100) NOT NULL,
  `color_theme` varchar(100) NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grocery_list`
--

CREATE TABLE IF NOT EXISTS `grocery_list` (
  `grocery_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` varchar(100) NOT NULL,
  `grocery_desc` varchar(200) NOT NULL,
  `grocery_pack` int(11) NOT NULL,
  `grocery_size` varchar(200) NOT NULL,
  `grocery_purcunit` varchar(200) NOT NULL,
  `grocery_um` varchar(200) NOT NULL,
  `grocery_ruperpu` int(11) NOT NULL,
  `grocery_yiled` int(11) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`grocery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `grocery_list`
--

INSERT INTO `grocery_list` (`grocery_id`, `group_id`, `grocery_desc`, `grocery_pack`, `grocery_size`, `grocery_purcunit`, `grocery_um`, `grocery_ruperpu`, `grocery_yiled`, `reg_date`) VALUES
(35, '1', 'Avocado Hass Fresh', 48, 'Cnt', 'case', 'ea', 288, 80, '2015-03-03 17:52:32'),
(36, '1', 'Strawberry Fresh', 8, 'LBS', 'case', 'ea', 128, 90, '2015-03-03 17:52:32'),
(37, '1', 'Grape Red Lunch Bunch 150 Ct Fresh', 48, 'Cnt', 'case', 'ea', 140, 100, '2015-03-03 17:52:32'),
(38, '1', 'Lemon Choice 140 Count Size Fresh', 140, 'Cnt', 'case', 'ea', 140, 100, '2015-03-03 17:52:32'),
(39, '1', 'Bean Garbanzo Fancy (Chickpea)', 6, '#10 Can', 'case', 'ea', 660, 60, '2015-03-03 17:52:32'),
(40, '1', 'Onion Red Jumbo Fresh Carton', 25, 'LBS', 'case', 'ea', 400, 95, '2015-03-03 17:52:32'),
(41, '1', 'Pepper Green Chopped Lrge Avg 14-16 Ct Fresh', 5, 'LBS', 'case', 'ea', 90, 80, '2015-03-03 17:52:32'),
(42, '1', 'Capers Nonpareille Plastic', 1, '32 oz', 'case', 'ea', 80, 75, '2015-03-03 17:52:32'),
(43, '2', 'Bacon Single Slice 14-17 Double Smoked', 1, '16 oz', 'case', 'ea', 90, 80, '2015-03-03 15:19:34'),
(44, '2', 'Pork Chop Smoked Ends/Pieces Bone In', 1, '16 oz', 'case', 'ea', 90, 80, '2015-03-03 15:19:34'),
(45, '2', 'Pork Roll Canadian Water Added Slice', 1, '16 oz', 'case', 'ea', 90, 80, '2015-03-03 15:19:34'),
(46, '2', 'Ham Water Added Whole D-Shaped', 1, '16 oz', 'case', 'ea', 90, 80, '2015-03-03 15:19:34'),
(47, '2', 'Sausage Link Precooked 6" 4-1 Gold', 1, '16 oz', 'case', 'ea', 90, 80, '2015-03-03 15:19:34'),
(48, '2', 'Chicken Breast No Bone Or Skin Filet 4', 1, '16 oz', 'case', 'ea', 90, 80, '2015-03-03 15:19:34'),
(49, '2', 'Turkey Breast Slice .7 Ounce Smoked', 1, '16 oz', 'case', 'ea', 90, 80, '2015-03-03 15:19:34'),
(50, '1', 'Basil Fresh', 1, '16 oz', 'case', 'ea', 32, 75, '2015-03-03 17:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `office_administration`
--

CREATE TABLE IF NOT EXISTS `office_administration` (
  `office_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_company_name` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `office_contact_person` varchar(100) NOT NULL,
  `office_phone_number` varchar(100) NOT NULL,
  `office_email` varchar(100) NOT NULL,
  `linkedin_link` varchar(100) NOT NULL,
  `facebook_link` varchar(100) NOT NULL,
  `twitter_link` varchar(100) NOT NULL,
  PRIMARY KEY (`office_admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `office_administration`
--

INSERT INTO `office_administration` (`office_admin_id`, `office_company_name`, `photo`, `office_contact_person`, `office_phone_number`, `office_email`, `linkedin_link`, `facebook_link`, `twitter_link`) VALUES
(1, '5', '1418635846profile.gif', 'Kim Cuglio', '800-555-1732', 'kim@synclink.com', 'www.linkedin.com/mypage', 'www.facebook.com/mypage', 'www.twitter.com/mypage'),
(2, '4', '1418636928profile.gif', 'Paul Malik', '800-552-1752', 'paulmalik@gmail.com', 'www.linkedin.com/mypage', 'www.facebook.com/mypage', 'www.twitter.com/mypage');

-- --------------------------------------------------------

--
-- Table structure for table `purveyors_api_data`
--

CREATE TABLE IF NOT EXISTS `purveyors_api_data` (
  `api_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_count` varchar(100) NOT NULL,
  `api_unit` varchar(100) NOT NULL,
  `api_grocery_item` varchar(250) NOT NULL,
  `api_factor` varchar(100) NOT NULL,
  PRIMARY KEY (`api_data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purveyors_api_data`
--

INSERT INTO `purveyors_api_data` (`api_data_id`, `api_count`, `api_unit`, `api_grocery_item`, `api_factor`) VALUES
(1, 'a', 'aa', 'Mccormick Parsley Flake Gourmet - .2 Oz', '2'),
(2, 's', 'ss', 'Italian Parsley Bunch', '4'),
(3, 'r', 'rr', 'Italian Parsley Bunch', '2');

-- --------------------------------------------------------

--
-- Table structure for table `purveyors_company_info`
--

CREATE TABLE IF NOT EXISTS `purveyors_company_info` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `profile_photo` varchar(200) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `purveyors_company_info`
--

INSERT INTO `purveyors_company_info` (`company_id`, `company_name`, `contact_person`, `contact_number`, `contact_email`, `profile_photo`, `reg_date`) VALUES
(1, 'sysco', 'sas', '1234345454545', 'sdsd@kjhkj.com', '', '0000-00-00 00:00:00'),
(4, 'Walmart', 'tester', '2133224234344', 'tester23@gmail.com', '', '0000-00-00 00:00:00'),
(5, 'spring field', 'Kim kugliyo', '800-555-1752', 'kim@gmail.com', '1418254529profile.gif', '2015-03-04 10:11:03'),
(6, 'Regal Foods', 'Jogn casewell', '800-555-1732', 'jogn@regalfood.com', '', '0000-00-00 00:00:00'),
(28, 'dsds', 'ds', 'dsdsd', 'sasa@gmail.com', '', '2015-03-03 23:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `purveyors_csv_data`
--

CREATE TABLE IF NOT EXISTS `purveyors_csv_data` (
  `csv_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `group_id` varchar(100) NOT NULL,
  `product_number` varchar(100) NOT NULL,
  `product_desc` varchar(250) NOT NULL,
  `product_brand` varchar(250) NOT NULL,
  `pack` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  PRIMARY KEY (`csv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `purveyors_csv_data`
--

INSERT INTO `purveyors_csv_data` (`csv_id`, `company_id`, `group_id`, `product_number`, `product_desc`, `product_brand`, `pack`, `size`, `unit`, `price`) VALUES
(1, 5, '1', '8350258', 'MILK  WHOLE VITAMIN D PLASTIC REF PASTEURIZED HOMOGENIZED', 'GLENVIEW FARMS', '4', '1 GA', 'Each', '21.74'),
(2, 5, '1', '3975067', 'CUSTARD MIX  SOFT SERVE CHOCOLATE 10% BUTTERFAT REF BAG-IN-BOX', 'MEADOWVALE', '2', '2.5 GA', 'Each', '52.77'),
(3, 5, '1', '3975075', 'CUSTARD MIX  SOFT SERVE PLAIN 10% BUTTERFAT REF BAG-IN-BOX', 'MEADOWVALE', '2', '2.5 GA', 'Case', '57.84'),
(4, 5, '2', '5736988', 'CAKE  ROUND 8" CHOCOLATE NOT ICED UNSLICED FROZEN', 'ALLEN RICH''S', '24', '12.5 OZ', 'Case', '51.95'),
(5, 5, '2', '5737010', 'CAKE  ROUND 8" YELLOW NOT ICED UNSLICED FROZEN', 'J.W. ALLEN', '24', '12.5 OZ', 'Case', '51.95'),
(6, 5, '2', '2235661', 'BROWNIE  FUDGE NOT ICED SHEET FULL UNSLICED TRAY FROZEN', 'PILLSBURY', '3', '152 OZ', 'Each', '85.07'),
(7, 5, '3', '6328330', 'CHERRY  MARASCHINO HALVES JUMBO GLASS JAR', 'MONARCH', '6', '.5 GA', 'Each', '64.9'),
(8, 5, '3', '2017028', 'CRUMB  GRAHAM CRACKER PLAIN FINE BAG', 'KEEBLER', '10', ' LB', 'Case', '22.47'),
(9, 5, '3', '4749206', 'CONE  ICE CREAM CAKE DISPENSER CUP #10', 'JOY CONE', '8', '112 EA', 'Each', '49.35'),
(10, 5, '3', '6125199', 'CONE  ICE CREAM WAFFLE CLASSIC LARGE SLEEVE PACK', 'JOY CONE', '12', '16 EA', 'Each', '40.28'),
(11, 5, '3', '9327842', 'PRETZEL  TWIST MINI', 'MONARCH', '7', 'LB', 'Case', '13.98'),
(12, 5, '4', '8627903', 'LID  CUP 12-20 OZ STRAW SLOTTED PLASTIC CLEAR', 'DART', '10', '100 EA', 'Each', '52.93'),
(13, 5, '4', '5544234', 'CONTAINER  PAPER 32 OZ DOUBLE POLY COATED WHITE CARRY-OUT', 'SOLO CUP', '20', '25 EA', 'Each', '137.92'),
(14, 5, '4', '3006038', 'LID  CONTAINER 32 OZ FLAT NON VENTED PAPER WHITE SPIRAL WOUND COVER', 'SOLO CUP', '2', '25 EA', 'Each', '150.25'),
(15, 6, '1', '332593', 'Buttermilk Plas In Box', '', '6', '.5 gal', 'Each', '$20.44'),
(16, 6, '1', '099624', 'Chs American Color EZ Melt Blk', '', '6', '5 lb', 'Case', '$64.13'),
(17, 6, '5', '021671', 'Ham & Water Menu Master 95%FF', '', '2', '10 lb avg', 'Case', '$2.06'),
(18, 6, '5', '002950', 'Hot Dog 6" 8/1 FC', '', '1', '10 lb', 'Each', '$19.61'),
(19, 6, '5', '38900', 'Turkey Ham Diced 1/4"', '', '1', '10 lb', 'Each', '$25.91'),
(20, 6, '5', '009976', 'Vanilla Extract Imitation', '', '6', '1 qt', 'Each', '$29.19'),
(21, 6, '6', '022765', 'Chic FC 1/2" Diced Natl wh/drk', '', '1', '10 lb', 'Each', '$32.31'),
(22, 6, '6', '059778', 'Chic Thigh Mt Shrd F/C', '', '2', '5 lb', 'Case', '$36.81'),
(23, 6, '7', '897335', 'Shortening Blnd Solid AP', '', '1', '50 lb', 'Case', '$34.95'),
(24, 6, '8', '081783', 'Pre Soak Apex', '', '3', '4 lb', 'Case', '$116.73'),
(25, 6, '8', '081787', 'Rinse Apex Add', '', '2', '2.5 lb', 'Each', '$243.18'),
(26, 6, '8', '050235', 'Sanitizer Machine Ultra San', '', '1', '5 gal', 'Case', '$39.41'),
(27, 6, '8', '084307', 'Soap Mild Foam DigiClean', '', '6', '750 ml', 'Case', '$76.56'),
(28, 6, '9', '333156', 'Crust Pizza 10" GF Seasnd', '', '1', '24 ct', 'Each', '$29.63'),
(29, 6, '5', '8350258', 'MILK  WHOLE VITAMIN D PLASTIC REF PASTEURIZED HOMOGENIZED', 'GLENVIEW FARMS', '4', '1 GA', 'Case', '21.74'),
(30, 6, '5', '3975067', 'CUSTARD MIX  SOFT SERVE CHOCOLATE 10% BUTTERFAT REF BAG-IN-BOX', 'MEADOWVALE', '2', '2.5 GA', 'Case', '52.77'),
(31, 6, '5', '3975075', 'CUSTARD MIX  SOFT SERVE PLAIN 10% BUTTERFAT REF BAG-IN-BOX', 'MEADOWVALE', '2', '2.5 GA', 'Case', '57.84'),
(32, 6, '11', '5736988', 'CAKE  ROUND 8" CHOCOLATE NOT ICED UNSLICED FROZEN', 'ALLEN RICH''S', '24', '12.5 OZ', 'Case', '51.95'),
(33, 6, '11', '5737010', 'CAKE  ROUND 8" YELLOW NOT ICED UNSLICED FROZEN', 'J.W. ALLEN', '24', '12.5 OZ', 'Case', '51.95'),
(34, 6, '11', '2235661', 'BROWNIE  FUDGE NOT ICED SHEET FULL UNSLICED TRAY FROZEN', 'PILLSBURY', '3', '152 OZ', 'Case', '85.07'),
(35, 6, '3', '6328330', 'CHERRY  MARASCHINO HALVES JUMBO GLASS JAR', 'MONARCH', '6', '.5 GA', 'Each', '64.9'),
(36, 6, '3', '2017028', 'CRUMB  GRAHAM CRACKER PLAIN FINE BAG', 'KEEBLER', '10', ' LB', 'Each', '22.47'),
(37, 6, '3', '4749206', 'CONE  ICE CREAM CAKE DISPENSER CUP #10', 'JOY CONE', '8', '112 EA', 'Each', '49.35'),
(38, 6, '3', '6125199', 'CONE  ICE CREAM WAFFLE CLASSIC LARGE SLEEVE PACK', 'JOY CONE', '12', '16 EA', 'Each', '40.28'),
(39, 6, '3', '9327842', 'PRETZEL  TWIST MINI', 'MONARCH', '7', 'LB', 'Each', '13.98'),
(40, 6, '4', '8627903', 'LID  CUP 12-20 OZ STRAW SLOTTED PLASTIC CLEAR', 'DART', '10', '100 EA', 'Case', '52.93'),
(41, 6, '4', '5544234', 'CONTAINER  PAPER 32 OZ DOUBLE POLY COATED WHITE CARRY-OUT', 'SOLO CUP', '20', '25 EA', 'Case', '137.92'),
(42, 6, '4', '3006038', 'LID  CONTAINER 32 OZ FLAT NON VENTED PAPER WHITE SPIRAL WOUND COVER', 'SOLO CUP', '2', '25 EA', 'Case', '150.25'),
(43, 6, '10', '268150', 'Avocado Hass Frsh', '', '1', '48-60 ct', 'Each', '$30.56 ');

-- --------------------------------------------------------

--
-- Table structure for table `purveyors_group`
--

CREATE TABLE IF NOT EXISTS `purveyors_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `purveyors_group`
--

INSERT INTO `purveyors_group` (`group_id`, `group_name`) VALUES
(1, 'fresh product'),
(2, 'meat'),
(3, 'dry grocery'),
(4, 'non-foods'),
(5, 'dairy'),
(6, 'poultry'),
(7, 'canned & dry'),
(8, 'eco lab'),
(9, 'spurrier'),
(10, 'produce'),
(11, 'frozen food');

-- --------------------------------------------------------

--
-- Table structure for table `purveyors_manual_data`
--

CREATE TABLE IF NOT EXISTS `purveyors_manual_data` (
  `manual_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` varchar(100) NOT NULL,
  `manual_pack` varchar(100) NOT NULL,
  `manual_size` varchar(200) NOT NULL,
  `manual_punit` varchar(100) NOT NULL,
  `manual_groceryitem` varchar(250) NOT NULL,
  `manual_price` varchar(100) NOT NULL,
  `manual_factor` varchar(200) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`manual_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purveyors_manual_data`
--

INSERT INTO `purveyors_manual_data` (`manual_id`, `company_id`, `manual_pack`, `manual_size`, `manual_punit`, `manual_groceryitem`, `manual_price`, `manual_factor`, `reg_date`) VALUES
(1, '2', '20', '10', 'case', 'Avocado Hass Fresh', '20', '0.6', '2015-02-20 19:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `sync_data`
--

CREATE TABLE IF NOT EXISTS `sync_data` (
  `sync_id` int(11) NOT NULL AUTO_INCREMENT,
  `sync_csv_id` int(11) NOT NULL,
  `sync_company_id` int(11) NOT NULL,
  `sync_pack` varchar(200) NOT NULL,
  `sync_size` varchar(200) NOT NULL,
  `sync_unit` varchar(200) NOT NULL,
  `sync_price` varchar(200) NOT NULL,
  `sync_factor` varchar(200) NOT NULL,
  `sync_date` datetime NOT NULL,
  PRIMARY KEY (`sync_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sync_data`
--

INSERT INTO `sync_data` (`sync_id`, `sync_csv_id`, `sync_company_id`, `sync_pack`, `sync_size`, `sync_unit`, `sync_price`, `sync_factor`, `sync_date`) VALUES
(10, 1, 5, '4', '1 GA', 'Each', '21.74', '12', '2015-03-04 11:08:44'),
(13, 0, 5, '24', '2', 'case', '35', '1', '2015-03-04 15:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `emailid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rs` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `cog_sms` int(11) NOT NULL,
  `cog_daily_email` int(11) NOT NULL,
  `customer_support` int(11) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`login_id`, `emailid`, `username`, `password`, `rs`, `phone`, `cog_sms`, `cog_daily_email`, `customer_support`) VALUES
(1, 'sajeesh.k@omkarlabs.com', 'sajeesh', '0192023a7bbd73250516f069df18b500', 'FRO4ivoEKn', '9895948852', 1, 1, 1),
(2, 'test123@gmail.com', 'test', '202cb962ac59075b964b07152d234b70', 'abcde', '9895948853', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
