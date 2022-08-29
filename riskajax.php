<?php

ini_set('max_execution_time', 150000);

$newObj = new DbUtils();



class DbUtils extends mysqli {
     
    protected $conn;
    public function __construct() {
        $this->conn = mysqli_connect("localhost", "indxx_demo", "NA2;G+^}hcge", "indexl_work");


	    $result = mysqli_query($this->conn,"select `id` from `indxx` where  productlist=1 and weighttype=1 order by id asc");
	while($row = mysqli_fetch_assoc($result)){
		echo $indxxId =  $row['id'];
	
                $this->getIndexRiskReturns($indxxId);
                
	}




	// while($row = mysqli_fetch_assoc($result4)){
	// 	// $benchmarkValuesArray[] = $row;
	// 	echo $row;
	// }

       // $this->getIndexRiskReturns('271');

    }
function get_indices($request){
	//global $this->conn;
	//$this->conn = mysqli_connect("162.209.99.233", "remoteUser", "remoteuser", "indexl_work");
	$typeofindice = ucfirst($request);
	$sql = "SELECT indxx_id AS INDEX_ID, indxx_name AS NAME, code AS CODE, NULL AS DATE, NULL AS VALUE, NULL AS OLD_VALUE, NULL AS pxchange, NULL AS pxpct FROM index_description WHERE index_type = '$typeofindice' AND return_type = 'TR' AND code != ''";
	$res = mysqli_query($this->conn, $sql) or die("er1".mysqli_error($this->conn));
	
	if(!empty($res)){
		$indexId=array();
		while($row = mysqli_fetch_assoc($res)) 
		{
			
			$indexId[$row['INDEX_ID']]=$row;
		}
	}
		
	
	$date_query = "select distinct(DATE_FORMAT(date, '%Y-%m-%d')) as date from indxx_values ORDER BY DATE desc limit 0,2";
	$date_res = mysqli_query($this->conn, $date_query) or die("er".mysqli_error());
	while($value = mysqli_fetch_assoc($date_res))
	{
		$date[]=$value['date'];
		
	}
	if (!empty($date)) 
	{
		
		$query="SELECT 
				   i.indxx_id                                                AS INDEX_ID, 
				   i.indxx_name                                              AS NAME, 
				   i.code                                                    AS CODE, 
				   p_today.date                                              AS DATE, 
				   p_today.value                                             AS VALUE, 
				   p_yest.value                                              AS OLD_VALUE, 
				   ( p_today.value - p_yest.value )                          AS pxchange, 
				   ( ( p_today.value - p_yest.value ) / p_yest.value ) * 100 AS pxpct 
				FROM   indxx_values p_today 
				   LEFT JOIN indxx_values p_yest 
						  ON p_today.indxx = p_yest.indxx 
				   LEFT JOIN index_description i 
						  ON i.indxx_id = p_today.indxx 
			WHERE  p_today.date = '$date[0]' 
				   AND p_yest.date ='$date[1]' 
				   AND i.code != '' 
				   AND i.index_type = '$typeofindice' 
				   AND i.return_type = 'TR' 
			GROUP  BY p_today.indxx 
			order by i.indxx_name asc";
		$result = mysqli_query($this->conn, $query) or die("er".mysqli_error());
		if(!empty($result)) 
		{
			// echo "sapna";
			$data=array();
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) 
			{
					$ids[] = $row['INDEX_ID'];
					$data[]=$row;
					//$data[] = $indexId;
					
			}
			
			// exit;
			foreach($indexId as $id){
				//echo $id['indxx_id'].'<br>';
				if(!in_array($id['INDEX_ID'],$ids)){
					//$data[] = $indexId[$id['INDEX_ID']];
					$query="SELECT 
							   i.indxx_id                                                AS INDEX_ID, 
							   i.indxx_name                                              AS NAME, 
							   i.code                                                    AS CODE, 
							   p_today.date                                              AS DATE, 
							   p_today.value                                             AS VALUE, 
							   p_yest.value                                              AS OLD_VALUE, 
							   ( p_today.value - p_yest.value )                          AS pxchange, 
							   ( ( p_today.value - p_yest.value ) / p_yest.value ) * 100 AS pxpct 
							FROM   indxx_values p_today 
							   LEFT JOIN indxx_values p_yest 
									  ON p_today.indxx = p_yest.indxx 
							   LEFT JOIN index_description i 
									  ON i.indxx_id = p_today.indxx 
						WHERE  p_today.date = '$date[0]' 
							   AND p_yest.date ='".date('Y-m-d', strtotime($date[1]. ' -3 day'))."' 
							   AND i.code != '' 
							   AND i.index_type = '$typeofindice' 
							   AND i.return_type = 'TR' AND i.indxx_id = '".$id['INDEX_ID']."' 
						GROUP  BY p_today.indxx 
						order by i.indxx_name asc";
						
					$result = mysqli_query($this->conn, $query) or die("er".mysqli_error());
					while($row = mysqli_fetch_assoc($result)) {
						$data[]=$row;
					}
					//echo date('Y-m-d', strtotime($date[1]. ' -1 day'));		
					//$data[] = $indexId;}		
				}
			}
		}
		else
		{
			echo ":gupta";
			echo "0 results with index type".$typeofindice."<br>";
		}
	}
	else
	{
		echo "No data found";
	}
	
