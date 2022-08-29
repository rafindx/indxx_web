<?php

/**
 * Description of DbUtils
 *
 * @author root
 */
class DbUtils {

    protected $con;

    public function __construct($host = DB_HOST, $user = DB_USER, $pass = DB_PASS, $database = DB_NAME, $port = DB_PORT, $socket = DB_SOCK) {
        $this->con = mysqli_connect($host, $user, $pass, $database, $port, $socket);
        if (!$this->con) {
            customLog()->err("Error in creating connection: " . mysqli_errno($this->con));
            throw new Exception("Failed to connect to database.");
        }
       
    }

    public function __destruct() {
        unset($this->con);
        
    }


    function getIndexRiskReturns($indxx_id){
  
  
  $factsheet_id = $indxx_id;
  
  
  $result = mysqli_query($this->con,"select benchmark_id from indxx where id='".$factsheet_id."'");
   
  while($row = mysqli_fetch_assoc($result)){
    $benchmarkID = $row;
  } 
 
  
  $benchmarkID=$benchmarkID['benchmark_id'];
  $result2 = mysqli_query($this->con, "select date from indxx_values where indxx_values.indxx='".$factsheet_id."' order by indxx_values.date asc limit 0,1");
  while($row = mysqli_fetch_assoc($result2)){
    $firstindexvaluedate = $row;
  }
  $firstindexvaluedate=date("Y-m-d",strtotime($firstindexvaluedate['date']));
  
  $result3 = mysqli_query($this->con,"select date from indxx_values where indxx_values.indxx='".$factsheet_id."' order by indxx_values.date asc");
  while($row = mysqli_fetch_assoc($result3)){
    $indexvaluedate[] = $row;
  }

  
  $dates=array();
  if(!empty($indexvaluedate)){
    foreach($indexvaluedate as $date){
      $dates[]=date("Y-m-d",strtotime($date['date']));
    }
  }
  
  $result4 = mysqli_query($this->con,"select tbl_benchmark_index_value_b.date,tbl_benchmark_index_value_b.value from tbl_benchmark_index_value_b left join indxx_values on indxx_values.date=tbl_benchmark_index_value_b.date where tbl_benchmark_index_value_b.benchmark_id='".$benchmarkID."' and indxx_values.indxx='".$factsheet_id."' and tbl_benchmark_index_value_b.date>='".$firstindexvaluedate."' order by date asc");
  while($row = mysqli_fetch_assoc($result4)){
    $benchmarkValuesArray[] = $row;
  }
  
  
  $result5 = mysqli_query($this->con,"select value from tbl_benchmark_index_value_b where tbl_benchmark_index_value_b.benchmark_id='".$benchmarkID."' and date='".$firstindexvaluedate."'");
  while($row = mysqli_fetch_assoc($result5)){
    $basebenchmarkvalueres[] = $row;
  }
        
  $basebenchmarkvalue = $basebenchmarkvalueres[0]['value'];
  
  
  $benchmarkIVArray=array();
  
  foreach($benchmarkValuesArray as $key=>$benchmarkValuee){   
    $benchmarkValue = 1000*($benchmarkValuee['value']/$basebenchmarkvalue);
    $benchmarkIVArray[$benchmarkValuee['date']]=$benchmarkValue;
  }
  
  
  $basevalue=0;
 
  foreach($dates  as  $date)
  {
    
    
    if(!in_array($date,array_keys($benchmarkIVArray))){
    
    $benchmarkIVArray[$date]=$basevalue;
    }
  
    $basevalue=$benchmarkIVArray[$date];
  } 
  ksort ($benchmarkIVArray);
 
  
  $data = getriskandreturn($factsheet_id,$benchmarkIVArray);
  print_r($data);
  
  return $data;
  
 
}  




  

}
