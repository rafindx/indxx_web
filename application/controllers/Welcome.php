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
		$this->load->library('session');
		//Loading libraries
		//$this->load->library(array('email'));
		$this->lang->load('information','english');
		
	}

	//end of function
	
	public function notfound()
	{
		$this->load->view('404');
	}
	
/*	public function index()
	{
		$this->load->view('welcome_message');
	}*/
	
	//Function to show indices
	public function indices($indxxID=FALSE)
	{  
	    $this->session->set_userdata('site_lang',  "english");
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
		//print_r($IndexRiskReturnsArray); die;
		
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['indxxID'] = $indxxID;
		
		
		////////////Get Charting Details - chart.php/////////
		if($indxxID==221 || $indxxID==220|| $indxxID==236 || $indxxID==237)
		{
			$data = $this->indices_singleChart($indxxID);
			//echo "<pre>"; print_r($data); die;
			
			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['title'] = $data['title'];
			$results['date_value'] = $data['date_value'];
			$this->load->view('indices',$results);
			
		}else{
			$data = $this->indices_samplechart($indxxID);
			//echo "<pre>"; print_r($data); die;
			
			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
			$results['date_value'] = $data['date_value'];
			$this->load->view('sampleChart-indices',$results);
		}
		////////////End of Charting Details	//////////////////////

	}//End of function
	
	
	
	//get index risk and return
	function getriskandreturn($indxxID,$benchmarkIVArray)
	{
	
		$factsheet_id = $indxxID;
		$result['Correlation']['qtd'] = $this->getQuarterCorrel($factsheet_id,$benchmarkIVArray);
		$result['Correlation']['ytd'] = $this->getYearBackCorrel($factsheet_id,$benchmarkIVArray);
		$result['Correlation']['1year'] = $this->getYearsBackcorrel($factsheet_id,1,$benchmarkIVArray);
		$result['Correlation']['indxx_id']=$indxxID;
		$result['Correlation']['statistic']='Correlation';
		if($factsheet_id!=185)
		{
			$result['Correlation']['3year'] = $this->getYearsBackcorrel($factsheet_id,3,$benchmarkIVArray);
		}
		$result['Correlation']['sbd'] = $this->getSinceInceptionCorrel($factsheet_id,$benchmarkIVArray);

		
		$result['Beta']['qtd']=number_format($this->getbetaqtd($factsheet_id,$benchmarkIVArray),15,'.','');
		$result['Beta']['ytd']=number_format($this->getYearBackBeta($factsheet_id,$benchmarkIVArray),15,'.','');
		$result['Beta']['1year']=number_format($this->getYearsBackBeta($factsheet_id,1,$benchmarkIVArray),15,'.','');
		$result['Beta']['indxx_id']=$indxxID;
		$result['Beta']['statistic']='Beta';
		if($factsheet_id!=185)
		{
			$result['Beta']['3year']=number_format($this->getYearsBackBeta($factsheet_id,3,$benchmarkIVArray),15,'.','');
		}
		$result['Beta']['sbd']=number_format($this->getSinceInceptionBeta($factsheet_id,$benchmarkIVArray),15,'.','');

		
		$result['Standard Deviation']['qtd']= $this->getstndevqtd($factsheet_id);
		$result['Standard Deviation']['ytd']= $this->getYearBackstndev($factsheet_id);
		$result['Standard Deviation']['1year']= $this->getYearsBackstndev($factsheet_id,1);
		$result['Standard Deviation']['indxx_id']=$indxxID;
		$result['Standard Deviation']['statistic']='Standard Deviation';

		
		if($factsheet_id!=185)
		{
			$result['Standard Deviation']['3year']= $this->getYearsBackstndev($factsheet_id,3);
		}
		$result['Standard Deviation']['sbd']= $this->getSinceInceptionstndev($factsheet_id);



		$result['Cumulative Return']['qtd']= $this->getQuarterReturn($factsheet_id);
		$result['Cumulative Return']['ytd']= $this->getYearBackReturn($factsheet_id);
		$result['Cumulative Return']['1year']= $this->getYearsBackReturn($factsheet_id,1);
		$result['Cumulative Return']['indxx_id']=$indxxID;
		$result['Cumulative Return']['statistic']='Standard Deviation';
		if($factsheet_id!=185)
		{
			$result['Cumulative Return']['3year']= $this->getYearsBackReturn($factsheet_id,3);
		}

		$date= $this->indice->getMaxDate($factsheet_id);
		$result['Cumulative Return']['sbd']= $this->getSinceInceptionReturn($factsheet_id,$date);
		
		//$result['returnsdate']['date']=$date;
		

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
            
		/* echo "helloo<br/>";
		echo $filename = $this->input->post('filename')."<br/>";
		echo $indxx = $this->input->post('indxx')."<br/>"; */
		
		$date = date("Y-m-d");
		$filename=$this->input->post('filename')."_".$date;
		$indxx_id=$this->input->post('indxx');
		$data = urldecode($this->input->post('imageData'));
		//$data = urldecode($_POST['imageData']);

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		
		if(!file_exists(getcwd().'/assets/images/chartimages/'.$filename.'.png'))
		file_put_contents(getcwd().'/assets/images/chartimages/'.$filename.'.png', $data);
		
		//Amol
        else{
        unlink(getcwd().'/assets/images/chartimages/'.$filename.'.png');
        file_put_contents(getcwd().'/assets/images/chartimages/'.$filename.'.png', $data);
        }
        
		$content = file_get_contents($filename);
		
	}//End of function
	
	
	//Function to run a CRON and calculate indices 
	function cron_indice()
	{
		$indices_array = array('237', '252', '251', '186', '238', '241', '221', '233', '239', '234', '240', '10', '2', '8', '235', '248', '247', '245','172', '185', '18','211','274'); 
		//'243', 
		
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
	public function new_indices_old($indxxID=FALSE)
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
				$title=str_replace("GR","",$title);
			}
			/*
			if($indxxID!=23 || $indxxID!=370 )
			{
				$ticker=str_replace("TR","T",$ticker);
			}
			*/
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
		$results['str2'] = $str;
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
	    
        //echo $indxxID; die;
		$indxx = $this->db->query("SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = $indxxID");
		$result = $indxx->result_array();
		
		$name= $result[0]['name'];
		$code= $result[0]['code'];
	    $benchmark_id= $result[0]['benchmark_id'];
		$return_type = $result[0]['return_type'];
		if($indxxID!=31)
		$name=str_replace("GR","",$name);
        
		
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
		//echo $benchmak_id=$result[0]['benchmak_id']; die;
		if($indxxID!=31)
		$title=str_replace("GR","",$title);
		$ticker=$result[0]['code'];
	    /*
		if($indxxID!=23 || $indxxID!=370 || $indxxID!=477 || $indxxID!=284 || $indxxID!=537 || $indxxID!=540 || $indxxID!=457 || $indxxID!=500 || $indxxID!=501){
		    $ticker=str_replace("TR","T",$ticker);
		   
		}
		*/
		$title=$title." (".$ticker.")";
		
		$query = $this->db->query("select  date,value from indxx_values where indxx='".$indxxID."' order by date asc");
		$result = $query->result_array();
		$last_updated_date = $result[count($result)-1]['date'];
        $last_updated_value = $result[count($result)-1]['value'];
        
		if($result)
		{
			$i=0;
			$str='';
			foreach ($result as $key=>$row)
			{
				$dates=explode("-", date("Y-m-d",strtotime($row['date'])));
				//echo ".$dates[0].", ".($dates[1]).", ".$dates[2]."; die;
				$str.="{date : new Date(".$dates[0].", ".($dates[1]-1).", ".($dates[2])."),value : ".number_format($row['value'],2,'.','')."},\n";
				//$str.="{date : new Date(".$dates[0].", ".($dates[1]-1).", ".($dates[2])."),value : ".number_format($row['value'],2,'.','')."},\n";
			}
		}
		//print_r($dates[0]); die;
		$str.="]";
		$str=str_replace("},\n]","}",$str);
		//echo $str;
		
		$basequery = $this->db->query("SELECT DATE_FORMAT(date,'%Y-%m-%d') AS date ,value FROM indxx_values where indxx='".$indxxID."' order by date asc limit 0,1");
		$basedate = $basequery->result_array();

	    $basedateindxx=$basedate[0]['date'];
		
		if(strtolower(date("l", strtotime($basedateindxx))) == "saturday"){
			$basedateindxx = date("Y-m-d",strtotime($basedateindxx)-(86400));
		}
	    /*
	    if($indxxID==458){
    		$basevalue = $this->db->query("select DATE_FORMAT(date,'%Y-%m-%d') AS date,value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    		$bdata=$basevalue->result_array();
    		$basevaluebench=$bdata[0]['value'];
    
    		$query2 = $this->db->query("select  DATE_FORMAT(date,'%Y-%m-%d') AS date, value/".$basevaluebench."*1000 as value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    		$res2=$query2->result_array();
    
    
    		$benchmark = $this->db->query("SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = '".$benchmark_id."'");
    		$bench_result = $benchmark->result_array();
    
    		$benchmark_title= $bench_result[0]['name'];
    		$benchmark_return_type = $bench_result[0]['return_type'];
		}
		else{ 
		    
    		if($return_type == 'PR'){
    			
    			$basevalue = $this->db->query("select DATE_FORMAT(date,'%Y-%m-%d') AS date,value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    			$bdata=$basevalue->result_array();
    			$basevaluebench=$bdata[0]['value'];
    		
    			$query2 = $this->db->query("select  DATE_FORMAT(date,'%Y-%m-%d') AS date, value/".$basevaluebench."*1000 as value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    			$res2=$query2->result_array();
    			
    			$benchmark = $this->db->query("SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = '".$benchmark_id."'");
        		$bench_result = $benchmark->result_array();
        
        		$benchmark_title= $bench_result[0]['name'];
        		$benchmark_return_type = $bench_result[0]['return_type'];
    			
    		} 
    
    
    		else if($return_type == 'NTR'){
    			$basevalue = $this->db->query("select DATE_FORMAT(date,'%Y-%m-%d') AS date,value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    			$bdata=$basevalue->result_array();
    			 $basevaluebench=$bdata[0]['value'];
    		
    			$query2 = $this->db->query("select  DATE_FORMAT(date,'%Y-%m-%d') AS date, value/".$basevaluebench."*1000 as value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    			$res2=$query2->result_array();
    			
    			$benchmark = $this->db->query("SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = '".$benchmark_id."'");
        		$bench_result = $benchmark->result_array();
        
        		$benchmark_title= $bench_result[0]['name'];
        		$benchmark_return_type = $bench_result[0]['return_type'];
    		}
    		else
    			{
    			$basevalue = $this->db->query("select DATE_FORMAT(date,'%Y-%m-%d') AS date,value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    			$bdata=$basevalue->result_array();
    			$basevaluebench=$bdata[0]['value'];
    		
    			$query2 = $this->db->query("select  DATE_FORMAT(date,'%Y-%m-%d') AS date, value/".$basevaluebench."*1000 as value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    			$res2=$query2->result_array();
    			
    			$benchmark = $this->db->query("SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = '".$benchmark_id."'");
        		$bench_result = $benchmark->result_array();
        
        		$benchmark_title= $bench_result[0]['name'];
        		$benchmark_return_type = $bench_result[0]['return_type'];
    		}
			
		*/
		if($benchmark_id!=0){ 
		    	$basevalue = $this->db->query("select DATE_FORMAT(date,'%Y-%m-%d') AS date,value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    			$bdata=$basevalue->result_array();
    			$basevaluebench=$bdata[0]['value'];
    		
    			$query2 = $this->db->query("select  DATE_FORMAT(date,'%Y-%m-%d') AS date, value/".$basevaluebench."*1000 as value from indxx_values where indxx='".$benchmark_id."' and date>='".$basedateindxx."' order by date asc");
    			$res2=$query2->result_array();
    			
    			$benchmark = $this->db->query("SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = '".$benchmark_id."'");
        		$bench_result = $benchmark->result_array();
        
        		$benchmark_title= $bench_result[0]['name'];
        		$benchmark_code= $bench_result[0]['code'];
        		$benchmark_return_type = $bench_result[0]['return_type'];
		}
		else{ 
		    	$basevalue = $this->db->query("select DATE_FORMAT(date,'%Y-%m-%d') AS date,value from indxx_values where indxx='".$indxxID."' and date>='".$basedateindxx."' order by date asc");
    			$bdata=$basevalue->result_array();
    			$basevaluebench=$bdata[0]['value'];
    		
    			//$query2 = $this->db->query("select  DATE_FORMAT(date,'%Y-%m-%d') AS date,  value from indxx_values where indxx='".$indxxID."' and date>='".$basedateindxx."' order by date asc");
    			//$res2=$query2->result_array();
    			
    			$benchmark = $this->db->query("SELECT a.*,b.return_type FROM indxx a, index_description b WHERE a.id = b.indxx_id AND a.id = '".$indxxID."'");
        		$bench_result = $benchmark->result_array();
        
        		$benchmark_title= '';
        		$benchmark_return_type = $bench_result[0]['return_type'];
		}
	
		
		//}
		//print_r($res2); die;
		if($res2)
		{
			$i=0;
			$str2='';
			foreach($res2 as $row2)
			{
				//print_r($row['value']);
				$dates2=explode("-", date("Y-m-d",strtotime($row2['date'])));
				//echo ".$dates2[0].", ".($dates2[1]-1).", ".$dates2[2].";
				$str2.="{date : new Date(".$dates2[0].", ".($dates2[1]-1).", ".$dates2[2]."),value : ".number_format($row2['value'],2,'.','')."},\n";	
			}
		
		$str2.="]";
		$str2=str_replace("},\n]","}",$str2);
		}else { 
		    $str2=""; 
		    
		}
		$results = array();
		$results['title'] = $title;
		if($benchmark_title!=''){
		    $results['benchmark_title'] = $benchmark_title." (".$benchmark_code.")";
		}
		$results['indxxID'] = $indxxID;
		$results['code'] = $code;
		$results['str'] = $str;
		$results['str2'] = $str2;
		$results['date_value'] = $last_updated_date.'-'.$last_updated_value;
		
		return $results;
		if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
            $this->load->view('sampleChart-indices_lang',$results);
        }
        else{
            $this->load->view('sampleChart-indices',$results);
        }
	//	$this->load->view('sampleChart-indices',$results);
		
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
			$title=str_replace("GR","",$title);
		}
        /*
		if($indxxID!=23 && $indxxID!=370){
			$ticker=str_replace("TR","T",$ticker); 
		}
		*/
		$title=$title." (".$ticker.")";
		$query = $this->db->query("select  date,value from indxx_values where indxx='".$indxxID."' order by date asc");
        $result = $query->result_array();
        $last_updated_date = $result[count($result)-1]['date'];
        $last_updated_value = $result[count($result)-1]['value'];
        
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
		
		$results = array();
        $results['title'] = $title;
        $results['indxxID'] = $indxxID;
        $results['code'] = $code;
        $results['str'] = $str;
        $results['str2'] = $str2;
        $results['date_value'] = $last_updated_date.'-'.$last_updated_value;
        
        return $results;
        
        if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
            $this->load->view('sampleChart-indices_lang',$results);
        }
        else{
            $this->load->view('sampleChart-indices',$results);
        }
		
	}//End of function
	
	
	//Function to show New indices with Pre calculations and 2 graphs
	public function new_indices($indxxID=FALSE)
	{
	    $this->session->set_userdata('site_lang',  "english");
		$data['indxx_id']=$indxxID;
	
		$indxx_details = $this->indice->getIndexDescription($indxxID);
	    
		$indxx_meta = $this->indice->getIndexMeta($indxxID);
        $results['indxx_meta'] = $indxx_meta;
		$getType = $this->indice->getrowWhere(array('id'=>$indxxID),'weighttype','indxx');
		$results['gettabname'] = $this->indice->getrowWhere(array('id'=>$indxxID),'tabname','indxx');
		$getFactSheet = $this->indice->getrowWhere(array('indxx_id'=>$indxxID),'fact_sheet','tbl_index_other_information');
		
        $getCount = $this->indice->countCons($indxxID);
		$indxxDet = $this->indice->namete($indxxID);       
        $index_name =  $indxxDet->indxx_name;       
        $ritern_type =  $indxxDet->return_type;      
        
        $tName= str_replace($ritern_type,"",$index_name);

        $indxxDe = $this->indice->nameWithId(trim($tName),$ritern_type);
        
        $results['indxxCADGTR'] = $this->indice->GetCADGTR($index_name);
        $results['indxxCADNTR'] = $this->indice->GetCADNTR($index_name);
        $results['indxxPR'] = $this->indice->GetPR($index_name);
       
        $results['indxxTR'] = $this->indice->GetTR($index_name);
        $results['indxxNTR'] = $this->indice->GetNTR($index_name);
        $base= $this->indice->getBaseDate($indxxID); 
      
  //       if($indxx_details[0]->methodology=='')
		// {
		// 	$indxx_details[0]->methodology = "Indxx_500_Index_Methodology_2016.pdf";
		// }
		
		// if($indxx_details[0]->benchmark=='')
		// {
		// 	$indxx_details[0]->benchmark = "Indxx 500 TR Index (INXT)";
		// }
		
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
        
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
          //print_r($get_IndexRiskReturnsArray); die;
		
		//Preparing IndexRiskReturnsArray
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		
        //print_r($IndexRiskReturnsArray); die;
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $get_indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['dynamicRisk'] = $dynamicRisk;
		
		////////////Get Charting Details - chart.php/////////

    	$data = $this->indices_samplechart($indxxID);


			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['date_value'] = $data['date_value'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
		    $results['benchmark_title'] = $data['benchmark_title'];
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
            $results['baseDate']=$base;
			//print_r($results); die;
			
			$indxx_info = $this->indice->getIndxxInfo($indxxID);
            $results['indxx_info']=$indxx_info;

			if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
                $this->load->view('sampleChart-indices_lang',$results);
            }
            else{
                $this->load->view('sampleChart-indices',$results);
            }
		////////////End of Charting Details	//////////////////////

		
		
		//$this->load->view('new-indices',$results);	
	}//End of function
	
	
	public function new_indices_bench($slug=FALSE)
	{
	    //echo $indxxID; die;
	    $this->session->set_userdata('site_lang',  "english");
	    $indxxID = $this->indice->getIdBySlug($slug);
        $data['indxx_id']=$indxxID;
		$indxx_details = $this->indice->getIndexDescription($indxxID);
	    
		$indxx_meta = $this->indice->getIndexMeta($indxxID);
        $results['indxx_meta'] = $indxx_meta;
		$getType = $this->indice->getrowWhere(array('id'=>$indxxID),'weighttype','indxx');
		$results['gettabname'] = $this->indice->getrowWhere(array('id'=>$indxxID),'tabname','indxx');
		$getFactSheet = $this->indice->getrowWhere(array('indxx_id'=>$indxxID),'fact_sheet','tbl_index_other_information');
		
        $getCount = $this->indice->countCons($indxxID);
		$indxxDet = $this->indice->namete($indxxID);       
        $index_name =  $indxxDet->indxx_name;       
        $ritern_type =  $indxxDet->return_type;      
        
        $tName= str_replace($ritern_type,"",$index_name);

        $indxxDe = $this->indice->nameWithId(trim($tName),$ritern_type);
        
        $results['indxxCADGTR'] = $this->indice->GetCADGTR($index_name);
        $results['indxxCADNTR'] = $this->indice->GetCADNTR($index_name);
        $results['indxxPR'] = $this->indice->GetPR($index_name);
       
        $results['indxxTR'] = $this->indice->GetTR($index_name);
        $results['indxxNTR'] = $this->indice->GetNTR($index_name);
        $base= $this->indice->getBaseDate($indxxID); 
      
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
        
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
		
		$get_IndexRiskReturnsArray = $this->indice->get_newIndexRiskReturns($indxxID);
        //print_r($get_IndexRiskReturnsArray); die;
		
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		
      
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $get_indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['dynamicRisk'] = $dynamicRisk;
		
		////////////Get Charting Details - chart.php/////////

    	$data = $this->indices_samplechart($indxxID);
        //print_r($data); die;

			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['date_value'] = $data['date_value'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
			$results['benchmark_title'] = $data['benchmark_title'];
			
			//print_r($indxx_details[0]->benchmark); 
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			//print_r($results['banchMark']); die;
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
            $results['baseDate']=$base;
			
			
			$indxx_info = $this->indice->getIndxxInfo($indxxID);
            $results['indxx_info']=$indxx_info;
		
			if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
                $this->load->view('sampleChart-indices_lang',$results);
            }
            else{
                $this->load->view('sampleChart-indices_bench',$results);
            }
		////////////End of Charting Details	//////////////////////

		//$this->load->view('new-indices',$results);	
	}//End of function


	public function new_indices_esg($slug=FALSE)
	{
	    //echo $indxxID; die;
	    $this->session->set_userdata('site_lang',  "english");
	    $indxxID = $this->indice->getIdBySlug($slug);
        $data['indxx_id']=$indxxID;
		$indxx_details = $this->indice->getIndexDescription($indxxID);
	    
		$indxx_meta = $this->indice->getIndexMeta($indxxID);
        $results['indxx_meta'] = $indxx_meta;
		$getType = $this->indice->getrowWhere(array('id'=>$indxxID),'weighttype','indxx');
		$results['gettabname'] = $this->indice->getrowWhere(array('id'=>$indxxID),'tabname','indxx');
		$getFactSheet = $this->indice->getrowWhere(array('indxx_id'=>$indxxID),'fact_sheet','tbl_index_other_information');
		
        $getCount = $this->indice->countCons($indxxID);
		$indxxDet = $this->indice->namete($indxxID);       
        $index_name =  $indxxDet->indxx_name;       
        $ritern_type =  $indxxDet->return_type;      
        
        $tName= str_replace($ritern_type,"",$index_name);

        $indxxDe = $this->indice->nameWithId(trim($tName),$ritern_type);
        
        $results['indxxCADGTR'] = $this->indice->GetCADGTR($index_name);
        $results['indxxCADNTR'] = $this->indice->GetCADNTR($index_name);
        $results['indxxPR'] = $this->indice->GetPR($index_name);
       
        $results['indxxTR'] = $this->indice->GetTR($index_name);
        $results['indxxNTR'] = $this->indice->GetNTR($index_name);
        $base= $this->indice->getBaseDate($indxxID); 
      
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
        
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
		
		$get_IndexRiskReturnsArray = $this->indice->get_newIndexRiskReturns($indxxID);
        //print_r($get_IndexRiskReturnsArray); die;
		
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		
      
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $get_indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['dynamicRisk'] = $dynamicRisk;
		
		////////////Get Charting Details - chart.php/////////

    	$data = $this->indices_samplechart($indxxID);


			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['date_value'] = $data['date_value'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
			$results['benchmark_title'] = $data['benchmark_title'];
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
            $results['baseDate']=$base;
			//print_r($results); die;
			
			$indxx_info = $this->indice->getIndxxInfo($indxxID);
            $results['indxx_info']=$indxx_info;

			if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
                $this->load->view('sampleChart-indices_lang',$results);
            }
            else{
                $this->load->view('sampleChart-indices_esg',$results);
            }
		////////////End of Charting Details	//////////////////////

		//$this->load->view('new-indices',$results);	
	}//End of function	
	
	
	public function new_indices_income($slug=FALSE)
	{
	    //echo $indxxID; die;
	    $this->session->set_userdata('site_lang',  "english");
	    $indxxID = $this->indice->getIdBySlug($slug);
        $data['indxx_id']=$indxxID;
		$indxx_details = $this->indice->getIndexDescription($indxxID);
	    
		$indxx_meta = $this->indice->getIndexMeta($indxxID);
        $results['indxx_meta'] = $indxx_meta;
		$getType = $this->indice->getrowWhere(array('id'=>$indxxID),'weighttype','indxx');
		$results['gettabname'] = $this->indice->getrowWhere(array('id'=>$indxxID),'tabname','indxx');
		$getFactSheet = $this->indice->getrowWhere(array('indxx_id'=>$indxxID),'fact_sheet','tbl_index_other_information');
		
        $getCount = $this->indice->countCons($indxxID);
		$indxxDet = $this->indice->namete($indxxID);       
        $index_name =  $indxxDet->indxx_name;       
        $ritern_type =  $indxxDet->return_type;      
        
        $tName= str_replace($ritern_type,"",$index_name);

        $indxxDe = $this->indice->nameWithId(trim($tName),$ritern_type);
        
        $results['indxxCADGTR'] = $this->indice->GetCADGTR($index_name);
        $results['indxxCADNTR'] = $this->indice->GetCADNTR($index_name);
        $results['indxxPR'] = $this->indice->GetPR($index_name);
       
        $results['indxxTR'] = $this->indice->GetTR($index_name);
        $results['indxxNTR'] = $this->indice->GetNTR($index_name);
        $base= $this->indice->getBaseDate($indxxID); 
      
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
        
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
		
		$get_IndexRiskReturnsArray = $this->indice->get_newIndexRiskReturns($indxxID);
        //print_r($get_IndexRiskReturnsArray); die;
		
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		
      
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $get_indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['dynamicRisk'] = $dynamicRisk;
		
		////////////Get Charting Details - chart.php/////////

    	$data = $this->indices_samplechart($indxxID);


			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['date_value'] = $data['date_value'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
			$results['benchmark_title'] = $data['benchmark_title'];
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
            $results['baseDate']=$base;
			//print_r($results); die;
			
			$indxx_info = $this->indice->getIndxxInfo($indxxID);
            $results['indxx_info']=$indxx_info;

			
			if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
                $this->load->view('sampleChart-indices_lang',$results);
            }
            else{
                $this->load->view('sampleChart-indices_income',$results);
            }
		////////////End of Charting Details	//////////////////////

		//$this->load->view('new-indices',$results);	
	}//End of function
	
	
	public function new_indices_strategy($slug=FALSE)
	{
	    //echo $indxxID; die;
	    $this->session->set_userdata('site_lang',  "english");
	    $indxxID = $this->indice->getIdBySlug($slug);
        $data['indxx_id']=$indxxID;
		$indxx_details = $this->indice->getIndexDescription($indxxID);
	    
		$indxx_meta = $this->indice->getIndexMeta($indxxID);
        $results['indxx_meta'] = $indxx_meta;
		$getType = $this->indice->getrowWhere(array('id'=>$indxxID),'weighttype','indxx');
		$results['gettabname'] = $this->indice->getrowWhere(array('id'=>$indxxID),'tabname','indxx');
		$getFactSheet = $this->indice->getrowWhere(array('indxx_id'=>$indxxID),'fact_sheet','tbl_index_other_information');
		
        $getCount = $this->indice->countCons($indxxID);
		$indxxDet = $this->indice->namete($indxxID);       
        $index_name =  $indxxDet->indxx_name;       
        $ritern_type =  $indxxDet->return_type;      
        
        $tName= str_replace($ritern_type,"",$index_name);

        $indxxDe = $this->indice->nameWithId(trim($tName),$ritern_type);
        
        $results['indxxCADGTR'] = $this->indice->GetCADGTR($index_name);
        $results['indxxCADNTR'] = $this->indice->GetCADNTR($index_name);
        $results['indxxPR'] = $this->indice->GetPR($index_name);
       
        $results['indxxTR'] = $this->indice->GetTR($index_name);
        $results['indxxNTR'] = $this->indice->GetNTR($index_name);
        $base= $this->indice->getBaseDate($indxxID); 
      
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
        
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
		
		$get_IndexRiskReturnsArray = $this->indice->get_newIndexRiskReturns($indxxID);
        //print_r($get_IndexRiskReturnsArray); die;
		
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		
      
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $get_indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['dynamicRisk'] = $dynamicRisk;
		
		////////////Get Charting Details - chart.php/////////

    	$data = $this->indices_samplechart($indxxID);


			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['date_value'] = $data['date_value'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
			$results['benchmark_title'] = $data['benchmark_title'];
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
            $results['baseDate']=$base;
			//print_r($results); die;
			
			$indxx_info = $this->indice->getIndxxInfo($indxxID);
            $results['indxx_info']=$indxx_info;

			
			if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
                $this->load->view('sampleChart-indices_lang',$results);
            }
            else{
                $this->load->view('sampleChart-indices_strategy',$results);
            }
		////////////End of Charting Details	//////////////////////

		//$this->load->view('new-indices',$results);	
	}//End of function
	
	public function new_indices_thematic($slug=FALSE)
	{
	    
	    $this->session->set_userdata('site_lang',  "english");
	    $indxxID = $this->indice->getIdBySlug($slug);
        $data['indxx_id']=$indxxID;
		$indxx_details = $this->indice->getIndexDescription($indxxID);
	    //echo $indxxID; die;
		$indxx_meta = $this->indice->getIndexMeta($indxxID);
        $results['indxx_meta'] = $indxx_meta;
		$getType = $this->indice->getrowWhere(array('id'=>$indxxID),'weighttype','indxx');
		$results['gettabname'] = $this->indice->getrowWhere(array('id'=>$indxxID),'tabname','indxx');
		$getFactSheet = $this->indice->getrowWhere(array('indxx_id'=>$indxxID),'fact_sheet','tbl_index_other_information');
		
        $getCount = $this->indice->countCons($indxxID);
		$indxxDet = $this->indice->namete($indxxID);       
        $index_name =  $indxxDet->indxx_name;       
        $ritern_type =  $indxxDet->return_type;      
        
        $tName= str_replace($ritern_type,"",$index_name);

        $indxxDe = $this->indice->nameWithId(trim($tName),$ritern_type);
        
        $results['indxxCADGTR'] = $this->indice->GetCADGTR($index_name);
        $results['indxxCADNTR'] = $this->indice->GetCADNTR($index_name);
        $results['indxxPR'] = $this->indice->GetPR($index_name);
       
        $results['indxxTR'] = $this->indice->GetTR($index_name);
        $results['indxxNTR'] = $this->indice->GetNTR($index_name);
        $base= $this->indice->getBaseDate($indxxID); 
      
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
        
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
		
		$get_IndexRiskReturnsArray = $this->indice->get_newIndexRiskReturns($indxxID);
        //print_r($get_IndexRiskReturnsArray); die;
		
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		
      
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $get_indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['dynamicRisk'] = $dynamicRisk;
		//print_r($IndexRiskReturnsArray); die;
		////////////Get Charting Details - chart.php/////////

    	$data = $this->indices_samplechart($indxxID);

			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['date_value'] = $data['date_value'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
			$results['benchmark_title'] = $data['benchmark_title'];
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
            $results['baseDate']=$base;
			//print_r($results); die;
			
			$indxx_info = $this->indice->getIndxxInfo($indxxID);
            $results['indxx_info']=$indxx_info;

			//print_r($results); die;
			if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
                $this->load->view('sampleChart-indices_lang',$results);
            }
            else{
                $this->load->view('sampleChart-indices_thematic',$results);
            }
		////////////End of Charting Details	//////////////////////

		//$this->load->view('new-indices',$results);	
	}//End of function
	
	
	public function new_indices_digital($slug=FALSE)
	{
	    //echo $indxxID; die;
	    $this->session->set_userdata('site_lang',  "english");
	    $indxxID = $this->indice->getIdBySlug($slug);
        $data['indxx_id']=$indxxID;
		$indxx_details = $this->indice->getIndexDescription($indxxID);
	    
		$indxx_meta = $this->indice->getIndexMeta($indxxID);
        $results['indxx_meta'] = $indxx_meta;
		$getType = $this->indice->getrowWhere(array('id'=>$indxxID),'weighttype','indxx');
		$results['gettabname'] = $this->indice->getrowWhere(array('id'=>$indxxID),'tabname','indxx');
		$getFactSheet = $this->indice->getrowWhere(array('indxx_id'=>$indxxID),'fact_sheet','tbl_index_other_information');
		
        $getCount = $this->indice->countCons($indxxID);
		$indxxDet = $this->indice->namete($indxxID);       
        $index_name =  $indxxDet->indxx_name;       
        $ritern_type =  $indxxDet->return_type;      
        
        $tName= str_replace($ritern_type,"",$index_name);

        $indxxDe = $this->indice->nameWithId(trim($tName),$ritern_type);
        
        $results['indxxCADGTR'] = $this->indice->GetCADGTR($index_name);
        $results['indxxCADNTR'] = $this->indice->GetCADNTR($index_name);
        $results['indxxPR'] = $this->indice->GetPR($index_name);
       
        $results['indxxTR'] = $this->indice->GetTR($index_name);
        $results['indxxNTR'] = $this->indice->GetNTR($index_name);
        $base= $this->indice->getBaseDate($indxxID); 
      
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
        
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
		
		$get_IndexRiskReturnsArray = $this->indice->get_newIndexRiskReturns($indxxID);
        //print_r($get_IndexRiskReturnsArray); die;
		
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		
      
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $get_indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['dynamicRisk'] = $dynamicRisk;
		
		////////////Get Charting Details - chart.php/////////

    	$data = $this->indices_samplechart($indxxID);


			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['date_value'] = $data['date_value'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
			$results['benchmark_title'] = $data['benchmark_title'];
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
            $results['baseDate']=$base;
			//print_r($results); die;
			
			$indxx_info = $this->indice->getIndxxInfo($indxxID);
            $results['indxx_info']=$indxx_info;

			
			if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
                $this->load->view('sampleChart-indices_lang',$results);
            }
            else{
                $this->load->view('sampleChart-indices_digital',$results);
            }
		////////////End of Charting Details	//////////////////////

		//$this->load->view('new-indices',$results);	
	}//End of function
	
	
	public function new_indices_other($slug=FALSE)
	{
	    //echo $indxxID; die;
	    $this->session->set_userdata('site_lang',  "english");
	    $indxxID = $this->indice->getIdBySlug($slug);
        $data['indxx_id']=$indxxID;
		$indxx_details = $this->indice->getIndexDescription($indxxID);
	    
		$indxx_meta = $this->indice->getIndexMeta($indxxID);
        $results['indxx_meta'] = $indxx_meta;
		$getType = $this->indice->getrowWhere(array('id'=>$indxxID),'weighttype','indxx');
		$results['gettabname'] = $this->indice->getrowWhere(array('id'=>$indxxID),'tabname','indxx');
		$getFactSheet = $this->indice->getrowWhere(array('indxx_id'=>$indxxID),'fact_sheet','tbl_index_other_information');
		
        $getCount = $this->indice->countCons($indxxID);
		$indxxDet = $this->indice->namete($indxxID);       
        $index_name =  $indxxDet->indxx_name;       
        $ritern_type =  $indxxDet->return_type;      
        
        $tName= str_replace($ritern_type,"",$index_name);

        $indxxDe = $this->indice->nameWithId(trim($tName),$ritern_type);
        
        $results['indxxCADGTR'] = $this->indice->GetCADGTR($index_name);
        $results['indxxCADNTR'] = $this->indice->GetCADNTR($index_name);
        $results['indxxPR'] = $this->indice->GetPR($index_name);
       
        $results['indxxTR'] = $this->indice->GetTR($index_name);
        $results['indxxNTR'] = $this->indice->GetNTR($index_name);
        $base= $this->indice->getBaseDate($indxxID); 
      
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
        
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
		
		$get_IndexRiskReturnsArray = $this->indice->get_newIndexRiskReturns($indxxID);
        //print_r($get_IndexRiskReturnsArray); die;
		
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		
      
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $get_indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['dynamicRisk'] = $dynamicRisk;
		
		////////////Get Charting Details - chart.php/////////

    	$data = $this->indices_samplechart($indxxID);
       

			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['date_value'] = $data['date_value'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
			$results['benchmark_title'] = $data['benchmark_title'];
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
            $results['baseDate']=$base;
			//print_r($results); die;
			
			$indxx_info = $this->indice->getIndxxInfo($indxxID);
            $results['indxx_info']=$indxx_info;

			
			if($indxxID==318 || $indxxID==319 ||$indxxID==320 || $indxxID==356 ||  $indxxID==357 ||  $indxxID==358 || $indxxID==17 || $indxxID==18 || $indxxID==240 || $indxxID==760 || $indxxID==241 || $indxxID==759 || $indxxID==243){
                $this->load->view('sampleChart-indices_lang',$results);
            }
            else{
                $this->load->view('sampleChart-indices_other',$results);
            }
		////////////End of Charting Details	//////////////////////

		//$this->load->view('new-indices',$results);	
	}//End of function
	
	
	public function new_indic($indxxID=FALSE)
	{ 
		$indxx_details = $this->indice->getIndexDescription($indxxID);
		$getType = $this->indice->getrowWhere(array('id'=>$indxxID),'weighttype','indxx');
		$getFactSheet = $this->indice->getrowWhere(array('indxx_id'=>$indxxID),'fact_sheet','tbl_index_other_information');
		
        $getCount = $this->indice->countCons($indxxID);
		$indxxDet = $this->indice->namete($indxxID);       
        $index_name =  $indxxDet->indxx_name;       
        $ritern_type =  $indxxDet->return_type;      

        $tName= str_replace($ritern_type,"",$index_name);

        $indxxDe = $this->indice->nameWithId(trim($tName),$ritern_type);
   
        $results['indxxPR'] = $this->indice->GetPR($index_name);
        
        $results['indxxTR'] = $this->indice->GetTR($index_name);
        $results['indxxNTR'] = $this->indice->GetNTR($index_name);
        $base= $this->indice->getBaseDate($indxxID);  
      
        if($indxx_details[0]->methodology=='')
		{
			$indxx_details[0]->methodology = "Indxx_500_Index_Methodology_2016.pdf";
		}
		
		if($indxx_details[0]->benchmark=='')
		{
			$indxx_details[0]->benchmark = "Indxx 500 TR Index (INXT)";
		}
		
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);
		
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
        
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
          // print_r($get_IndexRiskReturnsArray); die;
		
		//Preparing IndexRiskReturnsArray
		foreach($get_IndexRiskReturnsArray as $key => $value)
		{
			//echo $key."^".$value."<br>";
			$IndexRiskReturnsArray[$value['statistic']] = array('qtd'=>$value['qtd'], 'ytd'=>$value['ytd'], '1year'=>$value['1year'], '3year'=>$value['3year'], 'SinceInception'=>$value['sbd']);
		}
		

		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $get_indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['dynamicRisk'] = $dynamicRisk;
		
		////////////Get Charting Details - chart.php/////////
		
		$results['hidemethodlogy'] = 'show';

		if($indxxID==221 || $indxxID==220|| $indxxID==236 || $indxxID==237)
		{
			$data = $this->indices_singleChart($indxxID);
			//echo "<pre>"; print_r($data); die;
			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['title'] = $data['title'];
			$results['date_value'] = $data['date_value'];
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
			
			//$this->load->view('indices',$results);
			$this->load->view('sampleChart-indices',$results);
			
		} else {
			$data = $this->indices_samplechart($indxxID);
			//echo "<pre>"; print_r($data); die;

			$results['str'] = $data['str'];
			$results['code'] = $data['code'];
			$results['str2'] = $data['str2'];
			$results['title'] = $data['title'];
			$results['date_value'] = $data['date_value'];
			if($indxx_details[0]->benchmark!=''){
			    $results['banchMark'] = $indxx_details[0]->benchmark;
			}
			else{
			    $results['banchMark'] ='';
			}
			$results['type']=$getType;
			$results['sheet']=$getFactSheet;
			$results['total']=$getCount;
			$results['trPr']=$indxxDe;
			$results['cehckId']=$indxxID;
            $results['baseDate']=$base;

			$this->load->view('sampleChart-indices',$results);
		}
		////////////End of Charting Details	//////////////////////

		
		
		//$this->load->view('new-indices',$results);	
	}//End of function
	function downloadValue()
	{
		$indxxID=$this->uri->segment(3);
		$code = $this->indice->getCode('indxx',array('id'=>$indxxID));

     $this->load->dbutil();
$this->load->helper('file');
$this->load->helper('download');
 $q         = $this->indice->resultdown('indxx_values',array('indxx'=>$indxxID));
//$q         =  $this->db->get_where('indxx_values',array('indxx'=>383));

$delimiter = ",";
$nuline    = "\r\n";

force_download(date("Y-m-d") . "_".$code->code.'.csv', 
               $this->dbutil->csv_from_result($q, $delimiter, $nuline));


	}
	
	//Function generate PDF file for Factsheet
	function generate_factSheet()
	{   
	    $indxxID = $this->uri->segment(3);         
        $getDate = $this->indice->getIndexDate($indxxID);
		$this->load->library('Pdf');
		$pdf = $this->pdf->load();		
		//Get Data to load into pdf
		//Get Indxx details
		$indxx_details = $this->indice->getIndexDescription($indxxID);		
		//Get New IndexCharacteristics
		$indxx_char = $this->indice->get_newIndexCharacteristics($indxxID);		
		//print_r($indxx_char); die;
		//Get New indxx_top_5_constituents
		$getShow = $this->indice->show_newIndexTopConstituents('indxx_charecterstics',array('indxx_id'=>$indxxID));
		$show =$getShow ->no_of_top_constituents;
		$get_indxx_top_const = $this->indice->get_newIndexTopConstituents($indxxID,$show);	
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
		$date = date("Y-m-d");
		$filename = $indxx_details[0]->code;		
		if($filename=='')
		{
			$filename = "INX";
			
		}
		/*
		elseif($indxxID==284 ||$indxxID==370 || $indxxID==477 || $indxxID==457 || $indxxID==500 || $indxxID==501){
		     $filename=str_replace("TR","T",$filename);
		   
		}
		*/
	    $ChartFilename=	base_url().'assets/images/chartimages/'.$filename."_".$date.'.png';	
        if(!file_exists($ChartFilename))
		{       
            // redirect("Welcome/new_indices/$indxxID", 'refresh');
			$newDate=date("Y-m-d",strtotime($date)-86400);	
// 			if(date("D",strtotime($date))=="Mon")
// 			{
// 			 	$date=date("Y-m-d",strtotime($date)-(3*86400));	
// 			}
			
			$ChartFilename =base_url().'assets/images/chartimages/'.$filename.'_'.$date.'.png';
        }
        $base= $this->indice->getBaseDate($indxxID); 
		//Prepare Array
		$results['indxxID'] = $indxxID;
		$results['indxx_details'] = $indxx_details;
		$results['IndexCharacteristicsArray'] = $indxx_char;
		$results['IndexTopFiveConstituentsArray'] = $indxx_top_const;
		$results['IndexRiskReturnsArray'] = $IndexRiskReturnsArray;
		$results['ChartFilename'] = $ChartFilename;
		$results['date'] = $getDate->date;
		$results['baseDate']=$base;
		//End of code		
		$pdfFilePath = $filename.'_'.$date.".pdf";
		
		//Render PDF Template

		
		
		
		$html = $this->load->view('generate-factSheet', $results, true); // render the view into HTML
		//$pdf->SetHeader(''.$date);		
		$pdf->SetFooter('|{PAGENO}|'); // Add a footer for good measure ;)
		//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
		$pdf->WriteHTML($html); // write the HTML into the PDF
		$pdf->Output($pdfFilePath, 'D');	// save to file because we can	
		
	}
	  //end of function
	
	
	//Function to download excel sheet for indices
	function download_csv($indxxID=FALSE)
	{
		
		$indxx = $this->indice->gettabledata('indxx','code', 'id', $indxxID);
		
		if(!empty($indxx) && $indxx[0]['code']!="")
		{
			$csv = substr($csv, 0, -1)."\n";
			
			$whr = " order by date asc";
			$r = $this->indice->gettabledata("indxx_values", "DATE_FORMAT(date, '%Y-%m-%d') as ndate,value", "indxx", $indxxID, $whr);
			foreach ($r as $row)
			{
				$csv .= join(',', $row)."\n";
			}
		
			header("Content-type: application/vnd.ms-excel");
			header("Content-disposition: csv; filename=" . date("Y-m-d") . "_".$indxx[0]['code'].".csv; size=".strlen($csv));
			echo $csv;
		}

	}//emd of function

 public function exportCSV(){ 
   // file name 
   $indexid = '377';
   $usersData = $this->indice->resultWhere('indxx_top_5_constituents',array('indxx_id'=>$indexid));
   //print_r($usersData);
   //die();

  }

  	public function export_csv()
	{
		}

	