	return $data;
		
}

function getIndexDescription($indxx_id){
	//global $this->conn;
	
	$factsheet_id= $indxx_id;
		 
	$result = mysqli_query($this->conn, "select * from index_description where indxx_id='".$factsheet_id."'") or die("error".mysqli_error());
	
	while($row = mysqli_fetch_assoc($result)){
		$data = $row;
	}
	return $data;
}

function getIndexTopConstituents($indxx_id)
{
	//global $this->conn;
	
	$factsheet_id= $indxx_id;
	
	$result = mysqli_query($this->conn, "select isin,name,weight,date from tbl_constituents where indxx_id='".$factsheet_id."' order by weight desc limit 5")or die("error".mysqli_error());
	
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	
	return $data;
}

function getIndexTopTenConstituents($indxx_id)
{
	//global $this->conn;
	
	$factsheet_id= $indxx_id;
	
	$result = mysqli_query($this->conn, "select isin,name,weight,date from tbl_constituents where indxx_id='".$factsheet_id."' order by weight desc limit 60")or die("error".mysqli_error());
	
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	
	return $data;
}

function getIndexCharacteristics($indxx_id){
	
	//global $this->conn;
	$factsheet_id=  $indxx_id;

	$result = mysqli_query($this->conn, "select date   from indxx_values where  indxx='$factsheet_id' order by date asc limit 0,1");	
	while($row = mysqli_fetch_assoc($result)){
		$date[] = $row;
	}

	$data['inceptionDate']=date("m/d/Y",strtotime($date[0]['date']));
	$data['52weeks']= get52WeaksMinmax($factsheet_id);
	
	$result2 = mysqli_query($this->conn,"select count(*) as totalconstituents from tbl_constituents where  indxx_id='$factsheet_id' ");
	while($row = mysqli_fetch_assoc($result2)){
		$TotalConstituents[] = $row;
	}
	
	$data['noofconstituents']=$TotalConstituents[0]['totalconstituents'];
	// $data['divyield']="5.86%";
	$date = getMaxDate($factsheet_id);
	$data['date']=$date;

	return $data;
		
}

