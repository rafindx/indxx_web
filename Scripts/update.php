<?php
ini_set('max_execution_time', 150000);
include("newfunction.php");
$con=mysqli_connect('localhost','indxx_demo','NA2;G+^}hcge','go_live');

$sql = "update indxx set tabname='Benchmark', productlist='1', weighttype='1'  where id in(1,2,7,8,9,10,220,186,263,261,260,259,257,258,252,251,249,221,222,223,247,233,234,235,236,237,238,239,240,241,243,245,262,265,264)";

mysqli_query($con, $sql);

$sql = "update indxx set tabname='Income', productlist='1', weighttype='1' where id in(17,18,172,185,224,225,242,268)";
mysqli_query($con, $sql);

$sql = "update indxx set weighttype='0'  where id ='242'";
mysqli_query($con, $sql);

$sql = "update indxx set tabname='Digital Asset', productlist='1', weighttype='0'  where id in(253,254,255,256)";
mysqli_query($con, $sql);

$sql = "update indxx set tabname='Other Indices', productlist='1', weighttype='0'  where id in(21,40,42,44,60,61,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,250,228,229,231,232,270)";
mysqli_query($con, $sql);

$sql = "update indxx set tabname='Thematic', productlist='1', weighttype='1'  where id in(22,211)";
mysqli_query($con, $sql);

$sql = "update indxx set weighttype='0'  where id ='22'";
mysqli_query($con, $sql);

 $sql = "update index_description set index_type='Benchmark'  where indxx_id in(1,2,7,8,9,10,220,186,263,261,260,259,257,258,252,251,249,221,222,223,247,233,234,235,236,237,238,239,240,241,243,245,262,264,265)";

 mysqli_query($con, $sql);

 $sql = "update index_description set index_type='Income'  where indxx_id in(17,18,172,185,224,225,242,268)";
 mysqli_query($con, $sql);

$sql = "update index_description set index_type='Digital Asset' where indxx_id in(253,254,255,256)";
 mysqli_query($con, $sql);

$sql = "update index_description set index_type='Other Indices'  where indxx_id in(21,40,42,44,60,61,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,250,228,229,231,232,270)";
mysqli_query($con, $sql);

 $sql = "update index_description set index_type='Thematic'  where indxx_id in(22,211)";
 mysqli_query($con, $sql);


 $sql = "update indxx set productlist='2'  where productlist !=1";
 mysqli_query($con, $sql);
 $sql = "update indxx set productlist='2'  where tabname='' or tabname IS NULL";
 mysqli_query($con, $sql);

// update benchmark
 $sql = "select * from indxx";
 $data = mysqli_query($con,$sql);
 while ($row = mysqli_fetch_assoc($data)) {
 $indxx=$row['id'];
 $bid=$row['benchmark_id'];
 $sql="select * from tbl_benchmark where id=$bid";
 $da = mysqli_query($con,$sql);
 $ro = mysqli_fetch_assoc($da);
 updatebenchamrkname($indxx,$ro['name']);
 }
 function updatebenchamrkname($indxx, $name) {
 global $con;
$sql = "update index_description set benchmark='$name'  where indxx_id =$indxx";
 	mysqli_query($con, $sql);

 }

// //update diviyield

 $sql = "select * from index_description";
 $data = mysqli_query($con,$sql);
 while ($row = mysqli_fetch_assoc($data)) {
 $indxx=$row['indxx_id'];
 $diviyield= $row['dividendyield'];
 $sql = "update indxx_charecterstics set dividend_yield='$diviyield'  where indxx_id =$indxx";
 	mysqli_query($con, $sql);
 }



// //copy table tbl_constituents to update indxx_top_5_constituents table
 $sql="INSERT INTO indxx_top_5_constituents (indxx_id, constituent, ISIN,weight,cdate)
 SELECT indxx_id, name, isin, weight,date
 FROM tbl_constituents";
 mysqli_query($con, $sql);

// // //update no of constituents
 $sql="select count(*) as count,indxx_id from indxx_top_5_constituents group by  indxx_id";
 $data= mysqli_query($con, $sql);
 while ($row = mysqli_fetch_assoc($data)) {
 $indxx=$row['indxx_id'];
 $count= $row['count'];
$sql = "update indxx_charecterstics set no_of_constituents=$count  where indxx_id =$indxx";
 	mysqli_query($con, $sql);
 }


// update base date
 $sql = "select * from indxx";
  $data = mysqli_query($con, $sql);
   while ($row = mysqli_fetch_assoc($data)) {
 $indxx=$row['id'];

 $sql="select * from indxx_values  where indxx=$indxx order by date asc ";
 $ta = mysqli_query($con, $sql);
$ro = mysqli_fetch_assoc($ta);
  $base_date= date('Y-m-d',strtotime($ro['date']));

$sql = "update indxx_charecterstics set base_date='$base_date' where indxx_id =$indxx";
 mysqli_query($con, $sql);

 }

// //update high low

 $sql = "select * from indxx";
 $data = mysqli_query($con,$sql);
 while ($row = mysqli_fetch_assoc($data)) {
 	$indxx=$row['id'];
 $a= getMax($indxx);
 $b=  getMin($indxx);

             $min = number_format($b, 0, '.', '');
             $max = number_format($a, 0, '.', '');
              $highLowValue = $max.'/'.$min;
              $sql = "update indxx_charecterstics set 52_week_highlow='$highLowValue'  where indxx_id =$indxx";
	mysqli_query($con, $sql);
}

function getMax($indexId) {
global $con;
        $query ="SELECT MAX(value)AS a,date FROM `indxx_values` WHERE `indxx` = '$indexId' AND date>= DATE_SUB(NOW(), INTERVAL 1 YEAR )";
        $ta= mysqli_query($con, $query);
       $ro = mysqli_fetch_assoc($ta);
		$high= $ro['a'];
        return $high;
    }

function getMin($indexId) {
  global $con;
     $query = "SELECT MIN(value) AS b,date FROM `indxx_values` WHERE `indxx` = '$indexId' AND date>= DATE_SUB(NOW(), INTERVAL 1 YEAR )";
     $ta= mysqli_query($con, $query);
       $ro = mysqli_fetch_assoc($ta);
		$high= $ro['b'];
        return $high;
    }


// Caluculate R and R
$sql = "select * from indxx where productlist =1";
$data = mysqli_query($con,$sql);
while ($row = mysqli_fetch_assoc($data)) {
echo $indxx=$row['id'].'<br>';
 getIndexRiskReturns($indxx);
}

