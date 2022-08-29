<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// require_once 'config.php';
// $db = new DbUtils();
require_once 'newFunction.php';
echo $indxx_id= $_POST['indexId'];
//$indxx_id='281';
$addscript= getIndexRiskReturns($indxx_id);
 


 