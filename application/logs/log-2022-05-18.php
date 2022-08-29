<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-05-18 01:10:33 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-18 01:10:33 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2022-05-18 01:10:53 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-18 01:10:57 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-18 01:11:22 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-18 02:00:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2022-05-18 13:39:57 --> Query error: MySQL server has gone away - Invalid query: Select * from index_description where indxx_id='252'  and indxx_id in (select  id from indxx where productlist !=2)
ERROR - 2022-05-18 13:40:18 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-18 13:40:19 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2022-05-18 13:40:20 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_about_tabs`
ERROR - 2022-05-18 13:40:20 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-18 13:40:21 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_about_tabs`
ERROR - 2022-05-18 15:06:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2022-05-18 15:06:18 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:18 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:18 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:18 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:18 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:18 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:18 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:18 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:18 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:18 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:18 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:18 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:18 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:18 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:18 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:18 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:18 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:18 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:18 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:18 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:18 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:18 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:18 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:19 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:19 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:19 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:19 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:19 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:19 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:19 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:19 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:19 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:19 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:19 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:19 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:19 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:19 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:19 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:19 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:19 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:19 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:19 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:19 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:19 --> Unable to connect to the database
ERROR - 2022-05-18 15:06:19 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2022-05-18 15:06:19 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'indxx_demo' has exceeded the 'max_user_connections' resource (current value: 30) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-05-18 15:06:19 --> Unable to connect to the database
ERROR - 2022-05-18 16:55:28 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-18 16:56:22 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-18 16:56:48 --> Query error: MySQL server has gone away - Invalid query: SELECT * FROM `tbl_management` WHERE `id` = '24'
ERROR - 2022-05-18 16:56:48 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-18 16:56:49 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-18 16:56:49 --> Query error: MySQL server has gone away - Invalid query: SELECT * FROM `tbl_management` WHERE `id` = '24'
ERROR - 2022-05-18 21:12:01 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-18 21:12:01 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2022-05-18 21:12:11 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-18 21:14:10 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-18 21:14:10 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2022-05-18 21:15:55 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2022-05-18 21:15:55 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
