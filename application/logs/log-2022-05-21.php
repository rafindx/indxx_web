<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-05-21 02:19:41 --> Query error: Column 'name' cannot be null - Invalid query: INSERT INTO `tbl_conact_us` (`name`, `compnay`, `phone_number`, `email`, `question`) VALUES (NULL, NULL, NULL, NULL, NULL)
ERROR - 2022-05-21 05:38:17 --> Severity: error --> Exception: Too few arguments to function Home::Profile(), 0 passed in /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php on line 532 and exactly 1 expected /home/indxx/public_html/indxx.com/application/controllers/Home.php 185
ERROR - 2022-05-21 07:49:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2022-05-21 14:58:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2022-05-21 15:05:37 --> Query error: Column 'name' cannot be null - Invalid query: INSERT INTO `tbl_conact_us` (`name`, `compnay`, `phone_number`, `email`, `question`) VALUES (NULL, NULL, NULL, NULL, NULL)
ERROR - 2022-05-21 18:41:54 --> Query error: MySQL server has gone away - Invalid query: Select * from index_description where indxx_id='240'  and indxx_id in (select  id from indxx where productlist !=2)
ERROR - 2022-05-21 18:42:38 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-21 18:42:39 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-21 18:42:40 --> Query error: MySQL server has gone away - Invalid query:  SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name
ERROR - 2022-05-21 18:42:40 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-21 18:43:11 --> Query error: MySQL server has gone away - Invalid query: select * from tbl_announcements_notification  order by date desc, id desc
ERROR - 2022-05-21 21:59:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
