<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-09-23 04:58:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2020-09-23 07:08:56 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2020-09-23 07:08:56 --> Unable to connect to the database
ERROR - 2020-09-23 07:08:56 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2020-09-23 10:51:13 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2020-09-23 10:51:13 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2020-09-23 10:55:21 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 10:55:21 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 10:55:26 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 10:55:36 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 10:57:57 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 11:00:28 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 11:10:50 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 11:16:48 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 11:16:48 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 11:16:53 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 13:11:28 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 13:11:28 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 13:11:37 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 13:11:42 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 13:13:56 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 13:49:16 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2020-09-23 13:49:16 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2020-09-23 13:49:17 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_about_tabs`
ERROR - 2020-09-23 13:49:17 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2020-09-23 13:50:56 --> Query error: MySQL server has gone away - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='ESG'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
ERROR - 2020-09-23 13:50:57 --> Query error: MySQL server has gone away - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='ESG'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
ERROR - 2020-09-23 13:50:57 --> Query error: MySQL server has gone away - Invalid query: select id from indxx where name ='Indxx Cannabis Industry Index'
ERROR - 2020-09-23 13:50:57 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2020-09-23 14:14:02 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 14:14:46 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 14:14:46 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_admin_login`
WHERE `email` = 'admin@indxx.com'
AND `password` = '9d004f24e16540cb5e3bc9bbb761bab7'
ERROR - 2020-09-23 14:16:31 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2020-09-23 14:16:32 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2020-09-23 14:23:38 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 14:23:38 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 14:23:44 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:47:57 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:47:57 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 15:48:00 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:48:03 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:48:32 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:48:46 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:49:23 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:49:27 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:49:51 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:50:00 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:50:19 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:50:30 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:53:34 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:54:38 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:54:44 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:55:33 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:55:42 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:55:58 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:56:04 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:56:17 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:56:22 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:56:37 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:56:45 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:56:56 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:57:38 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:57:38 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 15:58:36 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:58:46 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:59:39 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 15:59:39 --> Severity: Notice --> Undefined property: stdClass::$return_type /home/indxx/public_html/indxx.com/application/views/admin/indxxDescription.php 124
ERROR - 2020-09-23 16:01:42 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 17:17:01 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 17:34:51 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 17:35:37 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 17:35:37 --> Severity: Notice --> Undefined property: stdClass::$return_type /home/indxx/public_html/indxx.com/application/views/admin/indxxDescription.php 124
ERROR - 2020-09-23 17:37:15 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 18:33:14 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 18:33:14 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 18:34:06 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 18:37:06 --> Severity: Notice --> Undefined index: csv_file /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1760
ERROR - 2020-09-23 18:37:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1762
ERROR - 2020-09-23 18:37:06 --> Severity: Warning --> Invalid argument supplied for foreach() /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1768
ERROR - 2020-09-23 18:40:19 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 18:40:19 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 18:40:24 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 18:40:28 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 18:40:52 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:06:59 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:07:09 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:07:24 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:08:10 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:08:26 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:08:58 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:09:06 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:09:21 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:34:57 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:35:14 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:35:39 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:36:04 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:36:12 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:36:28 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:39:24 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:40:08 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 19:50:58 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2020-09-23 19:50:58 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2020-09-23 19:57:29 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2020-09-23 20:09:19 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:09:27 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:09:31 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:09:44 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:09:56 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:10:06 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:24:22 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:24:50 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:25:06 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:25:21 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:25:31 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:25:33 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:25:33 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 20:25:37 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'tabname' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 84
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'tabname' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 97
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'tabname' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 105
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_isin' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 180
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_isin' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 181
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_company_name' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 189
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_company_name' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 190
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_weight' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 198
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_weight' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 199
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_all' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 207
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_all' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 208
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_methodology' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 216
ERROR - 2020-09-23 20:26:11 --> Severity: Notice --> Trying to get property 'is_methodology' of non-object /home/indxx/public_html/indxx.com/application/views/admin/editIndex.php 217
ERROR - 2020-09-23 20:26:34 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:26:34 --> Severity: Notice --> Undefined property: stdClass::$return_type /home/indxx/public_html/indxx.com/application/views/admin/indxxDescription.php 124
ERROR - 2020-09-23 20:28:27 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:30:57 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:30:57 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 20:31:00 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:32:02 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:32:12 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:32:14 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:32:22 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:32:34 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:32:40 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 20:32:50 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 21:43:40 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 21:43:40 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-09-23 21:43:44 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-09-23 21:44:03 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
