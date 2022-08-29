<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-23 00:03:14 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' - Invalid query: select id from indxx where name ='אוגווינד'
ERROR - 2020-07-23 01:10:25 --> Query error: Sort aborted: Query execution was interrupted - Invalid query: select  date,value from indxx_values where indxx='242' order by date asc
ERROR - 2020-07-23 01:10:27 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2020-07-23 01:10:27 --> Unable to connect to the database
ERROR - 2020-07-23 01:10:27 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2020-07-23 01:10:28 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2020-07-23 01:10:28 --> Unable to connect to the database
ERROR - 2020-07-23 01:10:28 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2020-07-23 01:10:32 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2020-07-23 01:10:32 --> Unable to connect to the database
ERROR - 2020-07-23 01:10:32 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2020-07-23 05:14:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
