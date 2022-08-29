<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-11 06:27:20 --> Query error: Operand should contain 1 column(s) - Invalid query: select * from index_description where indxx_id='237'  and indxx_id in (select  id,meta_title,meta_description from indxx where productlist !=2)
ERROR - 2019-05-11 06:31:13 --> Query error: Unknown column 'meta_title' in 'field list' - Invalid query: select meta_title,meta_description from index_description where indxx_id='237'
ERROR - 2019-05-11 06:34:21 --> Query error: Unknown column 'indxx_id' in 'where clause' - Invalid query: select meta_title,meta_description from indxx where indxx_id='237'
ERROR - 2019-05-11 06:59:42 --> 404 Page Not Found: Assets/css
ERROR - 2019-05-11 06:59:42 --> 404 Page Not Found: Assets/css
ERROR - 2019-05-11 14:52:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
ERROR - 2019-05-11 23:23:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