function getIndexRiskReturns($indxx_id){
   
	//global $this->conn;
	 $factsheet_id = $indxx_id;
	
	
	$result = mysqli_query($this->conn,"select benchmark_id from indxx where id='".$factsheet_id."'");
	while($row = mysqli_fetch_assoc($result)){
		$benchmarkID = $row;
	}	
	
	$benchmarkID=$benchmarkID['benchmark_id'];
	//echo $benchmarkID;
	$result2 = mysqli_query($this->conn, "select date from indxx_values where indxx_values.indxx='".$factsheet_id."' order by indxx_values.date asc limit 0,1");
	while($row = mysqli_fetch_assoc($result2)){
		$firstindexvaluedate = $row;
	}
	$firstindexvaluedate=date("Y-m-d",strtotime($firstindexvaluedate['date']));
	//echo $firstindexvaluedate;	
	
	$result3 = mysqli_query($this->conn,"select date from indxx_values where indxx_values.indxx='".$factsheet_id."' order by indxx_values.date asc");
	while($row = mysqli_fetch_assoc($result3)){
		$indexvaluedate[] = $row;
	}
	//print_r($indexvaluedate);	
	 //$this->pr($indexvaluedate,true);	
     //$firstindexvaluedate=date("Y-m-d",strtotime($firstindexvaluedate['date']));
 
  
	$dates=array();
	if(!empty($indexvaluedate)){
		foreach($indexvaluedate as $date){
		//	$this->pr($date);
			$dates[]=date("Y-m-d",strtotime($date['date']));
		}
	}
	//print_r($dates);
	//$this->pr($dates);
	//exit;
	
	$result4 = mysqli_query($this->conn,"select tbl_benchmark_index_value_b.date,tbl_benchmark_index_value_b.value from tbl_benchmark_index_value_b left join indxx_values on indxx_values.date=tbl_benchmark_index_value_b.date where tbl_benchmark_index_value_b.benchmark_id='".$benchmarkID."' and indxx_values.indxx='".$factsheet_id."' and tbl_benchmark_index_value_b.date>='".$firstindexvaluedate."' order by date asc");
	while($row = mysqli_fetch_assoc($result4)){
		$benchmarkValuesArray[] = $row;
	}
	
	// print_r($benchmarkValuesArray);
	
	$result5 = mysqli_query($this->conn,"select value from tbl_benchmark_index_value_b where tbl_benchmark_index_value_b.benchmark_id='".$benchmarkID."' and date='".$firstindexvaluedate."'");
	while($row = mysqli_fetch_assoc($result5)){
		$basebenchmarkvalueres[] = $row;
	}
				
	$basebenchmarkvalue = $basebenchmarkvalueres[0]['value'];
	
	// print_r($basebenchmarkvalueres);
	
	$benchmarkIVArray=array();
	//$this->pr($benchmarkValuesArray,true);
	
	foreach($benchmarkValuesArray as $key=>$benchmarkValuee){		
		$benchmarkValue = 1000*($benchmarkValuee['value']/$basebenchmarkvalue);
		$benchmarkIVArray[$benchmarkValuee['date']]=$benchmarkValue;
	}
	
	//print_r($benchmarkIVArray);
	
	//exit;
	//exit;
	$basevalue=0;
	//$this->pr(array_keys($benchmarkIVArray),true);
	foreach($dates  as  $date)
	{
		
		//echo $keydate." date not found";
		//exit;
		if(!in_array($date,array_keys($benchmarkIVArray))){
		//echo $date." date not found";
		//exit;
		$benchmarkIVArray[$date]=$basevalue;
		}
	
		$basevalue=$benchmarkIVArray[$date];
	}	
	ksort ($benchmarkIVArray);
	//exit;
	//$this->pr($benchmarkIVArray,true);
	// print_r($benchmarkIVArray);
	
	$data = $this->getriskandreturn($factsheet_id,$benchmarkIVArray);
	// echo "<pre>";
    // print_r($data);
	// echo "</pre>";
	// return $data;
        // die();
	
        $total = count($data);
        $count = '0';

	foreach ($data as $value) {
		 $count++;
	$statistic = $value['statistic'];

	$ytd = $value['ytd'];
	$qtd = $value['qtd'];
	$oneyear = $value['1year'];
	 $threeyear = $value['3year'];
	$SinceInception = $value['SinceInception'];	 
	 $indxx_id =$value['indxx_id'];

	// echo $statistic."<br>";
	// die();
    // $add = mysqli_query($this->conn,"INSERT INTO `indxx_risk_return_statistics` (`id`, `indxx_id`, `statistic`, `qtd`, `ytd`, `1year`, `3year`, `sbd`) VALUES 
    // 	(NULL, '$indxx_id', '$statistic', '$qtd', '$ytd', '$oneyear', '$threeyear', '$SinceInception')");
		
		 
   if($qtd=='')
   {
      $update = mysqli_query($this->conn,"UPDATE `indxx_risk_return_statistics` SET `qtd`='0.00',`ytd`='".$ytd."',`1year`='".$oneyear."',`3year`='".$threeyear."',`sbd`='".$SinceInception."' WHERE  `statistic` = '".$statistic."' and indxx_id='".$indxx_id."'");
      echo $indxx_id;
}else
{
	 $update = mysqli_query($this->conn,"UPDATE `indxx_risk_return_statistics` SET `qtd`='".$qtd."',`ytd`='".$ytd."',`1year`='".$oneyear."',`3year`='".$threeyear."',`sbd`='".$SinceInception."' WHERE  `statistic` = '".$statistic."' and indxx_id='".$indxx_id."'");
	 echo $indxx_id;
}
// echo("Error description: " . mysqli_error($this->conn));
     if($update)
        {
         echo $indxx_id;
//          echo "<script>alert('done');</script>";
       }


		
		
		


		 	}

     //     $update = mysqli_query($this->conn,"UPDATE `indxx_risk_return_statistics` SET `qtd`='1',`ytd`='1',`1year`='1',`3year`='1',`sbd`='1' WHERE `id` = '104'");
     // if($update)
     //    {
     //      echo "<script>alert('done');</script>";
     //   }
	
        
        
        
}  



//add-on functions to the main functions	

//get index Characteristics
function getMaxDate($factsheet_id){

	//global $this->conn;
	
	$result = mysqli_query($this->conn,"select date from indxx_values where indxx='$factsheet_id'  order by date DESC limit 0,1");
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	
	return date("Y-m-d",strtotime($data[0]['date']));
}

function getOldDate($factsheet_id,$newDate,$yearback,$return=""){

	//global $this->conn;
	$result = mysqli_query($this->conn,'select date from indxx_values where indxx='.$factsheet_id.' and  date <= DATE_SUB("'.$newDate.'",INTERVAL '.$yearback.' YEAR) order by date desc limit 0,1');
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	$last_year_date = date("Y-m-d",strtotime($data[0]['date']));
	
	return $last_year_date;

}

