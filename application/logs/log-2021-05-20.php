<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-20 01:20:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2021-05-20 01:20:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2021-05-20 10:40:20 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 10:40:20 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2021-05-20 10:50:39 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 10:51:59 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 10:53:19 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:00:14 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:02:34 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:04:00 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:04:46 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:10:49 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:11:56 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:13:07 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:16:32 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:17:38 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:18:49 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:22:28 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:23:38 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 11:53:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2021-05-20 13:22:34 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 13:22:34 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2021-05-20 13:22:39 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 13:23:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1607
ERROR - 2021-05-20 13:23:23 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1607
ERROR - 2021-05-20 16:37:02 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2021-05-20 16:38:25 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2021-05-20 16:38:29 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2021-05-20 16:40:44 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2021-05-20 18:39:33 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT * FROM `indxx_values` WHERE `indxx` = '662' ORDER BY `id` desc LIMIT 1
ERROR - 2021-05-20 18:42:03 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT * FROM `indxx_values` WHERE `indxx` = '374' ORDER BY `id` desc LIMIT 1
ERROR - 2021-05-20 18:45:48 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT * FROM `indxx_values` WHERE `indxx` = '705' ORDER BY `id` desc LIMIT 1
ERROR - 2021-05-20 22:12:05 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 22:12:05 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2021-05-20 22:12:09 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 22:12:11 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 22:12:26 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 22:12:40 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 22:12:56 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 22:12:59 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-05-20 22:13:10 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
