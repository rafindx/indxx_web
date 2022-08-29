<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-02-05 12:11:04 --> Query error: Lost connection to MySQL server during query - Invalid query: select * from indxx_charecterstics where indxx_id='311'
ERROR - 2020-02-05 12:28:01 --> Query error: MySQL server has gone away - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='Income'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
ERROR - 2020-02-05 12:28:02 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2020-02-05 12:28:02 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2020-02-05 12:28:03 --> Query error: MySQL server has gone away - Invalid query:  SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='Income'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc
ERROR - 2020-02-05 12:29:17 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2020-02-05 13:11:17 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-02-05 13:11:17 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-02-05 13:11:22 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-02-05 15:17:26 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-02-05 20:39:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