function get52WeaksMinmax($factsheet_id){
	
	//global $this->conn;
	
	$newDate= getMaxDate($factsheet_id);
	$oldDate= getOldDate($factsheet_id,$newDate,1);
	
	$result = mysqli_query($this->conn,"select max(value) as maximumvalue from indxx_values where indxx='$factsheet_id' and date>='$oldDate' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}

	$result2 = mysqli_query($this->conn,"select min(value) as minvalue  from indxx_values where  indxx='$factsheet_id' and date>='$oldDate' order by date asc");
	while($row = mysqli_fetch_assoc($result2)){
		$data2[] = $row;
	}

	return array("min"=>number_format($data2[0]['minvalue'],0,'',''),"max"=>number_format($data[0]['maximumvalue'],0,'',''));

}


//get index risk and return
function getriskandreturn($factsheet_id,$benchmarkIVArray){
	
	$result['Correlation']['qtd'] = $this->getQuarterCorrel($factsheet_id,$benchmarkIVArray);
	$result['Correlation']['ytd'] = $this->getYearBackCorrel($factsheet_id,$benchmarkIVArray);
	$result['Correlation']['1year'] = $this->getYearsBackcorrel($factsheet_id,1,$benchmarkIVArray);
	$result['Correlation']['indxx_id']=$factsheet_id;
	$result['Correlation']['statistic']='Correlation';
	//as per to discuss wit rajat singh 3 year data opend for 185 indxx 
//	if($factsheet_id!=185)
//	{
		$result['Correlation']['3year'] = $this->getYearsBackcorrel($factsheet_id,3,$benchmarkIVArray);
//	}
	$result['Correlation']['SinceInception'] = $this->getSinceInceptionCorrel($factsheet_id,$benchmarkIVArray);

	
	$result['Beta']['qtd']=number_format($this->getbetaqtd($factsheet_id,$benchmarkIVArray),15,'.','');
	$result['Beta']['ytd']=number_format($this->getYearBackBeta($factsheet_id,$benchmarkIVArray),15,'.','');
	$result['Beta']['1year']=number_format($this->getYearsBackBeta($factsheet_id,1,$benchmarkIVArray),15,'.','');
	$result['Beta']['indxx_id']=$factsheet_id;
	$result['Beta']['statistic']='Beta';
//	if($factsheet_id!=185)
//	{
		$result['Beta']['3year']=number_format($this->getYearsBackBeta($factsheet_id,3,$benchmarkIVArray),15,'.','');
//	}
	$result['Beta']['SinceInception']=number_format($this->getSinceInceptionBeta($factsheet_id,$benchmarkIVArray),15,'.','');

	
	$result['Standard Deviation']['qtd']= $this->getstndevqtd($factsheet_id);
	$result['Standard Deviation']['ytd']= $this->getYearBackstndev($factsheet_id);
	$result['Standard Deviation']['1year']= $this->getYearsBackstndev($factsheet_id,1);
	$result['Standard Deviation']['indxx_id']=$factsheet_id;
	$result['Standard Deviation']['statistic']='Standard Deviation';
	
//	if($factsheet_id!=185)
//	{
		$result['Standard Deviation']['3year']= $this->getYearsBackstndev($factsheet_id,3);
//	}
	$result['Standard Deviation']['SinceInception']= $this->getSinceInceptionstndev($factsheet_id);



  	$result['Cumulative Return']['qtd']= $this->getQuarterReturn($factsheet_id);
	$result['Cumulative Return']['ytd']= $this->getYearBackReturn($factsheet_id);
	$result['Cumulative Return']['1year']= $this->getYearsBackReturn($factsheet_id,1);
	$result['Cumulative Return']['indxx_id']=$factsheet_id;
		$result['Cumulative Return']['statistic']='Cumulative Return';
//	if($factsheet_id!=185)
//	{
		$result['Cumulative Return']['3year']=$this->getYearsBackReturn($factsheet_id,3);
//	}

	$date= $this->getMaxDate($factsheet_id);
	$result['Cumulative Return']['SinceInception']=$this->getSinceInceptionReturn($factsheet_id,$date);
	$result['returnsdate']['date']=$date;

	return $result;

//$this->pr($result);

}	

function getQuarterCorrel($factsheet_id,$benchmarkIVArray){
	
	//global $this->conn;
	
	$lastdate= $this->getLastQuarter($factsheet_id);
	 
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}
	 
	$result2 = mysqli_query($this->conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result2)){
		 $QTDBenchmarkDatesArray[] = $row;
	}	
	 
	$benchmarkReturns=array();
	$IndexReturns=array();
	
	foreach($QTDBenchmarkDatesArray as $key=>$benchmarkV)
	{
		$date=date("Y-m-d",strtotime($benchmarkV['date']));	
		$date2=date("Y-m-d",strtotime($benchmarkV['date'])-86400);	
			
		if($key>0){
			if(empty($benchmarkIVArray[$date]))
				$bValue=$oldBValue;
			else
				$bValue=$benchmarkIVArray[$date];
			
			$returnsB=$bValue/$oldBValue-1;
			$benchmarkReturns[]=$returnsB;
		}
		if(!empty($benchmarkIVArray[$date]))
			$oldBValue=$benchmarkIVArray[$date];
		else{
			if($key==0)
				$oldBValue=$benchmarkIVArray[$date2];	
		}
	}
	
	foreach($QTDindexValuesArray as $key=>$IndexValue){		
		if($key>0){
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}

	return $this->Correlation($IndexReturns,$benchmarkReturns);
        

}

