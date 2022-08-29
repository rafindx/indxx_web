<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-03 23:39:56 --> Query error: Query execution was interrupted - Invalid query: SELECT indx.*
         FROM indxx indx
         INNER JOIN index_description desp 
         on indx.code = desp.code
         and indx.productlist=1  group by desp.indxx_name order by indx.name
