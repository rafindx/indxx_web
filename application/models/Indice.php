<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Indice extends CI_Model
{
	//Constructor Function
	function __construct()
	{
		parent::__construct();
		//LOAD THE EMAIL LIBRARY TO SEND EMAILS
		//$this->load->library('email'); 
		//$this->load->model(array('Commonmodel'));
	}
	
	//Function to get Table data
	function gettabledata($tablename,$fields,$fieldname=false,$fieldvalue=false,$wherecondition=false)
	{	
		
		if($fieldname!='' && $fieldvalue!='') {
			$getquery=$this->db->query("select $fields from ".$tablename." where ".$fieldname."='".$fieldvalue."' ".$wherecondition);			
		} else {
			$getquery=$this->db->query("select $fields from ".$tablename." ".$wherecondition);
		}
		//echo $this->db->last_query();
		return $getquery->result_array();
	}//End of function
	
	
	//Function for inserting row
	function insertRow($table, $data)
	{		
		$insert_row_res = $this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	//End of the function
        //FUNCTION TO GET Index Id
        
        function getIndexxNameByIndxxId($indxxid)
        {
           $query = $this->db->query("select indxx_name from index_description where indxx_id ='".$indxxid."'");
	   $data= $query->row();
                if(count($data)>0)
                {
                    return $data->indxx_name;
                }
                else
                {
                    return '';
                }
        }
	/*
	function getIndexxIdByIndxxName($val)
        {
           $query = $this->db->query("select id from indxx where name ='".$val."'");
	   $data= $query->row();
                if(count($data)>0)
                {
                    return $data->id;
                }
                else
                {
                    return '';
                }
        }
    */
    function getIndexxIdByIndxxName($val)
    {
        $query = $this->db->query("select id,tabname from indxx where name ='".$val."'");
        $data= $query->row();
        if(count($data)>0)
        {   
            $category = strtolower($data->tabname);
            if($category=='other indices'){
                $cat = explode(' ', $category);
                $category = $cat[0];
            }
            if($category=='digital asset'){
                $cat = explode(' ', $category);
                $category = $cat[0].'_'.$cat[1];
            }
            $query_desc = $this->db->query("select slug from index_description where indxx_id ='".$data->id."'");
            $data_desc= $query_desc->row();
            return $cat_slug = '/indices/'.$category.'/'.$data_desc->slug;
        }
        else
        {
            return '';
        }
    }
	//End of the function
	//FUNCTION TO GET IndexDescription
	function getIndexDescription($indxxID)
	{
		//Query to get all sites from sites_conf		
		$query = $this->db->query("Select * from index_description where indxx_id='".$indxxID."'  and indxx_id in (select  id from indxx where productlist !=2)");
		return $query->result();
		
	}//End of function
    
    function getIndexMeta($indxxID)
	{
		//Query to get all sites from sites_conf		
		$query = $this->db->query("select meta_title,meta_keywords,meta_description from indxx where id='".$indxxID."'");
		return $query->row();
		
	}//End of function
	
	function getIndxxInfo($indxxID)
	{
		//Query to get all sites from sites_conf		
		$query = $this->db->query("select * from indxx where id='".$indxxID."'");
		return $query->row();
		
	}//End 

	function countCons($indxxID)
	{
		$query = $this->db->query("SELECT COUNT('id') as total FROM `indxx_top_5_constituents` WHERE `indxx_id` = '".$indxxID."'");
		return $query->row();

	}
        function Profile($id)
	{
		$query = $this->db->query("SELECT * FROM `tbl_management` WHERE `id` = '".$id."'");
		return $query->row();

	}

	function getIndexDate ($indxxID)
	{
		$query = $this->db->query("SELECT * FROM `indxx_values` WHERE `indxx` = '".$indxxID."' ORDER BY `id` desc LIMIT 1");
		return $query->row();

	}
	function chechActiveorniot($indxx)
	{
	$query = $this->db->query("SELECT * FROM `indxx` WHERE `id` = '".$indxx."' and  productlist = '1' ");
	$data = $query->row();		
	if($data)
	{
		return 'active';

	}
	else
	{
		return 'deactive';
	}
	}
	
	//FUNCTION TO GET IndexCharacteristics
	function getIndexCharacteristics($indxxID)
	{
	
		$factsheet_id=  $indxxID;
		$qry1 = $this->db->query("select date from indxx_values where  indxx='$factsheet_id' order by date asc limit 0,1");
		$result = $qry1->result_array();
		
		foreach($result as $resultdata){
			$date[] = $resultdata;
		}

		$data['inceptionDate']=date("m/d/Y",strtotime($date[0]['date']));
		$data['52weeks']= $this->get52WeaksMinmax($factsheet_id);
		
		$qry2 = $this->db->query("select count(*) as totalconstituents from tbl_constituents where  indxx_id='$factsheet_id' ");
		$result2 = $qry2->result_array();
		
		foreach($result as $resultdata2){
			$TotalConstituents[] = $resultdata2;
		}

		if(empty($TotalConstituents[0]['totalconstituents']))
		{
			$data['noofconstituents'] = 0;
		}else{
			$data['noofconstituents']= $TotalConstituents[0]['totalconstituents'];
		}
		
		// $data['divyield']="5.86%";
		$date = $this->getMaxDate($factsheet_id);
		$data['date']=$date;

		return $data;
		
	}//End of function
	
	
	//FUNCTION TO GET get52WeaksMinmax
	function get52WeaksMinmax($factsheet_id)
	{
	
		$newDate= $this->getMaxDate($factsheet_id);
		$oldDate= $this->getOldDate($factsheet_id,$newDate,1);
		
		$get_qry = $this->db->query("select max(value) as maximumvalue from indxx_values where indxx='$factsheet_id' and date>='$oldDate' order by date asc");
		$result = $get_qry->result_array();
		
		foreach($result as $resdata){
			$data[] = $resdata;
		}

		$get_qry2 = $this->db->query("select min(value) as minvalue  from indxx_values where  indxx='$factsheet_id' and date>='$oldDate' order by date asc");
		$result2 = $get_qry2->result_array();
		
		foreach($result2 as $resdata2){
			$data2[] = $resdata2;
		}

		return array("min"=>number_format($data2[0]['minvalue'],0,'',''),"max"=>number_format($data[0]['maximumvalue'],0,'',''));

	}//End of function
	
	
	//FUNCTION TO GET MaxDate
	function getMaxDate($factsheet_id)
	{
		
		$qry = $this->db->query("select date from indxx_values where indxx='$factsheet_id'  order by date DESC limit 0,1");
		$result1 = $qry->result_array();
		
		foreach($result1 as $resdata1){
			$data[] = $resdata1;
		}
		
		return date("Y-m-d",strtotime($data[0]['date']));
	}//End of function
	
	function GetOtherindxxShowHideOption($indxx,$column)
        {  
             $result = $this->db->query("select * from tbl_company_assign where indxx_id='".$indxx."'" );
            $resdata = $result->row();
            if(count($resdata)>0)
            {
           $result = $this->db->query("select * from tbl_company where id='".$resdata->company_id."'" );
            $data = $result->row();
            if($data->$column=='1')
            {
                return 'show';    
            }
            else {
                return 'hide';
           
                }
           }



         else {
         		$gettabname = $this->indice->getrowWhere(array('id'=>$indxx),'tabname','indxx');
         		if($gettabname->tabname=='Digital Asset')
         		{
         			if($column=='show_rr' || $column=='show_top_constituents')	
         			{
         		return 'hide';		
         			}
         		}
         	
                return 'show';
        }
        }
        
        function getSlugByIndxxId($indxxId)
        {
        $query = $this->db->query("SELECT * FROM `index_description` WHERE `indxx_id` = '".$indxxId."'");
	        $data=$query->row();
	        return $data->slug;
        }
        function getIdBySlug($slug)
        {
        $query = $this->db->query("SELECT * FROM `index_description` WHERE `slug` = '".$slug."'");
	        $data=$query->row();
	        return $data->indxx_id;
        }
	//FUNCTION TO GET OldDate
        function otherindxxbycompanyID($company_id)
        {
           

		  $result = $this->db->query("select * from tbl_company_assign cmp INNER JOIN index_description desp on  cmp.company_id='".$company_id."' and  cmp.indxx_id = desp.indxx_id  and desp.return_type='TR'" );
            $tr = $result->result_array();
       			foreach ($tr as $tr1)
        		{
        			
        			$iname[]= $tr1['indxx_name'];
        		}
			$inames = ltrim(implode("','" , $iname), ','); 
		
 		$result = $this->db->query("select * from tbl_company_assign cmp INNER JOIN index_description desp on  cmp.company_id='".$company_id."' and  cmp.indxx_id = desp.indxx_id  and desp.return_type='PR'  and 	desp.indxx_name  not in('$inames')" );
            $pr = $result->result_array();
          	   $data = array_merge($pr,$tr);

            foreach ($data as $pr)
        		{
        			$inname[]= $pr['indxx_name'];
        		}
			$innames = ltrim(implode("','" , $inname), ','); 
            

          $result = $this->db->query("select * from tbl_company_assign cmp INNER JOIN index_description desp on  cmp.company_id='".$company_id."' and  cmp.indxx_id = desp.indxx_id  and desp.return_type='NTR'  and 	desp.indxx_name  not in('$innames')" );
            $ntr = $result->result_array();
         
             $data1 = array_merge($ntr,$data);


            if(count($data1)>0)
            {
                return $data1;
            }
            else
            {
                return '';
            }
        }
        
	function getOldDate($factsheet_id,$newDate,$yearback,$return="")
	{

		$result = $this->db->query('select date from indxx_values where indxx='.$factsheet_id.' and  date <= DATE_SUB("'.$newDate.'",INTERVAL '.$yearback.' YEAR) order by date desc limit 0,1');
		$resdata = $result->result_array();
		
		foreach($resdata as $result){
			$data[] = $result;
		}
		
		$last_year_date = date("Y-m-d",strtotime($data[0]['date']));
		
		return $last_year_date;

	}//End of function

	
	//FUNCTION TO GET IndexTopConstituents
	function getIndexTopConstituents($indxxID)
	{
		$factsheet_id= $indxxID;
		$result = $this->db->query("select isin,name,weight,date from tbl_constituents where indxx_id='".$factsheet_id."' order by weight desc limit 5");
		$resdata = $result->result_array();
		
		foreach($resdata as $resdata1){
			$data[] = $resdata1;
		}
		
		if(empty($data))
		{
			$data = array();
		}
		return $data;
		
	}//End of function
	
	
	//FUNCTION TO GET Index TopTenConstituents
	function getIndexTopTenConstituents($indxxID)
	{
		$factsheet_id= $indxxID;
		$result1 = $this->db->query("select isin,name,weight,date from tbl_constituents where indxx_id='".$factsheet_id."' order by weight desc limit 10");
		$resdata = $result1->result_array();
		
		foreach($resdata as $resd){
			$data[] = $resd;
		}
		
		if(empty($data))
		{
			$data = array();
		}
		
		return $data;
		
	}//End of function
	
	
	//FUNCTION TO GET IndexRiskReturns
	function getIndexRiskReturns($indxxID)
	{
		$factsheet_id = $indxxID;
		
		$bench_qry = $this->db->query("select benchmark_id from indxx where id='".$factsheet_id."'");
		$ben_res = $bench_qry->result_array();
		
		foreach($ben_res as $res){
			$benchmarkID = $res;
		}
		
		$benchmarkID=$benchmarkID['benchmark_id'];
		
		$indx_qry = $this->db->query("select date from indxx_values where indxx_values.indxx='".$factsheet_id."' order by indxx_values.date asc limit 0,1");
		$ind_res = $indx_qry->result_array();
		
		foreach($ind_res as $ires){
			$firstindexvaluedate = $ires;
		}
		
		$firstindexvaluedate=date("Y-m-d",strtotime($firstindexvaluedate['date']));
		
		$qry3 = $this->db->query("select date from indxx_values where indxx_values.indxx='".$factsheet_id."' order by indxx_values.date asc");
		$result3 = $qry3->result_array();
		
		foreach($result3 as $res3){
			$indexvaluedate[] = $res3;
		}
		
		$dates=array();
		if(!empty($indexvaluedate)){
			foreach($indexvaluedate as $date){
			//	$this->pr($date);
				$dates[]=date("Y-m-d",strtotime($date['date']));
			}
		}
		
		$qry4 = $this->db->query("select tbl_benchmark_index_value_b.date,tbl_benchmark_index_value_b.value from tbl_benchmark_index_value_b left join indxx_values on indxx_values.date=tbl_benchmark_index_value_b.date where tbl_benchmark_index_value_b.benchmark_id='".$benchmarkID."' and indxx_values.indxx='".$factsheet_id."' and tbl_benchmark_index_value_b.date>='".$firstindexvaluedate."' order by date asc");
		$result4 = $qry4->result_array();
		
		foreach($result4 as $row)
		{
			$benchmarkValuesArray[] = $row;
		}
		
		
		$qry5 = $this->db->query("select value from tbl_benchmark_index_value_b where tbl_benchmark_index_value_b.benchmark_id='".$benchmarkID."' and date='".$firstindexvaluedate."'");
		$result5 = $qry5->result_array();
		
		foreach($result5 as $res5)
		{
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
		
		//$data = getriskandreturn($factsheet_id,$benchmarkIVArray);
		//return $data;
		
		return $benchmarkIVArray;
	
	}//End of function

	
	
	//FUNCTION TO GET New IndexCharacteristics
	function get_newIndexCharacteristics($indxxID)
	{
		
		$qry1 = $this->db->query("select * from indxx_charecterstics where indxx_id='$indxxID'");
		$result = $qry1->result_array();
	
		$data['inceptionDate']=date("m/d/Y",strtotime($result[0]['base_date']));
		$data['52weeks']= $result[0]['52_week_highlow'];
		$data['noofconstituents'] = $result[0]['no_of_constituents'];
		$data['dividend_yield'] = $result[0]['dividend_yield'];
		$date = $this->getMaxDate($factsheet_id);
		$data['date']=$date;
       

		return $data;
		
	}//End of function
	
	
	//FUNCTION TO GET New IndexTopConstituents
	function get_newIndexTopConstituents($indxxID)
	{
		$qry1 = $this->db->query("select * from indxx_top_5_constituents where indxx_id='$indxxID' order by weight desc");
		$result = $qry1->result_array();
		
		foreach($result as $resdata1){
			$data[] = $resdata1;
		}
		
		if(empty($data))
		{
			$data = array();
		}
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();
		return $data;
		
	}//End of function
	function show_newIndexTopConstituents($table,$where)
	{
		     $this->db->where($where);
			 $this->db->select('no_of_top_constituents');
			 $this->db->from($table);
			 $query = $this->db->get();	
			 return $query->row();
	}
	
	
	//FUNCTION TO GET New IndexRiskReturns
	function get_newIndexRiskReturns($indxxID)
	{
		$qry1 = $this->db->query("select * from indxx_risk_return_statistics where indxx_id='$indxxID'");
		$result = $qry1->result_array();

		return $result;
		
	}//End of function

    function result($tabel)
     {  
     	$this->db->select("*");
		$this->db->from($tabel);		
		$query = $this->db->get();	
		return $query->result();
	 }
	 
	 function resultDesc($tabel)
     {  
     	$this->db->select("*");
		$this->db->from($tabel);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();	
		return $query->result();
	 }

	  function resultWhere($tabel,$where)
     {  
     	$this->db->where($where);
     	$this->db->select("*");
		$this->db->from($tabel);		
		$query = $this->db->get();	
		return $query->result();
	 }

	 function resultLimit($tabel)
	 {  $this->db->limit(5);  
	 	$this->db->select("*");
	 	$this->db->order_by('id', "desc");
		$this->db->from($tabel);		
		$query = $this->db->get();	
		return $query->result();
	 }
          function resultLimitForFront($tabel,$column='')
	 {  $this->db->limit(5);  
	 	$this->db->select("*");
	 	$this->db->order_by($column, "desc");
		$this->db->from($tabel);		
		$query = $this->db->get();	
		return $query->result();
	 }
	  function getrow($tabel)
     {
     	$this->db->select("*");
		$this->db->from($tabel);		
		$query = $this->db->get();	
		return $query->row();
	 }

	  function getrowWhere($where,$columnName,$tabel)
     {
     	$this->db->where($where);
     	$this->db->select("*");
		$this->db->from($tabel);		
		$query = $this->db->get();	
		return $query->row();
	 }

	function getResultNew($tabel,$column)
     {
     	$this->db->select("*");
		$this->db->from($tabel);
		$this->db->group_by($column); 
		$this->db->order_by($column, "desc");
		$query = $this->db->get();	
		// echo $this->db->last_query();
		// 	 die();

		return $query->result();
	 }

	 function getResultByOrd($tabel,$column,$where)
     {
     	$this->db->where($where);
     	$this->db->select("*");
		$this->db->from($tabel); 
		$this->db->order_by($column, "asc");
		$query = $this->db->get();	
		// echo $this->db->last_query();
		// 	 die();

		return $query->result();
	 }

	  function getResultByOrdInd($tabel,$column,$where)
     {
     	$this->db->where($where);
     	$this->db->select("*");
		$this->db->from($tabel); 
		$this->db->order_by($column, "asc");
		$query = $this->db->get();	
		// echo $this->db->last_query();
		// 	 die();

		return $query->result();
	 }
       
      /* function getIndexForSearch($tabel,$column,$where)  
       {
      

		  $SQL="SELECT indx.*
         FROM indxx indx
         INNER JOIN index_description desp 
         on indx.code = desp.code and desp.return_type='TR' 
         and indx.productlist=1  group by desp.indxx_name order by indx.name";
         $query = $this->db->query($SQL);
         return $query->result();
       }
       */
         
       function getIndexForSearch($tabel,$column,$where)  
       {
      

		  $SQL="SELECT indx.*
         FROM indxx indx
         INNER JOIN index_description desp 
         on indx.code = desp.code
         and indx.productlist=1  group by desp.indxx_name order by indx.name";
         $query = $this->db->query($SQL);
         return $query->result();
       }
       
        function get_thematic($tabel,$column,$where)  
       {
      

		  $SQL="SELECT * FROM indxx indx INNER JOIN index_description desp on indx.code = desp.code and desp.return_type='TR' and desp.index_type='Thematic' and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name) ASC";
         $query = $this->db->query($SQL);
         return $query->result();
       }
       
       
       function getResultByOrdInd2($tabname)
       {
         
 			 $SQL=" SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='$tabname'
  			and indx.productlist=1  group by desp.indxx_name order by UPPER(indx.name)  asc";
        	 $query = $this->db->query($SQL);
        	$tr= $query->result();
        	

        		foreach ($tr as $tr1)
        		{
        			$iname[]= $tr1->name;
        		}


     	 
  
$inames = ltrim(implode("','" , $iname), ','); 
           $SQL=" SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='NTR' and desp.index_type='$tabname'
  			and indx.productlist=1  and indx.name not in('$inames') group by desp.indxx_name order by UPPER(indx.name) asc";
            $query3 = $this->db->query($SQL);
            $ntr =  $query3->result();
       $data = array_merge($ntr,$tr);
      
       foreach ($data as $data1)
        		{
        			$inname[]= $data1->name;
        		}
$inname = ltrim(implode("','" , $inname), ','); 

            $SQL=" SELECT *
			FROM indxx indx
			INNER JOIN index_description desp 
    		on indx.code = desp.code and desp.return_type='PR' and desp.index_type='$tabname'
  			and indx.productlist=1  and indx.name not in('$inname') group by desp.indxx_name order by UPPER(indx.name) asc";
            $query2 = $this->db->query($SQL);
             $pr =  $query2->result();

  $result_data = array_merge($data,$pr);
 		 $this->sortBy('name',   $result_data);
 
 	return $result_data;
       }

       function sortBy($field, &$array, $direction = 'asc')
{
    usort($array, create_function('$a, $b', '
        $a = $a->name;
        $b = $b->name;

        if ($a == $b) return 0;

        $direction = strtolower(trim($direction));

        return ($a ' . ($direction == 'desc' ? '>' : '<') .' $b) ? -1 : 1;
    '));

    return true;
}
//created by Amol
function getResultByOrdInd3($tabname)
       {
            $SQL=" SELECT *
FROM indxx indx
INNER JOIN index_description desp 
    on indx.code = desp.code and desp.return_type='PR' and desp.index_type='$tabname'
  and indx.productlist=1  group by desp.indxx_name order by indx.name";
             $query = $this->db->query($SQL);
            return $query->result();
       }

	 function getResultWhere($tabel,$where)
     {
     	$this->db->where($where);  
     	$this->db->select("*");
		$this->db->from($tabel);			
		$query = $this->db->get();
		 // echo $this->db->last_query();
		 // 	 die();	
		return $query->result();
	 }
	 function getResulthl($tabel)
     {
             $SQL=" SELECT cng.*
FROM indxx indx
INNER JOIN index_description desp
    on indx.code = desp.code
INNER JOIN indxx_percentage_chg cng
    on cng.code = desp.code  and indx.productlist=1 and (indx.tabname='Benchmark' or  indx.tabname='Income' or indx.tabname='Thematic') group by cng.code order by indx.name";
             $query = $this->db->query($SQL);
            return $query->result();
//     	$this->db->select("*");
//		$this->db->from($tabel);			
//		$query = $this->db->get();
//		 // echo $this->db->last_query();
//		 // 	 die();	
//		return $query->result();
	 }


function insert($table,$data)
	 {
	 	if($this->db->insert($table, $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		

	 }
	 

	 function ban($factsheet_id)
	 {
	 	$query = $this->db->query("select benchmark_id from indxx where id='".$factsheet_id."'");
		return $query->row();

	 }
	 function second($factsheet_id)
	 {
	 	$query = $this->db->query("select date from indxx_values where indxx_values.indxx='".$factsheet_id."' order by indxx_values.date asc limit 0,1");
		return $query->row();
	 }
	 function third($factsheet_id)
	 {
	 	$query = $this->db->query("select date from indxx_values where indxx_values.indxx='".$factsheet_id."' order by indxx_values.date asc");
		return $query->result();
	 }
	 function four($benchmarkID,$factsheet_id,$firstindexvaluedate)
	 {
	 	$query = $this->db->query("select tbl_benchmark_index_value_b.date,tbl_benchmark_index_value_b.value from tbl_benchmark_index_value_b left join indxx_values on indxx_values.date=tbl_benchmark_index_value_b.date where tbl_benchmark_index_value_b.benchmark_id='".$benchmarkID."' and indxx_values.indxx='".$factsheet_id."' and tbl_benchmark_index_value_b.date>='".$firstindexvaluedate."' order by date asc");
		return $query->result();

	 }
	 function five($benchmarkID,$firstindexvaluedate)
	 {
	 	$query = $this->db->query("select value from tbl_benchmark_index_value_b where tbl_benchmark_index_value_b.benchmark_id='".$benchmarkID."' and date='".$firstindexvaluedate."'");
		return $query->row();
	 }

	 function namete($indxxID)
	 {
	 	$query = $this->db->query("select * from index_description where indxx_id='".$indxxID."'");
		return $query->row();
	 }

	 function nameWithId($index_name,$ritern_type)
	 {
	 	$query = $this->db->query("select indxx_id,return_type from index_description where indxx_name='".$index_name."'AND return_type != '".$ritern_type."' and (return_type='TR' or return_type='PR')   and indxx_id in (select  id from indxx where productlist !=2)");
		return $query->row();
	 }
          function GetCADGTR($index_name)
	 {
	 	$query = $this->db->query("select indxx_id,return_type from index_description where indxx_name='".$index_name."'AND return_type = 'CADGTR' and indxx_id in (select  id from indxx where productlist !=2)");
		return $query->row();
	 }

	 function GetCADNTR($index_name)
	 {
	 	$query = $this->db->query("select indxx_id,return_type from index_description where indxx_name='".$index_name."'AND return_type = 'CADNTR' and indxx_id in (select  id from indxx where productlist !=2)");
		return $query->row();
	 }
          
          function GetNTR($index_name)
	 {
	 	$query = $this->db->query("select indxx_id,return_type from index_description where indxx_name='".$index_name."'AND return_type = 'NTR' and indxx_id in (select  id from indxx where productlist !=2)");
		return $query->row();
	 }
          function GetPR($index_name)
	 {
	 	$query = $this->db->query("select indxx_id,return_type from index_description where indxx_name='".$index_name."'AND return_type = 'PR' and indxx_id in (select  id from indxx where productlist !=2)");
		return $query->row();
	 }
          function GetTR($index_name)
	 {  
	 	$query = $this->db->query("select indxx_id,return_type from index_description where indxx_name='".$index_name."'AND return_type = 'TR' and indxx_id in (select  id from indxx where productlist !=2)");
		return $query->row();
	 }

	 function resultdown($table, $where)
     {
     	     $this->db->where($where);
			 $this->db->select('DATE_FORMAT(date, "%Y-%m-%d") as date,value');
			 $this->db->from($table);
                         $this->db->order_by("date", "asc");
			 return $this->db->get();
	 }

	 function getCode($table, $where)
	 { 
	         $this->db->where($where);
			 $this->db->select('code');
			 $this->db->from($table);
			 $query = $this->db->get();	
			 return $query->row();
	 }
 function getWeightType($indxx)
	 { 
	         $this->db->where(array('id'=>$indxx)); 
			 $this->db->select('weighttype');
			 $this->db->from('indxx');
			 $query = $this->db->get();	
			 return $query->row();
	 }
	  function getAllResult($table) {

        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }





function firstnews()
	{
          $query = $this->db->query("SELECT * FROM `tbl_news` ORDER BY `id` DESC LIMIT 1");
		return $query->row(); 
               
	}//End of function
        
        
        function secondpress()
	{
          $query = $this->db->query("SELECT * FROM `tbl_press` ORDER BY `id` DESC LIMIT 1");
		return $query->row(); 	
	}//End of function
       
        
    function getBaseDate($indxxID)
    {
         $query = $this->db->query("select date from indxx_values where indxx_values.indxx='$indxxID' order by indxx_values.date asc limit 0,1");
		return $query->row(); 
    }
    
    
    function getDepartmentWiseEmp($department_id)
    {
    	$res =$this->db->where('department',$department_id)->where('status',1)->order_by('order', 'ASC')->get('tbl_management')->result();
    	return $res;
    }

     function RCGetResultByOrdInd2($region_country,$tabname)
   	{
     
			 $SQL=" SELECT *
		FROM indxx indx
		INNER JOIN index_description desp 
		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='$tabname'
			and indx.productlist=1 and indx.region_country='$region_country' group by desp.indxx_name order by UPPER(indx.name)  asc";
    	 $query = $this->db->query($SQL);
    	$tr= $query->result();
    	

		foreach ($tr as $tr1)
		{
			$iname[]= $tr1->name;
		}

		$inames = ltrim(implode("','" , $iname), ','); 
       	$SQL=" SELECT *
		FROM indxx indx
		INNER JOIN index_description desp 
		on indx.code = desp.code and desp.return_type='NTR' and desp.index_type='$tabname'
			and indx.productlist=1 and indx.region_country='$region_country'  and indx.name not in('$inames') group by desp.indxx_name order by UPPER(indx.name) asc";
        $query3 = $this->db->query($SQL);
        $ntr =  $query3->result();
   		$data = array_merge($ntr,$tr);
  
   		foreach ($data as $data1)
		{
			$inname[]= $data1->name;
		}
		$inname = ltrim(implode("','" , $inname), ','); 

        $SQL=" SELECT *
		FROM indxx indx
		INNER JOIN index_description desp 
		on indx.code = desp.code and desp.return_type='PR' and desp.index_type='$tabname'
			and indx.productlist=1 and indx.region_country='$region_country'  and indx.name not in('$inname') group by desp.indxx_name order by UPPER(indx.name) asc";
        $query2 = $this->db->query($SQL);
        $pr =  $query2->result();

			$result_data = array_merge($data,$pr);
		 	$this->sortBy('name',   $result_data);

			return $result_data;
   	}

   	function SectorGetResultByOrdInd2($sector,$tabname)
   	{
     
			 $SQL=" SELECT *
		FROM indxx indx
		INNER JOIN index_description desp 
		on indx.code = desp.code and desp.return_type='TR' and desp.index_type='$tabname'
			and indx.productlist=1 and indx.sector='$sector' group by desp.indxx_name order by UPPER(indx.name)  asc";
    	 $query = $this->db->query($SQL);
    	$tr= $query->result();
    	

		foreach ($tr as $tr1)
		{
			$iname[]= $tr1->name;
		}

		$inames = ltrim(implode("','" , $iname), ','); 
       	$SQL=" SELECT *
		FROM indxx indx
		INNER JOIN index_description desp 
		on indx.code = desp.code and desp.return_type='NTR' and desp.index_type='$tabname'
			and indx.productlist=1 and indx.sector='$sector'  and indx.name not in('$inames') group by desp.indxx_name order by UPPER(indx.name) asc";
        $query3 = $this->db->query($SQL);
        $ntr =  $query3->result();
   		$data = array_merge($ntr,$tr);
  
   		foreach ($data as $data1)
		{
			$inname[]= $data1->name;
		}
		$inname = ltrim(implode("','" , $inname), ','); 

        $SQL=" SELECT *
		FROM indxx indx
		INNER JOIN index_description desp 
		on indx.code = desp.code and desp.return_type='PR' and desp.index_type='$tabname'
			and indx.productlist=1 and indx.sector='$sector'  and indx.name not in('$inname') group by desp.indxx_name order by UPPER(indx.name) asc";
        $query2 = $this->db->query($SQL);
        $pr =  $query2->result();

			$result_data = array_merge($data,$pr);
		 	$this->sortBy('name',   $result_data);

			return $result_data;
   	}



	
}//end of class
?>
