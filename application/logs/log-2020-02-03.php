<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-02-03 03:40:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2020-02-03 15:37:45 --> Query error: MySQL server has gone away - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='Income'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
ERROR - 2020-02-03 21:26:55 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-02-03 21:26:55 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-02-03 21:26:58 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-02-03 21:27:00 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-02-03 21:27:19 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