function getYearBackCorrel($factsheet_id,$benchmarkIVArray){
	
	//global $this->conn;
	
	$lastdate= (date("Y")-1)."-12-31";

	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}
	
	$result2 = mysqli_query($this->conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result2)){
		 $QTDBenchmarkDatesArray[] = $row;
	}
	
	$benchmarkReturns=array();
	$IndexReturns=array();
	
	foreach($QTDBenchmarkDatesArray as $key=>$benchmarkV)
	{
		$date=date("Y-m-d",strtotime($benchmarkV['date']));	
		$date2=date("Y-m-d",strtotime($benchmarkV['date'])-86400);	
			
		if($key>0){
			if(empty($benchmarkIVArray[$date]))
				$bValue=$oldBValue;
			else
				$bValue=$benchmarkIVArray[$date];
			
			$returnsB=$bValue/$oldBValue-1;
			$benchmarkReturns[]=$returnsB;
		}
		if(!empty($benchmarkIVArray[$date]))
			$oldBValue=$benchmarkIVArray[$date];
		else{
			if($key==0)
				$oldBValue=$benchmarkIVArray[$date2];	
		}
	}
	

	foreach($QTDindexValuesArray as $key=>$IndexValue){		
		if($key>0){
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}

	return $this->Correlation($IndexReturns,$benchmarkReturns);

}

function getYearsBackcorrel($factsheet_id,$yearback,$benchmarkIVArray){
	
	//global $this->conn;
	
	$newDate = $this->getMaxDate($factsheet_id);
	$oldDate = $this->getOldDate($factsheet_id,$newDate,$yearback);

	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}
	
	$result2 = mysqli_query($this->conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
	while($row = mysqli_fetch_assoc($result2)){
		 $QTDBenchmarkDatesArray[] = $row;
	} 
	
	 
	$benchmarkReturns=array();
	$IndexReturns=array();
	
	foreach($QTDBenchmarkDatesArray as $key=>$benchmarkV){
		$date=date("Y-m-d",strtotime($benchmarkV['date']));	
		$date2=date("Y-m-d",strtotime($benchmarkV['date'])-86400);	
			
		if($key>0)
		{
			if(empty($benchmarkIVArray[$date]))
				$bValue=$oldBValue;
			else
				$bValue=$benchmarkIVArray[$date];
			
			$returnsB=$bValue/$oldBValue-1;
			$benchmarkReturns[]=$returnsB;
		}
		if(!empty($benchmarkIVArray[$date]))
			$oldBValue=$benchmarkIVArray[$date];
		else
		{
			if($key==0)
				$oldBValue=$benchmarkIVArray[$date2];	
		}
	}
	

	
	foreach($QTDindexValuesArray as $key=>$IndexValue)
	{		
		if($key>0)
		{
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}

	return $this->Correlation($IndexReturns,$benchmarkReturns);

}

function getSinceInceptionCorrel($factsheet_id,$benchmarkIVArray){
	
	//global $this->conn;
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $indexValuesArray[] = $row;
	}
	
	$result2 = mysqli_query($this->conn,"select date from indxx_values where indxx='".$factsheet_id."' order by date asc");
	while($row = mysqli_fetch_assoc($result2)){
		 $BenchmarkDatesArray[] = $row;
	}
	
	$benchmarkReturns=array();
	$IndexReturns=array();
	
	foreach($BenchmarkDatesArray as $key=>$benchmarkV){
		
		$date=date("Y-m-d",strtotime($benchmarkV['date']));	
		$date2=date("Y-m-d",strtotime($benchmarkV['date'])-86400);	
			
		if($key>0)
		{
			if(empty($benchmarkIVArray[$date]))
				$bValue=$oldBValue;
			else
				$bValue=$benchmarkIVArray[$date];
			
			$returnsB=$bValue/$oldBValue-1;
			$benchmarkReturns[]=$returnsB;
		}
		if(!empty($benchmarkIVArray[$date]))
			$oldBValue=$benchmarkIVArray[$date];
		else
		{
			if($key==0)
				$oldBValue=$benchmarkIVArray[$date2];	
		}
	}
	
	foreach($indexValuesArray as $key=>$IndexValue){		
		if($key>0)
		{
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}

	return $this->Correlation($IndexReturns,$benchmarkReturns);

}

function getbetaqtd($factsheet_id,$benchmarkIVArray){
	
	//global $this->conn;
	
	$lastdate= $this->getLastQuarter($factsheet_id);
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}
	
	$result2 = mysqli_query($this->conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result2)){
		 $QTDBenchmarkDatesArray[] = $row;
	}
 
	$benchmarkReturns=array();
	$IndexReturns=array();
	
	
	foreach($QTDBenchmarkDatesArray as $key=>$benchmarkV)
	{
		$date=date("Y-m-d",strtotime($benchmarkV['date']));
		$date2=date("Y-m-d",strtotime($benchmarkV['date'])-86400);
				
		if($key>0)
		{
			if(empty($benchmarkIVArray[$date]))
			$bValue=$oldBValue;
			else
			$bValue=$benchmarkIVArray[$date];
			
			$returnsB=$bValue/$oldBValue-1;
			$benchmarkReturns[]=$returnsB;
		}
		if(!empty($benchmarkIVArray[$date]))
		$oldBValue=$benchmarkIVArray[$date];
		else
		{
			 if($key==0)
			 $oldBValue=$benchmarkIVArray[$date2];	
		}
	}
	
	foreach($QTDindexValuesArray as $key=>$IndexValue)
	{		
		if($key>0)
		{
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}


	return $this->slope($IndexReturns,$benchmarkReturns);

}

