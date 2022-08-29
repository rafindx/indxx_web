<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-02 11:53:38 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT * FROM `indxx_values` WHERE `indxx` = '433' ORDER BY `id` desc LIMIT 1
ERROR - 2021-03-02 13:54:05 --> Query error: Lost connection to MySQL server during query - Invalid query: select * from indxx_top_5_constituents where indxx_id='322' order by weight desc
ERROR - 2021-03-02 16:41:50 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2) /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2021-03-02 16:41:50 --> Unable to connect to the database
ERROR - 2021-03-02 16:41:50 --> Severity: error --> Exception: Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
