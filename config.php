<?php

// error reporting mod
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Project directory Path
define("DS", DIRECTORY_SEPARATOR);
define("ABS_PATH", dirname(__FILE__) . DS);

// prepare application URL
$url = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on" ? "https://" : 'http://';
$url .= $_SERVER['HTTP_HOST'];
$url .=!in_array($_SERVER['SERVER_PORT'], array(80, 443)) ? ':' . $_SERVER['SERVER_PORT'] : '';
$url .= isset($_SERVER['REQUEST_URI']) ? pathinfo($_SERVER["REQUEST_URI"], PATHINFO_DIRNAME) . "/" : '';
define("SERVICE_ROOT", $url);
unset($url);

define('DB_HOST', 'localhost');
define('DB_USER', 'mantis_indxxci');
define('DB_PASS', 'u2+aAG#_v~98');
define('DB_NAME', 'mantis_indxxci');
define("DB_PORT", 3306);
define("DB_SOCK", NULL);





// include library


require_once './lib/DbUtils.php';
// get admin collections 



