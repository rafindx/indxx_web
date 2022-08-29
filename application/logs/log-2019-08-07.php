<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-08-07 10:44:00 --> Query error: Query execution was interrupted - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='Income'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-08-07 10:44:01 --> Query error: Query execution was interrupted - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='Income'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
ERROR - 2019-08-07 10:44:01 --> Query error: MySQL server has gone away - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='Income'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-08-07 10:44:01 --> Query error: Query execution was interrupted - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2019-08-07 10:44:02 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2019-08-07 10:44:02 --> Unable to connect to the database
ERROR - 2019-08-07 10:44:02 --> Severity: Error --> Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2019-08-07 12:52:20 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2019-08-07 12:52:20 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2019-08-07 12:52:24 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2019-08-07 12:53:19 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2019-08-07 22:10:06 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2019-08-07 22:10:06 --> Unable to connect to the database
ERROR - 2019-08-07 22:10:06 --> Severity: Error --> Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
