<?php
//server
$link = mysqli_connect("localhost", "indxx_demo", "NA2;G+^}hcge", "indexl_work_demo");

//local
//$link = mysqli_connect("localhost", "root", "123", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_name` varchar(255) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `blog_description` varchar(255) NOT NULL,
  `blog_path` varchar(255) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";

$sql2 = "ALTER TABLE `index_description` ADD (
  `filename` varchar(100) NOT NULL,
  `methodology` text NOT NULL,
  `benchmark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$sql3="CREATE TABLE `indxx_charecterstics` (
  `id` int(11) NOT NULL,
  `indxx_id` int(11) NOT NULL,
  `base_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_constituents` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dividend_yield` float(10,2) NOT NULL,
  `52_week_highlow` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_top_constituents` int(11) NOT NULL,
  `status` tinyint(5) NOT NULL COMMENT '1-active,0-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
";
$sql4="CREATE TABLE `indxx_documents` (
  `INDXX_DOCUMENTS_ID` bigint(20) NOT NULL,
  `TITLE` varchar(500) DEFAULT NULL,
  `DESCRIPTION` text,
  `IMAGE` text,
  `YEAR` varchar(45) NOT NULL,
  `RELEASE_DATE` datetime DEFAULT NULL,
  `INSDTTM` datetime DEFAULT NULL,
  `UPDTTM` timestamp NULL DEFAULT NULL,
  `ACTIVE` varchar(1) DEFAULT NULL COMMENT '''Y'' or 1 for Yes & ''N'' or 0 for No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";
$sql5="CREATE TABLE `indxx_insights` (
  `INDXX_INSIGHTS_ID` bigint(20) NOT NULL,
  `TITLE` varchar(500) DEFAULT NULL,
  `DESCRIPTION` text,
  `IMAGE` text,
  `RELEASE_DATE` datetime DEFAULT NULL,
  `INSDTTM` datetime DEFAULT NULL,
  `UPDTTM` timestamp NULL DEFAULT NULL,
  `ACTIVE` varchar(1) DEFAULT NULL COMMENT '''Y'' or 1 for Yes & ''N'' or 0 for No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$sql6="CREATE TABLE `indxx_notifications` (
  `INDXX_NOTIFICATIONS_ID` bigint(20) NOT NULL,
  `TITLE` varchar(500) DEFAULT NULL,
  `DESCRIPTION` text,
  `IMAGE` text,
  `YEAR` varchar(45) NOT NULL,
  `RELEASE_DATE` datetime DEFAULT NULL,
  `INSDTTM` datetime DEFAULT NULL,
  `UPDTTM` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ACTIVE` varchar(1) NOT NULL COMMENT '''Y'' or 1 for Yes & ''N'' or 0 for No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$sql7="CREATE TABLE `indxx_risk_return_statistics` (
  `id` int(11) NOT NULL,
  `indxx_id` int(11) NOT NULL,
  `statistic` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `qtd` float(10,5) DEFAULT NULL,
  `ytd` float(10,5) NOT NULL,
  `1year` float(10,5) NOT NULL,
  `3year` float(10,5) NOT NULL,
  `sbd` float(10,5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql8="CREATE TABLE `indxx_top_5_constituents` (
  `id` int(11) NOT NULL,
  `indxx_id` int(11) NOT NULL,
  `constituent` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ISIN` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `weight` float(12,2) NOT NULL,
  `cdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql9="CREATE TABLE `login` (
  `LOGIN_ID` int(11) NOT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `INSDTTM` datetime DEFAULT NULL,
  `UPDTTM` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ACTIVE` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$sql10="CREATE TABLE `press_release` (
  `PRESS_RELEASE_ID` bigint(20) NOT NULL,
  `TITLE` varchar(500) DEFAULT NULL,
  `DESCRIPTION` text,
  `PDF` text,
  `YEAR` varchar(4) NOT NULL,
  `RELEASE_DATE` datetime DEFAULT NULL,
  `INSDTTM` datetime DEFAULT NULL,
  `UPDTTM` timestamp NULL DEFAULT NULL,
  `ACTIVE` varchar(1) DEFAULT NULL COMMENT '''Y'' or 1 for Yes & ''N'' or 0 for No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$sql11="CREATE TABLE `tab_name` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql12="CREATE TABLE `tbl_about_tabs` (
  `id` int(11) NOT NULL,
  `tab_one_heading` varchar(100) NOT NULL,
  `tab_second_heading` varchar(100) NOT NULL,
  `tab_third_heading` varchar(100) NOT NULL,
  `tab_four_heading` varchar(100) NOT NULL,
  `overview` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";
$sql13="CREATE TABLE `tbl_admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$sql14="CREATE TABLE `tbl_announcements_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql15="CREATE TABLE `tbl_calander` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql16="CREATE TABLE `tbl_candidate_applyed` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apply_for` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql17="CREATE TABLE `tbl_careers` (
  `id` int(11) NOT NULL,
  `position_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `mission` text COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `others` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql18="CREATE TABLE `tbl_client_slider` (
  `id` int(11) NOT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql19="CREATE TABLE `tbl_conact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `compnay` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$sql20="CREATE TABLE `tbl_documents` (
  `id` int(11) NOT NULL,
  `title` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$sql21="CREATE TABLE `tbl_index_other_information` (
  `id` int(11) NOT NULL,
  `indxx_id` int(11) NOT NULL,
  `fact_sheet` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql22="CREATE TABLE `tbl_management` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `twitter` varchar(225) NOT NULL,
  `linkedin` varchar(225) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$sql23="CREATE TABLE `tbl_meta_tags` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_description` varchar(512) NOT NULL,
  `page_keyword` varchar(255) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$sql24="CREATE TABLE `tbl_newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql25="CREATE TABLE `tbl_our_services` (
  `id` int(11) NOT NULL,
  `heading` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `serviceText` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql26="CREATE TABLE `tbl_our_value` (
  `id` int(11) NOT NULL,
  `heading` varchar(225) NOT NULL,
  `text_before_point` text NOT NULL,
  `points` text NOT NULL,
  `text_after_point` text NOT NULL,
  `video_url` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$sql27="CREATE TABLE `tbl_our_value_other` (
  `id` int(11) NOT NULL,
  `heading` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
$sql28="CREATE TABLE `tbl_overview_text` (
  `id` int(11) NOT NULL,
  `heading` varchar(225) NOT NULL,
  `bold_text` text NOT NULL,
  `text_before_point` text NOT NULL,
  `points` text NOT NULL,
  `text_after_point` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$sql29="CREATE TABLE `tbl_press` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `indxx` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `publishedDate` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";



mysqli_query($link, $sql);
mysqli_query($link, $sql2);
mysqli_query($link, $sql3);
mysqli_query($link, $sql4);
mysqli_query($link, $sql5);
mysqli_query($link, $sql6);
mysqli_query($link, $sql7);
mysqli_query($link, $sql8);
mysqli_query($link, $sql9);
mysqli_query($link, $sql10);
mysqli_query($link, $sql11);
mysqli_query($link, $sql12);
mysqli_query($link, $sql13);
mysqli_query($link, $sql14);
mysqli_query($link, $sql15);
mysqli_query($link, $sql16);
mysqli_query($link, $sql17);
mysqli_query($link, $sql18);
mysqli_query($link, $sql19);
mysqli_query($link, $sql20);
mysqli_query($link, $sql21);
mysqli_query($link, $sql22);
mysqli_query($link, $sql23);
mysqli_query($link, $sql24);
mysqli_query($link, $sql25);
mysqli_query($link, $sql26);
mysqli_query($link, $sql27);

mysqli_query($link, $sql28);

if(mysqli_query($link, $sql29))
{
  echo "<script>alert('Data Import Successfully')</script>";
}

// Close connection
mysqli_close($link);
?>