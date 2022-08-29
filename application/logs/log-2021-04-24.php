<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-24 18:46:17 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2021-04-24 18:46:46 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2021-04-24 18:51:29 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2021-04-24 18:53:36 --> Query error: Query execution was interrupted - Invalid query: SELECT COUNT('id') as total FROM `indxx_top_5_constituents` WHERE `indxx_id` = '317'
ERROR - 2021-04-24 18:54:04 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-04-24 18:54:04 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-04-24 18:54:04 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-04-24 18:54:05 --> Unable to connect to the database
ERROR - 2021-04-24 18:54:05 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2021-04-24 18:54:05 --> Unable to connect to the database
ERROR - 2021-04-24 18:54:05 --> Unable to connect to the database
ERROR - 2021-04-24 18:54:05 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2021-04-24 18:54:05 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
