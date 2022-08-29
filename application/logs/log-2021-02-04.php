<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-04 10:27:16 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-02-04 10:27:16 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2021-02-04 10:28:37 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-02-04 10:29:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1607
ERROR - 2021-02-04 10:30:13 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1607
ERROR - 2021-02-04 10:30:20 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-02-04 10:30:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1607
ERROR - 2021-02-04 10:30:49 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/indxx/public_html/indxx.com/application/controllers/Admin.php 1607
ERROR - 2021-02-04 11:36:50 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-02-04 11:36:50 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2021-02-04 11:36:57 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-02-04 11:37:15 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-02-04 13:59:44 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-02-04 13:59:44 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2021-02-04 14:00:06 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-02-04 17:10:49 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT COUNT('id') as total FROM `indxx_top_5_constituents` WHERE `indxx_id` = '257'
ERROR - 2021-02-04 17:17:40 --> Query error: MySQL server has gone away - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='ESG'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