function getYearBackBeta($factsheet_id,$benchmarkIVArray){
	
	//global $this->conn;

	$lastdate= (date("Y")-1)."-12-31";
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}
	
	$result2 = mysqli_query($this->conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result2)){
		 $QTDBenchmarkDatesArray[] = $row;
	}

	$benchmarkReturns=array();
	$IndexReturns=array();
		
	foreach($QTDBenchmarkDatesArray as $key=>$benchmarkV)
	{
		$date=date("Y-m-d",strtotime($benchmarkV['date']));	
		$date2=date("Y-m-d",strtotime($benchmarkV['date'])-86400);	
			
		if($key>0)
		{
			if(empty($benchmarkIVArray[$date]))
				$bValue=$oldBValue;
			else
				$bValue=$benchmarkIVArray[$date];
				
			$returnsB=$bValue/$oldBValue-1;
			$benchmarkReturns[]=$returnsB;
		}
		if(!empty($benchmarkIVArray[$date]))
			$oldBValue=$benchmarkIVArray[$date];
		else
		{
			if($key==0)
				$oldBValue=$benchmarkIVArray[$date2];	
		}
	}
	
	foreach($QTDindexValuesArray as $key=>$IndexValue)
	{		
		if($key>0)
		{
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}



	return $this->slope($IndexReturns,$benchmarkReturns);

}

