<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$mysql_hostname = "localhost";
$mysql_user = "indxx_uat";
$mysql_password = "Ov7y0i0@Pf$3";
$mysql_database = "indexl_work_uat"; 
$prefix = "";

 $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong in excel reader file");

mysqli_select_db($bd,$mysql_database) or die("Opps some thing went wrong");
?>