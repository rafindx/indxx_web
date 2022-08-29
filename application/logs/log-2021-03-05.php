<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-05 13:20:35 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-03-05 13:20:35 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2021-03-05 13:20:45 --> Severity: Warning --> Use of undefined constant php - assumed 'php' (this will throw an Error in a future version of PHP) /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2021-03-05 14:41:18 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT * FROM `indxx_values` WHERE `indxx` = '185' ORDER BY `id` desc LIMIT 1
ERROR - 2021-03-05 15:11:11 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
