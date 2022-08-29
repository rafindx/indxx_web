<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-02-07 13:50:45 --> Severity: Warning --> mysqli::real_connect(): (HY000/2013): Lost connection to MySQL server at 'reading initial communication packet', system error: 104 /home/indxx/public_html/indxx.com/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2020-02-07 13:50:46 --> Query error: Query execution was interrupted - Invalid query: SELECT DATE_FORMAT(date, "%Y-%m-%d") as date, `value`
FROM `indxx_values`
WHERE `indxx` = '1'
ORDER BY `date` ASC
ERROR - 2020-02-07 13:50:46 --> Query error: Query execution was interrupted - Invalid query: SELECT DATE_FORMAT(date, "%Y-%m-%d") as date, `value`
FROM `indxx_values`
WHERE `indxx` = '1'
ORDER BY `date` ASC
ERROR - 2020-02-07 13:50:46 --> Unable to connect to the database
ERROR - 2020-02-07 13:50:46 --> Severity: Error --> Class 'CI_Controller' not found /home/indxx/public_html/indxx.com/system/core/CodeIgniter.php 369
ERROR - 2020-02-07 16:33:56 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-02-07 16:33:56 --> Severity: Notice --> Undefined variable: latters /home/indxx/public_html/indxx.com/application/views/admin/home.php 104
ERROR - 2020-02-07 16:35:02 --> Severity: Notice --> Use of undefined constant php - assumed 'php' /home/indxx/public_html/indxx.com/application/views/admin/sidebar.php 15
ERROR - 2020-02-07 20:19:33 --> Query error: Column 'name' cannot be null - Invalid query: INSERT INTO `tbl_conact_us` (`name`, `compnay`, `phone_number`, `email`, `question`) VALUES (NULL, NULL, NULL, NULL, NULL)
ERROR - 2020-02-07 21:16:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = 
