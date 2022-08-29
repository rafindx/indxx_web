<?php 
$con=mysqli_connect('localhost','indxx_demo','NA2;G+^}hcge','go_live');

$sql="CREATE TABLE `cron_file_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indxx` varchar(15) NOT NULL,
  `host_url` text NOT NULL,
  `dateFormat` varchar(255) NOT NULL,
  `AccessType` varchar(20) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `param` varchar(255) NOT NULL,
  `MailTo` varchar(255) NOT NULL,
  `MailFrom` varchar(255) NOT NULL,
  `MailSub` varchar(255) NOT NULL,
  `MailMessage` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

mysqli_query($con,$sql);
$sql="CREATE TABLE `indxx_charecterstics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indxx_id` int(11) NOT NULL,
  `base_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_constituents` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dividend_yield` float(10,2) NOT NULL,
  `52_week_highlow` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_top_constituents` int(11) NOT NULL,
  `status` tinyint(5) NOT NULL COMMENT '1-active,0-inactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
mysqli_query($con,$sql);


$sql="CREATE TABLE `indxx_risk_return_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indxx_id` int(11) NOT NULL,
  `statistic` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `qtd` float(10,5) DEFAULT NULL,
  `ytd` float(10,5) NOT NULL,
  `1year` float(10,5) NOT NULL,
  `3year` float(10,5) NOT NULL,
  `sbd` float(10,5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
mysqli_query($con,$sql);

$sql="CREATE TABLE `indxx_top_5_constituents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indxx_id` int(11) NOT NULL DEFAULT '0',
  `constituent` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ISIN` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `weight` float(12,10) DEFAULT '0.0000000000',
  `cdate` date DEFAULT '2018-09-03',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

mysqli_query($con,$sql);


$sql="CREATE TABLE `overview_tab_Desc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `overview` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1";
mysqli_query($con,$sql);
$sql="CREATE TABLE `tab_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

mysqli_query($con,$sql);
$sql="CREATE TABLE `tbl_about_tabs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tab_one_heading` varchar(100) NOT NULL,
  `tab_second_heading` varchar(100) NOT NULL,
  `tab_third_heading` varchar(100) NOT NULL,
  `tab_four_heading` varchar(100) NOT NULL,
  `overview_title` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
mysqli_query($con,$sql);


$sql="CREATE TABLE `tbl_admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
mysqli_query($con,$sql);



$sql="INSERT INTO `tbl_admin_login` (`id`, `email`, `password`, `created_on`) VALUES
(1,	'admin@gmail.com',	'21232f297a57a5a743894a0e4a801fc3',	'2018-05-28 19:08:53')";
mysqli_query($con,$sql);


$sql="CREATE TABLE `tbl_announcements_notification` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `pdf` text,
  `year` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `DateAdded` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

mysqli_query($con,$sql);
$sql="CREATE TABLE `tbl_calander` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
mysqli_query($con,$sql);

$sql="CREATE TABLE `tbl_candidate_applyed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apply_for` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

mysqli_query($con,$sql);
$sql="CREATE TABLE `tbl_careers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `mission` text COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `others` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

mysqli_query($con,$sql);


$sql="CREATE TABLE `tbl_client_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
mysqli_query($con,$sql);

$sql="CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `show_chart` int(11) NOT NULL,
  `show_characteristics` int(11) NOT NULL,
  `show_top_constituents` int(11) NOT NULL,
  `show_rr` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
mysqli_query($con,$sql);

$sql="CREATE TABLE `tbl_company_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `indxx_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
mysqli_query($con,$sql);

$sql="CREATE TABLE `tbl_conact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `compnay` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
mysqli_query($con,$sql);

$sql="CREATE TABLE `tbl_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Doc_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
mysqli_query($con,$sql);


$sql="CREATE TABLE `tbl_index_other_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indxx_id` int(11) NOT NULL,
  `fact_sheet` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

mysqli_query($con,$sql);
$sql="CREATE TABLE `tbl_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
mysqli_query($con,$sql);

$sql="DROP TABLE IF EXISTS `tbl_news`";
mysqli_query($con,$sql);
$sql="CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indxx` int(11) DEFAULT NULL,
  `title` text,
  `url` text,
  `pdf` varchar(255) NOT NULL,
  `publishedDate` date DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)script
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
mysqli_query($con,$sql);



$sql="CREATE TABLE `tbl_our_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `video_url` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

mysqli_query($con,$sql);
$sql="CREATE TABLE `tbl_our_value_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading1` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `heading2` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

mysqli_query($con,$sql);
$sql="CREATE TABLE `tbl_overview_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(225) NOT NULL,
  `bold_text` text NOT NULL,
  `text_before_point` text NOT NULL,
  `points` text NOT NULL,
  `text_after_point` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
mysqli_query($con,$sql);

$sql="CREATE TABLE `tbl_press` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `indxx` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `publishedDate` date NOT NULL,
  `year` varchar(255) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
mysqli_query($con,$sql);


?>