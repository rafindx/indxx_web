<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-13 08:21:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2021-02-13 15:39:41 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2021-02-13 15:42:21 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
