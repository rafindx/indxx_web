<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-05-20 00:26:43 --> Query error: Column 'name' cannot be null - Invalid query: INSERT INTO `tbl_conact_us` (`name`, `compnay`, `phone_number`, `email`, `question`) VALUES (NULL, NULL, NULL, NULL, NULL)
ERROR - 2022-05-20 09:30:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2022-05-20 14:00:27 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-20 14:01:49 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-20 14:01:49 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2022-05-20 14:01:49 --> Query error: MySQL server has gone away - Invalid query: Select * from index_description where indxx_id='268'  and indxx_id in (select  id from indxx where productlist !=2)
ERROR - 2022-05-20 14:01:49 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-20 14:02:25 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-20 14:02:53 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2022-05-20 14:02:54 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-20 14:02:54 --> Query error: MySQL server has gone away - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='Thematic'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
ERROR - 2022-05-20 14:02:54 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-20 14:03:17 --> Query error: MySQL server has gone away - Invalid query: Select * from index_description where indxx_id='268'  and indxx_id in (select  id from indxx where productlist !=2)
ERROR - 2022-05-20 14:03:17 --> Query error: MySQL server has gone away - Invalid query: Select * from index_description where indxx_id='268'  and indxx_id in (select  id from indxx where productlist !=2)
ERROR - 2022-05-20 14:03:17 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-20 14:03:17 --> Query error: MySQL server has gone away - Invalid query: SELECT * FROM `index_description` WHERE `slug` = 'indxx-renewable-energy-producers-v2-index-tr'
ERROR - 2022-05-20 14:03:34 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-20 14:03:34 --> Query error: MySQL server has gone away - Invalid query: SELECT * FROM `index_description` WHERE `slug` = 'indxx-renewable-energy-producers-v2-index-tr'
ERROR - 2022-05-20 15:10:31 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:10:31 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2022-05-20 15:10:41 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:10:44 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:10:56 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:11:04 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:11:19 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:25:46 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:25:46 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2022-05-20 15:25:49 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:25:53 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:26:02 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:30:34 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:30:34 --> Severity: Notice --> Undefined property: stdClass::$return_type /home/indxx/public_html/indxx.com/application/views/admin/indxxDescription.php 124
ERROR - 2022-05-20 15:32:08 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:32:25 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:33:46 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:33:46 --> Severity: Notice --> Undefined property: stdClass::$return_type /home/indxx/public_html/indxx.com/application/views/admin/indxxDescription.php 124
ERROR - 2022-05-20 15:34:15 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:34:18 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:35:07 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:35:07 --> Severity: Notice --> Undefined property: stdClass::$return_type /home/indxx/public_html/indxx.com/application/views/admin/indxxDescription.php 124
ERROR - 2022-05-20 15:35:40 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:53:42 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:53:42 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2022-05-20 15:53:48 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:53:51 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 15:54:39 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:24:07 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:24:31 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:24:31 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2022-05-20 16:24:36 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:24:43 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:27:43 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:27:43 --> Severity: Notice --> Undefined property: stdClass::$return_type /home/indxx/public_html/indxx.com/application/views/admin/indxxDescription.php 124
ERROR - 2022-05-20 16:28:58 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:29:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1718
ERROR - 2022-05-20 16:29:27 --> Severity: Notice --> Trying to get property 'name' of non-object /home/indxx/public_html/indxx.com/application/controllers/Admin.php 833
ERROR - 2022-05-20 16:29:27 --> Severity: Notice --> Trying to get property 'return_type' of non-object /home/indxx/public_html/indxx.com/application/controllers/Admin.php 833
ERROR - 2022-05-20 16:29:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1718
ERROR - 2022-05-20 16:37:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1718
ERROR - 2022-05-20 16:37:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1718
ERROR - 2022-05-20 16:39:04 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:39:19 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:40:14 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:40:16 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:40:28 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:40:28 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2022-05-20 16:40:32 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:40:36 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:40:51 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:41:04 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:41:13 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:42:32 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:42:38 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:43:01 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 16:43:05 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 17:23:19 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-20 17:23:22 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