function getYearsBackBeta($factsheet_id,$yearback,$benchmarkIVArray){

	//global $this->conn;
	
	$newDate= $this->getMaxDate($factsheet_id);
	$oldDate= $this->getOldDate($factsheet_id,$newDate,$yearback);

	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}
	
	$result2 = mysqli_query($this->conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
	while($row = mysqli_fetch_assoc($result2)){
		 $QTDBenchmarkDatesArray[] = $row;
	}

	$benchmarkReturns=array();
	$IndexReturns=array();
	
	foreach($QTDBenchmarkDatesArray as $key=>$benchmarkV)
	{
		$date=date("Y-m-d",strtotime($benchmarkV['date']));	
		$date2=date("Y-m-d",strtotime($benchmarkV['date'])-86400);
				
		if($key>0)
		{
			if(empty($benchmarkIVArray[$date]))
				$bValue=$oldBValue;
			else
				$bValue=$benchmarkIVArray[$date];
			
			$returnsB=$bValue/$oldBValue-1;
			$benchmarkReturns[]=$returnsB;
		}
		if(!empty($benchmarkIVArray[$date]))
			$oldBValue=$benchmarkIVArray[$date];
		else
		{
			if($key==0)
				$oldBValue=$benchmarkIVArray[$date2];	
		}
	}
	
	
	foreach($QTDindexValuesArray as $key=>$IndexValue){		
		if($key>0){
			
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}
	
	return $this->slope($IndexReturns,$benchmarkReturns);

}

function getSinceInceptionBeta($factsheet_id,$benchmarkIVArray){
	
	//global $this->conn;
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $indexValuesArray[] = $row;
	}
	
	$result2 = mysqli_query($this->conn,"select date from indxx_values where indxx='".$factsheet_id."' order by date asc");
	while($row = mysqli_fetch_assoc($result2)){
		 $BenchmarkDatesArray[] = $row;
	}
	 
	$benchmarkReturns=array();
	$IndexReturns=array();
	
	
	foreach($BenchmarkDatesArray as $key=>$benchmarkV)
	{
		$date=date("Y-m-d",strtotime($benchmarkV['date']));	
		$date2=date("Y-m-d",strtotime($benchmarkV['date'])-86400);	
			
		if($key>0){
			if(empty($benchmarkIVArray[$date]))
				$bValue=$oldBValue;
			else
				$bValue=$benchmarkIVArray[$date];
			
			$returnsB=$bValue/$oldBValue-1;
			$benchmarkReturns[]=$returnsB;
		}
		if(!empty($benchmarkIVArray[$date]))
			$oldBValue=$benchmarkIVArray[$date];
		else
		{
			if($key==0)
				$oldBValue=$benchmarkIVArray[$date2];	
		}
	}
	
	foreach($indexValuesArray as $key=>$IndexValue){		
		if($key>0)
		{
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}
	
	return $this->slope($IndexReturns,$benchmarkReturns);
}

function getstndevqtd($factsheet_id){
	
	//global $this->conn;

	$lastdate = $this->getLastQuarter($factsheet_id);
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}
	
	$IndexReturns=array();
	
	foreach($QTDindexValuesArray as $key=>$IndexValue)
	{		
		if($key>0)
		{
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}
	return ($this->stndev($IndexReturns)*sqrt(250))*100;
}

function getYearBackstndev($factsheet_id){

	//global $this->conn;
	
	$lastdate= (date("Y")-1)."-12-31";

	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}	
	
	foreach($QTDindexValuesArray as $key=>$IndexValue)
	{		
		if($key>0)
		{
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}

	return ($this->stndev($IndexReturns)*sqrt(250))*100;

}

function getYearsBackstndev($factsheet_id,$yearback){
		
	//global $this->conn;	

	$newDate=$this->getMaxDate($factsheet_id);
	$oldDate=$this->getOldDate($factsheet_id,$newDate,$yearback);
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
	
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}

	$IndexReturns=array();
		
	foreach($QTDindexValuesArray as $key=>$IndexValue)
	{		
		if($key>0)
		{
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}
	
	return ($this->stndev($IndexReturns)*sqrt(250))*100;

}

function getSinceInceptionstndev($factsheet_id){
	
	//global $this->conn;	
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' order by date asc");
	
	while($row = mysqli_fetch_assoc($result)){
		 $QTDindexValuesArray[] = $row;
	}
	$IndexReturns=array();
	
	foreach($QTDindexValuesArray as $key=>$IndexValue)
	{		
		if($key>0)
		{
			$returnsI=$IndexValue['value']/$oldIValue-1;
			$IndexReturns[]=$returnsI;
		}
		$oldIValue=$IndexValue['value'];
	}

	return ($this->stndev($IndexReturns)*sqrt(250))*100;

}

function getQuarterReturn($factsheet_id){

	$lastdate = $this->getLastQuarter($factsheet_id);
	$oldValue = $this->getValueBydate($factsheet_id,$lastdate);
	$newValue = $this->getLatestValue($factsheet_id);

	if(!empty($oldValue) && !empty($newValue)){
		return (($newValue[0]['value']/$oldValue[0]['value'])-1)*100;
	}else{
		return 0;
	}	
	
}
	
function getYearBackReturn($factsheet_id){

	$lastdate= (date("Y")-1)."-12-31";
	
	$oldValue = $this->getValueBydate($factsheet_id,$lastdate);
	$newValue = $this->getLatestValue($factsheet_id);

	if(!empty($oldValue) && !empty($newValue)){
		return (($newValue[0]['value']/$oldValue[0]['value'])-1)*100;
	}else{
		return 0;
	}	

}	

function getYearsBackReturn($factsheet_id,$yearback){

	$newDate = $this->getMaxDate($factsheet_id);
	$yearback."<br>";
	$oldDate = $this->getOldDate($factsheet_id,$newDate,$yearback,'Y');
	$oldValue = $this->getValueBydate($factsheet_id,$oldDate);
	$newValue = $this->getLatestValue($factsheet_id);

	if(!empty($oldValue) && !empty($newValue)){

		if($yearback>1){
			return (pow(($newValue[0]['value']/$oldValue[0]['value']),1/$yearback)-1)*100;
		}else
			return (($newValue[0]['value']/$oldValue[0]['value'])-1)*100;
	}else{
		return 0;
	}	//$this->pr($newValue,true);

}

function getSinceInceptionReturn($factsheet_id,$currentdate){

	$newValue = $this->getLatestValue($factsheet_id);
	$oldValue = $this->getOldestValue($factsheet_id,'Y');
	$oldDate =  $this->getOldestdate($factsheet_id);
	$oldDate = date("Y-m-d",strtotime($oldDate['0']['date']));	
	
	if(!empty($oldValue) && !empty($newValue)){
		$datetime1 = new DateTime($oldDate);
		$datetime2 = new DateTime($currentdate); 
		$difference = $datetime1->diff($datetime2);

		$totaldifference = $difference->y + ($difference->m / 12) + ($difference->d / 360); 
	
		return  (pow(($newValue[0]['value']/$oldValue[0]['value']),(1/$totaldifference))-1)*100;
	}else{
		return 0;
	}

}






function getLastQuarter($factsheet_id){

	// Returns an array with a start and end date for the last quarter from todays date
	// eg. If today is 23 Feb 2009, returns $x['start'] = 1 Oct 2008, $x[end] = 31 Dec 2008

    $year = date("Y");
    $month = date("m");

    // Formula to get a quarter in the year from a month
    $startmth = $month - 3 - (($month-1) % 3 );

    // Fix up Jan - Feb to get LAST year's quarter dates (Oct - Dec)
    if ($startmth == -2) {
        $startmth+=12;
        $year-=1;
    }

    $endmth = $startmth+2;

    //$last_quarter['start'] = mktime(0,0,0,$startmth,1,$year);
	//$last_quarter['end'] = ;

    $date= date("Y-m-d",mktime(0,0,0,$endmth,date("t",mktime(0,0,0,$endmth,1,$year)),$year));   

	return $date;
}
 
function Correlation($arr1, $arr2){       

	$correlation = 0;
    $k = $this->SumProductMeanDeviation($arr1, $arr2);
    $ssmd1 = $this->SumSquareMeanDeviation($arr1);
    $ssmd2 = $this->SumSquareMeanDeviation($arr2);
    $product = $ssmd1 * $ssmd2;

    $res = sqrt($product);
    $correlation = $k / $res;

    return $correlation;

}

function SumProductMeanDeviation($arr1, $arr2){
	
    $sum = 0;
    $num = count($arr1);

    for($i=0; $i<$num; $i++){
        $sum = $sum + $this->ProductMeanDeviation($arr1, $arr2, $i);
    }
    return $sum;

}



function ProductMeanDeviation($arr1, $arr2, $item){

    return ($this->MeanDeviation($arr1, $item) * $this->MeanDeviation($arr2, $item));
	
}



function SumSquareMeanDeviation($arr){

    $sum = 0;
    $num = count($arr);

    for($i=0; $i<$num; $i++){
        $sum = $sum + $this->SquareMeanDeviation($arr, $i);
    }

    return $sum;

}


function SquareMeanDeviation($arr, $item){

    return $this->MeanDeviation($arr, $item) * $this->MeanDeviation($arr, $item);

}


function MeanDeviation($arr, $item){

    $average = $this->Average($arr);
    return $arr[$item] - $average;
	
}   


function Average($arr){

    $sum = $this->Sum($arr);
    $num = count($arr);
    return $sum/$num;

}


function Sum($arr){

    return array_sum($arr);

}

function slope($x, $y) {

     // calculate number points
    return $this->standard_covariance($x,$y)/$this->variance($y);

}

function standard_covariance($aValues,$bValues){

	$a= (array_sum($aValues)*array_sum($bValues))/count($aValues);
	$ret = array();
	for($i=0;$i<count($aValues);$i++){
		$ret[$i]=$aValues[$i]*$bValues[$i];
	}
	$b=(array_sum($ret)-$a)/(count($aValues)-1);       
	return (float) $b;

}

function variance($arr){

    if (!count($arr)) return 0;
    $mean = $this->average2($arr);

    $sos = 0;    // Sum of squares
    for ($i = 0; $i < count($arr); $i++){

        $sos += ($arr[$i] - $mean) * ($arr[$i] - $mean);

    }

    return $sos / (count($arr)-1);  // denominator = n-1; i.e. estimating based on sample
                                    // n-1 is also what MS Excel takes by default in the
                                    // VAR function

}

function average2($arr){

    if (!count($arr)) return 0;
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++)
    {
        $sum += $arr[$i];
    }

    return $sum / count($arr);
	
}

