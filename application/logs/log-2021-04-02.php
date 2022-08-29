<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-02 19:46:33 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-02 19:46:33 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
