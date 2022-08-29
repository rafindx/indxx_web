<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	//Constructor Function
	function __construct()
	{
		parent::__construct();
		
		error_reporting(0);
		
		//Loading models
		$this->load->model(array('indice'));
		
		//Load Helpers
		$this->load->helper('url');
		
		//Loading libraries
		//$this->load->library(array('email'));
		
	}//end of function
	
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	//Function to show indices
	public function indices($indxxID=FALSE)
	{
		//Get Indxx details
		$indxx_details = $this->indice->getIndexDescription($indxxID);
		
		//Get IndexCharacteristics
		$indxx_char = $this->indice->getIndexCharacteristics($indxxID);
		
		if($indxxID!=245)
		{
			//Get IndexTopConstituents
			$indxx_top_const = $this->indice->getIndexTopConstituents($indxxID);
		}else{
			//Get Index TopTenConstituents
			$indxx_top_const = $this->indice->getIndexTopTenConstituents($indxxID);
		}		
		
		$benchmarkIVArray=$this->indice->getIndexRiskReturns($indxxID);
		//print_r($benchmarkIVArray);

		$IndexRiskReturnsArray = $this->getriskandreturn($indxxID,$benchmarkIVArray);
		//print_r($IndexRiskReturnsArray);
		
		////////////Get Charting Details - chart.php/////////
		if($indxxID==221 || $indxxID==220|| $indxxID==236 || $indxxID==237)
		{
			$data = $this->indices_singleChart($indxxID);
			
			echo "<pre>"; print_r($data); die;
			/* $qry_chart = $this->indice->gettabledata('indxx','*', 'id', $indxxID);
			
			$name= $qry_chart[0]['name'];
			$code= $qry_chart[0]['code'];
			$title=$qry_chart[0]['name'];
			$ticker=$qry_chart[0]['code'];
			
			if($indxxID!=31){
				$title=str_replace("Gr","",$title);
			}
			
			if($indxxID!=23){
				$ticker=str_replace("TR","T",$ticker);
			}
			
			$title=$title." (".$ticker.")";
			
			$where = " order by date asc";
			$qry12 = $this->indice->gettabledata('indxx_values','date,value', 'indxx', $indxxID, $where);
			
			if($qry12)
			{
				$i=0;
				$str='';
				foreach($qry12 as $row)
				{
					$dates=explode("-", date("Y-m-d",strtotime($row['date'])));
					

				$str.="{date : new Date(".$dates[0].", ".($dates[1]-1).", ".$dates[2]."),value : ".number_format($row['value'],2,'.','')."},\n";	
				}
			}
			
			$str.="]";
			$str=str_replace("},\n]","}",$str); */
		}else{
			$data = $this->indices_samplechart($indxxID);
			echo "<pre>"; print_r($data); die;
		}
		////////////End of Charting Details	//////////////////////

		
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['str'] = $str;
		$results['code'] = $code;
		$results['str2'] = $str2;
		$results['title'] = $title;
		$results['indxxID'] = $indxxID;
		$this->load->view('indices',$results);
		
	}//End of function
	
	
	
	//get index risk and return
	function getriskandreturn($indxxID,$benchmarkIVArray)
	{
		
		$factsheet_id = $indxxID;
		$result['Correlation']['qtd'] = $this->getQuarterCorrel($factsheet_id,$benchmarkIVArray);
		$result['Correlation']['ytd'] = $this->getYearBackCorrel($factsheet_id,$benchmarkIVArray);
		$result['Correlation']['1year'] = $this->getYearsBackcorrel($factsheet_id,1,$benchmarkIVArray);
		if($factsheet_id!=185)
		{
			$result['Correlation']['3year'] = $this->getYearsBackcorrel($factsheet_id,3,$benchmarkIVArray);
		}
		$result['Correlation']['SinceInception'] = $this->getSinceInceptionCorrel($factsheet_id,$benchmarkIVArray);

		
		$result['Beta']['qtd']=number_format($this->getbetaqtd($factsheet_id,$benchmarkIVArray),15,'.','');
		$result['Beta']['ytd']=number_format($this->getYearBackBeta($factsheet_id,$benchmarkIVArray),15,'.','');
		$result['Beta']['1year']=number_format($this->getYearsBackBeta($factsheet_id,1,$benchmarkIVArray),15,'.','');
		if($factsheet_id!=185)
		{
			$result['Beta']['3year']=number_format($this->getYearsBackBeta($factsheet_id,3,$benchmarkIVArray),15,'.','');
		}
		$result['Beta']['SinceInception']=number_format($this->getSinceInceptionBeta($factsheet_id,$benchmarkIVArray),15,'.','');

		
		$result['Standard Deviation']['qtd']= $this->getstndevqtd($factsheet_id);
		$result['Standard Deviation']['ytd']= $this->getYearBackstndev($factsheet_id);
		$result['Standard Deviation']['1year']= $this->getYearsBackstndev($factsheet_id,1);
		
		if($factsheet_id!=185)
		{
			$result['Standard Deviation']['3year']= $this->getYearsBackstndev($factsheet_id,3);
		}
		$result['Standard Deviation']['SinceInception']= $this->getSinceInceptionstndev($factsheet_id);



		$result['Cumulative Return']['qtd']= $this->getQuarterReturn($factsheet_id);
		$result['Cumulative Return']['ytd']= $this->getYearBackReturn($factsheet_id);
		$result['Cumulative Return']['1year']= $this->getYearsBackReturn($factsheet_id,1);
		if($factsheet_id!=185)
		{
			$result['Cumulative Return']['3year']= $this->getYearsBackReturn($factsheet_id,3);
		}

		$date= $this->indice->getMaxDate($factsheet_id);
		$result['Cumulative Return']['SinceInception']= $this->getSinceInceptionReturn($factsheet_id,$date);
		$result['returnsdate']['date']=$date;

		return $result;

		//$this->pr($result);

	}//End of method
	
	
	//Function to get QuarterCorrel
	function getQuarterCorrel($factsheet_id,$benchmarkIVArray)
	{
		
		$lastdate= $this->getLastQuarter($factsheet_id);
		
		$where = " and date>='".$lastdate."' order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where);
		
		foreach($qry1 as $res1)
		{
			$QTDindexValuesArray[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		} 
		 
		$result2 = mysqli_query($conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result2)){
			 $QTDBenchmarkDatesArray[] = $row;
		}	*/
		
		$where1 = " and date>='".$lastdate."' order by date asc";
		$result2 = $this->indice->gettabledata('indxx_values','date', 'indxx', $factsheet_id, $where1);

		foreach($result2 as $res2)
		{
			$QTDBenchmarkDatesArray[] = $res2;
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

	}//End of function
	
	
	//Function to get LastQuarter
	function getLastQuarter($factsheet_id)
	{

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
		
	}//End of function
	
	
	//Function to get YearBackCorrel
	function getYearBackCorrel($factsheet_id,$benchmarkIVArray)
	{
	
		$lastdate= (date("Y")-1)."-12-31";
		
		$where = " and date>='".$lastdate."' order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where);
		foreach($qry1 as $res1)
		{
			$QTDindexValuesArray[] = $res1;
		}
		
		$where = " and date>='".$lastdate."' order by date asc";
		$qry2 = $this->indice->gettabledata('indxx_values','date', 'indxx', $factsheet_id, $where);
		foreach($qry2 as $res2)
		{
			 $QTDBenchmarkDatesArray[] = $res2;
		}
		
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		}
		
		$result2 = mysqli_query($conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result2)){
			 $QTDBenchmarkDatesArray[] = $row;
		}
		 */
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

	}//End of function
	
	
	//Function to get YearsBackCorrel
	function getYearsBackcorrel($factsheet_id,$yearback,$benchmarkIVArray)
	{
	
		$newDate = $this->indice->getMaxDate($factsheet_id);
		$oldDate = $this->indice->getOldDate($factsheet_id,$newDate,$yearback);
		
		
		$where = " and date>='".$oldDate."' order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where);
		foreach($qry1 as $res1)
		{
			$QTDindexValuesArray[] = $res1;
		}
		
		$where1 = " and date>='".$oldDate."' order by date asc";
		$qry2 = $this->indice->gettabledata('indxx_values','date', 'indxx', $factsheet_id, $where1);
		foreach($qry2 as $res2)
		{
			$QTDBenchmarkDatesArray[] = $res2;
		}
		
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		}
		
		$result2 = mysqli_query($conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
		while($row = mysqli_fetch_assoc($result2)){
			 $QTDBenchmarkDatesArray[] = $row;
		} 
		 */
		 
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

	}//End of function
	
	
	//Function to get SinceInceptionCorrel
	function getSinceInceptionCorrel($factsheet_id,$benchmarkIVArray)
	{
		
		$where = " order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where);
		foreach($qry1 as $res1)
		{
			$indexValuesArray[] = $res1;
		}
		
		$where1 = " order by date asc";
		$qry2 = $this->indice->gettabledata('indxx_values','date', 'indxx', $factsheet_id, $where1);
		foreach($qry2 as $res2)
		{
			$BenchmarkDatesArray[] = $res2;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $indexValuesArray[] = $row;
		}
		
		$result2 = mysqli_query($conn,"select date from indxx_values where indxx='".$factsheet_id."' order by date asc");
		while($row = mysqli_fetch_assoc($result2)){
			 $BenchmarkDatesArray[] = $row;
		}
		 */
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

	}//End of function


	//Function to get getbetaqtd
	function getbetaqtd($factsheet_id,$benchmarkIVArray)
	{
		
		$lastdate= $this->getLastQuarter($factsheet_id);
		
		$where = " and date>='".$lastdate."' order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where);
		foreach($qry1 as $res1)
		{
			$indexValuesArray[] = $res1;
		}
		
		$where1 = " and date>='".$lastdate."' order by date asc";
		$qry2 = $this->indice->gettabledata('indxx_values','date', 'indxx', $factsheet_id, $where1);
		foreach($qry2 as $res2)
		{
			$QTDBenchmarkDatesArray[] = $res2;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		}
		
		$result2 = mysqli_query($conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result2)){
			 $QTDBenchmarkDatesArray[] = $row;
		}
		*/
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

	}//End of function

	
	//Function for Correlation
	function Correlation($arr1, $arr2)
	{

		$correlation = 0;
		$k = $this->SumProductMeanDeviation($arr1, $arr2);
		$ssmd1 = $this->SumSquareMeanDeviation($arr1);
		$ssmd2 = $this->SumSquareMeanDeviation($arr2);
		$product = $ssmd1 * $ssmd2;

		$res = sqrt($product);
		$correlation = $k / $res;

		return $correlation;

	}//End of function
	
	
	//Function for Slope
	function slope($x, $y)
	{
		// calculate number points
		return $this->standard_covariance($x,$y)/$this->variance($y);
		
	}//End of function
	
	
	//Function to get standard_covariance
	function standard_covariance($aValues,$bValues)
	{

		$a= (array_sum($aValues)*array_sum($bValues))/count($aValues);
		$ret = array();
		for($i=0;$i<count($aValues);$i++){
			$ret[$i]=$aValues[$i]*$bValues[$i];
		}
		$b=(array_sum($ret)-$a)/(count($aValues)-1);       
		return (float) $b;

	}//End of function
	

	//Function to get getYearBackBeta
	function getYearBackBeta($factsheet_id,$benchmarkIVArray)
	{
	
		$lastdate= (date("Y")-1)."-12-31";
		
		$where1 = " and date>='".$lastdate."' order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$QTDindexValuesArray[] = $res1;
		}
		
		$where2 = " and date>='".$lastdate."' order by date asc";
		$qry2 = $this->indice->gettabledata('indxx_values','date', 'indxx', $factsheet_id, $where2);
		foreach($qry2 as $res2)
		{
			$QTDBenchmarkDatesArray[] = $res2;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		}
		
		$result2 = mysqli_query($conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result2)){
			 $QTDBenchmarkDatesArray[] = $row;
		}
		*/
		
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

	}//End of function
	
	
	//Function to get getYearsBackBeta
	function getYearsBackBeta($factsheet_id,$yearback,$benchmarkIVArray)
	{

		$newDate= $this->indice->getMaxDate($factsheet_id);
		$oldDate= $this->indice->getOldDate($factsheet_id,$newDate,$yearback);
		
		$where1 = " and date>='".$oldDate."' order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$QTDindexValuesArray[] = $res1;
		}
		
		$where2 = " and date>='".$oldDate."' order by date asc";
		$qry2 = $this->indice->gettabledata('indxx_values','date', 'indxx', $factsheet_id, $where2);
		foreach($qry2 as $res2)
		{
			$QTDBenchmarkDatesArray[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		} 
		
		$result2 = mysqli_query($conn,"select date from indxx_values where indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
		while($row = mysqli_fetch_assoc($result2)){
			 $QTDBenchmarkDatesArray[] = $row;
		} */

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

	}//End of function

	
	//Function to get getSinceInceptionBeta
	function getSinceInceptionBeta($factsheet_id,$benchmarkIVArray)
	{
		
		$where1 = " order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$indexValuesArray[] = $res1;
		}
		
		$where2 = " order by date asc";
		$qry2 = $this->indice->gettabledata('indxx_values','date', 'indxx', $factsheet_id, $where2);
		foreach($qry2 as $res2)
		{
			$BenchmarkDatesArray[] = $res2;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $indexValuesArray[] = $row;
		}
		
		$result2 = mysqli_query($conn,"select date from indxx_values where indxx='".$factsheet_id."' order by date asc");
		while($row = mysqli_fetch_assoc($result2)){
			 $BenchmarkDatesArray[] = $row;
		} */
		 
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
	}//End of function
	
	
	//Function to get getstndevqtd
	function getstndevqtd($factsheet_id)
	{
		
		$lastdate = $this->getLastQuarter($factsheet_id);
		
		$where1 = " and date>='".$lastdate."' order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$QTDindexValuesArray[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		} */
		
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
		
	}//End of function
	
	
	//Function to stndev
	function stndev($array)
	{

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
		
	}//End of function
	
	
	//Function to getYearBackstndev
	function getYearBackstndev($factsheet_id)
	{
		$lastdate= (date("Y")-1)."-12-31";
		
		$where1 = " and date>='".$lastdate."' order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$QTDindexValuesArray[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$lastdate."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		} */	
		
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

	}//End of function

	
	//Function to getYearsBackstndev
	function getYearsBackstndev($factsheet_id,$yearback)
	{

		$newDate = $this->indice->getMaxDate($factsheet_id);
		$oldDate = $this->indice->getOldDate($factsheet_id,$newDate,$yearback);
		
		$where1 = " and date>='".$lastdate."' order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$QTDindexValuesArray[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' and date>='".$oldDate."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		} */

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

	}//End of function
	
	
	//Function to getSinceInceptionstndev
	function getSinceInceptionstndev($factsheet_id)
	{
		
		$where1 = " order by date asc";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$QTDindexValuesArray[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx_values.indxx='".$factsheet_id."' order by date asc");
		while($row = mysqli_fetch_assoc($result)){
			 $QTDindexValuesArray[] = $row;
		} */
		
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

	}//End of function
	
	
	//Function to getSinceInceptionstndev
	function getQuarterReturn($factsheet_id)
	{

		$lastdate = $this->getLastQuarter($factsheet_id);
		$oldValue = $this->getValueBydate($factsheet_id,$lastdate);
		$newValue = $this->getLatestValue($factsheet_id);

		if(!empty($oldValue) && !empty($newValue)){
			return (($newValue[0]['value']/$oldValue[0]['value'])-1)*100;
		}else{
			return 0;
		}	
	
	}//End of function
	
	
	//Function to getValueBydate
	function getValueBydate($factsheet_id,$lastdate)
	{
		
		$where1 = " and date<='".$lastdate."' order by date desc limit 0,1";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$data[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx='$factsheet_id' and date<='$lastdate' order by date desc limit 0,1");
		while($row = mysqli_fetch_assoc($result)){
			 $data[] = $row;
		} */
		
		return $data;

	}//End of function
	
	
	//Function to getLatestValue
	function getLatestValue($factsheet_id)
	{
	
		$where1 = " order by date desc limit 0,1";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$data[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx='$factsheet_id' order by date desc limit 0,1");
		while($row = mysqli_fetch_assoc($result)){
			 $data[] = $row;
		} */
		
		return $data;

	}//End of function
	
	
	//Function to getYearBackReturn
	function getYearBackReturn($factsheet_id)
	{

		$lastdate= (date("Y")-1)."-12-31";
		
		$oldValue = $this->getValueBydate($factsheet_id,$lastdate);
		$newValue = $this->getLatestValue($factsheet_id);

		if(!empty($oldValue) && !empty($newValue)){
			return (($newValue[0]['value']/$oldValue[0]['value'])-1)*100;
		}else{
			return 0;
		}	

	}//End of function
	
	
	//Function to getYearsBackReturn
	function getYearsBackReturn($factsheet_id,$yearback)
	{

		$newDate = $this->indice->getMaxDate($factsheet_id);
		$yearback."<br>";
		$oldDate = $this->indice->getOldDate($factsheet_id,$newDate,$yearback,'Y');
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

	}//End of function
	
	
	//Function to getSinceInceptionReturn
	function getSinceInceptionReturn($factsheet_id,$currentdate)
	{

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

	}//End of function
	
	
	//Function to getOldestValue
	function getOldestValue($factsheet_id,$return ='')
	{
		
		$where1 = " order by date desc limit 0,1";
		$qry1 = $this->indice->gettabledata('indxx_values','value', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$data[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select value from indxx_values where indxx='$factsheet_id' order by date asc limit 0,1");
		while($row = mysqli_fetch_assoc($result)){
			 $data[] = $row;
		} */
		
		return $data;

	}//End of function

	
	//Function to getOldestdate
	function getOldestdate($factsheet_id,$return ='')
	{
		
		$where1 = " order by date desc limit 0,1";
		$qry1 = $this->indice->gettabledata('indxx_values','date', 'indxx', $factsheet_id, $where1);
		foreach($qry1 as $res1)
		{
			$data[] = $res1;
		}
		
		/* $result = mysqli_query($conn,"select date from indxx_values where indxx='$factsheet_id' order by date asc limit 0,1");
		while($row = mysqli_fetch_assoc($result)){
			 $data[] = $row;
		} */
		
		return $data;

	}//End of function
	
	
	//Function to SumProductMeanDeviation
	function SumProductMeanDeviation($arr1, $arr2)
	{
		$sum = 0;
		$num = count($arr1);

		for($i=0; $i<$num; $i++){
			$sum = $sum + $this->ProductMeanDeviation($arr1, $arr2, $i);
		}
		return $sum;

	}//End of function
	
	
	//Function to ProductMeanDeviation
	function ProductMeanDeviation($arr1, $arr2, $item)
	{
		return ($this->MeanDeviation($arr1, $item) * $this->MeanDeviation($arr2, $item));
		
	}//End of function
		
	
	//Function to MeanDeviation
	function MeanDeviation($arr, $item)
	{

		$average = $this->Average($arr);
		return $arr[$item] - $average;
	}//End of function
	
	
	//Function to Average
	function Average($arr)
	{
		$sum = $this->Sum($arr);
		$num = count($arr);
		return $sum/$num;

	}//End of function

	
	//Function to Average
	function Sum($arr)
	{
		return array_sum($arr);

	}//End of function

	
	//Function to SumSquareMeanDeviation
	function SumSquareMeanDeviation($arr)
	{
		$sum = 0;
		$num = count($arr);

		for($i=0; $i<$num; $i++){
			$sum = $sum + $this->SquareMeanDeviation($arr, $i);
		}

		return $sum;
		
	}//End of function


	//Function to SquareMeanDeviation
	function SquareMeanDeviation($arr, $item)
	{
		return $this->MeanDeviation($arr, $item) * $this->MeanDeviation($arr, $item);
	}//End of function
	
	
	//Function to variance
	function variance($arr)
	{

		if (!count($arr)) return 0;
		$mean = $this->average2($arr);

		$sos = 0;    // Sum of squares
		for ($i = 0; $i < count($arr); $i++){

			$sos += ($arr[$i] - $mean) * ($arr[$i] - $mean);

		}

		return $sos / (count($arr)-1);  // denominator = n-1; i.e. estimating based on sample
										// n-1 is also what MS Excel takes by default in the
										// VAR function

	}//End of function
	
	
	//Function to average2
	function average2($arr)
	{

		if (!count($arr)) return 0;
		$sum = 0;
		for ($i = 0; $i < count($arr); $i++)
		{
			$sum += $arr[$i];
		}

		return $sum / count($arr);
		
	}//End of function
	
	
	function savephp()
	{
		/* echo "helloo";
		echo $filename = $this->input->post('filename');
		echo $indxx = $this->input->post('indxx'); */
		
		$data = urldecode($_POST['imageData']);
		$indxx_id=$_POST['indxx'];
		$date = date("Y-m-d");

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$filename=$_POST['filename']."_".$date;
		if(!file_exists(base_url().'assets/images/chartimages/'.$filename.'.png'))
		file_put_contents(base_url().'assets/images/chartimages/'.$filename.'.png', $data);
	
	
	}//End of function
	
	
	//Function to run a CRON and calculate indices 
	function cron_indice()
	{
		$indices_array = array('237', '252', '251', '186', '238', '241', '221', '233', '239', '234', '240', '10', '2', '8', '235', '243', '248', '247', '245','172', '185', '18','211');
		
		foreach($indices_array as $indice)
		{
			$cal_indx = $this->pcalculate($indice);
		}
		
	}//End of function
	
	
	//Function to precalculate values
	function pcalculate($indxxID=FALSE)
	{
		//echo "<pre>";
		
		/************** Calculations for indxx_charecterstics table *********************/
		
		//Get Indxx details
		$indxx_details = $this->indice->getIndexDescription($indxxID);
		
		if($indxx_details[0]->dividendyield=='')
		{
			$indxx_details[0]->dividendyield = 0;
		}
		
		//Get Index Characteristics
		$indxx_char = $this->indice->getIndexCharacteristics($indxxID);
		
		//Prepare Indxx Characteristics Array
		$indxx_charecterstics = array();
		$indxx_charecterstics['indxx_id'] = $indxxID;
		$indxx_charecterstics['base_date'] = $indxx_char['inceptionDate'];
		$indxx_charecterstics['no_of_constituents'] = $indxx_char['noofconstituents'];
		$indxx_charecterstics['dividend_yield'] = $indxx_details[0]->dividendyield;
		$indxx_charecterstics['52_week_highlow'] = $indxx_char['52weeks']['max'].'/'.$indxx_char['52weeks']['min'];;
		//print_r($indxx_charecterstics);
		
		echo "<br/>Saving indxx_charecterstics for ".$indxxID."<br/>";
		//Insert Data into Table
		$this->indice->insertRow('indxx_charecterstics',$indxx_charecterstics);
		
		/************** End of Calculations for indxx_charecterstics table *********************/
		
		
		/************** Calculations for indxx_risk_return_statistics table *********************/
		
		//Get benchmark Array Index Risk Returns
		$benchmarkIVArray=$this->indice->getIndexRiskReturns($indxxID);
		
		//Get Index Risk Returns
		$IndexRiskReturnsArray = $this->getriskandreturn($indxxID,$benchmarkIVArray);
		//echo "<pre>"; print_r($IndexRiskReturnsArray); die;
		
		//Prepare Indxx RiskReturns Array
		$indxx_RiskReturns = array();
		$indxx_RiskReturns['indxx_id'] = $indxxID;
		
		foreach($IndexRiskReturnsArray as $key => $value)
		{
			$indxx_RiskReturns['statistic'] = $key;
			$indxx_RiskReturns['qtd'] = $value['qtd'];
			$indxx_RiskReturns['ytd'] = $value['ytd'];
			$indxx_RiskReturns['1year'] = $value['1year'];
			$indxx_RiskReturns['3year'] = $value['3year'];
			$indxx_RiskReturns['sbd'] = $value['SinceInception'];
				
			if(empty($indxx_RiskReturns['qtd'])){ $indxx_RiskReturns['qtd'] = 0; }
			if(empty($indxx_RiskReturns['ytd'])){ $indxx_RiskReturns['ytd'] = 0; }
			if(empty($indxx_RiskReturns['1year'])){ $indxx_RiskReturns['1year'] = 0; }
			if(empty($indxx_RiskReturns['3year'])){ $indxx_RiskReturns['3year'] = 0; }
			if(empty($indxx_RiskReturns['sbd'])){ $indxx_RiskReturns['sbd'] = 0; }
			
			echo "Saving indxx_risk_return_statistics for ".$indxxID."<br/>";
			//Insert Data into indxx_risk_return_statistics Table
			if($indxx_RiskReturns['statistic'] != 'returnsdate')
			{
				$this->indice->insertRow('indxx_risk_return_statistics',$indxx_RiskReturns);
			}
			
		}//end of loop
		
		/************** End of Calculations for indxx_risk_return_statistics table *********************/
		
		
		/************** Calculations for indxx_top_5_constituents table *********************/
		
		if($indxxID!=245)
		{
			//Get IndexTopConstituents
			$indxx_top_const = $this->indice->getIndexTopConstituents($indxxID);
		}else{
			//Get Index TopTenConstituents
			$indxx_top_const = $this->indice->getIndexTopTenConstituents($indxxID);
		}	
		
		//echo "<pre>"; print_r($indxx_top_const); die;
		
		//Prepare Indxx Top Constituents Array
		$indxx_TopConstituents = array();
		$indxx_TopConstituents['indxx_id'] = $indxxID;
		
		echo "Saving indxx_top_5_constituents for ".$indxxID."<br/>";
		foreach($indxx_top_const as $res)
		{
			$indxx_TopConstituents['constituent'] = $res['name'];
			$indxx_TopConstituents['ISIN'] = $res['isin'];
			$indxx_TopConstituents['weight'] = $res['weight'];
			$indxx_TopConstituents['cdate'] = $res['date'];
			
			//Insert Data into indxx_top_5_constituents Table
			$this->indice->insertRow('indxx_top_5_constituents',$indxx_TopConstituents);
		}
		/************** End of Calculations for indxx_top_5_constituents table *********************/
				
	}//End of function
	
	
	//Function to show New indices
	public function new_indices($indxxID=FALSE)
	{
		
		//Get Indxx details
		$indxx_details = $this->indice->getIndexDescription($indxxID);
		
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$get_indxx_top_const = $this->indice->get_newIndexTopConstituents($indxxID);
	
		$i=0;
		foreach($get_indxx_top_const as $tconst)
		{
			$indxx_top_const[$i]['isin'] = $tconst['ISIN'];
			$indxx_top_const[$i]['name'] = $tconst['constituent'];
			$indxx_top_const[$i]['weight'] = $tconst['weight'];
			$indxx_top_const[$i]['date'] = $tconst['cdate'];
			$i++;
		}
		
		//Get New IndexRiskReturnsArray
		$get_IndexRiskReturnsArray = $this->indice->get_newIndexRiskReturns($indxxID);
		
		//Preparing IndexRiskReturnsArray
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			//echo $key."^".$value."<br>";
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		
		////////////Get Charting Details - chart.php/////////
		if($indxxID==221 || $indxxID==220|| $indxxID==236 || $indxxID==237)
		{
			$qry_chart = $this->indice->gettabledata('indxx','*', 'id', $indxxID);
			
			$name= $qry_chart[0]['name'];
			$code= $qry_chart[0]['code'];
			$title=$qry_chart[0]['name'];
			$ticker=$qry_chart[0]['code'];
			
			if($indxxID!=31){
				$title=str_replace("Gr","",$title);
			}
			
			if($indxxID!=23){
				$ticker=str_replace("TR","T",$ticker);
			}
			
			$title=$title." (".$ticker.")";
			
			$where = " order by date asc";
			$qry12 = $this->indice->gettabledata('indxx_values','date,value', 'indxx', $indxxID, $where);
			
			if($qry12)
			{
				$i=0;
				$str='';
				foreach($qry12 as $row)
				{
					$dates=explode("-", date("Y-m-d",strtotime($row['date'])));
					

				$str.="{date : new Date(".$dates[0].", ".($dates[1]-1).", ".$dates[2]."),value : ".number_format($row['value'],2,'.','')."},\n";	
				}
			}
			
			$str.="]";
			$str=str_replace("},\n]","}",$str);
		}
		////////////End of Charting Details	//////////////////////

		$results['str'] = $str;
		$results['code'] = $code;
		$results['str'] = $str;
		$results['title'] = $title;
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		
		$this->load->view('new-indices',$results);
		
		
	}//End of function
	
	
	
	
	//Function to show indices sample chart
	public function indices_samplechart($indxxID=FALSE)
	{
		
		$indxx = $this->db->query("SELECT * FROM indxx WHERE id = $indxxID");
		$result = $indxx->result_array();
		
		$name= $result[0]['name'];
		$code= $result[0]['code'];
		
		if($indxxID!=31)
		$name=str_replace("Gr","",$name);

		if($_GET['id']!=23)
		$code=str_replace("TR","T",$code);
		
		
		if($indxxID==17)
		{
			$name='Indxx SuperDividend<sup>&reg</sup>U.S. Low Volatility Index';
		}
		if($indxxID==170 || $_REQUEST['id']==170)
		{
			$name='Indxx SuperDividend<sup>&reg</sup>Emerging Markets Index';
		}
		else if($indxxID==171 || $_REQUEST['id']==171)
		{
			$name='Indxx SuperDividend<sup>&reg</sup>Emerging Markets Index TR';
		}
		
		$title=$result[0]['name'];
		if($indxxID!=31)
		$title=str_replace("Gr","",$title);
		$ticker=$result[0]['code'];
		
		if($indxxID!=23)
		$ticker=str_replace("TR","T",$ticker);
		$title=$title." (".$ticker.")";
		
		$query = $this->db->query("select  date,value from indxx_values where indxx='".$indxxID."' order by date asc");
		$result = $query->result_array();
		
		if($result)
		{
			$i=0;
			$str='';
			foreach ($result as $row)
			{
				$dates=explode("-", date("Y-m-d",strtotime($row['date'])));
				$str.="{date : new Date(".$dates[0].", ".($dates[1]-1).", ".$dates[2]."),value : ".number_format($row['value'],2,'.','')."},\n";	
			}
		}
		
		$str.="]";
		$str=str_replace("},\n]","}",$str);
		//echo $str;
		
		$basequery = $this->db->query("SELECT DATE_FORMAT(date,'%Y-%m-%d') AS date ,value FROM indxx_values where indxx='".$indxxID."' order by date asc limit 0,1");
		$basedate = $basequery->result_array();

		$basedateindxx=$basedate[0]['date'];
		
		if(strtolower(date("l", strtotime($basedateindxx))) == "saturday"){
			$basedateindxx = date("Y-m-d",strtotime($basedateindxx)-(86400));
		}
		
		
		$basevalue = $this->db->query("select DATE_FORMAT(date,'%Y-%m-%d') AS date ,value from indxx_values where indxx='".$indxxID."' and date='".$basedateindxx."' ");
		
		$bdata=$basevalue->result_array();
		$basevaluebench=$bdata[0]['value'];
		
		/*******************************/
		$query2 = $this->db->query("select  DATE_FORMAT(date,'%Y-%m-%d') AS date,(value/".$basevaluebench.")*1000 as value from indxx_values where indxx='237' and date>='".$basedateindxx."' order by date asc");
		$res2=$query2->result_array();

		if($res2)
		{
			$i=0;
			$str2='';
			foreach($res2 as $row2)
			{
				$dates2=explode("-", date("Y-m-d",strtotime($row2['date'])));
				$str2.="{date : new Date(".$dates2[0].", ".($dates2[1]-1).", ".$dates2[2]."),value : ".number_format($row2['value'],2,'.','')."},\n";	
			}
		}
		
		$str2.="]";
		$str2=str_replace("},\n]","}",$str2);
		//echo $str2; die;
		
		$results = array();
		$results['title'] = $title;
		$results['indxxID'] = $indxxID;
		$results['code'] = $code;
		$results['str'] = $str;
		$results['str2'] = $str2;
		
		return $results;
		
		//$this->load->view('sampleChart-indices',$results);
		
	}//End of function
	
	
	//Function to show Indeces chart single line
	function indices_singleChart($indxxID=FALSE)
	{

		$qry_chart = $this->indice->gettabledata('indxx','*', 'id', $indxxID);
		
		$name= $qry_chart[0]['name'];
		$code= $qry_chart[0]['code'];
		$title=$qry_chart[0]['name'];
		$ticker=$qry_chart[0]['code'];
		
		if($indxxID!=31){
			$title=str_replace("Gr","",$title);
		}
		
		if($indxxID!=23){
			$ticker=str_replace("TR","T",$ticker);
		}
		
		$title=$title." (".$ticker.")";
		
		$where = " order by date asc";
		$qry12 = $this->indice->gettabledata('indxx_values','date,value', 'indxx', $indxxID, $where);
		
		if($qry12)
		{
			$i=0;
			$str='';
			foreach($qry12 as $row)
			{
				$dates=explode("-", date("Y-m-d",strtotime($row['date'])));
				

			$str.="{date : new Date(".$dates[0].", ".($dates[1]-1).", ".$dates[2]."),value : ".number_format($row['value'],2,'.','')."},\n";	
			}
		}
		
		$str.="]";
		$str=str_replace("},\n]","}",$str);
		
		$data2 = array();
		$data2['name'] = $name;
		$data2['code'] = $code;
		$data2['title'] = $title;
		$data2['ticker'] = $ticker;
		$data2['str'] = $str;
		
		return $data2;
		
	}//End of function
	
	
}//End of Class