function stndev($array){

	$n = 0;
	$mean = 0;
	$M2 = 0;
	foreach($array as $x){
		$n++;
		$delta = $x - $mean;
		$mean = $mean + $delta/$n;
		$M2 = $M2 + $delta*($x - $mean);
	}

	//$variance = $M2/($n);
	$variance = $M2/($n-1);		//-1 as per excel STDDEV

	return sqrt($variance);
	
}

function getValueBydate($factsheet_id,$lastdate){
	
	//global $this->conn;
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx='$factsheet_id' and date<='$lastdate' order by date desc limit 0,1");
	while($row = mysqli_fetch_assoc($result)){
		 $data[] = $row;
	}
	
	return $data;

}

function getLatestValue($factsheet_id){

	//global $this->conn;
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx='$factsheet_id' order by date desc limit 0,1");
	while($row = mysqli_fetch_assoc($result)){
		 $data[] = $row;
	}
	
	return $data;

}

function getOldestValue($factsheet_id,$return =''){

	//global $this->conn;
	
	$result = mysqli_query($this->conn,"select value from indxx_values where indxx='$factsheet_id' order by date asc limit 0,1");
	while($row = mysqli_fetch_assoc($result)){
		 $data[] = $row;
	}
	
	return $data;

}

function getOldestdate($factsheet_id,$return =''){

	//global $this->conn;
	
	$result = mysqli_query($this->conn,"select date from indxx_values where indxx='$factsheet_id' order by date asc limit 0,1");
	while($row = mysqli_fetch_assoc($result)){
		 $data[] = $row;
	}
	
	return $data;

}
    }
?>