function calculateRR()
{    
    $factsheet_id = $this->input->post("indexId");;	
	$row = $this->indice->ban($factsheet_id);
	$benchmarkID = $row->benchmark_id;
   // second
	$second = $this->indice->second($factsheet_id);
	$secondDate = $second->date;
	$firstindexvaluedate=date("Y-m-d",strtotime($secondDate));
	//third
	$thirdData = $this->indice->third($factsheet_id);
	$indexvaluedate = $thirdData;

	$dates=array();
	if(!empty($indexvaluedate)){		
			foreach($indexvaluedate as $dateValues){		
			$changeDate =  $dateValues->date;
			$dates[]=date("Y-m-d",strtotime($changeDate));	
				
			}
		
	}
    	
    $four = $this->indice->four($benchmarkID,$factsheet_id,$firstindexvaluedate);
    $benchmarkValuesArray = $four;
    //print_r($benchmarkValuesArray);

    $five = $this->indice->five($benchmarkID,$firstindexvaluedate);
    $basebenchmarkvalue = $five->value;

    $benchmarkIVArray=array();


	foreach($benchmarkValuesArray as $benchmarkValuee){
	 
		$benchmarkValue = 1000*($benchmarkValuee->value/$basebenchmarkvalue);
		$benchmarkIVArray[$benchmarkValuee->date]=$benchmarkValue;
		//array_push($benchmarkIVArray[$benchmarkValuee->date], $benchmarkValue;)


	}

	//print_r($benchmarkIVArray);
	
    $basevalue=0;
	
	foreach($dates  as  $date)
	{		
		if(!in_array($date,array_keys($benchmarkIVArray))){
		//print_r($benchmarkIVArray);
		$benchmarkIVArray->$date=$basevalue;
		}
	
		$basevalue=$benchmarkIVArray->$date;
		//print_r($basevalue);


	}
		//print_r($benchmarkIVArray);
	ksort ($benchmarkIVArray);
	
	$data = $this->getriskandreturn($factsheet_id,$benchmarkIVArray);
	$total = count($data);
     $count = '0';
	foreach ($data as $key => $value) {
		 $count++;	 
		
		 //print("<pre>".print_r($value,true)."</pre>");

		$add = $this->indice->insertRow('indxx_risk_return_statistics',$value);
		 if ($count == $total) {
			
             echo "<script> alert('Risk and return has been added Successfully');
             window.location.href='<?php echo base_url()?>admin/calculate';
             </script>";

     		}
	}
	//return $data;





   
}

	
	
}//End of Class
