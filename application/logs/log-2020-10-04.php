<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-10-04 14:25:50 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2020-10-04 14:25:50 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2020-10-04 14:27:30 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2020-10-04 14:27:45 --> Unable to connect to the database
ERROR - 2020-10-04 14:27:48 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2020-10-04 21:55:30 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2020-10-04 21:55:30 --> Unable to connect to the database
ERROR - 2020-10-04 21:55:30 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
