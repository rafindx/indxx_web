<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-18 08:08:42 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2019-12-18 08:08:42 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2019-12-18 08:08:47 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2019-12-18 09:00:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2019-12-18 10:07:27 --> Query error: MySQL server has gone away - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='Income'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
